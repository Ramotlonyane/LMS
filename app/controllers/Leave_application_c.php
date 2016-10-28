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
	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE){
			redirect('index.php/Auth');
		}
	}

	public function leaveApplication()
	{
		
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
