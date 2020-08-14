<?php include 'header.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Grid Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/grid/">

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

      .themed-grid-col {
  padding-top: 15px;
  padding-bottom: 15px;
  background-color: rgba(86, 61, 124, .15);
  border: 1px solid rgba(86, 61, 124, .2);
}

.themed-container {
  padding: 15px;
  margin-bottom: 30px;
  background-color: rgba(0, 123, 255, .15);
  border: 1px solid rgba(0, 123, 255, .2);
}
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body class="py-4">
    <div class="container">

  <h1>My Events</h1>
  
  <?php
  if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
  }else if(isset($_SESSION['clogin'])){
    $email = $_SESSION['clogin'];
  }

$q="SELECT * FROM event WHERE email='$email'";
$result=mysqli_query($con, $q);

if(!$result)
  die('Unable to connect to database'.mysqli_error($con));

?>
 <?php  while($row=mysqli_fetch_assoc($result)){ 
       $id = $row['id']; 
       ?> 
<form action="delete.php" method="post">
  <div class="row mb-12">
    <div class="col-12 themed-grid-col"><a style="text-decoration:none"; href='m.php?id=<?php echo $id?>' target="_blank"><input type="label" readonly class="form-control-plaintext" id="id" name="id"value="<?php echo $row['name'];?>"></a>
    <a class="btn btn-primary" href="m.php?id=<?php echo $id?>&edit=1">View</a> 
    <button type="submit" class="btn btn-primary" >delete</button>
    </div>
  
  </div>
  </form>
  <?php
      }
   mysqli_close($con);
   ?>


  
</body>
</html>