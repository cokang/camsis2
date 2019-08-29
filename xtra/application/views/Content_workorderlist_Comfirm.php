<?php echo form_open('workorderlist_update_ctrl/comfirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Request</b></td>
			</tr>
			<tr class="ui-content-form-2" style="">
				<td class="ui-desk-style-table" valign="top">
					<div class="ui-main-form-1">
						<table class="" width="100%" border="0"  height="100%" style="color:black;">
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Request Details</td></tr>
							<tr>
								<td class="td-assest">Request Type : </td>
								<td ><?= isset($record[0]->V_request_type) == TRUE ? $record[0]->V_request_type : ($this->input->post('bookwo') == 'O' ? 'A4' : 'N/A')?></td>
							</tr>
							<tr>
								<td class="td-assest" valign="top">Request Date : </td>
								<td ><input type="text" name="n_request_date" value="<?php echo set_value('n_request_date'); ?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest" valign="top">Request Time : </td>
								<td>
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
									        <?php echo form_dropdown('n_hour', $hour_list, set_value('n_hour',date('H')) , 'class="dropdown" style="width: 52px;" disabled');?>
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
								<td class="td-assest" valign="top">Priority :  </td>
								<td  valign="top">
									<input type="radio" id="radio-1-1" name="n_priority" class="regular-radio" <?php echo set_radio('n_priority', 'Normal',true); ?> disabled/>
									<label for="radio-1-1"></label> Normal<br>
									<input type="radio" id="radio-1-2" name="n_Priority" class="regular-radio" <?php echo set_radio('n_priority', 'Emergency',true); ?> disabled/>
									<label for="radio-1-2"></label><span style="color:red;"> Emergency</span><br>
								</td>
							</tr>
							<tr>
								<td class="td-assest" valign="top">Summary : </td>
								<td><textarea name="n_summary" class="input n_com2" disabled><?php echo set_value('n_summary'); ?></textarea></td>
							</tr>
							<?php if ($this->session->userdata('usersess')=='BEMS' OR $this->session->userdata('usersess')=='FES') {?>
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Related Asset</td></tr>
							<tr>
								<td class="td-assest">Asset Number :  </td>
								<td ><input type="text" name="n_asset_number" value="<?php echo $this->input->post('n_asset_number');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Tag Number : </td>
								<td ><input type="text" name="n_tag_number" value="<?php echo $this->input->post('n_tag_number');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Serial Number :</td>
								<td><input type="text" name="n_serial_number" value="<?php echo $this->input->post('n_serial_number');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Name : </td>
								<td ><input type="text" name="n_name" value="<?php echo $this->input->post('n_name');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Link Work Order : </td>
								<td ><input type="text" name="n_link" id="n_link" value="<?php echo $this->input->post('n_link');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<div class="ui-main-form-2">
						<table style="color:black;" width="100%" border="0">
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Requestor</td></tr>
							<tr>
								<td class="td-assest">Requested By :  </td>
								<td ><input type="text" name="n_requested" value="<?php echo $this->input->post('n_requested');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest" valign="top">Designation : </td>
								<td valign="top">
									<input type="radio" id="radio-1-3" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Doctor',true); ?> disabled/>
									<label for="radio-1-3"></label> Doctor<br>
									<input type="radio" id="radio-1-4" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Matron',true); ?> disabled/>
									<label for="radio-1-4"></label> Matron<br>
									<input type="radio" id="radio-1-5" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Medical Assistant',true); ?> disabled/>
									<label for="radio-1-5"></label> Medical Assistant<br>
									<input type="radio" id="radio-1-6" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'IIUM Officer',true); ?> disabled/>
									<label for="radio-1-6"></label> IIUM Officer<br>
									<input type="radio" id="radio-1-7" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Sister In-Charge',true); ?> disabled/>
									<label for="radio-1-7"></label> Sister In-Charge<br>
									<input type="radio" id="radio-1-8" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Sister On Duty',true); ?> disabled/>
									<label for="radio-1-8"></label> Sister On Duty<br>
									<input type="radio" id="radio-1-9" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Specialist',true); ?> disabled/>
									<label for="radio-1-9"></label> Specialist<br>
									<input type="radio" id="radio-1-10" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Staff Nurse',true); ?> disabled/>
									<label for="radio-1-10"></label> Staff Nurse<br>
									<input type="radio" id="radio-1-11" name="n_designation" class="regular-radio" <?php echo set_radio('n_designation', 'Supervisor',true); ?> disabled/>
									<label for="radio-1-11"></label> Supervisor<br>
									<input type="radio" id="radio-1-12" name="n_designation" class="regular-radio" value = "APSB" <?php echo set_radio('n_designation', 'APSB'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'APSB' ? 'checked' : ''?>disabled/>
									<label for="radio-1-12"></label> APSB<br>
									<input type="radio" id="radio-1-13" name="n_designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_designation', 'PMSB'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'PMSB' ? 'checked' : ''?>disabled/>
									<label for="radio-1-13"></label> PMSB<br>
									<input type="radio" id="radio-1-14" name="n_designation" class="regular-radio" value = "APFMS" <?php echo set_radio('n_designation', 'APFMS'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'APFMS' ? 'checked' : ''?>disabled/>
									<label for="radio-1-14"></label> APFMS<br>

								</td>
							</tr>
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>
							<tr>
								<td class="td-assest">Phone Number :  </td>
								<td ><input type="text" name="n_phone_number" value="<?php echo set_value('n_phone_number'); ?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">User Department :   </td>
								<td ><input type="text" name="n_user_department" value="<?php echo $this->input->post('n_user_department');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">&nbsp; </td>
								<td><input type="text" name="n_user_department1" value="<?php echo $this->input->post('n_user_department1');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Location : </td>
								<td><input type="text" name="n_location" value="<?php echo $this->input->post('n_location');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">&nbsp; </td>
								<td><input type="text" name="n_location2" value="<?php echo $this->input->post('n_location2');?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
						</table>
					</div>

				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('wrk_ord', $this->input->post('wrk_ord')); ?>
		<?php echo form_hidden('n_request_date',$this->input->post('n_request_date'));?>
		<?php echo form_hidden('n_hour',$this->input->post('n_hour'));?>
		<?php echo form_hidden('n_min',$this->input->post('n_min'));?>
		<?php echo form_hidden('n_priority',$this->input->post('n_priority'));?>
		<?php echo form_hidden('n_summary',$this->input->post('n_summary'));?>
		<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
		<?php echo form_hidden('n_tag_number',$this->input->post('n_tag_number'));?>
		<?php echo form_hidden('n_serial_number',$this->input->post('n_serial_number'));?>
		<?php echo form_hidden('n_name',$this->input->post('n_name'));?>
		<?php echo form_hidden('n_requested',$this->input->post('n_requested'));?>
		<?php echo form_hidden('n_designation',$this->input->post('n_designation'));?>
		<?php echo form_hidden('n_phone_number',$this->input->post('n_phone_number'));?>
		<?php echo form_hidden('n_user_department',$this->input->post('n_user_department'));?>
		<?php echo form_hidden('n_user_department1',$this->input->post('n_user_department1'));?>
		<?php echo form_hidden('n_location',$this->input->post('n_location'));?>
		<?php echo form_hidden('n_location2',$this->input->post('n_location2'));?>
		<?php echo form_hidden('n_link',$this->input->post('n_link'));?>
		<?php echo form_hidden('bookwo', $this->input->post('bookwo')); ?>
		<?php echo form_hidden('whatid', $this->input->post('whatid')); ?>
	</div>
</div>
<?php echo form_close(); ?>
