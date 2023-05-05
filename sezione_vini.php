<?php
$pagina="vini";

include('session_check.php');
include('header_inc.php');

$conn= db_connect();

$tipo=$_GET['tipo'];

/*DISPLAY DEI VINI*/
$result=sel_bottiglie($conn);
?>



<!-- LINK AGGIUNTIVI -->
<link rel="stylesheet" href="style/styleSezioneVini2.css">
<!-- -------------------------------------------------------------------------------------- -->


	<!-- ---------------------------------------------------------------------------------------------------- -->
	<!-- ------------------------------------FILTRA/ORDINA--------------------------------------------------- -->
	<!-- ---------------------------------------------------------------------------------------------------- -->
	
	<div class="container-xl" >
		<hr class="mt-5">
		<div class="row align-items-start">
			<div class="col-3 mt-5 pt-3 filtra">
				
				<!-- ----------------------------------------------------------------- -->
				<!-- ----------------------------PREZZO------------------------------- -->
				<!-- ----------------------------------------------------------------- -->
				<header>
					<h6>Prezzo</h6>
				</header>
				<div class="price-input">
					<div class="field">
					<span>Min</span>
					<input type="number" class="input-min" value="0">
					</div>
					<div class="separator">-</div>
					<div class="field">
					<span>Max</span>
					<input id="sorpresa" type="number" class="input-max" value="269" onkeyup="EasterEgg()">
					</div>
				</div>
				<div class="slider">
					<div class="progress"></div>
				</div>
				<div class="range-input">
					<input id="minimo" type="range" class="" min="0" max="500" value="0" step="1" oninput="FiltraPrezzo()">
					<input id="massimo" type="range" class="" min="0" max="500" value="269" step="1" oninput="FiltraPrezzo()" >
				</div>

				<hr style="border: 1px solid black;">
				

				<!-- ----------------------------------------------------------------- -->
				<!-- --------------------------QUANTITA------------------------------- -->
				<!-- ----------------------------------------------------------------- -->

				<header>
					<h6>Anno Produzione</h6>
				</header>

				<div class="form-check mb-3">
					<input class="form-check-input mt-1" type="text" value="" id="anno" maxlength="4" onkeyup="FiltraAnno()" placeholder="Inserire l'anno desiderato" style="width: 100%; height: 22px;">
				</div>

				<hr style="border: 1px solid black;">


				<!-- ----------------------------------------------------------------- -->
				<!-- --------------------------TIPO----------------------------------- -->
				<!-- ----------------------------------------------------------------- -->

				<header>
					<h6>Tipo</h6>
				</header>

					<div class="form-check mb-3">
	
						<!-- Bianco -->
						<input id="CK_bianco" class="form-check-input mt-0" type="checkbox" value="" <?=($tipo=="bianco" ? "checked" :"") ?> data-tipo="bianco" onclick="FiltraTipo()" >
						<label for="CK_bianco">Bianco</label>
						<br>
	
						<!-- Spumante -->
						<input id="CK_spumante" class="form-check-input mt-0" type="checkbox" value="" <?=($tipo=="spumante" ? "checked" :"") ?> data-tipo="spumante" onclick="FiltraTipo()" >
						<label for="CK_spumante">Spumante</label>
						<br>

						<!-- Rosso -->
						<input id="CK_rosso" class="form-check-input mt-0" type="checkbox" value="" <?=($tipo=="rosso" ? "checked" :"") ?> data-tipo="rosso" onclick="FiltraTipo()" >
						<label for="CK_rosso">Rosso</label>
						<br>

						<!-- Rosé -->
						<input id="CK_rosé" class="form-check-input mt-0" type="checkbox" value="" <?=($tipo=="rosé" ? "checked" :"") ?> data-tipo="rosè" onclick="FiltraTipo()" >
						<label for="CK_rosé">Rosé</label>
						<br>

						<!-- Grappa -->
						<input id="CK_grappa" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" data-tipo="grappa" >
						<label for="CK_grappa">Grappa</label>
						<br>

						<!-- Vino dolce -->
						<input id="CK_passito" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" data-tipo="vino dolce" >
						<label for="CK_passito">Passito</label>
						<br>
						<br>
					</div>
				</div>

			<div class="col-9 mt-5">
				<div class="input-group mb-3" >
					<span class="input-group-text" style="border-radius: 10px 0 0 10px ;" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input id="cerca" type="text" class="form-control" style="border-radius: 0 10px 10px 0;" placeholder="Cerca" aria-label="Cerca" aria-describedby="basic-addon1" oninput="FiltraNome()">
				</div>

				<!-- CARD -->
				
				<div class="row row-cols-1 row-cols-md-3 g-4">
				<?php if($result->num_rows>0){
					while($row=$result->fetch_assoc()){  ?>
							<div class="vini" data-tipoN="<?=$row['tipoN'] ?>" data-tipoS="<?=$row['tipoS'] ?>" data-anno="<?=$row['anno']?>" class="col bottiglia">
								<a style="text-decoration: none;" href="dettagli_vino.php?idB=<?=$row['idB']?>">
									<figure class="card ">
										<!--<img src="img/LineaFrati/4_bot_F.png" alt="">-->
										<img src="<?=$row["path"]?>" alt="">
										<figcaption>
											<p id="nomevino" class="h6 text-dark "><?=$row['nomevino'] ?></p>
											<p id="prezzo" class="text-dark"><?=$row['prezzo'] ?> € </p>
										</figcaption>
									</figure>
								</a>
							</div>
							<?php
					}
					?>
				<?php	}?>
				
				</div>
				
			</div>
			
		</div>

		</div>

		<style>
			.card{
				width: 200px;
				height: 200px;
				display: grid;
				grid-template-rows: 1fr 0;
				transition: grid-template-rows 400ms;
				overflow: hidden;
				background-color: #9e9600;
			}
		
			.card img {
				width: 100%;
				height: 100%;
				object-fit: cover;
		
			}
		
			.card:hover{
				grid-template-rows: 1fr 6rem;
			}
		</style>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src="js/function.js"></script>
