<?php 

class login extends CI_Controller
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
	public function home()
	{
		$this->load->view('admin_view');
	}
	public function index()
	{	
		$this->load->view('login_view');
	}
	public function check()
	{
		if(isset($_POST))
		{
			$query=$this->lm->check_details($_POST);
			if(!$query)
			{
				$this->load->view('login_error');
			}
			else
			{
				$_SESSION['TYPE']=$query['TYPE'];
				//print_r($query);
				$_SESSION['USERID']=$query['USERID'];
				if($query['TYPE']=='ADMIN')
				{
					$post['USERID']=$_SESSION['USERID'];
					$this->load->model('admin_model','am');
					$query=$this->am->admin_details($post);
					//print_r($query);
					$data['ADMIN_NAME']=$query['ADMIN_NAME'];
					$_SESSION['ADMIN_NAME']=$query['ADMIN_NAME'];
					$data['data']=$data;
					/*$this->load->view('admin_view',$data);*/
					$this->load->view('admin_view',$data);
				}
				else if($query['TYPE']=='STUDENT')
				{
					$post['TNAME']=$_SESSION['USERID'];
					$this->load->model('student_model','sm');
					$query=$this->sm->get_student_details();
					$_SESSION['SID']=$query['SID'];
					$this->load->view('student_view');
				}
				else if($query['TYPE']=='TEACHER')
				{
					$post['TNAME']=$_SESSION['USERID'];
					$this->load->model('teacher_model','tm');
					$query=$this->tm->teacher_details($post);
					$data['TNAME']=$query['TNAME'];
					$_SESSION['TNAME']=$data['TNAME'];
					$_SESSION['TID']=$query['TID'];
					$data['data']=$data;
					$this->load->view('teacher_view',$data);
				}
			}
		}
	}
	public function logout()
	{
		session_destroy();
		$this->index();
	}
}

 ?>