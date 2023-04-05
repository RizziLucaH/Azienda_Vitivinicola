<?php
$pagina="cantine";
?>

<?php include('header_inc.php');?>

<!-- LINK AGGIUNTIVI -->
<link rel="stylesheet" href=" style/styleBottiglia2.css">

<!-- Card cantina -->
<link rel="stylesheet/less" type="text/css" href=" style/styleCantine.less" />
<script src="https://cdn.jsdelivr.net/npm/less" ></script>
<!-- -------------------------------------------------------------------------------------- -->



	<div >
<!-- 
		DA SISTEMARE

		pulsanti avanti e indietro -->
		<h1 class="title">Le Nostre Cantine</h1>
		<div class="slider" x-data="{start: true, end: false}">
			<div class="slider__content" x-ref="slider" x-on:scroll.debounce="prova()">
				<div class="slider__item">
				<img class="slider__image" src=" img/Cantine/BG1.jpg" alt="Image">
				<div class="slider__info">
					<a href="dettaglio_cantina.php" class="h4">Cantina 1</a>
				</div>
				</div>
				<div class="slider__item">
				<img class="slider__image" src=" img/Cantine/BG2.jpg" alt="Image">
				<div class="slider__info">
					<a href="dettaglio_cantina.php" class="h4">Cantina 2</a>
				</div>
				</div>
				<div class="slider__item">
				<img class="slider__image" src=" img/Cantine/BG3.jpg " alt="Image">
				<div class="slider__info">
					<a href="dettaglio_cantina.php" class="h4">Cantina 3</a>
				</div>
				</div>
				<div class="slider__item">
				<img class="slider__image" src=" img/Cantine/BG4.jpg" alt="Image">
				<div class="slider__info">
					<a href="dettaglio_cantina.php" class="h4">Cantina 4</a>
				</div>
				</div>
				<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/cantina_pantelleria.jpg" alt="Image">
					<div class="slider__info">
						<a href="dettaglio_cantina.php" class="h4">Cantina 5</a>
					</div>
				</div>
				<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/BG1.jpg" alt="Image">
					<div class="slider__info">
						<a href="dettaglio_cantina.php" class="h4">Cantina 6</a>
					</div>
				</div>
				<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/BG2.jpg " alt="Image">
					<div class="slider__info">
						<a href="dettaglio_cantina.php" class="h4">Cantina 7</a>
					</div>
				</div>
				<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/BG3.jpg" alt="Image">
					<div class="slider__info">
						<a href="dettaglio_cantina.php" class="h4">Cantina 8</a>
					</div>
				</div>
				<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/BG4.jpg" alt="Image">
					<div class="slider__info">
						<a href="dettaglio_cantina.php" class="h4">Cantina 9</a>
					</div>
				</div>
				<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/cantina_pantelleria.jpg" alt="Image">
					<div class="slider__info">
						<a href="dettaglio_cantina.php" class="h4">Cantina 10</a>
					</div>
				</div>
				<div class="slider__item">
				<img class="slider__image" src=" img/Cantine/BG1.jpg" alt="Image">
				<div class="slider__info">
					<a href="dettaglio_cantina.php" class="h4">Cantina 11</a>
				</div>
				</div>
			</div>
			<!-- <div class="slider__nav">
				<button class="slider__nav__button" x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth * -1, behavior: 'smooth'});" x-bind:class="start ? '' : 'slider__nav__button--active'">Previous</button>
				<button class="slider__nav__button" x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth, behavior: 'smooth'});" x-bind:class="end ? '' : 'slider__nav__button--active'">Next</button>
			</div> -->
		</div>
    </div>







	</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionBottiglia.js"></script>

</body>
</html>