
<div class="container">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<div class="col-lg-12 col-md-12">
</div>
</div>
<style>
#bbm11{
width: 100%;
padding: 10px;
overflow-y: scroll;
height: 400px;
}
</style>
<div class="container">
<div class="col-lg-8 col-md-8">
<h4 id="t101" style="color:#04B404;"><center><i class="fa fa-calendar"></i> Eyevent</center></h4>
<div class="hidden-xs hidden-sm"><br></div>
<div class="row">

<div class="col-lg-12 col-md-12">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
     <?php
		$cmd11=$this->db->query("select * from tbl_event where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 0,4");
		$active="1";
		foreach($cmd11->result_array() as $row11){
		  if($active=="1")
		  {
			$active="active";
		  }
		  else{
			$active="";
		  }
echo '<div class="item '.$active.'" >
<div class="set100">
      <a href="'.base_url().'eyevent/detail/'.$row11['id_event'].'">
        <img src="'.base_url().'systems/eyevent_storage/'.$row11['pic'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
		<div id="set-top-left-100">Headline</div> 
      </a>
    </div>
</div>';
}
?>
    </div>
  </div> 
</div>
<style>
#a99{
color: #fff;
background: #04B404;	
border-radius: 5px;
border-right: solid #ABB2B9 1px;
font-weight: bold;
font-family: arial rounded;
}
#a99:hover{
background: #04B404;	
color: #a9a9a9;	
}
</style>
<div class="col-lg-12 col-md-12"><br>
<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn700" id="a99">JADWAL</a></li>
  <li><a data-toggle="tab" href="#mn701" id="a99">LIVE</a></li>
  <li><a data-toggle="tab" href="#mn702" id="a99">HASIL</a></li>
  <li><a data-toggle="tab" href="#mn703" id="a99">KLASEMEN</a></li>   
