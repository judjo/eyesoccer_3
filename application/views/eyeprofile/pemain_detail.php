<?php
$date2=date("Y-m-d H:i:s");
$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','player','','".$_SESSION["ip"]."')");

$pemain=$this->db->query("SELECT a.*,b.name as club_name,b.competition,b.logo,b.url FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id WHERE player_id='".$pid."' LIMIT 1")->row_array();
?>
<style>
img {
    cursor: pointer;
}
</style>
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
<br>
<?php
if($pemain["competition"] == "Liga Indonesia 1"){
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-1' class='btn btn-info btn-sm'>Kembali</a>";
}else if($pemain["competition"] == "Liga Indonesia 2"){
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-2' class='btn btn-info btn-sm'>Kembali</a>";
}else if($pemain["competition"] == "Liga Indonesia 2"){
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-3' class='btn btn-info btn-sm'>Kembali</a>";
}else if($pemain["competition"] == "Liga Indonesia 3"){
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-3' class='btn btn-info btn-sm'>Kembali</a>";
}else if($pemain["competition"] == "Liga Usia Muda"){
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-4' class='btn btn-info btn-sm'>Kembali</a>";
}else if($pemain["competition"] == "SSB / Akademi Sepakbola"){
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-5' class='btn btn-info btn-sm'>Kembali</a>";
}else{
echo "<a style='margin-left:5px;' href='".base_url()."/eyeprofile/pemain#tab-6' class='btn btn-info btn-sm'>Kembali</a>";
}
if(isset($_SESSION["member_id"]))
{
	$_SESSION["player_id"] = $pemain["player_id"];
	$member_player = $this->db->query("SELECT * FROM tbl_member_player WHERE id_member='".$_SESSION["member_id"]."'")->row_array();
	if($member_player["id_player"] == $pemain["player_id"]){
		echo '<button style="float: right;margin-right: 5px;" onclick="update_pemain('.$pemain["player_id"].')" class="btn btn-success btn-sm">Update</button>';
	}
}
?>
<?php
if($pemain["competition"] != "Liga Indonesia 1" &&$pemain["competition"] != "Liga Indonesia 2"){
echo '<h1 id="t2" style="font-size:25px;">Detail Pemain Amatir</h1>';
}else{
echo '<h1 id="t2" style="font-size:25px;">Detail Pemain Profesional</h1>';
}
?>

<hr></hr>  

<div class="col-lg-6 col-md-6">
<div id="back6"><br>
<img src="<?=base_url()?>systems/player_storage/<?=$pemain["pic"]?>" class="img img-responsive img-player-click" id="img6"><br>
<h3 class="text-center" id="t4"><?=$pemain["name"]?></h3>
<?php
	$date1 = str_replace("/","-",$pemain["birth_date"]);
	$d1 = new DateTime( $date1 );
	$d2 = new DateTime( date( 'Y-m-d' ) );

	$diff = $d2->diff( $d1 );
?>
<h4 class="text-center" id="t4"><?=$diff->y?> Tahun</h4>
<h4 class="text-center" id="t4">ID Pemain : <?=$pemain["player_id"]?></h4>
<div class="text-center">
	<a href="<?=base_url()?>eyeprofile/klub_detail/<?=$pemain["url"]?>" class="btn btn-primary" style="line-height: 40px;">
		<img src="<?=base_url()?>systems/club_logo/<?=$pemain["logo"]?>" class="media-object" id="img5" style="float: left;width: 40px;height: 40px;border-radius: 7px;">&nbsp;&nbsp;<?=$pemain["club_name"]?>
	</a>
