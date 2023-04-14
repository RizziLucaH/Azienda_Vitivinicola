<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();

$TipoIntervento=$_POST['tipo'];
$DataIntervento=$_POST['data'];
$NomeProdotto=$_POST['prodotto'];
$PrincipioAttivo=$_POST['principioattivo'];



?>



<?php
function insert_intervento(){
    $sql="";
    $result=$conn->query($sql);
}


?>