
<?php require_once 'header.php'; 

$a       = "SELECT * FROM setupdate";
$result = mysqli_query($con,$a);
$num    = @mysqli_num_rows($result);
mysqli_close($con);
?>


<div class = "">
<div class = "">
        <h4>Important Updates</h4>
        <hr>
        <ul>

        <?php
        
            for($i=1;$i<=$num;$i++){

            $row = mysqli_fetch_array($result);
        ?>

        <li><span id="imp_n"> > </span><span id="up_li"><?php echo $row['setupdate'];?></span></li>
        <?php
            }
        ?>

        </ul> 
    </div>
</div>