<?php 
$idVigneto=$_GET['id'];
$NomeVigneto=$_GET['vigneto'];
$pagina=$NomeVigneto;
include('../session_check.php');
$conn=db_connect();
?>
<?php
if(verifica_session_admin($conn,$_SESSION['mail']??0)) {
    include('header_dashboard.php');
    $interventi=seleziona_interventi($conn,$idVigneto);
    $vitigni=select_vitigno($conn,$idVigneto);
    $prodotti=select_prodottichimici($conn);
    //chart
    $output=array();
    $output=fill_chart($conn,$idVigneto);
    $sistemico=$output[0];
    $contatto=$output[1];
    $citotropico=$output[2];
?>
        <h1><?=$NomeVigneto?></h1>
        <hr class="posth1" style="border-color: #ffd900;">
        <h3>Interventi effettuati</h3>
        <br>
        <div class="row row-cols-2"> 
            <div class="col-7">
                <table class="table table-hover table-responsive">
                    <tr>
                        <th>Tipo di intervento</th>
                        <th>Data</th>
                        <th>Nome del prodotto utilizzato</th>
                        <th>Principio attivo del prodotto</th>
                    </tr>
                    <?php foreach($interventi as $row){?>
                        <tr>
                            <td><?=$row['tipo']?></td>
                            <td><?=$row['data']?></td>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['principioattivo']?></td>
                        </tr>
                    <?php }?>
                </table>
                <button  id=""class="btn" style="background-color: #ccac00" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuovointervento">
                    Nuovo Intervento
                </button>
                <br>
                <br>
                <form  method="post" action="elimina_vitigno_act.php?&id=<?=$idVigneto?>&vigneto=<?=$NomeVigneto?>" >
                    <h3>Vitigni coltivati</h3>
                    <hr class="posth1" style="border-color: #ffd900; width:300px">
                    <table class="table table-hover table-responsive" style="width:300px; margin-bottom:20px;">
                            <tr>
                                
                                <th>Vitigno</th>
                            </tr>
                            <?php foreach($vitigni as $row){?>
                                <tr data-id="<?=$row['idVitigno']?>">
                                    <td><input type="checkbox" name="" data-idvigneto="<?=$idVigneto?>" data-idvitigno="<?=$row['idVitigno']?>" class="checkbox"> <?=$row['uva']?></td>
                                </tr>
                                <input type='hidden' name="vitigno" value=" <?php echo $row['idVitigno'];?> " /> 
                            <?php }?>
                    </table>
                    <button class="btn" style="background-color: #ccac00" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuovovitigno">
                        Nuovo Vitigno
                    </button>
                    
                    <button class="btn btn-danger" id="bottoneelimina"  style="margin-left :35px;" onclick="elimina_checkbox()">Elimina Vitigno</button>
                </form>
                </div>
            <div class="col-4" style="width: 600px; height: 600px;" >
                <canvas id="myChart"></canvas>
            </div>
        </div>



<!-- Modal nuovo intervento -->
    <div class="modal fade" id="nuovointervento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuovo intervento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="nuovo_intervento_act.php?idvigneto=<?=$idVigneto?>&vigneto=<?=$NomeVigneto?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipo di intervento</label>
                            <select id="" class="form-control" id="tipo" placeholder="Tipo di intervento" name="tipo">
                                <option value="Sistemico">Sistemico</option>
                                <option value="Contatto">Contatto</option>
                                <option value="Citotropico">Citotropico</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Data </label>
                            <input type="date" class="form-control" id="data" name="data">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome del prodotto utilizzato</label>
                            <select id="" class="form-control" id="prodotto" placeholder="Inserisci il prodotto utilizzato" name="prodotto">
                                <option value=""></option>
                            <?php foreach($prodotti as $row){?>
                                        <option value="<?=$row['nome']?>" name="prodotto"><?=$row['nome']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background-color: #ccac00">Salva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!---Modal nuovo vitigno -->
<div class="modal fade" id="nuovovitigno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuovo Vitigno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
            <form method="post" action="nuovo_vitigno_act.php?&id=<?=$idVigneto?>&vigneto=<?=$NomeVigneto?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Uva</label>
                    <input type="text" class="form-control" name="uva" id="tipo" aria-describedby="emailHelp" placeholder="Inserisci il tipo di uva" >
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color: #ccac00">Salva</button>
                </div>
            </form>
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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var sistemico="<?php echo $sistemico; ?>";
    var contatto="<?php echo $contatto; ?>";
    var citotropico="<?php echo $citotropico; ?>";

    const ctx=document.getElementById("myChart");
    new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Sistemico', 'Contatto', 'Citotropico'],
        datasets: [{
        data: [sistemico,contatto, citotropico],
        borderWidth: 1,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
    ],
    hoverOffset: 4

        }]
    },
    });
</script>
