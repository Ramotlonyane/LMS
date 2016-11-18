<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_application_m extends CI_Model {

	private $table = "applicationData";

	public function all_leave_application($userID){
		$this->db->select('*');
		$this->db->where('idEmployee',$userID);
		return $this->db->get($this->table);
	}
	public function count_Leave_application(){
		return $this->db->count_all_results($this->table);		
	}

	public function all_applied_leave_status($subordinate,$sub_subordinate){
		$this->db->select('ap.startDate, ap.endDate, ap.id, ap.applicationDate, ap.numberOfDays, lt.typeName, ls.statusName,em.surname');
		$this->db->from('applicationData ap');
		$this->db->where_in('em.idRole',array($subordinate,$sub_subordinate));
		$this->db->join('employee as em','em.id = ap.idEmployee', 'left');
		$this->db->join('leaveType as lt','lt.id = ap.idLeaveType','left');
		$this->db->join('leaveStatus as ls','ls.id = ap.idLeaveStatus','left');
		return $this->db->get();
	}

	
	public function get_Leavetype(){
		
		$this->db->select('id, typeName');
		$this->db->from('leavetype');
		$result['all_leavetype'] = $this->db->get()->result();

		return $result;
	}

	public function get_leave_status(){
		
		$this->db->select('id, statusName');
		$this->db->from('leaveStatus');
		$result['all_leave_status'] = $this->db->get()->result();

		return $result;
	}

	public function insert_leave_application($application_data){
		
		$this->db->insert('applicationData', $application_data);

		if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

    public function update_all_user_leave_status($idrecord,$idstatus)
	{
         $this->db->where('id', $idrecord);
         $this->db->update('applicationData', array('idLeaveStatus'			=> $idstatus
                                           	 		));
         
         return true;
	}

}