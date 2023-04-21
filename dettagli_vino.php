<!--DA MODIFICARE GRAFICAMENTE AD ESEMPIO IL BOTTONE E IL TESTO DI FIANCO ALLE IMMAGINI-->
<?php
require('_config_inc.php');
require('_db_dal_inc.php');

$id= intval($_GET['idB']);

$conn=db_connect();

/*DISPLAY DELLE INFO*/
$sql= "SELECT B.nomevino as nomevino, B.prezzo as prezzo, B.descrizione as descrizione, 
B.gradoalcolico as gradoalcolico, B.annoproduzione as annoproduzione, V.profumo as profumo, V.gusto as gusto, V.retrogusto as retrogusto,
V.tannino as tannino, V.colore as colore, V.temperatura as temperatura FROM bottiglia B 
join vino V on V.idV=B.idV 
WHERE idB='$id'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
$nome=$row['nomevino'];
$prezzo=$row['prezzo'];
$desc=$row['descrizione'];
$grado=$row['gradoalcolico'];
$anno=$row['annoproduzione'];
$profumo=$row['profumo'];
$gusto=$row['gusto'];
$retrogusto=$row['retrogusto'];
$tannino=$row['tannino'];
$colore=$row['colore'];
$temperatura=$row['temperatura'];

$conn->close();

include('_header_inc.php');

?>
<link rel="stylesheet" href=" style/styleDettagli.css">

    <!-- CONTENT -->
		<div class="grid product">
		<div class="column-xs-12 column-md-7">
			<div class="product-gallery">
			<div class="product-image">
				<img class="active" src="https://source.unsplash.com/W1yjvf5idqA">
			</div>
			<ul class="image-list">
				<li class="image-item"><img src="https://source.unsplash.com/W1yjvf5idqA"></li>
				<li class="image-item"><img src="https://source.unsplash.com/VgbUxvW3gS4"></li>
				<li class="image-item"><img src="https://source.unsplash.com/5WbYFH0kf_8"></li>
			</ul>
			</div>
		</div>
		<div class="column-xs-12 column-md-5">
			<h1><?=$nome?></h1>
			<h2 style="text-align: center; padding-top:10px"><?=$prezzo?> €</h2>
			<div class="description">
			<p style="padding-bottom: 30px;"><?=$desc?></p>
		</div>
		<button class="add-to-cart" style="margin:auto; display:block;" onclick="AggiungiAlCarrello()">AGGIUNGI AL CARRELLO</button>
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