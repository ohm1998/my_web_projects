<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*  
http://stackoverflow.com/questions/34831389/datatables-library-not-working-in-codeigniter-3  
https://github.com/zepernick/Codeigniter-DataTables
*/
class Datatables extends CI_Model {

	/*var $table = 'admin';
    var $column = array('admin_name','admin_email','admin_contact_no','admin_pass','parent_id');
	var $order = array('admin_id' => 'desc');*/

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     private function _get_datatables_query($table,$column,$order)
    {
        $this->db->from($table);
        $i = 0;
        foreach ($column as $item)
        {
			if(isset($_POST['search'])){
				if($_POST['search']['value'])
					($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			}
			$column[$i] = $item;
			$i++;
		
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($order))
        {
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($table,$column,$order)
    {
        $this->_get_datatables_query($table,$column,$order);
		if(isset($_POST['search'])) {
			if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
		}
        $query = $this->db->get();
        return $query->result();
    }
	
	// 13 - Where, 22- select_query
	function get_datatables2($table,$column,$order,$table2 = null ,$field_name = null,$field_name2 = null,$table3 = null,$field_name3 = null,$field_name4 = null,$table4 = null,$field_name5 = null,$field_name6 = null,$where = null,$where_clause = null,$select = '*',$table5 = null,$field_name7 = null,$field_name8 = null,$table6 = null,$field_name9 = null,$field_name10 = null,$select_query = null)
    {
		if($select_query != null) {
			$query = $select_query;
		} else if($select == null) {
			$query = "select * from ".$table." ";
		} else {
			$query = "select ".$select." from ".$table." ";
		}
		if($table2 != null && $field_name != null) {
			$query .= " LEFT JOIN ".$table2." ON ".$table2.".".$field_name."=".$table.".".$field_name2;
		}
		if($table3 != null && $field_name3 != null) {
			$query .= " LEFT JOIN ".$table3." ON ".$table3.".".$field_name3."=".$table.".".$field_name4;
		}
		if($table4 != null && $field_name5 != null) {
			$query .= " LEFT JOIN ".$table4." ON ".$table4.".".$field_name5."=".$table.".".$field_name6;
		}
		if($table5 != null && $field_name7 != null) {
			$query .= " LEFT JOIN ".$table5." ON ".$table5.".".$field_name7."=".$table.".".$field_name8;
		}
		if($table6 != null && $field_name9 != null) {
			$query .= " LEFT JOIN ".$table6." ON ".$table6.".".$field_name9."=".$table.".".$field_name10;
		}
		$query .= " where 1 ";
		
		if(!empty($_POST['search']) && !empty($_POST['search']['value'])){
			$i = 0;
			$query .= ' and (';
			foreach ($column as $item)
			{
				if($_POST['search']['value']){
					if ($i > 0)
						$query .= " or ";
					$query .= " ". $item." LIKE '%".$_POST['search']['value']."%' ";
				}
				//$column[$i] = $item;
				$i++;
			}
			$query .= ')';
		}
		if($where != null){
			$query .= " and ".key($where)."=".$where[key($where)];
		}
		
		
		if($where_clause != null){
			$query .= " and (".$where_clause.")";
		}

		if(isset($_POST['order']))
        {
			$query .= " order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
        }
        else if(isset($order))
        {
			$query .= " order by ".key($order)." ".$order[key($order)];
        }
		if(isset($_POST['length'])) {
			if($_POST['length'] != -1)
				$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query;
		$result = $this->db->query($query);
		return $result->result();
		exit; 
		
    }

    function count_filtered($table,$column,$order,$table2 = null ,$field_name = null,$field_name2 = null,$table3 = null,$field_name3 = null,$field_name4 = null,$table4 = null,$field_name5 = null,$field_name6 = null,$where = null,$where_clause = null,$select = '*',$table5 = null,$field_name7 = null,$field_name8 = null,$table6 = null,$field_name9 = null,$field_name10 = null,$select_query = null)
    {
       // $this->get_datatables2($table,$column,$order,$table2 = null,$field_name = null,$table3 = null,$field_name2 = null,$table4 = null,$field_name3 = null);
	   
		if($select_query != null) {
			$query = $select_query;
		} else if($select == null) {
			$query = "select * from ".$table." ";
		} else {
			$query = "select ".$select." from ".$table." ";
		}
		if($table2 != null && $field_name != null) {
			$query .= " LEFT JOIN ".$table2." ON ".$table2.".".$field_name."=".$table.".".$field_name2;
		}
		if($table3 != null && $field_name3 != null) {
			$query .= " LEFT JOIN ".$table3." ON ".$table3.".".$field_name3."=".$table.".".$field_name4;
		}
		if($table4 != null && $field_name5 != null) {
			$query .= " LEFT JOIN ".$table4." ON ".$table4.".".$field_name5."=".$table.".".$field_name6;
		}
		if($table5 != null && $field_name7 != null) {
			$query .= " LEFT JOIN ".$table5." ON ".$table5.".".$field_name7."=".$table.".".$field_name8;
		}
		if($table6 != null && $field_name9 != null) {
			$query .= " LEFT JOIN ".$table6." ON ".$table6.".".$field_name9."=".$table.".".$field_name10;
		}
		$query .= " where 1 ";
		
		if(!empty($_POST['search']) && !empty($_POST['search']['value'])){
			$i = 0;
			$query .= ' and (';
			foreach ($column as $item)
			{
				if($_POST['search']['value']){
					if ($i > 0)
						$query .= " or ";
					$query .= " ". $item." LIKE '%".$_POST['search']['value']."%' ";
				}
				//$column[$i] = $item;
				$i++;
			}
			$query .= ')';
		}
		if($where != null){
			$query .= " and ".key($where)."=".$where[key($where)];
		}
		
		
		if($where_clause != null){
			$query .= " and (".$where_clause.")";
		}
		
		if(isset($_POST['order']))
        {
			$query .= " order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
        }
        else if(isset($order))
        {
			$query .= " order by ".key($order)." ".$order[key($order)];
        }
		/*if(isset($_POST['length'])) {
			if($_POST['length'] != -1)
				$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}*/
		$result = $this->db->query($query);
        return $result->num_rows();
    }

    public function count_all($table,$column,$order,$table2 = null ,$field_name = null,$field_name2 = null,$table3 = null,$field_name3 = null,$field_name4 = null,$table4 = null,$field_name5 = null,$field_name6 = null,$where = null,$where_clause = null,$select = '*',$table5 = null,$field_name7 = null,$field_name8 = null,$table6 = null,$field_name9 = null,$field_name10 = null,$select_query = null)
    {
        if($select_query != null) {
			$query = $select_query;
		} else if($select == null) {
			$query = "select * from ".$table." ";
		} else {
			$query = "select ".$select." from ".$table." ";
		}
		if($table2 != null && $field_name != null) {
			$query .= " LEFT JOIN ".$table2." ON ".$table2.".".$field_name."=".$table.".".$field_name2;
		}
		if($table3 != null && $field_name3 != null) {
			$query .= " LEFT JOIN ".$table3." ON ".$table3.".".$field_name3."=".$table.".".$field_name4;
		}
		if($table4 != null && $field_name5 != null) {
			$query .= " LEFT JOIN ".$table4." ON ".$table4.".".$field_name5."=".$table.".".$field_name6;
		}
		if($table5 != null && $field_name7 != null) {
			$query .= " LEFT JOIN ".$table5." ON ".$table5.".".$field_name7."=".$table.".".$field_name8;
		}
		if($table6 != null && $field_name9 != null) {
			$query .= " LEFT JOIN ".$table6." ON ".$table6.".".$field_name9."=".$table.".".$field_name10;
		}
		$query .= " where 1 ";
		
		if(!empty($_POST['search']) && !empty($_POST['search']['value'])){
			$i = 0;
			$query .= ' and (';
			foreach ($column as $item)
			{
				if($_POST['search']['value']){
					if ($i > 0)
						$query .= " or ";
					$query .= " ". $item." LIKE '%".$_POST['search']['value']."%' ";
				}
				//$column[$i] = $item;
				$i++;
			}
			$query .= ')';
		}
		if($where != null){
			$query .= " and ".key($where)."=".$where[key($where)];
		}
		
		if($where_clause != null){
			$query .= " and (".$where_clause.")";
		}
		
		$result = $this->db->query($query);
        $result = $result->result();
		return count($result);
    }
}
