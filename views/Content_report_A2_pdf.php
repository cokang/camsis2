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
			<td colspan="5"><h3>A2 LISTING - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;width:100%; font-size:7px;" cellpadding="5" cellspacing="0">
		<tr>
			<th rowspan="2" style="width:19px;">No</th>
			<th rowspan="2">A2 Scheduled Date</th>
			<th rowspan="2">A2 Work Order</th>
			<th rowspan="2">Asset No</th>	
			<th rowspan="2" style="width:8%;">Equipment Name</th>
			<th rowspan="2">UDP</th>
			<th rowspan="2">Freq</th>
			<th rowspan="2">Status</th>
			<th colspan="2">Test</th>
			<th rowspan="2">Completion Date</th>
			<th rowspan="2">Remark</th>
			<th rowspan="2">Visit Date</th>
			<th rowspan="2">Reschedule Date</th>
			<th rowspan="2">Deparment (Location Code)</th>
			<th rowspan="2">Asset Group</th>
		</tr>
		<tr>
			<th>S</th>
			<th>P</th>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
        </tr>
	</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>