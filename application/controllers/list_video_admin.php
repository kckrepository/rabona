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
		
			/* start: query get users base on agent_id */
			$condition = "agent_id =" . "'" . $this->session->userdata['logged_in']['agentid'] . "'";
			$this->db->select('*');
			$this->db->from('m_user');
			$this->db->where($condition);
			$query = $this->db->get();

			$data['list_users'] = $query->result(); 
			/* end: query get users base on agent_id */
			
			$player_id = $this->input->get('player');
			if (isset($player_id) && $this->input->get('player') != 'NULL') {
				$qry = "Select * FROM m_video WHERE user_id = '" . $this->input->get('player') . "'";

				$limit = 10;
				$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

				$config['base_url'] = $this->config->item('base_url') . "index.php/list_video_admin/show_list?player=" + $this->input->post('player');
				$config['total_rows'] = $this->db->query($qry)->num_rows();
				$config['uri_segment'] = 3;
				$config['per_page'] = $limit;
				$config['num_links'] = 20;
				$config['full_tag_open'] = '<div id="pagination">';
				$config['full_tag_close'] = '</div>';
	
				$this->pagination->initialize($config);

				$qry .= " limit {$limit} offset {$offset} ";

				$data['result_per_page'] = $this->db->query($qry)->result();
				$data['player_id'] = $this->input->get('player');
			}
			
			$this->load->view('list_video_admin', $data);
		}

	}
}