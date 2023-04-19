<?php
require('_config_inc.php');
require('_db_dal_inc.php');
$conn=db_connect();

$idB= intval($_GET['idB']);
$idUP= intval($_GET['idUP']);

aggiungi_carello($conn,$idUP,$idB);

header("location: dettagli_vino.php?idB=$idB");
?>