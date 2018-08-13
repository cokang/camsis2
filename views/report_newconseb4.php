<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="B4 New Concession (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">B4 New Concession</div>
		<button onclick="javascript:myFunction('report_newconseb4?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    	<!--<button onclick="javascript:myFunction('report_vols?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>-->
    	<!--<button onclick="javascript:myFunction('report_vols?m=12&y=2016&stat=fbfb&resch=nt&grp=');" class="btn-button btn-primary-button">PRINT</button>-->
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_newconseb4?m=<?=$month?>&y=<?=$year?>&none=close&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_newconseb4?m=<?=$month?>&y=<?=$year?>&pdf=1&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>


		
<?php  if (empty($records)) {?>

	<div class="menu" style="position:relative;">
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>
		<div id="Instruction" >
			<center>Filter record - TRPI not met Period : 
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
		</div>
	<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5">
						TRPI NOT MET SUMMARY  - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
					</td>
				</tr>
			</table>
			<div style="overflow-x:auto;">
				<table class="tftable" border="1" style="text-align:center;">
					<tr>
						<th>No</th>
						<th>Hospital Name</th>
						<th>Asset No</th>
						<th>Asset Tag</th>
						<th>Type Code</th>
						<th>Type Desc</th>
						<th>Purchase Date</th>
						<th>Commission Date</th>
						<th>Asset Age</th>
						<th>Cost</th>
						<th>Asset Status</th>
						<th>Condition</th>
						<th>Down Time</th>
						<th>Ppm Total</th>
						<th>Ppm On Time</th>
						<th>Trpi</th>
						<th>Trpi Lt 5</th>
						<th>Trpi 5 10</th>
						<th>Trpi Gt 10</th>
						<th>Qap Period</th>
						<th>Warranty Date</th>
						<th>Downtime Cum</th>
						<th>Uptime Cum</th>
						<th>Downtime Pct</th>
						<th>Uptime Pct</th>
					</tr>

					<?php if(!empty($records)){?>
						<?php $no=1;foreach($records as $row):?>
					<tr>
						<td><?=$no;?></td>
						<td><?=$row->hospital_name;?></td>
						<td><?=$row->asset_no;?></td>
						<td><?=$row->asset_tag;?></td>
						<td><?=$row->type_code;?></td>
						<td><?=$row->type_desc;?></td>
						<td><?=($row->purchase_date) ? $row->purchase_date : "N/A";?></td>
						<td><?=($row->commission_date) ? $row->commission_date : "N/A";?></td>
						<td><?=($row->asset_age) ? $row->asset_age : "N/A";?></td>
						<td><?=($row->cost) ? $row->cost : "N/A";?></td>
						<td><?=$row->asset_status;?></td>
						<td><?=$row->condition;?></td>
						<td><?=($row->down_time) ? $row->down_time : "N/A";?></td>
						<td><?=($row->ppm_total) ? $row->ppm_total : "N/A";?></td>
						<td><?=($row->ppm_on_time) ? $row->ppm_on_time : "N/A";?></td>
						<td><?=($row->trpi) ? $row->trpi : "N/A";?></td>
						<td><?=($row->trpi_lt_5) ? $row->trpi_lt_5 : "N/A";?></td>
						<td><?=($row->trpi_5_10) ? $row->trpi_5_10 : "N/A";?></td>
						<td><?=($row->trpi_gt_10) ? $row->trpi_gt_10 : "N/A";?></td>
						<td><?=($row->qap_period) ? $row->qap_period : "N/A";?></td>
						<td><?=($row->warranty_date) ? $row->warranty_date : "N/A";?></td>
						<td><?=($row->downtime_cum) ? $row->downtime_cum : "N/A";?></td>
						<td><?=($row->uptime_cum) ? $row->uptime_cum : "N/A";?></td>
						<td><?=($row->downtime_pct) ? $row->downtime_pct : "N/A";?></td>
						<td><?=($row->uptime_pct) ? $row->uptime_pct : "N/A";?></td>
					</tr>
						<?php $no++;endforeach;?>
					<?php }else{ ?>
					<tr>
						<td colspan="25" ><span style="color:red;">NO RECORDS FOUND.</span></td>
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
				<td width="50%"> B4 New Concession - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><!--<i>Computer Generated - APBESys</i>--></td>
				<td width="50%" align="right"></td>
			</tr>

		</table>
	<?php } ?>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_footerprint.php';?>
	<?php } ?>
<?php }else if ( $this->input->get('xxx') == 'export' ) { ?>

		<table class="rport-header">
			<tr>
				<td colspan="5">B4 New Concession - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			</tr>
		</table>
		<table class="tftable" border="1" style="text-align:center;">
			<tr>
				<th>No</th>
				<th>Hospital Name</th>
				<th>Asset No</th>
				<th>Asset Tag</th>
				<th>Type Code</th>
				<th>Type Desc</th>
				<th>Purchase Date</th>
				<th>Commission Date</th>
				<th>Asset Age</th>
				<th>Cost</th>
				<th>Asset Status</th>
				<th>Condition</th>
				<th>Down Time</th>
				<th>Ppm Total</th>
				<th>Ppm On Time</th>
				<th>Trpi</th>
				<th>Trpi Lt 5</th>
				<th>Trpi 5 10</th>
				<th>Trpi Gt 10</th>
				<th>Qap Period</th>
				<th>Warranty Date</th>
				<th>Downtime Cum</th>
				<th>Uptime Cum</th>
				<th>Downtime Pct</th>
				<th>Uptime Pct</th>
			</tr>
			<?php $numrow = 1; foreach($records as $row):?>
				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    			<td><?= $numrow ?></td>
				<td><?=$row->hospital_name;?></td>
				<td><?=$row->asset_no;?></td>
				<td><?=$row->asset_tag;?></td>
				<td><?=$row->type_code;?></td>
				<td><?=$row->type_desc;?></td>
				<td><?=($row->purchase_date) ? $row->purchase_date : "N/A";?></td>
				<td><?=($row->commission_date) ? $row->commission_date : "N/A";?></td>
				<td><?=($row->asset_age) ? $row->asset_age : "N/A";?></td>
				<td><?=($row->cost) ? $row->cost : "N/A";?></td>
				<td><?=$row->asset_status;?></td>
				<td><?=$row->condition;?></td>
				<td><?=($row->down_time) ? $row->down_time : "N/A";?></td>
				<td><?=($row->ppm_total) ? $row->ppm_total : "N/A";?></td>
				<td><?=($row->ppm_on_time) ? $row->ppm_on_time : "N/A";?></td>
				<td><?=($row->trpi) ? $row->trpi : "N/A";?></td>
				<td><?=($row->trpi_lt_5) ? $row->trpi_lt_5 : "N/A";?></td>
				<td><?=($row->trpi_5_10) ? $row->trpi_5_10 : "N/A";?></td>
				<td><?=($row->trpi_gt_10) ? $row->trpi_gt_10 : "N/A";?></td>
				<td><?=($row->qap_period) ? $row->qap_period : "N/A";?></td>
				<td><?=($row->warranty_date) ? $row->warranty_date : "N/A";?></td>
				<td><?=($row->downtime_cum) ? $row->downtime_cum : "N/A";?></td>
				<td><?=($row->uptime_cum) ? $row->uptime_cum : "N/A";?></td>
				<td><?=($row->downtime_pct) ? $row->downtime_pct : "N/A";?></td>
				<td><?=($row->uptime_pct) ? $row->uptime_pct : "N/A";?></td>
			</tr>
			<?php $numrow++; ?>
			<?php endforeach;?>


			<!-- buzzle condition to check variable $record exist on 02/07/18 because $record not found -->
			<?php $numrowx = $numrow;if(isset($record)):?>
			<?php foreach($record as $row):?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
				<td><?= $numrowx ?></td>
				<td><?=$row->hospital_name;?></td>
				<td> <?=$row->asset_no;?></td>
				<td> <?=($row->asset_tag) ? $row->asset_tag : ''?></td>
				<td><?=$row->type_desc;?></td>
				<td><?=($row->purchase_date) ? $row->purchase_date : "N/A";?></td>
				<td><?=($row->commission_date) ? $row->commission_date : "N/A";?></td>
				<td><?=($row->asset_age) ? $row->asset_age : "N/A";?></td>
				<td><?=($row->cost) ? $row->cost : "N/A";?></td>
				<td><?=$row->asset_status;?></td>
				<td><?=$row->condition;?></td>
				<td><?=($row->down_time) ? $row->down_time : "N/A";?></td>
				<td><?=($row->ppm_total) ? $row->ppm_total : "N/A";?></td>
				<td><?=($row->ppm_on_time) ? $row->ppm_on_time : "N/A";?></td>
				<td><?=($row->trpi) ? $row->trpi : "N/A";?></td>
				<td><?=($row->trpi_lt_5) ? $row->trpi_lt_5 : "N/A";?></td>
				<td><?=($row->trpi_5_10) ? $row->trpi_5_10 : "N/A";?></td>
				<td><?=($row->trpi_gt_10) ? $row->trpi_gt_10 : "N/A";?></td>
				<td><?=($row->qap_period) ? $row->qap_period : "N/A";?></td>
				<td><?=($row->warranty_date) ? $row->warranty_date : "N/A";?></td>
				<td><?=($row->downtime_cum) ? $row->downtime_cum : "N/A";?></td>
				<td><?=($row->uptime_cum) ? $row->uptime_cum : "N/A";?></td>
				<td><?=($row->downtime_pct) ? $row->downtime_pct : "N/A";?></td>
				<td><?=($row->uptime_pct) ? $row->uptime_pct : "N/A";?></td>
			</tr>	
			
			<?php $numrowx++; ?>	
			<?php endforeach;endif;?>
		</table>


<?php }else{ ?>
	<?php $numrow = 1; ?>

	<?php $numrowx = $numrow; if (!empty($records)) {?>
		<?php  foreach($recordrq as $row):?>
		<?php //if ($numrow==1 OR $numrow%13==1) { 
			if ($numrow==$numrowx OR $numrow%13==1) {?>
				<?php if (true){?>
		<?php include 'content_headprint.php';?>
				<?php } ?>
				<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
			<table width="99%" border="0">
				<tr>
					<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
				</tr>
				<tr>
					<td width="50%">B4 New Concession<br><i>Computer Generated - CAMSIS</i></td>
					<td width="50%" align="right"></td>
				</tr>
			</table>
	
			<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
				<?php } ?>
			</div>
			<?php } ?>
		<?php endforeach;?>
	<?php } ?>


<?php } ?>

