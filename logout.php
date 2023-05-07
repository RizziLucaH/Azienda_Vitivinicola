<?php
//AVVIO LA SESSION
session_start();

//CANCELLO I DATI NELLA SESSIONE
session_unset();

//DISTRUGGO LA SESSIONE
session_destroy();

//TORNA ALLA PAGINA PRINCIPALE PER UTENTI
header('location: index.php');
?>