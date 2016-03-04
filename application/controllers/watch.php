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
	}
	
	public function show_video() {
		$data['video_yt_id'] = $this->input->get('video_yt_id');
		$this->load->view('watch', $data);
		
	}
	
}

?>