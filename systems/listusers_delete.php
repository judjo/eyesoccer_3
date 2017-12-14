<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$id_member=$_GET['id_member'];
$cmd=mysqli_query($con,"delete from tbl_member where id_member='$id_member'");
header("location:listusers?admin_id=$admin_id");
?>