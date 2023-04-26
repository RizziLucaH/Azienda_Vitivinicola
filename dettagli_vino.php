<!--DA MODIFICARE GRAFICAMENTE AD ESEMPIO IL BOTTONE E IL TESTO DI FIANCO ALLE IMMAGINI-->
<?php

include('session_check.php');
include('header_inc.php');


$id=intval($_GET['idB']);

$conn=db_connect();


$result = info_vino($conn,$id);

$rows = $result->fetch_all(MYSQLI_ASSOC);
$nome=$rows[0]['nomevino'];
$prezzo=$rows[0]['prezzo'];
$desc=$rows[0]['descrizione'];
$grado=$rows[0]['gradoalcolico'];
$anno=$rows[0]['annoproduzione'];
$profumo=$rows[0]['profumo'];
$gusto=$rows[0]['gusto'];
$retrogusto=$rows[0]['retrogusto'];
$tannino=$rows[0]['tannino'];
$colore=$rows[0]['colore'];
$temperatura=$rows[0]['temperatura'];
$principale=$rows[0]['path'];


?>
<link rel="stylesheet" href=" style/styleDettagli.css">

    <!-- CONTENT -->
		<div class="grid product">
		<div class="column-xs-12 column-md-7">
			<div class="product-gallery">
			<div class="product-image">
				<img class="active" src="<?=$principale?>">
			</div>
			<ul class="image-list">
				<?php foreach($rows as $image){?>
				<li class="image-item"><img src="<?=$image["path"]?>"></li>
				<?php }?>
			</ul>
			</div>
		</div>
		<div class="column-xs-12 column-md-5">
			<h1><?=$nome?></h1>
			<h2 style="text-align: center; padding-top:10px"><?=$prezzo?> €</h2>
			<div class="description">
			<p style="padding-bottom: 30px;"><?=$desc?></p>
		</div>
		<a href="dettagli_vino_act.php?idB=<?=$id?> ">
		<button class="add-to-cart" style="margin:auto; display:block;">AGGIUNGI AL CARRELLO</button>
		</a>
		</div>
		</div>
	<div class="grid related-products">
		<div class="column-xs-12">
			<h3 style="text-align: center;">Scheda Tecnica</h3>
		</div>
		<div class="column-xs-12 column-md-6 border">
			<h4 style="text-align: center;">Grado Alcolico</h4>
			<p><?=$grado?>°</p>
		</div>
		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Anno Produzione</h4>
			<p><?=$anno?></p>
		</div>

		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Profumo</h4>
			<p><?=$profumo?></p>
		</div>

		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Gusto</h4>
		<p><?=$gusto?></p>
		</div>
		
		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Retrogusto</h4>
			<p><?=$retrogusto?></p>
		</div>

		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Tannino</h4>
			<p><?=$tannino?></p>
		</div>

		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Colore</h4>
			<p><?=$colore?></p>
		</div>

		<div class="column-xs-12 column-md-6 border">
			<h4  style="text-align: center;">Temperatura</h4>
			<p><?=$temperatura?>°</p>
		</div>

	</div>
		</main>
<?php include ('_footer_inc.php');?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionBottiglia.js"></script>
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

</body>
</html>