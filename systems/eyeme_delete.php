<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$id_gallery=$_GET['id_gallery'];
$cmd=mysqli_query($con,"delete from tbl_gallery where id_gallery='$id_gallery'");
$cmd=mysqli_query($con,"delete from tbl_list_gallery where id_gallery='$id_gallery'");
header("location:eyeme?admin_id=$admin_id");
?>