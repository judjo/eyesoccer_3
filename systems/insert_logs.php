<?php 
/* ob_start();
session_start();
$host="localhost";
$user="root";
$pass="";
$db="db_eyessocer";
$con=mysqli_connect($host,$user,$pass,$db); */
function insertLog($tabel,$column,$valuecol,$aksi,$admin_id,$con,$ip){
	$sel1=mysqli_query($con,"select * from $tabel where $column='$valuecol'");
	$res="";

	while ($row = mysqli_fetch_array($sel1, MYSQLI_ASSOC))
	{    
		$numItems = count($row);
		$i = 0;
		foreach ($row as $key => $value) {
			$res .=$value;
			if(++$i === $numItems) {
				// echo "last index!";
			}else{
				$res .="#";
			}
		}
	}
	// echo $res;
	// echo "insert into tbl_logs (tabel,data,aksi,createon) values ('tbl_club','".$res."','delete','".date('Y-m-d H:i:s')."')";
	// exit();

	mysqli_query($con,"insert into tbl_logs (tabel,data,aksi,createon,admin_id,ip) values ('".$tabel."','".$res."','".$aksi."','".date('Y-m-d H:i:s')."','".$admin_id."','".$ip."')");
	$check2 = mysqli_affected_rows($con);
	if($check2>0){
		return "sukses";
	}else{
		// echo "select * from $tabel where $column='$valuecol'";
		// echo "insert into tbl_logs (tabel,data,aksi,createon,admin_id,ip) values ('".$tabel."','".$res."','".$aksi."','".date('Y-m-d H:i:s')."','".$admin_id."','".$ip."')";
		return "false";
	}
}
?>