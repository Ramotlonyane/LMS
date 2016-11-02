<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_type_m extends CI_Model {

	private $table = "leaveType";

	public function insert_LeaveType($leave_data)
	{

		$this->db->insert('leaveType', $leave_data);

		if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

    public function all($limit = 0)
	{
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
		return $this->db->get($this->table);
	}

	public function count()
	{
		return $this->db->count_all_results($this->table);		
	}

	public function remove_LeaveType($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('leaveType');
	}
	public function update_LeaveType($data)
	{
		 extract($data);
         $this->db->where('id', $id);
         $this->db->update('leaveType', array('name'				=> $leavename, 
                                              'numberOfLeaves'		=> $numberOfLeaves,
                                              'description'			=> $description,
                                           	 ));
         
         return true;
	}
	public function find_LeaveType($data){

		extract($data);
		$sql = "SELECT * FROM leaveType WHERE name LIKE '%".$nameOfLeave."%'";
	}

}