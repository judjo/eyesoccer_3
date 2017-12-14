<?php

$check=$this->db->query("SELECT * FROM tbl_member_player WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1");
	 
if($check->num_rows()>0)
{
$pm=$check->row_array();
$get_player=$this->db->query("SELECT * FROM tbl_player WHERE player_id='".$pm["id_player"]."' LIMIT 1")->row_array();
}	
?>
<br />
<style>
	.control-label{
		line-height: 34px;
	}
	.form-control{
	}
	#player_id {
    position: relative;
    z-index: 10000;
	}
	.ui-autocomplete {
		 z-index: 9999 !important;
	}
</style>
<div class="col-lg-5 col-xs-12">
 <div class="col-lg-3 col-xs-6 ">
 <img src="<?=base_url()?>systems/img_storage/<?=$pic?>" class="img  text-center blah" width="100%" /> <br />
	  <br />
	    <div class="form-group text-center" id="t1">
		<form id="change_profil" method="POST" action="profile_upload" enctype="multipart/form-data">
		<!--<button type="button" class="btn-info btn" id="profil_pic_button" onclick="$('#file_pic').click();">Ganti Foto</button>-->
		<label class="btn btn-info">
			Ganti Foto&hellip; <input id="file_pic" name="pic" type="file" style="display: none;">
		</label>
		<!--<input type="file" id="file_pic" accept="image/*;capture=camera;" multiple class="hidden" name="pic" required>-->
		
		<input class="lat" name="lat" style="display:none"/>
		<input class="lon" name="lon" style="display:none"/><br /><br />
		<button type="submit" class="btn-info btn" id="submit_pic" style="display:none" >Simpan Foto</button>
		</form>
		
		</div>
	  </div>
	
<br class="clear" style="clear:both" />  
	  
	  
	  
	  
<div class="panel-group"  id="accordion">
   <div class="panel panel-default">
   <div class="panel-heading clickable" data-toggle="collapse" href="#profil_panel">
      <h4 class="panel-title">
        Informasi Akun
      </h4>
    </div>
    <div id="profil_panel" class="panel-collapse collapse">
      <div class="panel-body">
	   <form method="POST" action="profile_upload_data"> 
  
	    <div class="form-group text-left" id="t1">Nama Depan<input type="text" name="name" class="form-control" maxlength="500" value="<?=$profile["name"]?>"></div>
	    <div class="form-group text-left" id="t1">Nama Belakang<input type="text" name="fullname" class="form-control" maxlength="500" value="<?=$profile["fullname"]?>"></div>
	    <div class="form-group text-left" id="t1">Alamat<textarea name="address" class="form-control" maxlength="500" rows="5"><?=$profile["address"]?></textarea></div>
	   <div class="form-group text-left" id="t1">Tentang Saya<textarea name="about" class="form-control" maxlength="500" rows="5"><?=$profile["about"]?></textarea></div>
	   <div class="form-group text-left" id="t1"><button type="submit" class="btn-success btn" name="upd1" >Ubah Profil</button></div>
	 
	  
	</form>
	  </div>
      <div class="panel-footer"></div>
    </div> 
    </div>
	<div class="panel panel-default">
	  <div class="panel-heading clickable" data-toggle="collapse" href="#gallery_panel">
      <h4 class="panel-title">
       Galeri
      </h4>
    </div>
    <div id="gallery_panel" class="panel-collapse collapse">
      <div class="panel-body">
	 <div class="col-lg-12 pre-scrollable">
	 <?php
	 $galery=$this->db->query("SELECT * FROM tbl_gallery WHERE upload_user='".$_SESSION["member_id"]."' AND publish_by='member' AND active='1'");
	 foreach($galery->result_array() as $gr)
	 {
		?>
			  <div class="col-lg-3 col-xs-6">
	  <img src="<?=base_url()?>systems/img_storage/<?=$gr["thumb1"]?>" class="img img-rounded" width="100%" />
	  </div>	
		<?php 
	 }
	 ?>

	 
	  </div>	
	  
	 </div>
      <div class="panel-footer"><button type="button" class="btn-info btn" >Tambah Foto</button>  <button type="button" class="btn-info btn" >Tambah Video</button></div>
    </div>
  </div>

</div>
<a href="<?=base_url()?>home/logout" class="clickable btn btn-danger" ><small style="color:black;font-weight:bolder">Keluar</small></a>

</div>

