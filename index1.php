<?php
session_start();
if(isset($_SESSION['login']))
    header('location:profile.php');
else if (isset($_SESSION['username']))
    header('location: admin_complaint.php');
?>

<?php include 'header.php'; ?>



<!doctype html>
<html lang="en">
  <head>
    <title>Login Page</title>
</head>

<body>
    <div class="container">
<!--        <?php include 'home_left.php'; ?>-->

        <div class="row">

            
            <div class="col-md-6">
                <div id="user-login">
                    <div class="login-form">
                    <form action="index.php" class="" method="post">
                        <h1>Login </h1>
                        <div class="txtb">
                            <input type="text" name="prn" required>
                            <span data-placeholder="ENTER YOUR PRN"></span>
                        </div>

                        <div class="txtb">
                            <input type="password" name="password" required>
                            <span data-placeholder="PASSWORD"></span>
                        </div>

                        <input type="submit" class="lgnbtn" value="LOGIN" name="login"><br>
                        <hr><br>

                    </form>
                    <a href="signup.php" style="color:white;text-decoration:none;"><button class="sgn">REGISTER</button></a>
                    </div>
                </div>
            </div>

            <?php include 'important_updates.php'; ?>
        </div>
    </div>
<?php include 'footer.php'; ?>
