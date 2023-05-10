<?php 
$pagina="Visite";
include('../session_check.php');
$conn=db_connect();
?>

<?php
if(verifica_session_admin($conn,$_SESSION['mail']??0)) {
    include('header_dashboard.php');
    $ticket=seleziona_ticket($conn);
    #region Pagination
    $data = array();
    while ($row = $ticket->fetch_assoc()) {
        $data[] = $row;
    }
    $perPage = 10;
    $groups = array_chunk($data, $perPage);
    #endregion
?>


        <h1>Ticket clienti</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">

        <form>
            <table id="tableticket" class="table  table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Richiesta</th>
                        <th>Oggetto</th>
                        <th>Descrizione</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ticket as $row){?>
                        <tr>
                            <td><?=$row['mail']?></td>
                            <td><?=$row['tipo']?></td>
                            <td><?=$row['oggetto']?></td>
                            <td><?=$row['desrizione']?></td>
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
    }else{
        header("location: ../login_admin.php");
    }
    ?>

<script>
var currentPage = 0;
var groups = <?php echo json_encode($groups); ?>;

function displayData() {
    var tableBody = document.querySelector('#tableticket tbody');
    tableBody.innerHTML = '';
    var currentPageData = groups[currentPage];
    for (var i=0; i<currentPageData.length; i++) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = currentPageData[i].mail;
        row.insertCell().textContent = currentPageData[i].tipo;
        row.insertCell().textContent = currentPageData[i].oggetto;
        row.insertCell().textContent = currentPageData[i].descrizione;
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


