<?php
require("_config_inc.php");
require("_db_dal_inc.php");


$email=$_POST['email'];
$psw = $_POST['psw'];

$conn=db_connect();


$result=verifica_admin($conn,$email,$psw);
if(empty($result))
{
    
    new_admin($conn,$email,$psw);
    header("location: login_admin.php");
}
else
{
    // SE è GIUSTO AVVIA LA SESSION, CONSENTENDO COSI DI ACCEDERE ALLE PAGINE PRIVATE
    session_start();
    $_SESSION['id'] = $result['idA'];
    
    header("location: dashboard/dashboard.php");
}


$conn->close();

?>

