<?php include "session.php"?>
<?php
$clg=$_GET['clg_name'];
            if($clg!="")
            {
              $query=mysqli_query($con,"SELECT * FROM courses WHERE clg_name='$clg'");?>
              <select class="custom-select d-block w-100 mt-5" name="course"><?php
              //echo "<select>";
              while($row=mysqli_fetch_array($query)){
              ?>
              <option value="<?php echo $row['course'];?>"><?php echo $row['course'];?></option>
              
              <?php
              //echo "</select>";
            }?>
            </select>
        <?php
        }
            ?>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       