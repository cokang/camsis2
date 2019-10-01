	<div class="content-workorder" style="padding-bottom:4%;">
		<table class="ui-content-form-reg" border="0" height="100%" align="center" style="font-size:16px;">
			<tr class="ui-color-style-2" style="height:40px;">
				<td align="center" colspan="4" style="border-top-left-radius:10px; border-top-right-radius:10px;"><h4 class="h4-margin">Update Complaint</h4></td>
			</tr>
				<tr class="ui-color-contents-style-1">
					<td style="padding-left:10px; padding-bottom:20px; padding-top:10px;" colspan="4"> &nbsp;  <br> <span style="color:red;"><?php echo validation_errors(); ?></span>
						</td>
				</tr>
				
				<tr class="ui-color-contents-style-1">
					<td style="padding-left:0px; margin-top:-2px;" width="50%" colspan="2" valign="top">
						<table width="98%" class="ui-content-form-reg" style="">
							<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>Details</b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; height:30px;" width="50%">Complaint Number :</td>
											<td style="padding-left:10px;" width="50%"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" width="50%">Requested By :</td>
											<td style="padding-left:10px;" width="50%"><input type="text" name="n_requested_by" value="<?php echo set_value('n_requested_by'); ?>" class="form-control-button"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Complaint Date : </td>
											<td style="padding-left:10px;"><input type="date" name="n_complaint_date" value="<?php echo set_value('n_complaint_date'); ?>" class="form-control-button"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Complaint Time :</td>
											
											<td style="padding-left:10px;"><input type="time" name="n_complaint_time" value="<?php echo set_value('n_complaint_time',date("H:i")); ?>" class="form-control-button"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Designation : </td>
											<td style="padding-left:10px;" valign="top">	
												<input type="radio" id="radio-1-1" name="n_designation" class="regular-radio" value = "Doctor" <?php echo set_radio('n_designation', 'Doctor', TRUE); ?> />   
												<label for="radio-1-1"></label> Doctor<br>
												<input type="radio" id="radio-1-2" name="n_designation" class="regular-radio" value = "Matron" <?php echo set_radio('n_designation', 'Matron'); ?>/>   
												<label for="radio-1-2"></label> Matron<br>
												<input type="radio" id="radio-1-3" name="n_designation" class="regular-radio" value = "Medical Assistant" <?php echo set_radio('n_designation', 'Medical Assistant'); ?>/>   
												<label for="radio-1-3"></label> Medical Assistant<br>
												<input type="radio" id="radio-1-4" name="n_designation" class="regular-radio" value = "Officer" <?php echo set_radio('n_designation', 'Officer'); ?>/>   
												<label for="radio-1-4"></label> Officer<br>
												<input type="radio" id="radio-1-5" name="n_designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_designation', 'PMSB'); ?>/>   
												<label for="radio-1-5"></label> PMSB<br>
												<input type="radio" id="radio-1-6" name="n_designation" class="regular-radio" value = "Sister In-Charge" <?php echo set_radio('n_designation', 'Sister In-Charge'); ?>/>   
												<label for="radio-1-6"></label> Sister In-Charge<br>
												<input type="radio" id="radio-1-7" name="n_designation" class="regular-radio" value = "Sister On Duty" <?php echo set_radio('n_designation', 'Sister On Duty'); ?>/>   
												<label for="radio-1-7"></label> Sister On Duty<br>
												<input type="radio" id="radio-1-8" name="n_designation" class="regular-radio" value = "Specialist" <?php echo set_radio('n_designation', 'Specialist'); ?>/>   
												<label for="radio-1-8"></label> Specialist<br>
												<input type="radio" id="radio-1-9" name="n_designation" class="regular-radio" value = "Staff Nurse" <?php echo set_radio('n_designation', 'Staff Nurse'); ?>/>   
												<label for="radio-1-9"></label> Staff Nurse<br>
												<input type="radio" id="radio-1-10" name="n_designation" class="regular-radio" value = "Supervisor" <?php echo set_radio('n_designation', 'Supervisor'); ?>/>   
												<label for="radio-1-10"></label> Supervisor<br>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Priority :  </td>
											<td style="padding-left:10px;" valign="top">	
												<input type="radio" id="radio-1-11" name="n_priority" class="regular-radio"  value = "Normal" <?php echo set_radio('n_priority', 'Normal',TRUE); ?>/>   
												<label for="radio-1-11"></label> Normal<br>
												<input type="radio" id="radio-1-12" name="n_priority" class="regular-radio" value = "Emergency" <?php echo set_radio('n_priority', 'Emergency'); ?>/>   
												<label for="radio-1-12"></label><span style="color:red;"> Emergency</span><br>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Source :  </td>
											<td style="padding-left:10px;" valign="top">	
												<input type="radio" id="radio-1-13" name="n_source" class="regular-radio" value = "MOH" <?php echo set_radio('n_source', 'MOH',TRUE); ?>/>   
												<label for="radio-1-13"></label> MOH<br>
												<input type="radio" id="radio-1-14" name="n_source" class="regular-radio" value = "SIHAT" <?php echo set_radio('n_source', 'SIHAT'); ?>>   
												<label for="radio-1-14"></label> SIHAT<br>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">NCR No : </td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">VCM Month :  </td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">VCM Year :   </td>
										</tr>	
										<tr>
											<td style="padding-left:10px;" valign="top">Summary : </td>
											<td style="padding-left:10px;"><textarea name="n_summary" cols="17" rows="5" class="input"><?php echo set_value('n_summary'); ?></textarea></td>
										</tr>	
										<tr>
											<td style="padding-left:10px;" valign="top">Description : </td>
											<td style="padding-left:10px;"><textarea class="input" name="n_description" cols="17" rows="5"><?php echo set_value('n_description'); ?></textarea></td>
										</tr>																																						
									</table>
								</td>
							</tr>
							<tr class="ui-color-contents-style-1">
								<td height="10px" colspan="4">&nbsp;</td>
							</tr>
							<tr class="ui-color-contents-style-1">
								<td style="padding-left:0px; margin-top:-2px;" width="100%" colspan="4" valign="top">
									<table class="ui-content-form-reg" style="width:100%; ">
										<tr style="color:white;" height="30px">
											<td colspan="2" class="ui-header-new"><b>Follow Up Information</b></td>
										</tr>
										<tr >
											<td class="ui-desk-style-table">
												<table class="ui-content-form" style="color:black;" width="100%" border="0">
													<tr>
														<td style="padding-left:10px;" width="50%">Personnel Code :   </td>
														<td style="padding-left:10px;" width="50%"><input type="text" id="n_personnel_code" name="n_personnel_code" value="<?php echo set_value('n_personnel_code'); ?>" class="form-control-button" style="width:74%;" readonly> <span class="icon-windows" onclick="fCallassetdetailname()"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Personnel Name :   </td>
														<td style="padding-left:10px;"><input type="text" id="n_personnel_name" name="n_personnel_name" value="<?php echo set_value('n_personnel_name'); ?>" class="form-control-button" readonly></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Designation :  </td>
														<td style="padding-left:10px;"><input type="text" id="n_Desig" name="n_Desig" value="<?php echo set_value('n_Desig'); ?>" class="form-control-button" readonly></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Start Date : </td>
														<td style="padding-left:10px;"><input type="date" name="n_startdate" value="<?php echo set_value('n_startdate'); ?>" class="form-control-button"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Start Time :   </td>
														<td style="padding-left:10px;"><input type="time" name="n_starttime" value="<?php echo set_value('n_starttime'); ?>" class="form-control-button"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">End Date :   </td>
														<td style="padding-left:10px;"><input type="date" name="n_enddate" value="<?php echo set_value('n_enddate'); ?>" class="form-control-button"></td>
													</tr>	
													<tr>
														<td style="padding-left:10px;">*End Time :   </td>
														<td style="padding-left:10px;"><input type="time" name="n_endtime" value="<?php echo set_value('n_endtime'); ?>" class="form-control-button"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;" valign="top">Action Taken :  </td>
														<td style="padding-left:10px;"><textarea class="input" name="n_actiontaken" cols="17" rows="5"><?php echo set_value('n_actiontaken'); ?></textarea></td>
													</tr>																																																																	
												</table>
											</td>
										</tr>						
									</table>
								</td>			
							</tr>
						</table>
					</td>
					<td style="padding-left:0px; margin-top:-2px;" width="50%" colspan="2" valign="top">
						<table width="98%" class="ui-content-form-reg" style="">
							<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>Details of Related Request</b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px;" width="50%">Request Number : </td>
											<td style="padding-left:10px;" width="50%"><input type="text" id="n_request_number" name="n_request_number" value="<?php echo set_value('n_request_number'); ?>" class="form-control-button" style="width:74%;" readonly> <span class="icon-windows" onclick="fCallR_number()"></span></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Request Status :  </td>
											<td style="padding-left:10px;"><input type="text" id="n_request_status" name="n_request_status" value="<?php echo set_value('n_request_status'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Requested By : </td>
											<td style="padding-left:10px;"><input type="text" id="n_requested_by2" name="n_requested_by2" value="<?php echo set_value('n_requested_by2'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Requested Date : </td>
											<td style="padding-left:10px;"><input type="text" id="n_requested_date" name="n_requested_date" value="<?php echo set_value('n_requested_date'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Priority : </td>
											<td style="padding-left:10px;"><input type="text" id="n_priority2" name="n_priority2" value="<?php echo set_value('n_priority2'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Summary : </td>
											<td style="padding-left:10px;"><textarea class="input" id="n_summary2" name="n_summary2" cols="17" rows="5" readonly><?php echo set_value('n_summary2'); ?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Asset Tag Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_asset_tag_number" name="n_asset_tag_number" value="<?php echo set_value('n_asset_tag_number'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Asset Number :  </td>
											<td style="padding-left:10px;"><input type="text" id="n_asset_no" name="n_asset_no" value="<?php echo set_value('n_asset_no'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Asset Serial Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_asset_serial_number" name="n_asset_serial_number" value="<?php echo set_value('n_asset_serial_number'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">Phone Number : </td>
											<td style="padding-left:10px;"><input type="text" id="n_phone_number" name="n_phone_number" value="<?php echo set_value('n_phone_number'); ?>" class="form-control-button" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;">User Department : </td>
											<td style="padding-left:10px;"><input type="text" id="n_user_department3" name="n_user_department" value="<?php echo set_value('n_user_department'); ?>" class="form-control-button" readonly></td>
										</tr>	
										<tr>
											<td style="padding-left:10px;">Location :  </td>
											<td style="padding-left:10px;"><input type="text" id="n_location3" name="n_location" value="<?php echo set_value('n_location'); ?>" class="form-control-button" readonly></td>
										</tr>	
										<tr>
											<td style="padding-left:10px;">Request Closed On : </td>
											<td style="padding-left:10px;"><input type="text" id="n_request_closed_on" name="n_request_closed_on" value="<?php echo set_value('n_request_closed_on'); ?>" class="form-control-button" readonly></td>
										</tr>																																								
									</table>
								</td>
							</tr>
							<tr class="ui-color-contents-style-1">
								<td height="10px" colspan="4">&nbsp;</td>
							</tr>
							<tr style="color:black;">
								<td style="padding-left:0px; margin-top:-2px;" width="100%" colspan="4" valign="top">
									<table class="ui-content-form-reg" style="">
										<tr class="ui-color-contents-style-1" height="30px">
											<td colspan="2" class="ui-header-new"><b>Location</b></td>
										</tr>
										<tr >
											<td class="ui-desk-style-table" style="padding-bottom: 8px;">
												<table class="ui-content-form" width="100%" border="0">
													<tr>
														<td style="padding-left:10px;" width="40%">Phone Number :  </td>
														<td style="padding-left:10px;" width="60%"><input type="text" name="n_phone_number" value="<?php echo set_value('n_phone_number'); ?>" class="form-control-button"  style="width:74%;" readonly> <span class="icon-windows" onclick="fCallassetsnumber()"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">User Department :   </td>
														<td style="padding-left:10px;"><input type="text" id="n_user_department" name="n_user_department" value="<?php echo set_value('n_user_department'); ?>" class="form-control-button" style="width:74%;" readonly> <span class="icon-windows" onclick="fCallloction()"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">&nbsp; </td>
														<td style="padding-left:10px;"><input type="text" id="n_user_department1" name="n_user_department1" value="<?php echo set_value('n_user_department1'); ?>" class="form-control-button" readonly></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Location : </td>
														<td style="padding-left:10px;"><input type="text" id="n_location" name="n_location" value="<?php echo set_value('n_location'); ?>" class="form-control-button" readonly></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">&nbsp; </td>
														<td style="padding-left:10px;"><input type="text" id="n_location2" name="n_location2" value="<?php echo set_value('n_location2'); ?>" class="form-control-button" readonly></td>
													</tr>																																					
												</table>
											</td>
										</tr>						
									</table>
								</td>			
							</tr>
							<tr class="ui-color-contents-style-1">
								<td height="10px" colspan="4">&nbsp;</td>
							</tr>
							<tr class="ui-color-contents-style-1">
								<td style="padding-left:0px; margin-top:-2px;" width="100%" colspan="4" valign="top">
									<table width="99%" class="ui-content-form-reg" style="">
										<tr style="color:white;" height="30px">
											<td colspan="2" class="ui-header-new"><b>Related Asset</b></td>
										</tr>
										<tr >
											<td class="ui-desk-style-table">
												<table class="ui-content-form" width="100%" border="0">
													<tr>
														<td style="padding-left:10px;" width="40%">Asset Number :  </td>
														<td style="padding-left:10px;" width="60%"><input type="text" id="n_asset_number" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2" style="width:74%;" readonly> <span class="icon-windows" onclick="fCallassetnumber()"></td>

													</tr>
													<tr>
														<td style="padding-left:10px;">Tag Number :   </td>
														<td style="padding-left:10px;"><input type="text" id="n_tag_number"  value="<?php echo set_value('n_tag_number'); ?>" class="form-control-button2" readonly></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Asset Serial Number :  </td>
														<td style="padding-left:10px;"><input type="text" id="n_serial_number" name="n_serial_number" value="<?php echo set_value('n_serial_number'); ?>" class="form-control-button2" style="border:none;"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Asset Name :	 </td>
														<td style="padding-left:10px;"><input type="text" id="n_name" name="n_name" value="<?php echo set_value('n_name'); ?>" class="form-control-button2" style="border:none;"></td>
													</tr>
													<tr>
														<td style="padding-left:10px;">Warranty Expiry Date : 	 </td>
														<td style="padding-left:10px;"><input type="text" id="" name="n_name" value="<?php echo set_value('n_name'); ?>" class="form-control-button2" style="border:none;"></td>
													</tr>																																						
												</table>
											</td>
										</tr>						
									</table>
								</td>			
							</tr>
							<tr class="ui-color-contents-style-1">
								<td height="10px" colspan="4">&nbsp;</td>
							</tr>
							<tr class="ui-color-contents-style-1">
								<td style="padding-left:0px; margin-top:-2px;" width="100%" colspan="4" valign="top">
									<table  class="ui-content-form-reg" style="">
										<tr style="color:white;" height="30px">
											<td colspan="2" class="ui-header-new"><b>Closing</b></td>
										</tr>
										<tr >
											<td class="ui-desk-style-table">
												<table class="ui-content-form" width="100%" border="0">
													<tr>
														<td style="padding-left:10px;" width="40%">Close Date :    </td>
														<td style="padding-left:10px;" width="60%"><input type="date" name="n_close_date" value="<?php echo set_value('n_close_date'); ?>" class="form-control-button2" style="width:83%;"></td>
													</tr>																																																													
												</table>
											</td>
										</tr>						
									</table>
								</td>			
							</tr>					
						</table>
					</td>				
				</tr>
			
			<tr class="ui-color-contents-style-1">
				<td height="10px" colspan="4">&nbsp;</td>
			</tr>
			<tr class="ui-color-style-2" style="height:40px;">
				<td align="center" colspan="4" style="border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
					<!--<input type="submit"  class="btn btn-primary btn-block" name="mysubmit" value="Submit Post!" />-->
					<?php echo anchor ('contentcontroller/desk_complaint_confirm', '<button type="button" class="btn btn-primary btn-block" style="width:20%;">Save</button>'); ?>
			</tr>
		</table>	
	</div>
	</form>
</div>
</body>
<?php include 'content_jv_popup.php';?>
</html>
<?php echo form_close(); ?>