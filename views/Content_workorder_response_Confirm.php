<?php echo form_open('wo_response_update_ctrl/comfirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3"  cellpadding="4" cellspacing="0" width="92%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Response</b></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Request</td></tr>
			<tr>
				<td class="td-assest" valign="top">Request Date : </td>
				<td ><?= isset($disp[0]->D_date) == TRUE ? date_format(new DateTime($disp[0]->D_date), 'd-m-Y H:i') : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Priority :</td>
				<?php if (isset($disp[0]->V_priority_code)) { ?>
				<?php if ($disp[0]->V_priority_code == 'Normal') { ?>		
				<td><?= isset($disp[0]->V_priority_code) == TRUE ? $disp[0]->V_priority_code : 'N/A'?> <span style="color:green;">REQUEST MUST BE RESPONDED WITHIN 2 HOURS.</span></td>
				<?php } ?>
				<?php if ($disp[0]->V_priority_code == 'Emergency') { ?>		
				<td><?= isset($disp[0]->V_priority_code) == TRUE ? $disp[0]->V_priority_code : 'N/A'?> <span style="color:red;">REQUEST MUST BE RESPONDED NOWWW.</span></td>
				<?php } ?>
				<?php } ?>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Response Details</td></tr>
			<tr>
				<td class="td-assest" valign="top">Response Date : </td>
				<td><input type="text" name="n_Response_Date" value="<?php echo set_value('n_Response_Date'); ?>" class="form-control-button2"  readonly></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Start Time :</td>
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
								        <?php echo form_dropdown('n_Shour', $hour_list, set_value('n_Shour',date('H')) , 'class="dropdown" style="width: 52px;" disabled'); ?> 
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
		              			<?php echo form_dropdown('n_Smin', $min_list, set_value('n_Smin',date('i')) , 'class="dropdown" style="width: 52px;" disabled'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">End Time :</td>
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
								        <?php echo form_dropdown('n_Ehour', $hour_list, set_value('n_Ehour',date('H')) , 'class="dropdown" style="width: 52px;" disabled'); ?> 
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
		              			<?php echo form_dropdown('n_Emin', $min_list, set_value('n_Emin',date('i')) , 'class="dropdown" style="width: 52px;" disabled'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Response Finding : </td>
				<td><textarea class="input n_com" name="n_Action_Taken" readonly><?php echo set_value('n_Action_Taken'); ?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Personnel</td></tr>
			<tr>
                        <td colspan="3">
                              <div class="p-vo-normal">
                                    <table style="color:black;" width="">
                                          <tr style="font-weight: bold;">
                                                <td width="302px" style="padding-left:20px;">Name</td>
                                                <td width="150px" align="center">Time Spent</td>
                                                <td width="152px" align="center">Rate</td>
                                                <td width="122px;" align="center">Total</td>
                                          </tr>
                                    </table>
                              </div>
                              <div class="p-vo-1"><span>Responder 1 (must) </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" name="V_requestor1" value="<?php echo $this->input->post('C_requestor1');?>" size="10" class="form-control-button2" readonly><br />
                                    <span style="font-size:16px;"><?php echo $this->input->post('V_requestor1');?></span>
                              </div>
                              <div class="p-vo-3"><span class="ui-left_mobile">Time Spent : </span><?php 
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

                                                        <?php echo form_dropdown('n_End_Time_h1', $hour_list, set_value('n_End_Time_h1',date('H')) , 'class="dropdown" style="width: 52px;" disabled'); ?> 
                                                            
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
                                          <?php echo form_dropdown('n_End_Time_m1', $min_list, set_value('n_End_Time_m1',date('i')) , 'class="dropdown" style="width: 52px;" disabled'); ?></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span>RM<input type="text" id="n_personnel_rate2" name="V_rate2" value="<?php echo set_value('V_rate1'); ?>" size="10" class="input-none-rate" readonly></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span>RM<input type="text" id="T_rate2" name="T_rate2" value="<?php echo set_value('T_rate1'); ?>" size="10" class="input-none-rate" readonly></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-1"><span>Responder 2 (optional) </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" name="V_requestor2" value="<?php echo $this->input->post('C_requestor2');?>" size="10" class="form-control-button2" readonly><br />
                                    <span style="font-size:16px;"><?php echo $this->input->post('V_requestor2');?></span>
                              </div>
                              <div class="p-vo-3"><span class="ui-left_mobile">Time Spent : </span><?php 
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
                                                        <?php echo form_dropdown('n_End_Time_h2', $hour_list, set_value('n_End_Time_h2',date('H')) , 'class="dropdown" style="width: 52px;" disabled'); ?> 
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
                                          <?php echo form_dropdown('n_End_Time_m2', $min_list, set_value('n_End_Time_m2',date('i')) , 'class="dropdown" style="width: 52px;" disabled'); ?></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span>RM<input type="text" id="n_personnel_rate2" name="V_rate2" value="<?php echo set_value('V_rate2'); ?>" size="10" class="input-none-rate" readonly></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span>RM<input type="text" id="T_rate2" name="T_rate2" value="<?php echo set_value('T_rate2'); ?>" size="10" class="input-none-rate" readonly></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-1"><span>Labor Cost (Internal Vendor) </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" name="V_requestor3" value="<?php echo $this->input->post('C_requestor3');?>" size="10" class="form-control-button2" readonly><br />
                                    <span style="font-size:16px;"><?php echo $this->input->post('V_requestor3');?></span>
                              </div>
                              <div class="p-vo-3"><span class="ui-left_mobile">Time Spent : </span><?php 
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
                                                        <?php echo form_dropdown('n_End_Time_h3', $hour_list, set_value('n_End_Time_h3',date('H')) , 'class="dropdown" style="width: 52px;" disabled'); ?> 
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
                                          <?php echo form_dropdown('n_End_Time_m3', $min_list, set_value('n_End_Time_m3',date('i')) , 'class="dropdown" style="width: 52px;" disabled'); ?></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span>RM<input type="text" id="n_personnel_rate3" name="V_rate3" value="<?php echo set_value('V_rate3'); ?>" size="10" class="input-none-rate" readonly></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span>RM<input type="text" id="T_rate3" name="T_rate3" value="<?php echo set_value('T_rate3'); ?>" size="10" class="input-none-rate" readonly></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-normal">
                                    <table style="color:black;" width="">
                                          <tr style="font-weight: bold;">
                                                <td width="302px" style="padding-left:20px;">Name</td>
                                                <td width="150px" align="center">RM</td>
                                                <td width="152px" align="center">Rate</td>
                                                <td width="122px;" align="center">Total</td>
                                          </tr>
                                    </table>
                              </div>
                              <div class="p-vo-1"><span>Vendor Parts (Total) </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" name="V_Vendor" value="<?php echo $this->input->post('C_Vendor');?>" size="10" class="form-control-button2" readonly/><br />
                                    <span style="font-size:16px;"/><?php echo $this->input->post('V_Vendor');?></span></div>
                              <div class="p-vo-3"><span class="ui-left_mobile">RM : </span><input type="text" name="V_reqRM" value="<?php echo $this->input->post('V_reqRM');?>" size="10" class="form-control-button2" readonly/><span class="space"></span></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span><input type="text" id="V_reqRate" name="V_reqRate" value= "<?php echo $this->input->post('V_reqRate');?>" size="10" class="form-control-button2" readonly><span class="space"></span></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span><input type="text" id= "V_reqtotal"  name="V_reqtotal" value="<?php echo $this->input->post('V_reqtotal');?>" size="5" class="form-control-button2" readonly></div>
                        </td>
                  </tr>
                  <tr>
                        <td class="td-assest" valign="top">User Verification : </td>
                        <td><input type="text" name="name" value="<?php echo set_value('name') ?>" class="form-control-button2" readonly></td>
                        <!--<td><input type="text" name="name" value="<?php echo set_value('username') ?>" class="form-control-button2" readonly></td>-->
                  </tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                              <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>	
		<?php echo form_hidden ('wrk_ord',$this->input->post('wrk_ord')); ?>
            <?php echo form_hidden ('name',$this->input->post('name')); ?>
            <!--<?php echo form_hidden ('username',$this->input->post('username')); ?>-->
		<?php echo form_hidden ('n_Response_Date',$this->input->post('n_Response_Date')); ?>
		<?php echo form_hidden('n_Shour',$this->input->post('n_Shour'));?>
		<?php echo form_hidden('n_Smin',$this->input->post('n_Smin'));?>
		<?php echo form_hidden('n_Ehour',$this->input->post('n_Ehour'));?>
		<?php echo form_hidden('n_Emin',$this->input->post('n_Emin'));?>
		<?php echo form_hidden ('n_Action_Taken',$this->input->post('n_Action_Taken')); ?>	
		<?php echo form_hidden ('C_requestor1',$this->input->post('C_requestor1')); ?>	
		<?php echo form_hidden ('V_requestor1',$this->input->post('V_requestor1')); ?>
		<?php echo form_hidden('n_End_Time_h1',$this->input->post('n_End_Time_h1'));?>
		<?php echo form_hidden('n_End_Time_m1',$this->input->post('n_End_Time_m1'));?>
		<?php echo form_hidden('V_rate1',$this->input->post('V_rate1'));?>
		<?php echo form_hidden('T_rate1',$this->input->post('T_rate1'));?>
		<?php echo form_hidden ('C_requestor2',$this->input->post('C_requestor2')); ?>
		<?php echo form_hidden ('V_requestor2',$this->input->post('V_requestor2')); ?>
		<?php echo form_hidden('n_End_Time_h2',$this->input->post('n_End_Time_h2'));?>
		<?php echo form_hidden('n_End_Time_m2',$this->input->post('n_End_Time_m2'));?>
		<?php echo form_hidden('V_rate2',$this->input->post('V_rate2'));?>
		<?php echo form_hidden('T_rate2',$this->input->post('T_rate2'));?>
		<?php echo form_hidden ('C_requestor3',$this->input->post('C_requestor3')); ?>
		<?php echo form_hidden ('V_requestor3',$this->input->post('V_requestor3')); ?>
		<?php echo form_hidden('n_End_Time_h3',$this->input->post('n_End_Time_h3'));?>
		<?php echo form_hidden('n_End_Time_m3',$this->input->post('n_End_Time_m3'));?>
		<?php echo form_hidden('V_rate3',$this->input->post('V_rate3'));?>
		<?php echo form_hidden('T_rate3',$this->input->post('T_rate3'));?>
		<?php echo form_hidden('C_Vendor',$this->input->post('C_Vendor'));?>
		<?php echo form_hidden('V_Vendor',$this->input->post('V_Vendor'));?>
		<?php echo form_hidden('V_reqRM',$this->input->post('V_reqRM'));?>
		<?php echo form_hidden('V_reqRate',$this->input->post('V_reqRate'));?>
		<?php echo form_hidden('V_reqtotal',$this->input->post('V_reqtotal'));?>
	</div>
</div>
<?php echo form_close(); ?>