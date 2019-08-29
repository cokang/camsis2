<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0"  border="0" style="margin:-5px; width:101%;">
	<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Tests</td></tr>
<tr class="">
	<td class="td-assest" valign="top">Performance Test : </td>
	
	<td valign="top">
		
		<input type="radio" id="radio-1-1" name="n_performance_test" class="regular-radio" value = "Done" <?php echo set_radio('n_performance_test', 'Done', TRUE); ?><?= isset($record[0]->v_ptest) && $record[0]->v_ptest == 'Done' ? 'checked' : 'checked'?>/>   
		<label for="radio-1-1"></label> Done</option><br />
		<input type="radio" id="radio-1-2" name="n_performance_test" class="regular-radio" DISABLED/>   
		<label for="radio-1-2"></label><font color="#cccccc"> Not Done</font><br />
		<input type="radio" id="radio-1-3" name="n_performance_test" class="regular-radio" value = "Not Applicable" <?php echo set_radio('n_performance_test', 'Not Applicable'); ?><?= isset($record[0]->v_ptest) && $record[0]->v_ptest == 'Not Applicable' ? 'checked' : ''?>/>   
		<label for="radio-1-3"></label> Not Applicable</option>
		
	</td>
	
</tr>
<tr class="">
	<td class="td-assest" valign="top">Safety Test Required :</td>			
	<td>
		<input type="radio" id="radio-1-4" onclick="javascript:fShowSTestResult('Y');" name="n_safety_test" class="regular-radio" id ='n_safety_test' value="Done" <?php echo set_radio('n_safety_test', 'Done', TRUE); ?><?= isset($record[0]->v_stest) && $record[0]->v_stest == 'Done' ? 'checked' : 'checked'?>/>   
		<label for="radio-1-4"></label> Done<br />
		<input type="radio" id="radio-1-5" name="n_safety_test" class="regular-radio" disabled/>   
		<label for="radio-1-5"></label><font color="#cccccc"> Not Done</font><br />
		<input type="radio" id="radio-1-6" onclick="javascript:fShowSTestResult('N');" name="n_safety_test" class="regular-radio" value="Not Applicable" <?php echo set_radio('n_safety_test', 'Not Applicable'); ?><?= isset($record[0]->v_stest) && $record[0]->v_stest == 'Not Applicable' ? 'checked' : ''?>/>
		<label for="radio-1-6"></label> Not Applicable<br />
	</td>
</tr>
<tr class="">
	<td valign="top" class="td-assest">Safety Test Result :</td>			
	<td>
		
		<?php if ((isset($record[0]->v_stest) && $record[0]->v_stest == 'Done') || $this->input->post('n_safety_test') == 'Done') { ?>
		<table border="0" width="150" id="divShowSTestResult" style="display:block; color:black; margin-left:-3px;">
		<?php } else if (isset($record[0]->v_stest) && $record[0]->v_stest == 'Not Applicable') { ?>
		<table border="0" width="150" id="divShowSTestResult" style="display:none; color:black; margin-left:-3px;">
		<?php } else { ?>
		<table border="0" width="150" id="divShowSTestResult" style="display:none; color:black; margin-left:-3px;">
		<?php } ?>
			<tr>
				<td>
					<input type="radio" id="radio-1-29" name="n_safety_result" class="regular-radio" value="Y"<?php echo set_radio('n_safety_result', 'Y', TRUE); ?><?= isset($record[0]->v_sstatus) && $record[0]->v_sstatus == 'Y' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-29"></label> Passed<br />
					<input type="radio" id="radio-1-30" name="n_safety_result" class="regular-radio" value="NA"<?php echo set_radio('n_safety_result', 'NA'); ?><?= isset($record[0]->v_sstatus) && $record[0]->v_sstatus == 'NA' ? 'checked' : ''?>/>   
					<label for="radio-1-30"></label> Failed
				</td>
			</tr>
		</table>
		
	</td>
</tr>
<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Information</td></tr>
<tr class="">
	<td valign="top" colspan="2">The following asset information is pulled from Asset Catalog for your easy reference.</td>
