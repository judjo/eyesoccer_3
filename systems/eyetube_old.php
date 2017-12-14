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
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>	
</form>
</div>
</div>	

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Eyetube</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$title=addslashes($_POST['title']);
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
$newwidth=292;
$newheight=182; 
$thumb1="eyetube_storage/t1".$thumb;
$truecolor=imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($truecolor,$thumb1,100);
$thumb1=substr($thumb1,16,100);  
$cmd=mysqli_query($con,"insert into tbl_eyetube (title,admin_id,description,thumb,thumb1,video,createon) values ('$title','".$_SESSION["admin_id"]."','$description','$thumb','$thumb1','$video','$now')"); 
header("refresh:0");
}
?>	
	  <div class="form-group text-left" id="t1">Title<input type="text" name="title" class="form-control" id="ipt1" required></div>

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

	  <div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>
    <div class="form-group text-left" id="t1">Thumbnail Video<input type="file" name="thumb" class="form-control" id="set8" required></div>    
	  <div class="form-group text-left" id="t1">Upload Video<input type="file" name="video" class="form-control" id="set8" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>
  </div>
</div>

<div class="table table-responsive">
<table class="table table-hover datatables">
<thead>
<th>Video</th>
<th>Title</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_eyetube where eyetube_id order by eyetube_id desc");
while($data = mysqli_fetch_array($result))
{
$eyetube_id=$data['eyetube_id'];	
$title=$data['title'];
$video=$data['video'];
$thumb=$data['thumb'];
print'<tr>
<td><img src="eyetube_storage/'.$thumb.'" id="img4"></td>
<td>'.$title.'</td>
<td><a href="eyetube_edit?admin_id='.$admin_id.'&eyetube_id='.$eyetube_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="eyetube_delete?admin_id='.$admin_id.'&eyetube_id='.$eyetube_id.'" class="btn" id="btn4">DELETE</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';
$query=mysqli_query($con,"SELECT * FROM tbl_eyetube where eyetube_id order by eyetube_id desc");
$hasil=mysqli_num_rows($query);
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='eyetube?page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='eyetube?page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='eyetube?page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>";   
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
$('.datatables').DataTable();
} );
$(function(){
	$(".datetimepicker").datetimepicker();
	
})
</script>
</body>
</html>