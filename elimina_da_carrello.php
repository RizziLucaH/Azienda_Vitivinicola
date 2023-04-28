<?php
include('session_check.php');

$conn=db_connect();
$idB=intval($_GET['idB']);
$idUP= $_SESSION['id'];

remove_carrello($conn,$idB);

header("Location: carrello.php");
?>