<?php
require_once 'session.php';
session_start();

if(isset($_POST['submit'])){

    $msg=$_POST['usermsg'];
    $room=$_POST['room'];

if(isset($_SESSION['login'])){
    

    $email = $_SESSION['login'];
    $query = "SELECT * FROM alumni WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    if(!$query_run)
            die("Unable to fetch database".mysqli_error($con));
    $row = mysqli_fetch_assoc($query_run);

    $name = $row['firstname'].' '.$row['lastname'];

}else if(isset($_SESSION['clogin'])){
    
    
    $email = $_SESSION['clogin'];
    $query = "SELECT * FROM college WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    if(!$query_run)
            die("Unable to fetch database".mysqli_error($con));
    $row = mysqli_fetch_assoc($query_run);

    $name = $row['clg_name'];
}

$sql="INSERT INTO message(msg,room,ip,stime) VALUES ('$msg','$room','$name', CURRENT_TIMESTAMP)";

$result=mysqli_query($con,$sql);
mysqli_close($con);
header('location: http://localhost/Alumni_Tracking/rooms.php?roomname='.$room.'');
}
    
?>