<div id="Instruction" class="pr-printer">
    <div class="header-pr">REQUESTS STATUS REPORT</div>
    <button onclick="javascript:myFunction('report_print_RSReport?none=closed&sdate=<?=date("Y-m-d",strtotime($daterange[0]))?>&edate=<?=date("Y-m-d",strtotime($daterange[1]))?>&stat=<?=$wostat?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report_RSReport';">CANCEL</button>
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
		<td width="200" align="right">
			<span class="ReportCenter"></span>Print Date : <?= date("d/m/Y")?> </td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>REQUESTS STATUS REPORT - <?=$status?></td>
			<td align="right"><?=$startdate?> - <?=$enddate?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr >
			<th>No</th>
			<th>Request Date</th>
			<th>Request Number</th>
			<th>User Dept</th>
			<th>Asset Number / Tag Number</th>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<th style="word-wrap:break-word; width:200px;">Respond Findings</th>
			<?php }else{ ?>
			<th style="word-wrap:break-word; width:200px;">Summary</th>
			<?php } ?>
			<th>Type of Work</th>
			<th>Status</th>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<th>Respond Date</th>
			<?php }else{ ?>
			<th>Completion Date</th>
			<?php } ?>
		</tr>
<?php } ?>	
		<tr <?= $row->V_request_status == 'BO' ? 'style="font-weight:bold;"' : '' ?>>
				<td><?=$num++?></td>
			<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : ""?></td>
			<td><?=isset($row->V_Request_no) ? $row->V_Request_no : ""?></td>
			<td><?=isset($row->V_User_dept_code) ? $row->V_User_dept_code : ""?></td>
			<td><?=isset($row->V_Asset_no) ? $row->V_Asset_no.'<br>'.$row->V_Tag_no : ""?></td>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->v_ActionTaken) ? $row->v_ActionTaken : ""?></td>
			<?php }else{ ?>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->V_summary) ? $row->V_summary : ""?></td>
			<?php } ?>
			<td><?=isset($row->V_priority_code) ? $row->V_priority_code : ""?></td>
			<td><?=isset($row->V_request_status) ? $row->V_request_status : ""?></td>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : ""?></td>
			<?php }else{ ?>
			<td><?=isset($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : ""?></td>
			<?php } ?>
		</tr>
<?php $num++ ?>
<?php if (($num-1)%15==0 OR ($num-1) == count($record)) { ?>
	</table>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">REQUESTS STATUS REPORT - <br><i>Computer Generated - CAMSIS</i></td>
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
		<td width="200" align="right">
			<span class="ReportCenter"></span>Print Date : <?= date("d/m/Y")?> </td>
	</tr>
</table>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>REQUESTS STATUS REPORT - <?=$status?></td>
			<td align="right"><?=$startdate?> - <?=$enddate?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr >
			<th>No</th>
			<th>Request Date</th>
			<th>Request Number</th>
			<th>User Dept</th>
			<th>Asset Number / Tag Number</th>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<th style="word-wrap:break-word; width:200px;">Respond Findings</th>
			<?php }else{ ?>
			<th style="word-wrap:break-word; width:200px;">Summary</th>
			<?php } ?>
			<th>Type of Work</th>
			<th>Status</th>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<th>Respond Date</th>
			<?php }else{ ?>
			<th>Completion Date</th>
			<?php } ?>
		</tr>
		<?php if ($record){ ?>
		<?php $num = 1;foreach($record as $row): ?>
		<tr <?= $row->V_request_status == 'BO' ? 'style="font-weight:bold;"' : '' ?>>
			<td><?=$num++?></td>
			<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : ""?></td>
			<td><?=isset($row->V_Request_no) ? $row->V_Request_no : ""?></td>
			<td><?=isset($row->V_User_dept_code) ? $row->V_User_dept_code : ""?></td>
			<td><?=isset($row->V_Asset_no) ? $row->V_Asset_no.'<br>'.$row->V_Tag_no : ""?></td>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->v_ActionTaken) ? $row->v_ActionTaken : ""?></td>
			<?php }else{ ?>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->V_summary) ? $row->V_summary : ""?></td>
			<?php } ?>
			<td><?=isset($row->V_priority_code) ? $row->V_priority_code : ""?></td>
			<td><?=isset($row->V_request_status) ? $row->V_request_status : ""?></td>
			<?php if($status == 'INCOMPLETE REQUESTS'){?>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : ""?></td>
			<?php }else{ ?>
			<td><?=isset($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : ""?></td>
			<?php } ?>
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
			<td width="50%">REQUESTS STATUS REPORT - <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>