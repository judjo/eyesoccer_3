<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$category_ads_id=$_GET['category_ads_id'];
$cmd=mysqli_query($con,"delete from tbl_category_ads where category_ads_id='$category_ads_id'");
header("location:ads_category?admin_id=$admin_id");
?>