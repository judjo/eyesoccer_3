<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyetube extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');

			
    }
	public function index($pg=null)
	{	
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='
			<!-- Begin of SEO Meta Tags -->
			<title>EyeTube: Portal Video Seputar Sepak Bola | EyeSoccer</title>
			<meta name="title" content="EyeTube: Portal Video Seputar Sepak Bola | EyeSoccer" />
			<meta name="description" content="One-stop soccer & entertainment video - EyeSoccer Fact, EyeSoccer Flash, EyeSoccer Pedia, EyeSoccer Preview, EyeSoccer Hits, EyeSoccer Stars, EyeSoccer Highlight, & EyeSoccer Profile." />
			<meta name="googlebot-news" content="index,follow" />
			<meta name="googlebot" content="index,follow" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="EyeSoccer.id" />
			<meta name="language" content="id" />
			<meta name="geo.country" content="id" name="geo.country" />
			<meta http-equiv="content-language" content="In-Id" />
			<meta name="geo.placename"content="Indonesia" />
			<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
			<link rel="canonical" href="https://www.eyesoccer.id/eyetube" />
			<!-- End of SEO Meta Tags-->

			<!-- Begin of Facebook Open graph data-->
			<meta property="fb:app_id" content="140611863350583" />
			<meta property="og:site_name" content="EyeSoccer" />
			<meta property="og:url" content="https://www.eyesoccer.id/eyetube" />
			<meta property="og:type" content="Website" />
			<meta property="og:title" content="EyeTube: Portal Video Seputar Sepak Bola | EyeSoccer" />
			<meta property="og:description" content="One-stop soccer & entertainment video - EyeSoccer Dact, EyeSoccer Flash, EyeSoccer Pedia, EyeSoccer Preview, EyeSoccer Hits, EyeSoccer Stars, EyeSoccer Highlight, & EyeSoccer Profile." />
			<meta property="og:locale" content="id_ID" />
			<meta property="og:image" content="'.base_url().'img/eyetube_nav.png" />
			<!--End of Facebook open graph data-->
			   
			<!--begin of twitter card data-->
			<meta name="twitter:card" content="summary" />    
			<meta name="twitter:site" content="@eyesoccer_id" />
			<meta name="twitter:creator" content="@eyesoccer_id" />
			<meta name="twitter:domain" content="EyeSoccer"/>
			<meta name="twitter:title" content="EyeTube: Portal Video Seputar Sepak Bola | EyeSoccer" />
			<meta name="twitter:description" content="One-stop soccer & entertainment video - EyeSoccer Dact, EyeSoccer Flash, EyeSoccer Pedia, EyeSoccer Preview, EyeSoccer Hits, EyeSoccer Stars, EyeSoccer Highlight, & EyeSoccer Profile." />
			<meta name="twitter:image" content="'.base_url().'img/eyetube_nav.png" />
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
		$data["page"]="home";
		if($pg!="")
		{
			$data["pg"]=$pg;
		}
		
		$data["popup"]=$array[14][3];
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyetube/index', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function detail($eyetube_id=null,$action=null)
	{
		$eyetube_id2 = $eyetube_id; //update rizki
		$query=$this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$eyetube_id."' LIMIT 1");
		$row=$query->row_array();
		if(empty($row["url"])|| $row["url"]==""){ //update rizki
			if($query->num_rows()>0 && $row["eyetube_id"]==$eyetube_id)
			{
				
				$link=str_replace(" ","_",$row["title"]);
				redirect("eyetube/detail/".$link);
			}
			else{
				if(empty($row["url"])|| $row["url"]==""){ //update rizki
					$linksite=$eyetube_id;
					$tes=str_replace("_"," ",$eyetube_id);
					$tes=str_replace("%22","%",$tes);

					$row=$this->db->query("SELECT * FROM tbl_eyetube WHERE title LIKE '%".$tes."%' LIMIT 1")->row_array();
					$eyetube_id=$row["eyetube_id"];
					$row2=$this->db->query("SELECT * FROM tbl_eyetube WHERE title LIKE '%".$tes."%' LIMIT 1"); //update rizki
					if($row2->num_rows()<1){ //update rizki
						$eyetube_id=$row["eyetube_id"]; //update rizki
						$row=$this->db->query("SELECT * FROM tbl_eyetube WHERE url = '$eyetube_id2' LIMIT 1")->row_array(); //update rizki
						$linksite=$row["url"]; //update rizki
						$eyetube_id=$row["eyetube_id"]; //update rizki
					}
				}else{ //update rizki
					
				}
			}
		}else{ //update rizki
			$eyetube_id=$eyetube_id2;
			$row=$this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id = '$eyetube_id2' LIMIT 1")->row_array();
			$linksite=$row["url"];
			redirect("eyetube/detail/".$row["url"]);
			$eyetube_id=$row["eyetube_id"];
		}
		

		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		/* $data["meta"]["share"]='<title>Eyesoccer - '.$row['title'].'</title><meta name="twitter:card" content="summary" />
<meta name="twitter:username" content="@sobatjudjo" />
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:title" content="'.$row['title'].'" />
<meta name="twitter:description" content="'.substr(strip_tags($row['description']),0,100).'" />
<meta name="twitter:image" content="'.base_url().'/systems/eyetube_storage/'.$row['thumb1'].'" />
<meta property="og:title" content="'.$row['title'].'" />
<meta property="og:url" content="'.base_url().'/eyetube/detail/'.$linksite.'" />
<meta property="og:type" content="article" />
<meta property="og:image" content="'.base_url().'systems/eyetube_storage/'.$row['thumb1'].'" />
<meta property="og:description" content="'.substr(strip_tags($row['description']),0,100).'" />
<meta property="fb:app_id" content="966242223397117" />
'; */
		
	$data["meta"]["share"]='
		<!-- Begin of SEO Meta Tags -->
		<title>'.$row['title'].' - EyeTube | EyeSoccer</title>
		<meta name="title" content="'.$row['title'].' - EyeTube | EyeSoccer" />
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
		<link rel="canonical" href="'.base_url().'/eyetube/detail/'.$linksite.'" />
		<!-- End of SEO Meta Tags-->

		<!-- Begin of Facebook Open graph data-->
		<meta property="fb:app_id" content="140611863350583" />
		<meta property="og:site_name" content="EyeSoccer" />
		<meta property="og:url" content="'.base_url().'/eyetube/detail/'.$linksite.'" />
		<meta property="og:type" content="Website" />
		<meta property="og:title" content="'.$row['title'].'" />
		<meta property="og:description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:image" content="'.base_url().'/systems/eyetube_storage/'.$row['thumb1'].'" />
		<!--End of Facebook open graph data-->
		   
		<!--begin of twitter card data-->
		<meta name="twitter:card" content="summary" />    
		<meta name="twitter:site" content="@eyesoccer_id" />
		<meta name="twitter:creator" content="@eyesoccer_id" />
		<meta name="twitter:domain" content="EyeSoccer"/>
		<meta name="twitter:title" content="'.$row['title'].'" />
		<meta name="twitter:description" content="'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($row['description']), 0, 100)).'" />
		<meta name="twitter:image" content="'.base_url().'/systems/eyetube_storage/'.$row['thumb1'].' />
		<!--end of twitter card data-->

	';
		
		

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
		$data["category_name"]=$row["category_name"];
		$data["eyetube_id"]=$eyetube_id;
		$data["action"]=$action;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyetube/detail', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
public function detail2($eyetube_id=null,$action=null)
	{
		$query=$this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$eyetube_id."' LIMIT 1");
		if($query->num_rows()>0)
		{
			$row=$query->row_array();
			$link=str_replace(" ","-",$row["title"]);

			redirect("eyetube/detail2/".$link);
		}
		else{
			$linksite=$eyetube_id;
			$tes=str_replace("-"," ",$eyetube_id);
			$tes=str_replace("%22","%",$tes);

			$row=$this->db->query("SELECT * FROM tbl_eyetube WHERE title LIKE '%".$tes."%' LIMIT 1")->row_array();
			
			echo "SELECT * FROM tbl_eyetube WHERE title LIKE \"%".$tes."%\" LIMIT 1";
			$eyetube_id=$row["eyetube_id"];
		}

		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["meta"]["share"]='<title>Eyesoccer - '.$row['title'].'</title><meta name="twitter:card" content="summary" />
<meta name="twitter:username" content="@sobatjudjo" />
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:title" content="'.$row['title'].'" />
<meta name="twitter:description" content="'.substr(strip_tags($row['description']),0,100).'" />
<meta name="twitter:image" content="'.base_url().'/systems/eyetube_storage/'.$row['pic'].'" />
<meta property="og:title" content="'.$row['title'].'" />
<meta property="og:url" content="'.base_url().'/eyetube/detail/'.$linksite.'" />
<meta property="og:type" content="article" />
<meta property="og:image" content="'.base_url().'/systems/eyetube_storage/'.$row['pic'].'" />
<meta property="og:description" content="'.substr(strip_tags($row['description']),0,100).'" />
<meta property="fb:app_id" content="966242223397117" />
';
		
		

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
		$data["eyetube_id"]=$eyetube_id;
		$data["action"]=$action;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyetube/detail', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}

	public function search($search=null,$pg=null)
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
		$data["search"]=$search;
		$data["pg"]=$pg;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyetube/list', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	public function emot($id=null){
		
$date2=date("Y-m-d H:i:s");
$ip=$this->getUserIP();
		if(isset($_POST["type"]) && $_POST["type"]=="smile")
		{
		  
		$ceksmile=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='smile' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceksmile<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_smile=tube_smile+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','smile','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $ceksmile=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceksmile["tube_smile"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="shock")
		{
		  
		$cekshock=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='shock' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekshock<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_shock=tube_shock+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','shock','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekshock=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekshock["tube_shock"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="inspired")
		{
		  
		$cekinspired=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='inspired' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekinspired<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_inspired=tube_inspired+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','inspired','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekinspired=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekinspired["tube_inspired"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="happy")
		{
		  
		$cekhappy=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='happy' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekhappy<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_happy=tube_happy+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','happy','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekhappy=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekhappy["tube_happy"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="sad")
		{
		  
		$ceksad=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='sad' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceksad<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_sad=tube_sad+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','sad','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $ceksad=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceksad["tube_sad"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="like")
		{
		  
		$ceklike=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='like' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($ceklike<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_like=tube_like+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','like','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $ceklike=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$ceklike["tube_like"];
		  echo json_encode($html);
		}elseif(isset($_POST["type"]) && $_POST["type"]=="fear")
		{
		  
		$cekfear=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='fear' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekfear<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_fear=tube_fear+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fear','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekfear=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekfear["tube_fear"];
		  echo json_encode($html);
		}
		
		elseif(isset($_POST["type"]) && $_POST["type"]=="angry")
		{
		  
		$cekangry=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='angry' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekangry<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_angry=tube_angry+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','angry','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekangry=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekangry["tube_angry"];
		  echo json_encode($html);
		}
		elseif(isset($_POST["type"]) && $_POST["type"]=="fun")
		{
		  
		$cekfun=$this->db->query("SELECT * FROM tbl_view WHERE type_visit='fun' AND place_visit='eyetube' AND place_id='".$_POST["id"]."' AND session_ip='".$ip."' LIMIT 1")->num_rows();
		  if($cekfun<1)
		  {
			$this->db->query("UPDATE tbl_eyetube SET tube_fun=tube_fun+1 WHERE eyetube_id='".$_POST["id"]."'");
			$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fun','eyetube','".$_POST["id"]."','".$ip."')");
		  }
		  $cekfun=($this->db->query("SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'")->row_array());
		  $html["html"]=$cekfun["tube_fun"];
		  echo json_encode($html);
		}

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


	public function fact()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/fact', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
		public function eyesoccerflash()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/eyesoccerflash', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
		public function eyesoccerpedia()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/eyesoccerpedia', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
		public function matchpreview()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/matchpreview', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function soscience()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/soscience', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function beritaterkini()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/beritaterkini', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function livetv()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/livetv', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function eyesoccerstar()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/eyesoccerstar', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function ssb()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/ssb', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function eyesoccerhits()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/eyesoccerhits', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function profile()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/profile', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function highlight()
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		
		$data["extrascript"]=$this->load->view('eyetube/script_index', '', true);
		$data["body"]=$this->load->view('eyetube/highlight', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
}
