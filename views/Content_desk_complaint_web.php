
	<div class="content-workorder" style="padding-bottom:4%;">
			<table class="ui-content-middle-htd" border="0" height="" align="center">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Help Desk Complaint</span></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="2" height="30px" style="padding-left:10px; color:black;">&nbsp;</td>
			</tr>
				
			<tr class="ui-color-contents-style-1">
				<td style="padding-left:0px; margin-top:-2px;" width="40%" colspan="9" valign="top">
					<table width="98%" class="ui-content-middle-htd" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">	Complaint Details</span>&nbsp;<span style="float: right; padding-right:10px;"><!--<input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update">--><?php echo anchor ('contentcontroller/desk_complaint_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?></span></td>
						</tr>
						
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Complaint Details</td></tr>
									<tr style="height:20px;">
										<td style="width:20%;">Complaint Number</td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Requested By </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td style="width:20%;">Designation</td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Complaint Date </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>Priority </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Source </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td style="width:20%;">NCR No</td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>VCM Month </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>VCM Year </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Summary </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td style="width:20%;">Complaint Number</td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Current Status </td>
										<td>: </td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>
									<tr style="height:20px;">
										<td>Phone Number </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>User Department </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Location </td>
										<td>:</td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Asset</td></tr>
									<tr style="height:20px;">
										<td>Asset Number </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>Asset Tag Number </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Asset Name </td>
										<td>:</td>
									</tr>									
									<tr style="height:20px;">
										<td>Serial Number  </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Warranty End Date </td>
										<td>:</td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Follow Up</td></tr>
									<tr style="height:20px;">
										<td>Personnel Code </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>Personnel Name </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Designation </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>Started On </td>
										<td>:</td>
									</tr>
									<tr style="height:20px;">
										<td>Ended On </td>
										<td>: </td>
									</tr>
									<tr style="height:20px;">
										<td>Action Taken </td>
										<td>:</td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Closing</td></tr>
									<tr style="height:20px;">
										<td>Close Date </td>
										<td>: </td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1" style="height:10px;">
				<td align="center" colspan="9" style="border-bottom-left-radius:10px; border-bottom-right-radius:10px;">&nbsp;</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>