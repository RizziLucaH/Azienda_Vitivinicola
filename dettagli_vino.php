<!--DA MODIFICARE GRAFICAMENTE AD ESEMPIO IL BOTTONE E IL TESTO DI FIANCO ALLE IMMAGINI-->

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
    <link rel="stylesheet" href=" style/styleDettagli.css">
    


</head>
<body class="dark hero-anime" style="overflow: auto;">

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
								<a class="nav-link" href="index.html">Home</a>
							</li>

							<!-- CANTINE -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
								<a class="nav-link" href="cantine.html">Cantine</a>
							</li>

							<!-- DROPDOWN VINI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 active">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Vini</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="sezione_vini.html">Bianco</a>
									<a class="dropdown-item" href="sezione_vini.html">Spumante</a>
									<a class="dropdown-item" href="sezione_vini.html">Rosso</a>
									<a class="dropdown-item" href="sezione_vini.html">Rosé</a>
									<a class="dropdown-item" href="vini_limited_edition.html">Linea Frati Limited</a>
									<a class="dropdown-item" href="bottiglia2.html">Linea Frati Limited 2</a>
								</div>
							</li>

							<!-- VISITACI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
								<a class="nav-link" href="visitaci.html">Visitaci</a>
							</li>

							<!-- DROPDOWN SERVIZI -->
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="servizi.html" role="button" aria-haspopup="true" aria-expanded="false">Servizi</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="dettaglio_servizio.html">Imbottigliamento</a>
									<a class="dropdown-item" href="dettaglio_servizio.html">Corso ONAV</a>
									<a class="dropdown-item" href="dettaglio_servizio.html">Feste Private</a>
								</div>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5" >
								<a class="nav-link" href="carrello.html"> <i class="fa-solid fa-bag-shopping fa-2x"></i></a>
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
	<a href="login.html" class="link-to-portfolio hover-target"    > <i class="fa-solid fa-user fa-2x mt-2"></i></a>

    <!-- CONTENT -->
		<div class="grid product">
		<div class="column-xs-12 column-md-7">
			<div class="product-gallery">
			<div class="product-image">
				<img class="active" src="https://source.unsplash.com/W1yjvf5idqA">
			</div>
			<ul class="image-list">
				<li class="image-item"><img src="https://source.unsplash.com/W1yjvf5idqA"></li>
				<li class="image-item"><img src="https://source.unsplash.com/VgbUxvW3gS4"></li>
				<li class="image-item"><img src="https://source.unsplash.com/5WbYFH0kf_8"></li>
			</ul>
			</div>
		</div>
		<div class="column-xs-12 column-md-5">
			<h1>Bonsai</h1>
			<h2>$19.99</h2>
			<div class="description">
			<p>The purposes of bonsai are primarily contemplation for the viewer, and the pleasant exercise of effort and ingenuity for the grower.</p>
			<p>By contrast with other plant cultivation practices, bonsai is not intended for production of food or for medicine. Instead, bonsai practice focuses on long-term cultivation and shaping of one or more small trees growing in a container.</p>
			</div>
			<button class="add-to-cart" style="margin-top: 10%;">Add To Cart</button>
		</div>
		</div>
		<div class="grid related-products">
		<div class="column-xs-12">
			<h3 style="text-align: center;">Scheda Tecnica</h3>
		</div>
		<div class="column-xs-12 column-md-6">
			<h4 style="text-align: center;">DESCRIZIONE 1</h4>
			<p>Magna non ut id esse consectetur in ut aute exercitation eiusmod est Lorem sint et.</p>
		</div>
		<div class="column-xs-12 column-md-6">
			<h4  style="text-align: center;">DESCRIZIONE 2</h4>
			<p>Magna non ut id esse consectetur in ut aute exercitation eiusmod est Lorem sint et.</p>
		</div>
		</div>
		</div>
		</div>
		</div>
		</main>
		<footer>
		<div class="grid">
		<div class="column-xs-12">
		<p style="margin-top: 10%;" class="copyright">&copy; Copyright 2023 <a href="#" title="Paoloni SRL"  target="#">Paoloni SRL</a></p>
		</div>
		</div>
		</footer>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionBottiglia.js"></script>
<script>
		const activeImage = document.querySelector(".product-image .active");
	const productImages = document.querySelectorAll(".image-list img");
	const navItem = document.querySelector('a.toggle-nav');

	function changeImage(e) {
	activeImage.src = e.target.src;
	}

	function toggleNavigation(){
	this.nextElementSibling.classList.toggle('active');
	}

	productImages.forEach(image => image.addEventListener("click", changeImage));
	navItem.addEventListener('click', toggleNavigation);
</script>

</body>
</html>