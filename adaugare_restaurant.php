<?php
require_once 'config.php';                
$denumire = $adresa = $imagine_restaurant = $harta = $rating = $regiune = "";
$denumire_err = $adresa_err = $imagine_restaurant_err = $harta_err = $rating_err = $regiune_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_denumire = trim($_POST["denumire"]);
    if(empty($input_denumire)){
        $denumire_err = "Introduceți denumirea restaurantului.";
    } else{
        $denumire = $input_denumire;
    }
    
    $input_adresa = trim($_POST["adresa"]);
    if(empty($input_adresa)){
        $adresa_err = "Introduceți adresa restaurantului.";     
    } else{
        $adresa = $input_adresa;
    }
  
    $input_imagine_restaurant = trim($_POST["imagine_restaurant"]);
    if(empty($input_imagine_restaurant)){
        $imagine_restaurant_err = "Introduceți imaginea restaurantului.";     
    } else{
        $imagine_restaurant = $input_imagine_restaurant;
    }

     $input_harta = trim($_POST["harta"]);
    if(empty($input_harta)){
        $harta_err = "Introduceți coordonatele hărții.";     
    } else{
        $harta = $input_harta;
    }

    $input_rating = trim($_POST["rating"]);
    if(empty($input_rating)){
        $rating_err = "Introduceți rating-ul restaurantului.";     
    } 
    else{
        $rating = $input_rating;
    }

    $input_regiune = trim($_POST["regiune"]);
    if(empty($input_regiune)){
        $regiune_err = "Introduceți regiunea.";     
    } 
    else{
        $regiune = $input_regiune;
    }

    if(empty($denumire_err) && empty($adresa_err) && empty($imagine_restaurant_err) && empty($harta_err) && empty($rating_err) && empty($regiune_err)){

        $sql = "INSERT INTO restaurante (denumire, adresa, imagine_restaurant, harta, rating, regiune ) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){

            mysqli_stmt_bind_param($stmt, "ssssss", $param_denumire, $param_adresa, $param_imagine_restaurant, $param_harta, $param_rating, $param_regiune);
            
            $param_denumire = $denumire;
            $param_adresa = $adresa;
            $param_imagine_restaurant = $imagine_restaurant;
            $param_harta = $harta;
            $param_rating = $rating;
            $param_regiune = $regiune;
            
            if(mysqli_stmt_execute($stmt)){

                header("location: vizualizare_restaurante.php");
                exit();
            } else{
                echo "Oops! Ceva nu este în regulă. Încercați mai târziu.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($mysqli);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adăugare restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adaugare_restaurant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
    </style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_restaurante.php" id="back">Înapoi</a></button>
    <h1>România în bucate</h1><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Adăugare restaurant</h2>
                    <p>Pentru adăugarea unui nou restaurant este necesară completarea formularului.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Denumire</label>
                            <input type="text" name="denumire" class="form-control <?php echo (!empty($denumire_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $denumire; ?>">
                            <span class="invalid-feedback"><?php echo $denumire_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Adresa</label>
                          <input type="text" name="adresa" class="form-control <?php echo (!empty($adresa_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $adresa; ?>">  
                            <span class="invalid-feedback"><?php echo $adresa_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Imagine</label>
                            <input type="text" name="imagine_restaurant" class="form-control <?php echo (!empty($imagine_restaurant_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $imagine_restaurant; ?>">
                            <span class="invalid-feedback"><?php echo $imagine_restaurant_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Coordonate harta</label>
                            <input type="text" name="harta" class="form-control <?php echo (!empty($harta_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $harta; ?>">
                            <span class="invalid-feedback"><?php echo $harta_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Rating</label>
                            <input type="text" name="rating" class="form-control <?php echo (!empty($rating_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rating; ?>">
                            <span class="invalid-feedback"><?php echo $rating_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Regiune</label>
                            <input type="text" name="regiune" class="form-control <?php echo (!empty($regiune_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $regiune; ?>">
                            <span class="invalid-feedback"><?php echo $regiune_err;?></span>
                        </div>
                        <input type="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Adaugă">
                        <a href="adaugare_restaurant.php" class="btn" style="background-color: #e6ccb3;color:#663300">Anulare</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>