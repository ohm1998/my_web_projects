<?php 

class teacher_model extends CI_Model
{
	public function teacher_details($post)
	{
		$this->db->where('TNAME',$post['TNAME']);
		$query=$this->db->get('teacher');
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
	public function get_stud_details()
	{
		$this->db->select('SID,SNAME');
		$query = $this->db->get('student');
		$query=$query->result_array();
		return $query;
	}
	public function get_students($post)
	{
		foreach($post['SID'] as $row => $value)
		{
			if(!isset($post['cb'][$value]))
			{
				$val=0;
			}
			else
			{
				$val=1;
			}
			$data = array(
				'SID' => $value,
				'DATEADDED' => date("Y-m-d"),
				'TID' => $_SESSION['TID'],
				'SUBID' => $post['SUBNAME'],
				'ATTDATE' => $post['DATE'],
				'ATTEND' => $val
			);
			$this->db->insert('stud_attend',$data);
		}
	}
	public function get_sub_details()
	{
		$this->db->where('TID',$_SESSION['TID']);
		$query=$this->db->get('teachsub');
		if($query->num_rows()==0)
		{
			echo "No subjects";
		}
		else
		{
			$query = $query->result_array();
			return $query;
		}
	}
	public function get_sub_names($id)
	{
		$i=0;
		foreach($id as $row)
		{
			$this->db->where('SUBID',$row);
			$query=$this->db->get('subject');
			if($query->num_rows())
			{
				$query=$query->result_array();
				$sub[$i]['SUBNAME']=$query[0]['SUBNAME'];
				$sub[$i]['SUBID']=$row;
				$i++;
			}
		}
		return $sub;
	}
}

 ?>