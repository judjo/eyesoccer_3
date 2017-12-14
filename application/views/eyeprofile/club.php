
<div id="back3"><i class="fa fa-flag"></i> CLUB REGISTRATION</div><br>


      <form method="post" enctype="multipart/form-data">
   

<div class="form-group text-left" id="t1">Upload Logo<input type="file" name="logo" class="form-control" id="set8"></div>
<div class="form-group text-left" id="t1">Nama Klub<input type="text" name="name" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Julukan<input type="text" name="nickname" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Tanggal Didirikan<input type="date" name="establish_date" class="form-control " id="ipt1" ="2015-11-30">
</div>

<div class="form-group text-left" id="t1">Nomor Telepon<input type="text" name="phone" class="form-control"></div>
<div class="form-group text-left" id="t1">Fax<input type="text" name="fax" class="form-control"></div>
<?php
$getliga_id=$this->db->query("SELECT * FROM tbl_users WHERE user_id='".$_SESSION["user_id"]."'")->row_array();
if($getliga_id["id_liga"]=="1")
{
?>
<div class="form-group text-left" id="t1">Provinsi<select name="IDProvinsi" class="form-control liga_provinsi" id="ipt1">
<option value="">Pilih Provinsi</option>
<?php
$provinsi=$this->db->query("SELECT * FROM provinsi ORDER BY Nama ASC");
foreach($provinsi->result_array() as $prov)
{
	echo "<option value='".$prov["IDProvinsi"]."'>".$prov["Nama"]."</option>";
}
?>
</select></div>
<div class="form-group text-left" id="t1">Kabupaten<select name="IDKabupaten" class="form-control kabupaten_replace" id="ipt1">
<option value="">Pilih Kabupaten</option>
</select>
</div>
<?php
}
else{
	?>
	<input type="hidden" name="IDProvinsi" value="" /><input type="hidden" name="IDKabupaten" value="" />
	<?php
}
?>
<div class="form-group text-left" id="t1">Email<input type="text" name="email" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Stadion<input type="text" name="stadium" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Tipe Kompetisi
<select class="form-control" name="competition" id="ipt1">
<?php
$cmd=$this->db->query("select * from tbl_competitions");
foreach($cmd->result_array() as $row){
print '<option>'.$row['competition'].'</option>';  
}
?>
</select>  
</div>
<div class="form-group text-left" id="t1">Alamat<textarea name="address" class="form-control" maxlength="500" rows="5" id="set8"></textarea></div>
<div class="form-group text-left" id="t1">Deskripsi Klub<textarea name="description" class="form-control" maxlength="500" rows="5" id="set8"></textarea></div>
<div class="form-group text-right"><input type="submit" name="opt1" value="NEXT" class="btn" id="btn1"></div> 
      </form>


