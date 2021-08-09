<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contul meu</title>
    <link rel="stylesheet" href="css/cont_utilizator.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap');
.btn{background-color: #663300;border: none;border-radius: 100px; margin-bottom: 40px;}
.link{font-size: 50px;text-decoration: none;color:#e6ccb3;font-family: 'Amatic SC'; padding: 20px;}
.align{text-align: center;}
#modadmin{font-size: 50px;text-decoration: none;color:#e6ccb3;font-family: 'Amatic SC'; padding: 50px;}
#btn {background-color: #e6ccb3;color:#663300;border: none;border-radius: 10%;font-family: 'Open Sans';font-weight: bold;font-size: 18px;}
#back{text-decoration: none;color:#663300;}
</style>
</head>
<body>
	<button id="btn"><i class="fas fa-arrow-left"></i><a href="pagina_principala.php" id="back">Înapoi</a></button>
<h1>România în bucate</h1> 
<h2 id="admin">Contul meu</h2><br>
<div class="align">
<button class="btn"><a class="link" href="retete_favorite.php">REȚETE FAVORITE</a></button>
</div>
<div class="align">
<button class="btn"><a class="link" href="comenzi_utilizator.php">COMENZILE MELE</a></button>
</div>
<div  class="align">
<button class="btn"><a id="modadmin" href="logout.php">IEȘIRE DIN CONT</a></button>
</div>
