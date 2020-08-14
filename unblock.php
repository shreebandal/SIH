<?php include 'header.php'; 

$roomname=$_GET['roomname'];

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Unblock Users</title>

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

<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    



  <div class="container">
  <h3 style="text-align:center; margin: 20px auto;">Block Users</h3>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Names</th>
      <th scope="col">unblock</th>
    </tr>
  </thead>
  <tbody>

  <?php
 
    $q      = "SELECT * from alumni_block WHERE roomname='$roomname'";
    $result = mysqli_query($con,$q);



$num    = mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
	{
          $row=mysqli_fetch_array($result); ?>

    <tr>
      <td><?php echo $row['ip'];?></td>
      <td><a class="btn btn-primary" href="unblock-user.php?roomname=<?php echo $roomname;?>&ip=<?php echo $row['ip'];?>">Unblock</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

           </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
