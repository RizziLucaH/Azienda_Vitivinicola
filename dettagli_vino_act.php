<?php 
include('session_check.php');

$conn=db_connect();
$id=intval($_GET['idB']);

aggiungi_carello($conn,$_SESSION['id'],$id);

header("Location: dettagli_vino.php?idB=$id")


?>