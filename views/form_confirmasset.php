<?php echo form_open('workorder_ctrl/confirmation_workorder');?>
<div class="ui-middle-screen">
	<div class="content-workorder" style="padding-bottom:4%;">
		<table class="ui-content-middle-menu-workorder" border="0" height="100%" width="90%" align="center" style="font-size:16px;">
			<tr class="ui-color-style-2" style="height:40px;">
				<td align="center" colspan="4" style="border-top-left-radius:10px; border-top-right-radius:10px;"><h4 style="margin-bottom:-0px;">Conform Complaint</h4></td>
			</tr>	
			<tr class="ui-color-contents-style-1">
				<td style="padding-left:10px; padding-bottom:20px; padding-top:10px;" colspan="4"></td>
			</tr>			
			<tr class="ui-color-contents-style-1">
				<td style="padding-left:0px; margin-top:-2px;" width="50%" colspan="2" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Details</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" width="50%">Requested Type <span style="float:right;">:</span></td>
										<td style="padding-left:10px;" width="50%" valign="bottom">	<?php echo $this->input->post('n_request_type');?>
																					<?php echo form_hidden('n_request_type',$this->input->post('n_request_type'));?>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Request Date <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('n_request_date');?>
																						<?php echo form_hidden('n_request_date',$this->input->post('n_request_date'));?>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Priority <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('n_priority');?>
																		<?php echo form_hidden('n_priority',$this->input->post('n_priority'));?>			
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Summary <span style="float:right;">:</span> </td>
										<td style="padding-left:10px;"> <?php echo form_hidden('V_servicecode',$this->session->userdata('usersess'));?>
																		<?php echo $this->input->post('n_summary');?>
																		<?php echo form_hidden('n_summary',$this->input->post('n_summary'));?>
											
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Asset Number <span style="float:right;">:</span>  </td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('n_asset_number');?>
																		<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Tag Number <span style="float:right;">:</span>  </td>
										<td style="padding-left:10px;"> <?php echo $this->input->post('n_requested');?>
																		<?php echo form_hidden('n_requested',$this->input->post('n_requested'));?>
										</td>
									</tr>
									<tr>
										<!--<td style="padding-left:10px;" valign="top">Serial Number <span style="float:right;">:</span></td>-->
										<td style="padding-left:10px;">Serial Number <span style="float:right;">:</span>  </td>
										<td style="padding-left:10px;"> <?php echo $this->input->post('n_requested');?>
																		<?php echo form_hidden('n_requested',$this->input->post('n_requested'));?>
										</td>
									</tr>
									<tr>
										<!--<td style="padding-left:10px;" valign="top">Name <span style="float:right;">:</span></td>-->
										<td style="padding-left:10px;">Name <span style="float:right;">:</span>  </td>
										<td style="padding-left:10px;"> <?php echo $this->input->post('n_requested');?>
																		<?php echo form_hidden('n_requested',$this->input->post('n_requested'));?>
										</td>
									</tr>
									<tr>
										<!--<td style="padding-left:10px;" valign="top">Requested by <span style="float:right;">:</span></td>-->
										<td style="padding-left:10px;">Requested by <span style="float:right;">:</span>  </td>
										<td style="padding-left:10px;"> <?php echo $this->input->post('n_requested');?>
																		<?php echo form_hidden('n_requested',$this->input->post('n_requested'));?>
										</td>
									</tr>	
									<tr>
										<td style="padding-left:10px;" valign="top">Designation <span style="float:right;">:</span></td>
										<td style="padding-left:10px;"> <?php echo $this->input->post('n_designation');?>
																		<?php echo form_hidden('n_designation',$this->input->post('n_designation'));?>
										</td>
									</tr>	
									<tr>
										<td style="padding-left:10px;" valign="top">Phone Number <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('n_phone_number');?>
																		<?php echo form_hidden('n_phone_number',$this->input->post('n_phone_number'));?>
										</td>
									</tr>	
									
									<tr>
										<td style="padding-left:10px;" valign="top">User Department <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('V_phone_no');?>
																		<?php echo form_hidden('V_phone_no',$this->input->post('V_phone_no'));?>
										</td>
									</tr>		
									
									<tr>
										<td style="padding-left:10px;" valign="top">Location <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('adress');?>
																		<?php echo $this->input->post('adress1');?>
																		<?php echo $this->input->post('adress2');?>
																		<?php echo form_hidden('adress',$this->input->post('adress'));?>
																		<?php echo form_hidden('adress1',$this->input->post('adress2'));?>
																		<?php echo form_hidden('adress2',$this->input->post('adress2'));?>
										</td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Phone Number <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('V_User_dept_code');?>
																		<?php echo form_hidden('V_User_dept_code',$this->input->post('V_User_dept_code'));?>
										</td>
									</tr>		
									
									<tr>
										<td style="padding-left:10px;" valign="top">Asset No <span style="float:right;">:</span></td>
										<td style="padding-left:10px;">	<?php echo $this->input->post('asset_no');?>
																		<?php echo form_hidden('asset_no',$this->input->post('asset_no'));?>
										</td>
									</tr>																																				
							
			<tr class="ui-color-style-2" style="height:10px;">
				<td align="center" colspan="4" style="border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
					<input type="submit" class="btn-button" name="mysubmit" value="Submit Post!" />
					<input type="button" VALUE="Back" onClick="history.go(-1);"></td>
			</tr>
		</table>	
	</div>
	</form>
		
	

		
</div>
</body>
</html>