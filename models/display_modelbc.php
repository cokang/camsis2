<?php
    class display_model extends CI_Model
    {
		
		 		function dater($which=1, $mon, $yr)
				{
				//echo "func date".$yr.".".$mon.".11";
				//$time = strtotime($yr.".".$mon.".11");
				//return date("Y-m-d", strtotime("+1 month", $time));
				$time = strtotime("09-".$mon."-".$yr);
				if ($which==1) {
				return date("Y-m-d", strtotime("09-".$mon."-".$yr));
				}else{
				//return date("Y-m-d", strtotime("+1 month", $time));
								 if (($which==3) && (date("Y-m-d", strtotime("-1 day",strtotime("+1 month", $time))) > date("Y-m-d"))) {
								 		return date("Y-m-d");
										} else {
										return date("Y-m-d", strtotime("-1 day",strtotime("+1 month", $time)));
										}
				}
				}
				
				
		
		 		function list_workorder()
        {
            $this->db->where('V_servicecode = ',$this->session->userdata('usersess'));
            $query = $this->db->get("pmis2_egm_service_request");
						
            
			$query_result = $query->result();
			return $query_result;
        }
				
				function list_hospinfo()
        {
            $this->db->where('v_hospitalcode = ',$this->session->userdata('hosp_code'));
            $query = $this->db->get("pmis2_sa_hospital");
						
            
			$query_result = $query->result();
			return $query_result;
        }
		
        function list_workorderx($maklumat)
        {
				 		
						//$tabber =  $this->input->get('work-a'); 
        				$this->db->select('s.*,l.v_Location_Name');
        				$this->db->from('pmis2_egm_service_request s');
        				$this->db->join('pmis2_egm_assetlocation l','s.V_Location_code = l.V_location_code AND s.V_hospitalcode = l.V_Hospitalcode');
								//$this->db->join('pmis2_egm_assetlocation l','s.V_Location_code = l.V_location_code AND s.V_hospitalcode = l.V_Hospitalcode', 'left outer');
            			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
						$this->db->where("DATE_FORMAT(s.D_date,'%m') = ",$maklumat['month']);
						$this->db->where("DATE_FORMAT(s.D_date,'%Y') = ",$maklumat['year']);
						$this->db->where('s.V_actionflag <> ','D');
						$this->db->where('l.V_Actionflag <>','D');
            
						switch ($maklumat['tabber']) {
	    				case "1":
							//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A1');
		        		break;
	    				case "2":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A2');
		        		break;
						case "3":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A3');
		        		break;
						case "4":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A4');
		        		break;
						case "5":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A5');
		        		break;
						case "6":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A6');
		        		break;
						case "7":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A7');
		        		break;
						case "8":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A8');
		        		break;
						case "9":
								//echo "masuk1";
		        		$this->db->where('V_request_type = ', 'A9');
		        		break;
		        		case "10":
		        		$this->db->where('V_request_type = ', 'A10');
		       			break;
						case "11":
		        		$this->db->where('V_request_status <> ', 'C');
		       			break;
								
		    				}
						
						
						
						//$query = $this->db->get("pmis2_egm_service_request");
						$query = $this->db->get();
						//echo $this->db->last_query();
						//exit();
						$query_result = $query->result();
						return $query_result;
        }
				
				function list_desk()
        {
            $this->db->where('V_servicecode = ',$this->session->userdata('usersess'));
            $query = $this->db->get("pmis2_egm_service_request");
						
            
			$query_result = $query->result();
			return $query_result;
        }
		
		function list_deskppm($maklumat)
        {
            $this->db->where('a.V_servicecode = ',$this->session->userdata('usersess'));
						$this->db->where("DATE_FORMAT(a.d_DueDt,'%m') = ",$maklumat['month']);
						$this->db->where("DATE_FORMAT(a.d_DueDt,'%Y') = ",$maklumat['year']);
						$this->db->where("a.v_ActionFlag != ","D");
						$this->db->join('pmis2_egm_assetregistration r','a.v_Asset_no = r.V_Asset_no AND a.V_hospitalcode = r.V_Hospitalcode','full');
						switch ($maklumat['ppm']) {
						case "1":
						//echo "masuk1";
        		$this->db->where('a.v_Wrkordstatus = ', 'C');
        		break;
    				case "2":
        		$this->db->where('a.v_Wrkordstatus <> ', 'C');
        		break;
    				}
            $query = $this->db->get("pmis2_egm_schconfirmmon a");
						
            //echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
        }
		
		function request_tab()
		{
			$RN = $this->input->get('wrk_ord');
			
			$this->db->select('IFNULL(g.V_Wrn_end_code,NOW() + INTERVAL 1 DAY) AS V_Wrn_end_code,r.V_Equip_code,r.V_Tag_no,r.V_AssetStatus,r.V_Manufacturer,r.V_Serial_no,r.V_Asset_name,m.v_SafetyTest,s.*,lw.link_wo');
			$this->db->from('pmis2_egm_service_request s');
			
			//$this->db->join('pmis2_egm_assetregistration r','s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode','full');
			//$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo AND r.V_hospitalcode = m.v_Hospitalcode','full'); 
			//$this->db->join('pmis2_egm_assetreg_general g','m.v_AssetNo = g.V_Asset_no AND m.v_Hospitalcode = g.V_Hospital_code','full'); 'left outer'
			
			$this->db->join('pmis2_egm_assetregistration r','s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode','left outer');
			$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo AND r.V_hospitalcode = m.v_Hospitalcode','left outer'); 
			$this->db->join('pmis2_egm_assetreg_general g','m.v_AssetNo = g.V_Asset_no AND m.v_Hospitalcode = g.V_Hospital_code','left outer');
			$this->db->join('pmis2_egm_sharedowntime lw','s.V_Request_no = lw.ori_wo','left');
			$this->db->where('s.V_Request_no',$RN);
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->group_by('s.V_Asset_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function ppm_tab()
		{
			$RN = $this->input->get('wrk_ord');
			
			$this->db->select('g.V_Wrn_end_code,r.V_Equip_code,r.V_Tag_no,r.V_AssetStatus,r.V_Manufacturer,r.V_Serial_no,r.V_Asset_name,m.v_SafetyTest');
			$this->db->from('pmis2_egm_schconfirmmon s');
			
			//$this->db->join('pmis2_egm_assetregistration r','s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode','full');
			//$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo AND r.V_hospitalcode = m.v_Hospitalcode','full'); 
			//$this->db->join('pmis2_egm_assetreg_general g','m.v_AssetNo = g.V_Asset_no AND m.v_Hospitalcode = g.V_Hospital_code','full'); 'left outer'
			
			$this->db->join('pmis2_egm_assetregistration r','s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode','left outer');
			$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo AND r.V_hospitalcode = m.v_Hospitalcode','left outer'); 
			$this->db->join('pmis2_egm_assetreg_general g','m.v_AssetNo = g.V_Asset_no AND m.v_Hospitalcode = g.V_Hospital_code','left outer');
			
			$this->db->where('s.V_wrkordno',$RN);
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->group_by('s.V_Asset_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_display($wrk_ord){
			
			$this->db->where('V_Request_no',$wrk_ord);
			$this->db->where('V_servicecode = ',$this->session->userdata('usersess'));
			$query = $this->db->get("pmis2_egm_service_request");
			
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_complaint($maklumat){
			//print_r($maklumat);
			//echo 'year'.$maklumat[year].'month'.$maklumat[month].'amik'.date("m");
			//echo $maklumat['desk'];
			$this->db->where("DATE_FORMAT(d_ComplaintDt,'%m') = ",$maklumat['month']);
			$this->db->where("DATE_FORMAT(d_ComplaintDt,'%Y') = ",$maklumat['year']);
			$this->db->where("v_ActionFlag != ","D");
			$this->db->where('v_ServiceCode = ',$this->session->userdata('usersess'));
			switch ($maklumat['desk']) {
    case "1":
		//echo "masuk1";
        $this->db->where('v_ComplaintStatus <> ', 'C');
        break;
    case "2":
        $this->db->where('v_ComplaintStatus = ', 'C');
        break;
    		}
			$query = $this->db->get("pmis2_com_complaint");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_agency(){
			$this->db->select('A.v_Agencycode, B.v_Description , A.v_LicenceCategoryDesc, A.v_LicenceCategoryCode ');
			$this->db->from('pmis2_egm_lnc_license_category_code A');
			$this->db->join('pmis2_egm_lnc_statutory_agency_code B','A.v_AgencyCode=B.v_AgencyCode');
			//$this->db->where('A.v_ServiceCode = ',$this->session->userdata('usersess'));
			$this->db->where('A.v_actionflag <> ','D');
			$this->db->where('B.v_actionflag <> ','D');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function response_tab($wrk_ord){
			$this->db->select('s.D_date,s.V_priority_code,j.*');
			$this->db->from('pmis2_emg_jobresponse j');
			$this->db->join('pmis2_egm_service_request s','s.V_Request_no = j.v_WrkOrdNo');
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->where('j.v_WrkOrdNo',$wrk_ord);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function list_personel()
        {
         
            $query = $this->db->get("pmis2_sa_personal");
            
			$query_result = $query->result();
			return $query_result;
        }
        function visit1_tab($wrk_ord){
			$this->db->select('v1.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit1 v1');
			$this->db->join('pmis2_egm_service_request s','s.V_Request_no = v1.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v1.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('v1.v_WrkOrdNo',$wrk_ord);
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->order_by('n_Visit ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit1_utab($wrk_ord,$visit){
			$this->db->select('v1.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit1 v1');
			$this->db->join('pmis2_egm_service_request s','s.V_Request_no = v1.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v1.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('v1.v_WrkOrdNo',$wrk_ord);
			$this->db->where('v1.n_Visit',$visit);
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->order_by('n_Visit ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit1ppm_tab($wrk_ord){
			$this->db->select('v1.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit1 v1');
			$this->db->join('pmis2_egm_schconfirmmon s','s.v_WrkOrdNo = v1.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v1.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('v1.v_WrkOrdNo',$wrk_ord);
			$this->db->where('s.v_ServiceCode = ',$this->session->userdata('usersess'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit1ppm_utab($wrk_ord,$visit){
			$this->db->select('v1.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit1 v1');
			$this->db->join('pmis2_egm_schconfirmmon s','s.v_WrkOrdNo = v1.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v1.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('v1.v_WrkOrdNo',$wrk_ord);
			$this->db->where('v1.n_Visit',$visit);
			$this->db->where('s.v_ServiceCode = ',$this->session->userdata('usersess'));
			$this->db->order_by('n_Visit ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit2_tab($wrk_ord){
			$this->db->select('v2.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit2 v2');
			$this->db->join('pmis2_egm_service_request s','s.V_Request_no = v2.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v2.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->where('v2.v_WrkOrdNo',$wrk_ord);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit2ppm_tab($wrk_ord){
			$this->db->select('v2.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit2 v2');
			$this->db->join('pmis2_egm_schconfirmmon s','s.v_WrkOrdNo = v2.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v2.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('v2.v_WrkOrdNo',$wrk_ord);
			$this->db->where('s.v_ServiceCode = ',$this->session->userdata('usersess'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit3_tab($wrk_ord){
			$this->db->select('v3.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit3 v3');
			$this->db->join('pmis2_egm_service_request s','s.V_Request_no = v3.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v3.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->where('v3.v_WrkOrdNo',$wrk_ord);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function visit3ppm_tab($wrk_ord){
			$this->db->select('v3.*,vt.type_of_work');
			$this->db->from('pmis2_emg_jobvisit3 v3');
			$this->db->join('pmis2_egm_schconfirmmon s','s.v_WrkOrdNo = v3.v_WrkOrdNo');
			$this->db->join('pmis2_emg_jobvisit1tow vt','v3.v_WrkOrdNo = vt.v_WrkOrdNo');
			$this->db->where('v3.v_WrkOrdNo',$wrk_ord);
			$this->db->where('s.v_ServiceCode = ',$this->session->userdata('usersess'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function jobclose_tab($wrk_ord){
			$this->db->select("jc.*, s.closedby, CONCAT(v_PersonalCode,'-',v_PersonalName) as userr", FALSE);
			$this->db->from('pmis2_egm_jobdonedet jc');
			$this->db->join('pmis2_egm_service_request s',"s.V_Request_no = jc.v_Wrkordno AND jc.v_Actionflag <> 'D'");
			$this->db->join('pmis2_sa_personal p','s.closedby = p.v_PersonalCode','left outer');
			$this->db->where("s.V_servicecode = ",$this->session->userdata('usersess'));
			$this->db->where('jc.v_Wrkordno',$wrk_ord);
			$this->db->where('jc.v_Actionflag <> ','D');
			$query = $this->db->get();
			$query_result = $query->result();
			//echo $this->db->last_query();
			//exit();
			return $query_result;
		}
		function jobclose_ppm($wrk_ord){
			$this->db->select("jc.*,s.*, CONCAT(v_PersonalCode,'-',v_PersonalName) as userr", FALSE);
			$this->db->from('pmis2_egm_jobdonedet jc');
			$this->db->join('pmis2_egm_schconfirmmon s','s.v_WrkOrdNo = jc.v_Wrkordno');
			$this->db->join('pmis2_sa_personal p','s.closedby = p.v_PersonalCode','left outer');
			$this->db->where("s.v_ServiceCode = ",$this->session->userdata('usersess'));
			$this->db->where('jc.v_Wrkordno',$wrk_ord);
			$this->db->where('jc.v_Actionflag <> ','D');
			$query = $this->db->get();
			$query_result = $query->result();
			//echo $this->db->last_query();
			//exit();
			return $query_result;
		}
		function wo_ppm($wrk_ord){
			$this->db->select('wp.*,a.*,g.V_Wrn_end_code,m.v_SafetyTest');
			$this->db->from('pmis2_egm_schconfirmmon wp');
			$this->db->join('pmis2_egm_assetregistration a','wp.v_Asset_no = a.V_Asset_no');
			$this->db->join('pmis2_egm_assetreg_general g','wp.V_Asset_no = g.V_Asset_no');
			$this->db->join('pmis2_egm_assetmaintenance m','wp.V_Asset_no = m.v_AssetNo');
			//$this->db->join('pmis2_egm_jobdonedet j','wp.v_WrkOrdNo = j.v_Wrkordno');
			$this->db->where("wp.V_servicecode = ",$this->session->userdata('usersess'));
			$this->db->where("wp.v_WrkOrdNo",$wrk_ord);
      $this->db->where('wp.v_Actionflag <> ', 'D');
			$query = $this->db->get();
			$query_result = $query->result();
			return $query_result;
		}
		function wo_ppmupdate($wrk_ord){
			$this->db->select('*');
			$this->db->from('pmis2_egm_jobdonedet');
			$this->db->where('v_Wrkordno',$wrk_ord);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function woppm_disp($wrk_ord){
			$this->db->where('v_WrkOrdNo',$wrk_ord);
			$this->db->where('V_servicecode = ',$this->session->userdata('usersess'));
			$query = $this->db->get("pmis2_egm_schconfirmmon");
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function searchassettag($srch){
			$this->db->select('R.V_Asset_no, R.V_Asset_name, R.V_Tag_no, R.V_User_Dept_code, R.V_Location_code, R.V_Manufacturer , M.V_Criticality, M.V_AssetCondition, M.v_AssetStatus, R.V_Model_no, R.V_Serial_no, R.V_hospitalcode');
			$this->db->from('pmis2_egm_assetregistration R');
			$this->db->join('pmis2_egm_assetmaintenance M','M.v_AssetNo = R.V_Asset_no AND M.v_Hospitalcode=R.V_Hospitalcode');
			$this->db->like('R.v_tag_no', trim(str_replace("TAG:","",strtoupper($srch))));
			$this->db->or_like('R.v_asset_name', trim($srch));
			$this->db->or_like('R.v_user_dept_code', trim($srch));
			$this->db->or_like('M.v_assetno', trim($srch));
			//$this->db->join('pmis2_egm_jobdonedet j','wp.v_WrkOrdNo = j.v_Wrkordno');
			$this->db->where("R.v_service_code = ",$this->session->userdata('usersess'));
			$this->db->where("R.v_Actionflag <> ", "D");
			$this->db->where("M.v_Actionflag <> ", "D");
			$this->db->where("R.v_hospitalcode = ", $this->session->userdata('hosp_code'));
			$this->db->order_by("R.v_tag_no, R.V_Asset_no");
			//$this->db->where("R.V_Hospitalcode <> ", "D");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function searchwo($srch){
			$this->db->select("a.*,IFNULL(G.V_Tag_no,'N/A') as V_Tag_no",FALSE);	
			$this->db->where("a.v_ActionFlag != ","D");
			$this->db->where('a.v_ServiceCode = ',$this->session->userdata('usersess'));
			//$this->db->like('v_ComplaintNo', trim(strtoupper($srch)));	
			$this->db->like('a.V_Request_no', trim(strtoupper($srch)));	
			
			//$query = $this->db->get("pmis2_com_complaint");
			
			$this->db->join('pmis2_egm_assetregistration G','a.V_Asset_no = G.V_Asset_no','left outer');	
			$query = $this->db->get("pmis2_egm_service_request a");
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}

               function searchcomp($srch){
				
			$this->db->where("v_ActionFlag != ","D");
			$this->db->where('v_ServiceCode = ',$this->session->userdata('usersess'));
			$this->db->like('v_ComplaintNo', trim(strtoupper($srch)));	
			//$this->db->like('V_Request_no', trim(strtoupper($srch)));	
			
			$query = $this->db->get("pmis2_com_complaint");
			//$query = $this->db->get("pmis2_egm_service_request");
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function searchppm($srch){
			
			$this->db->where('a.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->where("a.v_actionflag <> ", "D");	
			$this->db->like('v_WrkOrdNo', trim(strtoupper($srch)));		
			//$this->db->or_like('v_request_type', trim($srch));
			$this->db->join('pmis2_egm_assetregistration r','a.v_Asset_no = r.V_Asset_no AND a.V_hospitalcode = r.V_Hospitalcode','full');
						
            $query = $this->db->get("pmis2_egm_schconfirmmon a");
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function complaint_form($cmplnt_no){
			$this->db->select('C.*,R.V_Asset_no,R.V_Tag_no,R.V_Asset_name,R.V_Serial_no,G.V_Wrn_end_code');
			$this->db->from('pmis2_com_complaint C');
			$this->db->join('pmis2_egm_assetregistration R','C.v_AssetNo = R.V_Asset_no AND C.v_HospitalCode = R.V_HospitalCode','left');
			$this->db->join('pmis2_egm_assetreg_general G','R.V_Asset_no = G.V_Asset_no AND G.v_Hospital_Code = R.V_HospitalCode','left');
			$this->db->where("C.v_ServiceCode = ",$this->session->userdata('usersess'));
			$this->db->where('v_ComplaintNo',$cmplnt_no);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function dmc_form($month,$year){
		/*
		SELECT     a.v_ServiceCode, a.v_HospitalCode, a.v_ComplaintNo, MONTH(CONVERT(varchar, a.d_ComplaintDt, 106)) AS 'Month', YEAR(CONVERT(varchar, 
                      a.d_ComplaintDt, 106)) AS 'Year', CONVERT(varchar, a.d_ComplaintDt, 106) AS ComplaintDt, a.v_Complaint, a.v_UserDeptCode, a.v_Location, 
                      a.v_RequestNo, a.v_Source, a.v_Reference, CONVERT(varchar, b.d_ResponseDt, 106) AS d_ResponseDt, b.v_ResponseTime, b.v_Remark, 
                      CONVERT(varchar, a.d_CompleteDt, 106) AS CompleteDate, CONVERT(varchar, b.d_follow_startdate, 106) AS follow_startdate, CONVERT(varchar, 
                      b.d_follow_enddate, 106) AS d_follow_enddate, b.v_follow_starttime, b.v_follow_endtime, b.v_PersonnelCode
FROM         pmis2_com_complaint a LEFT OUTER JOIN
                      pmis2_Com_ComplaintDet b ON a.v_HospitalCode = b.v_HospitalCode AND a.v_ComplaintNo = b.v_ComplaintNo
WHERE     (a.v_Source IN ('sihat', 'MOH')) AND (a.v_ServiceCode = 'BEMS') AND (a.v_ActionFlag <> 'D') AND (YEAR(a.d_ComplaintDt) = 2015) AND 
                      (MONTH(a.d_ComplaintDt) < 2) AND (a.v_HospitalCode = 'MER') AND (a.d_CompleteDt IS NULL)
ORDER BY a.v_HospitalCode, YEAR(a.d_ComplaintDt), MONTH(a.d_ComplaintDt), a.v_ServiceCode
		*/
			$this->db->select('a.v_ServiceCode, a.v_HospitalCode, a.v_ComplaintNo,  a.d_ComplaintDt, a.v_Complaint, a.v_UserDeptCode, a.v_Location, a.v_RequestNo, a.v_Source, a.v_Reference, b.d_ResponseDt, b.v_ResponseTime, b.v_Remark, a.d_CompleteDt, b.d_follow_startdate, b.d_follow_enddate, b.v_follow_starttime, b.v_follow_endtime, b.v_PersonnelCode');
			$this->db->from('pmis2_com_complaint a');
			$this->db->join('pmis2_com_complaintdet b','a.v_HospitalCode = b.v_HospitalCode AND a.v_ComplaintNo = b.v_ComplaintNo', 'left outer');
			$this->db->where('a.v_ServiceCode', $this->session->userdata('usersess'));
			//$this->db->where('MONTH(a.d_ComplaintDt) < ', '2');
      //$this->db->where('YEAR(a.d_ComplaintDt)',$year);
			//$this->db->where('s.d_startdt >=', $this->dater(1,$month,$year));
			$this->db->where('a.d_ComplaintDt <=', $this->dater(2,$month,$year));
			$this->db->where('a.v_ActionFlag <> ', 'D');
			$this->db->where('a.v_HospitalCode',$this->session->userdata('hosp_code'));
			$this->db->where('a.d_CompleteDt', NULL);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rmc_form($month,$year){
		/*
		SELECT a.V_hospitalcode, a.D_date AS RegisterDate, a.D_time, a.V_Request_no, a.V_request_status, a.V_Asset_no, 
                a.V_User_dept_code, a.V_requestor,  a.v_closeddate, a.v_closedtime, a.V_summary, 
	c.d_Date, c.v_ActionTaken AS ActualVisit
		FROM pmis2_egm_service_request a LEFT OUTER JOIN
                pmis2_emg_jobvisit1 c ON a.V_hospitalcode = c.v_HospitalCode AND a.V_Request_no = c.v_WrkOrdNo
 WHERE (a.V_actionflag <> 'D') AND (a.V_hospitalcode = @hos) AND (a.V_servicecode = @st) AND (a.V_request_status IN ('A', 'BO')) AND 
                (a.V_request_type IN ('A4', 'A5', 'A6', 'A7', 'A8')) 
		ORDER BY a.D_date
		

		
		*/
			$this->db->select('a.V_servicecode, a.V_hospitalcode, a.D_date AS RegisterDate, a.D_time, a.V_Request_no, a.V_request_status, a.V_Asset_no, a.V_User_dept_code, a.V_requestor,  a.v_closeddate, a.v_closedtime, a.V_summary, c.d_Date, c.v_ActionTaken AS ActualVisit');
			$this->db->from('pmis2_egm_service_request a');
			$this->db->join('pmis2_emg_jobvisit1 c','a.V_hospitalcode = c.v_HospitalCode AND a.V_Request_no = c.v_WrkOrdNo', 'left outer');
			$this->db->where('a.V_servicecode', $this->session->userdata('usersess'));
			$reqstatus = array('A', 'BO');
			$this->db->where_in('a.V_request_status ', $reqstatus);
      $reqtype = array('A4', 'A5', 'A6', 'A7', 'A8');
			$this->db->where_in('a.V_request_type ', $reqtype);
			$this->db->where('a.D_date >=', $this->dater(1,$month,$year));
			$this->db->where('a.D_date <=', $this->dater(2,$month,$year));
			$this->db->where('a.V_actionflag <> ', 'D');
			$this->db->where('a.V_hospitalcode',$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_volu($month,$year,$pilih='',$reqtype,$broughtfwd,$grpsel){
		/*
		SELECT     r.V_hospitalcode, r.closedby, r.D_date, r.D_time, r.V_Request_no, r.V_Asset_no, r.V_summary AS ReqSummary, r.V_User_dept_code, r.V_requestor, 
                      r.V_request_status, r.v_closeddate, r.v_closedtime, w.V_Wrn_end_code, a.v_summary
FROM         pmis2_egm_service_request r INNER JOIN
                      pmis2_EGM_AssetReg_General w ON r.V_Asset_no = w.V_Asset_no AND r.V_hospitalcode = w.V_Hospital_code LEFT OUTER JOIN
                      pmis2_egm_jobdonedet a ON a.v_Wrkordno = r.V_Request_no AND a.v_HospitalCode = r.V_hospitalcode
WHERE     (MONTH(r.D_date) = 3) AND (YEAR(r.D_date) = 2015) AND (r.V_servicecode = 'BEMS') AND (r.V_hospitalcode = 'IIUM') AND (r.V_actionflag <> 'D')
ORDER BY r.D_date, r.D_time
		*/
			$this->db->select("e.v_location_name, r.v_location_code, r.V_hospitalcode, r.closedby, r.D_date, r.D_time, r.V_Request_no, r.V_Asset_no, r.V_summary AS ReqSummary, r.V_User_dept_code, r.V_requestor, r.V_request_status, r.v_closeddate, r.v_closedtime, w.V_Wrn_end_code, a.v_summary, g.v_tag_no, d.v_UserDeptDesc, DATEDIFF(IFNULL(r.v_closeddate,'".$this->dater(3,$month,$year)."'),r.D_date) + 1 AS DiffDate,r.V_request_type,g.v_asset_grp,jr.d_Date,jr.v_Time,jr.v_Personal1,jr.v_ActionTaken,g.V_Asset_WG_code", false);
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetregistration g','r.v_Asset_no = g.V_Asset_no AND r.v_HospitalCode = g.V_Hospitalcode AND g.V_Actionflag <> "D"', 'left outer');
			$this->db->join('pmis2_egm_assetreg_general w','r.V_Asset_no = w.V_Asset_no AND r.V_hospitalcode = w.V_Hospital_code', 'left outer');
			$this->db->join('pmis2_egm_jobdonedet a',"a.v_Wrkordno = r.V_Request_no AND a.v_HospitalCode = r.V_hospitalcode AND a.v_Actionflag <> 'D'", 'left outer');
			$this->db->join('pmis2_sa_userdept d','r.V_User_dept_code = d.v_UserDeptCode','left');
			$this->db->join('pmis2_egm_assetlocation e','r.v_location_code = e.v_location_code','left outer');
			$this->db->join('pmis2_emg_jobresponse jr',"r.V_Request_no = jr.v_WrkOrdNo",'left outer');
			$this->db->where('r.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('r.V_actionflag <> ', 'D');
			if ($pilih <> "A") {
			$this->db->where('r.v_request_status <> ', $pilih);
			} else {
			$this->db->where('r.v_request_status ', 'C');
			}
			if ($reqtype <> ''){
			//$this->db->where('r.V_request_type', $reqtype);
			if ($reqtype == 'F') {
				 //$this->db->like('sr.V_summary', 'floor');
				 //$this->db->or_like('sr.V_summary', 'lantai');
				 $this->db->where("(r.V_summary LIKE '%floor%' OR r.V_summary LIKE '%lantai%')", NULL, FALSE);
				 } elseif ($reqtype == 'WD') {
				 //$this->db->like('sr.V_summary', 'wall');
				 //$this->db->or_like('sr.V_summary', 'door');
				 //$this->db->or_like('sr.V_summary', 'dinding');
				 //$this->db->or_like('sr.V_summary', 'pintu');
				 $this->db->where("(r.V_summary LIKE '%wall%' OR r.V_summary LIKE '%door%' OR r.V_summary LIKE '%dinding%' OR r.V_summary LIKE '%pintu%')", NULL, FALSE);
				 } elseif ($reqtype == 'C') {
				 //$this->db->like('sr.V_summary', 'ceiling');
				 //$this->db->or_like('sr.V_summary', 'siling');
				 $this->db->where("(r.V_summary LIKE '%ceiling%' OR r.V_summary LIKE '%siling%')", NULL, FALSE);
				 } elseif ($reqtype == 'W') {
				 //$this->db->like('sr.V_summary', 'window');
				 //$this->db->or_like('sr.V_summary', 'tingkap');
				 $this->db->where("(r.V_summary LIKE '%window%' OR r.V_summary LIKE '%tingkap%')", NULL, FALSE);
				 } elseif ($reqtype == 'FIX') {
				 //$this->db->like('sr.V_summary', 'fixture');
				 //$this->db->or_like('sr.V_summary', 'pemasangan');
				 $this->db->where("(r.V_summary LIKE '%fixture%' OR r.V_summary LIKE '%pemasangan%')", NULL, FALSE);
				 } elseif ($reqtype == 'FUR') {
				 //$this->db->like('r.V_summary', 'furniture');
				 //$this->db->or_like('sr.V_summary', 'perabot');
				 //$this->db->or_like('sr.V_summary', 'kemasan');
				 //$this->db->or_like('sr.V_summary', 'fitting');
				 $this->db->where("(r.V_summary LIKE '%furniture%' OR r.V_summary LIKE '%perabot%' OR r.V_summary LIKE '%kemasan%' OR r.V_summary LIKE '%fitting%')", NULL, FALSE);
				 } else {
				 	 $this->db->where('r.V_request_type',$reqtype);
					 }
			}
			if ($broughtfwd <> ''){
			$this->db->where('TIMESTAMPDIFF(MONTH, r.d_date, IFNULL(r.v_closeddate,now())) =',$broughtfwd);
			$this->db->order_by("r.d_date, g.v_tag_no");
			}
			//$this->db->where('YEAR(r.D_date) ', $year);
			//$this->db->where('MONTH(r.D_date) ', $month);
			else{
			$this->db->where('r.d_date >=', $this->dater(1,$month,$year));
			$this->db->where('r.d_date <=', $this->dater(2,$month,$year).'  23:59:59');
			}
			$this->db->where('r.V_hospitalcode',$this->session->userdata('hosp_code'));
			if ($grpsel <> ''){
				$this->db->where('g.v_asset_grp',$grpsel);
			}
			function toArray($obj)
			{
    	$obj = (array) $obj;//cast to array, optional
    	return $obj['path'];
			}
			$idArray = array_map('toArray', $this->session->userdata('accessr'));
			if ((in_array("contentcontroller/Schedule(main)", $idArray)) && (in_array("useriium", $idArray))) {
			$this->db->where('r.V_request_type <> ', 'A9');
	 		}
			
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_volil($month,$year,$pilih='',$grpsel){
		/*
		SELECT     r.V_hospitalcode, r.closedby, r.D_date, r.D_time, r.V_Request_no, r.V_Asset_no, r.V_summary AS ReqSummary, r.V_User_dept_code, r.V_requestor, 
                      r.V_request_status, r.v_closeddate, r.v_closedtime, w.V_Wrn_end_code, a.v_summary
FROM         pmis2_egm_service_request r INNER JOIN
                      pmis2_EGM_AssetReg_General w ON r.V_Asset_no = w.V_Asset_no AND r.V_hospitalcode = w.V_Hospital_code LEFT OUTER JOIN
                      pmis2_egm_jobdonedet a ON a.v_Wrkordno = r.V_Request_no AND a.v_HospitalCode = r.V_hospitalcode
WHERE     (MONTH(r.D_date) = 3) AND (YEAR(r.D_date) = 2015) AND (r.V_servicecode = 'BEMS') AND (r.V_hospitalcode = 'IIUM') AND (r.V_actionflag <> 'D')
ORDER BY r.D_date, r.D_time
		*/
			$this->db->select('r.V_hospitalcode, r.closedby, r.D_date, r.D_time, r.V_Request_no, r.V_Asset_no, r.V_summary AS ReqSummary, r.V_User_dept_code, r.V_requestor, r.V_request_status, r.v_closeddate, r.v_closedtime, w.V_Wrn_end_code, a.v_summary, g.v_tag_no, DATEDIFF(IFNULL(r.v_closeddate,now()),r.D_date) AS DiffDate,g.v_asset_grp', false);
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetregistration g','r.v_Asset_no = g.V_Asset_no AND r.v_HospitalCode = g.V_Hospitalcode AND g.V_Actionflag <> "D"', 'left outer');
			$this->db->join('pmis2_egm_assetreg_general w','r.V_Asset_no = w.V_Asset_no AND r.V_hospitalcode = w.V_Hospital_code', 'left outer');
			$this->db->join('pmis2_egm_jobdonedet a','a.v_Wrkordno = r.V_Request_no AND a.v_HospitalCode = r.V_hospitalcode', 'left outer');
			$this->db->where('r.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('r.V_actionflag <> ', 'D');
			$this->db->where('r.v_request_status <> ', $pilih);
			//$this->db->where('YEAR(r.D_date) ', $year);
			//$this->db->where('MONTH(r.D_date) ', $month);
			$this->db->where('r.D_date >=', $this->dater(1,$month,$year));
			$this->db->where('r.D_date <=', $this->dater(2,$month,$year));
			$this->db->where('r.V_hospitalcode',$this->session->userdata('hosp_code'));
			$this->db->where('r.V_request_type',"A5");
			if ($grpsel <> ''){
				$this->db->where('g.v_asset_grp',$grpsel);
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_volc($month,$year,$pilih='',$grpsel){
		/*
		SELECT     r.V_hospitalcode, r.closedby, r.D_date, r.D_time, r.V_Request_no, r.V_Asset_no, r.V_summary AS ReqSummary, r.V_User_dept_code, r.V_requestor, 
                      r.V_request_status, r.v_closeddate, r.v_closedtime, w.V_Wrn_end_code, a.v_summary
FROM         pmis2_egm_service_request r INNER JOIN
                      pmis2_EGM_AssetReg_General w ON r.V_Asset_no = w.V_Asset_no AND r.V_hospitalcode = w.V_Hospital_code LEFT OUTER JOIN
                      pmis2_egm_jobdonedet a ON a.v_Wrkordno = r.V_Request_no AND a.v_HospitalCode = r.V_hospitalcode
WHERE     (MONTH(r.D_date) = 3) AND (YEAR(r.D_date) = 2015) AND (r.V_servicecode = 'BEMS') AND (r.V_hospitalcode = 'IIUM') AND (r.V_actionflag <> 'D')
ORDER BY r.D_date, r.D_time
		*/
			$this->db->select('r.V_hospitalcode, r.D_ComplaintDt, r.D_ComplaintTime, r.v_ComplaintNo, r.v_ComplaintDesc, r.v_UserDeptCode, r.V_requestor, r.V_request_status, r.d_CompleteDt, r.v_ComplaintStatus,a.v_asset_grp');
			$this->db->from('pmis2_com_complaint r');
			$this->db->join('pmis2_egm_assetregistration a','r.v_AssetNo = a.V_Asset_no AND a.V_Actionflag <> "D"','left outer');
			$this->db->where('r.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('r.V_actionflag <> ', 'D');
			$this->db->where('r.v_ComplaintStatus <> ', $pilih);
			//$this->db->where('YEAR(r.d_ComplaintDt) ', $year);
			//$this->db->where('MONTH(r.d_ComplaintDt) ', $month);
			$this->db->where('r.d_ComplaintDt >=', $this->dater(1,$month,$year));
			$this->db->where('r.d_ComplaintDt <=', $this->dater(2,$month,$year));
			$this->db->where('r.V_hospitalcode',$this->session->userdata('hosp_code'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_vossu($month,$year){
		/*
		SELECT v_request_no, d_date, d_time, v_priority_code, v_respondate, v_respontime, v_request_status " & _
				"FROM pmis2_egm_service_request " & _
					"WHERE MONTH(d_date)=" & sMonth & " " & _
					"AND YEAR(d_date)=" & sYear & " " & _
					"AND v_servicecode='BEMS' " & _
					"AND v_hospitalcode='" & session("sitecode") & "' " & _
					"AND v_actionflag!='D'
		*/
			$this->db->select('v_request_no, d_date, d_time, v_priority_code, v_respondate, v_respontime, v_request_status');
			$this->db->from('pmis2_egm_service_request');
			$this->db->where('v_servicecode', $this->session->userdata('usersess'));
			$this->db->where('v_actionflag <> ', 'D');
			//$this->db->where('YEAR(d_date) ', $year);
			//$this->db->where('MONTH(d_date) ', $month);
			$this->db->where('d_date >=', $this->dater(1,$month,$year));
			$this->db->where('d_date <=', $this->dater(2,$month,$year));
			$this->db->where('v_hospitalcode',$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_vols($month, $year, $stat = "apo2", $resch = "resch",$grpsel){
		/*
		SELECT     s.v_WrkOrdNo AS sv_wrkordno, s.v_Asset_no AS sv_asset_no, s.v_Month AS sv_month, s.v_HospitalCode AS sv_hospitalcode, 
                      s.d_DueDt AS sd_duedt, s.v_jobtype AS sv_jobtype, s.v_year AS sv_year, s.v_ServiceCode AS sv_servicecode, a.V_Tag_no AS av_tag_no, 
                      a.V_User_Dept_code AS av_user_dept_code, a.V_Asset_name AS av_asset_name
FROM         pmis2_egm_schconfirmmon s INNER JOIN
                      pmis2_EGM_AssetRegistration a ON s.v_Asset_no = a.V_Asset_no AND s.v_HospitalCode = a.V_Hospitalcode
WHERE     (s.v_HospitalCode = 'MKA') AND (s.v_ServiceCode = 'BEMS') AND (s.v_year = 2015) AND (s.v_Actionflag <> 'D') AND (a.V_Actionflag <> 'D') AND 
                      (MONTH(s.d_DueDt) = 3) AND (YEAR(s.d_DueDt) = 2015)
ORDER BY s.d_DueDt, s.v_WrkOrdNo
		*/
		  $this->db->distinct();
			$this->db->select('a.V_Location_code, s.v_Wrkordstatus, s.v_WrkOrdNo AS sv_wrkordno, s.v_Asset_no AS sv_asset_no, s.v_Month AS sv_month, s.v_HospitalCode AS sv_hospitalcode, s.d_DueDt AS sd_duedt, s.v_jobtype AS sv_jobtype, s.v_year AS sv_year, s.v_ServiceCode AS sv_servicecode, a.V_Tag_no AS av_tag_no, a.V_User_Dept_code AS av_user_dept_code, a.V_Asset_name AS av_asset_name, b.v_stest, b.v_ptest, b.d_DateDone, b.v_summary, b.d_last_resch_date, c.d_Date, IFNULL(s.d_Reschdt,c.d_Reschdt) AS d_Reschdt, d.v_UserDeptDesc,a.v_asset_grp', FALSE);
			$this->db->from('pmis2_egm_schconfirmmon s');
			$this->db->join('pmis2_egm_assetregistration a','s.v_Asset_no = a.V_Asset_no AND s.v_HospitalCode = a.V_Hospitalcode');
			$this->db->join('pmis2_egm_jobdonedet b',"b.v_Wrkordno = s.v_WrkOrdNo AND b.v_HospitalCode = s.v_HospitalCode AND b.v_actionflag <> 'D'", 'left outer');
			$this->db->join('pmis2_emg_jobvisit1 c',"c.v_WrkOrdNo = s.v_WrkOrdNo AND c.v_HospitalCode = s.v_HospitalCode AND c.d_reschdt IS NULL AND c.v_actionflag <> 'D'", 'left outer');
			$this->db->join('pmis2_sa_userdept d',"a.V_User_Dept_code = d.v_UserDeptCode AND d.v_actionflag <> 'D' ",'left');
			$this->db->where('s.v_ServiceCode', $this->session->userdata('usersess'));
			$this->db->where('s.v_Actionflag <> ', 'D');
			$this->db->where('a.V_Actionflag <> ', 'D');
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			//$this->db->where('s.v_wrkordstatus <> ', $stat);
			/*
			if ($resch == "ys") {
			$this->db->where("s.d_reschdt IS NOT NULL", NULL, FALSE);
			} else
			{
			$this->db->not_like('s.v_wrkordstatus', $stat);
			}
			*/
			if (($resch == "nt") && ($stat == "A")) {
			$this->db->where("s.v_wrkordstatus LIKE '%C%'", NULL, FALSE);
			} elseif (($resch == "ys") && ($stat == "A"))
			{
			//$this->db->where("s.d_reschdt is not NULL AND s.v_wrkordstatus = 'AR'", NULL, FALSE);
			$this->db->where("s.d_reschdt is not NULL AND s.v_wrkordstatus = 'AR' AND IFNULL(s.d_reschdt,d_DueDt) > now()", NULL, FALSE);
			} elseif (($resch == "nt") && ($stat == "C"))
			{
			//$this->db->where("s.v_wrkordstatus = 'A' ", NULL, FALSE);
			$this->db->where("(s.v_wrkordstatus = 'A' OR (s.v_wrkordstatus = 'AR' AND IFNULL(s.d_reschdt,d_DueDt) < now()))", NULL, FALSE);
			} else
			{
			$this->db->not_like('s.v_wrkordstatus', $stat);
			}
			//$this->db->not_like('s.v_wrkordstatus', $stat);
			//$this->db->where('s.v_year', $year);
			//$this->db->where('YEAR(s.d_DueDt)', $year);
			//$this->db->where('MONTH(s.d_DueDt)', $month);
			$this->db->where('IFNULL(s.d_reschdt,s.d_DueDt) >=', $this->dater(1,$month,$year));
			$this->db->where('IFNULL(s.d_reschdt,s.d_DueDt) <=', $this->dater(2,$month,$year));
			$this->db->where('s.v_HospitalCode',$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_rtlu($month,$year, $stat = "apo2",$grpsel){
		/*
		SELECT v_request_no, v_asset_no, d_date, d_time, v_servicecode, v_requestor, v_user_dept_code, v_summary, 
				v_priority_code, v_hospitalcode, v_respondate, v_respontime 
					FROM apbesys..pmis2_egm_service_request 
						WHERE MONTH(d_date)=3
							AND YEAR(d_date)=2015
							AND v_servicecode='BEMS' 
							AND v_hospitalcode='MKA' 
							AND v_actionflag!='D' 
								ORDER BY d_date, d_time
		*/
               if ($this->session->userdata('usersess') == "FES") {
			$dn = 180;
			$de = 30;
			} elseif ($this->session->userdata('usersess') == "BES") {
			$dn = 120;
			$de = 30;
			} else {
			$dn = 15;
			$de = 5;
			}             
			$this->db->select('s.v_request_no, s.v_asset_no, s.d_date, s.d_time, s.v_servicecode, s.v_requestor, s.v_user_dept_code, s.v_summary, s.v_priority_code, s.v_hospitalcode, s.v_respondate, s.v_respontime, a.V_Tag_no, TIMESTAMPDIFF(MINUTE,s.D_date,IFNULL(s.v_respondate,now())) AS mint,a.v_asset_grp', FALSE);
			$this->db->from('pmis2_egm_service_request s');
			$this->db->join('pmis2_egm_assetregistration a','s.v_Asset_no = a.V_Asset_no AND s.v_HospitalCode = a.V_Hospitalcode AND a.V_Actionflag <> "D"', 'LEFT OUTER');
			$this->db->where('s.v_servicecode', $this->session->userdata('usersess'));
			$this->db->where('s.v_actionflag <> ', 'D');
			//$this->db->where('a.v_actionflag <> ', 'D');
			//$this->db->where('YEAR(s.d_date)', $year);
			//$this->db->where('MONTH(s.d_date)', $month);
			$this->db->where('s.d_date >=', $this->dater(1,$month,$year));
			$this->db->where('s.d_date <=', $this->dater(2,$month,$year).'  23:59:59');
			$this->db->where('s.v_hospitalcode',$this->session->userdata('hosp_code'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			if ($stat == "ys") {
			$this->db->where("((TIMESTAMPDIFF(MINUTE,s.d_date,IFNULL(s.v_respondate,NOW())) <= $dn AND s.V_priority_code = 'Normal') OR (TIMESTAMPDIFF(MINUTE,s.d_date,IFNULL(s.v_respondate,NOW())) <= $de AND s.V_priority_code = 'Emergency'))");
			} elseif ($stat == "no")
			{
			$this->db->where("((TIMESTAMPDIFF(MINUTE,s.d_date,IFNULL(s.v_respondate,NOW())) > $dn AND s.V_priority_code = 'Normal') OR (TIMESTAMPDIFF(MINUTE,s.d_date,IFNULL(s.v_respondate,NOW())) > $de AND s.V_priority_code = 'Emergency'))");
			}
			function toArray($obj)
			{
    	$obj = (array) $obj;//cast to array, optional
    	return $obj['path'];
			}
			$idArray = array_map('toArray', $this->session->userdata('accessr'));
			//if ((in_array("contentcontroller/Schedule(main)", $idArray)) && ($this->session->userdata('Ser_Code')=="IIUM")) {
			if ((in_array("contentcontroller/Schedule(main)", $idArray)) && (in_array("useriium", $idArray))) {
			$this->db->where('s.V_request_type <> ', 'A9');
	 		}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		
		
		function rpt_agl($month,$year,$grpsel){
		/*
		SELECT     m.new_asset_type, a.V_Equip_code, a.V_Asset_name, COUNT(a.V_Equip_code) AS assetcount
FROM         pmis2_EGM_AssetRegistration a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code INNER JOIN
                      Pmis2_Egm_AssetMaintenance c ON a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND 
                      b.V_Hospital_code = c.v_Hospitalcode INNER JOIN
                      PMIS2_SA_EQUIP_CODE f ON a.V_Equip_code = f.v_Equip_Code INNER JOIN
                      pmis2_SA_asset_mapping m ON a.V_Equip_code = m.old_asset_type AND a.V_Equip_code = m.old_asset_type AND 
                      a.V_Equip_code = m.old_asset_type INNER JOIN
                      pmis2_SA_MOH_Asset_type e ON m.new_asset_type = e.Asset_Type INNER JOIN
                      pmis2_SA_UserDept g ON a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode INNER JOIN
                      pmis2_EGM_AssetLocation h ON a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode LEFT OUTER JOIN
                      pmis2_sa_vendor z ON ISNULL(b.V_Vendor_code, 'NA') = z.v_vendorcode
WHERE     (a.V_Actionflag <> 'D') AND (a.V_Hospitalcode = 'MER') AND (a.V_service_code = 'BEMS') AND (b.V_ActionFlag <> 'D')
GROUP BY a.V_Equip_code, m.new_asset_type, a.V_Asset_name
ORDER BY a.V_Asset_name
		*/
			$this->db->select('m.new_asset_type, a.V_Equip_code, f.v_Equip_Desc AS V_Asset_name , COUNT(a.V_Equip_code) AS assetcount');
			$this->db->from('pmis2_egm_assetregistration a');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code');
			$this->db->join('pmis2_egm_assetmaintenance c','a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND b.V_Hospital_code = c.v_Hospitalcode');
			$this->db->join('pmis2_sa_equip_code f','a.V_Equip_code = f.v_Equip_Code AND a.V_Hospitalcode = f.v_Hospitalcode AND a.V_service_code = f.v_ServiceCode ');
			$this->db->join('pmis2_sa_asset_mapping m','a.V_Equip_code = m.old_asset_type AND a.V_service_code = m.service_code');
			$this->db->join('pmis2_sa_moh_asset_type e','m.new_asset_type = e.Asset_Type AND a.V_service_code = e.Service_Code');
			$this->db->join('pmis2_sa_userdept g',"a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode AND g.V_actionflag <> 'D'");
			$this->db->join('pmis2_egm_assetlocation h',"a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode AND h.V_actionflag <> 'D'");
			$this->db->join('pmis2_sa_vendor z','b.V_Vendor_code = z.v_vendorcode', 'left outer');
			$this->db->where('a.V_service_code', $this->session->userdata('usersess'));
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('b.V_ActionFlag != ', 'D');
			//$this->db->where('YEAR(d_date)', $year);
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('a.V_Hospitalcode' ,$this->session->userdata('hosp_code'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			//$this->db->group_by('a.V_Equip_code, m.new_asset_type, a.V_Asset_name'); 
			$this->db->group_by('a.V_Equip_code, m.new_asset_type, f.v_Equip_Desc');
			$this->db->order_by("f.v_Equip_Desc"); 
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_alr($month,$year,$grpsel){
		/*
		SELECT DISTINCT 
                      a.V_Hospitalcode, a.V_Tag_no, e.Asset_Type, e.Type_Desc, a.V_Asset_no, a.V_Equip_code, f.v_Equip_Desc, c.v_AssetStatus, c.v_AssetVStatus, 
                      CONVERT(varchar, c.d_RefDate, 106) AS BER_DATE, c.v_AssetCondition, YEAR(GETDATE()) - YEAR(b.D_commission) AS Age, b.V_PO_no, 
                      CONVERT(varchar, b.V_PO_date, 106) AS V_PO_date, ISNULL(b.N_Cost, 0) AS N_Cost, c.v_ChecklistCode, a.V_User_Dept_code, g.v_mohdesc, 
                      g.v_UserDeptDesc, a.V_Location_code, CONVERT(varchar, a.D_Register_date, 106) AS RegisterDate, CONVERT(varchar, b.D_commission, 106) 
                      AS CommissionDate, a.V_Make, a.V_Manufacturer, a.V_Model_no, a.V_Serial_no, a.V_Brandname, CONVERT(varchar, b.V_Wrn_end_code, 106) 
                      AS WarrantyEndDate, b.V_Vendor_code, z.v_vendorcode, z.v_vendorname, b.V_File_Ref_no, b.V_Depreciation, b.V_Lifespan, b.V_Oper_Hr_code, 
                      b.V_Job_Type_code, b.V_Agent, b.V_Check_list_code
FROM         pmis2_EGM_AssetRegistration a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code INNER JOIN
                      Pmis2_Egm_AssetMaintenance c ON a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND 
                      b.V_Hospital_code = c.v_Hospitalcode INNER JOIN
                      PMIS2_SA_EQUIP_CODE f ON a.V_Equip_code = f.v_Equip_Code INNER JOIN
                      pmis2_SA_asset_mapping d ON a.V_Equip_code = d.old_asset_type INNER JOIN
                      pmis2_SA_MOH_Asset_type e ON d.new_asset_type = e.Asset_Type INNER JOIN
                      pmis2_SA_UserDept g ON a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode INNER JOIN
                      pmis2_EGM_AssetLocation h ON a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode LEFT OUTER JOIN
                      pmis2_sa_vendor z ON ISNULL(b.V_Vendor_code, 'NA') = z.v_vendorcode
WHERE     (a.V_Actionflag <> 'D') AND (b.V_ActionFlag <> 'D') AND (c.v_Actionflag <> 'D') AND (g.v_ActionFlag <> 'D') AND (h.V_Actionflag <> 'D') AND 
                      (f.v_Actionflag <> 'D') AND (a.V_Hospitalcode IN ('MER')) AND (a.V_service_code = 'bems') AND (a.V_Asset_no NOT LIKE '%B8888%')
ORDER BY a.V_Asset_no
		*/
		  $this->db->distinct();
			$this->db->select('a.V_Hospitalcode, a.V_Tag_no, e.Asset_Type, e.Type_Desc, a.V_Asset_no, a.V_Equip_code, f.v_Equip_Desc, c.v_AssetStatus, c.v_AssetVStatus, c.d_RefDate AS BER_DATE, c.v_AssetCondition, (YEAR(NOW()) - YEAR(b.D_commission)) AS Age, b.V_PO_no, b.V_PO_date AS V_PO_date, IFNULL(b.N_Cost, 0) AS N_Cost, c.v_ChecklistCode, a.V_User_Dept_code, g.v_mohdesc, g.v_UserDeptDesc, a.V_Location_code, a.D_Register_date AS RegisterDate, b.D_commission AS CommissionDate, a.V_Make, a.V_Manufacturer, a.V_Model_no, a.V_Serial_no, a.V_Brandname, b.V_Wrn_end_code AS WarrantyEndDate, b.V_Vendor_code, z.v_vendorcode, z.v_vendorname, b.V_File_Ref_no, b.V_Depreciation, b.V_Lifespan, b.V_Oper_Hr_code,b.V_Job_Type_code, b.V_Agent, b.V_Check_list_code,a.v_asset_grp', false);
			//$this->db->select('a.V_Equip_code, m.new_asset_type, a.V_Asset_name', false);
			$this->db->from('pmis2_egm_assetregistration a');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code');
			$this->db->join('pmis2_egm_assetmaintenance c','a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND b.V_Hospital_code = c.v_Hospitalcode');
			$this->db->join('pmis2_sa_equip_code f','a.V_Equip_code = f.v_Equip_Code AND a.V_Hospitalcode = f.v_Hospitalcode');
			$this->db->join('pmis2_sa_asset_mapping m','a.V_Equip_code = m.old_asset_type AND a.V_Equip_code = m.old_asset_type AND a.V_Equip_code = m.old_asset_type');
			$this->db->join('pmis2_sa_moh_asset_type e','m.new_asset_type = e.Asset_Type AND a.V_service_code = e.Service_Code');
			$this->db->join('pmis2_sa_userdept g','a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode');
			$this->db->join('pmis2_egm_assetlocation h','a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode');
			$this->db->join('pmis2_sa_vendor z','b.V_Vendor_code = z.v_vendorcode', 'left outer');
			$this->db->where('a.V_service_code', $this->session->userdata('usersess'));
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('b.V_ActionFlag != ', 'D');
			$this->db->where('c.V_ActionFlag != ', 'D');
			//$this->db->where('YEAR(d_date)', $year);
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('a.V_Hospitalcode' ,$this->session->userdata('hosp_code'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			//$this->db->group_by('a.V_Equip_code, m.new_asset_type, a.V_Asset_name');
			$this->db->order_by("a.V_Tag_no, a.V_Asset_name"); 
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_ppmp($month,$year){
		/*
		SELECT IFNULL(SUM(CASE WHEN c.qap_type = 'Y' THEN 1 ELSE 0 END),0) AS qtotal, COUNT(*) AS Total,
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = 'C' AND (v_closeddate = d_DueDt) THEN 1 ELSE 0 END),0) AS cstotal, 
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = 'C' THEN 1 ELSE 0 END),0) AS ctotal, 
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = 'C' AND c.qap_type = 'Y' THEN 1 ELSE 0 END),0) AS qctotal, 
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = 'C' AND (v_closeddate <> d_DueDt) THEN 1 ELSE 0 END),0) AS cnstota, 
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = 'C' AND (v_closeddate <> d_DueDt) AND c.qap_type = 'Y' THEN 1 ELSE 0 END),0) AS qcnstota, 
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus <> 'C' THEN 1 ELSE 0 END),0) AS nctotal, 
 IFNULL(SUM(CASE WHEN a.v_Wrkordstatus <> 'C' AND c.qap_type = 'Y' THEN 1 ELSE 0 END),0) AS qnctotal 
 FROM fmis.mis_asset_type_master c RIGHT OUTER JOIN pmis2_SA_asset_mapping b INNER JOIN 
 pmis2_egm_schconfirmmon a ON b.old_asset_type = LEFT(a.v_Asset_no, 7) ON c.type_code = b.new_asset_type 
 WHERE (YEAR(a.d_DueDt) = 2015) AND (MONTH(a.d_DueDt) = 1) AND (a.v_Actionflag <> 'D') AND (a.v_HospitalCode = 'IIUM')
		*/
			$this->db->select('a.v_hospitalcode, IFNULL(SUM(CASE WHEN c.qap_type = "Y" THEN 1 ELSE 0 END),0) AS qtotal, COUNT(*) AS Total, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = "C" AND (v_closeddate = d_DueDt) THEN 1 ELSE 0 END),0) AS cstotal, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = "C" THEN 1 ELSE 0 END),0) AS ctotal, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = "C" AND c.qap_type = "Y" THEN 1 ELSE 0 END),0) AS qctotal, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = "C" AND (v_closeddate <> d_DueDt) THEN 1 ELSE 0 END),0) AS cnstota, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus = "C" AND (v_closeddate <> d_DueDt) AND c.qap_type = "Y" THEN 1 ELSE 0 END),0) AS qcnstota, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus <> "C" THEN 1 ELSE 0 END),0) AS nctotal, IFNULL(SUM(CASE WHEN a.v_Wrkordstatus <> "C" AND c.qap_type = "Y" THEN 1 ELSE 0 END),0) AS qnctotal', false);
			$this->db->from('mis_asset_type_master c');
			$this->db->join('pmis2_sa_asset_mapping b','c.type_code = b.new_asset_type', 'right outer');
			$this->db->join('pmis2_egm_schconfirmmon a','b.old_asset_type = LEFT(a.v_Asset_no, 7)');
			$this->db->where('a.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('a.v_Actionflag != ', 'D');
			//$this->db->where('YEAR(a.d_DueDt)', $year);
			//$this->db->where('MONTH(a.d_DueDt)', $month);
			$this->db->where('a.d_DueDt >=', $this->dater(1,$month,$year));
			$this->db->where('a.d_DueDt <=', $this->dater(2,$month,$year));
			$this->db->where('a.v_HospitalCode' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_rcmp($month,$year){
		/*
		SELECT     IFNULL(SUM(CASE WHEN c.qap_type = 'Y' THEN 1 ELSE 0 END), 0) AS qtotal, COUNT(*) AS Total, 
                      IFNULL(SUM(CASE WHEN a.v_request_status = 'C' AND (a.v_closeddate - a.D_date < 16) THEN 1 ELSE 0 END), 0) AS cstotal, 
                      IFNULL(SUM(CASE WHEN a.v_request_status = 'C' THEN 1 ELSE 0 END), 0) AS ctotal, IFNULL(SUM(CASE WHEN a.v_request_status = 'C' AND 
                      c.qap_type = 'Y' THEN 1 ELSE 0 END), 0) AS qctotal, IFNULL(SUM(CASE WHEN a.v_request_status = 'C' AND (v_closeddate - D_date > 15) 
                      THEN 1 ELSE 0 END), 0) AS cnstota, IFNULL(SUM(CASE WHEN a.v_request_status = 'C' AND (v_closeddate - D_date > 15) AND 
                      c.qap_type = 'Y' THEN 1 ELSE 0 END), 0) AS qcnstota, IFNULL(SUM(CASE WHEN a.v_request_status <> 'C' THEN 1 ELSE 0 END), 0) AS nctotal, 
                      IFNULL(SUM(CASE WHEN a.v_request_status <> 'C' AND c.qap_type = 'Y' THEN 1 ELSE 0 END), 0) AS qnctotal
FROM         fmis.mis_asset_type_master c RIGHT OUTER JOIN
                      pmis2_SA_asset_mapping b INNER JOIN
                      pmis2_egm_service_request a ON b.old_asset_type = LEFT(a.V_Asset_no, 7) ON c.type_code = b.new_asset_type
WHERE     (YEAR(a.D_date) = 2015) AND (MONTH(a.D_date) = 3) AND (a.V_request_type = 'A4' OR
                      a.V_request_type = 'A5' OR
                      a.V_request_type = 'A8') AND (a.V_actionflag <> 'D') AND (a.V_hospitalcode = 'IIUM')
		*/
			$this->db->select('a.v_hospitalcode, IFNULL(SUM(CASE WHEN c.qap_type = "Y" THEN 1 ELSE 0 END), 0) AS qtotal, COUNT(*) AS Total, IFNULL(SUM(CASE WHEN a.v_request_status = "C" AND (a.v_closeddate - a.D_date < 16) THEN 1 ELSE 0 END), 0) AS cstotal, IFNULL(SUM(CASE WHEN a.v_request_status = "C" THEN 1 ELSE 0 END), 0) AS ctotal, IFNULL(SUM(CASE WHEN a.v_request_status = "C" AND c.qap_type = "Y" THEN 1 ELSE 0 END), 0) AS qctotal, IFNULL(SUM(CASE WHEN a.v_request_status = "C" AND (v_closeddate - D_date > 15) THEN 1 ELSE 0 END), 0) AS cnstota, IFNULL(SUM(CASE WHEN a.v_request_status = "C" AND (v_closeddate - D_date > 15) AND c.qap_type = "Y" THEN 1 ELSE 0 END), 0) AS qcnstota, IFNULL(SUM(CASE WHEN a.v_request_status <> "C" THEN 1 ELSE 0 END), 0) AS nctotal, IFNULL(SUM(CASE WHEN a.v_request_status <> "C" AND c.qap_type = "Y" THEN 1 ELSE 0 END), 0) AS qnctotal', false);
			$this->db->from('mis_asset_type_master c');
			$this->db->join('pmis2_sa_asset_mapping b','c.type_code = b.new_asset_type', 'right outer');
			$this->db->join('pmis2_egm_service_request a','b.old_asset_type = LEFT(a.v_Asset_no, 7)');
			$this->db->where('a.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('a.v_Actionflag != ', 'D');
			//$this->db->where('YEAR(a.D_date)', $year);
			//$this->db->where('MONTH(a.D_date)', $month);
			$this->db->where('a.D_date >=', $this->dater(1,$month,$year));
			$this->db->where('a.D_date <=', $this->dater(2,$month,$year));
			$this->db->where('a.v_HospitalCode' ,$this->session->userdata('hosp_code'));
			$this->db->or_where("a.V_request_type = 'A4'", NULL, FALSE);
			$this->db->or_where("a.V_request_type = 'A5'", NULL, FALSE);
			$this->db->or_where("a.V_request_type = 'A8'", NULL, FALSE);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_qc($month,$year){
		/*
		SELECT     i.v_respontime, i.V_requestor, i.V_MohDesg, i.V_phone_no, a.V_Hospitalcode, a.V_Tag_no, e.Asset_Type, e.Type_Desc, 
                      CONCAT(a.V_Hospitalcode,'-',a.V_Asset_no) AS asset_no, a.V_Asset_no, i.v_respondate AS Respondate, YEAR(i.D_date) AS Year, 
                      MONTH(i.D_date) AS Month, i.D_time, i.V_summary, i.v_closeddate AS v_closeddate, i.D_date
                      AS Requestdate, DATEDIFF(i.v_closeddate, i.D_date ) AS Duration, i.V_hospitalcode AS Expr1, i.V_Request_no, i.V_request_type, 
                      i.V_request_status, DATEDIFF(now(),i.D_date) AS Ageing, a.V_Equip_code, f.v_Equip_Desc, c.v_AssetStatus, c.v_AssetVStatus, 
                      c.v_AssetCondition, YEAR(now()) - YEAR(b.D_commission) AS Age, b.N_Cost, c.v_ChecklistCode, a.V_User_Dept_code, g.v_UserDeptDesc, 
                      a.V_Location_code,  a.D_Register_date AS RegisterDate,  b.D_commission AS CommissionDate, 
                      a.V_Make, a.V_Manufacturer, a.V_Model_no, a.V_Serial_no, a.V_Brandname,  b.V_Wrn_end_code AS WarrantyEndDate, 
                      b.V_Vendor_code
FROM         pmis2_egm_service_request i INNER JOIN
                      pmis2_EGM_AssetRegistration a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code INNER JOIN
                      Pmis2_Egm_AssetMaintenance c ON a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND 
                      b.V_Hospital_code = c.v_Hospitalcode INNER JOIN
                      PMIS2_SA_EQUIP_CODE f ON a.V_Equip_code = f.v_Equip_Code INNER JOIN
                      pmis2_SA_asset_mapping d ON a.V_Equip_code = d.old_asset_type INNER JOIN
                      pmis2_SA_MOH_Asset_type e ON d.new_asset_type = e.Asset_Type INNER JOIN
                      pmis2_SA_UserDept g ON a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode INNER JOIN
                      pmis2_EGM_AssetLocation h ON a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode and
                      i.V_hospitalcode = a.V_Hospitalcode AND i.V_Asset_no = a.V_Asset_no
WHERE     (i.V_request_type IN ('A3', 'A4', 'A5', 'A6', 'A7', 'A8')) AND (i.V_actionflag <> 'D') AND (a.V_Actionflag <> 'D') AND (b.V_ActionFlag <> 'D') AND 
                      (c.v_Actionflag <> 'D') AND (g.v_ActionFlag <> 'D') AND (h.V_Actionflag <> 'D') AND (f.v_Actionflag <> 'D') AND (a.V_service_code = 'BES') AND 
                      (i.V_servicecode IN ('BES')) AND (i.v_closeddate IS NULL) AND (DATEDIFF(now(),i.D_date) > 14)
ORDER BY YEAR(i.D_date), MONTH(i.D_date), DAY(i.D_date), i.V_hospitalcode
		*/
			$this->db->select("i.v_respontime, i.V_requestor, i.V_MohDesg, i.V_phone_no, a.V_Hospitalcode, a.V_Tag_no, e.Asset_Type, e.Type_Desc, CONCAT(a.V_Hospitalcode,'-',a.V_Asset_no) AS asset_no, a.V_Asset_no, i.v_respondate AS Respondate, YEAR(i.D_date) AS Year, MONTH(i.D_date) AS Month, i.D_time, i.V_summary, i.v_closeddate AS v_closeddate, i.D_date AS Requestdate, DATEDIFF(i.v_closeddate, i.D_date ) AS Duration, i.V_hospitalcode AS Expr1, i.V_Request_no, i.V_request_type, i.V_request_status, DATEDIFF(now(),i.D_date) AS Ageing, a.V_Equip_code, f.v_Equip_Desc, c.v_AssetStatus, c.v_AssetVStatus,c.v_AssetCondition, YEAR(now()) - YEAR(b.D_commission) AS Age, b.N_Cost, c.v_ChecklistCode, a.V_User_Dept_code, g.v_UserDeptDesc, a.V_Location_code,  a.D_Register_date AS RegisterDate,  b.D_commission AS CommissionDate, a.V_Make, a.V_Manufacturer, a.V_Model_no, a.V_Serial_no, a.V_Brandname,  b.V_Wrn_end_code AS WarrantyEndDate, b.V_Vendor_code", false);
			$this->db->from('pmis2_egm_service_request i');
			$this->db->join('pmis2_egm_assetregistration a','i.V_hospitalcode = a.V_Hospitalcode AND i.V_Asset_no = a.V_Asset_no');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code');
			$this->db->join('pmis2_egm_assetmaintenance c','a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND b.V_Hospital_code = c.v_Hospitalcode');
			$this->db->join('pmis2_sa_equip_code f','a.V_Equip_code = f.v_Equip_Code');
			$this->db->join('pmis2_sa_asset_mapping d','a.V_Equip_code = d.old_asset_type');
			$this->db->join('pmis2_sa_moh_asset_type e','d.new_asset_type = e.Asset_Type');
			$this->db->join('pmis2_sa_userdept g','a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode');
			$this->db->join('pmis2_egm_assetlocation h','a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode and i.V_hospitalcode = a.V_Hospitalcode AND i.V_Asset_no = a.V_Asset_no');
			$this->db->where('a.V_service_code', $this->session->userdata('usersess'));
			$this->db->where('i.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('i.V_actionflag != ', 'D');
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('b.V_ActionFlag != ', 'D');
			$this->db->where('c.v_Actionflag != ', 'D');
			$this->db->where('g.v_ActionFlag != ', 'D');
			$this->db->where('h.V_Actionflag != ', 'D');
			$this->db->where('f.v_Actionflag != ', 'D');
			$this->db->where('i.v_closeddate IS NULL');
			//$this->db->where('MONTH(a.D_date)', $month);
			$this->db->where('a.v_HospitalCode' ,$this->session->userdata('hosp_code'));
			$this->db->where("i.V_request_type IN ('A3', 'A4', 'A5', 'A6', 'A7', 'A8')", NULL, FALSE);
			$this->db->where('DATEDIFF(now(),i.D_date) > 14');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_qapc($month,$year){
		/*
		SELECT     WO.*, ASSET.trpi AS Expr1, ASSET.uptime_pct, IFNULL(WO.downtime_total, 0) AS downtime_totals, IFNULL(WO.completed_date, 
                      '01/01/1911') AS completed_dates, IFNULL(WO.wo_date, '01/01/1911') AS wo_dates
FROM         mis_qap_work_orders$candidate WO LEFT OUTER JOIN
                      mis_qap_inc_assets$candidate ASSET ON WO.asset_no = ASSET.asset_no AND WO.qap_period = ASSET.qap_period
WHERE     (WO.qap_period = '201305') AND (LEN(WO.siquptime_no) > 0 OR
                      LEN(WO.siqppm_no) > 0) AND (ASSET.uptime_pct < ASSET.trpi) AND (WO.hospital_code = 'MKA')
ORDER BY WO.hospital_code, ASSET.uptime_pct DESC
		*/
			$this->db->select("WO.*, ASSET.trpi AS trpi, ASSET.uptime_pct, IFNULL(WO.downtime_total, 0) AS downtime_totals, IFNULL(WO.completed_date, '01/01/1911') AS completed_dates, IFNULL(WO.wo_date, '01/01/1911') AS wo_dates", false);
			$this->db->from('mis_qap_work_orders$candidate WO');
			$this->db->join('mis_qap_inc_assets$candidate ASSET','WO.asset_no = ASSET.asset_no AND WO.qap_period = ASSET.qap_period', 'LEFT OUTER');
			$this->db->where('WO.service', $this->session->userdata('usersess'));
			$this->db->where('WO.qap_period', $year.$month);
			$this->db->where('(LENGTH(WO.siquptime_no) > 0 OR LENGTH(WO.siqppm_no) > 0)');
			//$this->db->where('MONTH(a.D_date)', $month);
			$this->db->where('WO.hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_qapac($month,$year,$grpsel){
		/*
		SELECT     m.new_asset_type, a.V_Equip_code, a.V_Asset_name, COUNT(a.V_Equip_code) AS assetcount
FROM         pmis2_EGM_AssetRegistration a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code INNER JOIN
                      Pmis2_Egm_AssetMaintenance c ON a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND 
                      b.V_Hospital_code = c.v_Hospitalcode INNER JOIN
                      PMIS2_SA_EQUIP_CODE f ON a.V_Equip_code = f.v_Equip_Code INNER JOIN
                      pmis2_SA_asset_mapping m ON a.V_Equip_code = m.old_asset_type AND a.V_Equip_code = m.old_asset_type AND 
                      a.V_Equip_code = m.old_asset_type INNER JOIN
                      pmis2_SA_MOH_Asset_type e ON m.new_asset_type = e.Asset_Type INNER JOIN
                      pmis2_SA_UserDept g ON a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode INNER JOIN
                      pmis2_EGM_AssetLocation h ON a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode LEFT OUTER JOIN
                      pmis2_sa_vendor z ON ISNULL(b.V_Vendor_code, 'NA') = z.v_vendorcode
WHERE     (a.V_Actionflag <> 'D') AND (a.V_Hospitalcode = 'MER') AND (a.V_service_code = 'BEMS') AND (b.V_ActionFlag <> 'D')
GROUP BY a.V_Equip_code, m.new_asset_type, a.V_Asset_name
ORDER BY a.V_Asset_name
		*/
			$this->db->select('m.new_asset_type, a.V_Equip_code, a.V_Asset_name, COUNT(a.V_Equip_code) AS assetcount');
			$this->db->from('pmis2_egm_assetregistration a');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code');
			$this->db->join('pmis2_egm_assetmaintenance c','a.V_Asset_no = c.v_AssetNo AND a.V_Hospitalcode = c.v_Hospitalcode AND b.V_Asset_no = c.v_AssetNo AND b.V_Hospital_code = c.v_Hospitalcode');
			$this->db->join('pmis2_sa_equip_code f','a.V_Equip_code = f.v_Equip_Code');
			$this->db->join('pmis2_sa_asset_mapping m','a.V_Equip_code = m.old_asset_type AND a.V_Equip_code = m.old_asset_type AND a.V_Equip_code = m.old_asset_type');
			$this->db->join('pmis2_sa_moh_asset_type e','m.new_asset_type = e.Asset_Type');
			$this->db->join('pmis2_sa_userdept g','a.V_User_Dept_code = g.v_UserDeptCode AND a.V_Hospitalcode = g.v_HospitalCode');
			$this->db->join('pmis2_egm_assetlocation h','a.V_Location_code = h.V_location_code AND a.V_Hospitalcode = h.V_Hospitalcode');
			$this->db->join('pmis2_sa_vendor z','b.V_Vendor_code = z.v_vendorcode', 'left outer');
			$this->db->where('a.V_service_code', $this->session->userdata('usersess'));
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('b.V_ActionFlag != ', 'D');
			$this->db->where('f.QAP_Type = ', 'Y');
			//$this->db->where('YEAR(d_date)', $year);
			//$this->db->where('MONTH(d_date)', $month);
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			$this->db->where('a.V_Hospitalcode' ,$this->session->userdata('hosp_code'));
			$this->db->group_by('a.V_Equip_code, m.new_asset_type, a.V_Asset_name');
			$this->db->order_by("a.V_Asset_name"); 
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}
			
		function rpt_vl($month,$year,$keyword){
		/*
		SELECT * FROM apbesys..pmis2_sa_vendor 
		WHERE v_vendorcode LIKE '%" & search_box & "%' OR 
		v_vendorname LIKE '%" & search_box & "%' OR 
		v_phone LIKE '%" & search_box & "%' OR 
		v_fax LIKE '%" & search_box & "%' OR 
		v_grade LIKE '%" & search_box & "%' OR 
		v_address1 LIKE '%" & search_box & "%' OR 
		v_address2 LIKE '%" & search_box & "%' OR 
		v_address3 LIKE '%" & search_box & "%' OR 
		v_contact LIKE '%" & search_box & "%' OR 
		v_hphone LIKE '%" & search_box & "%' OR 
		v_email LIKE '%" & search_box & "%' OR 
		v_regtype LIKE '%" & search_box & "%'
		*/
			$this->db->select('*', false);
			$this->db->from('pmis2_sa_vendor');
			$this->db->like('v_vendorcode',$keyword,'both');
      $this->db->or_like('v_vendorname',$keyword,'both');
      $this->db->or_like('v_phone',$keyword,'both');
      $this->db->or_like('v_fax',$keyword,'both');
      $this->db->or_like('v_grade',$keyword,'both');
      $this->db->or_like('v_address1',$keyword,'both');
      $this->db->or_like('v_address2',$keyword,'both');
      $this->db->or_like('v_address3',$keyword,'both');
      $this->db->or_like('v_contact',$keyword,'both');
      $this->db->or_like('v_hphone',$keyword,'both');
      $this->db->or_like('v_email',$keyword,'both');
      $this->db->or_like('v_regtype',$keyword,'both');
			//$this->db->where('a.V_Actionflag != ', 'D');
			//$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}	
			
			function rpt_rp1($month,$year){
		/*
		SELECT COUNT(*) AS Total FROM pmis2_egm_service_request 
		WHERE (V_request_type = 'A4' OR V_request_type = 'A5' OR V_request_type = 'A8') AND 
		(V_actionflag <> 'D') AND (V_request_status = 'C') AND (v_closeddate - D_date > 15) AND (V_hospitalcode = '" & hosp & "')
		*/
			$this->db->select('COUNT(*) AS Total', false);
			$this->db->from('pmis2_egm_service_request');
			$this->db->where('V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('V_actionflag != ', 'D');
			$this->db->where('V_request_status = ', 'C');
			$this->db->where('(V_request_type = "A4" OR V_request_type = "A5" OR V_request_type = "A8")');
			$this->db->where('datediff(v_closeddate, D_date) > 15');
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('V_hospitalcode' ,$this->session->userdata('hosp_code'));
			//$this->db->where('a.V_Actionflag != ', 'D');
			//$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}	
			
			function rpt_rp2($month,$year){
		/*
		SELECT COUNT(*) AS Total FROM pmis2_egm_service_request 
		WHERE (V_request_type = 'A4' OR V_request_type = 'A5' OR V_request_type = 'A8') AND 
		(V_actionflag <> 'D') AND (V_request_status <> 'C') AND (V_hospitalcode = '" & hosp & "')
		*/
			$this->db->select('COUNT(*) AS Total', false);
			$this->db->from('pmis2_egm_service_request');
			$this->db->where('V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('V_actionflag != ', 'D');
			$this->db->where('V_request_status != ', 'C');
			$this->db->where('(V_request_type = "A4" OR V_request_type = "A5" OR V_request_type = "A8")');
			//$this->db->where('datediff(v_closeddate, D_date) > 15');
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('V_hospitalcode' ,$this->session->userdata('hosp_code'));
			//$this->db->where('a.V_Actionflag != ', 'D');
			//$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}	
			
			function rpt_rp3($month,$year){
		/*
		SELECT COUNT(*) AS Total FROM pmis2_egm_schconfirmmon 
		WHERE (v_Actionflag <> 'D') AND (v_Wrkordstatus = 'C') AND (v_HospitalCode = '" & hosp & "') AND (v_closeddate <> d_DueDt)
		*/
			$this->db->select('COUNT(*) AS Total', false);
			$this->db->from('pmis2_egm_schconfirmmon');
			$this->db->where('v_ServiceCode', $this->session->userdata('usersess'));
			$this->db->where('v_Actionflag != ', 'D');
			$this->db->where('v_Wrkordstatus = ', 'C');
			$this->db->where('v_closeddate <> d_DueDt');
			//$this->db->where('datediff(v_closeddate, D_date) > 15');
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('V_Hospitalcode' ,$this->session->userdata('hosp_code'));
			//$this->db->where('a.V_Actionflag != ', 'D');
			//$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}
			
			function rpt_rp4($month,$year){
		/*
		SELECT COUNT(*) AS Total FROM pmis2_egm_schconfirmmon WHERE (v_Actionflag <> 'D') AND (v_Wrkordstatus <> 'C') AND (v_HospitalCode = '" & hosp & "')
		*/
			$this->db->select('COUNT(*) AS Total', false);
			$this->db->from('pmis2_egm_schconfirmmon');
			$this->db->where('v_ServiceCode', $this->session->userdata('usersess'));
			$this->db->where('v_Actionflag != ', 'D');
			$this->db->where('v_Wrkordstatus != ', 'C');
			//$this->db->where('v_closeddate <> d_DueDt');
			//$this->db->where('datediff(v_closeddate, D_date) > 15');
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('V_Hospitalcode' ,$this->session->userdata('hosp_code'));
			//$this->db->where('a.V_Actionflag != ', 'D');
			//$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}
			
			function rpt_wc($month,$year){
		/*
		SELECT DISTINCT 
                      a.V_Actionflag, a.V_Asset_no, a.V_Tag_no, a.V_Asset_name, a.V_User_Dept_code, a.V_AssetStatus, a.V_Manufacturer, a.V_Model_no, a.V_Serial_no, 
                      a.V_Hospitalcode, b.V_Vendor_code, b.N_Cost, b.V_Agent, b.V_Asset_no AS Expr1, b.V_Wrn_end_code, b.V_Hospital_code, b.D_Timestamp, 
                      b.V_username, c.v_vendorname AS vendor_name
FROM         pmis2_EGM_AssetRegistration a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code INNER JOIN
                      pmis2_sa_vendor c ON RTRIM(b.V_Vendor_code) = c.v_vendorcode
WHERE     (b.V_Hospital_code = 'PDX') AND (a.V_Actionflag <> 'D')
ORDER BY b.V_Wrn_end_code
		*/
			$this->db->select('a.V_Actionflag, CONCAT(a.V_Hospitalcode,"-",a.V_Asset_no) AS V_Asset_no, a.V_Tag_no, a.V_Asset_name, a.V_User_Dept_code, a.V_AssetStatus, a.V_Manufacturer, a.V_Model_no, a.V_Serial_no, a.V_Hospitalcode, b.V_Vendor_code, b.N_Cost, b.V_Agent, b.V_Asset_no AS Expr1, b.V_Wrn_end_code, b.V_Hospital_code, b.D_Timestamp, b.V_username, c.v_vendorname AS vendor_name', false);
			$this->db->from('pmis2_egm_assetregistration a');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Asset_no = b.V_Asset_no AND a.V_Hospitalcode = b.V_Hospital_code');
			$this->db->join('pmis2_sa_vendor c ','b.V_Vendor_code = c.v_vendorcode', false);
			$this->db->where('a.V_service_code', $this->session->userdata('usersess'));
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}
			
		function rpt_ppmuw($month,$year,$grpsel){
		/*
		SELECT     b.V_Wrn_end_code AS V_Wrn_end_code, a.*, c.v_statename, d.V_Asset_name, d.V_User_Dept_code, d.V_Model_no
FROM         pmis2_egm_schconfirmmon a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.v_Asset_no = b.V_Asset_no AND a.v_HospitalCode = b.V_Hospital_code AND ISNULL(a.d_Reschdt, a.d_DueDt) 
                      < b.V_Wrn_end_code INNER JOIN
                      pmis2_SA_Hospital c ON a.v_HospitalCode = c.v_HospitalCode INNER JOIN
                      pmis2_EGM_AssetRegistration d ON a.v_Asset_no = d.V_Asset_no AND b.V_Hospital_code = d.V_Hospitalcode
WHERE     (YEAR(ISNULL(a.d_Reschdt, a.d_DueDt)) = 2015) AND (a.v_Actionflag <> 'D') AND (YEAR(b.V_Wrn_end_code) >= 2015) AND (a.v_HospitalCode = 'BPH')
		*/
			$this->db->select('b.V_Wrn_end_code AS V_Wrn_end_code, a.*, c.v_statename, d.V_Asset_name, d.V_User_Dept_code, d.V_Model_no', false);
			$this->db->from('pmis2_egm_schconfirmmon a');
			$this->db->join('pmis2_egm_assetreg_general b','a.v_Asset_no = b.V_Asset_no AND a.v_HospitalCode = b.V_Hospital_code');
			$this->db->join('pmis2_sa_hospital c','a.v_HospitalCode = c.v_HospitalCode');
			$this->db->join('pmis2_egm_assetregistration d','a.v_Asset_no = d.V_Asset_no AND b.V_Hospital_code = d.V_Hospitalcode');
			$this->db->where('a.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('YEAR(IFNULL(a.d_Reschdt, a.d_DueDt)) =', $year);
			$this->db->where('YEAR(b.V_Wrn_end_code) >= ', $year);
			if ($grpsel <> ''){
				$this->db->where('d.v_asset_grp',$grpsel);
			}
			$this->db->where('b.V_Hospital_code' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}
			
			function rpt_rcmuw($month,$year,$grpsel){
		/*
		SELECT     b.V_Wrn_end_code AS V_Wrn_end_code, a.*, c.*, d.v_statename
FROM         pmis2_egm_service_request a INNER JOIN
                      pmis2_EGM_AssetReg_General b ON a.V_Asset_no = b.V_Asset_no AND a.V_hospitalcode = b.V_Hospital_code AND 
                      a.D_date < b.V_Wrn_end_code INNER JOIN
                      pmis2_EGM_AssetRegistration c ON a.V_Asset_no = c.V_Asset_no AND a.V_hospitalcode = c.V_Hospitalcode INNER JOIN
                      pmis2_SA_Hospital d ON a.V_hospitalcode = d.v_HospitalCode
WHERE     (a.V_actionflag <> 'D') AND (YEAR(b.V_Wrn_end_code) >= '2015') AND (YEAR(a.D_date) = '2015') AND (a.V_hospitalcode = 'BPH')
		*/
			$this->db->select('a.*, c.*, b.V_Wrn_end_code AS V_Wrn_end_code', false);
			$this->db->from('pmis2_egm_service_request a');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Asset_no = b.V_Asset_no AND a.V_hospitalcode = b.V_Hospital_code AND a.D_date < b.V_Wrn_end_code');
			$this->db->join('pmis2_egm_assetregistration c','a.V_Asset_no = c.V_Asset_no AND a.V_hospitalcode = c.V_Hospitalcode');
			$this->db->where('a.V_servicecode', $this->session->userdata('usersess'));
			$this->db->where('a.V_Actionflag != ', 'D');
			$this->db->where('c.V_Actionflag != ', 'D');
			$this->db->where('YEAR(a.D_date) =', $year);
			$this->db->where('YEAR(b.V_Wrn_end_code) >= ', $year);
			if ($grpsel <> ''){
				$this->db->where('c.v_asset_grp',$grpsel);
			}
			$this->db->where('a.V_hospitalcode' ,$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
			}
		
		function vo3general($rpt_no){
			$this->db->select('*');
			$this->db->from('ap_vo_vvfheader');
			$this->db->where('vvfReportNo',$rpt_no);
			$this->db->where('vvfactionflag <> ', 'D');
			$this->db->where('vvfHospitalcode = ', $this->session->userdata('hosp_code'));
			$query = $this->db->get();
			//echo "laalla".$query->DWRate;
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function complaintdet_form($cmplnt_no){
			$this->db->select('CD.*,P.v_PersonalCode,P.v_PersonalName,P.v_designation');
			$this->db->from('pmis2_com_complaintdet CD');
			$this->db->join('pmis2_sa_personal P','CD.v_PersonnelCode = P.v_PersonalCode','left');
			$this->db->where("v_ServiceCode = ",$this->session->userdata('usersess'));
			$this->db->where('v_ComplaintNo',$cmplnt_no);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function img($Uid){
		$this->db->select('i.file_name');
		$this->db->from('pmis2_sa_user_image i');
		$this->db->join('pmis2_sa_user u','i.v_UserID = u.v_UserID');
		$this->db->where('i.v_UserID',$Uid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		//exit();
				$query_result = $query->result();
				return $query_result;
		}
		function list_hospital()
        {
            $query = $this->db->get("pmis2_sa_hospital");
						
			$query_result = $query->result();
			return $query_result;
        }
        function list_consumables()
        {
            $query = $this->db->get("pmis2_tbl_consumables");
						
			$query_result = $query->result();
			return $query_result;
        }
        function list_vo3_asset($month,$year){
        	$this->db->select('r.V_Asset_no,r.V_Tag_no,r.D_Register_date,VO.vvfSubmissionDate');
        	$this->db->from('pmis2_egm_assetregistration r');
        	$this->db->join('ap_vo_vvfdetails VO','r.V_Asset_no = VO.vvfAssetNo AND r.V_Hospitalcode = VO.vvfHospitalCode');
        	$this->db->where('MONTH(r.D_Register_date)',$month);
        	$this->db->where('YEAR(r.D_Register_date)',$year);
        	$this->db->where('r.V_Actionflag <>','D');
        	$this->db->where('r.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
        	$this->db->order_by('r.V_Asset_no');
        	$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();	
			$query_result = $query->result();
			return $query_result;
        }
        function assetrates($ratesid)
{
//$this->db->select('COUNT(*)');
$this->db->select("*, case when dwrate=999.00 then '*' else convert(dwrate, CHAR) end dwrate1",FALSE);
$this->db->from('ap_vo_assetrates'); 
$this->db->where('actionflag <> ', 'D');
$this->db->where('ratesID',$ratesid);
$this->db->group_by('assetcategorycode, assettypecode');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}
		function assets_vvf_list($rpt_no,$m){
		$this->db->select('a.*,d.v_Mohdesc,b.V_Tag_no');
		$this->db->select("IFNULL(IFNULL(e.d_LocDate,e.v_Vdate),f.D_commission) AS D_commission,IFNULL(f.D_commission,01/01/1997) AS D_comm",FALSE);
		$this->db->from('ap_vo_vvfdetails a');
		$this->db->join('pmis2_egm_assetregistration b','b.V_Asset_no = a.vvfAssetNo AND b.V_Hospitalcode = a.vvfHospitalCode');
		$this->db->join('pmis2_sa_userdept c','b.V_User_Dept_code = c.v_UserDeptCode AND b.V_Hospitalcode = c.v_HospitalCode');
		$this->db->join('pmis2_sa_mohdept d','d.v_mohcode = c.v_Mohcode');
		$this->db->join('pmis2_egm_assetmaintenance e','a.vvfAssetNo = e.v_AssetNo');
		$this->db->join('pmis2_egm_assetreg_general f','e.v_AssetNo = f.V_Asset_no AND e.v_Hospitalcode = f.V_Hospital_code');
		$this->db->where('a.vvfReportNo',$rpt_no);
		$this->db->where('a.vvfActionflag <>','D');
		$this->db->where('b.V_Actionflag <>','D');
		$this->db->where('c.v_ActionFlag <>','D');
		$this->db->where('e.v_Hospitalcode',$this->session->userdata('hosp_code'));
		if ($m <> ''){
		$this->db->where('MONTH(vvfSubmissionDate)',$m);
		}
		$this->db->order_by('a.vvfRefNo,a.vvfVStatus,a.vvfAssetDesc,a.vvfAssetNo,a.vvfDateComm');
		$query = $this->db->get();

		//echo $this->db->last_query();
		//exit();
		return $query->result();
		}

		function assets_vvf_disp($rpt_no,$assetno){
		$this->db->select('a.*,b.D_commission');
		$this->db->from('ap_vo_vvfdetails a');
		$this->db->join('pmis2_egm_assetreg_general b','a.vvfAssetNo = b.V_Asset_no');
		$this->db->where('a.vvfReportNo',$rpt_no);
		$this->db->where('a.vvfAssetNo',$assetno);
		$this->db->where('a.vvfActionflag <>','D');
		$this->db->where('b.V_Hospital_code',$this->session->userdata('hosp_code'));
	
		$query = $this->db->get();
		//echo "laalla".$query->DWRate;
		//echo $this->db->last_query();
		//exit();
		return $query->result();

		}
		function vo3_item_general($assetno){
			
			$this->db->select('a.v_Criticality,a.v_ChecklistCode,a.v_SparelistCode,a.v_AssettypeCode,a.v_AssetCondition,a.v_AssetRefNo,a.v_AssetVStatus');
			$this->db->select('a.v_Location,a.v_Vdate,a.v_AssetStatus,a.v_SafetyTest,a.d_RefDate,a.d_LocDate,a.voclaim_period,b.new_asset_type,c.Type_Desc,c.Asset_Group');
			$this->db->from('pmis2_egm_assetmaintenance a');
			$this->db->from('pmis2_sa_asset_mapping b');
			$this->db->from('pmis2_sa_moh_asset_type c');
			$this->db->where('a.v_Hospitalcode',$this->session->userdata('hosp_code'));
			$this->db->where('a.v_AssetNo',$assetno);
			$this->db->where('a.v_Actionflag <>','D');
			$this->db->where('b.new_asset_type = c.Asset_Type');
			$this->db->where('b.service_code = c.Service_Code');
			$this->db->where('b.old_asset_type',SUBSTR($assetno,0,7));
			$query = $this->db->get();
		//echo "laalla".$query->DWRate;
		//echo $this->db->last_query();
		//exit();
		return $query->result();
		}
		function vo3_checklist_disp($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			
			$query = $this->db->get('ap_asset_heppm');
			
			if($query->num_rows()>0){
				
				$this->db->select('*');
				$this->db->from('ap_asset_heppm');
				$this->db->where('checklistCode',$variable);
				$this->db->group_by('checklistCode');
				$query = $this->db->get();
		
		//echo $this->db->last_query();
		//exit();
		return $query->result();
			}
			else{
				
				$this->db->select('*');
				$this->db->from('pmis2_sa_checklist');
				$this->db->where('v_check_code',$variable);
				$this->db->where('v_Actionflag <>','D');
				$this->db->group_by('v_check_code');
				$query = $this->db->get();
		
		//echo $this->db->last_query();
		//exit();
		return $query->result();
			}
		}
		function ratesfee_vvf_list($rpt_no,$m){
			$this->db->select('*');
			$this->db->where('vvfReportNo',$rpt_no);
			$this->db->where('vvfActionflag<>','D');
			if ($m <> ''){
			$this->db->where('MONTH(vvfSubmissionDate)',$m);
			}
			$this->db->order_by('vvfVStatus,vvfAssetNo');
			$query = $this->db->get();

			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function reporthospname($site){
			$this->db->select('v_HospitalName,v_statename');
			$this->db->from('pmis2_sa_hospital');
			$this->db->where('v_HospitalCode',$site);
			$this->db->where('v_Actionflag <>','D');
			$query = $this->db->get();

			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function loadvvfreport($rpt_no,$site){
			$this->db->select('a.*,MONTH(a.vvfSubmissionDate) AS month0, YEAR(a.vvfSubmissionDate)  AS year0,d.v_Mohdesc,b.V_Tag_no,f.d_LocDate');
			$this->db->select('IFNULL(f.d_LocDate,e.D_commission) AS D_commission,e.D_commission AS D_Comm',FALSE);
			$this->db->from('ap_vo_vvfdetails a');
			$this->db->join('pmis2_egm_assetregistration b','b.V_Asset_no = a.vvfAssetNo AND b.V_Hospitalcode = a.vvfHospitalCode');
			$this->db->join('pmis2_sa_userdept c','c.v_UserDeptCode = b.V_User_Dept_code AND c.v_HospitalCode = b.V_Hospitalcode');
			$this->db->join('pmis2_sa_mohdept d','d.v_Mohcode = c.v_mohcode');
			$this->db->join('pmis2_egm_assetreg_general e','e.V_Asset_no = a.vvfAssetNo');
			$this->db->join('pmis2_egm_assetmaintenance f','e.V_Hospital_code = f.v_Hospitalcode AND e.V_Asset_no = f.v_AssetNo AND a.vvfAssetNo = f.v_AssetNo AND f.v_Hospitalcode = a.vvfHospitalCode');
			$this->db->where('a.vvfHospitalCode',$site);
			$this->db->where('a.vvfReportNo',$rpt_no);
			$this->db->where('a.vvfActionflag <>','D');
			$this->db->where('a.vvfAssetLockedStatus =',1);
			$this->db->where('c.v_ActionFlag <>','D');
			$this->db->where('e.V_Hospital_code',$this->session->userdata('hosp_code'));
			if ($this->input->post('n_Period') <> 0){
				$this->db->where('MONTH(a.vvfSubmissionDate)',$this->input->post('n_Period'));
			}
			$this->db->order_by('a.vvfVStatus,a.vvfAssetDesc,a.vvfAssetNo,a.vvfDateComm');

			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function loadvvfsitereview($rpt_no,$site){
			$this->db->select('a.*,MONTH(a.vvfSubmissionDate) AS month0,f.v_Mohdesc,d.V_Tag_no');
			$this->db->select("IFNULL(IFNULL(b.d_LocDate,b.v_Vdate),c.D_commission) AS D_commission,IFNULL(c.D_commission,01/01/1997) AS D_comm",FALSE);
			$this->db->from('ap_vo_vvfdetails a');

			$this->db->join('pmis2_egm_assetmaintenance b','b.v_AssetNo = a.vvfAssetNo');
			$this->db->join('pmis2_egm_assetreg_general c','c.V_Hospital_code = b.v_Hospitalcode AND c.V_Asset_no = b.v_AssetNo');
			
			$this->db->join('pmis2_egm_assetregistration d','d.V_Asset_no = a.vvfAssetNo AND d.V_Hospitalcode = a.vvfHospitalCode');
			$this->db->join('pmis2_sa_userdept e','e.v_UserDeptCode = d.V_User_Dept_code AND e.v_HospitalCode = d.V_Hospitalcode');
			$this->db->join('pmis2_sa_mohdept f','f.v_Mohcode = e.v_mohcode');

			$this->db->where('a.vvfHospitalCode',$site);
			$this->db->where('a.vvfReportNo',$rpt_no);
			$this->db->where('a.vvfActionflag <>','D');
			$this->db->where('b.v_Hospitalcode',$this->session->userdata('hosp_code'));
			$this->db->where('e.v_ActionFlag <>','D');
			if ($this->input->post('n_Period') <> 0){
				$this->db->where('MONTH(a.vvfSubmissionDate)',$this->input->post('n_Period'));
			}
			$this->db->order_by('a.vvfRefNo,a.vvfVStatus,a.vvfAssetDesc,a.vvfAssetNo,a.vvfDateComm');

			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function SIQdetail_disp($ssiq){
			//$this->db->select('a.*');
			$this->db->select('a.*,b.*');
			$this->db->from('mis_qap_siq_detail a');
			$this->db->join('mis_qap_indicator_master b','a.ind_code = b.ind_code');
			$this->db->where('a.siq_no',$ssiq);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function SIQAssetGroup($siqasset){
			$this->db->select('*');
			$this->db->from('mis_qap_asset_group');
			$this->db->where('service_code','BES');
			$this->db->where('asset_group',$siqasset);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function SIQWOlist($ind_code,$ssiq){
			if ($ind_code == 'BES05'){
			$this->db->select('a.*');
			$this->db->from('mis_qap_work_orders$candidate a');
			
			$this->db->where('a.siqppm_no',$ssiq); 
			}
			elseif($ind_code == 'BES06'){
			$this->db->select('b.*');
			$this->db->from('mis_qap_inc_assets$candidate a');
			$this->db->join('mis_qap_work_orders$candidate b','a.asset_no = b.asset_no AND a.qap_period = b.qap_period','inner');
			
			$this->db->where('a.siquptime_no',$ssiq);
			}
			$this->db->order_by('wo_date','asc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function SIQ_CARdisp($ssiq){
			$this->db->select('*');
			$this->db->from('mis_qap_car_header');
			$this->db->where('siq_no',$ssiq);
			$this->db->order_by('car_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_car($ssiq,$carid){
			$this->db->select('CAR.mis_user_id AS misuserid, CAR.date_time_stamp AS timestamp, CAR.ind_code, IND.ind_sdesc, IND.ind_ldesc, CAR.qc_code, QC.qc_sdesc, QC.qc_ldesc, CAR.*');
			$this->db->from('mis_qap_car_header CAR');
			$this->db->join('mis_qap_indicator_master IND','CAR.ind_code = IND.ind_code');
			$this->db->join('mis_qap_qc_master QC','CAR.qc_code = QC.qc_code');
			$this->db->where('IND.service','BES');
			$this->db->where('CAR.car_no',$carid);
			$this->db->where('CAR.siq_no',$ssiq);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_cardisp($ssiq,$carid){
			$this->db->select('*');
			$this->db->from('mis_qap_car_header');
			$this->db->where('siq_no',$ssiq);
			$this->db->where('car_no',$carid);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_carsiqdisp($ssiq){
			$this->db->select('*');
			$this->db->from('mis_qap_siq_detail');
			$this->db->where('siq_no',$ssiq);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_carinddisp(){
			$this->db->select('*');
			$this->db->from('mis_qap_indicator_master');
			$this->db->where('service','BES');
			$result = $this->db->get();
			$return = array();
			//$return[''] = 'Please Select';
			if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
			$return[$row['ind_code']] = $row['ind_code'].' '.$row['ind_sdesc'];
			}
			}

        return $return;
		}
		function qap3_carqcdisp(){
			$this->db->select('*');
			$this->db->from('mis_qap_qc_master');
			$ic = array('B','F');
			$this->db->where_in('substr(v_IndCode,1,1)',$ic);
			$this->db->order_by('qc_code');
			$result = $this->db->get();
			$return = array();
			$return[''] = 'Please Select';
			if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
			$return[$row['qc_code']] = $row['qc_code'].' '.$row['qc_sdesc'];
			}
			}

        return $return;
		}
		function qap3_assetcodedisp($typecode){
			$this->db->select('e.v_Equip_Code,e.v_Equip_Desc');
			$this->db->from('pmis2_sa_equip_code e');
			$this->db->join('pmis2_egm_workgroupcode w','e.v_Workgroupno = w.v_WorkGroup');
			$this->db->join('pmis2_sa_asset_mapping m','e.v_Equip_Code = m.old_asset_type');
			$this->db->where('e.v_ServiceCode','BES');
			$this->db->where('m.service_code','BES');
			$this->db->where('e.v_EffectiveDt_from <=',date('Y-m-d'));
			$this->db->where('e.v_EffectiveDt_to +1 >',date('Y-m-d'));
			$this->db->where('e.v_ActiveStatus','Y');
			$this->db->where('m.new_asset_type',$typecode);
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_action($carid){
			$this->db->select('*');
			$this->db->from('mis_qap_car_detail');
			$this->db->where('car_no',$carid);
			$this->db->order_by('sl_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_actiondisp($carid,$sl_no){
			$this->db->select('*');
			$this->db->from('mis_qap_car_detail');
			$this->db->where('car_no',$carid);
			$this->db->where('sl_no',$sl_no);
			$this->db->where('action_flag <>','D');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_QCPPM_analysis($fromDate,$toDate){
			$this->db->select('A.v_QCPPM AS QC_Code,COUNT(v_QCPPM) AS Occurance');
			$this->db->from('pmis2_egm_jobdonedet A');
			$this->db->join('mis_qap_work_orders$candidate WO','A.v_Wrkordno = WO.work_order_no','inner join');
			$this->db->join('mis_qap_siq_detail SIQ','SIQ.siq_no = WO.siqppm_no','left outer');
			//$this->db->where('SIQ.siq_date >=',$fromDate);
				$this->db->where('SIQ.siq_date >=','2013-01-01');//for test
			//$where = '(SIQ.siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,$toDate)+1,0))")';
				$where = '(SIQ.siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,2015-03-01)+1,0))")';//for test
			$this->db->where($where);
			$this->db->where('SIQ.ind_code','BES05');
			//$this->db->where('SIQ.hosp_code',$this->session->userdata('hosp_code'));
				$this->db->where('SIQ.hosp_code','MKA');//for test
			$notin_qcppm = array('QC09','QC10','QC12','QC14','QC17','QC18');
			$this->db->where_not_in('WO.qc_ppm',$notin_qcppm);
			$this->db->where('WO.qc_ppm <>','');
			$this->db->where_not_in('A.v_QCPPM',$notin_qcppm);
			$this->db->where('A.v_QCPPM <>','');
			$this->db->group_by('A.v_QCPPM');
			$this->db->order_by('Occurance','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_QCUptime_analysis($fromDate,$toDate){
			$this->db->select('A.v_QCuptime AS QC_Code,SUM(CAST(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(IFNULL(A.n_Downtime,0),"*","0"),":-","."),":","."),"..","."),".0.",".")AS DECIMAL)) AS total_down_time',FALSE);
			$this->db->from('pmis2_egm_jobdonedet A');
			$this->db->join('mis_qap_work_orders$candidate C','A.v_Wrkordno = C.work_order_no');
			$this->db->where('A.v_QCuptime <>','');
			$in_qcuptime = array('QC02','QC03','QC04','QC05','QC06','QC08','QC09','QC10','QC11','QC12','QC13','QC14','QC15','QC16','QC17','QC18','QC19');
			$this->db->where_in('A.v_QCuptime',$in_qcuptime);
			//$this->db->where('A.d_DateDue >=',$fromDate);
				$this->db->where('A.d_DateDue >=','2013-01-01');//for test
			//$where = '(A.d_DateDue <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,$toDate)+1,0))")';
				$where = '(A.d_DateDue <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,2015-03-01)+1,0))")';//for test
			$this->db->where($where);
			$this->db->where('A.v_Actionflag <>','D');
			$this->db->where('C.siquptime_no <>','');
			$uptime_not_null = '(C.siquptime_no IS NOT NULL)';
			$this->db->where($uptime_not_null);
			$convert = '(CAST(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(IFNULL(A.n_Downtime,0),"*","0"),":-","."),":","."),"..","."),".0.",".")AS DECIMAL) > 0 )';
			$this->db->where($convert);
			//$this->db->where('A.v_HospitalCode',$this->session->userdata('hosp_code'));
				$this->db->where('A.v_HospitalCode','MKA');//for test
			//$this->db->where('C.hospital_code',$this->session->userdata('hosp_code'));
				$this->db->where('C.hospital_code','MKA');//for test
			$this->db->where('C.siquptime_status',NULL);
			$tc_not_null = '(C.type_code IS NOT NULL)';
			$this->db->where($tc_not_null);
			$this->db->group_by('A.v_QCuptime');
			$this->db->order_by('total_down_time','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_report($fromDate,$toDate){
			$this->db->select('WO.qc_ppm AS QC_Code,COUNT(WO.qc_ppm) AS Occurance');
			$this->db->from('mis_qap_siq_detail SIQ');
			$this->db->join('mis_qap_work_orders$candidate WO','SIQ.siq_no = WO.siqppm_no');
			//$this->db->where('SIQ.siq_date >=',$fromDate);
				$this->db->where('SIQ.siq_date >=','2013-01-01');//for test
			//$where = '(SIQ.siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,$toDate)+1,0))")';
				$where = '(SIQ.siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,2015-03-01)+1,0))")';//for test
			$this->db->where($where);
			$this->db->where('SIQ.ind_code','BES05');
			//$this->db->where('SIQ.hosp_code',$this->session->userdata('hosp_code'));
				$this->db->where('SIQ.hosp_code','MKA');//for test
			$qcppm_notin = array('QC09','QC10','QC12','QC14','QC17','QC18');
			$this->db->where_not_in('WO.qc_ppm',$qcppm_notin);
			$this->db->where('WO.qc_ppm <>','');
			$this->db->group_by('WO.qc_ppm');
			$this->db->order_by('Occurance','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3_reportsiq($fromDate,$toDate){
			$this->db->select('SUM(CASE ind_code WHEN "BES05" THEN 1 ELSE 0 END) AS ppm_siq,SUM(CASE ind_code WHEN "BES06" THEN 1 ELSE 0 END) AS uptime_siq');
			$this->db->from('mis_qap_siq_detail');
			//$this->db->where('hosp_code',$this->session->userdata('hosp_code'));
				$this->db->where('hosp_code','MKA');//for test
			//$this->db->where('siq_date >=',$fromDate);
				$this->db->where('siq_date >=','2013-01-01');//for test
			//$where = '(siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,$toDate)+1,0))")';
				$where = '(siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,2015-03-01)+1,0))")';//for test
			$this->db->where($where);
			$this->db->where('service','BES');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3reportcaro($fromDate,$toDate){
			$this->db->select('SUM(CASE C.ind_code WHEN "BES05" THEN 1 ELSE 0 END) AS ppm_car,SUM(CASE C.ind_code WHEN "BES06" THEN 1 ELSE 0 END) AS uptime_car');
			$this->db->from('mis_qap_car_header C');
			$this->db->join('mis_qap_siq_detail S','C.siq_no = S.siq_no');
			$this->db->where('S.hosp_code',$this->session->userdata('hosp_code'));
				$this->db->where('S.hosp_code','MKA');//for test
			//$this->db->where('siq_date >=',$fromDate);
				$this->db->where('S.siq_date >=','2013-01-01');//for test
			//$where = '(siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,$toDate)+1,0))")';
				$where = '(S.siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,2015-03-01)+1,0))")';//for test
			$this->db->where($where);
			$this->db->where('C.service','BES');
			$this->db->where('C.status','0');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function qap3reportcarc($fromDate,$toDate){
			$this->db->select('SUM(CASE C.ind_code WHEN "BES05" THEN 1 ELSE 0 END) AS ppm_car,SUM(CASE C.ind_code WHEN "BES06" THEN 1 ELSE 0 END) AS uptime_car');
			$this->db->from('mis_qap_car_header C');
			$this->db->join('mis_qap_siq_detail S','C.siq_no = S.siq_no');
			//$this->db->where('S.hosp_code',$this->session->userdata('hosp_code'));
				$this->db->where('S.hosp_code','MKA');//for test
			//$this->db->where('siq_date >=',$fromDate);
				$this->db->where('S.siq_date >=','2013-01-01');//for test
			//$where = '(siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,$toDate)+1,0))")';
				$where = '(S.siq_date <= "DATE_ADD(%f,-5000,DATE_ADD(%m,DATEDIFF(%c,0,2015-03-01)+1,0))")';//for test
			$this->db->where($where);
			$this->db->where('C.service','BES');
			$this->db->where('C.status','1');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function stock_asset(){
			$this->db->select('a.Hosp_code,a.Qty,b.ItemCode,REPLACE(REPLACE(b.ItemName, CHAR(10), ""), CHAR(13), "") AS ItemName',FALSE);
			$this->db->from('tbl_item_store_qty a');
			$this->db->join('tbl_invitem b','a.ItemCode = b.ItemCode','inner');
			$this->db->where('a.Hosp_code',$this->session->userdata('hosp_code'));
			$this->db->where('b.Dept',$this->session->userdata('usersess'));
			$this->db->order_by("itemname");
				//$this->db->where('a.Hosp_code','MKA');//test
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function stock_passet($ItemCode,$Hosp_code){
			$this->db->select('Price,ItemCode');
			$this->db->from('tbl_item_price_history');
			$this->db->where('ItemCode',$ItemCode);
			$this->db->where('Hosp_code',$Hosp_code);
			$this->db->order_by('Price','desc');
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();

		}
		function poprequest_rcm($hosp,$y,$m,$s){
			$this->db->select('s.V_Request_no,s.V_Asset_no,s.D_date,s.D_time,s.V_requestor,s.V_phone_no,s.V_User_dept_code,s.V_Location_code,s.V_summary,s.V_priority_code,s.V_request_status');
			$this->db->select('s.v_closeddate,s.v_closedtime,s.V_MohDesg,a.V_Asset_no,a.V_Tag_no,a.V_Serial_no,a.V_Asset_name,a.V_Manufacturer,a.V_Brandname,a.V_Model_no,b.V_PO_date,b.N_Cost');//,DATEDIFF(%m,b.D_commission,CURDATE()) AS Ages
			$this->db->from('pmis2_egm_service_request s');
			$this->db->join('pmis2_egm_assetregistration a','s.V_hospitalcode = a.V_Hospitalcode AND s.V_Asset_no = a.V_Asset_no');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Hospitalcode = b.V_Hospital_code AND a.V_Asset_no = b.V_Asset_no');
			$this->db->where('s.V_actionflag <>','D');
			$this->db->where('s.V_servicecode','BES');
			$this->db->where('s.V_hospitalcode',$hosp);
			//$this->db->where('s.V_hospitalcode','a.V_Hospitalcode');
			//$this->db->where('s.V_Asset_no','a.V_Asset_no');
			//$this->db->where('a.V_Hospitalcode','b.V_Hospital_code');
			//$this->db->where('a.V_Asset_no','b.V_Asset_no');
			$this->db->where('YEAR(s.D_date)',$y);
			//$this->db->where('MONTH(s.D_date)',$m);
			$this->db->where('MONTH(s.D_date)','04');//test
			if($s == '' or $s == 0){
				$this->db->order_by('s.V_Request_no','desc');
			}
			elseif($s == 1){
				$this->db->order_by('s.V_request_status');
			}
			elseif($s == 2){
				$this->db->order_by('s.D_date','desc');
			}
			elseif($s == 3){
				$this->db->order_by('s.V_User_dept_code','desc');
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function poprequest_ppm($hosp,$y,$m){
			$this->db->select('s.v_WrkOrdNo,s.n_StartWk,s.d_Reschdt,s.v_jobtype,s.d_DueDt,s.d_exactdate,s.v_closeddate,s.v_closedtime,s.v_Asset_no,s.v_Wrkordstatus,a.V_User_Dept_code,a.V_Asset_no AS Expr1');
			$this->db->select('a.V_Tag_no,a.V_Serial_no,a.V_Asset_name,a.V_Manufacturer,a.V_Brandname,a.V_Model_no,b.V_PO_date,b.N_Cost');//,DATEDIFF(b.D_commission,CURDATE()) AS Ages
			$this->db->from('pmis2_egm_schconfirmmon s');
			$this->db->join('pmis2_egm_assetregistration a','s.v_HospitalCode = a.V_Hospitalcode AND s.v_Asset_no = a.V_Asset_no','inner');
			$this->db->join('pmis2_egm_assetreg_general b','a.V_Hospitalcode = b.V_Hospital_code AND a.V_Asset_no = b.V_Asset_no','inner');
			$this->db->where('s.v_Actionflag <>','D');
			$this->db->where('s.v_ServiceCode','BES');
			$this->db->where('s.v_HospitalCode',$hosp);
			$this->db->where('YEAR(s.d_DueDt)',$y);
			//$this->db->where('MONTH(s.d_DueDt)',$m);
			$this->db->where('MONTH(s.d_DueDt)','01');//test
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function storeasset_detail($ItemCode,$Hosp_code){
			$this->db->select('a.Time_Stamp,a.Qty_Before,a.Qty_Taken,a.Qty_Add,a.Last_User_Update,a.Related_WO,a.Remark,a.ItemCode');
			$this->db->from('tbl_item_movement a');
			$this->db->join('tbl_invitem b','a.ItemCode = b.ItemCode','inner');
			$this->db->where('a.Store_Id',$Hosp_code);
			$this->db->where('a.ItemCode',$ItemCode);
			$this->db->order_by('a.Time_Stamp','DESC');
			$this->db->limit(5);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function pecodes($hosp){
			$this->db->select('ItemCode,ItemName');
			$this->db->from('tbl_invitem');
			$this->db->where('ItemCode NOT IN (SELECT ItemCode FROM tbl_item_store_qty WHERE Hosp_code = "'.$hosp.'")', NULL, FALSE);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function pecodes2($ic){
			$this->db->select('Id,Vendor,List_Price');
			$this->db->from('tbl_vendor');
			$this->db->where('Item_Code',$ic);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function storeasset_report($ItemCode,$m,$y){
			$this->db->select('a.Time_Stamp,a.Qty_Before,a.Qty_Taken,a.Qty_Add,a.Last_User_Update,a.Related_WO,a.Remark,a.ItemCode');
			$this->db->from('tbl_item_movement a');
			$this->db->join('tbl_invitem b','a.ItemCode = b.ItemCode','inner');
			$this->db->where('a.Store_Id','MKA');
			$this->db->where('MONTH(a.Time_Stamp)',$m);
			$this->db->where('YEAR(a.Time_Stamp)',$y);
			$this->db->where('a.ItemCode',$ItemCode);
			$this->db->order_by('a.Time_Stamp','ASC');
			
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function job_schedule($loct){
			$this->db->select('*');
			$this->db->from('set_scheduler');
			$this->db->like('Scheduler_Name',$loct,'after');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function jobsch_disp($Scheduler_Name){
			$this->db->select('*');
			$this->db->from('set_scheduler');
			$this->db->where('Scheduler_Name',$Scheduler_Name);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function list_chklist_head($asset){
			
			//$this->db->like("task_no", $asset); 
			$this->db->select("*, @rownum := @rownum + 1 as row_number, left(task_no,INSTR(task_no, '-')-1) as task_nod", false);
			$this->db->where("asset_no", $asset); 
			$this->db->where("asset_cat Is Not Null", null, false);
			//$this->db->join('(select @rownum := 0) AS r','true');
			//$this->db->join('tableTwo as b','','true');
			$query = $this->db->get("pmis2_egm_chklist cross join (select @rownum := 0) r");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_chklist_A($asset){
			
			//$this->db->like("task_no", $asset);
			$this->db->where("asset_no", $asset);  
			$this->db->where("part_n", "A");
			$query = $this->db->get("pmis2_egm_chklist");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_chklist_B($asset){
			
			//$this->db->like("task_no", $asset); 
			$this->db->where("asset_no", $asset); 
			$this->db->where("part_n", "B");
			$query = $this->db->get("pmis2_egm_chklist");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_chklist_C($asset){
			
			//$this->db->like("task_no", $asset); 
			$this->db->where("asset_no", $asset); 
			$this->db->where("part_n", "C");
			$query = $this->db->get("pmis2_egm_chklist");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_chklist_D($asset){
			
			//$this->db->like("task_no", $asset); 
			$this->db->where("asset_no", $asset); 
			$this->db->where("part_n", "D");
			$query = $this->db->get("pmis2_egm_chklist");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		function financial_list($scode,$month,$year){
			$this->db->where('Month',$month);
			$this->db->where('Year',$year);
			$this->db->where('Service_Code',$scode);
			$query = $this->db->get("financial_report");
			//echo $this->db->last_query();
			$query_result = $query->result();
			return $query_result;
		}
		
		function list_chklistbes($asset, $part){
			
			$this->db->like("checklist_no", $asset); 
			$this->db->where("part_n", $part);
			$query = $this->db->get("pmis2_egm_chklistbems");
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function typecd_chklistbes($ppmno){
			
			$this->db->select("replace (b.new_asset_type, '-', '') as typee, b.new_asset_type", false);
			$this->db->from('pmis2_egm_schconfirmmon a');
			//$this->db->join('pmis2_sa_asset_mapping b' , 'b.old_asset_type = left(a.v_Asset_no,6)');
			$this->db->join('pmis2_sa_asset_mapping b' , "b.old_asset_type = left(a.v_Asset_no,INSTR(a.v_Asset_no, '-')-1)");
			$this->db->where('v_Wrkordno',$ppmno);
			$query = $this->db->get();
			
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		
		
		function typecd_chklistbess($typecd){
			
			$this->db->select("checklist_no", false);
			$this->db->from('pmis2_egm_chklistbems');
			$this->db->where('right(left(checklist_no,9),5)',$typecd);
			$this->db->limit(1);
			$query = $this->db->get();
			
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function servicecontract($assetno){
			
			$this->db->select("*");
			$this->db->from('asset_service_contract');
			$this->db->where('asset_no',$assetno);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function request_tab_comp($month,$year)
		{
			$RN = $this->input->get('wrk_ord');
			
			$this->db->select('g.V_Wrn_end_code,r.V_Equip_code,r.V_Tag_no,r.V_AssetStatus,r.V_Manufacturer,r.V_Serial_no,r.V_Asset_name,m.v_SafetyTest,s.*');
			$this->db->from('pmis2_egm_service_request s');
			
			//$this->db->join('pmis2_egm_assetregistration r','s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode','full');
			//$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo AND r.V_hospitalcode = m.v_Hospitalcode','full'); 
			//$this->db->join('pmis2_egm_assetreg_general g','m.v_AssetNo = g.V_Asset_no AND m.v_Hospitalcode = g.V_Hospital_code','full'); 'left outer'
			
			$this->db->join('pmis2_egm_assetregistration r','s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode','left outer');
			$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo AND r.V_hospitalcode = m.v_Hospitalcode','left outer'); 
			$this->db->join('pmis2_egm_assetreg_general g','m.v_AssetNo = g.V_Asset_no AND m.v_Hospitalcode = g.V_Hospital_code','left outer');
			
			$this->db->where('s.V_Request_no',$RN);
			$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
			$this->db->where("DATE_FORMAT(s.D_date,'%m') = ",$month);
			$this->db->where("DATE_FORMAT(s.D_date,'%Y') = ",$year);
			$this->db->group_by('s.V_Asset_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function sumppm($month,$year,$grpsel)
		{
			
			//$this->db->select("COUNT(*) as total, SUM(CASE WHEN sc.v_wrkordstatus = 'A'  THEN 1 ELSE 0 END) AS notcomp, SUM(CASE WHEN sc.v_wrkordstatus = 'C' OR sc.v_wrkordstatus = 'CR' THEN 1 ELSE 0 END) AS comp, SUM(CASE WHEN sc.d_reschdt is not NULL AND sc.v_wrkordstatus = 'AR' THEN 1 ELSE 0 END) AS resch");
			$this->db->select("COUNT(*) as total, SUM(CASE WHEN sc.v_wrkordstatus = 'A'  OR (sc.v_wrkordstatus = 'AR' AND IFNULL(sc.d_reschdt,d_DueDt) < now()) THEN 1 ELSE 0 END) AS notcomp, SUM(CASE WHEN sc.v_wrkordstatus = 'C' OR sc.v_wrkordstatus = 'CR' THEN 1 ELSE 0 END) AS comp, SUM(CASE WHEN sc.d_reschdt is not NULL AND sc.v_wrkordstatus = 'AR' AND (IFNULL(sc.d_reschdt,d_DueDt) > now()) THEN 1 ELSE 0 END) AS resch", FALSE);
			$this->db->from('pmis2_egm_schconfirmmon sc');
			$this->db->join('pmis2_egm_assetregistration a','sc.v_Asset_no = a.V_Asset_no AND sc.v_HospitalCode = a.V_Hospitalcode','left outer');
			$this->db->where('sc.v_Actionflag <> ','D');
			$this->db->where('a.v_Actionflag <> ','D');
			$this->db->where('sc.v_ServiceCode = ',$this->session->userdata('usersess'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			//$this->db->where("month(d_startdt) = ",$month);
			//$this->db->where("year(d_startdt) = ",$year);
			//$this->db->where('d_startdt >=', $this->dater(1,$month,$year));
			//$this->db->where('d_startdt <=', $this->dater(2,$month,$year));
			$this->db->where('IFNULL(sc.d_reschdt,d_DueDt) >=', $this->dater(1,$month,$year));
			$this->db->where('IFNULL(sc.d_reschdt,d_DueDt) <=', $this->dater(2,$month,$year));
			$query = $this->db->get();
			//echo "dater : ".$this->dater(1,$month,$year);
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function sumrq($month,$year,$reqtype,$grpsel)
		{
			
			if ($this->session->userdata('usersess') == "FES") {
			$dn = 180;
			$de = 30;
			} elseif ($this->session->userdata('usersess') == "BES") {
			$dn = 120;
			$de = 30;
			} else {
			$dn = 15;
			$de = 5;
			}
			$this->db->select("COUNT(*) as total,SUM(CASE WHEN sr.v_request_status <> 'C' THEN 1 ELSE 0 END) AS notcomp,SUM(CASE WHEN sr.v_request_status = 'C' THEN 1 ELSE 0 END) AS comp,SUM(CASE WHEN (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) <= $dn AND sr.V_priority_code = 'Normal') OR (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) <= $de AND sr.V_priority_code = 'Emergency') THEN 1 ELSE 0 END) AS resp,SUM(CASE WHEN (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) > $dn AND sr.V_priority_code = 'Normal') OR (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) > $de AND sr.V_priority_code = 'Emergency') THEN 1 ELSE 0 END) AS resplate");
			
			$this->db->from('pmis2_egm_service_request sr');
			$this->db->join('pmis2_egm_assetregistration a','sr.V_Asset_no = a.V_Asset_no AND sr.V_hospitalcode = a.V_Hospitalcode AND a.V_Actionflag <> "D"','left outer');
			$this->db->where('sr.v_Actionflag <> ','D');
			//$this->db->where('a.V_Actionflag <> ','D');
			$this->db->where('sr.v_ServiceCode = ',$this->session->userdata('usersess'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			//$this->db->where("month(d_date) = ",$month);
			//$this->db->where("year(d_date) = ",$year);
			if ($reqtype <> ''){
				 if ($reqtype == 'F') {
				 //$this->db->like('sr.V_summary', 'floor');
				 //$this->db->or_like('sr.V_summary', 'lantai');
				 $this->db->where("(sr.V_summary LIKE '%floor%' OR sr.V_summary LIKE '%lantai%')", NULL, FALSE);
				 } elseif ($reqtype == 'WD') {
				 //$this->db->like('sr.V_summary', 'wall');
				 //$this->db->or_like('sr.V_summary', 'door');
				 //$this->db->or_like('sr.V_summary', 'dinding');
				 //$this->db->or_like('sr.V_summary', 'pintu');
				 $this->db->where("(sr.V_summary LIKE '%wall%' OR sr.V_summary LIKE '%door%' OR sr.V_summary LIKE '%dinding%' OR sr.V_summary LIKE '%pintu%')", NULL, FALSE);
				 } elseif ($reqtype == 'C') {
				 //$this->db->like('sr.V_summary', 'ceiling');
				 //$this->db->or_like('sr.V_summary', 'siling');
				 $this->db->where("(sr.V_summary LIKE '%ceiling%' OR sr.V_summary LIKE '%siling%')", NULL, FALSE);
				 } elseif ($reqtype == 'W') {
				 //$this->db->like('sr.V_summary', 'window');
				 //$this->db->or_like('sr.V_summary', 'tingkap');
				 $this->db->where("(sr.V_summary LIKE '%window%' OR sr.V_summary LIKE '%tingkap%')", NULL, FALSE);
				 } elseif ($reqtype == 'FIX') {
				 //$this->db->like('sr.V_summary', 'fixture');
				 //$this->db->or_like('sr.V_summary', 'pemasangan');
				 $this->db->where("(sr.V_summary LIKE '%fixture%' OR sr.V_summary LIKE '%pemasangan%')", NULL, FALSE);
				 } elseif ($reqtype == 'FUR') {
				 $this->db->like('sr.V_summary', 'furniture');
				 //$this->db->or_like('sr.V_summary', 'perabot');
				 //$this->db->or_like('sr.V_summary', 'kemasan');
				 //$this->db->or_like('sr.V_summary', 'fitting');
				 $this->db->where("(sr.V_summary LIKE '%furniture%' OR sr.V_summary LIKE '%perabot%' OR sr.V_summary LIKE '%kemasan%' OR sr.V_summary LIKE '%fitting%')", NULL, FALSE);
				 } else {
				 	 $this->db->where('sr.V_request_type',$reqtype);
					 }
				}
			
			$this->db->where('sr.d_date >=', $this->dater(1,$month,$year));
			$this->db->where('sr.d_date <=', $this->dater(2,$month,$year).'  23:59:59');
			function toArray($obj)
			{
    	$obj = (array) $obj;//cast to array, optional
    	return $obj['path'];
			}
			$idArray = array_map('toArray', $this->session->userdata('accessr'));//$this->session->userdata('v_UserName')
			//if ((in_array("contentcontroller/Schedule(main)", $idArray)) && ($this->session->userdata('Ser_Code')=="IIUM")) {
			if ((in_array("contentcontroller/Schedule(main)", $idArray)) && (in_array("useriium", $idArray))) {
			$this->db->where('V_request_type <> ', 'A9');
	 		}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function sumis($month,$year,$grpsel)
		{
			
			$this->db->select("COUNT(*) as total,SUM(CASE WHEN sr.v_request_status <> 'C' THEN 1 ELSE 0 END) AS notcomp,SUM(CASE WHEN sr.v_request_status = 'C' THEN 1 ELSE 0 END) AS comp,SUM(CASE WHEN (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) < 15 AND sr.V_priority_code = 'Normal') OR (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) < 5 AND sr.V_priority_code = 'Emergency') THEN 1 ELSE 0 END) AS resp,SUM(CASE WHEN (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) > 15 AND sr.V_priority_code = 'Normal') OR (TIMESTAMPDIFF(MINUTE,sr.d_date,IFNULL(sr.v_respondate,NOW())) > 5 AND sr.V_priority_code = 'Emergency') THEN 1 ELSE 0 END) AS resplate");
			$this->db->from('pmis2_egm_service_request sr');
			$this->db->join('pmis2_egm_assetregistration a','sr.V_Asset_no = a.V_Asset_no AND sr.V_hospitalcode = a.V_Hospitalcode AND a.V_Actionflag <> "D"','left outer');
			$this->db->where('sr.v_Actionflag <> ','D');
			//$this->db->where('a.V_Actionflag <> ','D');
			$this->db->where('sr.v_ServiceCode = ',$this->session->userdata('usersess'));
			$this->db->where('sr.d_date >=', $this->dater(1,$month,$year));
			$this->db->where('sr.d_date <=', $this->dater(2,$month,$year));
			$this->db->where("sr.V_request_type ","A5");
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function sumcomplnt($month,$year,$grpsel)
		{
			
			$this->db->select("COUNT(*) as total,SUM(CASE WHEN c.v_complaintstatus <> 'C' THEN 1 ELSE 0 END) AS notcomp,SUM(CASE WHEN c.v_complaintstatus = 'C' THEN 1 ELSE 0 END) AS comp");
			$this->db->from('pmis2_com_complaint c');
			$this->db->join('pmis2_egm_assetregistration a','c.v_AssetNo = a.V_Asset_no AND c.v_HospitalCode = a.V_Hospitalcode AND a.V_Actionflag <> "D"','left outer');
			$this->db->where('c.v_Actionflag <> ','D');
			//$this->db->where('a.V_Actionflag <> ','D');
			$this->db->where('c.v_ServiceCode = ',$this->session->userdata('usersess'));
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			//$this->db->where("month(d_ComplaintDt) = ",$month);
			//$this->db->where("year(d_ComplaintDt) = ",$year);
			$this->db->where('c.d_ComplaintDt >=', $this->dater(1,$month,$year));
			$this->db->where('c.d_ComplaintDt <=', $this->dater(2,$month,$year));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function sumlicsat($month,$year)
		{
			
			//$this->db->select("COUNT(*) as total,SUM(CASE WHEN A.v_ExpiryDate > now() THEN 1 ELSE 0 END) AS notlicsat,SUM(CASE WHEN A.v_ExpiryDate < now() THEN 1 ELSE 0 END) AS licsat");
			//$this->db->select("COUNT(*) as total,SUM(CASE WHEN A.v_ExpiryDate > now() THEN 1 ELSE 0 END) AS notlicsat,SUM(CASE WHEN A.v_ExpiryDate < '".$this->dater(2,$month,$year)."' THEN 1 ELSE 0 END) AS licsat");
			$this->db->select("COUNT(*) as total,SUM(CASE WHEN A.v_ActionFlag <> 'D' THEN 1 ELSE 0 END) AS notlicsat,SUM(CASE WHEN A.v_ExpiryDate < '".$this->dater(2,$month,$year)."' THEN 1 ELSE 0 END) AS licsat");
			/*$this->db->from('pmis2_egm_lnc_lincense_details');
			$this->db->where('v_Actionflag <> ','D');
			$this->db->where('v_ServiceCode = ',$this->session->userdata('usersess'));
			//$this->db->where("month(d_ComplaintDt) = ",$month);
			$this->db->where("year(v_ExpiryDate) > ",$year-1); */
			$this->db->from('pmis2_egm_lnc_lincense_details A');
			$this->db->join('pmis2_egm_lnc_license_category_code B','A.v_LicenseCategoryCode=B.v_LicenceCategoryCode');
			$this->db->where('A.v_ServiceCode =', $this->session->userdata('usersess'));
			$this->db->where('v_HospitalCode =', $this->session->userdata('hosp_code'));
			$this->db->where('A.v_ActionFlag <> ', 'D');
			$this->db->where('B.v_ActionFlag <> ', 'D');
			$this->db->where("year(v_ExpiryDate) >= ",$year-1);
			$this->db->where('v_StartDate < ', $this->dater(2,$month,$year));
			//$this->db->where('YEAR(v_StartDate) <=', $year);
			//$this->db->where('MONTH(v_StartDate) <=', $month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
function sumsat($month,$year,$grpsel)
		{
			
			//$this->db->select('v_asset_no');
			//$this->db->from('pmis2_egm_assetregistration');
			//$this->db->where('v_service_code',$this->session->userdata('usersess'));
			//$this->db->where('v_actionflag <>','D');
			//$subQuery = $this->db->_compile_select();
			
			/*$this->db->select('v_asset_no');
			$this->db->from('pmis2_egm_assetregistration');
			$this->db->where('v_service_code',$this->session->userdata('usersess'));
			$this->db->where('v_actionflag <>','D');
			$subquery = $this->db->_compile_select();

			$this->db->_reset_select();

			$this->db->select("COUNT(st.*) as total,SUM(CASE WHEN st.d_end > now() THEN 1 ELSE 0 END) AS notlicsat,SUM(CASE WHEN st.d_end < now() THEN 1 ELSE 0 END) AS licsat");
			$this->db->from('pmis2_egm_statutory st');
			$this->db->join("($subquery)  a","st.v_asset_no = a.V_Asset_no");
			$this->db->where('v_Actionflag <> ','D');
			$this->db->where('YEAR(D_start) <=', $year);
			$this->db->where('MONTH(D_start) <=', $month);
			$this->db->where('V_hospitalcode ',$this->session->userdata('hosp_code'));
			$this->db->where("year(d_end) >= ",$year-1);
			$query = $this->db->get();
			echo $this->db->last_query();
			exit();
			$query_result = $query->result();*/
			/*if ($grpsel <> ''){
				$where = ' AND v_asset_grp = '.$grpsel;
			}
			else{
				$where = '';
			}

			$query = $this->db->query("SELECT COUNT(*) as total, SUM(CASE WHEN d_end > now() THEN 1 ELSE 0 END) AS notlicsat, SUM(CASE WHEN d_end < now() THEN 1 ELSE 0 END) AS licsat 
									   FROM (pmis2_egm_statutory st)
									   INNER JOIN 
									   (SELECT v_asset_no
									   	FROM pmis2_egm_assetregistration a
									   	WHERE v_service_code = ".$this->db->escape($this->session->userdata('usersess'))."
									   	AND v_actionflag <> 'D'".$this->db->escape_str($where).") a
									   ON st.v_asset_no = a.V_Asset_no 
									   WHERE `v_Actionflag` <> 'D' 
									   AND YEAR(D_start) <= ".$this->db->escape($year)." 
									   AND MONTH(D_start) <= ".$this->db->escape($month)." 
									   AND `V_hospitalcode` = ".$this->db->escape($this->session->userdata('hosp_code'))." 
									   AND year(d_end) >= ".$this->db->escape($year-1)."");
			//AND `v_asset_no` IN (SELECT `v_asset_no` FROM fmis.pmis2_egm_assetregistration where `v_service_code` = 'BES') 
			//AND v_actionflag <> 'D' 

			echo $this->db->last_query();
			exit();
			return $query->result();*/

			$this->db->select("COUNT(*) as total,SUM(CASE WHEN st.d_end > now() THEN 1 ELSE 0 END) AS notlicsat,SUM(CASE WHEN st.d_end < now() THEN 1 ELSE 0 END) AS licsat");
			$this->db->from('pmis2_egm_statutory st');
			$this->db->join('pmis2_egm_assetregistration a','st.v_asset_no = a.V_Asset_no AND a.v_service_code = '.$this->db->escape($this->session->userdata('usersess')).' AND a.v_actionflag <> "D"');
			if ($grpsel <> ''){
				$this->db->where('a.v_asset_grp',$grpsel);
			}
			$this->db->where('st.v_Actionflag <> ','D');
			$this->db->where('YEAR(st.D_start) <=', $year);
			$this->db->where('MONTH(st.D_start) <=', $month);
			$this->db->where('st.V_hospitalcode ',$this->session->userdata('hosp_code'));
			//$this->db->where('v_ServiceCode = ',$this->session->userdata('usersess'));		
			//$this->db->where("`v_asset_no` IN (SELECT `v_asset_no` FROM fmis.pmis2_egm_assetregistration where `v_service_code` = '".$this->session->userdata('usersess')."') AND v_actionflag <> 'D'", NULL, FALSE);
			//$this->db->where("month(d_ComplaintDt) = ",$month);
			$this->db->where("year(st.d_end) >= ",$year-1);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
            
			$query_result = $query->result();
			return $query_result;
		}
		
		function rpt_rsls($month,$year, $stat = "apo2",$expiring){
		
			/*$this->db->select('v_CertificateNo, v_AgencyCode, v_LicenseCategoryCode, v_registrationno, v_Identification, v_StartDate, v_ExpiryDate, v_GradeID, v_Remarks');
			$this->db->from('pmis2_egm_lnc_lincense_details');
			$this->db->where('v_ServiceCode', $this->session->userdata('usersess'));
			$this->db->where('v_actionflag <> ', 'D');
			//$this->db->where('YEAR(d_date)', $year);
			//$this->db->where('MONTH(d_date)', $month);
			$this->db->where('v_hospitalcode',$this->session->userdata('hosp_code'));*/
			$this->db->select("A.v_CertificateNo, A.v_ServiceCode, A.v_AgencyCode, A.v_registrationno, A.v_LicenseCategoryCode, B.v_LicenceCategoryDesc, A.v_IdentificationType, A.v_Identification, A.v_RegistrationNo, A.v_StartDate, A.v_ExpiryDate, A.v_GradeID, A.v_Remarks, A.v_hospitalcode, A.v_key, A.CMIS_Action_Flag, A.d_timestamp,A.id",FALSE);
			//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
			$this->db->from('pmis2_egm_lnc_lincense_details A');
			$this->db->join('pmis2_egm_lnc_license_category_code B','A.v_LicenseCategoryCode=B.v_LicenceCategoryCode');
			$this->db->where('A.v_ServiceCode =', $this->session->userdata('usersess'));
			$this->db->where('A.v_HospitalCode =', $this->session->userdata('hosp_code'));
			$this->db->where("year(A.v_ExpiryDate) >= ",$year-1);
			$this->db->where('A.v_StartDate < ', $this->dater(2,$month,$year));
			//$this->db->where('YEAR(A.v_StartDate) <=', $year);
			//$this->db->where('MONTH(A.v_StartDate) <=', $month);
			$this->db->where('A.v_ActionFlag <> ', 'D');
			$this->db->where('B.v_ActionFlag <> ', 'D');
			//$query = $this->db->get();
			if ($stat == "ys") {
			//$this->db->where("A.v_ExpiryDate > now()");
			} elseif ($stat == "no")
			{
			//$this->db->where("A.v_ExpiryDate < now()");
      $this->db->where('A.v_ExpiryDate < ', $this->dater(2,$month,$year));
			}
			if ($expiring <> ''){
				$this->db->where('TIMESTAMPDIFF(MONTH, now(), IFNULL(A.v_ExpiryDate,now())) =',$expiring);
			}
			$this->db->order_by("A.v_ExpiryDate", "asc");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
function rpt_rsls2($month,$year, $stat = "apo2",$expiring,$grpsel){
		
	    //$this->db->select('v_asset_no');
			//$this->db->from('pmis2_egm_assetregistration');
			//$this->db->where('v_service_code',$this->session->userdata('usersess'));
			//$this->db->where('v_actionflag <>','D');
			//$subQuery = $this->db->_compile_select();
			/*if ($expiring <> ''){
				$wstring = ' AND TIMESTAMPDIFF(MONTH, now(), IFNULL(D_end,now())) = '.$expiring;
			}	
			else{
				$wstring = '';
			}
			if ($grpsel <> ''){
				$where = ' AND v_asset_grp = '.$grpsel;
			}	
			else{
				$where = '';
			}
			$query = $this->db->query("SELECT * 
									   FROM (pmis2_egm_statutory st) 
									   INNER JOIN
									   (SELECT v_asset_no
									   	FROM pmis2_egm_assetregistration a
									   	WHERE v_service_code =".$this->db->escape($this->session->userdata('usersess'))."
									   	AND v_actionflag <> 'D'".$this->db->escape_str($where).") a
									   ON st.v_asset_no = a.V_Asset_no
									   WHERE v_actionflag <> 'D' 
									   AND YEAR(D_start) <=".$this->db->escape($year)." 
									   AND MONTH(D_start) <= ".$this->db->escape($month)." 
									   AND `v_hospitalcode` = ".$this->db->escape($this->session->userdata('hosp_code'))."
									   AND IF (".$this->db->escape($stat)." = 'ys',d_end > now(),d_end < now())".$this->db->escape_str($wstring)."
									   
									   "); //AND `v_asset_no` IN (SELECT `v_asset_no` FROM pmis2_egm_assetregistration where `v_service_code` = 'BES' AND v_actionflag <> 'D')
			//AND IF (".$this->db->escape($expiring)." <> 0,TIMESTAMPDIFF(MONTH, now(), IFNULL(D_end,now())) = ".$this->db->escape($expiring).",'')
			echo $this->db->last_query();
			exit();
			return $query->result();*/

			$this->db->select('st.*');
			$this->db->from('pmis2_egm_statutory st');
			$this->db->join('pmis2_egm_assetregistration a','st.v_asset_no = a.V_Asset_no AND a.v_service_code = '.$this->db->escape($this->session->userdata('usersess')).' AND a.v_actionflag <> "D"');
			//$this->db->where('v_ServiceCode', $this->session->userdata('usersess'));
			$this->db->where('st.v_actionflag <> ', 'D');
			$this->db->where('YEAR(st.D_start) <=', $year);
			$this->db->where('MONTH(st.D_start) <=', $month);
			//$this->db->where("`v_asset_no` IN (SELECT `v_asset_no` FROM fmis.pmis2_egm_assetregistration where `v_service_code` = '".$this->session->userdata('usersess')."') AND v_actionflag <> 'D'", NULL, FALSE);
			$this->db->where('st.v_hospitalcode',$this->session->userdata('hosp_code'));
			
			if ($stat == "ys") {
			$this->db->where("st.d_end > now()");
			} elseif ($stat == "no")
			{
			$this->db->where("st.d_end < now()");
			}
			
			if ($expiring <> ''){
				$this->db->where('TIMESTAMPDIFF(MONTH, now(), IFNULL(st.D_end,now())) =',$expiring);
			}

			if ($grpsel <> ''){
				$this->db->where('v_asset_grp',$grpsel);
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
		function keyindicator($servcode,$month,$year){ 
			$this->db->select('i.v_ServiceCode,i.v_IndicatorNo,i.v_IndicatorName,r.v_Month,r.v_Year,r.n_Parameters,r.n_Revenue,r.v_Paramval,r.Demerit_Point'); //r.v_ServiceCode,r.v_IndicatorNo,
			$this->db->from('pmis2_com_indicator i');
			$this->db->join('pmis2_com_indicatorparam r','i.v_IndicatorNo = r.v_IndicatorNo AND i.v_ServiceCode = r.v_ServiceCode');
			$this->db->where('i.v_ServiceCode',$servcode);
			$this->db->where('r.v_Month',$month);
			$this->db->where('r.v_Year',$year);
			$this->db->order_by('CAST(i.v_IndicatorNo AS UNSIGNED) ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function keyindlist($servcode){ 
			$this->db->select('v_ServiceCode,v_IndicatorNo,v_IndicatorName,n_Weightage');
			$this->db->from('pmis2_com_indicator');
			$this->db->where('v_ServiceCode',$servcode);
			$this->db->order_by('CAST(v_IndicatorNo AS UNSIGNED) ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function clause_rec($wrk_ord){
			$this->db->select('*');
			$this->db->from('clause_tbl');
			$this->db->where('wo_no',$wrk_ord);
			$this->db->where('v_hospitalcode',$this->session->userdata('hosp_code'));
			$this->db->where('actionflag <>','D');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		function typecd_chklistbesasset($asset){
			
			$this->db->select("replace (new_asset_type, '-', '') as typee, new_asset_type", false);
			$this->db->from('pmis2_sa_asset_mapping');
			$this->db->where('old_asset_type',$asset);
			$query = $this->db->get();
			
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function acg_modulesf_c($serv_code,$month,$year,$rdetail,$noreq,$dept_c){
			$this->db->select('COUNT(*) AS jumlah');
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo');
			$this->db->join('pmis2_egm_assetreg_general g','r.V_Asset_no = g.V_Asset_no');
			$this->db->where('r.V_servicecode',$serv_code);
			$this->db->where('MONTH(r.D_date)',$month);
			$this->db->where('YEAR(r.D_date)',$year);
			$this->db->like('V_summary',$rdetail);
			$this->db->like('V_Request_no',$noreq);
			$this->db->like('V_User_dept_code',$dept_c);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function acg_modulesf($serv_code,$month,$year,$rdetail,$noreq,$dept_c,$limit,$start){
		
		
			$this->db->select('r.*,m.v_AssetVStatus,g.N_Cost,DATEDIFF(IFNULL(r.v_closeddate,NOW()),D_date) as datediff,TIMESTAMPDIFF(MINUTE,D_date,IFNULL(r.v_respondate,NOW())) as resptime,a.v_Status,a.v_IndicatorNo1,
							   a.v_IndicatorNo2,a.v_IndicatorNo3,a.v_IndicatorNo4,a.v_IndicatorNo5,a.v_IndicatorNo6,a.v_IndicatorNo7,a.v_IndicatorNo8,a.v_IndicatorNo9,a.v_IndicatorNo10,a.v_IndicatorNo11,a.v_VCM_Remarks',FALSE);
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo');
			$this->db->join('pmis2_egm_assetreg_general g','r.V_Asset_no = g.V_Asset_no');
			$this->db->join('acg_apb_prevcmv2 a','r.V_Request_no = a.v_requestno AND r.V_servicecode = a.v_ServiceCode','left');
			$this->db->where('r.V_servicecode',$serv_code);
			if ($_GET['tabIndex'] == '1')
			{
			$this->db->where('MONTH(r.D_date)',$month);
			$this->db->where('YEAR(r.D_date)',$year);
			}
			elseif ($_GET['tabIndex'] == '2') 
			{
    	$this->db->where('MONTH(r.D_date) < ',$month);
			$this->db->where('YEAR(r.D_date)',$year);
			$this->db->where('V_request_status <> ','C');
			} 
			elseif ($_GET['tabIndex'] == '3')
			{
			$this->db->where('MONTH(r.D_date) < ',$month);
			$this->db->where('YEAR(r.D_date)',$year);
			$this->db->where('MONTH(v_closeddate) ',$month);
    	$this->db->where('YEAR(v_closeddate) ',$year);
			$this->db->where('YEAR(r.D_date)',$year);
			$this->db->where('V_request_status = ','C');
			}
			$this->db->like('r.V_summary',$rdetail);
			$this->db->like('r.V_Request_no',$noreq);
			$this->db->like('r.V_User_dept_code',$dept_c);
			$this->db->limit($limit,$start);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function service_rec($userid){
			$this->db->select('v_userid,v_servicecode');
			$this->db->from('pmis2_sa_userservice');
			$this->db->where('v_userid',$userid);
			$this->db->group_by('v_servicecode');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function acgparam($servcode,$month,$year){
			$this->db->select('*');
			$this->db->from('pmis2_com_indicatorparam');
			$this->db->where('v_ServiceCode',$servcode);
			$this->db->where('v_Month',$month);
			$this->db->where('v_Year',$year);
			//$this->db->where('v_Month','03');
			//$this->db->where('v_Year','2016');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function acg_modulesfx($serv_code,$month,$year,$rdetail,$noreq,$dept_c){
			$this->db->select('r.*,m.v_AssetVStatus,g.N_Cost,DATEDIFF(IFNULL(r.v_closeddate,NOW()),D_date) as datediff,TIMESTAMPDIFF(MINUTE,D_date,IFNULL(r.v_respondate,NOW())) as resptime,a.v_Status,a.v_IndicatorNo1,
							   a.v_IndicatorNo2,a.v_IndicatorNo3,a.v_IndicatorNo4,a.v_IndicatorNo5,a.v_IndicatorNo6,a.v_IndicatorNo7,a.v_IndicatorNo8,a.v_IndicatorNo9,a.v_IndicatorNo10,a.v_IndicatorNo11,a.v_VCM_Remarks',FALSE);
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetmaintenance m','r.V_Asset_no = m.v_AssetNo');
			$this->db->join('pmis2_egm_assetreg_general g','r.V_Asset_no = g.V_Asset_no');
			$this->db->join('acg_apb_prevcmv2 a','r.V_Request_no = a.v_requestno AND r.V_servicecode = a.v_ServiceCode','left');
			$this->db->where('r.V_servicecode',$serv_code);
			$this->db->where('MONTH(r.D_date)',$month);
			$this->db->where('YEAR(r.D_date)',$year);
			$this->db->like('r.V_summary',$rdetail);
			$this->db->like('r.V_Request_no',$noreq);
			$this->db->like('r.V_User_dept_code',$dept_c);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function acgreport($serv_code,$month,$year){
			$this->db->select('v_ServiceCode,SUM(IFNULL(v_IndicatorNo1,0)) as ind1,SUM(IFNULL(v_IndicatorNo2,0)) as ind2,SUM(IFNULL(v_IndicatorNo3,0)) as ind3,SUM(IFNULL(v_IndicatorNo4,0)) as ind4,SUM(IFNULL(v_IndicatorNo5,0)) as ind5,SUM(IFNULL(v_IndicatorNo6,0)) as ind6,
				              SUM(IFNULL(v_IndicatorNo7,0)) as ind7,SUM(IFNULL(v_IndicatorNo8,0)) as ind8,SUM(IFNULL(v_IndicatorNo9,0)) as ind9,SUM(IFNULL(v_IndicatorNo10,0)) as ind10,SUM(IFNULL(v_IndicatorNo11,0)) as ind11',FALSE);
			$this->db->from('acg_apb_prevcmv2');
			$this->db->where('v_ServiceCode',$serv_code);
			$this->db->where('v_Month',$month);
			$this->db->where('v_Year',$year);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
		function deductmap($serv_code,$month,$year){
			$this->db->select('a.*,r.D_date,r.V_summary,r.V_Asset_no,r.V_User_dept_code,r.v_closeddate,');
			$this->db->from('acg_apb_prevcmv2 a');
			$this->db->join('pmis2_egm_service_request r','a.v_requestno = r.V_Request_no');
			$this->db->where('a.v_ServiceCode',$serv_code);
			$this->db->where('a.v_Month',$month);
			$this->db->where('a.v_Year',$year);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		function tncrequest($month,$year){
			$this->db->select('*');
			$this->db->from('pmis2_egm_service_request');
			$this->db->where('substr(V_Request_no,4,2)','A6');
			$this->db->where('MONTH(D_date)',$month);
			$this->db->where('YEAR(D_date)',$year);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		

function ppmbulkprint($startdate,$enddate){
			$this->db->select('s.v_WrkOrdNo,s.v_Asset_no,r.V_Tag_no,r.V_User_Dept_code,s.d_StartDt,s.d_DueDt');
			$this->db->from('pmis2_egm_schconfirmmon s');
			$this->db->join('pmis2_egm_assetregistration r','s.v_Asset_no = r.V_Asset_no AND s.v_HospitalCode = r.V_Hospitalcode');
			$this->db->where('v_ServiceCode',$this->session->userdata('usersess'));
			$this->db->where('s.v_Actionflag <>','D');
			$this->db->where('d_StartDt >=',$startdate);
			$this->db->where('d_StartDt <=',$enddate);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}

function wostatus($startdate,$enddate,$wostatus){
			if ($wostatus <> 'BO'){
				$this->db->select('r.D_date,r.V_Request_no,r.V_Asset_no,r.V_User_dept_code,r.V_summary,r.V_priority_code,r.V_request_status,r.v_closeddate,a.V_Tag_no');
			} else {
				$this->db->select('r.D_date,r.V_Request_no,r.V_Asset_no,r.V_User_dept_code,r.V_summary,r.V_priority_code,r.V_request_status,r.v_closeddate,a.V_Tag_no,jr.d_Date,jr.v_ActionTaken');
			}
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetregistration a','r.V_Asset_no = a.V_Asset_no AND r.V_hospitalcode = a.V_Hospitalcode');
			if ($wostatus == 'BO'){
				$this->db->join('pmis2_emg_jobresponse jr','r.V_Request_no = jr.v_WrkOrdNo','left outer');
			}
			$this->db->where('r.V_servicecode',$this->session->userdata('usersess'));
			$this->db->where('r.D_date >=',$startdate);
			$this->db->where('r.D_date <=',$enddate);
			if($wostatus <> 'A'){
				if($wostatus == 'C'){
					$this->db->where('r.V_request_status',$wostatus);
				}
				else{
					$this->db->where('r.V_request_status <>','C');
				}
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function wostatusrep($wono){
			$this->db->select('r.D_date,r.V_Request_no,r.V_Asset_no,r.V_User_dept_code,r.V_summary,r.V_priority_code,r.V_request_status,r.v_closeddate,a.V_Tag_no');
			$this->db->from('pmis2_egm_service_request r');
			$this->db->join('pmis2_egm_assetregistration a','r.V_Asset_no = a.V_Asset_no AND r.V_hospitalcode = a.V_Hospitalcode');
			$this->db->where('r.V_servicecode',$this->session->userdata('usersess'));
			$this->db->where_in('V_Request_no',$wono);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function ppmstatus($startdate,$enddate,$wostatus){
			$this->db->select('r.d_DueDt,r.v_WrkOrdNo,r.v_Asset_no,r.v_Remarks,r.v_jobtype,r.v_Wrkordstatus,r.v_closeddate,a.V_User_Dept_code');
			$this->db->from('pmis2_egm_schconfirmmon r');
			$this->db->join('pmis2_egm_assetregistration a','r.v_Asset_no = a.V_Asset_no AND r.v_HospitalCode = a.V_Hospitalcode');
			$this->db->where('r.v_ServiceCode',$this->session->userdata('usersess'));
			$this->db->where('r.d_StartDt >=',$startdate);
			$this->db->where('r.d_StartDt <=',$enddate);
			if($wostatus <> 'A'){
				if($wostatus == 'C'){
					//$this->db->where('r.v_Wrkordstatus',$wostatus);
					//$this->db->or_where('r.v_Wrkordstatus','CR');
					$where = '(r.v_Wrkordstatus = "'.$wostatus.'" or r.v_Wrkordstatus = "CR")';
					$this->db->where($where);
				}
				else{
					$this->db->where('r.v_Wrkordstatus <>','C');
					$this->db->where('r.v_Wrkordstatus <>','CR');
				}
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function ppmstatusrep($ppmno){
			$this->db->select('r.d_DueDt,r.v_WrkOrdNo,r.v_Asset_no,r.v_Remarks,r.v_jobtype,r.v_Wrkordstatus,r.v_closeddate,a.V_User_Dept_code');
			$this->db->from('pmis2_egm_schconfirmmon r');
			$this->db->join('pmis2_egm_assetregistration a','r.v_Asset_no = a.V_Asset_no AND r.v_HospitalCode = a.V_Hospitalcode');
			$this->db->where('r.v_ServiceCode',$this->session->userdata('usersess'));
			$this->db->where_in('v_WrkOrdNo',$ppmno);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function Cstatus($startdate,$enddate,$wostatus){
			$this->db->select('d_ComplaintDt,v_ComplaintNo,v_Complaint,v_UserDeptCode,v_Source,v_RequestNo,d_CompleteDt,v_ComplaintStatus');
			$this->db->from('pmis2_com_complaint');
			$this->db->where('v_ServiceCode',$this->session->userdata('usersess'));
			$this->db->where('d_ComplaintDt >=',$startdate);
			$this->db->where('d_ComplaintDt <=',$enddate);
			if($wostatus <> 'A'){
				if($wostatus == 'C'){
					$this->db->where('v_ComplaintStatus',$wostatus);
				}
				else{
					$this->db->where('v_ComplaintStatus <>','C');
				}
			}
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function Cstatusrep($Cno){
			$this->db->select('d_ComplaintDt,v_ComplaintNo,v_Complaint,v_UserDeptCode,v_Source,v_RequestNo,d_CompleteDt,v_ComplaintStatus');
			$this->db->from('pmis2_com_complaint');
			$this->db->where('v_ServiceCode',$this->session->userdata('usersess'));
			$this->db->where_in('v_ComplaintNo',$Cno);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function mppmsummary($month,$year){
			$this->db->select('s.d_DueDt,s.v_WrkOrdNo,s.v_Asset_no,a.V_Tag_no,a.V_Asset_name,a.V_User_Dept_code,s.v_jobtype,s.v_Wrkordstatus,d.v_stest,d.v_ptest,s.v_closeddate,s.v_Remarks',FALSE);
			$this->db->from('pmis2_egm_schconfirmmon s');
			$this->db->join('pmis2_egm_assetregistration a','s.v_Asset_no = a.V_Asset_no AND s.v_HospitalCode = a.V_Hospitalcode');
			$this->db->join('pmis2_egm_jobdonedet d','s.v_WrkOrdNo = d.v_Wrkordno AND s.v_HospitalCode = d.v_HospitalCode','left');
			$this->db->where('s.v_Month',$month);
			$this->db->where('s.v_year',$year);
			$this->db->where('s.v_ServiceCode',$this->session->userdata('usersess'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
function ppmudept(){
			$this->db->select('v_UserDeptCode,v_UserDeptDesc');
			$this->db->from('pmis2_sa_userdept');
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
			$this->db->where('v_ActionFlag <>','D');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		}
		
function reschPPM($startdate,$enddate){
			$this->db->select('r.d_DueDt,r.v_WrkOrdNo,r.v_Asset_no,r.v_Remarks,r.v_jobtype,r.v_Wrkordstatus,r.v_closeddate,a.V_User_Dept_code,a.V_Asset_name,a.V_Tag_no,r.d_Reschdt,v.v_ReschReason');
			$this->db->from('pmis2_egm_schconfirmmon r');
			$this->db->join('pmis2_egm_assetregistration a','r.v_Asset_no = a.V_Asset_no AND r.v_HospitalCode = a.V_Hospitalcode');
			$this->db->join('pmis2_emg_jobvisit1 v','r.v_WrkOrdNo = v.v_WrkOrdNo AND v.v_ReschReason <> " : N/A"','left');
			$this->db->where('r.v_ServiceCode',$this->session->userdata('usersess'));
			$this->db->where('r.d_StartDt >=',$startdate);
			$this->db->where('r.d_StartDt <=',$enddate);
			$this->db->where('r.v_Wrkordstatus <>','A');
			$this->db->where('r.v_Wrkordstatus <>','C');
			//$this->db->order_by('v.n_Visit','DESC');
			//$this->db->group_by('r.v_WrkOrdNo');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
		
		}
		
function equiprange(){
			$this->db->select('r.V_Equip_code AS n_code,r.V_Asset_name AS n_desc,j.v_Asset_no',FALSE);
			$this->db->from('pmis2_egm_assetjobtype j');
			$this->db->join('pmis2_egm_assetregistration r','j.v_Asset_no = r.V_Asset_no AND j.v_HospitalCode = r.V_Hospitalcode','left');
			$this->db->where('r.V_service_code',$this->session->userdata('usersess'));
			$this->db->where('j.v_HospitalCode',$this->session->userdata('hosp_code'));
			$this->db->where('j.v_Year',date("Y"));
			$this->db->where('j.v_ActionFlag <>','D');
			$this->db->group_by('r.V_Equip_code');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
}

function equiprangebycode($equipcode){
			$this->db->select('r.V_Equip_code AS n_code,r.V_Asset_name AS n_desc,j.v_Asset_no AS n_assetn,r.V_Tag_no AS n_assett,j.v_JobType AS n_jtype,j.v_Weeksch AS n_week',FALSE);
			$this->db->from('pmis2_egm_assetjobtype j');
			$this->db->join('pmis2_egm_assetregistration r','j.v_Asset_no = r.V_Asset_no AND j.v_HospitalCode = r.V_Hospitalcode','left');
			$this->db->where('r.V_service_code',$this->session->userdata('usersess'));
			$this->db->where('j.v_HospitalCode',$this->session->userdata('hosp_code'));
			$this->db->where('j.v_Year',date("Y"));
			$this->db->where('j.v_ActionFlag <>','D');
			$this->db->where_in('r.V_Equip_code',$equipcode);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
}

function deptrange(){
			$this->db->select('v_UserDeptCode AS n_code,v_UserDeptDesc AS n_desc');
			$this->db->from('pmis2_sa_userdept');
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
			$this->db->where('v_ActionFlag <>','D');
			$this->db->group_by('v_UserDeptCode');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();
}

function dispfailbank($assetno){
	$this->db->select('f.*,u.v_UserName');
	$this->db->from('battachments_details f');
	$this->db->join('pmis2_sa_user u','f.user_id = u.v_UserID');
	$this->db->where('asset_no',$assetno);
	$this->db->where('flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function wrnenddate($assetno){
	$this->db->select('r.V_Tag_no,g.V_Wrn_end_code');
	$this->db->from('pmis2_egm_assetregistration r');
	$this->db->join('pmis2_egm_assetreg_general g','r.V_Asset_no = g.V_Asset_no and r.V_Hospitalcode = g.V_Hospital_code');
	$this->db->where('r.V_Asset_no',$assetno);
	$this->db->where('r.V_ActionFlag <>','D');
	$this->db->where('r.V_Hospitalcode',$this->session->userdata('hosp_code'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function broughtfwd($month,$year){
	if ($this->session->userdata('usersess') == "FES") {
	$dn = 180;
	$de = 30;
	} elseif ($this->session->userdata('usersess') == "BES") {
	$dn = 120;
	$de = 30;
	} else {
	$dn = 15;
	$de = 5;
	}
	$this->db->select("TIMESTAMPDIFF(MONTH, d_date, IFNULL(v_closeddate,now())) AS month, SUM(CASE WHEN v_request_status <> 'C' THEN 1 ELSE 0 END) AS notcomp,  SUM(CASE WHEN v_request_status = 'C' THEN 1 ELSE 0 END) AS comp");
	
	$this->db->from('pmis2_egm_service_request');
	$this->db->where('V_servicecode', $this->session->userdata('usersess'));
	$this->db->where('TIMESTAMPDIFF(MONTH, d_date, IFNULL(v_closeddate,now())) > 0');
	$this->db->where('V_actionflag <> ', 'D');
	//$this->db->where('MONTH(d_date) <=',$month);
	//$this->db->where('YEAR(d_date) <=',$year);
	$this->db->where('d_date <=', $this->dater(2,$month,$year).'  23:59:59');
	$this->db->group_by('TIMESTAMPDIFF(MONTH, d_date, IFNULL(v_closeddate,now()))');
	function toArray($obj)
	{
$obj = (array) $obj;//cast to array, optional
return $obj['path'];
	}
	$idArray = array_map('toArray', $this->session->userdata('accessr'));//$this->session->userdata('v_UserName')
	//if ((in_array("contentcontroller/Schedule(main)", $idArray)) && ($this->session->userdata('Ser_Code')=="IIUM")) {
	if ((in_array("contentcontroller/Schedule(main)", $idArray)) && (in_array("useriium", $idArray))) {
	$this->db->where('V_request_type <> ', 'A9');
		}
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
    
	$query_result = $query->result();
	return $query_result;
}

function deptrangebycode($deptcode){
			$this->db->select('ud.v_UserDeptCode AS n_code,ud.v_UserDeptDesc AS n_desc,r.V_Asset_name AS n_adesc,j.v_Asset_no AS n_assetn,r.V_Tag_no AS n_assett,j.v_JobType AS n_jtype,j.v_Weeksch AS n_week',FALSE);
			$this->db->from('pmis2_egm_assetjobtype j');
			$this->db->join('pmis2_egm_assetregistration r','j.v_Asset_no = r.V_Asset_no AND j.v_HospitalCode = r.V_Hospitalcode','left');
			$this->db->join('pmis2_sa_userdept ud','r.V_User_Dept_code = ud.v_UserDeptCode');
			$this->db->where('r.V_service_code',$this->session->userdata('usersess'));
			$this->db->where('j.v_HospitalCode',$this->session->userdata('hosp_code'));
			$this->db->where('j.v_Year',date("Y"));
			$this->db->where('j.v_ActionFlag <>','D');
			$this->db->where('ud.v_ActionFlag <>','D');
			$this->db->where_in('r.V_User_Dept_code',$deptcode);
			//$this->db->group_by('j.v_Asset_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			return $query->result();

}

function ttlexp($month,$year,$range){
	$this->db->select('TIMESTAMPDIFF(MONTH, now(), IFNULL(v_ExpiryDate,now())) AS month,SUM(CASE WHEN v_ExpiryDate > now() THEN 1 ELSE 0 END) AS notlicsat');
	$this->db->from('pmis2_egm_lnc_lincense_details');
	//$this->db->where('MONTH(v_StartDate)',$month);
	//$this->db->where('YEAR(v_StartDate)',$year);
	$this->db->where('v_ServiceCode =', $this->session->userdata('usersess'));
	$this->db->where('v_actionflag <>','D');
	$this->db->where('V_hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('TIMESTAMPDIFF(MONTH, now(), IFNULL(v_ExpiryDate,now())) > 0');
	$this->db->where('TIMESTAMPDIFF(MONTH, now(), IFNULL(v_ExpiryDate,now())) <=',$range);
	$this->db->group_by('TIMESTAMPDIFF(MONTH, now(), IFNULL(v_ExpiryDate,now()))');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
    
	$query_result = $query->result();
	return $query_result;
}

function ttlexp2($month,$year,$range){
	$this->db->select('TIMESTAMPDIFF(MONTH, now(), IFNULL(D_end,now())) AS month,SUM(CASE WHEN D_end > now() THEN 1 ELSE 0 END) AS notlicsat');
	$this->db->from('pmis2_egm_statutory');
	//$this->db->where('MONTH(D_start)',$month);
	//$this->db->where('YEAR(D_start)',$year);
	$this->db->where('v_actionflag <>','D');
	$this->db->where('V_hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('TIMESTAMPDIFF(MONTH, now(), IFNULL(D_end,now())) > 0');
	$this->db->where('TIMESTAMPDIFF(MONTH, now(), IFNULL(D_end,now())) <=',$range);
	$this->db->group_by('TIMESTAMPDIFF(MONTH, now(), IFNULL(D_end,now()))');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
    
	$query_result = $query->result();
	return $query_result;
}



function bookingdet($b_name,$b_vol,$b_date){
	$this->db->select('*');
	$this->db->from('booking_main');
	$this->db->where('booking_name',$b_name);
	$this->db->where('booking_volume',$b_vol);
	$this->db->where('d_timestamp',$b_date);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
    
	$query_result = $query->result();
	return $query_result;
}

function get_wobookinginfo($mth,$yr,$tab)
{
  
  /*$this->db->select("a.id, a.booking_name, a.booking_volume, a.d_timestamp,a.owner, Min(b.booking_wo) AS first_wo, max(b.booking_wo) AS last_wo", FALSE);
	$this->db->join('booking_details b ','a.id = b.booking_id');
  if ($tab == '0') {
	$this->db->where('b.booking_status =', 'O'); } else
	{$this->db->where('b.booking_status =', 'U');
//$this->db->where('b.booking_status <>', 'O');
}
	$this->db->where('MONTH(a.d_timestamp) =', $mth);
	$this->db->where('YEAR(a.d_timestamp) =', $yr);
	$this->db->where('a.service_code =', $this->session->userdata('usersess'));
	$this->db->group_by('a.id, a.booking_name, a.booking_volume, a.d_timestamp','DESC', false);
	if ($tab != '0') {
	$this->db->having("COUNT(b.booking_status = 'O') < 1",null,false);}
	$this->db->order_by('a.id','DESC', false);
  $query = $this->db->get('booking_main a');
  //echo "laalla".$query->DWRate;
  echo $this->db->last_query();
  exit();
  return $query->result();*/

  	$this->db->select("a.id, a.booking_name, a.booking_volume, a.d_timestamp,a.owner, Min(b.booking_wo) AS first_wo, max(b.booking_wo) AS last_wo", FALSE);
	$this->db->join('booking_details b ','a.id = b.booking_id');
	$this->db->where('MONTH(a.d_timestamp) =', $mth);
	$this->db->where('YEAR(a.d_timestamp) =', $yr);
	$this->db->where('a.service_code =', $this->session->userdata('usersess'));
	$this->db->group_by('a.id, a.booking_name, a.booking_volume, a.d_timestamp','DESC', false);
	if ($tab != '0') {
	$this->db->having("SUM(if(b.booking_status = 'O',1,0)) < 1");
	}
	else{
	$this->db->having("SUM(if(b.booking_status = 'O',1,0)) > 0");
	}
	$this->db->order_by('a.id','DESC', false);
  	$query = $this->db->get('booking_main a');
  	//echo "laalla".$query->DWRate;
  	//echo $this->db->last_query();
  	//exit();
  	return $query->result();

}

function get_wobookingdet($whatid)
{
  
  $this->db->where('booking_id =', $whatid);
	$query = $this->db->get('booking_details');
  //echo "laalla".$query->DWRate;
  //echo $this->db->last_query();
  //exit();
  return $query->result();

}

function linkwo($wono,$month,$year){
	$this->db->select("V_Request_no");
	$this->db->from('pmis2_egm_service_request');
	$this->db->where('V_servicecode = ', $this->session->userdata('usersess'));
	$this->db->where('V_hospitalcode = ', $this->session->userdata('hosp_code'));
	if ($wono == ''){
		$this->db->where('MONTH(D_date)' ,$month);
		$this->db->where('YEAR(D_date)' ,$year);
	}
	else{
		$this->db->where("V_Request_no LIKE '%$wono%'");
	}
	$this->db->where('V_actionflag <> ','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
    
	$query_result = $query->result();
	return $query_result;
}

function rpt_sdwo($wono,$wotype){
	if ($wotype == 'Request'){
		$this->db->select('r.V_Request_no AS V_Request_no,r.D_date AS D_date,r.V_User_dept_code,d.v_UserDeptDesc,r.V_Asset_no AS V_Asset_no,a.V_Tag_no,r.V_summary AS V_summary,r.V_request_type AS V_request_type,r.V_request_status AS V_request_status,r.v_respondate AS v_respondate');
		$this->db->from('pmis2_egm_service_request r');
		$this->db->join('pmis2_sa_userdept d','r.V_User_dept_code = d.v_UserDeptCode AND r.V_hospitalcode = d.v_HospitalCode AND d.v_ActionFlag <> "D"');
		$this->db->join('pmis2_egm_assetregistration a','r.V_Asset_no = a.V_Asset_no AND a.V_Actionflag <> "D"');
		$this->db->where("r.V_Request_no LIKE '%$wono%'");
		$this->db->where('r.V_servicecode ',$this->session->userdata('usersess'));
		$this->db->where('r.V_actionflag <>','D');	
	}
	elseif($wotype == 'PPM'){
		$this->db->select('r.v_WrkOrdNo AS V_Request_no,r.d_StartDt AS D_date,a.V_User_Dept_code,d.v_UserDeptDesc,r.v_Asset_no AS V_Asset_no,a.V_Tag_no,r.v_Remarks AS V_summary,r.v_jobtype AS V_request_type,r.v_Wrkordstatus AS V_request_status,r.v_respondate AS v_respondate');
		$this->db->from('pmis2_egm_schconfirmmon r');
		$this->db->join('pmis2_egm_assetregistration a','r.V_Asset_no = a.V_Asset_no AND a.V_Actionflag <> "D"');
		$this->db->join('pmis2_sa_userdept d','a.V_User_Dept_code = d.v_UserDeptCode AND a.V_Hospitalcode = d.v_HospitalCode AND d.v_ActionFlag <> "D"');
		$this->db->where("r.v_WrkOrdNo LIKE '%$wono%'");
		$this->db->where('r.v_ServiceCode' ,$this->session->userdata('usersess'));
		$this->db->where('r.v_Actionflag <>','D');
	}
	else{
		$this->db->select('r.v_ComplaintNo AS V_Request_no,r.d_ComplaintDt AS D_date,r.v_UserDeptCode,d.v_UserDeptDesc,r.v_AssetNo AS V_Asset_no,a.V_Tag_no,r.v_ComplaintDesc AS V_summary,r.v_Priority AS V_request_type,r.v_ComplaintStatus AS V_request_status,c.d_ResponseDt AS v_respondate');
		$this->db->from('pmis2_com_complaint r');
		$this->db->join('pmis2_com_complaintdet c','r.v_ComplaintNo = c.v_ComplaintNo','left outer');
		$this->db->join('pmis2_sa_userdept d','r.v_UserDeptCode = d.v_UserDeptCode AND r.v_HospitalCode = d.v_HospitalCode AND d.v_ActionFlag <> "D"');
		$this->db->join('pmis2_egm_assetregistration a','r.v_AssetNo = a.V_Asset_no AND a.V_Actionflag <> "D"');
		$this->db->where("r.v_ComplaintNo LIKE '%$wono%'");
		$this->db->where('r.v_ServiceCode' ,$this->session->userdata('usersess'));
		$this->db->where('r.v_ActionFlag <>','D');
	}

	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}

}
?>