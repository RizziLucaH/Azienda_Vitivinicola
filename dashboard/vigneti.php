<?php 
$pagina="Vigneti";
include('../session_check.php');
$conn=db_connect();
?>

<?php
if(verifica_session_admin($conn,$_SESSION['mail']??0)) {
    include('header_dashboard.php');
    $vigneti=seleziona_vigneti($conn);

    $data = array();
    while ($row = $vigneti->fetch_assoc()) {
        $data[] = $row;
    }
    $perPage = 10;
    $groups = array_chunk($data, $perPage);
?>

        <h1>Vigneti</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">
        <div class="row">
        <table id="tablevigneti" class="table table-hover table-responsive table-list" data-currentpage="1" >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Comune</th>
                            <th>Estensione(Hm^2)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($vigneti as $row){?>
                        <tr>
                            <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['nome']?></a></td>
                            <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['comune']?></a></td>
                            <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['estensione']?></a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
        </div>
        
    </div>
</body>
</html>
<?php 
    }else{
        header("location: ../login_admin.php");
    }
    ?>







