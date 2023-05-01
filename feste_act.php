<?php 
require('_db_dal_inc.php');
require('_config_inc.php');


//---Connessione al database---
$conn=db_connect();


//---Valori del form---
$Nome=$_POST['nome'];
$Cognome=$_POST['cognome'];
$Telefono=$_POST['telefono'];
$Mail=$_POST['mail'];
$Data=$_POST['data'];
$Partecipanti=$_POST['partecipanti'];
$Cantina=$_POST['cantina'];


//---Richiamo la funzione---
prenotazione_festa($conn,$Nome,$Cognome,$Data,$Mail,$Cantina,$Telefono);

header("location: confermaprenotazione.php");


?>