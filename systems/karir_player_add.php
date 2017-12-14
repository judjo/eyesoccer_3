<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_SESSION['admin_id'];

$player_id=$_GET['player_id'];

$jenis = $_GET['jenis'];
if($jenis=='timnas'){
	$titletop = "TIMNAS";
}else{
	$titletop = "KLUB";
}
//$_SESSION['admin_id']; 

?>

<!DOCTYPE html>

<html>

<head>

<title>Eyesoccer</title>

<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">

<link rel="icon" type="image/png" href="../img/tab_icon.png">

<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">

</head>

<body>



<div class="container-fluid">

<div class="row">

<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>

<div class="col-lg-10 col-md-10"><br>

<h1 id="t2"><i class="fa fa-user fa-lg"></i> ADD KARIR <?=$titletop?> PLAYER</h1>

<hr></hr>
<a href='<?=$base_url."/systems/player_edit?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."#player";?>' class="btn btn-danger">Kembali</a>
<form method="post" enctype="multipart/form-data">

      	<?php

      	if(isset($_POST['opt2'])){

			$bulan=$_POST['bulan'];

			$tahun=$_POST['tahun'];

			$klub=$_POST['klub'];

			$turnamen=$_POST['turnamen'];	

			$negara=$_POST['negara'];

			$jumlah_main=$_POST['jumlah_main'];

			$no_pg=$_POST['no_pg'];

			$pelatih=$_POST['pelatih']; 
			if($jenis=='timnas'){
				$timnas = "1";
			}else{
				$timnas = "0";
			}
			// echo "update tbl_karir_player set bulan='".$bulan."',tahun='".$tahun."',klub='".$klub."',turnamen='".$turnamen."',negara='".$negara."',jumlah_main='".$jumlah_main."',no_pg='".$no_pg."',pelatih='".$pelatih."',updateon='".date('Y-m-d H:i:s')."' where karir_id='".$karir_id."'";exit();
			$cmd=mysqli_query($con,"insert into tbl_karir_player (player_id,timnas,bulan,tahun,klub,turnamen,negara,jumlah_main,no_pg,pelatih,createon) values ('".$player_id."','".$timnas."','".$bulan."','".$tahun."','".$klub."','".$turnamen."','".$negara."','".$jumlah_main."','".$no_pg."','".$pelatih."','".date('Y-m-d H:i:s')."')");

			header("location:".$base_url."/systems/player_edit?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."#player");

      	}

      	?> 

		<div class="form-group">

		<div class="row">

		<div class="col-lg-6 col-md-6" id="t1">Bulan<input type="text" name="bulan" value="<?php print $row['bulan']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Tahun<input type="text" name="tahun" value="<?php print $row['tahun']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Klub<input type="text" name="klub" value="<?php print $row['klub']; ?>" class="form-control" id="ipt1"></div>
		
		<div class="col-lg-6 col-md-6" id="t1">Turnamen<input type="text" name="turnamen" value="<?php print $row['turnamen']; ?>" class="form-control" id="ipt1"></div>
		
		<div class="col-lg-6 col-md-6" id="t1">Negara<input type="text" name="negara" value="<?php print $row['negara']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Jumlah Main<input type="text" name="jumlah_main" value="<?php print $row['jumlah_main']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">No. Punggung<input type="text" name="no_pg" value="<?php print $row['no_pg']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Pelatih<input type="text" name="pelatih" value="<?php print $row['pelatih']; ?>" class="form-control" id="ipt1"></div>	
			
		</div>

		</div>

      	<div class="form-group" id="t1"><input type="submit" name="opt2" value="SUBMIT" class="btn btn-success">&emsp;</div><br><br>     

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

<script src="../bs/jquery/jquery-3.2.1.min.js"></script>

<script src="../bs/js/bootstrap.min.js"></script>

</body>

</html>