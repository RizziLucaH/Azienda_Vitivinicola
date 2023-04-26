<?php include('header_dashboard.php');?>
<?php
    require('../_db_dal_inc.php');
    require('../_config_inc.php');
    
    $conn=db_connect();
    $success=Certificazioni_si($conn);
    $nosuccess=Certificazioni_no($conn);

    ?>
        <h1>Certificazioni</h1>
        <hr class="posth1" style="border-color: #ffd900;">

        <div class="row">
            <div class="col">
                <h5>Certificazioni andate a buon fine</h5>
                <table class="table table-success">
                        <tr>
                            <th>Vino</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    <?php foreach($success as $row){?>
                        <tr>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['tipo']?></td>
                            <td><?=$row['data']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
            <div class="col">
                <h5>Certificazioni non andate a buon fine</h5>
                <table class="table table-danger">
                <tr>
                            <th>Vino</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    <?php foreach($nosuccess as $row){?>
                        <tr>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['tipo']?></td>
                            <td><?=$row['data']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>

    </div>

    
</body>

</html>



<!--Content-->


<?php
function Certificazioni_si($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=1;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


function Certificazioni_no($conn){
    $sql="SELECT c.tipo, c.data, v.nome from certificazione c INNER join vino v on c.idV=v.idV where idoneo=0;";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}




?>

