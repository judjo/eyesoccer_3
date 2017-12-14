<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seo extends CI_Controller {
    function sitemap()
    {
    	$query = $this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 20");  
    	//print_r($query->result_array()); 	
    	$data1=array();
    	foreach ($query->result_array() as $key) {
    		$title_url=$key['title'];   		
    		$data1[] = base_url().'eyenews/detail/'.$title_url; 
            //Editlah sesuai link single post anda (detail artikel) dll.
            //atau sesuaikan , sehingga bisa mencakup semua link yang ada diwebsite anda.   		
    	}
        $sitemap = $data1;
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",array('sitemap' => $sitemap));
    }

}