<?php echo form_open('wo_chronology_update_ctrl/confirmation');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
      <div class="content-workorder" align="center">
            <table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="92%">
                  <tr class="ui-color-contents-style-1" height="40px">
                        <td class="ui-header-new" colspan="2"><b>Confirm Choronology Plus</b></td>
                  </tr>

                  <tr>
                        <td valign="top" class="td-assest">Root Cause : </td>
                        <td>
                              <?php echo form_dropdown('n_Type_of_Work', $rc, $this->input->post('n_Type_of_Work') , 'class="dropdown n_wi-date2" disabled'); ?>
                        </td>
                  </tr>
                  <tr>
                        <td valign="top" class="td-assest">Details Of Work Progress : </td>
                        <td><textarea class="input n_com" name="n_Action_Taken"  readonly><?php echo $this->input->post('n_Action_Taken');?><?php echo set_value('n_Action_Taken'); ?></textarea></td>
                  </tr>


                  <tr class="ui-header-new" style="height:40px;">
                        <td align="center" colspan="2">
                              <input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                              <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
                        </td>
                  </tr>
            </table>
            <?php echo form_hidden ('wrk_ord',$this->input->post('wrk_ord')); ?>
            <?php echo form_hidden ('visit',$this->input->post('visit')); ?>
            <!--<?php echo form_hidden('wo',$this->input->post('wo')); ?>-->
            <?php echo form_hidden ('n_Visit_Date',$this->input->post('n_Visit_Date')); ?>
            <?php echo form_hidden('n_Shour',$this->input->post('n_Shour'));?>
            <?php echo form_hidden('n_Smin',$this->input->post('n_Smin'));?>
            <?php echo form_hidden('n_Ehour',$this->input->post('n_Ehour'));?>
            <?php echo form_hidden('n_Emin',$this->input->post('n_Emin'));?>
            <?php echo form_hidden('n_Type_of_Work',$this->input->post('n_Type_of_Work'));?>
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
            <?php echo form_hidden('V_part',$this->input->post('V_part'));?>
            <?php echo form_hidden('V_partRM',$this->input->post('V_partRM'));?>
            <?php echo form_hidden('V_partRate',$this->input->post('V_partRate'));?>
            <?php echo form_hidden('V_parttotal',$this->input->post('V_parttotal'));?>
            <?php echo form_hidden('C_Vendor',$this->input->post('C_Vendor'));?>
            <?php echo form_hidden('V_Vendor',$this->input->post('V_Vendor'));?>

            <?php  echo form_hidden('chkbox',$this->input->post('chkbox')); ?>
            <?php  echo form_hidden('wrk_ord',$this->input->post('wrk_ord')); ?>
            <?php  echo form_hidden('d_date',$this->input->post('d_date')); ?>
            <?php  echo form_hidden('d_time',$this->input->post('d_time')); ?>
            <?php  echo form_hidden('duedate',$this->input->post('duedate')); ?>
            <?php  echo form_hidden('n_job_Date',$this->input->post('n_Visit_Date')); ?>
            <?php  echo form_hidden('n_JChour',$this->input->post('n_Ehour')); ?>
            <?php  echo form_hidden('n_JCmin',$this->input->post('n_Emin')); ?>
            <?php  echo form_hidden('n_jobclose_summary',$this->input->post('n_Action_Taken')); ?>
            <?php  echo form_hidden('n_performance_test',$this->input->post('n_performance_test')); ?>
            <?php  echo form_hidden('n_safety_test',$this->input->post('n_safety_test')); ?>
            <?php  echo form_hidden('n_safety_result',$this->input->post('n_safety_result')); ?>
            <?php  echo form_hidden('n_facility_code',$this->input->post('n_facility_code')); ?>
            <?php  echo form_hidden('n_failure_code',$this->input->post('n_failure_code')); ?>
            <?php  echo form_hidden('n_Stoppage',$this->input->post('n_Stoppage')); ?>
            <?php  echo form_hidden('n_PFStartDate',$this->input->post('n_PFStartDate')); ?>
            <?php  echo form_hidden('n_PFStartHH',$this->input->post('n_PFStartHH')); ?>
            <?php  echo form_hidden('n_PFStartNN',$this->input->post('n_PFStartNN')); ?>
            <?php  echo form_hidden('n_PFEndDate',$this->input->post('n_PFEndDate')); ?>
            <?php  echo form_hidden('n_PFEndHH',$this->input->post('n_PFEndHH')); ?>
            <?php  echo form_hidden('n_PFEndNN',$this->input->post('n_PFEndNN')); ?>
            <?php  echo form_hidden('down_time',$this->input->post('down_time')); ?>
            <?php  echo form_hidden('serv_time',$this->input->post('serv_time')); ?>
            <?php  echo form_hidden('comp_time',$this->input->post('comp_time')); ?>
            <?php  echo form_hidden('n_QCUptime',$this->input->post('n_QCUptime')); ?>
            <?php  echo form_hidden('n_Accepted_By',$this->input->post('n_Accepted_By')); ?>
            <?php  echo form_hidden('n_Designation',$this->input->post('n_Designation')); ?>
            <?php  echo form_hidden('n_Acceptance_Date',$this->input->post('n_Acceptance_Date')); ?>
            <?php echo form_hidden ('C_jrequestor1',$this->input->post('C_jrequestor1')); ?>
            <?php echo form_hidden ('V_jrequestor1',$this->input->post('V_jrequestor1')); ?>

      </div>
</div>
<?php echo form_close(); ?>
