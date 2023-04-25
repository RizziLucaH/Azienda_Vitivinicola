<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$idvigneto=$_GET['idvigneto'];
$TipoIntervento=$_POST['tipo'];
$DataIntervento=$_POST['data'];
$NomeProdotto=$_POST['prodotto'];


nuovo_intervento($conn,$TipoIntervento,$DataIntervento,$NomeProdotto,$idvigneto);

?>