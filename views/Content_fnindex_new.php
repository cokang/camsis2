<body class="body_acg">
	<div id="Instruction" class="pr-printer">
    <div class="header-pr">Indicator Summary</div>
    <button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
    <a href="Schedule"><button type="cancel" class="btn-button btn-primary-button">CANCEL</button></a>
</div>
	<div Class="main-cs">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:150px; height:50px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Indicator Summary</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:5px; width:160px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Month : <?=substr(date('F',mktime(0, 0, 0, $fmonth, 10)),0,10)?></td>
						</tr>
						<tr>
							<td align="left"> Year : <?=$fyear?></td>
						</tr>
						<tr>
							<td align="left"> Service : <?=$s_code?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="main-is" id="Instruction">
			<table class="tbl-is">
				<tr>
					<th colspan="6" style="padding-left:5px;">Indicator Summary</th>
				</tr>
				<tr>
					<th>Month</th>
					<th>Year</th>
					<th>Service</th>
					<th>....</th>
				</tr>
				<tr>
					<form action="" method="POST">
					<td>
						<?php 
						$month_list = array(
						'01' => 'January',
						'02' => 'February',
						'03' => 'March',
						'04' => 'April',
						'05' => 'May',
						'06' => 'June',
						'07' => 'July',
						'08' => 'August',
						'09' => 'September',
						'10' => 'October',
						'11' => 'November',
						'12' => 'December'
					 );
					?>
					<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth',$month) , 'style="width: 95px;"'); ?>
					</td>
					<td>
						<?php 
						for ($dyear = '2015';$dyear <= $year;$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear',$year) , 'style="width: 65px;"'); ?>
					</td>
					<td><?php 
						$Service_list = array(
						'BES' => 'BES',
						'FES' => 'FES',
						'HKS' => 'HKS',
						'Security' => 'Security'
					 );
					?>
					<?php echo form_dropdown('n_base', $Service_list, set_value('n_base') , 'style="width: 80px;"'); ?> </td>
					<td><input type="submit" name="mysubmit" value="Value" id="n_Identification_Type" onchange="javascript: submit()"></td>
					</form>
				</tr>
			</table>
		</div>
		<div class="second-is">
			<table class="tbl-is">
				<tr>
					<th colspan="8" style="padding-left:5px;">Indicator Summary</th>
				</tr>
				<tr>
					<th>Indicator</th>
					<th>Description</th>
					<th>Parameter</th>
					<th>Indicator value (RM)</th>
					<th>Ringgit Equivalent</th>
					<th>Demerit Points</th>
					<th>Deduction (RM)</th>
					<th>%</th>
				</tr>
				<?php 
				$totalIndVal = 0;
				$totalDeduction = 0;
				 ?>
				<?php foreach ($record as $row): ?>

				<?php
				if ($row->Parameter != 0){
				$RinggitEqui = $row->Indicator_Value / $row->Parameter;
				}
				else{
				$RinggitEqui = 0;
				}
				$Deduction = $row->Demerit_Point * $RinggitEqui;
				$Percentage = $Deduction / $row->Indicator_Value * 100;
				$totalIndVal += $row->Indicator_Value;
				$totalDeduction += $Deduction;

				isset($row->Indicator) == TRUE ? $Ind = $row->Indicator : $Ind = 'N/A';
				switch ($Ind) {
				case "1":
				$IndDesc = 'Equipment Required Not Available';
				break;
				case "2":
				$IndDesc = 'Planned Preventive Maintenance Completed';
				break;
				case "3":
				$IndDesc = 'Planned Preventive Maintenance On Time To Sch';
				break;
				case "4":
				$IndDesc = 'Statutory Requirement Complied ';
				break;
				case "5":
				$IndDesc = 'User Training Completed';
				break;
				case "6":
				$IndDesc = 'Testing and Commissioning Witnessed';
				break;
				case "7":
				$IndDesc = 'Response Time Been Met';
				break;
				case "8":
				$IndDesc = 'Reports Submitted On Time';
				break;
				case "9":
				$IndDesc = 'Safety & Performance Test Been Completed';
				break;
				case "10":
				$IndDesc = 'Reports & Records Accurate';
				break;
				case "11":
				$IndDesc = 'Service Requests Completed Within 15 Days';
				break;
				default:
				$IndDesc = '';
				}
				?>

				<tr>
					<td><?= isset($row->Indicator) ? $row->Indicator : '' ?></td>
					<td><?= $IndDesc ?></td>
					<td><?= isset($row->Parameter) ? $row->Parameter : '' ?></td>
					<td><?= isset($row->Indicator_Value) ? number_format($row->Indicator_Value,2) : '' ?></td>
					<td><?= number_format($RinggitEqui,2) ?></td>
					<td><?= isset($row->Demerit_Point) ? $row->Demerit_Point : '' ?></td>
					<td><?= number_format($Deduction,2) ?></td>
					<td><?= number_format($Percentage,2) ?></td>
				</tr>
				<?php endforeach; ?>
				<tr style="font-weight:bold;">
					<td style="text-align:right;">Grand Total</td>
					<td></td>
					<td></td>
					<td><?=number_format($totalIndVal,2)?></td>
					<td></td>
					<td></td>
					<td><?=number_format($totalDeduction,2)?></td>
					<td></td>
				</tr>
			</table>
			<!--<div class="nav" id="Instruction">
				<table class="tbl-nav">
					<tr>
						<td><span class="icon-first"></span></td>
						<td><span class="icon-backward2"></span></td>
						<td>112</td>
						<td><span class="icon-forward3"></span></td>
						<td><span class="icon-last"></span></td>
					</tr>
				</table>
			</div>-->
		</div>
	</div>
</body>
</html>