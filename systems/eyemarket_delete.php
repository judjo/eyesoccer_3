<?php require "../config/connect.php";
require "check_login.php";
require "insert_logs.php";
$admin_id=$_GET['admin_id'];
$id_product=$_GET['id_product'];
// $cmd=mysqli_query($con,"delete from tbl_product where id_product='$id_product'");

$ins = insertLog('tbl_product','id_product',$id_product,'delete',$admin_id,$con,$ip);
if($ins=="sukses"){
	// echo $ins;exit();
	$cmd=mysqli_query($con,"delete from tbl_product where id_product='$id_product'");
}else{
	// echo $ins;exit();
}

header("location:eyemarket?admin_id=$admin_id");
$_SESSION['admin_id']; 
?>