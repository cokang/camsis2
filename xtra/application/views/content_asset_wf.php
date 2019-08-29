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
							<b><span class="textmenu" style="float:left;">Detail of the Equipment / System</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwfes_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="ui-desk-style-table" valign="top">
											<table class="ui-content-form" width="100%" border="0">
												<tr>
													<td class="p-left">Tag No</td>
													<td >: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
												</tr>
												<tr>
													<td class="p-left">Equipment /System Name</td>
													<td >: <?= isset($records[0]->V_Asset_name) ? $records[0]->V_Asset_name : 'NA'	?></td>
												</tr>
												<tr>
													<td class="p-left">Model</td>
													<td >: <?= isset($records[0]->V_Model_no) ? $records[0]->V_Model_no : 'NA'	?></td>
												</tr>
												<tr>
													<td class="p-left">Serial No</td>
													<td >: <?= isset($records[0]->V_Serial_no) ? $records[0]->V_Serial_no : 'NA'	?></td>
												</tr>
												<tr>
													<td class="p-left">Deparment</td>
													<td >: <?= isset($records[0]->V_User_Dept_code) ? $records[0]->V_User_Dept_code : 'NA'	?></td>
												</tr>
												<tr>
													<td class="p-left">Location</td>
													<td >: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Warranty Period</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwfwp_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="p-left">Start Date</td>
										<td >: <?= isset($records[0]->D_Register_date) ? date('d-m-Y',strtotime($records[0]->D_Register_date)) : 'NA'	?></td>
									</tr>
									<tr>
										<td class="p-left">End date</td>
										<td >: <?= isset($records[0]->V_Wrn_end_code) ? date('d-m-Y',strtotime($records[0]->V_Wrn_end_code)) : 'NA'	?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">List of Detect</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwflod_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
											<table class="wnctable" border="1" style="text-align:center;" align="center">
												<tr >
													<th width="30px">No</th>
													<th width="100px">Date</th>
													<th width="">Defects Identified</th>
													<th width="130px">Remarks</th>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
											<table class="wnctable" border="1" style="text-align:center;" align="center">
												<tr >
													<th colspan="4" style="font-size:15px;">Verification of Head / Unit</th>
												</tr>
												<tr >
													<th width="50%" colspan="2">Internal Data Validation</th>
													<th width="" colspan="2">Acceptance by Customer</th>
												</tr>
												<tr>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Signature </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Signature </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
												</tr>
												<tr>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Name </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Name </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
												</tr>
												<tr>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Designation </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Designation </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
												</tr>
												<tr>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Date </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
													<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Date </td>
													<td colspan="" style="" valign="top" height="25px" align="left">:</td>
												</tr>
											</table>
										</td>
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
