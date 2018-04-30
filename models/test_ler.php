<?php
   class test_ler extends CI_Model{
function __construct() {
parent::__construct();
}

function complaint_exist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			
			$query = $this->db->get('pmis2_com_complaintdet');
			
	if($query->num_rows()>0){
				//$this->load->model('update_model');
				
				$insert_data = array(
						'v_Monyr' => $this->input->post('vcm_month').'/'.$this->input->post('vcm_year'),
						'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,
						'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,
						'v_follow_starttime' => $this->input->post('n_starttime'),
						'v_follow_endtime' => $this->input->post('n_endtime'),
						'v_Remark' => $this->input->post('n_actiontaken'),
						'v_PersonnelCode' => $this->input->post('n_personnel_code'),
						'd_Timestamp' => date('Y-m-d H:i:s'),
						'v_ActionFlag' => 'U',
						);
				//$this->update_model->complaintdet_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}		
			

}

function insert_image($image){
	$this->db->insert('pmis2_sa_user_image', $image);
}
function upload($image,$value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			
			$query = $this->db->get('pmis2_sa_user_image');
			
			if($query->num_rows()>0){

				$this->load->model('update_model');
				$this->update_model->update_image($image);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				
				//$this->load->model('insert_model');
				$image['v_UserID'] = $this->session->userdata('v_UserName');
				$this->insert_model->insert_image($image);
				//echo $this->db->last_query();
				//exit();
			}

}


}
?>