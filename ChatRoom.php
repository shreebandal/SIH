<?php include 'header.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Chat Group</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">

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

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
  </head>
  <body>
<?php if(isset($_SESSION['clogin'])){

  ?>

<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Chat Group</h1>
    <p class="lead font-weight-normal">Communicate with other alumni, teachers and colleges.</p>
  
    <form action="claim.php" method="post">
      <input type="text" name="room" placeholder="Enter name of new group"></input>
      <button class="btn btn-outline-secondary" href="#">Create Room</button>
    </form>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="container">



<h3>Available Groups</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Group Creater</th>
      <th scope="col">Group Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
    $q      = "SELECT * from room";
    $result = mysqli_query($con,$q);

if(!$result)
      die("Unable to connect".mysqli_error($con));

$num    = mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
						{
              $row=mysqli_fetch_array($result); ?>

    <tr>
      <td><?php echo $row['creater'];?></td>
      <td><?php echo $row['roomname'];?></td>
      <td><a class="btn btn-primary" href="rooms.php?roomname=<?php echo $row['roomname'];?>">Join Room</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table></div>
      <?php }
      else if(isset($_SESSION['login'])){ 
        // $email1234 = $_SESSION['login'];
        // $query1234 = "SELECT * FROM alumni WHERE email='$email1234'";
        // $query_run1234 = mysqli_query($con, $query1234);
        // $row1234 = mysqli_fetch_assoc($query_run1234);
        // $name = $row1234['firstname']." ".$row1234['lastname'];
        
    //     $q123     = "SELECT * FROM alumni_block WHERE ip='$name' ";
    // $result123 = mysqli_query($con,$q123);

    // $row123 = mysqli_fetch_array($result123);
    
    // $roomname=$row123['roomname'];


?>
        <div class="container">
        <h3 style="text-align:center; margin: 20px auto;">Available Groups</h3>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Group Creater</th>
      <th scope="col">Group Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
 
    $q      = "SELECT * from room where roomname NOT IN (SELECT roomname FROM alumni_block)";
    $result1 = mysqli_query($con,$q);
    if(!$result1)
    die("Unable to connect".mysqli_error($con));


$num    = mysqli_num_rows($result1);
for($i=1;$i<=$num;$i++)
						{
              $row=mysqli_fetch_array($result1); ?>
    <tr>
      <td><?php echo $row['creater'];?></td>
      <td><?php echo $row['roomname'];?></td>
      <td><a class="btn btn-primary" href="rooms.php?roomname=<?php echo $row['roomname'];?>">Join Room</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

           <?php }?>
           </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
