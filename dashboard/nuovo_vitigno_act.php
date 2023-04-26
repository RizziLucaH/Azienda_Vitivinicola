<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$idVigneto=$_GET['id'];

$NomeVigneto=$_GET['vigneto'];

//---Prima lettera sempre maiuscola---
$Uva=ucfirst($_POST['uva']);



insert_vitigno($conn,$Uva,$idVigneto);

header("location: dettagliovigneto.php?id=$idVigneto&vigneto=$NomeVigneto");


?>

<?php

function insert_vitigno($conn,$uva,$idv){
    $sql="INSERT INTO `vitigno`(`uva`, `idVigneto`) VALUES ('$uva','$idv')";
    $result=$conn->query($sql);
}
?>