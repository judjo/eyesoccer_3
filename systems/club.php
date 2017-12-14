<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];

//$count=0;
//$sql2="SELECT * FROM tbl_club WHERE active = 1";
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
<style>
	.remove-me,.add-more,.remove-me-timnas,.add-more-timnas,.remove-me-prestasi,.add-more-gallery,.remove-me-gallery,.add-more-lampiran,.remove-me-lampiran,.add-more-prestasi{
		float: right;
		margin-top: -35px;
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
<h1 id="t2"><i class="fa fa-futbol-o fa-lg"></i> KLUB</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_club">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">
</form>
</div>
</div>  
<!--
		<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"></span><img src="<?=$base_url?>/img/notification-icon.png" /></button>
				 <div id="notification-latest"></div>
				</div>			
		</div>
	<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
<br>	
-->
<div id="m1" class="modal fade" role="dialog">
<?php
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
else if($nclub>99 & $nclub<999){
$nclub="0".$nclub;
}else if($nclub>999)
{
$nclub=$nclub;
}
?>
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Tambah Klub</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
<?php
if(isset($_POST['opt1'])){
$name=$_POST['name'];
$nickname=$_POST['nickname'];
$establish_date=$_POST['establish_date'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$stadium=$_POST['stadium'];
$competition=$_POST['competition'];
$address=addslashes($_POST['address']);
$description=addslashes($_POST['description']);
$coach=$_POST['coach'];
$manager=$_POST['manager'];
$website=$_POST['website'];
$stadium_capacity=$_POST['stadium_capacity'];
$stadium_address=$_POST['stadium_address'];
$owner=$_POST['owner'];
$supporter_name=$_POST['supporter_name'];
$training_schedule=$_POST['training_schedule'];
$alumnus_name=$_POST['alumnus_name'];
$legalitas_pt=$_POST['legalitas_pt'];
$legalitas_kemenham=$_POST['legalitas_kemenham'];
$legalitas_npwp=$_POST['legalitas_npwp'];
$legalitas_dirut=$_POST['legalitas_dirut'];
if(!isset($_FILES['logo']['name']) || $_FILES['logo']['name']=="")
{

$logo="LOGO UNTUK APLIKASI.jpg";
}
//if(isset($_FILES['logo']['name']) && file_exists("club_logo/".$logo)){
//print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';   
//}  
//else{
$cmd=mysqli_query($con,"insert into tbl_club (club_id,id_liga,name,nickname,establish_date,phone,fax,email,stadium,competition,address,description,logo,IDProvinsi,IDKabupaten,coach,manager,website,stadium_capacity,stadium_address,owner,supporter_name,training_schedule,alumnus_name,legalitas_pt,legalitas_kemenham,legalitas_npwp,legalitas_dirut) values ('$nclub','".$_POST["id_liga"]."','$name','$nickname','$establish_date','$phone','$fax','$email','$stadium','$competition','$address','$description','$logo','".$_POST["IDProvinsi"]."','".$_POST["IDKabupaten"]."','".$coach."','".$manager."','".$website."','".$stadium_capacity."','".$stadium_address."','".$owner."','".$supporter_name."','".$training_schedule."','".$alumnus_name."','".$legalitas_pt."','".$legalitas_kemenham."','".$legalitas_npwp."','".$legalitas_dirut."')");

$last_id = mysqli_insert_id($con);
$karir_klub = $_POST['field'];
foreach( $karir_klub as $key => $n ) {
	$karir_klub[$key];
	if (!empty($karir_klub[$key])) {
		$pieces = explode("#", $karir_klub[$key]);
		$bulan = $pieces[0]; // bulan
		$tahun = $pieces[1]; // tahun
		$turnamen = $pieces[2]; // turnamen
		$peringkat = $pieces[3]; // peringkat
		$pelatih = $pieces[4]; // pelatih

		$cmd=mysqli_query($con,"insert into tbl_karir_klub (bulan,tahun,klub_id,turnamen,peringkat,pelatih,createon) values ('".$bulan."','".$tahun."','".$last_id."','".$turnamen."','".$peringkat."','".$pelatih."','".date('Y-m-d H:i:s')."')");
	}
}

if(isset($_FILES['gallery_klub'])){

	foreach($_FILES['gallery_klub']['tmp_name'] as $key => $tmp_name)
	{
		if(isset($_FILES['gallery_klub']['tmp_name']) && $_FILES['gallery_klub']['tmp_name']!="")
		{
			$gallery_klub=rand(10000,99999)."-".$_FILES['gallery_klub']['name'][$key];  
		}
		else{
			$gallery_klub="logo_player_2.png";  
		}
		$tags = "gallery pemain";
		move_uploaded_file($_FILES['gallery_klub']['tmp_name'][$key], "club_storage/".$gallery_klub);
		$cmd=mysqli_query($con,"insert into tbl_gallery(tags,pic,thumb1,klub_id,upload_date) values ('".$tags."','".$gallery_klub."','".$gallery_klub."','".$last_id."','".date('Y-m-d H:i:s')."')");
	}
}

if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']=="")
{
move_uploaded_file($_FILES['logo']['tmp_name'],"club_logo/".$logo);
}
header("refresh:0");
//}
}
?>    
<div class="form-group text-left" id="t1">Nama<input type="text" name="name" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Nama Panggilan<input type="text" name="nickname" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Provinsi
<select name="IDProvinsi" class="form-control provinsi_liga" id="ipt1"><option value="">Pilih Provinsi</option>
<?php
$provinsi=mysqli_query($con,"SELECT * FROM provinsi ORDER BY nama ASC");
//$prov=mysqli_fetch_array($provinsi);
//print_r($prov);
while($prov=mysqli_fetch_array($provinsi))
{ 
echo "<option value='".$prov["IDProvinsi"]."'>".$prov["Nama"]."</option>";
}?>
</select></div><div class="form-group text-left" id="t1">Kabupaten<select name="IDKabupaten" class="form-control kabupaten_liga" id="ipt1"><option value="">Pilih Kabupaten</option></select></div>
<div class="form-group text-left" id="t1">Tanggal Didirikan<input type="date" name="establish_date" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nomor Telepon<input type="text" name="phone" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Fax<input type="text" name="fax" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Email<input type="text" name="email" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Stadion<input type="text" name="stadium" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Kapasitas Stadion<input type="text" name="stadium_capacity" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Alamat Stadion<input type="text" name="stadium_address" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Tipe Kompetisi
<select class="form-control competition_name" name="competition" id="ipt1">
<?php
$cmd=mysqli_query($con,"select * from tbl_competitions");
while($row=mysqli_fetch_array($cmd)){
print '<option>'.$row['competition'].'</option>';  
}
?>
</select>  
</div>
<div class="form-group text-left" id="t1">Tipe Liga
<select class="form-control" name="id_liga" id="ipt1">
<option value="0" >Pilih Liga</option>
<?php
$cmd=mysqli_query($con,"select * from tbl_liga");
while($row=mysqli_fetch_array($cmd)){
print '<option value="'.$row["id_liga"].'">'.$row['nama_liga'].'</option>';  
}
?>
</select>  
</div>
<div class="form-group text-left" id="t1">Alamat<textarea name="address" class="form-control" maxlength="500" rows="5" id="set8"></textarea></div>
<div class="form-group text-left" id="t1">Deskripsi<textarea name="description" class="form-control" maxlength="500" rows="5" id="set8"></textarea></div>
<div class="form-group text-left" id="t1">Upload Logo<input type="file" name="logo" class="form-control" id="set8"></div>
<div class="form-group text-left" id="t1">Alamat Website<input type="text" name="website" class="form-control" id="ipt1"></div> 
<div class="form-group text-left" id="t1">Nama Pelatih<input type="text" name="coach" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nama Manager<input type="text" name="manager" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nama Suporter<input type="text" name="supporter_name" class="form-control" id="ipt1"></div>
<div id="liga_profesional">
	<div class="form-group text-left" id="t1">Nama Pemilik<input type="text" name="owner" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">Legalitas Perusahaan<input type="text" name="legalitas_pt" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">SK Kemenkumham<input type="text" name="legalitas_kemenham" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">NPWP<input type="text" name="legalitas_npwp" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">Nama Direktur<input type="text" name="legalitas_dirut" class="form-control" id="ipt1"></div>
</div>
<div id="liga_amatir">
	<div class="form-group text-left" id="t1">Jadwal Latihan<input type="text" name="training_schedule" class="form-control" id="ipt1" placeholder="contoh: Jumat 13:00-14:30 WIB"></div>
	<div class="form-group text-left" id="t1">Nama Alumnus<input type="text" name="alumnus_name" class="form-control" id="ipt1" placeholder="contoh: Joko, Arman, Anton"></div>
</div>
<div class="form-group text-left" id="t1">
	Prestasi Klub
	<input autocomplete="off" class="input form-control" id="field1" name="field[]" style="width: 94%;" type="text" placeholder="bulan#tahun#turnamen#peringkat#pelatih" data-items="8"><button id="b1" class="btn btn-success add-more" type="button">+</button>
	<div style="font-size:10px;color:red;font-weight:bold">
	contoh: FEBRUARI#2017#PERSIJA#LIGA INDONESIA 1#JUARA 1#AANG SUHENDAR<br>
	TOTAL 5 HASHTAG(#)
	</div>
</div>

<div class="form-group text-left" id="t1">Gallery
	<input type="file" name="gallery_klub[]" class="form-control" id="gallery_klub1" accept="image/*">
	<button id="b1" class="btn btn-success add-more-gallery" type="button">+</button>
</div>

<div class="form-group text-right"><input type="submit" name="opt1" value="SAVE" class="btn" id="btn1"></div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="table table-responsive">
<table class="table table-hover datatables">
<thead>
<th>No</th>
<th>Image</th>
<th>Club Name</th>
<th>Establish Date</th>
<!--<th>Total Player</th>
<th>Total Official</th>-->
<th>Last Update</th>
<th>Status</th>
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
// $result=mysqli_query($con,"SELECT a.*,b.username FROM tbl_club a LEFT JOIN tbl_users b ON b.user_id=a.user_id order by club_id desc");
// $result=mysqli_query($con,"SELECT a.*,b.username,count(c.player_id) as jumlah_pemain,count(d.official_id) as jumlah_official
// FROM tbl_club a 
// LEFT JOIN tbl_users b ON b.user_id=a.user_id 
// left join tbl_player c on c.club_id=a.club_id
// left join tbl_official_team d on d.club_now=a.club_id
// group by a.club_id
// order by a.club_id desc");
$result=mysqli_query($con,"SELECT a.*,b.username
FROM tbl_club a 
LEFT JOIN tbl_users b ON b.user_id=a.user_id 
order by a.club_id desc");
$i=1;
while($data = mysqli_fetch_array($result))
{
$club_id=$data['club_id'];  
$name=$data['name'];
$establish_date=$data['establish_date'];

$logo=$data['logo'];
// $total_player=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_player WHERE club_id='".$club_id."'"));
/* $total_player=$data["jumlah_pemain"];
$total_official=$data["jumlah_official"]; */
// $total_official=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_official_team WHERE club_now='".$club_id."'"));
if(!strstr($logo, ".")) {
	$logo='LOGO UNTUK APLIKASI.jpg';
}
print'<tr>
<td>'.$i.'</td>
<td><img src="club_logo/'.$logo.'" id="img4"></td>
<td>'.$name.'<br /><small>'.$data["username"].'</small></td>
<td>'.$establish_date.'</td>
<td>'.$data["last_update"].'</td>
<td>'; if($data['active']==1){print '<a href="status?club_id='.$club_id.'" class="btn btn-success btn-sm">Active</a>';}else{print '<a href="status?club_id='.$club_id.'" class="btn btn-danger btn-sm">Deactive</a>';} print '</a></td>
<td>

	<a href="club_player?admin_id='.$admin_id.'&club_id='.$club_id.'" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
	&emsp;<a class="btn btn-danger" onclick=\'if(confirm("Apa anda yakin untuk menghapus ?")) window.location = "club_delete?admin_id='.$admin_id.'&club_id='.$club_id.'"\'><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
</td>
</tr>';
$i++;
}/*
print'</tbody></table></div><br><br>';
$query=mysqli_query($con,"SELECT * FROM tbl_club where club_id order by club_id desc");
$hasil=mysqli_num_rows($query);
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='club?page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='club?page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='club?page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>"; */  
?>  
</tbody></table></div><br><br>
</div>
</div>
</div>

<input type = "hidden" class="total_club" value="<?php echo $_SESSION['total_club'] ?>">

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
		total_club=$(".total_club").val();
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			data: { 'total_club': total_club},  
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 function cek_notif(){
		 total_club=$(".total_club").val();
		
		 $.ajax({
			url: "cek_notification.php",
			type: "POST",
			success: function(data){
				//alert(data);
				//alert(total_club);
				if(data>total_club)
				{
					last_club=data-total_club;
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
	var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field[]" style="width: 94%;" type="text" placeholder="bulan#tahun#juara turnamen#pelatih">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
	
	var nextgallery = 1;
    $(".add-more-gallery").click(function(e){
        e.preventDefault();
        var addto = "#gallery_klub" + nextgallery;
        var addRemove = "#gallery_klub" + (nextgallery);
        nextgallery = nextgallery + 1;
        var newIn = '<input type="file" class="form-control" id="gallery_klub' + nextgallery + '" name="gallery_klub[]">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextgallery - 1) + '" class="btn btn-danger remove-me-gallery" >-</button></div><div id="gallery_klub">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#gallery_klub" + nextgallery).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextgallery);  
        
            $('.remove-me-gallery').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#gallery_klub" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

} );
$(function(){
	$(".datetimepicker").datetimepicker();
	
})
</script>
<script>
$(function(){   
 $("body").on("change",".provinsi_liga",function(){   liga_id=$(this).val();      $.ajax({        type: "POST",       data: { 'liga_id': liga_id},        url: "<?=$base_url?>/getKabupaten2.php",        dataType: "json",       success:function(data){           $(".kabupaten_liga").fadeOut("fast", function(){            $(".kabupaten_liga").empty().html(data.html1);            $(".kabupaten_liga").fadeIn("fast");          });       }     }); })})
 
function displayVals() {
  var singleValues = $( ".competition_name" ).val();
  if(singleValues == "Liga Indonesia 1" || singleValues == "Liga Indonesia 2"){
	$("#liga_profesional").show();
	$("#liga_amatir").hide();
  }else{
	$("#liga_amatir").show();
	$("#liga_profesional").hide();
  }
}
 
$( ".competition_name" ).change( displayVals );
</script>
</body>
</html>