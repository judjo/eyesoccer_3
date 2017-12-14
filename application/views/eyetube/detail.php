<?php
$eyetube_id=$eyetube_id;
		$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
		$date2=date("Y-m-d H:i:s");

		$cekview=$this->db->query("SELECT * FROM tbl_view WHERE visit_date>='".$date1."' AND visit_date<='".$date2."' AND type_visit='view' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1")->row_array();
		if($cekview<1)
		{
		$this->db->query("UPDATE tbl_eyetube SET tube_view=tube_view+1 WHERE eyetube_id='".$eyetube_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','eyetube','".$eyetube_id."','".$_SESSION["ip"]."')");
		}
		
$cmd=$this->db->query("select a.*,b.fullname from tbl_eyetube a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id='$eyetube_id' LIMIT 1");
$row=$cmd->row_array();

?>

<title><?php if($row['title']!="")
{
  echo $row['title']." - ";
}
?>
Eyesoccer
</title>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:title" content="<?=$row['title']?>" />
<meta name="twitter:description" content="<?=substr(strip_tags($row['description']),0,100);?>" />
<meta name="twitter:image" content="<?=base_url()?>systems/eyetube_storage/<?php print $row['thumb']; ?>" />
<meta property="og:title" content="<?=$row['title']?>" />
<meta property="og:url" content="<?=base_url()?>eyetube_detail?eyetube_id=<?=$row['eyetube_id']?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=base_url()?>systems/eyetube_storage/<?=$row['thumb']; ?>" />
<meta property="og:description" content="<?=substr(strip_tags($row['description']),0,100);?>" />

<div class="container">
<div class="col-lg-12 col-md-12 hidden-lg hidden-md">
<h4 id="t100" style="padding-top:20px;">
<a href="<?=base_url()?>eyetube" class="btn btn-info btn-sm">&ensp;HOME&ensp;</a>
<?php 
if($category_name =="Eye Soccer Flash"){
	$category="eyesoccerflash";
	$name="Eyesoccer Flash";
}else if($category_name =="Eyesoccer Fact"){
	$category="fact";
	$name="Eyesoccer Fact";
}else if($category_name =="Eyesoccerpedia"){
	$category="eyesoccerpedia";
	$name="Eyesoccer Pedia";
}else if($category_name =="Eyesoccerpedia"){
	$category="eyesoccerpedia";
	$name="Eyesoccer Pedia";
}else if($category_name =="Match Preview"){
	$category="matchpreview";
	$name="Eyesoccer Preview";
}else if($category_name =="Eyesoccer Profile"){
	$category="profile";
	$name="Eyesoccer Profile";
}else if($category_name =="Eye Soccer Hits"){
	$category="eyesoccerhits";
	$name="Eyesoccer Hits";
}else if($category_name =="Highlight"){
	$category="highlight";
	$name="Eyesoccer Highlight";
}else if($category_name =="Eyesoccer Star"){
	$category="eyesoccerstar";
	$name="Eyesoccer Star";
}else if($category_name =="Eyesoccer Science"){
	$category="";
	$name="Eyesoccer Science";
}
if($category_name ==""){
}else{
?>
	<a href="<?=base_url()?>eyetube/<?=$category?>" class="btn btn-warning btn-sm"><?php echo $name?></a>
<?php
}
?>
</h4>
</div>
<div class="col-lg-12 col-md-12 hidden-xs hidden-sm">
<h4 id="t100" style="padding-top:20px;">
<a href="<?=base_url()?>eyetube" class="btn btn-info btn-sm">&ensp;HOME&ensp;</a>
<?php 
if($category_name =="Eye Soccer Flash"){
	$category="mn702";
	$name="Eyesoccer Flash";
}else if($category_name =="Eyesoccer Fact"){
	$category="mn701";
	$name="Eyesoccer Fact";
}else if($category_name =="Eyesoccerpedia"){
	$category="mn703";
	$name="Eyesoccer Pedia";
}else if($category_name =="Match Preview"){
	$category="mn704";
	$name="Eyesoccer Preview";
}else if($category_name =="Eyesoccer Profile"){
	$category="mn709";
	$name="Eyesoccer Profile";
}else if($category_name =="Eye Soccer Hits"){
	$category="mn707";
	$name="Eyesoccer Hits";
}else if($category_name =="Highlight"){
	$category="mn708";
	$name="Eyesoccer Highlight";
}else if($category_name =="Eyesoccer Star"){
	$category="mn706";
	$name="Eyesoccer Star";
}else if($category_name =="Eyesoccer Science"){
	$category="";
	$name="Eyesoccer Science";
}
if($category_name ==""){
}else{
?>
	<a href="<?=base_url()?>eyetube#<?=$category?>" class="btn btn-warning btn-sm"><?php echo $name?></a>
<?php
}
?>
</h4>
</div>
</div>

<div class="container">
<div class="col-lg-8 col-md-8">
<div class="row">

<div class="col-lg-12 col-md-12">
<div class="set100">
<video width="640" height="360" poster="<?=base_url()?>systems/eyetube_storage/<?php print $row['thumb']; ?>" controls controlsList="nodownload">
<source src="<?=base_url()?>systems/eyetube_storage/<?php print $row['video']; ?>" type="video/mp4"/></video> 
<small class="hidden-lg hidden-md"><center> <?=$row['tube_view']?> viewers | <a class="emoticon" type_emot="like"> <span class="replace_like"><?=$row['tube_like']?> Suka</a></center></small>
<small class="hidden-xs hidden-sm"><center> <?=$row['tube_view']?> viewers | <a class="emoticon" type_emot="like"><span class="replace_like"><?=$row['tube_like']?> Suka</span></a></center></small>
</div>  
</div>

<div class="col-lg-12 col-md-12">
<h3 id="t101" style="color:#13689C"><?php print $row['title']; ?></h3>
<p id="t103"> Oleh <b><?=$row['fullname']?></b> - <?php print $row['createon']; ?></p>

<p id="p101"><?=$row["description"];?></p>
<br>
<div class="tab-content">
  
</div>
<input type="hidden" id="eyetube_id22" value="<?=$eyetube_id?>" />
<h3 id="t1">Bagaimana reaksi Anda tentang video ini?</h3>
<div class="row" id="emoji">
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="smile"><img src="<?=base_url()?>img/emoticon/senang.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Senang</small><center class="replace_smile" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_smile']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="shock"><img src="<?=base_url()?>img/emoticon/terkejut.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Terkejut</small><center class="replace_shock" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_shock']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="inspired"><img src="<?=base_url()?>img/emoticon/terinspirasi.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Terinspirasi</small><center class="replace_inspired" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_inspired']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_happy']?></center></a>-->
  <a class="emoticon" type_emot="happy"><img src="<?=base_url()?>img/emoticon/bangga.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Bangga</small><center class="replace_happy" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_happy']?></center></a>
  </div>  
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="sad"><img src="<?=base_url()?>img/emoticon/sedih.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Sedih</small><center class="replace_sad" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_sad']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="fear"><img src="<?=base_url()?>img/emoticon/takut.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Takut</small><center class="replace_fear" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_fear']?></center></a>
  </div>    
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="angry" style="cursor:pointer"><img src="<?=base_url()?>img/emoticon/marah.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Marah</small><center class="replace_angry" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_angry']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="fun" style="cursor:pointer"><img src="<?=base_url()?>img/emoticon/terhibur.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Terhibur</small><center class="replace_fun" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['tube_fun']?></center></a>
  </div>  
