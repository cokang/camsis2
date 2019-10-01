<?php echo form_open('contentcontroller/response_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_wrk_ord.php';?>
			<tr class="ui-color-contents-style-1 ui-left_web">
				<td colspan="11" height="40px" style="padding-left:10px;">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td style="padding-left:0px; margin-top:-2px;" width="40%" colspan="11" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="" border="0">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Response</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
						</tr>
						<tr >
							<td class="pd-bttm">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Request Date :</td>
										<td><?= isset($disp[0]->D_date) == TRUE ? date_format(new DateTime($disp[0]->D_date), 'd-m-Y H:i') : 'N/A'?></td>
									</tr>
									<tr>
										<td valign="top" class="td-assest">Priority :</td>
										<?php if (isset($disp[0]->V_priority_code)) { ?>
											<?php if ($disp[0]->V_priority_code == 'Normal') { ?>
										<td><span style="color:green;"><?= isset($disp[0]->V_priority_code) == TRUE ? $disp[0]->V_priority_code : 'N/A'?> - MUST BE RESPONDED WITHIN 2 HOURS </span></td>
									    <?php } ?>
									    <?php if ($disp[0]->V_priority_code == 'Emergency') { ?>
										<td><span style="color:red;"><?= isset($disp[0]->V_priority_code) == TRUE ? $disp[0]->V_priority_code : 'N/A'?> - MUST BE RESPONDED NOW </span></td>
									    <?php } ?>
									    <?php } ?>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Response Details</td></tr>
									<tr>
										<td class="td-assest">Response Date :</td>
										<td><?= isset($record[0]->d_Date) == TRUE ? date_format(new DateTime($record[0]->d_Date), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Start Time :</td>
										<td><?= isset($record[0]->v_Time) == TRUE ? $record[0]->v_Time : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">End Time :</td>
										<td><?= isset($record[0]->v_Etime) == TRUE ? $record[0]->v_Etime : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Total Time Taken To Response :</td>
										<td><span style="color:green;"><?= isset ($res_time) == TRUE ? $res_time : 'N/A'?>.</span></td>
									</tr>
									<tr>
										<td class="td-assest">Response Completed In: </td>
										<td><?= isset ($time_comp) == TRUE ? $time_comp : 'N/A'?>.</td>
									</tr>
									<tr>
										<td class="td-assest">Response Finding :	 </td>
										<td><?= isset($record[0]->v_ActionTaken) == TRUE ? $record[0]->v_ActionTaken : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Personnel</td></tr>
									<tr>
										<td colspan="3">
											<table class="ui-mobile-table-desk ui-left_mobile" style="color:black; width:100%; font-weight: normal;" border="0">
												<tr>
													<td colspan="2" align="center" class="bg-navy">Responder 1 (must)</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($P1personal[0]) == TRUE ? $P1personal[0] : 'N/A'?> <?= isset($P1personal[1]) == TRUE ? $P1personal[1] : ''?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Hours or RM</td>
													<td><?= isset($P1time[0]) == TRUE ? $P1time[0] : 'N/A'?> hr <?= isset($P1time[1]) == TRUE ? $P1time[1] : 'N/A'?> mins</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Rate</td>
													<td>RM <?= isset($P1Rate) == TRUE ? $P1Rate : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Total</td>
													<td>RM <?= isset($P1Trate) == TRUE ? $P1Trate : 'N/A'?></td>
												</tr>
												<tr>
													<td colspan="2" align="center" class="bg-navy">Responder 2 (optional)</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($P2personal[0]) == TRUE ? $P2personal[0] : 'N/A'?> <?= isset($P2personal[1]) == TRUE ? $P2personal[1] : ''?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Hours or RM</td>
													<td><?= isset($P2time[0]) == TRUE ? $P2time[0] : 'N/A'?> hr <?= isset($P2time[1]) == TRUE ? $P2time[1] : 'N/A'?> mins</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Rate</td>
													<td>RM <?= isset($P2Rate) == TRUE ? $P2Rate : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Total</td>
													<td>RM <?= isset($P2Trate) == TRUE ? $P2Trate : 'N/A'?></td>
												</tr>
												<tr>
													<td colspan="2" align="center" class="bg-navy">Responder 3 (optional)</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($P3personal[0]) == TRUE ? $P3personal[0] : 'N/A'?> <?= isset($P3personal[1]) == TRUE ? $P3personal[1] : ''?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Hours or RM</td>
													<td><?= isset($P3time[0]) == TRUE ? $P3time[0] : 'N/A'?> hr <?= isset($P3time[1]) == TRUE ? $P3time[1] : 'N/A'?> mins</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Rate</td>
													<td>RM <?= isset($P3Rate) == TRUE ? $P3Rate : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Total</td>
													<td>RM <?= isset($P3Trate) == TRUE ? $P3Trate : 'N/A'?></td>
												</tr>
												<tr>
													<td colspan="2" align="center" class="bg-navy">Vendor Parts (Total)</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($Vendor[0]) == TRUE ? $Vendor[0] : 'N/A'?> <?= isset($Vendor[1]) == TRUE ? $Vendor[1] : ''?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Hours or RM</td>
													<td>RM <?= isset($VRM) == TRUE ? $VRM : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Rate</td>
													<td><?= isset($record[0]->n_vRate) == TRUE ? $record[0]->n_vRate : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Total</td>
													<td>RM <?= isset($VTrate) == TRUE ? $VTrate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td style="width:30%;">&nbsp;</td>
										<td>
											<table style="color:black;" width="100%">
												<tr style="font-weight: bold;">
													<td width="50%">Name</td>
													<td width="20%">Hours or RM	</td>
													<td width="15%">Rate</td>
													<td width="15%">Total</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Responder 1 (must)</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="50%"><?= isset($P1personal[0]) == TRUE ? $P1personal[0] : 'N/A'?> <?= isset($P1personal[1]) == TRUE ? $P1personal[1] : ''?></td>
													<td width="20%"><?= isset($P1time[0]) == TRUE ? $P1time[0] : 'N/A'?> hr <?= isset($P1time[1]) == TRUE ? $P1time[1] : 'N/A'?> mins</td>
													<td width="15%">RM <?= isset($P1Rate) == TRUE ? $P1Rate : 'N/A'?></td>
													<td width="15%">RM <?= isset($P1Trate) == TRUE ? $P1Trate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Responder 2 (optional)</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="50%"><?= isset($P2personal[0]) == TRUE ? $P2personal[0] : 'N/A'?> <?= isset($P2personal[1]) == TRUE ? $P2personal[1] : ''?></td>
													<td width="20%"><?= isset($P2time[0]) == TRUE ? $P2time[0] : 'N/A'?> hr <?= isset($P2time[1]) == TRUE ? $P2time[1] : 'N/A'?> mins</td>
													<td width="15%">RM <?= isset($P2Rate) == TRUE ? $P2Rate : 'N/A'?></td>
													<td width="15%">RM <?= isset($P2Trate) == TRUE ? $P2Trate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Labor Cost (Internal Vendor)</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="50%"><?= isset($P3personal[0]) == TRUE ? $P3personal[0] : 'N/A'?> <?= isset($P3personal[1]) == TRUE ? $P3personal[1] : ''?></td>
													<td width="20%"><?= isset($P3time[0]) == TRUE ? $P3time[0] : 'N/A'?> hr <?= isset($P3time[1]) == TRUE ? $P3time[1] : 'N/A'?> mins</td>
													<td width="15%">RM <?= isset($P3Rate) == TRUE ? $P3Rate : 'N/A'?></td>
													<td width="15%">RM <?= isset($P3Trate) == TRUE ? $P3Trate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Vendor Parts (Total)</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="50%"><?= isset($Vendor[0]) == TRUE ? $Vendor[0] : 'N/A'?> <?= isset($Vendor[1]) == TRUE ? $Vendor[1] : ''?></td>
													<td width="20%">RM <?= isset($VRM) == TRUE ? $VRM : 'N/A'?></td>
													<td width="15%"><?= isset($record[0]->n_vRate) == TRUE ? $record[0]->n_vRate : 'N/A'?></td>
													<td width="15%">RM <?= isset($VTrate) == TRUE ? $VTrate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">User Verification</td></tr>
									<tr>
										<td class="td-assest">Verified By :	 </td>
										<td><?= isset($record[0]->v_ReschAuthBy) == TRUE ? $record[0]->v_ReschAuthBy : 'N/A'?></td>
									</tr>																																									
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php echo form_hidden ('wrk_ord',$this->input->get('wrk_ord')) ?>
	</div>
</div>
<?php echo form_close(); ?>