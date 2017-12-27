<?php 

class student_model extends CI_Model
{
	public function get_attd_details()
	{
		//echo $_SESSION['SID'];
		$this->db->select('SUBID,ATTDATE,ATTEND');
		$this->db->where('SID',$_SESSION['SID']);
		$query = $this->db->get('stud_attend');
		$query = $query->result_array();
		$dates = $this->db->get('stud_attend');
		$dates = $dates->result_array();
		$query['query']=$query;
		$query['dates']=$dates;
		return $query;
	}
	public function get_student_details()
	{
		//echo $_SESSION['USERID'];
		$this->db->where('SNAME',$_SESSION['USERID']);
		$query = $this->db->get('student');
		$query = $query->result_array();
		return $query[0];
	}
}

 ?>