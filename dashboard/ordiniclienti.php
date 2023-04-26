<?php include('header_dashboard.php');

require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$clienti=select_clienti($conn);

$data = array();
while ($row = $clienti->fetch_assoc()) {
    $data[] = $row;
}
$perPage = 10;
$groups = array_chunk($data, $perPage);

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


<?php
function select_clienti($conn){
    $sql="SELECT c.nomecompleto,c.mail,c.iva,c.indirizzofatturazione FROM utenteprivato c;";
    $result=$conn->query($sql);
    return $result;
}
?>