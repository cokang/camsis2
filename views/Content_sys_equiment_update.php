<?php echo form_open('contentcontroller/sys_admin?ec=3');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;"><?php if ($this->input->get('sys_id') == ''){echo 'Add';}else{echo 'Edit';}?> Equipment Type Code </span></td>
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
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Equipment Code:</td>
											<td><input type="text" id="n_c_code" name="n_c_code"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Description :</td>
											<td valign="top">
											<textarea id="n_Description" name="n_Description"  value="" class="form-control-button2 n_wi-date2" style="height:140px;"></textarea>
											</td>
										</tr>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">System Code :</td>
										<td valign="top"><input type="text" id="n_s_Code" name="n_s_Code" value="" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fsystemcode(this)" value="Labour" ></span></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top"></td>
											<td><input type="text" id="n_s_Code2" name="n_s_Code2"  value="" class="form-control-button2 n_wi-date2" readonly></td>
										</tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Checklist :</td>
										<td valign="top"><input type="text" id="n_Checklist_Code" name="n_Checklist_Code" value="" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fchecklist(this)" value="syschecklist" ></span></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top"></td>
											<td><input type="text" id="n_Checklist_Code2" name="n_Checklist_Code2"  value="" class="form-control-button2 n_wi-date2" readonly></td>
										</tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Workgroup Code :</td>
										<td valign="top"><input type="text" id="n_w_Code" name="n_w_Code" value="" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fWorkgroup(this)" value="Labour" ></span></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top"></td>
											<td><input type="text" id="n_w_Code2" name="n_w_Code2"  value="" class="form-control-button2 n_wi-date2" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Service Code : </td>
											<td>
											<?php $Service_list = array(
															'0' => 'CLS',
															'1' => 'CWMS',
															'2' => 'FEMS',
															'3' => 'LLS',
															'4' => 'BEMS'
														 ); ?>
								        <?php echo form_dropdown('n_s_Code', $Service_list, set_value('n_s_Code') , 'class="dropdown n_wi-date2"'); ?> 
										</td>
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
											<td style="padding-left:10px;" valign="top">Team  : </td>
											<td>
											<?php $Team_list = array(
															'0' => 'Critical care',
															'1' => 'General',
															'2' => 'HDU',
															'3' => 'Imaging',
															'4' => 'Laboratory'
														 ); ?>
								        <?php echo form_dropdown('n_team', $Team_list, set_value('n_team') , 'class="dropdown n_wi-date2"'); ?> </td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top"> TRPI IT 5  :   </td>
											<td valign="top"><input type="text" id="n_t_it" name="n_t_it"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
										<td style="padding-left:10px;" valign="top">TRPI 5 10</td>
										<td valign="top"><input type="text" id="n_t_5" name="n_t_5"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">TRPI GT 10 :  </td>
											<td valign="top"><input type="text" id="n_t_gt" name="n_t_gt"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">QAP  : </td>
											<td><?php $QAP_list = array(
															'0' => 'Y',
															'1' => 'N',
														 ); ?>
								        <?php echo form_dropdown('n_qap', $QAP_list, set_value('n_qap') , 'class="dropdown n_wi-date2"'); ?></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Effective Date From : </td>
											<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_p_Location"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">During Warranty  : </td>
											<td><input type="text" id="n_d_Warranty" name="n_d_Warranty"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Propose Date From  : </td>
											<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_p_datefrom"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Active Status  : </td>
											<td><?php $Active_list = array(
															'0' => 'Y',
															'1' => 'N',
														 ); ?>
								        <?php echo form_dropdown('n_a_Status', $Active_list, set_value('n_a_Status') , 'class="dropdown n_wi-date2"'); ?></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Effective Date To  : </td>
											<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_e_dateto"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Post Warranty   : </td>
											<td><input type="text" id="n_pw_Warranty" name="n_pw_Warranty"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Propose Date To   : </td>
											<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_pd_dateto"  value="" class="form-control-button2 n_wi-date2"></td>
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
		</div>
	</div>
</div>
<?php include 'content_jv_popup.php';?>
</body>
<?php echo form_close(); ?>
</html>
