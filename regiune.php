<?php
require_once 'config.php';
session_start();
if(isset($_POST["add_to_favorite"]))
{
  $id_reteta = $_POST["id_reteta"];
  $id_utilizator =  $_SESSION["client_id"];
  $denumire_reteta = $_POST["denumire_reteta"];
  $imagine_reteta = $_POST["imagine"];


        $sql = "SELECT * FROM retete_favorite WHERE id_reteta=" . $id_reteta . " AND id_utilizator=". $id_utilizator;
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) >= 1)
        {
            echo "<script>alert('Aceasta reteta este deja adaugata in favorite!')</script>";
        }else {
        
         $sql = "INSERT INTO retete_favorite(id_reteta, id_utilizator, denumire_reteta, imagine_reteta) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
            
            mysqli_stmt_bind_param($stmt, "iiss", $param_id_reteta, $param_id_utilizator, $param_denumire_reteta, $param_imagine_reteta);
            
           
            $param_id_reteta = $id_reteta;
            $param_id_utilizator = $id_utilizator;
            $param_denumire_reteta = $denumire_reteta;
            $param_imagine_reteta = $imagine_reteta;
            
           
            if(mysqli_stmt_execute($stmt)){
                header("location: pagina_principala.php");
                exit();
            } else{
                echo "Oops! Ceva nu este în regulă. Încercați mai târziu.";
            }
        }

}
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Romania in bucate</title>
  <link rel="stylesheet" href="css/regiune.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
 
  <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');

body{background-color: #e6ccb3; box-sizing: border-box;}
input[type=text] { width: 250px;padding: 15px;margin: 5px 0 12px 0;display: inline-block;border: none;background: #f1f1f1;font-family: 'Open Sans';border-radius: 25px;}

input[type=text]:focus {background-color: #ddd; outline: none;}
 h2{text-align: center;color: #663300;font-family: 'Amatic SC'; font-size: 40px;font-weight: bold}
.imageContainer > img:hover {width: 500px;height: 200px;}
#raz {display: flex;flex-direction: row;justify-content: space-between;flex-wrap: wrap;padding: 0 100px;}
.border{border-radius: 20%;}
.articol {margin: 10px 20px 25px;}
.articol form { border-radius: 10px;}
.articol-continut {display: flex;flex-direction: column;justify-content: flex-start;align-items: center;font-family: "Open Sans";}
.articol-continut h4, p {margin: 0;margin-bottom: 5px;}
.articol-continut input[name="cantitate"] { width: 50%;}
a{text-decoration: none;color:#663300;}
#btn{background-color: #e6ccb3;color:#663300;font-size: 25px;cursor:pointer;}
.style{font-family: 'Open Sans', sans-serif;font-size: 16px;text-align: center;font-weight: bold;}
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
  <form action="search.php" method="POST"> 
    <div class="form-group" style="text-align: center;">
    <input type="text" name="search" placeholder="Caută rețetă...">
    <button type="submit" name="submit-search" id="searchbtn"><i class="fas fa-search" style="color: #663300;font-size: 20px;"></i></button></div>
  </form>
<br><br>
<h2>Retete tradiționale din <?php echo $_GET["regiune"]; ?> </h2>
<div id="raz">
  	<?php
        $sql = "SELECT * FROM retete WHERE regiune='" . $_GET["regiune"] . "'";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
 <div class="articol">
  <a href='reteta.php?id=<?php echo $row['id_reteta']?>'><img class="border" src="<?php echo $row["imagine_reteta"];?>"/>
      <p class="style"> <?php echo $row["denumire"];?></p></a><br>
        <form method="POST" action="">
          <div class="articol-continut">
          <input type="hidden" name="id_reteta" value="<?php echo $row["id_reteta"];?>">
          <input type="hidden" name="denumire_reteta" value="<?php echo $row["denumire"];?>">
          <input type="hidden" name="imagine" value="<?php echo $row["imagine_reteta"];?>">

          <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
  {
          echo'<button type="submit" style="border:none;background-color: #e6ccb3;" name="add_to_favorite"><i id="btn" class="far fa-heart"></i></button>';} ?>
          </div>
    </form>
</div>
 <?php 
}
}
?>
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