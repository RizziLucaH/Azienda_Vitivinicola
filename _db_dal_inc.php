<?php

require('_config.inc.php');

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
    $sql="INSERT INTO utenteprivato (mail, password, nomecompleto, iva, indirizzofatturazione) VALUES ('$email', '$hash', '$signup_nome', '$signup_piva', '$signup_indirizzo')";
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

    $aggiungivisitatore="INSERT INTO visitatore (nome, cognome, datanascita, mail) VALUES ('$nome', '$cognome', '$datanascita', '$mail')";
    $conn->query($aggiungivisitatore);

    $cercaidvisitatore="SELECT MAX(idVisitatore) as idc FROM visitatore";
    $resVis=$conn->query($cercaidvisitatore);
    $rowVis=$resVis->fetch_assoc();
    $idV=$rowVis['idc'];


    $aggiungivisita="INSERT INTO visita_onav (motivo, data, orario, descrizione, idCantina) VALUES ('visita', '$datavisita', '$orario', NULL, '$idCantina')";
    $conn->query($aggiungivisita);

    $cercaidvisita="SELECT MAX(idVisita) as idv FROM visita_onav";
    $resV=$conn->query($cercaidvisita);
    $rowV=$resV->fetch_assoc();
    $idVisita=$rowV['idv'];


    $aggiungipartecipa="INSERT INTO partecipa (idVisitatore, idVisita, numeropartecipanti) VALUES ('$idV', '$idVisita', '$numeropartecipanti')";
    $conn->query($aggiungipartecipa);
}
?>