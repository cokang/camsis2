<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>
			<?php include 'print_form_menu.php';?>
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Warranty Notification Form</span></b>
							</td>
						</tr><tr>
							<td class="ui-desk-style-table" height="" valign="top">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td valign="2" class="p-left">Date : </td>
										<td rowspan="2" align="right"><textarea class="Input n_com" name="n_to" readonly> TO : </textarea></td>
									</tr>
									<tr>
										<td valign="top" class="p-left">Refence No : </td>
									</tr>
								</table>
							</td>
						</tr>
						<tr class="ui-color-contents-style-1 nonetr">
							<td colspan="15" height="10px">&nbsp;</td>
						</tr>
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Equipment Details</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwned_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>-->
							</td>
						</tr>
						<tr class="tbl-white">
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="p-left" colspan="2">SERVICE TYPE : <input type="checkbox" id="" value="ON" <?= isset($cfes) ? $cfes : ''	?> disabled> FES <input type="checkbox" id="" value="ON" <?= isset($cbes) ? $cbes : ''	?>  disabled> BES </td>
									</tr>
									<tr>
										<td class="p-left">Asset Name</td>
										<td>: <?= isset($records[0]->V_Asset_name) ? $records[0]->V_Asset_name : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">Tag No</td>
										<td>: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">Model</td>
										<td>: <?= isset($records[0]->V_Model_no) ? $records[0]->V_Model_no : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">Serial No</td>
										<td>: <?= isset($records[0]->V_Serial_no) ? $records[0]->V_Serial_no : 'NA'	?></td>
									</tr>																																								
									<tr>
										<td class="p-left">Department</td>
										<td>: <?= isset($records[0]->V_User_Dept_code) ? $records[0]->V_User_Dept_code : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">Location</td>
										<td>: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">Warranty Start Date</td>
										<td>: <?= isset($records[0]->D_Register_date) ? date('d-m-Y',strtotime($records[0]->D_Register_date)) : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">Warranty End Date</td>
										<td>: <?= isset($records[0]->V_Wrn_end_code) ? date('d-m-Y',strtotime($records[0]->V_Wrn_end_code)) : 'NA'	?></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr class="ui-color-contents-style-1 nonetr">
							<td colspan="15" height="10px">&nbsp;</td>
						</tr>
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Maintenance Type</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwnmt_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON" disabled> Preventive Maintenance </td>
										<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON" disabled> Breakdown Date </td>
									</tr>
									<tr>
										<td class="p-left" style="padding-left:37px;">Schedule Week</td>
										<td>:</td>
										<td class="p-left" style="padding-left:37px;">Reported Date</td>
										<td>:</td>
									</tr>
									<tr>
										<td class="p-left" style="padding-left:37px;">Work Order No</td>
										<td>:</td>
										<td class="p-left" style="padding-left:37px;">Work Order No</td>
										<td>:</td>
									</tr>
									<tr>
										<td class="p-left" colspan="2" height="70px" valign="top">Brief Summary on service required :</td>
										<td></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr class="ui-color-contents-style-1 nonetr">
							<td colspan="15" height="10px">&nbsp;</td>
						</tr>
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Warranty Provider</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwnwpa_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="p-left" colspan="4" height="40px">Notice to Warranty Provider</td>
										<td></td>
									</tr>	
									<tr>
										<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON" disabled> Send via Fax</td>
										<td class="p-left">Date :</td>
									</tr>
									<tr>
										<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON" disabled> Send by Mail</td>
										<td class="p-left">Date :</td>
										<td align="center">
											<table class="wn_top ui-left_web">
												<tr>
													<td>Warrantry Provider's Acknowledgement</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="p-left" colspan="4" height="40px">Notification Issued By  :</td>
										<td></td>
									</tr>
									<tr>
										<td class="p-left">Name</td>
										<td>:</td>
									</tr>
									<tr>
										<td class="p-left">Designation</td>
										<td>:</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr class="ui-color-contents-style-1 nonetr">
							<td colspan="15" height="10px">&nbsp;</td>
						</tr>
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Work Completion Validation</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwnwc_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON" disabled>Work Not Completed</td>
										<td class="p-left" align="right">Justification</td>
										<td>:</td>
									</tr>
									<tr>
										<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
											<table class="wnctable" border="1" style="text-align:center;" align="center">
												<tr >
													<th width="30px">No</th>
													<th width="100px">Date</th>
													<th>Comments</th>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>

											</table>

										</td>
									</tr>
									<tr>
										<td class="p-left" colspan="4"><input type="checkbox" id="" value="ON" disabled> Work Completed</td>
									</tr>
									<tr>
										<td class="p-left" style="padding-left:37px;">Job Sheet No</td>
										<td>:</td>
										<td class="p-left" style="padding-left:37px;">Verified BY</td>
										<td width="30%"><span style="padding-right:37px;">:</span> 
											<table class="wn_top ui-left_web" style="width:200px; margin-left:15px; font-size:9px;">
												<tr>
													<td align="center">(sign & name)</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="p-left" style="padding-left:37px;">Date Completed</td>
										<td>:</td>
										<td class="p-left" style="padding-left:37px;">Designation</td>
										<td>:</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
