<?php
session_start();
require_once "Dao.php";
$dao = new Dao();
$username = $_POST['username']; 
$password = $_POST['password'];
$confirm_pass = $_POST['confirm_pass']; 

$_SESSION['presets'] = array($_POST);

/*error handling:*/
$signup_errors = array();
$valid = true; 
if (empty($username)){
  $signup_errors[] = 'Please enter a user name.';
  $valid = false; 
} elseif ($dao->userExists($username)) {
    $signup_errors[] = 'User name already exists, please create a different one.';
    $valid = false;
}

if (empty($password)) {
  $signup_errors[] = 'Please enter a password';
  $valid = false;
} 

if (empty($confirm_pass)) {
    $signup_errors[] = "Please confirm your password.". 
    $valid = false;
} elseif ($password !== $confirm_pass) {
    $signup_errors[] = "Confirm password doesn't match password.";
    $valid = false;
}

if (!$valid) {
  $_SESSION['signup_errors'] = $signup_errors;
  header("Location:../signup.php");
  exit;
}


//If there are no errors, save the new user account credentials and redirect to the practice page.
$_SESSION['signup_errors'] = null;
$dao->saveUser($username, $password);
$_SESSION['success'] = true; 
$_SESSION['logged_in'] = true;
header("Location:../practicepage.php");
?>