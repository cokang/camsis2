<div class="ui-middle-screen">
<div class="div-p"></div>
<?php if ($this->input->get('tab') == 'Maintenance' ){ ?>
<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor); ?>
<div class="main-box">
	<div class="box3">
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p>Maintenance History</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/assethistory?assetno='.$assetno.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>
<?php } ?>
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table width="98%" class="ui-content-middle-htd">
		<?php if ($this->input->get('tab') == 'Maintenance' ){ ?>

			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="0" class="ui-header-new"><span style="float: left; font-weight: bold;">Asset Register Detail for : <?=  $record[0]->V_Tag_no?></td>
				<td class="ui-header-new" align="right" style="padding-right:5px" ><?php echo anchor ('contentcontroller/print_kewpa?asstno='.$this->input->get('assetno'), '<button class="btn-button btn-primary-button" style="background-color: #1ea92f;width:60%; height:33px;">Print Kew PA <span class="icon-printer" style="float:right; margin-top:-8px; margin-right:20px; font-size:30px;"></span></button>');?></td>

			</tr>
			<tr >
				<td colspan="2" class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				 <?php foreach ($record as $row): ?>
				  <tr>
				    <th>Item</th>
					<th>Detail</th>
					<th>Item</th>
					<th>Detail</th>
				  </tr>
				  <tr>
				    <td>Hospital</td>
					<td><?=isset($row->V_Hospitalcode) ? $row->V_Hospitalcode : ''?></td>
					<td>Asset No</td>
					<td><?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
				  </tr>
				  <tr>
				    <td>Asset Description</td>
					<td><?=isset($row->V_Asset_name) ? $row->V_Asset_name : ''?></td>
					<td>Type Code</td>
					<td><?=isset($row->V_Equip_code) ? $row->V_Equip_code : ''?></td>
				  </tr>
				  <tr>
				    <td>Make</td>
					<td><?=isset($row->V_Make) ? $row->V_Make : ''?></td>
					<td>Model</td>
					<td><?=isset($row->V_Model_no) ? $row->V_Model_no : ''?></td>
				  </tr>
				  <tr>
				    <td>Serial No</td>
					<td><?=isset($row->V_Serial_no) ? $row->V_Serial_no : ''?></td>
					<td>Manufacturer</td>
					<td><?=isset($row->V_Manufacturer) ? $row->V_Manufacturer : ''?></td>
				  </tr>
				  <tr>
				    <td>Chasis No</td>
					<td><?=isset($row->v_chasisno) ? $row->v_chasisno : ''?></td>
					<td>Engine No</td>
					<td><?=isset($row->v_engineno) ? $row->v_engineno : ''?></td>
				  </tr>

				  <tr>
				    <td>Registration No</td>
					<td><?=isset($row->v_registrationno) ? $row->v_registrationno : ''?></td>
					<td>Purchase Cost(RM)</td>
					<td><?=isset($row->N_Cost) ? 'RM' .number_format($row->N_Cost,2) : ''?></td>
				  </tr>
				  <tr>
				    <td>Purchase Date</td>
					<td><?=isset($row->V_PO_date) ? date("d-m-Y",strtotime($row->V_PO_date)) : ''?></td>
					<td>Commissioning Date</td>
					<td><?=isset($row->D_commission) ? date("d-m-Y",strtotime($row->D_commission)) : ''?></td>
				  </tr>
				  <tr>
				    <td>Warrant Expiry Date</td>
					<td><?=isset($row->V_Wrn_end_code) ? date("d-m-Y",strtotime($row->V_Wrn_end_code)) : ''?></td>
					<td>Contract/LPO No</td>
					<td><?=isset($row->V_PO_no) ? $row->V_PO_no : ''?></td>
				  </tr>
				  <tr>
				    <td>Supplier</td>
					<td><?=isset($row->V_Vendor_code) ? $row->V_Vendor_code : ''?></td>
					<td>Critical Rating</td>
					<td><?=isset($row->V_Criticality) ? $row->V_Criticality : ''?></td>
				  </tr>
				  <tr>
				    <td>Status</td>
					<td><?=isset($row->v_AssetStatus) ? $row->v_AssetStatus : ''?></td>
					<td>Condition</td>
					<td><?=isset($row->V_Condition) ? $row->V_Condition : ''?></td>
				  </tr>
				  <tr>
				    <td>Last Variation Status</td>
					<td><?=isset($row->v_AssetVStatus) ? $row->v_AssetVStatus : ''?></td>
					<td>Accessories</td>
					<td><?=isset($acclist) ? $acclist : ''?></td>
				  </tr>
				  <tr>
				    <td>Cummulative Parts Cost(RM</td>
					<!-- <td><?=isset($row->parttotal) ? 'RM'.number_format($row->parttotal,2) : 'RM0.00' ?></td> -->
					<td><?=isset($row->parttotal) ? 'RM'.$row->parttotal : 'RM0.00' ?></td><!-- buzz -->
					<td>Cummulative Labour Cost(RM)</td>
					<!-- <td><?=isset($row->labourtotal) ? 'RM'.number_format($row->labourtotal,2) : 'RM0.00' ?></td> -->
					<td><?=isset($row->labourtotal) ? 'RM'.$row->labourtotal : 'RM0.00' ?></td>
				  </tr>
				  <tr>
				    <td>Department Name</td>
					<td><?=isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?></td>
					<td>User Location Name</td>
					<td><?=isset($row->v_Location_Name) ? $row->v_Location_Name : ''?></td>
				  </tr>
				<?php endforeach; ?>
				 </table>
		<?php } else { ?>
		<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Scheduled Work Order Detail for : <?=isset($wrk_ord) ? $wrk_ord : '' ?></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				 	<?php foreach ($records as $list): ?>
				  <tr>
				    <th>Item</th>
					<th>Detail</th>
					<th>Item</th>
					<th>Detail</th>
				  </tr>
				  <tr>
				    <td>Hospital</td>
				    <?php //if ( substr($this->input->get('wrk_ord'),0,2) != 'PP' ){ ?>
				    <?php if ( !in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?><!-- buzz -->
				    <td><?=isset($list->V_hospitalcode) ? $list->V_hospitalcode : ''?></td>
				    <?php } else { ?>
					<td><?=isset($list->v_HospitalCode) ? $list->v_HospitalCode : ''?></td>
					<?php } ?>
					<td>Work Order No</td>
					<?php //if ( substr($this->input->get('wrk_ord'),0,2) != 'PP' ){ ?>
				    <?php if ( !in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?><!-- buzz -->
				    <td><?=isset($list->V_Request_no) ? $list->V_Request_no : ''?></td>
				    <?php } else { ?>
					<td><?=isset($list->v_WrkOrdNo) ? $list->v_WrkOrdNo : ''?></td>
					<?php } ?>
				  </tr>

					<?php //if ( substr($this->input->get('wrk_ord'),0,2) != 'PP' ){?>
				    <?php if ( !in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?><!-- buzz -->
				  <tr>
				    <td>Service Request No</td>
					<td><?=isset($list->V_Request_no) ? $list->V_Request_no : ''?></td>
					<td>Request Type</td>
					<td><?=isset($list->V_request_type) ? $list->V_request_type : ''?></td>
				  </tr>
				   <tr>
				    <td>Requestor</td>
					<td><?=isset($list->V_requestor) ? $list->V_requestor : ''?></td>
					<td>Requestor Designation</td>
					<td><?=isset($list->V_respon) ? $list->V_respon : ''?></td>
				  </tr>
				  <tr>
				    <td>Department</td>
					<td><?=isset($list->v_UserDeptDesc) ? $list->v_UserDeptDesc : ''?></td>
					<td>WO Date</td>
					<td><?=isset($list->D_date) ? date("d-m-Y",strtotime($list->D_date)) : ''?></td>
				  </tr>
				  <?php //} elseif (substr($this->input->get('wrk_ord'),0,2) == 'PP') { ?>
				  <?php } elseif ( in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?><!-- buzz -->
				  <tr>
				    <td>Work Order Type</td>
					<td><?=isset($list->v_jobtype) ? $list->v_jobtype : ''?></td>
					<td>Department</td>
					<td><?=isset($list->v_UserDeptDesc) ? $list->v_UserDeptDesc : ''?></td>
				  </tr>
				  <?php } ?>

				  <tr>
				    <td>Location</td>
					<td><?=isset($list->v_Location_Name) ? $list->v_Location_Name : ''?></td>
					<td>W/O Description	</td>
					<td><?=isset($list->V_summary) ? $list->V_summary : ''?></td>
				  </tr>
				  <tr>
				    <td>Asset No</td>
				    <?php //if ( substr($this->input->get('wrk_ord'),0,2) != 'PP' ){ ?>
				    <?php if ( !in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?><!-- buzz -->
				    <td><?=($list->V_Asset_no) && $list->V_Asset_no != 'N/A' ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$assetno.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state'),''.$list->v_tag_no.'' ) : ''?></td>
					<!--<td><?php echo anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$assetno.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state'), isset($list->V_Asset_no) ? $list->V_Asset_no : ''); ?></td>-->
					<?php } else { ?>
					<td><?=($list->v_Asset_no) && $list->v_Asset_no != 'N/A' ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$assetno.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state'),''.$list->v_tag_no.'' ) : ''?></td>
					<!--<td><?php echo anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$assetno.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state'), isset($list->v_tag_no) ? $list->v_tag_no : 'N/A'); ?></td>-->
					<?php } ?>
					<td>Asset Description</td>
					<td><?=isset($list->V_Asset_name) ? $list->V_Asset_name : ''?></td>
				  </tr>

				  <?php //if (substr($this->input->get('wrk_ord'),0,2) != 'PP'){//pulaupinang?>
				  <?php if ( !in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?><!-- buzz -->
				  <tr>
				    <td>Request Date</td>
					<td><?=isset($list->schedule_d) ? date("d-m-Y H:i:s",strtotime($list->schedule_d)) : ''?></td>
					<td>Acceptance By</td>
					<td><?=isset($list->v_AcceptedBy) ? $list->v_AcceptedBy : ''?></td>
				  </tr>
				  	<tr>
				    <td>Completed Date & Time</td>
					<td><?=isset($list->v_closeddate) ? date("d-m-Y H:i:s",strtotime($list->v_closeddate)) : ''?></td>
					<td>Action Taken</td>
					<td><?=isset($list->v_ActionTaken) ? $list->v_ActionTaken : ''?></td>
				  </tr>
				  <tr>
				    <td>Verifier Designation</td>
					<td><?=isset($list->V_ACCEPTED_Designation) ? $list->V_ACCEPTED_Designation : ''?></td>
					<td>Safety & Performance Test</td>
					<td><?=isset($list->v_stest) && isset($list->v_ptest) ? $list->v_stest.' & '.$list->v_ptest : (isset($list->v_stest) && !isset($list->v_ptest) ? $list->v_stest : (!isset($list->v_stest) && isset($list->v_ptest) ? $list->v_ptest : '') ) ?></td>
				  </tr>
				   <tr>
				    <td>Major Parts Replaced</td>
					<td><?=isset($partlist) ? $partlist : ''?></td>
					<td>QC Uptime</td>
					<?php
					isset($list->v_QCuptime) ? $v_QCuptime = $list->v_QCuptime : $v_QCuptime = '';
    				switch ($v_QCuptime) {
					case "QC01":
					$QCUptime = 'Equipment not made available';
					break;
    				case "QC02":
    				$QCUptime = 'Technical Personnel';
    				break;
    				case "QC03":
    				$QCUptime = 'Delay closing of Work Order';
    				break;
    				case "QC04":
    				$QCUptime = 'User Request';
    				break;
					case "QC05":
    				$QCUptime = 'Mishandling/vandalism/overload';
    				break;
    				case "QC06":
    				$QCUptime = 'Vendor Delay';
    				break;
    				case "QC07":
    				$QCUptime = 'Equipment Down';
    				break;
    				case "QC08":
    				$QCUptime = 'Breakdown of related support system';
    				break;
    				case "QC09":
    				$QCUptime = 'Wear and Tear';
    				break;
    				case "QC10":
    				$QCUptime = 'Recurring of similar fault';
    				break;
    				case "QC11":
    				$QCUptime = 'Improper procedure';
    				break;
    				case "QC12":
    				$QCUptime = 'Setting and Calibration';
    				break;
    				case "QC13":
    				$QCUptime = 'PPM kit/test equipment not available/spares';
    				break;
    				case "QC14":
    				$QCUptime = 'Defect';
    				break;
    				case "QC15":
    				$QCUptime = 'Force Majeure';
    				break;
    				case "QC16":
    				$QCUptime = 'Safety, Health and Environmental Factor';
    				break;
    				case "QC17":
    				$QCUptime = 'Downtime due to PPM';
    				break;
    				case "QC18":
    				$QCUptime = 'Downtime due to SCM';
    				break;
    				case "QC19":
    				$QCUptime = 'Equipment not functional and waiting for BER approved';
    				break;
					default:
    				$QCUptime = '';
    				}
					?>
					<td><?=$QCUptime?></td>
				  </tr>
				  <tr>
				  	<?php //if (isset($list->downtime) AND $list->downtime != 0){
									if ((isset($list->downtime)) && ($list->downtime > 0)){
						$timediff = explode(':',$list->downtime);
						$downtimehr = $timediff[0];
					}
					else{
						$downtimehr = '0';
					}
					?>
				    <td>Downtime(hrs)</td>
					<td><?=$downtimehr != '' ? $downtimehr.' hours' : ''?></td>

					<td></td>
					<td></td>
				  </tr>
				  <?php //} elseif (substr($this->input->get('wrk_ord'),0,2) == 'PP') { ?>
				  <?php } elseif ( in_array(substr($this->input->get('wrk_ord'),0,2), array('PP','RI')) ){ ?>
				  	<tr>
				    <td>Scheduled Date</td>
					<td><?=isset($list->d_DueDt) ? date("d-m-Y",strtotime($list->d_DueDt)) : ''?></td>
					<td>Agreed Date</td>
					<td><?=isset($list->d_Reschdt) ? date("d-m-Y",strtotime($list->d_Reschdt)) : isset($list->d_DueDt) ? date("d-m-Y",strtotime($list->d_DueDt)) : ''?></td>
				  </tr>

				  <tr>
				    <td>Final Reschedule Date</td>
					<td><?=isset($list->d_Reschdt) ? date("d-m-Y",strtotime($list->d_Reschdt)) : ''?></td>
					<td>Start Date</td>
					<td><?=isset($list->d_StartDt) ? date("d-m-Y",strtotime($list->d_StartDt)) : ''?></td>
				  </tr>
				  <tr>
				    <td>Completed Date</td>
					<td><?=isset($list->v_closeddate) ? date("d-m-Y",strtotime($list->v_closeddate)) : ''?></td>
					<td>Acceptance By</td>
					<td><?=isset($list->v_AcceptedBy) ? $list->v_AcceptedBy : ''?></td>
				  </tr>
				  <tr>
				    <td>Designation</td>
					<td><?=isset($list->V_ACCEPTED_Designation) ? $list->V_ACCEPTED_Designation : ''?></td>
					<td>Action Taken</td>
					<td><?=isset($list->v_ActionTaken) ? $list->v_ActionTaken : ''?></td>
				  </tr>
				   <tr>
				    <td>Safety & Performance Test</td>
					<td><?=isset($list->v_stest) && isset($list->v_ptest) ? $list->v_stest.' & '.$list->v_ptest : (isset($list->v_stest) && !isset($list->v_ptest) ? $list->v_stest : (!isset($list->v_stest) && isset($list->v_ptest) ? $list->v_ptest : '') ) ?></td>
					<?php //if (isset($list->downtime) AND $list->downtime != 0){
									if ((isset($list->downtime)) && ($list->downtime > 0)){
						$timediff = explode(':',$list->downtime);
						$downtimehr = $timediff[0];
					}
					else{
						$downtimehr = '0';
					}
					?>
					<td>Downtime(hrs)</td>
					<td><?=$downtimehr != '' ? $downtimehr.' hours' : ''?></td>
				  </tr>
				  <tr>
				  	<?php
				  	isset($list->v_QCPPM) && $list->v_QCPPM != '0' ? $v_QCPPM = $list->v_QCPPM : $v_QCPPM = '';
				  	switch ($v_QCPPM) {
					case "QC01":
					$QCname = 'Equipment not made available';
					break;
    				case "QC02":
    				$QCname = 'Technical Personnel';
    				break;
    				case "QC03":
    				$QCname = 'Delay closing of Work Order';
    				break;
    				case "QC04":
    				$QCname = 'User Request';
    				break;
					case "QC05":
    				$QCname = 'Mishandling/vandalism/overload';
    				break;
    				case "QC06":
    				$QCname = 'Vendor Delay';
    				break;
    				case "QC07":
    				$QCname = 'Equipment Down';
    				break;
    				case "QC08":
    				$QCname = 'Breakdown of related support system';
    				break;
    				case "QC11":
    				$QCname = 'Improper procedure';
    				break;
    				case "QC13":
    				$QCname = 'PPM kit/test equipment not available/spares';
    				break;
    				case "QC15":
    				$QCname = 'Force Majeure';
    				break;
    				case "QC16":
    				$QCname = 'Safety, Health and Environmental Factor';
    				break;
    				case "QC17":
    				$QCname = 'Downtime due to PPM';
    				break;
    				case "QC18":
    				$QCname = 'Downtime due to SCM';
    				break;
    				case "QC19":
    				$QCname = 'Equipment not functional and waiting for BER approved';
    				break;
					default:
    				$QCname = '';
    				}

    				isset($list->v_QCuptime) ? $v_QCuptime = $list->v_QCuptime : $v_QCuptime = '';
    				switch ($v_QCuptime) {
					case "QC01":
					$QCUptime = 'Equipment not made available';
					break;
    				case "QC02":
    				$QCUptime = 'Technical Personnel';
    				break;
    				case "QC03":
    				$QCUptime = 'Delay closing of Work Order';
    				break;
    				case "QC04":
    				$QCUptime = 'User Request';
    				break;
					case "QC05":
    				$QCUptime = 'Mishandling/vandalism/overload';
    				break;
    				case "QC06":
    				$QCUptime = 'Vendor Delay';
    				break;
    				case "QC07":
    				$QCUptime = 'Equipment Down';
    				break;
    				case "QC08":
    				$QCUptime = 'Breakdown of related support system';
    				break;
    				case "QC09":
    				$QCUptime = 'Wear and Tear';
    				break;
    				case "QC10":
    				$QCUptime = 'Recurring of similar fault';
    				break;
    				case "QC11":
    				$QCUptime = 'Improper procedure';
    				break;
    				case "QC12":
    				$QCUptime = 'Setting and Calibration';
    				break;
    				case "QC13":
    				$QCUptime = 'PPM kit/test equipment not available/spares';
    				break;
    				case "QC14":
    				$QCUptime = 'Defect';
    				break;
    				case "QC15":
    				$QCUptime = 'Force Majeure';
    				break;
    				case "QC16":
    				$QCUptime = 'Safety, Health and Environmental Factor';
    				break;
    				case "QC17":
    				$QCUptime = 'Downtime due to PPM';
    				break;
    				case "QC18":
    				$QCUptime = 'Downtime due to SCM';
    				break;
    				case "QC19":
    				$QCUptime = 'Equipment not functional and waiting for BER approved';
    				break;
					default:
    				$QCUptime = '';
    				}
				  	?>
				    <td>QC PPM</td>
					<td><?=$QCname?></td>
					<td>QC Uptime</td>
					<td><?=$QCUptime?></td>
				  </tr>
				  <tr>
				    <td>Parts Replaced</td>
					<td><?=isset($partlist) ? $partlist : ''?></td>
					<td></td>
					<td></td>
				  </tr>
				  <?php } ?>

				  <tr>
				    <td>Parts Cost(RM)</td>
					<!-- <td><?=isset($list->parttotal) ? number_format($list->parttotal,2) : ''?></td> -->
					<td><?=isset($list->parttotal) ? $list->parttotal : ''?></td><!-- buzz -->
					<td>Labour Cost(RM)</td>
					<td><?=isset($list->labourtotal) ? number_format($list->labourtotal,2) : ''?></td>
				  </tr>
				  <?php endforeach; ?>
				 </table>
				<?php } ?>
				</td>
			</tr>
		</table>
	</div>
	</div>
	<style>
	.ui-float-asset-reg{
	border:1px solid #79B6D8;
	color:black;
	border-collapse:collapse;
	width:98%;
	margin:10px auto;
	}
	.ui-float-asset-reg tr th{
	border:1px solid #79B6D8;
	background:#ccc;
	}
	.ui-float-asset-reg tr td{
	border:1px solid #79B6D8;
	padding-left:15px;
	}
	.ui-float-asset-reg tr td:nth-child(1),
	.ui-float-asset-reg tr td:nth-child(3){
	background:#eee;
	vertical-align: text-top;
	}
	.ui-float-asset-reg tr td:nth-child(2),
	.ui-float-asset-reg tr td:nth-child(4){
	width:30%;
	}
	.ui-float-asset-reg tr td a{
	color:#79B6D8;
	}
	</style>
