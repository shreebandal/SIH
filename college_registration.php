<?php include 'header.php'; ?>

<?php 


//google recaptcha
$public_key = "6Lce8dEUAAAAAJHZcP7zCXoPIyG8PZhVvZRiSZu9";
$private_key = "6Lce8dEUAAAAABH6tzi7J8WIgnJmj5cFMIFYp6fE";
$url = "https://www.google.com/recaptcha/api/siteverify";


if (isset($_POST['register'])) { 

    $clg_name       = escape($_POST['clg_name']);
    $est_year        = escape($_POST['est_year']);
    $email        = escape($_POST['email']);
    $reg_no         = escape($_POST['reg_no']);
    $clg_code         = escape($_POST['clg_code']);
    
    $city        = escape($_POST['city']);
    $dist        = escape($_POST['dist']);
    $taluka             = escape($_POST['tal']);
    $pin          = escape($_POST['pin']);
    $contact      = escape($_POST['contact']);
    $password     = escape($_POST['password']);
    $pass             = escape($_POST['pass']);


    
    //Google recaptcha
    $response_key = $_POST['g-recaptcha-response'];
    //https://www.google.com/recaptcha/site/reverify?secret=$private_key&response=$response_key&remoteip=currentScriptAddress
    $response=file_get_contents($url."?secret=".$private_key."&response=".$response_key."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);

      if(!($response->success == 1)){
          $errCaptcha = "Wrong captcha";
      }


      //College name validation
    $pattern_fn = "/^[a-zA-Z]{5,50}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
    if (!preg_match($pattern_fn, $clg_name)) {
        $errclg_name = "College name must be at least 5 character long, letter and space not allowed";
    }

    //College Code
    $pattern_fn = "/^[0-9]{3,15}$/";
   if (!preg_match($pattern_fn, $clg_code)) {
       $errclg_code = "College Code must be at lest 3 character long, letter and space not allowed";
   }

    //City validation
    $pattern_fn = "/^[a-zA-Z]{2,15}$/";
   if (!preg_match($pattern_fn, $city)) {
       $errcity = "City name must be at lest 2 character long, letter and space not allowed";
   }

    //Taluka validation
    $pattern_fn = "/^[a-zA-Z]{2,15}$/";
   if (!preg_match($pattern_fn, $taluka)) {
       $errtaluka = "Taluka name must be at lest 2 character long, letter and space not allowed";
   }

    //District validation
    $pattern_fn = "/^[a-zA-Z]{2,15}$/";
   if (!preg_match($pattern_fn, $dist)) {
       $errdistrict = "District name must be at lest 2 character long, letter and space not allowed";
   }

    //Pincode validation
         $pattern_Num = "/^[0-9]{6,6}$/";
         if (!preg_match($pattern_Num, $pin)) {
             $errpin = "Invalid Pincode";
         }

  //   //Username validation
  //   $pattern_fn = "/^[a-zA-Z]{8,12}$/";
  //  if (!preg_match($pattern_fn, $username)) {
  //      $errusername = "Username name must be at least 8 character long, letter and space not allowed";
  //  }
    

   //Registration Number validation
         $pattern_reg_no = "/^[0-9]{4,20}$/";
         if (!preg_match($pattern_reg_no, $reg_no)) {
             $errreg_no = "Invalid Registration Number";
         }
                $query         = "SELECT * FROM college WHERE reg_no ='$reg_no'";
                $query_run_reg_no = mysqli_query($con, $query);
                if (!$query_run_reg_no) {
                    die("Connection to database failed" . mysqli_error($con));
                } else {
                    $row_num = mysqli_num_rows($query_run_reg_no);
                    if ($row_num == 1) {
                        $errreg_no = "Registration Number already registered.";
                    }
                }
            
       

         //mobile contact validation
         $pattern_Num = "/^[0-9]{10,10}$/";
         if (!preg_match($pattern_Num, $contact)) {
             $errcontact = "Invalid Mobile contact";
         }
   
        //Establishment Year validation
         $pattern_Num = "/^[0-9]{4,4}$/";
         if (!preg_match($pattern_Num, $contact)) {
             $errest_year = "Invalid Establishment Year";
         }
     
               //email validation
        $pattern_e = "/^([a-z0-9_\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";  /*+ specifies at least once and * specifies at least 0 or more.
      \ is to escape the character. i specifies independent of the case*/
        if (!preg_match($pattern_e, $email)) {
            $errE = "Invalid email format!";
        }else {     //check if email is already present in database
            $query = "SELECT * FROM college WHERE email ='$email'";
            $query_run_email = mysqli_query($con, $query);
            
            if(!$query_run_email){
                die("Connection to database failed" . mysqli_error($con));
            }else {
                $row_num = mysqli_num_rows($query_run_email);
                if($row_num >= 1){
                    $errE = "Email has already taken.";
                }
            }
        }

        //password validation
        if ($password==$pass) {
            $pattern_pass = "/^.*(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/"; // . indicates all the characters. * indicates at least 0 times pattern should be repeated
            if (!preg_match($pattern_pass, $password)) {
                $errpass = "Password must be at least 6 characters long, 1 upper case, 1 lower case and 1 contact";
            }
        }else {
            $errpass ="Password doesn't matched";
        }         


        if (!isset($errclg_name)) {
          date_default_timezone_set("Asia/Kolkata");
          $date = date("Y-m-d H:i:s");

          //email conformation
          $token = getToken(32);
          $encrypted_email = base64_encode(urlencode($_POST['email']));

          $expire_date = date("Y-m-d H:i:s", time() + 60);
          $expire_date = base64_encode(urlencode($expire_date));

          $mail->Subject="Verify your email";   //recipient
          $mail->addAddress($email);
          $mail->Body=" Hello &nbsp;<br> Thanks for registration.<br>
                        <a href='localhost/projects/Alumni_Tracking/clg_activation.php?eid={$encrypted_email}&token={$token}&&exd={$expire_date}'>click here</a> to verify your email.
                          <br> This is link is valid for only 20 minutes.";


          if($mail->send()){
            $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
            $prof ='C';
            
            /*$query123 = "SELECT * FROM college WHERE email ='$email' OR contact='$contact' OR clg_code='$clg_code'";
            $query_run_email123 = mysqli_query($con, $query123);
            
            if($query_run_email123){
              $message="Email and Phone Number and Collge Code has already taken.";
              echo '<script language="javascript">';
              echo 'alert("'.$message.'");';
              echo 'window.location="http://localhost/Alumni_Tracking/college_registration.php";';
              echo '</script>';
            }
            else{*/
            $query = "INSERT INTO  college (clg_name,est_year,email,contact,reg_no,clg_code,city,taluka,district,pincode,password,prof, validation_key, registration_date) VALUES('$clg_name','$est_year','$email','$contact','$reg_no','$clg_code','$city','$taluka','$dist','$pin','$hash','$prof', '$token', '$date')";
            $query_run = mysqli_query($con, $query);
            if (!$query_run) {
                die("Query failed ".mysqli_error($con));
            } else {
                echo "<div class='notification'>Sign up successful.</div>";
                //resetting values entered by user after successful sign up
                unset($clg_name);
                unset($est_year);
                unset($email);
                unset($contact);
                unset($reg_no);
                unset($clg_code);
                unset($city);
                unset($taluka);
                unset($district);
                unset($pincode);
                unset($clg_status);
                unset($username);
                unset($hash);
                unset($password);
                unset($pass);
                
                mysqli_close($con);
                header('location:login.php');
            }
        }
          //}
        else echo "<div class='notification'>Something went wrong:(</div>";        
}
}
    
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>College Registeration</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .container {
        max-width: 960px;
        }

    .lh-condensed { line-height: 1.25; }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>College Registeration</h2>
  </div>
<hr>
<div>
      <form class="needs-validation" action="college_registration.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="College_Name">College Name</label>
            <input type="text" class="form-control" id="College_Name" placeholder="" value="" required name="clg_name">
            <div class="invalid-feedback">
              Valid College Name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Establishment_Year">Establishment Year</label>
            <input type="text" class="form-control" id="Establishment_Year" placeholder="" value="" required name="est_year">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="Email ID">Email ID</label>
            <input type="text" class="form-control" id="Email ID" placeholder="" value="" required name="email">
            <div class="invalid-feedback">
              Valid Email ID is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Registration Number">Registration Number</label>
            <input type="number" class="form-control" id="Registration Number" placeholder="" value="" required name="reg_no">
            <div class="invalid-feedback">
              Valid Contact is required.
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-12 mb-3">
            <label for="College Code">College Code</label>
            <input type="text" class="form-control" id="College Code" placeholder="" value="" required name="clg_code">
            <div class="invalid-feedback">
              Valid College Code is required.
            </div>
          </div>
          
        </div>
       
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="City ">City </label>
            <input type="text" class="form-control" id="City" placeholder="" value="" required name="city">
            <div class="invalid-feedback">
              Valid City is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
          <label for="District ">District </label>
            <select class="custom-select d-block w-100" id="District " required name="dist">
              <option value="">Choose...</option>
              <option value = "North Goa">North Goa</option>
                <option value = "South Goa">South Goa</option></select>

          </div>
          <div class="col-md-4 mb-3">
          <label for="Taluka">Taluka</label>
            <select class="custom-select d-block w-100"  id="Taluka" required name="tal">
            <option>Choose...</option>
            </select>
          
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="Pincode ">Pincode </label>
            <input type="number" class="form-control" id="Pincode" placeholder="" value="" required name="pin">
            <div class="invalid-feedback">
              Valid Pincode is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
          <label for="Contact ">Contact </label>
            <input type="number" class="form-control" id="Contact" placeholder="" value="" required name="contact">
            <div class="invalid-feedback">
              Valid Contact is required.
            </div>
          </div>
          </div>
    
        
          
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Profile Password">Profile Password </label>
            <input type="password" class="form-control" id="Profile Password" placeholder="" value="" required name="password">
            <div class="invalid-feedback">
              Valid Profile Password is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Confirm Password"> Confirm Password</label>
            <input type="password" class="form-control" id="Confirm Password" placeholder="" value="" required name="pass">
            <div class="invalid-feedback">
              Valid Confirm Password is required.
            </div>

          </div>
          </div>
          <div class="g-recaptcha" data-sitekey="<?php echo $public_key; ?>"></div>

          <span>If you are already registered then <a href="login.php">click here</a> to login</span><br>
          <input type="submit" class="btn btn-primary" value="register" name="register">
        <input type="reset" class="btn btn-primary" value="reset" name="reset">
      
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
let District=document.getElementsByName('dist')[0];
District.addEventListener('input',function(){
  
    let html='';
    let Taluka=document.getElementById('Taluka');
    if(District.value==="North Goa")
    {
      Taluka.innerHTML =`
      <option value="">Choose...</option>
              <option value="Aldona">Aldona</option>
              <option value="Anjuna">Anjuna</option>
              <option value="Arambol">Arambol</option>
              <option value="Bambolim">Bambolim</option>
              <option value="Bandora">Bandora</option>
              <option value="Bicholim">Bicholim</option>
              <option value="Borim">Borim</option>
              <option value="Calangute">Calangute</option>
              <option value="Calapur">Calapur</option>
              <option value="Chimbel">Chimbel</option>
              <option value="Colvale">Colvale</option>
              <option value="Corlim">Corlim</option>
              <option value="Cumbarjua">Cumbarjua</option>
              <option value="Curti">Curti</option>
              <option value="Goa Velha">Goa Velha</option>
              <option value="Guirim">Guirim</option>
              <option value="Jua">Jua</option>
              <option value="Mandrem">Mandrem</option>
              <option value="Mapusa">Mapusa</option>
              <option value="Marcaim">Marcaim</option>
              <option value="Mercurim">Mercurim</option>
              <option value="Moira">Moira</option>
              <option value="Morjim">Morjim</option>
              <option value="Murda">Murda</option>
              <option value="Nerul">Nerul</option>
              <option value="Onda">Onda</option>
              <option value="Orgao">Orgao</option>
              <option value="Pale">Pale</option>
              <option value="Panaji">Panaji</option>
              <option value="Parcem">Parcem</option>
              <option value="Penha de Franca">Penha de Franca</option>
              <option value="Pernem">Pernem</option>
              <option value="Pilerne">Pilerne</option>
              <option value="Ponda">Ponda</option>
              <option value="Priol">Priol</option>
              <option value="Quela">Quela</option>
              <option value="Reis Magos">Reis Magos</option>
              <option value="Saligo">Saligo</option>
              <option value="Salvador do Mundo">Salvador do Mundo</option>
              <option value="Sanquelim">Sanquelim</option>
              <option value="Siolim">Siolim</option>
              <option value="Socorro">Socorro</option>
              <option value="Usgao">Usgao</option>
              <option value="Valpoi">Valpoi</option>
           
        `;
    }
    else if(District.value==="South Goa")
    {Taluka.innerHTML =`
              <option value="">Choose...</option>
              <option value="Aquem">Aquem</option>
              <option value="Benaulim">Benaulim</option>
              <option value="Canacona">Canacona</option>
              <option value="Chicalim">Chicalim</option>
              <option value="Chinchinim">Chinchinim</option>
              <option value="Cortalim">Cortalim</option>
              <option value="Cuncolim">Cuncolim</option>
              <option value="Curchorem">Curchorem-Cacora</option>
              <option value="Curtorim">Curtorim</option>
              <option value="Davorlim">Davorlim</option>
              <option value="Margao">Margao</option>
              <option value="Mormugao">Mormugao</option>
              <option value="Navelim">Navelim</option>
              <option value="Nuvem">Nuvem</option>
              <option value="Quepem">Quepem</option>
              <option value="Raia">Raia</option>
              <option value="Sancoale">Sancoale</option>
              <option value="Sanguem">Sanguem</option>
              <option value="Sanvordem">Sanvordem</option>
              <option value="Sao Jose de Areal">Sao Jose de Areal</option>
              <option value="Varca">Varca</option>
              <option value="Verna">Verna</option>
              <option value="Xeldem">Xeldem</option>
              
              
           
        `;
    }
    else{
      Taluka.innerHTML =`<option value="">Choose...</option>`;
    }
    
});

</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>
