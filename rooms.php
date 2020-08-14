<?php
require_once 'header.php';
if(isset($_GET['roomname'])){

  $roomname=escape($_GET['roomname']);

  $sql="SELECT * FROM room WHERE roomname ='$roomname'";
  $result=mysqli_query($con,$sql);
  $q="select * from message where room ='$roomname'";
  $results=mysqli_query($con,$q);

  if(!$results)
      die("Unable to connect to database".mysqli_error($con));

      $num = mysqli_num_rows($results);

  // mysqli_close($con);
  if($result)
  {
      if(mysqli_num_rows($result)==0)
      {
          $message="this room alredy exist. try creating new one";
          echo '<script language="javascript">';
          echo 'alert("'.$message.'");';
          echo 'window.location="http://localhost/Alumni_Tracking/ChatRoom.php";';
          echo '</script>';
      }
  }
  else
  {
      echo mysqli_error($con);
  }
}

?>

<?php
if(isset($_SESSION['login'])){
  $email=$_SESSION['login'];
  $Rname=$_GET['roomname'];
  //echo $email;
  $sql123="SELECT * FROM alumni WHERE email ='$email'";
  $result123=$con->query($sql123);
  $row123=mysqli_fetch_assoc($result123);
  $name=$row123['firstname'].' '.$row123['lastname'];
  //echo $name;
  $sql12345="SELECT * FROM alumni_block WHERE ip ='$name' AND roomname='$Rname'";
  $result12345=mysqli_query($con,$sql12345);
   if(mysqli_fetch_assoc($result12345)>0)
   header('location:ChatRoom.php');
}

  ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>


.contain {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.contain::after {
  content: "";
  clear: both;
  display: table;
}

.contain img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.contain img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyclass{
  height:350px;
  overflow-y:scroll;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">


</head>
<body onload="validate()">


<div class="container">

<div class="contain">
<h2><?php echo $roomname;?></h2>

<div class="anyclass">
<?php
						for($i=1;$i<=$num;$i++)
						{
              $row=mysqli_fetch_array($results);
              echo "<p>".$row['ip']."</p>";
              echo "<p>".$row['msg'].$row['stime']."</p>";
              if(isset($_SESSION['clogin'])){
              ?>
              <form action="block.php" method="post">
              <input type="hidden" name="roomname" value="<?php echo $roomname;?>">
              <input type="hidden" name="num" value="<?php echo $row['ip'];?>">
              <?php 
              $email123=$row['ip'];
              $sql1234="SELECT * FROM college WHERE clg_name ='$email123'";
              $result1234=mysqli_query($con,$sql1234);
              if (mysqli_num_rows($result1234)===0){?>
              <button type="submit" class="btn btn-primary" id="block" name="block">block</button>
              <?php } ?>
              </form>

              <?php
              }
            }
?>
  <div id= "new"></div>
  </div>
</div>
<div class="contain">
<form action="postmsg.php" method="post">
<div id="msginput"></div><br>
<input type="hidden" name="room" value="<?php echo $roomname;?>">
<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<button type="submit" class="btn btn-primary" id="submitmsg" name="submit">send</button>
<button class="btn btn-primary"  name="button"><a href="ChatRoom.php" style="text-decoration:none;color:white">back</a></button>
</form>
<?php
if(isset($_SESSION['clogin'])){
  ?>
  <a href="unblock.php?roomname=<?php echo $roomname;?>">click here</a>
  <?php
}
?>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
setTimeout(function() {
  let usermsg=document.getElementById('usermsg').value;
  localStorage.setItem('usermsg',usermsg);
  location.reload();
}, 10000);
  let msg=localStorage.getItem('usermsg');
  function validate(){
    document.getElementById('new').scrollIntoView({block: "end"});
    if(msg!=null)
    document.getElementById('msginput').innerHTML=`<input type="text" autofocus class="form-control" name="usermsg" onfocus="this.setSelectionRange(this.value.length,this.value.length);" id="usermsg" value="${msg}">`;
  }
  
</script>
</body>
</html>
