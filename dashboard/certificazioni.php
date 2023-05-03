<?php include('header_dashboard.php');?>
<?php
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$success=Certificazioni_si($conn);
$nosuccess=Certificazioni_no($conn);+
#region Pagination cert_si
$datasi = array();
while ($row = $success->fetch_assoc()) {
    $datasi[] = $row;
}
$perPage = 10;
$groupsi = array_chunk($data, $perPage);
#endregion
#region Pagination no
$datano = array();
while ($row = $nosuccess->fetch_assoc()) {
    $datano[] = $row;
}
$perPage = 10;
$groupsno = array_chunk($data, $perPage);
#endregion

    ?>
        <h1>Certificazioni</h1>
        <hr class="posth1" style="border-color: #ffd900;">

        <div class="row">
            <div class="col">
                <h5>Certificazioni andate a buon fine</h5>
                <table id="tablecertsi" class="table table-success">
                    <thead>
                        <tr>
                            <th>Vino</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($success as $row){?>
                            <tr>
                                <td><?=$row['nome']?></td>
                                <td><?=$row['tipo']?></td>
                                <td><?=$row['data']?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <button id="prevBtnsi" class="btn" style="background-color:#ccac00">Precedente</button>
                <button id="nextBtnsi" class="btn" style="background-color:#ccac00">Successivo</button>
            </div>
            <div class="col">
                <h5>Certificazioni non andate a buon fine</h5>
                <table id="tablecertno" class="table table-danger">
                    <thead>
                        <tr>
                            <th>Vino</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($nosuccess as $row){?>
                            <tr>
                                <td><?=$row['nome']?></td>
                                <td><?=$row['tipo']?></td>
                                <td><?=$row['data']?></td>
                            </tr>
                        <?php }?>
                    </tbody>
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
    return $result;
}
function Certificazioni_no($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=0;";
    $result=$conn->query($sql);
    return $result;
}
?>
<script>
var currentPage = 0;
var groupsi = <?php echo json_encode($groupsi); ?>;

function displayData() {
    var tableBody = document.querySelector('#tablecertsi tbody');
    tableBody.innerHTML = '';
    var currentPageData = groups[currentPage];
    for (var i=0; i<currentPageData.length; i++) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = currentPageData[i].nome;
        row.insertCell().textContent = currentPageData[i].tipo;
        row.insertCell().textContent = currentPageData[i].data;

    }
}

displayData();

document.querySelector('#prevBtnsi').addEventListener('click', function() {
    if (currentPage > 0) {
    currentPage--;
    displayData();
    }
});

document.querySelector('#nextBtnsi').addEventListener('click', function() {
    if (currentPage < groups.length - 1) {
    currentPage++;
    displayData();
    }
});
</script>

