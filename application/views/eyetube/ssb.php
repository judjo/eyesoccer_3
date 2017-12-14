<div class="container">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<div class="col-lg-12 col-md-12">
</div>
<h4 id="t100" style="padding-top:20px; color:#13689C;"><i class="fa fa-play-circle-o fa-lg"></i> Eyetube</h4>
</div>

<div class="container">
<div class="col-lg-8 col-md-8">
<div class="row">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
     <?php

		$cmd11=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc limit 0,4 ");
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
			  <a href="'.base_url().'eyetube/detail/'.$row11['eyetube_id'].'">
				<img src="'.base_url().'systems/eyetube_storage/'.$row11['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">				
			  <!--<div id="setcenter105"><img src="'.base_url().'img/play_icon.png" style="width:100px;height:100px;"></div>-->
			  </a>
			</div>
		</div>';
		}

		?>
    </div>
  </div><br>

<div class="hidden-md hidden-lg">
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">All Video</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/fact" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Fact</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/fact" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Flash</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/eyesoccerpedia" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Pedia</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/matchpreview" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Match Preview</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/ssb" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">SSB/Akademi</a></div></div>
<br><br>
<div class="col-xs-12 col-sm-12"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/eyesoccerstar" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Star</a></div></div>
</div><br>
<div class="bbm">
<?php
		$batas   = 15;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		 $posisi  = 0;
		 $halaman = 1;
		}
		else{ 
		  $posisi  = ($halaman-1) * $batas; 
		}
		$cmd1=$this->db->query("SELECT * FROM tbl_eyetube where category_name in ('Profile SSB') order by eyetube_id desc");
		foreach($cmd1->result_array() as $row14){
		$eyetube_id=$row14['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;">
		<div class="row">
		  <div class="media">
			<div class="media-left">
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">					
				<img src="'.base_url().'systems/eyetube_storage/'.$row14['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>			  
			</div>
			<div class="media-body">
			  <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="font-size:12px;">'.$row14["title"].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row14['createon'].'</small></a><br>
		<small id="set6" style="color:#000">'.$row14['tube_view'].' views - '.$row14['tube_like'].' <i class="fa fa-heart" style="color:#6A5ACD"></small></i>	  
  			</div>
		  </div>
		  </div>
		  </div>
		';  
		}
				$query=$this->db->query("SELECT * FROM tbl_eyetube where eyetube_id order by eyetube_id desc");
		$hasil=$query->num_rows();
		$jmlhalaman = ceil($hasil/$batas);
		echo "<div style='clear:left;'></div><center><ul class='pagination'>";
		//echo "Page";

		for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman){
		 echo " <a href=\"eyetube?halaman=$i\">$i</a> | ";
		}
		else{ 
		 echo " <b>$i</b> |"; 
		}
	?>
	</div>
</div>
<style>
#a99{
color: #fff;
background: #13689C;	
border-radius: 5px;
border-right: solid #ABB2B9 1px;
font-weight: bold;
font-family: arial rounded;
}
#a99:hover{
background: #13689C;	
color: #a9a9a9;	
}
</style>

</div>

</div>

<div class="col-lg-4 col-md-4">
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[5][3]; ?>" class="img img-responsive"><br>

<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn900" class="border" id="a99">Video Kamu</a></li>
  <li><a data-toggle="tab" href="#mn901" class="border" id="a99">Soccer Science</a></li>
</ul>
<div class="tab-content"><br>
  <div id="mn900" class="tab-pane fade in active">
<?php
$cmd19=$this->db->query("select * from tbl_eyetube where title like'%video kamu%' and active='1' order by eyetube_id desc limit 5");
foreach($cmd19->result_array() as $row19){
$eyetube_id=$row19['eyetube_id'];
print '
  <div class="media">
    <div class="media-left">
	<div id="set100">
	<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
      <img src="'.base_url().'systems/eyetube_storage/'.$row19['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
	</div>
	</div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.substr($row19["title"],0,30).'...</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row19['createon'].'</small></a><br>
		<small id="set6" style="color:#000">'.$row19['tube_view'].' views - '.$row19['tube_like'].' <i class="fa fa-heart" style="color:#6A5ACD"> </i></small>	  
    </div>
  </div>
';  
}
?>
  </div>
  <div id="mn901" class="tab-pane fade">
<?php 
$cmd11=$this->db->query("select * from tbl_eyetube where title like'%soccer sains%' and active='1' order by eyetube_id desc limit 5");
foreach($cmd11->result_array() as $row11){
$eyetube_id=$row11['eyetube_id'];
print '
  <div class="media">
    <div class="media-left">
	<div id="set100">
	<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
      <img src="'.base_url().'systems/eyetube_storage/'.$row11['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
	</div>	  
    </div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row11['title'].'</p>      
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a><br>
		<small id="set6" style="color:#000">'.$row11['tube_view'].' views - '.$row11['tube_like'].' <i class="fa fa-heart" style="color:#6A5ACD"></i></small>	  
    </div>
  </div>
';  
}
?>
  </div>
</div>
<hr style="border-bottom:solid #13689C 2px;margin-top:5px;">
<img src="<?=base_url()?>img/ronaldo.jpg" class="img img-responsive"><br>

<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn500" class="border" id="a99">Berita Terkini</a></li>
  <li><a data-toggle="tab" href="#mn501" class="border" id="a99">Jadwal Bola Live TV</a></li>
</ul>
<div class="tab-content"><br>
  <div id="mn500" class="tab-pane fade in active">
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
	  <small id="set6" style="color:#000">'.$row15['news_view'].' views - '.$row15['news_like'].' <i class="fa fa-heart" style="color:#6A5ACD"></i></small>    </div>
  </div>
';  
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyenews' class='btn btn-primary btn-sm' style='color:#fff'>selengkapnya</a></div>";
?>
  </div>
  <div id="mn501" class="tab-pane fade">
<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 4");
foreach($jadwal->result_array() as $data){

print'

<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB</small><div class="pull-right" style="background:#13689C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#000;"><i style="color:#fff">LIVE di '.$data["live_pertandingan"].'</i></div>
<hr style="margin-top:5px;"></hr>';
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyevent?tab=live' class='btn btn-primary btn-sm' style='color:#fff'>selengkapnya</a></div>";
?>


</div>
</div>
</div>
</div>