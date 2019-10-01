<?php echo form_open('contentcontroller/visitthree_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_tab_woppm.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="9" height="40px" style="padding-left:10px; color:black;"></td>
			</tr>
				
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="9" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<?php if (!isset($recordcheck[0]->v_WrkOrdNo)) { ?>
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Visit Three</span><span style="color:red; float: left; font-size: 14px; margin-top:8px; margin-left:8px;">You may not update this section until you have filled in Visit 2 information.</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update" disabled></span></td>
							<?php }	?>
							<?php if (isset($recordcheck[0]->v_WrkOrdNo) == TRUE) { ?>
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Visit Three</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
							<?php }	?>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Visit Date :</td>
										<td><?= isset($record[0]->d_Date) == TRUE ? date_format(new DateTime($record[0]->d_Date), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Start Time :</td>
										<td width="70%"><?= isset($record[0]->v_Time) == TRUE ? $record[0]->v_Time : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">End Time :</td>
										<td><?= isset($record[0]->v_Etime) == TRUE ? $record[0]->v_Etime : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Type of Work :</td>
										<td><?= isset($record[0]->type_of_work) == TRUE ? $record[0]->type_of_work : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Total Time Taken :</td>
										<td><?= isset ($time_comp) == TRUE ? $time_comp : 'N/A'?></td>
									</tr>
									<tr>
										<td valign="top" class="td-assest">Action Taken :</td>
										<td><?= isset($record[0]->v_ActionTaken) == TRUE ? $record[0]->v_ActionTaken : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Reschedule</td></tr>
									<tr>
										<td class="td-assest">Reschedule Date :</td>
										<td><?= isset($record[0]->d_Reschdt) == TRUE ? date_format(new DateTime($record[0]->d_Reschdt), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Reschedule Reason :</td>
										<td><?= isset($record[0]->v_Reschreason) == TRUE ? $record[0]->v_Reschreason : 'N/A'?></td>
									</tr>
									<tr>
										<td valign="top" class="td-assest">Reschedule Authorised By :</td>
										<td><?= isset($record[0]->v_ReschAuthBy) == TRUE ? $record[0]->v_ReschAuthBy : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Personnel</td></tr>
									<tr>
										<td colspan="3">
											<table class="ui-mobile-table-desk ui-left_mobile" style="color:black; width:100%; font-weight: normal;" border="0">
												<tr>
													<td colspan="2" align="center" class="bg-navy">Technical In Charge 1</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Code</td>
													<td><?= isset($P1personal[0]) == TRUE ? $P1personal[0] : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($P1personal[1]) == TRUE ? $P1personal[1] : ''?></td>
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
													<td colspan="2" align="center" class="bg-navy">Technical In Charge 2</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Code</td>
													<td><?= isset($P2personal[0]) == TRUE ? $P2personal[0] : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($P2personal[1]) == TRUE ? $P2personal[1] : ''?></td>
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
													<td colspan="2" align="center" class="bg-navy">Technical In Charge 3</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Code</td>
													<td><?= isset($P3personal[0]) == TRUE ? $P3personal[0] : 'N/A'?> </td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($P3personal[1]) == TRUE ? $P3personal[1] : ''?></td>
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
													<td colspan="2" align="center" class="bg-navy">Part Replaced</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($record[0]->v_PartName) == TRUE ? $record[0]->v_PartName : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Hours or RM</td>
													<td>RM <?= isset($PartRM) == TRUE ? $PartRM : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Rate</td>
													<td><?= isset($record[0]->n_PartAmount) == TRUE ? $record[0]->n_PartAmount : 'N/A'?></td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Total</td>
													<td>RM <?= isset($PartTrate) == TRUE ? $PartTrate : 'N/A'?></td>
												</tr>
												<tr>
													<td colspan="2" align="center" class="bg-navy">Vendor Parts (Total)</td>
												</tr>
												<tr>
													<td class="td-assest" valign="top">Name</td>
													<td><?= isset($Vendor[0]) == TRUE ? $Vendor[0] : 'N/A'?> <?= isset($Vendor[1]) == TRUE ? $Vendor[1] : ''?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td style="width:24%;">&nbsp;</td>
										<td>
											<table style="color:black;" width="100%">
												<tr style="font-weight: bold;">
													<td width="15%">Code</td>
													<td width="35%">Name</td>
													<td width="20%">Hours or RM	</td>
													<td width="15%">Rate</td>
													<td width="15%">Total</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Technical In Charge 1 :</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="15%"><?= isset($P1personal[0]) == TRUE ? $P1personal[0] : 'N/A'?></td>
													<td width="35%"><?= isset($P1personal[1]) == TRUE ? $P1personal[1] : ''?></td>
													<td width="20%"><?= isset($P1time[0]) == TRUE ? $P1time[0] : ''?> hr <?= isset($P1time[1]) == TRUE ? $P1time[1] : ''?> mins</td>
													<td width="15%">RM <?= isset($P1Rate) == TRUE ? $P1Rate : 'N/A'?></td>
													<td width="15%">RM <?= isset($P1Trate) == TRUE ? $P1Trate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Technical In Charge 2 :</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="15%"><?= isset($P2personal[0]) == TRUE ? $P2personal[0] : 'N/A'?></td>
													<td width="35%"><?= isset($P2personal[1]) == TRUE ? $P2personal[1] : ''?></td>
													<td width="20%"><?= isset($P2time[0]) == TRUE ? $P2time[0] : ''?> hr <?= isset($P2time[1]) == TRUE ? $P2time[1] : ''?> mins</td>
													<td width="15%">RM <?= isset($P2Rate) == TRUE ? $P2Rate : 'N/A'?></td>
													<td width="15%">RM <?= isset($P2Trate) == TRUE ? $P2Trate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Technical In Charge 3 :	</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="15%"><?= isset($P3personal[0]) == TRUE ? $P3personal[0] : 'N/A'?></td>
													<td width="35%"><?= isset($P3personal[1]) == TRUE ? $P3personal[1] : ''?></td>
													<td width="20%"><?= isset($P3time[0]) == TRUE ? $P3time[0] : ''?> hr <?= isset($P2time[1]) == TRUE ? $P3time[1] : ''?> mins</td>
													<td width="15%">RM <?= isset($P3Rate) == TRUE ? $P3Rate : 'N/A'?></td>
													<td width="15%">RM <?= isset($P3Trate) == TRUE ? $P3Trate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Part Replaced :</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="15%"></td>
													<td width="35%"><?= isset($record[0]->v_PartName) == TRUE ? $record[0]->v_PartName : 'N/A'?></td>
													<td width="20%">RM<?= isset($PartRM) == TRUE ? $PartRM : 'N/A'?></td>
													<td width="15%"><?= isset($record[0]->n_PartAmount) == TRUE ? $record[0]->n_PartAmount : 'N/A'?></td>
													<td width="15%">RM <?= isset($PartTrate) == TRUE ? $PartTrate : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;" class="ui-left_web">
										<td>Vendor Parts (Total) :</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="15%"><?= isset($Vendor[0]) == TRUE ? $Vendor[0] : 'N/A'?></td>
													<td width="35%"><?= isset($Vendor[1]) == TRUE ? $Vendor[1] : ''?></td>
													<td width="20%"></td>
													<td width="15%"></td>
													<td width="15%"></td>
												</tr>
											</table>
										</td>
									</tr>																																									
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
		<?php  echo form_hidden('vppm',$this->input->get('vppm')); ?>
	</div>
</div>
<?php echo form_close(); ?>