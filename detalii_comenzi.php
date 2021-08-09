<?php
require_once ('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/detalii_comenzi.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap');
body{
  background-color: #e6ccb3;
}
#btn {background-color: #663300;color:#e6ccb3;border: none;border-radius: 10%;}
#back{text-decoration: none;color:#e6ccb3;}
.align{
  text-align:center; border: 2px solid #663300;border-radius:20px;width:15%; margin:auto;  background-color:#663300;color:white;}
  .total{text-align:center; border: 2px solid #663300;border-radius:20px;width:15%; margin:auto;  background-color:#663300;color:white;}
@media screen and (max-width: 500px) {.align{width: 80%;}
span{font-weight: bold;}
</style>
<head>
	<title></title>
</head>
	<body>
            <button id="btn"><i class="fas fa-arrow-left"></i><a href="comenzi_utilizator.php" id="back">Înapoi</a></button>
        <h1>România în bucate</h1> 
	 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="text-center" style="color: #663300">Detalii comandă</h2><br>
                    </div>
                    <?php
                    $sql = "SELECT * FROM detalii_comenzi WHERE id_comanda=". $_GET["id"];
                    if($result = mysqli_query($mysqli, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<div class='total'>Total: "  . $_GET['total_comanda'] . "</div><br>";
                            while($row = mysqli_fetch_array($result)){
                        	  echo "<div class='align'>";
                                        echo "<span>Produs: " .  $row['denumire_produs'] . "</span><br>";
                                        echo "<span>Cantitate: "  . $row['cantitate'] . "</span><br>";
                                        echo"</div><br>";
                                        
                                }
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Nu există produse disponibile.</em></div>';
                        }
                    } else{
                        echo "Oops! Ceva nu e în regulă. Încearcă mai târziu.";
                    }
 
                    mysqli_close($mysqli);
                    ?>
                </div>
            </div>        
        </div>
    </div>
	

</body>
</html>