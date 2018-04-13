<?php
session_start();
require_once "Dao.php";
$dao = new Dao();
$offset = $_SESSION['date_offset'];

if (isset($_POST['start'])) {
    $message = $_POST['message'];
    $_SESSION['start'] = true;
    $_SESSION['start_time'] = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $offset)));
    if (isset($_SESSION['logged_in'])) {
        $dao->save_session($_SESSION['username'] ,$message, $_SESSION['start_time']);
    } else {
        $_SESSION['guest_message'] = $message;
    }
    
    if (isset($_SESSION['stop'])) {
        unset($_SESSION['stop']);
    }
    $_SESSION['practice_errors'] = null;
    header("Location:../practicepage.php");

} elseif (isset($_POST['stop'])) {

    if (isset($_SESSION['logged_in'])){
        $dao->save_stop_time($_SESSION['start_time'], $offset);
    } else {
        $_SESSION['stop'] = true;
    }
    unset($_SESSION['start']);
    $_SESSION['practice_errors'] = null;
    header("Location:../practicepage.php");
}
?>