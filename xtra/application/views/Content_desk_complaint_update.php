<?php echo form_open('desk_complaint_update_ctrl');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"></div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Update Complaint</span></td>
					</tr>
				</table>
			</div>
			<span style="color:red; display:block; padding-left:10px; font-weight:bold;"><?php echo validation_errors(); ?></span>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr height="30px">
							<td class="ui-header-new"><b>Details</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px; height:30px;" class="ui-w">Complaint Number :</td>
										<td style="padding-left:10px;" ><input type="text" name="complaint_no" value="<?php echo set_value('complaint_no', isset($record[0]->v_ComplaintNo) == TRUE ? $record[0]->v_ComplaintNo : 'N/A')?>" size="10" class="input-none" readonly></td>
										<!--<?= isset($record[0]->v_ComplaintNo) == TRUE ? $record[0]->v_ComplaintNo : 'N/A'?>-->
									</tr>
									<tr>
										<td style="padding-left:10px;" >Requested By :</td>
										<td style="padding-left:10px;"><input type="text" name="n_requested_by" value="<?php echo set_value('n_requested_by', isset($record[0]->v_requestor) == TRUE ? $record[0]->v_requestor : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Complaint Date : </td>
										<td style="padding-left:10px;"><input type="text" id="date<?php echo $numberdate++; ?>" name="n_complaint_date" value="<?php echo set_value('n_complaint_date', isset($record[0]->d_ComplaintDt) == TRUE ? date_format(new DateTime($record[0]->d_ComplaintDt), 'd-m-Y') : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Complaint Time :</td>
										<td style="padding-left:10px;"><input type="time" name="n_complaint_time" value="<?php echo set_value('n_complaint_time', isset($record[0]->d_ComplaintTime) == TRUE ? $record[0]->d_ComplaintTime : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Designation : </td>
										<td style="padding-left:10px;" valign="top">	
											<input type="radio" id="radio-1-1" name="n_designation" class="regular-radio" value = "Doctor" <?php echo set_radio('n_designation', 'Doctor', TRUE); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Doctor' ? 'checked' : ''?> />   
											<label for="radio-1-1"></label> Doctor<br>
											<input type="radio" id="radio-1-2" name="n_designation" class="regular-radio" value = "Matron" <?php echo set_radio('n_designation', 'Matron'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Matron' ? 'checked' : ''?>/>   
											<label for="radio-1-2"></label> Matron<br>
											<input type="radio" id="radio-1-3" name="n_designation" class="regular-radio" value = "Medical Assistant" <?php echo set_radio('n_designation', 'Medical Assistant'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Medical Assistant' ? 'checked' : ''?>/>   
											<label for="radio-1-3"></label> Medical Assistant<br>
											<input type="radio" id="radio-1-4" name="n_designation" class="regular-radio" value = "IIUM Officer" <?php echo set_radio('n_designation', 'IIUM Officer'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'IIUM Officer' ? 'checked' : ''?>/>   
											<label for="radio-1-4"></label> IIUM Officer<br>
											<input type="radio" id="radio-1-5" name="n_designation" class="regular-radio" value = "Sister In-Charge" <?php echo set_radio('n_designation', 'Sister In-Charge'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Sister In-Charge' ? 'checked' : ''?>/>   
											<label for="radio-1-5"></label> Sister In-Charge<br>
											<input type="radio" id="radio-1-6" name="n_designation" class="regular-radio" value = "Sister On Duty" <?php echo set_radio('n_designation', 'Sister On Duty'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Sister On Duty' ? 'checked' : ''?>/>   
											<label for="radio-1-6"></label> Sister On Duty<br>
											<input type="radio" id="radio-1-7" name="n_designation" class="regular-radio" value = "Specialist" <?php echo set_radio('n_designation', 'Specialist'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Specialist' ? 'checked' : ''?>/>   
											<label for="radio-1-7"></label> Specialist<br>
											<input type="radio" id="radio-1-8" name="n_designation" class="regular-radio" value = "Staff Nurse" <?php echo set_radio('n_designation', 'Staff Nurse'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Staff Nurse' ? 'checked' : ''?>/>   
											<label for="radio-1-8"></label> Staff Nurse<br>
											<input type="radio" id="radio-1-9" name="n_designation" class="regular-radio" value = "Supervisor" <?php echo set_radio('n_designation', 'Supervisor'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'Supervisor' ? 'checked' : ''?>/>   
											<label for="radio-1-9"></label> Supervisor<br>
											<input type="radio" id="radio-1-10" name="n_designation" class="regular-radio" value = "APSB" <?php echo set_radio('n_designation', 'APSB'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'APSB' ? 'checked' : ''?>/>   
											<label for="radio-1-10"></label> APSB<br>
											<input type="radio" id="radio-1-11" name="n_designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_designation', 'PMSB'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'PMSB' ? 'checked' : ''?>/>   
											<label for="radio-1-11"></label> PMSB<br>
											<input type="radio" id="radio-1-12" name="n_designation" class="regular-radio" value = "APFMS" <?php echo set_radio('n_designation', 'APFMS'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Designation == 'APFMS' ? 'checked' : ''?>/>   
											<label for="radio-1-12"></label> APFMS<br>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Priority :  </td>
										<td style="padding-left:10px;" valign="top">	
											<input type="radio" id="radio-1-13" name="n_priority" class="regular-radio"  value = "Normal" <?php echo set_radio('n_priority', 'Normal',TRUE); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Priority == 'N' ? 'checked' : ''?>/>   
											<label for="radio-1-13"></label> Normal<br>
											<input type="radio" id="radio-1-14" name="n_priority" class="regular-radio" value = "Emergency" <?php echo set_radio('n_priority', 'Emergency'); ?><?= isset($record[0]->v_ComplaintNo) && $record[0]->v_Priority == 'E' ? 'checked' : ''?>/>   
											<label for="radio-1-14"></label><span style="color:red;"> Emergency</span><br>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Source :  </td>
										<td style="padding-left:10px;" valign="top">	
											<input type="radio" id="radio-1-15" name="n_source" onclick="javascript:fShowSource('N');" class="regular-radio" value = "IIUM" <?php echo set_radio('n_source', 'IIUM', TRUE); ?><?= isset($record[0]->v_Source) && $record[0]->v_Source == 'IIUM' ? 'checked' : ''?>/>   
											<label for="radio-1-15"></label> IIUM<br>
											<input type="radio" id="radio-1-16" name="n_source" onclick="javascript:fShowSource('Y');" class="regular-radio" value = "PMSB" <?php echo set_radio('n_source', 'PMSB'); ?><?= isset($record[0]->v_Source) && $record[0]->v_Source == 'PMSB' ? 'checked' : ''?>/>   
											<label for="radio-1-16"></label> PMSB<br>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">NCR No : </td>
										
										<?php if ((isset($record[0]->v_Source) && $record[0]->v_Source == 'PMSB') || $this->input->post('n_source') == 'PMSB') { ?>
										<td><input type="text" id="n_ncr_no" name="n_ncr_no" style="display:block;" value="<?php echo set_value('n_ncr_no', isset($record[0]->v_Reference) == TRUE ? $record[0]->v_Reference : 'N/A')?>" class="form-control-button" style="width:74%;"></td>
										<?php } else {  ?>
										<td><input type="text" id="n_ncr_no" name="n_ncr_no" style="display:none;" value="" class="form-control-button" style="width:74%;"></td>
										<?php } ?>
										<!--<td><input type="text" id="n_ncr_no" name="n_ncr_no" style="display:none;" value="<?php echo set_value('n_ncr_no'); ?>" class="form-control-button n_wi-date2"></td>-->
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">VCM Month :  </td>
										
										<?php if ((isset($record[0]->v_Source) && $record[0]->v_Source == 'PMSB') || $this->input->post('n_source') == 'PMSB') { ?>
										<td><input type="text" id="vcm_month" name="vcm_month" style="display:block;" value="<?php echo set_value('vcm_month', isset($vcmdate[0]) == TRUE ? $vcmdate[0] : 'N/A')?>" class="form-control-button" style="width:74%;"></td>
										<?php } else { ?>
										<td><input type="text" id="vcm_month" name="vcm_month" style="display:none;" value="" class="form-control-button" style="width:74%;"></td>
										<?php } ?>
										<!--<td><input type="text" id="vcm_month" name="vcm_month" style="display:none;" value="<?php echo set_value('vcm_month'); ?>" class="form-control-button n_wi-date2"></td>-->
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">VCM Year :   </td>
										
										<?php if ((isset($record[0]->v_Source) && $record[0]->v_Source == 'PMSB') || $this->input->post('n_source') == 'PMSB') { ?>
										<td><input type="text" id="vcm_year" name="vcm_year" style="display:block;" value="<?php echo set_value('vcm_year', isset($vcmdate[1]) == TRUE ? $vcmdate[1] : 'N/A')?>" class="form-control-button" style="width:74%;"></td>
										<?php } else { ?>
										<td><input type="text" id="vcm_year" name="vcm_year" style="display:none;" value="" class="form-control-button" style="width:74%;"></td>
										<?php } ?>
										<!--<td><input type="text" id="vcm_year" name="vcm_year" style="display:none;" value="<?php echo set_value('vcm_year'); ?>" class="form-control-button n_wi-date2"></td>-->
									</tr>
									
									<tr>
										<td style="padding-left:10px;" valign="top">Summary : </td>
										<td style="padding-left:10px;"><textarea name="n_summary" class="input n_com2"><?php echo set_value('n_summary', isset($record[0]->v_Complaint) == TRUE ? $record[0]->v_Complaint : 'N/A')?></textarea></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;" valign="top">Description : </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_description"><?php echo set_value('n_description', isset($record[0]->v_ComplaintDesc) == TRUE ? $record[0]->v_ComplaintDesc : 'N/A')?></textarea></td>
									</tr>																																						
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Complaint Action</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Personnel Code :   </td>
										<td style="padding-left:10px;" ><input type="text" id="n_personnel_code" name="n_personnel_code" value="<?php echo set_value('n_personnel_code', isset($records[0]->v_PersonnelCode) == TRUE ? $records[0]->v_PersonnelCode : 'N/A')?>" class="form-control-button n_wi-eq3" readonly> <span class="icon-windows" onclick="fCallassetdetailname(this)" value=""></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Personnel Name :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_personnel_name" name="n_personnel_name" value="<?php echo set_value('n_personnel_name', isset($records[0]->v_PersonalName) == TRUE ? $records[0]->v_PersonalName : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Designation :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_Desig" name="n_Desig" value="<?php echo set_value('n_Desig', isset($records[0]->v_designation) == TRUE ? $records[0]->v_designation : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Start Date : </td>
										<td style="padding-left:10px;"><input type="text" id="date<?php echo $numberdate++; ?>" name="n_startdate" value="<?php echo set_value('n_startdate', isset($records[0]->d_follow_startdate) == TRUE ? date_format(new DateTime($records[0]->d_follow_startdate), 'd-m-Y') : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Start Time :   </td>
										<td style="padding-left:10px;"><input type="time" name="n_starttime" value="<?php echo set_value('n_starttime', isset($records[0]->v_follow_starttime) == TRUE ? $records[0]->v_follow_starttime : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">End Date :   </td>
										<td style="padding-left:10px;"><input type="text" id="date<?php echo $numberdate++; ?>" name="n_enddate" value="<?php echo set_value('n_enddate', isset($records[0]->d_follow_enddate) == TRUE ? date_format(new DateTime($records[0]->d_follow_enddate), 'd-m-Y') : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;">*End Time :   </td>
										<td style="padding-left:10px;"><input type="time" name="n_endtime" value="<?php echo set_value('n_endtime', isset($records[0]->v_follow_endtime) == TRUE ? $records[0]->v_follow_endtime : 'N/A')?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Complaint Findings :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_actiontaken"><?php echo set_value('n_actiontaken', isset($records[0]->v_Remark) == TRUE ? $records[0]->v_Remark : 'N/A')?></textarea></td>
									</tr>		
									<tr>
										<td style="padding-left:10px;" valign="top">Root Cause :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_rootcause"><?php echo set_value('n_rootcause', isset($records[0]->v_rootcause) == TRUE ? $records[0]->v_rootcause : 'N/A')?></textarea></td>
									</tr>		
									<tr>
										<td style="padding-left:10px;" valign="top">Corrective Action :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_correctiveact"><?php echo set_value('n_correctiveact', isset($records[0]->v_correctiveact) == TRUE ? $records[0]->v_correctiveact : 'N/A')?></textarea></td>
									</tr>		
									<tr>
										<td style="padding-left:10px;" valign="top">Preventive Action :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_preventiveact"><?php echo set_value('n_preventiveact', isset($records[0]->v_preventiveact) == TRUE ? $records[0]->v_preventiveact : 'N/A')?></textarea></td>
									</tr>																																																													
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table class="ui-content-form-reg" >
						<tr height="30px">
							<td class="ui-header-new"><b>Details of Related Request</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Request Number : </td>
										<td style="padding-left:10px;" ><input type="text" id="n_request_number" name="n_request_number" value="<?php echo set_value('n_request_number', isset($recordreq[0]->V_Request_no) == TRUE ? $recordreq[0]->V_Request_no : 'N/A')?>" class="form-control-button n_wi-eq3" readonly> <span class="icon-windows" onclick="fCallR_number()"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Request Status :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_request_status" name="n_request_status" value="<?php echo set_value('n_request_status', isset($recordreq[0]->V_request_status) == TRUE ? $recordreq[0]->V_request_status : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Requested By : </td>
										<td style="padding-left:10px;"><input type="text" id="n_requested_by2" name="n_requested_by2" value="<?php echo set_value('n_requested_by2', isset($recordreq[0]->V_requestor) == TRUE ? $recordreq[0]->V_requestor : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Requested Date : </td>
										<td style="padding-left:10px;"><input type="text" id="n_requested_date" name="n_requested_date" value="<?php echo set_value('n_requested_date', isset($recordreq[0]->D_date) == TRUE ? date_format(new DateTime($recordreq[0]->D_date), 'd-m-Y H:i') : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Priority : </td>
										<td style="padding-left:10px;"><input type="text" id="n_priority2" name="n_priority2" value="<?php echo set_value('n_priority2', isset($recordreq[0]->V_priority_code) == TRUE ? $recordreq[0]->V_priority_code : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Summary : </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" id="n_summary2" name="n_summary2" readonly><?php echo set_value('n_summary2', isset($recordreq[0]->V_summary) == TRUE ? $recordreq[0]->V_summary : 'N/A')?></textarea></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Tag Number : </td>
										<td style="padding-left:10px;"><input type="text" id="n_asset_tag_number" name="n_asset_tag_number" value="<?php echo set_value('n_asset_tag_number', isset($recordreq[0]->V_Tag_no) == TRUE ? $recordreq[0]->V_Tag_no : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Number :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_asset_no" name="n_asset_no" value="<?php echo set_value('n_asset_no', isset($recordreq[0]->V_Asset_no) == TRUE ? $recordreq[0]->V_Asset_no : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Serial Number : </td>
										<td style="padding-left:10px;"><input type="text" id="n_asset_serial_number" name="n_asset_serial_number" value="<?php echo set_value('n_asset_serial_number', isset($recordreq[0]->V_Serial_no) == TRUE ? $recordreq[0]->V_Serial_no : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Phone Number : </td>
										<td style="padding-left:10px;"><input type="text" id="n_phone_numberat" name="n_phone_numberat" value="<?php echo set_value('n_phone_numberat', isset($recordreq[0]->V_phone_no) == TRUE ? $recordreq[0]->V_phone_no : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">User Department : </td>
										<td style="padding-left:10px;"><input type="text" id="n_user_department3" name="n_user_reg_department" value="<?php echo set_value('n_user_reg_department', isset($recordreq[0]->V_User_dept_code) == TRUE ? $recordreq[0]->V_User_dept_code : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;">Location :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_location3" name="n_reg_location" value="<?php echo set_value('n_reg_location', isset($recordreq[0]->V_Location_code) == TRUE ? $recordreq[0]->V_Location_code : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;">Request Closed On : </td>
										<td style="padding-left:10px;"><input type="text" id="n_request_closed_on" name="n_request_closed_on" value="<?php echo set_value('n_request_closed_on', isset($recordreq[0]->v_closeddate) == TRUE ? date_format(new DateTime($recordreq[0]->v_closeddate), 'd-m-Y H:i') : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>																																								
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td class="ui-header-new"><b>Location</b></td>
						</tr>
						<tr>
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Phone Number :  </td>
										<td style="padding-left:10px;" ><input type="text" id="n_phone_number" name="n_phone_number" value="<?php echo set_value('n_phone_number', isset($record[0]->v_Phone) == TRUE ? $record[0]->v_Phone : 'N/A')?>" class="form-control-button n_wi-eq3"  readonly> <span class="icon-windows" onclick="fpop_location_user()"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">User Department :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_user_department" name="n_user_department" value="<?php echo set_value('n_user_department', isset($record[0]->v_UserDeptCode) == TRUE ? $record[0]->v_UserDeptCode : 'N/A')?>" class="form-control-button n_wi-eq3" readonly> <span class="icon-windows" onclick="fCalllocation()"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">&nbsp; </td>
										<td style="padding-left:10px;"><input type="text" id="n_user_department1" name="n_user_department1" value="<?php echo set_value('n_user_department1', isset($record[0]->v_UserDeptDesc) == TRUE ? $record[0]->v_UserDeptDesc : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Location : </td>
										<td style="padding-left:10px;"><input type="text" id="n_location" name="n_location" value="<?php echo set_value('n_location', isset($record[0]->v_Location) == TRUE ? $record[0]->v_Location : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">&nbsp; </td>
										<td style="padding-left:10px;"><input type="text" id="n_location2" name="n_location2" value="<?php echo set_value('n_location2', isset($record[0]->v_Location_Name) == TRUE ? $record[0]->v_Location_Name : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
									</tr>																																				
								</table>
							</td>
						</tr>						
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Related Asset</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Asset Number :  </td>
										<td style="padding-left:10px;" ><input type="text" id="n_asset_number" name="n_asset_number" value="<?php echo set_value('n_asset_number', isset($record[0]->v_AssetNo) == TRUE ? $record[0]->v_AssetNo : 'N/A')?>" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fCallassetsnumber(this)" value="compup"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Tag Number :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_tag_number"  name="n_tag_number" value="<?php echo set_value('n_tag_number', isset($record[0]->V_Tag_no) == TRUE ? $record[0]->V_Tag_no : 'N/A')?>" class="form-control-button2 n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Serial Number :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_serial_number" name="n_serial_number" value="<?php echo set_value('n_serial_number', isset($record[0]->V_Serial_no) == TRUE ? $record[0]->V_Serial_no : 'N/A')?>" class="form-control-button2" style="border:none; width:100%;"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Name :	 </td>
										<td style="padding-left:10px;"><input type="text" id="n_name" name="n_name" value="<?php echo set_value('n_name', isset($record[0]->V_Asset_name) == TRUE ? $record[0]->V_Asset_name : 'N/A')?>" class="form-control-button2" style="border:none; width:100%;"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Warranty Expiry Date : 	 </td>
										<td style="padding-left:10px;"><input type="text" id="n_wrn_end" name="n_wrn_end" value="<?php echo set_value('n_wrn_end', isset($record[0]->V_Wrn_end_code) == TRUE ? date_format(new DateTime($record[0]->V_Wrn_end_code), 'd-m-Y') : 'N/A')?>" class="form-control-button2" style="border:none; width:100%;"></td>
									</tr>																																						
								</table>
							</td>
						</tr>						
					</table>
				</div>
				<div class="middle_d">
					<table  class="ui-content-form-reg" style="">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Closing</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Close Date :    </td>
										<td style="padding-left:10px;"><input type="text" id="date<?php echo $numberdate++; ?>" name="n_close_date" value="<?php echo set_value('n_close_date', isset($record[0]->d_CompleteDt) == TRUE ? date_format(new DateTime($record[0]->d_CompleteDt), 'd-m-Y') : '')?>" class="form-control-button2 n_wi-date2"></td>
									</tr>																																																													
								</table>
							</td>
						</tr>						
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center"><input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm"></td>
				</tr>
			</table>
			<?php echo form_hidden('cmplnt_no',$this->input->post('cmplnt_no')) ?>
		</div>
	</div>
</div>
<script language="javascript" type="text/javascript">
	function fShowSource(sTest)
	{
		if (sTest == "Y")
			{
				document.getElementById('n_ncr_no').style.display = "block"
				document.getElementById('vcm_month').style.display = "block"
				document.getElementById('vcm_year').style.display = "block"
				
			}
		
		else
			{
				document.getElementById('n_ncr_no').style.display = "none"
				document.getElementById('vcm_month').style.display = "none"
				document.getElementById('vcm_year').style.display = "none"
				document.getElementById("n_ncr_no").value = ""
				document.getElementById("vcm_month").value = ""
				document.getElementById("vcm_year").value = ""
			}
	}
</script>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
