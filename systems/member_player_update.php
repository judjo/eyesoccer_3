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
<script type="text/javascript" src="tiny_mce/jquery.tinymce.js"></script>

</head>
<body>
<div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
		</div>
		<div class="modal-body">
		  <img src="" class="enlargeImageModalSource" style="width: 100%;">
		</div>
	  </div>
	</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> MEMBER PLAYER</h1>
<hr></hr>

<div class="table table-responsive ">
<table class="table table-hover table-striped table-bordered datatables">
<thead>
<th>Member Name</th>
<th>Player Name</th>
<th>Update Page</th>
<th>Create On</th>
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
$result=mysqli_query($con,"SELECT a.player_id,b.id_member_player,c.name as player_name,a.name as member_name,a.inserton,c.id_member,a.newinsert,c.email as email_member
FROM tbl_tmp_player a 
left join tbl_member_player b on b.id_player=a.player_id
left join tbl_member c on c.id_member=b.id_member
left join tbl_player d on d.player_id=a.player_id where a.newinsert=1 order by a.id desc");
while($data = mysqli_fetch_array($result))
{
$id_player=$data['player_id'];
$id_member_player=$data['id_member_player'];
$member_name=$data['member_name'];
$player_name=$data['player_name'];
$inserton=$data['inserton'];
$id_member=$data['id_member'];
$$newinsert=$data['newinsert'];
$email_member=$data['email_member'];
if($newinsert==1){
	$newinsert="Verified";
	$updatepage='';
}else{
	$newinsert="";
	$updatepage='<a target="_blank" href="../eyeprofile/update_pemain?admineye=1&id_member='.$id_member.'&player_id='.$id_player.'">Update Page</a>';
}
print'<tr>
<td>'.$member_name.'</td>
<td><a target="_blank" href="../eyeprofile/update_pemain/'.$id_player.'">'.$player_name.'</a></td>
<td>'.$updatepage.'</td>
<td>'.$inserton.'</td>
<td><a onclick=\'if(confirm("Apa anda yakin untuk approve ?")) window.location = "member_player_updateprof?admin_id='.$admin_id.'&id_member_player='.$id_member_player.'&email_member='.$email_member.'&member_name='.$member_name.'&id_player='.$id_player.'&id_member='.$id_member.'"\' class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
<a onclick=\'if(confirm("Apa anda yakin untuk me-reject ?")) window.location = "member_player_rejectprof?admin_id='.$admin_id.'&id_member_player='.$id_member_player.'&email_member='.$email_member.'&member_name='.$member_name.'&id_player='.$id_player.'&id_member='.$id_member.'"\' class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
</td>
</tr>';
}
print'</tbody></table>';
?>
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
  
} );
$(function(){

	$(".datetimepicker").datetimepicker({
		 format: 'Y-m-d H:i:s'
	});
	$('.datatables').DataTable();
	$('.img-player-click').on('click', function() {
		$('.enlargeImageModalSource').attr('src', $(this).attr('src'));
		$('#enlargeImageModal').modal('show');
	});
	
})
</script>
</body>
</html>