<?php
$ev=$this->db->query("SELECT a.*,b.fullname FROM tbl_event a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id WHERE id_event='".$eyevent_id."'")->row_array();
?>
<div class="container">
<div class="col-lg-12 col-md-12">
<h4 id="t100" style="padding-top:20px;"><a href="<?=base_url()?>eyevent" class="btn btn-info btn-sm" style="border-radius:0px;">&ensp;HOME&ensp;</a></div>
</div>
</div>

<div class="container">
<div class="col-lg-8 col-md-8">
<div class="row">

<div class="col-lg-12 col-md-12">
<div class="set100">
  <img src="<?=base_url().'systems/eyevent_storage/'.$ev['pic']?>" alt="Norway" style="width:100%;">
  <div id="set-top-left-100">Informasi</div>     
</div>  
</div>

<div class="col-lg-12 col-md-12">
<h3 id="t101"><?php print $ev['title']; ?></h3>
<p id="t102"> Oleh <b><?=$ev['fullname']?></b> - <?=date("d M Y",strtotime($ev["upload_date"]))?></p>
<hr></hr>
<p id="p101"><?=$ev["description"];?></p>
</div>

</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="hidden-lg hidden-md"><br></div>
<img src="img/ronaldo.jpg" class="img img-responsive">
<h4 id="t101" style="padding-top:10px;"><i class="fa fa-calendar"></i> EVENT LAINNYA</h4> 
<hr></hr>
<?php
$cmd1=$this->db->query("select * from tbl_event where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
foreach($cmd1->result_array() as $row1){
$id_event=$row1['id_event']; 
  if(strstr($row1["thumb1"], "."))
  {
    $row1['pic']=$row1['thumb1'];
  }
print '

  <div class="media">
    <div class="media-left ">
      <a href="'.base_url().'eyevent/detail/'.$id_event.'"><img src="'.base_url().'systems/eyevent_storage/'.$row1['pic'].'" class="media-object" style="width:70px;height:55px;" ></a>
    </div>
    <div class="media-body ">
      <h6 class="media-heading" id="t102">'.$row1['publish_on'].'</h6>
    <a href="'.base_url().'eyevent/detail/'.$id_event.'" id="a100"><p id="p101">'.$row1['title'].'</p></a>
    </div>
  </div>
';  
}
?> 
</div>
</div><br><br><br>
