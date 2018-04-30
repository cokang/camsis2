<?php
class vo3_general_update_ctrl extends CI_Controller{
	
	public function index(){
		
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_regDate_range','Registration Date Range','trim');
	$this->form_validation->set_rules('n_Report_Status','Report Status','trim');
	$this->form_validation->set_rules('n_Submitted','Submission Date','trim');
	
	if($this->form_validation->run()==FALSE)
		{
		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);
		if (isset($data['records'][0]->vvfReportNo)){
			$data['DateStart'] = date_format(new DateTime($data['records'][0]->vvfDateStart), 'd-m-Y');
			$data['DateEnd'] = date_format(new DateTime($data['records'][0]->vvfDateEnd), 'd-m-Y');
			$data['DatemStart'] = date('m',strtotime($data['DateStart']));
			$data['DateyStart'] = date('y',strtotime($data['DateStart']));
			$data['DatemEnd'] = date('m',strtotime($data['DateEnd']));
			
			if(($data['DatemStart'] > 6) && ($data['DatemEnd'] > 6)){
				$data['Date2Start'] = '01-01-'.date('Y',strtotime($data['DateStart']));
				$data['Date2End'] = '30-06-'.date('Y',strtotime($data['DateEnd']));
				$data['Period'] = 'P1'.$data['DateyStart'];
				$data['Date2year'] =  date('Y',strtotime($data['DateStart']));
			}
			else{
				$data['Date2Start'] = '01-07-'.((date('Y',strtotime($data['DateStart'])))-1);
				$data['Date2End'] = '31-12-'.((date('Y',strtotime($data['DateEnd'])))-1);
				$data['Period'] = 'P2'.sprintf('%02d',($data['DateyStart']-1));
				$data['Date2year'] =  ((date('Y',strtotime($data['DateStart'])))-1);
			}
		}
		}
		
		else
		{
		$data['rpt_no'] = $this->input->post('rpt_no');
		
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);
		
		if (isset($data['records'][0]->vvfReportNo)){
			$data['DateStart'] = date_format(new DateTime($data['records'][0]->vvfDateStart), 'd-m-Y');
			$data['DateEnd'] = date_format(new DateTime($data['records'][0]->vvfDateEnd), 'd-m-Y');
			$data['DatemStart'] = date('m',strtotime($data['DateStart']));
			$data['DateyStart'] = date('y',strtotime($data['DateStart']));
			$data['DatemEnd'] = date('m',strtotime($data['DateEnd']));
			
			if(($data['DatemStart'] > 6) && ($data['DatemEnd'] > 6)){
				$data['Date2Start'] = '01-01-'.date('Y',strtotime($data['DateStart']));
				$data['Date2End'] = '30-06-'.date('Y',strtotime($data['DateEnd']));
				$data['Period'] = 'P1'.$data['DateyStart'];
				$data['Date2year'] =  date('Y',strtotime($data['DateStart']));
			}
			else{
				$data['Date2Start'] = '01-07-'.((date('Y',strtotime($data['DateStart'])))-1);
				$data['Date2End'] = '31-12-'.((date('Y',strtotime($data['DateEnd'])))-1);
				$data['Period'] = 'P2'.sprintf('%02d',($data['DateyStart']-1));
				$data['Date2year'] =  ((date('Y',strtotime($data['DateStart'])))-1);
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_vvf_confirm",$data);
		}

	}

	function confirmation(){
	$RN = $this->input->post('rpt_no');
	$this->load->model('update_model');

	if (strlen($this->input->post('n_Submitted')) == 0) {
		$SubmittedDate = NULL;
	}
	elseif (strlen($this->input->post('n_Submitted')) > 0 AND $this->input->post('n_Report_Status') == 'BO'){
		$SubmittedDate = NULL;
	}
	else{
		$SubmittedDate = date('Y-m-d ', strtotime($this->input->post('n_Submitted')));
	}

	$insert_data = array(
							
						 'vvfReportStatus' => strlen($this->input->post('n_Report_Status')) > 0 ? $this->input->post('n_Report_Status') : NULL,
						 'vvfSubmissionDate' => $SubmittedDate,
						 'vvfActionflag' => 'U',
						 'vvfTimestamp' => date('Y-m-d'),
						);
	$this->update_model->vo3general_form($insert_data);
	redirect('contentcontroller/vo3_vvf?rpt_no='.$RN.'&vo=0');	
	}

}
?>