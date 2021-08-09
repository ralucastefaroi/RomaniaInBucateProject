<?php
require_once 'config.php';
       
                    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Vizualizare utilizatori</title>
    <link rel="stylesheet" href="css/crud_utilizator.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap');
#btn {background-color: #e6ccb3; color:#663300; border: none; border-radius: 10%;}
#back{text-decoration: none; color:#663300;}
</style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="admin_page.php" id="back">Înapoi</a></button>
    <h1>România în bucate</h1> 
	 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        
                        <a href="adaugare_utilizator.php" class="btn" style="background-color: #e6ccb3;color:#663300"><i class="fa fa-plus"></i> Adăugare utilizator</a><br><br>
                        <h2 class="text-center" style="color: #663300">Utilizatori</h2>
                    </div>
                    <?php
                    $sql = "SELECT * FROM utilizatori";
                    if($result = mysqli_query($mysqli, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>username</th>";
                                        echo "<th>Email utilizator</th>";
                                        echo "<th>Parola</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_utilizator'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email_utilizator'] . "</td>";
                                        echo "<td>" . $row['parola'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='update_utilizator.php?id=". $row['id_utilizator'] ."' class='mr-3' title='Editare utilizator' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>";
                                            echo "<a href='stergere_utilizator.php?id=". $row['id_utilizator'] ."' title='Ștergere utilizator' data-toggle='tooltip'><span class='fa fa-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Nu există utilizatori disponibili.</em></div>';
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
	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>