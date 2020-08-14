
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Alumini Registeration</title>

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
    <h2>Alumini Registeration</h2>
  </div>
<hr>
  <div class="row">
    <div class="col-md-12 order-md-2 mb-4">
  
      <form class="needs-validation" action="ValidateStudent.php" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="fname">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="lname">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="College Name">College Name</label>
            <select class="custom-select d-block w-100" id="College Name" required name="cname">
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid College Name.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Contact">Contact</label>
            <input type="number" class="form-control" id="Contact" placeholder="" value="" required name="contact">
            <div class="invalid-feedback">
              Valid Contact is required.
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Email ID">Email ID</label>
            <input type="email" class="form-control" id="Email ID" placeholder="" value="" required name="email">
            <div class="invalid-feedback">
              Valid Email ID is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Enrollment ID">Enrollment ID</label>
            <input type="number" class="form-control" id="Enrollment ID" placeholder="" value="" required name="enroll">
            <div class="invalid-feedback">
              Valid Enrollment ID is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="Admission pas_year">Admission year</label>
            <input type="number" class="form-control" id="Admission pas_year" placeholder="" value="" required name="year">
            <div class="invalid-feedback">
              Valid Admission pas_year is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="Passout pas_year">Passout pas_year</label>
            <input type="number" class="form-control" id="Passout pas_year" placeholder="" value="" required name="passyear">
            <div class="invalid-feedback">
              Valid Passout pas_year is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="Date of birth">Date of birth</label>
            <input type="date" class="form-control" id="Date of birth" placeholder="" value="" required name="dob">
            <div class="invalid-feedback">
              Valid Date of birth is required.
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Course">Course</label>
            <select class="custom-select d-block w-100" id="Course" required name="course">
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid Course.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Current Status">Current Status</label>
            <select class="custom-select d-block w-100" id="Current_Status" required name="status">
              <option value="">Choose...</option>
              <option value = "Higher Studies">Higher Studies</option>
              <option value = "Working in Organization">Working in Organization</option>
              <option value = "Bussiness or Startup">Bussiness or Startup</option></select><br><br>
            </select>
            <div class="invalid-feedback">
              Please select a valid Current Status.
            </div>
          </div>
          </div>
          <div id="validate"></div>


        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="City of residence">City of residence</label>
            <input type="text" class="form-control" id="City of residence" placeholder="" value="" required name="city">
            <div class="invalid-feedback">
              Valid City of residence is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="State">State</label>
            <input type="text" class="form-control" id="State" placeholder="" value="" required name="state">
            <div class="invalid-feedback">
              Valid State is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="country">country</label>
            <input type="text" class="form-control" id="country" placeholder="" value="" required name="country">
            <div class="invalid-feedback">
              Valid country is required.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Profile Password">Profile Password </label>
            <input type="password" class="form-control" id="Profile Password" placeholder="" value="" required name="password">
            <div class="invalid-feedback">
              Valid Profile Password is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Confirm Password"> Confirm Password</label>
            <input type="password" class="form-control" id="Confirm Password" placeholder="" value="" required name="pass">
            <div class="invalid-feedback">
              Valid Confirm Password is required.
            </div>
          </div>
          </div>
          <button type="submit" class="btn btn-primary">SUBMIT</button>
        <button type="reset" class="btn btn-primary">RESET</button>
        </div>
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
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Study">Study</label>
            <input type="text" class="form-control" id="Study" placeholder="" value="" required name="org">
            <div class="invalid-feedback">
              Valid Study is required.
            </div>
          </div>
    </div>
        `;
    }
    else if(Current_Status.value==="Working in Organization")
    {validate.innerHTML =`
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Organization Name">Organization Name</label>
            <input type="text" class="form-control" id="Organization Name" placeholder="" value="" required name="org">
            <div class="invalid-feedback">
              Valid Organization Name is required.
            </div>
          </div>
    </div>
        `;
    }
    else if(Current_Status.value==="Bussiness or Startup")
    {validate.innerHTML =`
    <div class="row">
          <div class="col-md-12 mb-3 ">
          <label for="Company name">Company name</label>
            <input type="text" class="form-control" id="Company name" placeholder="" value="" required name="org">
            <div class="invalid-feedback">
              Valid Company name is required.
            </div>
          </div>
    </div>
    <div class="mb-3">
          <label for="Bussiness Information">Bussiness Information</label>
          <textarea type="text" class="form-control" id="Bussiness Information" required name="bus"></textarea>
          <div class="invalid-feedback">
            Please enter your Bussiness Information.
          </div>
    </div>
        `;
        
    }
});
</script>
</body>
</html>
