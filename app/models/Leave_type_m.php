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
		$this->db->where('bDeleted', 0);
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
		return $this->db->get($this->table);
	}

	public function count()
	{
		$this->db->where('bDeleted', 0);
		return $this->db->count_all_results($this->table);		
	}

	public function remove_LeaveType($id)
	{
		$this->db->where('id', $id);
		if ($this->db->update('leaveType',array('bDeleted'=>1))) {
			return true;
		}else{
			return false;
		}
        //$this->db->delete('leaveType');
	}
	public function update_LeaveType($data)
	{
		 extract($data);
         $this->db->where('id', $id);
         $this->db->update('leaveType', array('typeName'			=> $leavename, 
                                              'numberOfLeaves'		=> $numberOfLeaves,
                                              'description'			=> $description,
                                           	 ));
         
         return true;
	}
	public function find_LeaveType($data){

		extract($data);
		$this->db->select('*');
		if(!empty($nameOfLeave)){
			$this->db->like('typeName', $nameOfLeave, 'both');
			$this->db->where('bDeleted', 0);
		}
		if(!empty($leaveNumber)){
			$this->db->where(array('numberOfLeaves' => $leaveNumber, 'bDeleted'=>0));
			//$this->db->where('numberOfLeaves', $leaveNumber);
		}
		return $this->db->get($this->table);
		
		//$query = $this->db->query("SELECT * FROM leaveType WHERE name LIKE '%$nameOfLeave%'");
		//var_dump($query);die();
		
		
	}

}