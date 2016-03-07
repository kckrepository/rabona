<?php

//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

	public function __construct() {
	parent::__construct();

	// Load form helper library
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	// Load session library
	$this->load->library('session');

	// Load database
	$this->load->model('login_database');
	
	$this->load->library('pagination');
	}

	// Show home page
	public function index(){
		$qry = "Select * FROM m_video order by video_id asc";

		$limit = 10;
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

		$config['base_url'] = $this->config->item('base_url') . "index.php/user_authentication/index";
		$config['total_rows'] = $this->db->query($qry)->num_rows();
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);

		$qry .= " limit {$limit} offset {$offset} ";

		$data['result_per_page'] = $this->db->query($qry)->result();
		
		$this->load->view('home', $data);
	}
	
	//	Show login page
	public function login_show(){
	$this->load->view('login');
	}
	
	public function login(){
	$this->load->view('login');
	}
	
	public function dashboard_show() {
	$this->load->view('dashboard');
	}

	// Show registration page
	//public function user_registration_show() {
	//$this->load->view('registration_form');
	//}

	// Validate and store registration data in database
/*	public function new_user_registration() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		} else {
			$data = array(
				'user_name' => $this->input->post('username'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => $this->input->post('password')
			);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('registration_form', $data);
			}
		}
	}
*/
	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('userlogin', 'Userlogin', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('dashboard');
			}else{
				$this->load->view('login');
			}
		} else {
			$data = array(
				'userlogin' => $this->input->post('userlogin'),
				'password' => $this->input->post('password')
			);
			if ($this->input->post('agent') != '1') {
				$result = $this->login_database->login($data);
				if ($result == TRUE) {
					$userlogin = $this->input->post('userlogin');
					$result = $this->login_database->read_user_information($userlogin);
					if ($result != false) {
					
						$session_data = array(
						'userid' => $result[0]->user_id,
						'userlogin' => $result[0]->user_login,
						'username' => $result[0]->user_name,
						'roleid' => $result[0]->role_id,
						'agenid' => $result[0]->agent_id,
						'dop' => $result[0]->user_dob,
						'pob' => $result[0]->user_pob,
						'height' => $result[0]->user_height,
						'contractuntil' => $result[0]->contract_until,
						'agent' => 0
//						'email' => $result[0]->user_email,
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						//$this->load->view('dashboard');
						header("location: ". $this->config->item('base_url') . "index.php/user_authentication/dashboard_show");
					}	
				} else {
					$data = array(
					'error_message' => 'Invalid Userlogin or Password'
					);
					$this->load->view('login', $data);
				}
			} 
			else {
				// check login to table agent
				$result = $this->login_database->login_agent($data);
				if ($result == TRUE) {
					$userlogin = $this->input->post('userlogin');
					$result = $this->login_database->read_user_information_agent($userlogin);
					if ($result != false) {
					
						$session_data = array(
						'agentid' => $result[0]->agent_id,
						'agentlogin' => $result[0]->agent_login,
						'agentname' => $result[0]->agent_name,
						'agentdob' => $result[0]->agent_dob,
						'agentpob' => $result[0]->agent_pob,
						'agent' => 1
//						'email' => $result[0]->user_email,
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						//$this->load->view('dashboard');
						header("location: ". $this->config->item('base_url') . "index.php/user_authentication/dashboard_show");
					}	
				} else {
					$data = array(
					'error_message' => 'Invalid Userlogin or Password'
					);
					$this->load->view('login', $data);
				}
			}
		
		}
	}

	// Logout from admin page
	public function logout() {
		if (isset($this->session->userdata['logged_in'])) {
		// Removing session data
			$sess_array = NULL;
		
			if ($this->session->userdata['logged_in']['agent'] == 1) {
					$sess_array = array(
					'agentid' => '',
					'agentlogin' => '',
					'agentname' => '',
					'agentdob' => '',
					'agentpob' => '',
					'agent' => ''
					);
			} else {
					$sess_array = array(
					'userid' => '',
					'userlogin' => '',
					'username' => '',
					'roleid' => '',
					'agenid' => '',
					'dop' => '',
					'pob' => '',
					'height' => '',
					'contractuntil' => '',
					'agent' => ''
//					'email' => ''
					);
			}
		
			$this->session->unset_userdata('logged_in', $sess_array);
		}
		$this->session->sess_destroy();
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('home', $data);
	
	}

}

?>