<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function index(){
		$wrk_ord = $this->input->get('wrk_ord');
      	$this->load->model("display_model");
        if (substr($wrk_ord,0,2) == 'PP' || substr($wrk_ord,0,2) == 'RI'){
        $data['records'] = $this->display_model->visit1ppm_tab($wrk_ord);
        }
        else{
		$data['records'] = $this->display_model->visit1_tab($wrk_ord);
        }

		if ($data['records']){
			foreach ($data['records'] as $row){

			$time1 = strtotime($row->v_Time);
    		$time2 = strtotime($row->v_Etime);
			$diff = $time2-$time1;
    		$tc_min = $diff / 60;
			if ($tc_min < 60 ){
    		if ($tc_min == 1){
    		$tc_time = $tc_min. ' minute';
    		$data['time_comp'][$row->n_Visit] = $tc_time;
    		}
    		else{
    		$tc_time = $tc_min. ' minutes';
    		$data['time_comp'][$row->n_Visit] = $tc_time;
    		}
    		}
    		else{
    		$bal_min = ($tc_min%60);
    		$h_min = $tc_min - $bal_min;
    		$hour = $h_min/60;
    		if ($hour == 1 && ($bal_min == 1 || $bal_min == 0)){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minute';
    		$data['time_comp'][$row->n_Visit] = $tc_time;
    		}
    		else if ($hour == 1 && $bal_min > 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minutes';
    		$data['time_comp'][$row->n_Visit] = $tc_time;
    		}
    		else{
    		$tc_time = $hour. ' hours ' .$bal_min. ' minutes';
    		$data['time_comp'][$row->n_Visit] = $tc_time;
    		}
    		}

			$data['visitD'][$row->n_Visit] = date_format(new DateTime($row->d_Date), 'd-m-Y');
			$data['P1time'][$row->n_Visit] = explode(':',$row->n_Hours1);
			$data['P2time'][$row->n_Visit] = explode(':',$row->n_Hours2);
			$data['P3time'][$row->n_Visit] = explode(':',$row->n_Hours3);
			$data['P1personal'][$row->n_Visit] = explode('-',$row->v_Personal1);
			$data['P2personal'][$row->n_Visit] = explode('-',$row->v_Personal2);
			$data['P3personal'][$row->n_Visit] = explode('-',$row->v_Personal3);
			$data['P1Rate'][$row->n_Visit] = number_format($row->n_Rate1,2);
			$data['P2Rate'][$row->n_Visit] = number_format($row->n_Rate2,2);
			$data['P3Rate'][$row->n_Visit] = number_format($row->n_Rate3,2);
			$data['P1Trate'][$row->n_Visit] = number_format($row->n_Total1,2);
			$data['P2Trate'][$row->n_Visit] = number_format($row->n_Total2,2);
			$data['P3Trate'][$row->n_Visit] = number_format($row->n_Total3,2);
			$data['Vendor'][$row->n_Visit] = explode('-',$row->v_Vendor1);
			$data['PartRM'][$row->n_Visit] = number_format($row->n_PartRM,2);
			$data['PartTrate'][$row->n_Visit] = number_format($row->n_PartTotal,2);
			}
		}
		echo json_encode($data);
	}

	public function itemrnt(){

    $this->load->model("get_model");
	$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
	$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
	$data['itemrn'] = $this->get_model->rl_mrin($this->input->get('hosp_code'),$data['year'],$data['month']);
	$i=1;

	//print_r($data['itemrn']);
	foreach($data['itemrn'] as $row){
	echo "<tr>";
	echo "<td>".$i++."</td>";
	echo "<td><input type='hidden' name='itemcode[]' value=".$row->ItemCode.">".$row->ItemCode."</td>";
	echo "<td>".$row->ItemName."</td>";
	echo "<td><input type='hidden' name='mrincode[]' value=".$row->MIRNcode.">".$row->MIRNcode."</td>";
	echo "<td>".$row->QtyReq."</td>";
	echo "<td>".$row->Qtys."</td>";
	echo "<td><input type='text' name='qty[]'></td>";
    echo "</tr>";
	}
	//exit();
	}

	public function get_rep(){
	  $this->load->model("display_model");
	$rep = $this->display_model->rephos($this->input->get('hosp_code'));
     echo $rep[0]->Rep;
	}
}
