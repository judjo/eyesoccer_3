
<?php
$date2=date("Y-m-d H:i:s");
$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','player','','".$_SESSION["ip"]."')");

$cmd22=$this->db->query("select * from tbl_running_text where place='list_pemain' LIMIT 1");
$run=$cmd22->row_array();
$tp2=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id ORDER BY a.name ASC")->num_rows();

$tppro=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id where b.competition in ('Liga Indonesia 1','Liga Indonesia 2') ORDER BY a.name ASC")->num_rows();

$tpama=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id where b.competition not in ('Liga Indonesia 1','Liga Indonesia 2') ORDER BY a.name ASC")->num_rows();
?>
<div style="background:#3d3d3d;color:#fff;padding:10px;" SCROLLDELAY=250><marquee><strong><?=$run["description"]?></strong></marquee></div>
<h1 id="t2">Daftar Pemain <button class="btn btn-info" style="background-color:#31b0d5">Total Pemain : <b><?=$tp2?> Pemain (<?=$tppro?> Profesional & <?=$tpama?> Amatir)</b></button></h1>
<hr></hr> 
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
		$html.='<li class="'.$active.'"><a data-toggle="tab" class="tab-'.$cp["competition_id"].'" href="#tab-'.$cp["competition_id"].'" id="a4">'.$cp["competition"].'</a></li>';
		
		$html2.='<div id="tab-'.$cp["competition_id"].'" class="tab-pane fade in '.$active.'"><br />';
		
		$club=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id WHERE b.competition='".$cp["competition"]."' ORDER BY a.name ASC LIMIT 10");
		$tp=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id WHERE b.competition='".$cp["competition"]."' ORDER BY a.name ASC")->num_rows();
		$html2.="<div class='col-lg-8 col-xs-12'><p class='h4'>Total Pemain terdaftar di <b>".$cp["competition"]."</b> sebanyak <b>".$tp." Pemain</b></p></div>";
		$html2.="<div class='col-lg-4 col-xs-12 pull-right'><form class='form_search' comp_id='".$cp["competition_id"]."'><div class='form-group'>
				<div class='input-group'>
				<input type='text' name='other_query' placeholder='Search' id='other_query_search_".$cp["competition_id"]."' class='form-control' id='set8' >
				<input type='hidden' name='last_id' id='last_id_search_".$cp["competition_id"]."' value='0'>
				<div class='input-group-btn'>
				<button type='submit' name='submit' class='btn btn-info' id='set8'><span class='fa fa-search'></span></button>
				</div>
				</div>
				</div>
				</form>
				</div>";
		$html2.="<div id='replace_pemain_".$cp["competition_id"]."'><br /><br /><hr />";
		foreach($club->result_array() as $cb){
				if(!strstr($cb["pic"], ".")) {
			$cb["pic"]='EYESCR.png';
				}

			$html2.='<div class="col-xs-12 col-lg-6 ">
			<div class="media" onclick=\'window.location.href="'.base_url().'eyeprofile/pemain_detail/'.$cb["player_id"].'"\' style="cursor:pointer" class="bg-success">
			<div class="media-left"><img src="'.base_url().'systems/player_storage/'.$cb["pic"].'" class="media-object" id="img5"></div>
			<div class="media-body"><p class="media-heading">'.$cb["name"].'</p>
      <small id="set6"><i class="fa fa-flag"></i> '.$cb["club_name"].' <br /> '.$cb["competition"].' <br /> '.$cb["birth_date"].'</small>
			</div>
			</div>
			<hr></hr>
			</div>
			';
		}
		$html2.='</div>';
		$html2.='<div id="append_pemain_'.$cp["competition_id"].'"></div><button type="button" class="btn btn-default col-lg-12 col-md-12 xs-12 show_more" other_query="" id="show_more_'.$cp["competition_id"].'" competition="'.$cp["competition_id"].'" last_id="10"/>Show More</button>';
		$html2.='</div>';
	}
	$html.='</ul>';
	
	echo $html.$html2;
	?>


  

<script>
	$(document).ready(function() {	
		var url = window.location.href;
		var arguments = url.split('#')[1].split('=');
		var tabs = arguments.shift();
		// alert(arguments.shift());
		// alert(tabs);
		$("."+tabs).click();
	})
</script>
</div>