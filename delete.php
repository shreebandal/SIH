<?php include 'session.php';?>
<?php
$id=$_POST['id'];
$q="delete from event where name='$id'";
$result=mysqli_query($con,$q);
mysqli_close($con);
header('location:show.php');


?>