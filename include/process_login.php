<?php
session_start();
require_once "Dao.php";
$dao = new Dao();
$_SESSION['username'] = htmlspecialchars($_POST['username']); 
$password = htmlspecialchars($_POST['password']);

$_SESSION['presets'] = array($_POST);

/*error handling:*/
$login_errors = array();
$valid = true; 
if (empty($_SESSION['username'])){
  $login_errors[] = 'Please enter a user name.';
  $valid = false; 
}

if (empty($password)) {
  $login_errors[] = 'Please enter a password';
  $valid = false;
} 


if (!password_verify($password, $dao->getPassword($_SESSION['username'])) ||
  !$dao->userExists($_SESSION['username'])) {
    $login_errors[] = 'Incorrect user name or password.';
    $valid = false;
}

if (!$valid) {
  $_SESSION['login_errors'] = $login_errors;
  $_SESSION['password'] = $password;
  header("Location:../login.php");
  exit;
}

//If there are no errors, indicate the session is logged in and redirect to user page.
$_SESSION['login_errors'] = null;
$_SESSION['logged_in'] = true;
header("Location:../practicepage.php");
?>