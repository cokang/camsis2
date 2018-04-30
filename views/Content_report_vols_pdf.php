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
			<td colspan="5"><h3>PPM LISTING - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;width:100%; font-size:7px;" cellpadding="5" cellspacing="0">
		<tr>
			<th rowspan="2" style="width:19px;">No</th>
			<th rowspan="2">PPM Scheduled Date</th>
			<th rowspan="2">PPM Work Order</th>
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
			<td><?= ($row->d_DateDone) ? $row->d_DateDone : 'N/A' ?></td>
			<!--<td></td>-->
			<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
			<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
			<td><?= ($row->d_Reschdt) ? date("d/m/Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
			<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
			<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
		</tr>	
	<?php $numrow++; ?>
	<?php endforeach;?>
	<?php foreach($recordrq as $row):?>
	<?php $numrowx = $numrow;?>
	<?php echo ($numrowx%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    		<td><?= $numrowx ?></td>
			<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			
			<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>			
			<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
			<td><?= ($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A' ?></td>
			<td><?= 'N/A' ?></td>
			<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<td><?= 'N/A' ?></td>
			<td><?= 'N/A' ?></td>
			
			
			<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
			<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
			<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
			<td><?= 'N/A' ?></td>
			
			<td><?= ($row->v_UserDeptDesc) ? $row->v_location_name.' ('.$row->v_location_code.')' : 'N/A' ?></td>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
			<?php } else { ?>
			<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			<?php } ?>
  
	        			</tr>
								<?php $numrowx++; ?>
	<?php endforeach;?>

	</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>