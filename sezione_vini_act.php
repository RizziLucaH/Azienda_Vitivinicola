<?php
require("_config_inc.php");
require("_db_dal_inc.php");

//stato di un tipo di vino es. in arrivo, compra ora
//array contenente le più opzioni spuntate
$stato=$_POST['stato'];

//intervallo di prezzo es. 10€ - 69€
//array di lunghezza d2 contenente i deu valori
$prezzo = $_POST['prezzo'];

//quantità disponibile es. rosso,spumante,bianco...
//SOLO DI ESEMPIO PERCHE PER ORA NON ABBIAMO UNA QUANTITA DISPONIBILE
$quantita = $_POST['quantita'];

//tipo di vino es. rosso,spumante,bianco...
//array contenente le più opzioni spuntate
$tipo = $_POST['tipo'];


$conn=db_connect();


// QUERY PER TUTTE LE COMBINAZIONI DI FILTRO


$conn->close();

?>

