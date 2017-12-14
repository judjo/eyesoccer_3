
<div class="container">
<div class="col-lg-12 col-md-12">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<h4 id="t100" style="padding-top:20px;"><i class="fa fa-play-circle-o fa-lg"></i> Eyetube</h4></div>
</div>

<div class="container">
<div class="col-lg-8 col-md-8">
<div class="row">

<div class="col-lg-12 col-md-12">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
     <?php
		$cmd11=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 0,4");
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
		<div class="set100">
			  <a href="'.base_url().'eyetube/detail/'.$row11['eyetube_id'].'">
				<img src="'.base_url().'systems/eyetube_storage/'.$row11['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
				
			  </a>
			</div>
		</div>';
		}
		?>
    </div>
  </div> 
</div>

<div class="col-lg-12 col-md-12"><br>
<ul class="nav nav-tabs nav-justified">
  <li class="active mytab1"><a data-toggle="tab" hreff="#mn100" class="mytab" totab="mytab1">All Video</a></li>
  <li class="mytab1"><a data-toggle="tab" hreff="#mn101" class="mytab" totab="mytab1">Eyesoccer Fact</a></li>
  <li class="mytab1"><a data-toggle="tab" hreff="#mn102" class="mytab" totab="mytab1">Eyesoccer Flash</a></li>
  <li class="mytab1"><a data-toggle="tab" hreff="#mn103" class="mytab" totab="mytab1">Eyesoccer Pedia</a></li>
</ul> 
<div class="tab-content">
  <div id="mn100" class="tab-pane fade in active mytab1"><br>
  
  <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    
    <?php
		$dataPerPage = 9;
		if(isset($pg))
		{
		$noPage = $pg;
		} 
		else $noPage = 1;
		$offset = ($noPage - 1) * $dataPerPage;
		$result=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc LIMIT ".$offset.",".$dataPerPage);
		foreach($result->result_array() as $data)
		{
			echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
			<div class="thumbnail drop-shadow2">
				<div style="height:70% !important;width:100% !important;padding-bottom:-30%">
					<img src="'.base_url().'systems/eyetube_storage/'.$data['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
						<a href="'.base_url().'eyetube/detail/'.$data['eyetube_id'].'">
				<div class="caption" id="t102">
				<br />';
				  print $data ['title'];
			  echo '
			  <br><small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small><br>
					 <i class="fa fa-eye" style="color:#000000"> views '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$data['tube_like'].'</i>   			
					</div></div>				   
				  </a>
				</div>			 
			</div>';
		}
		$query=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc");
		$hasil=$query->num_rows();
		$jumPage = ceil($hasil/$dataPerPage);
		echo "<div style='clear:left;'></div><center><ul class='pagination'>";
		if ($noPage > 1) echo  "<a href='".base_url()."eyetube/".($noPage-1)."&admin_id=' id='pg1'>Prev</a>&nbsp;";
		for($page = 1; $page <= $jumPage; $page++)

		{

		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

		{   

		if (($page == 1) && ($page != 2))  echo ""; 

		if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

		if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

		else echo "<a href='".base_url()."eyetube/index/".$page."' id='pg1'>".$page."</a>&nbsp;";

		$page = $page;          

		}

		}

		if ($noPage < $jumPage) echo "<a href='".base_url()."eyetube/".($noPage+1)."&admin_id=' id='pg1'>Next</a>&nbsp;";

		echo "</ul></center>";  
    ?>

    </div>    
  </div>
  </div>
  </div> 
   
