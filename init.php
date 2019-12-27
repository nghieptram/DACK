<?php
require_once('functions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Gán biến page giống với tên file
$page = basename($_SERVER['SCRIPT_NAME'], '.php');


$db = new PDO("mysql:host=localhost;dbname=doan1;charset=utf8", 'root', '');
$currentUser = null;

if (isset($_SESSION['userId'])) {
    $currentUser = findUserById($_SESSION['userId']);
  }


