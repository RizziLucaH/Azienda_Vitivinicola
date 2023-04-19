<?php
$pagina="cantine";
?>

<?php include('header_inc.php');?>



<link rel="stylesheet" href="style/styleDettaglioCantina.css">

<body>

    <header>     
        <!-- Home begins-->       
        <div id="home-page" class="container-fluid">
        </div><!-- home-page ends -->                
    </header>
    <!-- about section starts -->
    <section id="about-page" class="container-fluid">       
        <div class="row">
            <div class="col-sm-12 text-center">
            <h1 class="headings">Nome cantina</h1>
            <hr class="section-hr">
            </div>
            <div class="col-sm-8 text-center">
                <p>descrizione cantina</p>
            </div>
            <div id="image-presentation-box" class="col-sm-4">
            <div class="col-md-12 col-sm-12">
                <img id="image-presentation" class="img-fluid" src="https://68.media.tumblr.com/be770cca5a5497719d71b649d79c8ff7/tumblr_opdz68x6Js1woo9z4o1_400.jpg" alt="Juan Lunar in El ateneo Buenos Aires - Argentina">    
            </div>
            </div><!-- picture presentation ends -->
        </div><!-- row ends -->      
    </section>
</body>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionDettaglioCantina.js"></script>

</body>

<?php include('_footer_inc.php');?>