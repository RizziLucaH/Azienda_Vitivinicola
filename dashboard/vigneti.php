<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color: #ebebeb;">

    <!--Side Navbar-->
    <div class="sidebar">
        <ul style="padding-left: 20px;">
            <li style="list-style-type: none;">
                <div class="logo"><img src="../img/LOGO_scritta_oro.png" alt="error"></div>
            </li>
            <!-- <hr style="border:1px solid #ccac00"> -->
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="dashboard.php">
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="vendite.php">
                    <span class="text">Vendite</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="visite.php">
                    <span class="text">Visite</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="vigneti.php">
                    <span class="text">Vigneti</span>
                </a>
            </li>
        </ul>
    </div>
    <!---Sidebar di log out-->
    <div class="bottom-0 start-0 LOsidebar">
        <!-- <button class="btnLO">LOG OUT</button> -->

    </div>

<?php  
require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$rows=seleziona_vigneti($conn);
?>

    <!--Content-->
    <div class="content" style="padding-right: 5%;">

        <h1>Vigneti</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">
        <div class="row">
            <div class="col-2">
                <div class="filtracard">
                    <h6>Vitigno</h6>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Nebbiolo</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Chardonnay</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Turbiana</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Malvasia</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Cabernet franc</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Merlot</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Gewurztraminer</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Pinot bianco</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Riesling</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Sauvignon</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Lagrein</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Moscato d'Alessandria</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Cabernet Sauvignon</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Sangiovese</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Ortrugo</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Bonarda</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Trebbiano</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Pinot nero</label>
					<br>
                    <input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Montepulciano</label>
					<br>

                </div>
            </div>
            <div class="col-10">
            <table class="table table-hover table-responsive">
                    <tr>
                        <th>Nome</th>
                        <th>Comune</th>
                        <th>Estensione(km^2)</th>
                    </tr>
                    <?php foreach($rows as $row){?>

                            <tr>
                                <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['nome']?></a></td>
                                <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['comune']?></a></td>
                                <td><a style="text-decoration:none; color:black; display:block;" href="dettagliovigneto.php?id=<?=$row['idVigneto']?>&vigneto=<?=$row['nome']?>"><?=$row['estensione']?></a></td>
                            </tr>

                    <?php }?>
                </table>
            </div>
        </div>
        
    </div>

    
</body>

</html>



<?php
function seleziona_vigneti($conn){
    $sql="SELECT * from vigneto";
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    function customRange(){
  // $('input[type="range"]').next('output').css('border','1px solid red');
};

jQuery('input[type="range"]').on('input', function() {
//  console.log( $(this).val() );
    var thisInput = $(this),
        thisInputValue = thisInput.val(),
        thisInputOutput = thisInput.next("output");
//console.log( thisInputValue );
thisInputOutput.text( thisInputValue );
thisInputOutput.css( 'left', thisInputValue + '%');
});
</script>



