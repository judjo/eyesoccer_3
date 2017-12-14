<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eyeticket_model extends CI_Model
{
//membaca tabel database
        public function listing(){
            $this->db->select('tbl_category_product.*,category_product_name');
            $this->db->from('tbl_category_product');
            //relasi
            $this->db->join('tbl_category_product','tbl_category_product.id_category_product = tbl_product.id_product','left');
            $this->db->join('admin','admin.admin_id = tbl_product.id_product','left');
            //end relasi
            $this->db->order_by('id_product','DESC limit 4');
            $query=$this->db->get();
            return $query->result ();
        }
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */