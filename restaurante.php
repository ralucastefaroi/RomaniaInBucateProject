<?php
session_start();
require_once 'config.php';                    
       
?>
<!DOCTYPE html>
<html>
<head>
  <title>Restaurante</title>
  <link rel="stylesheet" href="css/incercare.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
 
  <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');

body{ background-color: #e6ccb3;}
 input[type=text] { width: 250px;padding: 15px;margin: 5px 0 12px 0;display: inline-block;border: none;background: #f1f1f1;font-family: 'Open Sans';border-radius: 25px;}
input[type=text]:focus {background-color: #ddd; outline: none;}
h2{text-align: center;color: #663300;font-family: 'Amatic SC'; font-size: 40px;}
.denumire_restaurante{font-family: 'Amatic SC';font-size: 16px;text-align: center;font-weight: bold;color: #663300;font-size: 25px; margin-bottom: -20px;}
.descriere_restaurante{font-family: 'Open Sans', sans-serif;font-size: 16px;text-align: center;font-weight: bold;color: #663300;}
img{width: 350px; height: 200px;margin-bottom: -20px;}
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
      <a href="=regiune.php?regiune=Dobrogea">Dobrogea</a>
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
<br>
<h2>Restaurante tradiționale din Bucovina</h2>
<div class="row">

  	<?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Bucovina' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>
<h2>Restaurante tradiționale din Transilvania</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Transilvania' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Maramures</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Maramures' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Crisana</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Crisana' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Moldova</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Moldova' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Muntenia</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Muntenia' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Oltenia</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Oltenia' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Banat</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Banat' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>

<h2>Restaurante tradiționale din Dobrogea</h2>
<div class="row">

    <?php
        $sql = "SELECT * FROM restaurante WHERE regiune='Dobrogea' ";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="column">
     <img src="<?php echo $row["imagine_restaurant"];?>"/>
      <p class="denumire_restaurante"> <?php echo $row["denumire"];?></p><br><p class="descriere_restaurante"><?php echo $row["adresa"];?> <br>
        <a style="color: #4d2600;" href="<?php echo $row['harta'];?>">Vezi harta</a><br> <?php echo $row["rating"] ?> <i style="color:orange;" class="fas fa-star"></i></p>
      </div>

 <?php 
}
}
?>
</div>
</body>
</html>