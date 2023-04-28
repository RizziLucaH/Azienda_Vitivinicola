<?php
$pagina="cantine";

?>

<?php
include('session_check.php');
include('header_inc.php');

$conn=db_connect();
$result=info_cantine($conn);
?>

<!-- Card cantina -->
<link rel="stylesheet/less" type="text/css" href=" style/styleCantine.less" />
<script src="https://cdn.jsdelivr.net/npm/less" ></script>
<!-- -------------------------------------------------------------------------------------- -->



	<div>
		<h1 class="title">Le Nostre Cantine</h1>
		<div class="slider" x-data="{start: true, end: false}">
			<div class="slider__content" x-ref="slider" x-on:scroll.debounce="prova()">
				<?php while($row=$result->fetch_assoc()){?> 
					<div class="slider__item">
					<img class="slider__image" src=" img/Cantine/BG1.jpg" alt="Image">
					<div class="slider__info">
						<a style="text-decoration: none;" href="dettaglio_cantina.php?idCantina=<?=$row['id']?>" class="h4"><?=$row['nome'] ?></a>
					</div>
					</div>
				<?php
				}?>
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
	
	<?php include('_footer_inc.php');?>
