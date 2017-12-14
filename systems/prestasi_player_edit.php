<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_SESSION['admin_id'];

$prestasi_player_id=$_GET['prestasi_player_id'];
$player_id=$_GET['player_id'];

$cmd=mysqli_query($con,"select * from tbl_prestasi_player where prestasi_player_id='$prestasi_player_id'");

$row=mysqli_fetch_array($cmd);


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

<h1 id="t2"><i class="fa fa-user fa-lg"></i> UPDATE PRESTASI PLAYER</h1>

<hr></hr>
<a href='<?=$base_url."/systems/player_edit?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."#player";?>' class="btn btn-danger">Kembali</a>
<form method="post" enctype="multipart/form-data">

      	<?php

      	if(isset($_POST['opt2'])){

			$tahun=$_POST['tahun'];

			$turnamen=$_POST['turnamen'];	

			$negara=$_POST['negara'];

			$peringkat=$_POST['peringkat'];

			$penghargaan=$_POST['penghargaan'];

			$pelatih=$_POST['pelatih']; 
			// echo "update tbl_karir_player set bulan='".$bulan."',tahun='".$tahun."',klub='".$klub."',turnamen='".$turnamen."',negara='".$negara."',jumlah_main='".$jumlah_main."',no_pg='".$no_pg."',pelatih='".$pelatih."',updateon='".date('Y-m-d H:i:s')."' where karir_id='".$karir_id."'";exit();
			$cmd=mysqli_query($con,"update tbl_prestasi_player set tahun='".$tahun."',turnamen='".$turnamen."',negara='".$negara."',peringkat='".$peringkat."',penghargaan='".$penghargaan."',updateon='".date('Y-m-d H:i:s')."' where prestasi_player_id='".$prestasi_player_id."'");

			header("location:".$base_url."/systems/player_edit?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."#player");

      	}

      	?> 

		<div class="form-group">

		<div class="row">
		
		<div class="col-lg-6 col-md-6" id="t1">Tahun<input type="text" name="tahun" value="<?php print $row['tahun']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Turnamen<input type="text" name="turnamen" value="<?php print $row['turnamen']; ?>" class="form-control" id="ipt1"></div>
		
		<div class="col-lg-6 col-md-6" id="t1">Negara<input type="text" name="negara" value="<?php print $row['negara']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Peringkat<input type="text" name="peringkat" value="<?php print $row['peringkat']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Penghargaan<input type="text" name="penghargaan" value="<?php print $row['penghargaan']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Pelatih<input type="text" name="pelatih" value="<?php print $row['pelatih']; ?>" class="form-control" id="ipt1"></div>	
			
		</div>

		</div>

      	<div class="form-group" id="t1"><input type="submit" name="opt2" value="UPDATE" class="btn btn-success">&emsp;</div><br><br>     

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