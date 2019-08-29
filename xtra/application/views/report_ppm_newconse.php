<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="PPM New Concession (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}


if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">PPM New Concession</div>
		<button onclick="javascript:myFunction('ppm_newconse?m=<?=$month?>&y=<?=$year?>&status=<?php echo $this->input->get('status');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/ppm_newconse?m=<?=$month?>&y=<?=$year?>&none=close&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
		<a href="<?php echo base_url();?>index.php/contentcontroller/ppm_newconse?m=<?=$month?>&y=<?=$year?>&pdf=1&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>


<div class="menu" style="position:relative;">
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>
		<div id="Instruction" >
			<center>Filter record - PPM Status : 
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
					$ppm_status = array(
						'' => 'All',
						'C' => 'Complete',
						'BO' => 'Outstanding',			
					);
					echo form_dropdown('ppmstatus', $ppm_status, set_value('ppm_status', isset($status) ? $status : ''), 'style="width: 90px;" id="ppmstatus"');
					echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"');

					for ($dyear = '2015';$dyear <= date("Y");$dyear++){
						$year_list[$dyear] = $dyear;
					}

					echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"');
					?>
					<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
					<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
					<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">		
					<input type="submit" value="Generate" onchange="javascript: submit()"/></center>
				</form>
			</center>
		</div>
	<?php } ?>
	<div class="m-div">
		<table class="rport-header">
			<tr>
				<td colspan="5">
					PPM SUMMARY - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
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
					<th>Work Order No</th>
					<th>Asset No</th>
					<th>Cost</th>
					<th>Asset Name</th>	
					<th>User Dept Code</th>	
					<th>Location Code</th>					
					<th>Manufacturer</th>					
					<th>Model No</th>
					<th>Serial No</th>
					<th>Brandname</th>
					<th>Make</th>
					<th>Month</th>
					<th>Hospitalcode</th>
					<th>Due Date</th>
					<th>Workorder Status</th>
					<th>Job Type</th>
					<th>Year</th>
					<th>Aging</th>
					<th>Year</th>
					<th>Reschedule Date</th>
					<th>Reschedule Summary</th>
					<th>Summary</th>
					<th>Date Done</th>
					<th>Time</th>
					<th>Warranty Status</th>
					<th>Performance Test</th>
					<th>Safety Test</th>
					<th>Claim Status</th>
				</tr>

				<?php 
				if(!empty($records)){
					$no=1;
					foreach($records as $row):?>
				<tr>
					<td><?=$no;?></td>
					<td><?=$row->kondisi;?></td>
					<td><?=$row->condition_desc;?></td>
					<td><?=$row->variation;?></td>
					<td><?=($row->variation_status) ? $row->variation_status : "N/A";?></td>
					<td><?=($row->status) ? $row->status : "N/A";?></td>
					<td><?=$row->status_desc;?></td>
					<td><?=($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : "N/A";?></td>
					<td><?=($row->v_Asset_no) ? $row->v_Asset_no : "N/A";?></td>
					<td><?=($row->N_Cost) ? $row->N_Cost : "N/A";?></td>
					<td><?=$row->V_Asset_name;?></td>
					<td><?=$row->V_User_Dept_code;?></td>
					<td><?=($row->V_Location_code) ? $row->V_Location_code : "N/A";?></td>
					<td><?=$row->V_Manufacturer;?></td>
					<td><?=($row->V_Model_no) ? $row->V_Model_no : "N/A";?></td>
					<td><?=($row->V_Serial_no) ? $row->V_Serial_no : "N/A";?></td>
					<td><?=$row->V_Brandname;?></td>
					<td><?=($row->V_Make) ? $row->V_Make : "N/A";?></td>
					<td><?=($row->v_Month) ? $row->v_Month : "N/A";?></td>
					<td><?=$row->v_HospitalCode;?></td>
					<td><?=($row->d_DueDt) ? $row->d_DueDt : "N/A";?></td>
					<td><?=($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : "N/A";?></td>
					<td><?=$row->v_jobtype;?></td>
					<td><?=($row->v_year) ? $row->v_year : "N/A";?></td>
					<td><?=($row->Aging) ? $row->Aging : "N/A";?></td>
					<td><?=($row->Year) ? $row->Year : "N/A";?></td>
					<td><?=($row->reschdate) ? $row->reschdate : "N/A";?></td>
					<td><?=$row->reschsummary;?></td>
					<td><?=$row->v_summary;?></td>
					<td><?=($row->d_DateDone) ? $row->d_DateDone : "N/A";?></td>
					<td><?=($row->v_time) ? $row->v_time : "N/A";?></td>
					<td><?=$row->warranty_status;?></td>
					<td><?=($row->v_ptest) ? $row->v_ptest : "N/A";?></td>
					<td><?=($row->v_stest) ? $row->v_stest : "N/A";?></td>
					<td><?=( ($row->vvfAuthorizedStatus == 0) ? "Unclaim" : ($row->vvfAuthorizedStatus == 1) ? "Claim" : "N/A" );?></th>
				</tr>
				<?php 
					$no++;endforeach;
				}else{
				?>
		
				<tr>
					<td colspan="35" ><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>

	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<table width="99%" border="0">
			<tr>
				<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
			</tr>
			<tr>
				<td width="50%"> PPM New Concession - Scheduled - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><!--<i>Computer Generated - APBESys</i>--></td>
				<td width="50%" align="right"></td>
			</tr>

		</table>
	<?php } ?>

	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_footerprint.php';?>
	<?php } ?>


