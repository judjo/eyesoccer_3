<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
$eyenews_id=$_GET['eyenews_id'];
$cmd=mysqli_query($con,"select * from tbl_eyenews where eyenews_id='$eyenews_id'");
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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> UPDATE NEWS</h1>
<hr></hr>	
<form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$title=addslashes($_POST['title']);
// $news_type=$_POST['news_type'];
$str1 = str_replace('-',' ',$_POST['news_type']);
$news_type=addslashes($str1);
$str2 = str_replace('-',' ',$_POST['sub_category_name']);
$sub_category_name=$str2;
$description=addslashes($_POST['description']);
$credit=addslashes($_POST['credit']);
      $category_news=$_POST['category_news'];
      $tag=$_POST['tag'];
      $meta_description=$_POST['meta_description'];
//$pic=$_FILES['pic']['name'];

date_default_timezone_set('Asia/Jakarta');
$now=date('d F Y H:i:s');
if((!isset($_FILES['pic']['tmp_name']) || empty($_FILES['pic']['tmp_name'])) && (!isset($_FILES['thumbnail']['tmp_name']) || empty($_FILES['thumbnail']['tmp_name']))){
$cmd=mysqli_query($con,"update tbl_eyenews set title='$title',news_type='$news_type',description='$description',updateon='$now',publish_on='".$_POST["publish_on"]."',credit='".$credit."',category_news='$category_news',tag='$tag',meta_description='$meta_description',sub_category_name='$sub_category_name' where eyenews_id='$eyenews_id'");
header("location:eyenews?admin_id=$admin_id");	
}
else{
$pic=rand("1000","9999")."-".$_FILES['pic']['name'];
$pic = preg_replace('/\s+/', '', $pic);
	 $ex = pathinfo($pic,PATHINFO_EXTENSION);
if($_FILES['pic']['size'] > 1048576000){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
}
else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg"&& $ex != "PNG" && $ex != "png" && $ex != "JPEG"){
print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
}
else{ 
$update="";  
if(isset($_FILES['pic']['tmp_name']) && $_FILES['pic']['tmp_name']!="")
{
move_uploaded_file($_FILES['pic']['tmp_name'], "eyenews_storage/".$pic);	
$orgfile="eyenews_storage/".$pic;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=292;
$newheight=182;	
$thumb1="eyenews_storage/t1".$pic;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);	
$update.=",pic='".$pic."'";
}  
if(isset($_FILES['thumbnail']['tmp_name']) && $_FILES['thumbnail']['tmp_name']!="")
{
	$pic2=rand("1000","9999")."-".$_FILES['thumbnail']['name'];
$pic2 = preg_replace('/\s+/', '', $pic2);
move_uploaded_file($_FILES['thumbnail']['tmp_name'], "eyenews_storage/".$pic2);	

$update.=",thumb2='".$pic2."'";
}
	
$cmd=mysqli_query($con,"update tbl_eyenews set title='$title',news_type='$news_type',description='$description',credit='".$credit."',category_news='$category_news',tag='$tag',meta_description='$meta_description',thumb1='$thumb1',updateon='$now',publish_on='".$_POST["publish_on"]."' ".$update." where eyenews_id='$eyenews_id'");	
header("location:eyenews?admin_id=$admin_id");
}	
}
}
?>
<div class="form-group">Title<input type="text" name="title" value="<?php print $row['title']; ?>" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">News Type
<select name="news_type" class="form-control news_type1" id="ipt1">
<?php
$cmd1=mysqli_query($con,"select * from tbl_news_types");
while($row1=mysqli_fetch_array($cmd1)){
$str_rep = str_replace(' ','-',$row1['news_type']);
print '<option value="'.$str_rep.'"'; if($row['news_type']==$row1['news_type']){print " selected";}else{print "";} print'>'.$row1['news_type'].'</option>';  
}
?>	
</select>	
</div>

<div class="form-group text-left" id="t1">Sub Category News
<select name="sub_category_name" class="form-control sub_news_type1" id="ipt1">
<?php
$cmd1=mysqli_query($con,"select a.*,b.news_type as ntype from tbl_sub_category_news a left join tbl_news_types b on b.news_type_id=a.news_type_id");
print '<option data-chained="" value="">--Pilih Sub Category--</option>';
while($row1=mysqli_fetch_array($cmd1)){
// print '<option data-chained="'.$row1['ntype'].'"'; if($row['sub_category_name']==$row1['sub_category_name']){print " selected";}else{print "";} print'>'.$row1['sub_category_name'].'</option>';  
$str_rep2 = str_replace(' ','-',$row1['ntype']);

print '<option data-chained="'.$str_rep2.'"'; if($row['sub_category_name']==$row1['sub_category_name']){print " selected";print'>'.$row1['sub_category_name'].'</option>';}else{print'>'.$row1['sub_category_name'].'</option>';}
}
?>	
</select>	
</div>

<!--<div class="form-group text-left" id="t1">Sub Category News
<select name="news_type" class="form-control" id="ipt1">
<?php
$cmd1=mysqli_query($con,"select * from tbl_sub_category_news");
while($row1=mysqli_fetch_array($cmd1)){
print '<option>'.$row1['sub_category_name'].'</option>';  
}
?>	
</select>	
</div>-->
<div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control textarea" maxlength="500" rows="5"><?php print $row['description']; ?></textarea></div>
<div class="form-group" id="t1">Credit<input type="text" name="credit" value="<?php print $row['credit']; ?>" class="form-control" id="set8"></div>
	  <div class="form-group" id="t1">Category<select name="category_news" class="form-control"><option value="1" <?php if($row['category_news']=="1"){print " selected";}else{print "";} ?>>Bukan Rekomendasi</option><option value="2" <?php if($row['category_news']=="2"){print " selected";}else{print "";} ?>>Rekomendasi</option></select></div>		
	  <div class="form-group" id="t1">Tag<input type="text" name="tag" value="<?php print $row['tag']; ?>" class="form-control"></div>
	  <div class="form-group" style="color:#ff0033">Contoh : Ronaldo;Real Madrid;Spanyol</div>
	  <div class="form-group" id="t1">Meta Description<input type="text" name="meta_description" value="<?php print $row['meta_description']; ?>" class="form-control"></div>
	  <div class="form-group" style="color:#ff0033">Note : Maximum 250 Karakter</div>			
<div class="form-group"><img src="eyenews_storage/<?php print $row['pic']; ?>" class="img img-responsive" id="img8"></div>
<div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8"></div><div class="form-group text-left" id="t1">Publish On<input type="text" name="publish_on" class="form-control datetimepicker" value="<?=$row["publish_on"]?>" ></div>
<div class="form-group text-right" id="t1"><input type="submit" name="opt1" value="UPDATE" class="btn" id="btn1"></div><br><br>
</form>
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