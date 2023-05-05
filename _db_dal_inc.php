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
    $conn->query($aggiungipartecipa);
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
    if(is_null($iva)){
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
    $sql="SELECT v.idB,b.nomevino,b.prezzo,v.numerobottiglie,b.descrizione, i.path as path 
    FROM vendita v
    INNER join bottiglia b on v.idB=b.idB
    inner join immaginebottiglia i on B.idB=i.idB
    where i.principale <> 0 AND v.idUP=? AND v.acquistato=?";
    $zero=0;
    $query = $conn->prepare($sql); 
    $query->bind_param("ii", $idUP,$zero);
    $query->execute();
    $carrello = $query->get_result();
    $carrello_bello=$carrello->fetch_all(MYSQLI_ASSOC);
    return $carrello_bello;
}
function nuovo_prod_chimico($conn,$nome,$principio)
{
    $prodotti= "SELECT nome, principioattivo from prodottochimico";
    $prod=$conn->query($prodotti);
    $rowprodotti=$prod->fetch_all(MYSQLI_ASSOC);
    $nico=false;
    foreach($rowprodotti as $row){
        if($row['nome']==$nome && $row['principioattivo']==$principio){
            $nico=true;
            return 0;
        }else{
            $nico=false;
        }
    }
    if($nico==false){
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
    $sql="SELECT c.idCantina as id, c.nome as nome, i.path as path
    from cantina c inner join immaginecantina i on c.idCantina=i.idCantina where i.principale <> 0";

    $result = $conn->query($sql);

    return $result;
}

function info_cantina($conn,$id) /*bisogna aggiungerci la parte con le immagini*/
{
    $sql="SELECT c.idCantina as id, c.nome as nome, c.comune as comune, c.coordinate as coordinate, c.descrizione as descrizione, i.path as path from cantina c 
    inner join immaginecantina i on c.idCantina=i.idCantina where c.idCantina=$id ORDER by i.principale DESC";

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
    $sql= "SELECT B.idB as idB ,B.nomevino as nomevino, B.annoproduzione as anno, B.prezzo as prezzo, V.tiponormale as tipoN, V.tipospeciale as tipoS, i.path as path 
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
function sel_bottiglie_carrello($conn,$idUP){
    $sql="SELECT v.idB
    FROM vendita v
    where v.idUP=?";
    $query = $conn->prepare($sql); 
    $query->bind_param("i", $idUP);
    $query->execute();
    $bottiglie = $query->get_result();
    $bottiglie_belle=$bottiglie->fetch_all(MYSQLI_ASSOC);
    return $bottiglie_belle;
}
function update_carrello($conn,$idUP,$idB){
    $sql="UPDATE vendita v SET v.numerobottiglie=v.numerobottiglie+1 WHERE v.idUP=? and v.idB=?";
    $query = $conn->prepare($sql); 
    $query->bind_param("ii", $idUP,$idB);
    $query->execute();
}
function remove_carrello($conn,$idB){
    $sql="DELETE FROM vendita v WHERE v.idB=?";
    $query = $conn->prepare($sql); 
    $query->bind_param("i",$idB);
    $query->execute();
}
function nuova_richiesta($conn,$nome,$bottiglia,$numero){
    $nome=$conn->real_escape_string($nome);
    $bottiglia=$conn->real_escape_string($bottiglia);

    $qry="SELECT idB from bottiglia where nomevino='$bottiglia'";
    $res=$conn->query($qry);
    $row=$res->fetch_assoc();
    $idB=$row['idB'];

    $qry2="SELECT idA from aziendacliente where nome='$nome'";
    $res=$conn->query($qry2);
    $row=$res->fetch_assoc();
    $idA=$row['idA'];

    $sql="INSERT INTO richiesto (idB,idA,quantita) VALUES ('$idB','$idA','$numero') ";
    $conn->query($sql);

}
function vendite($conn){
    $sql="SELECT * from vendita";
    $result=$conn->query($sql);
    return $result;
}

function vendite_clienti($conn){
    $sql="SELECT u.nomecompleto as nome,v.numerobottiglie as numero, v.data as 'data', b.nomevino as nomevino  from vendita v join utenteprivato u on v.idUP=u.idUP inner join bottiglia b on v.idB=b.idB where v.acquistato=1";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


function verifica_admin($conn,$mail,$password){
    $mail=$conn->real_escape_string($mail);
    $password=$conn->real_escape_string($password);

    $sql="SELECT * FROM utenteadmin where mail like '$mail' ";
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

function effettua_pagamento($conn,$cliente){
    $conn->query("UPDATE vendita SET acquistato=1 WHERE idUP=$cliente and acquistato=0");
}

function Certificazioni_si($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=1;";
    $result=$conn->query($sql);
    return $result;
}
function Certificazioni_no($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=0;";
    $result=$conn->query($sql);
    return $result;
}


function seleziona_interventi($conn,$idVigneto){
    $sql="SELECT i.tipo, i.data, p.nome, p.principioattivo FROM intervento i inner join prodottochimico p on i.idP=p.idP where idVigneto=$idVigneto order by i.data";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


function fill_chart($conn,$idVigneto){
    $output=array();
    $sql="SELECT COUNT(*) as count from intervento where idVigneto=$idVigneto and tipo like 'sistemico'";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $countsistemico=$rows['count'];
    $output[0]=$countsistemico;


    $sql="SELECT COUNT(*) as count from intervento where idVigneto=$idVigneto and tipo like 'contatto'";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $countcontatto=$rows['count'];
    $output[1]=$countcontatto;

    $sql="SELECT COUNT(*) as count from intervento where idVigneto=$idVigneto and tipo like 'citotropico'";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $countcitotropico=$rows['count'];
    $output[2]=$countcitotropico;

    return $output;
    

}

function select_vitigno($conn,$idVigneto){
    $sql="SELECT v.uva, v.idVitigno from vitigno v where v.idVigneto=$idVigneto;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function select_prodottichimici($conn){
    $sql="SELECT p.nome FROM prodottochimico p";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function rimuovi_vitigno($conn,$idVitigno,$idVigneto){
    $sql="DELETE from vitigno where idVitigno=$idVitigno and idVigneto=$idVigneto";
    $result=$conn->query($sql);
}

function insert_vitigno($conn,$uva,$idv){
    $sql="INSERT INTO `vitigno`(`uva`, `idVigneto`) VALUES ('$uva','$idv')";
    $result=$conn->query($sql);
}
function seleziona_prodottichimici($conn){
    $sql="SELECT p.nome, p.principioattivo FROM prodottochimico p;";
    $result=$conn->query($sql);
    return $result;
}

function count_vini($conn){
    $output=array();
    //count rossi
    $sql="SELECT COUNT(*) as count
    from vendita ve  inner join bottiglia b on ve.idB=b.idB inner join vino v on b.idV=v.idV
    where v.tiponormale like 'Rosso' and ve.acquistato=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $output[0]=$rows['count'];
    //count bianchi
    $sql="SELECT COUNT(*) as count
    from vendita ve  inner join bottiglia b on ve.idB=b.idB inner join vino v on b.idV=v.idV
    where v.tiponormale like 'Bianco' and ve.acquistato=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $output[1]=$rows['count'];
    //count spumanti
    $sql="SELECT COUNT(*) as count
    from vendita ve  inner join bottiglia b on ve.idB=b.idB inner join vino v on b.idV=v.idV
    where v.tipospeciale like 'Spumante' and ve.acquistato=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $output[2]=$rows['count'];
    //count vini dolci
    $sql="SELECT COUNT(*) as count
    from vendita ve  inner join bottiglia b on ve.idB=b.idB inner join vino v on b.idV=v.idV
    where v.tipospeciale like 'Vino dolce' and ve.acquistato=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $output[3]=$rows['count'];
    //count grappe
    $sql="SELECT COUNT(*) as count
    from vendita ve  inner join bottiglia b on ve.idB=b.idB inner join vino v on b.idV=v.idV
    where v.tipospeciale like 'Grappa' and ve.acquistato=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $output[4]=$rows['count'];

    return $output;
}
function seleziona_vigneti($conn){
    $sql="SELECT * FROM vigneto";
    $result=$conn->query($sql);
    return $result;
}
function seleziona_visite($conn)
{
    $sql="SELECT v.nome,v.cognome,p.numeropartecipanti,c.nome as nomecantina,vi.data from visitatore v INNER JOIN partecipa p on v.idVisitatore=p.idVisitatore INNER JOIN visita_onav vi on p.idVisita=vi.idVisita INNER join cantina c on vi.idCantina=c.idCantina;";
    $result=$conn->query($sql);
    return $result;
}
function Prima_query($conn){
    $sql="SELECT `nome` FROM `cantina` 
        inner join bottiglia b on b.idCantina=cantina.idCantina
        INNER JOIN richiesto on b.idB=richiesto.idB
        WHERE b.nomevino like 'Paradiso' and richiesto.idA=(SELECT idA from aziendacliente  where aziendacliente.nome like 'Il Mulino')";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
function Seconda_query($conn){
    $sql="SELECT v1.idVigneto,v1.nome
    FROM vigneto v1
    inner join intervento i1 on v1.idVigneto=i1.idVigneto
    inner join prodottochimico p1 on i1.idP=p1.idP
    where i1.tipo like 'Sistemico' and v1.idVigneto in(
        SELECT v2.idVigneto
        FROM vigneto v2
        inner join intervento i2 on v2.idVigneto=i2.idVigneto
        inner join prodottochimico p2 on i2.idP=p2.idP
        where i2.tipo like 'Sistemico'
        AND p2.nome<>p1.nome
        AND YEAR(i1.data)=YEAR(i2.data))
    GROUP by v1.idVigneto,v1.nome";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
function Terza_query($conn){
    $sql="SELECT DISTINCT vin.nome
    FROM vino vin
    INNER JOIN compone c on vin.idV=c.idV
    INNER JOIN vitigno vit on c.idVitigno=vit.idVitigno
    INNER JOIN vigneto vv on vit.idVigneto=vv.idVigneto
    where vv.idVigneto in (
        SELECT v.idVigneto
        FROM vigneto v
        inner join intervento i on v.idVigneto=i.idVigneto
        GROUP by v.idVigneto
        HAVING COUNT(*)=(
            SELECT count(*) as MAXINT
            FROM vigneto v2 
            inner join intervento i2 on v2.idVigneto=i2.idVigneto
            GROUP by v2.idVigneto
            order by MAXINT DESC
            LIMIT 1))";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
function Quarta_query($conn){
    $sql="SELECT v.nome as nomevino,c.nome as nomecantina,p.anno,p.quantità
    FROM possiede p
    INNER JOIN vino v on p.idV=v.idV
    INNER JOIN cantina c on p.idCantina=c.idCantina
    order by p.quantità desc;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
function Quinta_query($conn){
    $sql="SELECT DISTINCT vigv.nome
    FROM vino vv
    INNER JOIN compone cv on vv.idV=cv.idV
    INNER JOIN vitigno vitv on cv.idVitigno=vitv.idVitigno
    INNER JOIN vigneto vigv on vitv.idVigneto=vigv.idVigneto
    where vv.idV in (SELECT tabella.codVino
    FROM (SELECT v.idV as codVino
    FROM vino v
    INNER JOIN compone c on v.idV=c.idV
    INNER JOIN vitigno vit on c.idVitigno=vit.idVitigno
    INNER JOIN vigneto vig on vit.idVigneto=vig.idVigneto  
    GROUP BY v.nome,vig.nome) as tabella  
    GROUP BY tabella.codVino
    HAVING COUNT(*)=1);";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
?>