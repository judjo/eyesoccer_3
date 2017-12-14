<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$id_jadwal_event=$_GET['id_jadwal_event'];
$id_event=$_GET['id_event'];
$cmd=mysqli_query($con,"select a.*,b.name as club_name_a,c.name as club_name_b from tbl_jadwal_event a INNER JOIN tbl_club b ON b.club_id=a.tim_a INNER JOIN tbl_club c ON c.club_id=a.tim_b where id_jadwal_event='$id_jadwal_event'");
$row=mysqli_fetch_array($cmd);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="<?=$base_url?>/img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/js/jquery.datetimepicker.css">	
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/datatables/media/css/dataTables.bootstrap4.css">
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">
<?php require "vertical_menu.php"; ?>
</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> UPDATE EVENT</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$score_a=addslashes($_POST['score_a']);
$score_b=addslashes($_POST['score_b']);
$jadwal_pertandingan=addslashes($_POST['jadwal_pertandingan']);
$lokasi_pertandingan=addslashes($_POST['lokasi_pertandingan']);
$live_pertandingan=addslashes($_POST['live_pertandingan']);
//$ex = pathinfo($pic,PATHINFO_EXTENSION);
date_default_timezone_set('Asia/Jakarta');
$now=date('d F Y H:i:s');
if(empty($pic)){
$cmd=mysqli_query($con,"update tbl_jadwal_event set score_a='$score_a',score_b='$score_b',jadwal_pertandingan='$jadwal_pertandingan',lokasi_pertandingan='$lokasi_pertandingan',live_pertandingan='$live_pertandingan' where id_jadwal_event='$id_jadwal_event'");
header("location:eyevent_jadwal?id_event=$id_event");	
}
}
?>
<div class="form-group">Score Tim <?=$row["club_name_a"]?><input type="text" name="score_a" value="<?php print $row['score_a']; ?>" class="form-control" id="ipt1" required></div>

<div class="form-group">Score Tim <?=$row["club_name_b"]?><input type="text" name="score_b" value="<?php print $row['score_b']; ?>" class="form-control" id="ipt1" required></div>

<div class="form-group">Jadwal Pertandingan<input type="text" name="jadwal_pertandingan" value="<?php print $row['jadwal_pertandingan']; ?>" class="form-control datetimepicker" id="ipt1"></div>

<div class="form-group">Stadion<input type="text" name="lokasi_pertandingan" value="<?php print $row['lokasi_pertandingan']; ?>" class="form-control" id="ipt1"></div>

<div class="form-group">Live On TV<input type="text" name="live_pertandingan" value="<?php print $row['live_pertandingan']; ?>" class="form-control" id="ipt1"></div>

<div class="form-group text-right" id="t1"><input type="submit" name="opt1" value="UPDATE" class="btn" id="btn1"></div><br><br>
</form>
</div>
</div>
</div>

<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinyMCE.init({
    mode : "textareas"
});
</script>
<script src="<?=$base_url?>/bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=$base_url?>/bs/js/bootstrap.min.js"></script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/jquery.dataTables.js">	</script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/build/jquery.datetimepicker.full.js"></script>
<script>
$(document).ready(function() {	
$('#example').DataTable();
} );
$(function(){
	$(".datetimepicker").datetimepicker({
		 format: 'Y-m-d H:i:s'
	});
	
})
</script>
</body>
</html>