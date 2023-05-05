<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?=$pagina?></title>
	<link rel="icon" href="../img/icoPaoloni.png" type="image/png">
    
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</head>

<body style="background-color: #ebebeb;">

    <!--Side Navbar-->
    <div class="sidebar">
        <ul style="padding-left: 20px;">
            <li style="list-style-type: none;">
                <div class="logo"><img src="../img/LOGO_scritta_oro.png" alt="error" class="logo_img"></div>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="dashboard.php">
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="venditeclienti.php">
                    <span class="text">Vendite</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="visite.php">
                    <span class="text">Visite</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="vigneti.php">
                    <span class="text">Vigneti</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="prodottichimici.php?a=3">
                    <span class="text">Prodotti chimici</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="certificazioni.php">
                    <span class="text">Certificazioni</span>
                </a>
            </li>
            <hr class="separatore">
            <li style="list-style-type: none;">
                <a href="clienti.php">
                    <span class="text">Clienti</span>
                </a>
            </li>
            <hr class="separatore">
        </ul>
    </div>
    <!---Sidebar di log out-->
    <div class="LOsidebar bottom-0 start-0">
    <a href="logout_dashboard.php"><img style="object-fit:contain;" src="../img/Dashboard/log-out-icon.png" alt="ERRORE" class="full"></a>

    </div>

    <!--Content-->
    <div class="content" style="padding-right: 5%;">