
<?php
$pagina="carrello";
include('session_check.php');
$conn=db_connect();
?>

<?php
if(verifica_session($conn,$_SESSION['id']??0)) {
    include('header_inc.php');
    $id=$_SESSION['id'];
    $rows=visualizza_carrello($conn,$_SESSION['id']);

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

    <?php foreach($rows as $riga){?>
        <div class="product" name="prodotto">
            <div class="product-image">
            <img class="rounded" src="<?=$riga['path']?>">
            </div>
            <div class="product-details">
            <div class="product-title"><?=$riga['nomevino'] ?></div>
            <p class="product-description"><?=$riga['descrizione'] ?></p>
            </div>
            <div class="product-price"><?=$riga['prezzo'] ?></div>
            <div class="product-quantity">
            <input id="qta" type="number" min="1" value=<?=$riga['numerobottiglie']?>>
            </div>
            <div class="product-removal">
            <a href="elimina_da_carrello.php?idB=<?=$riga['idB']?>">
                <button class="btn btn-danger" onclick="verificaCarrello()">
                    Remove
                </button>
            </a>
            </div>
            <div class="product-line-price"><?=$riga['prezzo'] ?></div>
        </div>
    <?php
    }?>

        <!--RECAP SPESE-->
    <div class="totals" >
        <div class="totals-item">
            <label>Subtotale</label>
            <div class="totals-value" id="cart-subtotal">0</div>
            <label>Tasse (10%)</label>
            <div class="totals-value" id="cart-tax">0</div>
            <label>Spese di spedizione</label>
            <div class="totals-value" id="cart-shipping">0</div>
            <label>Totale</label>
            <div class="totals-value" id="cart-total">0</div>
            <label>L'ordine è un regalo? </label>
            <div class="gift" id="regalo"> <input type="checkbox" name="regalo"></div>
        </div>
    </div>

    <div style="width: 50%; margin: auto; height:min-content;">
        <button class="btn btn-warning"  onclick="window.location.href='pagamento.php?cliente=<?=$_SESSION['id']?>'">Checkout</button>
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

<script>
    /* Set rates + misc */
var taxRate = 0.1;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
updateQuantity(this);
});

$('.product-removal button').click( function() {
removeItem(this);
});

var subtotal = 0;

/* Sum up row totals */
$('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
});

/* Calculate totals */
var tax = subtotal * taxRate;

if(subtotal+tax>=60)
{
    var total = subtotal + tax;
    var shipping=(total>60 ? 0:shippingRate);
}
else
{
    var shipping = (total>60 ? 0:shippingRate);
    var total = subtotal + tax + shipping;
} 

/* Update totals display */
$('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
    $('.checkout').fadeOut(fadeTime);
    }else{
    $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
});

/* Update quantity */
function updateQuantity(quantityInput)
{
/* Calculate line price */
var productRow = $(quantityInput).parent().parent();
var price = parseFloat(productRow.children('.product-price').text());
var quantity = $(quantityInput).val();
var linePrice = price * quantity;

/* Update line price display and recalc cart totals */
productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
    $(this).text(linePrice.toFixed(2));
    recalculateCart();
    $(this).fadeIn(fadeTime);
    });
});  
}

</script>
<?php include('_footer_inc.php');?>