<div class="col-lg-7 col-xs-12 rounded" style="padding:5%;" >
<div class="col-lg-3 col-xs-4 text-center" style="" >
<?php
if($check->num_rows()>0 && $pm["active"]=="1")
{
?>
<a data-toggle="modal" data-target="#player_reg" style="text-decoration:none;cursor:pointer;">

<img src="<?=base_url()?>systems/player_storage/<?=$get_player["pic"]?>" class="img img-responsive" style="width:45px;height:45px;display:inline;">
<br />
<h3 class="text-center" id="t4"><?=$get_player["name"]?></h3>


</a>&emsp;&ensp;
<?php
}
else{
	?>
	<a data-toggle="modal" data-target="#player_reg" style="text-decoration:none;cursor:pointer"><img src="<?=base_url()?>img/pemain_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;

	<?php
}
?>
</div>
<div class="col-lg-3 col-xs-4 text-center" >

<a href="<?=base_url()?>eyeprofile/klub" style="text-decoration:none;cursor:pointer"><img src="<?=base_url()?>img/club_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;
</div>
</div>
	<hr></hr>
	
    </div>

</div>
</div>
</div>
</div>
</div><br><br>
<div id="gallery_image_upload" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Tambah Gallery</h1></div>
      <div class="modal-body">
      <form method="POST" action="profile_upload" enctype="multipart/form-data">
     	
	<div class="thumbnail drop-shadow form-1 col-lg-12" no="1">
	<div id="gallery_image_upload_replace col-lg-12"></div>
		<div class="form-group text-left col-lg-6" id="t1"><input type="file" name="pic[]" class="form-control hidden" multiple id="gallery_image_upload_pic" required>
		</div>
		
	</div>
	<div class="form-replace" last_no="1">
	
	</div>
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>

    
  </div>
</div>
 

<img id="loader_img" src="<?=base_url()?>img/loader.gif" style="position:absolute;top:40%;display:none">


<?php
 
if($check->num_rows()>0)
{
	if($pm["active"]=="0")
	{
?>

<div id="player_reg" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7" style="max-width: 100%;">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Daftar Sebagai Pemain</h1></div>
      <div class="modal-body">
      Anda telah mendaftar sebagai pemain :
	 
	  <div class="form-group" id="t1"><span>Nama : </span><b><?=$get_player["name"]?></b></div>
	  <div class="form-group" id="t1"><span>Tanggal Daftar : </span><b><?=$pm["add_date"]?></b></div>
	  <div class="form-group" id="t1"><span><a href="<?=base_url("home/batal_daftar_player")?>" class="btn btn-danger">Batal Daftar</a></span></div>
	  <br style="clear:both"/>
      </div>
    </div>
  </div>
</div>
<?php	
	}
	else{
	?>

<div id="player_reg" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7" style="max-width: 100%;">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Edit Profil Pemain</h1></div>
      <div class="modal-body">
      Anda telah terdaftar sebagai pemain :
	 
	  <div class="form-group" id="t1"><span>Nama : </span><b><?=$get_player["name"]?></b></div>
	  <div class="form-group" id="t1"><span>Tanggal Daftar : </span><b><?=$pm["add_date"]?></b></div>
	  <div class="form-group" id="t1"><span><a href="<?=base_url("eyeprofile/pemain_detail/".$get_player["player_id"])?>" class="btn btn-info">Ubah Profil</a></span></div>
	   <br style="clear:both"/>
      </div>
    </div>
  </div>
</div>
<?php		
	}
}
else{
	?>

<div id="player_reg" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7" style="max-width: 100%;">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Daftar Sebagai Pemain</h1></div>
      <div class="modal-body">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#pilih_pemain">Pilih Pemain</a></li>
		<li><a data-toggle="tab" href="#daftar_pemain">Daftar Pemain</a></li>
	</ul>
	<div class="tab-content">
    <div id="pilih_pemain" class="tab-pane fade in active">
      <h3>Pilih Pemain</h3>
      <form method="post" action="<?=base_url("home/request_player")?>" id="reg_form_player" enctype="multipart/form-data">
		  <small>Sudah terdaftar di database kami? Verifikasi diri anda sekarang !</small>
		  <div class="form-group" id="t1">
			<input style="width: 98%;" type='text' placeholder="Masukkan nama pemain yang telah terdaftar" name='player_id' value='' class='auto ui-autocomplete-input' autocomplete='off'>
			<b style="color:red;">*</b>
		  </div>
		  <div class="form-group" id="form_verification_player">
			<center><h3>Form Verifikasi</h3></center>
			<div class="form-group" style="border-bottom;1px solid black;">
				<label class="control-label col-sm-8" for="file_ktp">KTP/Kartu Pelajar/Kartu Mahasiswa/SIM:</label>
				<div class="col-sm-4">
				  <input type="file" class="form-control" name="file_ktp" id="file_ktp" accept="image/*">
				  <b style="color:red;position: absolute;right: 0;top: 10px;">*</b>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_akte">Akte Lahir:</label>
				<div class="col-sm-4"> 
				  <input type="file" class="form-control" name="file_akte" id="file_akte" accept="image/*">
				  <b style="color:red;position: absolute;right: 0;top: 10px;">*</b>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_kk">Kartu Keluarga:</label>
				<div class="col-sm-4"> 
				  <input type="file" class="form-control" name="file_kk" id="file_kk" accept="image/*">
				  <b style="color:red;position: absolute;right: 0;top: 10px;">*</b>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_passport">Passport:</label>
				<div class="col-sm-4"> 
				  <input type="file" class="form-control" name="file_passport" id="file_passport" accept="image/*">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_ijazah">Ijazah:</label>
				<div class="col-sm-4"> 
				  <input type="file" class="form-control" name="file_ijazah" id="file_ijazah" accept="image/*">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_bukurek">Buku Rekening:</label>
				<div class="col-sm-4"> 
				  <input type="file" class="form-control" name="file_bukurek" id="file_bukurek" accept="image/*">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_srtrekssb">Surat Rekomendasi SSB:</label>
				<div class="col-sm-4"> 
				  <input type="file" class="form-control" name="file_srtrekssb" id="file_srtrekssb" accept="image/*">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-8" for="file_ibukandung">Nama Ibu Kandung:</label>
				<div class="col-sm-4"> 
				  <input type="text" class="form-control" name="file_ibukandung" id="file_ibukandung">
				  <b style="color:red;position: absolute;right: 0;top: 10px;">*</b>
				</div>
			</div>
			<!--<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label><input type="checkbox"> Remember me</label>
				  </div>
				</div>
			</div>-->
		  </div>
		  <div class="form-group" id="t1"><input type="submit" name="opt1_player" value="Daftarkan Diri" class="btn btn-block" id="btn1"></div>
	  </form>
    </div>
    <div id="daftar_pemain" class="tab-pane fade">
		<h3>Daftar Pemain</h3>
		<small class="text-center">Belum terdaftar di database kami ? Daftarkan diri anda sekarang !</small>
		<br />
		<div class="form-group" id="t1"><input type="submit" name="opt1_player" value="Daftar Baru" class="btn btn-block" id="btn1"></div><br><br>
    </div>
  </div>
      </div>
    </div>
  </div>
</div>

<?php
}
?>

