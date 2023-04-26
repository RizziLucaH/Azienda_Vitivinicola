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
								<h1>Prenotazione effettuata con successo!</h1>
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