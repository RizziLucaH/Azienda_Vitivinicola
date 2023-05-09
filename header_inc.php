

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php //titolo della pagina e favico ?>
    <title>PAOLONI - <?= $pagina?></title>
	<link rel="icon" href="img/icoPaoloni.png" type="image/png">

    <?php //link css bootstrap ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <?php //link css extra ?>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styleBottiglia.css">
</head>
<body class="dark hero-anime" style="overflow:auto ;">

	<?php //NAVBAR ?>
	<div class=" bg-light start-header start-style" style="position: sticky; z-index: 3;">

    	<?php //logo principale ?>
        <div >
            <img src="img/LOGO_scritta_oro.png" class="title mx-auto d-block" style="width: 180px; " alt="">
        </div>

		<div class="container ">
			<div class="row" >
				<nav class="navbar navbar-expand-lg nav-fill w-100 navbar-light " >

    				<?php //bottone per navbar collassata ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-md-center"  id="navbarSupportedContent">
						<ul class="navbar-nav col-10 " >

						    <?php //home ?>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 <?php $pagina=="visitaci" ? "active" :"" ?>">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

						    <?php //cantine ?>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 <?php $pagina=="visitaci" ? "active" :"" ?>">
                            <a class="nav-link" href="cantine.php">Cantine</a>
                            </li>

							<?php //vini ?>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 <?php $pagina=="visitaci" ? "active" :"" ?>">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Vini</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="sezione_vini.php?tipo=bianco">Bianco</a>
                                    <a class="dropdown-item" href="sezione_vini.php?tipo=spumante">Spumante</a>
                                    <a class="dropdown-item" href="sezione_vini.php?tipo=rosso">Rosso</a>
                                    <a class="dropdown-item" href="sezione_vini.php?tipo=rosé">Rosé</a>
                                    <a class="dropdown-item" href="vini_limited_edition.php">Linea Frati Limited</a>
                                </div>
                            </li>

							<?php //visitaci ?>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 <?php $pagina=="visitaci" ? "active" :"" ?>">
									<a class="nav-link" href="visitaci.php">Visitaci</a>
							</li>

							<?php //servizi ?>
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 <?php $pagina=="visitaci" ? "active" :"" ?>">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="servizi.php" role="button" aria-haspopup="true" aria-expanded="false">Servizi</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="imbottigliamento.php">Imbottigliamento</a>
									<a class="dropdown-item" href="corso_onav.php">Corso ONAV</a>
									<a class="dropdown-item" href="feste.php">Feste Private</a>
								</div>
							</li>

						    <?php //carrello ?>
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5" >
								<a class="nav-link" href="carrello.php"> <i class="fa-solid fa-bag-shopping fa-2x"></i></a>
							</li>

						</ul>
					</div>
				</nav>		
			</div>

			<?php //utente ?>
			<a href="dettagli_utente.php" class="link-to-portfolio hover-target"> <i class="fa-solid fa-user fa-2x mt-2"></i></a>
		</div>
	</div>


