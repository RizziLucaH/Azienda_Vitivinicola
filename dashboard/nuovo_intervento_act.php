<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$idvigneto=$_GET['idvigneto'];
$TipoIntervento=$_POST['tipo'];
$DataIntervento=$_POST['data'];
$NomeProdotto=$_POST['prodotto'];


$NomeVigneto=$_GET['vigneto'];


nuovo_intervento($conn,$TipoIntervento,$DataIntervento,$NomeProdotto,$idvigneto);
header("location: dettagliovigneto.php?id=$idvigneto&vigneto=$NomeVigneto");




?>
