
<div class="container header-iphone" style="">

<div class="col-lg-8 col-xs-12 col-md-8">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<a href="<?=base_url()?>eyenews"><h1 class="text-center" id="t101"><img src="http://eyesoccer.id/img/icon_eyenews.png" class="img img-responsive" style="width:30px;height:30px;display:inline;"> EyeNews</h1></a>
<div class="hidden-xs hidden-sm"><br></div>
<div id="myCarousel1" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner" style="height:50%">

     <?php

$cmd11=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 0,4");
$active="1";
foreach($cmd11->result_array() as $row11){
  if($active=="1")
  {
    $active="active";
    
  }
  else{
    $active="";
  }
  
/*echo '<div class="item '.$active.'" >
<div class="thumbnail">
      <a href="'.base_url().'eyenews/detail/'.$row11['eyenews_id'].'">
        <img src="'.base_url().'systems/eyenews_storage/'.$row11['pic'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
    <div class="caption">
          <p>';
      print $row11 ['title'];
  echo '
  
  </p>
        </div>
      </a>
    </div>
 
</div>';*/

print '
<div class="item '.$active.' text-center">
    <div class="set100">
    <a href="'.base_url().'eyenews/detail/'.$row11['eyenews_id'].'">
    	<img src="'.base_url().'systems/eyenews_storage/'.$row11['pic'].'" class="img-polaroid thumbnail2 hidden-xs hidden-sm" alt="Lights" style="height:520px;margin: 0 auto;">
      <img src="'.base_url().'systems/eyenews_storage/'.$row11['pic'].'" class="img-polaroid thumbnail2 hidden-md hidden-lg" alt="Lights" style="width:100%;margin: 0 auto;">
    	<div id="set-top-left-100">Headline</div> 
	    <div id="setcenter104">'.$row11['title'].'</div>
	</a>    
    </div>
</div>
';

}

  ?>
  </div>

  <a class="left carousel-control" href="#myCarousel1" data-slide="prev" style="">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel1" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
<div class="hidden-md hidden-lg"><br>
<form method="get" action="">
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<input type="hidden" name="nopagesearch" value="0" class="form-control">
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-danger" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  
</form>
</div>
<div class="hidden-md hidden-lg">
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Liga" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Liga</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Berita" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Peristiwa</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Usia Muda" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Pembinaan</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Soccer Sains" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Sains</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Umpan Lambung" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Umpan Lambung</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Ulas Tuntas" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Ulas Tuntas</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Prediksi" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Prediksi</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Soccer Seri" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Seri</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-12 col-sm-12"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Di Pinggir Lapangan</a></div></div>
</div>
</div> 

</div>
<div style="clear:left"></div>
<?php
if(isset($_GET['search'])){
	if($_GET['search']=='populer'){
		echo '<h1 id="t100"><i class="fa fa-newspaper-o"></i> BERITA TERPOPULER</h1>  ';
	}else if($_GET['search']=='rekomendasi'){
		echo '<h1 id="t100"><i class="fa fa-newspaper-o"></i> BERITA REKOMENDASI</h1>  ';
	}else{
		echo '<h1 id="t100"><i class="fa fa-newspaper-o"></i> Hasil Pencarian : "'.$_GET['search'].'"</h1>  ';
	}
}else{
	echo '<h1 id="t100"><i class="fa fa-newspaper-o"></i> BERITA TERKINI</h1>  ';
}
?>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>


<div class="">

<div class="row">

<?php

$dataPerPage = 12;

if(isset($_GET['page']))

{

$noPage = $_GET['page'];

} 

else $noPage = 1;

$offset = ($noPage - 1) * $dataPerPage;
if(isset($_GET['nopagesearch'])){
	$offset=$_GET['nopagesearch'];
}else{
	$offset+=4;
}
echo "SELECT * FROM tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' ".$searchnews." ".$order."  LIMIT ".$offset.",".$dataPerPage;
$result=$this->db->query("SELECT * FROM tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' ".$searchnews." ".$order."  LIMIT ".$offset.",".$dataPerPage);
// echo "SELECT * FROM tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' ".$searchnews." ".$order."  LIMIT ".$offset.",".$dataPerPage;
foreach($result->result_array() as $data)

{
  if(strstr($data["thumb2"], "."))
  {
    $data['pic']=$data['thumb2'];
  }
echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyenews/detail/'.$data['eyenews_id'].'">
    <div style="height:70% !important;width:100% !important;padding-bottom:-30%">
        <img src="'.base_url().'systems/eyenews_storage/'.$data['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
     <div class="caption" id="t102">
          <br />';
      print $data ['title'];
  echo '
  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small><br><br>
         <i class="fa fa-eye" style="color:#31F1EF"> '.$data['news_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$data['news_like'].'</i>   			
        </div></div>
       
      </a>
    </div>
 
</div>';
}


