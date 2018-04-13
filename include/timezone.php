<?php
/*This is for saving the timezone offset in the $_SESSION array*/ 
session_start();
$_SESSION['date_offset'] = $_POST['date_offset'];
?>