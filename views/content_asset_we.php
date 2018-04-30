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
							<b><span class="textmenu" style="float:left;">Detail of the Equipment</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwedote_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
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
													<td class="p-left">Asset Name</td>
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
												<tr>
													<td class="p-left">Warrantry Expiry Date</td>
													<td >: <?= isset($records[0]->V_Wrn_end_code) ? date('d-m-Y',strtotime($records[0]->V_Wrn_end_code)) : 'NA'	?></td>
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
							<b><span class="textmenu" style="float:left;">Maintenance Records</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetwemr_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
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
													<th width="">Maintenance Activity</th>
													<th width="100px">Date</th>
													<th width="130px">Status / Remarks</th>
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
										<td class="p-left" align="center"><b>Hence we seek your cooperation to list all defects on equipment in order to ensure supplier will rectify prior to the warranty expiry</b></td>
									</tr>
									<tr>
										<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
											<table class="wnctable" border="1" style="text-align:center;" align="center">
												<tr >
													<th width="30px">No</th>
													<th width="">Defect Identified</th>
													<th width="245px">Remarks</th>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
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
