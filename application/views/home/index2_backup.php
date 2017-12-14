<?php 
if(isset($_SERVER['HTTP_USER_AGENT'])){
    $agent = $_SERVER['HTTP_USER_AGENT'];
}
  // echo '<style type="text/css">#nav100{margin-top:70px}</style>';
if (stripos( $agent, 'Chrome') !== false)
{
    // echo "Google Chrome";
}

elseif (stripos( $agent, 'Safari') !== false)
{ 
   echo '<style type="text/css">.mobile-view{margin-top:6em}</style>';
   // echo '<style type="text/css">.header-iphone{margin-top:5em}</style>';
}

$_SESSION["device_detail"]="Dekstop";
function isMobileView() {
    return preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobileView()){
$_SESSION["device_detail"]="Mobile";
}

$runtext=$this->db->query("select * from tbl_running_text WHERE place='index' LIMIT 1")->row_array();

if($_SESSION["device_detail"]=="Dekstop"){

?>
<div class="desktop-view">
<!--<img src="<?=base_url()?>img/h1.png" class="img img-responsive">-->

<div class="container"><br>
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?=base_url()?>img/banner-top.jpg" alt="Banner Top Eyesoccer" style="width:100%;height:280px;">
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
<a href="<?=base_url()?>eyenews" id="a100"><h4 id="t100" style="padding-top:20px;"><!--<img src="<?=base_url()?>img/icon_eyenews.png" class="img img-responsive" style="width:30px;height:30px;display:inline;">--><i class="fa fa-newspaper-o" style="color:#d83636"></i> EyeNews</h4></a>
<div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <?php
    $data=$cmd2[0];
    ?>
    <a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
      <div style="cursor:pointer" class="item active" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>
      <div class="set100">
  
        <img src="<?=base_url().'systems/eyenews_storage/'.$data['pic'];?>" alt="Norway" style="width:100%;">
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
<div style="padding-top:70px;"></div>
  <?php
    $data=$cmd2[1];
    ?>
<div class="col-lg-12 col-md-12">
 <a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
<div class="set100 row" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>

  <img src="<?=base_url().'systems/eyenews_storage/'.$data['pic'];?>" alt="Norway" style="width:100%;max-height:218px;">    
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

  <img src="<?=base_url().'systems/eyenews_storage/'.$data['pic'];?>" alt="Norway" style="width:100%;">     
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
  <div id="setcenter103"><?=$data["title"]?></div>
</div>  
</a>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4">
<a href="<?=base_url()?>eyenews?search=rekomendasi"><h3 id="t102">BERITA REKOMENDASI</h3></a>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' AND category_news='2' and eyenews_id order by eyenews_id desc LIMIT 3");
?>
<?php
foreach($cmd1->result_array() as $data){
print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'" id="a100"><div class="media" style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
  <div class="media-left">
    <img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
  </div>
  <div class="media-body">
    <h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
    <p id="p101">'.$data["title"].'</p>
  </div>
</div></a>'; 
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyenews' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?> 
</div>
<div class="col-lg-4 col-md-4">
<?php
$cmd0=$this->db->query("select * from tbl_template_eyenews where position='tengah'");
$data0=$cmd0->row_array();
?>
<a href="<?=base_url()?>eyenews/search/<?=$data0['category_template']?>"><h3 id="t102"><?=strtoupper($data0['category_template'])?></h3></a>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' and news_type='".$data0['category_template']."' and eyenews_id order by eyenews_id desc LIMIT 3");
$data=$cmd1->row_array();
?>
<?php
foreach($cmd1->result_array() as $data){
print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'" id="a100"><div class="media" style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
  <div class="media-left">
    <img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
  </div>
  <div class="media-body">
    <h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
    <p id="p101">'.$data["title"].'</p>
  </div>
</div></a>'; 
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyenews' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>  
</div>
<?php
$cmd2=$this->db->query("select * from tbl_template_eyenews where position='kanan'");
$data2=$cmd2->row_array();
?>
<div class="col-lg-4 col-md-4">
<a href="<?=base_url()?>eyenews/search/<?=$data2['category_template']?>"><h3 id="t102"><?=strtoupper($data2['category_template'])?></h3></a>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>
<?php
$cmd3=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' and news_type='".$data2['category_template']."' and eyenews_id order by eyenews_id desc LIMIT 3");
?>
<?php
foreach($cmd3->result_array() as $data3){
print '<a href="'.base_url().'/eyenews/detail/'.$data3["eyenews_id"].'" id="a100"><div class="media"  style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data3["eyenews_id"].'")\'>
  <div class="media-left">
    <img src="systems/eyenews_storage/'.$data3['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
  </div>
  <div class="media-body">
    <h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data3["publish_on"])).'</h6>
    <p id="p101">'.$data3["title"].'</p>
  </div>
</div></a>'; 
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyenews' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>    
</div>
</div>

<a href="<?=base_url()?>eyetube" id="a100"><h4 id="t100" style="padding-top:20px;"><i class="fa fa-play-circle-o" style="color:#d83636"></i> EyeTube</h4></a>
<div class="col-lg-6 col-md-6" style="padding-left:0px;">
<?php
$cmd1=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."'  order by eyetube_id desc LIMIT 1");
$data=$cmd1->row_array();
?>
<a href="<?=base_url().'eyetube/detail/'.$data['eyetube_id'];?>" id="a100"><img src="<?=base_url().'systems/eyetube_storage/'.$data['thumb1'];?>" width="100%" class="img img-responsive"></a>
<h5 id="p100" style="margin-bottom:1px;"><?=$data["title"]?></h5>
<small id="t104"><?=date("d M Y",strtotime($data["createon"]))?></small>
<p id="p102"><?=substr($data["description"],0,100)?> . . . <a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>">selengkapnya</a>
</p>
</div>
<div class="col-lg-6 col-md-6">
<ul class="nav nav-tabs nav-justified">
<li class="active"><a data-toggle="tab" href="#mn100" class="mytab">Soccer Sains</a></li>
  <li><a data-toggle="tab" href="#mn101" class="mytab">Video Kamu</a></li>  
  <li ><a data-toggle="tab" href="#mn102" class="mytab">Eyesoccer Stars</a></li>
</ul> 
<div class="tab-content">
  <div id="mn100" class="tab-pane fade in active"><br>
    <?php
$cmd1=$this->db->query("select * from tbl_eyetube where title like'%soccer science%' order by eyetube_id desc LIMIT 4");
?>
<?php
foreach($cmd1->result_array() as $data){
  print '<a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'" id="a100"><div class="media" style="margin-top:8px;cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'")\'>
    <div class="media-left">
    <div id="set100">
      <img src="systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div>
    </div>
    
    </div>
    <div class="media-body">
      <h4 class="media-heading" id="t103">'.date("d M Y",strtotime($data["createon"])).'</h4>
      <p id="p101">'.$data["title"].'</p>
      <i class="fa fa-eye" style="color:#000"> '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#000"> '.$data['tube_like'].'</i>             
    </div>
  </div></a>'; 
  }
  print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyetube' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
  ?>
  </div>
  <div id="mn101" class="tab-pane fade"><br> 
  <?php
$cmd1=$this->db->query("select * from tbl_eyetube where title like'%video kamu%' order by eyetube_id desc LIMIT 4");
?>
<?php
foreach($cmd1->result_array() as $data){
  print '<a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'" id="a100"><div class="media" style="margin-top:8px;cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'")\'>
    <div class="media-left">
    <div id="set100">
    <img src="systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div>
    </div>

    </div>
    <div class="media-body">
      <h4 class="media-heading" id="t103">'.date("d M Y",strtotime($data["createon"])).'</h4>
      <p id="p101">'.$data["title"].'</p>
      <i class="fa fa-eye" style="color:#000"> '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#000"> '.$data['tube_like'].'</i>         
    </div>
  </div></a>'; 
  }
  print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyetube' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
  ?>
  </div>
  <div id="mn102" class="tab-pane fade"><br>
  <?php
$cmd1=$this->db->query("select * from tbl_eyetube where title like'%eyesoccer star%' order by eyetube_id desc LIMIT 4");
?>
<?php
foreach($cmd1->result_array() as $data){
  print '<a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'" id="a100"><div class="media" style="margin-top:8px;cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'")\'>
    <div class="media-left">
    <div id="set100">
      <img src="systems/eyetube_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div>
    </div>
    
    </div>
    <div class="media-body">
      <h4 class="media-heading" id="t103">'.date("d M Y",strtotime($data["createon"])).'</h4>
      <p id="p101">'.$data["title"].'</p>
      <i class="fa fa-eye" style="color:#000"> '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#000"> '.$data['tube_like'].'</i>             
    </div>
  </div></a>'; 
  }
  print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyetube' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
  ?> 
  </div>
</div>
</div>

<div class="col-lg-12 col-md-12" style="padding-left:0px;"></div>
<div class="col-lg-6 col-md-6" style="padding-left:0px;">
<a href="<?=base_url()?>eyevent" id="a100"><h4 id="t100"><i class="fa fa-calendar" style="color:#d83636"></i> EyeVent</h4></a>
  <ul class="nav nav-tabs nav-justified">
  <li class="active"><a data-toggle="tab" href="#mn104" class="mytab">Pertandingan Pekan Ini</a></li>
  <li><a data-toggle="tab" href="#mn105" class="mytab">Jadwal Live TV</a></li>
</ul> 
<div class="tab-content">
  <div id="mn104" class="tab-pane fade in active"><br>
    <?php
    $i=0;
    $judul="";
    $list_jadwal=array(array('Liga 1','LIGA 1 INDONESIA'),array('Liga Indonesia 2','LIGA 2 INDONESIA'),array('English Premier League','LIGA INGGRIS'),array('Spanish','LIGA SPANYOL'));
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title !='' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC LIMIT 5");

    $judul=$list_jadwal[$i][1];
    while($jadwal->num_rows()<1)
    { 
      $i++;
      $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%".$list_jadwal[$i][0]."%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC LIMIT 5");
      $judul=$list_jadwal[$i][1];
      
    }
    //print_r($list_jadwal);
    ?>
    <!--<div class="text-center" style="background:#2C3E50;color:#fff;padding:5px;"><?=$judul?></div><br>-->
    <?php

    //$get_last=mysqli_fetch_array(mysqli_query("SELECT * FROM tbl_event WHERE title like='%Liga 1%' ORDER BY tbl_e"));

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
    <div class="col-lg-5 col-md-5 text-right">'.$data["club_a"].' <img src="'.base_url().'/systems/club_logo/'.$data["logo_a"].'" style="width:35px;height:35px;"></div>
    <div class="col-lg-2 col-md-2" style="padding-top:5px;;"><div style="background:#FAF731;color:#3d3d3d;">'.date("H:i",strtotime($data["jadwal_pertandingan"])).'</div></div>
    <div class="col-lg-5 col-md-5 text-left"><img src="'.base_url().'/systems/club_logo/'.$data["logo_b"].'" style="width:30px;height:30px;"> '.$data["club_b"].' </div>
    </div><br>
    <hr style="margin-top:16px;"></hr>
    </div>';

    $jdpertandingan=$jdnow;
    }

    print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyevent' class='btn btn-danger btn-sm btn-block'>selengkapnya</a></div>";
    ?>
  </div>
  <div id="mn105" class="tab-pane fade">
