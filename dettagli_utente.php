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
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr>
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
