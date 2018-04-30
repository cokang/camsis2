<?php echo form_open('personnel_admin_ctrl');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<?php if ($this->input->get('ud_insert') != '') { ?>  
		<span style="color:red;display:block;width: 100%; text-align: center;"> Duplicate Personnel Code </span>
		<?php } ?>
		<div class="ui-main-form" style="background:#fff;"><span style="color:red;"><?php echo validation_errors(); ?></span>
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;"><?php if ($this->input->get('sys_id') == ''){echo 'Add';}else{echo 'Edit';}?> Personnel </span></td>
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
											<td><input type="text" id="n_p_code" name="n_p_code"  value="<?=set_value('n_p_code',isset($record[0]->v_PersonalCode) ? $record[0]->v_PersonalCode : '')?>" class="form-control-button2 n_wi-date2" <?=$this->input->get_post('sys_id') == '' ? '' : 'readonly' ?>></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Personal Name:</td>
											<td valign="top"><input type="text" id="n_p_Name" name="n_p_Name"  value="<?=set_value('n_p_Name',isset($record[0]->v_PersonalName) ? $record[0]->v_PersonalName : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Labour Grade</td>
										<td valign="top"><input type="text" id="n_l_Grade" name="n_l_Grade" value="<?=set_value('n_l_Grade',isset($record[0]->v_PersonalLabGrd) ? $record[0]->v_PersonalLabGrd : '')?>" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fLabour(this)" value="Labour" ></span></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Hourly Rate :  </td>
											<td><input type="text" id="n_h_rate" name="n_h_rate"  value="<?=set_value('n_h_rate',isset($record[0]->v_hourlyrate) ? $record[0]->v_hourlyrate : '')?>" class="form-control-button2 n_wi-date2" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Base Location : </td>
											<td><input type="text" id="n_b_location" name="n_b_location"  value="<?=set_value('n_b_location',isset($record[0]->v_PersonalbasLoc) ? $record[0]->v_PersonalbasLoc : '')?>" class="form-control-button2 n_wi-date2"></td>
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
								        <?php echo form_dropdown('n_s_Code', $Service_list, set_value('n_s_Code',isset($record[0]->v_PersonalSerCode) ? $record[0]->v_PersonalSerCode : '') , 'class="dropdown n_wi-date2"'); ?> </td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Service Description : </td>
											<td><input type="text" id="n_s_Description" name="n_s_Description"  value="<?=set_value('n_s_Description',isset($record[0]->v_PersonalDesc) ? $record[0]->v_PersonalDesc : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Calender No  : </td>
											<td><input type="text" id="n_c_Calender" name="n_c_Calender"  value="<?=set_value('n_c_Calender',isset($record[0]->v_PersonalCalno) ? $record[0]->v_PersonalCalno : '')?>" class="form-control-button2 n_wi-date2"></td>
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
											<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_d_Start"  value="<?=set_value('n_d_Start',isset($record[0]->d_PersonalDStart) ? date("d-m-Y",strtotime($record[0]->d_PersonalDStart)) : '')?>" class="form-control-button2 n_wi-date2">
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Date End  :   </td>
											<td valign="top"><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_d_End"  value="<?=set_value('n_d_End',isset($record[0]->d_PersonalDEnd) ? date("d-m-Y",strtotime($record[0]->d_PersonalDEnd)) : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
										<td style="padding-left:10px;" valign="top">Access Status</td>
										<td valign="top"><?php $Access_list = array(
															'Y' => 'Y',
															'N' => 'N',
														 ); ?>
								        <?php echo form_dropdown('n_a_status', $Access_list, set_value('n_a_status',isset($record[0]->v_AccessStatus) ? $record[0]->v_AccessStatus : '') , 'class="dropdown n_wi-date2"'); ?></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Hospital Code :  </td>
											<td valign="top"><input type="text" id="n_h_Code" name="n_h_Code"  value="<?=set_value('n_h_Code',isset($record[0]->v_HospitalCode) ? $record[0]->v_HospitalCode : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Designation : </td>
											<td><input type="text" id="n_Designation" name="n_Designation"  value="<?=set_value('n_Designation',isset($record[0]->v_designation) ? $record[0]->v_designation : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Previous Location : </td>
											<td><input type="text" id="n_p_Location" name="n_p_Location"  value="<?=set_value('n_p_Location',isset($record[0]->v_PersonalprevLoc) ? $record[0]->v_PersonalprevLoc : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Active Status  : </td>
											<td><?php $Active_list = array(
															'Y' => 'Y',
															'N' => 'N',
														 ); ?>
								        <?php echo form_dropdown('n_ac_status', $Active_list, set_value('n_ac_status',isset($record[0]->v_ActiveStatus) ? $record[0]->v_ActiveStatus : '') , 'class="dropdown n_wi-date2"'); ?></td>
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
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save"> 
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">
					</td>
				</tr>
			</table>
			<?php echo form_hidden('sys_id',$this->input->get_post('sys_id')) ?>
		</div>
	</div>
</div>
<?php include 'content_jv_popup.php';?>
</body>
<?php echo form_close(); ?>
</html>
