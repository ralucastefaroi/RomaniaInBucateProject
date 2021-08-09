<?php 
require_once 'config.php';

    if (isset($_POST['submit']))

    {
        if (is_numeric($_POST['id_produs']))
        {
            
            $id= $_POST['id_produs'];
            $denumire = htmlentities($_POST['denumire'], ENT_QUOTES);
            $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
            $categorie = htmlentities($_POST['categorie'], ENT_QUOTES);
            $cantitate= htmlentities($_POST['cantitate'], ENT_QUOTES);
            $gramaj= htmlentities($_POST['gramaj'], ENT_QUOTES);
            $imagine_produs= htmlentities($_POST['imagine_produs'], ENT_QUOTES);
            $pret= htmlentities($_POST['pret'], ENT_QUOTES);
            if($denumire=='' || $categorie=='' || $cantitate=='' || $gramaj=='' || $imagine_produs=='' || $pret ==''){
                echo "<div>ERROR: Completati campurile obligatorii!</div>";
            }
            else{
                if($stmt = $mysqli -> prepare("UPDATE produse SET denumire=?, descriere=?, categorie=?, cantitate=?, gramaj=?, imagine_produs=?,
                pret=? WHERE id_produs='".$id."'"))
                {
                    
                    $stmt -> bind_param("sssissi", $denumire, $descriere, $categorie, $cantitate, $gramaj, $imagine_produs, $pret);
                    $stmt-> execute();
                    $stmt-> close();
                    header("location: vizualizare_produse.php");
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
        echo "Editare produs";
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
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_produse.php" id="back">Înapoi</a></button>
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
                if($result= $mysqli->query("SELECT * FROM produse WHERE id_produs='".$_GET['id']."'"))
                {
                    if ($result->num_rows> 0){
                        $row =$result->fetch_object();  
                    }
                }}
                $mysqli->close();
                ?>
                </p>    
                 <h2>Editare produs</h2><br>
                    <div class="form-group">
                        <label>ID</label> 
                            <input type="text" name="id_produs" class="form-control" value="<?php echo $row->id_produs; ?>" style="pointer-events: none;"/>
                    </div>
                  <div class="form-group">
                        <label>Denumire</label>
                            <input type="text" name="denumire" class="form-control" value="<?php echo $row->denumire; ?>"></div>
                    <div class="form-group">      
                        <label>Descriere </label>
                            <input type="text" name="descriere" class="form-control" value="<?php echo $row->descriere; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Categorie</label> 
                            <input type="text" name="categorie" class="form-control" value="<?php echo $row->categorie; ?>"/>
                    </div>
                     <div class="form-group">
                         <label>Cantitate</label> 
                            <input type="text" name="cantitate" class="form-control" value="<?php echo $row->cantitate; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Gramaj</label> 
                            <input type="text" name="gramaj" class="form-control" value="<?php echo $row->gramaj; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Imagine produs</label> 
                             <input type="text" name="imagine_produs" class="form-control" value="<?php echo $row->imagine_produs; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Pret</label> 
                            <input type="text" name="pret" class="form-control" value="<?php echo $row->pret; ?>"/>
                    </div>
               
                <input type="submit" name="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Editare"/>
                <a href="vizualizare_produse.php" class="btn" style="background-color: #e6ccb3;color:#663300;">Anulare</a>
            </div>
            </div>
            </div>
            </div>
        </div>
    </form>
</body>
</html>