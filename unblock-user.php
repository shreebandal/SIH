<?php
include 'header.php'; 
$roomname=$_GET['roomname'];
$ip=$_GET['ip'];
$q="DELETE FROM alumni_block where ip='$ip'";
mysqli_query($con,$q);
header('location:unblock.php?roomname='.$_GET['roomname'].'');
?>