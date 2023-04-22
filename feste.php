<?php
$pagina="feste";

include('session_check.php');
include('header_inc.php');

?>

<link rel="stylesheet" href="./style/styleVisitaci.css">
<<link rel="stylesheet"  href="./style/stylePopUp.css">


<div id="booking" class="sectionform m-4" style="border-radius: 20px;">
		<div class="sectionform-center">
			<div class="container">
				<div class="row">
					<div class="booking-form" style="border-radius: 20px;">
	
						<form method="post" action="">
							<div class="form-header">
								<h2>Organizza ora la tua festa!</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Nome</span>
									<input class="form-control" name="nomevisitatore" type="text" placeholder="Inserisci il nome">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Cognome</span>
									<input class="form-control" name="cognomevisitatore" type="text" placeholder="Inserisci il cognome">
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
								<input class="form-control" name="mailvisitatore" type="email" placeholder="Enter your email">
							</div>
	
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Data prenotazione</span>
										<input class="form-control" name="datavisita" type="date" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Orario</span>
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
<?php include('_footer_inc.php');?>