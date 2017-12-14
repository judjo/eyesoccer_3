<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$clasment_id=$_GET['clasment_id'];
$cmd=mysqli_query($con,"delete from tbl_clasment where clasment_id='$clasment_id'");
header("location:clasment?admin_id=$admin_id");
?>