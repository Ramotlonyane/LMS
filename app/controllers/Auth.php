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
	private $limit = 10;
	function __construct(){
		parent:: __construct();
		$this->load->model('Leave_type_m');
		$this->load->model('Employee_m');
		$this->load->model('Leave_application_m');
		$this->load->model('Leave_record_m');
		$this->load->library('pagination');
		$this->load->library('ajax_pagination');
		$this->load->helper('app');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data_navbar["username"] = $this->session->userdata('username');

			$this->load->view("header");
			$this->load->view('navbar', $data_navbar);

			//Search by User Role
			$userRole						= $this->session->userdata('idrole');
			$subordinate 					= $userRole + 1;
			$sub_subordinate 				= $userRole + 2;
			//Search by User ID
			$userID 						= $this->session->userdata('id');

			$data = array(	'myleave' 					=> 'employee/my_leave',
							'user' 						=> $this->session->userdata(),
							'apply_leave' 				=> 'employee/apply_leave',
							'apply_leave_sidebar' 		=> 'employee/apply_leave_sidebar',
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

			$queryEmployee 					= $this->Employee_m->all_Employee();
			$total_rows 					= $this->Employee_m->count_Employee();

			$queryLeaveRecord 				= $this->Leave_record_m->all_leave_record($subordinate,$sub_subordinate,$this->limit);
			$total_rows_records 			= $this->Leave_record_m->count_leave_records($subordinate,$sub_subordinate);

			$queryAppliedLeaveStatus		= $this->Leave_application_m->all_applied_leave_status($subordinate,$sub_subordinate,$this->limit);
			$total_rows_leavestatus 		= $this->Leave_application_m->count_Leave_status($subordinate,$sub_subordinate);

			$queryMyappliedLeaveStatus		= $this->Leave_application_m->all_Myapplied_leave_status($userID,$this->limit);
			$total_rows_Myleavestatus 		= $this->Leave_application_m->count_Myleave_status($userID);

			$queryApplicationData			= $this->Leave_application_m->all_leave_application($userID,$this->limit);
			$total_rows_leaveapplied 		= $this->Leave_application_m->count_Leave_application($userID);

			$queryLeaveType 				= $this->Leave_type_m->all($this->limit);
			$total_rows_leaveType 			= $this->Leave_type_m->count();
			
			$pagination_links_leavetype 		= ajax_pagination($total_rows_leaveType, $this->limit);
			$pagination_links_Mystatus 			= ajax_pagination($total_rows_Myleavestatus, $this->limit);
			$pagination_links_status 			= ajax_pagination($total_rows_leavestatus, $this->limit);
			$pagination_links_records 			= ajax_pagination($total_rows_records, $this->limit);
			$pagination_links_leaveapplied 		= ajax_pagination($total_rows_leaveapplied, $this->limit, "/index.php/Leave_application_c/test", 3, '.applied_leave_status');

			$data['pagination_data_leaveapplied']	= $pagination_links_leaveapplied;
			$data['pagination_data_leaves']			= $pagination_links_leavetype;
			$data['pagination_data_records']		= $pagination_links_records;
			$data['pagination_data_status']			= $pagination_links_status;
			$data['pagination_data_Mystatus']		= $pagination_links_Mystatus;


			$data['all_employee_data'] 				= $queryEmployee;
			$data['all_applied_Mystatus']			= $queryMyappliedLeaveStatus;
			$data['all_applied_status']				= $queryAppliedLeaveStatus;
			$data['all_leave_records_data'] 		= $queryLeaveRecord;
			$data['all_leave_type_data'] 			= $queryLeaveType;
			$data['all_leave_application_data']		= $queryApplicationData;

			$department_result 						= $this->Employee_m->get_Department();
			$data['department'] 					= $department_result['all_department'];
		
		
			$employee_result 		= $this->Leave_record_m->get_Employee($subordinate,$sub_subordinate);
			$data['employee'] 		= $employee_result['all_employee'];


			$leave_type_result 				= $this->Leave_application_m->get_Leavetype();
			$data['leavetype'] 				= $leave_type_result['all_leavetype'];

			$role_result 					= $this->Employee_m->get_Role();
			$data['role'] 					= $role_result['all_role'];

			$component_result 				= $this->Employee_m->get_Component();
			$data['component'] 				= $component_result['all_component'];

			$leave_status_result 			= $this->Leave_application_m->get_leave_status();
			$data['leavestatus'] 			= $leave_status_result['all_leave_status'];
			
			$this->load->view("dashboard", $data);
			$this->load->view("footer");
		}
		else{ 
			$this->login();
		}
	}

	function ajaxPaginationData()
    {

        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else {
            $offset = $page;
        }
        $total_rows_leaveType 		= $this->Leave_type_m->count();
        $pagination_links_leaves 	= ajax_pagination($total_rows_leaveType, $this->limit);

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
									'idrole' 	=> $result->idRole,
									'id'		=> $result->id,
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
