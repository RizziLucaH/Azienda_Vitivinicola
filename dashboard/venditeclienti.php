<?php  

require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$vendite=vendite_clienti($conn);

$dati_chart=count_vini($conn);
$valore_rossi=$dati_chart[0];
$valore_bianchi=$dati_chart[1];
$valore_spumanti=$dati_chart[2];
$valore_vinidolci=$dati_chart[3];
$valore_grappe=$dati_chart[4];
?>


<?php include('header_dashboard.php');?>

        <h1>Vendite</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">

            <div class="row">
                <div class="col-7">
                <div class="input-group mb-3" >
					<span class="input-group-text" style="border-radius: 10px 0 0 10px ;" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input id="cerca" type="text" class="form-control" style="border-radius: 0 10px 10px 0;" placeholder="Cerca" aria-label="Cerca" aria-describedby="basic-addon1">
				</div>
                    <table class="table  table-hover table-responsive" id="vendite">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Numero bottiglie</th>
                                <th>Data</th>
                                <th>Prodotto</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($vendite as $row){?>
                            <tr>
                                <td id="nome"><?=$row['nome']?></td>
                                <td><?=$row['numero']?></td>
                                <td><?=$row['data']?></td>
                                <td><?=$row['nomevino']?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-4"><canvas id="graficovendite" style="width: 400px; height: 400px; margin-left:100px;"></canvas></div>
            </div>
        
    </div>

    
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var rossi="<?php echo $valore_rossi; ?>";
    var bianchi="<?php echo $valore_bianchi; ?>";
    var spumanti="<?php echo $valore_spumanti; ?>";
    var vinidolci="<?php echo $valore_vinidolci; ?>";
    var grappe="<?php echo $valore_grappe; ?>";

    const ctx=document.getElementById("graficovendite");
    new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Rossi', 'Bianchi','Spumanti','Vini dolci','Grappe'],
        datasets: [{
        data: [rossi,bianchi,spumanti,vinidolci,grappe],
        borderWidth: 1,
        backgroundColor: [
            'rgb(189, 47, 73)',
            'rgb(230, 222, 124)',
            'rgb(245, 217, 39)',
            'rgb(204, 149, 53)',
            'rgb(212, 205, 195)'
    ],
    hoverOffset: 4

        }]
    },
    });
</script>

<script>
    $(document).ready(function() {
        $('#cerca').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#vendite tbody tr').filter(function() {
            return $(this).find('td:first-child').text().toLowerCase().indexOf(value) > -1;
        }).show();
        $('#vendite tbody tr').not(function() {
            return $(this).find('td:first-child').text().toLowerCase().indexOf(value) > -1;
        }).hide();
    });
});
</script>






