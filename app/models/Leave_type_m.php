<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_type_m extends CI_Model {

	public function insert_LeaveType($leave_data){

		$this->db->insert('leaveType', $leave_data);

		if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

}