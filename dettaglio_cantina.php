<?php
$pagina="cantine";  
?>

<?php
include('session_check.php');
include('header_inc.php');

$id= intval($_GET['idCantina']);


$conn= db_connect();
$result = info_cantina($conn,$id);

$row = $result->fetch_all(MYSQLI_ASSOC);

$nome=$row[0]['nome'];
$comune=$row[0]['comune'];
$coord=$row[0]['coordinate'];
$desc=$row[0]['descrizione'];
$copertina=$row[0]['path'];
/*DA FINIRE, NICO AGGIUNGI IMG AL DB PER FAVORE*/ 
$conn-> close();
?>




<link rel="stylesheet" href="style/styleDettaglioCantina.css">


<link rel="stylesheet" href=" style/styleDettagli.css">

<div>

	<div class="grid product">
		<div class="column-xs-12 column-md-7">
			<div class="product-gallery">
			<div class="product-image">
				<img class="active" src="<?=$copertina?>">
			</div>
			<ul class="image-list">
				<?php foreach($row as $image){?>
				<li class="image-item"><img src="<?=$image["path"]?>"></li>
				<?php }?>
			</ul>
			</div>
		</div>
			<div class="column-xs-12 column-md-5">
				<h1><?=$nome?></h1>
				<div class="description">
				<p style="padding-bottom: 30px; font-size: 1.2em;" class="pt-5"><?=$desc?></p>
			</div>
		</div>
	</div>
	
	<div class="mapouter">
            <div class="gmap_canvas">

                <?php
                // <!-- ---------------------------------------------------------------------------------- -->
                // <!-- ---TRASFORMAZIONE DELEL COORDINATE NEL FORMATO ACCETTATO DALL EMBED GOOGLE MAP---- -->
                // <!-- ---------------------------------------------------------------------------------- -->
                ?>
                <?php
                    // $splitted_coord=explode(" ",$coord);
					// print_r($splitted_coord);
					print_r(str_replace('°','%C2%B0',$coord));
					$coord=str_replace('°','%C2%B0',$coord);
					$coord=str_replace(' ','',$coord);
					$coord=str_replace(' ','',$coord);


                    $splitted_coord[0]=explode("°",$splitted_coord[0]);
                    $splitted_coord[1]=explode("°",$splitted_coord[1]);
                    
					// echo $coord;
                ?>

                <?php
                // <!-- ---------------------------------------------------------------------------------- -->
                // <!-- ----------------------------EMBED GOOGLE MAP-------------------------------------- -->
                // <!-- ---------------------------------------------------------------------------------- -->
                ?>
                <div class="border rounded m-auto my-3" style="max-width: 600px;">
                    <iframe width="600" height="450" id="gmap_canvas" 
                        src="https://maps.google.com/maps?q=<?=$coord?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="p-2">
                    </iframe>
					
                </div>
            </div>
        </div>
</div>



    <?php include('_footer_inc.php');?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionDettaglioCantina.js"></script>
<script>
		const activeImage = document.querySelector(".product-image .active");
	const productImages = document.querySelectorAll(".image-list img");
	const navItem = document.querySelector('a.toggle-nav');

	function changeImage(e) {
	activeImage.src = e.target.src;
	}

	function toggleNavigation(){
	this.nextElementSibling.classList.toggle('active');
	}

	productImages.forEach(image => image.addEventListener("click", changeImage));
	navItem.addEventListener('click', toggleNavigation);
	</script>
