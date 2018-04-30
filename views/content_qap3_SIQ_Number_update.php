<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Shortfall In Quality</b></td>
			</tr>
			<tr>
				<td class="td-assest">SIQ Number: </td>
				<td><?php echo $this->input->get('ssiq') ?></td>
			</tr>
			<tr>
				<td class="td-assest">SIQ Date: </td>			
				<td><?= isset($records[0]->siq_date) ? date_format(new DateTime($records[0]->siq_date), 'd-m-Y') : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">SIQ Period: &nbsp;</td>
				<td><?= isset($records[0]->siq_month) && isset($records[0]->siq_year) ? $records[0]->siq_month.' '.$records[0]->siq_year : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Type Code:&nbsp;</td>
				<td><?= isset($records[0]->type_code) ? $records[0]->type_code : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Group:&nbsp;</td>
				<td><?= isset($records[0]->siq_asset) ? (isset($assetgroup[0]->group_desc) ? $records[0]->siq_asset.$assetgroup[0]->group_desc : $records[0]->siq_asset) : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Indicator Code: &nbsp;</td>
				<td><?= isset($records[0]->ind_code) ? $records[0]->ind_code.' '.$records[0]->ind_sdesc.' ('.$records[0]->ind_ldesc.')' : '' ?></td>
			</tr>
			<tr class="nonetr"><td style="height:30px;" colspan="2" valign="bottom"><b>Work Orders In This SIQ</b></td>
			</tr>
			<tr>
				<td style="" width="" colspan="2" valign="top" align="center">
					<div class="ui-left_web">
					<table class="ui-desk-style-table" style="color:black; background:white; text-align:center;" cellpadding="4" cellspacing="0" width="100%">      			
	    				<tr class="ui-menu-color-header" style="color:white; font-weight:;" align="center">
							<td >Work Order</td>
							<td >Work Order Date</td>
							<td >QC Code</td>
							<td >QC Description</td>
						</tr>
						<?php $numrow=1; foreach($SIQWOlist as $row):?>
	    				<?php 
	    				//$v_QCuptime = explode(' - ',$row->v_QCuptime);
						//$v_QCPPM = explode(' - ',$row->v_QCPPM);
						//print_r($v_QCuptime);
	    				?>  
						<tr align="center" style=" font-size:12px; font-weight:;">
							<?= $numrow%2==0 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
							<?php if ($this->input->get('siq') == 1){ ?>
							<td width="25%" style=""><?php echo anchor ('contentcontroller/jobclose?wrk_ord='.$row->work_order_no.'&vppm=5',''.$row->work_order_no.'' ) ?></td>
							<?php } else { ?>
							<td width="25%" style=""><?php echo anchor ('contentcontroller/jobclose?wrk_ord='.$row->work_order_no.'&wo=6',''.$row->work_order_no.'' ) ?></td>
							<?php } ?>
							<td width="25%"><?= isset($row->wo_date) ? date_format(new DateTime($row->wo_date), 'd-m-Y') : '' ?></td>
							<?php if ($records[0]->ind_code == 'BES05') { ?>
							<?php isset($row->qc_ppm) ? $QC = $row->qc_ppm : $QC = '' ?>
							<td width="25%"><?= $QC ?></td>
							<?php } ?>
							<?php if ($records[0]->ind_code == 'BES06') { ?>
							<?php  isset($row->qc_uptime) ? $QC = $row->qc_uptime : $QC = "<span style=color:red;>".'NO QC CODE'."</span>"  ?>
							<td width="25%"><?= $QC ?></td>
							<?php } ?>
							<?php
										
										switch ($QC) {
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
				        				case "QC09":
				        				$QCname = 'Wear and Tear';
				        				break;
				        				case "QC10":
				        				$QCname = 'Recurring of similar fault';
				        				break;
				        				case "QC11":
				        				$QCname = 'Improper procedure';
				        				break;
				        				case "QC12":
				        				$QCname = 'Setting and Calibration';
				        				break;
				        				case "QC13":
				        				$QCname = 'PPM kit/test equipment not available/spares';
				        				break;
				        				case "QC14":
				        				$QCname = 'Defect';
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
				     					?>
							<td><?= $QCname ?></td>
						</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
					</table>
				</div>
				<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<tr>
							<td colspan="2" class="t-header ui-middle-color" style="color:white;"> Work Orders In This SIQ</td>
						</tr>
						<?php $numrow=1; foreach($SIQWOlist as $row):?>
	    				<?php 
	    				//$v_QCuptime = explode(' - ',$row->v_QCuptime);
						//$v_QCPPM = explode(' - ',$row->v_QCPPM);
						//print_r($v_QCuptime);
	    				?> 
	    				<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr> 
						<?php if ($this->input->get('siq') == 1){ ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >Work Order</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/wo?wrk_ord='.$row->work_order_no.'&vppm=0',''.$row->work_order_no.'' ) ?></td>
							</tr>	
							<?php } else { ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >Work Order</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/workorderlist?wrk_ord='.$row->work_order_no.'&wo=0',''.$row->work_order_no.'' ) ?></td>
							</tr>
							<?php } ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >Work Order Date</td>
								<td class="td-desk">: <?= isset($row->wo_date) ? date_format(new DateTime($row->wo_date), 'd-m-Y') : '' ?></td>
							</tr>
							<?php if ($records[0]->ind_code == 'BES05') { ?>
							<?php isset($row->qc_ppm) ? $QC = $row->qc_ppm : $QC = '' ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >QC Code</td>
								<td class="td-desk">: <?= $QC ?></td>
							</tr>
							<?php } ?>
							<?php if ($records[0]->ind_code == 'BES06') { ?>
							<?php  isset($row->qc_uptime) ? $QC = $row->qc_uptime : $QC = "<span style=color:red;>".'NO QC CODE'."</span>"  ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >QC Code</td>
								<td class="td-desk">: <?= $QC ?></td>
							</tr>
							<?php } ?>
							<?php
										
										switch ($QC) {
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
				        				case "QC09":
				        				$QCname = 'Wear and Tear';
				        				break;
				        				case "QC10":
				        				$QCname = 'Recurring of similar fault';
				        				break;
				        				case "QC11":
				        				$QCname = 'Improper procedure';
				        				break;
				        				case "QC12":
				        				$QCname = 'Setting and Calibration';
				        				break;
				        				case "QC13":
				        				$QCname = 'PPM kit/test equipment not available/spares';
				        				break;
				        				case "QC14":
				        				$QCname = 'Defect';
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
				     					?>
				     		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >QC Description</td>
								<td class="td-desk">: <?= $QCname ?></td>
							</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
				</table>
			</div>
				</td>
			</tr>
			<tr class="nonetr">
				<td class="" colspan="2"></td>
			</tr>
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color" colspan="2"><span style="float: left; margin-top:8px; font-weight: bold;">Corrective Action Reports</span><span style="float: right; padding-right:10px;"><?php echo anchor ('contentcontroller/qap3_SIQ_number_Create?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&siq='.$this->input->get('siq'), '<button type="button" class="btn-button btn-primary-button" style="width:100%">CREATE CAR</button>'); ?></span></td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="ui-left_web">
					<table class="ui-content-middle-menu-workorder3" style="color:black;"width="98%">
						<?php if (!empty($SIQ_CARdisp)) { ?>
						<tr class="ui-menu-color-header" style="color:white;">
							<th></th>
							<th>CAR Number</th>
							<th>Status</th>
							<th>Action Time Frame</th>
							<th>Indicator</th>
							<th>QC </th>
							<th>Problem Statement </th>
						</tr>

						<tr>
						<?php $numrow=1; foreach($SIQ_CARdisp as $row):?>
						<?= $numrow%2==0 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
						<?php 
						$CarStartDate = date_format(new DateTime($row->car_from), 'd-m-Y');
							if ($row->status == 1){
								$Status = "<span style=color:green;>".'CLOSED'."</span>";
								$CarEndDate = date_format(new DateTime($row->car_to), 'd-m-Y');
							}
							else{
								$Status = "<span style=color:red;>".'OPEN'."</span>";
								if ($row->car_to < date('Y-m-d')){
									$CarEndDate = "<span style=color:red;>".date_format(new DateTime($row->car_to), 'd-m-Y')."</span>";
								}
							}
						?>
							<td><?= $numrow?></td>
							<td><?php echo anchor ('contentcontroller/qap3_car?ssiq='.$this->input->get('ssiq').'&carid='.$row->car_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&car=1', $row->car_no );?></td>
							<td><?= $Status?></td>
							<td><?= $CarStartDate.' - '.$CarEndDate?></td>
							<td><?= isset($row->ind_code) ? $row->ind_code : '' ?></td>
							<td><?= isset($row->qc_code) ? $row->qc_code : '' ?></td>
							<td><?= isset($row->car_desc) ? $row->car_desc : '' ?></td>
						</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
						<?php } else { ?>
						<tr class="" height="200px">
							<td class="" colspan="7" align="center"><span style="color:red;">NO CAR HAS BEEN CREATED FOR THIS SIQ.</span></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
							<?php if (!empty($SIQ_CARdisp)) { ?>
							<?php $numrow=1; foreach($SIQ_CARdisp as $row):?>
							<?php 
							$CarStartDate = date_format(new DateTime($row->car_from), 'd-m-Y');
								if ($row->status == 1){
									$Status = "<span style=color:green;>".'CLOSED'."</span>";
									$CarEndDate = date_format(new DateTime($row->car_to), 'd-m-Y');
								}
								else{
									$Status = "<span style=color:red;>".'OPEN'."</span>";
									if ($row->car_to < date('Y-m-d')){
										$CarEndDate = "<span style=color:red;>".date_format(new DateTime($row->car_to), 'd-m-Y')."</span>";
									}
								}
							?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$numrow?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >SIQ Number</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/qap3_car?ssiq='.$this->input->get('ssiq').'&carid='.$row->car_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&car=1', $row->car_no );?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Type Code</td>
								<td class="td-desk">: <?= $CarStartDate.' - '.$CarEndDate?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>CAR Number</td>
								<td class="td-desk">: <?= isset($row->ind_code) ? $row->ind_code : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>QC Code</td>
								<td class="td-desk">: <?= isset($row->qc_code) ? $row->qc_code : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Asset Code</td>
								<td class="td-desk">: <?= isset($row->car_desc) ? $row->car_desc : '' ?></td>
							</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
						 	<?php } else { ?>
						<tr class="" height="200px">
							<td colspan="3" class="ui-color-color-color default-NO" align="center">NO CAR HAS BEEN CREATED FOR THIS SIQ.</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="2">
				</td>
			</tr>
		</table>				
	</div>
</div>