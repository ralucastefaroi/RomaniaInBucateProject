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
            'id_produs'         =>    $_GET["id"],
            'denumire'          =>    $_POST["hidden_name"],
            'pret'              =>    $_POST["hidden_price"],
            'cantitate'         =>    $_POST["cantitate"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
        }
        else
        {
            echo '<script>alert("Acest produs este deja adăugat în coș.")</script>';
        }
    }
    else
    {
        $item_array = array(
            'id_produs'       =>    $_GET["id"],
            'denumire'        =>    $_POST["hidden_name"],
            'pret'            =>    $_POST["hidden_price"],
            'cantitate'       =>    $_POST["cantitate"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["id_produs"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Produs șters.")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Romania in bucate</title>
    <link rel="stylesheet" href="css/cart.css">
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
  h2{font-family: 'Open Sans';text-align: center;
  color: #663300;
  }
  .table1{background-color: white; border-radius: 20px; margin-left: auto; margin-right: auto; font-family: 'Open Sans'; padding-top: 10px; padding-bottom: 10px; color: #4d2800;}
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
<h2>Coș de cumpărături</h2>
</div><br>
<form method="POST" action="checkout.php?action=checkout">
 
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                      ?>

<div style="margin-left: 20px;">
                <table class="table1">
                    <tr>
                        <th width="10%">Produs</th>
                        <th width="10%">Pret</th>
                        <th width="20%">Cantitate</th>
                        <th width="15%">Total</th>
                        <th width="5%"></th>
                    </tr>

                      <?php 
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                    ?>

                    <tr>
              
                        <td style="color: black;text-align: center;color: #663300;"><?php echo $values["denumire"]; ?></td>
                        <td style="color: black;text-align: center;color: #663300;"><?php echo $values["pret"]; ?> Lei</td>
                        <td style="color: black;text-align: center;color: #663300;"><?php echo $values["cantitate"]; ?></td>
                        <td style="color: black;text-align: center;color: #663300;"> <?php echo number_format($values["cantitate"] * $values["pret"], 2);?></td>
                        <td ><a style="color: white; " href="cart.php?action=delete&id=<?php echo $values["id_produs"]; ?>"><span><i style="color: #663300;" class="fas fa-trash"></i></span></a></td>
                    </tr>
                    <?php
                            $total = $total + ($values["cantitate"] * $values["pret"]);
                        }
                    ?>
                    <tr>
                        <th style="color: #4d2800;  font-size: 20px; font-style: italic; border-radius: 20px;"  colspan="3" align="right">Total</td>
                        <td style="color: #4d2800;font-size: 20px; font-style: italic;" align="center"> <?php echo number_format($total, 2); ?> Lei</td>
                        <td></td>
                        </th>
                    </tr>
           </table>

                    <input type="hidden" name="pret_total" value="<?php echo $total; ?>">
                    <button  type="submit" name="checkout" style="margin-top:25px; background-color: #993300; border: none; color: white; padding: 12px 28px; text-align: center; text-decoration: none; display: block; font-size: 20px; border-radius: 12px; float: right; margin-right: 180px;">Checkout</button>
                    <?php
                    }
                    else{
                      echo'<div style="text-align:center;">Cosul este gol!</div>';
                    }
                    ?>

                             </div>
          
 </form>
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