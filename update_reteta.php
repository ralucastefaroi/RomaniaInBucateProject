<?php 
require_once 'config.php';


    if (isset($_POST['submit']))

    {
        if (is_numeric($_POST['id_reteta']))
        {
            $id= $_POST['id_reteta'];
            $denumire = htmlentities($_POST['denumire'], ENT_QUOTES); 
            $imagine_reteta = htmlentities($_POST['imagine_reteta'], ENT_QUOTES);
            $mod_preparare= htmlentities($_POST['mod_preparare'], ENT_QUOTES);
            $regiune = htmlentities($_POST['regiune'], ENT_QUOTES);
            $ingredient_1 = htmlentities($_POST['ingredient_1'], ENT_QUOTES);
            $ingredient_2 = htmlentities($_POST['ingredient_2'], ENT_QUOTES);
            $ingredient_3 = htmlentities($_POST['ingredient_3'], ENT_QUOTES);
            $ingredient_4 = htmlentities($_POST['ingredient_4'], ENT_QUOTES);
            $ingredient_5 = htmlentities($_POST['ingredient_5'], ENT_QUOTES);
            if($denumire=='' || $imagine_reteta=='' || $mod_preparare =='' || $regiune=='' || $ingredient_1==''){
                echo "<div>ERROR: Completati campurile obligatorii!</div>";
            }
            else{
                if($stmt = $mysqli -> prepare("UPDATE retete SET denumire=?, imagine_reteta=?, mod_preparare=?, regiune=?, ingredient_1=?, ingredient_2=?, ingredient_3=?, ingredient_4=?, ingredient_5=? WHERE id_reteta='".$id."'"))
                {
                    
                    $stmt -> bind_param("sssssssss", $denumire, $imagine_reteta, $mod_preparare, $regiune, $ingredient_1, $ingredient_2, $ingredient_3, $ingredient_4, $ingredient_5);
                    $stmt-> execute();
                    $stmt-> close();
                    header("location: vizualizare_retete.php");
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
        echo "Editare rețetă";
    } 
    ?>
    </title>
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/update_produs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
    </style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_retete.php" id="back">Înapoi</a></button>
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
                if($result= $mysqli->query("SELECT * FROM retete WHERE id_reteta='".$_GET['id']."'"))
                {
                    if ($result->num_rows> 0){
                        $row =$result->fetch_object();  
                    }
                }}
                
                ?>
                </p>    
                 <h2>Editare rețetă</h2><br>
                   <div class="form-group">
                        <label>ID</label> 
                            <input type="text" name="id_reteta" class="form-control" value="<?php echo $row->id_reteta; ?>" style="pointer-events: none;"/>
                    </div>
                  <div class="form-group">
                        <label>Denumire</label>
                            <input type="text" name="denumire" class="form-control" value="<?php echo $row->denumire; ?>"></div>
                    <div class="form-group">      
                        <label>Imagine</label>
                            <input type="text" name="imagine_reteta" class="form-control" value="<?php echo $row->imagine_reteta; ?>"/>
                    </div>
                     <div class="form-group">
                         <label>Mod de preparare</label> 
                            <input type="text" name="mod_preparare" class="form-control" value="<?php echo $row->mod_preparare; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Regiune</label> 
                            <input type="text" name="regiune" class="form-control" value="<?php echo $row->regiune; ?>"/>
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
                <input type="submit" name="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Editare"/>
                <a href="vizualizare_retete.php" class="btn" style="background-color: #e6ccb3;color:#663300;">Anulare</a>
            </div>
            </div>
            </div>
            </div>
        </div>
    </form>
</body>
</html>