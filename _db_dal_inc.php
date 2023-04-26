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

function aggiungi_carello($conn,$idUP,$idB)
{
    //ricerca delle informazioni sulla azienda cliente 
    $ricercaazienda="SELECT r.idA as idA, a.nome as nome 
    FROM bottiglia b 
    inner join richiesto r on b.idB=r.idB 
    inner join aziendacliente a on r.idA=a.idA 
    where b.idB=?";
    $stmt = $conn->prepare($ricercaazienda); 
    $stmt->bind_param("i", $idB);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc(); 

    $aziendacliente=isset($data['nome']) ? $data['nome'] : NULL;
    $idA= isset($data['idA']) ? $data['idA'] : NULL;

    $controlloingrosso="SELECT u.iva from utenteprivato u where u.idUP=$idUP";
    $resControllo=$conn->query($controlloingrosso);
    $rowControllo=$resControllo->fetch_assoc();
    $iva=$rowControllo['iva'];

    $trovaprezzo="SELECT b.prezzo from bottiglia b where b.idB=$idB";
    $resPrezzo=$conn->query($trovaprezzo);
    $rowPrezzo=$resPrezzo->fetch_assoc();
    $prezzoBottiglia=$rowPrezzo['prezzo'];
    $null=NULL;
    if($iva=="NULL"){
        $sql="INSERT INTO `vendita` (`ingrosso`, `aziendacliente`, `prezzoingrosso`, `prezzodettaglio`, `idUP`, `idA`, `idB`) 
        VALUES(?,?,?,?,?,?,?)";
        $query = $conn->prepare($sql); 
        $zero=0;
        $query->bind_param("isddiii", $zero, $aziendacliente, $null, $prezzoBottiglia, $idUP, $idA, $idB);
    }
    else
    {
        $sql="INSERT INTO `vendita` (`ingrosso`, `aziendacliente`, `prezzoingrosso`, `prezzodettaglio`, `idUP`, `idA`, `idB`) 
        VALUES (?,?,?,?,?,?,?)";
        $query = $conn->prepare($sql); 
        $uno=1;
        $query->bind_param("isddiii", $uno, $aziendacliente, $prezzoBottiglia, $null,  $idUP, $idA, $idB);
    }
    $query->execute();
}
function visualizza_carrello($conn,$idUP)
{
    $sql="SELECT b.nomevino,b.prezzo,v.numerobottiglie,b.descrizione, i.path as path 
    FROM vendita v
    INNER join bottiglia b on v.idB=b.idB
    inner join immaginebottiglia i on B.idB=i.idB
    where i.principale <> 0 AND v.idUP=?";
    $query = $conn->prepare($sql); 
    $query->bind_param("i", $idUP);
    $query->execute();
    $carrello = $query->get_result();
    $carrello_bello=$carrello->fetch_all(MYSQLI_ASSOC);
    return $carrello_bello;
}
function nuovo_prod_chimico($conn,$nome,$principio)
{
    $prodotti= "SELECT nome, principioattivo from prodottochimico";
    $prod=$conn->query($prodotti);
    $rowprodotti=$prod->fetch_assoc();
    if($rowprodotti['nome']==$nome && $rowprodotti['principioattivo']==$principio){
        return 0;
    } else{
        $sql="INSERT INTO `prodottochimico`(`nome`, `principioattivo`) VALUES ('$nome','$principio')";
        $conn->query($sql);
        return 1;
    }
}
function nuovo_intervento($conn,$tipo,$data,$nomeprodotto,$idVigneto)
{
    $tipo=$conn->real_escape_string($tipo);
    $data=$conn->real_escape_string($data);
    $nomeprodotto=$conn->real_escape_string($nomeprodotto);
    $idVigneto=$conn->real_escape_string($idVigneto);
    $qry="SELECT idP from prodottochimico WHERE nome='$nomeprodotto' ";
    $res=$conn->query($qry);
    $row=$res->fetch_assoc();
    $idP=$row['idP'];

    $sql="INSERT INTO `intervento`(`tipo`, `data`, `idP`, `idVigneto`) VALUES ('$tipo','$data','$idP','$idVigneto')";
    $conn->query($sql);
}

function verifica_session($conn,$id){
    $sql="SELECT * FROM utenteprivato where idUP like '$id' ";
    $result=$conn->query($sql);
    return mysqli_fetch_array($result);
}
function sel_dettagli_utente($conn,$id)
    {

        $sql="SELECT * from utenteprivato where idUP=$id";
    
        $result=$conn->query($sql);
    
        $row = $result->fetch_assoc();
        return $row;
    }

function info_cantine($conn) /*bisogna aggiungerci la parte con le immagini*/
{
    $sql="SELECT c.idCantina as id, c.nome as nome, c.comune as comune, c.coordinate as coordinate, c.descrizione as descrizione from cantina c";

    $result = $conn->query($sql);

    return $result;
}

function info_cantina($conn,$id) /*bisogna aggiungerci la parte con le immagini*/
{
    $sql="SELECT c.idCantina as id, c.nome as nome, c.comune as comune, c.coordinate as coordinate, c.descrizione as descrizione from cantina c where idCantina=$id";

    $result = $conn->query($sql);

    return $result;
}

function info_vino($conn,$id)
{
    $sql= "SELECT B.nomevino as nomevino, B.prezzo as prezzo, B.descrizione as descrizione, 
    B.gradoalcolico as gradoalcolico, B.annoproduzione as annoproduzione, V.profumo as profumo, V.gusto as gusto, V.retrogusto as retrogusto,
    V.tannino as tannino, V.colore as colore, V.temperatura as temperatura, i.path as path 
    FROM bottiglia B 
    join vino V on V.idV=B.idV 
    inner join immaginebottiglia i on B.idB=i.idB
    WHERE B.idB='$id'
    ORDER by i.principale DESC";

    return  $conn->query($sql);
}
function sel_bottiglie($conn){
    $sql= "SELECT B.idB as idB ,B.nomevino as nomevino, B.prezzo as prezzo, V.tiponormale as tipoN, V.tipospeciale as tipoS, i.path as path 
    FROM `bottiglia` B 
    inner join vino V on V.idV=B.idV 
    inner join immaginebottiglia i on B.idB=i.idB
    where i.principale <> 0";
    $result = $conn->query($sql);
    return $result;
}

function ordini_utente($conn,$idUP){
    $sql="SELECT * from vendita WHERE idUP='$idUP'";
    $result=$conn->query($sql);
    return $result;
}

function prenotazione_festa($conn,$nome,$cognome,$data,$mail,$nomecantina,$tel){
    $cercaidcant="SELECT idCantina FROM cantina where nome='$nomecantina'";
    $res=$conn->query($cercaidcant);
    $row=$res->fetch_assoc();
    $idCantina=$row['idCantina'];
    
    $nome=$conn->real_escape_string($nome);
    $cognome=$conn->real_escape_string($cognome);
    $data=$conn->real_escape_string($data);
    $mail=$conn->real_escape_string($mail);

    $sql="INSERT INTO `festa` (nome,cognome,mail,telefono,data,idCantina) VALUES ('$nome','$cognome','$mail','$tel','$data',$idCantina)";
    $conn->query($sql);
}
?>