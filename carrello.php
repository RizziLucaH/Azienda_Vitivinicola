<!--DA MODIFICARE GRAFICAMENTE PARTE RESPONSIVE PER IL MOBILE E COSA APPARE CON LA FUNZIONE DI JS CHE VERIFICA CARRELLO VUOTO-->

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
    <link rel="stylesheet" href=" style/styleCarrello.css">
    


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
							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 ">
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

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-5 active" >
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
		
        <a href="login.html" class="link-to-portfolio hover-target"    > <i class="fa-solid fa-user fa-2x mt-2"></i></a>
	</div>

    <!-- CONTENT -->
    
    <!--CARRELLO-->
    <div class="shopping-cart rounded border border-dark" id="carrello"  >
        
    <div class="column-labels">
        <label class="product-image">Image</label>
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity">Quantity</label>
        <label class="product-removal">Remove</label>
        <label class="product-line-price">Total</label>
</div>

    <!--PRODOTTI DEL CARRELLO-->
    <div class="product " name="prodotto">
        <div class="product-image">
        <img class="rounded" src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
        </div>
        <div class="product-details">
        <div class="product-title">Dingo Dog Bones</div>
        <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
        </div>
        <div class="product-price">12.99</div>
        <div class="product-quantity">
        <input type="number" value="2" min="1">
        </div>
        <div class="product-removal">
        <button class="btn btn-danger" onclick="verificaCarrello()">
            Remove
        </button>
        </div>
        <div class="product-line-price">25.98</div>
    </div>

    <div class="product" name="prodotto">
        <div class="product-image">
        <img class="rounded" src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
        </div>
        <div class="product-details">
        <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
        <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
        </div>
        <div class="product-price">45.99</div>
        <div class="product-quantity">
        <input type="number" value="1" min="1">
        </div>
        <div class="product-removal">
        <button class="btn btn-danger" onclick="verificaCarrello()">
            Remove
        </button>
        </div>
        <div class="product-line-price">45.99</div>
    </div>

        <!--RECAP SPESE-->
    <div class="totals" >
        <div class="totals-item">
            <label>Subtotal</label>
            <div class="totals-value" id="cart-subtotal">0</div>
            <label>Tax (22%)</label>
            <div class="totals-value" id="cart-tax">0</div>
            <label >Shipping</label>
            <div class="totals-value" id="cart-shipping">0</div>
            <label>Grand Total</label>
            <div class="totals-value" id="cart-total">0</div>
            <label>L'ordine è un regalo? </label>
            <div class="gift" id="regalo"> <input type="checkbox" name="regalo"></div>
        </div>
    </div>

    <div style="width: 50%; margin: auto; height:min-content;">
        <button class="btn btn-warning">Checkout</button>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionBottiglia.js"></script>
<script src=" js/functionCarrello.js"></script>
<script>(function(){
    $("#cart").on("mouseover", function() {
    $(".shopping-cart").fadeToggle( "fast");
    });
    
})();</script>

<script>
    function verificaCarrello(){
        let prodotti=document.getElementsByName("prodotto");
        let carrello=document.getElementById("carrello");
        if(prodotti.length-1==0)
        {
            carrello.innerHTML="CARRELLO VUOTO";
        }
    }
</script>
</body>
</html>