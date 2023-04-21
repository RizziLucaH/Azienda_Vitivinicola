<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();

$TipoIntervento=$_POST['tipo'];
$DataIntervento=$_POST['data'];
$NomeProdotto=$_POST['prodotto'];
$PrincipioAttivo=$_POST['principioattivo'];

Nuovo_intervento($conn,$TipoIntervento,$DataIntervento,$NomeProdotto,$PrincipioAttivo);

?>