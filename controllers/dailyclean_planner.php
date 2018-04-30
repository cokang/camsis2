<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dailyclean_planner extends CI_Controller {
	function __construct(){
	     	parent::__construct();
	//echo 'ade1';
			$this->load->model('loginModel','',TRUE);
	//echo 'ade2';
			$this->load->model('insert_model');
	                //$this->load->model('test_ler');
	//echo 'ade3';
			$this->load->library('session');
	//echo 'ade4';	
			$this->is_logged_in();
	//echo 'ade5';
		
		
	}
	
		function is_logged_in()
	{
		
		$is_logged_in = $this->session->userdata('v_UserName');
		
		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('LoginController/index');
	}
	public function index(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : ($this->input->get('jobdate') != '' ? date("Y",strtotime($this->input->get('jobdate'))) : date("Y"));
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : ($this->input->get('jobdate') != '' ? date("m",strtotime($this->input->get('jobdate'))) : date("m"));
   		$data['dept']=$this->input->get('dept', TRUE);
    	$data['loc']=$this->input->get('loc', TRUE);
    	$this->load->model("get_model");
			$data['namos']=$this->get_model->namo();

        if (($data['month'] == date('m')) AND ($data['year'] == date('Y'))) {
        isset($_GET['jobdate']) ? $data['job_D'] = $_GET['jobdate'] : $data['job_D'] = date("Y-m-d");
        }
        else {
        isset($_GET['jobdate']) ? $data['job_D'] = $_GET['jobdate'] : $data['job_D'] = date("Y-m-d",strtotime($data['year'].'-'.$data['month'].'-01'));    
        }
//echo $data['job_D'];
//exit();
    	$data['records']=$this->get_model->dcap_planner($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
    	if (!$data['records']){
    		$data['checkrec']=$this->get_model->checkdcap($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
    		//print_r($data['checkrec']);
    		//echo '<br>';
            //exit();
    		foreach ($data['checkrec'] as $row){
    		$data['records']=$this->get_model->dcap_planner($row->Dept_Code,$row->Loc_Code,$row->Month_Year,$row->Job_Date,$row->hospital_code);
    		}
    		//print_r($data['records']);
    	}
//print_r($data['records']);
    	if(isset($data['records'])){
    		foreach ($data['records'] as $r){
    			$f=$r->Time;
    			if ($r->Color_Code == 'icon-green'){
    				$color = 'class="icon-green"';
    			}
    			elseif ($r->Color_Code == 'icon-yellow'){
    				$color = 'class="icon-yellow"';
    			}
    			elseif ($r->Color_Code == 'icon-red'){
    				$color = 'class="icon-red"';
    			}
    			else{
    				$color = '';
    			}
    			$data['time'][$r->Time.$r->Job_Items] = $color;
    		}
    	}
		$this ->load->view("headprinter");
		$this ->load->view("content_dailyclean_planner", $data);
   	}	
}