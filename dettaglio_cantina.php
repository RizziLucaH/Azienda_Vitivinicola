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
$conn-> close();
?>




<link rel="stylesheet" href="style/styleDettaglioCantina.css">


<link rel="stylesheet" href=" style/styleDettagli.css">

<div>
<?php //DISPLAY INFO ?>
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
					// TRASFORMAZIONE IN VERSIONE DECIMALE DELLE COORDINATE
                    $splitted_coord=explode(" ",$coord);
					// print_r($splitted_coord[0]);
					// echo "<br />";
                    $tmp=explode("°",$splitted_coord[0]);
					$deg1=$tmp[0];
					// print_r($deg1);
					// echo "<br />";

                    $tmp=explode("'",$tmp[1]);
					$min1=$tmp[0];
					// print_r($min1);
					// echo "<br />";

                    $tmp=explode("\"",$tmp[1]);
					$sec1=$tmp[0];
					// print_r($sec1);
					// echo "<br />";
				
                    $coordinate1=$deg1+((($min1*60)+($sec1))/3600);
					// print_r($coordinate1);

					// TRASFORMAZIONE IN VERSIONE DECIMALE DELLE COORDINATE
					
					// print_r($splitted_coord[1]);
					// echo "<br />";
					$tmp=explode("°",$splitted_coord[1]);
					$deg2=$tmp[0];
					// print_r($deg2);
					// echo "<br />";

					$tmp=explode("'",$tmp[1]);
					$min2=$tmp[0];
					// print_r($min2);
					// echo "<br />";

					$tmp=explode("\"",$tmp[1]);
					$sec2=$tmp[0];
					// print_r($sec2);
					// echo "<br />";
				
					$coordinate2=$deg2+((($min2*60)+($sec2))/3600);
					// print_r($coordinate2);
                ?>

                <?php
                // <!-- ---------------------------------------------------------------------------------- -->
                // <!-- ----------------------------EMBED GOOGLE MAP-------------------------------------- -->
                // <!-- ---------------------------------------------------------------------------------- -->
                ?>
                <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?= $coordinate1?>,<?= $coordinate2?>+(<?=$nome?>)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe></div>
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
