<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sowr_joint_inspection extends CI_Controller {
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
   		$this->load->model("get_model");
		$data['dept'] = $this->get_model->get_poploclistb();
		$data['count'] = count($data['dept']);
	  	$data['tabber'] = ($this->input->get('work-a') <> 0) ? $this->input->get('work-a') : '0';	
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");	
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

		$data['SWRJI'] = $this->get_model->SWRJI_period();
		foreach ($data['SWRJI'] as $r){
    		$data['sn'] = explode('-',$r->Scheduler_Name);
    		$data['deptcode'][] = $data['sn'][0];
    		$data['schdata'][] = array('dept'=>$data['sn'][0],
    								   'Occurs'=>$r->Occurs,
    								   //'Daily_freq_time_1'=>$r->Daily_freq_time_1,
											 'Daily_freq_time_1'=>$r->Monthly_days,
    								   'Duration_start_date'=>$r->Duration_start_date,
    								   'Duration_end_date'=>$r->Duration_end_date
    								   );
    	}
    	if (isset($data['schdata'])){
    	foreach ($data['schdata'] as $schdata){
    		$beginday = date('Y-m-d',strtotime($schdata['Duration_start_date']));
    		$lastday  = isset($schdata['Duration_end_date']) ? date('Y-m-d',strtotime($schdata['Duration_end_date'])) : NULL;
    		$begin = strtotime($beginday);
    			
    		$lastday = is_null($lastday) ? date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-01')) : $lastday;
			$end   = strtotime($lastday);
			$begining = strtotime(date('Y',$begin).'-'.date('m',$begin).'-01');
			$ending = strtotime(date('Y-m-t',$end));
    			while ($begining < $ending){
    				if (date('m',$begining) == $data['month'] AND date('Y',$begining) == $data['year']){
    					$data['time'][$schdata['dept']] = $schdata['Daily_freq_time_1'];
    				}
    				$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
    			}
    				if (isset($data['time'])) {
	    				if (date('Y',strtotime($beginday)) < $data['year']){
							if (array_key_exists($schdata['dept'],$data['time'])){
							$data['time'] = $data['time'];
							}
							else{
									$data['time'][$schdata['dept']] = NULL;
								}
						}
						elseif (date('Y',strtotime($beginday)) == $data['year']){
							if(date('m',strtotime($beginday)) <= $data['month']){
								if (array_key_exists($schdata['dept'],$data['time'])){
								$data['time'] = $data['time'];
								}
								else{
									$data['time'][$schdata['dept']] = NULL;
								}
							}
							else{
								$data['time'][$schdata['dept']] = NULL;
							}
						}
						else{
							$data['time'][$schdata['dept']] = NULL;
						}
					}
					else{
						$data['time'][$schdata['dept']] = NULL;
					}
    	}
    	foreach ($data['schdata'] as $sd){
			foreach ($data['time'] as $key=>$val){
				if ($key == $sd['dept']){
			$data['datedept'][] = array('dept'=>$sd['dept'],
		    							'time'=>$val);
				}
			}
		}
    	} 
		$this ->load->view("headprinter");
		$this ->load->view("content_sowr_joint_inspection", $data);
   	}	
}