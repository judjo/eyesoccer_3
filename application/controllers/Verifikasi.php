<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library('session');
    }
	public function index()
	{	
		$cmd=$this->db->query("select * from tbl_member where unique_code='".$_GET['ver']."'");
		$cek = $cmd->num_rows();
		if($cek>0)
		{
			$row=$cmd->row_array();
			if($row['verification']==0){
				$this->db->query("update tbl_member set verification=1 where unique_code='".$_GET['ver']."'");
				if($this->db->affected_rows()>0){
					// echo"<script>alert('Verifikasi berhasil. Silahkan login menggunakan email dan password anda.')</script>";
					$message = "Verifikasi berhasil. Silahkan login menggunakan email dan password anda.";
					echo "<script type='text/javascript'>alert('$message');window.location = ('https://www.eyesoccer.id') </script>";
					// unset($_SESSION["member_id"],$_SESSION["user_id"]);
					// session_destroy();
					// redirect("");
				}
			}else{
				// echo"<script>alert('Sudah diverifikasi.')</script>";
				unset($_SESSION["member_id"],$_SESSION["user_id"]);
				session_destroy();
				redirect("");
			}
		}else{
			unset($_SESSION["member_id"],$_SESSION["user_id"]);
			session_destroy();
			redirect("");
		}
	}
}
