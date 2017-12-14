<?php require "../config/connect.php";
require "check_login.php";
require "insert_logs.php";
$admin_id=$_GET['admin_id'];
$eyenews_id=$_GET['eyenews_id'];
// $cmd=mysqli_query($con,"delete from tbl_eyenews where eyenews_id='$eyenews_id'");

$ins = insertLog('tbl_eyenews','eyenews_id',$eyenews_id,'delete',$admin_id,$con,$ip);
if($ins=="sukses"){
	// echo $ins;exit();
	$cmd=mysqli_query($con,"delete from tbl_eyenews where eyenews_id='$eyenews_id'");
}else{
	// echo $ins;exit();
}

header("location:eyenews?admin_id=$admin_id");
$_SESSION['admin_id']; 
?>