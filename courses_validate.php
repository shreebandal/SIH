<?php include 'header.php'; ?>
<?php
if (isset($_POST['register'])) { 
    $Courses       = escape($_POST['Courses']);
    $clg_name       = escape($_POST['clg_name']);
    
    for($i=1;$i<=$Courses;$i++){
        $Course  ='Courses'.$i;
        $Course   = escape($_POST['Courses'.$i]);
        $query = "INSERT INTO  courses (clg_name,course) VALUES('$clg_name','$Course')";
            $query_run = mysqli_query($con, $query);
            if (!$query_run) 
                die("Query failed ".mysqli_error($con));
            else{
                header('location:courses.php?clg_name='.$_POST['clg_name'].'');
            }
    }
    
}


?>