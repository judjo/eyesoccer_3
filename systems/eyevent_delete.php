<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$id_event=$_GET['id_event'];
$cmd=mysqli_query($con,"delete from tbl_event where id_event='$id_event'");
header("location:eyevent?admin_id=$admin_id");
?>