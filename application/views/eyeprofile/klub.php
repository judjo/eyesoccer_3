<?php
$date2=date("Y-m-d H:i:s");
$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','player','','".$_SESSION["ip"]."')");
$tp2=$this->db->query("SELECT * FROM tbl_club WHERE active='1'")->num_rows();
$tppro=$this->db->query("SELECT * FROM tbl_club WHERE active='1' and competition in ('Liga Indonesia 1','Liga Indonesia 2')")->num_rows();
$tpama=$this->db->query("SELECT * FROM tbl_club WHERE active='1' and competition not in ('Liga Indonesia 1','Liga Indonesia 2')")->num_rows();
?>

<div class="col-lg-11 col-md-11 header-iphone">
<!--<div style="background:#3d3d3d;color:#fff;padding:10px;"><marquee><strong>Bagi yang mendaftar Liga Pelajar U16 dan Liga Santri Nusantara pada tanggal 4 - 7 Agustus 2017. Di harap menginput ulang atau mendaftar ulang atau dapat menghubungi saudara Ajuan Firel (081384009828)</strong></marquee></div>-->
<h1 id="t2">Daftar Klub <button class="btn btn-info" style="background-color:#31b0d5">Total Klub : <b><?=$tp2?> Klub (<?=$tppro?> Klub Profesional & <?=$tpama?> Klub Amatir)</b></button></h1>


	<?php 
	
	$html='<ul class="nav nav-tabs">';
	$html2='<div class="tab-content">';
	$comp=$this->db->query("SELECT * FROM tbl_competitions ORDER BY competition_id ASC");
	$active="1";
	foreach($comp->result_array() as $cp)
	{
		if($active=="1")
		{
			$active="active";
		}
	else{
		$active="";
		}
		$html.='<li class="'.$active.'"><a data-toggle="tab" href="#tab-'.$cp["competition_id"].'" id="a4">'.$cp["competition"].'</a></li>';
		
		$html2.='<div id="tab-'.$cp["competition_id"].'" class="tab-pane fade in '.$active.'"><br />';
		$html2.="<div class='col-lg-4 col-xs-12 pull-right'><form class='form_search' comp_id='".$cp["competition_id"]."'><div class='form-group'>
				<div class='input-group'>
				<input type='text' name='other_query' placeholder='Search' id='other_query_search_".$cp["competition_id"]."' class='form-control' id='set8' >
				<input type='hidden' name='last_id' id='last_id_search_".$cp["competition_id"]."' value='".$cp["competition"]."'>
				<div class='input-group-btn'>
				<button type='submit' name='submit' class='btn btn-info' id='set8'><span class='fa fa-search'></span></button>
				</div>
				</div>
				</div>
				</form>
				</div>";
		$tp=$this->db->query("SELECT * FROM tbl_club WHERE competition='".$cp["competition"]."' AND active='1'")->num_rows();
		
		$html2.="<div class='col-lg-12 col-xs-12'><p class='h4'>Total Klub terdaftar di <b class='liga_name_".$cp["competition_id"]."'>".$cp["competition"]."</b> sebanyak <b class='liga_total_".$cp["competition_id"]."'>".$tp."</b><b> Klub</b></p><br /></div>";
		
		if($cp["competition_id"]!="4")
		{
		$club=$this->db->query("SELECT * FROM tbl_club WHERE competition='".$cp["competition"]."' AND active='1' ORDER BY name ASC");
		
		$html2.='<div id="list_klub_'.$cp["competition_id"].'">';
		foreach($club->result_array() as $cb){
			if(!strstr($cb["logo"], ".")) {
	$cb["logo"]='LOGO UNTUK APLIKASI.jpg';
}
			$html2.='<div class="col-xs-12 col-lg-6 ">
			<div class="media" onclick="window.location.href=\"'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'\"" style="cursor:pointer" class="bg-success">
			<div class="media-left"><img src="'.base_url().'systems/club_logo/'.$cb["logo"].'" class="media-object" id="img5"></div>
			<div class="media-body"><a href="'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'" id="a4">
			<p class="media-heading">'.$cb["name"].'</p><small id="set6"><i class="fa fa-flag"></i> '.$cb["competition"].'</small></a>
			</div>
			</div>
			<hr></hr>
			</div>
			';
			
		}
			$html2.='</div>';
		}
		else{
			//$getlistliga=$this->db->query("SELECT * FROM tbl_liga ORDER BY id_liga ASC");
			$html2.="
			<div class='col-xs-12 col-lg-4 '>
			<select class='liga_id form-control' no_liga='".$cp["competition_id"]."'>
			<option value=''>Pilih Liga</option>
			<option value='1'>Liga Pelajar U-16 Piala Menpora</option>
			<option value='2'>Liga Santri Nusantara</option>
			<option value='3'>Liga Indonesia U-19</option>
			</select>
			</div>
			<div class='col-xs-8 col-lg-8 replace_liga'>
			</div>
			<div class='col-xs-12 col-lg-12 replace_liga2'>
			</div>";
			
			
			
		}
		$html2.='</div>';
	}
	$html.='</ul>';
	
	echo $html.$html2;
	?>

<br />
<br />
</div>
<br />
<br />
</div>
  
	
  
  