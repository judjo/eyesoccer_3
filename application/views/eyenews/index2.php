<?php
$runtext=$this->db->query("select * from tbl_running_text WHERE place='index' LIMIT 1")->row_array();?>
<div class="desktop-view">
<img src="<?=base_url()?>img/hh1.png" class="img img-responsive">
<div id="nav100" style="display:flex;">
<div class="col-lg-2 col-md-2" style="margin:auto"><a href="<?=base_url()?>beta/eyeprofile" class="btn btn-danger btn-sm" style="border-radius:0px;">DAFTAR LIGA USIA MUDA</a></div>
<div class="col-lg-8 col-md-8 text-center">
<a href="<?=base_url()?>list_pemain"><img src="<?=base_url()?>img/pemain_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>list_klub"><img src="<?=base_url()?>img/club_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyenews"><img src="<?=base_url()?>img/eyenews_nav.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyetube"><img src="<?=base_url()?>img/eyetube_nav.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyevent"><img src="<?=base_url()?>img/eyevent_nav.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&ensp;
</div>
<div class="col-lg-2 col-md-2" style="margin:auto"><a data-toggle="modal" data-target="#mlogin" href="" class="btn btn-danger btn-sm" style="border-radius:0px;float:right;">LOG IN MEMBER</a></div>
<!--<div style="float:left;line-height:45px;border-radius:0px;"><a href="" class="btn btn-danger btn-sm" style="border-radius:0px;">DAFTAR LIGA USIA MUDA</a></div>
<center>
<a href="" data-target="#myCarousel1" data-slide-to="0" class="active"><img src="<?=base_url()?>img/pemain_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&emsp;
<a href="" data-target="#myCarousel1" data-slide-to="1"><img src="<?=base_url()?>img/club_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&emsp;
<a href="" data-target="#myCarousel1" data-slide-to="2"><img src="<?=base_url()?>img/register_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&emsp;
</center>-->

</div>  

<div class="container"><br>
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?=base_url()?>img/slide_1.jpg" alt="Los Angeles" style="width:100%;height:280px;">
      </div>
      <div class="item">
        <img src="<?=base_url()?>img/slide_2.jpg" alt="Chicago" style="width:100%;height:280px;">
      </div>    
      <div class="item">
        <img src="<?=base_url()?>img/slide_3.jpg" alt="New york" style="width:100%;height:280px;">
      </div>
    </div>
</div><br>
<marquee id="run-text-100" style="padding-top:10px !important;padding-bottom:0px;" loop="true" SCROLLDELAY=50><?=$runtext["description"]?></marquee><br>

<div class="col-lg-7 col-md-7" style="padding-top:0px;padding-bottom:0px;padding-right:15px;padding-left:0px;">
<div class="col-lg-12 col-md-12">
<div class="row">
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by eyenews_id desc LIMIT 7");
$cmd2=$cmd1->result_array();

?>
<h4 id="t100" style="padding-top:20px;"><i class="fa fa-newspaper-o"></i> EYESOCCER NEWS</h4>
<div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <?php
	  $data=$cmd2[0];
	  ?>
	  <a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
      <div style="cursor:pointer" class="item active" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>
      <div class="set100">
	
        <img src="<?=base_url().'systems/eyenews_storage/'.$data['thumb1'];?>" alt="Norway" style="width:100%;">
        <div id="set-top-left-100">Headline</div>     
        <div id="setcenter100"><?=$data["title"]?></div>
      </div>        
      </div>
	  </a>
  </div>
</div> 
</div>
</div>
</div>
<div class="col-lg-5 col-md-5" style="padding:0;">
<div style="padding-top:58px;"></div>
  <?php
	  $data=$cmd2[1];
	  ?>
<div class="col-lg-12 col-md-12">
 <a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
