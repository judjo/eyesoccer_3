<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$id_gallery=$_GET['id_gallery'];
$club_id=$_GET['club_id'];
$cmd=mysqli_query($con,"delete from tbl_gallery where id_gallery='$id_gallery'");
header("location:club_player?admin_id=$admin_id&club_id=$club_id");
$_SESSION['admin_id']; 
?>