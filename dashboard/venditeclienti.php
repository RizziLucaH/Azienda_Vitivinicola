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
    <div class="content" style="padding-right: 5%;">

        <h1>Vendite</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">

            <div class="row">
                <div class="col-7">
                    <table class="table  table-hover table-responsive">
                        <tr>
                            <th>Nome e cognome</th>
                            <th>Mail</th>
                            <th>Indirizzo di fatturazione</th>
                            <th>IVA</th>
                        </tr>
                        <tr>
                            <td>Mario Rossi</td>
                            <td>mario@gmail.com</td>   
                            <td>via pippo</td>
                            <td>4829482482</td>             
                        </tr>
                    </table>
                </div>
                <div class="col-4"><canvas id="graficovendite" style="width: 400px; height: 400px; margin-left:100px;"></canvas></div>
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

