<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];

$count=0;
$sql2="SELECT * FROM tbl_member WHERE active = 1";
$result=mysqli_query($con, $sql2);
$count=mysqli_num_rows($result);
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
<link rel="stylesheet" href="<?=$base_url?>/bs/css/notification-style.css" type="text/css">
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-users"></i> List Users</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_category_product">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">
</form>
</div>
</div>  

<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"></span><img src="<?=$base_url?>/img/notification-icon.png" /></button>
				 <div id="notification-latest"></div>
				</div>			
		</div>
	<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
<br>

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">List Users</h1></div>
      <div class="modal-body">

      </div>
    </div>

    
  </div>
</div>

<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>Nickname</th>
<th>Nama Lengkap</th>
<th>Email</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_member where id_member order by id_member asc");
while($data = mysqli_fetch_array($result))
{
$id_member=$data['id_member'];  
$name=$data['name'];
$fullname=$data['fullname'];
$email=$data['email'];
print'<tr>
<td>'.$name.'</td>
<td>'.$fullname.'</td>
<td>'.$email.'</td>
<td><a href="listusers_edit?admin_id='.$admin_id.'&id_member='.$id_member.'" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>&emsp;<a href="listusers_delete?admin_id='.$admin_id.'&id_member='.$id_member.'" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a> <a href="listusers_view?admin_id='.$admin_id.'&id_member='.$id_member.'" class="btn btn-success"> View</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';
?>  
</div>
</div>
</div>

<input type = "hidden" class="total_member" value="<?php echo $_SESSION['total_member'] ?>">

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

<script type="text/javascript">

	function myFunction() {
		total_member=$(".total_member").val();
		$.ajax({
			url: "view_notification_listusers.php",
			type: "POST",
			data: { 'total_member': total_member},  
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 function cek_notif(){
		 total_member=$(".total_member").val();
		
		 $.ajax({
			url: "cek_notification_listusers.php",
			type: "POST",
			success: function(data){
				//alert(data);
				//alert(total_member);
				if(data>total_member)
				{
					last_member=data-total_member;
					$("#notification-count").empty().html(last_member);
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
</body>
</html>