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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> Kategori Ads</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_adscategory">
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
    <div class="modal-header text-center"><h1 id="t3">Add Kategori</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <?php
      if(isset($_POST['opt1'])){
      $category_name_ads=addslashes($_POST['category_name_ads']);
      $note=addslashes($_POST['note']);
       
    $cmd=mysqli_query($con,"insert into tbl_category_ads (admin_id,category_name_ads,note) values ('".$_SESSION["admin_id"]."','$category_name_ads','$note')");    
           header("refresh:0");
      }	
      ?>	
	  <div class="form-group text-left" id="t1">Kode<input type="text" name="category_name_ads" class="form-control" id="ipt1"></div>
    <div class="form-group text-left" id="t1">Nama Kategori<input type="text" name="note" class="form-control" id="ipt1" required></div>    
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>

    
  </div>
</div>

<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>Kode</th>
<th>Keterangan</th>
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
$result=mysqli_query($con,"SELECT a.*,b.fullname FROM tbl_category_ads a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id where category_ads_id order by category_ads_id desc");
while($data = mysqli_fetch_array($result))
{
$category_ads_id=$data['category_ads_id'];	
$category_name_ads=$data['category_name_ads'];
$note=$data['note'];
print'<tr>
<td>'.$category_name_ads.'</td>
<td>'.$note.'</td>
<td><a href="adscategory_edit?admin_id='.$admin_id.'&category_ads_id='.$category_ads_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="adscategory_delete?admin_id='.$admin_id.'&category_ads_id='.$category_ads_id.'" class="btn" id="btn4" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';
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