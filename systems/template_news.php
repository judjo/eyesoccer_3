<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> UPDATE TEMPLATES</h1>
<hr></hr>	

<div class="row">
<div class="col-lg-6 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Template Tengah</div>
<div class="panel-body">
<form method="post">
<?php
$cmd1=mysqli_query($con,"select * from tbl_template_eyenews where position='tengah'");
$row1=mysqli_fetch_array($cmd1);	
?>
<div class="form-group">Position
<select name="ct1" class="form-control">
<?php
$cmd2=mysqli_query($con,"select * from tbl_news_types");
while($row2=mysqli_fetch_array($cmd2)){
print '<option'; if($row1['category_template']==$row2['news_type']){print " selected";} else {print "";} print '>'.$row2['news_type'].'</option>';	
}
?>	
</select>
</div>
<div class="form-group"><input type="submit" name="op1" value="UPDATE" class="btn btn-primary btn-block"></div>
<?php
if(isset($_POST['op1'])){
$ct1=$_POST['ct1'];
$cmd=mysqli_query($con,"update tbl_template_eyenews set category_template='".$ct1."' where id_template='".$row1['id_template']."'");
header("refresh:0");	
}
?>
</form>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Template Kanan</div>
<div class="panel-body">
<form method="post">
<?php
$cmd3=mysqli_query($con,"select * from tbl_template_eyenews where position='kanan'");
$row3=mysqli_fetch_array($cmd3);	
?>
<div class="form-group">Position
<select name="ct2" class="form-control">
<?php
$cmd4=mysqli_query($con,"select * from tbl_news_types");
while($row4=mysqli_fetch_array($cmd4)){
print '<option'; if($row3['category_template']==$row4['news_type']){print " selected";} else {print "";} print '>'.$row4['news_type'].'</option>';	
}
?>	
</select>
</div>
<div class="form-group"><input type="submit" name="op2" value="UPDATE" class="btn btn-primary btn-block"></div>
<?php
if(isset($_POST['op2'])){
$ct2=$_POST['ct2'];
$cmd=mysqli_query($con,"update tbl_template_eyenews set category_template='".$ct2."' where id_template='".$row3['id_template']."'");
header("refresh:0");	
}
?>
</form>	
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<!--<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
<script src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
    mode : "textareas"
});
</script>-->
<script src="<?=$base_url?>/bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=$base_url?>/bs/js/bootstrap.min.js"></script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/jquery.dataTables.js">	</script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/jquery.chained.js"></script>
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
<script type="text/javascript" src="tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$(function() {
	$(".sub_news_type1").chained(".news_type1");
		$('.textarea').tinymce({
			// Location of TinyMCE script
			script_url : 'tiny_mce/tiny_mce.js',
			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>

</body>
</html>