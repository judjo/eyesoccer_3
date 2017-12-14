<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$eyetube_id=$_GET['eyetube_id'];
$cmd=mysqli_query($con,"select * from tbl_eyetube where eyetube_id='$eyetube_id'");
$row=mysqli_fetch_array($cmd);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
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
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> UPDATE EYETUBE</h1>
<hr></hr> 
<form method="post" enctype="multipart/form-data">
<div class="form-group">Title<input type="text" name="title" value="<?php print $row['title']; ?>" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Kategori Ads
<select name="category_name" class="form-control" id="ipt1">
<?php
$cmd1=mysqli_query($con,"select * from tbl_category_eyetube");
while($row1=mysqli_fetch_array($cmd1)){
print '<option'; if($row['category_name']==$row1['category_name']){print " selected";}else{print "";} print'>'.$row1['category_name'].'</option>';  
}
?>	
</select>	
</div>
<div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"><?php print $row['description']; ?></textarea></div>
<div id="sset1">
<img src="eyetube_storage/<?php print $row['thumb']; ?>" class="hidden-xs" id="img9">
<img src="eyetube_storage/<?php print $row['thumb']; ?>" class="hidden-sm hidden-md hidden-lg img img-responsive">
<div id="center1">
<input type="file" name="thumb" class="form-control" id="set8" onchange="document.getElementById('submit_button_id1').click();">
<input type="submit" name="op1" id="submit_button_id1" value="" class="btn3">
<?php 
if(isset($_POST['op1'])){
$thumb=rand(10000,99999).$_FILES['thumb']['name'];
$category_name=addslashes($_POST['category_name']);
date_default_timezone_set('Asia/Jakarta');
$now=date('d F Y H:i:s');
if(empty($thumb)){print "";}
else{ 
move_uploaded_file($_FILES['thumb']['tmp_name'], "eyetube_storage/".$thumb); 
$orgfile="eyetube_storage/".$thumb;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=310;
$newheight=200; 
$thumb1="eyetube_storage/t1".$thumb;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);  
$cmd=mysqli_query($con,"update tbl_eyetube set category_name='$category_name', thumb='$thumb',thumb1='$thumb1',updateon='$now' where eyetube_id='$eyetube_id'");
header("location:eyetube?admin_id=$admin_id");} 
}
?>
</div>
</div>  
<div style="clear:left;"></div><br>
<div class="form-group text-left" id="t1">Upload Video<input type="file" name="video" class="form-control" id="set8"></div>
<div class="form-group text-right" id="t1"><input type="submit" name="opt1" value="UPDATE" class="btn" id="btn1"></div><br><br>
<?php
if(isset($_POST['opt1'])){
$thumb=rand(10000,99999).$_FILES['thumb']['name'];
move_uploaded_file($_FILES['thumb']['tmp_name'], "eyetube_storage/".$thumb); 
$orgfile="eyetube_storage/".$thumb;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=310;
$newheight=200; 
$thumb1="eyetube_storage/t1".$thumb;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);

$title=addslashes($_POST['title']);
$category_name=addslashes($_POST['category_name']);
$description=addslashes($_POST['description']); 
$video=$_FILES['video']['name'];
if(empty($video)){
if(isset($_FILES['thumb']['name']) && !empty($_FILES['thumb']['name'])){
	$cmd=mysqli_query($con,"update tbl_eyetube set title='$title', category_name='$category_name', description='$description', thumb1='$thumb1' where eyetube_id='$eyetube_id'");
}else{
	$cmd=mysqli_query($con,"update tbl_eyetube set title='$title', category_name='$category_name', description='$description' where eyetube_id='$eyetube_id'");
}

header("location:eyetube?admin_id=$admin_id");  
}
else{
$cmd=mysqli_query($con,"update tbl_eyetube set title='$title', category_name='$category_name', description='$description',video='$video' where eyetube_id='$eyetube_id'");
move_uploaded_file($_FILES['video']['tmp_name'], "eyetube_storage/".$video); 
header("location:eyetube?admin_id=$admin_id&eyetube_id=$eyetube_id");    
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
<script src="../bs/jquery/jquery-3.2.1.min.js"></script>
<script src="../bs/js/bootstrap.min.js"></script>
</body>
</html>