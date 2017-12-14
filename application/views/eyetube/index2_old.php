<?php 
$cmd=$this->db->query("select * from tbl_eyetube order by eyetube_id DESC LIMIT 1");
$row=$cmd->row_array();
$cmd22=$this->db->query("select * from tbl_running_text where place='eyetube' LIMIT 1");
$run=$cmd22->row_array();

      if(isset($_POST['login'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_member where email='$username' and password='".md5($password)."'");
      $row=($cmd->row_array());
      $user_id=$row['id_member'];
      if($row['id_member']=="" && $row['password']==""){
      header("refresh:0");  
      }
      else{
      $_SESSION['member_id']=$user_id;
      header("location:".base_url()."/eyetube/1/videokamu");  
      }  
      }
      ?>
<!-- MEMBER LOGIN -->

<?php
if(isset($_POST['upload'])){
  
  
  
  
$now=date('Y-m-d H:i:s');
$title=addslashes($_POST['title']);
$tags=addslashes($_POST['tags']);
$description=addslashes($_POST['description']);
if($_FILES['pic']['name']!="")
{
$thumb=$_FILES['pic']['name'];
$thumb= preg_replace('/\s+/', '', $thumb);
$thumb= rand(1000,9999)."-".$thumb;
//move_uploaded_file($_FILES['pic']['tmp_name'], "systems/img_storage/".$thumb);

}
 
$video=$_FILES['video']['name'];
$video= preg_replace('/\s+/', '', $video);
$video= rand(1000,9999)."-".$video;
//move_uploaded_file($_FILES['video']['tmp_name'], "systems/img_storage/".$video); 

$cmd=$this->db->query("insert into tbl_gallery (title,upload_user,description,pic,thumb1,video,upload_date,active,tags,type_gallery,publish_type,publish_by) values ('".$title."','".$_SESSION['member_id']."','".$description."','".$thumb."','".$thumb."','".$video."','".$now."','0','VIDEO KAMU','video','private','member')"); 
//echo "insert into tbl_gallery (title,admin_id,description,pic,video,upload_date,active,tags,type_gallery,publish_type,publish_by) values ('".$title."','".$_SESSION['admin_id']."','".$description."','".$thumb."','".$video."','".$now."','0','VIDEO KAMU','video','private','user')";
//exit;
//ECHO "insert into tbl_eyetube (title,admin_id,category_name,description,thumb,thumb1,video,createon) values ('".$title."','".$_SESSION['admin_id']."','".$category_name."','".$description."','".$thumb."','".$thumb1."','".$video."','".$now."')";
echo "<script>alert('Terima Kasih, Video yang kamu kirimkan, akan dinilai oleh admin kami.')</script>";
//header("refresh:0");
}
?>  
<?php

if(isset($_SESSION["member_id"]) && $_SESSION["member_id"]!="")
{
?>

<div id="mtube" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Upload Video Kamu</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
    <div class="form-group text-left" id="t1">Unggah Video Kamu
    <input type="file" accept="video/*;capture=camcorder" name="video" required></div>
    <div class="form-group text-left" id="t1">Title<input type="text" name="title" class="form-control" id="ipt1" required></div>

   
  

    <div class="form-group text-left" id="t1">Deskripsi singkat tentang video kamu<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>
    <div class="form-group text-left" id="t1"><input type="file" name="pic" class="form-control hidden" id="set8"></div>
      <div class="form-group" id="t1"><input type="submit" name="upload" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>
  </div>
</div>

<?php
}
?>

<div id="mlogin" class="modal fade" role="dialog">
<div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
   <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="login" value=" LOGIN " class="btn btn-warning pull-left col-lg-5" >    <a href="<?=$base_url?>/register?redirect=eyetube" class="btn btn-danger pull-right col-lg-5"> Daftar </a></div>
     
      </form>
  <hr />
     </div>
     </div>
  </div>
</div>


<div id="mdl1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" id="set2">
      <div class="modal-body">
        <div id="set3">
        <img src="systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive" id="img1">
        <div id="topright" data-dismiss="modal"><i class="fa fa-times-circle"></i></div>
        </div>
      </div>
    </div>
  </div>
</div>

	  <div class="col-lg-11 col-md-11">
<div class="row">

<div class="col-lg-8 col-md-8"> 
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[7][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<div class="hidden-xs hidden-sm"><br></div>
<h1 class="text-center" id="t2">EYETUBE</a></h1><br> 

<!--<video poster="systems/eyetube_storage/<?php print $row['thumb']; ?>" controls controlsList="nodownload"><source src="<?=base_url()?>systems/eyetube_storage/<?php print $row['video']; ?>" type="video/mp4"/></video>
-->
<div class="col-lg-12 col-xs-12 "> 
<iframe src="https://www.ustream.tv/embed/23364889?html5ui&autoplay=true" style="border: 0 none transparent;" class="col-xs-12 col-lg-12 hidden-xs hidden-sm" webkitallowfullscreen allowfullscreen frameborder="no" max-width="100%" width="720" height="405"></iframe>
<!--
<iframe src="http://www.ustream.tv/embed/23364889?html5ui&autoplay=1" style="border: 0 none transparent;" class="col-xs-12 col-lg-12 hidden-xs hidden-sm"  webkitallowfullscreen allowfullscreen frameborder="no"  max-width="100%" width="720" height="405"></iframe>
<iframe src="http://www.ustream.tv/socialstream/23364889" style="border: 0 none transparent; width:100% !important" class="col-xs-12 col-lg-12 hidden-xs hidden-sm" height="320"  webkitallowfullscreen allowfullscreen frameborder="no" ></iframe>
<iframe src="https://www.ustream.tv/embed/23362464?html5ui&autoplay=1" class="col-xs-12 col-lg-12 hidden-xs hidden-sm" style="border: 0 none transparent;"  webkitallowfullscreen allowfullscreen frameborder="no" max-width="100%" width="720" height="405" ></iframe>-->

<div class="embed-responsive embed-responsive-4by3 hidden-lg hidden-md">
<iframe src="https://www.ustream.tv/embed/23364889?html5ui&autoplay=true" style="border: 0 none transparent; width:100% !important" class="hidden-lg embed-responsive-item hidden-md"  webkitallowfullscreen allowfullscreen frameborder="no"  height="auto"></iframe>

<!--

<iframe src="http://www.ustream.tv/embed/23364889?html5ui&volume=0&autoplay=1" style="border: 0 none transparent;" class="hidden-lg embed-responsive-item hidden-md"  webkitallowfullscreen allowfullscreen frameborder="no" width="480" height="270" style="border: 0 none transparent; width:100% !important" height="auto"></iframe>
<iframe src="http://www.ustream.tv/socialstream/23364889" style="border: 0 none transparent; width:100% !important" class="hidden-lg embed-responsive-item hidden-md" height="auto"  webkitallowfullscreen allowfullscreen frameborder="no" ></iframe>

 <iframe src="https://www.ustream.tv/embed/23362464?html5ui&autoplay=1&mute=false" class="hidden-lg embed-responsive-item hidden-md" style="border: 0 none transparent; width:100% !important"  webkitallowfullscreen allowfullscreen frameborder="no" height="auto" ></iframe>-->
 </div>
<div class="col-lg-12 col-xs-12"> 
<div class="hidden-lg hidden-md" style="padding-right:10px;padding-left:10px;" id="t1"><center><h4 class="text-warning"><marquee style="color:#3d3d3d" SCROLLDELAY=250><?=$run["description"]?></marquee></h4></center></div>
<div class="hidden-xs hidden-sm" style="padding-right:110px;padding-left:110px;" id="t1"><center><h4 class="text-warning"><marquee style="color:#3d3d3d"  SCROLLDELAY=250><?=$run["description"]?></marquee></h4></center></div>
 <hr />
 <br />
 </div>
 </div>
<br><br>
<div class="hidden-md hidden-lg">
<form method="get" action="lists_eyetube">
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
<div class="row">

<h1 id="t2"><i class="fa fa-newspaper-o"></i> NEW POSTS</h1>
<?php

$dataPerPage = 15;

if(isset($pg))

{

$noPage = $pg;

} 

else $noPage = 1;

$offset = ($noPage - 1) * $dataPerPage;

$result=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc LIMIT ".$offset.",".$dataPerPage);

foreach($result->result_array() as $data)

{
echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12"><div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyetube/detail/'.$data['eyetube_id'].'">
        <div style="height:70% !important;width:100% !important;">
        <img src="'.base_url().'systems/eyetube_storage/'.$data['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
    <div class="caption">
          <p>';
      print $data['title'];
  echo '
  
  </p>  <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small></a>
        </div>
        </div>
      </a>
    </div></div>';
}


$query=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc");

$hasil=($query->num_rows());

$jumPage = ceil($hasil/$dataPerPage);

echo "<div style='clear:left;'></div><center><ul class='pagination'>";

if ($noPage > 1) echo  "<a href='eyetube?page=".($noPage-1)."&admin_id=' id='pg1'>Prev</a>&nbsp;";

for($page = 1; $page <= $jumPage; $page++)

{

if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

{   

if (($page == 1) && ($page != 2))  echo ""; 

if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

else echo "<a href='eyetube?page=$page&admin_id=' id='pg1'>".$page."</a>&nbsp;";

$page = $page;          

}

}

if ($noPage < $jumPage) echo "<a href='eyetube?page=".($noPage+1)."&admin_id=' id='pg1'>Next</a>&nbsp;";

echo "</ul></center>";   

?>
<br>

</div>
</div>

<div class="col-lg-4 col-md-4">
<div class="hidden-xs hidden-sm"><br><br></div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive"><div class="hidden-xs hidden-sm"><br></div>
<div class="hidden-xs hidden-sm">
<form method="get" action="lists_eyetube">
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
<style>
.tab-pane{
  border:thin solid #2ED1A2;
  border-radius: 0 6px 6px 6px;
  
}
.tab-content{
  margin-bottom:4%;
}
.mytab{
  border:thin solid #2ED1A2 !important;
  border-bottom:none !important;
  background-color:white !important;
  color:#2ED1A2 !important;
  cursor: pointer;
  /*margin-right:0px !important;*/
}
.nav li.active .mytab{
  background-color:#2ED1A2 !important;
  color:white !important;
  cursor: pointer;  
}
</style>
<hr />
<?php
if(isset($_SESSION["member_id"]) && $_SESSION["member_id"]!="")
{
?>

<a class="clickable" target="#mtube">
<?php
}
else{
  ?>
  
<a class="clickable" target="#mlogin">
  <?php
}
?>
<img src="<?=base_url()?>img/VideoKamu.jpg" class="img img-responsive" width="100%" />
</a>
<br />
<hr />
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#tab-recent" class="mytab">Recent</a></li>
<li class=""><a data-toggle="tab" href="#tab-populer" class="mytab">Terpopuler</a></li>
</ul>
<div class="tab-content">
<div id="tab-recent" class="tab-pane fade in active"><br />
<?php 
$cmd1=$this->db->query("select * from tbl_eyetube where active='1' order by eyetube_id LIMIT 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id'];

echo '
      <a href="'.base_url().'eyetube/detail/'.$row1['eyetube_id'].'">
        <div style="height:70% !important;width:100% !important;">
        <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="img-polaroid thumbnail2 col-lg-11 col-xs-12" alt="Lights" style="width:100% !important;margin: 0 auto;margin-bottom:2%" />
    <div class="caption" style="padding-left:4%;">
          <p >';
      print $row1['title'];
  echo '
  
  </p><small id="set6" ><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small>
        </div>
        </div>
      </a>
   <hr style="height:2px;border:none;color:#F2F4F4;background-color:#F2F4F4;" />
   ';
}
?>
</div>
<div id="tab-populer" class="tab-pane fade in "><br />
<?php 
$cmd1=$this->db->query("select * from tbl_eyetube where active='1' order by tube_view DESC LIMIT 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id'];

echo '<a href="'.base_url().'eyetube/detail/'.$row1['eyetube_id'].'">
        <div style="height:70% !important;width:100% !important;">
        <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="img-polaroid thumbnail2  col-lg-11 col-xs-12" alt="Lights" style="width:100% !important;margin: 0 auto;margin-bottom:2%"">
    <div class="caption" style="padding-left:4%">
          <p>';
      print $row1['title'];
  echo '
  
  </p>  <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a>
        </div>
        </div>
      </a>
    <hr style="height:2px;border:none;color:#F2F4F4;background-color:#F2F4F4;" />';
}
?>
<br style="clear:both"/>
</div>
<br style="clear:both"/>
</div>
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[5][3]; ?>" class="img img-responsive hidden-md hidden-lg">
<img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[5][3]; ?>" class="img img-responsive hidden-xs hidden-sm">
<br style="clear:both" />
</div>
<br style="clear:both"/>
</div>
<br style="clear:both"/>
</div>

        <div id="set3">
        <img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[4][3]; ?>" class="img img-responsive" id="img1">
        <div id="topright" data-dismiss="modal"><i class="fa fa-times-circle"></i></div>
        </div>
      </div>
    </div>
  </div>
  <br style="clear:both"/>
</div>
<br style="clear:both"/>
