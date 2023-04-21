<?php
$pagina="vini";

include('session_check.php');
include('header_inc.php');

$conn= db_connect();


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
					<input type="number" class="input-max" value="269">
					</div>
				</div>
				<div class="slider">
					<div class="progress"></div>
				</div>
				<div class="range-input">
					<input id="minimo" type="range" class="" min="0" max="500" value="0" step="1" oninput="FiltraPrezzo()">
					<input id="massimo" type="range" class="" min="0" max="500" value="269" step="1" oninput="FiltraPrezzo()">
				</div>

				<hr style="border: 1px solid black;">
				

				<!-- ----------------------------------------------------------------- -->
				<!-- --------------------------QUANTITA------------------------------- -->
				<!-- ----------------------------------------------------------------- -->

				<header>
					<h6>Quantità Disponibile</h6>
				</header>

				<div class="form-check mb-3">

					<!-- +20 -->
					<input id="CK_20" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">+20</label>
					<br>

					<!-- +50 -->
					<input id="CK_50" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">+50</label>
					<br>

					<!-- +100 -->
					<input id="CK_100" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">+100</label>
				
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
						<input id="CK_bianco" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" >
						<label for="CK_bianco">Bianco</label>
						<br>
	
						<!-- Spumante -->
						<input id="CK_spumante" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" >
						<label for="CK_spumante">Spumante</label>
						<br>

						<!-- Rosso -->
						<input id="CK_rosso" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" >
						<label for="CK_rosso">Rosso</label>
						<br>

						<!-- Rosé -->
						<input id="CK_rosé" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" >
						<label for="CK_rosé">Rosé</label>
						<br>

						<!-- Grappa -->
						<input id="CK_grappa" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" >
						<label for="CK_grappa">Grappa</label>
						<br>

						<!-- Vino dolce -->
						<input id="CK_passito" class="form-check-input mt-0" type="checkbox" value="" onclick="FiltraTipo()" >
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
							<div data-tipoN="<?=$row['tipoN'] ?>" data-tipoS="<?=$row['tipoS'] ?>" class="col bottiglia">
								<a style="text-decoration: none;" href="dettagli_vino.php?idB=<?=$row['idB']?>">
									<figure class="card ">
										<img src="img/LineaFrati/4_bot_F.png" alt="">
										<!-- <img src="<$row["path"]?>" alt="">-->
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
		$(document).ready(function(){
			/*vini*/
			let bianchi=$("div[data-tipoN='Bianco']");
			let rossi=$("div[data-tipoN='Rosso']");
			let Rosé=$("div[data-tipoN='Rosè']");
			let grappe=$("div[data-tipoS='Grappa']");
			let spumanti=$("div[data-tipoS='Spumante']");
			let passiti=$("div[data-tipoS='Vino dolce']")

			/*checkbox*/
			let checkB= $("#CK_bianco").is(":checked");
			let checkR=$("#CK_rosso").is(":checked");
			let checkRosé=$("#CK_rosé").is(":checked");
			let checkG=$("#CK_grappa").is(":checked");
			let checkS=$("#CK_spumante").is(":checked");
			let checkP=$("#CK_passito").is(":checked");
			console.log(checkR);

			/*EACH BIANCHI*/
			$.each(bianchi,function(index,value){
				if(checkR==true || checkG==true  || checkS==true  || checkRosé==true || checkP==true ){
					if(checkB==false){$(value).hide();} else {$(value).show();}
				}
			})
			
			/*EACH ROSSI*/
			$.each(rossi,function(index,value){
				if(checkB==true || checkG==true  || checkS==true  || checkRosé==true || checkP==true ){
					if(checkR==false){$(value).hide();} else {$(value).show();}
				} else{$(value).show()}
			})

			/*EACH ROSé*/
			$.each(Rosé,function(index,value){
				if(checkB==true || checkG==true  || checkS==true  || checkR==true || checkP==true ){
					if(checkRosé==false){$(value).hide();} else {$(value).show();}
				}else{$(value).show()}
			})

			/*EACH GRAPPE*/
			$.each(grappe,function(index,value){
				if(checkB==true || checkRosé==true  || checkS==true  || checkR==true || checkP==true ){
					if(checkG==false){$(value).hide();} else {$(value).show();}
				}else{$(value).show()}
			})

			/*EACH SPUMANTI*/
			$.each(spumanti,function(index,value){
				if(checkB==true || checkRosé==true  || checkG==true  || checkR==true || checkP==true ){
					if(checkS==false){$(value).hide();} else {$(value).show();}
				}else{$(value).show()}
			})

			/*EACH PASSITO*/
			$.each(passiti,function(index,value){
				if(checkB==true || checkRosé==true  || checkG==true  || checkR==true || checkS==true ){
					if(checkP==false){$(value).hide();} else {$(value).show();}
				}else{$(value).show()}
			})

		});
		
	}
</script>
<?php include('_footer_inc.php');?>

</body>
</html>