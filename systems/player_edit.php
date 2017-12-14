<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_SESSION['admin_id'];

$player_id=$_GET['player_id'];

$cmd=mysqli_query($con,"select * from tbl_player where player_id='$player_id'");

$row=mysqli_fetch_array($cmd);

$club_id=$row['club_id'];

//$_SESSION['admin_id']; 

?>

<!DOCTYPE html>

<html>

<head>

<title>Eyesoccer</title>

<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">

<link rel="icon" type="image/png" href="../img/tab_icon.png">

<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">

<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/datatables/media/css/dataTables.bootstrap4.css">
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

<div class="col-lg-10 col-md-10"><br>

<h1 id="t2"><i class="fa fa-user fa-lg"></i> UPDATE PLAYER</h1>

<hr></hr>
<a href='<?=$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player";?>' class="btn btn-danger">Kembali</a>
<form method="post" enctype="multipart/form-data">

      	<?php

      	if(isset($_POST['opt2'])){

			$name=$_POST['name'];

			$description=$_POST['description'];

			$birth_place=$_POST['birth_place'];

			$birth_date=$_POST['birth_date'];	

			$height=$_POST['height'];

			$weight=$_POST['weight'];

			$nationality=$_POST['nationality'];

			$position=$_POST['position'];
			
			$position_2=$_POST['position_2'];

			$number=$_POST['number'];
			
			$call_name=$_POST['call_name'];
			
			$foot=$_POST['foot'];
			
			$fav_club=$_POST['fav_club'];
			
			$fav_player=$_POST['fav_player'];
			
			$fav_coach=$_POST['fav_coach'];
			
			$contract_range1=$_POST['contract_range1'];
			
			$contract_range2=$_POST['contract_range2'];
			
			$father=$_POST['father'];
			
			$mother=$_POST['mother'];
			
			$no_hp=$_POST['no_hp'];
			
			$email=$_POST['email'];

			// $pic=$_FILES['pic']['name']; 
			$pic=rand(10000,99999)."-".$_FILES['pic']['name'];			

			if(isset($_FILES['pic'])){
				if(!empty($_FILES['pic']['name'])){
					move_uploaded_file($_FILES['pic']['tmp_name'], "player_storage/".$pic);
					$cmd=mysqli_query($con,"update tbl_player set name='".$name."',description='".$description."',birth_place='".$birth_place."',birth_date='".$birth_date."',height='".$height."',weight='".$weight."',nationality='".$nationality."',position='".$position."',position_2='".$position_2."',number='".$number."',call_name='".$call_name."',foot='".$foot."',fav_club='".$fav_club."',fav_player='".$fav_player."',fav_coach='".$fav_coach."',contract_range1='".$contract_range1."',contract_range2='".$contract_range2."',father='".$father."',mother='".$mother."',pic='".$pic."',no_hp='".$no_hp."',email='".$email."',updateon='".date('Y-m-d H:i:s')."' where player_id='".$player_id."'");
				}else{
					$cmd=mysqli_query($con,"update tbl_player set name='".$name."',description='".$description."',birth_place='".$birth_place."',birth_date='".$birth_date."',height='".$height."',weight='".$weight."',nationality='".$nationality."',position='".$position."',position_2='".$position_2."',number='".$number."',call_name='".$call_name."',foot='".$foot."',fav_club='".$fav_club."',fav_player='".$fav_player."',fav_coach='".$fav_coach."',contract_range1='".$contract_range1."',contract_range2='".$contract_range2."',father='".$father."',mother='".$mother."',no_hp='".$no_hp."',email='".$email."',updateon='".date('Y-m-d H:i:s')."' where player_id='".$player_id."'");
				}
				
				//add gallery player
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
						$cmd=mysqli_query($con,"insert into tbl_gallery(tags,pic,thumb1,player_id,upload_date) values ('".$tags."','".$gallery_player."','".$gallery_player."','".$player_id."','".date('Y-m-d H:i:s')."')");
					}
				}else{
				
				}

				header("location:".$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player");

			} 	

			else{

				if(file_exists("player_storage/".$pic)){

				print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';   

				}

				else{         		

					$cmd=mysqli_query($con,"update tbl_player set name='".$name."',description='".$description."',birth_place='".$birth_place."',birth_date='".$birth_date."',height='".$height."',weight='".$weight."',nationality='".$nationality."',position='".$position."',position_2='".$position_2."',number='".$number."',call_name='".$call_name."',foot='".$foot."',fav_club='".$fav_club."',fav_player='".$fav_player."',fav_coach='".$fav_coach."',contract_range1='".$contract_range1."',contract_range2='".$contract_range2."',father='".$father."',mother='".$mother."',pic='".$pic."',no_hp='".$no_hp."',email='".$email."',updateon='".date('Y-m-d H:i:s')."' where player_id='".$player_id."'");

					move_uploaded_file($_FILES['pic']['tmp_name'], "player_storage/".$pic);
					
					header("location:".$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player");

				}

			}

		}

      	?> 

      <div class="form-group text-left" id="t1">Nama<input type="text" name="name" value="<?php print $row['name']; ?>" class="form-control" id="ipt1"></div>
	  
      <div class="form-group text-left" id="t1">Nama Panggilan<input type="text" name="call_name" value="<?php print $row['call_name']; ?>" class="form-control" id="ipt1"></div>

		<div class="form-group text-left" id="t1">Deskripsi<textarea name="description" class="form-control" maxlength="500" rows="5" id="set8"><?php print $row['description']; ?></textarea></div>

		<div class="form-group text-left">

		<div class="row">

		<div class="col-lg-6 col-md-6" id="t1">Tempat Lahir<input type="text" name="birth_place" value="<?php print $row['birth_place']; ?>" class="form-control" id="ipt1"></div>

		<div class="col-lg-6 col-md-6" id="t1">Tanggal Lahir<input type="text" name="birth_date" value="<?php print $row['birth_date']; ?>" class="form-control" id="ipt1"></div>			

		</div>

		</div>
		
		<div class="form-group text-left">

		<div class="row">

		<div class="col-lg-6 col-md-6" id="t1">No Hp<input type="text" name="no_hp" value="<?php print $row['no_hp']; ?>" class="form-control" id="ipt1"></div>

		<div class="col-lg-6 col-md-6" id="t1">Email<input type="text" name="email" value="<?php print $row['email']; ?>" class="form-control" id="ipt1"></div>			

		</div>

		</div>

		<div class="form-group text-left">

		<div class="row">

		<div class="col-lg-6 col-md-6" id="t1">Tinggi<input type="number" name="height" value="<?php print $row['height']; ?>" class="form-control" id="ipt1"></div>

		<div class="col-lg-6 col-md-6" id="t1">Berat<input type="number" name="weight" value="<?php print $row['weight']; ?>" class="form-control" id="ipt1"></div>			

		</div>

		</div>

		<div class="form-group text-left" id="t1">Negara<input type="text" name="nationality" value="<?php print $row['nationality']; ?>" class="form-control" id="ipt1"></div>

		<div class="form-group">

		<div class="row">

		<div class="col-lg-6 col-md-6" id="t1">Posisi 1

		<select name="position" class="form-control" id="ipt1">

		<?php

		$cmd1=mysqli_query($con,"select * from tbl_player_position");
		while($row1=mysqli_fetch_array($cmd1)){

		print '<option'; if($row['position']==$row1['position']){print " selected";}else{print "";} print'>'.$row1['position'].'</option>';  

		}

		?>	

		</select>	

		</div>
		
		<div class="col-lg-6 col-md-6" id="t1">Posisi 2

		<select name="position_2" class="form-control" id="ipt1">
		<option value="">--Select Posisi ke 2--</option>
		<?php
		
		$cmd1=mysqli_query($con,"select * from tbl_player_position");
		while($row1=mysqli_fetch_array($cmd1)){

		print '<option'; if($row['position_2']==$row1['position']){print " selected";}else{print "";} print'>'.$row1['position'].'</option>';  

		}

		?>	

		</select>	

		</div>

		<div class="col-lg-6 col-md-6" id="t1">No Punggung<input type="number" name="number" value="<?php print $row['number']; ?>" class="form-control" id="ipt1"></div>	
		
		<!--<div class="col-lg-6 col-md-6" id="t1">Kemampuan Kaki<input type="text" name="foot" value="<?php // print $row['foot']; ?>" class="form-control" id="ipt1"></div>	-->
		
		<div class="col-lg-6 col-md-6" id="t1">
		Kemampuan Kaki
		<select name="foot" class="form-control" id="ipt1">

		<?php

		$cmd2=mysqli_query($con,"select * from tbl_kemampuan_kaki");
		while($row2=mysqli_fetch_array($cmd2)){

		print '<option'; if($row['foot']==$row2['position']){print " selected";}else{print "";} print'>'.$row2['kaki_value'].'</option>';  

		}

		?>	

		</select>
		</div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Ayah<input type="text" name="father" value="<?php print $row['father']; ?>" class="form-control" id="ipt1"></div>
		
		<div class="col-lg-6 col-md-6" id="t1">Ibu<input type="text" name="mother" value="<?php print $row['mother']; ?>" class="form-control" id="ipt1"></div>
		
		<div class="col-lg-6 col-md-6" id="t1">Klub Favorit<input type="text" name="fav_club" value="<?php print $row['fav_club']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Pemain Favorit<input type="text" name="fav_player" value="<?php print $row['fav_player']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Pelatih Favorit<input type="text" name="fav_coach" value="<?php print $row['fav_coach']; ?>" class="form-control" id="ipt1"></div>	
		
		<div class="col-lg-6 col-md-6" id="t1">Kisaran Kontrak<input type="number" name="contract_range1" value="<?php print $row['contract_range1']; ?>" class="form-control" id="ipt1">sampai dengan
		<input type="number" name="contract_range2" value="<?php print $row['contract_range2']; ?>" class="form-control" id="ipt1">
		</div>	
		<div class="col-lg-12 col-md-12" id="t1" style="padding-top:20px;">
			<b>Karir Klub</b><br>
			<a href='<?=$base_url."/systems/karir_player_add?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."&jenis=klub#player";?>' class="btn btn-success">ADD</a>
			<div class="">
				<table class="table table-hover datatables">
				<thead id="">
				<th>Bulan</th>
				<th>Tahun</th>
				<th>Klub</th>
				<th>Turnamen/Kompetisi</th>
				<th>Negara</th>
				<th>Jumlah Main</th>
				<th>No. Punggung</th>
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
				$result=mysqli_query($con,"SELECT * FROM tbl_karir_player where player_id='$player_id' and timnas='0'");
				while($data = mysqli_fetch_array($result))
				{
				$player_id=$data['player_id'];  
				$bulan=$data['bulan'];
				$tahun=$data['tahun'];
				$klub=$data['klub'];
				$turnamen=$data['turnamen'];
				$negara=$data['negara'];
				$jumlah_main=$data['jumlah_main'];
				$no_pg=$data['no_pg'];
				$pelatih=$data['pelatih'];
				$karir_id=$data['karir_id'];
				print'<tr>
				<td>'.$bulan.'</td>
				<td>'.$tahun.'</td>
				<td>'.$klub.'</td>
				<td>'.$turnamen.'</td>
				<td>'.$negara.'</td>
				<td>'.$jumlah_main.'</td>
				<td>'.$no_pg.'</td>
				<td>'.$pelatih.'</td>
				<td><a href="karir_player_edit?admin_id='.$admin_id.'&player_id='.$player_id.'&karir_id='.$karir_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="karir_player_delete?admin_id='.$admin_id.'&karir_id='.$karir_id.'&player_id='.$player_id.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
				</tr>';
				}
				?>
				</tbody>
				</table>
			</div>

		</div>
		
		<div class="col-lg-12 col-md-12" id="t1" style="padding-top:20px;">
			<b>Karir Timnas</b><br>
			<a href='<?=$base_url."/systems/karir_player_add?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."&jenis=timnas#player";?>' class="btn btn-success">ADD</a>
			<div class="">
				<table class="table table-hover datatables">
				<thead id="">
				<th>Bulan</th>
				<th>Tahun</th>
				<th>Klub</th>
				<th>Turnamen/Kompetisi</th>
				<th>Negara</th>
				<th>Jumlah Main</th>
				<th>No. Punggung</th>
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
				$result=mysqli_query($con,"SELECT * FROM tbl_karir_player where player_id='$player_id' and timnas='1'");
				while($data = mysqli_fetch_array($result))
				{
				$player_id=$data['player_id'];  
				$bulan=$data['bulan'];
				$tahun=$data['tahun'];
				$klub=$data['klub'];
				$turnamen=$data['turnamen'];
				$negara=$data['negara'];
				$jumlah_main=$data['jumlah_main'];
				$no_pg=$data['no_pg'];
				$pelatih=$data['pelatih'];
				$karir_id=$data['karir_id'];
				print'<tr>
				<td>'.$bulan.'</td>
				<td>'.$tahun.'</td>
				<td>'.$klub.'</td>
				<td>'.$turnamen.'</td>
				<td>'.$negara.'</td>
				<td>'.$jumlah_main.'</td>
				<td>'.$no_pg.'</td>
				<td>'.$pelatih.'</td>
				<td><a href="karir_player_edit?admin_id='.$admin_id.'&player_id='.$player_id.'&karir_id='.$karir_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="karir_player_delete?admin_id='.$admin_id.'&karir_id='.$karir_id.'&player_id='.$player_id.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
				</tr>';
				}
				?>
				</tbody>
				</table>
			</div>

		</div>
		
		<div class="col-lg-12 col-md-12" id="t1" style="padding-top:20px;">
			<b>Prestasi</b><br>
			<a href='<?=$base_url."/systems/prestasi_player_add?admin_id=".$_SESSION['admin_id']."&player_id=".$player_id."&jenis=timnas#player";?>' class="btn btn-success">ADD</a>
			<div class="">
				<table class="table table-hover datatables">
				<thead id="">
				<th>Tahun</th>
				<th>Turnamen/Kompetisi</th>
				<th>Negara</th>
				<th>Peringkat</th>
				<th>Penghargaan</th>
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
				$result=mysqli_query($con,"SELECT * FROM tbl_prestasi_player where player_id='$player_id'");
				while($data = mysqli_fetch_array($result))
				{
				$tahun=$data['tahun'];
				$turnamen=$data['turnamen'];
				$negara=$data['negara'];
				$peringkat=$data['peringkat'];
				$penghargaan=$data['penghargaan'];
				$prestasi_player_id=$data['prestasi_player_id'];
				print'<tr>
				<td>'.$tahun.'</td>
				<td>'.$turnamen.'</td>
				<td>'.$negara.'</td>
				<td>'.$peringkat.'</td>
				<td>'.$penghargaan.'</td>
				<td><a href="prestasi_player_edit?admin_id='.$admin_id.'&player_id='.$player_id.'&prestasi_player_id='.$prestasi_player_id.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="prestasi_player_delete?admin_id='.$admin_id.'&prestasi_player_id='.$prestasi_player_id.'&player_id='.$player_id.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
				</tr>';
				}
				?>
				</tbody>
				</table>
			</div>

		</div>
		
		<div class="col-lg-12 col-md-12" id="t1" style="padding-top:20px;">
			<b>Gallery</b><br>
			<div class="col-lg-6 col-md-6">
			<input type="file" name="gallery_player[]" class="form-control" id="gallery_player1" accept="image/*">
			<button id="b1" class="btn btn-success add-more-gallery" type="button">+</button>
			</div><br><br>
			<div class="">
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
				$result=mysqli_query($con,"SELECT * FROM tbl_gallery where player_id='$player_id'");
				while($data = mysqli_fetch_array($result))
				{
				$thumb1=$data['thumb1'];
				$player_id=$data['player_id'];
				$id_gallery=$data['id_gallery'];
				print'<tr>
				<td><img src="player_storage/'.$thumb1.'" style="width:100px;"></td>
				<td><a href="gallery_player_edit?admin_id='.$admin_id.'&player_id='.$player_id.'&id_gallery='.$id_gallery.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="gallery_player_delete?admin_id='.$admin_id.'&player_id='.$player_id.'&id_gallery='.$id_gallery.'" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
				</tr>';
				}
				?>
				</tbody>
				</table>
			</div>

		</div>
		
		</div>

		</div>

		<div class="form-group"><img src="player_storage/<?php print $row['pic']; ?>" class="img img-responsive" id="img10"></div>

		<div class="form-group text-left" id="t1">Upload Foto<input type="file" name="pic" class="form-control" id="set8"></div>

      	<div class="form-group" id="t1"><input type="submit" name="opt2" value="UPDATE" class="btn btn-success">&emsp;</div><br><br>     

      </form>

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
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/jquery.dataTables.js">	</script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script>
$(document).ready(function() {	
	$('.datatables').DataTable();
	
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
})
</script>
</body>

</html>