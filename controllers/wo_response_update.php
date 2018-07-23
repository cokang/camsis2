<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wo_response_update extends CI_Controller {

	public function index() 
	{
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$this->load->model('get_model');
		
		$data['time'] = $this->get_model->response_update();
		$time1 = strtotime($data['time'][0]->D_date);
    	$time2 = strtotime($data['time'][0]->d_Date);
    	$diff = $time2-$time1;
    	$tt = $diff / 60;
    	$data['test'] = $tt;
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['record'] = $this->display_model->response_tab($data['wrk_ord']);
		//$data['res_time'] = $this->input->get($min);
		if (isset($data['record'][0]->v_WrkOrdNo) == TRUE){
        $data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		}
    	$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response",$data);
	}
}