<div id="mn101" class="tab-pane fade in mytab1"><br>
 
  <div id="myCarousel3" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">  
		<?php
		$dataPerPage = 9;
		if(isset($pg))
		{
		$noPage = $pg;
		} 
		else $noPage = 1;
		$offset = ($noPage - 1) * $dataPerPage;
		$result=$this->db->query("SELECT * FROM tbl_eyetube where title like'%eyesoccer fact%' and active='1' order by eyetube_id desc LIMIT ".$offset.",".$dataPerPage);
		foreach($result->result_array() as $data)
		{
			echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
			<div class="thumbnail drop-shadow2">
				<div style="height:70% !important;width:100% !important;padding-bottom:-30%">
					<img src="'.base_url().'systems/eyetube_storage/'.$data['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
						<a href="'.base_url().'eyetube/detail/'.$data['eyetube_id'].'">
				<div class="caption" id="t102">
				<br />';
				  print $data ['title'];
			  echo '
			  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small><br><br>
					 <i class="fa fa-eye" style="color:#000000"> views '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$data['tube_like'].'</i>   			
					</div></div>				   
				  </a>
				</div>			 
			</div>';
		}
		$query=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc");
		$hasil=$query->num_rows();
		$jumPage = ceil($hasil/$dataPerPage);
		echo "<div style='clear:left;'></div><center><ul class='pagination'>";
		if ($noPage > 1) echo  "<a href='".base_url()."eyetube/".($noPage-1)."&admin_id=' id='pg1'>Prev</a>&nbsp;";
		for($page = 1; $page <= $jumPage; $page++)

		{

		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

		{   

		if (($page == 1) && ($page != 2))  echo ""; 

		if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

		if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

		else echo "<a href='".base_url()."eyetube/index/".$page."' id='pg1'>".$page."</a>&nbsp;";

		$page = $page;          

		}

		}

		if ($noPage < $jumPage) echo "<a href='".base_url()."eyetube/".($noPage+1)."&admin_id=' id='pg1'>Next</a>&nbsp;";

		echo "</ul></center>";
		?>

    </div>	
  </div>
  </div>
  </div>
  
  <div id="mn102" class="tab-pane fade in mytab1"><br>
 
  <div id="myCarousel4" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">    
	<?php
		$dataPerPage = 9;
		if(isset($pg))
		{
		$noPage = $pg;
		} 
		else $noPage = 1;
		$offset = ($noPage - 1) * $dataPerPage;
		$result=$this->db->query("SELECT * FROM tbl_eyetube where title like'%eyesoccer flash%' and active='1' order by eyetube_id desc LIMIT ".$offset.",".$dataPerPage);
		foreach($result->result_array() as $data)
		{
			echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
			<div class="thumbnail drop-shadow2">
				<div style="height:70% !important;width:100% !important;padding-bottom:-30%">
					<img src="'.base_url().'systems/eyetube_storage/'.$data['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
						<a href="'.base_url().'eyetube/detail/'.$data['eyetube_id'].'">
				<div class="caption" id="t102">
				<br />';
				  print $data ['title'];
			  echo '
			  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small><br><br>
					 <i class="fa fa-eye" style="color:#000000"> views '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$data['tube_like'].'</i>   			
					</div></div>				   
				  </a>
				</div>			 
			</div>';
		}
		$query=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc");
		$hasil=$query->num_rows();
		$jumPage = ceil($hasil/$dataPerPage);
		echo "<div style='clear:left;'></div><center><ul class='pagination'>";
		if ($noPage > 1) echo  "<a href='".base_url()."eyetube/".($noPage-1)."&admin_id=' id='pg1'>Prev</a>&nbsp;";
		for($page = 1; $page <= $jumPage; $page++)

		{

		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

		{   

		if (($page == 1) && ($page != 2))  echo ""; 

		if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

		if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

		else echo "<a href='".base_url()."eyetube/index/".$page."' id='pg1'>".$page."</a>&nbsp;";

		$page = $page;          

		}

		}

		if ($noPage < $jumPage) echo "<a href='".base_url()."eyetube/".($noPage+1)."&admin_id=' id='pg1'>Next</a>&nbsp;";

		echo "</ul></center>";
    ?>
    </div>       	
  </div>
  </div>
  </div>  

  <div id="mn103" class="tab-pane fade in mytab1"><br>
  
  <div id="myCarousel5" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">    
	<?php
		$dataPerPage = 9;
		if(isset($pg))
		{
		$noPage = $pg;
		} 
		else $noPage = 1;
		$offset = ($noPage - 1) * $dataPerPage;
		$result=$this->db->query("SELECT * FROM tbl_eyetube where title like'%eyesoccer pedia%' and active='1' order by eyetube_id desc LIMIT ".$offset.",".$dataPerPage);
		foreach($result->result_array() as $data)
		{
			echo '<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
			<div class="thumbnail drop-shadow2">
				<div style="height:70% !important;width:100% !important;padding-bottom:-30%">
					<img src="'.base_url().'systems/eyetube_storage/'.$data['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
						<a href="'.base_url().'eyetube/detail/'.$data['eyetube_id'].'">
				<div class="caption" id="t102">
				<br />';
				  print $data ['title'];
			  echo '
			  <br /> <small id="set6"><i class="fa fa-clock-o"></i> '.$data['createon'].'</small><br><br>
					 <i class="fa fa-eye" style="color:#000000"> views '.$data['tube_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$data['tube_like'].'</i>   			
					</div></div>				   
				  </a>
				</div>			 
			</div>';
		}
		$query=$this->db->query("SELECT * FROM tbl_eyetube where active='1' order by eyetube_id desc");
		$hasil=$query->num_rows();
		$jumPage = ceil($hasil/$dataPerPage);
		echo "<div style='clear:left;'></div><center><ul class='pagination'>";
		if ($noPage > 1) echo  "<a href='".base_url()."eyetube/".($noPage-1)."&admin_id=' id='pg1'>Prev</a>&nbsp;";
		for($page = 1; $page <= $jumPage; $page++)

		{

		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

		{   

		if (($page == 1) && ($page != 2))  echo ""; 

		if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

		if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

		else echo "<a href='".base_url()."eyetube/index/".$page."' id='pg1'>".$page."</a>&nbsp;";

		$page = $page;          

		}

		}

		if ($noPage < $jumPage) echo "<a href='".base_url()."eyetube/".($noPage+1)."&admin_id=' id='pg1'>Next</a>&nbsp;";

		echo "</ul></center>";
    ?>
    </div>
  </div>
  </div>
  </div>
