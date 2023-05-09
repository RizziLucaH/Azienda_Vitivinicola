<?php 
include('session_check.php');
$conn=db_connect();

if(verifica_session($conn,$_SESSION['id']??0)) {

    $conn=db_connect();
    $idB=intval($_GET['idB']);
    $idUP= $_SESSION['id'];
    
    $result=sel_bottiglie_carrello($conn,$idUP);
    if(!empty($result)){
        if(in_array($idB, $result[0])){
            update_carrello($conn,$idUP,$idB);
        }
        else{
            aggiungi_carello($conn,$idUP,$idB);
        }
        
    }
    else{
        aggiungi_carello($conn,$idUP,$idB);
    }
    
    
    header("Location: dettagli_vino.php?idB=$idB");

}else{
    header("Location: login.php");

}    


?>