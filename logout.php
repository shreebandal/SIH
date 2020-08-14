<?php
require_once 'session.php';
require_once 'function.php';
    ob_start();
    session_start();

    if(isset($_SESSION['login'])){
      session_destroy();
      unset($_SESSION['login']);
      unset($_SESSION['name']);
      header("Location:login.php");
    }
    else if(isset($_SESSION['clogin'])){
      session_destroy();
      unset($_SESSION['clogin']);
      unset($_SESSION['name']);
      header("Location:login.php");
    }
    header("Location: login.php");
?>
