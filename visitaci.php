<?php
$pagina="visitaci";
?>
<?php
include('session_check.php');
include('header_inc.php');

$conn=db_connect();
?>
    <link rel="stylesheet" href="./style/styleVisitaci.css">
    <!-- FORM -->


	<div id="booking" class="sectionform m-4" style="border-radius: 20px;">
		<div class="sectionform-center">
			<div class="container">
				<div class="row">
					<div class="booking-form" style="border-radius: 20px;">
	
						<form method="post" action="visitaci_act.php" >
							<div class="form-header">
								<h2>Prenota ora la tua visita!</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Nome</span>
									<input class="form-control" name="nomevisitatore" type="text" required placeholder="Inserisci il nome">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Cognome</span>
									<input class="form-control" name="cognomevisitatore" type="text" required placeholder="Inserisci il cognome">
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Data di nascita</span>
										<input class="form-control" name="datanascita" type="date" required>
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<span class="form-label">Email</span>

								<input class="form-control" name="mailvisitatore" type="email" required placeholder="Inserisci la tua email">

							</div>
	
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Data della visita</span>
										<input class="form-control" name="datavisita" type="date" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Orario della visita</span>
										<select name="orariovisita" class="form-control">
											<option>10:30</option>
											<option>15:30</option>
											<option>17:30</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Partecipanti</span>
										<br>
											<span class="input-number-decrement">-</span>
											<input class="input-number" type="number" name="partecipanti" min="1" max="10" value="1">
											<span class="input-number-increment">+</span>
	
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Cantina</span>
										<select class="form-control" name="cantina">
											<option>Tenuta Dadomo</option>
											<option>Azienda agricola Pagliarini</option>
											<option>Azienda agricola Berg</option>
											<option>Villa Rizzi</option>
											<option>Castello Ferrari</option>
											<option>Tenuta grande sese</option>
											<option>Distilleria il sole</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
	
							<div class="form-btn">
								<button class="submit-btn">Prenota</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src="./js/function.js"></script>
<script src="./js/functionBottiglia.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() { dataLayer.push(arguments); }
	gtag('js', new Date());

	gtag('config', 'UA-23581568-13');
</script>
<script defer
	src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
	integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
	data-cf-beacon='{"rayId":"7a93c8bcab8259cb","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}'
	crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
		//script per il counter dei partecipanti
        (function () {
    
            window.inputNumber = function (el) {
    
                var min = el.attr('min') || false;
                var max = el.attr('max') || false;
    
                var els = {};
    
                els.dec = el.prev();
                els.inc = el.next();
    
                el.each(function () {
                    init($(this));
                });
    
                function init(el) {
    
                    els.dec.on('click', decrement);
                    els.inc.on('click', increment);
    
                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if (!min || value >= min) {
                            el[0].value = value;
                        }
                    }
    
                    function increment() {
                        var value = el[0].value;
                        value++;
                        if (!max || value <= max) {
                            el[0].value = value++;
                        }
                    }
                }
            }
        })();
    
        inputNumber($('.input-number'));    
    </script>
<?php include('_footer_inc.php');?>