<div class="set100 row" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>

  <img src="<?=base_url().'systems/eyenews_storage/'.$data['thumb1'];?>" alt="Norway" style="width:100%;max-height:218px;">
  <div id="set-top-left-101">Popular</div>     
  <div id="setcenter101" class="hidden-sm"><?=$data["title"]?></div>
</div> 
</a>
</div>
<div class="col-lg-12 col-md-12" style="padding-top:14px;padding-left:0px;padding-right:0px;">
<div class="col-lg-6 col-md-6" style="padding-left:0px;padding-right:7px;padding-top:0px">
 <?php
	  $data=$cmd2[2];
	  ?>
	   <a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
<div class="set100" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>

  <img src="<?=base_url().'systems/eyenews_storage/'.$data['thumb1'];?>" alt="Norway" style="width:100%;">
  <div id="set-top-left-102">Popular</div>     
  <div id="setcenter102"><?=$data["title"]?></div>
</div>  
</a>
</div>
<div class="col-lg-6 col-md-6" style="padding-left:7px;padding-right:0px;padding-top:0px">
<?php
	   $data=$cmd2[3];
	  ?>
	   <a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
<div class="set100" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>

  <img src="<?=base_url().'systems/eyenews_storage/'.$data['thumb1'];?>" alt="Norway" style="width:100%;">
  <div id="set-top-left-103">Popular</div>     
  <div id="setcenter103"><?=$data["title"]?></div>
</div>  
</a>
</div>
</div>
</div>
</div>

<div class="container"><br>
<div class="row">
<div class="col-lg-4 col-md-4">
<h3 id="t102">BERITA REKOMENDASI</h3>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' AND news_type='Berita' order by eyenews_id desc LIMIT 3");
?>
<?php
foreach($cmd1->result_array() as $data){
print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'"><div class="media" style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
  <div class="media-left">
    <img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
  </div>
  <div class="media-body">
    <h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
    <p id="p101">'.$data["title"].'</p>
  </div>
</div></a>'; 
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyenews' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?> 
</div>
<div class="col-lg-4 col-md-4">
<h3 id="t102">TULISAN KAMU</h3>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' AND news_type='Usia Muda' order by eyenews_id desc LIMIT 3");
?>
<?php
foreach($cmd1->result_array() as $data){
print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'"><div class="media"  style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
  <div class="media-left">
    <img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
  </div>
  <div class="media-body">
    <h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
    <p id="p101">'.$data["title"].'</p>
  </div>
</div></a>'; 
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyenews' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>    
</div>
<div class="col-lg-4 col-md-4">
<h3 id="t102">SOCCER SAINS</h3>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>

<img src="<?=base_url()?>img/ronaldo.jpg" class="img img-responsive">
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' AND news_type='Soccer Sains' order by eyenews_id desc LIMIT 1");
$data=$cmd1->row_array();
?>
<div class="media" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>
  <div class="media-left">
    <img src="<?=base_url().'systems/eyenews_storage/'.$data['thumb1'];?>" class="media-object" style="width:130px;height:90px;">
  </div>
  <div class="media-body">
    <h4 class="media-heading" id="t103"><?=date("d M Y",strtotime($data["publish_on"]))?></h4>
    <p id="p101"><?=$data["title"]?></p>
  </div>
</div> 
<?php print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyenews' class='btn btn-danger btn-sm'>selengkapnya</a></div>"; ?>   
</div>
</div>
</div>

<div class="container">
<h4 id="t100" style="padding-top:20px;"><i class="fa fa-play-circle-o fa-lg"></i> EYESOCCER VIDEO</h4>
<div class="col-lg-6 col-md-6" style="padding-left:0px;">
<?php
$cmd1=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."'  order by eyetube_id desc LIMIT 1");
$data=$cmd1->row_array();
?>
<img src="<?=base_url().'systems/eyetube_storage/'.$data['thumb1'];?>" width="100%" class="img img-responsive">
<h5 id="p100" style="margin-bottom:1px;"><?=$data["title"]?></h5>
<small id="t104"><?=date("d M Y",strtotime($data["createon"]))?></small>
<p id="p102"><?=substr($data["description"],0,100)?> . . . <a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>">selengkapnya</a>
</p>
</div>
<div class="col-lg-6 col-md-6">
<ul class="nav nav-tabs nav-justified">
  <li class="active"><a data-toggle="tab" href="#mn100" class="mytab">Rekomendasi Video</a></li>
  <li><a data-toggle="tab" href="#mn101" class="mytab">Popular Video</a></li>
  <li><a data-toggle="tab" href="#mn102" class="mytab">Video Kamu</a></li>
</ul> 
<div class="tab-content">
  <div id="mn100" class="tab-pane fade in active">
  <?php
$cmd1=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."' order by eyetube_id desc LIMIT 1,4");
?>
<?php
foreach($cmd1->result_array() as $data){
  print '<a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'"><div class="media" style="margin-top:8px;cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'")\'>
    <div class="media-left">
      <img src="systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;">
    </div>
    <div class="media-body">
      <h4 class="media-heading" id="t103">'.date("d M Y",strtotime($data["createon"])).'</h4>
      <p id="p101">'.$data["title"].'</p>
    </div>
  </div></a>'; 
  }
  print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyetube' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
  ?>    
  </div>
  <div id="mn101" class="tab-pane fade">
  <?php
