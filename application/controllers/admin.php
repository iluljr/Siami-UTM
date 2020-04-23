<?php  
class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') !=1){
			redirect('auth');
		}
		$this->load->model('model_log');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->view("admin/dashboard");
	}
}
?>
