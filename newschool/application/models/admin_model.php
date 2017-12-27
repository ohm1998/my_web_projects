<?php 

class admin_model extends CI_Model
{
	public function admin_details($post)
	{
		$this->db->where('ADMIN_ID',$post['USERID']);
		$query=$this->db->get('admin');
		if(($query->num_rows())==0)
		{
			echo "Incorrect Username";
		}
		else
		{
			$query=$query->result_array();
			return $query[0];
		}
	}
	public function teacher_insert($post)
	{
		foreach($post as $row)
		{
			$this->db->insert('teacher',$row);
			$data = array(
				'USERID' => $row['TNAME'],
				'PASS' => $row['TPASS'],
				'TYPE' => 'TEACHER'
			);
			$this->db->insert('login',$data);
		}
	}
	public function student_insert($post)
	{
		foreach($post as $row)
		{
			$this->db->insert('student',$row);
			$data = array(
				'USERID' => $row['SNAME'],
				'PASS' => $row['SPASS'],
				'TYPE' => 'STUDENT'
			);
			$this->db->insert('login',$data);
		}
	}
	public function subject_insert($post)
	{
		$data = array(
			'SUBNAME' => $post['SUBNAME'],
			'IS_ACTIVE' => $post['IS_ACTIVE']
		);
		$this->db->insert('subject',$data);
	}
	public function insert_teachsub($post)
	{
		$data = array(
			'TID' => $post['TID'],
			'SUBID' => $post['SUBID']
		);
		$this->db->insert('teachsub',$data);
	}
	public function get_stud_attend($post)
	{
		$this->db->select('stud_attend.*,student.SNAME,subject.SUBNAME');
		$this->db->where('stud_attend.SID',$post['SID']);
		$this->db->from('stud_attend');
		$this->db->join('student','stud_attend.SID=student.SID');
		$this->db->join('subject','stud_attend.SUBID=subject.SUBID');
		$query=$this->db->get();
		$query=$query->result_array();
		return $query;
	}
	public function get_sub_attend($post)
	{
		$this->db->select('stud_attend.*,student.SNAME');
		$this->db->from('stud_attend');
		$this->db->where('stud_attend.SUBID',$post['SUBID']);
		$this->db->join('student','stud_attend.SID=student.SID');
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
	}
	public function get_sub_list()
	{
		$this->db->select('SUBNAME,SUBID');
		$query=$this->db->get('subject');
		$query = $query->result_array();
		return $query;
	}
}


 ?>