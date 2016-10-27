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
	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE){
			redirect('index.php/Auth');
		}
	}

	public function add_leaveRecords()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data = array('success' => false, 'messages' => array());

			$this->load->library('form_validation');

			$this->form_validation->set_rules("nameOfUser", "Name Of User", "trim|required");
			$this->form_validation->set_rules("typeOfLeave", "Type of Leave", "trim|required");
			$this->form_validation->set_rules("numberOfDays", "Number of Days", "trim|required");


			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run()) {
			$data['success'] = true;
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
	public function edit_leaveRecords()
	{
		
	}
	public function delete_leaveRecords()
	{
		
	}
	public function search_leaveRecords()
	{
		
	}
	public function preview_leaveRecords()
	{
		
	}
}
