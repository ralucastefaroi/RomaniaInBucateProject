<?php 
require_once 'config.php';

    if (isset($_POST['submit']))
    {
        if (is_numeric($_POST['id_restaurant']))
        {
            $id= $_POST['id_restaurant'];
            $denumire = htmlentities($_POST['denumire'], ENT_QUOTES);
            $adresa = htmlentities($_POST['adresa'], ENT_QUOTES);
            $imagine_restaurant= htmlentities($_POST['imagine_restaurant'], ENT_QUOTES);
            $harta= htmlentities($_POST['harta'], ENT_QUOTES);
            $rating= htmlentities($_POST['rating'], ENT_QUOTES);
            $regiune= htmlentities($_POST['regiune'], ENT_QUOTES);
            if($denumire=='' || $adresa=='' || $imagine_restaurant=='' || $harta=='' || $rating=='' || $regiune==''){
                echo "<div>ERROR: Completați câmpurile obligatorii!</div>";
            }
            else{
                if($stmt = $mysqli -> prepare("UPDATE restaurante SET denumire=?, adresa=?, imagine_restaurant=?, harta=?, rating=?, regiune=? WHERE id_restaurant='".$id."'"))
                {
                    $stmt -> bind_param("ssssss", $denumire, $adresa, $imagine_restaurant, $harta, $rating, $regiune);
                    $stmt-> execute();
                    $stmt-> close();
                }

                else{
                    echo "ERROR: nu se poate face update.";

            
                }
            }
        }
        else{echo "id incorect!";}
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>
        <?php if($_GET['id'] !='') 
    {
        echo "Editare restaurant";
    } 
    ?>
    </title>
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/update_restaurant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
    </style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_restaurante.php" id="back">Înapoi</a></button>
    <h1>
        <?php if($_GET['id']!='')
     {
        echo 'România in bucate';
     }
     ?> 
    </h1>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
    <form action="" method="post">
        <div>
            <?php if($_GET['id'] !='') {?>
                <input type="hidden" name="id" value="<?php $_GET['id']; ?>"/>
                <p> <?php
                if($result= $mysqli->query("SELECT * FROM restaurante WHERE id_restaurant='".$_GET['id']."'"))
                {
                    if ($result->num_rows> 0){
                        $row =$result->fetch_object();  
                    }
                }}
                $mysqli->close();
                ?>
                </p>    
                 <h2>Editare restaurant</h2><br>
                    <div class="form-group">
                        <label>ID</label> 
                            <input type="text" name="id_restaurant" class="form-control" value="<?php echo $row->id_restaurant; ?>" style="pointer-events: none;"/>
                    </div>
                  <div class="form-group">
                        <label>Denumire</label>
                            <input type="text" name="denumire" class="form-control" value="<?php echo $row->denumire; ?>">
                        </div>
                    <div class="form-group">      
                        <label>Adresa</label>
                            <input type="text" name="adresa" class="form-control" value="<?php echo $row->adresa; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Imagine</label> 
                            <input type="text" name="imagine_restaurant" class="form-control" value="<?php echo $row->imagine_restaurant; ?>"/>
                    </div>
                     <div class="form-group">
                         <label>Harta</label> 
                            <input type="text" name="harta" class="form-control" value="<?php echo $row->harta; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Rating</label> 
                            <input type="text" name="rating" class="form-control" value="<?php echo $row->rating; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Regiune</label> 
                             <input type="text" name="regiune" class="form-control" value="<?php echo $row->regiune; ?>"/>
                    </div>
               
                <input type="submit" name="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Editare"/>
                <a href="vizualizare_restaurante.php" class="btn" style="background-color: #e6ccb3;color:#663300;">Anulare</a>
            </div>
            </div>
            </div>
            </div>
        </div>
    </form>
</body>
</html>