<?php

 class LoginModel extends CI_Model{
		
	function validate()
	{
		
	//echo $this->input->post('name');
	//exit();
		$this->db->where('v_userid', $this->input->post('name'));
		$this->db->where('v_password',md5($this->input->post('password')));
		$query = $this->db->get('pmis2_sa_user');
	

		//$this->db->select('saU.v_UserID,saU.v_password,i.file_name');
		//$this->db->from('pmis2_sa_user saU');
		//$this->db->join('pmis2_sa_user_image i', 'saU.v_UserID = i.v_UserID');
		//$this->db->where('saU.v_password',md5($this->input->post('password')));
		//$this->db->where('saU.v_userid', $this->input->post('name'));
		//$this->db->where('i.file_name', $this-);
		//$query = $this->db->get();
		
// echo $this->db->last_query();
// exit();

		//echo $this->input->post('username') . $this->input->post('password');
		//exit;
		if( $query->num_rows() ==1)
		{

			return TRUE;
		}
	}	
	
	
		function validate3()
	{
		
		$this->db->select('a.v_servicecode, b.service_name');
		$this->db->join('pmis2_sa_service b','a.v_servicecode = b.service_code');
		$this->db->where('a.v_userid', $this->session->userdata('v_UserName'));
		
		$query = $this->db->get('pmis2_sa_userservice a');
		
		
		
		
		/*foreach ($query->result() as $row)
		{
   			 echo $row->v_servicecode;
   			 
		}*/
		
		//echo $this->db->last_query();
		
		//echo $row[0];
		 //exit();
	
	return $query->result();
	
		/*if( $query->num_rows ==3 || $query->num_rows ==2 )
		{
			return TRUE;
		}*/
		
	}
	
	function validate2()
	{
		// echo "<pre>";var_export($this->input->post());echo "<br>this->input->post('v_UserName')=".$this->input->post('v_UserName')."<br><br>";
		$this->db->select('v_servicecode');
		$this->db->where('v_userid', $this->input->post('v_UserName'));
		
		$query = $this->db->get('pmis2_sa_userservice');
		
		// echo $this->db->last_query();
		
		// exit();
	
		//if( $query->num_rows ==3 || $query->num_rows ==2)
		if( $query->num_rows() > 1 )
		{
			return TRUE;
		}
		
	}
	
	function validate4()
	{
		
		$this->db->select('datediff(now(), a.v_sec_dt) AS dayer, b.valid_period',false) ;
		$this->db->where('v_userid', $this->session->userdata('v_UserName'));
		$this->db->join('pmis2_sa_passvalidity b','a.v_hospitalcode = b.hosp');
		$query = $this->db->get('pmis2_sa_user a');
		
		//echo $this->db->last_query();
		
		//exit();
	
		return $query->result();
		
	}
	
	function matchpass(){
		$this->db->where('v_userid', $this->input->post('username'));
		$this->db->where('v_password',md5($this->input->post('opassword')));
		$query = $this->db->get('pmis2_sa_user');
		if( $query->num_rows() ==1)
		{
			return TRUE;
		}
	}	
		
	function accessr($wser){
	  $this->db->select("path", FALSE);
		$this->db->where('service = ', $wser);
		$this->db->where('user_id = ', $this->session->userdata('v_UserName'));
		//$this->db->where('v_password',md5($this->input->post('opassword')));
		$query = $this->db->get('access_service');
		return $query->result();
		//echo $this->db->last_query();
		/*
		if($query->num_rows == 1)
		{
			return TRUE;
		}
		*/
	}
	
	function changpasswrd($username, $npassword) {

 	
 $this->db->set('v_password',md5($npassword));
 $this->db->set('d_timestamp',date('Y-m-d H:i:s'));
 $this->db->set('v_sec_dt',date('Y-m-d H:i:s'));
 $this->db->where('v_userid', $username);
 $this->db->update('pmis2_sa_user');
  return $this->db->affected_rows() > 0; }
	
	function create_member()
	{
		
		$new_member_insert_data = array(
		
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'email'=>$this->input->post('email'),
		'username'=>$this->input->post('username'),
		'password'=>md5($this->input->post('password'))
		
		);
		
		$insert = $this->db->insert('membership',$new_member_insert_data);
		return $insert;
	}
	
	function servicename($servicecd){
		$this->db->select('service_name', FALSE);
		$this->db->where('service_code = ', $servicecd);
		//$this->db->where('v_password',md5($this->input->post('opassword')));
		$query = $this->db->get('pmis2_sa_service');
		return $query->result();
	}	
	
	function personaldet(){
		$this->db->select('a.v_UserID,a.v_UserName,a.v_GroupID,b.v_PersonalCode,b.v_PersonalName,b.v_PersonalSerCode,b.v_designation');
		$this->db->from('pmis2_sa_user a');
		$this->db->join('pmis2_sa_personal b','a.v_UserID = b.v_PersonalDesc','LEFT OUTER');
		$this->db->where('a.v_UserID',$this->session->userdata('v_UserName'));
		$query = $this->db->get();
		return $query->result();
	}


	function validateAP()
	{
	    $this->db->select('*');
		$this->db->from("pmis2_sa_userhospital uh");
		$this->db->join("pmis2_sa_hospital sh", "uh.v_hospitalcode=sh.v_HospitalCode","left");
		$this->db->where('uh.v_userid', $this->session->userdata('v_UserName'));
		$query = $this->db->get();
		return $query->result();		
	}


	
	
 }
 
?>