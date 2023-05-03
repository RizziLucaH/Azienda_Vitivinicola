<?php
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$visite=seleziona_visite($conn);
#region Pagination
$data = array();
while ($row = $visite->fetch_assoc()) {
    $data[] = $row;
}
$perPage = 10;
$groups = array_chunk($data, $perPage);
#endregion
?>
<?php include('header_dashboard.php');?>

        <h1>Visite</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">

        <form>
            <table id="tablevisite" class="table  table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Data di visita</th>
                        <th>Numero Partecipanti</th>
                        <th>Cantina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($visite as $row){?>
                        <tr>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['cognome']?></td>
                            <td><?=$row['data']?></td>
                            <td><?=$row['numeropartecipanti']?></td>
                            <td><?=$row['nomecantina']?></td>
                        </tr>
                    <?php }?>
                </tbody>
                
            </table>
            <button id="prevBtn" class="btn" style="background-color:#ccac00">Precedente</button>
            <button id="nextBtn" class="btn" style="background-color:#ccac00">Successivo</button>
        </form>
    </div>
</body>
</html>

<?php
function seleziona_visite($conn)
{
    $sql="SELECT v.nome,v.cognome,p.numeropartecipanti,c.nome as nomecantina,vi.data from visitatore v INNER JOIN partecipa p on v.idVisitatore=p.idVisitatore INNER JOIN visita_onav vi on p.idVisita=vi.idVisita INNER join cantina c on vi.idCantina=c.idCantina;";
    $result=$conn->query($sql);
    return $result;
}
?>


<script>
var currentPage = 0;
var groups = <?php echo json_encode($groups); ?>;

function displayData() {
    var tableBody = document.querySelector('#tablevisite tbody');
    tableBody.innerHTML = '';
    var currentPageData = groups[currentPage];
    for (var i=0; i<currentPageData.length; i++) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = currentPageData[i].nome;
        row.insertCell().textContent = currentPageData[i].cognome;
        row.insertCell().textContent = currentPageData[i].data;
        row.insertCell().textContent = currentPageData[i].numeropartecipanti;
        row.insertCell().textContent = currentPageData[i].nomecantina;
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


