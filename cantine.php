<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <link rel="stylesheet" href=" style/style.css">
    <link rel="stylesheet" href=" style/styleBottiglia.css">
	<!-- <link type="text/css" rel="stylesheet" href="application.css" media="all" /> -->
    <link rel="stylesheet" href=" style/styleBottiglia2.css">

	<!-- Card cantina -->
	<link rel="stylesheet/less" type="text/css" href=" style/styleCantine.less" />
	<script src="https://cdn.jsdelivr.net/npm/less" ></script>

</head>
<body class="dark hero-anime" style="overflow: hidden;;">

    <!-- TITOLO -->
    
    <!-- NAVBAR -->
	<div class=" bg-light start-header start-style" style="position: sticky; z-index: 3;">
		<!-- <span class="nav-item icon pl-4 pl-md-0 ml-0 ml-md-5">
			<a class="nav-link"> <i class="fa-solid fa-bag-shopping fa-3x"></i></a>
		</span> -->
        <div >
            <img src=" img/LOGO_scritta_oro.png" class="title mx-auto d-block" style="width: 180px; " alt="">
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
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 active">
								<a class="nav-link" href="cantine.php">Cantine</a>
							</li>

							<!-- DROPDOWN VINI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 ">
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

	<!-- <script>
		function prova(){

			$refs.slider.scrollLeft == 0 ? start = true : start = false; Math.abs(($refs.slider.scrollWidth - $refs.slider.offsetWidth) - $refs.slider.scrollLeft) < 5 ? end = true : end = false;
		}
	</script> -->

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