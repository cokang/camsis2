<?php
    class display_model extends CI_Model
    {
        function list_workorder()
        {
         
            $query = $this->db->get("pmis2_egm_service_request");
            
			$query_result = $query->result();
			return $query_result;
        }
		
		function list_desk()
        {
         
            $query = $this->db->get("pmis2_egm_service_request");
            
			$query_result = $query->result();
			return $query_result;
        }
		
    }
?>