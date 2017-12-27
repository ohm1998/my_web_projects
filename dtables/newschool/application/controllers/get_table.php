<?php 

class get_table extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		ob_start();
		$this->load->model('datatables','person',true);
		$this->load->model('query','db_query',true);
	}
	public function get_all()
	{
		$column = array('stud_attend.DATEADDED','stud_attend.SID','student.SNAME','stud_attend.ATTDATE','stud_attend.ATTEND');
		$order = array('stud_attend.SID' => 'asc');
		$where_clause = 'stud_attend.SUBID='.$_POST['SUBID'];
		$lists =$this->person->get_datatables2('stud_attend',$column,$order,'student','SID','SID',null,null,null,null,null,null,null,$where_clause);
		$data = array();
		$no = 0;
		foreach($lists as $list)
		{
			$no++;
			$row = array();
			$row[]=$list->DATEADDED;
			$row[]=$list->SID;
			$row[]=$list->SNAME;
			$row[]=$list->ATTDATE;
			$row[]=$list->ATTEND;
			$data[] = $row;
		}
		//print_r($lists);
		$output = array(
				'draw' => $_POST['draw'],
				'recordsTotal' => /*count($lists),*/$this->person->count_all('stud_attend',$column,$order,'student','SID','SID',null,null,null,null,null,null,null,$where_clause),
				'recordsFiltered' => $this->person->count_filtered('stud_attend',$column,$order,'student','SID','SID',null,null,null,null,null,null,null,$where_clause),
				'data' => $data
		);
		echo json_encode($output); 
	}
}

 ?>