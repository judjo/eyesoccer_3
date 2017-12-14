<div class="container">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<div class="col-lg-12 col-md-12">
</div>
</div>

<div class="container">
<div class="col-lg-8 col-md-8">
<h4 id="t101" style="color:#13689C;"><center><i class="fa fa-play-circle-o fa-lg"></i> Eyetube</center></h4>
<div class="hidden-xs hidden-sm"><br></div>
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
	$batas   = 16;
	$halaman = @$_GET['halaman'];
	if(empty($halaman)){
	 $posisi  = 0;
	 $halaman = 1;
	}
	else{ 
	  $posisi  = ($halaman-1) * $batas; 
	}
	$result=$this->db->query("SELECT * FROM tbl_eyetube where eyetube_id order by eyetube_id desc LIMIT ".$posisi.",".$batas);
	foreach($result->result_array() as $data)
	{
	$eyetube_id=$data['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right: 0;padding-left: 0;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$data["title"].' </p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$data['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$data['tube_like'].' Suka</small></i>	  
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
</div><!-- end mobile button-->
<style>
.a99{
color: #fff;
background: #13689C;	
border-radius: 5px;
border-right: solid #ABB2B9 1px;
font-weight: bold;
font-family: arial rounded;
padding: 11px;
text-align: center;
}
.a99:hover{
background: #13689C;	
color: #a9a9a9;	
}
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
<div class="hidden-xs hidden-sm">
<div class="col-lg-12 col-md-12"><br>
<!--<ul class="nav nav-pills nav-justified">
  	<li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn700" class="a99">All Video</a></li>
  	<li><a data-toggle="tab" href="#mn701" class="a99">Eyesoccer Fact</a></li>
   	<li><a data-toggle="tab" href="#mn702" class="a99">Eyesoccer Flash</a></li>
   	<li><a data-toggle="tab" href="#mn703" class="a99">Eyesoccer Pedia</a></li>  	
	<li><a data-toggle="tab" href="#mn704" class="a99">Match Preview</a></li>   
	<li><a data-toggle="tab" href="#mn705" class="a99">SSB / Akademi</a></li>   
	<li><a data-toggle="tab" href="#mn706" class="a99">Eyesoccer Star</a></li>
</ul>-->
<ul class="nav nav-pills nav-justified">
<div class="col-lg-12 col-md-12" style="padding-bottom:5px;">
<div class="row">
<a data-toggle="tab" href="#mn700"><div class="col-lg-3 col-md-3 a99"><li class="active" style="border-radius:0px;">All Video</li></div></a>
<a data-toggle="tab" href="#mn701"><div class="col-lg-3 col-md-3 a99"><li>Eyesoccer Fact</li></div></a>
<a data-toggle="tab" href="#mn702"><div class="col-lg-3 col-md-3 a99"><li>Eyesoccer Flash</li></div></a>
<a data-toggle="tab" href="#mn703"><div class="col-lg-3 col-md-3 a99"><li>Eyesoccer Pedia</li></div></a>
</div>
</div>
<div class="col-lg-12 col-md-12" style="padding-bottom:5px;">
<div class="row">
<a data-toggle="tab" href="#mn704"><div class="col-lg-4 col-md-4 a99"><li>Eyesoccer Preview</li></div></a>
<a data-toggle="tab" href="#mn707"><div class="col-lg-4 col-md-4 a99"><li>Eyesoccer Hits</li></div></a>
<a data-toggle="tab" href="#mn706"><div class="col-lg-4 col-md-4 a99"><li>Eyesoccer Stars</li></div></a>
</div>
</div>
<div class="col-lg-12 col-md-12" style="padding-bottom:5px;">
<div class="row">
<a data-toggle="tab" href="#mn708"><div class="col-lg-6 col-md-6 a99"><li>Eyesoccer Highlight</li></div></a>
<a data-toggle="tab" href="#mn709"><div class="col-lg-6 col-md-6 a99"><li>Eyesoccer Profile</li></div></a>
</div>
</div>
</ul>
<div class="tab-content"><br>
  <div id="mn700" class="tab-pane fade in active">
 	<?php
	$batas   = 16;
	$halaman = @$_GET['halaman'];
	if(empty($halaman)){
	 $posisi  = 0;
	 $halaman = 1;
	}
	else{ 
	  $posisi  = ($halaman-1) * $batas; 
	}
	$result=$this->db->query("SELECT * FROM tbl_eyetube where eyetube_id order by eyetube_id desc LIMIT ".$posisi.",".$batas);
	foreach($result->result_array() as $data)
	{
	$eyetube_id=$data['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$data["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$data['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$data['tube_like'].' Suka</small></i>	  
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
	 echo " <b>$i</b> | "; 
	}
	?>
  </div>
  <div id="mn701" class="tab-pane fade">
	<div id="bbm">
		<?php
		$cmd1=$this->db->query("SELECT * FROM tbl_eyetube where title like'%eyesoccer fact%' order by eyetube_id desc");
		foreach($cmd1->result_array() as $row14){
		$eyetube_id=$row14['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
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
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row14["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row14['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row14['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row14['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
  </div>
    <div id="mn702" class="tab-pane fade">
	<div id="bbm">
		<?php
		$cmd12=$this->db->query("SELECT * FROM tbl_eyetube where title like'%eyesoccer flash%' order by eyetube_id desc");
		foreach($cmd12->result_array() as $row12){
		$eyetube_id=$row12['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row12['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row12["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row12['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row12['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row12['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
  </div>
      <div id="mn703" class="tab-pane fade">
	  <div id="bbm">
		<?php
		$cmd13=$this->db->query("SELECT * FROM tbl_eyetube where title like'%Eyesoccerpedia%' order by eyetube_id desc");
		foreach($cmd13->result_array() as $row13){
		$eyetube_id=$row13['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row13['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row13["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row13['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row13['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row13['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
  </div>
  <div id="mn704" class="tab-pane fade">
	  <div id="bbm">
		<?php
		$cmd20=$this->db->query("SELECT * FROM tbl_eyetube where category_name in ('Match Preview') order by eyetube_id desc");
		foreach($cmd20->result_array() as $row20){
		$eyetube_id=$row20['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row20['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row20["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row20['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row20['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row20['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
  </div>	
	
	<div id="mn706" class="tab-pane fade">
	  <div id="bbm">
		<?php
		$cmd22=$this->db->query("SELECT * FROM tbl_eyetube where category_name in ('Eyesoccer Star') order by eyetube_id desc");
		foreach($cmd22->result_array() as $row22){
		$eyetube_id=$row22['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row22['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row22["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row22['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row22['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row22['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
	</div>
   
  <div id="mn707" class="tab-pane fade">
	  <div id="bbm">
		<?php
		$cmd22=$this->db->query("SELECT * FROM tbl_eyetube where category_name in ('Eye Soccer Hits') order by eyetube_id desc");
		foreach($cmd22->result_array() as $row22){
		$eyetube_id=$row22['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row22['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row22["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row22['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row22['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row22['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
	</div>
	
	<div id="mn708" class="tab-pane fade">
	  <div id="bbm">
		<?php
		$cmd22=$this->db->query("SELECT * FROM tbl_eyetube where category_name in ('Highlight') order by eyetube_id desc");
		foreach($cmd22->result_array() as $row22){
		$eyetube_id=$row22['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row22['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row22["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row22['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row22['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row22['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
	</div>
	
	<div id="mn709" class="tab-pane fade">
	  <div id="bbm">
		<?php
		$cmd22=$this->db->query("SELECT * FROM tbl_eyetube where category_name in ('Eyesoccer Profile') order by eyetube_id desc");
		foreach($cmd22->result_array() as $row22){
		$eyetube_id=$row22['eyetube_id'];
		print '
		<div class="col-lg-6 col-md-6" style="padding-bottom:10px;padding-right:35px;padding-left:0px;">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
				  <img src="'.base_url().'systems/eyetube_storage/'.$row22['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
				<div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
				</div>
		    </div>
		    <div class="media-body">
		      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading" style="margin-bottom:0;">'.$row22["title"].'</p>
		      <small id="set6"><i class="fa fa-clock-o"></i> '.$row22['createon'].'</small></a><br>
				<small id="set6" style="color:#6A5ACD">'.$row22['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row22['tube_like'].' Suka</small></i>	  
		    </div>
		  </div>
		</div>
		</div>
		';  
		}
	?>
	</div>
	</div>
	
</div>
</div>
</div><!--end div tag -->

</div>
</div>
<div class="hidden-xs hidden-sm" style="padding-top:61px;"></div>
<div class="col-lg-4 col-md-4">
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive"><br>

<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn900" class="border" id="a99">Soccer Sains</a></li>
  <li><a data-toggle="tab" href="#mn901" class="border" id="a99">Video Kamu</a></li>  
    <li><a data-toggle="tab" href="#mn902" class="border" id="a99">Profile SSB</a></li>

</ul>
<div class="tab-content"><br>
  <div id="mn900" class="tab-pane fade in active">
<?php
$cmd19=$this->db->query("select * from tbl_eyetube where title like'%soccer science%' and active='1' order by eyetube_id desc limit 5");
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
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row19["title"].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row19['createon'].'</small></a><br>
		<small id="set6" style="color:#6A5ACD">'.$row19['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row19['tube_like'].' Suka</small>	  
    </div>
  </div>
';  
}
?>
  </div>
  <div id="mn901" class="tab-pane fade">
<?php 
$cmd11=$this->db->query("select * from tbl_eyetube where title like'%video kamu%' and active='1' order by eyetube_id desc limit 5");
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
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row11['createon'].'</small></a><br>
		<small id="set6" style="color:#000">'.$row11['tube_view'].' views - '.$row11['tube_like'].' <i class="fa fa-heart" style="color:#6A5ACD"></i></small>	  
    </div>
  </div>
';  
}
?>
  </div>
    <div id="mn902" class="tab-pane fade">
<?php 
$cmd10=$this->db->query("select * from tbl_eyetube where category_name in ('Profile SSB') order by eyetube_id desc limit 5");
foreach($cmd10->result_array() as $row10){
$eyetube_id=$row10['eyetube_id'];
print '
  <div class="media">
    <div class="media-left">
	<div id="set100">
	<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
      <img src="'.base_url().'systems/eyetube_storage/'.$row10['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
	</div>	  
    </div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row10['title'].'</p>      
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row10['createon'].'</small></a><br>
		<small id="set6" style="color:#000">'.$row10['tube_view'].' views - '.$row11['tube_like'].' <i class="fa fa-heart" style="color:#6A5ACD"></i></small>	  
    </div>
  </div>
';  
}
?>
  </div>
</div>
<hr style="border-bottom:solid #13689C 2px;margin-top:5px;">
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[5][3]; ?>" class="img img-responsive"><br>

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
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'" id="a4" class=""><p class="media-heading">'.$row15['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row15['createon'].'</small></a><br>
	  <small id="set6" style="color:#6A5ACD">'.$row15['news_view'].' views </small> - '.$row15['news_like'].' <small style="color:#6A5ACD">Suka</small>    </div>
  </div>
';  
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyenews' class='btn btn-primary btn-sm' style='color:#fff'>selengkapnya</a></div>";
?>
  </div>
  <div id="mn501" class="tab-pane fade">
<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 5");
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
<script>
	$(function(){
		var hash = window.location.hash;
		$("a[href='"+hash+"']").click();
	})
</script>