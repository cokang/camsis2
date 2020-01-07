<?php
class wo_personnelinvolved_update_ctrl extends CI_Controller{

	function __construct(){
     	parent::__construct();
		$this->is_logged_in();
	}

	function is_logged_in()
	{

		$is_logged_in = $this->session->userdata('v_UserName');

		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('logincontroller/index');
	}

	public function index(){

		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
        $this->load->library('form_validation');
        $this->load->model('display_model');
        $data['wrk_ord'] = $this->input->post('wrk_ord');
        $data['rpersonnel'] = $this->display_model->response_tab($data['wrk_ord']);
        $q_hour1 =  (int)($this->input->post('v_hour1')/60);
        $q_hour2 =  (int)($this->input->post('v_hour2')/60);
        $q_hour3 =  (int)($this->input->post('v_hour3')/60);
        $r_hour1 = $this->input->post('v_hour1')%60;
        $r_hour2 = $this->input->post('v_hour2')%60;
        $r_hour3 = $this->input->post('v_hour3')%60;
        $data['hour_deci1']= $q_hour1.'.'.$r_hour1;
        $data['hour_deci2']= $q_hour2.'.'.$r_hour2;
        $data['hour_deci3']= $q_hour3.'.'.$r_hour3;
        
        $V_Hour[0]= $data['hour_deci1'];
        $V_Hour[1]= $data['hour_deci2'];
        $V_Hour[2]= $data['hour_deci3'];
        $V_Rate[0]= $this->input->post('v_rate1');
        $V_Rate[1]= $this->input->post('v_rate2');
        $V_Rate[2]= $this->input->post('v_rate3');
    
	for($x=0,$i=1;$x<3;$x++){
        
        $v_hour[$x]=number_format((float)$V_Hour[$x], 2, '.', '');
        $rate[$x]=$V_Rate[$x];
        $time[$x]= explode('.',$v_hour[$x]);
        $hour[$x]= $time[$x][0];
        $minute[$x]= $time[$x][1];
        $workinghour[$x]= (($hour[$x]*60)+$minute[$x]);
        $data['total'.$i++]= number_format((float)$workinghour[$x]/60*$rate[$x], 2, '.', '');
        //echo $workinghour[$x];
       
    }

			$this->load->view("head");
			$this->load->view("left");
			$this->load->view("Content_workorder_personnelinvolved_confirm", $data);

}

	function confirmation(){

	$RN = $this->input->post('wrk_ord');
   
    //echo $RN; exit();


	$this->load->model('insert_model');

	//$wrk_ord_test = $this->insert_model->visitplus_woexist('v_WrkOrdNo',$RN,'n_Visit',$visit);
	$wrk_ord_test = $this->insert_model->personnelinvolved_exist($RN);

	redirect('contentcontroller/personnelinvolved?wrk_ord='.$RN. '&wo=2');

}
}
?>
