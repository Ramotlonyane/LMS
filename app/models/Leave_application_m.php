<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_application_m extends CI_Model {

	private $table = "applicationData";

	public function all_leave_application($userID,$limit = 0,$idLeaveType=null){

		$this->db->select('ad.*, lt.typeName');
		$this->db->from('applicationData ad');
		$this->db->where('ad.idEmployee',$userID);
		$this->db->where('ad.bDeleted', 0);
		$this->db->join('leavetype lt','lt.id = ad.idLeaveType', 'left');
		if (!is_null($idLeaveType)) {
			$this->db->where('ad.idLeaveType', $idLeaveType);
		}
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
		return $this->db->get();
		
	}
	public function checkHash($hash){
		
		$this->db->select('ad.*, lt.typeName, ls.statusName, e.surname');
		$this->db->from('applicationData ad');
		$this->db->where('hash',$hash);
		$this->db->where('ad.idLeaveStatus', 1);
		$this->db->join('leaveType lt', 'lt.id = ad.idLeaveType', 'left');
		$this->db->join('leaveStatus ls', 'ls.id = ad.idLeaveType', 'left');
		$this->db->join('employee e', 'e.id = ad.idEmployee', 'left');

		$query = $this->db->get();
		return $query->result();

		//$query = $this->db->get_where('applicationData', array('hash'=>$hash));
		//return $this->db->get();
		//$result = $this->db->get()->result();
	}

	public function get_emails($recommender,$approver){

		$this->db->select('email, surname');
		$this->db->from('employee');
		$this->db->where('bDeleted', 0);
		$this->db->where_in('idRole',array($recommender,$approver));

		$query = $this->db->get();
		return $query->result();
	}
	public function get_subemail($idemp){

		$this->db->select('email')
				 ->from('employee')
				 ->where('id', $idemp)
				 ->where('bDeleted', 0);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row()->email;
		} else {
			return false;
		}
	}
	public function get_name($idemp){

		$this->db->select('surname')
				 ->from('employee')
				 ->where('id', $idemp)
				 ->where('bDeleted', 0);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row()->surname;
		} else {
			return false;
		}
	}
	public function get_leaveTypename($idLeaveType){

		$this->db->select('typeName')
				 ->from('leavetype')
				 ->where('id', $idLeaveType)
				 ->where('bDeleted', 0);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row()->typeName;
		} else {
			return false;
		}
	}
	public function get_employee_leave_record($idEmployee, $idLeaveType) {
		$this->db->select("lv.numberOfLeaves")
				 ->from("leaverecord lv")
				 ->where("lv.idEmployee", $idEmployee)
				 ->where('bDeleted', 0)
				 ->where("lv.idLeaveType", $idLeaveType);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row()->numberOfLeaves;
		} else {
			return false;
		}
	}
	public function	get_leaveStatusname($idLeaveStatus){

		$this->db->select('statusName')
				->from('leavestatus')
				->where('id', $idLeaveStatus)
				->where('bDeleted', 0);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row()->statusName;
		} else {
			return false;
		}
	}
	public function count_Leave_application($userID){

		$this->db->select('*');
		$this->db->where('idEmployee',$userID);
		$this->db->where('bDeleted', 0);
		return $this->db->count_all_results($this->table);		
	}

	public function count_Leave_status($subordinate,$sub_subordinate){

		$this->db->select('ad.*');
		$this->db->from('applicationdata ad');
		$this->db->where_in('em.idRole',array($subordinate,$sub_subordinate));
		$this->db->where('ad.bDeleted', 0);
		$this->db->join('employee as em','em.id = ad.idEmployee', 'left');
		return $this->db->count_all_results();		
	}

	public function count_Myleave_status($userID){

		$this->db->select('ad.*, ls.statusName, lt.typeName');
		$this->db->from('applicationdata ad');
		$this->db->where('ad.idEmployee',$userID);
		$this->db->where('ad.bDeleted', 0);
		$this->db->join('employee as em','em.id = ad.idEmployee', 'left');
		$this->db->join('leaveStatus as ls','ls.id = ad.idLeaveStatus', 'left');
		$this->db->join('leaveType as lt','lt.id = ad.idLeaveType', 'left');
		return $this->db->count_all_results();		
	}

	public function all_applied_leave_status($subordinate,$sub_subordinate,$limit = 0){
		$this->db->select('ap.startDate, ap.endDate, ap.id, ap.applicationDate, ap.numberOfDays, lt.typeName, ls.statusName,em.surname, em.id as idEmployee, lt.id as idLeaveType');
		$this->db->from('applicationData ap');
		$this->db->where_in('em.idRole',array($subordinate,$sub_subordinate));
		$this->db->where('ap.bDeleted', 0);
		$this->db->join('employee as em','em.id = ap.idEmployee', 'left');
		$this->db->join('leaveType as lt','lt.id = ap.idLeaveType','left');
		$this->db->join('leaveStatus as ls','ls.id = ap.idLeaveStatus','left');
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
		return $this->db->get();
	}
	public function all_Myapplied_leave_status($userID,$limit = 0){
		$this->db->select('ap.startDate, ap.endDate, ap.id, ap.applicationDate, ap.numberOfDays, lt.typeName, ls.statusName');
		$this->db->from('applicationData ap');
		$this->db->where('ap.idEmployee',$userID);
		$this->db->where('ap.bDeleted', 0);
		$this->db->join('employee as em','em.id = ap.idEmployee', 'left');
		$this->db->join('leaveType as lt','lt.id = ap.idLeaveType','left');
		$this->db->join('leaveStatus as ls','ls.id = ap.idLeaveStatus','left');
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
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
         $this->db->update('applicationData', array('idLeaveStatus'	=> $idstatus
                                           	 		));
         
         return true;
	}

	public function update_numberOfLeaves($idleaveType,$userID,$numberOfLeaves){
		$this->db->where('idLeaveType', $idleaveType);
		$this->db->where('idEmployee', $userID);
		$this->db->update('leaverecord', array('numberOfLeaves'	=> $numberOfLeaves
                                           	 		));
         
         return true;
	}
}