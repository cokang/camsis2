<div id="Instruction" class="pr-printer">
    <div class="header-pr">Work Order Listing Scheduled</div>
    <button onclick="javascript:myFunction('report_print_ppmms?none=closed&n_month=<?=$month?>&n_year=<?=$year?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report_ppmms';">CANCEL</button>
</div>

<style>
table.tftable {word-wrap:break-word;table-layout: fixed;}
table.tftable tr td{width: 40px; word-wrap:break-all;  overflow:hidden; overflow-wrap: break-word;text-overflow:ellipsis; width: 200px; height: 50px}
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
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>PPM Monthly Summary FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th rowspan=2>No</th>
			<th rowspan=2>Due Date</th>
			<th rowspan=2>PPM Work Order</th>
			<th rowspan=2>Asset Number</th>
			<th rowspan=2>Tag Number</th>				
			<th rowspan=2>Equipment Name</th>
			<th rowspan=2>UDP</th>
			<th rowspan=2>Freq</th>
			<th rowspan=2>Status</th>
			<th colspan=2>Test</th>
			<th rowspan=2>Completion Date</th>
			<th style="width:100px; word-wrap:break-word;" rowspan=2>Remark</th>
		</tr>
		<tr>
			<th>S</th>
			<th>P</th>
		</tr>
<?php } ?>	
		<?php if ($row->v_Wrkordstatus <> 'C' AND $row->v_Wrkordstatus <> 'CR'){
			  	$style = 'red';
			  }
			  else{
			  	$style = '';
			  }
		?>
		<tr class="ui-color-color-color">
			<td style="color:<?=$style?>;"><?=$num?></td>
			<td style="color:<?=$style?>;"><?=isset($row->d_DueDt) ? date("d-m-Y",strtotime($row->d_DueDt)) : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_Asset_no) ? $row->v_Asset_no : ''?></td>				
			<td style="color:<?=$style?>;"><?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->V_Asset_name) ? $row->V_Asset_name : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_jobtype) ? $row->v_jobtype : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_stest) ? ($row->v_stest == 'Done' ? 'Y' : 'N') : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_ptest) ? ($row->v_ptest == 'Done' ? 'Y' : 'N') : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
			<td style="color:<?=$style?>;" ><?=isset($row->v_Remarks) ? $row->v_Remarks : ''?></td>
		</tr>
<?php $num++ ?>
<?php if (($num-1)%15==0 OR ($num-1) == count($record)) { ?>
	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Work Order - Scheduled - <br><!--<i>Computer Generated - APBESys</i>--></td>
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
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>PPM Monthly Summary FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th rowspan=2>No</th>
			<th rowspan=2>Due Date</th>
			<th rowspan=2>PPM Work Order</th>
			<th rowspan=2>Asset Number</th>
			<th rowspan=2>Tag Number</th>				
			<th rowspan=2>Equipment Name</th>
			<th rowspan=2>UDP</th>
			<th rowspan=2>Freq</th>
			<th rowspan=2>Status</th>
			<th colspan=2>Test</th>
			<th rowspan=2>Completion Date</th>
			<th style="word-wrap:break-word; width:200px;" rowspan=2>Remark</th>
		</tr>
		<tr>
			<th>S</th>
			<th>P</th>
		</tr>
		<?php if ($record){ ?>
		<?php $num = 1;foreach($record as $row): ?>
		<?php if ($row->v_Wrkordstatus <> 'C' AND $row->v_Wrkordstatus <> 'CR'){
			  	$style = 'red';
			  }
			  else{
			  	$style = '';
			  }
		?>
		<tr class="ui-color-color-color">
			<td style="color:<?=$style?>;"><?=$num++?></td>
			<td style="color:<?=$style?>;"><?=isset($row->d_DueDt) ? date("d-m-Y",strtotime($row->d_DueDt)) : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_Asset_no) ? $row->v_Asset_no : ''?></td>				
			<td style="color:<?=$style?>;"><?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->V_Asset_name) ? $row->V_Asset_name : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_jobtype) ? $row->v_jobtype : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_stest) ? ($row->v_stest == 'Done' ? 'Y' : 'N') : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_ptest) ? ($row->v_ptest == 'Done' ? 'Y' : 'N') : ''?></td>
			<td style="color:<?=$style?>;"><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
			<td style="word-wrap:break-word; width:200px; color:<?=$style?>;"><?=isset($row->v_Remarks) ? $row->v_Remarks : ''?></td>
		</tr>
		<?php endforeach; ?>
		<?php } else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td colspan="20"><span style="color:red;">NO RECORDS FOUND.</span></td>
		</tr>
		<?php } ?>
	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Work Order - Scheduled - <br><!--<i>Computer Generated - APBESys</i>--></td>
			<td width="50%" align="right"></td>
		</tr>

	</table>
</div>
</div>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php }
