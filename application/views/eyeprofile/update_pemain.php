<style>
	.remove-me,.add-more,.remove-me-timnas,.add-more-timnas,.remove-me-prestasi,.add-more-gallery,.remove-me-gallery,.add-more-lampiran,.remove-me-lampiran,.add-more-prestasi{
		float: right;
		margin-top: -35px;
	}
</style>

<div class="container">

	<div class="row">

		<div class="col-lg-12 col-md-12"><br>

			<h1 id="t2"><i class="fa fa-user fa-lg"></i> UPDATE PEMAIN</h1>
			<center><h3 id="t2" class="update_notif" style="display:none;color:red;font-weight:bold">Menunggu validasi admin...</h3></center>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile" id="a4">PROFILE </a></li>
				<li><a data-toggle="tab" href="#karir_klub" id="a4">KARIR KLUB</a></li>
				<li><a data-toggle="tab" href="#karir_timnas" id="a4">KARIR TIMNAS</a></li>
			</ul>
			<hr></hr>
			<div class="tab-content">
				<div id="profile" class="tab-pane fade in active">
					<form action="post_update_pemain" enctype="multipart/form-data" id="form_update_player" method="post">

					<input style="display:none" type="text" id="player_id" name="player_id" value="<?php print $player_id; ?>" class="form-control" id="ipt1">
					<div class="form-group text-left">

					<div class="row">

					<div class="col-lg-6 col-md-6" id="t1">Nama<input type="text" name="name" value="<?php print $row->name; ?>" class="form-control" id="ipt1" disabled></div>

					<div class="col-lg-6 col-md-6" id="t1">Nama Panggilan<input type="text" name="call_name" value="<?php print $row->call_name; ?>" class="form-control" id="ipt1"></div>			

					</div>

					</div>

					<div class="form-group text-left">

					<div class="row">

					<div class="col-lg-6 col-md-6" id="t1">Tempat Lahir<input type="text" name="birth_place" value="<?php print $row->birth_place; ?>" class="form-control" id="ipt1"></div>

					<div class="col-lg-6 col-md-6" id="t1">Tanggal Lahir<input type="text" name="birth_date" value="<?php print $row->birth_date; ?>" class="form-control" id="ipt1" disabled></div>			

					</div>

					</div>

					<div class="form-group text-left">

					<div class="row">

					<div class="col-lg-6 col-md-6" id="t1">No Hp<input type="text" name="no_hp" value="<?php print $row->no_hp; ?>" class="form-control" id="ipt1"></div>

					<div class="col-lg-6 col-md-6" id="t1">Email<input type="text" name="email" value="<?php print $row->email; ?>" class="form-control" id="ipt1"></div>			

					</div>

					</div>

					<div class="form-group text-left">

					<div class="row">

					<div class="col-lg-6 col-md-6" id="t1">Tinggi<input type="number" name="height" value="<?php print $row->height; ?>" class="form-control" id="ipt1"></div>

					<div class="col-lg-6 col-md-6" id="t1">Berat<input type="number" name="weight" value="<?php print $row->weight; ?>" class="form-control" id="ipt1"></div>			

					</div>

					</div>

					<div class="form-group text-left" id="t1">Negara<input type="text" name="nationality" value="<?php print $row->nationality; ?>" class="form-control" id="ipt1" disabled></div>

					<div class="form-group">

					<div class="row">

					<div class="col-lg-6 col-md-6" id="t1">Posisi 1

					<select name="position" class="form-control" id="ipt1">
					<option value="">--Select Posisi ke 1--</option>
					<?php

					foreach($posisi1 as $row2)
					{ 
					  print '<option'; if($row->position==$row2->position){print " selected";}else{print "";} print'>'.$row2->position.'</option>';  
					}

					?>	

					</select>	

					</div>

					<div class="col-lg-6 col-md-6" id="t1">Posisi 2

					<select name="position_2" class="form-control" id="ipt1">
					<option value="">--Select Posisi ke 2--</option>
					<?php

					foreach($posisi2 as $row3)
					{ 
					  print '<option'; if($row->position_2==$row3->position){print " selected";}else{print "";} print'>'.$row3->position.'</option>';  
					}

					?>	

					</select>	

					</div>

					<div class="col-lg-6 col-md-6" id="t1">No Punggung<input type="number" name="number" value="<?php print $row->number; ?>" class="form-control" id="ipt1"></div>	

					<div class="col-lg-6 col-md-6" id="t1">
					Kemampuan Kaki
					<select name="foot" class="form-control" id="ipt1">
					<option value="">--Select Kemampuan Kaki--</option>
					<?php

					foreach($kemampuan_kaki as $row4)
					{ 
					  print '<option'; if($row->foot==$row4->kaki_value){print " selected";}else{print "";} print'>'.$row4->kaki_value.'</option>';  
					}

					?>	

					</select>
					</div>	
					<?php
					if($row->competition != "Liga Indonesia 1" && $row->competition != "Liga Indonesia 2"){
					?>
					<div class="col-lg-6 col-md-6" id="t1">Ayah<input type="text" name="father" value="<?php print $row->father; ?>" class="form-control" id="ipt1"></div>

					<div class="col-lg-6 col-md-6" id="t1">Ibu<input type="text" name="mother" value="<?php print $row->mother; ?>" class="form-control" id="ipt1"></div>
					<?php
					}
					?>

					<div class="col-lg-6 col-md-6" id="t1">Klub Favorit<input type="text" name="fav_club" value="<?php print $row->fav_club; ?>" class="form-control" id="ipt1"></div>	

					<div class="col-lg-6 col-md-6" id="t1">Pemain Favorit<input type="text" name="fav_player" value="<?php print $row->fav_player; ?>" class="form-control" id="ipt1"></div>	

					<div class="col-lg-6 col-md-6" id="t1">Pelatih Favorit<input type="text" name="fav_coach" value="<?php print $row->fav_coach; ?>" class="form-control" id="ipt1"></div>	

					<?php
					if($row->competition == "Liga Indonesia 1" || $row->competition == "Liga Indonesia 2"){
					?>
					<div class="col-lg-6 col-md-6" id="t1">Kisaran Kontrak<input type="number" name="contract_range1" value="<?php print $row->contract_range1; ?>" class="form-control" id="ipt1">sampai dengan
					<input type="number" name="contract_range2" value="<?php print $row->contract_range2; ?>" class="form-control" id="ipt1">
					</div>
					<?php
					}
					?>		

					</div>

					</div>

					<div class="form-group"><img src="<?php echo base_url()?>systems/player_storage/<?php print $row->pic; ?>" class="img img-responsive" id="img10"></div>

					<div class="form-group text-left" id="t1">Upload Foto<input type="file" name="pic" class="form-control" id="set8"></div>

					<center>
						<div class="form-group" id="t1">
							<a href="<?= base_url() ?>eyeprofile/pemain_detail/<?= $player_id?>" class="btn btn-primary">KEMBALI</a>
							<button id="update-btn" type="submit" class="btn btn-success">UPDATE</button>
						</div>
					</center><br><br>     

					</form>

				</div>
				
				<div id="karir_klub" class="tab-pane fade">
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
						foreach($karir_player as $row5)
						{
						$player_id=$row5->player_id; 
						$bulan=$row5->bulan;
						$tahun=$row5->tahun;
						$klub=$row5->klub;
						$turnamen=$row5->turnamen;
						$negara=$row5->negara;
						$jumlah_main=$row5->jumlah_main;
						$no_pg=$row5->no_pg;
						$pelatih=$row5->pelatih;
						$karir_id=$row5->karir_id;
						print'<tr>
						<td>'.$bulan.'</td>
						<td>'.$tahun.'</td>
						<td>'.$klub.'</td>
						<td>'.$turnamen.'</td>
						<td>'.$negara.'</td>
						<td>'.$jumlah_main.'</td>
						<td>'.$no_pg.'</td>
						<td>'.$pelatih.'</td>
						<td><a onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
						</tr>';
						}
						?>
						</tbody>
						</table>
					</div>
				</div>
				
				<div id="karir_timnas" class="tab-pane fade">
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
						foreach($karir_timnas as $row6)
						{
						$player_id=$row6->player_id;  
						$bulan=$row6->bulan;
						$tahun=$row6->tahun;
						$klub=$row6->klub;
						$turnamen=$row6->turnamen;
						$negara=$row6->negara;
						$jumlah_main=$row6->jumlah_main;
						$no_pg=$row6->no_pg;
						$pelatih=$row6->pelatih;
						$karir_id=$row6->karir_id;
						print'<tr>
						<td>'.$bulan.'</td>
						<td>'.$tahun.'</td>
						<td>'.$klub.'</td>
						<td>'.$turnamen.'</td>
						<td>'.$negara.'</td>
						<td>'.$jumlah_main.'</td>
						<td>'.$no_pg.'</td>
						<td>'.$pelatih.'</td>
						<td><a onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
						</tr>';
						}
						?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>


<script>
$(document).ready(function() {	
	if(<?php echo $newinsert ?>==1){
		$(".update_notif").show();
		$("input:text,select,.form-control,#update-btn").attr('disabled','disabled');
	}
	$("#submit_update_player").click(function(){
		var form_data = $("#form_update_player").serialize();

		$.ajax({ 
			url: "post_update_pemain",
			type: "POST",
			// dataType:"json", 
			data: form_data,
			// async: false,
			// cache: false,
			// contentType: false,
			// processData: false,
			success: function(result){
				alert("sukses")
				alert(JSON.stringify(result));
			},
			error: function(err){
				alert("gagal");
				alert(err.responseText);
				// window.location = '?player_id='+$("#player_id").val();
			}
		});
		// e.preventDefault();
	});
})
</script>