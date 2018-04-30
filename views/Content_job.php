<?php echo form_open('contentcontroller/jobclose_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_tab_woppm.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="13" height="40px" style="padding-left:10px;">&nbsp;</td>
			</tr>
				
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="13" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<?php if (!isset($Visit1ppm[0]->v_WrkOrdNo)) { ?>
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Job Close</span><span style="color:red; float: left; font-size: 14px; margin-top:8px; margin-left:8px;">You may not update this section until you have filled in Visit 1 information.</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update" disabled></span></td>
							<?php }	?>
							<?php if (isset($Visit1ppm[0]->v_WrkOrdNo) == TRUE) { ?>
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Job Close</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
							<?php }	?>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Start Date / Visit Date :</td>
										<td><?= isset($d_date) == TRUE ? date_format(new DateTime($d_date), 'd-m-Y H:i') : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Exact Date / Due Date :</td>
										<td><?= isset($duedate) == TRUE ? date_format(new DateTime($duedate), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Job Closing</td></tr>
									<tr>
										<td class="td-assest">Job Close Date :</td>
										<td><?= isset($recordppm[0]->d_DateDone) == TRUE ? date_format(new DateTime($recordppm[0]->d_DateDone), 'd-m-Y H:i') : 'N/A'?></td>
									</tr>
									<tr>
										<td valign="top" class="td-assest">Job Close Summary :</td>
										<td><?= isset($recordppm[0]->v_summary) == TRUE ? $recordppm[0]->v_summary : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Stoppage</td></tr>
									<tr>
										<td class="td-assest">Stoppage :</td>
										<?php if (isset($record[0]->v_Wrkordno)) { ?>
										<?php if ($record[0]->v_stoppage == 'ON') { ?>
										<td><?php echo 'Yes'; ?></td>
										<?php } ?>
										<?php if ($record[0]->v_stoppage == '') { ?>
										<td><?php echo 'No'; ?></td>
										<?php } ?>
										<?php } ?>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Summary of Time</td></tr>
									<tr>
										<td colspan="3" class="td-assest">
											<table width="100%" border="0" class="ui-sum-of-time-table">
												<tr class="ui-sum-of-time-table-tr">
													<td>Request Date</td>
													<td>Visit 1</td>
													<td>Visit 2</td>
													<td>Visit 3</td>
													<td>Stoppage</td>
													<td>Job Close Date</td>
												</tr>
												<tr class="ui-sum-of-time-table-tr">
													<td><?= isset($disp[0]->D_date) == TRUE ? date_format(new DateTime($disp[0]->D_date), 'd-m-Y H:i') : 'N/A'?></td>
													<td><?= isset ($time_comp1) == TRUE ? $time_comp1 : 'N/A'?></td>
													<td><?= isset ($time_comp2) == TRUE ? $time_comp2 : 'N/A'?></td>
													<td><?= isset ($time_comp3) == TRUE ? $time_comp3 : 'N/A'?></td>
													<td><?= isset ($Stop_time) == TRUE ? $Stop_time : 'N/A'?></td>
													<td><?= isset($record[0]->d_DateDone) == TRUE ? date_format(new DateTime($record[0]->d_DateDone), 'd-m-Y H:i') : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="td-assest">Down Time : </td>
										<td>
											<table width="100%" border="0" class="ui-sum-of-time-table">
												<tr class="ui-sum-of-time-table-tr">
													<td><?= isset ($down_time) == TRUE ? $down_time : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="td-assest">Service Time :</td>
										<td align="center">
											<table width="60%" border="0" class="ui-sum-of-time-table">
												<tr class="ui-sum-of-time-table-tr">
													<td><?= isset ($serv_time) == TRUE ? $serv_time : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Tests</td></tr>
									<tr>
										<td class="td-assest">Performance Test :</td>
										<td><?= isset($recordppm[0]->v_ptest) == TRUE ? $recordppm[0]->v_ptest : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Safety Test :</td>
										<td><?= isset($recordppm[0]->v_stest) == TRUE ? $recordppm[0]->v_stest : 'N/A' ?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Codes</td></tr>
									<tr>
										<td class="td-assest">Job Type Code :</td>
										<td><?= isset($ppmrec[0]->v_jobtype) == TRUE ? $ppmrec[0]->v_jobtype : 'N/A' ?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Quality Codes</td></tr>
									<tr>
										<?php
										isset($recordppm[0]->v_QCPPM) == TRUE ? $v_QCPPM = $recordppm[0]->v_QCPPM : $v_QCPPM = 'N/A';
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
				     					?>
										<td class="td-assest">QC PPM: </td>
										<td><?= $v_QCPPM.' '.$QCname ?></td>
									</tr>
									<tr>
										<?php
										isset($recordppm[0]->v_QCuptime) == TRUE ? $v_QCuptime = $recordppm[0]->v_QCuptime : $v_QCuptime = 'N/A';
										switch ($v_QCuptime) {
    									case "QC17":
        								$QCname = 'Downtime due to PPM';
        								break;
        								default:
				        				
				        				}
				     					?>
										<td class="td-assest">QC Uptime: </td>
										<td><?= $v_QCuptime.' '.$QCname ?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Acceptance</td></tr>
									<tr>
										<td class="td-assest">Accepted By : </td>
										<td><?= isset($recordppm[0]->v_AcceptedBy) == TRUE ? $recordppm[0]->v_AcceptedBy : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Designation : </td>
										<td><?= isset($recordppm[0]->V_ACCEPTED_Designation) == TRUE ? $recordppm[0]->V_ACCEPTED_Designation : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Accepted On : </td>
										<td><?= isset($recordppm[0]->d_AcceptedDt) == TRUE ? date_format(new DateTime($recordppm[0]->d_AcceptedDt), 'd-m-Y') : 'N/A'?></td>
									</tr>	
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Closed By </td></tr>
									<tr>
										<td class="td-assest">Technical :</td>
										<td><?= isset($PPPMpersonal[0]) == TRUE ? $PPPMpersonal[0] : 'N/A'?> <?= isset($PPPMpersonal[1]) == TRUE ? $PPPMpersonal[1] : ''?></td>
									</tr>																																			
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
		<?php  echo form_hidden('d_date',isset($d_date) ? $d_date : 0); ?>
		<?php  echo form_hidden('duedate',isset($duedate) ? $duedate : 0); ?>
		\
		<?= isset($serv_time) == TRUE ? form_hidden('serv_time',$serv_time) : '' ; ?>
		<?= isset($down_time) == TRUE ? form_hidden('down_time',$down_time) : '' ; ?>
	</div>
</div>
<?php echo form_close(); ?>