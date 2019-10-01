<?php include 'pdf_head.php'?>
	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
	<table class="rport-header" >
		<tr>
		<td colspan="5"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - <?= ($this->input->get('y') <> 0) ? date('F', mktime(0, 0, 0, $month, 10)).' '.$year : '( '.date("d-m-Y", strtotime($from)).' To '.date("d-m-Y", strtotime($to)).' )'?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;width:100%; font-size:7px;" cellpadding="5" cellspacing="0">
		<tr>
			<th rowspan="2" style="width:19px;">No</th>
			<th rowspan="2"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Scheduled Date</th>
			<th rowspan="2"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Work Order</th>
			<th rowspan="2">Asset No</th>
			<th rowspan="2" style="width:8%;">Equipment Name</th>
			<th rowspan="2">UDP</th>
			<th rowspan="2">Freq</th>
			<th rowspan="2">Status</th>
			<th colspan="2">Test</th>
			<th rowspan="2">Remark</th>
			<th rowspan="2">Visit Date</th>
			<th rowspan="2">Reschedule Date</th>
			<!--<th rowspan="2">Acceptance By</th>-->
			<th rowspan="2">Completion Date</th>
			<th rowspan="2">Deparment (Location Code)</th>
			<th rowspan="2">Asset Group</th>
		</tr>
		<tr>
			<th>S</th>
			<th>P</th>
		</tr>
		<?php $numrow = 1; foreach($record as $row):?>
		<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
			<td><?= $numrow ?></td>
			<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'excel'){ ?>
			<td><?=($row->sv_wrkordno) ? $row->sv_wrkordno : 'N/A' ?></td>
			<td><?=($row->sv_asset_no) && $row->sv_asset_no != 'N/A' ? $row->av_tag_no : 'N/A' ?></td>
			<?php }else{ ?>
			<td> <?=isset($row->sv_wrkordno) ? $row->sv_wrkordno : ''?></td>
			<td> <?=isset($row->av_tag_no) ? $row->av_tag_no : ''?></td>
			<?php } ?>
			<td><?= ($row->av_asset_name) ? $row->av_asset_name : 'N/A' ?></td>
			<td ><?= ($row->av_user_dept_code) ? $row->av_user_dept_code : 'N/A' ?></td>
			<td><?= ($row->sv_jobtype) ? $row->sv_jobtype : 'N/A' ?></td>
			<td><?= ($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : 'N/A' ?></td>
			<td><?= ($row->v_stest) ? $row->v_stest : 'N/A' ?></td>
			<td><?= ($row->v_ptest) ? $row->v_ptest : 'N/A' ?></td>
			<!--<td></td>-->
			<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
			<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
			<td><?= ($row->d_Reschdt) ? date("d/m/Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
			<!--<td><?= ($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>-->
			<td><?= ($row->d_DateDone) ? $row->d_DateDone : 'N/A' ?></td>
			<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
			<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
		</tr>
	<?php $numrow++; ?>
	<?php endforeach;?>


	</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>
