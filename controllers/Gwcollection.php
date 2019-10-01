<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gwcollection extends CI_Controller {
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
    								   'Daily_FreqOccurs'=>$r->Daily_FreqOccurs,
    								   'Daily_Freq'=>$r->Daily_Freq,
    								   'Daily_freq_time_1'=>$r->Daily_freq_time_1,
    								   'Daily_freq_time_2'=>$r->Daily_freq_time_2,
    								   'Daily_freq_time'=>$r->Daily_freq_time,
    								   'Duration_start_date'=>$r->Duration_start_date,
    								   'Duration_end_date'=>$r->Duration_end_date
    								   );
    	}
    	//print_r($data['schdata']);
    	if (isset($data['schdata'])){
    	foreach ($data['schdata'] as $schdata){
    		$beginday = date('Y-m-d',strtotime($schdata['Duration_start_date']));
    		$lastday  = isset($schdata['Duration_end_date']) ? date('Y-m-d',strtotime($schdata['Duration_end_date'])) : NULL;

    		if ($schdata['Daily_FreqOccurs'] == 2){
    			$begin = strtotime($beginday);
    			$lastday = is_null($lastday) ? date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-01')) : $lastday;
				$end   = strtotime($lastday);
				$begining = strtotime(date('Y',$begin).'-'.date('m',$begin).'-01');
				$ending = strtotime(date('Y-m-t',$end));
    			
    			$Stime = strtotime($schdata['Daily_freq_time_1']);
    			$Etime = strtotime($schdata['Daily_freq_time_2']);

    			if ($schdata['Daily_freq_time'] == 'Hour'){
    				while ($begining < $ending){
	    				if (date('m',$begining) == $data['month'] AND date('Y',$begining) == $data['year']){
	    					//echo $schdata['dept'].'<br>';
	    					$step = $schdata['Daily_Freq'] * 60 * 60;
		    				$loop = 0;
		    				while ($Stime <= $Etime){
			    				if ($loop <= 4){
				    				//echo $schdata['dept'].'<br>';
				    				$data['timesch'][$schdata['dept']][] = date('h:i A',$Stime);
			    				}
		    				$Stime = strtotime(date('H:i:s',$Stime + $step));
		    				$loop++;
		    				}
	    				}
	    				$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
    				}
    			}
    			else{
    				while ($begining < $ending){
	    				if (date('m',$begining) == $data['month'] AND date('Y',$begining) == $data['year']){
	    					$step = $schdata['Daily_Freq'] * 60;
		    				$loop = 0;
		    				while ($Stime <= $Etime){
			    				if ($loop <= 4){
				    				//echo $schdata['dept'].'<br>';
				    				$data['timesch'][$schdata['dept']][] = date('h:i A',$Stime);
			    				}
		    				$Stime = strtotime(date('H:i:s',$Stime + $step));
		    				$loop++;
		    				}
	    				}
	    				$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
    				}
    			}
    		}
    		else{
    		$begin = strtotime($beginday);
    		$lastday = is_null($lastday) ? date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-01')) : $lastday;
			$end   = strtotime($lastday);
			$begining = strtotime(date('Y',$begin).'-'.date('m',$begin).'-01');
			$ending = strtotime(date('Y-m-t',$end));
				while ($begining < $ending){
					if (date('m',$begining) == $data['month'] AND date('Y',$begining) == $data['year']){
	    				$data['timesch'][$schdata['dept']][] = date('h:i A',strtotime($schdata['Daily_freq_time_1']));;
	    			}
	    			$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
	    		}
	    	}
	    	if (isset($data['timesch'])) {
    			if (date('Y',strtotime($beginday)) < $data['year']){
					if (array_key_exists($schdata['dept'],$data['timesch'])){
					$data['timesch'] = $data['timesch'];
					}
					else{
							$data['timesch'][$schdata['dept']][] = NULL;
						}
				}
				elseif (date('Y',strtotime($beginday)) == $data['year']){
					if(date('m',strtotime($beginday)) <= $data['month']){
						if (array_key_exists($schdata['dept'],$data['timesch'])){
						$data['timesch'] = $data['timesch'];
						}
						else{
							$data['timesch'][$schdata['dept']][] = NULL;
						}
					}
					else{
						$data['timesch'][$schdata['dept']][] = NULL;
					}
				}
				else{
					$data['timesch'][$schdata['dept']][] = NULL;
				}
			}
			else{
				$data['timesch'][$schdata['dept']][] = NULL;
			}
    	}
    	//print_r($data['timesch']);
	    	//echo '<br>';
    	foreach ($data['schdata'] as $sd){
			foreach ($data['timesch'] as $key=>$val){
				if ($key == $sd['dept']){
			$data['datedept'][] = array('dept'=>$sd['dept'],
		    							'timesch'=>$val);
				}
			}
		}
		foreach ($data['datedept'] as $dd){
			//echo $dd['dept'].count($dd['timesch']).'<br>';
			if (count($dd['timesch']) == 1){
	    		$data['S1'][$dd['dept']] = $dd['timesch'][0];
	    	}
	    	if (count($dd['timesch']) == 2){
	    		$data['S1'][$dd['dept']] = $dd['timesch'][0];
	    		$data['E1'][$dd['dept']] = $dd['timesch'][1];
	    	}
	    	if (count($dd['timesch']) == 3){
	    		$data['S1'][$dd['dept']] = $dd['timesch'][0];
	    		$data['E1'][$dd['dept']] = $dd['timesch'][1];
	    		$data['S2'][$dd['dept']] = $dd['timesch'][1];
	    		$data['E2'][$dd['dept']] = $dd['timesch'][2];
	    	}
	    	if (count($dd['timesch']) == 4){
	    		$data['S1'][$dd['dept']] = $dd['timesch'][0];
	    		$data['E1'][$dd['dept']] = $dd['timesch'][1];
	    		$data['S2'][$dd['dept']] = $dd['timesch'][1];
	    		$data['E2'][$dd['dept']] = $dd['timesch'][2];
	    		$data['S3'][$dd['dept']] = $dd['timesch'][2];
	    		$data['E3'][$dd['dept']] = $dd['timesch'][3];
	    	}
	    	if (count($dd['timesch']) == 5){
	    		$data['S1'][$dd['dept']] = $dd['timesch'][0];
	    		$data['E1'][$dd['dept']] = $dd['timesch'][1];
	    		$data['S2'][$dd['dept']] = $dd['timesch'][1];
	    		$data['E2'][$dd['dept']] = $dd['timesch'][2];
	    		$data['S3'][$dd['dept']] = $dd['timesch'][2];
	    		$data['E3'][$dd['dept']] = $dd['timesch'][3];
	    		$data['S4'][$dd['dept']] = $dd['timesch'][3];
	    		$data['E4'][$dd['dept']] = $dd['timesch'][4];
	    	}
	    }
	    //print_r($data['S1']);
	    //print_r($data['E1']);
    	}
    	//print_r($data['datedept']);
		$this ->load->view("headprinter");
		$this ->load->view("content_gwcollection",$data);
   	}	
}