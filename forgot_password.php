<?php include_once('header.php'); ?>
    <div class="container">
        <div class="content">
            <h2 class="heading">Password Recovery</h2>
            <?php

              if(isset($_POST['password_recovery'])){
                $isAlumni = false;
                $isClg = false;  
                  $email = escape($_POST['user_email']);

                    $query = "SELECT * FROM alumni WHERE email = '$email'";
                    $query_run = mysqli_query($con, $query);
                    
                    
                    if($query_run){
                      $row_num = mysqli_num_rows($query_run);
                        if($row_num == 1){
                          $isAlumni = true;
                        }
                      }else{
                        die("Connection to database failed".mysqli_error($con));
                      }

                    $query1 = "SELECT * FROM college WHERE email = '$email'";
                    $query_run1 = mysqli_query($con, $query1);
                    
                    if($query_run1){
                      $row_num1 = mysqli_num_rows($query_run1);
                        if($row_num1==1)
                          $isClg = true;
                    }else{
                      die("Connection to database failed".mysqli_error($con));
                    }
                    
                   
                    
                    if($row_num==1 || $row_num1 ==1){
                      if(!isset($_COOKIE['password_recovery'])){

                      // password_recovery email
                      date_default_timezone_set('Asia/Kolkata');
                      $token = getToken(32);
                      $encode_token = base64_encode(urlencode($token));
                      $encrypted_email = base64_encode(urlencode($_POST['user_email']));
                      $expire_date = date("Y-m-d H:i:s", time() + 60 * 1);
                      $expire_date = base64_encode(urlencode($expire_date));

                      if($isAlumni){
                        $query2 = "UPDATE alumni SET validation_key ='$token' WHERE email='$email' AND is_active=1";

                      }
                      else if($isClg){
                        $query2 = "UPDATE college SET validation_key ='$token' WHERE email='$email' AND is_active=1";
                      }

                      $query_run2 = mysqli_query($con, $query2);
                      if(!$query_run2){
                        die("Unable to connect to database".mysqli_error($con));
                      }else{
                        $mail->Subject="Password recovery request";   //recipient
                        $mail->addAddress($email);
                        $mail->Body="Follow the link to reset password.<br>
                                      <a href='localhost/projects/registration_system/new_password.php?eid={$encrypted_email}&token={$encode_token}&exd={$expire_date}'>click here</a> to reset password.
                                      <br> This link is valid for only 1 minutes.";
                        if($mail->send()){
                          setcookie('password_recovery', getToken(16), time() + 60 * 1, '', '', '', true);
                          echo "<div class='notification'>Check your email for password reset link.</div>";
                        }
                      }
                    }else{
                        echo "<div class='notification'>You must wait for at least 1 minutes for next link.</div>";
                  }
                }else echo "<div class='notification'>Sorry! user not found.</div>";
              }

             ?>


            <form action="forgot_password.php" method="POST">
                <div class="input-box">
                    <input type="email" class="input-control" placeholder="Email address" name="user_email" required>
                </div>
                <div class="input-box">
                    <input type="submit" class="input-submit" value="RECOVER PASSWORD" name="password_recovery" required>
                </div>
            </form>
        </div>
    </div>

<?php include_once('footer.php'); ?>
