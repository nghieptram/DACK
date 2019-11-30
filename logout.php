<?php 
require_once 'init.php';
unset($_SESSION['userId']);
header('Location: FormLogin.php');
?>