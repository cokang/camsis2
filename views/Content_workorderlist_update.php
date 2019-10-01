<?php echo form_open('workorderlist_update_ctrl');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" style="border:color:black;" cellpadding="4" cellspacing="0">
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update Request</b><span style="color:red;"><?php echo validation_errors(); ?></span></td>
			</tr>
			<tr class="ui-content-form-2">
				<td class="ui-desk-style-table" width="100%" valign="top">
					<div class="ui-main-form-1">
						<table class="" width="100%" border="0"  height="100%" style="color:black;">
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Request Details</td></tr>

							<tr>
								<td class="td-assest">Request Type : </td>
								<td ><input type="text" name="request_type" value="<?php echo set_value('request_type', isset($record[0]->V_request_type) == TRUE ? $record[0]->V_request_type : ($this->input->get('bookwo') == 'O' ? 'A4' : 'N/A'))?>" size="10" class="input-none" readonly></td>
								<!--<?= isset($record[0]->V_request_type) == TRUE ? $record[0]->V_request_type : 'N/A'?>-->
							</tr>
							<tr>
								<td class="td-assest" valign="top">Request Date : </td>
								<td ><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_request_date" value="<?php echo set_value('n_request_date', isset($record[0]->D_date) == TRUE ? date_format(new DateTime($record[0]->D_date), 'd-m-Y') : 'N/A'); ?>" class="form-control-button n_wi-date2"></td>
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
									        <?php echo form_dropdown('n_hour', $hour_list, set_value('n_hour',isset($time[0]) == TRUE ? $time[0] : 'N/A') , 'class="dropdown" style="width: 52px;"'); ?>
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
			              			<?php echo form_dropdown('n_min', $min_list, set_value('n_min',isset($time[1]) == TRUE ? $time[1] : 'N/A') , 'class="dropdown" style="width: 52px;"'); ?>
								</td>
							</tr>
							<tr>
								<td class="td-assest" style="padding-left:10px;" valign="top">Priority :  </td>
								<td valign="top">
									<input type="radio" id="radio-1-1" name="n_priority" class="regular-radio" value = "Normal" <?php echo set_radio('n_priority', 'Normal',TRUE); ?><?= isset($record[0]->V_priority_code) &&  $record[0]->V_priority_code == 'Normal' ? 'checked' : 'checked'?>/>
									<label for="radio-1-1"></label> Normal<br>
									<input type="radio" id="radio-1-2" name="n_priority" class="regular-radio" value = "Emergency" <?php echo set_radio('n_priority', 'Emergency'); ?><?= isset($record[0]->V_priority_code) && $record[0]->V_priority_code == 'Emergency' ? 'checked' : ''?>/>
									<label for="radio-1-2"></label><span style="color:red;"> Emergency</span><br>
								</td>
							</tr>
							<tr>
								<td class="td-assest" valign="top">Summary : </td>
								<td ><textarea name="n_summary" class="input n_com2"><?php echo set_value('n_summary', isset($record[0]->V_summary) == TRUE ? $record[0]->V_summary : 'N/A'); ?></textarea></td>
							</tr>
							<?php if ($this->session->userdata('usersess')=='BEMS' OR $this->session->userdata('usersess')=='FES') {?>
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Related Asset</td></tr>
							<tr>
								<td class="td-assest" width="25%">Asset Number :  </td>
								<td ><input type="text" name="n_asset_number" id="n_asset_number" value="<?php echo set_value('n_asset_number', isset($record[0]->V_Asset_no) == TRUE ? $record[0]->V_Asset_no : 'N/A')?>" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fCallassetsnumber(this)" value=""></span></td>
							</tr>
							<tr>
								<td class="td-assest">Tag Number : </td>
								<td ><input type="text" name="n_tag_number" id="n_tag_number" value="<?php echo set_value('n_tag_number', isset($record[0]->V_Tag_no) == TRUE ? $record[0]->V_Tag_no : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td><!--<?php echo set_value('n_tag_number', isset($record[0]->V_Tag_no) == TRUE ? $record[0]->V_Tag_no : 'N/A')?>-->
							</tr>
							<tr>
								<td class="td-assest">Serial Number :</td>
								<td ><input type="text" name="n_serial_number" id="n_serial_number" value="<?php echo set_value('n_serial_number', isset($record[0]->V_Serial_no) == TRUE ? $record[0]->V_Serial_no : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Name : </td>
								<td ><input type="text" name="n_name" id="n_name" value="<?php echo set_value('n_name', isset($record[0]->V_Asset_name) == TRUE ? $record[0]->V_Asset_name : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<?php if ($this->input->get('bookwo') == '') { ?>
							<tr>
								<td class="td-assest">Link Work Order : </td>
								<td ><input type="text" name="n_link" id="n_link" value="<?php echo set_value('n_link', isset($record[0]->link_wo) == TRUE ? $record[0]->link_wo : '')?>" class="form-control-button n_wi-date2 n_wi-eq3" readonly> <span class="icon-windows" onclick="flink('<?=date('m',strtotime($record[0]->D_date))?>','<?=date('Y',strtotime($record[0]->D_date))?>')"></span></td>
							</tr>
							<?php } ?>
							<?php } ?>
						</table>
					</div>
					<div class="ui-main-form-2">
						<table style="color:black;" width="100%" border="0">
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Requestor</td></tr>
							<tr>
								<td class="td-assest">Requested By :  </td>
								<td ><input type="text" name="n_requested" value="<?php echo set_value('n_requested', isset($record[0]->V_requestor) == TRUE ? $record[0]->V_requestor : 'N/A')?>" class="form-control-button n_wi-date2"></td>
							</tr>
							<tr>
								<td class="td-assest" valign="top">Designation : </td>
								<td  valign="top">
									<input type="radio" id="radio-1-3" name="n_designation" class="regular-radio" value = "Doctor" <?php echo set_radio('n_designation', 'Doctor', TRUE); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Doctor' ? 'checked' : 'checked'?>/>
									<label for="radio-1-3"></label> Doctor<br>
									<input type="radio" id="radio-1-4" name="n_designation" class="regular-radio" value = "Matron" <?php echo set_radio('n_designation', 'Matron'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Matron' ? 'checked' : ''?>/>
									<label for="radio-1-4"></label> Matron<br>
									<input type="radio" id="radio-1-5" name="n_designation" class="regular-radio" value = "Medical Assistant" <?php echo set_radio('n_designation', 'Medical Assistant'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Medical Assistant' ? 'checked' : ''?>/>
									<label for="radio-1-5"></label> Medical Assistant<br>
									<input type="radio" id="radio-1-6" name="n_designation" class="regular-radio" value = "IIUM Officer" <?php echo set_radio('n_designation', 'IIUM Officer'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'IIUM Officer' ? 'checked' : ''?>/>
									<label for="radio-1-6"></label> IIUM Officer<br>
									<input type="radio" id="radio-1-7" name="n_designation" class="regular-radio" value = "Sister In-Charge" <?php echo set_radio('n_designation', 'Sister In-Charge'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Sister In-Charge' ? 'checked' : ''?>/>
									<label for="radio-1-7"></label> Sister In-Charge<br>
									<input type="radio" id="radio-1-8" name="n_designation" class="regular-radio" value = "Sister On Duty" <?php echo set_radio('n_designation', 'Sister On Duty'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Sister On Duty' ? 'checked' : ''?>/>
									<label for="radio-1-8"></label> Sister On Duty<br>
									<input type="radio" id="radio-1-9" name="n_designation" class="regular-radio" value = "Specialist" <?php echo set_radio('n_designation', 'Specialist'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Specialist' ? 'checked' : ''?>/>
									<label for="radio-1-9"></label> Specialist<br>
									<input type="radio" id="radio-1-10" name="n_designation" class="regular-radio" value = "Staff Nurse" <?php echo set_radio('n_designation', 'Staff Nurse'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Staff Nurse' ? 'checked' : ''?>/>
									<label for="radio-1-10"></label> Staff Nurse<br>
									<input type="radio" id="radio-1-11" name="n_designation" class="regular-radio" value = "Supervisor" <?php echo set_radio('n_designation', 'Supervisor'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'Supervisor' ? 'checked' : ''?>/>
									<label for="radio-1-11"></label> Supervisor<br>
									<input type="radio" id="radio-1-12" name="n_designation" class="regular-radio" value = "APSB" <?php echo set_radio('n_designation', 'APSB'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'APSB' ? 'checked' : ''?>/>
									<label for="radio-1-12"></label> APSB<br>
									<input type="radio" id="radio-1-13" name="n_designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_designation', 'PMSB'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'PMSB' ? 'checked' : ''?>/>
									<label for="radio-1-13"></label> PMSB<br>
									<input type="radio" id="radio-1-14" name="n_designation" class="regular-radio" value = "APFMS" <?php echo set_radio('n_designation', 'APFMS'); ?><?= isset($record[0]->V_MohDesg) && $record[0]->V_MohDesg == 'APFMS' ? 'checked' : ''?>/>
									<label for="radio-1-14"></label> APFMS<br>
								</td>
							</tr>
							<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>
							<tr>
								<td class="td-assest">Phone Number :  </td>
								<td ><input type="text" name="n_phone_number" id="n_phone_number"  value="<?php echo set_value('n_phone_number', isset($record[0]->V_phone_no) == TRUE ? $record[0]->V_phone_no : 'N/A')?>" class="form-control-button n_wi-eq3" readonly> <span class="icon-windows" onclick="fpop_location_user()"></span></td>
							</tr>
							<tr>
								<td class="td-assest">User Department :   </td>
								<td ><input type="text" name="n_user_department" id="n_user_department" value="<?php echo set_value('n_user_department', isset($record[0]->V_User_dept_code) == TRUE ? $record[0]->V_User_dept_code : 'N/A')?>" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fCalllocation()" ></span></td>
							</tr>
							<tr>
								<td class="td-assest">&nbsp; </td>
								<td ><input type="text" name="n_user_department1" id="n_user_department1" value="<?php echo set_value('n_user_department1', isset($record[0]->v_UserDeptDesc) == TRUE ? $record[0]->v_UserDeptDesc : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">Location : </td>
								<td ><input type="text" name="n_location" id="n_location" value="<?php echo set_value('n_location', isset($record[0]->V_location_code) == TRUE ? $record[0]->V_location_code : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
							<tr>
								<td class="td-assest">&nbsp; </td>
								<td><input type="text" name="n_location2" id="n_location2" value="<?php echo set_value('n_location2', isset($record[0]->v_Location_Name) == TRUE ? $record[0]->v_Location_Name : 'N/A')?>" class="form-control-button n_wi-date2" readonly></td>
							</tr>
						</table>
					</div>









				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
				</td>
			</tr>
		</table>
			<?php echo form_hidden('wrk_ord', $this->input->get_post('wrk_ord')); ?>
			<?php echo form_hidden('bookwo', $this->input->get('bookwo')); ?>
			<?php echo form_hidden('whatid', $this->input->get('whatid')); ?>
			<?php include 'content_jv_popup.php';?>
	</form>

	</div>
</div>
<?php echo form_close(); ?>
