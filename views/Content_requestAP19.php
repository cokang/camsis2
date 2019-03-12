<?php echo form_open('contentcontroller/request_AP19');?>
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
												<input type="radio" id="radio-1-1" name="n_request_type" class="regular-radio" value="AP19" <?php echo set_radio('n_request_type', 'AP19',true); ?> checked />   
												<label for="radio-1-1"></label> AP19 - AP Service Report<br>
							
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Request Date :   </td>
											<td style="padding-left:10px;" valign="top"><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_request_date" max="<?=date('Y-m-d')?>" autocomplete="off" value="<?=(isset($record[0]->D_date)) ? date("d-m-Y",strtotime($record[0]->D_date)): date('d-m-Y');?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
										<td style="padding-left:10px;" valign="top">Request&nbsp;Time&nbsp;:&nbsp;</td>
				            <td style="padding-left:10px;" valign="top">
										<?php 
										$pieces = isset($record[0]->D_time) ? explode(":", $record[0]->D_time): '' ;
										
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
								        <?php echo form_dropdown('n_hour', $hour_list, set_value('n_hour',($pieces) ? $pieces[0] : date('H')) , 'class="dropdown" style="width: 52px;"'); ?> 
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
		              			<?php echo form_dropdown('n_min', $min_list, set_value('n_min',($pieces) ? $pieces[1] : date('i')) , 'class="dropdown" style="width: 52px;"'); ?> 
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Nature of visit:  </td>
											<td style="padding-left:10px;" valign="top">	
												<input type="radio" id="radio-1-13" name="n_priority" class="regular-radio" value="RQ" <?php echo set_radio('n_priority' , 'RQ' ,TRUE); ?><?=(isset($record[0]->V_priority_code) && ($record[0]->V_priority_code == 'RQ') ? 'checked' : '' )?> />   
												<label for="radio-1-13"></label> Breakdown<br>
												<input type="radio" id="radio-1-14" name="n_priority" class="regular-radio" value="PPM" <?php echo set_radio('n_priority', 'PPM' ); ?> <?=(isset($record[0]->V_priority_code) && ($record[0]->V_priority_code == 'PPM') ? 'checked' : '' )?> />   
												<label for="radio-1-14"></label> PPM<br>
												<input type="radio" id="radio-1-14" name="n_priority" class="regular-radio" value="Others" <?php echo set_radio('n_priority', 'Others' ); ?> <?=(isset($record[0]->V_priority_code) && ($record[0]->V_priority_code == 'Others') ? 'checked' : '' )?> />   
												<label for="radio-1-14"></label> Other<br>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Failure Report : </td>
											<td style="padding-left:10px;"><textarea class="Input n_com2" name="fSummary" cols="17" rows="6"><?php echo set_value('fSummary' ,(isset($record[0]->V_summary)) ? $record[0]->V_summary :'') ; ?></textarea></td>
										</tr>

										<tr>
											<td style="padding-left:10px;" valign="top">Troubleshoot/Corrective Action : </td>
											<td style="padding-left:10px;"><textarea class="Input n_com2" name="fSummary2" cols="17" rows="6"><?php echo set_value('fSummary2',(isset($record[0]->V_details)) ? $record[0]->V_details :''); ?></textarea></td>
										</tr>																																				
									</table>
								</td>
							</tr>
					</table>
				</div>
				
				<div class="middle_d">
					<?php if ($this->session->userdata('usersess')=='BEMS' OR $this->session->userdata('usersess')!='FES') {?>
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Related Asset </b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Asset Number :   </td>
										<?php 
										//$asstnum = isset($record[0]->V_Asset_name) ? $record[0]->V_Asset_name : 'n_asset_number';
									
										
										?>
										<td style="padding-left:10px;" width=""><input type="text" id="n_asset_number" name="n_asset_number" value="<?= isset($record[0]->V_Asset_no) ? $record[0]->V_Asset_no : set_value('n_asset_number'); ?>" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="fCallassetsnumber(this)"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Tag Number :   </td>
										<td style="padding-left:10px;"><input type="text" id="n_tag_number" name="n_tag_number"  value="<?= isset($record[0]->V_Tag_no) ? $record[0]->V_Tag_no : set_value('n_tag_number'); ?>" class="form-control-button2 n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Serial Number :  </td>
										<td style="padding-left:10px;"><input type="text" id="n_serial_number" name="n_serial_number" value="<?=isset($record[0]->V_Serial_no) ? $record[0]->V_Serial_no : set_value('n_serial_number'); ?>" class="form-control-button2 n_wi-date2" readonly></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Name :	 </td>
										<td style="padding-left:10px;"><input type="text" id="n_name" name="n_name" value="<?=isset($record[0]->V_Asset_name) ? $record[0]->V_Asset_name :  set_value('n_name'); ?>" class="form-control-button2 n_wi-date2" readonly></td>
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
							<td colspan="2" class="ui-header-new"><b>Related Document</b></td>
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
										<td style="padding-left:10px;" class="ui-w">LOC NO : </td>
										<td style="padding-left:10px;" ><input type="text" name="fBy" value="<?=isset($record[0]->V_requestor) ? $record[0]->V_requestor : set_value('fBy'); ?>" class="form-control-button n_wi-date2"></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" class="ui-w">PO NO : </td>
										<td style="padding-left:10px;" ><input type="text" name="fUserDeptCode" value="<?=isset($record[0]->V_User_dept_code) ? $record[0]->V_User_dept_code : set_value('fUserDeptCode'); ?>" class="form-control-button n_wi-date2"></td>
									</tr>	
									<tr>
										<td style="padding-left:10px;" class="ui-w">Letter Ref : </td>
										<td style="padding-left:10px;" ><input type="text" name="fLocationCode" value="<?=isset($record[0]->V_Location_code) ? $record[0]->V_Location_code : set_value('fLocationCode'); ?>" class="form-control-button n_wi-date2"></td>
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
										<td style="padding-left:10px;" ><input type="text" name="n_phone_number" id="n_phone_number" value="<?=isset($record[0]->v_ref_wo_no) ? $record[0]->v_ref_wo_no : set_value('n_phone_number'); ?>" class="form-control-button n_wi-eq3" readonly> <span class="icon-windows" value="rwo" onclick="pop_requests(this)"></span>
										<input type="hidden" id="n_location" name="n_location" value="<?=$this->session->userdata('hosp_code')?>"></td>
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
										<input type="checkbox" name="chkbox" value="ON" id ="checkbox" checked>
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
			<?php echo form_hidden('parent',$this->input->get('parent'));?>
			<?php echo form_hidden('wrk_ord',isset($record[0]->V_Request_no) ? $record[0]->V_Request_no : '');?>
			<?php echo form_hidden('segment',$this->uri->segment(2));?>
		</div>
	</div>
</div>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
