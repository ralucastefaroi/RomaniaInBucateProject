<?php

require_once 'config.php';

$username = $email_utilizator = $parola = "";
$username_err = $email_utilizator_err = $parola_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Introduceți username-ul.";     
    } else{
        $username = $input_username;
    }
    
  
    $input_email_utilizator = trim($_POST["email_utilizator"]);
    if(empty($input_email_utilizator)){
        $email_utilizator_err = "Introduceți emailul utilizatorului.";     
    } else{
        $email_utilizator = $input_email_utilizator;
    }

     $input_parola = trim($_POST["parola"]);
    if(empty($input_parola)){
        $parola_err = "Introduceți parola."; 
    }
        elseif (strlen(trim($_POST["parola"]))<6) {
                $parola_err="Parola trebuie să conțină cel puțin 6 caractere.";   
    } else{
        $parola= $input_parola;
    }

    
    
    if(empty($username_err) && empty($email_utilizator_err) && empty($parola_err)){
        
        $sql = "INSERT INTO utilizatori (username, email_utilizator, parola) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
    
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email_utilizator, $param_parola);
            
             $param_username = $username;
             $param_parola = password_hash($parola, PASSWORD_DEFAULT); 
             $param_email_utilizator = $email_utilizator;
            
            if(mysqli_stmt_execute($stmt)){
                
                header("location: vizualizare_utilizatori.php");
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
    <title>Adăugare utilizator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adaugare_utilizator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
#btn {background-color: #e6ccb3;color:#663300;border: none;border-radius: 10%;}

#back{text-decoration: none; color:#663300;}
    </style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="vizualizare_utilizatori.php" id="back">Înapoi</a></button>
    <h1>România în bucate</h1><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Adăugare utilizator</h2>
                    <p>Pentru adăugarea unui nou utilizator este necesară completarea formularului.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            
                        <div class="form-group">
                            <label>Email utilizator</label>
                            <input type="text" name="email_utilizator" class="form-control <?php echo (!empty($email_utilizator_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_utilizator; ?>">
                            <span class="invalid-feedback"><?php echo $email_utilizator_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <input type="text" name="parola" class="form-control <?php echo (!empty($parola_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $parola; ?>">
                            <span class="invalid-feedback"><?php echo $parola_err;?></span>
                        </div>
                       
                        <input type="submit" class="btn" style="background-color: #e6ccb3;color:#663300" value="Adaugă">
                        <a href="adaugare_utilizator.php" class="btn" style="background-color: #e6ccb3;color:#663300" >Anulare</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>