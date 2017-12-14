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
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/bootstrap-select.css">
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
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYETICKET</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyeticket">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">
</form>
</div>
</div>	

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Tambah Tiket</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <?php
      if(isset($_POST['opt1'])){
    	  
	  if($_POST["tim_a"]=="")
	  {
		$nclub=1;
		$cmdn=mysqli_query($con,"select * from tbl_club");
		while($rown=mysqli_fetch_array($cmdn)){
		$nclub=$rown['club_id'];
		$nclub++;  
		}
		if($nclub<10){
		$nclub="000".$nclub;
		}
		else if($nclub>9 && $nclub<99){
		$nclub="00".$nclub;
		}
		else if($nclub>99){
		$nclub="0".$nclub;
		}
	  $pic=rand("1000","9999")."-".$_FILES['pic_a']['name'];
      $pic = preg_replace('/\s+/', '', $pic);
      $ex = pathinfo($pic,PATHINFO_EXTENSION);
	  
    
      date_default_timezone_set('Asia/Jakarta');
      $now=date('Y-m-d H:i:s');
      if($_FILES['pic_a']['size'] > 104857600){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
      }
      else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "png" && $ex != "PNG" && $ex != "JPEG"){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
      }
      else{      	
      move_uploaded_file($_FILES['pic_a']['tmp_name'], "club_logo/".$pic);	
     
	  }	
	   $cmd=mysqli_query($con,"insert into tbl_club (club_id,name,logo,competition) values ('$nclub','".$_POST["tim_a_name"]."','$pic','Liga Lainnya')");  
	  $tim_a=$nclub;
	  }
	  else{
		$tim_a=$_POST["tim_a"];
	  }
	  if($_POST["tim_b"]=="")
	  {
		$nclub=1;
		$cmdn=mysqli_query($con,"select * from tbl_club");
		while($rown=mysqli_fetch_array($cmdn)){
		$nclub=$rown['club_id'];
		$nclub++;  
		}
		if($nclub<10){
		$nclub="000".$nclub;
		}
		else if($nclub>9 && $nclub<99){
		$nclub="00".$nclub;
		}
		else if($nclub>99){
		$nclub="0".$nclub;
		}
	   $pic2=rand("1000","9999")."-".$_FILES['pic_b']['name'];
      $pic2 = preg_replace('/\s+/', '', $pic2);
      $ex = pathinfo($pic2,PATHINFO_EXTENSION);
	 
    
      date_default_timezone_set('Asia/Jakarta');
      $now=date('Y-m-d H:i:s');
      if($_FILES['pic_b']['size'] > 104857600){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		
      }
	  else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "png" && $ex != "PNG" && $ex != "JPEG"){
      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		
      }
      else{      	
      move_uploaded_file($_FILES['pic_b']['tmp_name'], "club_logo/".$pic2);	
     
	  }	
	   $cmd=mysqli_query($con,"insert into tbl_club (club_id,name,logo,competition) values ('$nclub','".$_POST["tim_b_name"]."','$pic2','Liga Lainnya')");  
	  $tim_b=$nclub;
	  }
	  else{
		$tim_b=$_POST["tim_b"];
	  }
	  
	
	  
	  $publish_on=date("Y-m-d H:i:s",strtotime($_POST["publish_on"])); 
	  $cmd=mysqli_query($con,"insert into tbl_eyeticket (id_event,jadwal_pertandingan,tim_a,tim_b,price,stock,pic,thumb1) values 
	  ('".$_GET["id_event"]."','".$_POST["jadwal_pertandingan"]."','$tim_a','$tim_b','price','stock','pic','thumb1')");      
           header("refresh:0");
      
      }
      ?>	
	  <hr />
	  <div class="form-group text-center" id="t1"><h1>Tim A</h1></div>
	  <hr />
	  <div class="form-group text-left" id="t1">Select Tim A <select name="tim_a" class="selectpicker form-control" data-live-search="true">
		<?php
		echo ' <option data-tokens="add new club klub baru" value="">Add New Club</option>';
		$tim_a=mysqli_query($con,"SELECT * FROM tbl_club ORDER BY name ASC");
		while($ta=mysqli_fetch_array($tim_a))
		{
			echo ' <option data-tokens="'.$ta["name"].' '.$ta["nickname"].'" value="'.$ta["club_id"].'">'.$ta["name"].'</option>';
		}
		?>
	 
</select>
</div>

<div class="form-group text-left" id="t1">Or <br /> <br />Add Tim A <input type="text" name="tim_a_name" class="form-control" id="ipt1">
</div>
  <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic_a" class="form-control" id="set8"></div>
  <div class="form-group text-left" id="t1">Score Tim A <input type="text" name="score_a" value="0" class="form-control" id="ipt1"></div>
  <hr />
  <div class="form-group text-center" id="t1"><h1>Tim B</h1></div>
	  <hr />
	  <div class="form-group text-left" id="t1">Select Tim B <select name="tim_b" class="selectpicker form-control" data-live-search="true">
		<?php
		echo ' <option data-tokens="add new club klub baru" value="">Add New Club</option>';
		$tim_a=mysqli_query($con,"SELECT * FROM tbl_club ORDER BY name ASC");
		while($ta=mysqli_fetch_array($tim_a))
		{
			echo ' <option data-tokens="'.$ta["name"].' '.$ta["nickname"].'" value="'.$ta["club_id"].'">'.$ta["name"].'</option>';
		}
		?>
	 
</select>
</div>

<div class="form-group text-left" id="t1">Or <br /> <br />Add Tim B <input type="text" name="tim_b_name" class="form-control" id="ipt1">
</div>
  <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic_b" class="form-control" id="set8"></div>
   <div class="form-group text-left" id="t1">Score Tim B <input type="text" name="score_b" value="0" class="form-control" id="ipt1"></div>
  
  <hr />
	 	  
    <div class="form-group text-left" id="t1">Jadwal Pertandingan<input type="text" value="<?=date("Y-m-d H:i:s")?>" name="jadwal_pertandingan" class="form-control datetimepicker"/>
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
<th>Logo</th>
<th>Tim 1</th>
<th>Score</th>
<th>Logo</th>
<th>Tim 2</th>
<th>Jadwal Pertandingan</th>
<th>Aksi</th>	
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
$result=mysqli_query($con,"SELECT a.*,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.id_event='".$_GET["id_event"]."' order by jadwal_pertandingan desc");
while($data = mysqli_fetch_array($result))
{
$id_event=$data['id_event'];
print'<tr>
<td><img src="club_logo/'.$data["logo_a"].'" id="img4"></td>
<td>'.$data["club_a"].'</td>
<td>'.$data["score_a"].' - '.$data["score_b"].'</td>
<td><img src="club_logo/'.$data["logo_b"].'" id="img4"></td>
<td>'.$data["club_b"].'</td>
<td>'.date("d F Y H:i:s",strtotime($data["jadwal_pertandingan"])).'</td>
<td><a href="eyevent_jadwal_edit?admin_id='.$admin_id.'&id_jadwal_event='.$data["id_jadwal_event"].'&id_event='.$data["id_event"].'" class="btn" id="btn3">EDIT</a>&emsp;<a href="eyevent_jadwal_delete?admin_id='.$admin_id.'&id_event='.$data["id_event"].'&id_jadwal_event='.$data["id_jadwal_event"].'" class="btn" id="btn4">DELETE</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';
?>	
</div>
</div>
</div>

<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
<script src="<?=$base_url?>/bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=$base_url?>/bs/js/bootstrap.min.js"></script>	
<script src="<?=$base_url?>/bs/js/bootstrap-select.js"></script>	
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