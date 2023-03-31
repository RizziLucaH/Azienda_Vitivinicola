<!--DA MODIFICARE GRAFICAMENTE (RITOCCHI O RIFARE)-->

<?php
require('_config_inc.php');
require('_db_dal_inc.php');

$conn= $conn= db_connect();

/*DISPLAY DEI VINI*/
$sql= "SELECT nomevino, prezzo FROM `bottiglia`";
$result = $conn->query($sql);
?>



</body>
</html>