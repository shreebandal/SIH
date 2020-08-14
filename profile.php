<?php include 'header.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Profile Update</title>

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
      <?php
 
if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
    $ri =  "SELECT * FROM alumni WHERE email='$email'";
    $result = mysqli_query($con,$ri);
    if(!$result){
        die("Unable to fetch database");
    }

  $row = mysqli_fetch_assoc($result);

}
?>  
  </head>
  <body class="bg-light">
    <div class="container">
    <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Profile Update</h2>
  </div>
<hr>
  <div class="row">
    <div class="col-md-12 order-md-2 mb-4">
  
      <form class="needs-validation" action="profileupdate.php" method="post" enctype="multipart/form-data" >

        <div class="row">

          <div class="col-md-6 mb-3">
            <label for="Contact">Contact</label>
            <input type="text" class="form-control" id="Contact" placeholder="" value="<?php echo $row['contact'];?>" required name="contact">
            <div class="invalid-feedback">
              Valid Contact is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Email ID">Email ID</label>
            <input type="text" class="form-control" id="Email ID" placeholder="" value="<?php echo $row['email'];?>" required name="emailid">
            <div class="invalid-feedback">
              Valid Email ID is required.
            </div>
          </div>
          </div>
          
        
        <div class="row">
          <!-- <div class="col-md-6 mb-3">
            <label for="Course">Course</label>
            <input type="text" class="form-control" id="Course" placeholder="" value="<?php echo $row['course'];?>" required name="course">
            <div class="invalid-feedback">
              Please select a valid Course.
            </div>
          </div> -->
          <div class="col-md-6 mb-3">
          <label for="Current Status">Current Status</label>
            <select class="custom-select d-block w-100" id="Current_Status" required name="cur_status">
              <option value="">Choose...</option>
              <option value = "Higher Studies">Higher Studies</option>
              <option value = "Working in Organization">Working in Organization</option>
              <option value = "Bussiness or Startup">Bussiness or Startup</option></select>
          </div>
          <div class="col-md-6 mb-3">
          <div id="validate"></div>
          </div>
          </div>


        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="City of residence">City of residence</label>
            <input type="text" class="form-control" id="City of residence" placeholder="" value="<?php echo $row['city'];?>" required name="city">
            <div class="invalid-feedback">
              Valid City of residence is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="State">State</label>
            <input type="text" class="form-control" id="State" placeholder="" value="<?php echo $row['state'];?>" required name="state">
            <div class="invalid-feedback">
              Valid State is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="country">country</label>
            <input type="text" class="form-control" id="country" placeholder="" value="<?php echo $row['country'];?>" required name="country">
            <div class="invalid-feedback">
              Valid country is required.
            </div>
          </div>
        </div>

        
          <input type="submit" class="btn btn-primary" value="update" name="update">
    
        
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
let Current_Status=document.getElementById('Current_Status');
Current_Status.addEventListener('input',function(){
    let html='';
    let validate=document.getElementById('validate');
    if(Current_Status.value==="Higher Studies")
    {
        validate.innerHTML =`
    
          <label for="Study">Study</label>
            <input type="text" class="form-control" id="Study" placeholder="" value="" required name="hig_studies">
            <div class="invalid-feedback">
              Valid Study is required.
            </div>
   
        `;
    }
    else if(Current_Status.value==="Working in Organization")
    {validate.innerHTML =`
  
          <label for="Organization Name">Organization Name</label>
            <input type="text" class="form-control" id="Organization Name" placeholder="" value="" required name="org">
            <div class="invalid-feedback">
              Valid Organization Name is required.
            </div>
  
        `;
    }
    else if(Current_Status.value==="Bussiness or Startup")
    {validate.innerHTML =`
  
          <label for="Company name">Company name</label>
            <input type="text" class="form-control" id="Company name" placeholder="" value="" required name="company">
            <div class="invalid-feedback">
              Valid Company name is required.
            </div>
 
  
          <label for="Bussiness Information">Bussiness Information</label>
          <textarea type="text" class="form-control" id="Bussiness Information" required name="bus"></textarea>
          <div class="invalid-feedback">
            Please enter your Bussiness Information.
          </div>

        `;
        
    }
});

</script>
</body>
</html>
