<?php include 'pdf_head.php'?>


<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	
		.tbl-wor {
    border: 1px solid black;

	}

	</style>
	</head>
	<body>
	<table class="rport-header">
		
	</table>
		<table class="tbl-wo" >
			<tr >
				<td>HOSPITAL  </td>
				<td><?=$this->session->userdata('hosp_code')?> </td>
				<td></td>
				<td></td>
				<!--<td style="width:20%; padding-left:5px;">Report No </td>
				<td style="padding-left:5px; text-align:center;"> </td>-->
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td>MONTH</td>
				<?php
				$strdt = '1/'.$month.'/'.$year;
				//echo "lalala".$strdt;
				$dt = DateTime::createFromFormat('!d/m/Y', $strdt);
				//echo "nilai date :".$dt->format('M Y');
				 
				 ?>
				<td><?=$dt->format('M Y')?></td>
				<td></td>
				<td></td>
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td>TOTAL MONTHLY SERVICE FEE(RM)</td>
				
				<td><?= isset($acgparam[0]->n_Revenue) ? number_format($acgparam[0]->n_Revenue,2) : 'N/A' ?></td>
				<td></td>
				<?php  if ($service== "FES") {?>
							<td style="padding-left:5px;" align="right">SERVICE : FES</td>
						<?php  } elseif ($service== "BES") {?>
						  <td style="padding-left:5px;" align="right">SERVICE : BES</td>
						<?php  } elseif ($service== "HKS") {?>
						<td style="padding-left:5px;" align="right">SERVICE : HKS</td>
						<?php }?>
			</tr>
		</table>
		<table id="tftable"  class="spacing-table" border="1" style="text-align:center; font-size:7px;" cellpadding="4" cellspacing="0">
		<tr>
			<th width="3%">No</th>
			<th width="50%">Key Deduction Indicators</th>
			<th width="7%">Weightage</th>
			<th width="7%">Parameters</th>
			<th width="7%">Indicator Value (RM)</th>
			<th width="7%">Ringgit Equivalent</th>
			<th width="7%">Demerit Points</th>
			<th width="7%">Deduction value (RM)</th>
			<th width="7%" >Percentage</th>
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
						<tr class="<?php echo ($num++%2==true ? 'mark' : 'even')?>" >
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
							<td style="border-right:1px solid white; background:white; "></td>
						</tr>
						<?php endforeach; ?>
		<tr>
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
	<table> 
	<tr>
	<td></td></tr>
	</table>
     <table id="tblwo" class="tbl-wor"  border="0" style="text-align:center; width:102%; margin:10 auto;" >
			
			<tr >
				<td style="width:30%;" style=" border-right: 1px solid black; " align="left" colspan="2">Prepared by : AdvancePact Sdn. Bhd.</td>
				<td style="width:33%;"style=" border-right: 1px solid black; "  align="left" colspan="2">Checked By : Peninsular Medical Sdn. Bhd.</td>
				<td style="width:39%;"  style=" border-right: 1px solid black; " align="left" colspan="2">Verified By : International Islamic University Malaysia</td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; "  colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td  style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr >
				<td align="left" >Name:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td align="left">Name:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Name:</td>
				<td ></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr >
				<td align="left">Designation:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Designation:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td align="left">Designation:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td align="left">Signature:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Signature:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Signature:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td  style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td  style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td  align="left">Date:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Date:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Date:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td  align="left">Chop:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Chop:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Chop:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
			</tr>
		</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>