</ul>
<div class="tab-content"><br>
  <div id="mn700" class="tab-pane fade in active">
	  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block dropclick" todrop="mydropdown" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d;cursor:pointer" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left mydropdown" style="cursor:pointer;">
    <li><a data-target="#myCarousel2" data-slide-to="0" class="active mydroplist" todrop="mydropdown">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="1" class="mydroplist" todrop="mydropdown">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="2" class="mydroplist" todrop="mydropdown">LIGA SPANYOL</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="3" class="mydroplist" todrop="mydropdown">LIGA JERMAN</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="4" class="mydroplist" todrop="mydropdown">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel2" data-slide-to="5" class="mydroplist" todrop="mydropdown">LIGA PERANCIS</a></li>
	<li><a data-target="#myCarousel2" data-slide-to="6" class="mydroplist" todrop="mydropdown">LIGA CHAMPIONS</a></li>	
	<li><a data-target="#myCarousel2" data-slide-to="7" class="mydroplist" todrop="mydropdown">LIGA EUROPA</a></li>	
  </ul>
  </div>    
  <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5"> JADWAL LIGA 1 INDONESIA</div><br>
	<div id="bbm11">
    <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Liga 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:5px;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right" style="padding:0px;">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><div style="clear:left;"></div><br>';
	
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA INGGRIS</div><br>
	<div id="bbm11">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%English Premier League%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
	$jdpertandingan="";
	if($jadwal->num_rows()<1)
	{
		echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
	}
	foreach($jadwal->result_array() as $data){
    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA SPANYOL</div><br>
	<div id="bbm11">
   <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Spanish%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>    
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA JERMAN</div><br>
	<div id="bbm11">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%bundesliga%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?></div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA ITALY</div><br>
	<div id="bbm11">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%seri a%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>

<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA PERANCIS</div><br>
	<div id="bbm11">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Ligue 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA CHAMPIONS</div><br>
	<div id="bbm11">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Champions League%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">JADWAL LIGA EUROPA</div><br>
	<div id="bbm11">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Europa League%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
  </div>
  </div>
  </div>
  
  <div id="mn701" class="tab-pane fade">
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block dropclick" todrop="mydropdown" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d;cursor:pointer" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left mydropdown" style="cursor:pointer;">
    <li><a data-target="#myCarousel3" data-slide-to="0" class="active mydroplist" todrop="mydropdown">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="1" class="mydroplist" todrop="mydropdown">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="2" class="mydroplist" todrop="mydropdown">LIGA SPANYOL</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="3" class="mydroplist" todrop="mydropdown">LIGA JERMAN</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="4" class="mydroplist" todrop="mydropdown">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel3" data-slide-to="5" class="mydroplist" todrop="mydropdown">LIGA PERANCIS</a></li>	
	<li><a data-target="#myCarousel3" data-slide-to="6" class="mydroplist" todrop="mydropdown">LIGA CHAMPIONS</a></li>	
	<li><a data-target="#myCarousel3" data-slide-to="7" class="mydroplist" todrop="mydropdown">LIGA EUROPA</a></li>	
  </ul>
  </div>    
  <div id="myCarousel3" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA 1 INDONESIA</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%liga 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
			<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA INGGRIS</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%english%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
			<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA SPANYOL</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%la liga%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
			<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>    
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA JERMAN</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%bundesliga%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA ITALY</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%seri a%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>

<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA PERANCIS</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%ligue 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>	
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA CHAMPIONS</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%Champions League%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>	
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">LIVE LIGA EUROPA</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%Europa League%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
	</div>
    </div>	
  </div>
  </div>
  </div>
  <div id="mn702" class="tab-pane fade">
	  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block dropclick" todrop="mydropdown" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d;cursor:pointer" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left mydropdown" style="cursor:pointer;">
    <li><a data-target="#myCarousel4" data-slide-to="0" class="active mydroplist" todrop="mydropdown">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel4" data-slide-to="1" class="mydroplist" todrop="mydropdown">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel4" data-slide-to="2" class="mydroplist" todrop="mydropdown">LIGA SPANYOL</a></li>
    <li><a data-target="#myCarousel4" data-slide-to="3" class="mydroplist" todrop="mydropdown">LIGA JERMAN</a></li>
    <li><a data-target="#myCarousel4" data-slide-to="4" class="mydroplist" todrop="mydropdown">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel4" data-slide-to="5" class="mydroplist" todrop="mydropdown">LIGA PERANCIS</a></li>	
	<li><a data-target="#myCarousel4" data-slide-to="6" class="mydroplist" todrop="mydropdown">LIGA CHAMPIONS</a></li>	
	<li><a data-target="#myCarousel4" data-slide-to="7" class="mydroplist" todrop="mydropdown">LIGA EUROPA</a></li>	
  </ul>
  </div>    
  <div id="myCarousel4" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA 1 INDONESIA</div><br>
	<div id="bbm11">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Liga 1%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0px; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>	
	</div>
    <div class="col-xs-5">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA INGGRIS</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%english%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0px; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA SPANYOL</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%la Liga%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>    
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA JERMAN</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%bundesliga%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA ITALY</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%seri a%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>

<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA PERANCIS</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%ligue 1%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA CHAMPIONS</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Champions League%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">HASIL LIGA EUROPA</div><br>
	<div id="bbm11">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Europa League%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
  </div>
  </div>
  </div>
  
  <div id="mn703" class="tab-pane fade">
		  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block dropclick" todrop="mydropdown" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d;cursor:pointer" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left mydropdown" style="cursor:pointer;">
    <li><a data-target="#myCarousel5" data-slide-to="0" class="active mydroplist" todrop="mydropdown">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel5" data-slide-to="1" class="mydroplist" todrop="mydropdown">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel5" data-slide-to="2" class="mydroplist" todrop="mydropdown">LIGA SPANYOL</a></li>
    <li><a data-target="#myCarousel5" data-slide-to="3" class="mydroplist" todrop="mydropdown">LIGA JERMAN</a></li>
    <li><a data-target="#myCarousel5" data-slide-to="4" class="mydroplist" todrop="mydropdown">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel5" data-slide-to="5" class="mydroplist" todrop="mydropdown">LIGA PERANCIS</a></li>	
  </ul>
  </div>    
  <div id="myCarousel5" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">KLASEMEN LIGA 1 INDONESIA</div><br>

			<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga indonesia%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object img img-responsive"">
      ';
    }
    ?>

    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">KLASEMEN LIGA INGGRIS</div><br>

					<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga inggris%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object img img-responsive" ">
      ';
    }
    ?>

    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">KLASEMEN LIGA SPANYOL</div><br>

		<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga spanyol%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object img img-responsive" ">
      ';
    }
    ?>

    </div>    
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">KLASEMEN LIGA JERMAN</div><br>

		<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga jerman%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object img img-responsive" ">
      ';
    }
    ?>

    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">KLASEMEN LIGA ITALY</div><br>
	
		<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga italia%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object img img-responsive" ">
      ';
    }
    ?>
	
    </div>
