<?php

class Customize_search_ctrl extends CI_Controller{
	
	function index(){
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
    $this->form_validation->set_rules('n_base','Service Code','trim');
	$this->form_validation->set_rules('fromMonth','Period Month','trim');
	$this->form_validation->set_rules('fromYear','Period Year','trim');
	$this->form_validation->set_rules('n_monthly','Monthly Revenue','trim|required');
	//$this->form_validation->set_rules('v_IndicatorNo[]','Indicator No','trim|required');
	$this->form_validation->set_rules('n_indicatorval[]','Current Month Value','trim|required');
	$this->form_validation->set_rules('n_parameter[]','Parameter Value','trim|required');
	$this->form_validation->set_rules('n_demerit[]','Demerit Point Value','trim|required');

	/*$this->form_validation->set_rules('n_indicatorval1','Indicator 1 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval2','Indicator 2 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval3','Indicator 3 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval4','Indicator 4 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval5','Indicator 5 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval6','Indicator 6 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval7','Indicator 7 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval8','Indicator 8 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval9','Indicator 9 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval10','Indicator 10 Value','trim|required');
	$this->form_validation->set_rules('n_indicatorval11','Indicator 11 Value','trim|required');*/

	/*$this->form_validation->set_rules('n_parameter1','Parameter 1 Value','trim|required');
	$this->form_validation->set_rules('n_parameter2','Parameter 2 Value','trim|required');
	$this->form_validation->set_rules('n_parameter3','Parameter 3 Value','trim|required');
	$this->form_validation->set_rules('n_parameter4','Parameter 4 Value','trim|required');
	$this->form_validation->set_rules('n_parameter5','Parameter 5 Value','trim|required');
	$this->form_validation->set_rules('n_parameter6','Parameter 6 Value','trim|required');
	$this->form_validation->set_rules('n_parameter7','Parameter 7 Value','trim|required');
	$this->form_validation->set_rules('n_parameter8','Parameter 8 Value','trim|required');
	$this->form_validation->set_rules('n_parameter9','Parameter 9 Value','trim|required');
	$this->form_validation->set_rules('n_parameter10','Parameter 10 Value','trim|required');
	$this->form_validation->set_rules('n_parameter11','Parameter 11 Value','trim|required');*/

	/*$this->form_validation->set_rules('n_demerit1','Demerit Point 1 Value','trim|required');
	$this->form_validation->set_rules('n_demerit2','Demerit Point 2 Value','trim|required');
	$this->form_validation->set_rules('n_demerit3','Demerit Point 3 Value','trim|required');
	$this->form_validation->set_rules('n_demerit4','Demerit Point 4 Value','trim|required');
	$this->form_validation->set_rules('n_demerit5','Demerit Point 5 Value','trim|required');
	$this->form_validation->set_rules('n_demerit6','Demerit Point 6 Value','trim|required');
	$this->form_validation->set_rules('n_demerit7','Demerit Point 7 Value','trim|required');
	$this->form_validation->set_rules('n_demerit8','Demerit Point 8 Value','trim|required');
	$this->form_validation->set_rules('n_demerit9','Demerit Point 9 Value','trim|required');
	$this->form_validation->set_rules('n_demerit10','Demerit Point 10 Value','trim|required');
	$this->form_validation->set_rules('n_demerit11','Demerit Point 11 Value','trim|required');*/

if($this->form_validation->run()==FALSE)
		{
			//echo 'false';
			//exit();
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromMonth']) && isset($_POST['fromYear']) ? $data['pdate'] = date("Y-m-d",strtotime("-1 months", strtotime($_POST['fromYear'].'-'.$_POST['fromMonth'].'-01'))) : $data['pdate'] = date("Y-m-d", strtotime("-1 months", strtotime($data['year'].'-'.$data['month'].'-01')));
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];
		
		$this->load->model('display_model');
		$data['keyindicator'] = $this->display_model->keyindicator($data['s_code'],$data['fmonth'],$data['fyear']);
		if (!$data['keyindicator']){
			$data['keyindlist'] = $this->display_model->keyindlist($data['s_code']);
		}
		$data['prev'] = $this->display_model->keyindicator($data['s_code'],date('m',strtotime($data['pdate'])),date('Y',strtotime($data['pdate'])));
		//$this ->load->view("headprinter");
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_acg",$data);
		
		
		
		
		}
		
		else
		{
			//echo 'true';
			//exit();
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromMonth']) && isset($_POST['fromYear']) ? $data['pdate'] = date("Y-m-d",strtotime("-1 months", strtotime($_POST['fromYear'].'-'.$_POST['fromMonth'].'-01'))) : $data['pdate'] = date("Y-m-d", strtotime("-1 months", strtotime($data['year'].'-'.$data['month'].'-01')));
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];
		
		$this->load->model('display_model');
		$data['keyindlist'] = $this->display_model->keyindlist($data['s_code']);
		$data['prev'] = $this->display_model->keyindicator($data['s_code'],date('m',strtotime($data['pdate'])),date('Y',strtotime($data['pdate'])));
		$this ->load->view("headprinter");
		$this ->load->view("Content_acg_confirm",$data);
		}
	}
	function confirmation(){
		
	$service_code = $this->input->post('n_base');
	$month = $this->input->post('fromMonth');
	$year = $this->input->post('fromYear');
	$v_IndicatorNo = $this->input->post('v_IndicatorNo');
	$n_indicatorval = $this->input->post('n_indicatorval');
	$n_parameter = $this->input->post('n_parameter');
	$n_demerit = $this->input->post('n_demerit');
	
	//print_r($v_IndicatorNo);
	
	//echo 'masuk saved';
	//exit();
	
	$this->load->model('insert_model');
	$this->insert_model->cs_exist('v_Month',$month,'v_Year',$year,'v_ServiceCode',$service_code,$v_IndicatorNo,$n_indicatorval,$n_parameter,$n_demerit);
	redirect('contentcontroller/acg');
	}
}
?>