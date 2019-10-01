<div id="Instruction" class="pr-printer">
    <div class="header-pr">PPM Work Order Summary</div>
    <button onclick="javascript:myFunction('report_vossu?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
</div>

<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">Site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>PPM Work Order Summary <?= date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period</th>
				<th>Total PPM Work Order</th>
				<th>Total Completed</th>
				<th>Total Rescheduled</th>
				<th>Total Not Done</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			  <td><?php if ($ppmsum[0]->total == 0) { echo $ppmsum[0]->total; } else {echo anchor('contentcontroller/report_vols?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt',$ppmsum[0]->total);} ?></td>
			  <td><?php if ($ppmsum[0]->comp == 0) { echo $ppmsum[0]->comp; } else {echo anchor('contentcontroller/report_vols?m='.$month.'&y='.$year.'&stat=A&resch=nt',$ppmsum[0]->comp);} ?></td>
			  <td><?php if ($ppmsum[0]->resch == 0) { echo $ppmsum[0]->resch; } else {echo anchor('contentcontroller/report_vols?m='.$month.'&y='.$year.'&stat=A&resch=ys',$ppmsum[0]->resch);} ?></td>
			  <td><?php if ($ppmsum[0]->notcomp == 0) { echo $ppmsum[0]->notcomp; } else {echo anchor('contentcontroller/report_vols?m='.$month.'&y='.$year.'&stat=C&resch=nt',$ppmsum[0]->notcomp);} ?></td>
			</tr>
	</table>
	
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">PPM Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">Site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>Request Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period</th>
				<th>Total Work Order Request</th>
				<th>Total Completed</th>
				<th>Total Outstanding</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			  <td><?php if ($rqsum[0]->total == 0) { echo $rqsum[0]->total; } else {echo anchor('contentcontroller/report_volu?m='.$month.'&y='.$year.'&stat=fbfb'.$month.'&y='.$year.'&stat=fbfb',$rqsum[0]->total);} ?></td>
			  <td><?php if ($rqsum[0]->comp == 0) { echo $rqsum[0]->comp; } else {echo anchor('contentcontroller/report_volu?m='.$month.'&y='.$year.'&stat=fbfb'.$month.'&y='.$year."&stat=A','BO",$rqsum[0]->comp);} ?></td>
			  <td><?php if ($rqsum[0]->notcomp == 0) { echo $rqsum[0]->notcomp; } else {echo anchor('contentcontroller/report_volu?m='.$month.'&y='.$year.'&stat=fbfb'.$month.'&y='.$year.'&stat=C',$rqsum[0]->notcomp);} ?></td>
			</tr>
	</table>
	
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Request Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">Site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>Complaint Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period</th>
				<th>Total Complaint</th>
				<th>Total Completed</th>
				<th>Total Outstanding</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			  <td><?php if ($complntsum[0]->total == 0) { echo $complntsum[0]->total; } else {echo anchor('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=no',$complntsum[0]->total);} ?></td>
			  <td><?php if ($complntsum[0]->comp == 0) { echo $complntsum[0]->comp; } else {echo anchor('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=no',$complntsum[0]->comp);} ?></td>
			  <td><?php if ($complntsum[0]->notcomp == 0) { echo $complntsum[0]->notcomp; } else {echo anchor('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=no',$complntsum[0]->notcomp);} ?></td>
			</tr>
	</table>
	
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Complaint Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">Site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>Response Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period</th>
				<th>Total Work Order Request</th>
				<th>Total Responded</th>
				<th>Total Responded Late</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			  <td><?php if ($rqsum[0]->total == 0) { echo $rqsum[0]->total; } else {echo anchor('contentcontroller/report_rtlu?m='.$month.'&y='.$year.'&stat=fbfb',$rqsum[0]->total);} ?></td>
			  <td><?php if ($rqsum[0]->resp == 0) { echo $rqsum[0]->resp; } else {echo anchor('contentcontroller/report_rtlu?m='.$month.'&y='.$year.'&stat=ys',$rqsum[0]->resp);} ?></td>
			  <td><?php if ($rqsum[0]->resplate == 0) { echo $rqsum[0]->resplate; } else {echo anchor('contentcontroller/report_rtlu?m='.$month.'&y='.$year.'&stat=no',$rqsum[0]->resplate);} ?></td>
			</tr>
	</table>
	
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Response Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">Site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>Statutory & License Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period</th>
				<th>Total of License & Statutory </th>
				<th>Total Expired</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			  <td><?= $rqsum[0]->total ?></td>
			  <td><?= $rqsum[0]->total ?></td>
			</tr>
	</table>
	
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Statutory & License Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>