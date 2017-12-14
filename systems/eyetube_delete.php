<?php require "../config/connect.php";
require "check_login.php";
require "insert_logs.php";
$admin_id=$_GET["admin_id"];
$eyetube_id=$_GET['eyetube_id'];
// $cmd=mysqli_query($con,"delete from tbl_eyetube where eyetube_id='$eyetube_id'");

$ins = insertLog('tbl_eyetube','eyetube_id',$eyetube_id,'delete',$admin_id,$con,$ip);
if($ins=="sukses"){
	// echo $ins;exit();
}else{
	// echo $ins;exit();
}

header("location:eyetube?admin_id=$admin_id");

$_SESSION['admin_id']; 
?>