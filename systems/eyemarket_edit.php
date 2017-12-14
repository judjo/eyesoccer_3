<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$id_product=$_GET['id_product'];
$cmd=mysqli_query($con,"select * from tbl_product where id_product='$id_product'");
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
<h1 id="t2"><i class="fa fa-shopping-cart"></i> UPDATE EYEMARKET</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$product_name=addslashes($_POST['product_name']);
$category_product_name=addslashes($_POST['category_product_name']);
$price=addslashes($_POST['price']);
$stock=addslashes($_POST['stock']);
$description=addslashes($_POST['description']);
$pic=$_FILES['pic']['name'];
$ex = pathinfo($pic,PATHINFO_EXTENSION);
//date_default_timezone_set('Asia/Jakarta');
//$now=date('d F Y H:i:s');
if(empty($pic)){
$cmd=mysqli_query($con,"update tbl_product set product_name='$product_name',category_product_name='$category_product_name',price='$price',stock='$stock',description='$description' where id_product='$id_product'");
header("location:eyemarket?admin_id=$admin_id");	
}
else{
if($_FILES['pic']['size'] > 1048576){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
}
else if(file_exists("eyemarket_storage/".$pic)){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
}
else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "JPEG"){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
}
else{      
move_uploaded_file($_FILES['pic']['tmp_name'], "eyemarket_storage/".$pic);	
$orgfile="eyemarket_storage/".$pic;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=292;
$newheight=182;	
$thumb1="eyemarket_storage/t1".$pic;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);	
$cmd=mysqli_query($con,"update tbl_product set product_name='$product_name',category_product_name='$category_product_name',price='$price',stock='$stock',description='$description',pic='$pic',thumb1='$thumb1' where id_product='$id_product'");	
header("location:eyemarket?admin_id=$admin_id");
}	
}
}
?>
<div class="form-group">Product Name<input type="text" name="product_name" value="<?php print $row['product_name']; ?>" class="form-control" id="ipt1" required></div>

<div class="form-group text-left" id="t1">Kategori Produk
<select name="category_product_name" class="form-control" id="ipt1">
<?php
$cmd1=mysqli_query($con,"select * from tbl_category_product");
while($row1=mysqli_fetch_array($cmd1)){
print '<option'; if($row['category_product_name']==$row1['category_product_name']){print " selected";}else{print "";} print'>'.$row1['category_product_name'].'</option>';  
}
?>  
</select> 
</div>

<div class="form-group">Price<input type="text" name="price" value="<?php print $row['price']; ?>" class="form-control" id="ipt1" required></div>

<div class="form-group">Stock<input type="text" name="stock" value="<?php print $row['stock']; ?>" class="form-control" id="ipt1" required></div>

<div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"><?php print $row['description']; ?></textarea></div>
<div class="form-group"><img src="eyemarket_storage/<?php print $row['pic']; ?>" class="img img-responsive" id="img8"></div>
<div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8"></div>
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