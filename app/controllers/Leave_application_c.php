<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_application_c extends CI_Controller {

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
		$this->load->model('Leave_application_m');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('ajax_pagination');
		$this->load->helper('app');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE){
			redirect('index.php/Auth');
		}
	}

	public function compareDate(){
			$start = strtotime($this->input->post('anualstartdate'));
			$end = strtotime($this->input->post('anualenddate'));

			if ($start >= $end) {
				$this->form_validation->set_message('compareDate','End Date should be greater than Start Date');
				return false;
			}
			else{
				return true;
			}
	}

	public function leaveApplication()
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') != '1'){
		$userID 		= $this->session->userdata('id');
		$data = array('success' => false, 'messages' => array());

		/* PERSONAL DETAILS SECTION*/
		$this->form_validation->set_rules("anualstartdate", "Start Date", "trim|required");
		$validation = array(
					//array('field' => 'anualstartdate','label' => 'Start Date','rules' => 'required|callback_compareDate'),
					array('field' => 'anualenddate','label' => 'End Date','rules' => 'required|callback_compareDate'),
									);					
			$this->form_validation->set_rules($validation);
			$this->form_validation->set_message('required','%s is required');
			$this->form_validation->set_rules("leavetyppe", "Leave Type", "trim|required");
			$this->form_validation->set_rules("anualnwdays", "Number of Days", "trim|required");
			$this->form_validation->set_rules("leavetyppe", "Leave Type", "trim|required");
		
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run()) {
				$application_date = date('Y-m-d H:i:s');
				$startDate 	= $this->input->post('anualstartdate');
				$endDate 	= $this->input->post('anualenddate');

				$application_data = array('startDate' 		=> $startDate,
										'endDate' 			=> $endDate,
										'numberOfDays' 		=> $this->input->post('anualnwdays'),
										'idLeaveType' 		=> $this->input->post('leavetyppe'),
										'applicationDate'	=> $application_date,
										'idEmployee'		=> $userID,
										'leavePurpose'		=> $this->input->post('leavepurpose'),
										);

				$results = $this->Leave_application_m->insert_leave_application($application_data);

					if ($results){
						$data['success'] = true;
						//$this->sendEmail($email,$userName);
					}
					else{
						$data['success'] = false;
					}
		}
		else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		if (array_key_exists("success", $data) && $data['success'] === true) {

				$query = $this->Leave_application_m->all_leave_application($userID);

				$data_apply_leave['query'] = $query;
				$data['html'] = $this->load->view("employee/apply_leave_sidebar", $data_apply_leave, true);
			}

		echo json_encode($data);

		}else {
			redirect('index.php/Auth');
		}
	}
	public function all_user_leave_status($idrecord)
	{

		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') != '9'){
		$userRole						= $this->session->userdata('idrole');
		$subordinate 					= $userRole + 1;
		$sub_subordinate 				= $userRole + 2;

			if(!empty($_POST['idstatus'])){

			$idstatus			= $this->input->post('idstatus');


				if($this->Leave_application_m->update_all_user_leave_status($idrecord,$idstatus))
			    	{
			    		
			        	$query = $this->Leave_application_m->all_applied_leave_status($subordinate,$sub_subordinate);

						$data['query'] = $query;
						$this->load->view("manager/leave_applied", $data);
			    	}
			    	else{
			        	echo "Leave not edited";
			    	}


			}else{echo "Select Status First";}

		}else {
			redirect('index.php/Auth');
		}
	}

	function sendEmail($email,$userName)
    {
        $this->config->load('email', TRUE);
        $this->email->from($this->config->item('from_email', 'email'), 'TEST');
        $this->email->to($email);
        $this->email->subject();

        $data = array(
                            
                      );

        $message = $this->load->view('/email_template', $data, true);

        $this->email->message($message);
        $this->email->send();
    }
	public function edit_leaveApplication()
	{
		
	}
	public function delete_leaveApplication()
	{
		
	}
	public function search_leaveApplication()
	{
		
	}
	public function preview_leaveApplication()
	{
		
	}
	public function test($offset=0)
	{
		$userID 						= $this->session->userdata('id');
		$total_rows_leaveapplied 		= $this->Leave_application_m->count_Leave_application($userID);
		$data['pagination_links'] 		= ajax_pagination($total_rows_leaveapplied, $this->limit, "/index.php/Leave_application_c/test", 3, '.applied_leave_status');
		$userRole						= $this->session->userdata('idrole');
		$subordinate 					= $userRole + 1;
		$sub_subordinate 				= $userRole + 2;
		$query = $this->Leave_application_m->all_applied_leave_status($subordinate,$sub_subordinate,$this->limit);
		$data['query'] = $query;
		echo $this->load->view("manager/leave_applied", $data, true);
	}
}
