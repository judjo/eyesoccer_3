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

		if(isset($action) && $action=="like")
		{

		$ceklike=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='like' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($ceklike<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_like=news_like+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','like','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}


		if(isset($action) && $action=="smile")
		{

		$ceksmile=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='smile' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($ceksmile<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_smile=news_smile+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','smile','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}

		if(isset($action) && $action=="shock")
		{

		$cekshock=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='shock' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($cekshock<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_shock=news_shock+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','shock','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}

		if(isset($action) && $action=="inspired")
		{

		$cekinspired=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='inspired' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($cekinspired<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_inspired=news_inspired+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','inspired','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}


		if(isset($action) && $action=="happy")
		{

		$cekhappy=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='happy' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($cekhappy<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_happy=news_happy+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','happy','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}

		if(isset($action) && $action=="sad")
		{

		$ceksad=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='sad' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($ceksad<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_sad=news_sad+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','sad','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}

		if(isset($action) && $action=="fear")
		{

		$cekfear=mysqli_fetch_array($this->db->query("SELECT * FROM tbl_view WHERE type_visit='fear' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1"));
		if($cekfear<1)
		{
		$this->db->query("UPDATE tbl_eyenews SET news_fear=news_fear+1 WHERE eyenews_id='".$eyenews_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fear','eyenews','".$eyenews_id."','".$_SESSION["ip"]."')");
		}
		}
		
		$cmd=$this->db->query("select * from tbl_eyenews a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyenews_id='$eyenews_id'");
		$row=$cmd->row_array();
		$terkait=$row['news_type'];
		
		
?>
<div class="col-lg-11 col-md-11"><br>
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
</style>
<div class="col-lg-8 col-md-8 parent-image"><div class="hidden-xs hidden-sm"><br></div>
<a href="eyenews.php" class="btn btn-info btn-sm">Home</a>
<a href="" class="btn btn-warning btn-sm"><?php echo $row['news_type'];?></a> 
<h5 id="t3"><?php print $row['title']; ?></a></h5>
<p id="p1">Oleh <b><?=$row['fullname']?></b> - <?php print $row['createon']; ?> </p>
<div class="pull-left">
<img src="<?=base_url()?>systems/eyenews_storage/<?php print $row['pic']; ?>" class="img img-responsive child-image" style="padding-right:6px;">
<!--<img src="<?=base_url()?>img/src="<?=base_url()?>img/.jpg" style="width:774px;height:420px">--><br>
<small class="hidden-lg hidden-md"><center><i class="fa fa-eye"></i> <?=$row['news_view']?> | <a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&like=1" style="color:#E13E45;"><i class="fa fa fa-heart"></i> <?=$row['news_like']?></a></center></small>
<small class="hidden-xs hidden-sm"><center><i class="fa fa-eye"></i> <?=$row['news_view']?> | <a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&like=1" style="color:#E13E45;"><i class="fa fa fa-heart"></i> <?=$row['news_like']?></a></center></small>
<br></div>

<p class="detail">
<?php
$linklainnya=$this->db->query("select * from tbl_eyenews where eyenews_id!='".$eyenews_id."' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on DESC limit 3");
$description=explode("<p>",$row['description']);
//print_r($description);

foreach($description as $key => $ds)
{
  if($key%3==0&&$key>0&&$key<9)
  {
    $rowlainnya=$linklainnya->row_array();
    echo "<a href='".base_url()."eyenews/detail/".$rowlainnya["eyenews_id"]."' id='a4' class=''><div class='col-lg-12 col-xs-12 bg-default thumbnail drop-shadow' style='line-height:200%'><p class='h6 text-bold'>Baca Juga :  ".$rowlainnya["title"]."</p></div></a>";
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
<div class="row" id="emoji">
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="smile"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center class="replace_smile"><?=$row['news_smile']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="shock"><img src="<?=base_url()?>img/emoticon/New_Terkejut_1158.png" class="img-responsive max-width: 100% height: auto"><center>Terkejut</center><center class="replace_shock"><?=$row['news_shock']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="inspired"><img src="<?=base_url()?>img/emoticon/New_Terinspirasi_1158.png" class="img-responsive max-width: 100% height: auto"><center>Terinspirasi</center><center class="replace_inspired"><?=$row['news_inspired']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_happy']?></center></a>-->
  <a class="emoticon" type_emot="happy"><img src="<?=base_url()?>img/emoticon/New_Bangga_1158.png" class="img-responsive max-width: 100% height: auto"><center>Bangga</center><center class="replace_happy"><?=$row['news_happy']?></center></a>
  </div>  
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="sad"><img src="<?=base_url()?>img/emoticon/New_Sedih_1158.png" class="img-responsive max-width: 100% height: auto"><center>Sedih</center><center class="replace_sad"><?=$row['news_sad']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyenews/detail/<?=$eyenews_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['news_smile']?></center></a>-->
  <a class="emoticon" type_emot="fear"><img src="<?=base_url()?>img/emoticon/New_Takut_1158.png" class="img-responsive max-width: 100% height: auto"><center>Takut</center><center class="replace_fear"><?=$row['news_fear']?></center></a>
  </div>    
</div>
<h6 id="t4">Bagikan</h6>
<hr></hr>
<div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyenews_storage/<?php print $row['pic']; ?>"></div>

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

<div class="col-lg-4 col-xs-12"><div class="hidden-xs hidden-sm"><br><br></div>
<?php
$cmd_ads1=$this->db->query("select * from tbl_ads where ads_id='20'");
$row_ads1=$cmd_ads1->row_array();
print'
<img src="'.base_url().'systems/eyeads_storage/'.$row_ads1['pic'].'" class="img img-responsive hidden-md hidden-lg"><br>';
?>

<ul class="nav nav-tabs hidden-xs hidden-sm">
    <li class="active"><a data-toggle="tab" href="#mtab" class="mytab">Berita Terkini</a></li>
    <li><a data-toggle="tab" href="#mn1" class="mytab">Berita Terkait</a></li>
    <li><a data-toggle="tab" href="#mn2" class="mytab">Berita Terpopuler</a></li>
</ul>
<ul class="nav nav-tabs hidden-md hidden-lg">
    <li class="active"><a data-toggle="tab" href="#mtab" class="mytab">Terkini</a></li>
    <li><a data-toggle="tab" href="#mn1" class="mytab">Terkait</a></li>
    <li><a data-toggle="tab" href="#mn2" class="mytab">Terpopuler</a></li>
</ul>
<!--<ul class="nav nav-pills nav-stacked hidden-md hidden-lg">
    <li class="active"><a data-toggle="tab" href="#mtab" class="mytab">Berita Terkinis</a></li>
    <li><a data-toggle="tab" href="#mn1" class="mytab">Berita Terkait</a></li>
    <li><a data-toggle="tab" href="#mn2" class="mytab">Berita Terpopuler</a></li>
</ul>-->

  <div class="tab-content">
    <div id="mtab" class="tab-pane fade in active">
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
    <div id="mn1" class="tab-pane fade">
    <div style="padding-bottom:5px;"></div>
<?php
$cmd2=$this->db->query("select * from tbl_eyenews where news_type='$terkait' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 5");
foreach($cmd2->result_array() as $row1){
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
    <div id="mn2" class="tab-pane fade">
    <div style="padding-bottom:5px;"></div>
<?php
$cmd3=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 5");
foreach($cmd3->result_array() as $row1){
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


  <br><br>
<?php
$cmd_ads2=$this->db->query("select * from tbl_ads where ads_id='20'");
$row_ads2=$cmd_ads2->row_array();
print'
<img src="'.base_url().'systems/eyeads_storage/'.$row_ads2['pic'].'" class="img img-responsive hidden-xs hidden-sm">';
?>

</div>

</div>
