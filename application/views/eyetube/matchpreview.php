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
		$cmd11=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc limit 0,4");
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
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/eyesoccerflash" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Flash</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/eyesoccerpedia" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Pedia</a></div></div>
</div>
</div><br><br>

<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/matchpreview" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Preview</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/eyesoccerhits" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Hits</a></div></div>
</div>
</div><br><br>

<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/profile" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Profile</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/highlight" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Highlight</a></div></div>
<br><br>
<div class="col-xs-12 col-sm-12"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/eyesoccerstar" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Eyesoccer Star</a></div></div>
</div><br>
<?php
		$cmd1=$this->db->query("SELECT * FROM tbl_eyetube where title like'%match preview%' order by eyetube_id desc");
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
	?>
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

<div class="hidden-md hidden-lg">
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive"><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/videokamu" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Video Kamu</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/soscience" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Soccer Science</a></div></div>
</div>
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
?><br>
</div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[5][3]; ?>" class="img img-responsive"><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/beritaterkini" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Berita Terkini</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="a99"><a href="<?=base_url()?>eyetube/livetv" class="btn btn-warning btn-block" style="background:#13689C;color:#fff;border:solid #13689C 1px;">Jadwal Live TV</a></div></div>
</div>
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
</div><br>
</div>
</div>
</div>
</div>