<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$id_member=$_GET['id_member'];
$cmd=mysqli_query($con,"select * from tbl_member where id_member='$id_member'");
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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> Update List Users</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$name=addslashes($_POST['name']);
$fullname=addslashes($_POST['fullname']);
$email=addcslashes($_POST['email']);
$phone=addcslashes($_POST['phone']);
$cmd=mysqli_query($con,"update tbl_member set name='$name',	fullname='$fullname',phone='$phone',address='$address' where id_member='$id_member'"); 
header("location:listusers?admin_id=$admin_id");	

}	
?>
<div class="form-group">Nickname<input type="text" name="name" value="<?php print $row['name']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group">Nama Lengkap<input type="text" name="fullname" value="<?php print $row['fullname']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group">Email<input type="text" name="email" value="<?php print $row['email']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group">Phone<input type="text" name="phone" value="<?php print $row['phone']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group">Address<input type="text" name="address" value="<?php print $row['address']; ?>" class="form-control" id="ipt1"></div>
<!--<div class="form-group">Photo<img src="img_storage/<?php print $row['profile_pic']; ?>" class="img img-responsive" id="img10"></div>-->
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
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/jquery.dataTables.js">	</script>	
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