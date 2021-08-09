<?php
session_start();
$_SESSION=array();
session_destroy();
header("location:pagina_principala.php");
exit;
?>
