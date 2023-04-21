<?php
$pagina="home";
?>

<?php
include('session_check.php');
include('header_inc.php');
?>

	<div >


		<!-- ---------------------------------------------------------------------------------------------------- -->
		<!-- ----------------------------------------SLIDESHOW--------------------------------------------------- -->
		<!-- ---------------------------------------------------------------------------------------------------- -->

			<div id="demo" class="carousel slide " style="background-color: #171a1f; " data-ride="carousel">
			


				<!-- --------------------------------------------------------------------- -->
				<!-- ---------------------Indicatori SX/DX-------------------------------- -->
				<!-- --------------------------------------------------------------------- -->

				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>
				

				<div class="carousel-inner" style="height:660px ; ">


					<!-- --------------------------------------------------------------------- -->
					<!-- ------------------------------item 1--------------------------------- -->
					<!-- --------------------------------------------------------------------- -->

					<div class="carousel-item active"> 
						<div class="row" >
							<div class="col-7 align-items-center justify-content-center p-5" style="height:660px ;">
								<h1 style="color: #e9da03; margin-top: 10%; ">Vienici a trovare!</h1>

								<!-- Descrizione -->
								
								<p class="text-secondary">Visite guidate alle nostre cantine tutti i giorni dalle 10.00 alle 16.00.</p>
								<p class="text-secondary">Degustazione vini locali inclusa.</p>
							
								
								<p>
									<a class="btn btn-warning my-3" style=" box-shadow: 0 5px 25px 0px #ffee00;" href="visitaci.php">Prenota</a>
								</p>
							</div>
							<div class="col-3 d-flex align-items-center justify-content-center" style="height:660px ; ">

								<img src="img/Cantine/BG2.jpg"  alt="Chicago" class="" style="border-radius: 0 35% 0 35%; box-shadow: 0 6px 50px 0 #ffee00;" width="150%" >
							</div>

							
						</div>
						
						
					</div>


					<!-- --------------------------------------------------------------------- -->
					<!-- ------------------------------item 2--------------------------------- -->
					<!-- --------------------------------------------------------------------- -->

					<div class="carousel-item " >
						<div class="row d-flex align-items-center justify-content-center">
						

							<img src="img/LineaFrati/4_bott_F_index.png"  alt="Chicago" class=" " style="border-radius: 30px;" width="90%" >
							<a href="vini_limited_edition.php" style="position: absolute;" class="btn btn-outline-warning">Scopri</a>

						</div>
					</div>


					<!-- --------------------------------------------------------------------- -->
					<!-- ------------------------------item 3--------------------------------- -->
					<!-- --------------------------------------------------------------------- -->

					<div class="carousel-item">
						<div class="row">
							<div class="row d-flex align-items-center justify-content-center">
						

								<img src="img/Cantine/cantina_pantelleria_prova.png"  alt="Chicago" class=" " style="border-radius: 30px;" width="89%" >
								<!-- <button type="button" style="position: absolute;" class="btn btn-outline-warning">Scopri</button> -->
								
							</div>
							<div style="position: absolute; width: 30%; margin-top: 20%; margin-left: 5%; " class="text-center"   >
								<h2 style="color: #e9da03; margin-top: 10%; ">Nuova Cantina <br> "Tenuta Grande Sese" </h1>

							<!-- Descrizione -->
								
							
								<!-- <p class="text-secondary"></p>
								<p class="text-secondary">Degustazione vini locali inclusa.</p> -->
							
								
								<p>
									<a class="btn btn-outline-warning my-3"  href="cantine.php">Scopri</a>
								</p>
							</div>
					</div>
				</div>
				
				<!-- --------------------------------------------------------------------- -->
				<!-- ---------------------Controlli SX/DX--------------------------------- -->
				<!-- --------------------------------------------------------------------- -->
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>



		
		
		</div>


		<!-- ---------------------------------------------------------------------------------------------------- -->
		<!-- --------------------------------------BEST SELLER--------------------------------------------------- -->
		<!-- ---------------------------------------------------------------------------------------------------- -->

		<div class="">
			<h1 class="m-5" style="color: #e9da03;">I nostri bestseller</h1>
			<div class="d-flex justify-content-center align-items-center">

				<figure class="card mx-4  ">
					<img src="img/LineaFrati/2_bott_F.png" alt="">
					<figcaption>
						<p class="h5 text-dark">La Gatta Rossa</p>
						<p class="text-dark"> 13.12€</p>
					</figcaption>
				</figure>
				<figure class="card mx-4 ">
					<img src="img/LineaFrati/1_bott_F.png" alt="">
					<figcaption>
						<p class="h5 text-dark">Ego di Luca</p>
						<p class="text-dark"> 69.96€</p>
					</figcaption>
				</figure>
				<figure class="card mx-4 ">
					<img src="img/LineaFrati/3_bott.png" alt="">
					<figcaption>
						<p class="h5 text-dark">Cingolo di Tommaso</p>
						<p class="text-dark"> 53.90€</p>
					</figcaption>
				</figure>
				<figure class="card mx-4">
					<img src="img/LineaFrati/4_bot_F.png" alt="">
					<figcaption>
						<p class="h5 text-dark ">Barolo Davide</p>
						<p class="text-dark"> GRATIS</p>
					</figcaption>

				</figure>
			</div>
		</div>


	</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src="js/function.js"></script>
<script src="js/functionBottiglia.js"></script>



<style>
	.card{
		width: 20rem;
		height: 20rem;
		display: grid;
		grid-template-rows: 1fr 0;
		transition: grid-template-rows 400ms;
		overflow: hidden;
		background-color: #d2c900;
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
<?php include('_footer_inc.php');?>