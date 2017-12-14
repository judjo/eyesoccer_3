<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyenews_model extends CI_Model
{

	public function get_all_news()
	{
		$query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                        A.eyenews_id DESC
                                    Limit 12
                                        ")->result_array();
            return $query; 
	}

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);

		$query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                        A.eyenews_id DESC
                                    Limit 12
                                        ");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

	public function get_total() 
    {
        return $this->db->count_all("tbl_eyenews");
    }

    public function get_detail($eyenews_id)
    {
		$query = $this->db->query(" SELECT
                                        A.*,
                                        B.fullname
                                    FROM
                                        tbl_eyenews A
                                    INNER JOIN 
                                    	tbl_admin B 	on B.admin_id = A.admin_id
                                    WHERE
                                    	A.eyenews_id = '$eyenews_id'
                                        ")->result_array();
        return $query; 
    }

    public function get_baca_juga($tipe,$id,$limit)
    {
		$query = $this->db->query(" SELECT
										A.eyenews_id,
                                        A.title,
                                        A.thumb1,
                                        A.publish_on
                                    FROM
                                        tbl_eyenews A
                                    WHERE
                                    	A.news_type LIKE '%$tipe%'
                                    	AND 
                                    	A.eyenews_id != '$id'
                                    ORDER BY 
                                    	A.eyenews_id DESC
                                    LIMIT $limit
                                        ")->result_array();
        return $query; 
    }

    public function get_eyetube_title()
    {
		$query = $this->db->query(" SELECT
                                        A.title,
                                        A.eyetube_id
                                    FROM
                                        tbl_eyetube A
                                    ORDER BY 
                                    	A.eyetube_id DESC
                                    LIMIT 1
                                        ")->row();
        return $query; 
    }

    public function get_terkini()
    {
    	$query = $this->db->query(" SELECT
                                        A.title,
                                        A.eyenews_id,
                                        A.thumb1,
                                        A.publish_on
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                    	A.eyenews_id DESC
                                    LIMIT 5
                                        ")->result_array();
        return $query;
    }

    public function get_terpopuler()
    {
    	$query = $this->db->query(" SELECT
                                        A.title,
                                        A.eyenews_id,
                                        A.thumb1,
                                        A.publish_on
                                    FROM
                                        tbl_eyenews A
                                    ORDER BY 
                                    	A.news_view DESC
                                    LIMIT 5
                                        ")->result_array();
        return $query;
    }

    public function get_ads_right()
    {
        $query = $this->db->query(" SELECT
                                        A.pic
                                    FROM
                                        tbl_ads A
                                    WHERE   
                                        A.ads_id = '20'
                                        ")->row();
        return $query;
    }

    public function get_new_eyetube()
    {
        $query = $this->db->query(" SELECT
                                        A.eyetube_id,
                                        A.title,
                                        A.thumb1,
                                        A.createon
                                    FROM
                                        tbl_eyetube A
                                    ORDER BY 
                                        A.eyetube_id DESC
                                    LIMIT
                                        5
                                        ")->result_array();
        return $query;
    }

    public function cek_view_smile($id,$ip,$tipe)
    {
        $query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_view A
                                    WHERE
                                        type_visit  = '$tipe'
                                        AND
                                        place_visit = 'eyenews'
                                        AND
                                        place_id    = '$id'
                                        AND
                                        session_ip  = '$ip'
                                    LIMIT
                                        1
                                        ")->num_rows();
        return $query;
    }

    public function set_news_emot($id,$tipe)
    {
        $query = $this->db->query(" UPDATE
                                        tbl_eyenews
                                    SET
                                        news_$tipe = news_$tipe + 1
                                    WHERE
                                    eyenews_id = '$id'
                                        ");
        return $query;
    }

    public function set_tbl_view($object)
    {
        $this->db->insert('tbl_view', $object);

        return $this->db->insert_id();
    }

    public function get_jumlah_emot($id,$tipe)
    {
        $query = $this->db->query(" SELECT
                                                A.news_$tipe
                                            FROM
                                                tbl_eyenews A
                                            WHERE
                                                A.eyenews_id  = $id
                                                ")->row();
        return $query;
    }

}

/* End of file Eyenews_model.php */
/* Location: ./application/models/Eyenews_model.php */