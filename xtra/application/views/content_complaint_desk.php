<table class="ui-content-form" width="100%" border="0">	
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Complaint Details</td></tr>
									<tr style="height:20px;">
										<td class="td-content">Complaint Number </td>
										<td> : <?= isset($record[0]->v_ComplaintNo) == TRUE ? $record[0]->v_ComplaintNo : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Requested By </td>
										<td> : <?= isset($record[0]->v_requestor) == TRUE ? $record[0]->v_requestor : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td style="width:20%;">Designation </td>
										<td> : <?= isset($record[0]->v_Designation) == TRUE ? $record[0]->v_Designation : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Complaint Date </td>
										<td> : <?= isset($record[0]->d_ComplaintDt) == TRUE ? date_format(new DateTime($record[0]->d_ComplaintDt), 'd-m-Y H:i') : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Priority </td>
										<td> : <?= isset($record[0]->v_Priority) == TRUE ? (($record[0]->v_Priority == 'N') ? 'Normal' : 'Emergency') : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Source </td>
										<td> : <?= isset($record[0]->v_Source) == TRUE ? $record[0]->v_Source : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td style="width:20%;">NCR No </td>
										<td> : <?= isset($record[0]->v_Reference) == TRUE ? $record[0]->v_Reference : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>VCM Month </td>
										<td> : <?= isset($vcmdate[0]) == TRUE ? $vcmdate[0] : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>VCM Year </td>
										<td> : <?= isset($vcmdate[1]) == TRUE ? $vcmdate[1] : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Summary </td>
										<td> : <?= isset($record[0]->v_Complaint) == TRUE ? $record[0]->v_Complaint : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Current Status </td>
										<td> : <?= isset($record[0]->v_ComplaintStatus) == TRUE ? $record[0]->v_ComplaintStatus : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>
									<tr style="height:20px;">
										<td>Phone Number </td>
										<td> : <?= isset($record[0]->v_Phone) == TRUE ? $record[0]->v_Phone : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>User Department :</td>
										<td> : <?= isset($record[0]->v_UserDeptCode) == TRUE ? $record[0]->v_UserDeptCode : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Location </td>
										<td> : <?= isset($record[0]->v_Location) == TRUE ? $record[0]->v_Location : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Asset</td></tr>
									<tr style="height:20px;">
										<td>Asset Number </td>
										<td> : <?= isset($record[0]->v_AssetNo) == TRUE ? $record[0]->v_AssetNo : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Asset Tag Number </td>
										<td> : <?= isset($record[0]->V_Tag_no) == TRUE ? $record[0]->V_Tag_no : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Asset Name </td>
										<td> : <?= isset($record[0]->V_Asset_name) == TRUE ? $record[0]->V_Asset_name : 'N/A'?></td>
									</tr>									
									<tr style="height:20px;">
										<td>Serial Number</td>
										<td> : <?= isset($record[0]->V_Serial_no) == TRUE ? $record[0]->V_Serial_no : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Warranty End Date </td>
										<td> : <?= isset($record[0]->V_Wrn_end_code) == TRUE ? date_format(new DateTime($record[0]->V_Wrn_end_code), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Follow Up</td></tr>
									<tr style="height:20px;">
										<td>Personnel Code </td>
										<td> : <?= isset($records[0]->v_PersonnelCode) == TRUE ? $records[0]->v_PersonnelCode : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Personnel Name </td>
										<td> : <?= isset($records[0]->v_PersonalName) == TRUE ? $records[0]->v_PersonalName : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Designation </td>
										<td> : <?= isset($records[0]->v_designation) == TRUE ? $records[0]->v_designation : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Started On </td>
										<td> : <?= isset($records[0]->d_follow_startdate) == TRUE ? date_format(new DateTime($records[0]->d_follow_startdate), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Ended On </td>
										<td> : <?= isset($records[0]->d_follow_enddate) == TRUE ? date_format(new DateTime($records[0]->d_follow_enddate), 'd-m-Y') : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Action Taken </td>
										<td> : <?= isset($records[0]->v_Remark) == TRUE ? $records[0]->v_Remark : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Root Cause </td>
										<td> : <?= isset($records[0]->v_rootcause) == TRUE ? $records[0]->v_rootcause : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Corrective Action </td>
										<td> : <?= isset($records[0]->v_correctiveact) == TRUE ? $records[0]->v_correctiveact : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td>Preventive Action </td>
										<td> : <?= isset($records[0]->v_preventiveact) == TRUE ? $records[0]->v_preventiveact : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Closing</td></tr>
									<tr style="height:20px;">
										<td>Close Date </td>
										<td> : <?= isset($record[0]->d_CompleteDt) == TRUE ? date_format(new DateTime($record[0]->d_CompleteDt), 'd-m-Y') : 'N/A'?></td>
									</tr>
								</table>