</tr class="">
<tr class="">
	<td class="td-assest" valign="top">Asset number : </td>
	<td><?= isset($dispasset[0]->V_Asset_no) == TRUE ? $dispasset[0]->V_Asset_no : 'N/A'?></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Asset Tag Number : </td>
	<td><?= isset($dispasset[0]->V_Tag_no) == TRUE ? $dispasset[0]->V_Tag_no : 'N/A'?></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Asset Serial Number : </td>
	<td><?= isset($dispasset[0]->V_Serial_no) == TRUE ? $dispasset[0]->V_Serial_no : 'N/A'?></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Asset Name : </td>
	<td><?= isset($dispasset[0]->V_Asset_name) == TRUE ? $dispasset[0]->V_Asset_name : 'N/A'?></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Safety Test Requirement : </td>
	<td><?= isset($dispasset[0]->v_SafetyTest) == TRUE ? $dispasset[0]->v_SafetyTest : 'N/A'?></td>
</tr>
<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Codes</td></tr>
<?php if ($this->session->userdata('usersess') != 'FES'){ ?>
<tr class="">
	<td class="td-assest" valign="top">Facility Code : </td>
	<td>
			<?php 
				$facility_list = array(
				'EB-00 Biomedical, Other Equipment' => 'EB-00 Biomedical, Other Equipment',
				'EB-01 Biomedical, Therapeutic Equipment' => 'EB-01 Biomedical, Therapeutic Equipment',
				'EB-02 Biomedical, Diagnostic Equipment' => 'EB-02 Biomedical, Diagnostic Equipment',
				'EB-03 Biomedical, Laboratory Equipment' => 'EB-03 Biomedical, Laboratory Equipment',
				'IB-01 Laryngoscope' => 'IB-01 Laryngoscope',
				'IB-02 Othoscope.' => 'IB-02 Othoscope.',
				'IB-03 Opthalmoscope' => 'IB-03 Opthalmoscope6',
				'IB-04 Glucose analyzer (hand-held)' => 'IB-04 Glucose analyzer (hand-held)',
				'IB-05 Stesthoscope' => 'IB-05 Stesthoscope',
				'IB-06 Sphygmomanometer' => 'IB-06 Sphygmomanometer',
				'IB-07 Flowmeter, Gas' => 'IB-07 Flowmeter, Gas',
				'IB-08 Surgical tools' => 'IB-08 Surgical tools',
				'IB-09 Cassette holder - x-ray film.' => 'IB-09 Cassette holder - x-ray film.',
				);
			?>		
			<?php echo form_dropdown('n_facility_code', $facility_list, set_value('n_facility_code',isset($record[0]->v_FacilityCode) == TRUE ? $record[0]->v_FacilityCode : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
	</td>
</tr>
<?php } ?>
<tr class="">
	<td class="td-assest" valign="top">Failure Code : </td>
	<td>
		<?php 
				$failure_list = array(
				'F-01 Failure due to normal wear & tear' => 'F-01 Failure due to normal wear & tear',
				'F-02 Failure due to design fault' => 'F-02 Failure due to design fault',
				'F-03 Failure due to user mishandling' => 'F-03 Failure due to user mishandling',
				'F-04 Failure due to overload' => 'F-04 Failure due to overload',
				'F-05 Failure due to overuse by user' => 'F-05 Failure due to overuse by user',
				'F-06 Failure due to old age / obsolences' => 'F-06 Failure due to old age / obsolences',
				'F-07 Failure due to improper maintenance' => 'F-07 Failure due to improper maintenance',
				'F-08 Failure due to improper user maintenance' => 'F-08 Failure due to improper user maintenance',
				'F-09 Failure due to expired lifespan (spares)' => 'F-09 Failure due to expired lifespan (spares)',
				'F-10 Failure due to defect parts' => 'F-10 Failure due to defect parts',
				'F-11 Failure due to spares with incorrect specifications' => 'F-11 Failure due to spares with incorrect specifications',
				'F-12 Failure due to other supporting services' => 'F-12 Failure due to other supporting services',
				'F-13 Failure due to evironmental factor(s)' => 'F-13 Failure due to evironmental factor(s)',
				);
			?>		
			<?php echo form_dropdown('n_failure_code', $failure_list, set_value('n_failure_code',isset($record[0]->v_FailureCode) == TRUE ? $record[0]->v_FailureCode : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
	</td>
</tr>


<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Stoppage</td></tr>
<tr class="">
	<td class="td-assest" valign="top">Stoppage : </td>
	<td><input class="InputText" onmouseup="javascript:fShowStoppage();" name ="n_Stoppage"  type="checkbox" id="n_Stoppage" value="ON"<?php echo set_checkbox('n_Stoppage', 'ON'); ?><?= isset($record[0]->v_stoppage) && $record[0]->v_stoppage == 'ON' ? 'checked' : ''?>></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top" height="30px">Partially Functioning Start : </td>
	<td>
		<?php if ((isset($record[0]->v_stoppage) AND $record[0]->v_stoppage == 'ON') OR $this->input->post('n_Stoppage') == 'ON') { ?>
		<div id="divShowPF1" name="divShowPF1" style="display:block; color:black;">
		<?php } else { ?>
		<div id="divShowPF1" name="divShowPF1" style="display:none; color:black;">
		<?php } ?>
			<input type="date" id="date1" class="form-control-button2" id= "n_PFStartDate" name="n_PFStartDate" value="<?php echo set_value('n_PFStartDate', isset($record[0]->d_pfsdate) == TRUE ? date_format(new DateTime($record[0]->d_pfsdate), 'Y-m-d') : '')?>" size="20" >
			<span class="space"></span>
			<input type="text" class="form-control-button2" id= "n_PFStartHH" name="n_PFStartHH" value="<?php echo set_value('n_PFStartHH', isset($pfstime[0]) == TRUE ? $pfstime[0] : '') ?>" size="2">
			<input type="text" class="form-control-button2" id= "n_PFStartNN" name="n_PFStartNN" value="<?php echo set_value('n_PFStartNN', isset($pfstime[1]) == TRUE ? $pfstime[1] : '') ?>" size="2">									
		</div>
		
	</td>
</tr>
<tr class="">
	<td class="td-assest" valign="top" height="30px">Partially Functioning End : </td>
	<td>
		<?php if ((isset($record[0]->v_stoppage) AND $record[0]->v_stoppage == 'ON') OR $this->input->post('n_Stoppage') == 'ON') { ?>
		<div id="divShowPF2" name="divShowPF2" style="display:block; color:black;">
		<?php } else { ?>
		<div id="divShowPF2" name="divShowPF2" style="display:none; color:black;">
		<?php } ?>
			<input type="date" id="date2" class="form-control-button2" id= "n_PFEndDate" name="n_PFEndDate" value="<?php echo set_value('n_PFEndDate', isset($record[0]->d_pfedate) == TRUE ? date_format(new DateTime($record[0]->d_pfedate), 'Y-m-d') : '')?>">
			<span class="space"></span>
			<input type="text" class="form-control-button2" id= "n_PFEndHH" name="n_PFEndHH" value="<?php echo set_value('n_PFEndHH', isset($pfetime[0]) == TRUE ? $pfetime[0] : '') ?>" size="2">
			<input type="text" class="form-control-button2" id= "n_PFEndNN" name="n_PFEndNN" value="<?php echo set_value('n_PFEndNN', isset($pfetime[1]) == TRUE ? $pfetime[1] : '' )?>" size="2">
		</div>
		
	</td>
</tr>


<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Summary of Time</td></tr>
<tr class="">
	<td class="td-assest" valign="top">Down Time : </td>
	<td>System auto-calculate <?=isset($down_time) ? $down_time : ''?></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Service Time : </td>
	<td>System auto-calculate <?=isset($serv_time) ? $serv_time : ''?></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Completion Time : </td>
	<td>System auto-calculate  <?=isset($comp_time) ? $comp_time : ''?></td>
</tr>
<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">QC</td></tr>
<tr class="">
	<td class="td-assest" valign="top">QC Uptime : </td>
	<td>
		<?php 
		if ($this->session->userdata('usersess') == "HKS") {
				$QC_list = array(
									'QH01' => 'QH1 Surface Stain',
									'QH02' => 'QH2 Dust',
									'QH03' => 'QH3 Litter',
									'QH04' => 'QH4 Bad Odour',
									'QH05' => 'QH5 Cobweb',
									'QH06' => 'QH6 Algae/Fungus',
									'QH07' => 'QH7 Blocked Drain',
									'QH08' => 'QH8 FES related',
									'QH09' => 'QH9 Permanent stain',
									'QH10' => 'QH10 Manpower',
									'QH11' => 'QH11 Equipments/tool',
									'QH12' => 'QH12 Uncontrolled environment',
									'QH13' => 'QH13 Vendor related',
									'QH14' => 'QH14 Vandalism',
				);
		} else {
				$QC_list = array(
									'QC01' => 'QC01 Equipment not made available',
				'QC02' => 'QC02 Technical Personnel',
				'QC03' => 'QC03 Delay closing of Work Order',
				'QC04' => 'QC04 User Request',
				'QC05' => 'QC05 Mishandling/vandalism/overload',
				'QC06' => 'QC06 Vendor Delay',
				'QC07' => 'QC07 Equipment Down',
				'QC08' => 'QC08 Breakdown of related support system',
				'QC09' => 'QC09 Wear and Tear',
				'QC10' => 'QC10 Recurring of similar fault',
				  'QC11' => 'QC11 Intermittent problem',
				'QC12' => 'QC12 Setting and calibration',
				'QC13' => 'QC13 PPM kit/test equipment not available',
				'QC14' => 'QC14 Defect',
				'QC15' => 'QC15 Force Majeure',
				'QC16' => 'QC16 Environmental factor',
				'QC17' => 'QC17 PPM Downtime',
				'QC18' => 'QC18 SCM Downtime',
				'QC19' => 'QC19 Equipment under exemption/BER/condemn',

				);
									}
			?>		
			<?php echo form_dropdown('n_QCUptime', $QC_list, set_value('n_QCUptime',isset($record[0]->v_QCuptime) == TRUE ? $record[0]->v_QCuptime : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
	</td>
</tr>
<tr class=""><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Acceptance</td></tr>
<tr class="">
	<td class="td-assest" valign="top">Accepted By : </td>
	<td><input type="text" class="form-control-button2 n_wi-date2" name="n_Accepted_By" value="<?php echo set_value('n_Accepted_By', isset($record[0]->v_AcceptedBy) == TRUE ? $record[0]->v_AcceptedBy : 'N/A' )?>"></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Designation : </td>
	<td>
		
		<input type="radio" id="radio-1-7" name="n_Designation" class="regular-radio" value = "Doctor" <?php echo set_radio('n_Designation', 'Doctor', TRUE); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Doctor' ? 'checked' : 'checked'?>/>   
		<label for="radio-1-7"></label> Doctor<br>
		<input type="radio" id="radio-1-8" name="n_Designation" class="regular-radio" value = "Matron" <?php echo set_radio('n_Designation', 'Matron'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Matron' ? 'checked' : ''?>/>   
		<label for="radio-1-8"></label> Matron<br>
		<input type="radio" id="radio-1-9" name="n_Designation" class="regular-radio" value = "Medical Assistant" <?php echo set_radio('n_Designation', 'Medical Assistant'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Medical Assistant' ? 'checked' : ''?>/>   
		<label for="radio-1-9"></label> Medical Assistant<br>
		<input type="radio" id="radio-1-10" name="n_Designation" class="regular-radio" value = "IIUM Officer" <?php echo set_radio('n_Designation', 'IIUM Officer'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'IIUM Officer' ? 'checked' : ''?>/>   
		<label for="radio-1-10"></label> IIUM Officer<br>
		<input type="radio" id="radio-1-11" name="n_Designation" class="regular-radio" value = "Sister In-Charge" <?php echo set_radio('n_Designation', 'Sister In-Charge'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Sister In-Charge' ? 'checked' : ''?>/>   
		<label for="radio-1-11"></label> Sister In-Charge<br>
		<input type="radio" id="radio-1-12" name="n_Designation" class="regular-radio" value = "Sister On Duty" <?php echo set_radio('n_Designation', 'Sister On Duty'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Sister On Duty' ? 'checked' : ''?>/>   
		<label for="radio-1-12"></label> Sister On Duty<br>
		<input type="radio" id="radio-1-13" name="n_Designation" class="regular-radio" value = "Specialist" <?php echo set_radio('n_Designation', 'Specialist'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Specialist' ? 'checked' : ''?>/>   
		<label for="radio-1-13"></label> Specialist<br>
		<input type="radio" id="radio-1-14" name="n_Designation" class="regular-radio" value = "Staff Nurse" <?php echo set_radio('n_Designation', 'Staff Nurse'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Staff Nurse' ? 'checked' : ''?>/>   
		<label for="radio-1-14"></label> Staff Nurse<br>
		<input type="radio" id="radio-1-15" name="n_Designation" class="regular-radio" value = "Supervisor" <?php echo set_radio('n_Designation', 'Supervisor'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'Supervisor' ? 'checked' : ''?>/>   
		<label for="radio-1-15"></label> Supervisor<br>
		<input type="radio" id="radio-1-16" name="n_Designation" class="regular-radio" value = "APSB" <?php echo set_radio('n_Designation', 'APSB'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'APSB' ? 'checked' : ''?>/>   
		<label for="radio-1-16"></label> APSB<br>
		<input type="radio" id="radio-1-17" name="n_Designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_Designation', 'PMSB'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'PMSB' ? 'checked' : ''?>/>   
		<label for="radio-1-17"></label> PMSB<br>
		<input type="radio" id="radio-1-18" name="n_Designation" class="regular-radio" value = "APFMS" <?php echo set_radio('n_Designation', 'APFMS'); ?><?= isset($record[0]->V_ACCEPTED_Designation) && $record[0]->V_ACCEPTED_Designation == 'APFMS' ? 'checked' : ''?>/>   
		<label for="radio-1-18"></label> APFMS<br>
	</td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Acceptance Date : </td>
	<td><input type="date" id="date1" name="n_Acceptance_Date" value="<?php echo set_value('n_Acceptance_Date', isset($record[0]->d_AcceptedDt) == TRUE ? date_format(new DateTime($record[0]->d_AcceptedDt), 'Y-m-d') : 'N/A')?>" class="form-control-button2"></td>
</tr>
<tr class="">
	<td class="td-assest" valign="top">Closed By :</td>
	<td><div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
	   <input type="text" id="n_personnel_codej1" name="C_jrequestor1" value="<?php echo set_value('C_jrequestor1', isset($P1closed[0]) == TRUE ? $P1closed[0] : 'N/A')?>" size="10" class="form-control-button2" readonly> <span class="icon-windows" onclick="fCallassetdetailname(this)" value="job"></span>
	   <span style="font-size:14px;"><input type="text" id="n_personnel_namej1" name="V_jrequestor1" value="<?php echo set_value('V_jrequestor1', isset($P1closed[1]) == TRUE ? $P1closed[1] : '')?>" size="10" class="input-none" readonly></span></div></td>
</tr>

</table>
		<?php  echo form_hidden('wrk_ord',$this->input->post('wrk_ord')); ?>
		<?php  echo form_hidden('d_date',isset($d_date) ? $d_date : 0); ?>
		<?php  echo form_hidden('d_time',isset($d_time) ? $d_time : 0); ?>
		<?php  echo form_hidden('duedate',isset($duedate) ? $duedate : 0); ?>
		<?= isset($serv_time) == TRUE ? form_hidden('serv_time',$serv_time) : '' ; ?>
		<?= isset($down_time) == TRUE ? form_hidden('down_time',$down_time) : '' ; ?>
		<?= isset($comp_time) == TRUE ? form_hidden('comp_time',$comp_time) : '' ; ?>
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