<?php
    require_once 'header.php';
    
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        
        $q = "SELECT * FROM alumni WHERE id = '$id'";
        $q_run = mysqli_query($con, $q);

        if(!$q_run)
            die("Unable to connect to database".mysqli_error($con));

        $row = mysqli_fetch_assoc($q_run);
        $emailid = $row['email'];

        $query = "UPDATE alumni SET is_validated= '1' WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        
        if(!$query_run)
            die('Unable to connect to databse.'.mysqli_error($con));
        else{
          
            $mail->Subject="Verification successfull";   //recipient
            $mail->addAddress($emailid);
            $mail->Body="Your account has been successfully verified. Thanks for registration. <a href='localhost/projects/Alumni_Tracking/login.php'>Click here</a> for login.";
  
            if(!$mail->send())
                echo "Mail not sent.";  
        }
        
       


    }
?>    
	</style>
</head>

<body>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group row">
                            

                            
                            <div class="col-md-6">
                                <a href="alumni_details.php"><button class="btn btn-primary">Go Back</button></a>
                            </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>