<?php
session_start();
require_once "Dao.php";
$dao = new Dao();
$username = $_POST['username']; 
$password = $_POST['password'];

$_SESSION['presets'] = array($_POST);

/*error handling:*/
$login_errors = array();
$valid = true; 
if (empty($username)){
  $login_errors[] = 'Please enter a user name.';
  $valid = false; 
}

if (!$dao->userExists($username)) {
    $login_errors[] = 'Incorrect user name or password.';
    $valid = false;
}

if (empty($password)) {
  $login_errors[] = 'Please enter a password';
  $valid = false;
} 

if ($dao->getPassword($username) != $password) {
    $login_errors[] = 'Incorrect user name or password.';
    $valid = false;
}

if (!$valid) {
  $_SESSION['login_errors'] = $login_errors;
  header("Location:../login.php");
  exit;
}

//If there are no errors, indicate the session is logged in and redirect to user page.
$_SESSION['login_errors'] = null;
$_SESSION['logged_in'] = true;
header("Location:../practicepage.php");
?>