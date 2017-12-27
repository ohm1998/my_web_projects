<?php 

class login_model extends CI_Model
{
	public function check_details($post)
	{
		$this->db->where('USERID',$post['USERID']);
		$query=$this->db->get('login');
		if(($query->num_rows())==0)
		{
			return 0;
		}
		else
		{
			$query = $query->result_array();
			return $query[0];
		}
	}
}

 ?>