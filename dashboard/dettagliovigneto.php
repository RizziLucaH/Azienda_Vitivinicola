<?php
$idVigneto=$_GET['id'];
$NomeVigneto=$_GET['vigneto']


//aggiungere un insert per nuovi interventi o un nuovo vigneto
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="LOsidebar  bottom-0 start-0">
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

$vitigni=select_vitigno($conn,$idVigneto)

?>
    <!--Content-->
    <div class="content" style="padding-right: 5%;">

        <h1><?=$NomeVigneto?></h1>

        <hr class="posth1" style="border-color: #ffd900;">
        <h3>Interventi effettuati</h3>
        <br>
        <div class="row row-cols-2"> 
            <div class="col-7">
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
                <button  id=""class="btn" style="background-color: #ccac00" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuovointervento">
                    Nuovo Intervento
                </button>
                <br>
                <br>
                <h3>Vitigni coltivati</h3>
                <hr class="posth1" style="border-color: #ffd900; width:300px">
                <table class="table table-hover table-responsive" style="width:300px">
                        <tr>
                            <th>Vitigno</th>
                        </tr>
                        <?php foreach($vitigni as $row){?>
                            <tr>
                                <td><?=$row['uva']?></td>

                            </tr>
                        <?php }?>
                </table>
                <br>
                <button class="btn" style="background-color: #ccac00" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuovovitigno">
                    Nuovo Vitigno
                </button>
            </div>
            <div class="col-4" style="width: 600px; height: 600px;" >
                <canvas id="myChart"></canvas>
            </div>
        </div>
            


<!-- Modal nuovo intervento -->
    <div class="modal fade" id="nuovointervento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuovo intervento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
            <form  method="post" action="nuovo_intervento_act.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tipo di intervento</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" aria-describedby="emailHelp" placeholder="Inserisci il tipo di intervento">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Data </label>
                    <input type="date" class="form-control" id="data" name="data">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome del prodotto utilizzato</label>
                    <input type="text" class="form-control" id="prodotto" placeholder="Inserisci il prodotto utilizzato" name="prodotto">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Principio attivo del prodotto</label>
                    <input type="text" class="form-control" id="principioattivo" name="principioattivo" placeholder="Inserisci il principio attivo del prodotto" >
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color: #ccac00">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---Modal nuovo vitigno -->
<div class="modal fade" id="nuovovitigno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuovo Vitigno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
            <form method="post" action="nuovo_vitigno_act.php?id=<?=$idVigneto?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Uva</label>
                    <input type="text" class="form-control" name="uva" id="tipo" aria-describedby="emailHelp" placeholder="Inserisci il tipo di uva" >
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color: #ccac00">Salva</button>
                </div>
            </form>
        </div>
    </div>











    </div>

    
</body>
</html>




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

function select_vitigno($conn,$idVigneto){
    $sql="SELECT v.uva from vitigno v where v.idVigneto=$idVigneto;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
?>

