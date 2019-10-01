<?php

class Job_scheduler_ctrl extends CI_Controller{
	
	function index(){
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
	$this->form_validation->set_rules('n_occur','Occur','trim');
	$this->form_validation->set_rules('n_monthly','Monthly','trim');
	$this->form_validation->set_rules('no_dayD','Day Number','trim');
	$this->form_validation->set_rules('no_dayW','Day Number','trim');
	$this->form_validation->set_rules('no_dayM','Day Number','trim');
	$this->form_validation->set_rules('no_month1','Month Number','trim');
	$this->form_validation->set_rules('no_month2','Month2 Number','trim');
	$this->form_validation->set_rules('monthnum','Month Day Number','trim');
	$this->form_validation->set_rules('monthday','Month Day','trim');
	$this->form_validation->set_rules('n_daily_occur','Daily Freq Occur','trim');
	$this->form_validation->set_rules('n_freq_time','Freq Time','trim');
	$this->form_validation->set_rules('n_freq_time1','Start Time','trim');
	$this->form_validation->set_rules('n_freq_time2','End Time','trim');
	$this->form_validation->set_rules('daily_freq','Daily Freq','trim');
	$this->form_validation->set_rules('dailytime','Daily Time','trim');
	$this->form_validation->set_rules('duration_Sdate','Start Date','trim');
	$this->form_validation->set_rules('duration_stat','Duration Status','trim');
	$this->form_validation->set_rules('duration_Edate','End Date','trim');
	$this->form_validation->set_rules('Wdays1','Week Day1','trim');
	$this->form_validation->set_rules('Wdays2','Week Day2','trim');
	$this->form_validation->set_rules('Wdays3','Week Day3','trim');
	$this->form_validation->set_rules('Wdays4','Week Day4','trim');
	$this->form_validation->set_rules('Wdays5','Week Day5','trim');
	$this->form_validation->set_rules('Wdays6','Week Day6','trim');
	$this->form_validation->set_rules('Wdays7','Week Day7','trim');
	
	if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("content_job_schedule");
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("content_job_schedule_c");
		}
	}
	function confirmation(){

	if ($this->input->post('p')=='SWRJI'){
		$loct = explode('-',$this->input->post('loct'));
		$Scheduler_Name = $loct[0].'-'.$this->input->post('p');
	}
	else{
		$Scheduler_Name = $this->input->post('loct').'-'.$this->input->post('p');
	}

	if ($this->input->post('n_occur')=='Daily'){
		$monthly_num = $this->input->post('no_dayD');
		$monthly_day = NULL;
		$monthly_months = NULL;
		$monthly_sel = NULL;
	}
	elseif($this->input->post('n_occur')=='Weekly'){
		$monthly_num = $this->input->post('no_dayW');
			
			($this->input->post('Wdays1')) ? $m_day[] = $this->input->post('Wdays1') : '';
			($this->input->post('Wdays2')) ? $m_day[] = $this->input->post('Wdays2') : ''; 
			($this->input->post('Wdays3')) ? $m_day[] = $this->input->post('Wdays3') : '';
			($this->input->post('Wdays4')) ? $m_day[] = $this->input->post('Wdays4') : '';
			($this->input->post('Wdays5')) ? $m_day[] = $this->input->post('Wdays5') : '';
			($this->input->post('Wdays6')) ? $m_day[] = $this->input->post('Wdays6') : '';
			($this->input->post('Wdays7')) ? $m_day[] = $this->input->post('Wdays7') : '';

		$monthly_day = (isset($m_day[0]) ? $m_day[0] : '').(isset($m_day[1]) ? ','.$m_day[1] : '').(isset($m_day[2]) ? ','.$m_day[2] : '').
					   (isset($m_day[3]) ? ','.$m_day[3] : '').(isset($m_day[4]) ? ','.$m_day[4] : '').(isset($m_day[5]) ? ','.$m_day[5] : '').
					   (isset($m_day[6]) ? ','.$m_day[6] : '');

		$monthly_months = NULL;
		$monthly_sel = NULL;
	}		
	else{
		$monthly_sel = $this->input->post('n_monthly');
		if ($monthly_sel == 1){

			$monthly_num = $this->input->post('no_dayM');
			$monthly_months = $this->input->post('no_month1');
			$monthly_day = NULL;
		}
		else{
			$monthly_num = $this->input->post('monthnum');
			$monthly_months = $this->input->post('no_month2');
			$monthly_day = $this->input->post('monthday');
		}
	}

	if ($this->input->post('n_daily_occur') == 1){
		$dailyfreqtime = $this->input->post('n_freq_time');
		$dailytime = NULL;
	}
	else{ 
		$dailyfreqtime = $this->input->post('n_freq_time1');
		$dailytime = $this->input->post('dailytime');
	}
	
	$this->load->model('insert_model');
	$wrk_ord_test = $this->insert_model->jc_exist('Scheduler_Name',$Scheduler_Name,$monthly_sel,$monthly_num,$monthly_months,$monthly_day,$dailyfreqtime,$dailytime);
	redirect('contentcontroller/p_Schduler?loct='.$this->input->post('loct'));
	}

}
?>