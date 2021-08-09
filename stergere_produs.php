<?php
require_once "config.php";


if(isset($_POST['id_produs']) && !empty($_POST["id_produs"])){

    require_once "config.php";
    $sql = "DELETE FROM produse WHERE id_produs = ? LIMIT 1";
    
    if($stmt = mysqli_prepare($mysqli, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id_produs);
        
        
        $param_id_produs = trim($_POST["id_produs"]);
        echo $param_id_produs;
        
        if(mysqli_stmt_execute($stmt)){
            header("location: vizualizare_produse.php");
            exit();
        } else{
            echo "Oops! Ceva nu este în regulă. Încercați mai târziu.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($mysqli);

}else{

    if(empty(trim($_GET["id"]))){

        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ștergere restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
.wrapper{width: 600px; margin: 0 auto;}
h2{color: #663300;}
#color{color: #663300;}
#btn {background-color: #e6ccb3; color:#663300; border: none; border-radius: 10%;}
#back{text-decoration: none; color:#663300;}
    </style>
</head>
<body>
     <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_produse.php" id="back">Înapoi</a></button>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Ștergere produs</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <input type="hidden" name="id_produs" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p class="color">Sigur ștergeți acest produs?</p>
                                <input type="submit" value="Da" class="btn" style="background-color: #e6ccb3;color:#663300">
                                <a href="vizualizare_produse.php" class="btn" style="background-color: #e6ccb3;color:#663300">Nu</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>