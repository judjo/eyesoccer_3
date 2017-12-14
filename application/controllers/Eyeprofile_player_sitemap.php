<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyeprofile_player_sitemap extends CI_Controller {
    function index()
    {
    	$query = $this->db->query("select * from tbl_player order by player_id DESC");  
    	//print_r($query->result_array()); 	
    	$data1=array();
    	foreach ($query->result_array() as $key) {
    		$title_url=$key['url'];   		
    		//$title=$key['title'];   		
    		$data1[] = base_url().'eyeprofile/detail/'.$title_url;  		
    	}
        $sitemap = $data1;
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyeprofile_player_sitemap",array('sitemap' => $sitemap));
    }
}