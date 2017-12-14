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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYEGALLERY
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
 <?php
      if(isset($_POST['opt1'])){
		  //print_r($_POST);
		foreach($_POST["title"] as $key => $val)
		{
		  if($val!="" && isset($_FILES['pic']['name'][$key]) && $_FILES['pic']['name'][$key]!="")
		  {
		  $title=addslashes($val);
		 // $news_type=$_POST['news_type'];
		  $description=addslashes($_POST['description'][$key]);
		  $pic=rand("1000","9999")."-".$_FILES['pic']['name'][$key];
		  $pic = preg_replace('/\s+/', '', $pic);
		  $ex = pathinfo($pic,PATHINFO_EXTENSION);
		  date_default_timezone_set('Asia/Jakarta');
		  $now=date('Y-m-d H:i:s');
		  if($_FILES['pic']['size'][$key] > 10485760){
		  print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
		  }
		  else if(file_exists("img_storage/".$pic)){
		  print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
		  }
		  else if($ex != "jpg" && $ex != "JPG" && $ex != "png" && $ex != "PNG" && $ex != "jpeg" && $ex != "JPEG"){
		  print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
		  }
		  else{      	
		  move_uploaded_file($_FILES['pic']['tmp_name'][$key], "img_storage/".$pic);	
		  $orgfile="img_storage/".$pic;
		  list($width,$height)=getimagesize($orgfile);
		  $newfile=imagecreatefromjpeg($orgfile);
		  $newwidth=292;
		  $newheight=182;	
		  $thumb1="img_storage/t1".$pic;
		  $truecolor=imagecreatetruecolor($newwidth, $newheight);
		  imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		  imagejpeg($truecolor,$thumb1,100);
		  $thumb1=substr($thumb1,12,100);
		  //$publish_on=date("Y-m-d H:i:s",strtotime($_POST["publish_on"][$key])); 
		  $cmd=mysqli_query($con,"insert into tbl_gallery (title,tags,description,pic,thumb1,upload_date,upload_user,publish_by,publish_type) values ('$title','".$_POST["tags"][$key]."','$description','$pic','$thumb1','$now','".$_SESSION["admin_id"]."','admin','private')"); 
			//echo "insert into tbl_gallery (title,description,pic,thumb1,upload_date,upload_user,publish_by,publish_type) values ('$title','$description','$pic','$thumb1','$now','".$_SESSION["admin_id"]."','admin','private')";
		  
		  }
		  }


	  
		}
		//exit;
		header("refresh:0");
      }
      ?>
<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Gallery</h1></div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
     	
	<div class="thumbnail drop-shadow form-1 col-lg-12" no="1">
		<div class="form-group text-left col-lg-12" id="t1">Title<input type="text" name="title[1]" class="form-control" id="ipt1" required></div>
		<div class="form-group text-left col-lg-12" id="t1">Tags<input type="text" name="tags[1]" class="form-control tags" id="ipt1" ></div>
	 
		<div class="form-group text-left col-lg-12" id="t1">Description<textarea name="description[1]" class="form-control" maxlength="500" rows="5"></textarea></div>
		<div class="form-group text-left col-lg-6" id="t1">Upload Image<input type="file" name="pic[1]" class="form-control" id="set8" required></div>
		<div class="form-group text-left col-lg-6 pull-right text-right" id="t1"><button type="button" class="add-more add-button btn btn-info pull-right" no="1">Add More</button></div>
	</div>
	<div class="form-replace" last_no="1">
	
	</div>
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>

    
  </div>
</div>

<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>Image</th>
<th>Title</th>
<th>Tags</th>
<th>Description</th>
<th>Create On</th>
<th>Create By</th>
<th>User Type</th>
<th>Action</th>	
</thead>
<tbody>
<?php
$dataPerPage = 10;
if(isset($_GET['page']))
{
$noPage = $_GET['page'];
} 
else $noPage = 1;
$offset = ($noPage - 1) * $dataPerPage;
$result=mysqli_query($con,"SELECT a.*,
CASE  
  WHEN b.fullname!='' THEN b.fullname
 ELSE c.name
 END as upload_name FROM tbl_gallery a LEFT JOIN tbl_admin b ON (b.admin_id=a.upload_user AND a.publish_by='admin') LEFT JOIN tbl_member c ON (c.id_member=a.upload_user AND a.publish_by='member') order by id_gallery desc");
while($data = mysqli_fetch_array($result))
{
$id_gallery=$data['id_gallery'];	
$title=$data['title'];
$tags=$data['tags'];
$news_type=$data['description'];
$createon=$data['upload_date'];
$pic=$data['thumb1'];
print'<tr>
<td><div class="thumbnail drop-shadow"><img src="img_storage/'.$pic.'" id="img4"></div></td>
<td>'.$title.'</td>
<td>'.$tags.'</td>
<td>'.$news_type.'</td>
<td>'.$createon.'</td><td>'.$data["upload_name"].'</td><td>'.$data["publish_by"].'</td>
<td><a href="eyegallery_view?admin_id='.$admin_id.'&id_gallery='.$id_gallery.'" class="btn" id="btn3">View</a>  <a href="eyegallery_delete?admin_id='.$admin_id.'&id_gallery='.$id_gallery.'" class="btn" id="btn4" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';/*
$query=mysqli_query($con,"SELECT * FROM tbl_eyevent where id_event order by id_event desc");
$hasil=mysqli_num_rows($query);
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='eyevent?page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='eyevent?page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='eyevent?page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>";   */
?>	
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
	last_no=1;
	
	$("body").on("click",".add-button",function(){
		last_no++;
		last_id=last_no;
		tags=$(".tags").val();
		$.ajax({       
		type: "POST",   
		data: { 'last_id': last_id,'tags': tags},  
		url: "<?=$base_url?>/systems/getGallery.php",   
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