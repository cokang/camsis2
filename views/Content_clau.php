<?php echo form_open('contentcontroller/clause_update?wrk_ord='.$wrk_ord) ?>
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
							<?php if ($record) { ?>
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Clause Summary</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
							<?php } else { ?>
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Clause Summary</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Add"></span></td>
							<?php } ?>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<?php if ($record) { ?>
									<tr>
										<td class="td-assest" valign="top">Clause No./Indicator: </td>
										<td><?=isset($record[0]->clause_no) ? $record[0]->clause_no : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Clause Date: </td>
										<td><?=isset($record[0]->date_issued) ? date("d-m-Y",strtotime($record[0]->date_issued)) : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Closing Main Status: </td>
										<td><?=isset($record[0]->close_main_status) ? $record[0]->close_main_status : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Notice Letter No.: </td>
										<td><?=isset($record[0]->ref_no_notice) ? $record[0]->ref_no_notice : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Clause Cancel/ <br/>Feedback No: </td>
										<td><?=isset($record[0]->close_ref_no) ? $record[0]->close_ref_no : 'N/A'?></td>
									</tr>	
									<tr>
										<td class="td-assest" valign="top">Clause Cancel/ <br/>Feedback Date : </td>
										<td><?=isset($record[0]->close_date) ? date("d-m-Y",strtotime($record[0]->close_date)) : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Medivest Received Date : </td>
										<td><?=isset($record[0]->date_medivest) ? date("d-m-Y",strtotime($record[0]->date_medivest)) : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Third Party service/part Delivery Date : </td>
										<td><?=isset($record[0]->expect_deli_dt) ? date("d-m-Y",strtotime($record[0]->expect_deli_dt)) : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">MNE Debit Note Date : </td>
										<td><?=isset($record[0]->mon_debit_mne) ? date("d-m-Y",strtotime($record[0]->mon_debit_mne)) : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Remarks MO : </td>
										<td><?=isset($record[0]->remrk_sho_mo) ? $record[0]->remrk_sho_mo : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Clause Choronology : </td>
										<td><?=isset($record[0]->clause_chrono) ? $record[0]->clause_chrono : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">User/Pengarah/Engineer/LO's Name & Discussion Date : </td>
										<td><?=isset($record[0]->discussion) ? $record[0]->discussion : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">LPO No. & Part Description : </td>
										<td><?=isset($record[0]->lpo_no_desc) ? $record[0]->lpo_no_desc : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Clause Root Cause : </td>
										<td><?=isset($record[0]->root_cause) ? $record[0]->root_cause : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Clause Remark : </td>
										<td><?=isset($record[0]->clause_rmk) ? $record[0]->clause_rmk : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Dispute Reason : </td>
										<td><?=isset($record[0]->reason_dispute) ? $record[0]->reason_dispute : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Amount (RM) : </td>
										<td><?=isset($record[0]->amount) ? number_format($record[0]->amount,2) : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Vendor : </td>
										<td><?=isset($record[0]->vendor_name) ? $record[0]->vendor_name : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Dispute (Yes/No) : </td>
										<td><?=isset($record[0]->dispute) ? $record[0]->dispute : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Clause Implemented (Yes/No) : </td>
										<td><?=isset($record[0]->clause_implemen) ? $record[0]->clause_implemen : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">John Name : </td>
										<td><?=isset($record[0]->john_nm) ? $record[0]->john_nm : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Director Name : </td>
										<td><?=isset($record[0]->director_nm) ? $record[0]->director_nm : 'N/A'?></td>
									</tr>
									<?php } else { ?>
									<tr height="200px">
										<td style="color:red; text-align:center;" colspan="2">CLAUSE SUMMARY DETAILS NOT FOUND FOR THIS WORK ORDER.</td>
									</tr>
									<?php } ?>																																							
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>