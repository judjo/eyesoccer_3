<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeprofile extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyeprofile_model');
			date_default_timezone_set("Asia/Jakarta");
    }
	public function index()
	{	
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="eyeprofile";
		
		
		$data["body"]=$this->load->view('eyeprofile/competition_types', $data, true);
		$this->load->view('template-baru',$data);
	}
	public function pemain(){
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="eyeprofile";
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/pemain', $data, true);
		$data["extrascript"]=$this->load->view('eyeprofile/pemain_script', $data, true);
		$this->load->view('template-baru',$data);
		//$this->load->view('eyeprofile/pemain_script',$data);
	}
	public function pemain_detail($id=''){
		if($id=="")
		{
			redirect("eyeprofile/pemain");
			
		}
		$pemain=$this->db->query("SELECT a.*,b.name as club_name,b.competition,b.logo FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id WHERE player_id='".$id."' LIMIT 1")->row_array();
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
			<!-- Begin of SEO Meta Tags -->
			<title>'.$pemain['name'].' - EyeProfile | EyeSoccer</title>
			<meta name="title" content="'.$pemain['name'].' - EyeProfile | EyeSoccer" />
			<meta name="description" content="Profil lengkap '.$pemain['name'].' - klub, status, nomor punggung, posisi bermain, karir dan informasi detil lainnya tentang '.$pemain['name'].'." />
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyeprofile/pemain-detail/'.$id.'" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyeprofile/pemain-detail/'.$id.'" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="'.$pemain['name'].' - EyeProfile | EyeSoccer" />
			<meta property="og:description" content="Profil lengkap '.$pemain['name'].' - klub, status, nomor punggung, posisi bermain, karir dan informasi detil lainnya tentang '.$pemain['name'].'." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'systems/player_storage/'.$pemain["pic"].'" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="'.$pemain['name'].' - EyeProfile | EyeSoccer" />
			<meta name="twitter:description" content="Profil lengkap '.$pemain['name'].' - klub, status, nomor punggung, posisi bermain, karir dan informasi detil lainnya tentang '.$pemain['name'].'." />
			<meta name="twitter:image" content="'.base_url().'systems/player_storage/'.$pemain["pic"].'" />
			<!--end of twitter card data-->

		';
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="eyeprofile";
		$data["pid"]=$id;
		if(isset($_SESSION["member_id"]))
		{
		$check_player=$this->db->query("SELECT * FROM tbl_member_player WHERE id_member='".$_SESSION["member_id"]."' AND id_player='".$id."' AND active='1'");
		if($check_player->num_rows()>0)
		{
			$data["editable"]="1";
		}
		else{
			$data["editable"]="0";
			}
		}
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/pemain_detail', $data, true);
		//$data["extrascript"]=$this->load->view('eyeprofile/pemain_script', $data, true);
		$this->load->view('template-baru',$data);
		//$this->load->view('eyeprofile/pemain_script',$data);
	}
	public function klub(){
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
			<!-- Begin of SEO Meta Tags -->
			<title>Klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer - EyeProfile | EyeSoccer</title>
			<meta name="title" content="Klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer - EyeProfile | EyeSoccer" />
			<meta name="description" content="Daftar klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer beserta profil lengkap masing-masing klub." />
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyeprofile/klub/league-name-slug" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyeprofile/klub/league-name-slug" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="Klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer - EyeProfile | EyeSoccer" />
			<meta property="og:description" content="Daftar klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer beserta profil lengkap masing-masing klub." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'img/club_hitam.png" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="Klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer - EyeProfile | EyeSoccer" />
			<meta name="twitter:description" content="Daftar klub Liga Indonesia 1, Liga Indonesia 2, Liga Indonesia 3, Liga Usia Muda, SSB/Akademi Sepakbola, Liga Eyesoccer beserta profil lengkap masing-masing klub." />
			<meta name="twitter:image" content="'.base_url().'img/club_hitam.png" />
			<!--end of twitter card data-->

		';
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="eyeprofile";
		
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/klub', $data, true);
		$data["extrascript"]=$this->load->view('eyeprofile/klub_script', $data, true);
		$this->load->view('template-baru',$data);
		//$this->load->view('eyeprofile/pemain_script',$data);
	}
	public function klub_detail($id=''){
		if($id=="")
		{
			redirect("eyeprofile/klub");
			
		}
		$dataquery=($this->db->query("SELECT * FROM tbl_club WHERE club_id='".$id."' LIMIT 1")->row_array());
		
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
			<!-- Begin of SEO Meta Tags -->
			<title>'.$dataquery['name'].' - EyeProfile | EyeSoccer</title>
			<meta name="title" content="'.$dataquery['name'].' - EyeProfile | EyeSoccer" />
			<meta name="description" content="Profil lengkap klub sepak bola '.$dataquery['name'].' - skuad, ofisial, sejarah, suporter, dan informasi detil lainnya tentang '.$dataquery['name'].'." />
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyeprofile/klub-detail/'.$id.'" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyeprofile/klub-detail/'.$id.'" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="'.$dataquery['name'].' - EyeProfile | EyeSoccer" />
			<meta property="og:description" content="Profil lengkap klub sepak bola '.$dataquery['name'].' - skuad, ofisial, sejarah, suporter, dan informasi detil lainnya tentang '.$dataquery['name'].'." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'systems/club_logo/'.$dataquery['logo'].'" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="'.$dataquery['name'].' - EyeProfile | EyeSoccer" />
			<meta name="twitter:description" content="Profil lengkap klub sepak bola '.$dataquery['name'].' - skuad, ofisial, sejarah, suporter, dan informasi detil lainnya tentang '.$dataquery['name'].'." />
			<meta name="twitter:image" content="'.base_url().'systems/club_logo/'.$dataquery['logo'].'" />
			<!--end of twitter card data-->

		';
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="eyeprofile";
		$data["cid"]=$id;
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/klub_detail', $data, true);
		//$data["extrascript"]=$this->load->view('eyeprofile/pemain_script', $data, true);
		$this->load->view('template-baru',$data);
		//$this->load->view('eyeprofile/pemain_script',$data);
	}
	public function getClub(){
		$html2="";if($_POST["liga_id"]=="1"){
		$gettotal=($this->db->query("SELECT a.* FROM tbl_club a LEFT JOIN tbl_users b ON b.user_id=a.user_id WHERE IDProvinsi='".$_POST["provinsi_id"]."' AND IDKabupaten='".$_POST["kabupaten_id"]."' AND b.id_liga='".$_POST["liga_id"]."' ORDER BY name ASC")->num_rows());
		$getname=($this->db->query("SELECT * FROM tbl_liga WHERE id_liga='".$_POST["liga_id"]."'")->row_array());
			$getname2=($this->db->query("SELECT * FROM provinsi WHERE IDProvinsi='".$_POST["provinsi_id"]."'")->row_array());
			$getname3=($this->db->query("SELECT * FROM kabupaten WHERE IDKabupaten='".$_POST["kabupaten_id"]."'")->row_array());
			
		$data["html2"]=$getname["nama_liga"]." - ".$getname2["Nama"]." - ".$getname3["Nama"];
		$data["html3"]=$gettotal;
		$club=$this->db->query("SELECT a.* FROM tbl_club a LEFT JOIN tbl_users b ON b.user_id=a.user_id WHERE IDProvinsi='".$_POST["provinsi_id"]."' AND IDKabupaten='".$_POST["kabupaten_id"]."' AND b.id_liga='".$_POST["liga_id"]."' ORDER BY name ASC");	
		if(($club->num_rows())>0){		
		$html2.='<br /><br /><hr />';	
		foreach($club->result_array() as $cb){
		$html2.='<div class="col-xs-12 col-lg-6 ">
		<div class="media" onclick="window.location.href=\"'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'\"" style="cursor:pointer" class="bg-success">			<div class="media-left"><img src="'.base_url().'systems/club_logo/'.$cb["logo"].'" class="media-object" id="img5"></div>			<div class="media-body"><a href="'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'" id="a4">			<p class="media-heading">'.$cb["name"].'</p><small id="set6"><i class="fa fa-flag"></i> '.$cb["competition"].'</small></a>			</div>			</div>			<hr></hr>			</div>';			}			}
		}else{
			$club=$this->db->query("SELECT a.* FROM tbl_club a INNER JOIN tbl_users b ON b.user_id=a.user_id WHERE id_liga='".$_POST["liga_id"]."' AND IDProvinsi='".$_POST["provinsi_id"]."' ORDER BY name ASC");			if(($club->num_rows())>0)			{			$html2.='<br /><br /><hr />';						foreach($club->result_array() as $cb){			$html2.='<div class="col-xs-12 col-lg-6 ">			<div class="media" onclick="window.location.href=\"'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'\"" style="cursor:pointer" class="bg-success">			<div class="media-left"><img src="'.base_url().'systems/club_logo/'.$cb["logo"].'" class="media-object" id="img5"></div>			<div class="media-body"><a href="'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'" id="a4">			<p class="media-heading">'.$cb["name"].'</p><small id="set6"><i class="fa fa-flag"></i> '.$cb["competition"].'</small></a>			</div>			</div>			<hr></hr>			</div>';			}			}
			}
			

		$data["html1"]=$html2;
		echo json_encode($data);
	}
	
	public function getClub2()
	{
		$html2="";
	$gettotal=($this->db->query("SELECT a.* FROM tbl_club a INNER JOIN tbl_users b ON b.user_id=a.user_id WHERE b.id_liga='".$_POST["liga_id"]."' AND b.username LIKE '".$_POST["provinsi_id"]."%' ORDER BY name ASC")->num_rows());
	$getname=($this->db->query("SELECT * FROM tbl_liga WHERE id_liga='".$_POST["liga_id"]."'")->row_array());
	$getname2=($this->db->query("SELECT * FROM regional WHERE kode_user='".$_POST["provinsi_id"]."'")->row_array());

	$club=$this->db->query("SELECT a.* FROM tbl_club a INNER JOIN tbl_users b ON b.user_id=a.user_id WHERE b.id_liga='".$_POST["liga_id"]."' AND b.username LIKE '".$_POST["provinsi_id"]."%' ORDER BY name ASC");			
	if(($club->num_rows())>0){			
	$html2.='<br /><br /><hr />';
		foreach($club->result_array() as $cb){
			$html2.='<div class="col-xs-12 col-lg-6 ">			
			<div class="media" onclick="window.location.href=\"'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'\"" style="cursor:pointer" class="bg-success">			
			<div class="media-left"><img src="'.base_url().'systems/club_logo/'.$cb["logo"].'" class="media-object" id="img5"></div>			
			<div class="media-body"><a href="'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'" id="a4">			
			<p class="media-heading">'.$cb["name"].'</p><small id="set6"><i class="fa fa-flag"></i> '.$cb["competition"].'</small></a>			
			</div>			
			</div>			
			<hr></hr>			
			</div>';			
		}			
	}
	
	$data["html1"]=$html2;
	$data["html2"]=$getname["nama_liga"]." di ".$getname2["regional"];
	$data["html3"]=$gettotal;
	echo json_encode($data);
	}
	public function getKabupaten()
	{
		$gettotal=($this->db->query("SELECT * FROM tbl_club WHERE id_liga='".$_POST["liga_id2"]."' AND IDProvinsi='".$_POST["liga_id"]."'")->num_rows());
$getname=($this->db->query("SELECT * FROM tbl_liga WHERE id_liga='".$_POST["liga_id2"]."'")->row_array());
	$getname2=($this->db->query("SELECT * FROM provinsi WHERE IDProvinsi='".$_POST["liga_id"]."'")->row_array());

$html2="<select class='liga_kabupaten form-control'><option value=''>Pilih Kabupaten</option>";
			$kabupaten=$this->db->query("SELECT * FROM kabupaten WHERE IDProvinsi='".$_POST["liga_id"]."' ORDER BY Nama ASC");
			foreach($kabupaten->result_array() as $kab)
			{
				$html2.="<option value='".$kab["IDKabupaten"]."'>".$kab["Nama"]."</option>";
			}
			$html2.="</select>";
$data["html1"]=$html2;
$data["html2"]=$getname["nama_liga"]." - ".$getname2["Nama"];
$data["html3"]=$gettotal;
echo json_encode($data);
	}
	public function getKabupaten2()
	{
		
			$kabupaten=$this->db->query("SELECT * FROM kabupaten WHERE IDProvinsi='".$_POST["liga_id"]."' ORDER BY Nama ASC");
			$html2="<option value=''>Pilih Kabupaten</option>";
			foreach($kabupaten->result_array() as $kab)
			{
				$html2.="<option value='".$kab["IDKabupaten"]."'>".$kab["Nama"]."</option>";
			}
			
$data["html1"]=$html2;
echo json_encode($data);
	}
	public function getProvinsi()
	{
		$gettotal=$this->db->query("SELECT * FROM tbl_club WHERE id_liga='".$_POST["liga_id"]."'")->num_rows();
	$getname=$this->db->query("SELECT * FROM tbl_liga WHERE id_liga='".$_POST["liga_id"]."'")->row_array();
	$html2="";
if($_POST["liga_id"]=="1"){
	
	$class="liga_provinsi";	
	$html2="<div class='col-xs-12 col-lg-6'>
	<select class='".$class." form-control'>
	<option value=''>Pilih Provinsi</option>";
	$provinsi=$this->db->query("SELECT * FROM provinsi ORDER BY Nama ASC");
	foreach($provinsi->result_array() as $pr){
	$html2.="<option value='".$pr["IDProvinsi"]."'>".$pr["Nama"]."</option>";			
	}			
	$html2.="</select></div><div class='col-xs-12 col-lg-6 kabupaten_replace'></div>";
	}
	elseif($_POST["liga_id"]=="2"){
		$class="liga_provinsi2";
		$html2="<div class='col-xs-12 col-lg-6'>
		<select class='".$class." form-control'>
		<option value=''>Pilih Regional</option>";
		
		$provinsi=$this->db->query("SELECT * FROM regional ORDER BY regional ASC");
		foreach($provinsi->result_array() as $pr){
		$html2.="<option value='".$pr["kode_user"]."'>".$pr["regional"]."</option>";			
		}			
		$html2.="</select></div>";
	}
	elseif($_POST["liga_id"]=="3"){
		$club=$this->db->query("SELECT * FROM tbl_club WHERE id_liga='".$_POST["liga_id"]."' AND active='1' ORDER BY name ASC");			
	if($club->num_rows()>0){			
	$html2.='<br /><br /><hr />';
		foreach($club->result_array() as $cb){
			$html2.='<div class="col-xs-12 col-lg-6 ">			
			<div class="media" onclick="window.location.href=\"'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'\"" style="cursor:pointer" class="bg-success">			
			<div class="media-left"><img src="'.base_url().'systems/club_logo/'.$cb["logo"].'" class="media-object" id="img5"></div>			
			<div class="media-body"><a href="'.base_url().'eyeprofile/klub_detail/'.$cb["club_id"].'" id="a4">			
			<p class="media-heading">'.$cb["name"].'</p><small id="set6"><i class="fa fa-flag"></i> '.$cb["competition"].'</small></a>			
			</div>			
			</div>			
			<hr></hr>			
			</div>';			
		}			
	}
	}
	
	$data["html1"]=$html2;
	$data["html2"]=$getname["nama_liga"];
	$data["html3"]=$gettotal;
	echo json_encode($data);
	}
	
	public function getPemain(){
		$html2="";
	
		$club=$this->db->query("SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id INNER JOIN tbl_competitions c ON c.competition=b.competition WHERE c.competition_id='".$_POST["comp_id"]."' AND a.name LIKE '%".$_POST["other_query"]."%' ORDER BY name ASC LIMIT ".$_POST["last_id"].",10");			
		if($club->num_rows()>0){			
		$html2.='<br /><br /><hr />';
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
		}
		
		$data["html1"]=$html2;
		$data["html2"]="SELECT a.*,b.name as club_name,b.competition FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id INNER JOIN tbl_competitions c ON c.competition=b.competition WHERE c.competition_id='".$_POST["comp_id"]."' AND a.name LIKE '%".$_POST["other_query"]."%' ORDER BY name ASC LIMIT ".$_POST["last_id"].",10";
		//echo json_encode($data);
		echo json_encode($data);
	}
	public function getKlub(){
		$html2="";
	
		$club=$this->db->query("SELECT * FROM tbl_club WHERE competition='".$_POST["last_id"]."' AND active='1' and name LIKE '%".html_entity_decode($_POST["other_query"], ENT_QUOTES, "UTF-8")."%' ORDER BY name ASC");			
		if($club->num_rows()>0){		
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
			</div>';		
			}			
		}
		
		$data["html1"]=$html2;
		echo json_encode($data);
	}
	public function daftar($profile=""){
		
		if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
		{
			redirect("eyeprofile");
			//header("location:".base_url()."eyeprofile");
		}
		else{
		$user_id=$_SESSION["user_id"];
		
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["page"]="eyeprofile";
			
		if($profile=="club")
		{
			
			if(isset($_POST['opt1'])){
				$nclub=1;
				$cmdn=$this->db->query("select * from tbl_club");
				foreach($cmdn->result_array() as $rown){
				$nclub=$rown['club_id'];
				$nclub++;  
				}
				if($nclub<10){
				$nclub="000".$nclub;
				}
				else if($nclub>9 && $nclub<99){
				$nclub="00".$nclub;
				}
else if($nclub>99 & $nclub<999){
				$nclub="0".$nclub;
				}
				else if($nclub>999){
				$nclub=$nclub;
				}
				$name=$_POST['name'];
				$fax=$_POST['fax'];
				$nickname=$_POST['nickname'];
				$establish_date=$_POST['establish_date'];
				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$stadium=$_POST['stadium'];
				$competition=$_POST['competition'];
				$address=addslashes($_POST['address']);
				$description=addslashes($_POST['description']);
				$image_name=rand("1000","9999");
				// $_FILES['logo']['name']=$image_name.$_FILES['logo']['name'];
				// $logo=$_FILES['logo']['name'];
				$image_name=rand("1000","9999");
				$logo=$image_name.$_FILES['logo']['name'];
				$getidliga=$this->db->query("SELECT * FROM tbl_users WHERE user_id='".$_SESSION["user_id"]."'")->row_array();
				$id_liga=$getidliga["id_liga"];
				
				$config['upload_path']          = getcwd().'/systems/club_logo/';
                $config['file_name']        =	 $logo;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 0;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('logo') )
                {
                       //print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';   
					   $logo="";
                }
                
                  /*        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
              }
				
				if(file_exists(base_url()."assets/club_logo/".$logo)){
					
				}  
				else{*/
				$cmd=$this->db->query("insert into tbl_club (club_id,user_id,name,nickname,establish_date,phone,fax,email,stadium,competition,address,description,logo,IDProvinsi,IDKabupaten,id_liga) values ('$nclub','".$_SESSION["user_id"]."','$name','$nickname','$establish_date','$phone','$fax','$email','$stadium','$competition','$address','$description','$logo','".$_POST["IDProvinsi"]."','".$_POST["IDKabupaten"]."','".$id_liga."')");
				// move_uploaded_file($_FILES['logo']['tmp_name'],"../systems/club_logo/".$logo);
				$_SESSION["club_id"]=$nclub;
				redirect("eyeprofile/daftar/official");
				
			}

			$check=$this->db->query("SELECT * FROM tbl_club WHERE user_id='".$user_id."' LIMIT 1");
			if($check->num_rows()>0)
			{
				$data=$check->row_array();
				$_SESSION['club_id']=$data["club_id"];
				header("location:".base_url()."../eyeprofile/klub_detail/".$data["club_id"]);
			}
			$data["body"]=$this->load->view('eyeprofile/club_daftar', $data, true);
		}
		else if($profile=="official")
		{
			
		$check=$this->db->query("SELECT * FROM tbl_club WHERE user_id='".$user_id."' LIMIT 1");
			if($check->num_rows()>0)
			{
				$myclub=$check->row_array();
				$_SESSION['club_id']=$myclub["club_id"];
				//header("location:".base_url()."../eyeprofile/klub_detail/".$data["club_id"]);
				$data["club_id"]=$myclub["club_id"];
			}
			else{
				redirect("eyeprofile/daftar/club");
			}
				if(isset($_POST['opt2'])){
		
				$name=$_POST['name'];
				$club_id=$_POST['club_id'];
				//$description=$_POST['description'];
				$birth_place=$_POST['birth_place'];
				$birth_date=$_POST['birth_date'];	
				$nationality=$_POST['nationality'];
				$position=$_POST['position'];
				$contract=$_POST['contract'];
				$license=$_POST['license'];
				$no_identity=$_POST['no_identity'];
				$image_name=rand("1000","9999");
				$pic=$image_name.$_FILES['pic']['name'];  
				//echo "insert into tbl_official_team (club_now,name,birth_place,birth_date,nationality,position,contract,official_photo,no_identity,license) values ('$club_id','$name','$birth_place','$birth_date','$nationality','$position','$contract','$pic','$no_identity','$license')";
				//exit;
				$config['upload_path']          = getcwd().'/systems/player_storage/';
                $config['file_name']        =	 $pic;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 0;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('pic'))
                {
                       print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';   
					   $pic="";
                }
                else
                {
					$dataupload = array('upload_data' => $this->upload->data());
					$pic=$dataupload['upload_data']['file_name'];
				}
					//print_r($data);
					//exit;
                  /*        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
              }
				
				if(file_exists(base_url()."assets/club_logo/".$logo)){
					
				}  
				else{*/
				$cmd=$this->db->query("insert into tbl_official_team (club_now,name,birth_place,birth_date,nationality,position,contract,official_photo,no_identity,license) values ('$club_id','$name','$birth_place','$birth_date','$nationality','$position','$contract','$pic','$no_identity','$license')");
			
				//move_uploaded_file($_FILES['pic']['tmp_name'], "../systems/player_storage/".$pic);
				//header("refresh:0");
				redirect("eyeprofile/daftar/official");
				
     
		
		}
      
			
			$data["body"]=$this->load->view('eyeprofile/official_daftar', $data, true);
			
		}
		else if($profile=="player")
		{
		$check=$this->db->query("SELECT * FROM tbl_club WHERE user_id='".$user_id."' LIMIT 1");
			if($check->num_rows()>0)
			{
				
				$myclub=$check->row_array();
				$_SESSION['club_id']=$myclub["club_id"];
				//header("location:".base_url()."../eyeprofile/klub_detail/".$data["club_id"]);
				$data["club_id"]=$myclub["club_id"];
			}
			else{
				redirect("eyeprofile/daftar/club");
			}
				if(isset($_POST['opt3'])){
				$name=$_POST['name'];
				$club_id=$_POST['club_id'];
				$description=$_POST['description'];
				$birth_place=$_POST['birth_place'];
				$birth_date=$_POST['birth_date'];	
				$height=$_POST['height'];
				$weight=$_POST['weight'];
				$nationality=$_POST['nationality'];
				$position=$_POST['position'];
				$number=$_POST['number'];		
				if(isset($_FILES['pic']['name']))
				{
				$pic=rand(100000,999999).$_FILES['pic']['name'];  		
				}
				else{
				$pic="";
				}
				$pic = preg_replace('/\s+/', '', $pic);
				move_uploaded_file($_FILES['pic']['tmp_name'], "systems/player_storage/".$pic);
				$data["statusDb"] = '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Success !</div></div>';
				/* $config['upload_path']          = getcwd().'/systems/player_storage/';
                $config['file_name']        =	 $pic;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 0;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('pic'))
                {
                       print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';   
					   $pic="";
                }
                else
                {
					$dataupload = array('upload_data' => $this->upload->data());
					$pic=$dataupload['upload_data']['file_name'];
				}	 */
                  /*        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
              }
				
				if(file_exists(base_url()."assets/club_logo/".$logo)){
					
				}  
				else{*/
				$cmd=$this->db->query("insert into tbl_player (club_id,name,description,birth_place,birth_date,height,weight,nationality,position,number,pic) values ('$club_id','$name','$description','$birth_place','$birth_date','$height','$weight','$nationality','$position','$number','$pic')");
				//move_uploaded_file($_FILES['pic']['tmp_name'], "../systems/player_storage/".$pic);
				redirect("eyeprofile/daftar/player");
				}
				
      
			$data["body"]=$this->load->view('eyeprofile/player_daftar', $data, true);
		}
		/* else if($profile=="player_registration"){
			$data["newURL"] = 'https://www.eyesoccer.id/eyeprofile';
			$data["body"]=$this->load->view('eyeprofile/player_registration', $data, true);
		} */
		$this->load->view('template-baru',$data);
		}
	}
	function logout(){
				$club_id=$_SESSION['club_id'];
				unset($_SESSION["club_id"],$_SESSION["user_id"]);
				session_destroy();
				
				header("location:".base_url()."../eyeprofile/klub_detail/".$club_id);
	}
	function eyeticket(){
		$this->load->view('eyeticket/eyeticket');
	}
	public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
	public function eyeprofile_tab()
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="eyeprofile";
		
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/eyeprofile_tab', $data, true);
		$data["extrascript"]=$this->load->view('eyeprofile/pemain_script_mobile', $data, true);
		$this->load->view('template-baru',$data);
	}

	public function login(){
		 
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_users where username='".$username."' and password='".$password."'");
      $row=$cmd->row_array();
      $user_id=$row['user_id'];
	 // print_r($row);
      if($row['username']=="" && $row['password']==""){
		
		
		  redirect("eyeprofile");
      //header("refresh:0");  
      }
      else{
      $_SESSION['user_id']=$user_id;
	  redirect("eyeprofile/daftar/official");
      //header("location:".base_url()."eyeprofile/");  
	  
      }  
	}
	
	public function karir_klub()
	{

		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$player_id = $_GET['player_id'];

		$books = $this->Eyeprofile_model->karir_klub($player_id);

		$data = array();

		foreach($books->result() as $r) {

		   $data[] = array(				
				$r->bulan,
				$r->tahun,
				$r->klub,
				$r->turnamen,
				$r->jumlah_main,
				$r->no_pg,
				$r->pelatih
		   );
		}

		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => $books->num_rows(),
			 "recordsFiltered" => $books->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
		exit();
	}
	
	public function karir_klub_amatir()
	{

		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$player_id = $_GET['player_id'];

		$books = $this->Eyeprofile_model->karir_klub($player_id);

		$data = array();

		foreach($books->result() as $r) {

		   $data[] = array(
				$r->bulan,
				$r->tahun,
				$r->klub,
				$r->turnamen,
				$r->jumlah_main,
				$r->no_pg,
				$r->pelatih
		   );
		}

		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => $books->num_rows(),
			 "recordsFiltered" => $books->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
		exit();
	}
	
	public function karir_timnas_prof()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$player_id = $_GET['player_id'];

		$books = $this->Eyeprofile_model->karir_timnas($player_id);

		$data = array();

		foreach($books->result() as $r) {

		   $data[] = array(
				$r->tahun,
				$r->turnamen,
				$r->negara,
				$r->jumlah_main,
				$r->no_pg,
				$r->pelatih
		   );
		}

		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => $books->num_rows(),
			 "recordsFiltered" => $books->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function karir_timnas_amatir()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$player_id = $_GET['player_id'];

		$books = $this->Eyeprofile_model->karir_timnas($player_id);

		$data = array();

		foreach($books->result() as $r) {

		   $data[] = array(
				$r->tahun,
				$r->turnamen,
				$r->negara,
				$r->jumlah_main,
				$r->no_pg,
				$r->pelatih
		   );
		}

		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => $books->num_rows(),
			 "recordsFiltered" => $books->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function prestasi_player()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$player_id = $_GET['player_id'];

		$books = $this->Eyeprofile_model->prestasi_player($player_id);

		$data = array();

		foreach($books->result() as $r) {

		   $data[] = array(
				$r->tahun,
				$r->turnamen,
				$r->negara,
				$r->peringkat,
				$r->penghargaan
		   );
		}

		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => $books->num_rows(),
			 "recordsFiltered" => $books->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
		exit();
	}
	
	public function prestasi_klub()
	{

		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$club_id = $_GET['club_id'];

		$books = $this->Eyeprofile_model->karir_klub($club_id);

		$data = array();

		foreach($books->result() as $r) {

		   $data[] = array(				
				$r->bulan,
				$r->tahun,
				$r->turnamen,
				$r->peringkat,
				$r->pelatih
		   );
		}

		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => $books->num_rows(),
			 "recordsFiltered" => $books->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
		exit();
	}
	
	public function update_pemain(){
		$data["page"]="eyeprofile";
		
		if((isset($_GET['player_id']) && isset($_SESSION["member_id"])) || (isset($_GET['player_id']) && isset($_GET["admineye"]))){
			$query = $this->db->query("select a.*,b.competition from tbl_player  a left join tbl_club b ON b.club_id=a.club_id where a.player_id='".$_GET['player_id']."'");
			$data["row"] = $query->row();
			if(isset($_SESSION["member_id"])){
				$member_id = $_SESSION["member_id"];
			}else{
				$member_id = $_GET["id_member"];
			}
			$member_player = $this->db->query("SELECT * FROM tbl_member_player WHERE id_member='".$member_id."'");
			$cek = $member_player->num_rows();
			$data["player_id"]=$_GET['player_id'];
			$player_id=$_GET['player_id'];
			if($cek>0)
			{
				// echo "Page Update Pemain";exit();
				$query2 = $this->db->query('select * from tbl_player_position');
				$query3 = $this->db->query('select * from tbl_kemampuan_kaki');
				$query4 = $this->db->query('SELECT * FROM tbl_karir_player where player_id='.$_GET['player_id'].' and timnas=0');
				$query5 = $this->db->query('SELECT * FROM tbl_karir_player where player_id='.$_GET['player_id'].' and timnas=1');
				$data["posisi1"] = $query2->result();
				$data["posisi2"] = $query2->result();
				$data["kemampuan_kaki"] = $query3->result();
				$data["karir_player"] = $query4->result();
				$data["karir_timnas"] = $query5->result();
				$data["newinsert"] = 0;
				
				$querytmp = $this->db->query("select * from tbl_tmp_player where player_id='".$_GET['player_id']."' and newinsert=1");
				$cektmp = $querytmp->num_rows();
				if($cektmp>0)
				{
					$data["newinsert"] = 1;
					$query = $this->db->query("select a.*,b.competition from tbl_tmp_player  a left join tbl_club b ON b.club_id=a.club_id where a.player_id='".$_GET['player_id']."'");
					$data["row"] = $query->row();
				}
				
				$this->load->view('config-session',$data);
				$data["body"]=$this->load->view('eyeprofile/update_pemain', $data, true);
				$this->load->view('template-baru',$data);
			}else{
				// echo "keluar";exit();
				header("Refresh:0; url=/eyeprofile/pemain_detail/$player_id");
			}
		}else{
			// echo "keluar";exit();
			header("Refresh:0; url=/");
		}
	}
	
	public function post_update_pemain(){
		// print_r($_POST);
		// print_r($_FILES);
		// exit();
		if(!empty($this->input->post('player_id')) && isset($_SESSION["member_id"])){
			$player_id = $this->input->post('player_id');
			$_POST["inserton"]=date('Y-m-d H:i:s');
			$_POST["newinsert"]=1;
			if(empty($_FILES['pic']['name'])){
				unset($_POST['pic']);
			}else{
				$pic=$_FILES['pic']['name']; 
				$pic=rand(10000,99999)."-".$_FILES['pic']['name'];
				$_POST["pic"]=$pic;
				move_uploaded_file($_FILES['pic']['tmp_name'], "systems/player_storage/".$pic);
			}
			// print_r($_POST);exit();
			$this->db->trans_start();			
			$this->db->where('player_id', $player_id);
			$this->db->update('tbl_tmp_player', $_POST);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
			{
				$result = "update gagal";
			}else{
				$result = "update sukses";
			}
			header("Refresh:0; url=/eyeprofile/update_pemain?player_id=$player_id");
			// redirect("/eyeprofile/update_pemain?player_id=".$player_id);
			echo "<script>alert('".$result."')</script>";
		}else{
			redirect("/");
		}
	}
}
