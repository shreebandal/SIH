<?php 

  require_once 'theader.php';

  $email = $_SESSION['login'];
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
    <tr><td><a href = 'profile.php'><button> View </button></a></td>
      <td><button>Contact</button></td>
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