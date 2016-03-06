<?php

Class Search extends CI_Controller {

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
	
	public function process() {
		$search_keyword = $this->input->get('input-search');
		
		$qry = "select a.user_name as user_name, a.contract_until as contract_until, 
				b.video_id, b.user_id, b.video_link as video_link 
				from m_user a inner join m_video b on a.user_id = b.user_id 
				where a.user_name like '%" . strtoupper($search_keyword) . "%' order by a.user_name asc";
		$limit = 10;
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

		$config['base_url'] = $this->config->item('base_url') . "index.php/search/process";
		$config['total_rows'] = $this->db->query($qry)->num_rows();
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);

		$qry .= " limit {$limit} offset {$offset} ";

		$data['result_per_page'] = $this->db->query($qry)->result();
		$data['search_keyword'] = $search_keyword;
			
		$this->load->view('search', $data);
	}
	
}

?>