</div>
		<?php
		/* echo "<div class='text-center'>
			<img src='".base_url()."img/soccer_field.jpg'>";
			echo "<span class='kiper'></span>";
			echo "<span class='bek-tengah1'></span>";
			echo "<span class='bek-tengah2'></span>";
			echo "<span class='bek-kiri'></span>";
			echo "<span class='bek-kanan'></span>";
			echo "<span class='gelandang1'></span>";
			echo "<span class='gelandang2'></span>";
			echo "<span class='sayap-kiri'></span>";
			echo "<span class='sayap-kanan'></span>";
			echo "<span class='penyerang1'></span>";
			echo "<span class='penyerang2'></span>";
			
			$str_replace = str_replace(" ","-",$pemain['position']);
			$strtolower = strtolower($str_replace);
			echo "<div class='text-".$strtolower."'>".$pemain['position']."</div>";
			echo "<span class='".$strtolower." bg-".$strtolower."'></span>";
		echo "</div>"; */
		echo "<div class='text-center'>
			<img class='img-field-pos' src='".base_url()."img/soccer_field.jpg'>";
			$strtolower = strtolower($pemain['position']);
			if($strtolower =='kiper'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/GK.png'>";
			}else if($strtolower =='bek tengah'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/CB.png'>";
			}else if($strtolower =='bek kiri'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/LB.png'>";
			}else if($strtolower =='bek kanan'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/RB.png'>";
			}else if($strtolower =='gelandang serang'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/AM.png'>";
			}else if($strtolower =='gelandang bertahan'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/DMF.png'>";
			}else if($strtolower =='sayap kanan'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/RW.png'>";
			}else if($strtolower =='sayap kiri'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/LW.png'>";
			}else if($strtolower =='penyerang'){
				echo "<img class='img-field-pos img-field-posplyr' src='".base_url()."img/CF.png'>";
			}
			
			$strtolower = strtolower($pemain['position_2']);
			if($strtolower =='kiper'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/GK.png'>";
			}else if($strtolower =='bek tengah'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/CB.png'>";
			}else if($strtolower =='bek kiri'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/LB.png'>";
			}else if($strtolower =='bek kanan'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/RB.png'>";
			}else if($strtolower =='gelandang serang'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/AM.png'>";
			}else if($strtolower =='gelandang bertahan'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/DMF.png'>";
			}else if($strtolower =='sayap kanan'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/RW.png'>";
			}else if($strtolower =='sayap kiri'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/LW.png'>";
			}else if($strtolower =='penyerang'){
				echo "<img class='img-field-pos img-field-posplyr2' src='".base_url()."img/CF.png'>";
			}
		echo "</div>";
		?>
</div><br> 
</div>
<div class="col-lg-6 col-md-6">
<!--<div id="back6">
<h1 id="t4">KARIR</h1><br>
<div id="line1"><b>-<small id="set5">-</b></small></div>
<div id="line2">Main<small id="set5"><b>-</b></small></div>
<div id="line2">Gol<small id="set5"><b>-</b></small></div>
<div id="line2">Kartu Kuning<small id="set5"><b>-</b></small></div>
<div id="line2">Kartu Merah<small id="set5"><b>-</b></small></div>
<br><br>
</div><br>--> 
<div id="back6">
<h1 id="t4" class="text-center">PROFILE</h1>
<?php
/*
if(isset($editable) && $editable=="1")
{
?>
<div id="line1">Kewarganegaraan<small id="set5"><b><input type="text" class="form-control" value="<?=$pemain["nationality"]?>" name="nationality"/></b></small></div>
<div id="line2">Tempat Lahir<small id="set5"><b><input type="text" class="form-control" value="<?=$pemain["birth_place"]?>" name="birth_place"/></b></small></div>
<div id="line2">Tanggal Lahir<small id="set5"><b><input type="text" class="form-control" value="<?=$pemain["birth_date"]?>" name="birth_date"/></b></small></div>
<div id="line2">Status<small id="set5"><b><input type="text" class="form-control" value="<?=$pemain["status"]?>" name="status"/></b></small></div>
<div id="line2">Tinggi<small id="set5"><b><input type="text" class="form-control" value="<?=$pemain["height"]?>" name="height"/></b></small></div>
<div id="line2">Berat<small id="set5"><b><input type="text" class="form-control" value="<?=$pemain["weight"]?>" name="weight"/></b></small></div>
<div id="line2"><input type="submit" class="btn btn-success" value="Ubah Profil"/></div>
<?php	
}
else{
	*/
	?>
