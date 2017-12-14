<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
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
<h1 id="t2"><i class="fa fa-image"></i> NEWS GALLERY</h1>
<hr></hr>
<div class="row form-group">

<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyeads">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">
</form>
</div>
</div>  

<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>Image</th>
<th>News Type</th>
<!--<th>Options</th>-->
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
$result=mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE news_type LIKE 'ulas tuntas'");
while($data = mysqli_fetch_array($result))
{
$eyenews_id=$data['eyenews_id'];  
$news_type=$data['news_type'];
$pic=$data['pic'];
print'<tr>
<td><img src="eyenews_storage/'.$pic.'" id="img4"></td>
<td>'.$news_type.'</td>

<!--<td><a href="newsgallery_edit?admin_id='.$admin_id.'&id_gallery='.$id_gallery.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="newsgallery_delete?admin_id='.$admin_id.'&id_gallery='.$id_gallery.'" class="btn" id="btn4" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>-->
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
<script src="../bs/jquery/jquery-3.2.1.min.js"></script>
<script src="../bs/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/jquery.dataTables.js">  </script> 
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