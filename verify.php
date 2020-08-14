<?php
    require_once 'header.php';
    
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        
        $query = "SELECT * FROM alumni WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        if(!$query_run)
            die('Unable to connect to databse.'.mysqli_error($con));

        $row = mysqli_fetch_assoc($query_run);


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
                            <label for="name" style="margin-top: none;" class="col-md-4">Name: </label>
                                <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="name" value="<?php $name = $row['firstname'].' '.$row['lastname']; echo $name;?>">
                            </div>
                            
                            <label for="prn" class="col-md-4">College Name: </label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="prn" value="<?php echo $row['clg_name'];?>">
                                
                            </div>
                            <label for="branch" class="col-md-4">Contact: </label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="branch" value="<?php echo $row['contact'];?>">
                                
                            </div>

                            <label for="email" class="col-md-4">E-mail: </label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $row['email'];?>">
                                </label>
                            </div>
                            
                            <label for="email" class="col-md-4">Course: </label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $row['course'];?>">
                                </label>
                            </div>

                            <label for="email" class="col-md-4">Current Status: </label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $row['cur_status'];?>">
                                </label>
                            </div>
                            
                            <label for="email" class="col-md-4">Current City: </label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $row['city'].', '.$row['state'].', '.$row['country'];?>">
                                </label>
                            </div>

                            
                            <div class="col-md-6">
                            <a href="validate.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">Validate</button></a>
                            </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>