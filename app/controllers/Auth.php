
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			//$data['user'] = $this->session->userdata();
			//$data['apply_leave'] = $this->load->view("leave/apple_leave", null, true);

			$data_navbar["username"] = $this->session->userdata('username');

			$this->load->view("header");
			$this->load->view('navbar', $data_navbar);

			$data = array(	'myleave' 					=> 'employee/my_leave',
							'user' 						=> $this->session->userdata(),
							'apply_leave' 				=> 'employee/apply_leave',
							'add_leave_type'			=> 'admin/add_leave_type',
							'add_user'					=> 'admin/add_user',
							'all_leave_type'			=> 'admin/all_leave_type',
							'add_user_sidebar'			=> 'admin/add_user_sidebar',
							'leave_report'				=> 'admin/leave_reports',
							'user_report'				=> 'admin/user_reports',
							'applied_leave'				=> 'manager/leave_applied',
							'add_leave_record'			=> 'manager/add_leave_records',
							'add_leave_record_sidebar'	=> 'manager/add_leave_record_sidebar',
							'leave_record_reports'		=> 'manager/leave_records_reports',
							'home'						=> 'home'
						 );
			
			$this->load->view("dashboard", $data);
			$this->load->view("footer");
		}
		else{ 
			$this->login();
		}
	}

	function login()
	{
		$this->load->view('header');
		$this->load->view('auth');
		$this->load->view('footer');
	}

	public function logged_in_check()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->library('session');
		$this->load->database();
		$this->load->model('Auth_model');
			$state = 0;
			$result = $this->Auth_model->validate($username, $password);
			if ($result != null) {

				$session_data = array(
									'username' 	=> $username, 
									'idrole' 	=> $result->idrole, 
				 					'logged_in' => TRUE);

				$this->session->set_userdata($session_data);
				$state = 1;
			}
			echo json_encode(array('state' => $state));
	}

	function logout()
	{
		$this->load->library('session');
		$array_items = array('username' => $username, 'password' => $password );
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();

		redirect(base_url("index.php"));
	}
	
}
