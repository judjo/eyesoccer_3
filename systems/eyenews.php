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

<script src="<?=$base_url?>/bs/jquery/jquery-3.2.1.min.js"></script>
<!--<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
	  $(function(){
		 
tinyMCE.init({
	   mode : "textareas",
}); 
	  })
</script>-->
<script type="text/javascript" src="tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$(function() {
		$('.textarea').tinymce({
			// Location of TinyMCE script
			script_url : 'tiny_mce/tiny_mce.js',
			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : false,
	

			
		});
	});
</script>

</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYENEWS</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a>&ensp;<a href="template_news" class="btn" id="btn5">Template News</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyenews">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">

</form>
</div>
</div>	

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog"  style="width:60%">
    <div class="modal-content">
    <div class="modal-header text-center"><h1 id="t3">Add News</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <?php
      if(isset($_POST['opt1'])){
      $title=addslashes($_POST['title']);
	  $str1 = str_replace('-',' ',$_POST['news_type']);
      $news_type=addslashes($str1);
	  $str2 = str_replace('-',' ',$_POST['sub_category_name']);
      $sub_category_name=$str2;
      $description=addslashes($_POST['description']);
      $credit=addslashes($_POST['credit']);
      $category_news=$_POST['category_news'];
      $tag=$_POST['tag'];
      $meta_description=$_POST['meta_description'];
      $pic=rand("1000","9999")."-".$_FILES['pic']['name'];
      $pic = preg_replace('/\s+/', '', $pic);
      $ex = pathinfo($pic,PATHINFO_EXTENSION);
      date_default_timezone_set('Asia/Jakarta');
      $now=date('d F Y H:i:s');
      if($_FILES['pic']['size'] > 1048576){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
      }
      else if(file_exists("eyenews_storage/".$pic)){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
      }
      else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "png" && $ex != "PNG" && $ex != "JPEG"){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
      }
      else{   
		$pic2=rand("1000","9999")."-".$_FILES['thumbnail']['name'];
		$pic2 = preg_replace('/\s+/', '', $pic2);
		$ex2 = pathinfo($pic2,PATHINFO_EXTENSION);
		if($_FILES['thumbnail']['size'] > 1048576){
		print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
		}
		else if(file_exists("eyenews_storage/".$pic2)){
		print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
		}
		else if($ex2 != "jpg" && $ex2 != "JPG" && $ex2 != "jpeg" && $ex2 != "png" && $ex2 != "PNG" && $ex2 != "JPEG"){
		print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
		}
		else{
			move_uploaded_file($_FILES['thumbnail']['tmp_name'], "eyenews_storage/".$pic2);	
      
		}	  
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
	  $publish_on=date("Y-m-d H:i:s",strtotime($_POST["publish_on"])); 
	  // update rizki start
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $title);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strtolower($url);
		$url = preg_replace('~[^-a-z0-9_]+~', '', $url);
		// echo "insert into tbl_eyenews (title,admin_id,news_type,sub_category_name,description,credit,category_news,tag,meta_description,pic,thumb1,thumb2,createon,publish_on,url) values ('$title','".$_SESSION["admin_id"]."','$news_type','$sub_category_name','$description','$credit','$category_news','$tag','$meta_description','$pic','$thumb1','$pic2','$now','".$publish_on."','".$url."')";
		// exit();
	// update rizki end
		// $cmd=mysqli_query($con,"insert into tbl_eyenews (title,admin_id,news_type,description,credit,category_news,tag,meta_description,pic,thumb1, thumb2,createon,publish_on) values ('$title','".$_SESSION["admin_id"]."','$news_type','$description','$credit','$category_news','$tag','$meta_description','$pic','$thumb1','$pic2','$now','".$publish_on."')");   //ori cmd
	  $cmd=mysqli_query($con,"insert into tbl_eyenews (title,admin_id,news_type,sub_category_name,description,credit,category_news,tag,meta_description,pic,thumb1,thumb2,createon,publish_on,url) values ('$title','".$_SESSION["admin_id"]."','$news_type','$sub_category_name','$description','$credit','$category_news','$tag','$meta_description','$pic','$thumb1','$pic2','$now','".$publish_on."','".$url."')");      
           // echo "insert into tbl_eyenews (title,admin_id,news_type,sub_category_name,description,credit,category_news,tag,meta_description,pic,thumb1,thumb2,createon,publish_on,url) values ('$title','".$_SESSION["admin_id"]."','$news_type','$sub_category_name','$description','$credit','$category_news','$tag','$meta_description','$pic','$thumb1','$pic2','$now','".$publish_on."','".$url."')";
           // exit();
           header("refresh:0");
      }	
      }
      ?>	
	  <div class="form-group text-left" id="t1">Title<input type="text" name="title" class="form-control" id="ipt1" required></div>
	  <div class="form-group text-left" id="t1">News Type
	  <select name="news_type" class="news_type1 form-control" id="ipt1">
	  <?php
	  $cmd=mysqli_query($con,"select * from tbl_news_types");
	  while($row=mysqli_fetch_array($cmd)){
	  $str_rep = str_replace(' ','-',$row['news_type']);
	  print '<option value="'.$str_rep.'">'.$row['news_type'].'</option>';  
	  }
	  ?>	
	  </select>	
	  </div>
	  <div class="form-group text-left" id="t1">Sub Category News
	  <select name="sub_category_name" class="sub_news_type1 form-control" id="ipt1">
	  <?php
	  $cmd1=mysqli_query($con,"select a.*,b.news_type from tbl_sub_category_news a left join tbl_news_types b on b.news_type_id=a.news_type_id");
	  while($row1=mysqli_fetch_array($cmd1)){
	  $str_rep2 = str_replace(' ','-',$row1['news_type']);
	  print '<option data-chained="'.$str_rep2.'">'.$row1['sub_category_name'].'</option>';  
	  }
	  ?>	
	  </select>	
	  </div>
	  <div class="form-group text-left" id="t1">Description<textarea name="description" style="max-width:90%;width:90%" class="form-control textarea" maxlength="500" rows="5"></textarea></div>
	  <div class="form-group" id="t1">Credit<input type="text" name="credit" class="form-control" id="set8"></div>
	  <div class="form-group" id="t1">Category<select name="category_news" class="form-control"><option value="1">Bukan Rekomendasi</option><option value="2">Rekomendasi</option></select></div>		
	  <div class="form-group" id="t1">Tag<input type="text" name="tag" class="form-control"></div>
	  <div class="form-group" style="color:#ff0033">Contoh : Ronaldo;Real Madrid;Spanyol</div>
	  <div class="form-group" id="t1">Meta Description<input type="text" name="meta_description" class="form-control"></div>
	  <div class="form-group" style="color:#ff0033">Note : Maximum 250 Karakter</div>	  
	  <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8" required></div>
	  <div class="form-group text-left" id="t1">Upload Thumbnail<input type="file" name="thumbnail" class="form-control" id="set8"></div>
    <div class="form-group text-left" id="t1">Publish On Date<input type="text" value="<?=date("Y-m-d H:i:s")?>" name="publish_on" class="form-control datetimepicker"/>
	</div>
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>

    
  </div>
