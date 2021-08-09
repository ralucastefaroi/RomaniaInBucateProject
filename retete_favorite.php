<?php
session_start();
require_once 'config.php';
if(isset($_POST['id_reteta_fav']) && !empty($_POST["id_reteta_fav"])){
    require_once "config.php";
    $sql = "DELETE FROM retete_favorite WHERE id_reteta = ? AND id_utilizator = " . $_SESSION['client_id'];
    
    if($stmt = mysqli_prepare($mysqli, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id_reteta_favorita);
        
        
        $param_id_reteta_favorita = trim($_POST["id_reteta_fav"]);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: retete_favorite.php");
            exit();
        } else{
            echo "Oops! Ceva nu este în regulă. Încercați mai târziu.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($mysqli);

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Retete favorite</title>
  <link rel="stylesheet" type="text/css" href="css/retete_favorite.css">
  <script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
	<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
</style>
</head>
<body>
  <button id="btn"><i class="fas fa-arrow-left"></i><a href="cont_utilizator.php" id="back">Înapoi</a></button>
<h1>Favoritele mele</h1>
<div class="all">
  	<?php
        $sql = "SELECT * FROM retete_favorite WHERE id_utilizator='" . $_SESSION["client_id"] . "'";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
          
        ?>
            <form  class="cartonas" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <a href='reteta.php?id=<?php echo $row['id_reteta']?>'><img width="100%" src="<?php echo $row["imagine_reteta"];?>"/>
            <p class="restaurante"> <?php echo $row["denumire_reteta"];?></p></a>
            <input type="hidden" name="id_reteta_fav" value="<?php echo $row['id_reteta'];?>">
            <button type="submit" id="remove" style="border:none;background-color: #e6ccb3;" name="remove"><i style="color: #663300;" class="fas fa-times-circle"></i></button><br><br>
        </form>
 <?php 
}
}
?>

</div>
</body>
</html>