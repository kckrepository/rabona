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
	}

	// Show home page
	public function index(){
	$this->load->view('home');
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
			$result = $this->login_database->login($data);
			if ($result == TRUE) {
				$userlogin = $this->input->post('userlogin');
				$result = $this->login_database->read_user_information($userlogin);
				if ($result != false) {
					
					$session_data = array(
					'userlogin' => $result[0]->user_login,
					'username' => $result[0]->user_name,
//					'email' => $result[0]->user_email,
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

	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
					'userlogin' => '',
					'username' => ''
//					'email' => ''
				);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->sess_destroy();
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('home', $data);
	
	}

}

?>