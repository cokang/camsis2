<div id="Instruction" class="pr-printer">
    <div class="header-pr">COMPLAINTS STATUS REPORT </div>
    <button onclick="javascript:myFunction('print_r_csr?none=closed&sdate=<?=date("Y-m-d",strtotime($daterange[0]))?>&edate=<?=date("Y-m-d",strtotime($daterange[1]))?>&stat=<?=$wostat?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report_csr';">CANCEL</button>
    <!--<button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>-->
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
			<span class="ReportCenter">Site: Alor Gajah</span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>COMPLAINTS STATUS REPORT - <?=$status?> </td>
			<td align="right"><?=$startdate?> - <?=$enddate?></td>
		</tr>
	</table>
</div>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr>	
			<th>No</th>
			<th>Complaint<br>Date</th>
			<th>Complaint<br>Number</th>
			<th style="width:100px; word-wrap:break-word;">Complaint</th>
			<th>User Dept<br>Code</th>
			<th>Source</th>
			<th>Request<br>Number</th>
			<th>Completion<br>Date</th>
		</tr>
<?php } ?>	
		<tr <?= $row->v_ComplaintStatus <> 'C' ? 'style="font-weight:bold;"' : '' ?>>
			<td align="center"><b><?=$num?></b></td>
			<td><?=isset($row->d_ComplaintDt) ? date("d-m-Y",strtotime($row->d_ComplaintDt)) : ''?></td>
			<td><?=isset($row->v_ComplaintNo) ? $row->v_ComplaintNo : ''?></td>
			<td style="width:100px; height:40px; text-overflow: ellipsis;  display: block; overflow: hidden; border-right:none;border-left:none;"><?=isset($row->v_Complaint) ? $row->v_Complaint : ''?></td>
			<td><?=isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : ''?></td>
			<td><?=isset($row->v_Source) ? $row->v_Source : ''?></td>
			<td><?=isset($row->v_RequestNo) ? $row->v_RequestNo : ''?></td>
			<td><?=isset($row->d_CompleteDt) ? date("d-m-Y",strtotime($row->d_CompleteDt)) : ''?></td>
		</tr>
<?php $num++ ?>
<?php if (($num-1)%15==0 OR ($num-1) == count($record)) { ?>
	</table>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">COMPLAINTS STATUS REPORT <br><i>Computer Generated - APBESys</i></td>
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
			<span class="ReportCenter">Site: Alor Gajah</span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>COMPLAINTS STATUS REPORT - <?=$status?> </td>
			<td align="right"><?=$startdate?> - <?=$enddate?></td>
		</tr>
	</table>
</div>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr>	
			<th>No</th>
			<th>Complaint<br>Date</th>
			<th>Complaint<br>Number</th>
			<th style="word-wrap:break-word; width:200px;">Complaint</th>
			<th>User Dept<br>Code</th>
			<th>Source</th>
			<th>Request<br>Number</th>
			<th>Completion<br>Date</th>
		</tr>
		<?php if ($record){ ?>
		<?php $num = 1;foreach($record as $row): ?>
		<tr <?= $row->v_ComplaintStatus <> 'C' ? 'style="font-weight:bold;"' : '' ?>>
			<td align="center"><b><?=$num++?></b></td>
			<td><?=isset($row->d_ComplaintDt) ? date("d-m-Y",strtotime($row->d_ComplaintDt)) : ''?></td>
			<td><?=isset($row->v_ComplaintNo) ? $row->v_ComplaintNo : ''?></td>
			<td style="word-wrap:break-word; width:200px;"><?=isset($row->v_Complaint) ? $row->v_Complaint : ''?></td>
			<td><?=isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : ''?></td>
			<td><?=isset($row->v_Source) ? $row->v_Source : ''?></td>
			<td><?=isset($row->v_RequestNo) ? $row->v_RequestNo : ''?></td>
			<td><?=isset($row->d_CompleteDt) ? date("d-m-Y",strtotime($row->d_CompleteDt)) : ''?></td>
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
			<td width="50%">COMPLAINTS STATUS REPORT <br><i>Computer Generated - APBESys</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>