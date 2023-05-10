<?php 
require('_db_dal_inc.php');
require('_config_inc.php');


//---Connessione al database---
$conn=db_connect();


//---Valori del form---
$MailTicket=$_POST['mailticket'];
$TipoRichiesta=$_POST['tiporichiesta'];
$Oggetto=$_POST['oggetto'];
$Descrizione=$_POST['descrizione'];

//---Richiamo la funzione---
apri_ticket($conn,$MailTicket,$TipoRichiesta,$Oggetto,$Descrizione);

header("location: confermaprenotazione.php");


?>