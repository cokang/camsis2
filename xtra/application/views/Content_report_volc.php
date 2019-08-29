<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Complaint Listing - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer" color="white">
    <div class="header-pr">Complaint Number</div>
    <button onclick="javascript:myFunction('report_volc?m=<?=$month?>&y=<?=$year?>&stat=<?=$this->input->get('stat')?>&none=closed&ex=ex&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_volc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_volc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&pdf=1&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
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
			<td colspan="5">Complaint Listing - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
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

