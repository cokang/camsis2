<?php echo form_open('wo_visit_update_ctrl/comfirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="92%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Visit Three</b></td>
			</tr>
			<tr>
                        <td valign="top" class="td-assest">Visit Date : </td>
                        <td><input type="date" name="n_Visit_Date" value="<?php echo set_value('n_Visit_Date'); ?>" class="form-control-button2 n_wi-date2" readonly></td>
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
                                                        <?php echo form_dropdown('n_Shour', $hour_list, set_value('n_Shour',date('H')) , 'class="dropdown" style="width: 52px;"disabled'); ?> 
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
                                          <?php echo form_dropdown('n_Smin', $min_list, set_value('n_Smin',date('i')) , 'class="dropdown" style="width: 52px;"disabled'); ?>
                        </td></td>
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
                                                        <?php echo form_dropdown('n_Ehour', $hour_list, set_value('n_Ehour',date('H')) , 'class="dropdown" style="width: 52px;"disabled'); ?> 
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
                                          <?php echo form_dropdown('n_Emin', $min_list, set_value('n_Emin',date('i')) , 'class="dropdown" style="width: 52px;"disabled'); ?>
                        </td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest">Type of Work : </td>
                        <td>
                              <?php 
                              $TOW_list = array(
                              '' => '',
                              'Normal' => 'Normal',
                              'Reimbursable' => 'Reimbursable',
                              'UnderWarranty' => 'UnderWarranty',
                              'BER' => 'BER',
                              );
                              ?>
                              <?php echo form_dropdown('n_Type_of_Work', $TOW_list, $this->input->post('n_Type_of_Work') , 'class="dropdown n_wi-date2" disabled'); ?>
                        </td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest">Action Taken : </td>
                        <td><textarea class="input n_com" name="n_Action_Taken" readonly><?php echo set_value('n_Action_Taken'); ?></textarea></td>
                  </tr>
                  <tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">MAINTENANCE COST SECTION </td></tr>
                  <tr><td colspan="3" ><b>Reschedule</b></td></tr>
                  <tr>
                        <td class="td-assest">Reschedule Date :</td>
                        <td><input type="date" name="n_rschDate" value="<?php echo set_value('n_rschDate'); ?>" class="form-control-button2 n_wi-date2" readonly></td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest"> Reason :</td>
                        <td>
                             <input type="radio" id="radio-1-1" name="n_rschReason" class="regular-radio" value="1 - Not found" <?php echo set_radio('n_rschReason', '1 - Not found'); ?>disabled/> 
                              <label for="radio-1-1"></label> 1 - Not found <br />
                              <input type="radio" id="radio-1-2" name="n_rschReason" class="regular-radio" value="2 - In use" <?php echo set_radio('n_rschReason', '2 - In use'); ?>disabled/>   
                              <label for="radio-1-2"></label> 2 - In use<br />
                              <input type="radio" id="radio-1-3" name="n_rschReason" class="regular-radio" value="3 - Lock in room/not accessible" <?php echo set_radio('n_rschReason', '3 - Lock in room/not accessible'); ?>disabled/> 
                              <label for="radio-1-3"></label> 3 - Lock in room/not accessible <br />
                              <input type="radio" id="radio-1-4" name="n_rschReason" class="regular-radio" value="4 - Transferred" <?php echo set_radio('n_rschReason', '4 - Transferred'); ?>disabld/> 
                              <label for="radio-1-4"></label> 4 - Transferred <br />
                              <input type="radio" id="radio-1-5" name="n_rschReason" class="regular-radio" value="5 - Equipment down" <?php echo set_radio('n_rschReason', '5 - Equipment down'); ?>disabled/>   
                              <label for="radio-1-5"></label>  5 - Equipment down<br />
                              <input type="radio" id="radio-1-6" name="n_rschReason" class="regular-radio" value="6 - Breakdown of related support system" <?php echo set_radio('n_rschReason', '6 - Breakdown of related support system'); ?>disabled/> 
                              <label for="radio-1-6"></label> 6 - Breakdown of related support system <br />
                              <input type="radio" id="radio-1-7" name="n_rschReason" class="regular-radio" value="7 - Vendor delay" <?php echo set_radio('n_rschReason', '7 - Vendor delay'); ?>disabled/>   
                              <label for="radio-1-7"></label>  7 - Vendor delay<br />
                              <input type="radio" id="radio-1-8" name="n_rschReason" class="regular-radio" value="8 - Others" <?php echo set_radio('n_rschReason', '8 - Others'); ?>disabled/>   
                              <label for="radio-1-8"></label>  8 - Others<br />
                              <textarea class="input n_com" name="n_rschReason1" readonly><?php echo set_value('n_rschReason1'); ?></textarea>
                        </td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest">Reschedule Authorised By :</td>
                        <td><input type="text" id="n_rschAuth" name="n_rschAuth" value="<?php echo set_value('n_rschAuth'); ?>" size="10" class="form-control-button2 n_wi-date2"  readonly></td>
                  </tr>
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
                              <div class="p-vo-1"><span>Technical In Charge 1 </span></div>
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
                              <div class="p-vo-1"><span>Technical In Charge 2 </span></div>
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
                              <div class="p-vo-1"><span>Technical In Charge 3 </span></div>
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
                              <div class="p-vo-1"><span>Part Replaced </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                  <input type="text" name="V_part" value="<?php echo $this->input->post('V_part') ?>" size="10" class="form-control-button" readonly><span class="space"></span></div>
                              <div class="p-vo-3"><span class="ui-left_mobile">RM : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" name="V_partRM" value="<?php echo $this->input->post('V_partRM') ?>" size="10" class="form-control-button" style="text-align:center;" readonly><span class="space"></span></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : &nbsp;&nbsp;</span><input type="text" name="V_partRate" value="<?php echo $this->input->post('V_partRate') ?>" size="5" class="form-control-button" style="text-align:center;" readonly><span class="space"></span></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : &nbsp;</span><input type="text" id= "V_parttotal"  name="V_parttotal" value="<?php echo $this->input->post('V_parttotal') ?>" size="10" class="form-control-button" style="text-align:center;"><span class="space"></span></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-1"><span>Vendor Parts (Total) </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" name="V_Vendor" value="<?php echo $this->input->post('C_Vendor');?>" size="10" class="form-control-button2" readonly/><br />
                                    <span style="font-size:16px;"/><?php echo $this->input->post('V_Vendor');?></span></div>
                  </td>
                  </tr>
                  <tr class="ui-header-new" style="height:40px;">
                        <td align="center" colspan="2">
                              <input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                              <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
                        </td>
                  </tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->post('wrk_ord')); ?>
            <?php  echo form_hidden('vppm',$this->input->post('vppm')); ?>
            <?php echo form_hidden ('n_Visit_Date',$this->input->post('n_Visit_Date')); ?>
            <?php echo form_hidden('n_Shour',$this->input->post('n_Shour'));?>
            <?php echo form_hidden('n_Smin',$this->input->post('n_Smin'));?>
            <?php echo form_hidden('n_Ehour',$this->input->post('n_Ehour'));?>
            <?php echo form_hidden('n_Emin',$this->input->post('n_Emin'));?>
            <?php echo form_hidden('n_Type_of_Work',$this->input->post('n_Type_of_Work'));?>
            <?php echo form_hidden ('n_Action_Taken',$this->input->post('n_Action_Taken')); ?>
            <?php echo form_hidden ('n_rschDate',$this->input->post('n_rschDate')); ?>
            <?php echo form_hidden ('n_rschReason',$this->input->post('n_rschReason')); ?>
            <?php echo form_hidden ('n_rschReason1',$this->input->post('n_rschReason1')); ?>
            <?php echo form_hidden ('n_rschAuth',$this->input->post('n_rschAuth')); ?>
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
            <?php echo form_hidden('V_part',$this->input->post('V_part'));?>
            <?php echo form_hidden('V_partRM',$this->input->post('V_partRM'));?>
            <?php echo form_hidden('V_partRate',$this->input->post('V_partRate'));?>
            <?php echo form_hidden('V_parttotal',$this->input->post('V_parttotal'));?>
            <?php echo form_hidden('C_Vendor',$this->input->post('C_Vendor'));?>
            <?php echo form_hidden('V_Vendor',$this->input->post('V_Vendor'));?>				
	</div>
</div>
<?php echo form_close(); ?>