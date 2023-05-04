<!--DA MODIFICARE GRAFICAMENTE (RITOCCHI O RIFARE)-->

<?php
$pagina="dettagli_utente";
include('session_check.php');
$conn=db_connect();


?>

<?php
if(verifica_session($conn,$_SESSION['id']??0)) {
    include('header_inc.php');
    $id=$_SESSION['id'];
    
    $row=sel_dettagli_utente($conn,$id);
    $nome=$row['nomecompleto'];
    $email= $row['mail'];
    $piva=$row['iva'];
    $indirizzo=$row['indirizzofatturazione'];

    $ordini=ordini_utente($conn,$id);
    // $idOrdine=$ordini['idVendita'];
    // $tipoPacco=$ordini['tipopacco'];
    // $numeroBottiglie=$ordini['numerobottiglie'];
    // $data=$ordini['data'];

?>
    <link rel="stylesheet" href="style/styleUtente.css">

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <table style="border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td>Nome</td>
                            <td>:</td>
                            <td><?= $nome ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $email ?></td>
                        </tr>
                        <tr>
                            <td>Indirizzo</td>
                            <td>:</td>
                            <td><input type="text" value="<?= $indirizzo ?>"></td>
                        </tr>
                        <tr>
                            <td>P.Iva</td>
                            <td>:</td>
                            <td><input type="text" value="<?= $piva ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="text" value="" > <button class="warning">Cambia</button></td>
                        </tr>
                    </tbody>
                </table>
                <a type="button" href="logout.php" class="btn btn-danger">Esci</a>
            </div>
        </div>

        <!-- <h2>SOCIAL MEDIA</h2> -->
        <div class="card">
            <div class="card-body">

                <h3>I tuoi ordini</h3>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Numero Ordine</th>
                        <th scope="col">Tipo Pacco</th>
                        <th scope="col">Numero Bottiglia</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($rowO=$ordini->fetch_assoc()){?> 
                            <tr>
                            <th><?=$rowO['idVendita'] ?></th>
                            <td><?=$rowO['tipopacco'] ?></td>
                            <td><?=$rowO['numerobottiglie'] ?></td>
                            <td><?=$rowO['prezzoingrosso'] ?>€</td>
                            <td><?=$rowO['data'] ?></td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                    </table>

            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src="js/function.js"></script>
    <script src="js/functionBottiglia.js"></script>
    <script src="js/functionSezioneVini2.js"></script>

    <?php 
    include('_footer_inc.php');
    }else{
        header("location: login.php");
    }
    ?>
