<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0"  border="0" style="margin:-5px; width:101%;">

<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Tests</td></tr>
			<tr>
				<td class="td-assest" valign="top">Performance Test : </td>
				
				<td  valign="top">
					
					<input type="radio" id="radio-1-9" name="n_performance_test" class="regular-radio" value = "Done" <?php echo set_radio('n_performance_test', 'Done', TRUE); ?><?= isset($recordppm[0]->v_ptest) && $recordppm[0]->v_ptest == 'Done' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-9"></label> Done</option><br />
					<input type="radio" id="radio-1-10" name="n_performance_test" class="regular-radio" DISABLED/>   
					<label for="radio-1-10"></label><font color="#cccccc"> Not Done</font><br />
					<input type="radio" id="radio-1-11" name="n_performance_test" class="regular-radio" value = "Not Applicable" <?php echo set_radio('n_performance_test', 'Not Applicable'); ?><?= isset($recordppm[0]->v_ptest) && $recordppm[0]->v_ptest == 'Not Applicable' ? 'checked' : ''?>/>   
					<label for="radio-1-11"></label> Not Applicable</option>
					
				</td>
				
			</tr>
			<tr>
				<td class="td-assest" valign="top">Safety Test Required :</td>			
				<td >
					
					<input type="radio" id="radio-1-12" onclick="javascript:fShowSTestResult('Y');" name="n_safety_test" class="regular-radio" id = 'n_safety_test' value="Done" <?php echo set_radio('n_safety_test', 'Done', TRUE); ?><?= isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Done' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-12"></label> Done<br />
					<input type="radio" id="radio-1-13" name="n_safety_test" class="regular-radio" disabled/>   
					<label for="radio-1-13"></label><font color="#cccccc"> Not Done</font><br />
					<input type="radio" id="radio-1-14" onclick="javascript:fShowSTestResult('N');" name="n_safety_test" class="regular-radio" value="Not Applicable" <?php echo set_radio('n_safety_test', 'Not Applicable'); ?><?= isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Not Applicable' ? 'checked' : ''?>/>
					<label for="radio-1-14"></label> Not Applicable<br />
					
				</td>
			</tr>
			<tr>
				<td valign="top">Safety Test Result :</td>			
				<td>
					
					<?php if ((isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Done') || $this->input->post('n_safety_test') == 'Done') { ?>
					<table border="0" width="150" id="divShowSTestResult" style="display:block; color:black; margin-left:-3px;">
					<?php } else if (isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Not Applicable') { ?>
					<table border="0" width="150" id="divShowSTestResult" style="display:none; color:black; margin-left:-3px;">
					<?php } else { ?>
					<table border="0" width="150" id="divShowSTestResult" style="display:none; color:black; margin-left:-3px;">	
					<?php } ?>
						<tr>
							<td>
								<input type="radio" id="radio-1-29" name="n_safety_result" class="regular-radio" value="Y"<?php echo set_radio('n_safety_result', 'Y', TRUE); ?><?= isset($recordppm[0]->v_sstatus) && $recordppm[0]->v_sstatus == 'Y' ? 'checked' : 'checked'?>/>   
								<label for="radio-1-29"></label> Passed<br />
								<input type="radio" id="radio-1-30" name="n_safety_result" class="regular-radio" value="NA"<?php echo set_radio('n_safety_result', 'NA'); ?><?= isset($recordppm[0]->v_sstatus) && $recordppm[0]->v_sstatus == 'NA' ? 'checked' : ''?>/>   
								<label for="radio-1-30"></label> Failed
							</td>
						</tr>
					</table>
					
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Information</td></tr>
			<tr>
				<td class="td-assest" valign="top" colspan="2">The following asset information is pulled from Asset Catalog for your easy reference.</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset number : </td>
				<td><?= isset($ppmasset[0]->V_Asset_no) == TRUE ? $ppmasset[0]->V_Asset_no : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Tag Number : </td>
				<td><?= isset($ppmasset[0]->V_Tag_no) == TRUE ? $ppmasset[0]->V_Tag_no : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Serial Number : </td>
				<td><?= isset($ppmasset[0]->V_Serial_no) == TRUE ? $ppmasset[0]->V_Serial_no : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Name : </td>
				<td><?= isset($ppmasset[0]->V_Asset_name) == TRUE ? $ppmasset[0]->V_Asset_name : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Safety Test Requirement : </td>
				<td><?= isset($ppmasset[0]->v_SafetyTest) == TRUE ? $ppmasset[0]->v_SafetyTest : 'N/A'?></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Codes</td></tr>
			<tr>
				<td class="td-assest" valign="top">Job Type Code : </td>
				<td>

					<?php 
                        $jobtype_list = array(
                        '' => '',
						'1W' => '1W Weekly',
              			'2W' => '2W Two Weekly',
              			'3W' => '3W Three Weekly',
              			'1M' => '1M Monthly',
              			'2M' => '2M Two Monthly',
              			'3M' => '3M Quarterly',
              			'4M' => '4M Four Monthly',
              			'6M' => '6M Half Yearly',
              			'12M' => '12M Annually',
              	 		'15M' => '15M 15 Month', 
                        );
                        ?>
                        <?php echo form_dropdown('n_job_type', $jobtype_list, set_value('n_job_type',isset($recordppm[0]->v_jobTypecode) == TRUE ? $recordppm[0]->v_jobTypecode : 'N/A') , 'class="dropdown n_wi-date2"');?>
				</td>
			</tr>
			

			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Stoppage</td></tr>
			<tr>
				<td class="td-assest" valign="top">Stoppage : </td>
				<td><input class="InputText" onmouseup="javascript:fShowStoppage();" name ="n_Stoppage"  type="checkbox" id="n_Stoppage" value="ON"<?php echo set_checkbox('n_Stoppage', 'ON'); ?><?= isset($recordppm[0]->v_stoppage) && $recordppm[0]->v_stoppage == 'ON' ? 'checked' : ''?>></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning Start : </td>
				<td>
					<?php if ((isset($recordppm[0]->v_stoppage) AND $recordppm[0]->v_stoppage == 'ON') OR $this->input->post('n_Stoppage') == 'ON') { ?>
					<div id="divShowPF1" name="divShowPF1" style="display:block; color:black;">
					<?php } else { ?>
					<div id="divShowPF1" name="divShowPF1" style="display:none; color:black;">
					<?php } ?>
                    	<input type="date" class="form-control-button2" id= "n_PFStartDate" name="n_PFStartDate" value="<?php echo set_value('n_PFStartDate', isset($recordppm[0]->d_pfsdate) == TRUE ? date_format(new DateTime($recordppm[0]->d_pfsdate), 'Y-m-d') : 'N/A')?>" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFStartHH" name="n_PFStartHH" value="<?php echo set_value('n_PFStartHH', isset($pfstime[0]) == TRUE ? $pfstime[0] : '') ?>" size="2">
						<input type="text" class="form-control-button2" id= "n_PFStartNN" name="n_PFStartNN" value="<?php echo set_value('n_PFStartNN', isset($pfstime[1]) == TRUE ? $pfstime[1] : '') ?>" size="2">									
					</div>
					
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning End : </td>
				<td>
					<?php if ((isset($recordppm[0]->v_stoppage) AND $recordppm[0]->v_stoppage == 'ON') OR $this->input->post('n_Stoppage') == 'ON') { ?>
					<div id="divShowPF2" name="divShowPF2" style="display:block; color:black;">
					<?php } else { ?>
					<div id="divShowPF2" name="divShowPF2" style="display:none; color:black;">
					<?php } ?>
						<input type="date" class="form-control-button2" id= "n_PFEndDate" name="n_PFEndDate" value="<?php echo set_value('n_PFEndDate', isset($recordppm[0]->d_pfedate) == TRUE ? date_format(new DateTime($recordppm[0]->d_pfedate), 'Y-m-d') : 'N/A')?>">
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFEndHH" name="n_PFEndHH" value="<?php echo set_value('n_PFEndHH', isset($pfetime[0]) == TRUE ? $pfetime[0] : '') ?>" size="2">
						<input type="text" class="form-control-button2" id= "n_PFEndNN" name="n_PFEndNN" value="<?php echo set_value('n_PFEndNN', isset($pfetime[1]) == TRUE ? $pfetime[1] : '' )?>" size="2">
					</div>
					
				</td>
			</tr>


			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Summary of Time</td></tr>
			<tr>
				<td class="td-assest" valign="top">Down Time : </td>
				<td>System auto-calculate <?=isset($down_time) ? $down_time : ''?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Service Time : </td>
				<td>System auto-calculate <?=isset($serv_time) ? $serv_time : ''?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Completion Time : </td>
				<td>System auto-calculate </td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">QC</td></tr>
			<tr>
				<td class="td-assest" valign="top">QC PPM : </td>
				<td>
					<?php 
                              $QC_PPM = array(
                               '' => '',
                              'QC01' => 'QC01 Equipment not made available',
                              'QC02' => 'QC02 Technical Personnel',
                              'QC03' => 'QC03 Delay closing of Work Order',
                              'QC04' => 'QC04 User Request',
                              'QC05' => 'QC05 Mishandling/vandalism/overload',
                              'QC06' => 'QC06 Vendor Delay',
                              'QC07' => 'QC07 Equipment Down',
                              'QC08' => 'QC08 Breakdown of related support system',
                              'QC11' => 'QC11 Improper procedure',
                              'QC13' => 'QC13 PPM kit/test equipment not available/spares',
                              'QC15' => 'QC15 Force Majeure',
                              'QC16' => 'QC16 Safety, Health and Evironmental Factor',
                              'QC17' => 'QC17 Downtime due to PPM',
                              'QC18' => 'QC18 Downtime due to SCM',
                              'QC19' => 'QC19 Equipment not functional and waiting for BER approved',
                              );
                              ?>
                              <?php echo form_dropdown('QC_PPM', $QC_PPM, set_value('QC_PPM',isset($recordppm[0]->v_QCPPM) == TRUE ? $recordppm[0]->v_QCPPM : 'N/A') , 'class="dropdown n_wi-date2"');?>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">QC Uptime : </td>
				<td>
					<?php 
							$QC_list = array(
							'' => '',
                  			'QC17' => 'QC17 Downtime due to PPM',
                  			);
						?>		
		              	<?php echo form_dropdown('n_QCUptime', $QC_list, set_value('n_QCUptime',isset($recordppm[0]->v_QCuptime) == TRUE ? $recordppm[0]->v_QCuptime : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Acceptance</td></tr>
			<tr>
				<td class="td-assest" valign="top">Accepted By : </td>
				<td><input type="text" class="form-control-button2 n_wi-date2" name="n_Accepted_By" value="<?php echo set_value('n_Accepted_By', isset($recordppm[0]->v_AcceptedBy) == TRUE ? $recordppm[0]->v_AcceptedBy : 'N/A')?>"></td>
				<!--<input type="text" class="form-control-button2 n_wi-date2" name="n_Accepted_By" value="<?= isset($name) ? $this->input->post('name') : '' ?>" onclick='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");' readonly>-->
			</tr>
			<tr>
				<td class="td-assest" valign="top">Designation : </td>
				<td>
					
					<input type="radio" id="radio-1-15" name="n_Designation" class="regular-radio" value = "Doctor" <?php echo set_radio('n_Designation', 'Doctor', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Doctor' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-15"></label> Doctor<br>
					<input type="radio" id="radio-1-16" name="n_Designation" class="regular-radio" value = "Matron" <?php echo set_radio('n_Designation', 'Matron'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Matron' ? 'checked' : ''?>/>   
					<label for="radio-1-16"></label> Matron<br>
					<input type="radio" id="radio-1-17" name="n_Designation" class="regular-radio" value = "Medical Assistant" <?php echo set_radio('n_Designation', 'Medical Assistant'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Medical Assistant' ? 'checked' : ''?>/>   
					<label for="radio-1-17"></label> Medical Assistant<br>
					<input type="radio" id="radio-1-18" name="n_Designation" class="regular-radio" value = "IIUM Officer" <?php echo set_radio('n_Designation', 'IIUM Officer'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'IIUM Officer' ? 'checked' : ''?>/>   
					<label for="radio-1-18"></label> IIUM Officer<br>
					<input type="radio" id="radio-1-19" name="n_Designation" class="regular-radio" value = "Sister In-Charge" <?php echo set_radio('n_Designation', 'Sister In-Charge'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Sister In-Charge' ? 'checked' : ''?>/>   
					<label for="radio-1-19"></label> Sister In-Charge<br>
					<input type="radio" id="radio-1-20" name="n_Designation" class="regular-radio" value = "Sister On Duty" <?php echo set_radio('n_Designation', 'Sister On Duty'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Sister On Duty' ? 'checked' : ''?>/>   
					<label for="radio-1-20"></label> Sister On Duty<br>
					<input type="radio" id="radio-1-21" name="n_Designation" class="regular-radio" value = "Specialist" <?php echo set_radio('n_Designation', 'Specialist'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Specialist' ? 'checked' : ''?>/>   
					<label for="radio-1-21"></label> Specialist<br>
					<input type="radio" id="radio-1-22" name="n_Designation" class="regular-radio" value = "Staff Nurse" <?php echo set_radio('n_Designation', 'Staff Nurse'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Staff Nurse' ? 'checked' : ''?>/>   
					<label for="radio-1-22"></label> Staff Nurse<br>
					<input type="radio" id="radio-1-23" name="n_Designation" class="regular-radio" value = "Supervisor" <?php echo set_radio('n_Designation', 'Supervisor'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Supervisor' ? 'checked' : ''?>/>   
					<label for="radio-1-23"></label> Supervisor<br>
					<input type="radio" id="radio-1-24" name="n_Designation" class="regular-radio" value = "APSB" <?php echo set_radio('n_Designation', 'APSB'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'APSB' ? 'checked' : ''?>/>   
					<label for="radio-1-24"></label> APSB<br>
					<input type="radio" id="radio-1-25" name="n_Designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_Designation', 'PMSB'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'PMSB' ? 'checked' : ''?>/>   
					<label for="radio-1-25"></label> PMSB<br>
					<input type="radio" id="radio-1-26" name="n_Designation" class="regular-radio" value = "APFMS" <?php echo set_radio('n_Designation', 'APFMS'); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'APFMS' ? 'checked' : ''?>/>   
					<label for="radio-1-26"></label> APFMS<br>
					
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Acceptance Date : </td>
				<td><input type="date" id="date1" name="n_Acceptance_Date" value="<?php echo set_value('n_Acceptance_Date', isset($recordppm[0]->d_AcceptedDt) == TRUE ? date_format(new DateTime($recordppm[0]->d_AcceptedDt), 'Y-m-d') : 'N/A')?>" class="form-control-button2"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Closed By :</td>
				<td><div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                   <input type="text" id="n_personnel_codej1" name="C_jrequestor1" value="<?php echo set_value('C_jrequestor1', isset($PPPMperclosed[0]) == TRUE ? $PPPMperclosed[0] : 'N/A')?>" size="10" class="form-control-button2" readonly> <span class="icon-windows" onclick="fCallassetdetailname(this)" value="job"></span>
                   <span style="font-size:14px;"><input type="text" id="n_personnel_namej1" name="V_jrequestor1" value="<?php echo set_value('V_jrequestor1', isset($PPPMperclosed[1]) == TRUE ? $PPPMperclosed[1] : '')?>" size="10" class="input-none" readonly></span></div></td>
			</tr>

</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
		<?php  echo form_hidden('d_date',isset($d_date) ? $d_date : 0); ?>
		<?php  echo form_hidden('duedate',isset($duedate) ? $duedate : 0); ?>
		
		<?= isset($serv_time) == TRUE ? form_hidden('serv_time',$serv_time) : '' ; ?>
		<?= isset($down_time) == TRUE ? form_hidden('down_time',$down_time) : '' ; ?>
<script language="javascript" type="text/javascript">
	function fShowSTestResult(sTest)
	{
		if (sTest == "Y")
			{
				document.getElementById('divShowSTestResult').style.display = "block"
			}
		
		else
			{
				document.getElementById('divShowSTestResult').style.display = "none"
			}
	}
		function fShowStoppage()
	{
		if (document.getElementById('n_Stoppage').checked == true) 
			{

			document.getElementById('divShowPF1').style.display = "none"
			document.getElementById('divShowPF2').style.display = "none"
			document.getElementById("n_PFStartDate").value = ""
			document.getElementById("n_PFStartHH").value = ""
			document.getElementById("n_PFStartNN").value = ""
			document.getElementById("n_PFEndDate").value = ""
			document.getElementById("n_PFEndHH").value = ""
			document.getElementById("n_PFEndNN").value = ""
			
			}
		else
			{
			document.getElementById('divShowPF1').style.display = "block"
			document.getElementById('divShowPF2').style.display = "block"
			}
		
	}

</script>
<script>
$(document).ready(function() {
$("#date0,#date1,#date2,#date3,#date4,#date5,#date6,#date7,#date8,#date9,#date10,#date11,#date12,#date13,#date14,#date15").datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>
<?php include 'content_jv_popup.php';?>