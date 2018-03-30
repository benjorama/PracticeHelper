<?php
session_start();
require_once "Dao.php";

$dao = new Dao();

if (isset($_POST['start'])) {
    $message = $_POST['message'];
    $_SESSION['presets'] = array($_POST);
    
    /*error handling: 
    What if I try to start a new practice session when one is already going?*/
    $practice_errors = array();
    $valid = true; 

    if (isset($_SESSION['start'])) {
        $practice_errors[] = "Practice session already in progress. " .  
            "\nPlease end current session before starting a new one.";
        $valid = false; 
    }
    
    if (!$valid) {
        $_SESSION['practice_errors'] = $practice_errors;
        header("Location:../practicepage.php");
        exit;
    }
    //If there are no errors, perform actions depending on login status.
    $_SESSION['start'] = true;
    $_SESSION['start_time'] = date("Y-m-d H:i:s");
    if (isset($_SESSION['logged_in'])) {
        $dao->save_session($_SESSION['username'] ,$message);
    } else {
        $_SESSION['guest_message'] = $message;
    }

    $_SESSION['practice_errors'] = null;
    header("Location:../practicepage.php");

} elseif (isset($_POST['stop'])) {

    $valid = true; 
    //handle errors.
    if (!isset($_SESSION['start'])){
        $practice_errors[] = "Sorry, you can't stop a session you havn't started!"; 
        $valid = false;
    }

    if (!$valid) {
        $_SESSION['practice_errors'] = $practice_errors;
        header("Location:../practicepage.php");
        exit;
    }

    if (isset($_SESSION['logged_in'])){
        $dao->save_stop_time();
    } else {
        $_SESSION['stop'] = true;
    }
    
    unset($_SESSION['start']);
    $_SESSION['practice_errors'] = null;
    header("Location:../practicepage.php");
}
?>