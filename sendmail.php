<?php

  
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
 $nume = $email = $mesaj ="";
$nume_err = $email_err = $mesaj_err ="";
$alert ='';
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

if(isset($_POST['submit'])){

    //Validare nume
    if(empty(trim($_POST["nume"]))){
        $nume_err="Vă rugăm introduceți numele dvs.<br>";
    }
    else{
        $nume= trim($_POST["nume"]);
    }
    //Validare email
    if(empty(trim($_POST["email"]))){
        $email_err="Vă rugăm introduceți email-ul dvs.<br>";
    }
    else{
        $email = trim($_POST["email"]);
    }
    //Validare mesaj
    if(empty(trim($_POST["mesaj"]))){
        $mesaj_err="Vă rugăm introduceți mesajul.<br>";
    }
    else{
        $mesaj = trim($_POST["mesaj"]);
    }

if(empty($nume_err) && empty($email_err) && empty($mesaj_err)){
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'elenaralucastefaroi@gmail.com';
        $mail->Password = 'organicorganiccC1';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('elenaralucastefaroi@gmail.comm');
        $mail->addAddress('elenaralucastefaroi@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Mesaj Romania in bucate @ContactPage';
        $mail->Body = "<h3>Name : $nume <br> Email : $email <br>Message : $mesaj </h3>";

        $mail->send();
        $alert = '<script>alert("Mesajul dvs. a fost trimis!")</script>';
	} 
    catch (Exception $e) {
        $alert = '<div class="alert-error">
                 <span>'.$e->getMessage().'</span>
                 </div>';
	}
}
else{
    echo "<script>alert('Mesajul dvs nu a fost trimis. Completați toate câmpurile obligatorii!')</script>";
}
}
?>