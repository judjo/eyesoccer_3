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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYEVENT</h1>
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

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Event</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <?php
      if(isset($_POST['opt1'])){
      $title=addslashes($_POST['title']);
     // $news_type=$_POST['news_type'];
      $description=addslashes($_POST['description']);
      $pic=rand("1000","9999")."-".$_FILES['pic']['name'];
      $pic = preg_replace('/\s+/', '', $pic);
      $ex = pathinfo($pic,PATHINFO_EXTENSION);
      date_default_timezone_set('Asia/Jakarta');
      $now=date('Y-m-d H:i:s');
      if($_FILES['pic']['size'] > 1048576000){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
      }
      else if(file_exists("eyevent_storage/".$pic)){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		
      }
      else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "png" && $ex != "PNG" && $ex != "JPEG"){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
      }
      else{      	
      move_uploaded_file($_FILES['pic']['tmp_name'], "eyevent_storage/".$pic);	
      $orgfile="eyevent_storage/".$pic;
	  list($width,$height)=getimagesize($orgfile);
	  $newfile=imagecreatefromjpeg($orgfile);
	  $newwidth=292;
	  $newheight=182;	
	  $thumb1="eyevent_storage/t1".$pic;
	  $truecolor=imagecreatetruecolor($newwidth, $newheight);
	  imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	  imagejpeg($truecolor,$thumb1,100);
	  $thumb1=substr($thumb1,16,100);
	  $publish_on=date("Y-m-d H:i:s",strtotime($_POST["publish_on"])); 
	  $cmd=mysqli_query($con,"insert into tbl_event (title, tampil , category ,admin_id ,description ,pic ,thumb1 ,upload_date ,publish_on) values ('$title','".$_POST["tampil"]."','".$_POST["category"]."','".$_SESSION["admin_id"]."','$description','$pic','$thumb1','$now','".$publish_on."')");      
           header("refresh:0");
      }	
      }
      ?>	
	  <div class="form-group text-left" id="t1">Title<input type="text" name="title" class="form-control" id="ipt1" required></div>
	 	
	  <div class="form-group text-left" id="t1">Tampil Urutan<input type="text" name="tampil" class="form-control">
	  </div>
	 	
	  <div class="form-group text-left" id="t1">Category<select name="category" class="form-control">
	  <option value="">Pilih Category</option>
	  <?php
	  $category=mysqli_query($con,"SELECT * FROM tbl_event_category ORDER BY category ASC");
	  while($cat=mysqli_fetch_array($category)){
		  echo "<option value='".$cat["id_event_category"]."'>".$cat["category"]."</option>";
	  }
	  ?>
	  </select></div>
	 
	  <div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>
	  <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8" required></div>
    <div class="form-group text-left" id="t1">Publish On Date<input type="text" value="<?=date("Y-m-d H:i:s")?>" name="publish_on" class="form-control datetimepicker"/>
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
<th>Urutan</th>
<th>Category</th>
<th>Create On</th><th>Publish On</th><th>Create By</th>
<th>Options</th>	
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
$result=mysqli_query($con,"SELECT a.*,c.category as cat,b.fullname FROM tbl_event a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id LEFT JOIN tbl_event_category c ON c.id_event_category=a.category where id_event order by id_event desc");
while($data = mysqli_fetch_array($result))
{
$id_event=$data['id_event'];	
$title=$data['title'];
$tampil=$data['tampil'];
$news_type=$data['cat'];
$createon=$data['upload_date'];
$pic=$data['pic'];
print'<tr>
<td><img src="eyevent_storage/'.$pic.'" id="img4"></td>
<td>'.$title.'</td>
<td>'.$tampil.'</td>
<td>'.$news_type.'</td>
<td>'.$createon.'</td><td>'.date("d F Y H:i:s",strtotime($data["publish_on"])).'</td><td>'.$data["fullname"].'</td>
<td><a href="eyevent_jadwal?admin_id='.$admin_id.'&id_event='.$id_event.'" class="btn btn-primary"><i class="fa fa-calendar" aria-hidden="true"></i> Jadwal</a>&emsp;<a href="eyevent_edit?admin_id='.$admin_id.'&id_event='.$id_event.'" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>&emsp;<a href="eyevent_delete?admin_id='.$admin_id.'&id_event='.$id_event.'" class="btn btn-danger" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
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
	
})
</script>
</body>
</html>