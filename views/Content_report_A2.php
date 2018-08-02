<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">Schedule Corrective Maintenance (SCM) Listing</div>
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


		
<?php  if (empty($recordrq)) {?>

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
						for ($dyear = '2015';$dyear <= date("Y");$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
					<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
					<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
					<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">		
					<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
				</form>
			</center>
		</div>
	<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5">
						Schedule Corrective Maintenance (SCM) LISTING - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
					</td>
				</tr>
			</table>
			<table class="tftable" border="1" style="text-align:center;">
				<tr>
					<th rowspan=2>No</th>
					<th rowspan=2>Work Order Date</th>
					<th rowspan=2>A2 Work Order</th>
					<th rowspan=2>Asset No</th>	
					<th rowspan=2 style="width:25%;">Equipment Name</th>
					<th rowspan=2>UDP</th>
					<th rowspan=2>Status</th>
					<th colspan=2>Test</th>
					<th rowspan=2>Remark</th>
					<!--<th rowspan=2>Schedule Date</th>-->
					<th rowspan=2>Reschedule Date</th>
					<th rowspan=2>Complete Date</th>
					<th rowspan=2>Deparment (Location Code)</th>
					<th rowspan=2>Asset Group</th>
				</tr>
				<tr>
					<th>S</th>
					<th>P</th>
				</tr>
				<tr>
					<td colspan="16" style="height:300px;"><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
			</table>

		</div>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<table width="99%" border="0">
			<tr>
				<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
			</tr>
			<tr>
				<td width="50%"> Schedule Corrective Maintenance (SCM) Listing Work Order - Scheduled - <?= date("F-Y")?><br><!--<i>Computer Generated - APBESys</i>--></td>
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
				<td colspan="5">Schedule Corrective Maintenance (SCM) LISTING - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			</tr>
		</table>
		<table class="tftable" border="1" style="text-align:center;">
			<tr>
				<th rowspan=2>No</th>
				<th rowspan=2>Work Order Date</th>
				<th rowspan=2>A2 Work Order</th>
				<th rowspan=2>Asset No</th>	
				<th rowspan=2 style="width:25%;">Equipment Name</th>
				<th rowspan=2>UDP</th>
				<th rowspan=2>Status</th>
				<th colspan=2>Test</th>
				<th rowspan=2 >Schedule Date</th>
				<th rowspan=2>Remark</th>
				<!--<th rowspan=2>Schedule Date</th>-->
				<th rowspan=2>Reschedule Date</th>
				<th rowspan=2>Complete Date</th>
				<th rowspan=2>Deparment (Location Code)</th>
				<th rowspan=2>Asset Group</th>
			</tr>
			<tr>
				<th>S</th>
				<th>P</th>
			</tr>
			<?php $numrow = 1; foreach($recordrq as $row):?>
				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    			<td><?= $numrow ?></td>
				<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
				<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
				
				<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>			
				<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
				<td><?= ($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A' ?></td>
				<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
				<td><?= 'N/A' ?></td>
				<td><?= 'N/A' ?></td>
				<td><?= ($row->schedule_d) ? date("d/m/Y",strtotime($row->schedule_d)) : 'N/A' ?></td>
				<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
				<!--<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>-->
				<td><?= 'N/A' ?></td>
				<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
				
				<td><?= ($row->v_UserDeptDesc) ? $row->v_location_name.' ('.$row->v_location_code.')' : 'N/A' ?></td>
				<?php if ($this->input->get('broughtfwd') != '') { ?>
				<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
				<?php } else { ?>
				<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
				<?php } ?>

			</tr>
			<?php $numrow++; ?>
			<?php endforeach;?>


			<!-- buzzle condition to check variable $record exist on 02/07/18 because $record not found -->
			<?php $numrowx = $numrow;if(isset($record)):?>
			<?php foreach($record as $row):?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
				<td><?= $numrowx ?></td>
				<td><?= ($row->sd_duedt) ? date("d/m/Y",strtotime($row->sd_duedt)) : 'N/A' ?></td>
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
				<!--<td><?= ($row->d_Date) ? date("d-m-Y",strtotime($row->d_Date)) : 'N/A' ?></td>-->
				<!--<td></td>-->
				<td style="height: 52px;">
				<?php if (($row->v_summary) ? $row->v_summary : 'N/A' != "N/A"){ ?>
					<div style="overflow: hidden; text-overflow: ellipsis; height: 42px; overflow: hidden; text-overflow: ellipsis;">
				<?php }?>
					<?= ($row->v_summary) ? $row->v_summary : 'N/A' ?>
				<?php if (($row->v_summary) ? $row->v_summary : 'N/A' != "N/A"){ ?>
					</div>
				<?php }?>
				</td>
				<td><?= ($row->d_DateDone) ? date("d-m-Y",strtotime($row->d_DateDone)) : 'N/A' ?></td>
				<td><?= ($row->d_Reschdt) ? date("d-m-Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
				<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' ('.$row->V_Location_code.')' : 'N/A' ?></td>
				<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			</tr>	
			
			<?php $numrowx++; ?>	
			<?php endforeach;endif;?>
		</table>


<?php }else{ ?>
	<?php $numrow = 1; ?>

	<?php $numrowx = $numrow; if (!empty($recordrq)) {?>
		<?php  foreach($recordrq as $row):?>
		<?php //if ($numrow==1 OR $numrow%13==1) { 
			if ($numrow==$numrowx OR $numrow%13==1) {?>
				<?php if (true){?>
		<?php include 'content_headprint.php';?>
				<?php } ?>

				<?php if (true){?>
		<div id="Instruction" >
			<center>View List : 
				<form method="get" action="">

					<?php $idArray = array_map('toArray', $this->session->userdata('accessr'));
					if (!(in_array("contentcontroller/Schedule(main)", $idArray))) { 
						if ($this->session->userdata('usersess')=="HKS") {
							$req_type = array(
								'' => 'All',
								'A1' => 'A1 - Breakdown Maintenance (BM)',
								'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
								'A3' => 'A3 - Corrective Maintenance (CM)',
								'A4' => 'A4 - User Requests',
								'A5' => 'A5 - Investigation of Incidences',
								'A6' => 'A6 - Technical Advice',
								'A7' => 'A7 - User Training',
								'A8' => 'A8 - Testing and Commissioning (T&C)',
								'A9' => 'A9 - Internal Request',
								'A10' => 'A10 - Reimbursable Work',
								'F' => 'Floor - Related Report',
								'WD' => 'Wall / Door - Related Report',
								'C' => 'Ceiling - Related Report',
								'W' => 'Window - Related Report',
								'FIX' => 'Fixtures - Related Report',
								'FUR' => 'Furniture / Fitting - Related Report'
			 				);
						} else {
			 				$req_type = array(
								'' => 'All',
								'A1' => 'A1 - Breakdown Maintenance (BM)',
								'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
								'A3' => 'A3 - Corrective Maintenance (CM)',
								'A4' => 'A4 - User Requests',
								'A5' => 'A5 - Investigation of Incidences',
								'A6' => 'A6 - Technical Advice',
								'A7' => 'A7 - User Training',
								'A8' => 'A8 - Testing and Commissioning (T&C)',
								'A9' => 'A9 - Internal Request',
								'A10' => 'A10 - Reimbursable Work'
							);
		 				}/*
						$req_type = array(
							'' => 'All',
							'A1' => 'A1 - Breakdown Maintenance (BM)',
							'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
							'A3' => 'A3 - Corrective Maintenance (CM)',
							'A4' => 'A4 - User Requests',
							'A5' => 'A5 - Investigation of Incidences',
							'A6' => 'A6 - Technical Advice',
							'A7' => 'A7 - User Training',
							'A8' => 'A8 - Testing and Commissioning (T&C)',
							'A9' => 'A9 - Internal Request',
							'A10' => 'A10 - Reimbursable Work'
						);*/
						?>
						<?php //echo form_dropdown('req', $req_type, set_value('req', $reqtype) , 'style="width: 300px;" id="cs_month"'); ?><br>

					<?php  } else {
						$_POST['req'] = '';
					}
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
					<input type="submit" value="Apply" onchange="javascript: submit()"/>

				</form>
			</center>
		</div>
				<?php } ?>
			<div class="m-div">
				<table class="rport-header">
					<tr>
		  				<td colspan="4" valign="top">Schedule Corrective Maintenance (SCM) Report Listing- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - FACILITY ENGINEERING SERVICES ( A2 - Schedule Corrective Maintenance (SCM) )</td>
				<?php if (false) {?>
						<td colspan="4" valign="top">
							<?php if ($this->input->get('broughtfwd') != ''){?>
								Unscheduled Brought Forward Work Order Details
							<?php }else{ ?>
								Work Order Report Listing
							<?php }?>
							- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( 
							<?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ 
								echo 'Group'.$this->input->get('grp').','.$tulis; 
							} elseif ($this->input->get('req')){
								echo $tulis; 
							}elseif ($this->input->get('grp') == ''){ 
								echo 'All';
							}else{ 
								echo 'Group '.$this->input->get('grp');
							} ?> )
						</td>
				<?php } ?>
					</tr>
				</table>
				<table class="tftable tbl-go" border="1" style="text-align:center;">
					<tr>
						<th rowspan=2 style="width:2%;">No</th>
						<th rowspan=2 style="width:7%;">Work Order Date</th>
						<th rowspan=2 style="width:12%;">A2 Work Order</th>
						<th rowspan=2 style="width:5%;">Asset No</th>	
						<th rowspan=2 style="width:20%;">Equipment Name</th>
						<th rowspan=2 style="width:2%;">UDP</th>
						<th rowspan=2 style="width:2%;">Status</th>
						<th colspan=2 style="width:5%;">Test</th>
						<th rowspan=2 style="width:5%;">Schedule Date</th>
						<th rowspan=2 style="width:17%;">Remark</th>
						<!--<th rowspan=2 style="width:7%;">Schedule Date</th>-->
						<th rowspan=2 style="width:7%;">Reschedule Date</th>
						<th rowspan=2 style="width:7%;">Complete Date</th>
						<th rowspan=2 style="width:12%;">Deparment (Location Code)</th>
						<th rowspan=2>Asset Group</th>
					</tr>
					<tr>
						<th>S</th>
						<th>P</th>
					</tr>	
			<?php } ?>
					      			
					<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
		    			<td><?= $numrow ?></td>
						<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
						<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'excel'){ ?>
						<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>			
			<?php }else{ ?>
						<td> <?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
						<td> <?=isset($row->v_tag_no) ? $row->v_tag_no : ''?></td>
			<?php } ?>
						<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
						<td><?= ($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A' ?></td>
						<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
						<td><?= 'N/A' ?></td>						
						<td><?= 'N/A' ?></td>
						<td><?= ($row->schedule_d) ? date("d/m/Y",strtotime($row->schedule_d)) : 'N/A' ?></td>
						<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
						<!--<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>-->
						<td><?= 'N/A' ?></td>
						<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
					
						<td><?= ($row->v_UserDeptDesc) ? $row->v_location_name.' ('.$row->v_location_code.')' : 'N/A' ?></td>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
						<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
			<?php } else { ?>
						<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			<?php } ?>
			
			
  
					</tr>	
						
			<?php $numrow++; ?>
			<?php //if (($numrow-1)%13==0) {
			if ((($numrow-1)%13==0) || (($numrow-1)== count($recordrq))) {?>						
				</table>
			</div>
				<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
			<table width="99%" border="0">
				<tr>
					<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
				</tr>
				<tr>
					<td width="50%">Schedule Corrective Maintenance (SCM) Listing Work Order Status Report<br><i>Computer Generated - CAMSIS</i></td>
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

