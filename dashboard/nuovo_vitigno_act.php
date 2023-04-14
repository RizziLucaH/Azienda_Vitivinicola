<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$idVigneto=$_GET['id'];
$Uva=ucfirst($_POST['uva']);
$NomeVigneto=select_nome_Vigneto($conn,$idVigneto);

insert_vitigno($conn,$Uva,$idVigneto);

header("location: dettagliovigneto.php?id=$idVigneto?vigneto=$NomeVigneto");


?>

<?php
function select_nome_Vigneto($conn,$idv){
    $cercanomecant="SELECT v.nome from vigneto v WHERE idVigneto=$idv;";
    $res=$conn->query($cercanomecant);
    $row=$res->fetch_assoc();
    $idCantina=$row['nome'];
    return $idCantina;
}
function insert_vitigno($conn,$uva,$idv){
    $sql="INSERT INTO `vitigno`(`uva`, `idVigneto`) VALUES ('$uva','$idv')";
    $result=$conn->query($sql);
}
?>