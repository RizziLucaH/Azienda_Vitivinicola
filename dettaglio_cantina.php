<?php
$pagina="cantine";  
?>

<?php
include('session_check.php');
include('header_inc.php');

$id= intval($_GET['idCantina']);


$conn= db_connect();
$result = info_cantina($conn,$id);

$row = $result->fetch_assoc();

$nome=$row['nome'];
$comune=$row['comune'];
$coord=$row['coordinate'];
$desc=$row['descrizione'];
$path=$row['path'];
/*DA FINIRE, NICO AGGIUNGI IMG AL DB PER FAVORE*/ 
$conn-> close();
?>




<link rel="stylesheet" href="style/styleDettaglioCantina.css">

    <header>     
        <!-- Home begins-->       
        <div id="home-page" class="container-fluid" style="background-image: <?=$path?> ;">
        </div><!-- home-page ends -->                
    </header>
    <!-- about section starts -->
    <section id="about-page" class="container-fluid">       
        <div class="row">
            <div class="col-sm-12 text-center">
            <h1 class="headings"><?=$nome?></h1>
            <hr class="section-hr">
            </div>
            <div class="col-sm-8 text-center">
                <p><?=$desc?></p>
            </div>
            <div id="image-presentation-box" class="col-sm-4">
            <div class="col-md-12 col-sm-12">
                <img id="image-presentation" class="img-fluid" src="https://68.media.tumblr.com/be770cca5a5497719d71b649d79c8ff7/tumblr_opdz68x6Js1woo9z4o1_400.jpg" alt="Juan Lunar in El ateneo Buenos Aires - Argentina">    
            </div>
            </div><!-- picture presentation ends -->
        </div><!-- row ends -->      
    </section>
    <?php include('_footer_inc.php');?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionDettaglioCantina.js"></script>
