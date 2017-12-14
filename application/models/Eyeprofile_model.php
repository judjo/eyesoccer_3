<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eyeprofile_model extends CI_Model
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
		public function karir_klub($player_id){
            $this->db->select('*');
            $this->db->from('tbl_karir_player');
			$this->db->where('player_id',$player_id);
			$this->db->where('timnas',0);
            
            return $this->db->get();
        }
		public function karir_timnas($player_id){
            $this->db->select('*');
            $this->db->from('tbl_karir_player');
			$this->db->where('player_id',$player_id);
			$this->db->where('timnas',1);
            
            return $this->db->get();
        }
		public function prestasi_player($player_id){
            $this->db->select('*');
            $this->db->from('tbl_prestasi_player');
			$this->db->where('player_id',$player_id);
            
            return $this->db->get();
        }
		public function prestasi_klub($club_id){
            $this->db->select('*');
            $this->db->from('tbl_karir_klub');
			$this->db->where('klub_id',$club_id);
            
            return $this->db->get();
        }
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */