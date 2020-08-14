<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
<!-- <?php
 require_once 'config.php';


$q="SELECT * FROM event";
$result=mysqli_query($connection, $q);

if(!$result)
  die('Unable to connect to database'.mysqli_error($connection));

$row=mysqli_fetch_assoc($result);



?> -->
    <form action="">
   <!-- <?php  while($row){?> -->
    <input type="text" readonly class="form-control-plaintext" id="id" value="<?php echo $row['name'];?>">
   <!-- <?php   }
   mysqli_close($connection);
   ?>   -->
    </form>
</body>
</html>