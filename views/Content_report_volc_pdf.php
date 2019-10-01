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
			<td colspan="5"><h3>Complaint Listing - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;font-size:7px;" cellpadding="5" cellspacing="0">
		<tr>
			<th style="width:20px;">No</th>
			<th>Complaint Date</th>
			<th>Time Req</th>
			<th>Complaint No</th>				
			<th>Complaint Summary</th>
			<th>UDP</th>
			<th>Requestor Name</th>
			<th>Status</th>
			<th>Completion Date</th>
			<th>Asset Group</th>
		</tr>
		<?php  if (!empty($record)) {?>
		<?php $numrow = 1; foreach($record as $row):?>
	    <?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
    		<td><?= $numrow ?></td>
			<td><?= ($row->D_ComplaintDt) ? date("d/m/Y",strtotime($row->D_ComplaintDt)): 'N/A' ?></td>
			<td><?= ($row->D_ComplaintTime) ? $row->D_ComplaintTime : 'N/A' ?></td>
			<td><?= ($row->v_ComplaintNo) ? $row->v_ComplaintNo : 'N/A' ?></td>
			<td><?= ($row->v_ComplaintDesc) ? $row->v_ComplaintDesc : 'N/A' ?></td>
			<td><?= ($row->v_UserDeptCode) ? $row->v_UserDeptCode : 'N/A' ?></td>
			<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
			<td><?= ($row->v_ComplaintStatus) ? $row->v_ComplaintStatus : 'N/A' ?></td>
			<td><?= ($row->d_CompleteDt) ? ($row->d_CompleteDt != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->d_CompleteDt)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
		</tr>	
		<?php $numrow++; ?>
		<?php endforeach;?>
		<?php }else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td colspan="15"><span style="color:red;">NO COMPLAINT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
		</tr>
		<?php } ?>
	</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>