<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">Yearly Planner Assets Schedule Under Warranty</div>
		<button onclick="javascript:myFunction('report_a2?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
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
	<!--<div id="Instruction" >
			<center>Show list in : 
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
					<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
					<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">		
					<input type="submit" value="Generate" onchange="javascript: submit()"/></center>
				</form>
			</center>
		</div>-->
	<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5">
						PPM UNDER WARRANTY    - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
					</td>
				</tr>
			</table>

			<div style="overflow-x:auto;">

			<table  class="tftable" border="1" style="table-layout:fixed;text-align:center;">
				<tr>
		     <th width="5%">No.</th>
			<th>Hospital State</th>
			<th>Hospital Code</th>
			<th>Asset No.</th>
			<th>Asset Desc.</th>
			<th>Model</th>
			<th>Dept.</th>
			<th>Week Warranty End</th>
			<th>Warranty End Date</th>
			<th>Scheduled Week</th>
				</tr>
	<?php if(!empty($records)){?>
						<?php $no=1;foreach($records as $row):?>
					<tr>
					<td><?=$no;?></td>
					<td><?=$row->v_statename;?></td>
					<td><?=$row->V_Hospitalcode;?></td>
					<td><?=$row->V_Tag_no;?></td>
					<td><?=$row->V_Asset_name;?></td>
					<td><?=$row->V_Model_no;?></td>
					<td><?=$row->V_User_Dept_code;?></td>
					<td><?=$row->wrrntyweek;?></td>
					<td><?= ($row->V_Wrn_end_code) ?  date("d/m/Y",strtotime($row->V_Wrn_end_code)) : 'N/A' ?></td>
					<td width="12%"><?=$row->v_Weeksch;?></td>
						</tr>
						<?php $no++;endforeach;?>
					<?php }else{ ?>
				<tr>
					<td colspan="10" ><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
					<?php } ?>
			</table>
</div>
		</div>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<table width="99%" border="0">
			<tr>
				<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
			</tr>
			<tr>
				<td width="50%"> Yearly Planner Assets Schedule Under Warranty  - <?= date("F-Y")?><br><!--<i>Computer Generated - APBESys</i>--></td>
				<td width="50%" align="right"></td>
			</tr>

		</table>
	<?php } ?>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_footerprint.php';?>
	<?php } ?>

	


