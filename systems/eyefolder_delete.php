<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
$id_folder=$_GET['id_folder'];
$cmd=mysqli_query($con,"delete from tbl_folder_gallery where id_folder='$id_folder'");
$cmd=mysqli_query($con,"delete from tbl_list_gallery where id_folder='$id_folder'");
header("location:eyefolder?admin_id=$admin_id");
?>