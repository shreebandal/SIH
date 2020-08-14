<?php require_once 'header.php';?>
<!DOCTYPE html> 
<html> 
<!-- <link rel="stylesheet" href="css\bootstrap.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
<style> 
*{
    margin:0;
    padding:0;
    
}
.alg{
  margin:30px;
  font-size:15px;
  text-align:center;
}
.alg a{
  text-decoration:none;
  color:white;
}

.ms{
  padding:20px;
  color: aliceblue;
  margin:50px 0 0 0;
  box-shadow: 4px 8px 10px 4px rgba(0,0,0,1);
 
}
.ms h1{
  padding-bottom:100px;
}
.ms p{
  font-size: 18px;
}
.fm{
          border:2px solid black;
          margin-top:10px;
          height:80%;
          width:30%;
          position:fixed;
          padding:20px;
      } 
      .imp{
        margin:50px 0 0 50px;
      }   
      footer{
        height:100px;
        background:black;
        color:white;
        position:bottom;
      }
      .left{
        margin-top:20px;
      }
    .bg{
      background: #005AA7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFDE4, #005AA7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFDE4, #005AA7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */}

</style> 
  
<body> 
  <div class="bg">
  <div class="container">
   <div class="row">
  
    <div class="col-md-6">
      <div class="ms" style="background: black;opacity: 0.6;">
     <h1>ABOUT US</h1>
     <p>The Directorate of Higher Education has 7 Government Colleges and 26 aided colleges under it. 
Altogether, more than 10000 students that pass out from them every year either choose to opt for further studies,
 work or have their own startups.So this is first ever tracking system of its kind to keep track of  alumnies by both directorate and colleges.
     </p>
    </div>

    </div>
    <div class="col-md-6">
      <?php include 'session.php'?>
<?php
$a       = "select * from setupdate";
$result = mysqli_query($con,$a);
$num    = @mysqli_num_rows($result);
//mysqli_close($con);
?>

<!-- <div class="col-4 col-md-4"></div>
    <div class="col-4 col-md-4"></div>
    <div class="col-4 col-md-4"><div class="fm"> -->
   <div class="imp">
<div class = "row">
<div class = "col-md-6 ">
        <h4>Important Updates</h4>
        <hr>
        <marquee direction = "up" onmouseover="this.stop();" onmouseout = "this.start();"> 
        <ul>

        <?php
        
           

             while($row = mysqli_fetch_array($result)){
        ?>
        
        <b><?php echo $row['college_name'];?></b>
        <li><span id="imp_n"> </span><span id="up_li"><?php echo $row['setupdate'];?></span></li>
        <hr><?php
            }
        ?>

        </ul> </marquee>
    </div>

</div>
      
    </div></div>
  </div>  
  </div>
  <div class="container">
    <div class="row">
    <div class="col-4 col-md-6">
      <div class="ms" style="background: black;opacity: 0.6;">
        <h1>FEATURES</h1>
        <p>Alumni members can register themselves
 	Colleges can authenticate and verify their registered colleges
 	Alumni can update their details as per requirement
 	College can search search details based on criteria such as year, subject, etc.
 	Directorate can searech details based on criteria such as colleges, year, subject, etc. 
 	Send emails to alumni members
 	Group chat for alumni members
 	Event hosting for both directotate and college
 	Payment option to accept fund for events by alumni members
        </p>
       </div>
    </div>
    </div>
    </div><br><br>



    <footer>
      
      <div class="container">
      <div class="alg">
      <div class="row">
    <div class="col-4 col-md-4">
    This Site is made by &copy; HackOverflow <br>
      New User? <a href="#">Visit the homepage</a>
    </div>
    <div class="col-4 col-md-4">
    Lets connect our memories.... </div>
    <div class="col-4 col-md-4">
    <a href=mailto:hackoverflow0@gmail.com?
	subject="This is trial subject">
Contact Us</a>
    </div>
    </div>
      </div>
    </footer>
    </div>

  </body> 


</html> 
