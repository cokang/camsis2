<?php
class Userverification_ctrl extends CI_Controller{

function woresponse_verification(){
	$this->load->model('loginModel');
	$query = $this->loginModel->validate();
	if($query)
	{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['name'] = $this->input->post('name');
		$data['datetimereq'] = explode(' ',$data['disp'][0]->D_date);
		$data['timereq'] = explode(':',$data['datetimereq'][1]);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response_update",$data);
	}
	else{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['datetimereq'] = explode(' ',$data['disp'][0]->D_date);
		$data['timereq'] = explode(':',$data['datetimereq'][1]);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response_update",$data);
	}	
}
function wojobclose_verification(){
	$this->load->model('loginModel');
	$query = $this->loginModel->validate();
	if($query)
	{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$data['name'] = $this->input->post('name');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['record'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		$data['recordppm'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		//$data['P1personal'] = explode('-',$data['record'][0]->userr);
		$data['P1personal'] = isset($data['record'][0]->userr) ? explode('-',$data['record'][0]->userr) : "";
		$data['PPPMpersonal'] = isset($data['recordppm'][0]->userr) ? explode('-',$data['recordppm'][0]->userr) : "";

		if (substr($data['wrk_ord'],0,2) == 'PP'){
			$data['recordv1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
			$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
			$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
			$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
			if (isset($data['recordppm'][0]->v_Wrkordno)){
				$data['jctime'] = explode(':',$data['recordppm'][0]->v_time);
				if (isset($data['recordppm'][0]->d_pfsdate)){
					$data['pfsdate'] = explode(' ',$data['recordppm'][0]->d_pfsdate);
					$data['pfstime'] = explode(':',$data['pfsdate'][1]);
				}
				if (isset($data['recordppm'][0]->d_pfedate)){
					$data['pfedate'] = explode(' ',$data['recordppm'][0]->d_pfedate);
					$data['pfetime'] = explode(':',$data['pfedate'][1]);
				}
			}
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("content_job_update",$data);
		}
		else{
			$data['recordv1'] = $this->display_model->visit1_tab($data['wrk_ord']);
			$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
			$data['d_date'] = $data['disp'][0]->D_date;
			$data['d_time'] = $data['disp'][0]->D_time;
			$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));

			if (isset($data['record'][0]->v_Wrkordno)){
				$data['jctime'] = explode(':',$data['record'][0]->v_time);
				$data['pfsdate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfsdate) : '';
				$data['pfstime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfsdate'][1]) : '';
				$data['pfedate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfedate) : '';
				$data['pfetime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfedate'][1]) : '';
			}
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_workorder_jobclose_update",$data);
		}
	}
	else{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['record'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		$data['recordppm'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		//$data['P1personal'] = explode('-',$data['record'][0]->userr);
		$data['P1personal'] = isset($data['record'][0]->userr) ? explode('-',$data['record'][0]->userr) : "";
		$data['PPPMpersonal'] = isset($data['recordppm'][0]->userr) ? explode('-',$data['recordppm'][0]->userr) : "";

		if (substr($data['wrk_ord'],0,2) == 'PP'){
			$data['recordv1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
			$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
			$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
			$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
			if (isset($data['recordppm'][0]->v_Wrkordno)){
				$data['jctime'] = explode(':',$data['recordppm'][0]->v_time);
				if (isset($data['recordppm'][0]->d_pfsdate)){
					$data['pfsdate'] = explode(' ',$data['recordppm'][0]->d_pfsdate);
					$data['pfstime'] = explode(':',$data['pfsdate'][1]);
				}
				if (isset($data['recordppm'][0]->d_pfedate)){
					$data['pfedate'] = explode(' ',$data['recordppm'][0]->d_pfedate);
					$data['pfetime'] = explode(':',$data['pfedate'][1]);
				}
			}
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("content_job_update",$data);
		}
		else{
			$data['recordv1'] = $this->display_model->visit1_tab($data['wrk_ord']);
			$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
			$data['d_date'] = $data['disp'][0]->D_date;
			$data['d_time'] = $data['disp'][0]->D_time;
			$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));

			if (isset($data['record'][0]->v_Wrkordno)){
				$data['jctime'] = explode(':',$data['record'][0]->v_time);
				$data['pfsdate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfsdate) : '';
				$data['pfstime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfsdate'][1]) : '';
				$data['pfedate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfedate) : '';
				$data['pfetime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfedate'][1]) : '';
			}
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_workorder_jobclose_update",$data);
		}
	}	
}
function stocktake_verification(){
	$this->load->model('loginModel');
	$query = $this->loginModel->validate();
	if($query)
	{
		$data['id'] = $this->input->post('id');
		$data['qty'] = $this->input->post('qty');
		$data['n'] = $this->input->post('n');
		$data['p'] = $this->input->post('p');
		$data['act'] = $this->input->post('act');
		$data['store'] = $this->input->post('store');
		$data['name'] = $this->input->post('name');
		//echo $data['name'];
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_pop_ustore_c",$data);
	}
	else{
		$data['id'] = $this->input->post('id');
		$data['qty'] = $this->input->post('qty');
		$data['n'] = $this->input->post('n');
		$data['p'] = $this->input->post('p');
		$data['act'] = $this->input->post('act');
		$data['store'] = $this->input->post('store');
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_pop_ustore_c",$data);
	}

}
}
?>