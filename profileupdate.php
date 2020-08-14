<?php include 'header.php'; ?>
<?php

$emailid=$_SESSION['login'];


$contact = $_POST['contact'];
$email = $_POST['emailid'];

if(isset($_POST['hig_studies'])){
    $bus = NULL;
        $org = NULL;
        $company = NULL;
        $hig_studies = $_POST['hig_studies'];
}
else if(isset($_POST['org'])){
    $bus = NULL;
        $hig_studies = NULL;
        $company = NULL;
        $org = $_POST['org'];
}
else{
    $hig_studies = NULL;
        $org = NULL;
        $bus = $_POST['bus'];
        $company = $_POST['company'];
}
// $course = $_POST['course'];
$cur_status = $_POST['cur_status'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$q = "UPDATE alumni SET contact='$contact',email='$email',cur_status='$cur_status', city='$city',
 state='$state', country='$country',hig_studies='$hig_studies',org='$org',bus='$bus',company='$company' where email='$emailid'";
                $q_run = mysqli_query($con, $q);
                $_SESSION['login']=$email;
                //mysqli_close($con);
                header('location:profile_alumni.php');
?>