$query=$this->db->query("SELECT * FROM tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."'  ".$searchnews." ".$order."");
// echo "SELECT * FROM tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."'  ".$searchnews." ".$order."";
$hasil=($query->num_rows());

$jumPage = ceil($hasil/$dataPerPage);
$pagesearchno1 = "";
echo "<div style='clear:left;'></div><center><ul class='pagination'>";
if(($noPage-1)==1){
	$resnopage = 0;
}else{
	$resnopage = $noPage-1;
}
if ($noPage > 1) {
	if (($resnopage==0)&&(!empty($pagingsearch))){
		$pagesearchno1="nopagesearch=0";
		$pagenumber = $pagesearchno1;
	}else{
		$noPageNew = $noPage-1;
		$pagenumber = "page=$noPageNew";
	}
echo  "<a href='eyenews?$pagenumber".$pagingsearch."' id='pg1'>Prev</a>&nbsp;";
}

for($page = 1; $page <= $jumPage; $page++)

{

if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

{   

if (($page == 1) && ($page != 2))  {echo "";} 

if (($page != ($jumPage - 1)) && ($page == $jumPage))  {echo "";}

if ($page == $noPage) {echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";


}
else {
	if (($page==1)&&(!empty($pagingsearch))){
		$pagesearchno1="nopagesearch=0";
		$pagenumber = $pagesearchno1;
	}else{
		$pagenumber = "page=$page";
	}
		echo "<a href='eyenews?$pagenumber".$pagingsearch."' id='pg1'>".$page."</a>&nbsp;";
}
// else {echo "<a href='eyenews?page=$page".$pagingsearch."' id='pg1'>".$page."</a>&nbsp;";}

$page = $page;          

}

}

if ($noPage < $jumPage) echo "<a href='eyenews?page=".($noPage+1)."".$pagingsearch."' id='pg1'>Next</a>&nbsp;";

echo "</ul></center>";   

?>  

</div>

</div>


</div>

<div class="col-lg-4 col-md-4 col-xs-12"><div class="hidden-xs hiddem-sm"><br><br><br><br></div>

<img src="<?php echo base_url()?>systems/eyeads_storage/<?php print $array[0][3]; ?>" class="img img-responsive"><div class="hidden-xs hidden-sm"></div>
<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ads unit 3 -->
<!--<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6403991612334960"
     data-ad-slot="6701528663"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>--><div class="hidden-xs hidden-sm"><br></div>

<div class="hidden-xs hidden-sm"><br>
<form method="get" action="">
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<input type="hidden" name="nopagesearch" value="0" class="form-control">
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-danger" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  
</form>
</div>
<div class="hidden-xs hidden-sm">

<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Liga" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Liga</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Berita" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Peristiwa</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Usia Muda" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Pembinaan</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Soccer Sains" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Sains</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Umpan Lambung" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Umpan Lambung</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Ulas Tuntas" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Ulas Tuntas</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Prediksi" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Prediksi</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Soccer Seri" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Seri</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-12 col-md-12"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Di Pinggir Lapangan</a></div></div>
</div>
</div>

<br><br></div>
<div class="hidden-xs hidden-sm">
<a href="<?=base_url()?>eyenews?search=rekomendasi&nopagesearch=0"><h1 id="t100"><i class="fa fa-newspaper-o"></i> Berita Rekomendasi</h1></a>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where category_news='2' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
foreach($cmd1->result_array() as $row1){
$eyenews_id=$row1['eyenews_id']; 
/*  echo '<div class="thumbnail">
      <a href="'.base_url().'eyenews/detail/'.$row1['eyenews_id'].'">
        <img src="'.base_url().'systems/eyenews_storage/'.$row1['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
      print $row1 ['title'];
  echo '
  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small>
  </p>
        </div>
      </a>
    </div>';*/
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
<div class="hidden-md hidden-lg"><br>
<ul class="nav nav-tabs">
    <li class="active mytab1"><a data-toggle="tab" hreff="#mn1" class="mytab" totab="mytab1" style="padding-left:2px;">Berita Rekomendasi</a></li>
    <li class="mytab1"><a data-toggle="tab" hreff="#mn2" class="mytab" totab="mytab1" style="padding-right:2px;">Berita Terpopuler</a></li>
</ul>
  <div class="tab-content">
    <div id="mn1" class="tab-pane fade in active mytab1"><br>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where category_news='2' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
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
    <div id="mn2" class="tab-pane fade in mytab1"><br>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 5");
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
  </div>
</div>
<div class="hidden-md hidden-lg"><br>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-md hidden-lg"><div class="hidden-xs hidden-sm"><br></div><br>
<a href="<?=base_url().'eyevent'?>"><h1 id="t100"><i class="fa fa-calendar"></i> Jadwal Bola Live TV</h1></a>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>
<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 3");
foreach($jadwal->result_array() as $data){

print'

<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
<hr style="margin-top:5px;"></hr>';
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyevent?tab=live' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>
</div>

<div class="hidden-xs hidden-sm">
<a href="<?=base_url()?>eyenews?search=populer&nopagesearch=0"><h1 id="t100"><i class="fa fa-newspaper-o"></i> Berita Terpopuler</h1></a>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 5");
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
<br><br>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-xs hidden-sm"><br>
<a href="<?=base_url().'eyevent'?>"><h1 id="t100"><i class="fa fa-calendar"></i> Jadwal Bola Live TV</h1></a>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>
<?php 
$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b WHERE a.live_pertandingan!='' AND jadwal_pertandingan>='".date("Y-m-d")."' order by jadwal_pertandingan ASC LIMIT 3");
foreach($jadwal->result_array() as $data){

print'

<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
<hr style="margin-top:5px;"></hr>';
}
print "<div class='form-group text-right' style='padding-top:15px;'><a href='".base_url()."eyevent?tab=live' class='btn btn-danger btn-sm'>selengkapnya</a></div>";
?>
</div>

</div>



</div>
