<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$ticket_id=$_GET['ticket_id'];
$cmd=mysqli_query($con,"select * from tbl_eyeticket where ticket_id='$ticket_id'");
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
<h1 id="t2"><i class="fa fa-ticket"></i> UPDATE EYETICKET</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$jadwal_pertandingan=$_POST['jadwal_pertandingan'];
$name=addslashes($_POST['name']);
//$tim_a=addslashes($_POST['tim_a']);
//$tim_b=addslashes($_POST['tim_b']);
$price=addslashes($_POST['price']);
$stock=addslashes($_POST['stock']);
$pic=$_FILES['pic']['name'];
$ex = pathinfo($pic,PATHINFO_EXTENSION);
//date_default_timezone_set('Asia/Jakarta');
//$now=date('d F Y H:i:s');
if(empty($pic)){
$cmd=mysqli_query($con,"update tbl_eyeticket set jadwal_pertandingan='$jadwal_pertandingan',name='$name',price='$price',stock='$stock' where ticket_id='$ticket_id'");
header("location:eyeticket?admin_id=$admin_id");	
}
else{
if($_FILES['pic']['size'] > 1048576){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
}
else if(file_exists("club_logo/".$pic)){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
}
else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "JPEG"){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
}
else{      
move_uploaded_file($_FILES['pic']['tmp_name'], "club_logo/".$pic);	
$orgfile="club_logo/".$pic;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=292;
$newheight=182;	
$thumb1="club_logo/t1".$pic;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);	
$cmd=mysqli_query($con,"update tbl_eyeticket set jadwal_pertandingan='$jadwal_pertandingan',name='$name',price='$price',stock='$stock',pic='$pic',thumb1='$thumb1' where ticket_id='$ticket_id'");	
header("location:eyeticket?admin_id=$admin_id");
}	
}
}
?>
<div class="form-group text-left" id="t1">CLUB A
<select name="name" class="form-control" id="ipt1">
<?php
echo ' <option data-tokens="add new club klub baru" value="">Select Club</option>';
$ta=mysqli_query($con,"select * from tbl_club ORDER BY name ASC");
while($row1=mysqli_fetch_array($ta)){
print '<option'; if($row['name']==$row1['name']){print " selected";}else{print "";} print'>'.$row1['name'].'</option>';  
}
?>  
</select> 
</div>
<div class="form-group text-left" id="t1">CLUB B
<select name="name" class="form-control" id="ipt1">
<?php
echo ' <option data-tokens="add new club klub baru" value="">Select Club</option>';
$tb=mysqli_query($con,"select * from tbl_club ORDER BY name ASC");
while($rowb=mysqli_fetch_array($tb)){
print '<option'; if($row['name']==$rowb['name']){print " selected";}else{print "";} print'>'.$rowb['name'].'</option>';  
}
?>  
</select> 
</div>
<div class="form-group">Price<input type="text" name="price" value="<?php print $row['price']; ?>" class="form-control" id="ipt1" ></div>
<div class="form-group">Stock<input type="text" name="stock" value="<?php print $row['stock']; ?>" class="form-control" id="ipt1" ></div>
<div class="form-group">Jadwal Pertandingan<input type="text" name="jadwal_pertandingan" value="<?php print $row['jadwal_pertandingan']; ?>" class="form-control datetimepicker" id="ipt1"></div>
<div class="form-group"><img src="club_logo/<?php print $row['pic']; ?>" class="img img-responsive" id="img8"></div>
<div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8"></div>
<div class="form-group text-right" id="t1"><input type="submit" name="opt1" value="UPDATE" class="btn" id="btn1"></div><br><br>
</form>
</div>
</div>
</div>

<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
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