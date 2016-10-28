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
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data = array('success' => false, 'messages' => array());

			$this->load->library('form_validation');

			$this->form_validation->set_rules("leavename", "Leave Name", "trim|required");
			$this->form_validation->set_rules("numberOfLeaves", "Number of Leaves", "trim|required");

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run()) {
			$leave_data = array('name' 				=> $this->input->post('leavename'),
								'numberOfLeaves' 	=> $this->input->post('numberOfLeaves'),
								'description' 		=> $this->input->post('description')
								);

			$this->load->model('Leave_type_m'); 
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

		echo json_encode($data);
		
		}
		else{
			redirect('index.php/Auth');
		}
		
	}

	public function get_all_LeaveType()
	{
		
	}

	public function delete_LeaveType()
	{
		
	}

	public function edit_LeaveType()
	{
		
	}

	public function search_LeaveType()
	{
		
	}
	public function preview_LeaveType()
	{
		
	}
}