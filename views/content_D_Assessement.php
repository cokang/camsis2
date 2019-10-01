<?php 
if ($this->input->get('ex') == 'excel'){
$filename ="Deduction Assessment Report - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>


<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr" style="text-transform:uppercase;">Deduction Assessment Report</div>
		
		<button onclick="javascript:myFunction('D_Assessement?sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>acg_report?tabIndex=1';">CANCEL</button>
		<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/D_Assessement?sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/D_Assessement?pdf=1&sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>"  value="2" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:38px; height:36px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
	<?php } ?>
	<div class=Section1> 
	<div class=""><?php if ($this->input->get('ex') == ''){?>
		<table class="tbl-wo"  border="0" style=" margin:10 auto; width:100%;"  align="center">
			<tr>
				<td style="padding-left:0px; width:20%;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:30px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Indicator Deduction Report</b></td>
						</tr>
						<!--<tr>
						<?php  if ($service== "FES") {?>
							<td align="center"><b style="text-transform: uppercase;">Facility Engineering Services</b></td>
						<?php  } elseif ($service== "BES") {?>
						  <td align="center"><b style="text-transform: uppercase;">Biomedical Engineering Services</b></td>
						<?php  } elseif ($service== "HKS") {?>
						<td align="center"><b style="text-transform: uppercase;">Housekeeping Services</b></td>
						<?php }?>
						</tr>saya ensem dan pandai-->
					</table>
				</td>
				<td style="padding-left:0px; width:20%;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:100px; height:40px;"/></td>
			</tr>
			
		</table>
		<?php } ?>
		<table class="tbl-wo" border="0" style="text-align:left; " align="center" >
			<tr >
				<td style="width:20%; padding-left:5px;">HOSPITAL</td>
				<td style="width:20%; padding-left:5px; text-align:left;"><?=$this->session->userdata('hosp_code')?> </td>
				<td style="width:20%; padding-left:5px;"></td>
				<td style="width:20%; padding-left:5px; text-align:center;"></td>
				<!--<td style="width:20%; padding-left:5px;">Report No </td>
				<td style="padding-left:5px; text-align:center;"> </td>-->
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td style="padding-left:5px;">MONTH</td>
				<?php
				$strdt = '1/'.$month.'/'.$year;
				//echo "lalala".$strdt;
				$dt = DateTime::createFromFormat('!d/m/Y', $strdt);
				//echo "nilai date :".$dt->format('M Y');
				 
				 ?>
				<td style="padding-left:5px; text-align:left;"><?=$dt->format('M Y')?></td>
				<td style="padding-left:5px;"></td>
				<td style="padding-left:5px; text-align:center;"></td>
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td style="padding-left:5px;">TOTAL MONTHLY SERVICE FEE(RM)</td>
				
				<td style="padding-left:5px; text-align:left;"><?= isset($acgparam[0]->n_Revenue) ? number_format($acgparam[0]->n_Revenue,2) : 'N/A' ?></td>
				<td style="padding-left:5px;"></td>
				<?php  if ($service== "FES") {?>
							<td style="padding-left:5px;" align="right">SERVICE : FES</td>
						<?php  } elseif ($service== "BES") {?>
						  <td style="padding-left:5px;" align="right">SERVICE : BES</td>
						<?php  } elseif ($service== "HKS") {?>
						<td style="padding-left:5px;" align="right">SERVICE : HKS</td>
						<?php }?>
			</tr>
		</table>
		<table id="adtable" class="tftable tbl-size" border="1" style="text-align:center; width:90%; margin:0 auto; background:white;">
		<tr>
			<th>No</th>
			<th>Key Deduction Indicators</th>
			<th>Weightage</th>
			<th>Parameters</th>
			<th>Indicator Value (RM)</th>
			<th>Ringgit Equivalent</th>
			<th>Demerit Points</th>
			<th>Deduction value (RM)</th>
			<th>Percentage</th>
		</tr>
		<?php $num = 0;?>
		<?php 
						$T_Weightage = 0;
						$T_Parameter = 0;
						$T_MonVal = 0;
						$T_DeductionVal = 0;
						$T_DeductionPer = 0;
						?>
		<?php foreach ($keyindlist as $row): ?>
						<tr class="<?php echo ($num++%2==true ? 'mark' : 'even')?>">
							<td align="center"><?=isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : ''?></td>
							<td align="left"><?=isset($row->v_IndicatorName) ? $row->v_IndicatorName : ''?></td>
							<td align="center"><?=isset($row->n_Weightage) ? $row->n_Weightage : ''?></td>
							<?php //echo $row->n_Weightage;
										//$T_Weightage = $row->n_Weightage + $T_Weightage;
										$DeductionVal = 0; 
							      $DeductionPer = 0; ?>
							<?php if ($acgparam) { ?>
							<?php foreach ($acgparam as $acg): ?>
							<?php if ($row->v_IndicatorNo == $acg->v_IndicatorNo) { ?>
							<td align="center"><?=isset($acg->v_Paramval) ? $acg->v_Paramval : ''?></td>
							<td align="center"><?=isset($acg->n_Parameters) ? number_format($acg->n_Parameters,2) : ''?></td>
							<?php $indno = 'ind'.$row->v_IndicatorNo
							?>
							<!--<td align="center"><?=number_format($acg->n_Parameters/$acg->v_Paramval,2)?></td>-->
							<?php
							$Parameter = isset($acg->v_Paramval) ? $acg->v_Paramval : 0;
							$MonValue = isset($acg->n_Parameters) ? $acg->n_Parameters : 0;
							$DemeritPoint = isset($acg->Demerit_Point) ? $acg->Demerit_Point : 0;
							if ($Parameter != 0) {
							$RinggitEq = $MonValue / $Parameter;} else {
							$RinggitEq = 0;}
							//$DemeritPoint = isset($acgreport[0]->$indno) ? $acgreport[0]->$indno : 0;
							?>
							<td align="center"><?=number_format($RinggitEq,2)?></td>
							<td align="center"><?=isset($acg->Demerit_Point) ? $acg->Demerit_Point : ''?></td>
							<?php
							if ($DemeritPoint != 0) {
							$DeductionVal = ($MonValue / $Parameter) * $DemeritPoint;
							$DeductionPer = ($DeductionVal / $MonValue) * 100; } else {
							$DeductionVal = 0;
							$DeductionPer = 0;}

							$T_Parameter += $Parameter;
							$T_MonVal += $MonValue;
							$T_DeductionVal += $DeductionVal;
							//$T_DeductionPer += $DeductionPer;
							$T_DeductionPer = ($T_DeductionVal / $T_MonVal) * 100;
							?> 
							<?php } ?>
							<?php endforeach; ?>
							<?php } else { ?>
							<td align="center"></td>
							<td align="center"></td>
							<?php $indno = 'ind'.$row->v_IndicatorNo?>
							<td align="center"><?=isset($acgreport[0]->$indno) ? $acgreport[0]->$indno : ''?></td>
							<?php } ?>
							<td align="center"><?=number_format($DeductionVal,2)?></td>
							<td align="center"><?=number_format($DeductionPer,2).'%'?></td>
							<?php 
							$n_Weightage = isset($row->n_Weightage) ? $row->n_Weightage : 0;
							$T_Weightage += $n_Weightage;
							?>
						</tr>
						<?php endforeach; ?>
		
			<td align="center" colspan="9" style="border-left:1px solid white; border-right:1px solid white; background:white; padding:2px; font-size:1px;">&nbsp;</td>
		</tr>
		<tr>
			<td align="center"></td>
			<td align="center" style="font-weight:bold;">Total</td>
			<td align="center"><?=number_format($T_Weightage,2)?></td>
			<td align="center"></td>
			<td align="center">$<?=number_format($T_MonVal,2)?></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center">$<?=number_format($T_DeductionVal,2)?></td>
			<td align="center"><?=number_format($T_DeductionPer,2)?>%</td>
		</tr>
		
	</table>
	<table id="tblwo" class="tbl-wo"  border="0" align="center" style=" margin:10 auto; width:90%;" frame="box" >
			<tr >
				<td style="width:20%; padding-left:5px;border-right:1px solid black;" colspan="2">Prepared by : AdvancePact Sdn. Bhd.</td>
				<td style="width:20%; padding-left:5px;border-right:1px solid black;" colspan="2">Checked By : Peninsular Medical Sdn. Bhd.</td>
				<td style="width:20%; padding-left:5px;border-right:1px solid black;" colspan="2">Verified By : International Islamic University Malaysia</td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Name:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Name:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Name:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Designation:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Designation:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Designation:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Signature:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Signature:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Signature:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Date:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Date:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Date:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Chop:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Chop:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Chop:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
		</table>
	</div></div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>


