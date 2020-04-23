<?php  
class auth extends CI_Controller
{
	
	public function index()
	{
		$this->load->view("template/auth_header");
		$this->load->view("auth/login");
		$this->load->view("template/auth_footer");
	}
	public function ceklog(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->load->model('model_log');
		$this->model_log->ver($username,$password);
	}
	public function regis()
	{
		$this->load->view("template/auth_header");
		$this->load->view("auth/regis");
		$this->load->view("template/auth_footer");
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
?>