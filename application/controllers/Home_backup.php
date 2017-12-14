<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			/* $config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'admin@eyesoccer.id',
				'smtp_pass' => '12345678',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config); */
			// $this->load->library('email');
			$this->load->library("PHPMailer_Library");
    }
	public function index()
	{	
		$objMail = $this->phpmailer_library->load();
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
		$data["objMail"]=$objMail;
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$data["body"]=$this->load->view('home/index2', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function tentang_kami()
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
		$data["body"]=$this->load->view('home/tentang', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	public function member_area(){
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
		if(isset($_SESSION["member_id"])){
			$profile=$this->db->query("SELECT a.*,b.pic as profile_pics FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1")->row_array();

			if(isset($profile["profile_pics"]) && $profile["profile_pics"]!="")
			{
			$data["pic"]=$profile["profile_pics"];
			}
			else{
			$data["pic"]="no-person.jpg";
			}
			// $data["query"]="SELECT a.*,b.pic as profile_pics FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1";
			$data["profile"]=$profile;
			$data["extrascript"]=$this->load->view('home/script_member_area', $data, true);
			$data["body"]=$this->load->view('home/member-area', $data, true);
			//$this->load->view('template-front-end',$data);
			$this->load->view('template-baru',$data);
		}else{
			redirect("");
		}
	}
	
	public function logout(){
		unset($_SESSION["member_id"],$_SESSION["user_id"]);
				session_destroy();
				redirect("");
	}
	public function request_player(){
		$file_ktp =null;
		$file_akte =null;
		$file_passport =null;
		$file_ijazah =null;
		$file_bukurek =null;
		$file_srtrekssb =null;
		if(isset($_FILES['file_ktp']['name']) && !empty($_FILES['file_ktp']['name'])){
			$file_ktp="player_member-".rand("1000","9999")."-".$_FILES['file_ktp']['name'];
			$file_ktp = preg_replace('/\s+/', '', $file_ktp);
			move_uploaded_file($_FILES['file_ktp']['tmp_name'], "systems/img_storage/".$file_ktp);
			$file_ktp = "systems/img_storage/".$file_ktp;
		}
		
		if(isset($_FILES['file_akte']['name']) && !empty($_FILES['file_akte']['name'])){
			$file_akte="player_member-".rand("1000","9999")."-".$_FILES['file_akte']['name'];
			$file_akte = preg_replace('/\s+/', '', $file_akte);
			move_uploaded_file($_FILES['file_akte']['tmp_name'], "systems/img_storage/".$file_akte);
			$file_akte = "systems/img_storage/".$file_akte;
		}
		
		if(isset($_FILES['file_kk']['name']) && !empty($_FILES['file_kk']['name'])){
			$file_kk="player_member-".rand("1000","9999")."-".$_FILES['file_kk']['name'];
			$file_kk = preg_replace('/\s+/', '', $file_kk);
			move_uploaded_file($_FILES['file_kk']['tmp_name'], "systems/img_storage/".$file_kk);
			$file_kk = "systems/img_storage/".$file_kk;
		}
		
		if(isset($_FILES['file_passport']['name']) && !empty($_FILES['file_passport']['name'])){
			$file_passport="player_member-".rand("1000","9999")."-".$_FILES['file_passport']['name'];
			$file_passport = preg_replace('/\s+/', '', $file_passport);
			move_uploaded_file($_FILES['file_passport']['tmp_name'], "systems/img_storage/".$file_passport);
			$file_passport = "systems/img_storage/".$file_passport;
		}
		
		if(isset($_FILES['file_ijazah']['name']) && !empty($_FILES['file_ijazah']['name'])){
			$file_ijazah="player_member-".rand("1000","9999")."-".$_FILES['file_ijazah']['name'];
			$file_ijazah = preg_replace('/\s+/', '', $file_ijazah);
			move_uploaded_file($_FILES['file_ijazah']['tmp_name'], "systems/img_storage/".$file_ijazah);
			$file_ijazah = "systems/img_storage/".$file_ijazah;
		}
		
		if(isset($_FILES['file_bukurek']['name']) && !empty($_FILES['file_bukurek']['name'])){
			$file_bukurek="player_member-".rand("1000","9999")."-".$_FILES['file_bukurek']['name'];
			$file_bukurek = preg_replace('/\s+/', '', $file_bukurek);
			move_uploaded_file($_FILES['file_bukurek']['tmp_name'], "systems/img_storage/".$file_bukurek);
			$file_bukurek = "systems/img_storage/".$file_bukurek;
		}
		
		if(isset($_FILES['file_srtrekssb']['name']) && !empty($_FILES['file_srtrekssb']['name'])){
			$file_srtrekssb="player_member-".rand("1000","9999")."-".$_FILES['file_srtrekssb']['name'];
			$file_srtrekssb = preg_replace('/\s+/', '', $file_srtrekssb);
			move_uploaded_file($_FILES['file_srtrekssb']['tmp_name'], "systems/img_storage/".$file_srtrekssb);
			$file_srtrekssb = "systems/img_storage/".$file_srtrekssb;
		}
		
		$player_id = (explode(" - ",$_POST["player_id"]));
		if(isset($player_id[2])){
			$this->db->query("INSERT INTO tbl_member_player SET id_player='".$player_id[2]."',id_member='".$_SESSION["member_id"]."', add_date='".date("Y-m-d H:i:s")."', file_ktp='".$file_ktp."', file_akte='".$file_akte."', file_kk='".$file_kk."', file_passport='".$file_passport."', file_ijazah='".$file_ijazah."', file_bukurek='".$file_bukurek."', file_srtrekssb='".$file_srtrekssb."', file_ibukandung='".$_POST["file_ibukandung"]."'");
			redirect("home/member_area");
		}else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Nama tidak terdaftar.");'; 
			echo 'window.location.href = "member_area";';
			echo '</script>';
		}
		
	}
	
	public function profile_upload(){
		if($_FILES['pic']['size'] > 10485760){
			$return = 'File too large. Maximum file size is 1MB.';		
		}else{
			$return = 'Success.';
			$caption = "Profile Picture";
			$lat = $_POST['lat'];
			$lon = $_POST['lon'];
			$date =date("Y-m-d H:i:s");
			$pic="profile-".rand("1000","9999")."-".$_FILES['pic']['name'];
			$pic = preg_replace('/\s+/', '', $pic);
			move_uploaded_file($_FILES['pic']['tmp_name'], "systems/img_storage/".$pic);
				$last_id = $_SESSION["member_id"];
				// mysqli_query($con,"INSERT INTO tbl_gallery (title,tags,pic,thumb1,lat,lon,upload_date,publish_by,publish_type,upload_user) values ('".$caption."','profil','".$pic."','".$pic."','".$lat."','".$lon."','".$date."','member','public','".$last_id."')");
			$post_data = array(
				'title'            => $caption,
				'tags'   =>  'profil',
				'pic'   =>  $pic,
				'thumb1' => $pic,
				'lat'        =>  $lat,
				'lon'        =>  $lon,
				'upload_date'        =>  date("Y-m-d H:i:s"),
				'publish_by'        =>  'member',
				'publish_type'        =>  'public',
				'upload_user'        =>  $last_id
			);
			$cmd=$this->db->insert("tbl_gallery",$post_data);	
			$this->db->trans_complete();
			$pic_id = $this->db->insert_id();
			
			$this->db->query("UPDATE tbl_member SET profile_pic='".$pic_id."' WHERE id_member='".$_SESSION["member_id"]."'");
			if($this->db->affected_rows()>0){
				redirect("home/member_area");
			}else{
				echo "<script>alert('Data gagal di update');</script>";
			}
		}
	}
	
	public function profile_upload_data(){
		$post_data = array(
			'name'            => $_POST['name'],
			'fullname'            => $_POST['fullname'],
			'address'            => $_POST['address'],
			'about'            => $_POST['about']
		);
		$this->db->where('id_member', $_SESSION["member_id"]);
		$this->db->update('tbl_member', $post_data); 
		
		if($this->db->affected_rows()>0){
			redirect("home/member_area");
		}else{
			echo "<script>alert('Data gagal di update');</script>";
		}
	}
	
	public function search_player(){
		if (isset($_GET['term'])){
			$return_arr = array();
			$player=$this->db->query("SELECT a.player_id,a.name,b.name as club_name FROM tbl_player a LEFT JOIN tbl_club b ON b.club_id=a.club_id WHERE a.member_id='0' and a.name like '%".$_GET['term']."%'  ORDER BY a.name ASC ");
			foreach ($player->result() as $row)
			{
				$return_arr[] =  $row->name." - ".$row->club_name." - ".$row->player_id;
				// array_push($return_arr[],$row->player_id,$row->name." - ".$row->club_name);
			}


			// /* Toss back results as json encoded array. */
			echo json_encode($return_arr);
			// echo "SELECT a.*,b.name as club_name FROM tbl_player a LEFT JOIN tbl_club b ON b.club_id=a.club_id WHERE a.member_id='0' and a.name like '%".$_GET['term']."%'  ORDER BY a.name ASC";
		}
	}
	
}
