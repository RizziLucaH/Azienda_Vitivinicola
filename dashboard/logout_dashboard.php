<?php
// ----------------------------------------------------------------------------------
// ------------------------------------LOGOUT----------------------------------------
// ----------------------------------------------------------------------------------
session_start();

//CANCELLO I DATI NELLA SESSIONE
session_unset();

//DISTRUGGO LA SESSIONE
session_destroy();

//TORNA ALLA PAGINA PRINCIPALE PER UTENTI PUBBLICI
header('location: ../index.php');
?>