<script>
	$(function(){
		// We can attach the `fileselect` event to all file inputs on the page
		$(document).on('change', ':file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
		});

		// We can watch for our custom `fileselect` event like this
		$(document).ready( function() {
		$(':file').on('fileselect', function(event, numFiles, label) {

		  var input = $(this).parents('.input-group').find(':text'),
			  log = numFiles > 1 ? numFiles + ' files selected' : label;

		  if( input.length ) {
			  input.val(log);
		  } else {
			  // if( log ) alert(log);
		  }

		});
		});
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					
			// alert( e.target.result);
					$('.blah').attr('src', e.target.result);
					//$("#profil_pic_button").hide();
					$("#submit_pic").show();
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		
		$("#file_pic").change(function(){
			//alert($(this).val());
			//$("#submit_pic").show();
			readURL(this);
		});
		
		$('#reg_form_player').bootstrapValidator({
			// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
			/* feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			}, */
			fields: {
			 
				
			player_id: {
					validators: {
						notEmpty: {
							message: 'Pemain tidak boleh kosong.'
						}
					}
				},
				file_ibukandung: {
					validators: {
						notEmpty: {
							message: 'Nama ibu tidak boleh kosong.'
						}
					}
				},
				file_ktp: {
					validators: {
						notEmpty: {
							message: 'File tidak boleh kosong.'
						},
					}
				},
				file_kk: {
					validators: {
						notEmpty: {
							message: 'File tidak boleh kosong.'
						},
					}
				},
				file_akte: {
					validators: {
						notEmpty: {
							message: 'File tidak boleh kosong.'
						},
					}
				},
				
				}
		}).on('success.form.bv', function(e) {

			  alert("tes");
		   // $('#success_message').slideDown({ opacity: "show" }, "slow");
			$('#submit-button').removeAttr("disabled");

			
		});
		
		$("[name=player_id]").focusin(function(){
			if($("[name=player_id]").val()!=""){
				// alert();
				// $("#form_verification_player").show();
			}else{
				// $("#form_verification_player").hide();
			}
		});
		
		$(".auto").autocomplete({
			source: "search_player",
			minLength: 3
		}); 
	})
</script>
<br class="clear" style="clear:both" />  