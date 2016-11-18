<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_m extends CI_Model {

	private $table = "Employee";

	public function insert_Employee($employee_data)
	{
		$this->db->insert('Employee', $employee_data);

		if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

    public function all_Employee($limit = 0)
	{
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
		return $this->db->get($this->table);
	}
	public function get_Role(){
		
		$this->db->select('id, name');
		$this->db->from('Role');
		$result['all_role'] = $this->db->get()->result();

		return $result;
	}
	public function get_Department(){
		
		$this->db->select('id, name');
		$this->db->from('Department');
		$result['all_department'] = $this->db->get()->result();

		return $result;
	}
	public function get_Component(){
		
		$this->db->select('id, componentName');
		$this->db->from('Component');
		$result['all_component'] = $this->db->get()->result();

		return $result;
	}

	public function count_Employee()
	{
		return $this->db->count_all_results($this->table);		
	}

	public function remove_Employee()
	{

	}
	public function update_Employee()
	{

	}
	public function find_Employee()
	{
	
	}
	

}