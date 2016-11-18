<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_record_m extends CI_Model {

	private $table = "leaveRecord";

	public function insert_leaveRecord($data){

		$this->db->insert('leaveRecord', $data);

		if($this->db->affected_rows() > 0)
			{
    			return true;
			}
			else{
				return false;
			}
	}

	public function all_leave_record($subordinate,$sub_subordinate)
	{
		$this->db->select('em.surname, lt.typeName, lv.numberOfLeaves, lv.description');
		$this->db->from('leaveRecord lv');
		/*if(!empty($subordinate)){
			$this->db->where('em.idRole', $subordinate);
		}
		if(!empty($sub_subordinate)){
			$this->db->where('em.idRole', $sub_subordinate);
		}*/
		$this->db->where_in('em.idRole',array($subordinate,$sub_subordinate));
		$this->db->join('employee as em','em.id = lv.idEmployee', 'left');
		$this->db->join('leaveType as lt','lt.id = lv.idLeaveType','left');
		return $this->db->get();
	}

	public function count_leave_records()
	{
		return $this->db->count_all_results($this->table);		
	}
	public function get_Employee($subordinate,$sub_subordinate){
		
		$this->db->select('id, surname');
		$this->db->from('Employee');
		$this->db->where_in('idRole',array($subordinate,$sub_subordinate));
		$result['all_employee'] = $this->db->get()->result();

		return $result;
	}

}

	/*public function get_Employee($subordinate){
		
		$this->db->select('id, surname');
		$this->db->from('Employee');
		$this->db->where('idRole',$subordinate);
		$result['all_employee'] = $this->db->get()->result();

		return $result;
	}
		public function all_leave_record($subordinate)
	{
		$this->db->select('em.surname, lt.name, lv.numberOfLeaves, lv.description');
		$this->db->from('leaveRecord lv');
		$this->db->where('em.idRole',$subordinate);
		$this->db->join('employee as em','em.id = lv.idEmployee', 'left');
		$this->db->join('leaveType as lt','lt.id = lv.idLeaveType','left');
		return $this->db->get();
	}*/