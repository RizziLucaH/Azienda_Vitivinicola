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

<body>

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
                <a href="vendite.php">
                    <span class="text">Vendite</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="visite.php">
                    <span class="text">Visite</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="vigneti.php">
                    <span class="text">Vigneti</span>
                </a>
            </li>
        </ul>
    </div>
    <!---Sidebar di log out-->
    <div class="LOsidebar position-absolute bottom-0 start-0">
        <!-- <button class="btnLO">LOG OUT</button> -->

    </div>

    <!--Content-->
    <?php
    require('../_db_dal_inc.php');
    require('../_config_inc.php');
    
    $conn=db_connect();
    $success=Certificazioni_si($conn);
    $nosuccess=Certificazioni_no($conn);

    ?>
    <div class="content" style="padding-right: 5%;">
        <h1>Certificazioni</h1>
        <hr class="posth1" style="border-color: #ffd900;">

        <div class="row">
            <div class="col">
                <h5>Certificazioni andate a buon fine</h5>
                <table class="table table-success">
                        <tr>
                            <th>Vino</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    <?php foreach($success as $row){?>
                        <tr>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['tipo']?></td>
                            <td><?=$row['data']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
            <div class="col">
                <h5>Certificazioni non andate a buon fine</h5>
                <table class="table table-danger">
                <tr>
                            <th>Vino</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    <?php foreach($nosuccess as $row){?>
                        <tr>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['tipo']?></td>
                            <td><?=$row['data']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>

    </div>

    
</body>

</html>





<?php
function Certificazioni_si($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


function Certificazioni_no($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=0;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}




?>

