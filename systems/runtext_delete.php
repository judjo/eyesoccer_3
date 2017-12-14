<?php require "../config/connect.php";
require "check_login.php";
$ads_id=$_GET['ads_id'];
$cmd=mysqli_query($con,"delete from tbl_running_text where id_running_text='$ads_id'");
header("location:runtext?admin_id=$admin_id");
?>