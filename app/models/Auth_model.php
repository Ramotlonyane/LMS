
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	/*private $table = "user";
	private $_data = array();*/

	public function validate($username, $password){

		$query = $this->db->get_where('user', array('username' => $username, 'password' => sha1($password)));
    	return $query->row();
    }

}