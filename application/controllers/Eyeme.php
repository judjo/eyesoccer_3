<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeme extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');

			
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
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$data["body"]=$this->load->view('eyeme/index', $data, true);
		$data["extrascript"]=$this->load->view('eyeme/eyeme_script', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function home(){
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
		$data["body"]=$this->load->view('eyeme/list', $data, true);
		$data["extrascript"]=$this->load->view('eyeme/eyeme_script', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function upload_browse(){
	if($_FILES['browsecapture']['size'] > 10485760){
	$return = 'File too large. Maximum file size is 1MB.';		
}else{
	$return = 'Success.';
	$caption = $_POST['caption_browse'];
	$lat = $_POST['lat_browse'];
	$lon = $_POST['lon_browse'];
	// $name = $_POST['nama'];
	$date =date("Y-m-d H:i:s");
	$last_id = $_SESSION["member_id"];
	$pic="eyeme-".rand("1000","9999")."-".$_FILES['browsecapture']['name'];
	$pic = preg_replace('/\s+/', '', $pic);
	move_uploaded_file($_FILES['browsecapture']['tmp_name'], "systems/img_storage/".$pic);
			
	// if(!mysqli_query($con,"INSERT INTO tbl_member (name,ip_address,join_date,active) values ('".$name."','".$_SERVER['REMOTE_ADDR']."','".$date."','1')")){
		// $return .= 'Failed upload member.';
	// }
	// if (mysqli_insert_id($con) != 0) {
		// $last_id = mysqli_insert_id($con);
		if(!$this->db->query("INSERT INTO tbl_gallery (title,tags,pic,thumb1,lat,lon,upload_date,publish_by,publish_type,upload_user) values ('".$caption."','eyeme','".$pic."','".$pic."','".$lat."','".$lon."','".$date."','member','public','".$last_id."')"))
		{
			$return = 'Failed upload gallery.';
		}
	// } else {
		// $return .= "Error: "  . $con->error;
	// }
}
echo $return;	
		
	}
	public function upload(){
		if($_FILES['cameracapture']['size'] > 10485760){
	$return = 'File too large. Maximum file size is 1MB.';		
}else{
	$return = 'Success.';
	$caption = $_POST['caption'];
	$lat = $_POST['lat'];
	$lon = $_POST['lon'];
	// $name = $_POST['nama'];
	$date =date("Y-m-d H:i:s");
	$last_id = $_SESSION["member_id"];
	$pic="eyeme-".rand("1000","9999")."-".$_FILES['cameracapture']['name'];
	$pic = preg_replace('/\s+/', '', $pic);
	move_uploaded_file($_FILES['cameracapture']['tmp_name'], "systems/img_storage/".$pic);
			
	// if(!mysqli_query($con,"INSERT INTO tbl_member (name,ip_address,join_date,active) values ('".$name."','".$_SERVER['REMOTE_ADDR']."','".$date."','1')")){
		// $return .= 'Failed upload member.';
	// }
	// if (mysqli_insert_id($con) != 0) {
		// $last_id = mysqli_insert_id($con);
		if(!$this->db->query("INSERT INTO tbl_gallery (title,tags,pic,thumb1,lat,lon,upload_date,publish_by,publish_type,upload_user) values ('".$caption."','eyeme','".$pic."','".$pic."','".$lat."','".$lon."','".$date."','member','public','".$last_id."')"))
		{
			$return = 'Failed upload gallery.';
		}
	// } else {
		// $return .= "Error: "  . $con->error;
	// }
}
echo $return;
	}
	
}
