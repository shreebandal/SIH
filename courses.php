<?php include 'header.php'; 

$clg_name=$_GET['clg_name'];

$query = "SELECT * FROM college WHERE email='$clg_name'";
  $query_run = mysqli_query($con, $query);

  if(!$query_run)
      die("Unable to fetch data".mysqli_error($con));

  $row = mysqli_fetch_assoc($query_run);
  $name=$row['clg_name'];
 
?>




<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Courses</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    
    
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>College Courses</h2>
  </div>
<hr>
<div>
      <form class="needs-validation" action="courses_validate.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="Courses">Number of Courses</label>
            <input type="text" class="form-control" id="Courses" placeholder="" value="" required name="Courses">
            <div class="invalid-feedback">
              Valid Number of Courses is required.
            </div>
          </div>
          
        </div>
        
          <div id="validate"></div>
             <input type="hidden" name="clg_name" value="<?php echo $name;?>">   
          <input type="submit" class="btn btn-primary" value="register" name="register">
        <input type="reset" class="btn btn-primary" value="reset" name="reset">
      
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
let Courses=document.getElementById('Courses');
Courses.addEventListener('input',function(){
    let html='';
    let validate=document.getElementById('validate');
    for(let i=1;i<=Courses.value;i++)
    {
        html+=`
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Courses${i}">Courses ${i}</label>
            <input type="text" class="form-control" id="Courses${i}" placeholder="" value="" required name="Courses${i}">
            <div class="invalid-feedback">
              Valid Courses is required.
            </div>
          </div>
    </div>
        `;

    }
    validate.innerHTML=html;  
});
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>
