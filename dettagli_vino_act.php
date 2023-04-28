<?php 
include('session_check.php');

$conn=db_connect();
$idB=intval($_GET['idB']);
$idUP= $_SESSION['id'];

$result=sel_bottiglie_carrello($conn,$idUP);
if($result==null){
    if(in_array($idB, $result[0])){
        echo "eccomi";
        update_carrello($conn,$idUP,$idB);
    }
    else{
        aggiungi_carello($conn,$idUP,$idB);
    }
    
}
else{
    aggiungi_carello($conn,$idUP,$idB);
}


//header("Location: dettagli_vino.php?idB=$idB")


?>