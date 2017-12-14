<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="<?=$base_url?>/img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/js/jquery.datetimepicker.css">	
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/datatables/media/css/dataTables.bootstrap4.css">
<style>

.drop-shadow {
        -webkit-box-shadow: 0 0 5px 0px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 0px rgba(0, 0, 0, .5);
    }
</style>
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYEME
</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyevent">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>"><!--
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>	-->
</form>
</div>
</div>
<div class="col-lg-12">
<?php
$get=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyeme WHERE id_eyeme='".$_GET["id_eyeme"]."' LIMIT 1"));
if($get["type_gallery"]=="image")
{
?>
<img src="<?=$base_url?>/systems/img_storage/<?=$get["pic"]?>" class="img img-responsive" />
<?php
}
else{
	?>
	<video width="640" height="360" poster="<?=$base_url?>/systems/img_storage/<?=$get['pic']; ?>" controls controlsList="nodownload">
<source src="<?=$base_url?>/systems/img_storage/<?=$get['video']; ?>" type="video/mp4"/></video>
	<?php
}
?>
</div>	
</div>	
 

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
	last_no=1;
	
	$("body").on("click",".add-button",function(){
		last_no++;
		last_id=last_no;
		tags=$(".tags").val();
		$.ajax({       
		type: "POST",   
		data: { 'last_id': last_id,'tags': tags},  
		url: "<?=$base_url?>/systems/getMe.php",   
		dataType: "json",  
		success:function(data){  
			
			$(".form-replace").append(data.html1); 
			$(".form-"+last_no).slideDown("normal");
			tinyMCE.init({
				mode : "textareas"
			});
			}   
		});
	})
})
</script>
</body>
</html>