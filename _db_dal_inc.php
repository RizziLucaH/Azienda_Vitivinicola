<?php

require('_config.inc.php');

function db_connect()
{

    global $servername, $username, $password, $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function new_user($conn,$signup_nome,$email,$signup_piva,$signup_indirizzo,$psw){

    $signup_nome=$conn->real_escape_string($signup_nome);
    $email=$conn->real_escape_string($email);
    $signup_piva=$conn->real_escape_string($signup_piva);
    $signup_indirizzo=$conn->real_escape_string($signup_indirizzo);
    $psw=$conn->real_escape_string($psw);


    $hash=password_hash($psw, PASSWORD_BCRYPT);
    $sql="INSERT INTO utenteprivato (mail, password, nomecompleto, iva, indirizzofatturazione) VALUES ('$email', '$hash', '$signup_nome', '$signup_piva', '$signup_indirizzo')";
    return $conn->query($sql);
}

function verifica_user($conn,$mail,$password){
    $mail=$conn->real_escape_string($mail);
    $password=$conn->real_escape_string($password);

    $sql="SELECT * FROM utenteprivato where mail like '$mail' ";
    $result=$conn->query($sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            if(password_verify($password,$row['password']))
            {
                return $row;
            }
        }
    }
}

?>