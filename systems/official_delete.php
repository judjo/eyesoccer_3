<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$official_id=$_GET['official_id'];
$club_id=$_GET['club_id'];
$cmd=mysqli_query($con,"delete from tbl_official_team where official_id='$official_id'");
header("location:club_player?admin_id=$admin_id&club_id=$club_id");
$_SESSION['admin_id']; 
?>