</div>  
</div>

</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="hidden-lg hidden-md"></div>
<img src="<?=base_url()?>img/ronaldo.jpg" class="img img-responsive"><br>

<ul class="nav nav-pills nav-justified">
  <li class="active"><a data-toggle="tab" href="#mn900">Video Kamu</a></li>
  <li><a data-toggle="tab" href="#mn901">Soccer Sains</a></li>
</ul>
<div class="tab-content"><br>
  <div id="mn900" class="tab-pane fade in active">
<?php
$cmd1=$this->db->query("select * from tbl_eyetube where title like'%video kamu%' and active='1' order by eyetube_id desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id'];
print '
  <div class="media drop-shadow">
    <div class="media-left">
      <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="media-object" id="img4">
    </div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a><br>
		<small id="set6"><i class="fa fa-eye" style="color:#000000"> views '.$row1['tube_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$row1['tube_like'].'</i></small>	  
    </div>
  </div>
';  
}
?>
  </div>
  <div id="mn901" class="tab-pane fade">
<?php 
$cmd11=$this->db->query("select * from tbl_eyetube where title like'%soccer sains%' and active='1' order by eyetube_id desc limit 5");
foreach($cmd11->result_array() as $row11){
$eyetube_id=$row11['eyetube_id'];
print '
  <div class="media drop-shadow">
    <div class="media-left">
      <img src="'.base_url().'systems/eyetube_storage/'.$row11['thumb1'].'" class="media-object" id="img4">
    </div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row11['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a><br>
		<small id="set6"><i class="fa fa-eye" style="color:#000000"> views '.$row1['tube_view'].'</i> - <i class="fa fa-heart" style="color:#FF2675"> '.$row1['tube_like'].'</i></small>	  
    </div>
  </div>
';  
}
?>
  </div>
</div>  

</div>
</div>
</div>
</div>