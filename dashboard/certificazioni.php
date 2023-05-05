<?php include('header_dashboard.php');?>
<?php
$conn=db_connect();
$success=Certificazioni_si($conn);
$nosuccess=Certificazioni_no($conn);

#region Pagination cert_si
$datasi = array();
while ($row = $success->fetch_assoc()) {
    $datasi[] = $row;
}
$perPage = 15;
$groupsi = array_chunk($datasi, $perPage);
#endregion
#region Pagination no
$datano = array();
while ($row = $nosuccess->fetch_assoc()) {
    $datano[] = $row;
}
$groupno = array_chunk($datano, $perPage);
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
                <button id="prevBtno" class="btn" style="background-color:#ccac00">Precedente</button>
                <button id="nextBtno" class="btn" style="background-color:#ccac00">Successivo</button>
            </div>
        </div>

    </div>

    
</body>

</html>

<script>
var currentPage = 0;
var groupsi = <?php echo json_encode($groupsi); ?>;

function displayData() {
    var tableBody = document.querySelector('#tablecertsi tbody');
    tableBody.innerHTML = '';
    var currentPageData = groupsi[currentPage];
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
    if (currentPage < groupsi.length - 1) {
    currentPage++;
    displayData();
    }
});


var currentPageno = 0;
var groupno = <?php echo json_encode($groupno); ?>;

function displayDatano() {
    var tableBody = document.querySelector('#tablecertno tbody');
    tableBody.innerHTML = '';
    var currentPageData = groupno[currentPageno];
    for (var i=0; i<currentPageData.length; i++) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = currentPageData[i].nome;
        row.insertCell().textContent = currentPageData[i].tipo;
        row.insertCell().textContent = currentPageData[i].data;

    }
}

displayDatano();

document.querySelector('#prevBtno').addEventListener('click', function() {
    if (currentPageno > 0) {
    currentPageno--;
    displayDatano();
    }
});

document.querySelector('#nextBtno').addEventListener('click', function() {
    if (currentPageno < groupno.length - 1) {
    currentPageno++;
    displayDatano();
    }
});
</script>

