<?php include 'sendmail.php';
require_once 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contactează-ne!</title>
</head>
<body>
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
h2{font-family: 'Open Sans'; text-align: center;color: #663300;}
label{font-family: 'Open Sans';color: #663300;font-weight: bold;}
textarea{font-family: 'Open Sans';display: inline-block;border: none;background: #f1f1f1;border-radius: 5px;padding: 10px;}
#btn{border: none; background-color:#663300;color:white;font-family: 'Open Sans';font-size: 15px;padding: 15px;border-radius: 10px;}
span{font-family: 'Open Sans'; font-weight: bold;}
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
<h2>Cu ce te putem ajuta?</h2>
<form action="" method="post">
    <div style="text-align: center;">
        <label>Numele complet*</label><br>
    <input type="text" name="nume" placeholder="Numele complet"><br>
    <span class="help-block"><?php echo $nume_err;?></span><br>
    <label>Email*</label><br>
    <input type="text" name="email" placeholder="Email-ul dvs."><br>
      <span class="help-block"><?php echo $email_err;?></span><br>
      <label>Mesajul tau*</label><br>
    <textarea name="mesaj" rows="4" cols="50" placeholder="Oferă-ne mai multe detalii pentru a te putea ajuta"></textarea><br><br>
    <span class="help-block"><?php echo $mesaj_err;?></span><br><br>
    <button type="submit" id="btn" name="submit">Trimite</button>
</div>
</form>
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
</script>
</body>
</html>