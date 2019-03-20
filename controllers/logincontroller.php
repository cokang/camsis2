<?php

class LoginController extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper(array('form','html','url','html'));
		$this->load->model('loginModel');

	}

	 public function index(){
            $this->load->view('Login');
	}


	function logout()
 	{
	  $this->load->model('insert_model');
 		$this->insert_model->audit_log('logout');
  	$this->session->sess_destroy();
  	$this->index();
	}
/*
	function validate_credentials()
	{
		$this->load->model('loginModel');
		$query = $this->loginModel->validate();
		if($query)
		{
			$data = array
				('v_UserName'=>$this->input->post('name'),
				 //'username'=>$session_data['i.file_name'],
				'hosp_code'=>'pilih',
				'is_logged_in'=>TRUE,);
			$this->session->set_userdata($data);
		//print_r($data);
		//exit();
		$query4 = $this->loginModel->validate4();
		if ($query4[0]->dayer > $query4[0]->valid_period) {
		$url =site_url('logincontroller/index?login=login&pass=exp');
			redirect($url);

		}
		//echo "nilai :".$query4[0]->dayer.$query4[0]->valid_period;
		//exit();

		//-------separate---------//

		$query2 = $this->loginModel->validate2();
		// if($query2)
		if(true)
		{

		$data['kirahospital'] = $this->loginModel->validateAP();
		 $data['service_apa'] = $this->loginModel->validate3();
		//$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
		if (count($data['kirahospital']) > 1){
			$url =site_url('contentcontroller/select');
		}
		elseif (count($data['kirahospital'])== 1){
		 $this->session->set_userdata('hosp_code', $data['kirahospital'][0]->v_hospitalcode);
		  if (count($data['service_apa']) > 1){
	      $url =site_url('contentcontroller/select');
	      }else {
           $url =site_url('contentcontroller/content/'.$data['service_apa'][0]->v_servicecode);
         }

		}
		else {
	    $url =site_url('contentcontroller/select?error=true');
		}

			redirect($url, 'refresh');

		}


		/*$query3 = $this->loginModel->validate3();
		if($query3)
		{
			redirect('contentcontroller/select_two');

		}*/
