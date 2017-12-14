<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_GET['admin_id'];

$club_id=$_GET['club_id'];

$cmd=mysqli_query($con,"select a.*,b.Nama as nama_provinsi,c.Nama as nama_kabupaten 
from tbl_club a 
LEFT JOIN provinsi b ON b.IDProvinsi=a.IDProvinsi 
LEFT JOIN kabupaten c ON c.IDKabupaten=a.IDKabupaten
where club_id='$club_id'");

$total_official=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_official_team WHERE club_now='".$club_id."'"));
$total_player=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_player WHERE club_id='".$club_id."'"));

$row=mysqli_fetch_array($cmd);

$_SESSION['admin_id']; 

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
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/bootstrap-slider.css">
<style>
	.remove-me,.add-more,.remove-me-timnas,.add-more-timnas,.remove-me-prestasi,.add-more-gallery,.remove-me-gallery,.add-more-galleryklub,.remove-me-galleryklub,.add-more-lampiran,.remove-me-lampiran,.add-more-prestasi{
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
<div class="col-lg-10 col-md-10"><br>
<h1 id="t2"><i class="fa fa-futbol-o fa-lg"></i> CLUB & PLAYER</h1>
<hr></hr>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#club">CLUB</a></li>
    <li><a data-toggle="tab" href="#player"><?php echo $total_player?>&nbsp;PLAYER</a></li>
    <li><a data-toggle="tab" href="#official"><?php echo $total_official?>&nbsp;OFFICIAL</a></li>
    <li><a data-toggle="tab" href="#statistik">STATISTIK</a></li>  
  </ul>

  <div class="tab-content">
    <div id="club" class="tab-pane fade in active"><br>
<?php
if(isset($_POST['opt1'])){
	$name=$_POST['name'];
	$nickname=$_POST['nickname'];
	$IDProvinsi=$_POST['IDProvinsi'];
	$IDKabupaten=$_POST['IDKabupaten'];
	$establish_date=$_POST['establish_date'];
	$phone=$_POST['phone'];
	$fax=$_POST['fax'];
	$email=$_POST['email'];
	$stadium=$_POST['stadium'];
	$competition=$_POST['competition'];
	$address=addslashes($_POST['address']);
	$description=addslashes($_POST['description']);
	$image_name=rand("1000","9999");
	$_FILES['logo']['name']=$image_name.$_FILES['logo']['name'];
	$logo=$_FILES['logo']['name'];
	
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
			$cmd=mysqli_query($con,"insert into tbl_gallery(tags,pic,thumb1,klub_id,upload_date) values ('".$tags."','".$gallery_klub."','".$gallery_klub."','".$club_id."','".date('Y-m-d H:i:s')."')");
		}
	}
	
	if(empty($logo) || !isset($_FILES['logo']['tmp_name']) || $_FILES['logo']['tmp_name']==""){
		$cmd=mysqli_query($con,"update tbl_club set name='$name',id_liga='".$_POST["id_liga"]."',nickname='$nickname',establish_date='$establish_date',phone='$phone',fax='$fax',email='$email',stadium='$stadium',competition='$competition',address='$address',description='$description',IDProvinsi='".$_POST["IDProvinsi"]."',IDKabupaten='".$_POST["IDKabupaten"]."' where club_id='$club_id'");
		header("refresh:0");
	}
	else{
		if(file_exists("club_logo/".$logo)){
			print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Oppss.. Nama Gambar/Photo/Logo sudah ada !. Silakan ganti nama gambar/photo/logo Anda!</div></div>';   
		}
		else{   
			$cmd=mysqli_query($con,"update tbl_club set name='$name',nickname='$nickname', IDProvinsi='".$_POST["IDProvinsi"]."',IDKabupaten='".$_POST["IDKabupaten"]."',establish_date='$establish_date',phone='$phone',fax='$fax',email='$email',stadium='$stadium',competition='$competition',address='$address',description='$description',logo='$logo' where club_id='$club_id'");
			move_uploaded_file($_FILES['logo']['tmp_name'],"club_logo/".$logo);
			header("refresh:0");
		}
	}
}


if(!strstr($row['logo'], ".")) {
	$row['logo']='LOGO UNTUK APLIKASI.jpg';
}
?>    
<form method="post" enctype="multipart/form-data"><br>

<img src="club_logo/<?php print $row['logo']; ?>" id="img10"><br><br>
<div class="form-group text-left" id="t1">Nama Club<input type="text" name="name" value="<?php print $row['name']; ?>" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Nama Panggilan<input type="text" name="nickname" value="<?php print $row['nickname']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Provinsi
<select name="IDProvinsi" class="form-control provinsi_liga" id="ipt1"><option value="">Pilih Provinsi</option>

