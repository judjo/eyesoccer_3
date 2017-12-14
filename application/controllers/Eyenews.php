<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyenews extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyenews_model');
			date_default_timezone_set('Asia/Jakarta');

			
    }
	public function index()
	{	
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='<!-- Begin of SEO Meta Tags -->
			<title>EyeNews: Berita Sepak Bola Terkini Nasional dan Dunia | EyeSoccer</title>
			<meta name="title" content="EyeNews: Berita Sepak Bola Terkini Nasional dan Dunia | EyeSoccer" />
			<meta name="description" content="Portal berita sepak bola no. 1 di Indonesia - info sepak bola nasional terkini, timnas senior & usia muda, berita klub dan pemain sepak bola nasional & dunia." />
			<meta name="news_keywords" content="kabar bola terkini, info sepak bola terbaru, kabar sepak bola terkini, kabar sepak bola hari ini, kabar sepak bola terbaru, info sepak bola hari ini">
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyenews" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyenews" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="EyeNews: Berita Sepak Bola Terkini Nasional dan Dunia | EyeSoccer" />
			<meta property="og:description" content="Portal berita sepak bola no. 1 di Indonesia - info sepak bola nasional terkini, timnas senior & usia muda, berita klub dan pemain sepak bola nasional & dunia." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'img/eyenews_nav.png" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="EyeNews: Berita Sepak Bola Terkini Nasional dan Dunia | EyeSoccer" />
			<meta name="twitter:description" content="Portal berita sepak bola no. 1 di Indonesia - info sepak bola nasional terkini, timnas senior & usia muda, berita klub dan pemain sepak bola nasional & dunia." />
			<meta name="twitter:image" content="'.base_url().'img/eyenews_nav.png" />
			<!--end of twitter card data-->
		';
		$data["order"] = " order by publish_on desc";
		if(isset($_GET['search'])){
			if($_GET['search']=="populer"){
				// $search=" and news_type <>''";
				$search="populer";
				$data["pagingsearch"]="&search=".$search;
				$data["order"] = " order by news_view desc";
				$data["searchnews"]="";
				$data["publish"] = "";
			}else if($_GET['search']=="rekomendasi"){
				// $search=" and category_news ='2'";
				$search="rekomendasi";
				$data["pagingsearch"]="&search=".$search;
				$data["order"] = " order by publish_on desc";
				$data["searchnews"]=" and category_news ='2'";
				$data["publish"] = "";
			}else{
				$data["searchnews"]=" and title LIKE '%".$_GET['search']."%'";
				$data["pagingsearch"]="&search=".$_GET['search'];
			}
		}else{
			$data["searchnews"]="";
			$data["pagingsearch"]="";
		}
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyenews/index', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function detail($eyenews_id='',$action=null)
	{
		
		$eyenews_id2 = $eyenews_id; //update rizki
		$query=$this->db->query("SELECT * FROM tbl_eyenews WHERE url='".$eyenews_id."' LIMIT 1");
		$row=$query->row_array();
		
		if($query->num_rows()>0){
			$eyenews_id=$row["eyenews_id"];
			$linksite=$row["url"];
		}else{
			$row=$this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id = '$eyenews_id2' LIMIT 1")->row_array(); //update rizki
			$linksite=$row["url"]; //update rizki
			$eyenews_id=$row["eyenews_id"]; //update rizki
		}
		
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		/* $data["meta"]["share"]='<title>Eyesoccer - '.$row['title'].'</title><meta name="twitter:card" content="summary" />
<meta name="twitter:username" content="@sobatjudjo" />
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:title" content="'.$row['title'].'" />
<meta name="twitter:description" content="'.substr(strip_tags($row['description']),0,100).'" />
<meta name="twitter:image" content="'.base_url().'/systems/eyenews_storage/'.$row['pic'].'" />
<meta property="og:title" content="'.$row['title'].'" />
<meta property="og:url" content="'.base_url().'/eyenews/detail/'.$linksite.'" />
<meta property="og:type" content="article" />
<meta property="og:image" content="'.base_url().'/systems/eyenews_storage/'.$row['pic'].'" />
<meta property="og:description" content="'.substr(strip_tags($row['description']),0,100).'" />
<meta property="fb:app_id" content="966242223397117" />
'; */
/* '.substr(strip_tags($row['description']),0,100).' */
	$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>'.$row['title'].' - EyeNews | EyeSoccer</title>
		<meta name="title" content="'.$row['title'].' - EyeNews | EyeSoccer" />
		<meta name="description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta name="googlebot-news" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="EyeSoccer.id" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" name="geo.country" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename"content="Indonesia" />
		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
		<link rel="canonical" href="https://www.eyesoccer.id/eyenews/detail/'.$linksite.'" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="https://www.eyesoccer.id/eyenews/detail/'.$linksite.'" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content="'.$row['title'].'" />
		<meta property="og:description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:image" content="'.base_url().'/systems/eyenews_storage/'.$row['pic'].'" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="'.$row['title'].'" />
		<meta name="twitter:description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta name="twitter:image" content="'.base_url().'/systems/eyenews_storage/'.$row['pic'].'" />
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
		$data["eyenews_id"]=$eyenews_id;
		$data["action"]=$action;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		
		$data['model'] 			= $this->Eyenews_model->get_detail($eyenews_id);
		$data['terkini'] 		= $this->Eyenews_model->get_terkini();
		$data['terpopuler'] 	= $this->Eyenews_model->get_terpopuler();
		$data['ads_right'] 		= $this->Eyenews_model->get_ads_right();
		$data['new_eyetube'] 	= $this->Eyenews_model->get_new_eyetube();
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyenews/new_detail', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function emot($id=null){
		
$date2=date("Y-m-d H:i:s");
$ip=$this->getUserIP();
		if(isset($_POST["type"]) && $_POST["type"]=="smile")
		{
		  
		$ceksmile=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='smile' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceksmile<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_smile=news_smile+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','smile','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $ceksmile=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceksmile["news_smile"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="shock")
		{
		  
		$cekshock=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='shock' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekshock<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_shock=news_shock+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','shock','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $cekshock=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekshock["news_shock"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="inspired")
		{
		  
		$cekinspired=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='inspired' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekinspired<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_inspired=news_inspired+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','inspired','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $cekinspired=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekinspired["news_inspired"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="happy")
		{
		  
		$cekhappy=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='happy' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekhappy<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_happy=news_happy+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','happy','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $cekhappy=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekhappy["news_happy"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="sad")
		{
		  
		$ceksad=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='sad' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceksad<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_sad=news_sad+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','sad','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $ceksad=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceksad["news_sad"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="like")
		{
		  
		$ceklike=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='like' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceklike<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_like=news_like+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','like','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $ceklike=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceklike["news_like"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="fear")
		{
		  
		$cekfear=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='fear' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekfear<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_fear=news_fear+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fear','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $cekfear=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekfear["news_fear"];
		  echo json_encode($html);
		}

		elseif(isset($_POST["type"]) && $_POST["type"]=="angry")
		{
		  
		$cekangry=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='angry' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekangry<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_angry=news_angry+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','angry','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $cekangry=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekangry["news_angry"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="fun")
		{
		  
		$cekfun=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='fun' AND place_visit='eyenews' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekfun<1)
		  {
			$this->db->query("UPDATE tbl_eyenews SET news_fun=news_fun+1 WHERE eyenews_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fun','eyenews','".$_POST["id"]."','".$ip."')");
		  }
		  $cekfun=($this->db->query("SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekfun["news_fun"];
		  echo json_encode($html);
		}		
	}
	
	public function search($search='',$pg=null)
	{
		
		if(isset($_POST["search"]))
		{
			$search=$_POST["search"];
		}
		$search2="";
		$search=str_replace("%20"," ",$search);
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
			<!-- Begin of SEO Meta Tags -->
			<title>Info '.$search.' Terbaru Terlengkap - EyeNews | EyeSoccer</title>
			<meta name="title" content="Info '.$search.' Terbaru Terlengkap - EyeNews | EyeSoccer" />
			<meta name="description" content="Terupdate: info paling lengkap tentang '.$search.' sepak bola nasional & dunia." />
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyenews/search/'.$search.'" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyenews/search/'.$search.'" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="Info '.$search.' Terbaru Terlengkap - EyeNews | EyeSoccer" />
			<meta property="og:description" content="Terupdate: info paling lengkap tentang '.$search.' sepak bola nasional & dunia." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'img/tab_icon.png" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="Info '.$search.' Terbaru Terlengkap - EyeNews | EyeSoccer" />
			<meta name="twitter:description" content="Terupdate: info paling lengkap tentang '.$search.' sepak bola nasional & dunia." />
			<meta name="twitter:image" content="'.base_url().'img/tab_icon.png" />
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
		$data["order"] = "order by publish_on desc";
		$now=date("Y-m-d H:i:s"); 
		$data["publish"] = " and publish_on<='$now'";
		$data["cons"]="news_type LIKE '%".$search."%'  OR title LIKE '%".$search."%'";
		if(!empty($search)){
			if(isset($_GET['sub'])){
				// echo $_GET['sub'];exit();
				$data["searchnews"]=" and sub_category_name = '".$_GET['sub']."'";
				$data["cons"]=" sub_category_name = '".$_GET['sub']."'";
				$data["pagingsearch"]="&search=".$search;
				$search2="?sub=".$_GET['sub'];
				// echo $search2;exit();
			}else{
				$data["searchnews"]=" and news_type = '".$search."'";
				$data["pagingsearch"]="&search=".$search;
			}
		}else{
			$data["searchnews"]="";
			$data["pagingsearch"]="";
		}
		
		$data["array"]=$array;
		$data["search"]=$search;
		$data["search2"]=$search2;
		$data["pg"]=$pg;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyenews/list', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function getUserIP()
	{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
	}
	
	public function getRecentEyenews($offset)
	{
		$dataPerPage=5;
		$query = $this->db->query("SELECT eyenews_id,title,url,thumb1 FROM tbl_eyenews where url <>'' and publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc LIMIT ".$offset.",".$dataPerPage);
		
		$count = $query->num_rows();
		if($count>0){
			$data = $query->result_array();
		}else{
			$data = Array ( [0] => Array ( ['eyenews_id'] => 0 ) );
		}
		// print_r ($data);
        echo json_encode($data);
	}
	public function new_emot($id=null)
	{
		
		
		$date 	= date("Y-m-d H:i:s");
		$ip 	= $this->getUserIP();
		$tipe 	= $_POST["type"];

		
		$cek_emot 	= $this->Eyenews_model->cek_view_smile($id,$ip,$tipe);
		
		if ($cek_emot < 1 )
		{
			$update 	= $this->Eyenews_model->set_news_emot($id,$tipe);

			$object 	= array(
							'visit_date' 	=> $date,
							'type_visit' 	=> $tipe,
							'place_visit' 	=> 'eyenews',
							'place_id' 		=> $id,
							'session_ip' 	=> $ip,
			);

			$insert 	= $this->Eyenews_model->set_tbl_view($object);

			$jumlah 	= $this->Eyenews_model->get_jumlah_emot($id,$tipe);
			
			if ($tipe == "smile")
			{
				$html["html"] 	= $jumlah->news_smile;
			}
			else
			if ($tipe == "shock")
			{
				$html["html"] 	= $jumlah->news_shock;
			}
			else
			if ($tipe == "inspired")
			{
				$html["html"] 	= $jumlah->news_inspired;
			}
			else
			if ($tipe == "happy")
			{
				$html["html"] 	= $jumlah->news_happy;
			}
			else
			if ($tipe == "sad")
			{
				$html["html"] 	= $jumlah->news_sad;
			}
			else
			if ($tipe == "fear")
			{
				$html["html"] 	= $jumlah->news_fear;
			}
			else
			if ($tipe == "angry")
			{
				$html["html"] 	= $jumlah->news_angry;
			}
			else
			if ($tipe == "fun")
			{
				$html["html"] 	= $jumlah->news_fun;
			}

			echo json_encode($html);
			
		}
	}
}
