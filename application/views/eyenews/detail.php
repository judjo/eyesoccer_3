<?php
		$eyenews_id=$eyenews_id;
		$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
		$date2=date("Y-m-d H:i:s");

		$cekview=$this->db->query("SELECT * FROM tbl_view WHERE visit_date>='".$date1."' AND visit_date<='".$date2."' AND type_visit='view' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1")->row_array();
		if($cekview<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_view=news_view+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}

		
		
		$cmd=$this->db->query("select * from tbl_eyenews a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyenews_id='".$eyenews_id."'");
		//echo "select * from tbl_eyenews a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyenews_id='".$eyenews_id."'"
		$row=$cmd->row_array();
		$terkait=$row['news_type'];
		
		
?>

<div class="container">
<div class="col-lg-12 col-md-12"><br>
<style>
/*.img-detail{
    float: left;
    margin: 0 20px 20px 0;
    width: 150px;
    height: 150px;
}*/

.detail {
    text-align: justify;
    text-indent: 5em;
}
@media only screen and (max-width: 768px) {
  #emoji {
    font-size: x-small;
  }
}
.itemss {
		min-height: 60px;
		width: 100%;
		border: 1px solid #999;
		background-color: #eee;
		text-align: center;
		margin-top: 10px;
    }
</style>

<div class="col-lg-8 col-md-8 parent-image"><div class="hidden-xs hidden-sm"><br></div>
<a href="<?=base_url()?>eyenews" class="btn btn-info btn-sm">Home</a>
<a href="<?=base_url()?>eyenews/search/<?=$row['news_type']?>" class="btn btn-warning btn-sm">
<?php 
if($row['news_type'] =="Berita"){
	$row['news_type']="Peristiwa";
}else if($row['news_type']=="Usia Muda"){
	$row['news_type']="Pembinaan";
}else{
	$row['news_type']=$row['news_type'];
}
echo $row['news_type'];
?></a>
<?php
if($row['sub_category_name']=="" || $row['sub_category_name']=="0"){
print "";
}
else{
print '<a href="'.base_url().'eyenews/search/'.$row['news_type'].'?sub='.$row['sub_category_name'].'" class="btn btn-warning btn-sm">'.$row['sub_category_name'].'</a>';
}
?>

<h5 id="t3"><?php print $row['title']; ?></a></h5>
<p id="p1">Oleh <b><?=$row['fullname']?></b> - <?php print $row['createon']; ?> </p>
<div class="pull-left">
<img src="<?=base_url()?>systems/eyenews_storage/<?php print $row['pic']; ?>" class="img img-responsive child-image" style="padding-right:0px;width:100%;">
<i style="float:right; font-size:11px;"><?php if($row['credit']==""){print "";}else{ print "Credit : ".$row['credit'];} ?></i>
<!--<img src="<?=base_url()?>img/src="<?=base_url()?>img/.jpg" style="width:774px;height:420px">--><br>
<small class="hidden-lg hidden-md"><center><i class="fa fa-eye"></i> <?=$row['news_view']?> | <a class="emoticon replace_like" type_emot="like" style="color:#E13E45;"><i class="fa fa fa-heart"></i> <span class="replace_like"><?=$row['news_like']?></span></a></center></small>
<small class="hidden-xs hidden-sm"><center><i class="fa fa-eye"></i> <?=$row['news_view']?> | <a class="emoticon " type_emot="like" style="color:#E13E45;"><i class="fa fa fa-heart"></i> <span class="replace_like"><?=$row['news_like']?></span></a></center></small>
<!--<br><i style="float:right"><?php if($row['credit']==""){print "";}else{ print "Credit : ".$row['credit'];} ?></i>-->
<div style="clear:right"></div>
<br></div>

