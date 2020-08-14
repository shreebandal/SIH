<?php include 'header.php';
if(!isset($_SESSION['login']) && !isset($_SESSION['clogin'])){  ?>

  <button type="button" class="btn btn-secondary"><a style="color:white;text-decoration:none; "href="show.php">Show Events</a></button>
<?php } 
else {
?>


<?php
	if(isset($_POST['upload'])){
		$topic = $_POST['topic'];
		$files = $_FILES['file'];

		$filename =$files['name'];
		$fileerror = $files['error'];
		$filetmp = $files['tmp_name'];
    $filerand = uniqid();

		$fileext = explode('.',$filename);
		$filecheck = strtolower(end($fileext));

		$fileextstored = array('png','jpg','jpeg','pdf');

    $strFilename = 'picture/'.$filerand.'_'.$filename;

    $sq = "SELECT name, file FROM event WHERE name='$topic' AND file='$strFilename'";
    $query1 = mysqli_query($connection, $sq);

    if($query1){
    if($row = mysqli_num_rows($query1) == 0){
        if ($fileext[1] == 'png' || $fileext[1] == 'jpg' || $fileext[1] == 'jpeg' || $fileext[1] == 'pdf') {
            if (in_array($filecheck, $fileextstored)) {
                $destinationfile = 'picture/'.$filerand.'_'.$filename;
                move_uploaded_file($filetmp, $destinationfile);

                $q = "INSERT INTO `event` (`name`, `file`) VALUES ('$topic', '$destinationfile')";

                $query = mysqli_query($connection, $q);

                if(!$query){
                  $uploaderr = "Unable to upload resource";
                }

            }
        }else $uploaderr = "Only png, jpg, jpeg and png formats are supported";
    }else{
        $uploaderr = "File is already uploaded";
    }
  }else echo "Unable to run query";

	}

?>
<?php
if(isset($_POST["register"])){
         $name=$_POST['EventName'];
         //$ban=$_POST['Event'];
         $str_dt=$_POST['StartingDate'];
         $ed_dt=$_POST['EndingDate'];
         $str_tm=$_POST['StartTime'];
         $ed_tm=$_POST['EndTime'];
        
         $moto=$_POST['Moto'];
         $venue=$_POST['Venue'];
         $clg=$_POST['College'];
         $des=$_POST['Description'];
     
     if(isset($_SESSION['login'])){
     $email = $_SESSION['login'];
     $sql1 = "select * from alumni where email = '$email'";
     $result1 = mysqli_query($con,$sql1);
     $rowcount= mysqli_num_rows($result1);
     }
     else{
      $email = $_SESSION['clogin'];
      $sql1 = "select * from college where email = '$email'";
      $result1 = mysqli_query($con,$sql1);
      $rowcount= mysqli_num_rows($result1);
     }
     $row1 = $result1->fetch_assoc();
     $email = $row1['email'];
    // $sql="SELECT * FROM alumni WHERE email=$email";
    // $results = mysqli_query($con,$sql);
    // $num    = mysqli_num_rows($results);
    //mysqli_close($con);
    // $row = mysqli_fetch_array($results);
    $prof=$row1['prof'];
    
    
         $result=mysqli_query($con,"INSERT into event(name,sta_date,end_date,sta_time,end_time,moto,venue,college,description,organizer,email) values('$name','$str_dt','$ed_dt','$str_tm','$ed_tm','$moto','$venue','$clg','$des','$prof','$email')");
         if($result){
             header('Location: events.php');
         }

         
          }  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Events</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

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
      .container {
        max-width: 960px;
        }

    .lh-condensed { line-height: 1.25; }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body class="bg-light">
    <div class="container">
    <div class="py-5 text-center">
    <h2>Events</h2>
  </div>
<hr>
  <div class="row">
  <div class="col-md-2 order-md-2 mb-4">
      <ul class="list-group mb-3">
        <li class=" d-flex justify-content-between lh-condensed">
          <div>
          <button type="button" class="btn btn-secondary"><a style="color:white;text-decoration:none; "href="show.php">Show Events</a></button>
          </div>
        </li><hr>
        <li class=" d-flex justify-content-between lh-condensed">
          <div>
          <button type="button" class="btn btn-secondary"><a style="color:white;text-decoration:none;" href="show1.php">My Events</a></button>
          </div>
        </li><hr>
        
      </ul>
    </div>
    <div class="col-md-10 order-md-2 mb-4">
  
      <form class="needs-validation" action="events.php" method="post" enctype="multipart/form-data" >
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="EventName">Event Name</label>
            <input type="text" class="form-control" id="EventName" placeholder="" value="" required name="EventName">
            <div class="invalid-feedback">
              Valid Event Name is required.
            </div>
          </div>
          <!-- <div class="col-md-6 mb-3">
            <label for="Event">Event/Banner</label>
            <input type="file" class="form-control" id="Event" placeholder="" value="" name="Event">
            <div class="invalid-feedback">
              Valid Event/Banner is required.
            </div>
          </div> -->
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="StartingDate">Starting Date</label>
            <input type="date" class="form-control" id="StartingDate" placeholder="" value="" required name="StartingDate">
            <div class="invalid-feedback">
              Valid Starting Date is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
          <label for="Date">Ending Date</label>
            <input type="date" class="form-control" id="EndingDate" placeholder="" value="" required name="EndingDate">
            <div class="invalid-feedback">
              Valid Ending Date is required.
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Start Time">Start Time</label>
            <input type="time" class="form-control" id="StartTime" placeholder="" value="" required name="StartTime">
            <div class="invalid-feedback">
              Valid Start Time is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Enrollment ID"> End Time</label>
            <input type="time" class="form-control" id=" EndTime" placeholder="" value="" required name=" EndTime">
            <div class="invalid-feedback">
              Valid  End Time is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="Moto">Moto</label>
            <input type="text" class="form-control" id="Moto" placeholder="" value="" required name="Moto">
            <div class="invalid-feedback">
              Valid Moto is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="Venue">Venue</label>
            <input type="text" class="form-control" id="Venue" placeholder="" value="" required name="Venue">
            <div class="invalid-feedback">
              Valid Venue is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="College">College</label>
            <input type="text" class="form-control" id="College" placeholder="" value="" required name="College">
            <div class="invalid-feedback">
              Valid College is required.
            </div>
          </div>
        </div>
        


        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="Description">Description</label>
            <textarea type="text" class="form-control" id="Description" placeholder="" value="" required name="Description">
            </textarea>
          </div>
        </div>

          <input type="submit" class="btn btn-primary" value="register" name="register">
        <input type="reset" class="btn btn-primary" value="Reset" name="Reset">
        
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 
    <?php } ?>