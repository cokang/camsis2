<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Work Order Listing Unscheduled ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Incidences Report Listing</div>
    <button onclick="javascript:myFunction('report_Incidences_Listing?m=<?=$month?>&y=<?=$year?>&none=closed&ex=<?=$this->input->get('none');?>&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_Incidences_Listing?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&ex=excel&none=close&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_Incidences_Listing?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&pdf=1&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">
		<?php 
			$month_list = array(
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		 );
		?>
		<?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"'); ?>
		
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">				
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="4" valign="top">Incidences Report Listing - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Date </th>
			<th>Time </th>
			<th>Incidence No</th>
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
			<td><?= anchor('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'), ($row->V_Request_no) ? $row->V_Request_no : 'N/A' ) ?></td>
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
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Request Status Report<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</div>
</div>

