<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_GET['admin_id'];
$category_ads_id=$_GET['category_ads_id'];
$cmd=mysqli_query($con,"select * from tbl_category_ads where category_ads_id='$category_ads_id'");
$row=mysqli_fetch_array($cmd);
$_SESSION['admin_id']; 
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="../bs/js/jquery.datetimepicker.css"> 
<link rel="stylesheet" type="text/css" href="../bs/datatables/media/css/dataTables.bootstrap4.css">
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">
<?php require "vertical_menu.php"; ?>
</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> UPDATE ADS CATEGORY</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">

<div class="form-group">Kode<input type="text" name="note" value="<?php print $row['note']; ?>" class="form-control" id="ipt1" required></div>
<div class="form-group">Nama Kategori<input type="text" name="category_name_ads" value="<?php print $row['category_name_ads']; ?>" class="form-control" id="ipt1" required></div>

<div class="form-group text-right" id="t1"><input type="submit" name="opt1" value="UPDATE" class="btn" id="btn1" >  <input type="submit" name="opt1" value="GO BACK" class="btn btn-success" id="btn1"  onclick="goBack()"></div>
<?php
if(isset($_POST['opt1'])){
$category_name_ads=addslashes($_POST['category_name_ads']);
$note=addslashes($_POST['note']);

$pic=$_FILES['pic']['name'];
$ex = pathinfo($pic,PATHINFO_EXTENSION);
date_default_timezone_set('Asia/Jakarta');
$now=date('d F Y H:i:s');
if(empty($pic)){
$cmd=mysqli_query($con,"update tbl_category_ads set category_name_ads='$category_name_ads',note='$note' where category_ads_id='$category_ads_id'");
//$cmd=mysqli_query($con,"update tbl_ads set title='$title',category_name_ads='$category_name_ads' where ads_id='$ads_id'");

header("location:ads_category?admin_id=$admin_id");	
}
else{
if($_FILES['pic']['size'] > 1048576){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
}
else if(file_exists("eyeads_storage/".$pic)){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
}
else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "JPEG"){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
}
else{      
move_uploaded_file($_FILES['pic']['tmp_name'], "eyeads_storage/".$pic);	
$orgfile="eyeads_storage/".$pic;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=292;
$newheight=182;	
$thumb1="eyeads_storage/t1".$pic;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);	

$cmd=mysqli_query($con,"update tbl_category_ads set category_name_ads='$category_name_ads',note='$note' where category_ads_id='$category_ads_id'");	
header("location:ads_category?admin_id=$admin_id");
}	
}
}
?>
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
<script>
function goBack() {
    window.history.back();
}
</script>
<script src="../bs/jquery/jquery-3.2.1.min.js"></script>
<script src="../bs/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/jquery.dataTables.js">  </script> 
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" language="javascript" src="../bs/js/build/jquery.datetimepicker.full.js"></script>
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