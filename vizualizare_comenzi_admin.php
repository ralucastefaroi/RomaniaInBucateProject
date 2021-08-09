<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'romania_in_bucate');
$mysqli= new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$status_finalizata = "Finalizata";
if($mysqli===false){
    die("ERROR: Could not connect.".$mysqli->connect_error);
}                 
   if(isset($_POST["updateStatus"])){
        $id_comanda = $_POST["hidden_id_comanda"];
        if(is_numeric($id_comanda)){
            if($stmt = $mysqli -> prepare("UPDATE comenzi SET status_comanda=? WHERE id_comanda='".$id_comanda."'"))
                {
                    
                    $stmt -> bind_param("s", $status_finalizata);
                    $stmt-> execute();
                    $stmt-> close();
                    header("location: vizualizare_comenzi_admin.php");
                }

                else{
                    echo "ERROR: nu se poate face update.";

            
                }
        }
   }    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vizualizare Comenzi</title>
    <link rel="stylesheet" href="css/comenzi_admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap');
</style>
</head>
 <button id="btn"><i class="fas fa-arrow-left"></i><a href="admin_page.php" id="back">Înapoi</a></button>
<body><h1>România în bucate</h1> 
	 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="text-center" style="color: #663300">Comenzi</h2>
                    </div>
                    <?php
                    
                    $sql = "SELECT * FROM comenzi";
                    if($result = mysqli_query($mysqli, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>ID Utilizator</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Total</th>";
                                        echo "<th>Data</th>";
                                        echo "<th>Adresa</th>";
                                        echo "<th>Telefon</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_comanda'] . "</td>";
                                        echo "<td>" . $row['id_utilizator'] . "</td>";
                                        echo "<td>" . $row['status_comanda'] . "</td>";
                                        echo "<td>" . $row['total_comanda'] . "</td>";
                                        echo "<td>" . $row['data_comanda'] . "</td>";
                                        echo "<td>" . $row['adresa'] . "</td>";
                                        echo "<td>" . $row['nr_telefon'] . "</td>";
                                        echo "<td>";
                                        ?>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                                             <input type="hidden" name="hidden_id_comanda" value="<?php echo $row["id_comanda"]; ?>" />
                                            <input type="submit" class ="btn" style="background-color: #e6ccb3;color:#663300" name="updateStatus" value="Finalizeaza">
                                        </form>
                                        <?php
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Nu există comenzi disponibile.</em></div>';
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