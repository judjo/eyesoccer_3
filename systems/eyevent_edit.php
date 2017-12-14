<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$id_event=$_GET['id_event'];
$cmd=mysqli_query($con,"select * from tbl_event where id_event='$id_event'");
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
$title=addslashes($_POST['title']);
$description=addslashes($_POST['description']);
$pic=$_FILES['pic']['name'];
$ex = pathinfo($pic,PATHINFO_EXTENSION);
date_default_timezone_set('Asia/Jakarta');
$now=date('d F Y H:i:s');
if(empty($pic)){
$cmd=mysqli_query($con,"update tbl_event set title='$title',tampil='".$_POST["tampil"]."',category='".$_POST["category"]."',description='$description',updateon='$now',publish_on='".$_POST["publish_on"]."' where id_event='$id_event'");
header("location:eyevent?admin_id=$admin_id");
}
else{
if($_FILES['pic']['size'] > 1048576){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
}
else if(file_exists("eyevent_storage/".$pic)){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
}
else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "JPEG"){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
}
else{      
move_uploaded_file($_FILES['pic']['tmp_name'], "eyevent_storage/".$pic);	
$orgfile="eyevent_storage/".$pic;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=292;
$newheight=182;	
$thumb1="eyevent_storage/t1".$pic;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);	
$cmd=mysqli_query($con,"update tbl_event set title='$title',tampil='".$_POST["tampil"]."',category='".$_POST["category"]."',description='$description',pic='$pic',thumb1='$thumb1',updateon='$now',publish_on='".$_POST["publish_on"]."' where id_event='$id_event'");	
header("location:eyevent?admin_id=$admin_id");
}	
}
}
?>
<div class="form-group">Title<input type="text" name="title" value="<?php print $row['title']; ?>" class="form-control" id="ipt1" required></div>
<div class="form-group">Tampil Urutan<input type="text" name="tampil" value="<?php print $row['tampil']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Category<select name="category" class="form-control">
	  <option value="">Pilih Category</option>
	  <?php
	  $category=mysqli_query($con,"SELECT * FROM tbl_event_category ORDER BY category ASC");
	  while($cat=mysqli_fetch_array($category)){
		  if($cat["id_event_category"]==$row["category"])
		  {
			  $active="selected='' ";
	  }
	  else{
		  $active="";
	  }
		  echo "<option ".$active." value='".$cat["id_event_category"]."'>".$cat["category"]."</option>";
	  }
	  ?>
	  </select></div>
	 
<div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"><?php print $row['description']; ?></textarea></div>
<div class="form-group"><img src="eyevent_storage/<?php print $row['pic']; ?>" class="img img-responsive" id="img8"></div>
<div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8"></div><div class="form-group text-left" id="t1">Publish On<input type="text" name="publish_on" class="form-control datetimepicker" value="<?=$row["publish_on"]?>" ></div>
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