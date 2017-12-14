<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_SESSION['admin_id'];

$player_id=$_GET['player_id'];

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

<h1 id="t2"><i class="fa fa-user fa-lg"></i> ADD PRESTASI PLAYER</h1>

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

			// echo "insert into tbl_prestasi_player (player_id,tahun,turnamen,negara,peringkat,penghargaan,createon) values ('".$player_id."','".$tahun."','".$turnamen."','".$negara."','".$peringkat."','".$penghargaan."','".date('Y-m-d H:i:s')."')";exit();
			$cmd=mysqli_query($con,"insert into tbl_prestasi_player (player_id,tahun,turnamen,negara,peringkat,penghargaan,createon) values ('".$player_id."','".$tahun."','".$turnamen."','".$negara."','".$peringkat."','".$penghargaan."','".date('Y-m-d H:i:s')."')");

			header("location:".$base_url."/systems/player_edit?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."#player");

      	}

      	?> 

		<div class="form-group">

		<div class="row">
		
		<div class="col-lg-6 col-md-6" id="t1">Tahun<input type="text" name="tahun" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Turnamen<input type="text" name="turnamen" class="form-control" id="ipt1"></div>
		
		<div class="col-lg-6 col-md-6" id="t1">Negara<input type="text" name="negara" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Peringkat<input type="text" name="peringkat" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Penghargaan<input type="text" name="penghargaan" class="form-control" id="ipt1"></div>		
			
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