<?php include 'pdf_head.php'?>	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
	<table class="rport-header">
		<tr>
			<td colspan="4" valign="top"><h3>Fes Daily Report<br/>Date : <?=$date?> <span style="font-size:7px;">*Data taken at 4:00pm</span></h3></td>
		</tr>
	</table>
		<table class="tftable" border="1" style="text-align:center; width:80%;" align="center">
		<tr style="text-align:center;font-weight:bold;">
			<th colspan="2" style="width:100px;">Item</th>
			<th style="width:100px;">Description</th>
			<th>A1</th>
			<th>A2</th>
			<th>A3</th>
			<th>A4</th>
			<th>A5</th>
			<th>A6</th>
			<th>A7</th>
			<th>A8</th>
			<th>A9</th>
			<th>A10</th>
			<th>Total</th>
		</tr>
		<tr style="text-align:center;">
			<td rowspan="8">1.0 Work Order Current Month </td>
			<td>1.1</td>
			<td>Received for the date</td>
			<td><?=isset($record[0]->rd_A1) ? $record[0]->rd_A1 : 0 ?></td>
			<td><?=isset($record[0]->rd_A2) ? $record[0]->rd_A2 : 0 ?></td>
			<td><?=isset($record[0]->rd_A3) ? $record[0]->rd_A3 : 0 ?></td>
			<td><?=isset($record[0]->rd_A4) ? $record[0]->rd_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($record[0]->rd_A10) ? $record[0]->rd_A10 : 0 ?></td>
			<?php $rd_total = (isset($record[0]->rd_A1) ? $record[0]->rd_A1 : 0) + (isset($record[0]->rd_A2) ? $record[0]->rd_A2 : 0) + (isset($record[0]->rd_A3) ? $record[0]->rd_A3 : 0) + (isset($record[0]->rd_A4) ? $record[0]->rd_A4 : 0) + (isset($record[0]->rd_A10) ? $record[0]->rd_A10 : 0) ?>
			<td><?= ($rd_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=1',$rd_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.2</td>
			<td>Completed for the day</td>
			<td><?=isset($reccompday[0]->cd_A1) ? $reccompday[0]->cd_A1 : 0 ?></td>
			<td><?=isset($reccompday[0]->cd_A2) ? $reccompday[0]->cd_A2 : 0 ?></td>
			<td><?=isset($reccompday[0]->cd_A3) ? $reccompday[0]->cd_A3 : 0 ?></td>
			<td><?=isset($reccompday[0]->cd_A4) ? $reccompday[0]->cd_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($reccompday[0]->cd_A10) ? $reccompday[0]->cd_A10 : 0 ?></td>
			<?php $cd_total = (isset($reccompday[0]->cd_A1) ? $reccompday[0]->cd_A1 : 0) + (isset($reccompday[0]->cd_A2) ? $reccompday[0]->cd_A2 : 0) + (isset($reccompday[0]->cd_A3) ? $reccompday[0]->cd_A3 : 0) + (isset($reccompday[0]->cd_A4) ? $reccompday[0]->cd_A4 : 0) + (isset($reccompday[0]->cd_A10) ? $reccompday[0]->cd_A10 : 0) ?>
			<td><?= ($cd_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=2',$cd_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.3</td>
			<td>Outstanding for the day</td>
			<td><?=isset($record[0]->od_A1) ? $record[0]->od_A1 : 0 ?></td>
			<td><?=isset($record[0]->od_A2) ? $record[0]->od_A2 : 0 ?></td>
			<td><?=isset($record[0]->od_A3) ? $record[0]->od_A3 : 0 ?></td>
			<td><?=isset($record[0]->od_A4) ? $record[0]->od_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($record[0]->od_A10) ? $record[0]->od_A10 : 0 ?></td>
			<?php $od_total = (isset($record[0]->od_A1) ? $record[0]->od_A1 : 0) + (isset($record[0]->od_A2) ? $record[0]->od_A2 : 0) + (isset($record[0]->od_A3) ? $record[0]->od_A3 : 0) + (isset($record[0]->od_A4) ? $record[0]->od_A4 : 0) + (isset($record[0]->od_A10) ? $record[0]->od_A10 : 0) ?>
			<td><?= ($od_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=3',$od_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.4</td>
			<td>Accumulated outstanding</td>
			<td><?=isset($record[0]->ao_A1) ? $record[0]->ao_A1 : 0 ?></td>
			<td><?=isset($record[0]->ao_A2) ? $record[0]->ao_A2 : 0 ?></td>
			<td><?=isset($record[0]->ao_A3) ? $record[0]->ao_A3 : 0 ?></td>
			<td><?=isset($record[0]->ao_A4) ? $record[0]->ao_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($record[0]->ao_A10) ? $record[0]->ao_A10 : 0 ?></td>
			<?php $ao_total = (isset($record[0]->ao_A1) ? $record[0]->ao_A1 : 0) + (isset($record[0]->ao_A2) ? $record[0]->ao_A2 : 0) + (isset($record[0]->ao_A3) ? $record[0]->ao_A3 : 0) + (isset($record[0]->ao_A4) ? $record[0]->ao_A4 : 0) + (isset($record[0]->ao_A10) ? $record[0]->ao_A10 : 0) ?>
			<td><?= ($ao_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=4',$ao_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.5</td>
			<td>Accumulated completed</td>
			<td><?=isset($record[0]->ac_A1) ? $record[0]->ac_A1 : 0 ?></td>
			<td><?=isset($record[0]->ac_A2) ? $record[0]->ac_A2 : 0 ?></td>
			<td><?=isset($record[0]->ac_A3) ? $record[0]->ac_A3 : 0 ?></td>
			<td><?=isset($record[0]->ac_A4) ? $record[0]->ac_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($record[0]->ac_A10) ? $record[0]->ac_A10 : 0 ?></td>
			<?php $ac_total = (isset($record[0]->ac_A1) ? $record[0]->ac_A1 : 0) + (isset($record[0]->ac_A2) ? $record[0]->ac_A2 : 0) + (isset($record[0]->ac_A3) ? $record[0]->ac_A3 : 0) + (isset($record[0]->ac_A4) ? $record[0]->ac_A4 : 0) + (isset($record[0]->ac_A10) ? $record[0]->ac_A10 : 0) ?>
			<td><?= ($ac_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=5',$ac_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.6</td>
			<td>Outstanding > 10days</td>
			<td><?=isset($record[0]->o10_A1) ? $record[0]->o10_A1 : 0 ?></td>
			<td><?=isset($record[0]->o10_A2) ? $record[0]->o10_A2 : 0 ?></td>
			<td><?=isset($record[0]->o10_A3) ? $record[0]->o10_A3 : 0 ?></td>
			<td><?=isset($record[0]->o10_A4) ? $record[0]->o10_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($record[0]->o10_A10) ? $record[0]->o10_A10 : 0 ?></td>
			<?php $o10_total = (isset($record[0]->o10_A1) ? $record[0]->o10_A1 : 0) + (isset($record[0]->o10_A2) ? $record[0]->o10_A2 : 0) + (isset($record[0]->o10_A3) ? $record[0]->o10_A3 : 0) + (isset($record[0]->o10_A4) ? $record[0]->o10_A4 : 0) + (isset($record[0]->o10_A10) ? $record[0]->o10_A10 : 0) ?>
			<td><?= ($o10_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=6',$o10_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.7</td>
			<td>Outstanding > 15days</td>
			<td><?=isset($record[0]->o15_A1) ? $record[0]->o15_A1 : 0 ?></td>
			<td><?=isset($record[0]->o15_A2) ? $record[0]->o15_A2 : 0 ?></td>
			<td><?=isset($record[0]->o15_A3) ? $record[0]->o15_A3 : 0 ?></td>
			<td><?=isset($record[0]->o15_A4) ? $record[0]->o15_A4 : 0 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($record[0]->o15_A10) ? $record[0]->o15_A10 : 0 ?></td>
			<?php $o15_total = (isset($record[0]->o15_A1) ? $record[0]->o15_A1 : 0) + (isset($record[0]->o15_A2) ? $record[0]->o15_A2 : 0) + (isset($record[0]->o15_A3) ? $record[0]->o15_A3 : 0) + (isset($record[0]->o15_A4) ? $record[0]->o15_A4 : 0) + (isset($record[0]->o15_A10) ? $record[0]->o15_A10 : 0) ?>
			<td><?= ($o15_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=7',$o15_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>1.8</td>
			<td>Total of the month</td>
			<?php $t_A1 = (isset($record[0]->ao_A1) ? $record[0]->ao_A1 : 0) + (isset($record[0]->ac_A1) ? $record[0]->ac_A1 : 0) ?>
			<td><?= $t_A1 ?></td>
			<?php $t_A2 = (isset($record[0]->ao_A2) ? $record[0]->ao_A2 : 0) + (isset($record[0]->ac_A2) ? $record[0]->ac_A2 : 0) ?>
			<td><?= $t_A2 ?></td>
			<?php $t_A3 = (isset($record[0]->ao_A3) ? $record[0]->ao_A3 : 0) + (isset($record[0]->ac_A3) ? $record[0]->ac_A3 : 0) ?>
			<td><?= $t_A3 ?></td>
			<?php $t_A4 = (isset($record[0]->ao_A4) ? $record[0]->ao_A4 : 0) + (isset($record[0]->ac_A4) ? $record[0]->ac_A4 : 0) ?>
			<td><?= $t_A4 ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<?php $t_A10 = (isset($record[0]->ao_A10) ? $record[0]->ao_A10 : 0) + (isset($record[0]->ac_A10) ? $record[0]->ac_A10 : 0) ?>
			<td><?= $t_A10 ?></td>
			<?php $m_total = $t_A1 + $t_A2 + $t_A3 + $t_A4 + $t_A10?>
			<td><?= ($m_total > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=8',$m_total) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td rowspan="6">2.0 Outstanding Previous Month </td>
			<td>2.1</td>
			<td>Outstanding 1 Month</td>
			<td><?=isset($recoutstanding[0]->m1_A1) ? $recoutstanding[0]->m1_A1 : 0?></td>
			<td><?=isset($recoutstanding[0]->m1_A2) ? $recoutstanding[0]->m1_A2 : 0?></td>
			<td><?=isset($recoutstanding[0]->m1_A3) ? $recoutstanding[0]->m1_A3 : 0?></td>
			<td><?=isset($recoutstanding[0]->m1_A4) ? $recoutstanding[0]->m1_A4 : 0?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($recoutstanding[0]->m1_A10) ? $recoutstanding[0]->m1_A10 : 0?></td>
			<?php $t_o1 = (isset($recoutstanding[0]->m1_A1) ? $recoutstanding[0]->m1_A1 : 0) + (isset($recoutstanding[0]->m1_A2) ? $recoutstanding[0]->m1_A2 : 0) + (isset($recoutstanding[0]->m1_A3) ? $recoutstanding[0]->m1_A3 : 0) + (isset($recoutstanding[0]->m1_A4) ? $recoutstanding[0]->m1_A4 : 0) + (isset($recoutstanding[0]->m1_A10) ? $recoutstanding[0]->m1_A10 : 0) ?>
			<td><?= ($t_o1 > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=9',$t_o1) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>2.2</td>
			<td>Outstanding 2 Month</td>
			<td><?=isset($recoutstanding[0]->m2_A1) ? $recoutstanding[0]->m2_A1 : 0?></td>
			<td><?=isset($recoutstanding[0]->m2_A2) ? $recoutstanding[0]->m2_A2 : 0?></td>
			<td><?=isset($recoutstanding[0]->m2_A3) ? $recoutstanding[0]->m2_A3 : 0?></td>
			<td><?=isset($recoutstanding[0]->m2_A4) ? $recoutstanding[0]->m2_A4 : 0?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($recoutstanding[0]->m2_A10) ? $recoutstanding[0]->m2_A10 : 0?></td>
			<?php $t_o2 = (isset($recoutstanding[0]->m2_A1) ? $recoutstanding[0]->m2_A1 : 0) + (isset($recoutstanding[0]->m2_A2) ? $recoutstanding[0]->m2_A2 : 0) + (isset($recoutstanding[0]->m2_A3) ? $recoutstanding[0]->m2_A3 : 0) + (isset($recoutstanding[0]->m2_A4) ? $recoutstanding[0]->m2_A4 : 0) + (isset($recoutstanding[0]->m2_A10) ? $recoutstanding[0]->m2_A10 : 0) ?>
			<td><?= ($t_o2 > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=10',$t_o2) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>2.3</td>
			<td>Outstanding 3 Month</td>
			<td><?=isset($recoutstanding[0]->m3_A1) ? $recoutstanding[0]->m3_A1 : 0?></td>
			<td><?=isset($recoutstanding[0]->m3_A2) ? $recoutstanding[0]->m3_A2 : 0?></td>
			<td><?=isset($recoutstanding[0]->m3_A3) ? $recoutstanding[0]->m3_A3 : 0?></td>
			<td><?=isset($recoutstanding[0]->m3_A4) ? $recoutstanding[0]->m3_A4 : 0?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($recoutstanding[0]->m3_A10) ? $recoutstanding[0]->m3_A10 : 0?></td>
			<?php $t_o3 = (isset($recoutstanding[0]->m3_A1) ? $recoutstanding[0]->m3_A1 : 0) + (isset($recoutstanding[0]->m3_A2) ? $recoutstanding[0]->m3_A2 : 0) + (isset($recoutstanding[0]->m3_A3) ? $recoutstanding[0]->m3_A3 : 0) + (isset($recoutstanding[0]->m3_A4) ? $recoutstanding[0]->m3_A4 : 0) + (isset($recoutstanding[0]->m3_A10) ? $recoutstanding[0]->m3_A10 : 0) ?>
			<td><?= ($t_o3 > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=11',$t_o3) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>2.4</td>
			<td>Outstanding 4 Month</td>
			<td><?=isset($recoutstanding[0]->m4_A1) ? $recoutstanding[0]->m4_A1 : 0?></td>
			<td><?=isset($recoutstanding[0]->m4_A2) ? $recoutstanding[0]->m4_A2 : 0?></td>
			<td><?=isset($recoutstanding[0]->m4_A3) ? $recoutstanding[0]->m4_A3 : 0?></td>
			<td><?=isset($recoutstanding[0]->m4_A4) ? $recoutstanding[0]->m4_A4 : 0?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($recoutstanding[0]->m4_A10) ? $recoutstanding[0]->m4_A10 : 0?></td>
			<?php $t_o4 = (isset($recoutstanding[0]->m4_A1) ? $recoutstanding[0]->m4_A1 : 0) + (isset($recoutstanding[0]->m4_A2) ? $recoutstanding[0]->m4_A2 : 0) + (isset($recoutstanding[0]->m4_A3) ? $recoutstanding[0]->m4_A3 : 0) + (isset($recoutstanding[0]->m4_A4) ? $recoutstanding[0]->m4_A4 : 0) + (isset($recoutstanding[0]->m4_A10) ? $recoutstanding[0]->m4_A10 : 0) ?>
			<td><?= ($t_o4 > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=12',$t_o4) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>2.5</td>
			<td>Outstanding > 5 Month</td>
			<td><?=isset($recoutstanding[0]->m5_A1) ? $recoutstanding[0]->m5_A1 : 0?></td>
			<td><?=isset($recoutstanding[0]->m5_A2) ? $recoutstanding[0]->m5_A2 : 0?></td>
			<td><?=isset($recoutstanding[0]->m5_A3) ? $recoutstanding[0]->m5_A3 : 0?></td>
			<td><?=isset($recoutstanding[0]->m5_A4) ? $recoutstanding[0]->m5_A4 : 0?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td><?=isset($recoutstanding[0]->m5_A10) ? $recoutstanding[0]->m5_A10 : 0?></td>
			<?php $t_o5 = (isset($recoutstanding[0]->m5_A1) ? $recoutstanding[0]->m5_A1 : 0) + (isset($recoutstanding[0]->m5_A2) ? $recoutstanding[0]->m5_A2 : 0) + (isset($recoutstanding[0]->m5_A3) ? $recoutstanding[0]->m5_A3 : 0) + (isset($recoutstanding[0]->m5_A4) ? $recoutstanding[0]->m5_A4 : 0) + (isset($recoutstanding[0]->m5_A10) ? $recoutstanding[0]->m5_A10 : 0) ?>
			<td><?= ($t_o5 > 0) ? anchor('contentcontroller/report_fdreport2?jobdate='.$date.'&x=13',$t_o5) : 0 ?></td>
		</tr>
		<tr style="text-align:center;">
			<td>2.6</td>
			<td>Total Out Standing</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
		</tr>
		<tr style="text-align:center;">
			<td rowspan="4">3.0 PPM/RI/SCM </td>
			<td></td>
			<td colspan="4">Scheduled Maintenance</td>
			<td>Plan</td>
			<td>Completed</td>
			<td colspan="6">Outstanding</td>
		</tr>
		<tr style="text-align:center;">
			<td>3.1</td>
			<td colspan="4">Planned Preventive Maintenance (PPM)</td>
			<td><?=isset($recppm[0]->ppmplan) ? $recppm[0]->ppmplan : 0?></td>
			<td><?=isset($recppm[0]->ppmc) ? $recppm[0]->ppmc : 0?></td>
			<td colspan="6"><?=isset($recppm[0]->ppmo) ? $recppm[0]->ppmo : 0?></td>
		</tr>
		<tr style="text-align:center;">
			<td>3.2</td>
			<td colspan="4">Routine Inspection (RI)</td>
			<td><?=isset($recppm[0]->riplan) ? $recppm[0]->riplan : 0?></td>
			<td><?=isset($recppm[0]->ric) ? $recppm[0]->ric : 0?></td>
			<td colspan="6"><?=isset($recppm[0]->rio) ? $recppm[0]->rio : 0?></td>
		</tr>
		<tr style="text-align:center;">
			<td>3.3</td>
			<td colspan="4">Scheduled Corrective Maintenance (SCM)</td>
			<td></td>
			<td></td>
			<td colspan="6"></td>
		</tr>
		<tr style="text-align:center;">
			<td>4.0</td>
			<td colspan="2">Description</td>
			<td></td>
			<td colspan="4">Root Cause</td>
			<td colspan="6">Action Taken</td>
		</tr>
		<tr style="text-align:center;">
			<td style="height:150px;">Major Issues</td>
			<td colspan="3"></td>
			<td colspan="4"></td>
			<td colspan="6"></td>
		</tr>
		<tr style="text-align:center;">
			<td>5.0</td>
			<td colspan="7"></td>
			<td colspan="6">Action By</td>
		</tr>
		<tr style="text-align:center;">
			<td style="height:150px;">Other Matter</td>
			<td colspan="7"></td>
			<td colspan="6"></td>
		</tr>
	</table>
	<div style="display:block;padding:10px;"></div>
	<?php if ($this->session->userdata('usersess') == "BES") {?>
	<table class="" style="width:100%;font-size:9px; " align="center" border="0">
		<tr>
			<td rowspan="5" valign="top">Submitted by :</td>
			<td style="width:170px;text-align:left;">NUR AZILA BT AWANG MD ISA</td>
			<td rowspan="5" style="width:2%;"></td>
			<td rowspan="5" valign="top">Acknowledged by :</td>
			<td valign="top" style="width:123px;text-align:left;">SALASIAH ABD AZIZ</td>
		</tr>
		<tr>
			
		</tr>
		<tr>
			<td style="border-bottom:1px solid black; padding-top:10px;"></td>
			<td style="border-bottom:1px solid black; padding-top:10px;"></td>
		</tr>
	</table>
	<?php } elseif ($this->session->userdata('usersess') == "FES") { ?>
	<table class="" style="width:100%;font-size:9px; " align="center" border="0">
		<tr>
			<td rowspan="5" valign="top">Submitted by :</td>
			<td style="width:170px;text-align:left;">1) MOHAMMAD HAFIZ BIN DIN</td>
			<td rowspan="5" style="width:2%;"></td>
			<td rowspan="5" valign="top">Acknowledged by :</td>
			<td valign="top" style="width:123px;text-align:left;">MOHD SANUSI ABDULLAH</td>
		</tr>
		<tr>
			<td align="left">2) NUR HAFIZAH BINTI MOHD SABRI</td>
			<td style="border-bottom:1px solid black;"></td>
		</tr>
		<tr>
			<td align="left">3) MOHD SABRI BIN ABU BAKAR</td>
		</tr>
		<tr>
			<td align="left">4) MURSYIDUL AZIM BIN MAZLAN</td>
		</tr>
		<tr>
			<td style="border-bottom:1px solid black; padding-top:10px;"></td>
		</tr>
	</table>
	<?php } ?>
	</body>
</html>
<?php include 'pdf_footer.php'?>