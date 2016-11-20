<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_type_c extends CI_Controller {

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
		$this->load->library('form_validation');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('index.php/Auth');
		}
		/*else{$this->load->model('Leave_type_m','type');
			$query = $this->type->all();
			$total_rows = $this->type->count();
			$this->load->view("admin/all_leave_type", array("query" => $query));}*/
	}

	public function add_LeaveType()
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '1')
		{
			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules("leavename", "Leave Name", "trim|required");
			$this->form_validation->set_rules("numberOfLeaves", "Number of Leaves", "trim|required");

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$leave_data = array('typeName' 			=> $this->input->post('leavename'),
									'numberOfLeaves' 	=> $this->input->post('numberOfLeaves'),
									'description' 		=> $this->input->post('description'),
									'bDeleted'			=> 0,
									);

				
				$results = $this->Leave_type_m->insert_LeaveType($leave_data);

					if ($results){
						$data['success'] = true;
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

				$query 						= $this->Leave_type_m->all($this->limit);
				$total_rows_leaveType 		= $this->Leave_type_m->count();
				$pagination_links_records 	= pagination($total_rows_leaveType, $this->limit);

				$data['pagination_links']	= $pagination_links_records;
				$data_leave['query'] = $query;

				$data['html'] = $this->load->view("admin/all_leave_type", $data_leave, true);
			}
			
			echo json_encode($data);
		}
		else {
			redirect('index.php/Auth');
		}
		
	}

	public function get_all_LeaveType()
	{
		
	}

	public function delete_LeaveType($id)
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '1'){
			
			$this->Leave_type_m->remove_LeaveType($id);

			$query 						= $this->Leave_type_m->all($this->limit);
			$total_rows_leaveType 		= $this->Leave_type_m->count();
			$pagination_links_records 	= pagination($total_rows_leaveType, $this->limit);

			$data['pagination_links']	= $pagination_links_records;
			$data['query'] 				= $query;
			$this->load->view("admin/all_leave_type", $data);

		}else {
			redirect('index.php/Auth');
		}
	}

	public function edit_LeaveType($id)
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '1'){

			if(!empty($_POST['name']) && !empty($_POST['numberOfLeaves'])){

			$leavename 			= $this->input->post('name');
			$numberOfLeaves 	= $this->input->post('numberOfLeaves');
			$description	 	= $this->input->post('description');

			$data = array('leavename'        => $leavename, 
	                      'numberOfLeaves'   => $numberOfLeaves,
	                      'description' 	 => $description,
	                      'id'				 => $id,	
	                      );

				if($this->Leave_type_m->update_LeaveType($data))
			    	{
			        	$query 						= $this->Leave_type_m->all($this->limit);
						$total_rows_leaveType 		= $this->Leave_type_m->count();
						$pagination_links_records 	= pagination($total_rows_leaveType, $this->limit);

						$data['pagination_links']	= $pagination_links_records;
						$data['query'] = $query;
						$this->load->view("admin/all_leave_type", $data);
			    	}
			    	else{
			        	echo "Leave not edited";
			    	}


			}else{echo "Name and Number of leaves fileds can not be empty";}

		}else {
			redirect('index.php/Auth');
		}
	}

	public function search_LeaveType()
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '1'){

			if(!empty($_POST['nameOfLeave']) || !empty($_POST['leaveNumber'])){

			$nameOfLeave 	= $this->input->post('nameOfLeave');
			$leaveNumber 	= $this->input->post('leaveNumber');

			$data = array('nameOfLeave'   => $nameOfLeave, 
	                      'leaveNumber'   => $leaveNumber,	
	                      );
			$query 						= $this->Leave_type_m->all($this->limit);
			$total_rows_leaveType 		= $this->Leave_type_m->count();
			$pagination_links_records 	= pagination($total_rows_leaveType, $this->limit);

			$data['pagination_links']	= $pagination_links_records;

			$data['query'] = $this->Leave_type_m->find_LeaveType($data);
			$this->load->view("admin/all_leave_type", $data);
			  

			}else{echo "Fields are empty!!!";}


		}else {
			redirect('index.php/Auth');
		}
	}
	public function preview_LeaveType()
	{
		
	}
}