<?php
if($row["nama_provinsi"]!="")
{
echo "<option value='".$row["IDProvinsi"]."' selected>".$row["nama_provinsi"]."</option>";
}
$provinsi=mysqli_query($con,"SELECT * FROM provinsi ORDER BY Nama ASC");
//$prov=mysqli_fetch_array($provinsi);
while($prov=mysqli_fetch_array($provinsi))
{
  echo "<option value='".$prov["IDProvinsi"]."'>".$prov["Nama"]."</option>";
}
?>
</select></div>
<div class="form-group text-left" id="t1">Kabupaten<select name="IDKabupaten" class="form-control kabupaten_liga" id="ipt1">
<?php
if($row["nama_kabupaten"]!="")
{
echo "<option value='".$row["IDKabupaten"]."' selected>".$row["nama_kabupaten"]."</option>";
}
else{
  ?>
  
<option value="">Pilih Kabupaten</option><?php
}
?>
</select></div>

<div class="form-group text-left" id="t1">Tanggal Didirikan<input type="text" name="establish_date" value="<?php print $row['establish_date']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nomor Telepon<input type="text" name="phone" value="<?php print $row['phone']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Fax<input type="text" name="fax" value="<?php print $row['fax']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Email<input type="text" name="email" value="<?php print $row['email']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Stadion<input type="text" name="stadium" value="<?php print $row['stadium']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Tipe Kompetisi
<select class="form-control competition_name" name="competition" id="ipt1">
<?php
$cmd1=mysqli_query($con,"select * from tbl_competitions");
while($row1=mysqli_fetch_array($cmd1)){
print '<option'; if($row['competition']==$row1['competition']){print " selected";}else{print "";} print'>'.$row1['competition'].'</option>';  
}
if($row["competition"]=="Liga Lainnya" || $row["competition"]=="Liga International" )
{
	$selected="selected";
}
?>
<option value="Liga International" <?=$selected?>>Liga International</option>
</select>  
</div>

<div class="form-group text-left" id="t1">Tipe Liga
<select class="form-control" name="id_liga" id="ipt1">
<option value="0">Pilih Liga</option>
<?php
$cmd1=mysqli_query($con,"select * from tbl_liga");
while($row1=mysqli_fetch_array($cmd1)){
print '<option value="'.$row1["id_liga"].'"'; if($row['id_liga']==$row1['id_liga']){print " selected";}else{print "";} print'>'.$row1['nama_liga'].'</option>';  
}
?>
</select>  
</div>
<div class="form-group text-left" id="t1">Alamat<textarea name="address" class="form-control" maxlength="500" rows="5" id="set8"><?php print $row['address']; ?></textarea></div>
<div class="form-group text-left" id="t1">Deskripsi<textarea name="description" class="form-control" maxlength="500" rows="5" id="set8"><?php print $row['description']; ?></textarea></div>
<div class="form-group text-left" id="t1">Upload Logo<input type="file" name="logo" class="form-control" id="set8"></div>
<div class="form-group text-left" id="t1">Alamat Website<input type="text" name="website" value="<?php print $row['website']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nama Pelatih<input type="text" name="coach" value="<?php print $row['coach']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nama Manager<input type="text" name="manager" value="<?php print $row['manager']; ?>" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Nama Suporter<input type="text" name="supporter_name" value="<?php print $row['supporter_name']; ?>" class="form-control" id="ipt1"></div>

<div id="liga_profesional">
	<div class="form-group text-left" id="t1">Nama Pemilik<input type="text" name="owner" value="<?php print $row['owner']; ?>" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">Legalitas Perusahaan<input type="text" name="legalitas_pt" value="<?php print $row['legalitas_pt']; ?>" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">SK Kemenkumham<input type="text" name="legalitas_kemenham" value="<?php print $row['legalitas_kemenham']; ?>" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">NPWP<input type="text" name="legalitas_npwp" value="<?php print $row['legalitas_npwp']; ?>" class="form-control" id="ipt1"></div>
	<div class="form-group text-left" id="t1">Nama Direktur<input type="text" name="legalitas_dirut" value="<?php print $row['legalitas_dirut']; ?>" class="form-control" id="ipt1"></div>
</div>
<div id="liga_amatir">
	<div class="form-group text-left" id="t1">Jadwal Latihan<input type="text" name="training_schedule" value="<?php print $row['training_schedule']; ?>" class="form-control" id="ipt1" placeholder="contoh: Jumat 13:00-14:30 WIB"></div>
	<div class="form-group text-left" id="t1">Nama Alumnus<input type="text" name="alumnus_name" value="<?php print $row['alumnus_name']; ?>" class="form-control" id="ipt1" placeholder="contoh: Joko, Arman, Anton"></div>
</div>
<div class="form-group text-left" id="t1">
Prestasi Klub<br>
<a href='<?=$base_url."/systems/karir_klub_add?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."&jenis=timnas#player";?>' class="btn btn-success">ADD</a>
<table class="table table-hover datatables">
<thead id="">
<th>Bulan</th>
<th>Tahun</th>
<th>Turnamen/Kompetisi</th>
<th>Peringkat/Juara</th>
<th>Pelatih</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_karir_klub where klub_id='$club_id'");
while($data = mysqli_fetch_array($result))
{
$bulan_pc=$data['bulan'];  
$tahun_pc=$data['tahun'];
$turnamen_pc=$data['turnamen'];
$peringkat_pc=$data['peringkat'];
$perlatih_pc=$data['pelatih'];
$karir_klub_id=$data['karir_klub_id'];
print'<tr>
<td>'.$bulan_pc.'</td>
<td>'.$tahun_pc.'</td>
<td>'.$turnamen_pc.'</td>
<td>'.$peringkat_pc.'</td>
<td>'.$perlatih_pc.'</td>
<td><a href="karir_klub_edit?admin_id='.$admin_id.'&karir_klub_id='.$karir_klub_id.'&club_id='.$club_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="karir_klub_delete?admin_id='.$admin_id.'&club_id='.$club_id.'&karir_klub_id='.$karir_klub_id.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
}         
?>
</tbody></table>
</div>

