<?php
if ($this->input->get('ex') == 'excel'){
$filename ="RCM UNDER WARRANTY - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">RCM UNDER WARRANTY</div>
    <button onclick="javascript:myFunction('report_rcmuw?m=<?=$month?>&y=<?=$year?>&none=closed&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y').'&grp='.$this->input->get('grp');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_rcmuw?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="2">RCM UNDER WARRANTY - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No.</th>
			<th>Hospital State</th>
			<th>Hospital Code</th>
			<th>Asset No.</th>
			<th>Asset Desc.</th>
			<th>Model</th>
			<th>Dept.</th>
			<th>Request No.</th>
			<th>Request Summary</th>
			<th>Request Type</th>
			<th>Warranty End Date</th>
			<th>Warranty End Month</th>
			<th>Start Date</th>
			<th>Start Month</th>
			<th>Status</th>
			<th>Closed Date</th>
		</tr>
		<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<td>223</td>
			<td><?= ($row->V_hospitalcode) ? $row->V_hospitalcode : 'N/A' ?></td>
			<td><?= ($row->V_Asset_no) ? $row->V_Asset_no : 'N/A' ?></td>
			<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
			<td><?= ($row->V_Model_no) ? $row->V_Model_no : 'N/A' ?></td>
			<td><?= ($row->V_User_Dept_code) ? $row->V_User_Dept_code : 'N/A' ?></td>
			<td><?= ($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?></td>
			<td><?= ($row->V_summary) ? $row->V_summary : 'N/A' ?></td>
			<td><?= ($row->V_request_type) ? $row->V_request_type : 'N/A' ?></td>
			<td><?= ($row->V_Wrn_end_code) ? date("d/m/Y",strtotime($row->V_Wrn_end_code)) : 'N/A' ?></td>
			<td><?= ($row->V_Wrn_end_code) ? date("m",strtotime($row->V_Wrn_end_code)) : 'N/A' ?></td>
			<td><?= ($row->D_date) ? date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= ($row->D_date) ? date("m",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<td><?= ($row->v_closeddate) ? $row->v_closeddate : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="19"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>

		

	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">RCM UNDER WARRANTY <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<?php } ?>
