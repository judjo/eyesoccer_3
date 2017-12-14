<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_SESSION['admin_id'];

$official_id=$_GET['official_id'];

$cmd=mysqli_query($con,"select * from tbl_official_team where official_id='$official_id'");

$row=mysqli_fetch_array($cmd);

$club_id=$_GET["club_id"];

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

<h1 id="t2"><i class="fa fa-user fa-lg"></i> UPDATE OFISIAL</h1>

<hr></hr>
<a href='<?=$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player";?>' class="btn btn-danger">Kembali</a>
<form method="post" enctype="multipart/form-data">

      	<?php

      	if(isset($_POST['opt2'])){

      	$name=$_POST['name'];

      	$description=$_POST['description'];

      	$birth_place=$_POST['birth_place'];

      	$birth_date=$_POST['birth_date'];	
      	$nationality=$_POST['nationality'];

      	$position=$_POST['position'];

      	$contract=$_POST['contract'];
      	$license=$_POST['license'];
      	$no_identity=$_POST['no_identity'];

      	$pic=$_FILES['pic']['name'];     

      	if(empty($_FILES['pic']['tmp_name'])){

      	$cmd=mysqli_query($con,"update tbl_official_team set name='$name',birth_place='$birth_place',birth_date='$birth_date',nationality='$nationality',position='$position',contract='$contract',license='$license',no_identity='$no_identity' where official_id='$official_id'");

      	header("location:".$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player");

      	} 	

      	else{

      	if(file_exists("official_storage/".$pic)){

		print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';   

		}

		else{         		

      	$cmd=mysqli_query($con,"update tbl_official_team set name='$name',description='$description',birth_place='$birth_place',birth_date='$birth_date',nationality='$nationality',position='$position',contract='$contract',license='$license',no_identity='$no_identity',pic='$pic' where official_id='$official_id'");

      	move_uploaded_file($_FILES['pic']['tmp_name'], "official_storage/".$pic);

      	header("location:".$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$_GET["club_id"]."#player");

      	}

      	}

      	}

      	?> 

     <div class="col-lg-12 col-md-12" id="t1">Name<input type="text" name="name" value="<?php print $row['name']; ?>" class="form-control" id="ipt1"></div>

	
		
		<div class="col-lg-6 col-md-6" id="t1">
<br />Birth Place<input type="text" name="birth_place" value="<?php print $row['birth_place']; ?>" class="form-control" id="ipt1"></div>

		<div class="col-lg-6 col-md-6" id="t1">
<br />Birth Date<input type="text" name="birth_date" value="<?php print $row['birth_date']; ?>" class="form-control" id="ipt1"></div>			

		

		
		<div class="col-lg-6 col-md-6" id="t1">
<br />Nationality<input type="text" name="nationality" value="<?php print $row['nationality']; ?>" class="form-control" id="ipt1"></div>

		

<div class="col-lg-6 col-md-6" id="t1">
<br />Posisi / Jabatan<input type="text" name="position" value="<?=$row["position"]?>" class="form-control" id="ipt1">	
		</div>
		
		<div class="col-lg-6 col-md-6" id="t1">
<br />Lisensi (Pelatih)<input type="text" name="license" value="<?=$row["license"]?>" class="form-control" id="ipt1"></div>			
		<div class="col-lg-6 col-md-6" id="t1">
<br />Durasi Kontrak<input type="text" name="contract" value="<?=$row["contract"]?>" class="form-control" id="ipt1"></div>
		
		

		<div class="col-lg-12 col-md-12" id="t1">
<br /><img src="player_storage/<?php print $row['official_photo']; ?>" class="img img-responsive" id="img10"></div>
<br>  
		<div class="col-lg-12 col-md-12" id="t1">
<br />Upload Image<input type="file" name="pic" class="form-control" id="set8"><br /></div>

      	<div class="col-lg-12 col-md-12" id="t1"><br /><input type="submit" name="opt2" value="UPDATE" class="btn" id="btn1">&emsp;</div><br><br>     

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