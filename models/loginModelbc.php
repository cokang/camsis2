<?php

 class LoginModel extends CI_Model{
		
	function validate()
	{
		
	
		$this->db->where('v_userid', $this->input->post('v_UserName'));
		$this->db->where('v_password',md5($this->input->post('v_password')));
		$query = $this->db->get('pmis2_sa_user');
	
		//echo $this->input->post('username') . $this->input->post('password');
		//exit;
		if( $query->num_rows() ==1)
		{
			return TRUE;
		}
	}	
		
		function validate3()
	{
		
		$this->db->select('v_servicecode');
		$this->db->where('v_userid', $this->session->userdata('v_UserName'));
		
		$query = $this->db->get('pmis2_sa_userservice');
		
		
		
		
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
		
		$this->db->select('v_servicecode');
		$this->db->where('v_userid', $this->input->post('v_UserName'));
		
		$query = $this->db->get('pmis2_sa_userservice');
		
		//echo $this->db->last_query();
		
		//exit();
	
		if( $query->num_rows() ==3 || $query->num_rows() ==2)
		{
			return TRUE;
		}
		
	}
	
	
	
	
	
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
 }
 
?>