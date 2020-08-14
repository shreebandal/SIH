<?php 

  require_once 'header.php';

  if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
  $query = "SELECT * FROM alumni WHERE email='$email'";
  $query_run = mysqli_query($con, $query);

  if(!$query_run)
      die("Unable to fetch data".mysqli_error($con));

  $row = mysqli_fetch_assoc($query_run);
  
  // echo $row['firstname']." ".$row['lastname'];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h2{
  margin-top:20px auto;
}

</style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="profile">

    <h2>Alumni Profile</h2>

<div class="card">
  <table border=0>
  <a href = 'profile.php' style="text-decoration:none;"><button class="btn btn-primary">View </button></a>
    
    <tr>
      <td><span>Name: </span></td>
      <td><?php echo $row['firstname']." ".$row['lastname'];?></td>
    </tr>
    <tr><td><span>College Name</span></td>
      <td><?php echo $row['clg_name']; ?></td>
    </tr>
    <tr><td><span>Batch</span></td>
      <td><?php echo $row['adm_year']."-".$row['pas_year']; ?></td>
    </tr>
    <tr><td><span>Current Status</span></td>
      <td><?php echo $row['cur_status'];?></td>
    </tr>
    <tr><td><span>Current City</span></td>
      <td><?php echo $row['city']; ?></td>
    </tr>
  </table> 
  </div>
</div>
</div>
</div>
</div>


</div>
</body>
</html> 
<?php

  }

else if(isset($_SESSION['clogin'])){
$email = $_SESSION['clogin'];
  $query = "SELECT * FROM college WHERE email='$email'";
  $query_run = mysqli_query($con, $query);

  if(!$query_run)
      die("Unable to fetch data".mysqli_error($con));

  $row = mysqli_fetch_assoc($query_run);
  
  // echo $row['firstname']." ".$row['lastname'];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>

<center><h2>College Profile</h2>

<div class="card">
 <!-- <center> <img src="logo.jpg" alt="Opps! We are sorry" style="width:100%"></center>
  <div class="container">
    <center> -->
  <table border=0>
    
    <tr><td>College Name </td>
      <td><?php echo $row['clg_name'];?></td>
    </tr>
    <tr><td>Established</td>
      <td><?php echo $row['est_year']; ?></td>
    </tr>
    <tr><td>email</td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <tr><td>Contact</td>
      <td><?php echo $row['contact'];?></td>
    </tr>
    <tr><td>City</td>
      <td><?php echo $row['city']; ?></td>
    </tr>
  </table> </center>
  </div>
</div>
</center>
</body>
</html> 
<?php
} ?>
  