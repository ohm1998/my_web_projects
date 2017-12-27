<?php 

class teacher extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		ob_start();
		$this->load->model('login_model','lm');
	}
	public function student_form()
	{
		$this->load->view('teacher/student_add');
	}
	public function student_add()
	{
		$post = array();
		$n = count($_POST['SNAME']);
		$i=0;
		while($i < $n)
		{
			$post[$i]['SNAME']=$_POST['SNAME'][$i];
			$post[$i]['SPASS']=$_POST['SPASS'][$i];
			$i++;
		}
		$this->load->model('teacher_model','tm');
		$this->tm->student_insert($post);
		$this->load->view('teacher_view');
	}
	public function attendance()
	{	
		$this->load->model('teacher_model','tm');
		$query=$this->tm->get_stud_details();
		$query2 = $this->tm->get_sub_details();
		$i=0;
		foreach($query2 as $row)
		{
			$s[$i]=$row['SUBID'];
			$i++;
		}
		//print_r($s);
		$sub_list = $this->tm->get_sub_names($s);
		$data['sub']=$sub_list;
		//print_r($data);
		$data['data']=$query;
		$this->load->view('teacher/attendance',$data);
	}
	public function att_write()
	{
		//print_r($_POST);
		$this->load->model('teacher_model','tm');
		$this->tm->get_students($_POST);
		$this->attendance();
	}
}


 ?>