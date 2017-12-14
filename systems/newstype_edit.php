<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$news_type_id=$_GET['news_type_id'];
$cmd=mysqli_query($con,"select * from tbl_news_types where news_type_id='$news_type_id'");
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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> UPDATE NEWS</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$news_type=addslashes($_POST['news_type']);


$cmd=mysqli_query($con,"update tbl_news_types set news_type='$news_type' where news_type_id='$news_type_id'");
header("location:news_type?admin_id=$admin_id");	

$cmd=mysqli_query($con,"update tbl_news_types set news_type='$news_type' where news_type_id='$news_type_id'");	
header("location:news_type?admin_id=$admin_id");
}	
?>
<div class="form-group">News Type Name<input type="text" name="news_type" value="<?php print $row['news_type']; ?>" class="form-control" id="ipt1" required></div>

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