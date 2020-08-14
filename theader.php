<?php ob_start(); 
    session_start();
  ?>
<?php require_once('function.php');?>
<?php require_once('session.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body>
<!-- ------Email Configuration------------- -->
<?php
  
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 $mail = new PHPMailer();
 $mail->isSMTP(true);
 $mail->SMTPAuth = true;
 $mail->Host = "smtp.gmail.com";
 $mail->Port = "465";
 $mail->SMTPSecure = "ssl";
 $mail->Username = "vikesh.patil8340@gmail.com";  //sender email id
 $mail->Password = "Play!123";  //sender email id's password
 $mail->From = "vikesh.patil8340@gmail.com";  //sender email id
 $mail->FromName = "Vikesh Patil";  //sender name
 $mail->addReplyto("no-reply@example.com", "no-reply");
 $mail->isHTML(true);

 ?>
    <section id="header">
    <div class="container">
        <div class="row">
        
        <div class="col-md-4 col-lg-4">
        
            <a href=""><img src="img/logo.png" class="img-fluid mx-auto d-block"></a>
        </div>
        <div class="col-md-8">
            
           <h3 class="text-wrap mx-auto d-block">Government of Goa</h3>
            
        </div>
            </div>
        </div>
    
    </section>
    
    <section id="examination-header">
      <div class="container">
              <h3>Alumni Tracking System</h3>
        </div>
    </section>
    
<!--        Navigation Bar      -->
<nav class="navbar navbar-expand-lg navbar-light">
<span class="navbar-brand"></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <?php if(isset($_SESSION['login'])){
          echo "<li class='nav-item'><a class='nav-link' href='college_profile.php'>Profile</a>
        </li>";

      }?>
     <li class="nav-item">
        <a class="nav-link" href="events.php">Events</a>
      </li>
      <?php if(isset($_SESSION['login'])){
          echo "<li class='nav-item'><a class='nav-link' href='ChatRoom.php'>Chatroom</a>
        </li>";

      }?>
      <?php if(!isset($_SESSION['login'])){
          echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a>
        </li>";

      }?>
      
      <?php if(!isset($_SESSION['login'])){
          echo "<li class='nav-item'><a class='nav-link' href='college_registration.php'>College Registration</a>
        </li>";

      }?>
      
      <?php if(isset($_SESSION['login'])){
          echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a>
        </li>";

      }?>
            <?php if(isset($_SESSION['login'])){
          echo "<li class='nav-item'><a class='nav-link' href='talumni_details.php'>Alumni</a>
        </li>";

      }?>
    
    </ul>
  </div>
</nav>

