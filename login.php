<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
{
    header("location:pagina_principala.php");
    exit;
}

require_once "config.php";

$username=$password="";
$username_err=$password_err="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty(trim($_POST["username"]))){
        $username_err="Vă rugăm introduceți username-ul.";
    }
    else{
        $username= trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err= "Vă rugăm introduceți parola.";
    }
    else{
        $password=trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql="SELECT id_utilizator, username, parola, nume, prenume FROM utilizatori WHERE username=?";
        if($stmt = $mysqli ->prepare($sql)){
            $stmt->bind_param("s", $param_username);

            $param_username=$username;

            if($stmt->execute()){
                $stmt->store_result();

                if($stmt->num_rows==1)
                {
                    $stmt->bind_result($id, $username, $hashed_password, $nume, $prenume);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            session_start();

                  
                            $_SESSION["loggedin"]=true;
                            $_SESSION["client_id"]=$id;
                            $_SESSION["username"]=$username;
                            $_SESSION["nume_utilizator"]=$nume;
                            $_SESSION["prenume_utilizator"]=$prenume;

                            if($_SESSION["username"]=="admin"){
                            header("location:admin_page.php");
                        } else{
                            header("location:pagina_principala.php");
                        }
                        }
                        else{
                            $password_err="Parola introdusă nu este validă.";
                        }
                    }
                    }   else{
                            $username_err="Nu există niciun cont cu acest username.";
                        }
                        } else{
                            echo "Oops! Ceva nu este în regulă. Încercați mai târziu.";
                        }
                    }

                    $stmt->close();
                }

                $mysqli->close();
            }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Pages</title>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/e13934f56d.js" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap');
#btn {background-color: #e6ccb3;color:#663300;border: none;border-radius: 10%;font-family: 'Open Sans';font-weight: bold;font-size: 18px;}
#back{text-decoration: none;color:#663300;}
</style>
</head>
<body>
    <button id="btn"><i class="fas fa-arrow-left"></i><a href="pagina_principala.php" id="back">Înapoi</a></button>
<h1>România în bucate</h1> 
<p id="inr">Autentificare</p><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
    <div id="register">

    <label><b>Username </b></label><br>
     <div class="form-group <?php echo(!empty($username_err))? 'has-error' : '';?> ">
    <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>"><br>
        <span class="help-block"><?php echo $username_err;?></span><br></div>

    <label><b>Parola</b></label><br>
     <div class="form-group <?php echo (!empty($password_err))? 'has-error' : '';?>">
    <input type="password" placeholder="Parola" name="password" value="<?php echo $password;?>"><br>
     <span class="help-block"><?php echo $password_err;?></span></div>
    <button type="submit" id="registerbtn" name="login">Autentificare</button>
  </div>
  </form>
  <div id="login">
    <p>Nu ai un cont? <a href="register.php">Înregistreaza-te aici</a>.</p>
  </div>
</form>
</body>
</html>