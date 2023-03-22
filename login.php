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
    <link rel="stylesheet" href="style/styleLogin.css">


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
		
	</div>

    <!-- LOGIN -->
	<div >
    <div class="section_Login">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section_Login pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Accedi </span><span>Sign Up</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                            <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Accedi</h4>
                                            <div class="form-group">
                                                <input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>	
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="Password" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <a href="#" class="btn mt-4">Accedi</a>
                                            <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Password dimenticata?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Registrati</h4>
                                            <div class="form-group">
                                                <input type="text" name="logname" class="form-style" placeholder="Nome completo o Ragione Sociale *" id="logname" autocomplete="off">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>	
                                            <div class="form-group mt-2">
                                                <input type="email" name="logemail" class="form-style" placeholder="Email *" id="logemail" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="piva" name="logpiva" class="form-style" placeholder="P.Iva" id="logpiva" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="address" name="logaddress" class="form-style" placeholder="Indirizzo di Fatturazione" id="logaddress" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>		
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="Password *" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <!-- <p class="form-style">* Campi obbligatori</p> -->
                                            <a href="#" class="btn mt-4">Registrati</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <a href="login.php" class="link-to-portfolio hover-target"    > <i class="fa-solid fa-user fa-2x mt-2"></i></a>

</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>


</body>
</html>