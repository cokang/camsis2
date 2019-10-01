<?php echo form_open('personnel_admin_ctrl/comfirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm Personnel</span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Personnel Code:</td>
											<td><input type="text" id="n_p_code" name="n_p_code"  value="<?=set_value('n_p_code')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Personal Name:</td>
											<td valign="top"><input type="text" id="n_p_Name" name="n_p_Name"  value="<?=set_value('n_p_Name')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Labour Grade</td>
										<td valign="top"><input type="text" id="n_l_Grade" name="n_l_Grade" value="<?=set_value('n_l_Grade')?>" class="form-control-button2  n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Hourly Rate :  </td>
											<td><input type="text" id="n_h_rate" name="n_h_rate"  value="<?=set_value('n_h_rate')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Base Location : </td>
											<td><input type="text" id="n_b_location" name="n_b_location"  value="<?=set_value('n_b_location')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Service Code : </td>
											<td>
											<?php $Service_list = array(
															'CLS' => 'CLS',
															'CWMS' => 'CWMS',
															'FEMS' => 'FEMS',
															'LLS' => 'LLS',
															'BEMS' => 'BEMS'
														 ); ?>
								        <?php echo form_dropdown('n_s_Code', $Service_list, set_value('n_s_Code') , 'class="dropdown n_wi-date2" disabled'); ?> </td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Service Description : </td>
											<td><input type="text" id="n_s_Description" name="n_s_Description"  value="<?=set_value('n_s_Description')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Calender No  : </td>
											<td><input type="text" id="n_c_Calender" name="n_c_Calender"  value="<?=set_value('n_c_Calender')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>											
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Date Start:</td>
											<td><input type="text" name="n_d_Start"  value="<?=set_value('n_d_Start')?>" class="form-control-button2 n_wi-date2" disabled>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Date End  :   </td>
											<td valign="top"><input type="text" name="n_d_End"  value="<?=set_value('n_d_End')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
										<td style="padding-left:10px;" valign="top">Access Status</td>
										<td valign="top"><input type="text" id="n_a_Status" name="n_a_Status"  value="<?=set_value('n_a_status')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Hospital Code :  </td>
											<td valign="top"><input type="text" id="n_h_Code" name="n_h_Code"  value="<?=set_value('n_h_Code')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Designation : </td>
											<td><input type="text" id="n_Designation" name="n_Designation"  value="<?=set_value('n_Designation')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Previous Location : </td>
											<td><input type="text" id="n_p_Location" name="n_p_Location"  value="<?=set_value('n_p_Location')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Active Status  : </td>
											<td><input type="text" id="n_ac_Status" name="n_ac_Status"  value="<?=set_value('n_ac_status')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>											
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="Confirm" value="Confirm"> 
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">
					</td>
				</tr>
			</table>
			<?php echo form_hidden('sys_id',$this->input->post('sys_id')) ?>
			<?php echo form_hidden("n_p_code",$this->input->post('n_p_code')) ?>
			<?php echo form_hidden("n_p_Name",$this->input->post('n_p_Name')) ?>
			<?php echo form_hidden("n_l_Grade",$this->input->post('n_l_Grade')) ?>
			<?php echo form_hidden("n_h_rate",$this->input->post('n_h_rate')) ?>
			<?php echo form_hidden("n_b_location",$this->input->post('n_b_location')) ?>
			<?php echo form_hidden("n_s_Code",$this->input->post('n_s_Code')) ?>
			<?php echo form_hidden("n_s_Description",$this->input->post('n_s_Description')) ?>
			<?php echo form_hidden("n_c_Calender",$this->input->post('n_c_Calender')) ?>
			<?php echo form_hidden("n_d_Start",$this->input->post('n_d_Start')) ?>
			<?php echo form_hidden("n_d_End",$this->input->post('n_d_End')) ?>
			<?php echo form_hidden("n_a_status",$this->input->post('n_a_status')) ?>
			<?php echo form_hidden("n_h_Code",$this->input->post('n_h_Code')) ?>
			<?php echo form_hidden("n_Designation",$this->input->post('n_Designation')) ?>
			<?php echo form_hidden("n_p_Location",$this->input->post('n_p_Location')) ?>
			<?php echo form_hidden("n_ac_status",$this->input->post('n_ac_status')) ?>
		</div>
	</div>
</div>
</body>
</html>
