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
			<td colspan="5"><h3>MONTHLY WORK ORDER - TIME RESPONDED <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;font-size:7px;" cellpadding="5" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Date Req</th>
			<th>Time Req</th>
			<th>Request No</th>
			<th>Asset No</th>				
			<th>Request Summary</th>
			<th>UDP</th>
			<th>Requestor<br>Name</th>
			<th>Priority<br>Code</th>
			<th>Respond<br>Date</th>
			<th>Respond<br>Time</th>
			<th>Duration&nbsp;of<br>Respond&nbsp;Time</th>
			<th>Assets Group</th>
		</tr>
		<?php  if (!empty($record)) {?>
		<?php $numrow = 1; foreach($record as $row):?>
		<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    	<td><?= $numrow ?></td>
			<td><?= ($row->d_date) ? date("d/m/Y",strtotime($row->d_date)) : 'N/A' ?></td>
			<td><?= ($row->d_time) ? $row->d_time : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'excel'){ ?>
			<td><span style="color:#0000FF;"><?=($row->v_request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->v_request_no.'&assetno='.$row->v_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->v_request_no.'' ) : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?=($row->v_asset_no) && $row->v_asset_no != 'N/A' ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->v_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->V_Tag_no.'' ) : 'N/A' ?></span></td>
			<?php }else{ ?>
			<td> <?=isset($row->v_request_no) ? $row->v_request_no : ''?></td>
			<td> <?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
			<?php } ?>
			<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
			<td><?= ($row->v_user_dept_code) ? $row->v_user_dept_code : 'N/A' ?></td>
			<td><?= ($row->v_requestor) ? $row->v_requestor : 'N/A' ?></td>
			<td><?= ($row->v_priority_code) ? $row->v_priority_code : 'N/A' ?></td>
			<td><?= ($row->v_respondate) ? date("d/m/Y",strtotime($row->v_respondate)) : 'N/A' ?></td>
			<td><?= ($row->v_respontime) ? $row->v_respontime : 'N/A' ?></td>
			<td><?= ($row->mint) ? floor($row->mint / 60). 'hr '.($row->mint % 60).' mins' : '0 mins' ?> </td>
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