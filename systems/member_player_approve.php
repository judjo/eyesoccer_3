<?php 
require "../config/connect.php";
require "check_login.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

$admin_id=$_GET["admin_id"];
$id_member_player=$_GET['id_member_player'];
$email_member=$_GET['email_member'];
$member_name=$_GET['member_name'];
$id_player=$_GET['id_player'];
$id_member=$_GET['id_member'];
// $cmd=mysqli_query($con,"delete from tbl_eyetube where eyetube_id='$eyetube_id'");

	$mail = new PHPMailer(true); 
	//Server settings
	$mail->SMTPDebug = 2;                                 // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
	$mail->Password = 'BolaSepak777#';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	//Recipients
	$mail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
	$mail->addAddress("$email_member");               // Name is optional
	$mail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');
	$mail->addBCC('ebenk.rzq@gmail.com');

	//Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Status Validasi Pemain';
	$mail->Body    = 'Kepada '.$member_name.',<br><br>
	Validasi Pemain anda diterima. Silahkan login ke https://www.eyesoccer.id dan akses member area anda.
	<br><br>
	Salam Eyesoccer';
	$mail->send();
	// echo 'Message has been sent';
	// echo "update tbl_player set member_id=".$id_member." where player_id=".$id_player."";
	// exit();
	$cmd=mysqli_query($con,"update tbl_member_player set active=1 where id_member_player='$id_member_player'");
	
	$result = mysqli_query($con,"SELECT * FROM tbl_player where player_id=".$id_player."");
	$resultprestasi = mysqli_query($con,"SELECT * FROM tbl_prestasi_player where player_id=".$id_player."");
	$resultkarir = mysqli_query($con,"SELECT * FROM tbl_karir_player where player_id=".$id_player."");
	$upd = mysqli_query($con,"update tbl_player set member_id=".$id_member." where player_id=".$id_player."");
	$col = "";
	$val = "";
	$colprestasi = "";
	$valprestasi = "";
	while ($row = mysqli_fetch_assoc($result)) {
		// print_r($row);
		foreach( $row as $field => $value) {
			// echo $field.$value;
			if (end($row) !== $value) {
				//last item
				$col .=$field.",";
				$val .="'".$value."',";
			}else{
				$col .=$field;
				$val .="'".$value."'";
			}
		}
	}
	// echo "INSERT INTO tbl_online_player (".$col.") VALUES (".$val.")";
	$check1 = mysqli_query($con,"SELECT * FROM tbl_online_player where player_id=".$id_player."");
	$rowcountcheck1=mysqli_num_rows($check1);
	if($rowcountcheck1<1){
		$cmd=mysqli_query($con,"INSERT INTO tbl_online_player (".$col.") VALUES (".$val.")");
		$cmd2=mysqli_query($con,"INSERT INTO tbl_tmp_player (".$col.") VALUES (".$val.")");
	}
	
	$check4 = mysqli_query($con,"SELECT * FROM tbl_tmp_player where player_id=".$id_player."");
	$rowcountcheck4=mysqli_num_rows($check4);
	if($rowcountcheck4<1){
		$cmd2=mysqli_query($con,"INSERT INTO tbl_tmp_player (".$col.") VALUES (".$val.")");
	}
	
	// $del=mysqli_query($con,"delete from tbl_member_player where id_member_player<>'$id_member_player' and id_player='$id_player'");
	
	$check2 = mysqli_query($con,"SELECT * FROM tbl_online_prestasi_player where player_id=".$id_player."");
	$rowcountcheck2=mysqli_num_rows($check2);
	if($rowcountcheck2<1){
		while ($rowprestasi = mysqli_fetch_array($resultprestasi)) {
			// echo "INSERT INTO tbl_online_prestasi_player (prestasi_player_id,player_id,tahun,turnamen,negara,peringkat,penghargaan,createon,updateon) VALUES ('".$rowprestasi['prestasi_player_id']."','".$rowprestasi['player_id']."','".$rowprestasi['tahun']."','".$rowprestasi['turnamen']."','".$rowprestasi['negara']."','".$rowprestasi['peringkat']."','".$rowprestasi['penghargaan']."','".$rowprestasi['createon']."','".$rowprestasi['updateon']."')";
			mysqli_query($con,"INSERT INTO tbl_online_prestasi_player (prestasi_player_id,player_id,tahun,turnamen,negara,peringkat,penghargaan,createon,updateon) VALUES ('".$rowprestasi['prestasi_player_id']."','".$rowprestasi['player_id']."','".$rowprestasi['tahun']."','".$rowprestasi['turnamen']."','".$rowprestasi['negara']."','".$rowprestasi['peringkat']."','".$rowprestasi['penghargaan']."','".$rowprestasi['createon']."','".$rowprestasi['updateon']."')");
		}
	}
	
	$check3 = mysqli_query($con,"SELECT * FROM tbl_online_karir_player where player_id=".$id_player."");
	$rowcountcheck3=mysqli_num_rows($check2);
	if($rowcountcheck3<1){
		while ($rowkarir = mysqli_fetch_array($resultkarir)) {
			mysqli_query($con,"INSERT INTO tbl_online_karir_player (karir_id,player_id,bulan,tahun,klub,turnamen,negara,jumlah_main,no_pg,pelatih,timnas,createon,updateon) VALUES ('".$rowkarir['karir_id']."','".$rowkarir['player_id']."','".$rowkarir['bulan']."','".$rowkarir['tahun']."','".$rowkarir['klub']."','".$rowkarir['turnamen']."','".$rowkarir['negara']."','".$rowkarir['jumlah_main']."','".$rowkarir['no_pg']."','".$rowkarir['pelatih']."','".$rowkarir['timnas']."','".$rowkarir['createon']."','".$rowkarir['updateon']."')");
		}
	}
	
// exit();
header("location:member_player?admin_id=$admin_id");

$_SESSION['admin_id']; 
?>