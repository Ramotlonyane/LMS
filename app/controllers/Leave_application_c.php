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
		$this->load->library('email');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE){
			redirect('index.php/Auth');
		}
	}

	public function compareDate(){

		if($this->session->userdata('logged_in') == TRUE){
			$start = strtotime($this->input->post('anualstartdate'));
			$end = strtotime($this->input->post('anualenddate'));

			if ($start >= $end) {
				$this->form_validation->set_message('compareDate','End Date should be greater than Start Date');
				return false;
			}
			else{
				return true;
			}
		}else {
			redirect('index.php/Auth');
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
				$application_date 	= date('Y-m-d H:i:s');
				$startDate 			= $this->input->post('anualstartdate');
				$endDate 			= $this->input->post('anualenddate');
				$numberOfDays 		= $this->input->post('anualnwdays');
				$idleaveType 		= $this->input->post('leavetyppe');
				$leavePurpose 		= $this->input->post('leavepurpose');

				$application_data = array('startDate' 		=> $startDate,
										'endDate' 			=> $endDate,
										'numberOfDays' 		=> $numberOfDays,
										'idLeaveType' 		=> $idleaveType,
										'applicationDate'	=> $application_date,
										'idEmployee'		=> $userID,
										'bDeleted'			=>	0,
										'leavePurpose'		=> $leavePurpose,
										'hash'				=> hash("sha256", $application_date.$userID),
										);

				$numberOfLeaves = $this->Leave_application_m->get_employee_leave_record($userID, $idleaveType);

				if ($numberOfLeaves < $numberOfDays) {
					$data['insufficient'] = true;
				}else {
					$results = $this->Leave_application_m->insert_leave_application($application_data);
					
					if ($results){
						
						$data['success'] = true;
					}
					else{
						$data['success'] = false;
					}
				}
		}
		else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		if (array_key_exists("success", $data) && $data['success'] === true) {

				$total_rows_leaveapplied		= $this->Leave_application_m->count_Leave_application($userID);
				$data_view['pagination_links']  = ajax_pagination($total_rows_leaveapplied, $this->limit, "/index.php/Leave_application_c/leaveappliedpagination", 3, '.all_leave_application_data');
				$query  						= $this->Leave_application_m->all_leave_application($userID,$this->limit,$idleaveType);
				$data_view['query']				= $query;

				$this->sendEmail_approve($application_data);
				$data_apply_leave['query'] = $query;
				$data['html'] = $this->load->view("employee/apply_leave_sidebar", $data_view, true);
				
			}
		ob_clean();
		echo json_encode($data);

		}else {
			redirect('index.php/Auth');
		}
	}
	public function validate_hash(){

		$url_hash = $this->uri->segment(3);
		$result = $this->Leave_application_m->checkHash($url_hash);

		if ($result != null){

			$leave_status_result 			= $this->Leave_application_m->get_leave_status();
			$data['leavestatus'] 			= $leave_status_result['all_leave_status'];

			$data['query']					= $result;
			$this->load->view("header");
			$this->load->view("manager/email_leave_applied", $data);
			$this->load->view("footer");

		}else{
			echo "You are not allowed to perform this action, Please contact the system administrator!!!";
			die();
		}
	}
	public function email_approve_leave($idrecord, $hash){
		$result = $this->Leave_application_m->checkHash($hash);

		if ($result != null){

			if(!empty($_POST['idstatus'])){
				$idstatus			= $this->input->post('idstatus');
				$idemp				= $this->input->post('idemp');
				$idLeaveType 		= $this->input->post('idLeaveType');
				$numberOfDays 		= $this->input->post('NumberOfDays');	

				if($this->Leave_application_m->update_all_user_leave_status($idrecord,$idstatus)){

						$numberOfLeaves 	= $this->Leave_application_m->get_employee_leave_record($idemp, $idLeaveType);
			    		$numberOfLeaves-=$numberOfDays;
			    		$res = $this->Leave_application_m->update_numberOfLeaves($idLeaveType,$idemp,$numberOfLeaves);

					echo "Leave Status Changed Successfully!!!";
				}
				else{
					echo "Leave Status Already Changed!!!";
				}
			}else{
				echo "Please select leave status";
			}

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
			$idemp				= $this->input->post('idemp');
			$idLeaveType 		= $this->input->post('idLeaveType');
			$numberOfDays 		= $this->input->post('NumberOfDays');	


				if($this->Leave_application_m->update_all_user_leave_status($idrecord,$idstatus))
			    	{
			    		$numberOfLeaves 	= $this->Leave_application_m->get_employee_leave_record($idemp, $idLeaveType);
			    		$numberOfLeaves-=$numberOfDays;
			    		$res = $this->Leave_application_m->update_numberOfLeaves($idLeaveType,$idemp,$numberOfLeaves);
			    		//$this->sendEmail_notification();
			    		
			        	$total_rows_leavestatus 		= $this->Leave_application_m->count_Leave_status($subordinate,$sub_subordinate);
			        	$data['pagination_links'] 			= ajax_pagination($total_rows_leavestatus, $this->limit, "/index.php/Leave_application_c/leaveappliedstatuspagination", 3, '.applied_leave_status');

			        	$leave_status_result 			= $this->Leave_application_m->get_leave_status();
						$data['leavestatus'] 			= $leave_status_result['all_leave_status'];

			        	$query = $this->Leave_application_m->all_applied_leave_status($subordinate,$sub_subordinate,$this->limit);
						$data['query'] = $query;


						echo $this->load->view("manager/leave_applied", $data, TRUE);
			    	}
			    	else{
			        	echo "Leave not edited";
			    	}


			}else{echo "Select Status First";}

		}else {
			redirect('index.php/Auth');
		}
	}
	function sendEmail_notification(){

	}

	function sendEmail_approve($data)
    {	

    	if($this->session->userdata('logged_in') == TRUE){

    	date_default_timezone_set('GMT');
      	//extract($data);
      	$userRole						= $this->session->userdata('idrole');
		$approver 						= $userRole - 1;
		$recommender 					= $userRole - 2;

		$recommender_emails 		= $this->Leave_application_m->get_emails($approver,$recommender,$data['idLeaveType']);
		$leaveTypename 				= $this->Leave_application_m->get_leaveTypename($data['idLeaveType']);

        foreach ($recommender_emails as $recommender_email) {

        		foreach ($leaveTypename as $typename) {

	        			$emailData = array('startDate' 		=> $data['startDate'],
								'endDate' 			=> $data['endDate'],
								'numberOfDays' 		=> $data['numberOfDays'],
								'applicationDate'	=> $data['applicationDate'],
								'leavePurpose'		=> $data['leavePurpose'],
								'approver'			=> $recommender_email->surname,
								'recommender'		=> $recommender_email->surname,
								'applicantName'		=> $this->session->userdata('username'),
								'leaveTypename'		=> $typename->typeName,
								'hash'				=> $data['hash'],
								'userID'			=> $data['idEmployee'],
								//'hash'              => hash("sha256", $data['applicationDate'].$data['idEmployee'])
						);
	        		

	        	$message = $this->load->view('/email_template', $emailData, true);

	        	$this->config->load('email', TRUE);

		        $this->email->from($this->config->item('from_email', 'email'), $this->session->userdata('username'));

		        $this->email->to($recommender_email->email);
		        $this->email->cc($recommender_email->email);
		        $this->email->subject('Leave Application for Recommendation/Approval');
		        $this->email->message($message);
		        $this->email->send();
		        echo $this->email->print_debugger();     		        
	        }
        }

    	}else {
			redirect('index.php/Auth');
		}
    	
    }

    public function leaveappliedstatuspagination($offset=0)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$userRole						= $this->session->userdata('idrole');
			$subordinate 					= $userRole + 1;
			$sub_subordinate 				= $userRole + 2;

			$total_rows_leaveapplied 		= $this->Leave_application_m->count_Leave_status($subordinate,$sub_subordinate);
			$data['pagination_links'] 		= ajax_pagination($total_rows_leaveapplied, $this->limit, "/index.php/Leave_application_c/leaveappliedpagination", 3, '.applied_leave_status');
			
			$leave_status_result 			= $this->Leave_application_m->get_leave_status();
			$data['leavestatus'] 			= $leave_status_result['all_leave_status'];

			$query = $this->Leave_application_m->all_applied_leave_status($subordinate,$sub_subordinate,$this->limit);
			$data['query'] = $query;
			echo $this->load->view("manager/leave_applied", $data, true);

    	}else {
			redirect('index.php/Auth');
		}
	}

	public function leaveappliedpagination($offset=0)
	{	

		if($this->session->userdata('logged_in') == TRUE){
			$userID 		= $this->session->userdata('id');

			$total_rows_leaveapplied		= $this->Leave_application_m->count_Leave_application($userID);
			$data['pagination_links']  	= ajax_pagination($total_rows_leaveapplied, $this->limit, "/index.php/Leave_application_c/leaveappliedpagination", 3, '.all_leave_application_data');
			$query  						= $this->Leave_application_m->all_leave_application($userID,$this->limit);
			$data['query']				= $query;

			echo $this->load->view("manager/leave_applied", $data, true);

    	}else {
			redirect('index.php/Auth');
		}
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
	
}
