<?php include 'pdf_head.php'?>
	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
		<table class="rport-header">
			<tr>
				<td colspan="4" valign="top"><h3>Incidences Report Listing - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
			</tr>
		</table>
		<table class="tftable" border="1" style="text-align:center;font-size:7px;" cellpadding="5" cellspacing="0">
			<tr>
				<th style="width:19px;">No</th>
				<th>Date </th>
				<th>Time </th>
				<th style="width:90px;">Incidence No</th>
				<th>Request Summary</th>
				<th>UDP</th>
				<th>Requestor<br>Name</th>
				<th>Status</th>
				<th>Completion<br>Date</th>
				<th>Completion<br>Time</th>
				<th>Closed<br>By</th>
				<th>Duration<br>of Incidence (Days)</th>
				<th>Actual Work Done</th>
				<th>Asset Group</th>
			</tr>
			<?php  if (!empty($record)) {?>
			<?php $numrow = 1; foreach($record as $row):?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
				<td><?= $numrow ?></td>
				<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
				<td><?= ($row->D_time) ? $row->D_time : 'N/A' ?></td>
				<td><?= ($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?></td>
				<td><?= ($row->ReqSummary) ? $row->ReqSummary : 'N/A' ?></td>
				<td><?= ($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A' ?></td>
				<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
				<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
				<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
				<td><?= ($row->v_closedtime) ? $row->v_closedtime : 'N/A' ?></td>
				<td><?= ($row->closedby) ? $row->closedby : 'N/A' ?></td>
				<td><?= ($row->DiffDate) ? $row->DiffDate : 'N/A' ?></td>
				<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
				<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			</tr>	
			<?php $numrow++; ?>
			<?php endforeach;?>
			<?php }else { ?>
			<tr align="center" style="background:white; height:200px;">
				<td colspan="15"><span style="color:red;">NO RECORDS FOUND.</span></td>
			</tr>
			<?php } ?>
		</table>	
	</body>
</html>
<?php include 'pdf_footer.php'?>