<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$id_jadwal_event=$_GET['id_jadwal_event'];
$id_event=$_GET['id_event'];
$cmd=mysqli_query($con,"delete from tbl_jadwal_event where id_jadwal_event='$id_jadwal_event'");
header("location:eyevent_jadwal?admin_id=$admin_id&id_event=$id_event");
?>