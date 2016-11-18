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

	function __construct(){
		parent:: __construct();
		$this->load->model('Employee_m');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE){
			redirect('index.php/Auth');
		}

	}

	public function add_Employee()
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('idrole') == '1'){

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

		$this->form_validation->set_rules("username", "User Name", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confirmPassword", "Confirm Password", "trim|required|matches[password]");
		$this->form_validation->set_rules("role", "Role", "trim|required");

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run()) {

				//$password = hash("sha256",$this->input->post('password'));
				$password = sha1($this->input->post('password'));

				$employee_data = array(	'surname' 			=> $this->input->post('surname'),
										'initial' 			=> $this->input->post('initial'),
										'telephone' 		=> $this->input->post('telnum'),
										'address' 			=> $this->input->post('address'),
										'idDepartment' 		=> $this->input->post('department'),
										'idComponent' 		=> $this->input->post('component'),
										'idCasualWorker' 	=> $this->input->post('casual'),
										'idShiftWorker' 	=> $this->input->post('shift'),
										'persalNum' 		=> $this->input->post('persalnum'),
										'idRole' 			=> $this->input->post('role'),
										'username' 			=> $this->input->post('username'),
										'password' 			=> $password,
										);

				$results = $this->Employee_m->insert_Employee($employee_data);

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

				$query = $this->Employee_m->all_Employee();

				$data_employee['query'] = $query;

				$data['html'] = $this->load->view("admin/add_user_sidebar", $data_employee, true);
			}

		echo json_encode($data);

		}else {
			redirect('index.php/Auth');
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
