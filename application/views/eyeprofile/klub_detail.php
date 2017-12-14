<?php
$date2=date("Y-m-d H:i:s");
$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','player','','".$_SESSION["ip"]."')");
$tp2=$this->db->query("SELECT * FROM tbl_club WHERE active='1'")->num_rows();
$official=$this->db->query("SELECT * FROM tbl_official_team WHERE club_now='".$cid."' ORDER BY official_id ASC");
$total_official=($official->num_rows());
?>

<div class="col-lg-11 col-md-11">

<br>
<?php
$data=($this->db->query("SELECT * FROM tbl_club WHERE club_id='".$cid."' LIMIT 1")->row_array());

?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" id="a4">INFO </a></li>
    <?php 
	if($total_official==0 && !isset($_SESSION["user_id"]))
	{}
else{
	?>
	<li><a data-toggle="tab" href="#menu3" id="a4">OFISIAL</a></li>
    <?php
}
	?>
	<li><a data-toggle="tab" href="#menu4" id="a4">PEMAIN</a></li>
	
	<!--<li><a data-toggle="tab" href="#menu6" id="a4">GALERI</a></li>-->
    <!--<li><a data-toggle="tab" href="#menu5" id="a4">STATISTIK</a></li>-->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active"><br>
      <div class="col-lg-6 col-md-6">
      <div class="media" id="back6">
      <div class="media-left">
      <img src="<?=base_url()?>systems/club_logo/<?php echo $data["logo"]?>" class="media-object" id="img5">
      </div>
      <div class="media-body">
      <a href="" id="a4"><p class="media-heading"><?=$data["name"]?></p>
      <small id="set6"><i class="fa fa-flag"></i> <?=$data["competition"]?></small></a>
      </div>
      </div>
      <hr></hr>
      <p id="p2">
       <?=$data["description"]?>
      </p>
      </div>
      <div class="col-lg-6 col-md-6" id="back6">
      <h1 id="t4">PROFILE</h1>
      <div id="line2">Julukan<small id="set5"><b><?=$data["nickname"]?></b></small></div>
      <div id="line2">Tanggal Berdiri<small id="set5"><b><?php echo $data["establish_date"]?></b></small></div>
      <div id="line2">Telp<small id="set5"><b><?php echo $data["phone"]?></b></small></div>
      <div>Email<small id="set5"><b><?php echo $data["email"]?></b></small></div><br><div id="line2"></div>
      <div>Address<small id="set5"><b><?php echo $data["address"]?></b></small></div><br><div id="line2"></div>
      </div>
		<!--<div class="col-lg-12 col-md-12 table table-responsive" id="back6" style="margin-top: 10px;">
			<h3 id="" class="text-center">Prestasi Klub/SSB</h3>
			<table id="book-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
				<tr>
					<td>Bulan</td>
					<td>Tahun</td>
					<td>Turnamen/Kompetisi</td>
					<td>Peringkat/Juara</td>
					<td>Pelatih</td>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>-->
    </div>
    <div id="menu4" class="tab-pane"><br />
  <?php
$club=($this->db->query("SELECT * FROM tbl_club WHERE club_id='".$cid."'")->row_array());

  //echo $_SESSION["user_id"]."=".$club["user_id"];
 
  if((isset($_SESSION["user_id"])) && ($club["user_id"]==$_SESSION["user_id"]) )
  {
	  ?>
	  <br />
	  <div class="form-group"><a href="<?=base_url()?>eyeprofile/daftar/player" class="btn" id="btn1"> <i class="fa fa-plus"></i> Tambah Pemain </a></div>
  	  <br />
  <?php
  }
  else{
  ?>
  	  <br />
	  <div class="form-group"><a data-toggle="modal" data-target="#player_login" class="btn" id="btn1"> <i class="fa fa-plus"></i> Tambah Pemain </a></div>
  	  <br />
  
  <?php
  }
  ?>
  <?php
  $pemain=$this->db->query("SELECT * FROM tbl_player WHERE club_id='".$cid."' ORDER BY name ASC");
   foreach($pemain->result_array() as $data2)
   {
	  
  
 ?>
 
<div class="col-xs-12 col-lg-6">
  <div id="line2">
  
  <div class="media" onclick="window.location.href='<?=base_url()?>eyeprofile/pemain_detail/<?=$data2["player_id"]?>'" style="cursor:pointer">
    <div class="media-left">
      <img src="<?=base_url()?>systems/player_storage/<?=$data2["pic"]?>" class="media-object" id="img5">
    </div>
    <div class="media-left">
     <p class="media-heading"><?=$data2["name"]?></p>
      <small id="set6"><i class="fa fa-flag"></i> <?=$data2["position"]?> - <?=$data2["birth_date"]?></small>
    </div>
  </div>
  </div>
  
  </div>
  <?php
  }
  ?>
    </div>
	
	
	<div id="menu6" class="tab-pane"><br />
		<div class="col-lg-12 col-md-12">
			<div id="back6" class="table table-responsive">
				<h3 id="" class="text-center">Galeri</h3>
				<?php
				$res=$this->db->query("select * from tbl_gallery where klub_id='".$cid."'");
				foreach($res->result_array() as $row){
					echo '
					<div class="col-lg-4 col-md-4 text-center" style="height:250px;">
					<img src="'.base_url().'systems/club_storage/'.$row['pic'].'" class="img-polaroid thumbnail2 img-player-click" alt="Lights" style="margin: 0 auto;padding: 20px;height: 100%;">
					</div>
					';
				}
				?>
			</div>
		</div>
	</div>
	<!--
    <div id="menu5" class="tab-pane"><br>
	<?php 
	