<div id="line1">Nama Panggilan<small id="set5"><b><?=$pemain["call_name"]?></b></small></div>
<div id="line1">Tempat Lahir<small id="set5"><b><?=$pemain["birth_place"]?></b></small></div>
<div id="line1">Tanggal Lahir<small id="set5"><b><?=$pemain["birth_date"]?></b></small></div>
<div id="line1">Jenis Kelamin<small id="set5"><b>Pria</b></small></div>
<div id="line1">Kewarganegaraan<small id="set5"><b><?=$pemain["nationality"]?></b></small></div>
<div id="line1">Status Pemain<small id="set5"><b><?=$pemain["status"]?></b></small></div>
<div id="line1">Nama Klub<small id="set5"><b><a href="<?=base_url()?>eyeprofile/klub_detail/<?=$pemain["url"]?>"><?=$pemain["club_name"]?></a></b></small></div>
<div id="line1">No. Punggung<small id="set5"><b><?=$pemain["number"]?></b></small></div>
<?php
if($pemain["competition"] != "Liga Indonesia 1" &&$pemain["competition"] != "Liga Indonesia 2"){
?>
<div id="line1">Nama Ayah<small id="set5"><b><?=$pemain["father"]?></b></small></div>
<div id="line1">Nama Ibu<small id="set5"><b><?=$pemain["mother"]?></b></small></div>
<?php
}
?>
<div id="line1">Tinggi Badan<small id="set5"><b><?=$pemain["height"]?> cm</b></small></div>
<div id="line1">Berat Badan<small id="set5"><b><?=$pemain["weight"]?> kg</b></small></div>
<div id="line1">Posisi Bermain<small id="set5"><b><?php echo $pemain["position"];
if(!empty($pemain["position_2"])){
echo "/".$pemain["position_2"];
}?>
</b></small></div>
<div id="line1">Kemampuan Kaki<small id="set5"><b><?=$pemain["foot"]?></b></small></div>
<!--<div id="line1">No. Telp.<small id="set5"><b></b></small></div>
<div id="line1">Alamat Email<small id="set5"><b></b></small></div>-->
<div id="line1">Klub Favorit<small id="set5"><b><?=$pemain["fav_club"]?></b></small></div>
<div id="line1">Pemain Favorit<small id="set5"><b><?=$pemain["fav_player"]?></b></small></div>
<div id="line1">Pelatih Favorit<small id="set5"><b><?=$pemain["fav_coach"]?></b></small></div>
<?php
if($pemain["competition"] == "Liga Indonesia 1" ||$pemain["competition"] == "Liga Indonesia 2"){
?>
<div id="line1">Kisaran Kontrak<small id="set5"><b></b></small></div>
<?php
}
?>
	<?php
	/*
}
*/
?>

<br> 
</div>
<br style="clear:both"/>
</div>
<br style="clear:both"/>
<div class="col-lg-12 col-md-12">
	<div id="back6" class="table table-responsive">
		<h3 id="" class="text-center">Karir Klub</h3>
		<?php
		if($pemain["competition"] == "Liga Indonesia 1" ||$pemain["competition"] == "Liga Indonesia 2"){
		?>
		<table id="book-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr>
				<td>Bulan</td>
				<td>Tahun</td>
				<td>Klub</td>
				<td>Turnamen/Kompetisi</td>
				<td>Jumlah Main</td>
				<td>No. Punggung</td>
				<td>Pelatih</td>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<?php
		}else{
		?>
		<table id="book-table2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr>
				<td>Bulan</td>
				<td>Tahun</td>
				<td>Klub</td>
				<td>Turnamen/Kompetisi</td>
				<td>Jumlah Main</td>
				<td>No. Punggung</td>
				<td>Pelatih</td>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<?php
		}
		?>
	</div>
