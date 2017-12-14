<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$ads_id=$_GET['ads_id'];
$cmd=mysqli_query($con,"delete from tbl_ads where ads_id='$ads_id'");
header("location:ads?admin_id=$admin_id");
?>