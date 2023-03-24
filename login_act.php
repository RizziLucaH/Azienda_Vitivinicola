<?php
require("_config_inc.php");
require("_db_dal_inc.php");



if(array_key_exists('signup_nome',$_POST)){
    $signup_nome=ucfirst($_POST['signup_nome']);//converte il primo carattere
    //se non viene passato nessun campo vuol dire che sta cercando di accedere
    if(array_key_exists('signup_piva',$_POST))
    {

        $signup_piva=$_POST['signup_piva'];
        $signup_indirizzo=$_POST['signup_indirizzo'];
    }

}

$email=$_POST['email'];
$psw = $_POST['psw'];

$conn=db_connect();


if(array_key_exists('signup_nome',$_POST))
{
    //SE ESISTE IL NOME L'UTENTE SI STA REGISTRANDO
    new_user($conn,$signup_nome,$email,$signup_piva,$signup_indirizzo,$psw);
    header("location: login.php");
}
else
{
    //SE NON ESISTE IL NOME L'UTENTE STA CERCANDO DI ACCEDERE
    
    $result=verifica_user($conn,$email,$psw);
    if(empty($result))
    {
        //SE è SBAGLAITO RICARICA LA STESSA PAGINA
        header("location: login.php");
    }
    else
    {
        //SE è GIUSTO AVVIA LA SESSION, CONSENTENDO COSI DI ACCEDERE ALLE PAGINE PRIVATE
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['psw'] = $psw;
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['piva'] = $result['piva'];
        // $_SESSION['filtro'] = ' ';
        
        header("location: index.php");
    }
}

$conn->close();

?>

