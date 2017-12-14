<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$karir_id=$_GET['karir_id'];
$player_id=$_GET['player_id'];
$cmd=mysqli_query($con,"delete from tbl_karir_player where karir_id='$karir_id'");
header("location:player_edit?admin_id=$admin_id&player_id=$player_id");
$_SESSION['admin_id']; 
?>