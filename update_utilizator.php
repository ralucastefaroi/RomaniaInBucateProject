<?php 
require_once 'config.php';

    if (isset($_POST['submit']))

    {
        if (is_numeric($_POST['id_utilizator']))
        {
            
            $id= $_POST['id_utilizator'];
            $username = htmlentities($_POST['username'], ENT_QUOTES);
            $email_utilizator = htmlentities($_POST['email_utilizator'], ENT_QUOTES);
            if($username=='' || $email_utilizator==''){
                echo "<div>ERROR: Completati campurile obligatorii!</div>";
            }
            else{
                if($stmt = $mysqli -> prepare("UPDATE utilizatori SET username=?, email_utilizator=? WHERE id_utilizator='".$id."'"))
                {
                    $stmt -> bind_param("ss", $username, $email_utilizator);
                    $stmt-> execute();
                    $stmt-> close();
                    header("location: vizualizare_utilizatori.php");
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
        echo "Editare cont utilizator";
    } 
    ?>
    </title>
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/update_utilizator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
    </style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_utilizatori.php" id="back">Înapoi</a></button>
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
                if($result= $mysqli->query("SELECT * FROM utilizatori WHERE id_utilizator='".$_GET['id']."'"))
                {
                    if ($result->num_rows> 0){
                        $row =$result->fetch_object();  
                    }
                }}
                $mysqli->close();
                ?>
                </p>    
                 <h2>Editare cont utilizator</h2><br>
                    <div class="form-group">
                        <label>ID</label> 
                            <input type="text" name="id_utilizator" class="form-control" value="<?php echo $row->id_utilizator; ?>" style="pointer-events: none;"/>
                    </div>
                  <div class="form-group">
                        <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $row->username; ?>"></div>
                    <div class="form-group">      
                        <label>Email</label>
                            <input type="text" name="email_utilizator" class="form-control" value="<?php echo $row->email_utilizator; ?>"/>
                    </div>
            
               
                <input type="submit" name="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Editare"/>
                <a href="vizualizare_utilizatori.php" class="btn" style="background-color: #e6ccb3;color:#663300;">Anulare</a>
            </div>
            </div>
            </div>
            </div>
        </div>
    </form>
</body>
</html>