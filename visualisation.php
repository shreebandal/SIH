<?php require_once 'header.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <style>
      
      .vis{
        margin-top:50px;
        width:100%;
        border:none;
        padding:20px;
        box-shadow: 4px 4px 8px 4px rgba(0,0,0,0.2);
        
      }
      .vis:hover{
        box-shadow: 2px 8px 16px 0 rgba(0,0,0,0.2);
      }
      .vis h3{
        padding-bottom:40px;
      }
      .vis button{
        padding:10px;
        border:none;
        margin:10px;
        background:slateblue;
        color:white;
        font-weight:bold;
        width:150px;
      }
      .vis button:hover{
        opacity: 0.7;
      }
      iframe{
        width:100%;
        height:600px;
        box-shadow: 4px 4px 8px 4px rgba(0,0,0,0.2);
        margin-top:100px;
        margin-bottom: 30px;
      }
      iframe:hover{
        box-shadow: 2px 8px 16px 0 rgba(0,0,0,0.2);
      }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="row">
      
    <div class="vis">
         <h3> Click On the Button For Visualisation of Data of Registered Colleges</h3>
         <a href="<?php echo 'city.php'?>" target="_frm"> <button type="button" name="button" value="City"> City</button></a>
         <a href="<?php echo 'taluka.php'?>" target="_frm"><button type="button" name="button" value="Taluka">Taluka</button></a>
         <a href="<?php echo 'district.php'?>" target="_frm"><button type="button" name="button" value="District">District</button></a>
         <a href="<?php echo 'clg_status.php'?>" target="_frm"><button type="button" name="button" value="College Status">College Status</button></a>
      
      
         <h3> Click On the Button For Visualisation of Data of Registered Alumni</h3>
         <a href="<?php echo 'clg_name.php'?>" target="_frm"><button type="button" name="button" value="College Name">College Name</button></a>
         <a href="<?php echo 'adm_year.php'?>" target="_frm"><button type="button" name="button" value="Admission Year">Admission Year</button></a>
         <a href="<?php echo 'pas_year.php'?>" target="_frm"><button type="button" name="button" value="Passout Year">Passout Year</button></a>
         <a href="<?php echo 'course.php'?>" target="_frm"><button type="button" name="button" value="Course">Course</button></a>
         <a href="<?php echo 'cur_status.php'?>" target="_frm"><button type="button" name="button" value="Current Status">Current Status</button></a>
         <a href="<?php echo 'state.php'?>" target="_frm"><button type="button" name="button" value="State">State</button></a>
         <a href="<?php echo 'country.php'?>" target="_frm"><button type="button" name="button" value="Country">Country</button></a>
        
         </div>
    
    <iframe name="_frm" frameborder="1"></iframe>
    </div>
    </div>
  </body>
</html>