<p class="detail">
<?php
$linklainnya=$this->db->query("select * from tbl_eyenews where eyenews_id!='".$eyenews_id."' and publish_on<='".date("Y-m-d H:i:s")."' and news_type='".$row['news_type']."' order by publish_on DESC limit 3");
$cek = $linklainnya->num_rows();
if($cek<1)
{
	$linklainnya=$this->db->query("select * from tbl_eyenews where eyenews_id!='".$eyenews_id."' and publish_on<='".date("Y-m-d H:i:s")."' and news_type='Berita' order by publish_on DESC limit 3");
}
// $linklainnya=$this->db->query("select * from tbl_eyenews where news_type='".$row['news_type']."' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on DESC limit 1,1");
$description=explode("<p>",$row['description']);
//print_r($description);
$i=0;
foreach($description as $key => $ds)
{
  if($key%3==0&&$key>0&&$key<9)
  {    
    $rowlainnya=$linklainnya->row_array($i);
    echo "<a href='".base_url()."eyenews/detail/".$rowlainnya["eyenews_id"]."' id='a4' class=''><div class='col-lg-12 col-xs-12 bg-default thumbnail' style='line-height:200%;padding-left:10px;padding-right:10px;'><p class='h6 text-bold' style='color:#EE2351;'>Baca Juga :  ".$rowlainnya["title"]."</p></div></a>";
	$i++;
  }
  echo "<p class='text-justify'>".$ds;
}

//print $row['description']; ?> 
</p><br>
<?php
/*$cmdv=$this->db->query("select * from tbl_eyetube where category_name='Eye soccer Flash' order by eyetube_id desc");
$rowv=mysqli_fetch_array($cmdv);
print '
<div class="hidden-xs hidden-sm"><video width="640" height="360" poster="systems/eyetube_storage/'.$rowv['thumb'].'" controls controlsList="nodownload" autoplay>
<source src="<?=base_url()?>systems/eyetube_storage/'.$rowv['video'].'" type="video/mp4"/></video></div>
<div class="hidden-md hidden-lg"><video width="640" height="360" poster="systems/eyetube_storage/'.$rowv['thumb'].'" controls controlsList="nodownload" muted autoplay>
<source src="<?=base_url()?>systems/eyetube_storage/'.$rowv['video'].'" type="video/mp4"/></video></div>
<br><br>';*/
?>
<!--<small class="hidden-lg hidden-md"><center><i class="fa fa-eye"></i> <?=$row['news_view']?> </center></small>
<small class="hidden-xs hidden-sm"><center><i class="fa fa-eye"></i> <?=$row['news_view']?> </center></small>-->
<br>


<input type="hidden" id="eyenews_id22" value="<?=$eyenews_id?>" />
<h3 id="t1">Bagaimana reaksi Anda tentang artikel ini?</h3>
<div class="col-lg-12 col-md-12" id="emoji" style="padding-left:0px;">
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="smile"><img src="<?=base_url()?>img/emoticon/senang.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Senang</small><center class="replace_smile" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_smile']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="shock"><img src="<?=base_url()?>img/emoticon/terkejut.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Terkejut</small><center class="replace_shock" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_shock']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="inspired"><img src="<?=base_url()?>img/emoticon/terinspirasi.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Terinspirasi</small><center class="replace_inspired" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_inspired']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_happy']?></center></a>-->
  <a class="emoticon" type_emot="happy"><img src="<?=base_url()?>img/emoticon/bangga.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Bangga</small><center class="replace_happy" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_happy']?></center></a>
  </div>  
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="sad"><img src="<?=base_url()?>img/emoticon/sedih.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Sedih</small><center class="replace_sad" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_sad']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="fear"><img src="<?=base_url()?>img/emoticon/takut.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Takut</small><center class="replace_fear" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_fear']?></center></a>
  </div>    
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="angry" style="cursor:pointer"><img src="<?=base_url()?>img/emoticon/marah.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Marah</small><center class="replace_angry" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_angry']?></center></a>
  </div>
  <div class="col-md-1 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="fun" style="cursor:pointer"><img src="<?=base_url()?>img/emoticon/terhibur.png" class="img-responsive max-width: 100% height: auto"><small style="color:#fff">Terhibur</small><center class="replace_fun" style="background:#117A65;color:#fff;text-align:center;padding:1px;"><?=$row['news_fun']?></center></a>
  </div>  
</div><br>
<h6 id="t4">Bagikan</h6>
<hr></hr>
<div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyenews_storage/<?php print $row['pic']; ?>"></div>
<hr></hr>
<div class="fb-comments" data-href="http://eyesoccer.id<?=$_SERVER['REQUEST_URI']?>" data-numposts="5"></div>
<div id="containerss">
</div>
<img style='width: 40%;margin-left: 30%;display:none' class='load-gif' src='../../assets/img/loadingsoccer.gif' alt='Loading'>

