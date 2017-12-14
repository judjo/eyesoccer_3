
<div class="col-lg-8 col-xs-12 col-md-8 header-iphone"><div class="hidden-xs hidden-sm"><br><br></div>

<div class="hidden-md hidden-lg"><br><a href="<?=base_url()?>eyevent" class="btn btn-sm btn-info">HOME</a><br><br>

<form method="post" action="<?=base_url()?>eyevent/search/">
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

<a href="<?=base_url()?>eyevent" class="btn btn-sm btn-info hidden-xs hidden-sm">HOME</a>
<h1 id="t101"><img src="http://eyesoccer.id/img/icon_eyevent.png" class="img img-responsive" style="width:30px;height:30px;display:inline;"> EyeVent</h1>  
<!--update rizki start-->
<?php
    $link = $_SERVER['REQUEST_URI'];
    $link_array = explode('/',$link);
    $page = end($link_array);
?>
<h3 id="t100" style="font-size:15px;margin-top:0;"><?php echo "- ".urldecode($page); ?></h3>  
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
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="title LIKE '%$search_each%' OR category LIKE '%$search_each%'";
else
$construct .="AND title LIKE '%$search_each%' OR category LIKE '%$search_each%'";
    
}
$now=date("Y-m-d H:i:s");  
$constructs = $this->db->query("SELECT * FROM tbl_event WHERE $construct and publish_on<='$now' order by publish_on desc");
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
$getquery = $this->db->query("SELECT * FROM tbl_event WHERE $construct and publish_on<='$now' order by publish_on desc LIMIT $start, $per_page");

foreach($getquery->result_array() as $runrows)
{
print '<div class="col-lg-4 col-md-4">
<div class="thumbnail drop-shadow2">
    <div style="height:70% !important;width:100% !important;padding-bottom:-30%">
    <a href="'.base_url().'eyevent/detail/'.$runrows['id_event'].'">
      <img src="'.base_url().'systems/eyevent_storage/'.$runrows['pic'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
     <div class="caption" id="t102"><br>
      '.$runrows ['title'].'
      <br><small id="set6"><i class="fa fa-clock-o"></i> '.$runrows['publish_on'].'</small>
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
echo "<li><a href='".base_url()."el/search/$search/$prev' class='btn btn-sm btn-info'>Prev</a></li>";    
if ($max_pages < 7 + ($adjacents * 2)) 
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
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
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
} 
$i = $i + $per_page;                                       
}                          
}

elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo "<li><a href='".base_url()."el/search/$search/0' class='btn btn-sm btn-info'>1</a></li>";
echo "<li><a href='".base_url()."el/search/$search/$per_page' class='btn btn-sm btn-info'>2</a> ....</li>";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo "<li class='active'><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li> ";
}
else {
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";
}   
$i = $i + $per_page;                
}
                                  
}
else
{
echo "<li><a href='".base_url()."el/search/$search/0' class='btn btn-sm btn-info'>1</a></li> ";
echo "<li><a href='".base_url()."el/search/$search/$per_page' class='btn btn-sm btn-info'>2</a> .... </li>";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'><b>$counter</b></a></li>";
}
else {
echo "<li><a href='".base_url()."el/search/$search/$i' class='btn btn-sm btn-info'>$counter</a></li> ";   
} 
$i = $i + $per_page;              
}
}
}

if (!($start >=$foundnum-$per_page))
echo "<li><a href='".base_url()."el/search/$search/$next' class='btn btn-sm btn-info'>Next</a></li>";    
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
<form method="post" action="<?=base_url()?>eyevent/search/">
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

<div class="hidden-md hidden-lg"><br></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-md hidden-lg"><div class="hidden-xs hidden-sm"><br></div>
<h1 id="t100">
<br>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[1][3]; ?>" class="img img-responsive hidden-xs hidden-sm">
</div>

