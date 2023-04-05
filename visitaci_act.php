<?php 
require('_db_dal_inc.php');
require('_config_inc.php');


//---Connessione al database---
$conn=db_connect();


//---Valori del form---
$NomeVisitatore=$_POST['nomevisitatore'];

$CognomeVisitatore=$_POST['cognomevisitatore'];
$DataNascita=$_POST['datanascita'];
$MailVisitatore=$_POST['mailvisitatore'];
$DataVisita=$_POST['datavisita'];
$OrarioVisita=$_POST['orariovisita'];
$Partecipanti=$_POST['partecipanti'];
$Cantina=$_POST['cantina'];


//---Richiamo la funzione---
prenotazione_visita($conn,$NomeVisitatore,$CognomeVisitatore,$DataNascita,$MailVisitatore,$DataVisita,$OrarioVisita,$Cantina,$Partecipanti);

header("location: confermaprenotazione.php");


?>