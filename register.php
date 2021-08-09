 <?php
require_once "config.php";
$username = $password = $confirm_password=$email=$nume=$prenume="";
$username_err= $password_err = $confirm_password_err=$email_err=$nume_err=$prenume_err= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["username"]))){
        $username_err= "Vă rugăm introduceți un username.";
    } 
    else {
        $sql ="SELECT * FROM utilizatori WHERE username='".$_POST["username"]."'";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) >= 1)
        {
            $username_err= "Acest username este folosit deja.";
        }else {
            $username= trim($_POST["username"]);    
        }    
    }


    if(empty(trim($_POST["password"])))
    {
        $password_err = "Vă rugăm introduceți o parolă.";
    }
    elseif (strlen(trim($_POST["password"]))<6)
     {
        $password_err = "Parola trebuie să conțină cel puțin 6 caractere.";
    }else
    {
        $password=trim($_POST["password"]);
    }


    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err= "Vă rugăm confirmați parola.";
    }
    else
        {
            $confirm_password=trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err= "Parolele nu coincid.";
            }
        }


    
      if(empty(trim($_POST["email"]))){
        $email_err= "Vă rugăm introduceți un email.";
    } 
    else {

        $sql ="SELECT * FROM utilizatori WHERE email_utilizator='".$_POST["email"]."'";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) >= 1)
        {
            $email_err= "Acest email este folosit deja.<br>";
        }else {
            $email= trim($_POST["email"]);    
        }    
    }


    if(empty(trim($_POST["nume"])))
    {
        $nume_err= "Vă rugăm introduceți numele.";
    }
    else
        {
            $nume=trim($_POST["nume"]);
        }


    if(empty(trim($_POST["prenume"])))
    {
        $prenume_err= "Vă rugăm introduceți prenumele.";
    }
    else
        {
            $prenume=trim($_POST["prenume"]);
        }



        if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($nume_err) && empty($prenume_err)){

            
            $sql = "INSERT INTO utilizatori (username, email_utilizator, parola, nume, prenume) VALUES (?, ?, ?, ?, ?)";
            if($stmt = $mysqli->prepare($sql)){
                
                $stmt->bind_param("sssss", $param_username, $param_email, $param_password, $param_nume, $param_prenume);

                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); 
                $param_email = $email;
                $param_nume = $nume; 
                $param_prenume = $prenume; 

                
                if ($stmt->execute())
                {
                    header ("location: login.php");
                }else
                 {
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
    <title>Register Page</title>
    <link rel="stylesheet" href="css/register.css">
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
</style> 
</head>
<body>
<button id="btn"><i class="fas fa-arrow-left"></i><a href="pagina_principala.php" id="back">Înapoi</a></button>
<h1>România în bucate</h1> 
<p id="inr">Înregistrare</p><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div id="register">

        <div class="form-group <?php echo (!empty($nume_err) )? 'has-error' :''; ?> ">
        <label><b>Nume*</b></label><br>
        <input type="text" placeholder="Numele dvs." name="nume" value="<?php echo $nume;?>"><br>
        <span class="help-block"><?php echo $nume_err;?></span></div>

         <div class="form-group <?php echo (!empty($prenume_err) )? 'has-error' :''; ?> ">
        <label><b>Prenume*</b></label><br>
        <input type="text" placeholder="Prenumele dvs." name="prenume" value="<?php echo $prenume;?>"><br>
        <span class="help-block"><?php echo $prenume_err;?></span></div>

        <div class="form-group <?php echo (!empty($username_err) )? 'has-error' :''; ?> ">
        <label><b>Username*</b></label><br>
        <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>"><br>
        <span class="help-block"><?php echo $username_err;?></span></div>

        <div class="form-group <?php echo (!empty($email_err) )? 'has-error' :''; ?> ">
        <label><b>Email*</b></label><br>
        <input type="text" placeholder="Email" name="email" value="<?php echo $email;?>"><br>
        <span class="help-block"><?php echo $email_err;?></span></div>

        <div class="form-group <?php echo (!empty($password_err) )? 'has-error' :''; ?> ">
        <label><b>Parolă*</b></label><br>
        <input type="password" placeholder="Parolă" name="password" value="<?php echo $password;?>"><br>
        <span class="help-block"><?php echo $password_err;?></span>

        <div class="form-group <?php (!empty($confirm_password_err)) ? 'has-error':'';?>">
        <label><b>Confirmă parola*</b></label><br>
        <input type="password" placeholder="Confirmă parola" name="confirm_password" value="<?php echo $confirm_password;?>"><br>
        <span class="help-block"><?php echo $confirm_password_err;?></span></div>


        <button type="submit" id="registerbtn">Înregistrare</button>
  </div>
        </form>
  <div id="login">
    <p>Ai deja un cont? <a href="login.php">Autentifică-te aici</a>.</p>
  </div>
</form>
</body>
</html>








