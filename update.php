<?php include 'header.php'; ?>

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
    <img class="d-block mx-auto mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Events</h2>
  </div>
<hr>
  <div class="row">
    <div class="col-md-12 order-md-2 mb-4">
  
    <?php
 
if(isset($_POST['name'])){
    $nm = $_POST['name'];
    $ri =  "SELECT * FROM event WHERE id='$nm'";
    $result = mysqli_query($con,$ri);
    if(!$result){
        die("Unable to fetch database");
    }

  $row = mysqli_fetch_assoc($result);

}
?>

      <form class="needs-validation" action="updation.php" method="post" enctype="multipart/form-data" >
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="EventName">Event Name</label>
            <input type="text"  class="form-control" id="EventName" placeholder="" value="<?php echo $row['name'];?>" required name="EventName">
            <div class="invalid-feedback">
              Valid Event Name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Event">Event/Banner</label><br>
            <img src="<?php echo $row['img'];?>">
            <div class="invalid-feedback">
              Valid Event/Banner is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="StartingDate">Starting Date</label>
            <input type="date"  class="form-control" id="StartingDate" placeholder="" value="<?php echo $row['sta_date'];?>" required name="StartingDate">
            <div class="invalid-feedback">
              Valid Starting Date is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
          <label for="Date">Ending Date</label>
            <input type="date"  class="form-control" id="EndingDate" placeholder="" value="<?php echo $row['end_date'];?>" required name="EndingDate">
            <div class="invalid-feedback">
              Valid Ending Date is required.
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Start Time">Start Time</label>
            <input type="time"  class="form-control" id="StartTime" placeholder="" value="<?php echo $row['sta_time'];?>" required name="StartTime">
            <div class="invalid-feedback">
              Valid Start Time is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Enrollment ID"> End Time</label>
            <input type="time"  class="form-control" id=" EndTime" placeholder="" value="<?php echo $row['end_time'];?>" required name=" EndTime">
            <div class="invalid-feedback">
              Valid  End Time is required.
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="Moto">Moto</label>
            <input type="text"  class="form-control" id="Moto" placeholder="" value="<?php echo $row['moto'];?>" required name="Moto">
            <div class="invalid-feedback">
              Valid Moto is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="Venue">Venue</label>
            <input type="text"  class="form-control" id="Venue" placeholder="" value="<?php echo $row['venue'];?>" required name="Venue">
            <div class="invalid-feedback">
              Valid Venue is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="College">College</label>
            <input type="text"  class="form-control" id="College" placeholder="" value="<?php echo $row['college'];?>" required name="College">
            <div class="invalid-feedback">
              Valid College is required.
            </div>
          </div>
        </div>
        
        <input type="hidden" value="<?php echo $nm ;?>" name="name">

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="Description">Description</label>
            <textarea type="text"  class="form-control" id="Description" placeholder="" value="<?php echo $row['description'];?>" required name="Description">
            </textarea>
          </div>
        </div>
          
          <input type="submit" class="btn btn-primary" value="update" name="register">

        
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 



