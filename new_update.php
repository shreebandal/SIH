

<?php
	require_once 'header.php';
	
if (isset($_POST['submit'])) {
		$email = $_SESSION['clogin'];

		$sql = "select * from college where email = '$email'";
		$result1 = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result1);
		$clg = $row['clg_name'];

        $update=$_POST['newupdate'];
        $q="INSERT INTO `setupdate` (`setupdate`,`college_name`) VALUES ('$update','$clg');";
        $result=mysqli_query($con,$q);
        mysqli_close($con);
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>  <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    *{
        font-size:20px;

    }
	
    .fm{
        border:2px solid grey;
        margin-top:100px;
        padding:50px;
	
    }
	label{
		font-size: 50px;
	}
   
    input[type=submit]{
        
      font-size:20px;
      padding:10px;
      border:none;
      background:slateblue;
      color:white;
      align:center;
	  margin-top:20px;
	 
    }
	input[type=submit]:hover{
	  opacity:0.5;
	  
	}
	textarea{
		height:300px ;
		width:100% ;
	}
    </style>
	</head>
	<body>
		<div class="container">
			<div class="row">


			
	<div class="col-md-3"></div>
    <div class="col-md-6">
		<div class="fm">
		<form class="" action="new_update.php" method="post">
	<label for="newupdate">Notice</label><br>
	    <textarea name="newupdate"></textarea><br>
		<input type="submit" name="submit" value="submit">

		</form>
		</div>	
	</div>
		</div>
	<div class="col-md-3"></div>
	</div>
	</body>
</html>