<!--
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="#"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
-->
<br>

</div>

<div class="col-lg-4 col-md-4"><div class="hidden-xs hidden-sm"><br><br></div>
<?php
$cmd_ads1=$this->db->query("select * from tbl_ads where ads_id='20'");
$row_ads1=$cmd_ads1->row_array();
print'
<img src="'.base_url().'systems/eyeads_storage/'.$row_ads1['pic'].'" class="img img-responsive hidden-md hidden-lg"><br>';
?>

<ul class="nav nav-tabs hidden-xs hidden-sm">
    <li class="active mytab1"><a data-toggle="tab" hreff="#mtab" class="mytab" totab="mytab1">Terkini</a></li>
    <li class="mytab1"><a data-toggle="tab" hreff="#mn1" class="mytab" totab="mytab1">Terkait</a></li>
    <li class="mytab1"><a data-toggle="tab" hreff="#mn2" class="mytab" totab="mytab1">Terpopuler</a></li>
</ul>
<ul class="nav nav-tabs hidden-md hidden-lg" style="display:none;">
    <li class="active mytab1"><a data-toggle="tab" hreff="#mtab" class="mytab" totab="mytab1">Terkini</a></li>
    <li class="mytab1"><a data-toggle="tab" hreff="#mn1" class="mytab" totab="mytab1">Terkait</a></li>
    <li class="mytab1"><a data-toggle="tab" hreff="#mn2" class="mytab" totab="mytab1">Terpopuler</a></li>
</ul>
<!--<ul class="nav nav-pills nav-stacked hidden-md hidden-lg">
    <li class="active"><a data-toggle="tab" href="#mtab" class="mytab">Berita Terkinis</a></li>
    <li><a data-toggle="tab" href="#mn1" class="mytab">Berita Terkait</a></li>
    <li><a data-toggle="tab" href="#mn2" class="mytab">Berita Terpopuler</a></li>
</ul>-->

  <div class="tab-content" style="display:none;">
    <div id="mtab" class="tab-pane fade in active mytab1">
    <div style="padding-bottom:5px;"></div>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyenews_id=$row1['eyenews_id']; 

  if(strstr($row1["thumb2"], "."))
  {
    $row1['pic']=$row1['thumb2'];
  }
print '

  <div class="media drop-shadow">
  
    <div class="media-left ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'"><img src="'.base_url().'systems/eyenews_storage/'.$row1['pic'].'" class="media-object " id="img4" ></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'" id="a4" class=""><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a>
    </div>
  </div>
';  
}
?>
    </div>  
    <div id="mn1" class="tab-pane fade in mytab1">
    <div style="padding-bottom:5px;"></div>
