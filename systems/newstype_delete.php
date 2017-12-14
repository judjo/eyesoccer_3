<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$news_type_id=$_GET['news_type_id'];
$cmd=mysqli_query($con,"delete from tbl_news_types where news_type_id='$news_type_id'");
header("location:news_type?admin_id=$admin_id");
$_SESSION['admin_id']; 
?>