/*
		else
		{

			$url =site_url('contentcontroller/select?continue='.$this->input->post('continue'));//contentcontroller/content/
			redirect($url, 'refresh');

		}

		}
		else
		{

		  $url =site_url('logincontroller/index?login=login&pass=no');
			redirect($url);
			//echo "return back".$url;
			//exit();
			//$this->index();
		}

	}
*/



	function validate_credentials()
	{
		$this->load->model('loginModel');
		//$query = $this->loginModel->validate();$queryu = $this->loginModel->userdata();
		$queryu = $this->loginModel->userdata();
		$this->load->model('outside_model');
		$query = $this->outside_model->validate();
		$query4 = $this->outside_model->validate4($this->input->post('name'));
		//echo "fcfcfc : ".$query.":".$query4.":".$query4[0]->dayer.":".$query4[0]->valid_period;
		//exit();
		//$passisvalid = "valid";
		if ($query4[0]->dayer > $query4[0]->valid_period) {
			$url =site_url('logincontroller/index?login=login&pass=exp');
			redirect($url);
		//$passisvalid = "invalid";
		//$url =site_url('logincontroller/index?login=login&pass=exp');
		//	redirect($url);

		}
		if($query && $queryu)
		{
			$data = array
					('v_UserName'=>$this->input->post('name'),
					//'username'=>$session_data['i.file_name'],
					'hosp_code'=>'pilih',
					'is_logged_in'=>TRUE,);
			$this->session->set_userdata($data);
			//print_r($data);
			//exit();
//			$query4 = $this->loginModel->validate4();
//			if ($query4[0]->dayer > $query4[0]->valid_period) {
//				$url =site_url('logincontroller/index?login=login&pass=exp');
//				redirect($url);

//			}
			//echo "nilai :".$query4[0]->dayer.$query4[0]->valid_period;
			//exit();

			//-------separate---------//

			$query2 = $this->loginModel->validate2();
			// if($query2)
			if(true)
			{

				$data['kirahospital'] = $this->loginModel->validateAP();
				$data['service_apa'] = $this->loginModel->validate3();
				//echo "lalalalalla : ".print_r($data["kirahospital"]);
				//exit();
				$this->session->set_userdata("total_hosp", count($data["kirahospital"]));
				$this->session->set_userdata("total_service", count($data["service_apa"]));
				//$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
				if (count($data['kirahospital']) > 1){
					$url =site_url('contentcontroller/select');
				}elseif (count($data['kirahospital'])== 1){
					$this->session->set_userdata('hosp_code', $data['kirahospital'][0]->v_hospitalcode);
					$this->session->set_userdata("hosp_name", $data['kirahospital'][0]->v_HospitalName);
					if (count($data['service_apa']) > 1){
						$url =site_url('contentcontroller/select');
					}else {
						$url =site_url('contentcontroller/content/'.$data['service_apa'][0]->v_servicecode);
					}

				}else {
					$url =site_url('contentcontroller/select?error=true');
				}

				redirect($url, 'refresh');

			}


			/*$query3 = $this->loginModel->validate3();
			if($query3)
			{
				redirect('contentcontroller/select_two');

			}*/

			else{
				$url =site_url('contentcontroller/select?continue='.$this->input->post('continue'));//contentcontroller/content/
				redirect($url, 'refresh');
			}
		}else{
		  $url =site_url('logincontroller/index?login=login&pass=no');
			redirect($url);
			//echo "return back".$url;
			//exit();
			//$this->index();
		}
	}


	function signup()
		{

			$this->load->view('signup_form');

		}
	function chgPassword()
    {

	$this->load->library('form_validation');
    $this->form_validation->set_rules('username','User Name','required|trim');
    $this->form_validation->set_rules('opassword','Old Password','required|trim');
    $this->form_validation->set_rules('npassword','New Password','required|trim');
    $this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');

    if ($this->form_validation->run() == FALSE)

    {
    	//echo validation_errors();
    	$sy=validation_errors();
		//echo $sy;
		//echo strrpos($sy,"User").",";
		//echo strrpos($sy,"Old").",";
		//echo strrpos($sy,"New").",";
		if (strrpos($sy,"User") <> 0) {
			echo "<script type='text/javascript'>alert('The User Name field is required..')</script>";
		}

		elseif(strrpos($sy,"Old") <> 0) {
			echo "<script type='text/javascript'>alert('The Old Password field is required.')</script>";
		}

		elseif(strrpos($sy,"New") <> 0)  {
			echo "<script type='text/javascript'>alert('The New Password field is required.')</script>";
			 redirect('logincontroller/index?login=login','refresh') ;
		}

		elseif(strrpos($sy,"Confirm") <> 0)
		{
		echo "<script type='text/javascript'>alert('The Confirm Password field is required.')</script>";
		redirect('logincontroller/index?login=login','refresh') ;
		}
		//}


    //echo "<script type='text/javascript'>alert('".$sy."')</script>";
   //echo "kkajshdj".validation_errors()."gdfdgdg";


    }


    /*	$this->load->library('form_validation');
        $this->form_validation->set_rules('npassword','New Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');

		if($this->form_validation->run() == FALSE){
    	$this->session->set_flashdata('message','<span class="label label-info">Error! Password not changed!</span>');
   		$this->index();
	}*/
		else
	{
		//$this->load->model('loginModel');
			$this->load->model('outside_model');
		//$query1 = $this->loginModel->matchpass();
		$query1 = $this->outside_model->matchpass();
			if($query1){
					$query = $this->outside_model->changpasswrd($this->session->userdata('username'),$this->input->post('npassword'));
		//$query = $this->loginModel->changpasswrd($this->input->post('username'),$this->input->post('npassword'));
    	//$this->session->set_flashdata('message','<span class="label label-info">Password changed!</span>');
    	echo "<script type='text/javascript'>alert('Password updated')</script>";
    	redirect('logincontroller/index?login=login') ;
			}
			else {
				echo "<script type='text/javascript'>alert('Username or Password does not match')</script>";

				redirect('logincontroller','refresh') ;
				//$this->index();
			}
	}


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