<div class="form-group text-left" id="t1">
Gallery<br>
<div class="col-lg-6 col-md-6">
<input type="file" name="gallery_klub[]" class="form-control" id="gallery_klub1" accept="image/*">
<button id="b1" class="btn btn-success add-more-galleryklub" type="button">+</button>
</div><br><br>
<table class="table table-hover datatables">
<thead id="">
<th>Picture</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_gallery where klub_id='$club_id'");
while($data = mysqli_fetch_array($result))
{
$thumb1=$data['thumb1'];
$pic=$data['karir_klub_id'];
$id_gallery=$data['id_gallery'];
print'<tr>
<td><img src="club_storage/'.$thumb1.'" style="width:100px;"></td>
<td><a href="gallery_klub_edit?admin_id='.$admin_id.'&id_gallery='.$id_gallery.'&club_id='.$club_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="gallery_klub_delete?admin_id='.$admin_id.'&id_gallery='.$id_gallery.'&club_id='.$club_id.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
}         
?>
</tbody></table>
</div>

<div class="form-group text-right"><input type="submit" name="opt1" value="UPDATE" class="btn" id="btn1"></div>     
    </form>
    </div>
    <div id="player" class="tab-pane fade"><br>
<div class="row form-group">
<div class="col-lg-3 col-md-3"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-9 col-md-9"></div>
</div>


<div class="">
<table class="table table-hover datatables">
<thead id="">
<th>Photo</th>
<th>Nama</th>
<th>Posisi 1</th>
<th>Posisi 2</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_player where club_id='$club_id' order by club_id desc");
while($data = mysqli_fetch_array($result))
{
$player_id=$data['player_id'];  
$name=$data['name'];
$position=$data['position'];
$position_2=$data['position_2'];
$pic=$data['pic'];
if(!strstr($pic, ".")) {
	$pic='logo_player_2.png';
}
print'<tr>
<td><img src="player_storage/'.$pic.'" class="img img-responsive" id="img10"></td>
<td>'.$name.'</td>
<td>'.$position.'</td>
<td>'.$position_2.'</td>
<td><a href="player_edit?admin_id='.$admin_id.'&player_id='.$player_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="player_delete?admin_id='.$admin_id.'&player_id='.$player_id.'&club_id='.$club_id.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
}
/*
print'</tbody></table></div><br><br>';
$query=mysqli_query($con,"SELECT * FROM tbl_player where club_id='$club_id' order by club_id desc");
$hasil=mysqli_num_rows($query);
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='club_player?club_id=$club_id&page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='club_player?club_id=$club_id&page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='club_player?club_id=$club_id&page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>";  */ 
?>
</tbody></table></div><br><br>  
</div>
<div id="official" class="tab-pane fade"><br>
<div class="row form-group">
<div class="col-lg-3 col-md-3"><a data-toggle="modal" data-target="#m2" class="btn" id="btn5">ADD OFFICIAL</a></div>
<div class="col-lg-9 col-md-9"></div>
</div>


<div class="table table-responsive">
<table class="table table-hover datatables">
<thead>
<th>Photo</th>
<th>Nama</th>
<th>Posisi</th>
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
$result=mysqli_query($con,"SELECT * FROM tbl_official_team where club_now='$club_id' order by name asc ");
while($data = mysqli_fetch_array($result))
{
$official_id=$data['official_id'];  
$name=$data['name'];
$position=$data['position'];
$pic=$data['official_photo'];
print'<tr>
<td><img src="player_storage/'.$pic.'" class="img img-responsive" id="img10"></td>
<td>'.$name.'</td>
<td>'.$position.'</td>
<td><a href="official_edit?admin_id='.$admin_id.'&official_id='.$official_id.'&club_id='.$club_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="official_delete?admin_id='.$admin_id.'&official_id='.$official_id.'&club_id='.$club_id.'" class="btn" id="btn4" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\')">DELETE</a></td>
</tr>';
}
/*
print'</tbody></table></div><br><br>';
$query=mysqli_query($con,"SELECT * FROM tbl_player where club_id='$club_id' order by club_id desc");
$hasil=mysqli_num_rows($query);
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='club_player?club_id=$club_id&page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='club_player?club_id=$club_id&page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='club_player?club_id=$club_id&page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>";  */ 
?>  
</tbody>
</table>
</div>
    </div>
 <div id="statistik" class="tab-pane fade"><br>
