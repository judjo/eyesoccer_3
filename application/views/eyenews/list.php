
<div class="col-lg-8 col-xs-12 col-md-8 header-iphone"><div class="hidden-xs hidden-sm"><br><br></div>

<div class="hidden-md hidden-lg"><br><a href="<?=base_url()?>eyenews" class="btn btn-sm btn-info">HOME</a><br><br>

<form method="get" action="<?=base_url()?>eyenews/index">
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

<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Liga" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Liga</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Berita" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Peristiwa</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Usia Muda" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Pembinaan</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Soccer Sains" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Sains</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Umpan Lambung" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Umpan Lambung</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Ulas Tuntas" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Ulas Tuntas</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Prediksi" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Prediksi</a></div></div>
<div class="col-xs-6 col-sm-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Soccer Seri" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Seri</a></div></div>
</div>
</div><br><br>
<div class="col-xs-12 col-sm-12">
<div class="row">
<div class="col-xs-12 col-sm-12"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Di Pinggir Lapangan</a></div></div>
</div>
</div>

<br>
</div>
<div style="clear:left"></div>

<a href="<?=base_url()?>eyenews" class="btn btn-sm btn-info hidden-xs hidden-sm">HOME</a>
<h1 id="t101"><img src="http://eyesoccer.id/img/icon_eyenews.png" class="img img-responsive" style="width:30px;height:30px;display:inline;"> EyeNews <?php if(isset($_GET['sub'])){print " - ".$_GET['sub'];} ?></h1>  
<!--update rizki start-->
<?php
    $link = $_SERVER['REQUEST_URI'];
    $link_arrays = explode('/',$link);
    // $page = end($link_array);
    $page = $link_arrays[3];

    $link_array = explode('?',urldecode($page));
    if($link_array[0]=="Usia Muda"){
      $link_new_sub = "Pembinaan";
    }else if($link_array[0]=="Berita"){
      $link_new_sub = "Peristiwa";
    }else{
		$link_new_sub = $link_array[0];
	}
?>
<h3 id="t100" style="font-size:15px;margin-top:0;"><?php echo "- ".$link_new_sub; ?>
<?php
	$comp=$this->db->query("SELECT a.*,b.news_type FROM `tbl_sub_category_news` a left join tbl_news_types b on b.news_type_id = a.news_type_id where b.news_type ='".$link_array[0]."'");
	$numrows = $comp->num_rows();
	if($numrows>0){
		echo " : ";
		foreach($comp->result_array() as $cp)
		{
			echo "<a href='".base_url()."$link_arrays[1]/$link_arrays[2]/$link_array[0]?sub=".$cp["sub_category_name"]."' class='btn' style='background-color:#d83636;color:white;margin:5px;'>".$cp["sub_category_name"]."</a>";
		}
	}
?>
<!--<a href="?sub=usia muda">Liga Indo</a>-->

</h3>  
<!--update rizki end-->
<hr></hr>


<div class="">

<div class="row">

<?php
if(isset($search))
{
$button = '';
$search = $search; 
  
if(strlen($search)<=1)
echo "<div class='text-center'><br><br>keywords too short.</div><br><br><br><br><br><br><br><br><br><br><br>";
else{
echo "";

$search_exploded = explode (" ", $search);
 
$x = "";
$construct = "";  
    
$construct .=$cons;
$now=date("Y-m-d H:i:s");  
$constructs = $this->db->query("SELECT * FROM tbl_eyenews WHERE $construct and publish_on<='$now' order by publish_on desc");
$foundnum = $constructs->num_rows();
   
if ($foundnum==0)
echo "<div class='text-center'><br><br>no results.</div><br><br><br><br><br><br><br><br><br><br><br>";
else
{   
echo "";
$output=null;
$per_page = 15;
$start = isset($pg) ? $pg: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = $this->db->query("SELECT * FROM tbl_eyenews WHERE $construct and publish_on<='$now' order by publish_on desc LIMIT $start, $per_page");

foreach($getquery->result_array() as $runrows)
{
print '<div class="col-lg-4 col-md-4">
<div class="thumbnail drop-shadow2">
    <div style="height:70% !important;width:100% !important;padding-bottom:-30%">
    <a href="'.base_url().'eyenews/detail/'.$runrows['eyenews_id'].'">
      <img src="'.base_url().'systems/eyenews_storage/'.$runrows['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
     <div class="caption" id="t102"><br>
      '.$runrows ['title'].'
      <br><small id="set6"><i class="fa fa-clock-o"></i> '.$runrows['createon'].'</small><br><br>
      <i class="fa fa-eye" style="color:#31F1EF"> '.$runrows['news_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$runrows['news_like'].'</i> 
      </div>
      </a>
      </div>        
    </div> 
</div>';
}

echo "<div class='col-md-12 text-center'><ul class='pagination'>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
if (!($start<=0)) 
echo "<li><a href='".base_url()."eyenews/search/$search/$prev".$search2."' class='btn btn-sm btn-info'>Prev</a></li>";    
if ($max_pages < 7 + ($adjacents * 2)) 
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."eyenews/search/$search/$i".$search2."' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."eyenews/search/$search/$i".$search2."' class='btn btn-sm btn-info'>$counter</a></li> ";
}  
$i = $i + $per_page;                 
}
}
elseif($max_pages > 5 + ($adjacents * 2))
{
if(($start/$per_page) < 1 + ($adjacents * 2))        
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."eyenews/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."eyenews/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
} 
$i = $i + $per_page;                                       
}                          
}

elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo "<li><a href='".base_url()."eyenews/search/$search/0' class='btn btn-sm btn-info'>1</a></li>";
echo "<li><a href='".base_url()."eyenews/search/$search/$per_page' class='btn btn-sm btn-info'>2</a> ....</li>";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo "<li class='active'><a href='".base_url()."eyenews/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."eyenews/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
}   
$i = $i + $per_page;                
}
                                  
}
else
{
echo "<li><a href='".base_url()."eyenews/search/$search/0' class='btn btn-sm btn-info'>1</a></li> ";
echo "<li><a href='".base_url()."eyenews/search/$search/$per_page' class='btn btn-sm btn-info'>2</a> .... </li>";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."eyenews/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li>";
}
else {
echo "<li><a href='".base_url()."eyenews/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";   
} 
$i = $i + $per_page;              
}
}
}

if (!($start >=$foundnum-$per_page))
echo "<li><a href='".base_url()."eyenews/search/$search/$next".$search2."' class='btn btn-sm btn-info'>Next</a></li>";    
}   
echo "</ul></div>";
} 
} 
}
?>

</div>

</div>


</div>

<div class="col-lg-4 col-md-4 col-xs-12"><br><div class="hidden-xs hidden-sm"><br></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[0][3]; ?>" class="img img-responsive"><div class="hidden-xs hidden-sm"><br></div>
<div class="hidden-xs hidden-sm">
<form method="get" action="<?=base_url()?>eyenews/index">
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
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Liga" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Liga</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Berita" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Peristiwa</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Usia Muda" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Pembinaan</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Soccer Sains" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Sains</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Umpan Lambung" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Umpan Lambung</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Ulas Tuntas" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Ulas Tuntas</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Prediksi" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Prediksi</a></div></div>
<div class="col-lg-6 col-md-6"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Soccer Seri" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Soccer Seri</a></div></div>
</div>
</div><br><br>
<div class="col-lg-12 col-md-12">
<div class="row">
<div class="col-lg-12 col-md-12"><div class="row" style="padding:2px;" id="t101"><a href="<?=base_url()?>eyenews/search/Di Pinggir Lapangan" class="btn btn-warning btn-block" style="background:#FFE01E;color:#3d3d3d;border:solid #FFE01E 1px;">Di Pinggir Lapangan</a></div></div>
</div>
</div> 

<br>
</div>
<div style="clear:left"></div>
<a href="<?=base_url()?>eyenews?search=rekomendasi&nopagesearch=0"><h1 id="t100"><i class="fa fa-newspaper-o"></i> Berita Rekomendasi</h1></a>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews where category_news='2' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 5");
foreach($cmd1->result_array() as $row1){
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
<a href="<?=base_url()?>eyenews?search=populer&nopagesearch=0"><h1 id="t100"><i class="fa fa-newspaper-o"></i> Berita Terpopuler</h1></a>
<hr style="margin-top:15px;margin-bottom:20px;"></hr>
<?php
$cmd1=$this->db->query("select * from tbl_eyenews order by news_view desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyenews_id=$row1['eyenews_id']; 

  
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
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-xs hidden-sm">
</div>

