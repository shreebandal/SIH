<?php
    
    function escape($string){
        global $con;
        return @mysqli_real_escape_string($con, $string);
    }

    function getToken($len){
      $random_string = md5(uniqid(mt_rand(),true));
      $base64_encoded = base64_encode($random_string);
      $modified_base64_encoded = str_replace(array('+','='), array('', ''), $base64_encoded);
      $token = substr($modified_base64_encoded, 0, $len);
      return $token;
    }

    // function selectbytoken($token){
    //   global $con;
    //   $query = "SELECT username FROM remember_me WHERE selector = '$token'";
    //   $query_run = mysqli_query($con, $query);
    //   if(!$query_run){
    //     die("Unable to connect to database".mysqli_error($con));
    //   }
    //   $result = mysqli_fetch_assoc($query_run);
    //   $username = $result['username'];
    //   $query1 = "SELECT * FROM user_details WHERE username = '$username'";
    //   $query_run1 = mysqli_query($con, $query1);
    //   if(!$query_run1){
    //     die("Unable to connect to database".mysqli_error($con));
    //   }
    //   $result1 = mysqli_fetch_assoc($query_run1);
    //   return $result1['first_name']." ".$result1['last_name'];
    // }

?>
