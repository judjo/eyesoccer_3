<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eyeprofile_club_sitemap extends CI_Controller {
    function index()
    {
    	$query = $this->db->query("select * from tbl_club order by cid DESC");  
    	//print_r($query->result_array()); 	
    	$data1=array();
    	foreach ($query->result_array() as $key) {
    		$title_url=$key['name'];   		
    		//$title=$key['title'];   		
    		$data1[] = base_url().'eyeprofile/detail/'.$title_url;  		
    	}
        $sitemap = $data1;
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("eyeprofile_club_sitemap",array('sitemap' => $sitemap));
    }
}