<?php 
class ajax extends CI_Controller
{
	public function index()
	{
		$this->load->model('ajax_model','am');
		$data=$this->am->display();
		//print_r($data);
		$pass = array('data' => $data);
		$this->load->view('ajax_view',$pass);
	}
	public function write()
	{
		$this->load->model('ajax_model','am');
		$service = $_POST['service'];
		$nservice = count($_POST['service']);	
			if($nservice==1)
			{
				$entry = $service[0];
			}
			else
			{
				$entry = "";
				for ($i=0; $i < ($nservice-1) ; $i++) 
				{
					$entry = $entry.$service[$i].",";	
				}
				$entry = $entry.$service[$i];
			}
		$_POST['service']=$entry;
		//print_r($_POST);
		$this->am->write($_POST);
	}
	public function get_data()
	{
		$this->load->model('ajax_model','am');
		$table=$this->am->send_table();
		$table = json_encode($table);
		echo $table;
	}
	public function deleteall()
	{
		$this->load->model('ajax_model','am');
		$this->am->delete_table();
	}
	public function del_sel()
	{
		//print_r($_POST['cbnames']);
		$this->load->model('ajax_model','am');
		$abc=$this->am->del_sel($_POST['cbnames']);
		echo $abc;
	}
}

?>