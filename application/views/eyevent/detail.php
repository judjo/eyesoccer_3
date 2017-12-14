<?php
$ev=$this->db->query("SELECT a.*,b.fullname FROM tbl_event a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id WHERE id_event='".$eyevent_id."'")->row_array();
?>

<div class="container">
<div class="col-lg-12 col-md-12">
<h4 id="t100" style="padding-top:20px;"><a href="<?=base_url()?>eyevent" class="btn btn-info btn-sm" style="border-radius:0px;">&ensp;HOME&ensp;</a></div>
</div>
</div>

<div class="container">
<div class="col-lg-8 col-md-8">
<div class="row">

<div class="col-lg-12 col-md-12">
<div class="set100">
  <img src="<?=base_url().'systems/eyevent_storage/'.$ev['pic']?>" alt="Norway" style="width:100%;">
  <div id="set-top-left-100">Informasi</div>     
</div> 
</div>

<div class="col-lg-12 col-md-12">
<h3 id="t101" style="color:#04B404"><?php print $ev['title']; ?></h3>
<p id="t103"> Oleh <b><?=$ev['fullname']?></b> - <?=date("d M Y",strtotime($ev["upload_date"]))?></p>
<hr></hr>
<p id="p101"><?=$ev["description"];?></p>

<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn400" id="a99">JADWAL</a></li>
  <li><a data-toggle="tab" href="#mn401" id="a99">LIVE</a></li>
    <li><a data-toggle="tab" href="#mn402" id="a99">HASIL</a></li>
</ul>
<div class="tab-content">
  <div id="mn400" class="tab-pane fade in active">
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' AND a.id_event = '$eyevent_id' order by jadwal_pertandingan ASC");
foreach($jadwal->result_array() as $data){
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}	
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
	
    <div class="col-xs-2" style="text-align:center; background:#cccccc; padding:0px;">
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
  
  <div id="mn401" class="tab-pane fade">
	<div id="bbm">
		<?php
				$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' AND a.id_event = '$eyevent_id' order by jadwal_pertandingan ASC LIMIT 5");
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
  
  <div id="mn402" class="tab-pane fade">
	<div id="bbm">
	<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where  a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' AND a.id_event = '$eyevent_id' order by jadwal_pertandingan DESC");
	
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
</div>
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
<div class="col-lg-4 col-md-4">
<div class="hidden-lg hidden-md"></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[5][3]; ?>" class="img img-responsive">
<h4 id="t100" style="color:#04B404;"><i class="fa fa-calendar"></i><a href="<?=base_url()?>eyevent/eventlainnya" style="color:#04B404;"> EVENT LAINNYA</a></h4>
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
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn900" id="a99">Berita Terkini</a></li>
  <li><a data-toggle="tab" href="#mn901" id="a99">Video Terbaru</a></li>
</ul>
<div class="tab-content"><br>
  <div id="mn900" class="tab-pane fade in active">
	<?php
	$cmd15=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 5");
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
  <div id="mn901" class="tab-pane fade">
	<?php
	$cmd19=$this->db->query("select * from tbl_eyetube where active='1' order by eyetube_id desc limit 4");
	foreach($cmd19->result_array() as $row19){
	$eyetube_id=$row19['eyetube_id'];
	print '
	  <div class="media">
		<div class="media-left">
		  <img src="'.base_url().'systems/eyetube_storage/'.$row19['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
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
</div>

  
</div>

</div>
<script src="bs/jquery/jquery-3.2.1.min.js"></script>
<script src="bs/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){

    // hide .navbar first
    $(".gotop").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 100) {
                $('.gotop').fadeIn();
            } else {
                $('.gotop').fadeOut();
            }
        });
    });

});
</script>