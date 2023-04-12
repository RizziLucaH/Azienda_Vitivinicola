<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styleBottiglia.css">


</head>
<body class="dark hero-anime" style="overflow: auto; height: 2000px;">

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
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 active">
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
		
	</div>



	<div >
		
	</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src="js/function.js"></script>
<script src="js/functionBottiglia.js"></script>


<?php include('_footer_inc.php');?>