</div>

<div class="table table-responsive " id="body_news">
<table class="table table-striped table-bordered display" id="example">
<thead id="back900">
<th>No</th>
<th>Image</th>
<th>Title</th>
<th>News Type</th>
<th>Create On</th><th>Publish On</th><th>Views</th><th>Create By</th>
<th>Options</th>	
</thead>
<tbody >

</tbody>
</table>
</div>
<br><br>
</div>
</div>
</div>

<script src="<?=$base_url?>/bs/js/bootstrap.min.js"></script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/jquery.dataTables.js">	</script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/jquery.chained.js"></script>
<script>
$(".sub_news_type1").chained(".news_type1");
$(document).ready(function() {
  var dataTable = $('#example').DataTable( {
  			"order":[[5,"desc"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                url :"eyenews_load.php", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".example-error").html("");
                    $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="4">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display","none");
 
                }
            }
        } );	
//setTimeout(load_list, 2000);
//$('#example').DataTable();
  //$('#example').DataTable( {
  //      "ajax": 'eyenews_load.php'
  //  } );
} );
$(function(){

	$(".datetimepicker").datetimepicker({
		 format: 'Y-m-d H:i:s'
	});
	
})
function load_list()
{
	 $.ajax({
			url: "eyenews_load.php",
			type: "POST",
			success: function(data){
				//alert(data);
				//alert(total_club);
				$("#body_news").empty().html(data);
				
			},
			error: function(){}           
		});
		$('#example').DataTable();
}
</script>
</body>
</html>