<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="a5">KLASEMEN LIGA PERANCIS</div><br>

<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga perancis%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object img img-responsive"">
      ';
    }
    ?>

    </div>	
  </div>
  </div>
  </div>  
</div>
</div>

</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="hidden-xs hidden-sm" style="padding-top:61px;"></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive">
<a href="<?=base_url()?>eyevent/eventlainnya" id="a100"><h4 id="t100" style="padding-top:20px; color:#04B404;"><i class="fa fa-calendar"></i> EVENT LAINNYA</h4></a>

<?php
$cmd1=$this->db->query("select * from tbl_event where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
foreach($cmd1->result_array() as $row1){
$id_event=$row1['id_event']; 
  if(strstr($row1["thumb1"], "."))
  {
    $row1['pic']=$row1['thumb1'];
  }
print '

  <div class="media">
  
    <div class="media-left ">
      <a href="'.base_url().'eyevent/detail/'.$id_event.'"><img src="'.base_url().'systems/eyevent_storage/'.$row1['pic'].'" class="media-object " id="img4" ></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyevent/detail/'.$id_event.'" id="a4" class=""><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['publish_on'].'</small></a>
    </div>
  </div>
';
  
}
?><br>

<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn500" class="border" id="a99">Jadwal Bola Live TV</a></li>
  <li><a data-toggle="tab" href="#mn501" class="border" id="a99">Berita Terkini</a></li>
</ul>
<div class="tab-content"><br>
  <div id="mn500" class="tab-pane fade in active">
  <?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 4");
foreach($jadwal->result_array() as $data){

print'

<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB</small><div class="pull-right" style="background:#01DF3A;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#000;"><i style="color:#fff">LIVE di '.$data["live_pertandingan"].'</i></div>
<hr style="margin-top:5px;"></hr>';
}
?>

  </div>
  <div id="mn501" class="tab-pane fade">
	<?php
$cmd15=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 4");
foreach($cmd15->result_array() as $row15){
$eyenews_id=$row15['eyenews_id']; 
  if(strstr($row15["thumb2"], "."))
  {
    $row1['pic']=$row15['thumb2'];
  }
print '

  <div class="media">
  
    <div class="media-left ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'"><img src="'.base_url().'systems/eyenews_storage/'.$row15['pic'].'" class="media-object " id="img4" style="height:80px; width:100px;"></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'" id="a4" class=""><p class="media-heading">'.substr($row15["title"],0,30).'...</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row15['createon'].'</small></a><br>
	  <small id="set6" style="color:#000">'.$row15['news_view'].' views - '.$row15['news_like'].' <i class="fa fa-heart" style="color:#01DF3A"></i></small>    </div>
  </div>
';  
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyenews' class='btn btn-success btn-sm' style='color:#fff'>selengkapnya</a></div>";
?>
  </div>
</div>
</div>

</div>