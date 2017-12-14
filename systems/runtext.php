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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYE RUNNING TEXT</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyeads">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>"><!--
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  -->
</form>
</div>
</div>  

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Ads</h1></div>
      <div class="modal-body">
      <form method="post">
      <?php
      if(isset($_POST['opt1'])){
      $place=addslashes($_POST['place']);
      $title=addslashes($_POST['title']);
      $desc=addslashes($_POST['desc']);
      

    $cmd=mysqli_query($con,"insert into tbl_running_text (place,title,description) values ('$place','$title','$desc')");      
           header("refresh:0");
      
      }
      ?>  
    <div class="form-group text-left" id="t1">Place<input type="text" name="place" class="form-control" id="ipt1" required></div>
    <div class="form-group text-left" id="t1">Title<input type="text" name="title" class="form-control" id="ipt1" required></div>
    <div class="form-group text-left" id="t1">Isi Running Text <textarea name="desc" class="form-control" id="ipt1"></textarea></div>
     <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>
    </div>

</div>
<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>No</th>
<th>Place</th>
<th>Title</th>
<th>Isi</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_running_text order by id_running_text desc");
$i=1;
while($data = mysqli_fetch_array($result))
{
$ads_id=$data['id_running_text'];  
$title=$data['title'];
print'<tr>
<td>'.$i.'</td>
<td>'.$data["place"].'</td>
<td>'.$data["title"].'</td>
<td>'.$data["description"].'</td>
<td><a href="runtext_edit?ads_id='.$ads_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="runtext_delete?ads_id='.$ads_id.'" class="btn" id="btn4" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
$i++;
}
print'</tbody></table></div><br><br>';
?>  
</div>
</div>
</div>

<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
/*tinyMCE.init({
    mode : "textareas"
});*/
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