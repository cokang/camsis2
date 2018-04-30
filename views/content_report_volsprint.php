<?php $numrow = 1; foreach($record as $row):?>
<?php if ($numrow==1 OR $numrow%12==1) { ?>
<div class="menu" style="position:relative;">
	<?php include 'content_headprint.php';?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="5">PPM LISTING - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th rowspan=2>No</th>
			<th rowspan=2 style="width:7%;">PPM Scheduled Date</th>
			<th rowspan=2 style="width:12%;">PPM Work Order</th>
			<th rowspan=2 style="width:5%;">Asset No</th>	
			<th rowspan=2 style="width:30%;">Equipment Name</th>
			<th rowspan=2>UDP</th>
			<th rowspan=2>Freq</th>
			<th rowspan=2>Status</th>
			<th colspan=2>Test</th>
			<th rowspan=2 style="width:7%;">Completion Date</th>
			<th rowspan=2 style="width:17%;">Remark</th>
			<th rowspan=2 style="width:7%;">Visit Date</th>
			<th rowspan=2 style="width:7%;">Reschedule Date</th>
			<th rowspan=2 style="width:12%;">Deparment (Location Code)</th>
			<th rowspan=2>Asset Group</th>
		</tr>
		<tr>
			<th>S</th>
			<th>P</th>
		</tr>	
		<?php } ?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
				<td><?= $numrow ?></td>
				<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
				<td> <?=isset($row->sv_wrkordno) ? $row->sv_wrkordno : ''?></td>
				<td> <?=isset($row->av_tag_no) ? $row->av_tag_no : ''?></td>
				<td><?= ($row->av_asset_name) ? $row->av_asset_name : 'N/A' ?></td>
				<td ><?= ($row->av_user_dept_code) ? $row->av_user_dept_code : 'N/A' ?></td>
				<td><?= ($row->sv_jobtype) ? $row->sv_jobtype : 'N/A' ?></td>
				<td><?= ($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : 'N/A' ?></td>
				<td><?= ($row->v_stest) ? $row->v_stest : 'N/A' ?></td>
				<td><?= ($row->v_ptest) ? $row->v_ptest : 'N/A' ?></td>
				<td><?= ($row->d_DateDone) ? date("d-m-Y",strtotime($row->d_DateDone)) : 'N/A' ?></td>
				<!--<td></td>-->
				<td style="height: 52px;">
				<?php if (($row->v_summary) ? $row->v_summary : 'N/A' != "N/A"){ ?>
				<div style="overflow: hidden; text-overflow: ellipsis; height: 42px; overflow: hidden; text-overflow: ellipsis;">
				<?php }?>
				<?= ($row->v_summary) ? $row->v_summary : 'N/A' ?>
				<?php if (($row->v_summary) ? $row->v_summary : 'N/A' != "N/A"){ ?>
				</div>
				<?php }?>
				</td>
				<td><?= ($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : 'N/A' ?></td>
				<td><?= ($row->d_Reschdt) ? date("d-m-Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
				<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
				<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			</tr>	
		<?php $numrow++; ?>
		<?php //if (($numrow-1)%13==0) {
				if ((($numrow-1)%12==0) || (($numrow-1)== count($record))) {
		?>	
	</table>
</div>
<table width="99%" border="0">
	<tr>
		<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
	</tr>
	<tr>
		<td width="50%">PPM LISTING - Scheduled - <?= date("F-Y")?><br><i>Computer Generated - CAMSIS</i><!--<i>Computer Generated - APBESys</i>--></td>
		<td width="50%" align="right"></td>
	</tr>
</table>
<?php include 'content_footerprint.php';?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
</div>
<?php } ?>
<?php endforeach;?>
</div>