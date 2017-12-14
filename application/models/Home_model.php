<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function get_all_jadwal()
	{
		$query = $this->db->query("SELECT
									a.*,
									c.club_id as club_id_a,
									d.club_id as club_id_b,
									c.logo as logo_a,
									d.logo as logo_b,
									c.name as club_a,
									d.name as club_b,
									a.score_a as skor_a,
									a.score_b as skor_b
								FROM
									tbl_jadwal_event a
									LEFT JOIN
										tbl_event b ON b.id_event=a.id_event
									INNER JOIN
										tbl_club c ON c.club_id=a.tim_a
									INNER JOIN
										tbl_club d ON d.club_id=a.tim_b
								WHERE
									a.jadwal_pertandingan > DATE_SUB(CURDATE(), INTERVAL 2 WEEK)
								order by
									jadwal_pertandingan DESC
								LIMIT
									12")->result_array();
		return $query;
	}

	public function get_trending_eyetube()
	{
		$query = $this->db->query("	SELECT
										a.title,
										a.url,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.url !=''
									ORDER BY
										a.tube_view ASC
									LIMIT
										3
									")->result_array();
		return $query;
	}

	public function get_trending_eyenews()
	{
		$query = $this->db->query("	SELECT
										a.title,
										a.url,
										a.news_view
									FROM
										tbl_eyenews a
									WHERE
										a.url !=''
									ORDER BY
										a.news_view ASC
									LIMIT
										2
									")->result_array();
		return $query;
	}

	public function get_profile_club()
	{
		$query = $this->db->query("	SELECT
										a.club_id,
										a.name as nama_club,
										b.name as nama_manager,
										count(c.name) as squad
									FROM
										tbl_club a
									INNER JOIN
										tbl_official_team b on a.club_id = b.club_now
									LEFT JOIN
										tbl_player c on a.club_id = c.club_id
									WHERE
										b.position  = 'Manager'
										AND
										a.id_liga = '0'
									GROUP BY
										a.club_id
									LIMIT
										12
									")->result_array();
		return $query;
	}

	public function get_squad($club_id)
	{
		$query = $this->db->query("	SELECT
										count(name) as squad
									FROM
										tbl_player
									WHERE
										club_id  = ".$club_id."
									")->result_array();
		return $query;
	}

	public function get_player_random()
	{
		$query = $this->db->query("	SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										b.name as klub
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY RAND()
									LIMIT 3
								")->result_array();
		return $query;
	}

	public function get_eyetube_satu()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										3
								")->result_array();
		return $query;
	}

	public function get_eyetube_science()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%science%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_eyetube_stars()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%star%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_eyetube_kamu()
	{
		$query = $this->db->query("	SELECT
										a.eyetube_id,
										a.title,
										a.description,
										a.thumb,
										a.video,
										a.url,
										a.createon,
										a.tube_view,
										a.category_name
									FROM
										tbl_eyetube a
									WHERE
										a.active = 1
									AND 
										a.category_name like '%kamu%'
									ORDER BY
										a.eyetube_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_eyenews_main()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.thumb1,
										a.news_type,
										a.news_view,
										a.createon
									FROM
										tbl_eyenews a
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										1
								")->row();
		return $query;
	}

	public function get_eyenews_similar($news_type)
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.news_type,
										a.news_view
									FROM
										tbl_eyenews a
									WHERE
										a.news_type = '$news_type'
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_eyenews_populer()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.thumb1,
										a.news_type,
										a.news_view,
										a.publish_on
									FROM
										tbl_eyenews a
									WHERE
										a.publish_on > DATE_SUB(CURDATE(), INTERVAL 4 WEEK)
									ORDER BY
										a.news_view DESC
									LIMIT
										3
								")->row();
		return $query;
	}

	public function get_eyenews_muda()
	{
		$query = $this->db->query("	SELECT
										a.eyenews_id,
										a.title,
										a.news_type,
										a.news_view
									FROM
										tbl_eyenews a
									WHERE
										a.news_type like '%muda%'
									ORDER BY
										a.eyenews_id DESC
									LIMIT
										4
								")->result_array();
		return $query;
	}

	public function get_jadwal_today()
	{
		$query = $this->db->query("	SELECT
										a.id_jadwal_event,
										a.id_event,
										a.jadwal_pertandingan,
										a.tim_a,
										a.tim_b,
										a.live_pertandingan,
										b.name,
										b.logo,
										c.name,
										c.logo
									FROM
										tbl_jadwal_event a
									INNER JOIN
										tbl_club b ON b.club_id = a.tim_a
									INNER JOIN
										tbl_club c ON c.club_id = a.tim_b
									WHERE
										a.jadwal_pertandingan = NOW()
									LIMIT
										5
								")->result_array();
		return $query;
	}

	public function get_jadwal_yesterday()
	{
		$kemarin 	= date('Y-m-d',strtotime("-1 days"));

		$query = $this->db->query("	SELECT
										a.id_jadwal_event,
										a.id_event,
										a.jadwal_pertandingan,
										a.tim_a,
										a.tim_b,
										a.live_pertandingan,
										b.name,
										b.logo,
										c.name,
										c.logo
									FROM
										tbl_jadwal_event a
									LEFT JOIN
										tbl_club b ON b.club_id = a.tim_a
									LEFT JOIN
										tbl_club c ON c.club_id = a.tim_b
									WHERE
										a.jadwal_pertandingan like '%".$kemarin."%'
									LIMIT
										5
								")->result_array();
		return $query;
	}

	public function get_jadwal_tomorrow()
	{
		$besok	 = date('Y-m-d',strtotime("+1 days"));

		$query = $this->db->query("	SELECT
										a.id_jadwal_event,
										a.id_event,
										a.jadwal_pertandingan,
										a.tim_a,
										a.tim_b,
										a.live_pertandingan,
										b.name,
										b.logo,
										c.name,
										c.logo
									FROM
										tbl_jadwal_event a
									LEFT JOIN
										tbl_club b ON b.club_id = a.tim_a
									LEFT JOIN
										tbl_club c ON c.club_id = a.tim_b
									WHERE
										a.jadwal_pertandingan like '%".$besok."%'
									LIMIT
										5
								")->result_array();
		return $query;
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */

