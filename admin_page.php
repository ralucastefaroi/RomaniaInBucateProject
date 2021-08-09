<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/admin_page.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap');
.btn{background-color: #663300;border: none;border-radius: 100px; margin-bottom: 40px;}
.link{font-size: 50px;text-decoration: none;color:#e6ccb3;font-family: 'Amatic SC'; padding: 30px;}
.align{text-align: center;}
#modadmin{font-size: 50px;text-decoration: none;color:#e6ccb3;font-family: 'Amatic SC'; padding: 30px;}
#btn1 {background-color: #e6ccb3; color:#663300; border: none; border-radius: 10%;}
#back{text-decoration: none; color:#663300;font-family:'Open Sans'; font-weight: bold; font-size: 18px;}
</style>
</style> 
</head>
<body>
<button id="btn1"><i class="fas fa-arrow-left"></i><a href="pagina_principala.php" id="back">Înapoi</a></button>
<h1>România în bucate</h1> 
<h2 id="admin">Sunteți în modul<br> Administrator</h2><br>
<div class="align">
<button class="btn"><a class="link" href="vizualizare_retete.php">EDITARE REȚETE</a></button>
</div>
<div class="align">
<button class="btn"><a class="link" href="vizualizare_produse.php">EDITARE PRODUSE</a></button>
</div>
<div class="align">
<button class="btn"><a class="link" href="vizualizare_comenzi_admin.php">EDITARE COMENZI</a></button>
</div>
<div class="align">
<button class="btn"><a class="link" href="vizualizare_utilizatori.php">EDITARE UTILIZATORI</a></button>
</div>
<div class="align">
<button class="btn"><a class="link" href="vizualizare_restaurante.php">EDITARE RESTAURANTE</a></button>
</div>
<div  class="align">
<button class="btn"><a id="modadmin" href="logout.php">IEȘIRE DIN MODUL ADMINISTRATOR</a></button>
</div>
