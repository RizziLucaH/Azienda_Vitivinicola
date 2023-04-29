<?php include('header_dashboard.php');

require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$clienti=select_clienti($conn);

#region Pagination
$data = array();
while ($row = $clienti->fetch_assoc()) {
    $data[] = $row;
}
$perPage = 10;
$groups = array_chunk($data, $perPage);
#endregion

$output=array();
$output=fill_chart_clienti($conn);
$privati=$output[0];
$aziende=$output[1];
?>

<h1>Clienti</h1>
<hr class="posth1" style="border-color: #ffd900;">

<div class="row">
    <div class="col-8">
        <table id="tableclienti" class="table table-responsive">
            <thead>
                <tr>
                    <th>Nome e Cognome</th>
                    <th>Mail</th>
                    <th>IVA</th>
                    <th>Indirizzo di fatturazione</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clienti as $row){?>
                    <tr>
                        <td><?=$row['nomecompleto']?></td>
                        <td><?=$row['mail']?></td>
                        <td><?=$row['iva']?></td>
                        <td><?=$row['indirizzofatturazione']?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <button id="prevBtn" class="btn" style="background-color:#ccac00">Precedente</button>
        <button id="nextBtn" class="btn" style="background-color:#ccac00">Successivo</button>
    </div>
    <div class="col-4">
        <canvas id="myChart"></canvas>
    </div>
</div>


<script>
var currentPage = 0;
var groups = <?php echo json_encode($groups); ?>;

function displayData() {
    var tableBody = document.querySelector('#tableclienti tbody');
    tableBody.innerHTML = '';
    var currentPageData = groups[currentPage];
    for (var i=0; i<currentPageData.length; i++) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = currentPageData[i].nomecompleto;
        row.insertCell().textContent = currentPageData[i].mail;
        row.insertCell().textContent = currentPageData[i].iva;
        row.insertCell().textContent = currentPageData[i].indirizzofatturazione;
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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var privati="<?php echo $privati; ?>";
    var aziende="<?php echo $aziende; ?>";
    const ctx=document.getElementById("myChart");
    new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Privati', 'aziende'],
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
function select_clienti($conn){
    $sql="SELECT c.nomecompleto,c.mail,c.iva,c.indirizzofatturazione FROM utenteprivato c;";
    $result=$conn->query($sql);
    return $result;
}


function fill_chart_clienti($conn)
{
    $output=array();
    $sqlPrivati="SELECT count(*) as count from utenteprivato where iva is null;";
    $resultPrivati=$conn->query($sqlPrivati);
    $rowsPrivati=$resultPrivati->fetch_assoc();
    $countPrivati=$rowsPrivati['count'];
    $output[0]=$countPrivati;

    $sqlAziende="SELECT count(*) as count from utenteprivato where iva is not null;";
    $resultAziende=$conn->query($sqlAziende);
    $rowsAziende=$resultAziende->fetch_assoc();
    $countAziende=$rowsAziende['count'];
    $output[1]=$countAziende;

    return $output;
}

?>