</div>
<br style="clear:both"/>
<br style="clear:both"/>
<div class="col-lg-12 col-md-12">
	<div id="back6" class="table table-responsive">
		<h3 id="" class="text-center">Karir Timnas</h3>
		<?php
		if($pemain["competition"] == "Liga Indonesia 1" ||$pemain["competition"] == "Liga Indonesia 2"){
		?>
		<table id="timnas-prof" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr>
				<td>Tahun</td>
				<td>Turnamen/Kompetisi</td>
				<td>Negara</td>
				<td>Jumlah Main</td>
				<td>No. Punggung</td>
				<td>Pelatih</td>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<?php
		}else{
		?>
		<table id="timnas-amatir" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr>
				<td>Tahun</td>
				<td>Turnamen/Kompetisi</td>
				<td>Negara</td>
				<td>Jumlah Main</td>
				<td>No. Punggung</td>
				<td>Pelatih</td>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<?php
		}
		?>
	</div>
</div>

<br style="clear:both"/>
<br style="clear:both"/>
<div class="col-lg-12 col-md-12">
	<div id="back6" class="table table-responsive">
		<h3 id="" class="text-center">Prestasi</h3>
		<table id="prestasi" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr>
				<td>Tahun</td>
				<td>Turnamen/Kompetisi</td>
				<td>Negara</td>
				<td>Peringkat</td>
				<td>Penghargaan</td>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<br style="clear:both"/>
<br style="clear:both"/>
<div class="col-lg-12 col-md-12">
	<div id="back6" class="table table-responsive">
		<h3 id="" class="text-center">Galeri</h3>
		<?php
		$res=$this->db->query("select * from tbl_gallery where player_id='".$pemain['player_id']."' limit 10");
		foreach($res->result_array() as $row){
			echo '
			<div class="col-lg-4 col-md-4 text-center" style="height:250px;">
			<img src="'.base_url().'systems/player_storage/'.$row['pic'].'" class="img-polaroid thumbnail2 img-player-click" alt="Lights" style="margin: 0 auto;padding: 20px;height: 100%;">
			</div>
			';
		}
		?>
	</div>
</div>

<script type="text/javascript">
	$('#book-table').DataTable({
		/* "columns": [
			{ "width": "50" },
			{ "width": "50" },
			{ "width": "50" },
			{ "width": "50" },
			null
		  ], */
		/* responsive: true,
		columnDefs: [
			{ responsivePriority: 1, targets: 0 },
			{ responsivePriority: 2, targets: -1 }
		], */
        "ajax": {
            url : "<?php echo site_url("eyeprofile/karir_klub?player_id=".$pemain["player_id"]) ?>",
            type : 'GET'
        },
    });
	$('#book-table2').DataTable({
		/* "columns": [
			{ "width": "50" },
			{ "width": "50" },
			{ "width": "50" },
			{ "width": "50" },
			{ "width": "5%" },
			{ "width": "5%" },
			{ "width": "50" }
		  ], */
        "ajax": {
            url : "<?php echo site_url("eyeprofile/karir_klub_amatir?player_id=".$pemain["player_id"]) ?>",
            type : 'GET'
        },
    });
	
	$('#timnas-prof').DataTable({
        "ajax": {
            url : "<?php echo site_url("eyeprofile/karir_timnas_prof?player_id=".$pemain["player_id"]) ?>",
            type : 'GET'
        },
    });
	$('#timnas-amatir').DataTable({
        "ajax": {
            url : "<?php echo site_url("eyeprofile/karir_timnas_amatir?player_id=".$pemain["player_id"]) ?>",
            type : 'GET'
        },
    });
	$('#prestasi').DataTable({
        "ajax": {
            url : "<?php echo site_url("eyeprofile/prestasi_player?player_id=".$pemain["player_id"]) ?>",
            type : 'GET'
        },
    });
	$(function() {
    	$('.img-player-click').on('click', function() {
			$('.enlargeImageModalSource').attr('src', $(this).attr('src'));
			$('#enlargeImageModal').modal('show');
		});
	});
	function update_pemain(id_pemain){
		<?php
			if(isset($_SESSION["member_id"])){
		?>
				window.location="<?php echo site_url("eyeprofile/update_pemain?player_id=".$pemain["player_id"]) ?>";
		<?php
			}
		?>
		
	}
</script>
