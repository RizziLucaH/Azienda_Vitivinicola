<?php
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();

$idvitigno=$_POST['vitigno'];
$idvigneto=$_GET['id'];
$nomevigneto=$_GET['vigneto'];




rimuovi_vitigno($conn,$idvitigno,$idvigneto);

header("location: dettagliovigneto.php?id=$idvigneto&vigneto=$nomevigneto");


    
function rimuovi_vitigno($conn,$idVitigno,$idVigneto){
    $sql="DELETE from vitigno where idVitigno=$idVitigno and idVigneto=$idVigneto";
    $result=$conn->query($sql);
}
