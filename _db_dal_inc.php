<?php

require('_config_inc.php');

function db_connect()
{

    global $servername, $username, $password, $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function new_user($conn,$signup_nome,$email,$signup_piva,$signup_indirizzo,$psw){

    $signup_nome=$conn->real_escape_string($signup_nome);
    $email=$conn->real_escape_string($email);
    $signup_piva=$conn->real_escape_string($signup_piva);
    $signup_indirizzo=$conn->real_escape_string($signup_indirizzo);
    $psw=$conn->real_escape_string($psw);
    $hash=password_hash($psw, PASSWORD_BCRYPT);
    if($signup_piva=="NULL")
    {
        $sql="INSERT INTO utenteprivato (mail, password, nomecompleto) VALUES ('$email', '$hash', '$signup_nome')";
    }
    else
    {
        $sql="INSERT INTO utenteprivato (mail, password, nomecompleto, iva, indirizzofatturazione) VALUES ('$email', '$hash', '$signup_nome', '$signup_piva', '$signup_indirizzo')";
    }

    return $conn->query($sql);
}

function verifica_user($conn,$mail,$password){
    $mail=$conn->real_escape_string($mail);
    $password=$conn->real_escape_string($password);

    $sql="SELECT * FROM utenteprivato where mail like '$mail' ";
    $result=$conn->query($sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            if(password_verify($password,$row['password']))
            {
                return $row;
            }
        }
    }
}

function prenotazione_visita($conn, $nome,$cognome,$datanascita,$mail,$datavisita,$orario,$nomecantina,$numeropartecipanti){
    $cercaidcant="SELECT idCantina FROM cantina where nome='$nomecantina'";
    $res=$conn->query($cercaidcant);
    $row=$res->fetch_assoc();
    $idCantina=$row['idCantina'];

    $nome=$conn->real_escape_string($nome);
    $cognome=$conn->real_escape_string($cognome);
    $datanascita=$conn->real_escape_string($datanascita);
    $mail=$conn->real_escape_string($mail);

    $aggiungivisitatore="INSERT INTO visitatore (nome, cognome, datanascita, mail) VALUES ('$nome', '$cognome', '$datanascita', '$mail')";
    $conn->query($aggiungivisitatore);

    $cercaidvisitatore="SELECT MAX(idVisitatore) as idc FROM visitatore";
    $resVis=$conn->query($cercaidvisitatore);
    $rowVis=$resVis->fetch_assoc();
    $idV=$rowVis['idc'];

    $datavisita=$conn->real_escape_string($datavisita);
    $orario=$conn->real_escape_string($orario);
    $idCantina=$conn->real_escape_string($idCantina);

    $aggiungivisita="INSERT INTO visita_onav (motivo, data, orario, descrizione, idCantina) VALUES ('visita', '$datavisita', '$orario', NULL, '$idCantina')";
    $conn->query($aggiungivisita);

    $cercaidvisita="SELECT MAX(idVisita) as idv FROM visita_onav";
    $resV=$conn->query($cercaidvisita);
    $rowV=$resV->fetch_assoc();
    $idVisita=$rowV['idv'];

    $numeropartecipanti=$conn->real_escape_string($numeropartecipanti);

    $aggiungipartecipa="INSERT INTO partecipa (idVisitatore, idVisita, numeropartecipanti) VALUES ('$idV', '$idVisita', '$numeropartecipanti')";
    
}

function aggiungi_carello($conn,$idUP,$idB,$idA,$tipopacco,$aziendacliente)
{
    $controlloingrosso="SELECT u.iva from utenteprivato u where u.idUP=$idUP";
    $resControllo=$conn->query($controlloingrosso);
    $rowControllo=$resControllo->fetch_assoc();
    $iva=$rowControllo['iva'];

    $trovaprezzo="SELECT b.prezzo from bottiglia b where b.idB=$idB";
    $resPrezzo=$conn->query($trovaprezzo);
    $rowPrezzo=$resPrezzo->fetch_assoc();
    $prezzoBottiglia=$rowPrezzo['prezzo'];

    if($iva=="NULL"){
        $sql="INSERT INTO `vendita` (`idVendita`, `ingrosso`, `tipopacco`, `aziendacliente`, `prezzoingrosso`, `prezzodettaglio`, `idUP`, `idA`, `idB`) 
    VALUES (NULL, 0, '$tipopacco', '$aziendacliente', NULL, $prezzoBottiglia,  '$idUP', '$idA', '$idB')"
    }
    else
    {
        $sql="INSERT INTO `vendita` (`idVendita`, `ingrosso`, `tipopacco`, `aziendacliente`, `prezzoingrosso`, `prezzodettaglio`, `idUP`, `idA`, `idB`) 
    VALUES (NULL, 0, '$tipopacco', '$aziendacliente',  $prezzoBottiglia, NULL,  '$idUP', '$idA', '$idB')"
    }

    $conn->query($sql);
}
?>