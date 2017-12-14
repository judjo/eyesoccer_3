
<div class="col-lg-8 col-xs-12 col-md-8"><div class="hidden-xs hidden-sm"><br>

</div>
<div class="hidden-md hidden-lg"><img src="<?=base_url();?>systems/eyeads_storage/<?=$array[3][3];?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<h1 class="text-center" id="t2">EYENEWS</h1><br> 

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
  
echo '<div class="item '.$active.'" >
<div class="thumbnail">
      <a href="'.base_url().'eyenews/detail/'.$row11['eyenews_id'].'">
        <img src="'.base_url().'systems/eyenews_storage/'.$row11['pic'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
    <div class="caption">
          <p>';
      echo $row11['title'];
  echo '
  
  </p>
        </div>
      </a>
    </div>
 
</div>';

}

  ?> 
  </div>

  <a class="left carousel-control" href="#myCarousel1" data-slide="prev">

    <span class="glyphicon glyphicon-chevron-left"></span>

    <span class="sr-only">Previous</span>

  </a>

  <a class="right carousel-control" href="#myCarousel1" data-slide="next">

    <span class="glyphicon glyphicon-chevron-right"></span>

    <span class="sr-only">Next</span>

  </a>

</div>
<div class="hidden-md hidden-lg">
<form method="get" action="<?=base_url()?>search">
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  
</form>
</div>
<div class="hidden-md hidden-lg">
<h1 id="t2"><i class="fa fa-futbol-o"></i> Rubrik</h1>
<hr></hr>
<a href="<?=base_url()?>eyenews/search/Liga" id="a9"><div id="set11"><span class="label label-success" id="set10">LIGA</span></div></a>
<a href="<?=base_url()?>eyenews/search/Usia Muda" id="a9"><div id="set11"><span class="label label-success" id="set10">USIA MUDA</span></div></a>
<a href="<?=base_url()?>eyenews/search/Soccer Sains" id="a9"><div id="set11"><span class="label label-success" id="set10">SOCCER SAINS</span></div></a>
<a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" id="a9"><div id="set11"><span class="label label-success" id="set10">DI PINGGIR LAPANGAN</span></div></a>
<a href="<?=base_url()?>eyenews/search/Ulas Tuntas" id="a9"><div id="set11"><span class="label label-success" id="set10">ULAS TUNTAS</span></div></a>
<a href="<?=base_url()?>eyenews/search/Umpan Lambung" id="a9"><div id="set11"><span class="label label-success" id="set10">UMPAN LAMBUNG</span></div></a>
<a href="<?=base_url()?>eyenews/search/Berita" id="a9"><div id="set11"><span class="label label-success" id="set10">BERITA</span></div></a><br><br>
<br></div>
<div style="clear:left"></div>
<h1 id="t2"><i class="fa fa-newspaper-o"></i> BERITA TERBARU</h1>  

<hr></hr>


<div class="">

<div class="row">
 <?php
$result=$this->db->query("SELECT * FROM tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  LIMIT 15");

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
        <img src="systems/eyenews_storage/'.$data['pic'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
     <div class="caption">
          <br /><p>';
      print $data ['title'];
  echo '
  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small>
  </p>
        </div></div>
       
      </a>
    </div>
 
</div>';

}
 
 ?>

</div>

</div>


</div>

<div class="col-lg-4 col-md-4 col-xs-12"><br><br>

<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[0][3]; ?>" class="img img-responsive"><div class="hidden-xs hidden-sm"><br></div>

<div class="hidden-xs hidden-sm">
<form method="get" action="<?=base_url()?>search">
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  
</form>
</div>
<div class="hidden-xs hidden-sm">
<h1 id="t2"><i class="fa fa-futbol-o"></i> Rubrik</h1>
<hr></hr>
<a href="<?=base_url()?>eyenews/search/Liga" id="a9"><div id="set11"><span class="label label-success" id="set10">LIGA</span></div></a>
<a href="<?=base_url()?>eyenews/search/Usia Muda" id="a9"><div id="set11"><span class="label label-success" id="set10">USIA MUDA</span></div></a>
<a href="<?=base_url()?>eyenews/search/Soccer Sains" id="a9"><div id="set11"><span class="label label-success" id="set10">SOCCER SAINS</span></div></a>
<a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" id="a9"><div id="set11"><span class="label label-success" id="set10">DI PINGGIR LAPANGAN</span></div></a>
<a href="<?=base_url()?>eyenews/search/Ulas Tuntas" id="a9"><div id="set11"><span class="label label-success" id="set10">ULAS TUNTAS</span></div></a>
<a href="<?=base_url()?>eyenews/search/Umpan Lambung" id="a9"><div id="set11"><span class="label label-success" id="set10">UMPAN LAMBUNG</span></div></a>
<a href="<?=base_url()?>eyenews/search/Berita" id="a9"><div id="set11"><span class="label label-success" id="set10">BERITA</span></div></a><br><br>
<br></div>
<div style="clear:left"></div>
<h1 id="t2"><i class="fa fa-newspaper-o"></i> Berita Terkait</h1>
<hr></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
foreach($cmd1->result_array() as $row1 ){
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
<div class="hidden-md hidden-lg"><br></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-md hidden-lg"><div class="hidden-xs hidden-sm"><br></div>
<h1 id="t2">
<i class="fa fa-newspaper-o"></i> Berita Terpopuler</h1>
<hr></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 5");
foreach($cmd1->result_array() as $row1 ){
$eyenews_id=$row1['eyenews_id']; 
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
  if(strstr($row1["thumb2"], "."))
  {
    $row1['pic']=$row1['thumb2'];
  }
print '

  <div class="media drop-shadow">
  
    <div class="media-left ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'"><img src="<?=base_url()?>systems/eyenews_storage/'.$row1['pic'].'" class="media-object " id="img4" ></a>
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
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-xs hidden-sm">
</div>

