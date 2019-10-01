<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">T&C Without AV12</div>
		<button onclick="javascript:myFunction('report_tnc_no_av12?m=<?=$month?>&y=<?=$year?>');" class="btn-button btn-primary-button">PRINT</button>
    	<!--<button onclick="javascript:myFunction('report_vols?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>-->
    	<!--<button onclick="javascript:myFunction('report_vols?m=12&y=2016&stat=fbfb&resch=nt&grp=');" class="btn-button btn-primary-button">PRINT</button>-->
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?m=<?=$month?>&y=<?=$year?>&none=close&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?m=<?=$month?>&y=<?=$year?>&pdf=1&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>


		
<?php  if (empty($recordrq)) {?>

	<div class="menu" style="position:relative;">
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>
		<div id="Instruction" >
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
						for ($dyear = '2005';$dyear <= date("Y");$dyear++){
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
		</div>
	<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5">
						T&C Without AV12  - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
					</td>
				</tr>
			</table>
			<div style="overflow-x:auto;">
			<table class="tftable" border="1" style="text-align:center;">
				<tr>
				<th>No.</th>
				<th>Hospital</th>
				<th>Asset No.</th>
				<th>Tag No.</th>
				<th>Asset Description</th>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>Serial No.</th>
				<th>T&amp;C Date</th>
				<th>Warranty End Date</th>
				<th>User Dept. Code</th>
				</tr>
<?php  if (empty($tnc_wthAV12)) {?>
					<tr>
					<td colspan="11" ><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
				<?php } else { ?>
			<?php $numrow = 1; foreach($tnc_wthAV12 as $row):?>
				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    			<td><?= $numrow ?></td>
				<td><?= ($row->V_Hospital_code) ?  $row->V_Hospital_code : 'N/A' ?></td>
				<td><?= ($row->V_Asset_no) ?  $row->V_Asset_no : 'N/A' ?></td>
				<td><?= ($row->V_Tag_no) ?  $row->V_Tag_no : 'N/A' ?></td>
				<td><?= ($row->V_Asset_name) ?  $row->V_Asset_name : 'N/A' ?></td>
				<td><?= ($row->V_Manufacturer) ?  $row->V_Manufacturer : 'N/A' ?></td>
				<td><?= ($row->V_Model_no) ?  $row->V_Model_no : 'N/A' ?></td>
				<td><?= ($row->V_Serial_no) ?  $row->V_Serial_no : 'N/A' ?></td>
				<td><?= ($row->D_Register_date) ?  $row->D_Register_date : 'N/A' ?></td>
				<td><?= ($row->V_Wrn_end_code) ?  $row->V_Wrn_end_code : 'N/A' ?></td>
				<td><?= ($row->V_User_Dept_code) ?  $row->V_User_Dept_code : 'N/A' ?></td>
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
				<td width="50%"> T&C Without AV12 - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> <br><!--<i>Computer Generated - APBESys</i>--></td>
				<td width="50%" align="right"></td>
			</tr>

		</table>
	<?php } ?>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_footerprint.php';?>
	<?php } ?>
<?php }else if ( $this->input->get('xxx') == 'export' ) { ?>

	

<?php }else{ ?>


<?php } ?>

