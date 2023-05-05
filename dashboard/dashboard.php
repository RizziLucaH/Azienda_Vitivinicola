<?php 
$pagina="Admin - Dashboard";
include('../session_check.php');
$conn=db_connect();
?>

<?php
if(verifica_session_admin($conn,$_SESSION['mail']??0)) {
    include('header_dashboard.php');
    // $id=$_SESSION['id'];
    $Prima_query=Prima_query($conn);
    $Seconda_query=Seconda_query($conn);
    $Terza_query=Terza_query($conn);
    $Quarta_query=Quarta_query($conn);
    $Quinta_query=Quinta_query($conn);
?>
        <div class="row">
          <div class="col-4">
            <div class="card">
              <h3>Prima Query</h3>
              <table class="table">
                <thead>
                  <th>Nome Cantina</th>
                </thead>
                <tbody>
                  <?php foreach($Prima_query as $row){?>
                    <tr>
                        <td><?=$row['nome']?></td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <h3>Seconda Query</h3>
              <table class="table">
                <thead>
                  <th>idVigneto</th>
                  <th>Nome</th>
                </thead>
                <tbody>
                <?php foreach($Seconda_query as $row){?>
                        <tr>
                            <td><?=$row['idVigneto']?></td>
                            <td><?=$row['nome']?></td>
                        </tr>
                    <?php }?>
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="col-4">
            <div class="card">
              <h3>Terza Query</h3>
              <table class="table">
              <thead>
                  <th>Nome</th>
                </thead>
                <tbody>
                  <?php foreach($Terza_query as $row){?>
                    <tr>
                        <td><?=$row['nome']?></td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-6 statisticadashboard" >
            <div class="card">
                <h3>Quarta Query</h3>
                <div class="scrolltable">
                  <table class="table">
                    <thead>
                      <th>Nome Vino</th>
                      <th>Nome Cantina</th>
                      <th>Anno</th>
                      <th>Quantità</th>
                    </thead>
                    <tbody>
                      <?php foreach($Quarta_query as $row){?>
                        <tr>
                            <td><?=$row['nomevino']?></td>
                            <td><?=$row['nomecantina']?></td>
                            <td><?=$row['anno']?></td>
                            <td><?=$row['quantità']?></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
          
          <div class="col-6 statisticadashboard" >
            <div class="card">
              <h3>Quinta Query</h3>
                <div class="scrolltable">
                  <table class="table">
                    <thead>
                      <th>Nome Vigneto</th>
                    </thead>
                    <tbody>
                      <?php foreach($Quinta_query as $row){?>
                        <tr>
                            <td><?=$row['nome']?></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


