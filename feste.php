<?php
$pagina="feste";

include('session_check.php');
include('header_inc.php');

?>

<link rel="stylesheet" href="./style/styleVisitaci.css">
<link rel="stylesheet"  href="./style/stylePopUp.css">

<?php //Form per richieste ?>
<div id="booking" class="sectionform m-4" style="border-radius: 20px;">
		<div class="sectionform-center">
			<div class="container">
				<div class="row">
					<div class="booking-form" style="border-radius: 20px;">
	
						<form method="post" action="feste_act.php">
							<div class="form-header">
								<h2>Organizza ora la tua festa!</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Nome</span>
									<input class="form-control" name="nome" type="text" required placeholder="Inserisci il nome">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Cognome</span>
									<input class="form-control" name="cognome" type="text" required placeholder="Inserisci il cognome">
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Contatto</span>
										<input class="form-control" name="telefono" type="text" required placeholder="Inserisci numero di telefono">
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<span class="form-label">Email</span>
								<input class="form-control" name="mail" type="email" required placeholder="Inserisci la tua email">
							</div>
	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Data prenotazione</span>
										<input class="form-control" name="data" type="date" required>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Invitati</span>
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
								<button class="submit-btn cd-popup-trigger ">Prenota</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>




<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src="js/functionBottiglia.js"></script>

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