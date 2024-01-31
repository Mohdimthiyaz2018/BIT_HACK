<?php

include '../../config.php';
session_start();

$from_email = $_SESSION['email'];
$to_email = $_GET['email'];

//inserting request
$sql = " INSERT INTO alter_request (from_email,to_email,statuss) VALUES ('$from_email','$to_email','Requested')";
$sqll = mysqli_query($link,$sql);

if($sqll) {
    header("refresh:0,url=alterIntern.php");
}
else{
    ?>
        <h3 style="text-align: center; margin-top:49vh;"><?php echo ("Failed!"); ?></h3>
    <?php
}
?>