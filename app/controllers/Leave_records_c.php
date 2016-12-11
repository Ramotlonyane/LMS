<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_records_c extends CI_Controller {

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
		$this->load->model('Leave_record_m');
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

	public function add_leaveRecords()
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '10')
		{		
			/*$this->db->select('r.id, r2.id AS subordinate, r3.id AS sub_subordinate')
					 ->from("role r")
					 ->join("role r2", "r2.id = r.idSubordinate", "left")
					 ->join("role r3", "r3.id = r2.idSubordinate", "left")
					 ->where("r.id", $userRole);*/

			$data = array('success' => false, 'messages' => array());
			$this->load->library('form_validation');

			$this->form_validation->set_rules("nameOfUser", "Name Of User", "trim|required");
			$this->form_validation->set_rules("typeOfLeave", "Type of Leave", "trim|required");
			$this->form_validation->set_rules("numberOfDays", "Number of Days", "trim|required");
			$this->form_validation->set_rules("recordsDescription", "Decription", "trim|required");


			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$leave_count = $this->Leave_record_m->count_leave_records($this->input->post('nameOfUser'), $this->input->post('typeOfLeave'));

				if ($leave_count == 0) {
					$leave_record_data = array('idEmployee' 	=> $this->input->post('nameOfUser'),
									'idLeaveType' 			=> $this->input->post('typeOfLeave'),
									'numberOfLeaves' 		=> $this->input->post('numberOfDays'),
									'description' 			=> $this->input->post('recordsDescription'),
									'bDeleted'				=> 0,
									);

					$results = $this->Leave_record_m->insert_leaveRecord($leave_record_data);
				} else {
					$data['duplicated'] = true;
				}

				if (isset($results) && $results) {
					$data['success'] = true;
				}
				else {
					$data['success'] = false;
				}
				
			}
			else {
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			if (array_key_exists("success", $data) && $data['success'] === true) {

				//$this->leaverecordspagination($offset=0);
				$total_rows_records				= $this->Leave_record_m->count_leave_records();
				$data_view['pagination_links']  = ajax_pagination($total_rows_records, $this->limit, "/index.php/Leave_records_c/leaverecordspagination", 3, '.all_leave_record_container');
				$query  		= $this->Leave_record_m->all_leave_record($this->limit);
				$data_view['query']	= $query;

				$data['html'] 	= $this->load->view("hrm/add_leave_record_sidebar", $data_view, true);

			}

		ob_clean();
		echo json_encode($data);
		
		}
		else{
			redirect('index.php/Auth');
		}
	}
	public function edit_leaveRecords()
	{
		
		
	}
	public function delete_leaveRecord($id)
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '10'){
			
			if ($this->Leave_record_m->remove_LeaveRecord($id)) {

				$total_rows_records					= $this->Leave_record_m->count_leave_records();
				$data['pagination_links']			= ajax_pagination($total_rows_records, $this->limit,"/index.php/Leave_records_c/leaverecordspagination", 3, '.all_leave_record_container');

				$query 				= $this->Leave_record_m->all_leave_record($this->limit);
				$data['query']		= $query;
				
				$this->load->view("hrm/add_leave_record_sidebar", $data);
			}

			//$this->leaverecordspagination($offset=0);

		}else {
			redirect('index.php/Auth');
		}
	}
	public function leaverecordspagination($offset=0)
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '10'){

			$total_rows_records				= $this->Leave_record_m->count_leave_records();
			$data['pagination_links'] 		= ajax_pagination($total_rows_records, $this->limit, "/index.php/Leave_records_c/leaverecordspagination", 3, '.all_leave_record_container');

			$data['query']			= $this->Leave_record_m->all_leave_record($this->limit);

			echo $this->load->view("hrm/add_leave_record_sidebar", $data, true);

    	}else {
			redirect('index.php/Auth');
		}
	}
	public function search_leaveRecords()
	{
		
	}
	public function preview_leaveRecords()
	{
		
	}
}
