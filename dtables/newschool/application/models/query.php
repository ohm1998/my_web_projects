<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Query extends CI_Model {

	public function index()
	{
		//$this->load->view('welcome_message');
	}
	public function table_insert($table_name,$data)
	{
		if($this->db->insert($table_name,$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function table_select($table_name,$limit = null,$offset = null,$order_column_name = null,$order_by = null)
	{
		if($limit != null && $offset != null)
		{
			$this->db->limit($limit, $offset);
		}
		if($order_column_name != null && $order_by != null)
		{
			$this->db->order_by($order_column_name, $order_by);
		}
		$result = $this->db->get($table_name);
		return $result->result_array();
	}
	public function table_select_where($table_name,$where,$limit = null,$offset = null,$order_column_name = null,$order_by = null)
	{
		if($limit != null && $offset != null)
		{
			$this->db->limit($limit, $offset);
		}
		if($order_column_name != null && $order_by != null)
		{
			$this->db->order_by($order_column_name, $order_by);
		}
		$result = $this->db->get_where($table_name,$where);
		return $result->result_array();
	}
	public function table_select_limit($table_name,$where,$limit = 10,$start = 1)
	{
		$this->db->limit($limit,$start);
		$result = $this->db->get_where($table_name,$where);
		return $result->result_array();
	}
	public function table_select_join($table_name1,$table_name2,$where,$field_name,$limit = null,$start = null,$order_column_name = null,$order_by = null,$select = null)
	{
		if($select == null) {
			$select = '*';
		}
		$this->db->select($select);
		$this->db->from($table_name1);
		$this->db->where($where);
		$this->db->join($table_name2,$table_name2.'.'.$field_name.'='.$table_name1.'.'.$field_name);
		if($limit != null && $offset != null)
		{
			$this->db->limit($limit, $offset);
		}
		if($order_column_name != null && $order_by != null)
		{
			$this->db->order_by($order_column_name, $order_by);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	public function table_select_join2($table_name1,$table_name2,$field_name1,$field_name2,$where= null,$limit = null,$start = null,$order_column_name = null,$order_by = null,$select = null)
	{
		if($select == null) {
			$select = '*';
		}
		$this->db->select($select);
		$this->db->from($table_name1);
		if ($where != null)
		{
			$this->db->where($where);
		}
		$this->db->join($table_name2,$table_name2.'.'.$field_name2.'='.$table_name1.'.'.$field_name1);
		if($limit != null && $offset != null)
		{
			$this->db->limit($limit, $offset);
		}
		if($order_column_name != null && $order_by != null)
		{
			$this->db->order_by($order_column_name, $order_by);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	public function table_update($table_name,$data,$where)
	{
		$this->db->where($where);
		if($this->db->update($table_name,$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function table_delete($table_name,$where)
	{
		if($this->db->delete($table_name,$where))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function table_delete_all($table_name,$field,$ids)
	{
		if($this->db->query("delete from ".$table_name." where ".$field." IN(".$ids.")")) {
			return true;
		} else {
			return false;
		}
	}
	
	public function select_orderby($table_name,$columnname, $order)
	{
		$this->db->order_by($columnname, $order); 
		$result = $this->db->get($table_name);
		return $result->result_array();
	}
	public function select_where_orderby($table_name,$where,$columnname, $order)
	{
		$this->db->order_by($columnname, $order); 
		$result = $this->db->get_where($table_name,$where);
		return $result->result_array();
	}
	public function get_scalar_value($query,$column_name)
	{
		$result = $this->db->query($query);
		$result = $result->result_array();
		if(isset($result[0][$column_name]))
		{
			return $result[0][$column_name];
		}
		return false;
	}
	public function custom_query($query)
	{
		$result = $this->db->query($query);
		$result = $result->result_array();
		return $result;
	}
	public function count_total($column,$where,$table_name)
	{
		/*
			$this->db->like('title', 'match');
			$this->db->from('my_table');
			echo $this->db->count_all_results();
		*/
		$this->db->like($column, $where);
		$this->db->from($table_name);
		$total = $this->db->count_all_results();
		return $total;
	}
	public function time_ago( $date )
	{

		if( empty( $date ) )
		{
		return "No date provided";
		}

		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

		$lengths = array("60","60","24","7","4.35","12","10");

		$now = time();

		$unix_date = strtotime( $date );

		// check validity of date

		if( empty( $unix_date ) )
		{
		return "Bad date";
		}

		// is it future date or past date

		if( $now > $unix_date )
		{
		$difference = $now - $unix_date;
		$tense = "ago";
		}
		else
		{
		$difference = $unix_date - $now;
		$tense = "from now";
		}

		for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
		{
		$difference /= $lengths[$j];
		}

		$difference = round( $difference );

		if( $difference != 1 )
		{
		$periods[$j].= "s";
		}

		return "$difference $periods[$j] {$tense}";

	}
	
	public function convert_number_to_words($number) {

		$hyphen      = ' ';
		$conjunction = ' and ';
		$separator   = ' ';//', ';
		$negative    = 'negative ';
		$decimal     = ' point ';
		$dictionary  = array(
			0                   => 'zero',
			1                   => 'one',
			2                   => 'two',
			3                   => 'three',
			4                   => 'four',
			5                   => 'five',
			6                   => 'six',
			7                   => 'seven',
			8                   => 'eight',
			9                   => 'nine',
			10                  => 'ten',
			11                  => 'eleven',
			12                  => 'twelve',
			13                  => 'thirteen',
			14                  => 'fourteen',
			15                  => 'fifteen',
			16                  => 'sixteen',
			17                  => 'seventeen',
			18                  => 'eighteen',
			19                  => 'nineteen',
			20                  => 'twenty',
			30                  => 'thirty',
			40                  => 'fourty',
			50                  => 'fifty',
			60                  => 'sixty',
			70                  => 'seventy',
			80                  => 'eighty',
			90                  => 'ninety',
			100                 => 'hundred',
			1000                => 'thousand',
			1000000             => 'million',
			1000000000          => 'billion',
			1000000000000       => 'trillion',
			1000000000000000    => 'quadrillion',
			1000000000000000000 => 'quintillion'
		);

		if (!is_numeric($number)) {
			return false;
		}

		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}

		if ($number < 0) {
			return $negative . $this->convert_number_to_words(abs($number));
		}

		$string = $fraction = null;

		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}

		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= $conjunction . $this->convert_number_to_words($remainder);
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= $this->convert_number_to_words($remainder);
				}
				break;
		}

		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}

		return $string;
	}
}
