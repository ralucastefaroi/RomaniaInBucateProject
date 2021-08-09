<?php 
require_once 'config.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Romania in bucate</title>
	<link rel="stylesheet" href="css/search.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
 
	<style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
.all{display:flex; flex-direction:row; flex-wrap:wrap; justify-content: space-between;margin: 0 auto; width: 90%;}
.cartonas{width:30%; display: flex; flex-direction:column; }
.restaurante{color:black;text-align: center;font-family: 'Open Sans';font-weight: bold;}
h3{font-family: 'Open Sans'; color: #663300;}
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
	<h2>Rezultatele căutării:</h2>
	<div class="all">
	<?php
			$search = mysqli_real_escape_string($mysqli, $_GET['input']);
			$sql = "SELECT * FROM retete WHERE denumire LIKE '%$search%' OR ingredient_1 LIKE '%$search%' OR ingredient_1 LIKE '%$search%' OR ingredient_2 LIKE '%$search%' OR ingredient_3 LIKE '%$search%' OR ingredient_4 LIKE '%$search%' OR ingredient_5 LIKE '%$search%' OR mod_preparare LIKE '%$search%' ";
		$result = mysqli_query($mysqli, $sql);
		$queryResult = mysqli_num_rows($result);
		if($queryResult > 0){
			while($row = mysqli_fetch_assoc($result))
			          {
          
        ?>
         <div class="cartonas">
            <a href='reteta.php?id=<?php echo $row['id_reteta']?>'><img width="100%" src="<?php echo $row["imagine_reteta"];?>"/>
            <p class="restaurante"> <?php echo $row["denumire"];?></p></a>
        </div>
 <?php 
}
	unset($row);
			unset($result);
			unset($queryResult);
		} else {
			echo '<h3>Rețeta căutată nu există!</h3>'; 
		}

?>
</div>
</body>
</html>