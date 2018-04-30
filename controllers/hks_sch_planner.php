<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hks_sch_planner extends CI_Controller {
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
				//echo "jhsajdkas".$data['dept'];
        $this->load->model("get_model");
				$data['nmdept']=$this->get_model->get_deptnm($data['dept']);
        $data['location'] = $this->get_model->get_poploclistax($data['dept']);

        if (($data['month'] == date('m')) AND ($data['year'] == date('Y'))) {
        isset($_GET['jobdate']) ? $data['job_D'] = date("Y-m-d",strtotime($_GET['jobdate'])) : $data['job_D'] = date("Y-m-d");
        }
        else {
        isset($_GET['jobdate']) ? $data['job_D'] = date("Y-m-d",strtotime($_GET['jobdate'])) : $data['job_D'] = date("Y-m-d",strtotime($data['year'].'-'.$data['month'].'-01'));    
        }

       $data['records']=$this->get_model->dcap_planner($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
        if (!$data['records']){
            $data['checkrec']=$this->get_model->checkdcap($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
            foreach ($data['checkrec'] as $row){
                $data['records']=$this->get_model->dcap_planner($row->Dept_Code,$row->Loc_Code,$row->Month_Year,$row->Job_Date,$row->hospital_code);
            }
            //print_r($data['records']);
        }

        if($data['records']){
            foreach ($data['records'] as $listdcap){
                if ($listdcap->Time == '7-8' OR $listdcap->Time == '8-9' OR $listdcap->Time == '9-10'){
                    //$timearray = array('7-8','8-9','9-10');
                    $shift = 'S1A';
                }
                elseif($listdcap->Time == '10-11' OR $listdcap->Time == '11-12' OR $listdcap->Time == '12-13'){
                    //$timearray = array('10-11','11-12','12-13');
                    $shift = 'S1B';
                }
                elseif($listdcap->Time == '13-14' OR $listdcap->Time == '14-15'){
                    //$timearray = array('13-14','14-15');
                    $shift = 'S1C';
                }
                elseif ($listdcap->Time == '15-16' OR $listdcap->Time == '16-17' OR $listdcap->Time == '17-18'){
                    //$timearray = array('15-16','16-17','17-18');
                    $shift = 'S2A';
                }
                elseif($listdcap->Time == '18-19' OR $listdcap->Time == '19-20' OR $listdcap->Time == '20-21'){
                    //$timearray = array('18-19','19-20','20-21');
                    $shift = 'S2B';
                }
                elseif($listdcap->Time == '21-22' OR $listdcap->Time == '22-23'){
                    //$timearray = array('21-22','22-23');
                    $shift = 'S2C';
                }
                elseif ($listdcap->Time == '23-24' OR $listdcap->Time == '0-1' OR $listdcap->Time == '1-2'){
                    //$timearray = array('23-24','0-1','1-2');
                    $shift = 'S3A';
                }
                elseif($listdcap->Time == '2-3' OR $listdcap->Time == '3-4' OR $listdcap->Time == '4-5'){
                    //$timearray = array('2-3','3-4','4-5');
                    $shift = 'S3B';
                }
                elseif($listdcap->Time == '5-6' OR $listdcap->Time == '6-7'){
                    //$timearray = array('5-6','6-7');
                    $shift = 'S3C';
                }

                $data['shift'][$shift.$listdcap->Job_Items] = 'class="'.$listdcap->Color_Code.'"';

            }
        }
        
        $data['recdca']=$this->get_model->dca_planner($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));

        if ($data['recdca']){
            foreach ($data['recdca'] as $listdca){
                $data['shift'][$listdca->Shift.$listdca->Job_Items] = 'class="'.$listdca->Color_Code.'"';
            }
        }

        //if ($this->session->userdata('v_UserName') == 'nora') {
            /*$data['records']=$this->get_model->dca_planner($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
            //print_r($data['records']);
            //exit();
            if (!$data['records']){
                $data['checkrec']=$this->get_model->checkdca($data['dept'],$data['loc'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
                foreach ($data['checkrec'] as $row){
                $data['urecords']=$this->get_model->dca_planner($row->Dept_Code,$row->Loc_Code,$row->Month_Year,$row->Job_Date,$row->hospital_code);
                }
                //print_r($data['records']);
            }
            if(isset($data['records'])){
                foreach ($data['records'] as $r){
                    //$f=$r->Shift;
                    if ($r->Loc_Code == $data['loc']){
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
                    }
                    else{
                        $color = 'class="icon-green"';
                    }
                    $data['shift'][$r->Shift.$r->Job_Items] = $color;
                }
            }
            if(isset($data['urecords'])){
                foreach ($data['urecords'] as $uhks){
                    if ($uhks->Color_Code == ''){
                        $color = '';
                    }
                    else{
                    $color = 'class="icon-green"';
                    }
                    $data['shift'][$uhks->Shift.$uhks->Job_Items] = $color;
                }
            }*/

            $data['recordjic']=$this->get_model->jic_planner($data['dept'],$data['month'].$data['year'],$data['job_D'],$this->session->userdata('hosp_code'));
            $data['recordjicW1']=$this->get_model->jic_plannerweek($data['dept'],$data['month'].$data['year'],'W1',$this->session->userdata('hosp_code'));
            $data['recordjicW3']=$this->get_model->jic_plannerweek($data['dept'],$data['month'].$data['year'],'W3',$this->session->userdata('hosp_code'));
            //print_r($data['recordjic']);
            //echo '<br><br>';
            //print_r($data['recordjicW1']);
            //echo '<br><br>';
            //print_r($data['recordjicW3']);
            //exit();
            if ($data['recordjic']){
                if ($data['recordjicW1']){
                    foreach ($data['location'] as $loc){
                        $data['jic']['Floor'.$loc->V_location_code.'W1'] = 3;
                        $data['jic']['Wall Door'.$loc->V_location_code.'W1'] = 3;
                        $data['jic']['Ceiling'.$loc->V_location_code.'W1'] = 3;
                        $data['jic']['Windows'.$loc->V_location_code.'W1'] = 3;
                        $data['jic']['Fixtures'.$loc->V_location_code.'W1'] = 3;
                        $data['jic']['Furniture Fitting'.$loc->V_location_code.'W1'] = 3;
                    }

                    $data['rateW1'] = count($data['location']) * 6;
                    $data['rate1W1'] = 0;
                    $data['rate2W1'] = 0;
                    $data['rate3W1'] = 0;
                    $data['rate4W1'] = 0;
                    $data['rate5W1'] = 0;
                    $data['rateoW1'] = 0;
                    foreach ($data['recordjicW1'] as $row){
                        $data['jic'][$row->Job_Items.$row->Loc_Code.'W1'] = $row->Num_Code;

                        if ($row->Num_Code == '1') {
                            $data['rate1W1'] += 1;
                        }
                        elseif ($row->Num_Code == '2') {
                            $data['rate2W1'] += 1;
                        }
                        elseif ($row->Num_Code == '3') {
                            $data['rate3W1'] += 1;
                        }
                        elseif ($row->Num_Code == '4') {
                            $data['rate4W1'] += 1;
                        }
                        elseif ($row->Num_Code == '5') {
                            $data['rate5W1'] += 1;
                        }
                        else{
                            $data['rateoW1'] += 1;
                        }

                    }

                    $data['rateW1'] = $data['rateW1'] - $data['rateoW1'];
                    $data['rate3W1'] = $data['rateW1'] - ($data['rate1W1'] + $data['rate2W1'] + $data['rate4W1'] + $data['rate5W1']);
                    
                    $data['unsatisfactoryW1'] = $data['rate1W1'];
                    $data['satisfactoryW1'] = $data['rate2W1'] + $data['rate3W1'] + $data['rate4W1'];
                    $data['napplicableW1'] = $data['rate5W1'];

                }

                if ($data['recordjicW3']){
                    foreach ($data['location'] as $loc){
                        $data['jic']['Floor'.$loc->V_location_code.'W3'] = 3;
                        $data['jic']['Wall Door'.$loc->V_location_code.'W3'] = 3;
                        $data['jic']['Ceiling'.$loc->V_location_code.'W3'] = 3;
                        $data['jic']['Windows'.$loc->V_location_code.'W3'] = 3;
                        $data['jic']['Fixtures'.$loc->V_location_code.'W3'] = 3;
                        $data['jic']['Furniture Fitting'.$loc->V_location_code.'W3'] = 3;
                    }

                    $data['rateW3'] = count($data['location']) * 6;
                    $data['rate1W3'] = 0;
                    $data['rate2W3'] = 0;
                    $data['rate3W3'] = 0;
                    $data['rate4W3'] = 0;
                    $data['rate5W3'] = 0;
                    $data['rateoW3'] = 0;
                    foreach ($data['recordjicW3'] as $row){
                        $data['jic'][$row->Job_Items.$row->Loc_Code.'W3'] = $row->Num_Code;

                        if ($row->Num_Code == '1') {
                            $data['rate1W3'] += 1;
                        }
                        elseif ($row->Num_Code == '2') {
                            $data['rate2W3'] += 1;
                        }
                        elseif ($row->Num_Code == '3') {
                            $data['rate3W3'] += 1;
                        }
                        elseif ($row->Num_Code == '4') {
                            $data['rate4W3'] += 1;
                        }
                        elseif ($row->Num_Code == '5') {
                            $data['rate5W3'] += 1;
                        }
                        else{
                            $data['rateoW3'] += 1;
                        }

                    }

                    $data['rateW3'] = $data['rateW3'] - $data['rateoW3'];
                    $data['rate3W3'] = $data['rateW3'] - ($data['rate1W3'] + $data['rate2W3'] + $data['rate4W3'] + $data['rate5W3']);
                    
                    $data['unsatisfactoryW3'] = $data['rate1W3'];
                    $data['satisfactoryW3'] = $data['rate2W3'] + $data['rate3W3'] + $data['rate4W3'];
                    $data['napplicableW3'] = $data['rate5W3'];

                }
            }

            /*if(isset($data['recordjic'])){
                $data['rate1W1'] = 0;
                $data['rate2W1'] = 0;
                $data['rate3W1'] = 0;
                $data['rate4W1'] = 0;
                $data['rate5W1'] = 0;
                $data['rate1W3'] = 0;
                $data['rate2W3'] = 0;
                $data['rate3W3'] = 0;
                $data['rate4W3'] = 0;
                $data['rate5W3'] = 0;
                foreach ($data['recordjic'] as $rjic){
                    if (substr($rjic->ji_no,-8,2) == 'W1'){
                        $data['jic'][$rjic->Job_Items.$rjic->Loc_Code.'W1'] = $rjic->Num_Code;
                        if ($rjic->Num_Code == '1') {
                            $data['rate1W1'] += 1;
                        }
                        elseif ($rjic->Num_Code == '2') {
                            $data['rate2W1'] += 1;
                        }
                        elseif ($rjic->Num_Code == '3') {
                            $data['rate3W1'] += 1;
                        }
                        elseif ($rjic->Num_Code == '4') {
                            $data['rate4W1'] += 1;
                        }
                        elseif ($rjic->Num_Code == '5') {
                            $data['rate5W1'] += 1;
                        }       
                    }
                    else{
                        $data['jic'][$rjic->Job_Items.$rjic->Loc_Code.'W3'] = $rjic->Num_Code;
                        if ($rjic->Num_Code == '1') {
                            $data['rate1W3'] += 1;
                        }
                        elseif ($rjic->Num_Code == '2') {
                            $data['rate2W3'] += 1;
                        }
                        elseif ($rjic->Num_Code == '3') {
                            $data['rate3W3'] += 1;
                        }
                        elseif ($rjic->Num_Code == '4') {
                            $data['rate4W3'] += 1;
                        }
                        elseif ($rjic->Num_Code == '5') {
                            $data['rate5W3'] += 1;
                        } 
                    }
                    
                }
                $data['unsatisfactoryW1'] = $data['rate1W1'];
                $data['satisfactoryW1'] = $data['rate2W1'] + $data['rate3W1'] + $data['rate4W1'];
                $data['napplicableW1'] = $data['rate5W1'];
                $data['unsatisfactoryW3'] = $data['rate1W3'];
                $data['satisfactoryW3'] = $data['rate2W3'] + $data['rate3W3'] + $data['rate4W3'];
                $data['napplicableW3'] = $data['rate5W3'];
            }*/
        //}
        /*else{
            $data['urecords']=$this->get_model->udca_planner($data['dept'],$data['loc'],$data['month'].$data['year']);
            if (!$data['urecords']){
                $data['ucheckrec']=$this->get_model->checkdca($data['dept'],$data['loc'],$data['month'].$data['year']);
                foreach ($data['ucheckrec'] as $row){
                $data['urecords']=$this->get_model->dca_planner($row->Dept_Code,$row->Loc_Code,$row->Month_Year);
                }
                //print_r($data['records']);
            }
            if(isset($data['urecords'])){
                foreach ($data['urecords'] as $r){
                    $f=$r->Shift;
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
                    $data['shift'][$r->Shift.$r->Job_Items] = $color;
                }
            }
        }*/
        $this ->load->view("headprinter");
		if ($this->input->get('pr') == 1 and $this->input->get('none') == 'closed'){
        $this ->load->view("Content_print_dca", $data);
		}elseif($this->input->get('pr') == 2 and $this->input->get('none') == 'closed'){
		$this ->load->view("Content_print_dca2", $data);
		}else{
		$this ->load->view("Content_print_dca", $data);
		$this ->load->view("Content_print_dca2", $data);
		}
   	}	
}