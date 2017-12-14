<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_SESSION['admin_id'];

$club_id=$_GET['club_id'];
$id_gallery=$_GET['id_gallery'];

$cmd=mysqli_query($con,"select * from tbl_gallery where id_gallery='$id_gallery'");

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

<h1 id="t2"><i class="fa fa-user fa-lg"></i> UPDATE GALLERY KLUB</h1>

<hr></hr>
<a href='<?=$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player";?>' class="btn btn-danger">Kembali</a>
	<form method="post" enctype="multipart/form-data">

      	<?php

      	if(isset($_POST['opt2'])){
			if(isset($_FILES['pic']['tmp_name']) && $_FILES['pic']['tmp_name']!="")
			{
				$pic=rand(10000,99999)."-".$_FILES['pic']['name'];  
				$thumb1=$pic; 
			}
			move_uploaded_file($_FILES['pic']['tmp_name'], "club_storage/".$pic);
			$cmd=mysqli_query($con,"update tbl_gallery set pic='".$pic."',thumb1='".$thumb1."',updateon='".date('Y-m-d H:i:s')."' where id_gallery='".$id_gallery."'");
// echo "update tbl_gallery set pic='".$pic."',thumb1='".$thumb1."',updateon='".date('Y-m-d H:i:s')."' where id_gallery='".$id_gallery."'";exit();
			header("location:".$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player");

      	}

      	?> 

		<div class="form-group">

		<div class="row">
		
		<div class="col-lg-6 col-md-6" id="t1"><img src="club_storage/<?php echo $row['pic'];?>" class="form-control img-responsive" id="ipt1" style="height:auto;"></div>
		
		<div class="col-lg-6 col-md-6" id="t1"><input type="file" name="pic" accept="image/*" class="form-control" id="ipt1"></div>
			
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