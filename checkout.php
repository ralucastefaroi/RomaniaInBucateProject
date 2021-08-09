<?php
require_once 'config.php';
session_start();
$total_comanda = $_POST["pret_total"];
$adresa_err = $nr_telefon_err = $tip_plata_err = "";
if(isset($_POST["submitCheckout"])){
  $id_utilizator =  $_SESSION["client_id"];
  $status_comanda = "Procesare";
  $data_comanda = date("d/m/Y");
  $total_comanda =  $_POST["total_price"];

  if(!empty($_POST['adresa'])) {
       $adresa = $_POST["adresa"];
  } else {
       $adresa_err = "Vă rugăm introduceți adresa.";
  }

  if(!empty($_POST['nr_telefon'])) {
       $nr_telefon = $_POST["nr_telefon"];
  } else {
        $nr_telefon_err = "Vă rugăm introduceți nr. de telefon.";
  }


  if(!empty($_POST['tip_plata'])) {
       $tip_plata= $_POST['tip_plata'];
  } else {
       $tip_plata_err = 'Vă rugăm selectați modalitatea de plată.';
  }

  if(empty($adresa_err) && empty($nr_telefon_err) && empty($tip_plata_err)){
   $sql = "INSERT INTO comenzi (id_utilizator, status_comanda, total_comanda, data_comanda, adresa, nr_telefon, tip_plata) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
           
            mysqli_stmt_bind_param($stmt, "isissis",  $param_id_utilizator, $param_status, $param_total, $param_data, $param_adresa, $param_telefon, $param_tip_plata);
            
            
            $param_id_utilizator = $id_utilizator;
            $param_status = $status_comanda;
            $param_total = $total_comanda;
            $param_data = $data_comanda;
            $param_adresa = $adresa;
            $param_telefon = $nr_telefon;
            $param_tip_plata = $tip_plata;
            
            if(mysqli_stmt_execute($stmt)){
                
              $sql = "SELECT id_comanda FROM comenzi WHERE id_utilizator=". $_SESSION["client_id"] . " AND status_comanda='Procesare'" ;
              if($result = mysqli_query($mysqli, $sql)){ 
                  if(mysqli_num_rows($result) > 0){
                      if ($row = $result->fetch_assoc()) {
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                          foreach($_SESSION["shopping_cart"] as $keys => $values)
                          {
                            $sql = "INSERT INTO detalii_comenzi (id_comanda, id_produs, denumire_produs, cantitate) VALUES (?, ?, ?, ?)";
                              if($stmt = mysqli_prepare($mysqli, $sql)){
                                mysqli_stmt_bind_param($stmt, "iisi",  $param_id_comanda, $param_id_produs,$param_denumire_produs, $param_cantitate_produs);
                                
                                $param_id_comanda = $row["id_comanda"];
                                $param_id_produs = $values["id_produs"];
                                $param_denumire_produs = $values['denumire'];
                                $param_cantitate_produs = $values["cantitate"];
                              
                                if(mysqli_stmt_execute($stmt)){

                                  header("location:pagina_principala.php");
                                 
                                    
                                } else{
                                    echo "Eroare la inserarea in detalii comenzi.";
                                }
                            }

                          }
                        }
                         unset($_SESSION['shopping_cart']);
                         exit();
                      }
                  }
            } else{
                echo "Eroare la inserarea comenzii trimise.";
            }
        }
         

        mysqli_stmt_close($stmt);
    }
    }
    
    mysqli_close($mysqli);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Plasează comanda</title>
	  <meta charset="UTF-8">
	  <link rel="stylesheet" type="text/css" href="css/checkout.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 <script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
 	<style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
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
</div>
<h2>Plasează comanda</h2>
<h3 style="text-align: center;">Completați formularul pentru a plasa comanda.</h3>
<form method="POST" >
 <div id="plasarecomanda" style="text-align: center;">
    <div class="form-group">
    <label><b>Nume</b></label><br>
    <input type="text" name="nume" value="<?php echo $_SESSION['nume_utilizator'];?>"><br>

     <label><b>Prenume</b></label><br>
    <input type="text" value="<?php echo $_SESSION['prenume_utilizator'];?>" name="prenume" ><br>

     <label><b>Adresă</b></label><br>
    <input type="text" placeholder="Stradă, bloc, apartament, oraș, județ..." name="adresa"><br>
     <span class="help-block"><?php echo $adresa_err;?></span><br>

     <label><b>Număr de telefon</b></label><br>
    <input type="text" placeholder="Numar de telefon" name="nr_telefon"><br>
     <span class="help-block"><?php echo $nr_telefon_err;?></span><br>

    <label><b>Selectati modalitatea de plata:</b></label><br>
    <label>
        <input type="radio" name="tip_plata" value="Ramburs">Ramburs (numerar la curier)
    </label><br>
    <label>
        <input type="radio" name="tip_plata" value="Card">Card (detaliile vor fi introduse pe pagina operatorului de plati)
    </label><br>
    <span class="help-block"><?php echo $tip_plata_err;?></span><br>
    <br>
    <input type="hidden" name="total_price" value="<?php echo $total_comanda;?>">
    <input type="submit" name="submitCheckout" style="font-family: 'Open Sans';" id="registerbtn" value="Trimite">
</div>
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
  function detalii_card(){

  }
}
</script>
</body>
</html>