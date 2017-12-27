<?php 
class ajax_model extends CI_Model
{
	public function display()
	{
		$table = $this->db->get('customer');
		$result = $table->result_array();
		//print_r($result);
		return $result;
	}
	public function write($post)
	{
		$this->db->select('NAME,CNAME,COST,SERVICE');
		$data = array(
			'NAME' => $post['name'],
			'CNAME' => $post['cname'],
			'COST' => $post['cost'],
			'SERVICE' => $post['service']
		);
		$this->db->insert('customer',$data);
	}
	public function send_table()
	{
		$query = $this->db->query("SELECT * FROM customer ORDER BY sr DESC LIMIT 1");
		$result = $query->result_array();
		return $result;
	}
	public function delete_table()
	{
		$this->db->empty_table('customer');
		$this->db->query('ALTER TABLE customer AUTO_INCREMENT=1');
	}
	public function del_sel($post)
	{
		foreach($post as $row)
		{
			$this->db->where('sr',$row);
			$this->db->delete('customer');
		}
	}
}

?>