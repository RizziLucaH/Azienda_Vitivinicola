<?php 
require('../_db_dal_inc.php');
require('../_config_inc.php');

$ProdottoChimico=$_POST['prodotto'];
$PrincipioAttivo=$_POST['principio'];

$conn=db_connect();
$result=nuovo_prod_chimico($conn,$ProdottoChimico,$PrincipioAttivo);

if($result==0)//se è 0 il prodotto è gia presente
{
    header("location: prodottichimici.php?a=0");
}else if($result==1)
{
    header("location: prodottichimici.php?a=1");
}

