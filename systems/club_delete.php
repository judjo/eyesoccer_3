<?php require "../config/connect.php";

require "check_login.php";
require "insert_logs.php";

$admin_id=$_GET['admin_id'];

$club_id=$_GET['club_id'];

$ins = insertLog('tbl_club','club_id',$club_id,'delete',$admin_id,$con,$ip);
if($ins=="sukses"){
	// echo $ins;exit();
	$cmd=mysqli_query($con,"delete from tbl_club where club_id='$club_id'");

	$cmd1=mysqli_query($con,"delete from tbl_player where club_id='$club_id'");

	$cmd1=mysqli_query($con,"delete from tbl_official_team where club_id='$club_id'");
}else{
	// echo $ins;exit();
}
// $cmd=mysqli_query($con,"delete from tbl_club where club_id='$club_id'");

// $cmd1=mysqli_query($con,"delete from tbl_player where club_id='$club_id'");

// $cmd1=mysqli_query($con,"delete from tbl_official_team where club_id='$club_id'");

header("location:club?admin_id=$admin_id");

$_SESSION['admin_id']; 

?>
