<?php
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();

$vitigno=$_POST['vitigno'];
$vigneto=$_POST['vigneto'];


$NomeVigneto=select_nome_Vigneto($conn,$vigneto);

rimuovi_vitigno($conn,$vitigno,$vigneto);

header("location: dettagliovigneto.php?id=$vigneto&vigneto=$NomeVigneto");


    
function rimuovi_vitigno($conn,$idVitigno,$idVigneto){
    $sql="DELETE from vitigno where idVitigno=$idVitigno and idVigneto=$idVigneto";
    $result=$conn->query($sql);
}

function select_nome_Vigneto($conn,$idv){
    $cercanome="SELECT v.nome from vigneto v WHERE idVigneto=$idv;";
    $res=$conn->query($cercanome);
    $row=$res->fetch_all(MYSQLI_ASSOC);
    $Nome=$row['nome'];
    return $Nome;
}