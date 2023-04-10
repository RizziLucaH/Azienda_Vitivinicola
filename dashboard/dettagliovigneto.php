<?php
$idVigneto=$_GET['id'];
$NomeVigneto=$_GET['vigneto']

?>
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
$interventi=seleziona_interventi($conn,$idVigneto);
$output=array();
$output=fill_chart($conn,$idVigneto);
$sistemico=$output[0];
$contatto=$output[1];
$citotropico=$output[2];

?>
    <!--Content-->
    <div class="content" style="padding-right: 5%;">

        <h1><?=$NomeVigneto?></h1>

        <hr class="posth1" style="border-color: #ffd900;">

        <div class="row"> 
            <div class="col">
            <table class="table table-hover table-responsive">
            <tr>
                <th>Tipo di intervento</th>
                <th>Data</th>
                <th>Nome del prodotto utilizzato</th>
                <th>Principio attivo del prodotto</th>
            </tr>
            <?php foreach($interventi as $row){?>
                <tr>
                    <td><?=$row['tipo']?></td>
                    <td><?=$row['data']?></td>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['principioattivo']?></td>
                </tr>
            <?php }?>
        </table>
            </div>
            <div class="col" style="width: 600px; height: 600px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    

    </div>

    
</body>
</html>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var sistemico="<?php echo $sistemico; ?>";
    var contatto="<?php echo $contatto; ?>";
    var citotropico="<?php echo $citotropico; ?>";

    const ctx=document.getElementById("myChart");
    new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Sistemico', 'Contatto', 'Citotropico'],
        datasets: [{
        data: [sistemico,contatto, citotropico],
        borderWidth: 1,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
    ],
    hoverOffset: 4

        }]
    },
    });
</script>


<?php

function seleziona_interventi($conn,$idVigneto){
    $sql="SELECT i.tipo, i.data, p.nome, p.principioattivo FROM intervento i inner join prodottochimico p on i.idP=p.idP where idVigneto=$idVigneto";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


function fill_chart($conn,$idVigneto){
    $output=array();
    $sql="SELECT COUNT(*) as count from intervento where idVigneto=$idVigneto and tipo like 'sistemico'";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $countsistemico=$rows['count'];
    $output[0]=$countsistemico;


    $sql="SELECT COUNT(*) as count from intervento where idVigneto=$idVigneto and tipo like 'contatto'";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $countcontatto=$rows['count'];
    $output[1]=$countcontatto;

    $sql="SELECT COUNT(*) as count from intervento where idVigneto=$idVigneto and tipo like 'citotropico'";
    $result=$conn->query($sql);
    $rows=$result->fetch_assoc();
    $countcitotropico=$rows['count'];
    $output[2]=$countcitotropico;

    return $output;
    

}
?>