$cmd1=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."' order by eyetube_id desc LIMIT 5,4");
?>
<?php
foreach($cmd1->result_array() as $data){
  print '<a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'"><div class="media" style="margin-top:8px;cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'")\'>
    <div class="media-left">
      <img src="systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;">
    </div>
    <div class="media-body">
      <h4 class="media-heading" id="t103">'.date("d M Y",strtotime($data["createon"])).'</h4>
      <p id="p101">'.$data["title"].'</p>
    </div>
  </div></a>'; 
  }
  print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyetube' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
  ?>  
  </div>
  <div id="mn102" class="tab-pane fade">
  <?php
$cmd1=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."' order by eyetube_id desc LIMIT 9,4");
?>
<?php
foreach($cmd1->result_array() as $data){
  print '<a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'"><div class="media" style="margin-top:8px;cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'")\'>
    <div class="media-left">
      <img src="systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;">
    </div>
    <div class="media-body">
      <h4 class="media-heading" id="t103">'.date("d M Y",strtotime($data["createon"])).'</h4>
      <p id="p101">'.$data["title"].'</p>
    </div>
  </div></a>'; 
  }
  print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyetube' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
  ?>  
  </div>
</div>
</div>
</div><br>

<div class="container">
<h4 id="t101" style="padding-top:5px;"><i class="fa fa-calendar"></i> EYESOCCER EVENT</h4>
<div class="col-lg-8 col-md-8">
<div class="row">
<div class="text-center" style="background:#2C3E50;color:#fff;padding:5px;">LIGA 1 INDONESIA</div><br>
<?php

//$get_last=mysqli_fetch_array(mysqli_query("SELECT * FROM tbl_event WHERE title like='%Liga 1%' ORDER BY tbl_e"));
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Liga 1%' order by jadwal_pertandingan DESC LIMIT 5");
$jdpertandingan="";
foreach($jadwal->result_array() as $data){

print '
<div class="text-center">';
	$jdnow=date("d M Y",strtotime($data["jadwal_pertandingan"]));
if($jdpertandingan==$jdnow){
	
}
else{
	echo '<small><b>'.$jdnow.'</b></small><br>';
}


//echo '<small>Gelora Bung Karno, Jakarta</small>';
echo '<hr style="margin-bottom:5px;margin-top:0px;"></hr>
<div class="col-lg-12 col-md-12">
<div class="col-lg-5 col-md-5 text-right">'.$data["club_a"].' <img src="'.base_url().'/systems/club_logo/'.$data["logo_a"].'" style="width:30px;height:30px;"></div>
<div class="col-lg-2 col-md-2" style="padding-top:5px;;"><div style="background:#FF8417;color:#fff;">'.date("H:i",strtotime($data["jadwal_pertandingan"])).'</div></div>
<div class="col-lg-5 col-md-5 text-left"><img src="'.base_url().'/systems/club_logo/'.$data["logo_b"].'" style="width:30px;height:30px;"> '.$data["club_b"].' </div>
</div><br>
<hr style="margin-top:16px;"></hr>
</div>';

$jdpertandingan=$jdnow;
}

