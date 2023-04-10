<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color: #ebebeb;">

    <!--Side Navbar-->
    <div class="sidebar">
        <ul style="padding-left: 20px;">
            <li style="list-style-type: none;">
                <div class="logo"><img src="../img/LOGO_scritta_oro.png" alt="error"></div>
            </li>
            <!-- <hr style="border:1px solid #ccac00"> -->
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="dashboard.php">
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="vendite.html">
                    <span class="text">Vendite</span>
                </a>
            </li>
            <hr class="separatore">
        </ul>
    </div>
    <!---Sidebar di log out-->
    <div class="LOsidebar position-absolute bottom-0 start-0">
        <!-- <button class="btnLO">LOG OUT</button> -->

    </div>

<?php  
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$rows=seleziona_vigneti($conn);
?>

    <!--Content-->
    <div class="content" style="padding-right: 5%;">

        <h1>Vigneti</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">

        <table class="table table-hover table-responsive">
            <tr>
                <th>Nome</th>
                <th>Comune</th>
                <th>Estensione(km^2)</th>
            </tr>
            <?php foreach($rows as $row){?>

                    <tr>
                        <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['nome']?></a></td>
                        <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['comune']?></a></td>
                        <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['estensione']?></a></td>
                    </tr>

            <?php }?>
        </table>
    </div>

    
</body>

</html>



<?php
function seleziona_vigneti($conn){
    $sql="SELECT * from vigneto";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


?>

