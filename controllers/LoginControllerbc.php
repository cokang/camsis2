<?php 

class LoginController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->helper(array('form','html','url','html'));
	
		
	}
	
	 public function index(){
            $this->load->view('Login');
			$this->load->view('head');
	}
	
	
	function logout()
 	{
 		
  	$this->session->sess_destroy();
  	$this->index();
	}
	
	function validate_credentials()
	{ 
		$this->load->model('loginModel');
		$query = $this->loginModel->validate();
		if($query)
		{
		echo("masuk");
	exit();
			$data = array
				('v_UserName'=>$this->input->post('v_UserName'),
				
				'is_logged_in'=>TRUE,);
			$this->session->set_userdata($data);
		
			
			
		//-------separate---------//
			
		$query2 = $this->loginModel->validate2();
		if($query2)
		
		{
		echo("masuk2");
	exit();	
		//$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
		$url =site_url('contentcontroller/select?continue='.$this->input->post('continue'));
		//echo $url;
		//exit ();
			redirect($url, 'refresh');	
			
		}
		
		
		/*$query3 = $this->loginModel->validate3();
		if($query3)
		{	 
			redirect('contentcontroller/select_two');
			
		}*/
		
		else
		{
			$url =  site_url('contentcontroller/Modulas');
			redirect($url, 'refresh');
			
		}
		
		}
		else
		{
			
			$this->index();
		}
	
	}
	
	function signup()
		{
			
			$this->load->view('signup_form');
			
		}
		
	
		function create_member()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password2','Password Confirmation','trim|required|matches[password]');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->signup();	
		}
		
		else
		{
		$this->load->model('loginModel');
		if($query = $this->loginModel->create_member())
		{
			
			
			$this->load->view('signup_successful');
		}
		else
		{
			
			$this->load->view('signup_form');
			
		}
		}
	}
	
}
?>