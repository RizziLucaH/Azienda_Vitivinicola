<!--DA MODIFICARE GRAFICAMENTE AD ESEMPIO IL BOTTONE E IL TESTO DI FIANCO ALLE IMMAGINI-->
<?php
require('_config_inc.php');
require('_db_dal_inc.php');

$id= intval($_GET['idB']);

$conn=db_connect();

/*DISPLAY DELLE INFO*/
$sql= "SELECT B.nomevino as nomevino, B.prezzo as prezzo, B.descrizione as descrizione, 
B.gradoalcolico as gradoalcolico, B.annoproduzione as annoproduzione, V.profumo as profumo, V.gusto as gusto, V.retrogusto as retrogusto,
V.tannino as tannino, V.colore as colore, V.temperatura as temperatura FROM bottiglia B 
join vino V on V.idV=B.idV 
WHERE idB='$id'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
$nome=$row['nomevino'];
$prezzo=$row['prezzo'];
$desc=$row['descrizione'];
$grado=$row['gradoalcolico'];
$anno=$row['annoproduzione'];
$profumo=$row['profumo'];
$gusto=$row['gusto'];
$retrogusto=$row['retrogusto'];
$tannino=$row['tannino'];
$colore=$row['colore'];
$temperatura=$row['temperatura'];

$conn->close();

?>

<?php
$pagina="cantine";
?>

<?php include('_header_inc.php');?>

<div>
	
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src=" js/function.js"></script>
<script src=" js/functionBottiglia.js"></script>


<?php include('_footer_inc.php');?>
