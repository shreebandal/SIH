<?php require_once 'header.php';?>

<!-- <form action="alumni_details.php" method="POST">

    <div class="input-group">
        <input type="text" name="title" placeholder="Alumni name/College name" class="form-control">
         <input type="submit" name="submit" class="btn-primary" value="Search"> -->
        <!-- <button type='submit' name = 'submit'>search</button>
    </div>
</form> --> 


<?php 


         
            $query1 = "SELECT * FROM alumni WHERE is_validated= 0";
                
         
            $query_run = $con->query($query1);

        if(!$query_run) 
            die("Unable to fetch data".mysqli_error($con));
            $rowcount= mysqli_num_rows($query_run);

            if(!($rowcount))
                echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
?>
         
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Alumni Name</th>
      <th scope="col">Alumni College</th>
      <th scope="col">Course</th>
      <th scope="col">Current Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while($row = mysqli_fetch_assoc($query_run)){
    ?>

  <tr>
      <td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
      <td><?php echo $row['clg_name']?></td>
      <td><?php echo $row['course'];?></td>
      <td><?php echo $row['cur_status'];?></td>
      <td><a href="view_profile.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">View</button></a></td>
      <td><a href="verify.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">Validate</button></a></td>
    </tr>
<?php   } ?>  
</tbody>
</table>

<?php require_once 'footer.php';?>