<?php

Class List_Video_Admin extends CI_Controller {

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

	public function show_list() {
		if ($this->session->userdata['logged_in']['agent'] == 0) {
			$qry = "Select * FROM m_video WHERE user_id = '" . $this->session->userdata['logged_in']['userid'] . "'";

			$limit = 10;
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

			$config['base_url'] = $this->config->item('base_url') . "index.php/list_video_admin/show_list";
			$config['total_rows'] = $this->db->query($qry)->num_rows();
			$config['uri_segment'] = 3;
			$config['per_page'] = $limit;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';

			$this->pagination->initialize($config);

			$qry .= " limit {$limit} offset {$offset} ";

			$data['result_per_page'] = $this->db->query($qry)->result();
			
			$this->load->view('list_video_admin', $data);
		}
		else {
		}

	}
}