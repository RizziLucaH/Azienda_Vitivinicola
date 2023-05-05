<?php
require("_config_inc.php");
require("_db_dal_inc.php");


$email=$_POST['email'];
$psw = $_POST['psw'];
// print_r($email);
$conn=db_connect();


$result=verifica_admin($conn,$email,$psw);
// // print_r($result);
// // echo "ciao";

if(empty($result))
{
    header("location: login_admin.php");
}
else
{
    // SE è GIUSTO AVVIA LA SESSION, CONSENTENDO COSI DI ACCEDERE ALLE PAGINE PRIVATE
    session_start();
    $_SESSION['mail'] = $result['mail'];
    
    header("location: dashboard/dashboard.php");
}
// if(empty($result))
// {
//     header("location: login_admin.php");
// }
// else
// {
//     // SE è GIUSTO AVVIA LA SESSION, CONSENTENDO COSI DI ACCEDERE ALLE PAGINE PRIVATE
//     session_start();
//     $_SESSION['mail'] = $result['mail'];
    
//     header("location: dashboard/dashboard.php");
// }


$conn->close();

?>

