<?php 
require('_db_dal_inc.php');
require('_config_inc.php');


//---Connessione al database---
$conn=db_connect();


//---Valori del form---
$Nome=$_POST['nomeazienda'];
$indirizzo=$_POST['indirizzo'];
$data=$_POST['data'];
$numero=$_POST['numero'];
$bottiglie=$_POST['bottiglie'];

//---Richiamo la funzione---
nuova_richiesta($conn,$Nome,$bottiglie,$numero);

header("location: confermaprenotazione.php");


?>