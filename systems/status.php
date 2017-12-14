<?php require "../config/connect.php";
$club_id=$_GET['club_id'];
$cmd=mysqli_query($con,"update tbl_club set active='1' where club_id='$club_id'");
header("location:club");
?>