<?php echo form_open('desk_complaint_update_ctrl/comfirmation ');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"></div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm Complaint</span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Details</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
											<td style="padding-left:10px; height:30px;" class="ui-w">Complaint Number :</td>
											<td style="padding-left:10px;" ><?= isset($record[0]->v_ComplaintNo) == TRUE ? $record[0]->v_ComplaintNo : 'N/A'?></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Requested By :</td>
											<td style="padding-left:10px;"><input type="text" name="n_requested_by" value="<?php echo set_value('n_requested_by'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Complaint Date : </td>
											<td style="padding-left:10px;"><input type="text" name="n_complaint_date" value="<?php echo set_value('n_complaint_date'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Complaint Time :</td>
											
											<td style="padding-left:10px;"><input type="time" name="n_complaint_time" value="<?php echo set_value('n_complaint_time',date("H:i")); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Designation : </td>
											<td style="padding-left:10px;" valign="top"><input type="text" id="" name="n_designation" value="<?php echo set_value('n_designation'); ?>" class="form-control-button n_wi-date2"  disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Priority :  </td>
											<td style="padding-left:10px;" valign="top"><input type="text" id="" name="n_priority" value="<?php echo set_value('n_priority'); ?>" class="form-control-button n_wi-date2"  disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Source :  </td>
											<td style="padding-left:10px;" valign="top"><input type="text" id="" name="n_source" value="<?php echo set_value('n_source'); ?>" class="form-control-button n_wi-date2"  disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">NCR No : </td>
											<?php if ($this->input->post('n_source') == 'IIUM') { ?>
											<td><input type="text" id="n_ncr_no" name="n_ncr_no" style="display:none;" value="" class="form-control-button n_wi-date2" disabled></td>
											<?php } ?>
											<?php if ($this->input->post('n_source') == 'PMSB') { ?>
											<td><input type="text" id="n_ncr_no" name="n_ncr_no" style="display:block;" value="<?php echo set_value('n_ncr_no'); ?>" class="form-control-button n_wi-date2" disabled></td>
											<?php } ?>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">VCM Month :  </td>
											<?php if ($this->input->post('n_source') == 'IIUM') { ?>
											<td><input type="text" id="vcm_month" name="vcm_month" style="display:none;" value="" class="form-control-button n_wi-date2" disabled></td>
											<?php } ?>
											<?php if ($this->input->post('n_source') == 'PMSB') { ?>
											<td><input type="text" id="vcm_month" name="vcm_month" style="display:block;" value="<?php echo set_value('vcm_month'); ?>" class="form-control-button n_wi-date2" disabled></td>
											<?php } ?>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">VCM Year :   </td>
											<?php if ($this->input->post('n_source') == 'IIUM') { ?>
											<td><input type="text" id="vcm_year" name="vcm_year" style="display:none;" value="" class="form-control-button n_wi-date2" disabled></td>
											<?php } ?>
											<?php if ($this->input->post('n_source') == 'PMSB') { ?>
											<td><input type="text" id="vcm_year" name="vcm_year" style="display:block;" value="<?php echo set_value('vcm_year'); ?>" class="form-control-button n_wi-date2" disabled></td>
											<?php } ?>
										</tr>	
										<tr>
											<td style="padding-left:10px;" valign="top">Summary : </td>
											<td style="padding-left:10px;"><textarea name="n_summary" class="input n_com2" disabled><?php echo set_value('n_summary'); ?></textarea></td>
										</tr>	
										<tr>
											<td style="padding-left:10px;" valign="top">Description : </td>
											<td style="padding-left:10px;"><textarea class="input n_com2" name="n_description" disabled><?php echo set_value('n_description'); ?></textarea></td>
										</tr>																																					
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Follow Up Information</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Personnel Code :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_personnel_code" name="n_personnel_code" value="<?php echo set_value('n_personnel_code'); ?>" class="form-control-button n_wi-date2"  disabled>
									</tr>
									<tr>
										<td style="padding-left:10px;">Personnel Name :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_personnel_name" name="n_personnel_name" value="<?php echo set_value('n_personnel_name'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Designation :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_Desig" name="n_Desig" value="<?php echo set_value('n_Desig'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Start Date : </td>
										<td style="padding-left:10px;"><input type="text" name="n_startdate" value="<?php echo set_value('n_startdate'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Start Time :   </td>
										<td style="padding-left:10px;"><input type="time" name="n_starttime" value="<?php echo set_value('n_starttime'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">End Date :   </td>
										<td style="padding-left:10px;"><input type="text" name="n_enddate" value="<?php echo set_value('n_enddate'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;">End Time :   </td>
										<td style="padding-left:10px;"><input type="time" name="n_endtime" value="<?php echo set_value('n_endtime'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Action Taken :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_actiontaken" disabled><?php echo set_value('n_actiontaken'); ?></textarea></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;" valign="top">Root Cause :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_rootcause" disabled><?php echo set_value('n_rootcause'); ?></textarea></td>
									</tr>		
									<tr>
										<td style="padding-left:10px;" valign="top">Corrective Action :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_correctiveact" disabled><?php echo set_value('n_correctiveact'); ?></textarea></td>
									</tr>		
									<tr>
										<td style="padding-left:10px;" valign="top">Preventive Action :  </td>
										<td style="padding-left:10px;"><textarea class="input n_com2" name="n_preventiveact" disabled><?php echo set_value('n_preventiveact'); ?></textarea></td>
									</tr>																																																																	
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Details of Related Request</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
											<td style="padding-left:10px;" class="ui-w">Request Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_request_number" name="n_request_number" value="<?php echo set_value('n_request_number'); ?>" class="form-control-button n_wi-date2" disabled> </td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Request Status :  </td>
											<td style="padding-left:10px;"><input type="text" id="n_request_status" name="n_request_status" value="<?php echo set_value('n_request_status'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Requested By : </td>
											<td style="padding-left:10px;"><input type="text" id="n_requested_by2" name="n_requested_by2" value="<?php echo set_value('n_requested_by2'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Requested Date : </td>
											<td style="padding-left:10px;"><input type="text" id="n_requested_date" name="n_requested_date" value="<?php echo set_value('n_requested_date'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Priority : </td>
											<td style="padding-left:10px;"><input type="text" id="n_priority2" name="n_priority2" value="<?php echo set_value('n_priority2'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Summary : </td>
											<td style="padding-left:10px;"><textarea class="input n_com2" id="n_summary2" name="n_summary2" disabled><?php echo set_value('n_summary2'); ?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Asset Tag Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_asset_tag_number" name="n_asset_tag_number" value="<?php echo set_value('n_asset_tag_number'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Asset Number :  </td>
											<td style="padding-left:10px;"><input type="text" id="n_asset_no" name="n_asset_no" value="<?php echo set_value('n_asset_no'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Asset Serial Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_asset_serial_number" name="n_asset_serial_number" value="<?php echo set_value('n_asset_serial_number'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Phone Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_phone_number" name="n_phone_number" value="<?php echo set_value('n_phone_number'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">User Department : </td>
											<td style="padding-left:10px;"><input type="text" id="n_user_department3" name="n_user_reg_department" value="<?php echo set_value('n_user_reg_department'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>	
										<tr>
											<td style="padding-left:10px;">Location :  </td>
											<td style="padding-left:10px;"><input type="text" id="n_location3" name="n_reg_location" value="<?php echo set_value('n_reg_location'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>	
										<tr>
											<td style="padding-left:10px;">Request Closed On : </td>
											<td style="padding-left:10px;"><input type="text" id="n_request_closed_on" name="n_request_closed_on" value="<?php echo set_value('n_request_closed_on'); ?>" class="form-control-button n_wi-date2" disabled></td>
										</tr>																																								
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Location</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table" style="padding-bottom: 8px;">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Phone Number :  </td>
										<td style="padding-left:10px;"><input type="text" name="n_phone_number" value="<?php echo set_value('n_phone_number'); ?>" class="form-control-button n_wi-date2"   disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">User Department :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_user_department" name="n_user_department" value="<?php echo set_value('n_user_department'); ?>" class="form-control-button n_wi-date2"  disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">&nbsp; </td>
										<td style="padding-left:10px;"><input type="text" id="n_user_department1" name="n_user_department1" value="<?php echo set_value('n_user_department1'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Location : </td>
										<td style="padding-left:10px;"><input type="text" id="n_location" name="n_location" value="<?php echo set_value('n_location'); ?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">&nbsp; </td>
										<td style="padding-left:10px;"><input type="text" id="n_location2" name="n_location2" value="<?php echo set_value('n_location2'); ?>" class="form-control-button n_wi-date2" disabled></td>
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
										<td style="padding-left:10px;" ><input type="text" id="n_asset_number" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2 n_wi-date2"  disabled></td>

									</tr>
									<tr>
										<td style="padding-left:10px;">Tag Number :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_tag_number" name="n_tag_number"  value="<?php echo set_value('n_tag_number'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Serial Number :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_serial_number" name="n_serial_number" value="<?php echo set_value('n_serial_number'); ?>" class="form-control-button2 n_wi-date2"  disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Name :	 </td>
										<td style="padding-left:10px;"><input type="text" id="n_name" name="n_name" value="<?php echo set_value('n_name'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Warranty Expiry Date : 	 </td>
										<td style="padding-left:10px;"><input type="text" id="n_wrn_end" name="n_wrn_end" value="<?php echo set_value('n_wrn_end'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
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
										<td style="padding-left:10px;" ><input type="text" name="n_close_date" value="<?php echo set_value('n_close_date'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
									</tr>																																																													
								</table>
							</td>
						</tr>						
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center"><input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save"></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php echo form_hidden('cmplnt_no',$this->input->post('cmplnt_no')) ?>
<?php echo form_hidden('n_requested_by',$this->input->post('n_requested_by')) ?>
<?php echo form_hidden('n_complaint_date',$this->input->post('n_complaint_date')) ?>
<?php echo form_hidden('n_complaint_time',$this->input->post('n_complaint_time')) ?>
<?php echo form_hidden('n_designation',$this->input->post('n_designation')) ?>
<?php echo form_hidden('n_priority',$this->input->post('n_priority')) ?>
<?php echo form_hidden('n_source',$this->input->post('n_source')) ?>
<?php echo form_hidden('n_ncr_no',$this->input->post('n_ncr_no')) ?>
<?php echo form_hidden('vcm_month',$this->input->post('vcm_month')) ?>
<?php echo form_hidden('vcm_year',$this->input->post('vcm_year')) ?>
<?php echo form_hidden('n_summary',$this->input->post('n_summary')) ?>
<?php echo form_hidden('n_description',$this->input->post('n_description')) ?>

<?php echo form_hidden('n_personnel_code',$this->input->post('n_personnel_code')) ?>
<?php echo form_hidden('n_personnel_name',$this->input->post('n_personnel_name')) ?>
<?php echo form_hidden('n_Desig',$this->input->post('n_Desig')) ?>
<?php echo form_hidden('n_startdate',$this->input->post('n_startdate')) ?>
<?php echo form_hidden('n_starttime',$this->input->post('n_starttime')) ?>
<?php echo form_hidden('n_enddate',$this->input->post('n_enddate')) ?>
<?php echo form_hidden('n_endtime',$this->input->post('n_endtime')) ?>
<?php echo form_hidden('n_actiontaken',$this->input->post('n_actiontaken')) ?>
<?php echo form_hidden('n_rootcause',$this->input->post('n_rootcause')) ?>
<?php echo form_hidden('n_correctiveact',$this->input->post('n_correctiveact')) ?>
<?php echo form_hidden('n_preventiveact',$this->input->post('n_preventiveact')) ?>

<?php echo form_hidden('n_request_number',$this->input->post('n_request_number')) ?>
<?php echo form_hidden('n_request_status',$this->input->post('n_request_status')) ?>
<?php echo form_hidden('n_requested_by2',$this->input->post('n_requested_by2')) ?>
<?php echo form_hidden('n_requested_date',$this->input->post('n_requested_date')) ?>
<?php echo form_hidden('n_priority2',$this->input->post('n_priority2')) ?>
<?php echo form_hidden('n_summary2',$this->input->post('n_summary2')) ?>
<?php echo form_hidden('n_asset_tag_number',$this->input->post('n_asset_tag_number')) ?>
<?php echo form_hidden('n_asset_no',$this->input->post('n_asset_no')) ?>
<?php echo form_hidden('n_asset_serial_number',$this->input->post('n_asset_serial_number')) ?>
<?php echo form_hidden('n_phone_numberat',$this->input->post('n_phone_numberat')) ?>
<?php echo form_hidden('n_user_reg_department',$this->input->post('n_user_reg_department')) ?>
<?php echo form_hidden('n_reg_location',$this->input->post('n_reg_location')) ?>
<?php echo form_hidden('n_request_closed_on',$this->input->post('n_request_closed_on')) ?>

<?php echo form_hidden('n_phone_number',$this->input->post('n_phone_number')) ?>
<?php echo form_hidden('n_user_department',$this->input->post('n_user_department')) ?>
<?php echo form_hidden('n_user_department1',$this->input->post('n_user_department1')) ?>
<?php echo form_hidden('n_location',$this->input->post('n_location')) ?>
<?php echo form_hidden('n_location2',$this->input->post('n_location2')) ?>

<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number')) ?>
<?php echo form_hidden('n_tag_number',$this->input->post('n_tag_number')) ?>
<?php echo form_hidden('n_serial_number',$this->input->post('n_serial_number')) ?>
<?php echo form_hidden('n_name',$this->input->post('n_name')) ?>
<?php echo form_hidden('n_wrn_end',$this->input->post('n_wrn_end')) ?>

<?php echo form_hidden('n_close_date',$this->input->post('n_close_date')) ?>
</body>
<?php echo form_close(); ?>
</html>