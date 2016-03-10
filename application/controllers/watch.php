<?php

Class Watch extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		
		$this->load->library('pagination');
	}
	
	public function show_video() {
		$data['video_yt_id'] = $this->input->get('video_yt_id');
		
		/* start: query get user_id base on video_link */
		$get_user = NULL;
		$condition = "video_link =" . "'" . $data['video_yt_id'] . "'";
		$this->db->select('*');
		$this->db->from('m_video');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$get_user = $query->result();
		} 
		/* end: query get user_id base on video_link */
		
		
		/* start: query get user data base on user_id */
		$get_user_detail = NULL;
		$condition = "user_id =" . "'" . $get_user[0]->user_id . "'";
		$this->db->select('*');
		$this->db->from('m_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$get_user_detail = $query->result();
		} 
		/* end: query get user data base on user_id */
		
		
		$qry = "select video_link from m_video where user_id='" . $get_user[0]->user_id . "' order by video_id asc";
		$limit = 10;
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

		$config['base_url'] = $this->config->item('base_url') . "index.php/watch/show_video?video_yt_id=" . $data['video_yt_id'];
		$config['total_rows'] = $this->db->query($qry)->num_rows();
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);

		$qry .= " limit {$limit} offset {$offset} ";

		$data['result_per_page'] = $this->db->query($qry)->result();
		$data['user_name'] = $get_user_detail[0]->user_name;
		
		$this->load->view('watch', $data);
		
	}
	
}

?>