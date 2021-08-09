<?php 
session_start();
require_once 'config.php';
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

body{
  background-color: #e6ccb3;
}

    input[type=text] { width: 250px;padding: 15px;margin: 5px 0 12px 0;display: inline-block;border: none;background: #f1f1f1;font-family: 'Open Sans';border-radius: 25px;}

input[type=text]:focus {background-color: #ddd; outline: none;}
img{
  width: 35%;}
h2{font-family: 'Amatic SC';font-size: 50px; color: #663300;text-align: center;font-weight: bold}
.modpreparare{width: 1000px; margin: 0 auto;font-family: 'Open Sans'; font-size: 20px;}
    @media screen and (max-width: 1200px) {
      .modpreparare{width:600px; margin: 0 auto; }
}
    @media screen and (max-width: 700px) {
      .modpreparare{width:350px; margin: 0 auto; }
}
#preparare{font-family: 'Open Sans';text-align: center;}
.ingrediente{text-align: center; font-family: 'Open Sans'; font-size: 18px; font-weight: bold;color: #663300;}
.print{border: none; font-family: 'Open Sans'; font-size: 15px;cursor:pointer; padding: 15px 32px; border-radius: 20px;background-color: #663300;color:white;text-decoration: none;}
.printAlign{width: 1000px;margin: 0 auto;}
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
<?php
         $sql="SELECT * FROM retete WHERE id_reteta='".$_GET['id']."'";
                 $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>

<h2> <?php echo $row["denumire"];?></h2>
<div style="text-align: center;">
   <img  src="<?php echo $row["imagine_reteta"];?>">
</div>
<h3 style="text-align: center; font-family: 'Open Sans';font-size: 20px">Ingrediente:</h3>
<div class="ingrediente">
    <?php echo $row["ingredient_1"];?><br>
     <?php if($row["ingredient_2"] != "" && $row["ingredient_2"] != "none"){
      echo $row["ingredient_2"];}?><br>
      <?php 
      if($row["ingredient_3"] != "" && $row["ingredient_3"] != "none"){
        echo $row["ingredient_3"]; 
      }
      ?><br>
    <?php if($row["ingredient_4"] != "" && $row["ingredient_4"] != "none"){
    echo $row["ingredient_4"];}?><br>

    <?php if($row["ingredient_5"] != "" && $row["ingredient_5"] != "none"){
    echo $row["ingredient_5"];}?><br>
</div>
<?php
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
  {}
  else{
echo' <div style="text-align: center; margin-top:30px;"><a class="print" href="login.php">Cumpără ingredientele</a></div><br>';}?>
<h3 id="preparare">Mod de preparare:</h3>
<div class="modpreparare">
	<p><?php echo $row["mod_preparare"];?> </p>
</div>



 <?php 
}
}
?>
<div style="text-align: center">
<button class="print"onclick="window.print()">Printează rețeta</button></div>

</body>
</html>