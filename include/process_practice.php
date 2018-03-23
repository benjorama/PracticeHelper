<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
$message = $_POST['message'];

$_SESSION['presets'] = array($_POST);

/*error handling:*/
$practice_errors = array();
$valid = true; 

//If there are no errors, perform actions depending on login status.
if (isset($_SESSION['logged_in'])) {
    $dao->save_session($_SESSION['username'] ,$message);
} else {
    $_SESSION['guest_message'] = $message;
}


$_SESSION['practice_errors'] = null;
header("Location:../practicepage.php");
?>