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

                                        <?php
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        // <!-- -------------------------------FORM ACCEDI---------------------------------------- -->
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        ?>
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Accedi</h4>
                                            <form method="post" action="login_act.php">

                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Email" id="email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="password" name="psw" class="form-style" placeholder="Password" id="psw" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Accedi</button>
                                                <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Password dimenticata?</a></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <div class="card-back">
                                    <div class="center-wrap">

                                        <?php
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        // <!-- -------------------------------FORM REGISTRATI------------------------------------ -->
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        ?>
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Registrati</h4>
                                            <form method="post" action="login_act.php">

                                                <div class="form-group">
                                                    <input type="text" name="signup_nome" class="form-style" placeholder="Nome completo o Ragione Sociale *" id="signup_nome" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Email *" id="signup_email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="piva" name="signup_piva" class="form-style" placeholder="P.Iva" id="signup_piva" autocomplete="off" onkeydown="VerificaFatt()">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="address" name="signup_indirizzo" class="form-style" placeholder="Indirizzo di Fatturazione" id="signup_indirizzo" autocomplete="off" oninput="VerificaFatt()">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>		
                                                <div class="form-group mt-2">
                                                    <input type="password" name="psw" class="form-style" placeholder="Password *" id="psw" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <!-- <p class="form-style">* Campi obbligatori</p> -->
                                                <button type="submit" class="btn mt-4" id="submit">Registrati</button>
                                                </div>

                                            </form>
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
<script>
    function VerificaFatt(){
        $(document).ready(function(){
            let fatt= $("#signup_indirizzo").val();
            let piva=$("#signup_piva").val();
            console.log(piva);
            console.log(fatt);
            if(piva!="" && fatt=="" ){
                $("#submit").prop('disabled',"true");
                $("#signup_indirizzo").css("border","4px dotted red")
                console.log("VERO");
            }else{$("#submit").removeAttr('disabled'); $("#signup_indirizzo").css("border","none"); console.log("FLS");}
        });
    }
</script>

</body>
</html>