<div class="header-iphone" style="">
<div class="col-lg-8 col-xs-12 col-md-8">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
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
<!--
<div class="hidden-md hidden-lg">
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Liga" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Liga</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Berita" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Berita</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Usia Muda" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Usia Muda</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Soccer Sains" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Sains</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Umpan Lambung" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Umpan Lambung</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Ulas Tuntas" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Ulas Tuntas</a></div></div>
</div>
</div><br><br>
<h4 id="t100" style="padding-top:20px;"><a href="<?=base_url()?>eyevent" class="btn btn-info btn-sm" style="border-radius:0px;">&ensp;HOME&ensp;</a>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-12 col-sm-12"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Di Pinggir Lapangan</a></div></div>
</div>
</div> 

</div>
-->
<div style="clear:left"></div>
<h4 id="t100" style="padding-top:5px;"><img src="<?=base_url()?>img/icon_eyevent.png" class="img img-responsive" style="width:25px;height:30px;display:inline;"> EYEVENT LAINNYA</h4>
<!--<h1 id="t100"><i class="fa fa-newspaper-o"></i> BERITA TERKINI</h1>  -->
<hr style="margin-top:15px;margin-bottom:20px;"></hr>


<div class="">

<div class="row">

<?php
date_default_timezone_set('Asia/Jakarta');
$dataPerPage = 9;

if(isset($_GET['page']))

{

$noPage = $_GET['page'];

} 

else $noPage = 1;

$offset = ($noPage - 1) * $dataPerPage;
$offset+=4;
$result=$this->db->query("select * from tbl_event where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on<='".date("Y-m-d H:i:s")."' desc LIMIT ".$offset.",".$dataPerPage);

foreach($result->result_array() as $data)

{
  if(strstr($data["thumb1"], "."))
  {
    $data['pic']=$data['thumb1'];
  }
echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
<div class="thumbnail drop-shadow2">
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


$query=$this->db->query("SELECT * FROM tbl_event where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on<='".date("Y-m-d H:i:s")."' desc");

$hasil=($query->num_rows());

$jumPage = ceil($hasil/$dataPerPage);

echo "<div style='clear:left;'></div><center><ul class='pagination'>";

if ($noPage > 1) echo  "<a href='el?page=".($noPage-1)."' id='pg1'>Prev</a>&nbsp;";

for($page = 1; $page <= $jumPage; $page++)

{

if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

{   

if (($page == 1) && ($page != 2))  echo ""; 

if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

else echo "<a href='el?page=$page' id='pg1'>".$page."</a>&nbsp;";

$page = $page;          

}

}

if ($noPage < $jumPage) echo "<a href='el?page=".($noPage+1)."' id='pg1'>Next</a>&nbsp;";

echo "</ul></center>";   

?>  

</div>

</div>


</div>

<div class="col-lg-4 col-md-4 col-xs-12"><br><br><br><br>

<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[0][3]; ?>" class="img img-responsive"><div class="hidden-xs hidden-sm"><br></div>

<div class="hidden-xs hidden-sm"><br>
<form method="get" action="">
<div class="form-group">
<!--<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-danger" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>-->
</div>  
</form>
</div>
<!--
<div class="hidden-xs hidden-sm">

<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Liga" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Liga</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Berita" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Berita</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Usia Muda" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Usia Muda</a></div></div>
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
<div class="col-lg-12 col-md-12"><div class="row" style="padding:2px;" id="t100"><a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Di Pinggir Lapangan</a></div></div>
</div>
</div> 

<br><br></div>
-->
<!--<div class="hidden-xs hidden-sm">
<h1 id="t100"><i class="fa fa-newspaper-o"></i> Berita Rekomendasi</h1>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>

</div>-->
<!--<div class="hidden-md hidden-lg"><br>
<ul class="nav nav-tabs">
    <li class="active mytab1"><a data-toggle="tab" hreff="#mn1" class="mytab" totab="mytab1">Berita Rekomendasi</a></li>
    <li class="mytab1"><a data-toggle="tab" hreff="#mn2" class="mytab" totab="mytab1">Berita Terpopuler</a></li>
</ul>
  <div class="tab-content">
    <div id="mn1" class="tab-pane fade in active mytab1"><br>

    </div>
    <div id="mn2" class="tab-pane fade in mytab1"><br>

    </div>
  </div>
</div>-->
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
