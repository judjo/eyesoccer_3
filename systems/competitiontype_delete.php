<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$competition_id=$_GET['competition_id'];
$cmd=mysqli_query($con,"delete from tbl_competitions where competition_id='$competition_id'");
header("location:competition_type?admin_id=$admin_id");
$_SESSION['admin_id']; 
?>