print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyevent' class='btn btn-danger btn-sm btn-block'>selengkapnya</a></div>";
?>
</div>
</div>
<div class="col-lg-4 col-md-4">
<h4 id="t100" style="margin-top:auto;padding-bottom:10px;text-align:center"><i class="fa fa-calendar-o"></i> Jadwal Live</h4> 


<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 5");
foreach($jadwal->result_array() as $data){

print'

<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di SCTV</i></div>
<hr style="margin-top:5px;"></hr>';
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."/eyevent' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>
</div>
</div>


</div> 


<!-- update rizki start -->
<div class="container-fluid mobile-view" style="display:none">
	<div class="row">
		<div class="col-lg-12">
			<ul class="bxslider">
				<a href="eyeme_list"><li><img src="img/SLIDE-MOBILE-eyeme.png" title="Eyeme" /></li></a>
				<a href="eyenews"><li><img src="img/SLIDE-MOBILE-eyenews.png" title="Eyenews" /></li></a>
				<a href="eyetube"><li><img src="img/SLIDE-MOBILE-eyetube.png" title="Eyetube" /></li></a>
				<a href="eyemarket"><li><img src="img/SLIDE-MOBILE-eyemarket.png" title="Eyemarket" /></li></a>
			</ul>
		</div>
	</div>
	
	<a href='eyeprofile'>
	<div class="mobile-img-right bg-green">
		<div class="">
			<!--<i class="fa fa-users"></i>-->
			<img class="" src="img/icon-eyeprofile.gif">
		</div>
		<div class="title-img-mobilebtm">
			
		</div>
	</div>
	</a>
	<div class="mobile-img-left">
		<?php
			$query = "SELECT * FROM tbl_eyenews ORDER BY publish_on desc";
			$result = $this->db->query( $query);
			$row = $result->row_array();
			echo '<img src="systems/eyenews_storage/'.$row['thumb1'].'" alt="'.$row['title'].'">';
		?>
		<!--<img class="" src="systems/eyenews_storage/2605-LIGA-1-lowres.jpg">-->
		<div class="title-img-mobile">
			<!--<i class="fa fa-newspaper-o"></i>-->
			<img class="img-mobile-menutopleft" src="img/icon-eyenews.png">
		</div>
		<?php
			// echo "<a class='mobile-content-hover' href='eyenews_detail?eyenews_id=".$row['eyenews_id']."'><div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div></a>";
			echo "<a class='mobile-content-hover' href='eyenews'><div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div></a>";
		?>
	</div>

	<div class="mobile-img-leftlong">
		<a href='eyeme_list'>
		<div class="img-leftlong-top bg-yellow">
			<?php
				// $query = "SELECT * FROM tbl_gallery where tags = 'eyeme' ORDER BY upload_date desc";
				// $result = $this->db->query( $query);
				// $row = $result->row_array();
				// echo '<img style="max-height: 178%;" class="eyeme_content_img" src="systems/img_storage/'.$row['thumb1'].'" alt="'.$row['title'].'">';
			?>
			<div class="title-img-mobilecenter">
				<!--<i class="fa fa-camera"></i>-->
				<img class="img-mobile-menucenter" src="img/icon-eyeme.png" style="transform: translate(0%, 0%);width: 50px;">
			</div>
			<div class="title-img-mobilebtm">
				
			</div>
			<div style="color: white;font-size: 12px;left: 5px; position: absolute;text-align: center;">
			<?php
				$query = "SELECT * FROM tbl_gallery g left join tbl_member m on m.id_member = g.publish_by where tags = 'eyeme' and publish_type = 'public' and upload_date between '".date("Y-m-d")."00:00:00' and '".date("Y-m-d H:i:s")."' group by g.id_gallery ORDER BY upload_date desc";
				$result = $this->db->query( $query);
				$counteyeme = mysqli_num_rows($result);
			?>
			 New Post<br><?php echo $counteyeme;?>
			</div>
		</div>
		</a>
		<a href='eyemarket'>
		<div class="img-leftlong-bottom bg-blue">
			<div class="title-img-mobilecenter">
				<!--<i class="fa fa-shopping-cart"></i>-->
				<img class="img-mobile-menucenter" src="img/icon-eyemarket.png" style="transform: translate(0%, 0%);width: 50px;">
			</div>
			<div class="title-img-mobilebtm">
				
			</div>
		</div>
		</a>
	</div>
	<div class="mobile-img-rightlong">
		<?php
			$query = "SELECT * FROM tbl_eyetube ORDER BY eyetube_id desc";
			$result = $this->db->query( $query);
			$row = $result->row_array();
			echo '<img src="systems/eyetube_storage/'.$row['thumb1'].'" alt="'.$row['title'].'" style="width:100%;">';
		?>
		<div class="title-img-mobile">
			<!--<i class="fa fa-play-circle-o"></i>-->
			<img class="img-mobile-menu" src="img/icon-eyetube.png">
		</div>
		<?php
			// echo "<a class='mobile-content-hover' href='eyetube_detail?eyetube_id=".$row['eyetube_id']."'><div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div></a>";
			echo "<a class='mobile-content-hover' href='eyetube'><div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div></a>";
		?>
	</div>
	<!--
	<div class="mobile-img-rightlong bg-pink">
		<div class="title-img-mobilecenter">
			<i class="fa fa-money"></i>
		</div>
		<div class="title-img-mobilebtm">
			EyeWallet
		</div>
	</div>
	
	<div class="mobile-img-leftlong">
		<div class="img-leftlong-top bg-purple">
			<div class="title-img-mobilecenter">
				<i class="fa fa-ticket"></i>
			</div>
			<div class="title-img-mobilebtm">
				EyeTicket
			</div>
		</div>
		
		<a href='eyeme'>
		<div class="img-leftlong-bottom bg-yellow">
			<div class="title-img-mobilecenter">
				<i class="fa fa-camera"></i>
			</div>
			<div class="title-img-mobilebtm">
				EyeMe
			</div>
		</div>
		</a>
	</div>
	-->
	
	<div class="mobile-img-leftlong" style="width: 100%;height:170px">
		<div class="img-leftlong-bottom" style="height:170px;">
			<?php
				$query = "SELECT * FROM tbl_event ORDER BY id_event desc";
				$result = $this->db->query( $query);
				$row = $result->row_array();
				echo '<img src="systems/eyevent_storage/'.$row['thumb1'].'" alt="'.$row['title'].'">';
			?>
			<!--<img class="" src="systems/eyenews_storage/2605-LIGA-1-lowres.jpg">-->
			<div class="title-img-mobile">
				<!--i class="fa fa-calendar"></i>-->
				<img class="img-mobile-menu" src="img/icon-eyevent.png">
			</div>
			<?php
				// echo "<a class='mobile-content-hover' href='eyevent_detail?id_event=".$row['id_event']."'><div class='title-desc-mobile' style='width: 100%;'><div class='text-margin'>".$row['title']."</div></div></a>";
				echo "<a class='mobile-content-hover' href='eyevent'><div class='title-desc-mobile' style='width: 100%;'><div class='text-margin'>".$row['title']."</div></div></a>";
			?>
		</div>
	</div>
</div>
<!-- update rizki end -->
