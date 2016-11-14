<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_c extends CI_Controller {

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

	public function add_Employee()
	{
		if($this->session->userdata('logged_in') == TRUE  && $this->session->userdata('idrole') == '1' ){

		$data = array('success' => false, 'messages' => array());

		/* PERSONAL DETAILS SECTION*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules("surname", "Surname", "trim|required");
		$this->form_validation->set_rules("persalnum", "Persal Number", "trim|required|max_length[8]|numeric");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("telnum", "Tel No", "trim|required|regex_match[/^[0-9]{10}$/]'");
		$this->form_validation->set_rules("initial", "Initial", "trim|required");
		$this->form_validation->set_rules("department", "Department", "trim|required");
		$this->form_validation->set_rules("component", "Component", "trim|required");
		$this->form_validation->set_rules("casual", "Casual Worker", "trim|required");
		$this->form_validation->set_rules("shift", "Shift Worker", "trim|required");

		/* SECTION A  ANNUAL VALIDATIONS*/

			if($this->input->post('optradio') == 1)
		{
			$this->form_validation->set_rules("anualstartdate", "Start Date", "trim|required");
			$this->form_validation->set_rules("anualenddate", "End Date", "trim|required");
			$this->form_validation->set_rules("anualnwdays", "Days", "trim|required");
		}

		/* SECTION A NORMAL VALIDATIONS*/

		if($this->input->post('optradio') == 2)
		{
			$this->form_validation->set_rules("normalstartdate", "Start Date", "trim|required");
			$this->form_validation->set_rules("normalenddate", "End Date", "trim|required");
			$this->form_validation->set_rules("normalnwdays", "Days", "trim|required");
		}
		

		/* SECTION B ANNUAL VALIDATIONS*/
		if($this->input->post('optradio') == 3)
		{
			$this->form_validation->set_rules("annualstartdate", "Start Date", "trim|required");
			$this->form_validation->set_rules("annualenddate", "End Date", "trim|required");
			$this->form_validation->set_rules("annualnwdays", "Days", "trim|required");
		}
		

		/* SECTION B NORMAL VALIDATIONS*/
		if($this->input->post('optradio') == 4)
		{
			$this->form_validation->set_rules("normallstartdate", "Start Date", "trim|required");
			$this->form_validation->set_rules("normallenddate", "End Date", "trim|required");
			$this->form_validation->set_rules("normallnwdays", "Days", "trim|required");
		}
		

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
	}
	public function delete_Employee()
	{
		
	}
	public function edit_Employee()
	{
		
	}
	public function search_Employee()
	{
		
	}
	public function preview_Employee()
	{
		
	}
}
