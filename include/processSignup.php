<?php
require_once "Dao.php";

  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
      $dao = new Dao();
      $dao->saveUser($username, $password);
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
   }
  header("Location:../practicepage.php");
  ?>