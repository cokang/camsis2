<?php echo form_open('contentcontroller/save_request_AP19');?>
<?php $numberdate = 0; ?>
<div class='menu-class'>
<a href='workorder?parent=wrkodr'><span class='icon-play2' valign='middle'></span> Work Order</a></div>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">New AP19 Request</span></td>
					</tr>
				</table>
			</div>
			<div class="n-req">Request number will be automatically generated by the system.<br> <span style="color:red;"><?php echo validation_errors(); ?></span></div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>Request Details</b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Request Type:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">
												<input type="radio" id="radio-1-1" name="n_request_type" class="regular-radio" value="AP19" disabled <?php echo set_radio('n_request_type', 'AP19',true); ?> />
												<label for="radio-1-1"></label> AP19 - AP Service Report<br>

											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Request Date :   </td>
											<td style="padding-left:10px;" valign="top"><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_request_date" max="<?=date('Y-m-d')?>" autocomplete="off" value="<?php echo date('d-m-Y');?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
										<td style="padding-left:10px;" valign="top">Request&nbsp;Time&nbsp;:&nbsp;</td>
				            <td style="padding-left:10px;" valign="top">
										<?php
										$hour_list = array(
															'0' => '0',
                  						'1' => '1',
                  				 		'2' => '2',
                  				 		'3' => '3',
                  						'4' => '4',
                  				 		'5' => '5',
                  				 		'6' => '6',
                  						'7' => '7',
                  				 		'8' => '8',
                  				 		'9' => '9',
                  						'10' => '10',
                  				 		'11' => '11',
                  				 		'12' => '12',
                  				 		'13' => '13',
                  				 		'14' => '14',
                  						'15' => '15',
                  				 		'16' => '16',
                  				 		'17' => '17',
                  						'18' => '18',
                  				 		'19' => '19',
                  				 		'20' => '20',
                  						'21' => '21',
                  				 		'22' => '22',
                  				 		'23' => '23',
                					 );
										 ?>
								        <?php echo form_dropdown('n_hour', $hour_list, set_value('n_hour',date('H')) , 'class="dropdown" style="width: 52px;" disabled'); ?>
										<?php
										$min_list = array(
															'0' => '0',
                  						'1' => '1',
                  				 		'2' => '2',
                  				 		'3' => '3',
                  						'4' => '4',
                  				 		'5' => '5',
                  				 		'6' => '6',
                  						'7' => '7',
                  				 		'8' => '8',
                  				 		'9' => '9',
                  						'10' => '10',
                  				 		'11' => '11',
                  				 		'12' => '12',
                  				 		'13' => '13',
                  				 		'14' => '14',
                  						'15' => '15',
                  				 		'16' => '16',
                  				 		'17' => '17',
                  						'18' => '18',
                  				 		'19' => '19',
                  				 		'20' => '20',
                  						'21' => '21',
                  				 		'22' => '22',
                  				 		'23' => '23',
                  						'24' => '24',
                  				 		'25' => '25',
                  				 		'26' => '26',
                  						'27' => '27',
                  				 		'28' => '28',
                  				 		'29' => '29',
                  						'30' => '30',
                  				 		'31' => '31',
                  				 		'32' => '32',
                  						'33' => '33',
                  				 		'34' => '34',
                  				 		'35' => '35',
                  				 		'36' => '36',
                  				 		'37' => '37',
                  						'38' => '38',
                  				 		'39' => '39',
                  				 		'40' => '40',
                  						'41' => '41',
                  				 		'42' => '42',
                  				 		'43' => '43',
                  						'44' => '44',
                  				 		'45' => '45',
                  				 		'46' => '46',
                  				 		'47' => '47',
                  				 		'48' => '48',
                  						'49' => '49',
                  				 		'50' => '50',
                  				 		'51' => '51',
                  				 		'52' => '52',
                  				 		'53' => '53',
                  						'54' => '54',
                  				 		'55' => '55',
                  				 		'56' => '56',
                  						'57' => '57',
                  				 		'58' => '58',
                  				 		'59' => '59',
                					 );
										 ?>
		              			<?php echo form_dropdown('n_min', $min_list, set_value('n_min',date('i')) , 'class="dropdown" style="width: 52px;" disabled'); ?>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Nature of visit :  </td>
											<td style="padding-left:10px;" valign="top">
												<input type="radio" id="radio-1-13" name="n_priority" class="regular-radio" value="RQ" disabled <?php echo set_radio('n_priority', 'RQ',TRUE); ?> />
												<label for="radio-1-13"></label> Breakdown<br>
												<input type="radio" id="radio-1-14" name="n_priority" class="regular-radio" value="PPM" disabled <?php echo set_radio('n_priority', 'PPM'); ?>/>
												<label for="radio-1-14"></label> PPM<br>
												<input type="radio" id="radio-1-14" name="n_priority" class="regular-radio" value="Others" disabled <?php echo set_radio('n_priority', 'Others'); ?>/>
												<label for="radio-1-14"></label> Other<br>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Failure Report : </td>
											<td style="padding-left:10px;"><textarea class="Input n_com2" name="fSummary" cols="17" rows="6" disabled><?php echo set_value('fSummary'); ?></textarea></td>
										</tr>

										<tr>
											<td style="padding-left:10px;" valign="top">Troubleshoot/Corrective Action : </td>
											<td style="padding-left:10px;"><textarea class="Input n_com2" name="fSummary2" cols="17" rows="6" disabled><?php echo set_value('fSummary2'); ?></textarea></td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</div>

				<div class="middle_d">
					<?php if ($this->session->userdata('usersess')=='BEMS' OR $this->session->userdata('usersess')=='FES') {?>
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Related Asset </b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Asset Number :   </td>
										<td style="padding-left:10px;" width=""><input type="text" id="n_asset_number" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2 n_wi-eq3" disabled> <span class="icon-windows" onclick="fCallassetsnumber(this)"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Tag Number :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_tag_number" name="n_tag_number"  value="<?php echo set_value('n_tag_number'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Serial Number :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_serial_number" name="n_serial_number" value="<?php echo set_value('n_serial_number'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Name :	 </td>
										<td style="padding-left:10px;"><input type="text" id="n_name" name="n_name" value="<?php echo set_value('n_name'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<?php } ?>
				</div>

			</div>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table class="ui-content-form-reg" >
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Related Information</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">PIC : </td>
										<td style="padding-left:10px;" ><input type="text" name="fBy" disabled value="<?php echo set_value('fBy'); ?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" class="ui-w">Team : </td>
										<td style="padding-left:10px;" ><input type="text" name="fUserDeptCode" disabled value="<?php echo set_value('fUserDeptCode'); ?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" class="ui-w">Letter Ref : </td>
										<td style="padding-left:10px;" ><input type="text" name="fLocationCode" disabled value="<?php echo set_value('fLocationCode'); ?>" class="form-control-button n_wi-date2"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
									<div class="middle_d">
										<table class="ui-content-form-reg" >
											<tr class="ui-color-contents-style-1" height="30px">
												<td colspan="2" class="ui-header-new"><b>Part Replacement</b></td>
											</tr>
											<tr >
												<td class="ui-desk-style-table">
													<table class="ui-content-form" width="100%" border="0">
													<?php
													//$fby = isset($record[0]->V_requestor) ? $record[0]->V_requestor : 'fBy';
													//$fUserDeptCode = isset($record[0]->V_User_dept_code) ? $record[0]->V_User_dept_code : 'fUserDeptCode';
													//$fLocationCode = isset($record[0]->V_Location_code) ? $record[0]->V_Location_code : 'fLocationCode';
													?>
														<tr>
															<td style="padding-left:10px;" class="ui-w">Item : </td>
															<td style="padding-left:10px;" ><input type="text" name="fitem"  disabled value="<?php echo set_value('fitem'); ?>" class="form-control-button n_wi-date2"></td>
														</tr>
														<tr>
															<td style="padding-left:10px;" class="ui-w">Part Price (RM) : </td>
															<td style="padding-left:10px;" ><input type="text" name="fpartprice"  disabled value="<?php echo set_value('fpartprice'); ?>" class="form-control-button n_wi-date2"></td>
														</tr>
														<tr>
															<td style="padding-left:10px;" class="ui-w">Vendor Price (RM) : </td>
															<td style="padding-left:10px;" ><input type="text" name="fvendorprice"  disabled value="<?php echo set_value('fvendorprice'); ?>" class="form-control-button n_wi-date2"></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Related WO/PPM</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table" style="padding-bottom: 8px;">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">WO/PPM No. :  </td>
										<td style="padding-left:10px;" ><input type="text" name="n_phone_number" id="n_phone_number" disabled value="<?php echo set_value('n_phone_number'); ?>" class="form-control-button n_wi-eq3" readonly> <span class="icon-windows" onclick="fpop_location_user()"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Work Order</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Create Work Order: </td>
										<td style="padding-left:10px;" >
										<input type="checkbox" name="chkbox" value="ON" id ="checkbox" checked disabled>
										</td>
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
			<?php echo form_hidden('n_request_type',$this->input->post('n_request_type'));?>
			<?php echo form_hidden('n_request_date',$this->input->post('n_request_date'));?>
			<?php echo form_hidden('n_hour',$this->input->post('n_hour'));?>
			<?php echo form_hidden('n_min',$this->input->post('n_min'));?>
			<?php echo form_hidden('n_priority',$this->input->post('n_priority'));?>
			<?php echo form_hidden('fSummary',$this->input->post('fSummary'));?>
			<?php echo form_hidden('fSummary2',$this->input->post('fSummary2'));?>
			<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
			<?php echo form_hidden('n_tag_number',$this->input->post('n_tag_number'));?>
			<?php echo form_hidden('n_serial_number',$this->input->post('n_serial_number'));?>
			<?php echo form_hidden('n_name',$this->input->post('n_name'));?>
			<?php echo form_hidden('fBy',$this->input->post('fBy'));?>
			<?php echo form_hidden('fUserDeptCode',$this->input->post('fUserDeptCode'));?>
			<?php echo form_hidden('fLocationCode',$this->input->post('fLocationCode'));?>
			<?php echo form_hidden('n_phone_number',$this->input->post('n_phone_number'));?>
			<?php echo form_hidden('chkbox',$this->input->post('chkbox'));?>
			<?php echo form_hidden('segment',$this->input->post('segment'));?>
			<?php echo form_hidden('wrk_ord',$this->input->post('wrk_ord'));?>
			<?php echo form_hidden('fitem',$this->input->post('fitem'));?>
			<?php echo form_hidden('fpartprice',$this->input->post('fpartprice'));?>
			<?php echo form_hidden('fvendorprice',$this->input->post('fvendorprice'));?>



		</div>
	</div>
</div>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
