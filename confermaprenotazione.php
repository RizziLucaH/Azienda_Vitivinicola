<?php
$pagina="feste";

include('session_check.php');
include('header_inc.php');

?>

    <link rel="stylesheet" href="./style/styleVisitaci.css">

	<div id="booking" class="sectionform m-4" style="border-radius: 20px;">
		<div class="sectionform-center">
			<div class="container">
				<div class="row">
					<div class="booking-form" style="border-radius: 20px;">
	
						<form method="post" action="visitaci_act.php" >
							<div class="form-group">
								<h1>Richiesta ricevuta con successo!</h1>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src="../js/function.js"></script>
<script src="../js/functionBottiglia.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

<script defer
	src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
	integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
	data-cf-beacon='{"rayId":"7a93c8bcab8259cb","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}'
	crossorigin="anonymous"></script>

<?php include('_footer_inc.php');?>