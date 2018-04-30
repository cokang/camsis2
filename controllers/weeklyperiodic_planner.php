<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class weeklyperiodic_planner extends CI_Controller {
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
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");	
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['privilege'] = $this->get_model->monthplanpriv($this->session->userdata('v_UserName'));
		$data['records'] = $this->get_model->weekplan($data['year'],$data['month']);
		
		if(isset($data['records'])){
			foreach ($data['records'] as $r){
				if ($r->Color_Code == 'icon-green'){
                   	$color = 'class="icon-green"';
                }
                else{
                	$color = "";
                }
				$data['day'][$r->Day.$r->Dept_Code] = $r->Work_Code;
				$data['color'][$r->Day.$r->Dept_Code] = $color;
			}
		}
		
		$this ->load->view("headprinter");
		$this ->load->view("content_weeklyperiodic_planner", $data);
   	}	
}
/*$data['PWMP'] = $this->get_model->PWMP_period();
    	foreach ($data['PWMP'] as $r){
    		$data['sn'] = explode('-',$r->Scheduler_Name);
    		$data['deptcode'][] = $data['sn'][0];
    		$data['schdata'][] = array('dept'=>$data['sn'][0],
    								   'Occurs'=>$r->Occurs,
    								   'Monthly_days'=>$r->Monthly_days,
    								   'Duration_start_date'=>$r->Duration_start_date,
    								   'Duration_end_date'=>$r->Duration_end_date
    								   );
    	}
    	//print_r($data['schdata']);

    	if (isset($data['schdata'])){
    	foreach ($data['schdata'] as $schdata){
    		$beginday = date('Y-m-d',strtotime($schdata['Duration_start_date']));
    		$lastday  = isset($schdata['Duration_end_date']) ? date('Y-m-d',strtotime($schdata['Duration_end_date'])) : NULL;

    		if ($schdata['Occurs'] == 'Weekly'){
    			$begin = strtotime($beginday);
    			$lastday = is_null($lastday) ? date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-01')) : $lastday;
    			$end   = strtotime($lastday);
				$begining = strtotime(date('Y',$begin).'-'.date('m',$begin).'-01');
				$ending = strtotime(date('Y-m-t',$end));
    			
    			while ($begining < $ending){
    				if (date('m',$begining) == $data['month'] AND date('Y',$begining) == $data['year']){
    					//echo $schdata['dept'].'<br>';
    					$data['days'][$schdata['dept']] = explode(',',$schdata['Monthly_days']);
    				}
    				$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
    			}
    			//print_r($data['days']);
    			//echo '<br>';
    				if (isset($data['days'])) { 
	    				if (date('Y',strtotime($beginday)) < $data['year']){
							if (array_key_exists($schdata['dept'],$data['days'])){
							$data['days'] = $data['days'];
							}
							else{
									$data['days'][$schdata['dept']][] = NULL;
								}
						}
						elseif (date('Y',strtotime($beginday)) == $data['year']){
							if(date('m',strtotime($beginday)) <= $data['month']){
								if (array_key_exists($schdata['dept'],$data['days'])){
								$data['days'] = $data['days'];
								}
								else{
									$data['days'][$schdata['dept']][] = NULL;
								}
							}
							else{
								$data['days'][$schdata['dept']][] = NULL;
							}
						}
						else{
							$data['days'][$schdata['dept']][] = NULL;
						}
					}
					else{
						$data['days'][$schdata['dept']][] = NULL;
					}
    		}
    		else{
    			$data['days'][$schdata['dept']][] = NULL;
    		}
    	}
//print_r($data['days']);
    	foreach ($data['schdata'] as $sd){
			foreach ($data['days'] as $key=>$val){
				if ($key == $sd['dept']){
			$data['datedept'][] = array('dept'=>$sd['dept'],
		    							'day'=>$val);
				}
			}
		}
		//print_r($data['datedept']);
		foreach ($data['datedept'] as $dd){
			//print_r($dd);
			//echo '<br>';
	    	foreach ($dd['day'] as $d){
		    	if ($d == 'Monday'){
		    		$data['Monday'][$dd['dept']] = $d;
		    	}
		    	if ($d == 'Tuesday'){
		    		$data['Tuesday'][$dd['dept']] = $d;
		    	}
		    	if ($d == 'Wednesday'){
		    		$data['Wednesday'][$dd['dept']] = $d;
		    	}
		    	if ($d == 'Thursday'){
		    		$data['Thursday'][$dd['dept']] = $d;
		    	}
		    	if ($d == 'Friday'){
		    		$data['Friday'][$dd['dept']] = $d;
		    	}
		    	if ($d == 'Saturday'){
		    		$data['Saturday'][$dd['dept']] = $d;
		    	}
		    	if ($d == 'Sunday'){
		    		$data['Sunday'][$dd['dept']] = $d;
		    	}
	    	}
	    }
    	}*/