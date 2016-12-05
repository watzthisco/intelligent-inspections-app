<?php
// Connects to your Database
$con = mysqli_connect("localhost", "inspector", "password") or die(mysqli_error($con)) ;
mysqli_select_db($con, "intelligentinspections") or die(mysqli_error($con)) ;
?>
