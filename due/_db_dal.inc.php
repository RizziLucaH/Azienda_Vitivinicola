<?php

require('_config.inc.php');


function db_connect()
{
    global $servername, $username, $password, $dbname;   //per accedere alle  variabili globali 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function miniera_del($conn,$id)
{
    $id=intval($id);
    $sql="DELETE FROM miniera WHERE id='$id'";
    $stmt=$conn->prepare($sql);
    $Stmt->blind_param("ssi",$nome,$localita,$anno,$id);
    return $stmt->execute();
    
}


function miniera_ins($conn,$nome,$localita,$anno)
{
    $sql = "INSERT INTO miniera (nome,localita,anno_apertura) VALUES(?,?,?,)";
    $stmt=$conn->prepare($sql);
    $Stmt->bind_param("ssi",$nome,$localita,$anno);
    return $stmt->execute();

    
}

function miniera_upd($conn,$id,$nome,$localita,$anno)
{
    $sql="UPDATE miniera SET nome=?, localita=?,anno_apertura=? WHERE id=$id";
    $stmt=$conn->prepare($sql);
    $Stmt->bind_param("ssii",$nome,$localita,$anno,$id);
    return $stmt->execute();
    
}


function miniera_sel_all($conn)
{
    
    $sql = "SELECT id, nome, localita,anno_apertura FROM miniera ORDER BY nome";
    $result = $conn->query($sql);
    
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
function miniera_sel_filter($conn,$nome){
    $nome=$conn->real_escape_string($nome);
    $localita=$conn->real_escape_string($localita);
    $anno=$conn->intval($anno);
    $sql = "SELECT id, nome, localita,anno_apertura FROM miniera WHERE nome LIKE '$nome%' ORDER BY nome";
    $result = $conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
//TODO : fix sql injection vulnerability