<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 5");
foreach($jadwal->result_array() as $data){

print'

<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
<hr style="margin-top:5px;"></hr>';
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyevent/eventlainnya' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>
</div>
  </div>
</div>
<div class="col-lg-6 col-md-6">
<a href="<?=base_url()?>eyevent/eventlainnya" id="a100"><h4 id="t100" style="padding-top:14px; margin:0px;"><i class="fa fa-calendar-o" style="color:#d83636"></i> Event Lainnya</h4></a>
<hr style="border-bottom:solid #d83636 2px;margin-top:5px;"></hr>
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
?>    
</div>
</div>

</div>

</div> 
<?php
}
?>

<!-- update rizki start -->
<div class="container-fluid mobile-view" style="display:none">
  <div class="row">
    <div class="col-lg-12">
      <ul class="bxslider">
        <a href="<?=base_url()?>eyeme/home"><li><img src="img/SLIDE-MOBILE-eyeme.png" title="Eyeme" /></li></a>
        <a href="<?=base_url()?>eyenews"><li><img src="img/SLIDE-MOBILE-eyenews.png" title="Eyenews" /></li></a>
        <a href="<?=base_url()?>eyetube"><li><img src="img/SLIDE-MOBILE-eyetube.png" title="Eyetube" /></li></a>
        <a href="<?=base_url()?>"><li><img src="img/SLIDE-MOBILE-eyemarket.png" title="Eyemarket" /></li></a>
      </ul>
    </div>
  </div>
  
  <a href='eyeprofile/eyeprofile_tab'>
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
    <a href='<?=base_url()?>eyeme/home'>
    <div class="img-leftlong-top bg-yellow">

      <div class="title-img-mobilecenter">
        <!--<i class="fa fa-camera"></i>-->
        <img class="img-mobile-menucenter" src="<?=base_url()?>img/icon-eyeme.png" style="transform: translate(0%, 0%);width: 50px;">
      </div>
      <div class="title-img-mobilebtm">
        
      </div>
      <div style="color: white;font-size: 12px;left: 5px; position: absolute;text-align: center;">
      <?php
        $query = "SELECT * FROM tbl_gallery g left join tbl_member m on m.id_member = g.upload_user where tags = 'eyeme' and publish_type = 'public' and m.name is not null and g.pic <> '1' and g.upload_date between '".date("Y-m-d")." 00:00:00' and '".date("Y-m-d H:i:s")."' group by g.id_gallery ORDER BY upload_date desc";
        $result = $this->db->query( $query);
        $counteyeme = ($result->num_rows());
      ?>
       New Post<br><?php echo $counteyeme;?>
      </div>
    </div>
    </a>
    <a href='eyetube'>
    <div class="img-leftlong-bottom bg-blue">
    
      <?php
        $query = "SELECT * FROM tbl_eyetube ORDER BY eyetube_id desc";
        $result = $this->db->query( $query);
        $row = $result->row_array();
        echo '<img src="systems/eyetube_storage/'.$row['thumb1'].'" alt="'.$row['title'].'" style="width:100%;">';
      ?>
      <div class="title-img-mobile">
        <img class="img-mobile-menu" src="img/icon-eyetube.png">
      </div>
      <?php
        echo "<div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div>";
      ?>
      
      <div class="title-img-mobilecenter">
        <?php
          echo '<img src="systems/eyetube_storage/'.$row['thumb1'].'" alt="'.$row['title'].'" style="width:100%;">';
        ?>
      </div>

    </div>
    </a>
  </div>
  <a href='<?=base_url()?>'>
  <div class="mobile-img-rightlong" style="background-color: #03ba8c;">
    
    <div class="title-img-mobilecenter">
      <img class="img-mobile-menu" src="img/icon-eyemarket.png">
    </div>
  </div>
  </a>
    
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
