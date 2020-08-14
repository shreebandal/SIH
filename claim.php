<?php
require_once 'session.php';
session_start();
if(isset($_POST['room'])){
    if(isset($_SESSION['clogin'])){
        $email = $_SESSION['clogin'];
        $query = "SELECT * FROM college WHERE email='$email'";
        $query_run = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($query_run);
        $clg_name = $row['clg_name'];
    }


    $room=$_POST['room'];
    $sql="SELECT * FROM room WHERE roomname ='$room'";
    $result=mysqli_query($con,$sql);
    if($result){
    if(mysqli_num_rows($result)>0)
    {
        $message="please choose a different room name. This room is already claimed";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        //echo 'window.location="http://localhost/Alumni_Tracking/ChatRoom.php";';
        echo '</script>';
    }
    else
    {
        $sql="INSERT INTO room (roomname,stime, creater) VALUES ('$room', CURRENT_TIMESTAMP, '$clg_name')";
        if(mysqli_query($con,$sql))
        {
            $message="Your room is ready and you can chat now!";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Alumni_Tracking/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
    }
}
else
{
    echo mysqli_error($con);
}

}
    

?>