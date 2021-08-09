<?php
require_once 'config.php';
session_start();
if(isset($_POST['submit-search'])){
  $search_input = $_POST['search'];
  if(!empty($search_input)){
    header("location:search.php?input=$search_input");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Romania in bucate</title>
	<link rel="stylesheet" href="css/incercare.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
 
	<style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
body{background-color: #e6ccb3;}
input[type=text] { width: 250px;padding: 15px;margin: 5px 0 12px 0;display: inline-block;border: none;background: #f1f1f1;font-family: 'Open Sans';border-radius: 25px;}
input[type=text]:focus {background-color: #ddd; outline: none;}
</style>
</style> 
</head>
<body>
<h1 style="font-family:'Amatic SC';text-align: center; font-size: 80px;">România în bucate</h1> 
<div class="topnav" id="myTopnav">
  <a href="pagina_principala.php" class="active" style="color: white;font-size: 30px; margin-left: 20px;">Acasă</a>
  <div class="dropdown">
    <button class="dropbtn" style="color: white;font-size: 30px;">Regiuni
    </button>
    <div class="dropdown-content">
     <a href="regiune.php?regiune=Bucovina">Bucovina</a>
      <a href="regiune.php?regiune=Transilvania">Transilvania</a>
      <a href="regiune.php?regiune=Maramures">Maramures</a>
      <a href="regiune.php?regiune=Crisana">Crisana</a>
      <a href="regiune.php?regiune=Oltenia">Oltenia</a>
      <a href="regiune.php?regiune=Banat">Banat</a>
      <a href="regiune.php?regiune=Muntenia">Muntenia</a>
      <a href="regiune.php?regiune=Moldova">Moldova</a>
      <a href="regiune.php?regiune=Dobrogea">Dobrogea</a>
    </div>
</div>
  <?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
  {
echo' <div class="dropdown">
    <button class="dropbtn" style="color: white;font-size: 30px;">Produse
    </button>
    <div class="dropdown-content">
       <a href="produse_categorie.php?categorie=Carne">Carne</a>
      <a href="produse_categorie.php?categorie=Lactate">Lactate</a>
      <a href="produse_categorie.php?categorie=Legume">Legume</a>
      <a href="produse_categorie.php?categorie=Bauturi">Bauturi</a>
      <a href="produse_categorie.php?categorie=Condimente">Condimente</a>
      <a href="produse_categorie.php?categorie=Alimente de baza">Alimente de baza</a>
    </div>
</div>'; }
?>
  <a href="restaurante.php" style="color: white;font-size: 30px;">Restaurante</a> 
   <a href="desprenoi.php" style="color: white;font-size: 30px;">Despre noi</a>
   <a href="contactpage.php" style="color: white;font-size: 30px;">Contact</a>

    <?php
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
  {
    echo "<a class='link' style='color: white;font-size: 30px;float:right;' href='logout.php'><i class='fas fa-sign-out-alt'></i> Logout</a>";
  }
  else{
    echo "<a class='link' style='color: white;font-size: 30px;float:right;' href='login.php'>Autentificare</a>";
  }
  ?>
  <?php
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
  {
     echo"<a href='cart.php'  style='color: white;font-size: 30px;float:right'><i class='fas fa-shopping-cart'></i> Coș</a>";
    echo "<a class='link' style='color: white; font-size:30px;float:right' href='cont_utilizator.php'><i class='far fa-user'></i> Contul meu</a>";}
  else{
    echo "<a class='link' style='color: white;font-size: 30px;float: right;' href='register.php'>Înregistrare</a>";
  }
  ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div><br>
  <form action="" method="POST"> 
    <div class="form-group" style="text-align: center;">
    <input type="text" name="search" placeholder="Caută rețetă...">
    <button type="submit" name="submit-search" id="searchbtn"><i class="fas fa-search" style="color: #663300;font-size: 20px;"></i></button></div>
  </form>
<div id="quote">
  <p>„Nu există dragoste mai sinceră decât cea pentru mâncare.”</p>
<p id='quoteauthor'>George Bernard Shaw</p>
</div><br>
<div class="row">
 <a href="regiune.php?regiune=Bucovina"><img src="Regiuni/bucovina.png"></a>
	<a href="regiune.php?regiune=Transilvania"><img src="Regiuni/transilvania.png"></a>
<a href="regiune.php?regiune=Maramures"><img src="Regiuni/maramures.png"></a>
</div>
<div class="row">
 <a href="regiune.php?regiune=Crisana"><img src="Regiuni/crisana.png"></a>
  <a href="regiune.php?regiune=Moldova"><img src="Regiuni/moldova.png"></a>
<a href="regiune.php?regiune=Muntenia"><img src="Regiuni/muntenia.png"></a>
</div>
<div class="row">
 <a href="regiune.php?regiune=Oltenia"><img src="Regiuni/oltenia.png"></a>
  <a href="regiune.php?regiune=Banat"><img src="Regiuni/banat.png"></a>
<a href="regiune.php?regiune=Dobrogea"><img src="Regiuni/dobrogea.png"></a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>