<script src="js/functionBottiglia.js"></script>
<script src="js/functionSezioneVini2.js"></script>
<script>
	function FiltraPrezzo(){
		$(document).ready(function(){
			let min=$("#minimo").val();
			let max=$("#massimo").val();
			let arrayP=$("p[id=prezzo]");
			$.each(arrayP,function(index,value){
				let new_val= parseInt($(value).html().replace('€','').trim());

				if(new_val< min || new_val>max){
					$(value).closest("div").css("display","none");
				}
				else{$(value).closest("div").css("display","inline-block");}
				/*console.log(min);
				console.log(max);*/
			})

		});
	}

	function FiltraNome(){
		$(document).ready(function(){
			let arrayN=$("p[id=nomevino]");
			let cerca=$("#cerca").val();

			$.each(arrayN,function(index,value){
				if($(value).html().toLowerCase().indexOf(cerca.toLowerCase())== -1){$(value).closest("div").hide();} else{$(value).closest("div").show();}
			});
		});
	}

	function FiltraTipo(){
			/*vini*/
			let vini=$(".vini");
			/*checkbox*/
			let checked=$("input:checked");
			console.log($(checked));
			$.each(vini,function(index,vino){
				if($(vino).attr("data-tipoN").toLowerCase()==$(checked).attr("data-tipo")|| $(vino).attr("data-tipoS").toLowerCase()==$(checked).attr("data-tipo"))
				{
					$(vino).show();
				} else {$(vino).hide();}
				if(checked.length==0){$(vino).show();}
			});
	}

	function FiltraAnno(){
		$(document).ready(function(){
			let anno=$("#anno").val();
			let vini=$("div.bottiglia");

			$.each(vini,function(index,value){
				if($(value).attr("data-anno")<anno){
					$(value).hide();
				} else {$(value).show()}
			});
		});
		
	}
</script>

<script>
	function EasterEgg(){
		$(document).ready(function(){
			let max=$("#sorpresa").val();
			if(max==710){
				window.open("easter_egg.php");
			}
		});
	}
</script>

<script>
	FiltraTipo();
	FiltraAnno();
</script>
<?php include('_footer_inc.php');?>
