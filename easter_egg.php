<?php
include('session_check.php');

$conn=db_connect();

/*
$result = info_vino($conn,$id);

$row = $result->fetch_assoc();
$nome=$row['nomevino'];
$prezzo=$row['prezzo'];

<?php aggiungi_carello($conn,$_SESSION['id'],$id)?>
*/
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

<link rel="stylesheet/less" type="text/css" href="./style/styleEgg.less" />
<script src="https://cdn.jsdelivr.net/npm/less" ></script>

<div class="single-card">
<div class="card-img ">
    <img src="https://i.pinimg.com/originals/f6/45/51/f6455156089967c9b421335e13a00d6f.jpg">
</div>
<div class="content">
    <div class="title">NATURE</div>
    <a style="color: black;" onclick="">aggiungi al carrello</a>
</div>
</div>

