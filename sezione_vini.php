<!--DA MODIFICARE GRAFICAMENTE (RITOCCHI O RIFARE)-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styleBottiglia.css">
    <link rel="stylesheet" href="style/styleSezioneVini2.css">



</head>
<body class="dark hero-anime" style="overflow: auto;">

    <!-- TITOLO -->
    
    <!-- NAVBAR -->
	<div class=" bg-light start-header start-style" style="position: sticky; z-index: 3;">
		<!-- <span class="nav-item icon pl-4 pl-md-0 ml-0 ml-md-5">
			<a class="nav-link"> <i class="fa-solid fa-bag-shopping fa-3x"></i></a>
		</span> -->
        <div >
            <img src="img/LOGO_scritta_oro.png" class="title mx-auto d-block" style="width: 180px; " alt="">
        </div>

		<div class="container ">
			<div class="row" >
				<nav class="navbar navbar-expand-lg nav-fill w-100 navbar-light " >
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					
					<div class="collapse navbar-collapse justify-content-md-center"  id="navbarSupportedContent">

						
						<ul class="navbar-nav col-10 " >

							<!-- HOME -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 ">
								<a class="nav-link" href="index.php">Home</a>
							</li>

							<!-- CANTINE -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
								<a class="nav-link" href="cantine.php">Cantine</a>
							</li>

							<!-- DROPDOWN VINI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 active">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Vini</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="sezione_vini.php">Bianco</a>
									<a class="dropdown-item" href="sezione_vini.php">Spumante</a>
									<a class="dropdown-item" href="sezione_vini.php">Rosso</a>
									<a class="dropdown-item" href="sezione_vini.php">Rosé</a>
									<a class="dropdown-item" href="vini_limited_edition.php">Linea Frati Limited</a>
									<a class="dropdown-item" href="bottiglia2.php">Linea Frati Limited 2</a>
								</div>
							</li>

							<!-- VISITACI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
								<a class="nav-link" href="visitaci.php">Visitaci</a>
							</li>

							<!-- DROPDOWN SERVIZI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="servizi.php" role="button" aria-haspopup="true" aria-expanded="false">Servizi</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="dettaglio_servizio.php">Imbottigliamento</a>
									<a class="dropdown-item" href="dettaglio_servizio.php">Corso ONAV</a>
									<a class="dropdown-item" href="dettaglio_servizio.php">Feste Private</a>
								</div>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5" >
								<a class="nav-link" href="carrello.php"> <i class="fa-solid fa-bag-shopping fa-2x"></i></a>
							</li>
							<!-- <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5" >
								<a class="nav-link" > <i class="fa-solid fa-user fa-2x"></i></a>
							</li> -->
						</ul>
						
		
						
					</div>
					
				</nav>		
			</div>
			<!-- DIV UTENTE -->
		</div>
		
		<a href="login.php" class="link-to-portfolio hover-target"    > <i class="fa-solid fa-user fa-2x mt-2"></i></a>
	</div>


	<!-- ---------------------------------------------------------------------------------------------------- -->
	<!-- ------------------------------------FILTRA/ORDINA--------------------------------------------------- -->
	<!-- ---------------------------------------------------------------------------------------------------- -->

	<div class="container-xl" >
		<hr class="mt-5">
		<div class="row align-items-start">
			<div class="col-3 mt-5 pt-3 filtra">

				<!-- ----------------------------------------------------------------- -->
				<!-- -----------------------------STATO------------------------------- -->
				<!-- ----------------------------------------------------------------- -->
				<header>
					<h6>Stato</h6>
				</header>

				<div class="form-check mb-3">

					<!-- COMPRA ORA -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Compra Ora</label>
					<br>

					<!-- IN ARRIVO -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">In arrivo</label>
				
				</div>

				<hr style="border: 1px solid black;">
				

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
					<input type="range" class="" min="0" max="500" value="0" step="1">
					<input type="range" class="" min="0" max="500" value="269" step="1">
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
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">+20</label>
					<br>

					<!-- +50 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">+50</label>
					<br>

					<!-- +100 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
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

					<!-- +20 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Bianco</label>
					<br>

					<!-- +50 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Spumante</label>
					<br>

					<!-- +50 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Rosso</label>
					<br>

					<!-- +100 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Rosé</label>
					<br>

					<!-- +100 -->
					<input id="CK_stato_compra_ora" class="form-check-input mt-0" type="checkbox" value="" >
					<label for="CK_stato_compra_ora">Grappa</label>
				
				</div>
			</div>

			<div class="col-9 mt-5">
				<div class="input-group mb-3" >
					<span class="input-group-text" style="border-radius: 10px 0 0 10px ;" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" class="form-control" style="border-radius: 0 10px 10px 0;" placeholder="Cerca" aria-label="Cerca" aria-describedby="basic-addon1">
				</div>

				<!-- CARD -->

				<div class="row row-cols-1 row-cols-md-3 g-4">
					<div class="col">
						<figure class="card   ">
							<img src="img/Linea_Frati/2_bott_F.png" alt="">
							<figcaption>
								<p class="h5 text-dark">Nome Vino</p>
								<p class="text-dark"> 69.99€</p>
							</figcaption>
						</figure>
					</div>
					<div class="col">
						<figure class="card  ">
							<img src="img/Linea_Frati/1_bott_F.png" alt="">
							<figcaption>
								<p class="h5 text-dark">Nome Vino</p>
								<p class="text-dark"> 69.99€</p>
							</figcaption>
						</figure>
					</div>
					<div class="col">
						<figure class="card  ">
							<img src="img/Linea_Frati/3_bott.png" alt="">
							<figcaption>
								<p class="h5 text-dark">Nome Vino</p>
								<p class="text-dark"> 69.99€</p>
							</figcaption>
						</figure>
					</div>
					<div class="col">
						<figure class="card ">
							<img src="img/Linea_Frati/4_bot_F.png" alt="">
							<figcaption>
								<p class="h5 text-dark ">Nome Vino</p>
								<p class="text-dark"> 69.99€</p>
							</figcaption>
						</figure>
					</div>
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

</body>
</html>