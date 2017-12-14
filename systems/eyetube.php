<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];

//$count=0;
//$sql2="SELECT * FROM tbl_eyetube WHERE active = 1";
//$result=mysqli_query($con, $sql2);
//$count=mysqli_num_rows($result);
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
<!--<link rel="stylesheet" href="<?=$base_url?>/bs/css/notification-style.css" type="text/css">-->
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> EYETUBE</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyetube">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">
</form>
</div>
</div>	
<!--
		<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"></span><img src="../img/notification-icon.png" /></button>
				 <div id="notification-latest"></div>
				</div>			
		</div>
	<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>
	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
<br>
-->
<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Eyetube</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1a'])){
$title=addslashes($_POST['title']);
$category_name=addslashes($_POST['category_name']);
$description=addslashes($_POST['description']);
$thumb=$_FILES['thumb']['name'];
$thumb= preg_replace('/\s+/', '', $thumb);
$video=$_FILES['video']['name'];
date_default_timezone_set('Asia/Jakarta');
$now=date('d F Y H:i:s');
move_uploaded_file($_FILES['thumb']['tmp_name'], "eyetube_storage/".$thumb); 
move_uploaded_file($_FILES['video']['tmp_name'], "eyetube_storage/".$video); 
$orgfile="eyetube_storage/".$thumb;
list($width,$height)=getimagesize($orgfile);
$newfile=imagecreatefromjpeg($orgfile);
$newwidth=310;
$newheight=200; 
$thumb1="eyetube_storage/t1".$thumb;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100); 

// update rizki start
	$url = preg_replace('~[^\\pL0-9_]+~u', '-', $title);
	$url = trim($url, "-");
	$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
	$url = strtolower($url);
	$url = preg_replace('~[^-a-z0-9_]+~', '', $url);
// update rizki end

//$cmd=mysqli_query($con,"insert into tbl_eyetube (title,admin_id) values ('$title','".$_SESSION['admin_id']."')"); 
$cmd=mysqli_query($con,"insert into tbl_eyetube (title,admin_id,category_name,description,thumb,thumb1,video,createon,url) values ('".$title."','".$_GET['admin_id']."','".$category_name."','".$description."','".$thumb."','".$thumb1."','".$video."','".$now."','".$url."')"); 
//ECHO "insert into tbl_eyetube (title,admin_id,category_name,description,thumb,thumb1,video,createon) values ('".$title."','".$_SESSION['admin_id']."','".$category_name."','".$description."','".$thumb."','".$thumb1."','".$video."','".$now."')";
header("refresh:0");
}
?>	
	  <div class="form-group text-left" id="t1">Judul<input type="text" name="title" class="form-control" id="ipt1" required></div>

    <div class="form-group text-left" id="t1">Pilih Kategori
    <select name="category_name" class="form-control" id="ipt1">
    <?php
    $cmd=mysqli_query($con,"select * from tbl_category_eyetube");
    while($row=mysqli_fetch_array($cmd)){
    print '<option>'.$row['category_name'].'</option>';  
    }
    ?>  
    </select> 
    </div>  

	  <div class="form-group text-left" id="t1">Deskripsi<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>
    <div class="form-group text-left" id="t1">Thumbnail Video<input type="file" name="thumb" class="form-control" id="set8" required></div>    
	  <div class="form-group text-left" id="t1">Upload Video<input type="file" name="video" class="form-control" id="set8" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1a" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>
  </div>
</div>

<div class="table table-responsive">
<table class="table table-hover datatables">
<thead>
<th>Video</th>
<th>Judul</th>
<th>Kategori</th>
<th>Create By</th>
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
$result=mysqli_query($con,"SELECT a.*,b.fullname FROM tbl_eyetube a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id order by eyetube_id desc");
while($data = mysqli_fetch_array($result))
{
$eyetube_id=$data['eyetube_id'];
$category_name=$data['category_name'];
$title=$data['title'];
$video=$data['video'];
$thumb=$data['thumb'];
print'<tr>
<td><img src="eyetube_storage/'.$thumb.'" id="img4"></td>
<td>'.$title.'</td>
<td>'.$category_name.'</td>
<td>'.$data["fullname"].'</td>
<td><a href="eyetube_edit?admin_id='.$admin_id.'&eyetube_id='.$eyetube_id.'" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>&emsp;<a class="btn btn-danger" onclick=\'if(confirm("Apa anda yakin untuk menghapus ?")) window.location = "eyetube_delete?admin_id='.$admin_id.'&eyetube_id='.$eyetube_id.'"\'><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';
   
?>	
</div>
</div>
</div>

<input type = "hidden" class="total_club" value="<?php echo $_SESSION['total_eyetube'] ?>">

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
<!--
<script type="text/javascript">

	function myFunction() {
		total_eyetube=$(".total_eyetube").val();
		$.ajax({
			url: "view_notification_tube.php",
			type: "POST",
			data: { 'total_eyetube': total_eyetube},  
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 function cek_notif(){
		 total_eyetube=$(".total_eyetube").val();
		
		 $.ajax({
			url: "cek_notification_tube.php",
			type: "POST",
			success: function(data){
				//alert(data);
				//alert(total_club);
				if(data>total_eyetube)
				{
					last_club=data-total_eyetube;
					$("#notification-count").empty().html(last_club);
				}
				
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
		 setInterval(cek_notif, 10000);
		//$('#notification-icon').click(function(e){
			//myFunction();
		//});
	});
		 
	</script>
-->
<script>
$(document).ready(function() {	
$('.datatables').DataTable();
} );
$(function(){
	$(".datetimepicker").datetimepicker();
	
})
</script>

</body>
</html>