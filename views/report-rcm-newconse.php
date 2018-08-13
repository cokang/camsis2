<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">RCM New Concession</div>
		<button onclick="javascript:myFunction('rcm_newconse?m=<?=$month?>&y=<?=$year?>&rcmlist=<?=$this->input->get('rcmlist')?>');" class="btn-button btn-primary-button">PRINT</button>
    	<!--<button onclick="javascript:myFunction('report_vols?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>-->
    	<!--<button onclick="javascript:myFunction('report_vols?m=12&y=2016&stat=fbfb&resch=nt&grp=');" class="btn-button btn-primary-button">PRINT</button>-->
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?m=<?=$month?>&y=<?=$year?>&none=close&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?m=<?=$month?>&y=<?=$year?>&pdf=1&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>


	<div class="menu" style="position:relative;">
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>
		<div id="Instruction" >
			<center>Filter record - RCM Status : 
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
					<?php 
					$rcm_list = array(
						'' => 'All',
						'C' => 'Complete',
						'BO' => 'Outstanding',			
					);
					?>
					<?php echo form_dropdown('rcmlist', $rcm_list,set_value('rcmlist', !is_null($this->input->get('rcmlist')) ? $this->input->get('rcmlist') : $rcm_list),'style="width: 90px;" id="rcmlist"'); ?>
					<?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"'); ?>
		
					<?php 
						for ($dyear = '2015';$dyear <= date("Y");$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
			<!--		<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
					<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
					<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">-->		
					<input type="submit" value="Generate" onchange="javascript: submit()"/></center>
				</form>
			</center>
		</div>
	<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5">
						RCM SUMMARY - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
					</td>
				</tr>
			</table>
			<div style="overflow-x:auto;">
			<table class="tftable" border="1" style="text-align:center;">
				<tr>
					<th>No</th>
					<th>Condition</th>
					<th>Condition Desc</th>
					<th>Variation</th>						
					<th>Variation Status</th>
					<th>Status</th>
					<th>Status Desc</th>
					<th>Request No</th>
					<th>Asset No</th>
					<th>Asset Name</th>
					<th>Cost</th>
					<th>Manufacturer</th>
					<th>Model No</th>
					<th>Serial No</th>
					<th>Brandname</th>
					<th>Make</th>
					<th>Date</th>
					<th>Time</th>
					<th>Requestor</th>
					<th>User Dept Code</th>
					<th>Details</th>
					<th>Priority Code</th>
					<th>Request Type</th>
					<th>Request Status</th>
					<th>Hospitalcode</th>
					<th>Respond Date</th>
					<th>Time</th>
					<th>E time</th>
					<th>Close Date</th>
					<th>Moh Desg</th>
					<th>Aging</th>
					<th>Year</th>
					<th>Response Minute</th>
					<th>Warranty Status</th>
					<th>Wrn End Code</th>
					<th>Closed Summary</th>
					<th>Commission</th>
					<th>Performance Test</th>
					<th>Safety Test</th>
					<th>Claim Status</th>
				
					
				</tr>
		<?php  if (empty($rcmnewconse)) {?>
				<tr>
					<td colspan="40" ><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
				<?php } else { ?>
				<?php $numrow = 1; foreach($rcmnewconse as $row):?>
				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    			<td><?= $numrow ?></td>
				<td><?= ($row->cndition) ?  $row->cndition : 'N/A' ?></td>
					<td><?= ($row->condition_desc) ?  $row->condition_desc : 'N/A' ?></td>
					<td><?= ($row->variation) ?  $row->variation : 'N/A' ?></td>						
					<td><?= ($row->variation_status) ?  $row->variation_status : 'N/A' ?></td>
					<td><?= ($row->status) ?  $row->status : 'N/A' ?></td>
					<td><?= ($row->status_desc) ?  $row->status_desc : 'N/A' ?></td>
					<td><?= ($row->V_Request_no) ?  $row->V_Request_no : 'N/A' ?></td>
					<td><?= ($row->V_Asset_no) ?  $row->V_Asset_no : 'N/A' ?></td>
					<td><?= ($row->V_Asset_name) ?  $row->V_Asset_name : 'N/A' ?></td>
					<td><?= ($row->N_Cost) ?  $row->N_Cost : 'N/A' ?></td>
					<td><?= ($row->V_Manufacturer) ?  $row->V_Manufacturer : 'N/A' ?></td>
					<td><?= ($row->V_Model_no) ?  $row->V_Model_no : 'N/A' ?></td>
					<td><?= ($row->V_Serial_no) ?  $row->V_Serial_no : 'N/A' ?></td>
					<td><?= ($row->V_Brandname) ?  $row->V_Brandname : 'N/A' ?></td>
					<td><?= ($row->V_Make) ?  $row->V_Make : 'N/A' ?></td>
					<td><?= ($row->D_date) ? date("d/m/Y",strtotime($row->D_date))  : 'N/A' ?></td>
					<td><?= ($row->D_time) ?  date("h:i",strtotime($row->D_time)) : 'N/A' ?></td>
					<td><?= ($row->V_requestor) ?  $row->V_requestor : 'N/A' ?></td>
					<td><?= ($row->V_User_dept_code) ?  $row->V_User_dept_code : 'N/A' ?></td>
					<td><?= ($row->V_details) ?  $row->V_details : 'N/A' ?></td>
					<td><?= ($row->V_priority_code) ?  $row->V_priority_code : 'N/A' ?></td>
					<td><?= ($row->V_request_type) ?  $row->V_request_type : 'N/A' ?></td>
					<td><?= ($row->V_request_status) ?  $row->V_request_status : 'N/A' ?></td>
					<td><?= ($row->V_hospitalcode) ?  $row->V_hospitalcode : 'N/A' ?></td>
					<td><?= ($row->respoddate) ?  date("d/m/Y",strtotime($row->respoddate)) : 'N/A' ?></td>
					<td><?= ($row->v_Time) ?  $row->v_Time : 'N/A' ?></td>
					<td><?= ($row->v_Etime) ?  $row->v_Etime : 'N/A' ?></td>
					<td><?= ($row->v_closeddate) ?  date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
					<td><?= ($row->V_MohDesg) ?  $row->V_MohDesg : 'N/A' ?></td>
					<td><?= ($row->Aging) ?  $row->Aging : 'N/A' ?></td>
					<td><?= ($row->year) ?  $row->year : 'N/A' ?></td>
					<td><?= ($row->responseMinute) ?  $row->responseMinute : 'N/A' ?></td>
					<td><?= ($row->warranty_status) ?  $row->warranty_status : 'N/A' ?></td>
					<td><?= ($row->V_Wrn_end_code) ?  $row->V_Wrn_end_code : 'N/A' ?></td>
					<td><?= ($row->closedsummary) ?  $row->closedsummary : 'N/A' ?></td>
					<td><?= ($row->D_commission) ?  $row->D_commission : 'N/A' ?></td>
					<td><?= ($row->v_ptest) ?  $row->v_ptest : 'N/A' ?></td>
					<td><?= ($row->v_stest) ?  $row->v_stest : 'N/A' ?></td>
					<td><?= ($row->vvfAuthorizedStatus == 1) ?  'Claimed' : 'UnClaimed' ?></td>

			</tr>
			<?php $numrow++; ?>
			<?php endforeach;?>

				<?php }?>
			</table>
</div>
		</div>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<table width="99%" border="0">
			<tr>
				<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
			</tr>
			<tr>
				<td width="50%"> RCM New Concession - Unscheduled - <?= date("F-Y")?><br><!--<i>Computer Generated - APBESys</i>--></td>
				<td width="50%" align="right"></td>
			</tr>

		</table>
	<?php } ?>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_footerprint.php';?>
	<?php } ?>
<?php if ( $this->input->get('xxx') == 'export' ) { ?>

	

<?php }?>
	

			</div>



