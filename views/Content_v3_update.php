<?php echo form_open('wo_visit_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
            <div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="92%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update Visit Three</b></td>
                         <span style="color:red;"><?php echo validation_errors(); ?>
			</tr>
			<tr>
                        <td valign="top" class="td-assest">Visit Date : </td>
                        <td><input type="date" name="n_Visit_Date" value="<?php echo set_value('n_Visit_Date',isset($record[0]->d_Date) == TRUE ? date_format(new DateTime($record[0]->d_Date), 'Y-m-d') : 'N/A)'?>" class="form-control-button2 n_wi-date2"></td>
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
                                                        <?php echo form_dropdown('n_Shour', $hour_list, set_value('n_Shour',isset($Stime[0]) == TRUE ? $Stime[0] : 'N/A') , 'class="dropdown" style="width: 52px;" id="Stime_h"'); ?> 
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
                                          <?php echo form_dropdown('n_Smin', $min_list, set_value('n_Smin',isset($Stime[1]) == TRUE ? $Stime[1] : 'N/A') , 'class="dropdown" style="width: 52px;" id="Stime_m"'); ?>
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
                                                        <?php echo form_dropdown('n_Ehour', $hour_list, set_value('n_Ehour',isset($Etime[0]) == TRUE ? $Etime[0] : 'N/A') , 'class="dropdown" style="width: 52px;" id="Etime_h"'); ?> 
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
                                          <?php echo form_dropdown('n_Emin', $min_list, set_value('n_Emin',isset($Etime[1]) == TRUE ? $Etime[1] : 'N/A') , 'class="dropdown" style="width: 52px;" id="Etime_m"'); ?>
                        </td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest">Type of Work : </td>
                        <td >
                              <?php 
                              $TOW_list = array(
                              '' => '',
                              'Normal' => 'Normal',
                              'Reimbursable' => 'Reimbursable',
                              'UnderWarranty' => 'UnderWarranty',
                              'BER' => 'BER',
                              );
                              ?>
                              <?php echo form_dropdown('n_Type_of_Work', $TOW_list, set_value('n_Type_of_Work',isset($record[0]->type_of_work) == TRUE ? $record[0]->type_of_work : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
                        </td>
                  </tr>
                  <tr>
                        <td class="td-assest" valign="top">Action Taken : </td>
                        <td><textarea class="input  n_com" name="n_Action_Taken"><?php echo set_value('n_Action_Taken',isset($record[0]->v_ActionTaken) == TRUE ? $record[0]->v_ActionTaken : 'N/A')?></textarea></td>
                  </tr>
                  <tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">MAINTENANCE COST SECTION </td></tr>
                  <tr><td colspan="3" ><b>Reschedule</b></td></tr>
                  <tr>
                        <td class="td-assest">Reschedule Date :</td>
                        <td><input type="date" name="n_rschDate" value="<?php echo set_value('n_rschDate',isset($record[0]->d_Reschdt) == TRUE ? date_format(new DateTime($record[0]->d_Reschdt), 'Y-m-d') : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest"> Reason :</td>
                        <td>
                              <input type="radio" id="radio-1-1" name="n_rschReason" class="regular-radio" value="1 - Not found" <?php echo set_radio('n_rschReason', '1 - Not found', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '1 - Not found' ? 'checked' : 'checked'?>/> 
                              <label for="radio-1-1"></label> 1 - Not found <br />
                              <input type="radio" id="radio-1-2" name="n_rschReason" class="regular-radio" value="2 - In use" <?php echo set_radio('n_rschReason', '2 - In use', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '2 - In use' ? 'checked' : ''?>/>   
                              <label for="radio-1-2"></label> 2 - In use<br />
                              <input type="radio" id="radio-1-3" name="n_rschReason" class="regular-radio" value="3 - Lock in room/not accessible" <?php echo set_radio('n_rschReason', '3 - Lock in room/not accessible', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '3 - Lock in room/not accessible' ? 'checked' : ''?>/> 
                              <label for="radio-1-3"></label> 3 - Lock in room/not accessible <br />
                              <input type="radio" id="radio-1-4" name="n_rschReason" class="regular-radio" value="4 - Transferred" <?php echo set_radio('n_rschReason', '4 - Transferred', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '4 - Transferred' ? 'checked' : ''?>/> 
                              <label for="radio-1-4"></label> 4 - Transferred <br />
                              <input type="radio" id="radio-1-5" name="n_rschReason" class="regular-radio" value="5 - Equipment down" <?php echo set_radio('n_rschReason', '5 - Equipment down', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '5 - Equipment down' ? 'checked' : ''?>/>   
                              <label for="radio-1-5"></label>  5 - Equipment down<br />
                              <input type="radio" id="radio-1-6" name="n_rschReason" class="regular-radio" value="6 - Breakdown of related support system" <?php echo set_radio('n_rschReason', '6 - Breakdown of related support system', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '6 - Breakdown of related support system' ? 'checked' : ''?>/> 
                              <label for="radio-1-6"></label> 6 - Breakdown of related support system <br />
                              <input type="radio" id="radio-1-7" name="n_rschReason" class="regular-radio" value="7 - Vendor delay" <?php echo set_radio('n_rschReason', '7 - Vendor delay', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '7 - Vendor delay' ? 'checked' : ''?>/>   
                              <label for="radio-1-7"></label>  7 - Vendor delay<br />
                              <input type="radio" id="radio-1-8" name="n_rschReason" class="regular-radio" value="8 - Others" <?php echo set_radio('n_rschReason', '8 - Others', TRUE); ?><?= isset($rschReason[0]) && $rschReason[0] == '8 - Others' ? 'checked' : ''?>/>   
                              <label for="radio-1-8"></label>  8 - Others<br />
                              <textarea class="input  n_com" name="n_rschReason1"><?php echo set_value('n_rschReason1',isset($rschReason[1]) == TRUE ? $rschReason[1] : 'N/A')?></textarea>
                        </td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest">Reschedule Authorised By :</td>
                        <td><input type="text" id="n_rschAuth" name="n_rschAuth" value="<?php echo set_value('n_rschAuth',isset($record[0]->v_ReschAuthBy) == TRUE ? $record[0]->v_ReschAuthBy : 'N/A')?>" size="10" class="form-control-button2 n_wi-date2"></td>
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
                                    <input type="text" id="n_personnel_code1" name="C_requestor1" value="<?php echo set_value('C_requestor1',isset($P1personal[0]) == TRUE ? $P1personal[0] : 'N/A')?>" size="10" class="form-control-button2" readonly>
                                    <span class="icon-windows" onclick="fCalldetailname(this,document.getElementById('n_End_Time_h1').value,document.getElementById('n_End_Time_m1').value)" value="woresponse&v=r&r=1"></span>
                                    <span style="font-size:14px;"><input type="text" id="n_personnel_name1" name="V_requestor1" value="<?php echo set_value('V_requestor1',isset($P1personal[1]) == TRUE ? $P1personal[1] : '')?>" size="10" class="input-none" readonly></span></div>
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

                                                        <?php echo form_dropdown('n_End_Time_h1', $hour_list, set_value('n_End_Time_h1',isset($P1time[0]) == TRUE ? $P1time[0] : 'N/A') , 'class="dropdown" style="width: 52px;" id="n_End_Time_h1"'); ?> 
                                                            
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
                                          <?php echo form_dropdown('n_End_Time_m1', $min_list, set_value('n_End_Time_m1',isset($P1time[1]) == TRUE ? $P1time[1] : 'N/A') , 'class="dropdown" style="width: 52px;" id="n_End_Time_m1"'); ?></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span>RM<input type="text" id="n_personnel_rate1" name="V_rate1" value="<?php echo set_value('V_rate1',isset($P1Rate) == TRUE ? $P1Rate : 'N/A')?>" size="10" class="input-none-rate" readonly></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span>RM<input type="text" id="T_rate1" name="T_rate1" value="<?php echo set_value('T_rate1',isset($P1Trate) == TRUE ? $P1Trate : 'N/A')?>" size="10" class="input-none-rate" readonly></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-1"><span>Technical In Charge 2 </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" id="n_personnel_code2" name="C_requestor2" value="<?php echo set_value('C_requestor2',isset($P2personal[0]) == TRUE ? $P2personal[0] : 'N/A')?>" size="10" class="form-control-button2" readonly>
                                    <span class="icon-windows" onclick="fCalldetailname(this,document.getElementById('n_End_Time_h2').value,document.getElementById('n_End_Time_m2').value)" value="woresponse&v=r&r=2"></span>
                                    <span style="font-size:14px;"><input type="text" id="n_personnel_name2" name="V_requestor2" value="<?php echo set_value('V_requestor2',isset($P2personal[1]) == TRUE ? $P2personal[1] : '')?>" size="10" class="input-none" readonly></span></div>
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
                                                        <?php echo form_dropdown('n_End_Time_h2', $hour_list, set_value('n_End_Time_h2',isset($P2time[0]) == TRUE ? $P2time[0] : 'N/A') , 'class="dropdown" style="width: 52px;" id="n_End_Time_h2"'); ?> 
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
                                          <?php echo form_dropdown('n_End_Time_m2', $min_list, set_value('n_End_Time_m2',isset($P2time[1]) == TRUE ? $P2time[1] : 'N/A') , 'class="dropdown" style="width: 52px;" id="n_End_Time_m2"'); ?></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span>RM<input type="text" id="n_personnel_rate2" name="V_rate2" value="<?php echo set_value('V_rate2',isset($P2Rate) == TRUE ? $P2Rate : 'N/A')?>" size="10" class="input-none-rate" readonly></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span>RM<input type="text" id="T_rate2" name="T_rate2" value="<?php echo set_value('T_rate2',isset($P2Trate) == TRUE ? $P2Trate : 'N/A')?>" size="10" class="input-none-rate" readonly></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-1"><span>Technical In Charge 3 </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" id="n_personnel_code3" name="C_requestor3" value="<?php echo set_value('C_requestor3',isset($P3personal[0]) == TRUE ? $P3personal[0] : 'N/A')?>" size="10" class="form-control-button2" readonly>
                                    <span class="icon-windows" onclick="fCalldetailname(this,document.getElementById('n_End_Time_h3').value,document.getElementById('n_End_Time_m3').value)" value="woresponse&v=r&r=3"></span>      
                                    <span style="font-size:14px;"><input type="text" id="n_personnel_name3" name="V_requestor3" value="<?php echo set_value('V_requestor3',isset($P3personal[1]) == TRUE ? $P3personal[1] : '')?>" size="10" class="input-none" readonly></span></div>
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
                                                        <?php echo form_dropdown('n_End_Time_h3', $hour_list, set_value('n_End_Time_h3',isset($P3time[0]) == TRUE ? $P3time[0] : 'N/A') , 'class="dropdown" style="width: 52px;" id="n_End_Time_h3"'); ?> 
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
                                          <?php echo form_dropdown('n_End_Time_m3', $min_list, set_value('n_End_Time_m3',isset($P3time[1]) == TRUE ? $P3time[1] : 'N/A') , 'class="dropdown" style="width: 52px;" id = "n_End_Time_m3"'); ?></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : </span>RM<input type="text" id="n_personnel_rate3" name="V_rate3" value="<?php echo set_value('V_rate3',isset($P3Rate) == TRUE ? $P3Rate : 'N/A')?>" size="10" class="input-none-rate" readonly></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : </span>RM<input type="text" id="T_rate3" name="T_rate3" value="<?php echo set_value('T_rate3',isset($P3Trate) == TRUE ? $P3Trate : 'N/A')?>" size="10" class="input-none-rate" readonly></div>
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
                                   <input type="text" name="V_part" value="<?php echo set_value('V_part',isset($record[0]->v_PartName) == TRUE ? $record[0]->v_PartName : 'N/A')?>" size="10" class="form-control-button"><span class="space"></span></div>
                              <div class="p-vo-3"><span class="ui-left_mobile">RM : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" id= "V_partRM"  name="V_partRM" value="<?php echo set_value('V_partRM',isset($PartRM) == TRUE ? $PartRM : 'N/A')?>" size="10" class="form-control-button" style="text-align:center;"><span class="space"></span></div>
                              <div class="p-vo-4"><span class="ui-left_mobile">Rate : &nbsp;&nbsp;</span><input type="text" id= "V_partRate" name="V_partRate" value="1" size="10" class="form-control-button" style="text-align:center;" readonly><span class="space"></span></div>
                              <div class="p-vo-5"><span class="ui-left_mobile">Total : &nbsp;</span><input type="text" id= "V_parttotal"  name="V_parttotal" value="<?php echo set_value('V_parttotal',isset($PartTrate) == TRUE ? $PartTrate : 'N/A')?>" size="10" class="form-control-button" style="text-align:center;"><span class="space"></span></div>
                        </td>
                  </tr>
                  <tr>
                        <td colspan="3">
                              <div class="p-vo-1"><span>Vendor Parts (Total) </span></div>
                              <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" name="C_Vendor" id="n_agent" value="<?php echo set_value('C_Vendor',isset($Vendor[0]) == TRUE ? $Vendor[0] : 'N/A')?>" size="10" class="form-control-button2">
                                                <?php  $atts = array(
              'width'      => '550',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );

echo anchor_popup('contentcontroller/pop_vendor?parent=woresponse', '<span class="icon-windows"></span>', $atts);?> 
                                                
                                                <span style="font-size:14px;"><input type="text" id="n_agent2" name="V_Vendor" value="<?php echo set_value('V_Vendor',isset($Vendor[1]) == TRUE ? $Vendor[1] : '')?>"  class="input-none" style="" readonly></span></div>
                              
                        </td>
                  </tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->post('wrk_ord')); ?>
            <?php  echo form_hidden('vppm',$this->input->post('vppm')); ?>				
	</div>
      <?php include 'ajaxtime.php';?>
      <?php include 'content_jv_popup.php';?>
</div>
<?php echo form_close(); ?>