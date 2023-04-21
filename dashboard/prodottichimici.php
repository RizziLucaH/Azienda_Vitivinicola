<?php
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();

$prodotti=seleziona_prodottichimici($conn);

$data = array();
while ($row = $prodotti->fetch_assoc()) {
    $data[] = $row;
}
$perPage = 10;
$groups = array_chunk($data, $perPage);

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
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="prodottichimici.php">
                    <span class="text">Prodotti chimici</span>
                </a>
            </li>
        </ul>
    </div>
    <!---Sidebar di log out-->
    <div class="LOsidebar bottom-0 start-0">
        <!-- <button class="btnLO">LOG OUT</button> -->

    </div>

    <!--Content-->
    <div class="content" style="padding-right: 5%;">


        <h1>Prodotti chimici</h1>
        <hr class="posth1" style="border-color: #ffd900;">
        <div class="row">
            <div class="col">
                <table id="tableprodotti" class="table table-responsive" style="width:600px">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Principio attivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($prodotti as $row){?>
                            <tr>
                                <td><?=$row['nome']?></td>
                                <td><?=$row['principioattivo']?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                    <button id="prevBtn" class="btn" style="background-color:#ccac00">Precedente</button>
                    <button id="nextBtn" class="btn" style="background-color:#ccac00">Successivo</button>
            </div>
            <div class="col">
                <h3 style="margin-bottom :20px;">Nuovo prodotto chimico</h3>
                <div class="card" style="background-color: #F7F7F7F7">
                    <div class="card-body">
                        <form action="nuovo_prodottochimico.php" method="post" class="form">
                            <div class="mb-3">
                                <label for="nome">Nome del prodotto</label>
                                <input type="text" class="form-control" required style="background-color: #F0F0F0">
                            </div>
                            <div class="mb-3">
                                <label for="nome">Principio attivo</label>
                                <input type="text" class="form-control" required style="background-color: #F0F0F0">
                            </div>
                            <button type="submit" class="btn" style="background-color: #ccac00">Aggiungi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var privati=50;
    var aziende=50;

    const ctx=document.getElementById("graficovendite");
    new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Privati', 'Aziende'],
        datasets: [{
        data: [privati,aziende],
        borderWidth: 1,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)'
    ],
    hoverOffset: 4

        }]
    },
    });
</script>


<?php
function seleziona_prodottichimici($conn){
    $sql="SELECT p.nome, p.principioattivo FROM prodottochimico p;";
    $result=$conn->query($sql);
    return $result;
}


?>
<script>
var currentPage = 0;
var groups = <?php echo json_encode($groups); ?>;

function displayData() {
    var tableBody = document.querySelector('#tableprodotti tbody');
    tableBody.innerHTML = '';
    var currentPageData = groups[currentPage];
    for (var i=0; i<currentPageData.length; i++) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = currentPageData[i].nome;
        row.insertCell().textContent = currentPageData[i].principioattivo;
    }
}

displayData();

document.querySelector('#prevBtn').addEventListener('click', function() {
    if (currentPage > 0) {
    currentPage--;
    displayData();
    }
});

document.querySelector('#nextBtn').addEventListener('click', function() {
    if (currentPage < groups.length - 1) {
    currentPage++;
    displayData();
    }
});
</script>
