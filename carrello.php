<!--DA MODIFICARE GRAFICAMENTE PARTE RESPONSIVE PER IL MOBILE E COSA APPARE CON LA FUNZIONE DI JS CHE VERIFICA CARRELLO VUOTO-->

<?php
$pagina="carrello";
?>
<?php
include('session_check.php');
include('header_inc.php');

$conn=db_connect();
$carrellao= 

?>

<link rel="stylesheet" href=" style/styleCarrello.css">

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
        <input id="qta" type="number" min="1" value="1">
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
            <label>Tax (10%)</label>
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
<?php include('_footer_inc.php');?>