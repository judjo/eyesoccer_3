<div class="container-fluid" style="margin-top: 5%;">
	<div class="row">
		<div class="col-lg-12 col-md-12 header-iphone">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#tab_pemain">Pemain</a></li>
			<li><a data-toggle="tab" href="#tab_klub">Klub</a></li>
			<li><a data-toggle="tab" href="#tab_pendaftaran">Pendaftaran</a></li>
		</ul>

		<div class="tab-content">
			<div id="tab_pemain" class="tab-pane fade in active">
				
				<?php
				$date2=date("Y-m-d H:i:s");
				$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','player','','".$_SESSION["ip"]."')");

				$cmd22=$this->db->query("select * from tbl_running_text where place='list_pemain' LIMIT 1");
				$run=$cmd22->row_array();
				$tp2=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id ORDER BY a.name ASC")->num_rows();
				?>
				<div style="background:#3d3d3d;color:#fff;padding:10px;"><marquee><?=$run["description"]?></marquee></div>
				<h1 id="t2">Daftar Pemain <button class="btn btn-info" style="background-color:#31b0d5">Total Pemain : <b><?=$tp2?> Pemain</b></button></h1>
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
						$html.='<li class="'.$active.'"><a data-toggle="tab" href="#tab-'.$cp["competition_id"].'" id="a4">'.$cp["competition"].'</a></li>';
						
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
				</div>
			</div>
			<div id="tab_klub" class="tab-pane fade">
				<?php
				$date2=date("Y-m-d H:i:s");
				$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','player','','".$_SESSION["ip"]."')");
				$tp2=$this->db->query("SELECT * FROM tbl_club WHERE active='1'")->num_rows();
				?>

				<div class="col-lg-11 col-md-11">
				<!--<div style="background:#3d3d3d;color:#fff;padding:10px;"><marquee><strong>Bagi yang mendaftar Liga Pelajar U16 dan Liga Santri Nusantara pada tanggal 4 - 7 Agustus 2017. Di harap menginput ulang atau mendaftar ulang atau dapat menghubungi saudara Ajuan Firel (081384009828)</strong></marquee></div>-->
				<h1 id="t2">Daftar Klub <button class="btn btn-info" style="background-color:#31b0d5">Total Klub : <b><?=$tp2?> Klub</b></button></h1>


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
						$html.='<li class="'.$active.'"><a data-toggle="tab" href="#tabklub-'.$cp["competition_id"].'" id="a4">'.$cp["competition"].'</a></li>';
						
						$html2.='<div id="tabklub-'.$cp["competition_id"].'" class="tab-pane fade in '.$active.'"><br />';
						
						$tp=$this->db->query("SELECT * FROM tbl_club WHERE competition='".$cp["competition"]."' AND active='1'")->num_rows();
						
						$html2.="<div class='col-lg-12 col-xs-12'><p class='h4'>Total Klub terdaftar di <b class='liga_name_".$cp["competition_id"]."'>".$cp["competition"]."</b> sebanyak <b class='liga_total_".$cp["competition_id"]."'>".$tp."</b><b> Klub</b></p><br /></div>";
						
						if($cp["competition_id"]!="4")
						{
						$club=$this->db->query("SELECT * FROM tbl_club WHERE competition='".$cp["competition"]."' AND active='1' ORDER BY name ASC");
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
			</div>
			<div id="tab_pendaftaran" class="tab-pane fade">
				<a href="" class="btn btn-primary">Daftar</a>
				<br>
				<br>
			</div>
		</div>
	</div>
	</div>
</div>