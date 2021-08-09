<?php

require_once 'config.php';

 
$denumire = $imagine_reteta =  $mod_preparare = $regiune = $ingredient_1 = "";
$denumire_err = $imagine_reteta_err = $mod_preparare_err = $regiune_err = $ingredient_1_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ingredient_2 = $_POST["ingredient_2"];
    $ingredient_3 = $_POST["ingredient_3"];
    $ingredient_4 = $_POST["ingredient_4"];
    $ingredient_5 = $_POST["ingredient_5"];
    $none = "none";

    $input_ingredient_1 = $_POST["ingredient_1"];
    echo "ingredient 1 " . $input_ingredient_1;
    echo "<br>";

    if($input_ingredient_1 != $none){
         $ingredient_1 = $input_ingredient_1;
        
    } else {
        $ingredient_1_err = "Alegeți primul ingredient.";
        echo         $ingredient_1_err;
    }


    $input_denumire = trim($_POST["denumire"]);
    if(empty($input_denumire)){
        $denumire_err = "Introduceți denumirea rețetei.";
    } elseif(!filter_var($input_denumire, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $denumire_err = "Introduceți o denumire validă.";
    } else{
        $denumire = $input_denumire;
    }

    $input_imagine_reteta = trim($_POST["imagine_reteta"]);
    if(empty($input_imagine_reteta)){
        $imagine_reteta_err = "Introduceți imaginea retetei.";     
    } else{
        $imagine_reteta = $input_imagine_reteta;
    }

    
    $input_mod_preparare = trim($_POST["mod_preparare"]);
    if(empty($input_mod_preparare)){
        $mod_preparare_err = "Introduceți modul de preparare al rețetei.";
    } else{
        $mod_preparare = $input_mod_preparare;
    }
     $input_regiune = trim($_POST["regiune"]);
    if(empty($input_regiune)){
        $regiune_err = "Introduceți regiunea rețetei.";     
    } else{
        $regiune = $input_regiune;
    }

   
    if(empty($denumire_err) && empty($imagine_reteta_err) && empty($mod_preparare_err) && empty($regiune_err)){
        $sql = "INSERT INTO retete (denumire, imagine_reteta, mod_preparare, regiune, ingredient_1, ingredient_2, ingredient_3, ingredient_4, ingredient_5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
   
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_denumire, $param_imagine_reteta, $param_mod_preparare, $param_regiune, $param_ingredient_1, $param_ingredient_2, $param_ingredient_3, $param_ingredient_4, $param_ingredient_5);
            

            $param_denumire = $denumire;
            $param_imagine_reteta = $imagine_reteta;
            $param_mod_preparare = $mod_preparare;
            $param_regiune = $regiune;
            $param_ingredient_1 = $ingredient_1;
            $param_ingredient_2 = $ingredient_2;
            $param_ingredient_3 = $ingredient_3;
            $param_ingredient_4 = $ingredient_4;
            $param_ingredient_5 = $ingredient_5;
            

            if(mysqli_stmt_execute($stmt)){
                
                header("location: vizualizare_retete.php");
                exit();
            } else{
                echo "Oops! Ceva nu este în regulă. Încercați mai târziu.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adăugare rețetă</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adaugare_reteta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
 @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
h2{text-align: center;color: #994d00;}
#btn {background-color: #e6ccb3; color:#663300; border: none; border-radius: 10%;}
#back{text-decoration: none; color:#663300;}
</style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_retete.php" id="back">Înapoi</a></button>
    <h1>România în bucate</h1><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Adăugare rețetă</h2>
                    <p>Pentru adăugarea unui produs este necesară completarea formularului.</p>
                    <form style="margin-bottom: 10px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label>Denumire</label>
                            <input type="text" name="denumire" class="form-control <?php echo (!empty($denumire_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $denumire; ?>">
                            <span class="invalid-feedback"><?php echo $denumire_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Imagine</label>
                            <input type="text" name="imagine_reteta" class="form-control <?php echo (!empty($imagine_reteta_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $imagine_reteta; ?>">
                            <span class="invalid-feedback"><?php echo $imagine_reteta_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mod de preparare</label>
                            <input type="text" name="mod_preparare" class="form-control <?php echo (!empty($mod_preparare_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mod_preparare; ?>">
                            <span class="invalid-feedback"><?php echo $mod_preparare_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Regiune</label>
                            <input type="text" name="regiune" class="form-control <?php echo (!empty($regiune_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $regiune; ?>">
                            <span class="invalid-feedback"><?php echo $regiune_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Ingredient 1</label></br>
                            <select name="ingredient_1" id="ingredient_1" class="form-control">
                            <?php
                             echo "<option value='none'>None</option>";
                                $sql = "SELECT denumire FROM produse";
                                if($result = mysqli_query($mysqli, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            echo  "<option value='". $row['denumire']."'>".$row['denumire']. "</option>";
                                            }
                                         }
                                     }
                            ?>
                         </select>
                          <?php echo "<div class='invalid-feedback'>"  .$ingredient_1_err ." </div>"; ?>
                        </div>
                       
                        <div class="form-group">
                             <label>Ingredient 2</label></br>
                            <select name="ingredient_2" id="ingredient_2" class="form-control">
                            <?php
                            
                                $sql = "SELECT id_produs,denumire FROM produse";
                                if($result = mysqli_query($mysqli, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<option value='none'>None</option>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo  "<option value='". $row['denumire']."'>".$row['denumire']. "</option>";
                                            }
                                         }
                                     }
                            ?>
                         </select>
                        </div>
                        <div class="form-group">
                             <label>Ingredient 3</label></br>
                            <select name="ingredient_3" id="ingredient_3" class="form-control">
                            <?php
                                
                                $sql = "SELECT id_produs,denumire FROM produse";
                                if($result = mysqli_query($mysqli, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<option value='none'>None</option>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo  "<option value='". $row['denumire']."'>".$row['denumire']. "</option>";
                                            }
                                         }
                                     }
                            ?>
                         </select>
                        </div>
                         <div class="form-group">
                             <label>Ingredient 4</label></br>
                            <select name="ingredient_4" id="ingredient_4" class="form-control">
                            <?php
                                
                                $sql = "SELECT id_produs,denumire FROM produse";
                                if($result = mysqli_query($mysqli, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<option value='none'>None</option>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo  "<option value='". $row['denumire']."'>".$row['denumire']. "</option>";
                                            }
                                         }
                                     }
                            ?>
                         </select>
                        </div>
                         <div class="form-group">
                             <label>Ingredient 5</label></br>
                            <select name="ingredient_5" id="ingredient_5" class="form-control">
                            <?php
                                
                                $sql = "SELECT id_produs,denumire FROM produse";
                                if($result = mysqli_query($mysqli, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<option value='none'>None</option>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo  "<option value='". $row['denumire']."'>".$row['denumire']. "</option>";
                                            }
                                         }
                                     }
                            ?>
                         </select>
                        </div>
                        <input type="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Adaugă">
                        <a href="adaugare_reteta.php" class="btn" style="background-color: #e6ccb3;color:#663300" >Anulare</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <?php
     mysqli_close($mysqli);
?>
</body>
</html>