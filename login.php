
<?php $current_page = "login";?>
<?php include_once('header.php'); ?>
    <div id = "home">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">    
        <div class="content">
            <h2 class="heading">Login</h2>
            <?php

              //google recaptcha
              $public_key = "6Lce8dEUAAAAAJHZcP7zCXoPIyG8PZhVvZRiSZu9";
              $private_key = "6Lce8dEUAAAAABH6tzi7J8WIgnJmj5cFMIFYp6fE";
              $url = "https://www.google.com/recaptcha/api/siteverify";


              if(isset($_POST['resend'])){
                if(!isset($_COOKIE['expire_time'])){
                $username= $_POST['user_name'];
                $email = $_POST['user_email'];

                // email conformation
                date_default_timezone_set('Asia/Kolkata');
                $token = getToken(32);
                $encrypted_email = base64_encode(urlencode($_POST['user_email']));
                $expire_date = date("Y-m-d H:i:s", time() + 60 * 5);
                $expire_date = base64_encode(urlencode($expire_date));

                $query = "UPDATE user_details SET validation_key ='$token' WHERE username='$username' AND email='$email'";
                $query_run = mysqli_query($con, $query);
                if(!$query_run){
                  die("Unable to connect to database".mysqli_error());
                }else{
                  $mail->Subject="Verify your email";   //recipient
                  $mail->addAddress($email);
                  $mail->Body="  Follow the link to verify.<br>
                                <a href='localhost/projects/registration_system/activation.php?eid={$encrypted_email}&token={$token}&exd={$expire_date}'>click here</a> to verify your email.
                                  <br> This link is valid for only 5 minutes.";
                  if($mail->send()){
                    setcookie('expire_time', getToken(16), time() + 60 * 5, '', '', '', true);
                    echo "<div class='notification'>Check your email for activation</div>";
                  }
                }
              }else{
                  echo "<div class='notification'>You must wait for at least 5 minutes for next link.</div>";
            }
              }
              $isAuthenticated = false;
              if(isset($_POST['login'])){
                
                //Google recaptcha
                @$response_key = $_POST['g-recaptcha-response'];
                //https://www.google.com/recaptcha/site/reverify?secret=$private_key&response=$response_key&remoteip=currentScriptAddress
                @$response=file_get_contents($url."?secret=".$private_key."&response=".$response_key."&remoteip=".$_SERVER['REMOTE_ADDR']);
                @$response = json_decode($response);

                  if(!(@$response->success == 1)){
                      $errCaptcha = "Wrong captcha";
                  }

                $email = escape($_POST['user_email']);
                $password = escape($_POST['user_password']);
                
                $query = "SELECT * FROM alumni WHERE email = '$email'";
                $query1 = "SELECT * FROM college WHERE email = '$email'";

                $query_run = mysqli_query($con, $query);
                $query1_run = mysqli_query($con, $query1);
                
                if(!$query_run){
                  die("Unable to connect to database".mysqli_error($con));
                }
                
                $result = mysqli_fetch_assoc($query_run);
                $result1 = mysqli_fetch_assoc($query1_run);

                if($result['email'] === $email){
                if(password_verify($password, $result['password'])){
                  if($result['is_active'] == 1){
                  if($result['is_validated'] == 1){
                    if(!isset($errCaptcha)){
                      $isAuthenticated =true;
                      echo "<div class='notification'>Logged In Successfull</div>";
                      //$_SESSION['login'] =$result['id'];
                      $_SESSION['login'] =$result['email'];
                      header("location:profile_alumni.php");
                      //resetting fields
                      unset($email);
                      unset($password);
                  }
                }else{
                  echo "<div class='notification'>Your request for validation is still pending.";
                }
                }else{
                    if(!isset($errCaptcha)){
                  echo "<div class='notification'>You are not verified user. <form method='POST'><input type='text' value='{$username}' name='user_name' hidden><input type='text' value='{$email}' name='user_email' hidden><button class='resend' name='resend'>Click here to resend</button></form></div>";
                }
              }

                }else {
                  echo "<div class='notification'>Invalid username or email or password</div> ";
                }
              }
              else if($result1['email'] === $email){
                if(password_verify($password, $result1['password'])){
                  if($result1['is_active'] == 1){
                    if(!isset($errCaptcha)){
                      $isAuthenticated =true;
                      echo "<div class='notification'>Logged In Successfull</div>";
                      $_SESSION['clogin'] = $result1['email'];
                header("location:profile_alumni.php");
                      //resetting fields
                      unset($email);
                      unset($password);
                  }
                }else{
                    if(!isset($errCaptcha)){
                  echo "<div class='notification'>You are not verified user. <form method='POST'><input type='text' value='{$username}' name='user_name' hidden><input type='text' value='{$email}' name='user_email' hidden><button class='resend' name='resend'>Click here to resend</button></form></div>";
                }
              }

                }else {
                  echo "<div class='notification'>Invalid username or email or password</div> ";
                }
              }
              
            }

             ?>

            <!-- <div class='notification'>Logged In Successfull</div> -->
            <form action="login.php" method="POST">
                <div class="form-group">
                <div class="input-box">
                    <input type="email" class="form-control" placeholder="Email address" value="<?php echo isset($email)?"{$email}":"";?>" name="user_email" required>
                </div>
                <div class="input-box">
                    <input type="password" class="form-control" placeholder="Enter password" name="user_password" required>
                </div>
                <div class="input-box rm-box">
                    <a href="forgot_password.php" class="forgot-password">Forgot password?</a>
                </div>
              <br>
                <div class="g-recaptcha" data-sitekey="<?php echo $public_key; ?>"></div>
                <?php echo isset($errCaptcha)? "<span class='error'>$errCaptcha</span>" : ""; ?>

                <div class="input-box">
                    <input type="submit" class="input-submit btn btn-primary" value="LOGIN" name="login">
                </div>
                <div class="login-cta"><span>Don't have an account?</span> <a href="student_registration.php">Sign up here</a></div>
                </div>
            </form>
            </div>
        </div>
        </div>
        </div>
    </div>
<?php include_once('footer.php');?>