<?php
$get=mysqli_query($con,"SELECT * FROM tbl_statistik WHERE id_club='".$club_id."'");
   
if(isset($_POST['opt5'])){

	$i=0;
   foreach($_POST as $key => $val)
   {
	   if($key!="opt5")
	   {
	   $input[$i]=$key."='".$val."'";
	   $i++;
	   }
	   
   }
   $myinput=join(",",$input);
   if(mysqli_num_rows($get)>0)
   {
	   mysqli_query($con,"UPDATE tbl_statistik SET ".$myinput." WHERE id_club='".$club_id."'");
   }
   else{
	   mysqli_query($con,"INSERT INTO tbl_statistik SET ".$myinput.",id_club='".$club_id."'");
   }
   //echo "INSERT INTO tbl_statistik SET ".$myinput.",id_club='".$club_id."'";
   //exit;
	header("refresh:0");
}

$row=mysqli_fetch_array($get);
if(!strstr($row['logo'], ".")) {
	$row['logo']='LOGO UNTUK APLIKASI.jpg';
}

?>    
<form method="post" enctype="multipart/form-data"><br>
<div class="form-group text-left col-lg-6" id="t1">Jumlah Pertandingan<input type="text" name="jumlah_pertandingan" class="form-control" id="ipt1" value="<?php if(!isset($row["jumlah_pertandingan"])){ echo "0";}else{ echo $row["jumlah_pertandingan"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Menang<input type="text" name="menang" class="form-control" id="ipt1" value="<?php if(!isset($row["menang"])){ echo "0";}else{ echo $row["menang"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Kalah<input type="text" name="kalah" class="form-control" id="ipt1" value="<?php if(!isset($row["kalah"])){ echo "0";}else{ echo $row["kalah"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Imbang<input type="text" name="imbang" class="form-control" id="ipt1" value="<?php if(!isset($row["imbang"])){ echo "0";}else{ echo $row["imbang"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Gol<input type="text" name="gol" class="form-control" id="ipt1" value="<?php if(!isset($row["gol"])){ echo "0";}else{ echo $row["gol"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Kemasukan<input type="text" name="kemasukan" class="form-control" id="ipt1" value="<?php if(!isset($row["kemasukan"])){ echo "0";}else{ echo $row["kemasukan"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Clean Set<input type="text" name="clean_set" class="form-control" id="ipt1" value="<?php if(!isset($row["clean_set"])){ echo "0";}else{ echo $row["clean_set"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Shoot On Target<input type="text" name="shoot_on_target" class="form-control" id="ipt1" value="<?php if(!isset($row["shoot_on_target"])){ echo "0";}else{ echo $row["shoot_on_target"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Shoot Off Target<input type="text" name="shoot_off_target" class="form-control" id="ipt1" value="<?php if(!isset($row["shoot_off_target"])){ echo "0";}else{ echo $row["shoot_off_target"];}?>"></div>
<div class="form-group text-left col-lg-6" id="t1">Kartu Kuning<input type="text" name="kartu_kuning" class="form-control" id="ipt1" value="<?php if(!isset($row["kartu_kuning"])){ echo "0";}else{ echo $row["kartu_kuning"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Kartu Merah<input type="text" name="kartu_merah" class="form-control" id="ipt1" value="<?php if(!isset($row["kartu_merah"])){ echo "0";}else{ echo $row["kartu_merah"];}?>"></div>

<div class="form-group text-left col-lg-6" id="t1">Penonton di Kandang<input type="text" name="penonton_di_kandang" class="form-control" id="ipt1" value="<?php if(!isset($row["penonton_di_kandang"])){ echo "0";}else{ 
echo $row["penonton_di_kandang"];
}?>"></div>

<div class="form-group text-right"><input type="submit" name="opt5" value="UPDATE" class="btn" id="btn1"></div>     
    </form>
    </div>
       
</div>
</div>





<!-- MODAL -->
<!--start player-->
<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Player</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <div class="form-group text-left" id="t1">Nama<input type="text" name="name" class="form-control" id="ipt1"></div>
	  <div class="form-group text-left" id="t1">Nama Panggilan<input type="text" name="name_panggil" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Upload Photo/Logo <input type="file" name="pic" class="form-control" id="set8"></div>
    <div class="form-group text-left" id="t1">Deskripsi<textarea name="description" class="form-control" maxlength="500" rows="5" id="set8"></textarea></div>
    <div class="form-group text-left">
    <div class="row">
    <div class="col-lg-6 col-md-6" id="t1">Tempat lahir<input type="text" name="birth_place" class="form-control" id="ipt1"></div>
    <div class="col-lg-6 col-md-6" id="t1">Tanggal lahir<input type="text" name="birth_date" class="form-control" id="ipt1"></div>      
    <div class="col-lg-6 col-md-6" id="t1">No Hp<input type="text" name="no_hp" class="form-control" id="ipt1"></div>
    <div class="col-lg-6 col-md-6" id="t1">Email<input type="text" name="email" class="form-control" id="ipt1"></div>         
    </div>
    </div>
    <div class="form-group text-left">
    <div class="row">
    <div class="col-lg-6 col-md-6" id="t1">Tinggi<input type="text" name="height" class="form-control" id="ipt1"></div>
    <div class="col-lg-6 col-md-6" id="t1">Berat<input type="text" name="weight" class="form-control" id="ipt1"></div>      
    </div>
    </div>
    <div class="form-group text-left" id="t1">Negara<input type="text" name="nationality" class="form-control" id="ipt1"></div>
    <div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6" id="t1">Posisi 1
    <select name="position" class="form-control" id="ipt1">
    <?php
    $cmd2=mysqli_query($con,"select * from tbl_player_position");
    while($row2=mysqli_fetch_array($cmd2)){
    print '<option>'.$row2['position'].'</option>';  
    }
    ?>  
    </select> 
    </div>
	<div class="col-lg-6 col-md-6" id="t1">Posisi 2
    <select name="position_2" class="form-control" id="ipt1">
	<option value="">--Select Posisi ke 2--</option>
    <?php
    $cmd3=mysqli_query($con,"select * from tbl_player_position");
    while($row3=mysqli_fetch_array($cmd3)){
    print '<option>'.$row3['position'].'</option>';  
    }
    ?>  
    </select> 
    </div>
    <div class="col-lg-6 col-md-6" id="t1">No Punggung<input type="text" name="number" class="form-control" id="ipt1"></div>
	<div class="col-lg-6 col-md-6" id="t1">Kemampuan Kaki
	<select name="foot" class="form-control" id="ipt1">
		<option value="kaki kanan">Kaki Kanan</option>
		<option value="kaki kiri">Kaki Kiri</option>
		<option value="kaki kanan dan kiri">Kaki Kanan dan Kiri</option>
    </select>
	</div>
	<div class="col-lg-6 col-md-6" id="t1">Klub Favorit<input type="text" name="fav_club" class="form-control" id="ipt1"></div>
	<div class="col-lg-6 col-md-6" id="t1">Ayah<input type="text" name="father" class="form-control" id="ipt1"></div>
	<div class="col-lg-6 col-md-6" id="t1">Ibu<input type="text" name="mother" class="form-control" id="ipt1"></div>
	<div class="col-lg-6 col-md-6" id="t1">Pemain Favorit<input type="text" name="fav_player" class="form-control" id="ipt1"></div>
	<div class="col-lg-6 col-md-6" id="t1">Pelatih Favorit<input type="text" name="fav_coach" class="form-control" id="ipt1"></div>
	<div class="col-lg-6 col-md-6" id="t1">
		Kisaran Kontrak
			<input type="number" placeholder="contoh : 1000000" name="contract_range1" class="form-control" id="ipt1">sampai dengan
			<input type="number" placeholder="contoh : 2000000" name="contract_range2" class="form-control" id="ipt1">
	</div>
	<br>
	<div id="field" class="col-lg-12 col-md-12">Karir Klub/SSB<input autocomplete="off" class="input form-control" id="field1" name="field[]" style="width: 94%;" type="text" placeholder="bulan#tahun#klub#turnamen#jml_main#no_pg#pelatih" data-items="8"><button id="b1" class="btn btn-success add-more" type="button">+</button>
	<div style="font-size:10px;color:red;font-weight:bold">
	contoh pemain amatir: FEBRUARI#2017#SSB MEKAR JAYA#LIGA SANTRI 2017#20#23#AANG SUHENDAR<br>
	contoh pemain profesional: #2017#PERSIJA#LIGA INDONESIA 1#20#23#<br>
	TOTAL 6 HASHTAG(#)
	</div>
	</div>
	
	<div id="field" class="col-lg-12 col-md-12">Karir Tim Nasional<input autocomplete="off" class="input form-control" id="timnas1" name="timnas[]" style="width: 94%;" type="text" placeholder="#tahun#turnamen#negara#jml_main#no_pg#pelatih" data-items="8"><button id="b1" class="btn btn-success add-more-timnas" type="button">+</button>
	<div style="font-size:10px;color:red;font-weight:bold">
	contoh pemain amatir: #2017#PIALA RAJA#THAILAND#20#23#AANG SUHENDAR<br>
	contoh pemain profesional: #2017#SEA GAMES#THAILAND#20#23#<br>
	TOTAL 6 HASHTAG(#)
	</div>
	</div>
	
	<div id="field" class="col-lg-12 col-md-12">Prestasi<input autocomplete="off" class="input form-control" id="prestasi1" name="prestasi[]" style="width: 94%;" type="text" placeholder="tahun#turnamen#negara#peringkat#penghargaan" data-items="8"><button id="b1" class="btn btn-success add-more-prestasi" type="button">+</button>
	<div style="font-size:10px;color:red;font-weight:bold">
	contoh: 2017#PIALA RAJA#THAILAND#1#TOP SKORER<br>
	TOTAL 4 HASHTAG(#)
	</div>
	</div>
	
	<div id="field" class="col-lg-12 col-md-12">Gallery
	<input type="file" name="gallery_player[]" class="form-control" id="gallery_player1" accept="image/*">
	<button id="b1" class="btn btn-success add-more-gallery" type="button">+</button>
	</div>
	
	<div id="field" class="col-lg-12 col-md-12">Lampiran
	<input type="file" name="lampiran[]" class="form-control" id="lampiran1" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
	<button id="b1" class="btn btn-success add-more-gallery" type="button">+</button>
	</div>
	
	<!--<div class="col-lg-6 col-md-6" id="t1">Kisaran Kontrak
	<b>Rp 1jt</b> <input id="ex2" type="text" class="span2" value="" data-slider-min="1" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> <b>Rp 1m</b>
	</div>-->
    </div>
    </div>
    
        <div class="form-group" id="t1"><input type="submit" name="opt2" value="TAMBAH" class="btn btn-block" id="btn1"></div><br><br>
        <?php
        if(isset($_POST['opt2'])){
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $call_name=mysqli_real_escape_string($con,$_POST['name_panggil']);
        $foot=mysqli_real_escape_string($con,$_POST['foot']);
        $fav_club=mysqli_real_escape_string($con,$_POST['fav_club']);
        $father=mysqli_real_escape_string($con,$_POST['father']);
        $mother=mysqli_real_escape_string($con,$_POST['mother']);
        $fav_player=mysqli_real_escape_string($con,$_POST['fav_player']);
        $fav_coach=mysqli_real_escape_string($con,$_POST['fav_coach']);
        $contract_range1=mysqli_real_escape_string($con,$_POST['contract_range1']);
        $contract_range2=mysqli_real_escape_string($con,$_POST['contract_range2']);
        $description=mysqli_real_escape_string($con,$_POST['description']);
        $birth_place=$_POST['birth_place'];
        $birth_date=$_POST['birth_date'];
  $no_hp=$_POST['no_hp'];
  $email=$_POST['email']; 
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $nationality=$_POST['nationality'];
        $position=$_POST['position'];
        $position_2=$_POST['position_2'];
        $number=$_POST['number'];
        if(isset($_FILES['pic']['tmp_name']) && $_FILES['pic']['tmp_name']!="")
        {
        $pic=rand(10000,99999)."-".$_FILES['pic']['name'];  
        }
        else{
        $pic="logo_player_2.png";  
        }
        $pic = preg_replace('/\s+/', '', $pic);
      
        $cmd=mysqli_query($con,"insert into tbl_player (father,mother,club_id,name,call_name,description,birth_place,birth_date,no_hp,email,height,weight,nationality,position,position_2,number,pic,foot,fav_club,fav_player,fav_coach,contract_range1,contract_range2,createon) values ('".$father."','".$mother."','".$club_id."','".$name."','".$call_name."','".$description."','".$birth_place."','".$birth_date."','".$no_hp."','".$email."','".$height."','".$weight."','".$nationality."','".$position."','".$position_2."','".$number."','".$pic."','".$foot."','".$fav_club."','".$fav_player."','".$fav_coach."','".$contract_range1."','".$contract_range2."','".date('Y-m-d H:i:s')."')");
        
		$last_id = mysqli_insert_id($con);
		$karir_klub = $_POST['field'];
		foreach( $karir_klub as $key => $n ) {
			$karir_klub[$key];
			if (!empty($karir_klub[$key])) {
				$pieces = explode("#", $karir_klub[$key]);
				$bulan = $pieces[0]; // bulan
				$tahun = $pieces[1]; // tahun
				$klub = $pieces[2]; // klub
				$turnamen = $pieces[3]; // turnamen
				$jumlah_main = $pieces[4]; // jumlah main
				$no_pg = $pieces[5]; // no punggung
				$pelatih = $pieces[6]; // pelatih

				$cmd=mysqli_query($con,"insert into tbl_karir_player (bulan,tahun,klub,player_id,turnamen,jumlah_main,no_pg,pelatih,createon) values ('".$bulan."','".$tahun."','".$klub."','".$last_id."','".$turnamen."','".$jumlah_main."','".$no_pg."','".$pelatih."','".date('Y-m-d H:i:s')."')");
			}
		}
		
		$karir_timnas = $_POST['timnas'];
		foreach( $karir_timnas as $key => $n ) {
			$karir_timnas[$key];
			if (!empty($karir_timnas[$key])) {
				$pieces = explode("#", $karir_timnas[$key]);
				$bulan = $pieces[0]; // bulan
				$tahun = $pieces[1]; // tahun
				$turnamen = $pieces[2]; // turnamen
				$negara = $pieces[3]; // turnamen
				$jumlah_main = $pieces[4]; // jumlah main
				$no_pg = $pieces[5]; // no punggung
				$pelatih = $pieces[6]; // pelatih

				$cmd=mysqli_query($con,"insert into tbl_karir_player (bulan,tahun,klub,player_id,turnamen,negara,jumlah_main,no_pg,pelatih,createon,timnas) values ('".$bulan."','".$tahun."','".$klub."','".$last_id."','".$turnamen."','".$negara."','".$jumlah_main."','".$no_pg."','".$pelatih."','".date('Y-m-d H:i:s')."',1)");
			}
		}
		
		$prestasi = $_POST['prestasi'];
		foreach( $prestasi as $key => $n ) {
			$prestasi[$key];
			if (!empty($prestasi[$key])) {
				$pieces = explode("#", $prestasi[$key]);
				$tahun = $pieces[0]; // tahun
				$turnamen = $pieces[1]; // turnamen
				$negara = $pieces[2]; // negara
				$peringkat = $pieces[3]; // peringkat
				$penghargaan = $pieces[3]; // penghargaan

				$cmd=mysqli_query($con,"insert into tbl_prestasi_player (tahun,turnamen,negara,peringkat,penghargaan,createon,player_id) values ('".$tahun."','".$turnamen."','".$negara."','".$peringkat."','".$penghargaan."','".date('Y-m-d H:i:s')."','".$last_id."')");
			}
		}
		
		if(isset($_FILES['gallery_player'])){

			foreach($_FILES['gallery_player']['tmp_name'] as $key => $tmp_name)
			{
				if(isset($_FILES['gallery_player']['tmp_name']) && $_FILES['gallery_player']['tmp_name']!="")
				{
					$gallery_player=rand(10000,99999)."-".$_FILES['gallery_player']['name'][$key];  
				}
				else{
					$gallery_player="logo_player_2.png";  
				}
				$tags = "gallery pemain";
				move_uploaded_file($_FILES['gallery_player']['tmp_name'][$key], "player_storage/".$gallery_player);
				$cmd=mysqli_query($con,"insert into tbl_gallery(tags,pic,thumb1,player_id,upload_date) values ('".$tags."','".$gallery_player."','".$gallery_player."','".$last_id."','".date('Y-m-d H:i:s')."')");
			}
		}else{
		
		}
		
		if(isset($_FILES['lampiran'])){

			foreach($_FILES['lampiran']['tmp_name'] as $key => $tmp_name)
			{
				if(isset($_FILES['lampiran']['tmp_name']) && $_FILES['lampiran']['tmp_name']!="")
				{
					$lampiran=rand(10000,99999)."-".$_FILES['lampiran']['name'][$key];  
				}
				else{
					$lampiran="logo_player_2.png";  
				}
				$tags = "lampiran pemain";
				move_uploaded_file($_FILES['lampiran']['tmp_name'][$key], "player_storage/".$lampiran);
				$cmd=mysqli_query($con,"insert into tbl_gallery(tags,pic,thumb1,player_id,upload_date) values ('".$tags."','".$lampiran."','".$lampiran."','".$last_id."','".date('Y-m-d H:i:s')."')");
			}
		}else{
		
		}
		
		
        if(isset($_FILES['pic']['tmp_name'])&&$_FILES['pic']['tmp_name']!="")
        {
        move_uploaded_file($_FILES['pic']['tmp_name'], "player_storage/".$pic);
        }
        
        header("refresh:0");
        
        }
        ?>      
      </form>
      </div>
    </div>
  </div>
</div>  
<!--end player-->
<!--start official-->
<div id="m2" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Official</h1></div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data">
      	<?php
      	if(isset($_POST['opt3'])){
		
      	$name=$_POST['name'];
      	$description=$_POST['description'];
      	$birth_place=$_POST['birth_place'];
      	$birth_date=$_POST['birth_date'];	
      	$nationality=$_POST['nationality'];
      	$position=$_POST['position'];
      	$contract=$_POST['contract'];
      	$license=$_POST['license'];
      	$no_identity=$_POST['no_identity'];
      	$pic=$_FILES['pic']['name'];  
		  $pic=rand("1000","9999")."-".$pic;
      $pic = preg_replace('/\s+/', '', $pic);
		//echo "insert into tbl_official_team (club_now,name,birth_place,birth_date,nationality,position,contract,official_photo,no_identity,license) values ('$club_id','$name','$birth_place','$birth_date','$nationality','$position','$contract','$pic','$no_identity','$license')";
		//exit;
      	
      	$cmd=mysqli_query($con,"insert into tbl_official_team (club_now,name,birth_place,birth_date,nationality,position,contract,official_photo,no_identity,license) values ('$club_id','$name','$birth_place','$birth_date','$nationality','$position','$contract','$pic','$no_identity','$license')");
	
      	move_uploaded_file($_FILES['pic']['tmp_name'], "../systems/player_storage/".$pic);
      	header("refresh:0");
      	
     
		
		}
      	?> 
		<div class="form-group text-left" id="t1">Upload Foto<input type="file" name="pic" class="form-control" id="set8"></div>
      <div class="form-group text-left" id="t1">Nama<input type="text" name="name" class="form-control" id="ipt1"></div>
		<div class="form-group text-left">
		<div class="row">
		<div class="col-lg-6 col-md-6" id="t1">Tempat Lahir<input type="text" name="birth_place" class="form-control" id="ipt1"></div>
		<div class="col-lg-6 col-md-6" id="t1">Tanggal Lahir<input type="date" name="birth_date" class="form-control" id="ipt1"></div>			
		</div>
		</div>
		<div class="form-group text-left">
		<div class="row">
		<div class="col-lg-6 col-md-6" id="t1">No. Identitas<input type="text" name="no_identity" class="form-control" id="ipt1"></div>
		<div class="col-lg-6 col-md-6" id="t1">Club Saat Ini<input type="text" name="club_now" class="form-control" id="ipt1"></div>			
		</div>
		</div>
		<div class="form-group text-left" id="t1">Kewarganegaraan<input type="text" name="nationality" class="form-control" id="ipt1"></div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-6" id="t1">Posisi / Jabatan<input type="text" name="position" class="form-control" id="ipt1">	
		</div>
		<div class="col-lg-6 col-md-6" id="t1">Lisensi (Pelatih)<input type="text" name="license" class="form-control" id="ipt1"></div>			
		</div>
		</div>
		<div class="form-group text-left" id="t1">Durasi Kontrak<input type="text" name="contract" class="form-control" id="ipt1"></div>
		
		
		
      	<div class="form-group" id="t1"><input type="submit" name="opt3" value="TAMBAH" class="btn btn-block" id="btn1"></div><br><br>     
      </form>      
      </div>
    </div>
  </div>
</div>  
<!--end official-->
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
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/bootstrap-slider.js"></script>
<script>
$(document).ready(function() {	
var singleValues = $( ".competition_name" ).val();
  if(singleValues == "Liga Indonesia 1" || singleValues == "Liga Indonesia 2"){
	$("#liga_profesional").show();
	$("#liga_amatir").hide();
  }else{
	$("#liga_amatir").show();
	$("#liga_profesional").hide();
  }
$('.datatables').DataTable();
$("#ex2").slider({});

var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field[]" style="width: 94%;" type="text" placeholder="bulan#tahun#klub#turnamen#jml_main#no_pg#pelatih">';
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
	
	var nexttimnas = 1;
    $(".add-more-timnas").click(function(e){
        e.preventDefault();
        var addto = "#timnas" + nexttimnas;
        var addRemove = "#timnas" + (nexttimnas);
        nexttimnas = nexttimnas + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="timnas' + nexttimnas + '" name="timnas[]" style="width: 94%;" type="text" placeholder="#tahun#turnamen#negara#jml_main#no_pg#pelatih">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nexttimnas - 1) + '" class="btn btn-danger remove-me-timnas" >-</button></div><div id="timnas">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#timnas" + nexttimnas).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nexttimnas);  
        
            $('.remove-me-timnas').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#timnas" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
	
	var nextprestasi = 1;
    $(".add-more-prestasi").click(function(e){
        e.preventDefault();
        var addto = "#prestasi" + nextprestasi;
        var addRemove = "#prestasi" + (nextprestasi);
        nextprestasi = nextprestasi + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="prestasi' + nextprestasi + '" name="prestasi[]" style="width: 94%;" type="text" placeholder="tahun#turnamen#negara#peringkat#penghargaan">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextprestasi - 1) + '" class="btn btn-danger remove-me-prestasi" >-</button></div><div id="prestasi">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#prestasi" + nextprestasi).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextprestasi);  
        
            $('.remove-me-prestasi').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#prestasi" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
	
	var nextgallery = 1;
    $(".add-more-gallery").click(function(e){
        e.preventDefault();
        var addto = "#gallery_player" + nextgallery;
        var addRemove = "#gallery_player" + (nextgallery);
        nextgallery = nextgallery + 1;
        var newIn = '<input type="file" class="form-control" id="gallery_player' + nextgallery + '" name="gallery_player[]">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextgallery - 1) + '" class="btn btn-danger remove-me-gallery" >-</button></div><div id="gallery_player">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#gallery_player" + nextgallery).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextgallery);  
        
            $('.remove-me-gallery').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#gallery_player" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
	
	var nextlampiran = 1;
    $(".add-more-lampiran").click(function(e){
        e.preventDefault();
        var addto = "#lampiran" + nextlampiran;
        var addRemove = "#lampiran" + (nextlampiran);
        nextlampiran = nextlampiran + 1;
        var newIn = '<input type="file" class="form-control" id="lampiran' + nextlampiran + '" name="lampiran[]">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextlampiran - 1) + '" class="btn btn-danger remove-me-lampiran" >-</button></div><div id="lampiran">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#lampiran" + nextlampiran).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextlampiran);  
        
            $('.remove-me-lampiran').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#lampiran" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
	
	var nextgallery = 1;
    $(".add-more-galleryklub").click(function(e){
        e.preventDefault();
        var addto = "#gallery_klub" + nextgallery;
        var addRemove = "#gallery_klub" + (nextgallery);
        nextgallery = nextgallery + 1;
        var newIn = '<input type="file" class="form-control" id="gallery_klub' + nextgallery + '" name="gallery_klub[]">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextgallery - 1) + '" class="btn btn-danger remove-me-galleryklub" >-</button></div><div id="gallery_klub">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#gallery_klub" + nextgallery).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextgallery);  
        
            $('.remove-me-galleryklub').click(function(e){
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
</script>
</body>
</html>