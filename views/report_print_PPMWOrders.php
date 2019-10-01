<div id="Instruction" class="pr-printer">
    <div class="header-pr">STATUS REPORT</div>
    <button onclick="javascript:myFunction('report_print_PPMWOrders?none=closed&sdate=<?=date("Y-m-d",strtotime($daterange[0]))?>&edate=<?=date("Y-m-d",strtotime($daterange[1]))?>&stat=<?=$wostat?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report_PPMWOrders';">CANCEL</button>
</div>


<style>
table.tftable {word-wrap:break-word;table-layout: fixed;}
table.tftable tr td{width: 40px; word-wrap:break-word;}
</style>
<?php if($this->input->get('none') == 'closed') { ?>
<?php $num = 1;foreach($record as $row): ?>
<?php if ($num==1 OR $num%15==1){ ?>
	<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="center">
			<span class="ReportCenter"></span>Print Date : <?= date("d/m/Y")?> </td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>STATUS REPORT - <?=$status?></td>
			<td align="right"><?=$startdate?> - <?=$enddate?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr >
			<th>No</th>
			<th>Due Date</th>
			<th>WO Number</th>
			<th>User Dept</th>
			<th>Asset Number</th>
			<th style="width:100px; word-wrap:break-word;">Summary</th>
			<th>Job Type</th>
			<th>Status</th>
			<th>Completion Date</th>
		</tr>
<?php } ?>		
		<tr <?= $row->v_Wrkordstatus <> 'C' && $row->v_Wrkordstatus <> 'CR' ? 'style="font-weight:bold;"' : '' ?>>
			<td><?=$num?></td>
			<td><?=isset($row->d_DueDt) ? date("d-m-Y",strtotime($row->d_DueDt)) : ''?></td>
			<td><?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
			<td><?=isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : ''?></td>
			<td><?=isset($row->v_Asset_no) ? $row->v_Asset_no : ''?></td>
			<td style="width:100px; height:40px; text-overflow: ellipsis;  display: block; overflow: hidden; border-right:none;border-left:none;"><?=isset($row->v_Remarks) ? $row->v_Remarks : ''?></td>
			<td><?=isset($row->v_jobtype) ? $row->v_jobtype : ''?></td>
			<td><?=isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : ''?></td>
			<td><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
		</tr>
<?php $num++ ?>
<?php if (($num-1)%15==0 OR ($num-1) == count($record)) { ?>
	</table>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">STATUS REPORT - <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>
<?php endforeach; ?>
<?php } else { ?>
<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="center">
			<span class="ReportCenter"></span>Print Date : <?= date("d/m/Y")?> </td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>STATUS REPORT - <?=$status?></td>
			<td align="right"><?=$startdate?> - <?=$enddate?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr >
			<th>No</th>
			<th>Due Date</th>
			<th>WO Number</th>
			<th>User Dept</th>
			<th>Asset Number</th>
			<th style="word-wrap:break-word; width:200px;">Summary</th>
			<th>Job Type</th>
			<th>Status</th>
			<th>Completion Date</th>
		</tr>
		<?php if ($record){ ?>
		<?php $num = 1;foreach($record as $row): ?>
		<tr <?= $row->v_Wrkordstatus <> 'C' && $row->v_Wrkordstatus <> 'CR' ? 'style="font-weight:bold;"' : '' ?>>
			<td><?=$num++?></td>
			<td><?=isset($row->d_DueDt) ? date("d-m-Y",strtotime($row->d_DueDt)) : ''?></td>
			<td><?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
			<td><?=isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : ''?></td>
			<td><?=isset($row->v_Asset_no) ? $row->v_Asset_no : ''?></td>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->v_Remarks) ? $row->v_Remarks : ''?></td>
			<td><?=isset($row->v_jobtype) ? $row->v_jobtype : ''?></td>
			<td><?=isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : ''?></td>
			<td><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
		</tr>
		<?php endforeach; ?>
		<?php } else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td colspan="20"><span style="color:red;">NO RECORDS FOUND.</span></td>
		</tr>
		<?php } ?>

	</table>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">STATUS REPORT - <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>