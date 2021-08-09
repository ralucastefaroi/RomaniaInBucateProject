<?php 
session_start();
require_once 'config.php';

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "id_produs");
        if(!in_array($_GET["id"], $item_array_id))
        {
  
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
            'id_produs'           =>    $_GET["id"],
            'denumire'            =>    $_POST["hidden_name"],
            'pret'                =>    $_POST["hidden_price"],
            'cantitate'           =>    $_POST["cantitate"]
                        );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
        }
        else
        {
 
            echo '<script>alert("Produsul a fost deja adăugat!")</script>';
        }
    }
    else
   {
        $item_array = array(
            'id_produs'        =>    $_GET["id"],
            'denumire'         =>    $_POST["hidden_name"],
            'pret'             =>    $_POST["hidden_price"],
            'cantitate'        =>    $_POST["cantitate"]

        );
        $_SESSION["shopping_cart"][0] = $item_array;
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
input[type=submit] { width: 200px;padding: 5px;margin: 2px 0 7px 0;display: inline-block;border: none;background: ##663300;font-family: 'Open Sans';border-radius: 25px; color:white;font-size: 20px; cursor: pointer;}
input[type=text]:focus {background-color: #ddd; outline: none;}
#raz {display: flex;flex-direction: row;justify-content: space-between;flex-wrap: wrap;padding: 0 60px;}
.articol {margin: 10px 20px 25px;}
.articol form {border-radius: 10px;}
.articol-continut {display: flex;flex-direction: column;justify-content: flex-start;align-items: center;font-family: "Open Sans";background-color: white;border-radius: 20px;}
.articol-continut h4, p {margin: 0;margin-bottom: 5px;}
.articol-continut input[name="cantitate"] {width: 50%;}
.cantitate {width: 70%;}
.articol-continut .titlu {font-weight: bold;font-size: 20px;}
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
     echo"<a href='cart.php'  style='color: white;font-size: 30px;float:right'><i class='fas fa-shopping-cart'></i> Cart</a>";
    echo "<a class='link' style='color: white; font-size:30px;float:right' href='cont_utilizator.php'><i class='far fa-user'></i> Contul meu</a>";}
  else{
    echo "<a class='link' style='color: white;font-size: 30px;float: right;' href='register.php'>Înregistrare</a>";
  }
  ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div><br>
<div id="raz">
<?php
         $sql="SELECT * FROM produse WHERE categorie='".$_GET['categorie']."'";
                 $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
        <div class="articol">
    <form method="post" action="cart.php?action=add&id=<?php echo $row["id_produs"]; ?>" >
          <div class="articol-continut">
          <img  style="width: 200px; height: 200px;" src="<?php echo $row["imagine_produs"];?>"/>
            <p style="  font-family: 'Open Sans'; text-align: center; font-weight: bold; font-size: 20px;"><?php echo $row["denumire"];?></p><p style="  font-family: 'Open Sans'; text-align: center;"><br>Gramaj: <?php echo $row["gramaj"];?><br>
              Pret: <?php echo $row["pret"];?> lei</p> <br>
              Cantitate: <input type="number" name="cantitate" value="1">

                <input type="hidden" name="hidden_name" value="<?php echo $row["denumire"]; ?>" />

                <input type="hidden" name="hidden_price" value="<?php echo $row["pret"]; ?>" />

                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Cumpără" /> 
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