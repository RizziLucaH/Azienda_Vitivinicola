<?php 
$pagina="Prodotti chimici";
include('../session_check.php');
$conn=db_connect();
?>

<?php
if(verifica_session_admin($conn,$_SESSION['mail']??0)) {
    include('header_dashboard.php');
    $prodotti=seleziona_prodottichimici($conn);

#region Alert
$alert=$_GET['a'];
if($alert==0)
{
    echo "<script type='text/javascript'>alert('Prodotto già esistente!');</script>";
}
else if($alert==1){
    echo "<script type='text/javascript'>alert('Prodotto inserito!');</script>";

}
#endregion


#region Pagination
$data = array();
while ($row = $prodotti->fetch_assoc()) {
    $data[] = $row;
}
$perPage = 10;
$groups = array_chunk($data, $perPage);
#endregion
?>


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
                        <form action="nuovo_prodottochimico_act.php" method="post" class="form">
                            <div class="mb-3">
                                <label for="nome">Nome del prodotto</label>
                                <input type="text" class="form-control" required style="background-color: #F0F0F0" name="prodotto">
                            </div>
                            <div class="mb-3">
                                <label for="nome">Principio attivo</label>
                                <input type="text" class="form-control" required style="background-color: #F0F0F0" name="principio">
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
<?php 
    }else{
        header("location: ../login_admin.php");
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
