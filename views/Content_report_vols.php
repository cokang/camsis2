<?php
if ($this->input->get('ex') == 'excel'){
	if($filby == 'RI'){
		$filename ="RI Listing Scheduled (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	}else{
		$filename ="PPM Listing Scheduled (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	}
	//$filename ="PPM Listing Scheduled (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}
?>

<?php if ($this->input->get('ex') == ''){?>
	<?php include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Listing Scheduled</div>
		<button onclick="javascript:myFunction('report_vols?from=<?=$from?>&to=<?=$to?>&stat=<?=$this->input->get('stat');?>&resch=<?=$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>&filby=<?=$this->input->get('filby');?>&serv=<?php echo $this->input->get('serv');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="delco();location.href = '<?php echo $btp ;?>';">CANCEL</button>
		<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
			<a href="<?php echo base_url();?>index.php/contentcontroller/report_vols?from=<?=$from?>&to=<?=$to?>&none=close&filby=<?=$filby?>&stat=<?php echo $this->input->get('stat');?>&serv=<?php echo $this->input->get('serv');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
			<a href="<?php echo base_url();?>index.php/contentcontroller/report_vols?from=<?=$from?>&to=<?=$to?>&pdf=1&filby=<?=$filby?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&serv=<?php echo $this->input->get('serv');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
		<?php } ?>
	</div>
<?php } ?>

<?php  if (empty($record)) {?>

	<div class="menu" style="position:relative;">
		<?php if (($this->input->get('ex') == '') or (1==0)){?>
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
						for ($dyear = '2015';$dyear <= date('Y',strtotime("+1 month"));$dyear++){
							$year_list[$dyear] = $dyear;
						}
						?>
						<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
						<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
						<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
						<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">
						<input type="hidden" value="<?php echo set_value('filby', ($this->input->get('filby')) ? $this->input->get('filby') : ''); ?>" name="filby">
						<input type="submit" value="Apply" onchange="javascript: submit()"/>

					</form>
				</center>
			</div>
		<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - <?= ($this->input->get('y') <> 0) ? date('F', mktime(0, 0, 0, $month, 10)) : ''?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
				</tr>
			</table>
			<table class="tftable" border="1" style="text-align:center;">
				<tr>
					<th rowspan=2>No</th>
					<th rowspan=2><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Scheduled Date</th>
					<th rowspan=2><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Work Order</th>
					<th rowspan=2>Asset No</th>
					<th rowspan=2 style="width:25%;">Equipment Name</th>
					<th rowspan=2>UDP</th>
					<th rowspan=2>Freq</th>
					<th rowspan=2>Status</th>
					<th colspan=2>Test</th>
					<th rowspan=2>Remark</th>
					<th rowspan=2>Visit Date</th>
					<th rowspan=2>Reschedule Date</th>
					<!--<th rowspan=2>Acceptance By</th>-->
					<th rowspan=2>Completion Date</th>
					<th rowspan=2>Deparment (Location Code)</th>
					<th rowspan=2>Asset Group</th>
				</tr>
				<tr>
					<th>S</th>
					<th>P</th>
				</tr>
				<tr>
					<td colspan="16" style="height:200px;"><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
			</table>
		</div>
		<?php if (($this->input->get('ex') == '') or (1==0)){?>
			<table width="99%" border="0">
				<tr>
					<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
				</tr>
				<tr>
					<td width="50%">Work Order - Scheduled - <?= date("F-Y")?><br><!--<i>Computer Generated - APBESys</i>--></td>
					<td width="50%" align="right"></td>
				</tr>
			</table>
		<?php } ?>
		<?php if (($this->input->get('ex') == '') or (1==0)){?>
			<?php include 'content_footerprint.php';?>
		<?php } ?>
	</div>

<?php }else{ ?>

	<?php if ( $this->input->get('xxx') == 'export' ) { ?>

		<table class="rport-header">
			<tr>
			    <td colspan="5"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - <?= ($this->input->get('y') <> 0) ? date('F', mktime(0, 0, 0, $month, 10)).' '.$year : '( '.date("d-m-Y", strtotime($from)).' To '.date("d-m-Y", strtotime($to)).' )'?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			</tr>
		</table>
		<table class="tftable" border="1" style="text-align:center;">
			<tr>
				<th rowspan=2>No</th>
				<th rowspan=2><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Scheduled Date</th>
				<th rowspan=2><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Work Order</th>
				<th rowspan=2>Asset No</th>
				<th rowspan=2 style="width:25%;">Equipment Name</th>
				<th rowspan=2>UDP</th>
				<th rowspan=2>Freq</th>
				<th rowspan=2>Status</th>
				<th colspan=2>Test</th>
				<th rowspan=2>Remark</th>
				<th rowspan=2>Visit Date</th>
				<th rowspan=2>Reschedule Date</th>
				<!--<th rowspan=2>Acceptance By</th>-->
				<th rowspan=2>Completion Date</th>
				<th rowspan=2>Deparment (Location Code)</th>
				<th rowspan=2>Asset Group</th>
			</tr>
			<tr>
				<th>S</th>
				<th>P</th>
			</tr>
			<?php $numrow = 1; ?>
			<?php $numrowx = $numrow; ?>
			<?php foreach($record as $row):?>
				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
					<td><?= $numrowx ?></td>
				<?php if ($filby == 'RI') {?>
					<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
				<?php } else {?>
					<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
				<?php } ?>
					<?php if  ($this->input->get('ex') != 'excel'){ ?>
						<td><?=($row->sv_wrkordno) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->sv_wrkordno.'&assetno='.$row->sv_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->sv_wrkordno.'' ) : 'N/A' ?></td>
						<td><?=($row->sv_asset_no) && $row->sv_asset_no != 'N/A' ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->sv_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->av_tag_no.'' ) : 'N/A' ?></td>
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
					<!--<td></td>-->
					<td style="height: 52px;">
						<?php if (($row->v_summary) ? str_replace("N/A","",$row->v_summary) : 'N/A' != "N/A"){ ?>
								<div style="overflow: hidden; text-overflow: ellipsis; word-wrap:break-word;height:auto; text-overflow: ellipsis;">
						<?php }?>
						<?php  if ($row->v_summary == " ") {echo "N/A";}else{echo str_replace("N/A","",$row->v_summary);} ?>
						<?php if (($row->v_summary) ? str_replace("N/A","",$row->v_summary) : 'N/A' != "N/A"){ ?>
							</div>
						<?php }?>
					</td>
					<td><?= ($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : 'N/A' ?></td>
					<td><?= ($row->d_Reschdt) ? date("d-m-Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
					<!--<td><?= ($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>-->
					<td><?= ($row->d_DateDone) ? date("d-m-Y",strtotime($row->d_DateDone)) : 'N/A' ?></td>
					<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
					<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
				</tr>
			<?php $numrowx++; ?>
			<?php endforeach;?>
		</table>
	<?php }elseif( $this->input->get("none")=="closed" ){ ?>

		<?php $numrow = 1; foreach($record as $row):?>
			<?php if ($numrow==1 OR $numrow%13==1) { ?>

				<div class="menu" style="position:relative;">
					<?php if (($this->input->get('ex') == '') or (1==0)){?>
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
									for ($dyear = '2015';$dyear <= date('Y',strtotime("+1 month"));$dyear++){
										$year_list[$dyear] = $dyear;
									}
									?>
									<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
									<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
									<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
									<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">
									<input type="hidden" value="<?php echo set_value('filby', ($this->input->get('filby')) ? $this->input->get('filby') : ''); ?>" name="filby">
									<input type="submit" value="Apply" onchange="javascript: submit()"/>
								</form>
							</center>
						</div>
					<?php } ?>
					<div class="m-div">
						<table class="rport-header">
							<tr>
								<td colspan="5"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - <?= ($this->input->get('y') <> 0) ? date('F', mktime(0, 0, 0, $month, 10)).' '.$year : '( '.date("d-m-Y", strtotime($from)).' To '.date("d-m-Y", strtotime($to)).' )'?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
							</tr>
						</table>
						<table class="tftable" border="1" style="text-align:center;page-break-inside:auto">
							<tr>
								<th rowspan=2>No</th>
								<th rowspan=2 style="width:7%;"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Scheduled Date</th>
								<th rowspan=2 style="width:12%;"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Work Order</th>
								<th rowspan=2 style="width:5%;">Asset No</th>
								<th rowspan=2 style="width:30%;">Equipment Name</th>
								<th rowspan=2>UDP</th>
								<th rowspan=2>Freq</th>
								<th rowspan=2>Status</th>
								<th colspan=2>Test</th>
								<th rowspan=2 style="width:50%;">Remark</th>
								<th rowspan=2 style="width:7%;">Visit Date</th>
								<th rowspan=2 style="width:7%;">Reschedule Date</th>
								<!--<th rowspan=2 style="width:7%;">Acceptance By</th>-->
								<th rowspan=2 style="width:7%;">Completion Date</th>
								<th rowspan=2 style="width:12%;">Deparment (Location Code)</th>
								<th rowspan=2>Asset Group</th>
							</tr>
							<tr>
								<th>S</th>
								<th>P</th>
							</tr>

			<?php } ?>
							<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color" style="page-break-inside:avoid; page-break-after:auto ">' : '<tr style="page-break-inside:avoid; page-break-after:auto ">'; ?>
								<td><?= $numrow ?></td>

								<?php if ($filby == 'RI') {?>
									<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
								<?php } else {?>
									<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
								<?php } ?>
								<?php if  ($this->input->get('ex') != 'excel'){ ?>
									<td><?=($row->sv_wrkordno) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->sv_wrkordno.'&assetno='.$row->sv_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->sv_wrkordno.'' ) : 'N/A' ?></td>
									<td><?=($row->sv_asset_no) && $row->sv_asset_no != 'N/A' ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->sv_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->av_tag_no.'' ) : 'N/A' ?></td>
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
								<!--<td></td>-->
								<td style="height: 52px;">
									<?php if (($row->v_summary) ? str_replace("N/A","",$row->v_summary) : 'N/A' != "N/A"){ ?>
					               <div style="word-wrap: break-word;height:auto;">
									<?php }?>
									<?php  if ($row->v_summary == " ") {echo "N/A";}else{echo str_replace("N/A","",$row->v_summary);} ?>
									<?php if (($row->v_summary) ? str_replace("N/A","",$row->v_summary) : 'N/A' != "N/A"){ ?>
										</div>
									<?php }?>
								</td>
								<td><?= ($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : 'N/A' ?></td>
								<td><?= ($row->d_Reschdt) ? date("d-m-Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
								<td><?= ($row->d_DateDone) ? date("d-m-Y",strtotime($row->d_DateDone)) : 'N/A' ?></td>
								<!--<td><?= ($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>-->
								<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
								<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
							</tr>
							<?php $numrow++; ?>
							<?php //if (($numrow-1)%13==0) {
							if ((($numrow-1)%13==0) || (($numrow-1)== count($record))) {?>
						</table>
					</div>
					<?php if (($this->input->get('ex') == '') or (1==0)){?>
						<table width="99%" border="0">
							<tr>
								<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
							</tr>
							<tr>
								<td width="50%"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - Scheduled - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i><!--<i>Computer Generated - APBESys</i>--></td>
								<td width="50%" align="right"></td>
							</tr>
						</table>
					<?php } ?>
					<?php if (($this->input->get('ex') == '') or (1==0)){?>
						<?php include 'content_footerprint.php';?>
						<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
					<?php } ?>
				</div>

			<?php } ?>
		<?php endforeach;?>
	<?php }else{ ?>
		<div class="menu" style="position:relative;">
			<?php if (($this->input->get('ex') == '') or (1==0)){?>
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
							for ($dyear = '2015';$dyear <= date('Y',strtotime("+1 month"));$dyear++){
								$year_list[$dyear] = $dyear;
							}
							?>
							<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
							<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
							<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
							<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">
							<input type="hidden" value="<?php echo set_value('filby', ($this->input->get('filby')) ? $this->input->get('filby') : ''); ?>" name="filby">
							<input type="submit" value="Apply" onchange="javascript: submit()"/>
						</form>
					</center>
				</div>
			<?php } ?>
			<div class="m-div">
				<table class="rport-header">
					<tr>
						<td colspan="5"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - <?= ($this->input->get('y') <> 0) ? date('F', mktime(0, 0, 0, $month, 10)).' '.$year : '( '.date("d-m-Y", strtotime($from)).' To '.date("d-m-Y", strtotime($to)).' )'?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
					</tr>
				</table>
				<div id="constrainer" style="height: 80%;">
					<div class="scrolltable1">

						<table class="tftable" border="1" style="text-align:center;">
							<tr>
								<th rowspan=2>No</th>
								<th rowspan=2 style="width:7%;"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Scheduled Date</th>
								<th rowspan=2 style="width:12%;"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> Work Order</th>
								<th rowspan=2 style="width:5%;">Asset No</th>
								<th rowspan=2 style="width:30%;">Equipment Name</th>
								<th rowspan=2>UDP</th>
								<th rowspan=2>Freq</th>
								<th rowspan=2>Status</th>
								<th colspan=2>Test</th>
								<th rowspan=2 style="width:17%;">Remark</th>
								<th rowspan=2 style="width:7%;">Visit Date</th>
								<th rowspan=2 style="width:7%;">Reschedule Date</th>
								<!--<th rowspan=2 style="width:7%;">Acceptance By</th>-->
								<th rowspan=2 style="width:7%;">Completion Date</th>
								<th rowspan=2 style="width:12%;">Deparment (Location Code)</th>
								<th rowspan=2>Asset Group</th>
							</tr>
							<tr>
								<th style="position: sticky; top: 22px;">S</th>
								<th style="position: sticky; top: 22px;">P</th>
							</tr>

							<?php $numrow = 1; foreach($record as $row):?>
							<tr>
								<td><?= $numrow ?></td>

								<?php if ($filby == 'RI') {?>
									<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
								<?php } else {?>
								  <td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
								<?php } ?>
								<?php if  ($this->input->get('ex') != 'excel'){ ?>
									<td><?=($row->sv_wrkordno) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->sv_wrkordno.'&assetno='.$row->sv_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->sv_wrkordno.'' ) : 'N/A' ?></td>
									<td><?=($row->sv_asset_no) && $row->sv_asset_no != 'N/A' ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->sv_asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'),''.$row->av_tag_no.'' ) : 'N/A' ?></td>
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
								<!--<td></td>-->
								<td style="height: 52px;">
									<?php if (($row->v_summary) ? str_replace("N/A","",$row->v_summary) : 'N/A' != "N/A"){ ?>
										<div style="overflow: hidden; text-overflow: ellipsis; word-wrap:break-word;height:auto; text-overflow: ellipsis;">
									<?php }?>
									<?php  if ($row->v_summary == " ") {echo "N/A";}else{echo str_replace("N/A","",$row->v_summary);} ?>
									<?php if (($row->v_summary) ? str_replace("N/A","",$row->v_summary) : 'N/A' != "N/A"){ ?>
										</div>
									<?php }?>
								</td>
								<td><?= ($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : 'N/A' ?></td>
								<td><?= ($row->d_Reschdt) ? date("d-m-Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
								<!--<td><?= ($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>-->
								<td><?= ($row->d_DateDone) ? date("d-m-Y",strtotime($row->d_DateDone)) : 'N/A' ?></td>
								<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
								<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
							</tr>
							<?php $numrow++; ?>
							<?php endforeach;?>
						</table>
					</div>
				</div>
			</div>
			<?php if (($this->input->get('ex') == '') or (1==0)){?>
				<table width="99%" border="0">
					<tr>
						<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
					</tr>
					<tr>
						<td width="50%"><?=($filby == 'RI') ? 'RI' : 'PPM' ?> LISTING - Scheduled - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i><!--<i>Computer Generated - APBESys</i>--></td>
						<td width="50%" align="right"></td>
					</tr>
				</table>
			<?php } ?>
			<?php if (($this->input->get('ex') == '') or (1==0)){?>
				<?php include 'content_footerprint.php';?>
				<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
			<?php } ?>
		</div>
	<?php } ?>

<?php } ?>
