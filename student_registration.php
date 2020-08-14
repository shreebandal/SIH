<?php include 'header.php'; ?>
<?php 

//google recaptcha
$public_key = "6Lce8dEUAAAAAJHZcP7zCXoPIyG8PZhVvZRiSZu9";
$private_key = "6Lce8dEUAAAAABH6tzi7J8WIgnJmj5cFMIFYp6fE";
$url = "https://www.google.com/recaptcha/api/siteverify";



if (isset($_POST['register'])) {

    $firstname       = escape($_POST['firstname']);
    $lastname        = escape($_POST['lastname']);
    $clg_name        = escape($_POST['clg_name']);
    $contact         = escape($_POST['contact']);
    $emailid         = escape($_POST['emailid']);
    $enr_id          = escape($_POST['enr_id']);
    $adm_pas_year        = escape($_POST['adm_year']);
    $pas_pas_year        = escape($_POST['pas_year']);
    $dob             = escape($_POST['dob']);
    $course          = escape($_POST['course']);
    $cur_status      = escape($_POST['cur_status']);
    


    //Google recaptcha
    $response_key = $_POST['g-recaptcha-response'];
    //https://www.google.com/recaptcha/site/reverify?secret=$private_key&response=$response_key&remoteip=currentScriptAddress
    $response=file_get_contents($url."?secret=".$private_key."&response=".$response_key."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);

      if(!($response->success == 1)){
          $errCaptcha = "Wrong captcha";
      }



    if($cur_status === "Higher Studies"){
        $hig_studies     = escape($_POST['hig_studies']);
        $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
            if (!preg_match($pattern_fn, $hig_studies)) {
                $err_hig_studies = "First name must be at lest 2 character long, letter and space allowed";
            }
        
        $bus = NULL;
        $org = NULL;
        $company = NULL;
    }
    else if($cur_status === "Working in Organization"){
            $org             = escape($_POST['org']);

            $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
            if (!preg_match($pattern_fn, $org)) {
                $err_org = "First name must be at lest 2 character long, letter and space allowed";
            }
        $bus = NULL;
        $hig_studies = NULL;
        $company = NULL;
        
    }
    else{
            $company         = escape($_POST['company']);
            $bus             = escape($_POST['bus']);

            $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
                if (!preg_match($pattern_fn, $company)) {
                    $err_company = "First name must be at lest 2 character long, letter and space allowed";
                }

                $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
                if (!preg_match($pattern_fn, $bus)) {
                    $err_bus = "First name must be at lest 2 character long, letter and space allowed";
                }
        
        $hig_studies = NULL;
        $org = NULL;
    }
    $city            = escape($_POST['city']);
    $state           = escape($_POST['state']);
    $country         = escape($_POST['country']);
    $password        = escape($_POST['password']);
    $pass            = escape($_POST['pass']);
    
        //First name validation
    $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
    if (!preg_match($pattern_fn, $firstname)) {
        $errFn = "First name must be at lest 2 character long, letter and space allowed";
    }

    //last name validation
    $pattern_fn = "/^[a-zA-Z ]{2,12}$/";
   if (!preg_match($pattern_fn, $lastname)) {
       $errLn = "Last name must be at lest 2 character long, letter and space allowed";
   }
    
    //last name validation
    $pattern_fn = "/^[a-zA-Z ]{2,12}$/";
   if (!preg_match($pattern_fn, $clg_name)) {
       $errLn = "Last name must be at lest 2 character long, letter and space allowed";
   }

   //enrollement id validation
         $pattern_enr_id = "/^[0-9]{8,20}$/";
         if (!preg_match($pattern_enr_id, $enr_id)) {
             $errenr_id = "Invalid Enrollement ID";
         }else {
            $query_b = "SELECT * FROM alumni WHERE enr_id='$enr_id'";
            $query_b_run = mysqli_query($con, $query_b);
            if(!$query_b_run)
                die("Unable to connect to database! ".mysqli_error($con));

            if (mysqli_num_rows($query_b_run) == 0) {
                $query         = "SELECT * FROM alumni WHERE enr_id ='$enr_id'";
                $query_run_enr_id = mysqli_query($con, $query);
                if (!$query_run_enr_id) {
                    die("Connection to database failed" . mysqli_error($con));
                } else {
                    $row_num = mysqli_num_rows($query_run_enr_id);
                    if ($row_num == 1) {
                        $errenr_id = "enr_id already registered.";
                    }
                }
            }else $errenr_id = "This enr_id is blocked by Admin";
         }

         //mobile contact validation
         $pattern_Num = "/^[0-9]{10,10}$/";
         if (!preg_match($pattern_Num, $contact)) {
             $errNum = "Invalid Mobile contact";
         }
         
               //email validation
        $pattern_e = "/^([a-z0-9_\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";  /*+ specifies at least once and * specifies at least 0 or more.
      \ is to escape the character. i specifies independent of the case*/
        if (!preg_match($pattern_e, $emailid)) {
            $errE = "Invalid email format!";
        }else {     //check if email is already present in database
            $query = "SELECT * FROM alumni WHERE email ='$emailid'";
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

        //Check valid branch
        if($course == "Select Your Branch"){
            $errB = "Please select valid branch";
        }

        //Check valid admission year
        if($adm_pas_year == "Select admission year"){
            $erradm_year = "Please select valid admission year";
        }
    
        if($pas_pas_year == "Select admission year"){
            $errpas_year = "Please select valid passing year";
        }
    
        $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
        if (!preg_match($pattern_fn, $course)) {
            $err_course = "First name must be at lest 2 character long, letter and space allowed";
        }

        $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
        if (!preg_match($pattern_fn, $cur_status)) {
            $err_cur_status = "First name must be at lest 2 character long, letter and space allowed";
        }
        
    
        $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
        if (!preg_match($pattern_fn, $city)) {
            $err_city = "First name must be at lest 2 character long, letter and space allowed";
        }
    
        $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
        if (!preg_match($pattern_fn, $state)) {
            $err_state = "First name must be at lest 2 character long, letter and space allowed";
        }
    
        $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
        if (!preg_match($pattern_fn, $country)) {
            $err_country = "First name must be at lest 2 character long, letter and space allowed";
        }
    
        
    
        
        if (!isset($errFn)) {

          date_default_timezone_set("Asia/Kolkata");
          $date = date("Y-m-d H:i:s");

          //email conformation
          $token = getToken(32);
          $encrypted_email = base64_encode(urlencode($_POST['emailid']));

          $expire_date = date("Y-m-d H:i:s", time() + 60);
          $expire_date = base64_encode(urlencode($expire_date));

          $mail->Subject="Verify your email";   //recipient
          $mail->addAddress($emailid);
          $mail->Body=" Hello &nbsp;<br> Thanks for registration.<br>
                        <a href='localhost/projects/Alumni_Tracking/activation.php?eid={$encrypted_email}&token={$token}&&exd={$expire_date}'>click here</a> to verify your email.
                          <br> This is link is valid for only 20 minutes.";


          /*if($mail->send()){
            $query123 = "SELECT * FROM alumni WHERE email ='$emailid' OR contact='$contact' OR enr_id='$enr_id'";
            $query_run_email123 = mysqli_query($con, $query123);
            
            if($query_run_email123){
              $message="Email and Phone Number and Enroll Number has already taken.";
              echo '<script language="javascript">';
              echo 'alert("'.$message.'");';
              echo 'window.location="http://localhost/Alumni_Tracking/student_registration.php";';
              echo '</script>';
            }
            else{*/
            $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
            $prof = 'A';
//            $query1 = "INSERT INTO alumni (firstname) VALUES('$firstname');";
            $query1 = "INSERT INTO  alumni (firstname,lastname,clg_name,contact,email,enr_id,adm_year,pas_year,dob,course,cur_status,hig_studies,org,bus,company,city,state,country,password,prof, validation_key, registration_date) VALUES('$firstname','$lastname','$clg_name','$contact','$emailid','$enr_id','$adm_pas_year','$pas_pas_year','$dob','$course','$cur_status','$hig_studies','$org','$bus','$company','$city','$state','$country','$hash','$prof', '$token', '$date');";
//            $query_run = mysqli_query($con, $query);
            
            $query_run = $con->query($query1);
            if (!$query_run) {
                die("Query failed ".mysqli_error($con));
            } else {
                echo "<div class='notification'>Sign up successful.</div>";
                //resetting values entered by user after successful sign up
                unset($firstname);
                unset($lastname);
                unset($middlename);
                unset($enr_id);
                unset($email);
                unset($password);
                unset($confirmPassword);
                unset($branch);
                unset($pas_year);
                
                mysqli_close($con);
                header('location:login.php');
            }
        }
      //}
        else echo "<div class='notification'>Something went wrong:(</div>";        
}


    
    ?>
    
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <title>Alumini Registeration</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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
    
    <h2>Alumni Registeration</h2>
  </div>
<hr>
  <div class="row">
    <div class="col-md-12 order-md-2 mb-4">
  
      <form class="needs-validation" action="student_registration.php" method="post" enctype="multipart/form-data" >
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="firstname">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="lastname">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="clg_name">College Name</label>
            <select class="custom-select d-block w-100" id="clg_name" required name="clg_name" onchange="course_names()">
              <option value="">Choose...</option>
              <?php
              $q3="SELECT * FROM college WHERE is_validated='1'";
              $result3=mysqli_query($con,$q3);
              $num3=mysqli_num_rows($result3);
              for($i=1;$i<=$num3;$i++)
								{
								$row3=mysqli_fetch_array($result3);
              ?>
              <option value="<?php echo $row3['clg_name'];?>"><?php echo $row3['clg_name'];?></option>
              <?php
            }
            ?>
            </select>
            <div class="invalid-feedback">
              Please select a valid College Name.
            </div>
          </div>
          <div class="col-md-6 mb-3" id="course-name">
          <label for="course">course</label>
            <select class="custom-select d-block w-100" id="course" required name="course">
            <option value="">Choose...</option>
            
              </select>
              <div class="invalid-feedback">
              Please select a valid Course.
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Email ID">Email ID</label>
            <input type="email" class="form-control" id="Email ID" placeholder="" value="" required name="emailid">
            <div class="invalid-feedback">
              Valid Email ID is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Enrollment ID">Enrollment ID</label>
            <input type="number" class="form-control" id="Enrollment ID" placeholder="" value="" required name="enr_id">
            <div class="invalid-feedback">
              Valid Enrollment ID is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="Admission year">Admission year</label>
            <input type="number" class="form-control" id="Adm_year" placeholder="" value="" required name="adm_year">
            <div class="invalid-feedback">
              Valid Admission pas_year is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="Passout year">Passout pas_year</label>
            <input type="number" class="form-control" id="pas_year" placeholder="" value="" required name="pas_year">
            <div class="invalid-feedback">
              Valid Passout pas_year is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="Date of birth">Date of birth</label>
            <input type="date" class="form-control" id="Date of birth" placeholder="" value="" required name="dob">
            <div class="invalid-feedback">
              Valid Date of birth is required.
            </div>
          </div>
        </div>
        
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="Contact">Contact</label>
            <input type="number" class="form-control" id="Contact" placeholder="" value="" required name="contact">
            <div class="invalid-feedback">
              Valid Contact is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Current Status">Current Status</label>
            <select class="custom-select d-block w-100" id="Current_Status" required name="cur_status">
              <option value="">Choose...</option>
              <option value = "Higher Studies">Higher Studies</option>
              <option value = "Working in Organization">Working in Organization</option>
              <option value = "Bussiness or Startup">Bussiness or Startup</option></select><br><br>
              
              
         
            <div class="invalid-feedback">
              Please select a valid Current Status.
            </div>
          </div>
          </div>
          <div id="validate"></div>


        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="City of residence">City of residence</label>
            <input type="text" class="form-control" id="City of residence" placeholder="" value="" required name="city">
            <div class="invalid-feedback">
              Valid City of residence is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="State">State</label>
            <input type="text" class="form-control" id="State" placeholder="" value="" required name="state">
            <div class="invalid-feedback">
              Valid State is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="country">country</label>
            <input type="text" class="form-control" id="country" placeholder="" value="" required name="country">
            <div class="invalid-feedback">
              Valid country is required.
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
        <input type="reset" class="btn btn-primary" value="Reset" name="Reset">
        
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
let Current_Status=document.getElementById('Current_Status');
Current_Status.addEventListener('input',function(){
    
    let validate=document.getElementById('validate');
    if(Current_Status.value==="Higher Studies")
    {
        validate.innerHTML =`
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Study">Study</label>
            <input type="text" class="form-control" id="Study" placeholder="" value="" required name="hig_studies">
            <div class="invalid-feedback">
              Valid Study is required.
            </div>
          </div>
    </div>
        `;
    }
    else if(Current_Status.value==="Working in Organization")
    {validate.innerHTML =`
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Organization Name">Organization Name</label>
            <input type="text" class="form-control" id="Organization Name" placeholder="" value="" required name="org">
            <div class="invalid-feedback">
              Valid Organization Name is required.
            </div>
          </div>
    </div>
        `;
    }
    else if(Current_Status.value==="Bussiness or Startup")
    {validate.innerHTML =`
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Company name">Company name</label>
            <input type="text" class="form-control" id="Company name" placeholder="" value="" required name="company">
            <div class="invalid-feedback">
              Valid Company name is required.
            </div>
          </div>
    </div>
    <div class="mb-3">
          <label for="Bussiness Information">Bussiness Information</label>
          <textarea type="text" class="form-control" id="Bussiness Information" required name="bus"></textarea>
          <div class="invalid-feedback">
            Please enter your Bussiness Information.
          </div>
    </div>
        `;
        
    }
    
});
function course_names(){
const xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","course_select.php?clg_name="+document.getElementById('clg_name').value,false);
xmlhttp.send(null);
document.getElementById("course-name").innerHTML=xmlhttp.responseText;
}

</script>

</body>
</html>
<?php include "footer.php"?>
