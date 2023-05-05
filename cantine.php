<?php
$pagina="cantine";

//avvio session, require _db_dal_inc.php, avvio _config_inc.php
include('session_check.php');

include('header_inc.php');

$conn=db_connect();

//estrazione nomi e path immagini delle cantine
$result=info_cantine($conn);
?>

<link rel="stylesheet/less" type="text/css" href=" style/styleCantine.less" />

<?php // CARD CANTINE ?>
	<div>
		<h1 class="title">Le Nostre Cantine</h1>
		<div class="slider" x-data="{start: true, end: false}">
			<div class="slider__content" x-ref="slider" x-on:scroll.debounce="prova()">
				<?php while($row=$result->fetch_assoc()){?> 
					<div class="slider__item">
						
						<?php //immagine cantina ?>
						<img class="slider__image" src="<?=$row['path']?>" alt="Image">

						<?php //nome cantina ?>
						<div class="slider__info">
							<a style="text-decoration: none;" href="dettaglio_cantina.php?idCantina=<?=$row['id']?>" class="h4"><?=$row['nome'] ?></a>
						</div>
					</div>
					<?php
				}?>
			</div>
		</div>
	</div>

<?php //aggiunta script ?>
<script src="https://cdn.jsdelivr.net/npm/less" ></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionBottiglia.js"></script>

<?php include('_footer_inc.php');?>
