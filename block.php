<?php include 'header.php'; ?>

<?php
$name=$_POST['num'];
$roomname=$_POST['roomname'];

$d="DELETE FROM message where ip='$name'";
mysqli_query($con,$d);

$c="INSERT INTO alumni_block (ip,roomname) values ('$name','$roomname')";
mysqli_query($con,$c);

header('location:ChatRoom.php');
?>