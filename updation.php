<?php include 'session.php';?>

<?php
$nm = $_POST['name'];
$name = $_POST['EventName'];
$sta_date = $_POST['StartingDate'];
$end_date = $_POST['EndingDate'];
$sta_time = $_POST['StartTime'];
$end_time = $_POST['EndTime'];

$moto = $_POST['Moto'];
$venue = $_POST['Venue'];
$college = $_POST['College'];
$description = $_POST['Description'];


$q = "UPDATE event SET name='$name', sta_date='$sta_date',end_date='$end_date', sta_time='$sta_time',end_time='$end_time', moto='$moto', venue='$venue', college='$college', description='$description' where id='$nm'";
                $q_run = mysqli_query($con, $q);
                mysqli_close($con);
                header('location:events.php');
?>