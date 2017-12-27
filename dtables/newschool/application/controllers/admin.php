<?php 

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION)) {
			//echo "SEt";
			session_start();
		}
		ob_start();
	}
	public function teacher_form()
	{
		//$this->am->last_insert_id();
		$this->load->view('admin/teacher_add');
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
		//print_r($post);
		$this->load->model('admin_model','am');
		$this->am->student_insert($post);
		$this->load->view('admin/student_add');
	}
	public function teacher_add()
	{
		$post = array();
		$n = count($_POST['TNAME']);
		$i=0;
		while($i < $n)
		{
			$post[$i]['TNAME']=$_POST['TNAME'][$i];
			$post[$i]['TPASS']=$_POST['TPASS'][$i];
			$i++;
		}
		$this->load->model('admin_model','am');
		$this->am->teacher_insert($post);
		$this->load->view('admin_view');
		//print_r($post);
	}
	public function student_form()
	{
		$this->load->view('admin/student_add');
	}
	public function subject_form()
	{
		$this->load->view('admin/subject_add');
	}
	public function subject_add()
	{
		//print_r($_POST);
		$this->load->model('admin_model','am');
		$this->am->subject_insert($_POST);
		$this->subject_form();
	}
	public function assign_form()
	{
		$this->load->view('admin/assign_form');
	}
	public function teachsub()
	{
		$this->load->model('admin_model','am');
		$this->am->insert_teachsub($_POST);
		$this->assign_form();
	}
	public function view_attend()
	{
		$this->load->view('admin/attend_view');
	}
	public function student_attendance_transfer()
	{
		$this->load->view('admin/attend_student');
	}
	public function sub_attendance_transfer()
	{
		$this->load->model('admin_model','am');
		$query=$this->am->get_sub_list();
		$data['query']=$query;
		$this->load->view('admin/attend_sub',$data);
	}
	public function student_attend()
	{
		$this->load->model('admin_model','am');
		$query=$this->am->get_stud_attend($_POST);
		$data['query']=$query;
		$data['data']=$data;
		$this->load->view('admin/student_attend_view',$data);
	}
	public function sub_attend()
	{
		$this->load->model('admin_model','am');
		//print_r($_POST);
		//echo $_POST['sub_list'];
		$_POST['SUBID']=$_POST['sub_list'];
		unset($_POST['sub_list']);
		$query=$this->am->get_sub_attend($_POST);
		$data['query']=$query;
		$data['data']=$data;
		//print_r($query);
		$this->load->view('admin/subject_attend_view',$data);
	}
	public function dashboard() {
		$this->load->view('admin_view2');	
	}
}


 ?>