$get=$this->db->query("SELECT * FROM tbl_statistik WHERE id_club='".$cid."'");
   $row=($get->row_array());
	?>
      <div class="col-lg-6 col-md-6" id="back6">
      <h1 id="t4">STATISTIK TIM</h1>
      <div id="line1">Jumlah Pertandingan<small id="set5"><b><?php if(!isset($row["jumlah_pertandingan"])){ echo "-";}else{ 
echo $row["jumlah_pertandingan"];
}?></b></small></div>
      <div id="line2">Menang<small id="set5"><b><?php if(!isset($row["menang"])){ echo "-";}else{ 
echo $row["menang"];
}?></b></small></div>
      <div id="line2">Imbang<small id="set5"><b><?php if(!isset($row["imbang"])){ echo "-";}else{ 
echo $row["imbang"];
}?></b></small></div>
      <div id="line2">Kalah<small id="set5"><b><?php if(!isset($row["kalah"])){ echo "-";}else{ 
echo $row["kalah"];
}?></b></small></div>
      <div id="line2">Gol<small id="set5"><b><?php if(!isset($row["gol"])){ echo "-";}else{ 
echo $row["gol"];
}?></b></small></div>
      <div id="line2">Kemasukan<small id="set5"><b><?php if(!isset($row["kemasukan"])){ echo "-";}else{ 
echo $row["kemasukan"];
}?></b></small></div>
      <div id="line2">Clean Set<small id="set5"><b><?php if(!isset($row["clean_set"])){ echo "-";}else{ 
echo $row["clean_set"];
}?></b></small></div>
      <div id="line2">Shoot on Target<small id="set5"><b><?php if(!isset($row["shoot_on_target"])){ echo "-";}else{ 
echo $row["shoot_on_target"];
}?></b></small></div>
      <div id="line2">Shoot off Target<small id="set5"><b><?php if(!isset($row["shoot_off_target"])){ echo "-";}else{ 
echo $row["shoot_off_target"];
}?></b></small></div>
      <div id="line2">Kartu Kuning<small id="set5"><b><?php if(!isset($row["kartu_kuning"])){ echo "-";}else{ 
echo $row["kartu_kuning"];
}?></b></small></div>
      <div id="line2">Kartu Merah<small id="set5"><b><?php if(!isset($row["kartu_merah"])){ echo "-";}else{ 
echo $row["kartu_merah"];
}?></b></small></div>
      <div id="line2">Penonton di Kandang<small id="set5"><b><?php if(!isset($row["penonton_di_kandang"])){ echo "-";}else{ 
echo $row["penonton_di_kandang"];
}?></b></small></div><br><br>      
      </div>
      <div class="col-lg-6 col-md-6"></div>
    </div>
	-->
     <?php
	
if($total_official!=0 || isset($_SESSION["user_id"])){
	?>
	<div id="menu3" class="tab-pane fade"><br>
    <h1 id="t4">Ofisial</h1>
       <?php
$club=$this->db->query("SELECT * FROM tbl_club WHERE club_id='".$cid."'")->row_array();

  //echo $_SESSION["user_id"]."=".$club["user_id"];
  
  if(isset($_SESSION["user_id"]) && ($club["user_id"]==$_SESSION["user_id"]))
  {
	  ?>
	  <br />
	  <div class="form-group"><a href="<?=base_url()?>eyeprofile/daftar/official" class="btn" id="btn1"> <i class="fa fa-plus"></i> Tambah Ofisial </a></div>
  	  <br />
  <?php
  }
  else{
  ?>
  	  <br />
	  <div class="form-group"><a data-toggle="modal" data-target="#official_login" class="btn" id="btn1"> <i class="fa fa-plus"></i> Tambah Ofisial </a></div>
  	  <br />
  
  <?php
  }
  ?>
 
      <?php
  
  foreach($official->result_array() as $data2)
  {
	  
  
 ?>
 
<div class="col-xs-12 col-lg-6">
  <div id="line2">
  
  <!--<div class="media" onclick="window.location.href='ofisial_detail?pid=<?=$data2["official_id"]?>'" style="cursor:pointer">-->
  <div class="media" style="">
    <div class="media-left">
      <img src="<?=base_url()?>systems/player_storage/<?=$data2["official_photo"]?>" class="media-object" id="img5">
    </div>
    <div class="media-left">
     <p class="media-heading"><?=$data2["name"]?></p>
      <small id="set6"><i class="fa fa-flag"></i> <?=$data2["position"]?> </small>
    </div>
  </div>
  </div>
  
  </div>
  <?php
  }
  ?>
  
    </div>
  <?php
}?>  <br style="clear:both" />
  </div>
  <br style="clear:both" />
  </div>
<script>
	$('#book-table').DataTable({
		"ajax": {
			url : "<?php echo site_url("eyeprofile/prestasi_klub?club_id=".$cid) ?>",
			type : 'GET'
		},
	});
</script>
	
  
  