<?php
$cmd2=$this->db->query("select * from tbl_eyenews where news_type='$terkait' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 1,5");
foreach($cmd2->result_array() as $row2){
$eyenews_id=$row2['eyenews_id']; 

  if(strstr($row2["thumb2"], "."))
  {
    $row2['pic']=$row2['thumb2'];
  }
print '

  <div class="media drop-shadow">
  
    <div class="media-left ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'"><img src="'.base_url().'systems/eyenews_storage/'.$row2['pic'].'" class="media-object " id="img4" ></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'" id="a4" class=""><p class="media-heading">'.$row2['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row2['createon'].'</small></a>
    </div>
  </div>
';  
}
?>
    </div>
    <div id="mn2" class="tab-pane fade in mytab1">
    <div style="padding-bottom:5px;"></div>
<?php
$cmd3=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 5");
foreach($cmd3->result_array() as $row3){
$eyenews_id=$row3['eyenews_id']; 
/*  echo '<div class="thumbnail">
      <a href="'.base_url().'eyenews/detail/'.$row1['eyenews_id'].'">
        <img src="<?=base_url()?>systems/eyenews_storage/'.$row1['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
      print $row1 ['title'];
  echo '
  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small>
  </p>
        </div>
      </a>
    </div>';*/
  if(strstr($row3["thumb2"], "."))
  {
    $row3['pic']=$row3['thumb2'];
  }
print '

  <div class="media drop-shadow">
  
    <div class="media-left ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'"><img src="'.base_url().'systems/eyenews_storage/'.$row3['pic'].'" class="media-object " id="img4" ></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'" id="a4" class=""><p class="media-heading">'.$row3['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row3['createon'].'</small></a>
    </div>
  </div>
';  
}
?>
    </div>
  </div>
<?php
$cmd_ads2=$this->db->query("select * from tbl_ads where ads_id='20'");
$row_ads2=$cmd_ads2->row_array();
print'
<img src="'.base_url().'systems/eyeads_storage/'.$row_ads2['pic'].'" class="img img-responsive hidden-xs hidden-sm">';
?>
<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ads unit 3 -->
<!--<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6403991612334960"
     data-ad-slot="6701528663"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>-->
	<div style="display:none;">
  <h1 id="t100"><i class="fa fa-play-circle-o fa-lg"></i> Video Terbaru</h1> 
  <hr style="margin-top:10px;margin-bottom:10px;"></hr>
  <?php
  $cmd4=$this->db->query("select * from tbl_eyetube order by eyetube_id desc limit 5");
  foreach($cmd4->result_array() as $row4){
  $eyetube_id=$row4['eyetube_id']; 

    if(strstr($row4["thumb1"], "."))
    {
      $row4['pic']=$row4['thumb1'];
    }
  print '

    <div class="media drop-shadow">
    
      <div class="media-left ">
        <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'"><img src="'.base_url().'systems/eyetube_storage/'.$row4['thumb1'].'" class="media-object " id="img4" ></a>
      </div>
      <div class="media-body ">
        <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4" class=""><p class="media-heading">'.$row4['title'].'</p>
        <small id="set6"><i class="fa fa-clock-o"></i> '.$row4['createon'].'</small></a>
      </div>
    </div>
  ';  
  }
  ?>
  <div class="form-group text-right"><br><a href="<?=base_url().'eyetube'?>" class="btn btn-danger btn-sm">Selengkapnya</a></div>
  
  </div>
</div>

</div>
</div>
<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ads 1 -->
<!--<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6403991612334960"
     data-ad-slot="1685766471"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ads 2 -->
<!--<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6403991612334960"
     data-ad-slot="5820452607"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>-->
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
		id=$("#eyenews_id22").val();
		type=$(this).attr("type_emot");
		link="eyenews";
		$.ajax({

		type: "POST",
		data: { 'type':type,'id':id,'link':link},
		url: "<?=base_url()?>eyenews/emot/"+id,
		dataType: "json",
		success:function(data){
	
		$(".replace_"+type).empty().html(data.html);
		



		//alert(  $(".replace-"+replaced).html());


		}

		});
  });
		
		//Start infinite scroll
		var offset = 0;
        // create a long list of items
        var container = $("#containerss");
        var lastItemIndex = 0;
        var title = "";
        var loading = "<img style='width: 40%;margin-left: 30%;' class='load-gif' src='../../assets/img/loadingsoccer.gif' alt='Loading'>";
        var appendToList = function() {
			//getjson
			$.ajax({
				url: "../getRecentEyenews/" + offset,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{
					if(data[0]['title'] == 0){
						
					}else{
						// alert(JSON.stringify(data[0]['title']));
						$.each( data, function( key, data ) {
							$('.load-gif').hide();
							// console.log(data.title);
							var contentScroll = "<a href='/eyenews/detail/"+data.url+"'><div><img src='/systems/eyenews_storage/"+data.thumb1+"' style='width: 70px;'><div style='float:right;width: 73%;'>"+data.title+"</div></div></a>"
							var el = $("<div>").attr("class", "itemss").html(contentScroll);
							lastItemIndex = lastItemIndex + 1;
							container.append(el);
							
						});
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
			offset = offset+4;
			//end getjson
        }

        container.bind("infinite-scroll", function(args) {
          console.log("Received", args);
		  $('.load-gif').show();
          setTimeout(function(){ appendToList(); }, 1500);
        });

        var infiniteScroll = new $.InfiniteScroll('#containerss', true).setup();
        setTimeout(function(){ appendToList(); }, 1500);
}) 
</script>