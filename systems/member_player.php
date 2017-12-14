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
<th>Pict KTP</th>
<th>Pict Akte</th>
<th>Pict KK</th>
<th>Pict Passport</th>
<th>Pict Ijazah</th>
<th>Pict Buku Rek.</th>
<th>Pict Srt. Rek SSB</th>
<th>Ibu Kandung</th>
<th>Create On</th>
<th>Status</th>
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
$result=mysqli_query($con,"SELECT d.email as email_member,a.id_member_player,a.id_player,b.club_id,d.id_member,a.file_ktp,a.file_akte,a.file_kk,a.file_passport,a.file_ijazah,a.file_bukurek,a.file_srtrekssb,a.file_ibukandung,b.name as player_name,c.name as club_name,d.name as member_name,a.add_date,a.active FROM tbl_member_player a left join tbl_player b on b.player_id=a.id_player left join tbl_club c on c.club_id=b.club_id left join tbl_member d on d.id_member=a.id_member");
while($data = mysqli_fetch_array($result))
{
$id_player=$data['id_player'];
$member_name=$data['member_name'];
$player_name=$data['player_name'];
$id_member_player=$data['id_member_player'];
$email_member=$data['email_member'];
$id_member=$data['id_member'];
$active=$data['active'];
if(!empty($data['file_ktp'])){
	$file_ktp='<img class="img-player-click" src="../'.$data['file_ktp'].'" id="img4" style="cursor:pointer;">';
}else{
	$file_ktp="";
}
if(!empty($data['file_akte'])){
	$file_akte='<img class="img-player-click" src="../'.$data['file_akte'].'" id="img4" style="cursor:pointer;">';
}else{
	$file_akte="";
}
if(!empty($data['file_kk'])){
	$file_kk='<img class="img-player-click" src="../'.$data['file_kk'].'" id="img4" style="cursor:pointer;">';
}else{
	$file_kk="";
}
if(!empty($data['file_passport'])){
	$file_passport='<img class="img-player-click" src="../'.$data['file_passport'].'" id="img4" style="cursor:pointer;">';
}else{
	$file_passport="";
}
if(!empty($data['file_ijazah'])){
	$file_ijazah='<img class="img-player-click" src="../'.$data['file_ijazah'].'" id="img4" style="cursor:pointer;">';
}else{
	$file_ijazah="";
}
if(!empty($data['file_bukurek'])){
	$file_bukurek='<img class="img-player-click" src="../'.$data['file_bukurek'].'" id="img4" style="cursor:pointer;">';
}else{
	$file_bukurek="";
}
if(!empty($data['file_srtrekssb'])){
	$file_srtrekssb='<img class="img-player-click" src="../'.$data['file_srtrekssb'].'" id="img4">';
}else{
	$file_srtrekssb="";
}
if($active==1){
	$status_member="Terdaftar";
}else{
	$status_member="";
}
$file_ibukandung=$data['file_ibukandung'];
$add_date=$data['add_date'];
print'<tr>
<td>'.$member_name.'</td>
<td><a target="_blank" href="../eyeprofile/pemain_detail/'.$id_player.'">'.$player_name.'</a></td>
<td>'.$file_ktp.'</td>
<td>'.$file_akte.'</td>
<td>'.$file_kk.'</td>
<td>'.$file_passport.'</td>
<td>'.$file_ijazah.'</td>
<td>'.$file_bukurek.'</td>
<td>'.$file_srtrekssb.'</td>
<td>'.$file_ibukandung.'</td>
<td>'.$add_date.'</td>
<td><b>'.$status_member.'</b></td>
';
if($active==1){
	print'
	<td>
	<a onclick=\'if(confirm("Apa anda yakin untuk me-reject ?")) window.location = "member_player_delete?admin_id='.$admin_id.'&id_member_player='.$id_member_player.'&email_member='.$email_member.'&member_name='.$member_name.'&id_player='.$id_player.'&id_member='.$id_member.'"\' class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
	</td>
	</tr>';
}else{
	print'
	<td><a onclick=\'if(confirm("Apa anda yakin untuk approve ?")) window.location = "member_player_approve?admin_id='.$admin_id.'&id_member_player='.$id_member_player.'&email_member='.$email_member.'&member_name='.$member_name.'&id_player='.$id_player.'&id_member='.$id_member.'"\' class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
	<a onclick=\'if(confirm("Apa anda yakin untuk me-reject ?")) window.location = "member_player_delete?admin_id='.$admin_id.'&id_member_player='.$id_member_player.'&email_member='.$email_member.'&member_name='.$member_name.'"\' class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
	</td>
	</tr>';
}

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