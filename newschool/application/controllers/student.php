<?php 

class student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		ob_start();
		$this->load->model('student_model','sm');
	}
	public function show_attd()
	{
		$query=$this->sm->get_attd_details();
		$data['post']=$query['query'];
		$data['dates']=$query['dates'];
		$data['data']=$data;
		$this->load->view('student/attendance_view',$data);
	}
}

 ?>