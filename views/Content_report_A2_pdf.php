<?php include 'pdf_head.php';?>
	<html>
	<head>
		<style>.rport-header{padding-bottom:10px;}</style>
	</head>
	<body>
		<table class="rport-header" >
			<tr>
				<td colspan="4" valign="top">A2 Work Order Report Listing- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - FACILITY ENGINEERING SERVICES ( A2 - Schedule Corrective Maintenance (SCM) )</td>
			</tr>
		</table>

		<table class="tftable" border="1" style="text-align:center;width:100%; font-size:7px;" cellpadding="5" cellspacing="0">
			<tr nobr="true">
				<th rowspan="2" style="width:19px;">No</th>
				<th rowspan="2">Work Order Date</th>
				<th rowspan="2" width="70">A2 Work Order</th>
				<th rowspan="2">Asset No</th>	
				<th rowspan="2" width="90">Equipment Name</th>
				<th rowspan="2" width="30">UDP</th>
				<th rowspan="2" width="30">Status</th>
				<th colspan="2" style="width:6%">Test</th>
				<th rowspan="2" style="width:6%;">Schedule Date</th>
				<th rowspan="2" width="79">Remark</th>
				<!--<th rowspan="2">Schedule Date</th>-->
				<th rowspan="2">Reschedule Date</th>
				<th rowspan="2">Complete Date</th>
				<th rowspan="2" width="80">Deparment (Location Code)</th>
				<th rowspan="2">Asset Group</th>
			</tr>
			<tr nobr="true">
				<th>S</th>				
				<th>P</th>
			</tr>

			<?php $numrow = 1; foreach($recordrq as $row):?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color" nobr="true">' : '<tr nobr="true">'; ?>
				<td><?= $numrow ?></td>
				<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
				<td><?=($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?></td>
				<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? $row->v_tag_no : 'N/A' ?></td>
				<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
				<td><?= ($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A' ?></td>
				<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
				<td><?= 'N/A' ?></td>				
				<td><?= 'N/A' ?></td>
				<td><?= ($row->schedule_d) ? date("d/m/Y",strtotime($row->schedule_d)) : 'N/A' ?></td>
				<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
				<!--<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>-->
				<td><?= 'N/A' ?></td>
				<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
				<td><?= ($row->v_UserDeptDesc) ? $row->v_location_name.' ('.$row->v_location_code.')' : 'N/A' ?></td>
				<?php if ($this->input->get('broughtfwd') != '') { ?>
				<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
				<?php } else { ?>
				<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
				<?php } ?>
			</tr>
			<?php $numrow++; ?>
			<?php endforeach;?>
		</table>

	</body>
</html>
<?php include 'pdf_footer.php';?>