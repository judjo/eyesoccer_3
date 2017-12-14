<div class="row">

<div class="col-lg-8 col-md-8"><br>
<div class="hidden-md hidden-lg">
<form method="get" action="<?=base_url()?>eyetube/search/">
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

<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> EYETUBE</h1>
<hr></hr>
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
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="title LIKE '%$search_each%'";
else
$construct .="AND title LIKE '%$search_each%'";
    
}
  
$constructs = $this->db->query("SELECT * FROM tbl_eyetube WHERE $construct");
$foundnum = mysqli_num_rows($constructs);
    
if ($foundnum==0)
echo "<div class='text-center'><br><br>no results.</div><br><br><br><br><br><br><br><br><br><br><br>";
else
{   
echo "";
$output=null;
$per_page = 9;
$start = isset($pg) ? $pg: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = $this->db->query("SELECT * FROM tbl_eyetube WHERE $construct LIMIT $start, $per_page");

foreach($getquery->result_array() as $runrows)
{
print '<a href="'.base_url().'eyetube/detail/'.$runrows['eyetube_id'].'"><div class="col-lg-4 col-md-4 col-xs-12 col-sm-12"><div class="thumbnail drop-shadow2">
      
        <div style="height:70% !important;width:100% !important;">
        <img src="'.base_url().'systems/eyetube_storage/'.$runrows['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
    <div class="caption">
          <p>';
      print $runrows['title'];
  echo '
  
  </p>  <small id="set6"><i class="fa fa-clock-o"></i> '.$runrows['createon'].'</small></a>
        </div>
        </div>
    </div></div>
      </a>';
}

echo "<div class='col-md-12 text-center'><ul class='pagination'>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
if (!($start<=0)) 
echo "<li><a href='".base_url()."eyetube/search/$search/$prev' class='btn btn-sm btn-info'>Prev</a></li>";    
if ($max_pages < 7 + ($adjacents * 2)) 
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
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
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
} 
$i = $i + $per_page;                                       
}                          
}

elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo "<li><a href='".base_url()."eyetube/search/$search/0' class='btn btn-sm btn-info'>1</a></li>";
echo "<li><a href='".base_url()."eyetube/search/$search/$per_page' class='btn btn-sm btn-info'>2</a> ....</li>";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo "<li class='active'><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
}   
$i = $i + $per_page;                
}
                                  
}
else
{
echo "<li><a href='".base_url()."eyetube/search/$search/0' class='btn btn-sm btn-info'>1</a></li> ";
echo "<li><a href='".base_url()."eyetube/search/$search/$per_page' class='btn btn-sm btn-info'>2</a> .... </li>";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li>";
}
else {
echo "<li><a href='".base_url()."eyetube/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";   
} 
$i = $i + $per_page;              
}
}
}

if (!($start >=$foundnum-$per_page))
echo "<li><a href='".base_url()."eyetube/search/$search/$next' class='btn btn-sm btn-info'>Next</a></li>";    
}   
echo "</ul></div>";
} 
} 
}
?>
<br>

</div>

<div class="col-lg-4 col-md-4"><div class="hidden-xs hidden-sm"></div><br>
<?php
$cmd_ads1=$this->db->query("select * from tbl_ads where ads_id='22'");
$row_ads1=$cmd_ads1->row_array();
$cmd_ads2=$this->db->query("select * from tbl_ads where ads_id='23'");
$row_ads2=$cmd_ads2->row_array();
print '<img src="'.base_url().'systems/eyeads_storage/'.$row_ads1['pic'].'" class="img img-responsive hidden-sm hidden-xs">
<img src="'.base_url().'systems/eyeads_storage/'.$row_ads1['pic'].'" class="img img-responsive hidden-md hidden-lg">';
?>

<div class="hidden-md hidden-lg"><br></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $row_ads2['pic']; ?>" class="img img-responsive hidden-md hidden-lg"><br>
<div class="hidden-xs hidden-sm">
<form method="get" action="".base_url()."eyetube/search/">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">
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
<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> Recent Video</h1>
<hr></hr>
<?php 
$cmd1=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id LIMIT 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id'];
print '<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
  <div class="media drop-shadow">
    <div class="media-left">
      <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="media-object" id="img4">
    </div>
    <div class="media-body">
      <p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row['createon'].'</small>
    </div>
  </div></a>
  <br />
';  
}
?>

<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> Video Terpopuler</h1>
<hr></hr>
<?php 
$cmd1=$this->db->query("select * from tbl_eyetube order by tube_view DESC LIMIT 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id'];
print '<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4">
  <div class="media drop-shadow">
    <div class="media-left">
      <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="media-object" id="img4">
    </div>
    <div class="media-body">
      <p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row['createon'].'</small>
    </div>
  </div></a>
  <br />
';  
}
?>
  <br>

<?php
$cmd_ads3=$this->db->query("select * from tbl_ads where ads_id='24'");
$row_ads3=$cmd_ads3->row_array();
print '<img src="'.base_url().'systems/eyeads_storage/'.$row_ads3['pic'].'" class="img img-responsive hidden-xs hidden-sm">';
?>

<!--<img src="img/ads3.jpg" class="img img-responsive hidden-xs hidden-sm">-->
</div>
</div>
