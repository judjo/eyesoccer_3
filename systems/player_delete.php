<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$player_id=$_GET['player_id'];
$club_id=$_GET['club_id'];
$cmd=mysqli_query($con,"delete from tbl_player where player_id='$player_id'");
header("location:club_player?admin_id=$admin_id&club_id=$club_id");
$_SESSION['admin_id']; 
?>