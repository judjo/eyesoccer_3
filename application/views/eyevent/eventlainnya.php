<div class="header-iphone" style="">
<div class="col-lg-8 col-xs-12 col-md-8">
<div class="hidden-xs hidden-sm"><br></div>

<div class="hidden-md hidden-lg"><br>
<form method="get" action="lists_eyevent">
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-danger" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  
</form>
</div>

<div style="clear:left"></div>
<h4 id="t100" style="padding-top:20px; color:#04B404;"><i class="fa fa-calendar"></i> EVENT LAINNYA</h4>

<div class="">
<div class="row">
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
$result=$this->db->query("SELECT * FROM tbl_event where id_event order by id_event desc LIMIT ".$posisi.",".$batas);
foreach($result->result_array() as $data)
{
echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
<div class="thumbnail">
      <a href="'.base_url().'eyevent/detail/'.$data['id_event'].'">
    <div style="height:70% !important;width:100% !important;padding-bottom:-30%">
        <img src="'.base_url().'systems/eyevent_storage/'.$data['pic'].'" class="img-polaroid thumbnail1" alt="Lights" style="width:100% !important;margin: 0 auto;">
     <div class="caption" id="t102">
          <br />';
      print $data ['title'];
  echo '
  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$data['publish_on'].'</small>
  			
        </div></div>
       
      </a>
    </div>
 
</div>';
}
$query=$this->db->query("SELECT * FROM tbl_event where id_event order by id_event desc");
$hasil=$query->num_rows();
$jmlhalaman = ceil($hasil/$batas);
echo "<div style='clear:left;'></div><center><ul class='pagination'>";
//echo "Halaman : ";

for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
 echo " <a href=\"eventlainnya?halaman=$i\">$i</a> | ";
}
else{ 
 echo " <b>$i</b> | "; 
}
?>  
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-xs-12"><br><br><br><br>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[0][3]; ?>" class="img img-responsive"><div class="hidden-xs hidden-sm"></div>
<div class="hidden-xs hidden-sm">
<form method="get" action="">
<div class="form-group">

</div>  
</form>
</div>

<div class="hidden-xs hidden-sm">
<h1 id="t100" style="color:#04B404;"><i class="fa fa-newspaper-o"></i> Berita Terbaru</h1>
	<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyenews_id=$row1['eyenews_id']; 

  if(strstr($row1["thumb2"], "."))
  {
    $row1['pic']=$row1['thumb2'];
  }
print '

  <div class="media">
  
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

<div class="hidden-xs hidden-sm">
<h1 id="t100" style="color:#04B404;"><i class="fa fa-play-circle-o"></i> Video Terbaru</h1>
	<?php
$cmd1=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id']; 

  if(strstr($row1["thumb1"], "."))
  {
    $row1['pic']=$row1['thumb1'];
  }
print '
<div class="media">
    <div class="media-left">
	<div id="set100">
	<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
      <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="media-object" id="img4" style="height:110px; width:150px;">
    <div id="setcenter105"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:35px;height:35px;"></div></a>
	</div>
	</div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row1["title"].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a><br>
		<small id="set6" style="color:#6A5ACD">'.$row1['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$row1['tube_like'].' Suka</small>	  
    </div>
  </div>
'; 
}
?>
</div>

<div class="hidden-md hidden-lg"><br>
<ul class="nav nav-tabs">
    <li class="active mytab1" style="#04B404;"><a data-toggle="tab" hreff="#mn1" class="mytab" totab="mytab1">Berita Rekomendasi</a></li>
    <li class="mytab1" style="#04B404;"><a data-toggle="tab" hreff="#mn2" class="mytab" totab="mytab1">Berita Terpopuler</a></li>
</ul>
  <div class="tab-content">
    <div id="mn1" class="tab-pane fade in active mytab1"><br>
		<?php
$cmd1=$this->db->query("select * from tbl_eyenews where news_type='Ulas Tuntas' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
foreach($cmd1->result_array() as $row1){
$eyenews_id=$row1['eyenews_id']; 
  if(strstr($row1["thumb2"], "."))
  {
	  
    $row1['pic']=$row1['thumb2'];
  }
print '

  <div class="media">
  
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

  <div class="media">
  
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

<div class="hidden-md hidden-lg"><br></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-md hidden-lg"><div class="hidden-xs hidden-sm"><br></div><br>

<!--<div class="hidden-xs hidden-sm">
<h1 id="t100"><i class="fa fa-newspaper-o"></i> Berita Terpopuler</h1>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>

<br><br>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-xs hidden-sm"><br><br>
</div>-->
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-xs hidden-sm">
</div>
</div>
