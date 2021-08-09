<?php
require_once 'config.php';

$denumire = $descriere = $categorie = $cantitate = $gramaj = $imagine_produs = $pret = "";
$denumire_err = $descriere_err = $categorie_err = $cantitate_err = $gramaj_err = $imagine_produs_err = $pret_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_denumire = trim($_POST["denumire"]);
    if(empty($input_denumire)){
        $denumire_err = "Introduceți denumirea produsului.";
    } elseif(!filter_var($input_denumire, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $denumire_err = "Introduceți o denumire validă.";
    } else{
        $denumire = $input_denumire;
    }
    
    $input_descriere = trim($_POST["descriere"]);
    if(empty($input_descriere)){
        $descriere_err = "";     
    } else{
        $descriere = $input_descriere;
    }
    
    $input_categorie = trim($_POST["categorie"]);
    if(empty($input_categorie)){
        $categorie_err = "Introduceți categoria produsului.";     
    } else{
        $categorie = $input_categorie;
    }

     $input_cantitate = trim($_POST["cantitate"]);
    if(empty($input_cantitate)){
        $cantitate_err = "Introduceți cantitatea.";     
    } else{
        $cantitate = $input_cantitate;
    }

    $input_gramaj = trim($_POST["gramaj"]);
    if(empty($input_gramaj)){
        $gramaj_err = "Introduceți gramajul.";     
    } 
 
    else{
        $gramaj = $input_gramaj;
    }

    //Validate imagine_produs
    $input_imagine_produs = trim($_POST["imagine_produs"]);
    if(empty($input_imagine_produs)){
        $imagine_produs_err = "Introduceți imaginea produsului.";     
    } else{
        $imagine_produs = $input_imagine_produs;
    }

    //Validate pret
    $input_pret = trim($_POST["pret"]);
    if(empty($input_pret)){
        $pret_err = "Introduceți prețul produsului.";     
    } else{
        $pret = $input_pret;
    }
    
    if(empty($denumire_err) && empty($descriere_err) && empty($categorie_err) && empty($cantitate_err) && empty($gramaj_err) && empty($imagine_produs_err) && empty($pret_err)){
        
        $sql = "INSERT INTO produse (denumire, descriere, categorie, cantitate, gramaj, imagine_produs, pret) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
          
            mysqli_stmt_bind_param($stmt, "sssissi", $param_denumire, $param_descriere, $param_categorie, $param_cantitate, $param_gramaj, $param_imagine_produs, $param_pret);
            
            $param_denumire = $denumire;
            $param_descriere = $descriere;
            $param_categorie = $categorie;
            $param_cantitate = $cantitate;
            $param_gramaj = $gramaj;
            $param_imagine_produs = $imagine_produs;
            $param_pret = $pret;
               
            if(mysqli_stmt_execute($stmt)){
                
                header("location: vizualizare_produse.php");
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
    <title>Adaugare produs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adaugare_produs.css">
    <script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
#btn {background-color: #e6ccb3; color:#663300; border: none; border-radius: 10%;}
#back{text-decoration: none; color:#663300;}
    </style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_produse.php" id="back">Înapoi</a></button>
    <h1>România în bucate</h1><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Adăugare produs</h2>
                    <p>Pentru adăugarea unui produs este necesară completarea formularului.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Denumire</label>
                            <input type="text" name="denumire" class="form-control <?php echo (!empty($denumire_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $denumire; ?>">
                            <span class="invalid-feedback"><?php echo $denumire_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Descriere</label>
                            <textarea name="descriere" class="form-control <?php echo (!empty($descriere_err)) ? 'is-invalid' : ''; ?>"><?php echo $descriere; ?></textarea>
                            <span class="invalid-feedback"><?php echo $descriere_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Categorie</label>
                            <input type="text" name="categorie" class="form-control <?php echo (!empty($categorie_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $categorie; ?>">
                            <span class="invalid-feedback"><?php echo $categorie_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Cantitate</label>
                            <input type="text" name="cantitate" class="form-control <?php echo (!empty($cantitate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cantitate; ?>">
                            <span class="invalid-feedback"><?php echo $cantitate_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Gramaj</label>
                            <input type="text" name="gramaj" class="form-control <?php echo (!empty($gramaj_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gramaj; ?>">
                            <span class="invalid-feedback"><?php echo $gramaj_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Imagine</label>
                            <input type="text" name="imagine_produs" class="form-control <?php echo (!empty($imagine_produs_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $imagine_produs; ?>">
                            <span class="invalid-feedback"><?php echo $imagine_produs_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Pret</label>
                            <input type="text" name="pret" class="form-control <?php echo (!empty($pret_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pret; ?>">
                            <span class="invalid-feedback"><?php echo $pret_err;?></span>
                        </div>
                        <input type="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Adaugă">
                        <a href="adaugare_produs.php" class="btn" style="background-color: #e6ccb3;color:#663300" >Anulare</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>