</div>
<h6 id="t4">Bagikan</h6>

<div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyetube_storage/<?php print $row['thumb']; ?>"></div>

<div class="fb-comments" data-href="http://eyesoccer.id<?=$_SERVER['REQUEST_URI']?>" data-numposts="5"></div>
</div>

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
<div class="col-lg-4 col-md-4">
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive"><br>

<ul class="nav nav-pills nav-justified">
  <li class="active" style="border-radius:0px;"><a data-toggle="tab" href="#mn900" class="border" id="a99">Video Kamu</a></li>
  <li><a data-toggle="tab" href="#mn901" class="border" id="a99">Soccer Sains</a></li>  
    <li><a data-toggle="tab" href="#mn902" class="border" id="a99">Profile SSB</a></li>

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
		<small id="set6" style="color:#6A5ACD">'.$row19['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row19['tube_like'].' Suka</small>	  
    </div>
  </div>
';  
}
?>
  </div>
  <div id="mn901" class="tab-pane fade">
<?php 
$cmd11=$this->db->query("select * from tbl_eyetube where title like'%soccer science%' and active='1' order by eyetube_id desc limit 5");
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
<script> 
$(document).ready(function(){
   $('video').bind('contextmenu',function() { return false; });
});
function openNav1() {document.getElementById("myNav1").style.width = "100%";}
function openNav2() {document.getElementById("myNav2").style.width = "100%";}
function closeNav1() {document.getElementById("myNav1").style.width = "0%";}  
function closeNav2() {document.getElementById("myNav2").style.width = "0%";}  
</script>
<script>
$(document).ready(function(){
  pw=parseInt($(".parent-image").width());
  cw=parseInt($(".child-image").width());
  perpc=(cw/pw)*100;
  if(perpc>=70)
  {
    $(".child-image").width(pw);
  }
//alert(perpc);
  $(".emoticon").click(function(){
   // alert("tes");
    id=$("#eyetube_id22").val();
    type=$(this).attr("type_emot");
    link="eyetube";
    $.ajax({

    type: "POST",
    data: { 'type':type,'id':id,'link':link},
    url: "<?=base_url()?>eyetube/emot/"+id,
    dataType: "json",
    success:function(data){
  
    $(".replace_"+type).empty().html(data.html);
    



    //alert(  $(".replace-"+replaced).html());


    }

    });
  })
}) 
</script>