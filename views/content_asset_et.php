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
							<b><span class="textmenu" style="float:left;">Equipment Transfer Form</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetet_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
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
													<td class="p-left">SERVICE TYPE </td>
													<td class="p-left">: <input type="checkbox" id="" value="ON" <?= isset($cfes) ? $cfes : ''	?> disabled> FES </td>
													<td class="p-left"> <input type="checkbox" id="" value="ON" <?= isset($cbes) ? $cbes : ''	?> disabled> BES </td>
												</tr>
												<tr>
													<td class="p-left">ASSET BELONG TO </td>
													<td class="p-left">: <input type="checkbox" id="" value="ON" disabled> IIUM </td>
													<td class="p-left"> <input type="checkbox" id="" value="ON"  disabled> APSB </td>
													<td class="p-left"> <input type="checkbox" id="" value="ON"  disabled> OTHERS </td>
													<td style="padding-left:10px;" width="20%" valign="top">Reference No : </td>
													<td style="padding-left:10px;" width=""></td>
												</tr>
												<tr >
													<td class="ui-desk-style-table2" colspan="5" style="padding-left:6px;">
														<div class="ui-main-form-1">
															<table width="100%" style="color:black;">
																<tr>
																	<td style="width:40.8%;">Equipment Name </td>
																	<td>: <?= isset($records[0]->V_Asset_name) ? $records[0]->V_Asset_name : 'NA'	?></td>
																</tr>
																<tr>
																	<td style="width:40.8%;">Asset Tag</td>
																	<td>: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
																</tr>
																<tr>
																	<td style="width:40.8%;">User Dept </td>
																	<td>: <?= isset($records[0]->V_Model_no) ? $records[0]->V_Model_no : 'NA'	?></td>
																</tr>
																<tr>
																	<td style="width:40.8%;">Detail of Detect</td>
																	<td>:</td>
																</tr>
															</table>
														</div>
														<div class="ui-main-form-2">
															<table width="100%" style="color:black;">
																<tr>
																	<td style="width:40.8%;">Work Order No </td>
																	<td>:</td>
																</tr>
																<tr>
																	<td style="width:40.8%;">Serial No </td>
																	<td>: <?= isset($records[0]->V_Serial_no) ? $records[0]->V_Serial_no : 'NA'	?></td>
																</tr>
																<tr>
																	<td style="width:40.8%;">User Location </td>
																	<td>: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
																</tr>
																<tr>
																	<td style="width:40.8%;">Physial Condition </td>
																	<td>:  <input type="checkbox" id="" value="ON"  disabled> Good <input type="checkbox" id="" value="ON"  disabled> Not Good</td>
																</tr>
																<tr>
																	<td style="width:40.8%;">Remarks </td>
																	<td>:</td>
																</tr>
															</table>
														</div>
													</td>
												</tr>
												<tr>
													<td class="p-left">Equipment Taken </td>
													<td class="p-left">: <input type="checkbox" id="" value="ON" disabled> Without accessory </td>
													<td class="p-left"> <input type="checkbox" id="" value="ON"  disabled> With accessory  </td>
													<td class="p-left"> <input type="checkbox" id="" value="ON"  disabled> Accessory only </td>
												</tr>
												<tr>
													<td class="p-left"><i>Please specity</i></td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td colspan="5" height="10px">&nbsp;</td>
												</tr>
												<tr><td colspan="5" class="ui-bottom-border-color" style="font-weight: bold;">Taken By</td></tr>	
												<tr>
													<td class="p-left">Name</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td class="p-left">Designation</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td class="p-left">Date</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr><td colspan="5" class="ui-bottom-border-color" style="font-weight: bold;">User Acknowledgment</td></tr>	
												<tr>
													<td class="p-left">Name</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td class="p-left">Designation</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td class="p-left">Date</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr><td colspan="5" class="ui-bottom-border-color" style="font-weight: bold;">Guard Acknowledgement For Equipment Out From Hospital</td></tr>
												<tr>
													<td class="p-left">Name</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td class="p-left">Designation</td>
													<td class="p-left" colspan="4">:</td>
												</tr>
												<tr>
													<td class="p-left">Date</td>
													<td class="p-left" colspan="4">:</td>
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
							<b><span class="textmenu" style="float:left;">Referral To Third</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetetrttp_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td  style="width:50%;" valign="top" colspan="2">
											<table width="100%" style="color:black;">
												<tr>
													<td style="width:40.8%;">Taken By </td>
													<td>:</td>
												</tr>
												<tr>
													<td style="width:40.8%;">Designation</td>
													<td>:</td>
												</tr>
												<tr>
													<td style="width:40.8%;">Date </td>
													<td>:</td>
												</tr>
												<tr>
													<td style="width:40.8%;">Company Name</td>
													<td>:</td>
												</tr>
											</table>
										</td>
										<td class="p-left" style="width:50%;" valign="top" colspan="2">
											<table width="100%" style="color:black;">
												<tr>
													<td style="width:40%;" height="50px" valign="top">Address </td>
													<td valign="top">:</td>
												</tr>
												<tr>
													<td style="width:40%;">Tel No </td>
													<td>:</td>
												</tr>
												<tr>
													<td style="width:40%;">Fax No </td>
													<td>:</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="padding-left:5px; width:10%;">Equipment Taken </td>
										<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" disabled> Without accessory </td>
										<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON"  disabled> With accessory  </td>
										<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON"  disabled> Accessory only </td>
									</tr>
									<tr>
										<td style="padding-left:5px; width:20%;"><i>Please specity</i></td>
										<td style="padding-left:5px;" colspan="4">:</td>
									</tr>
									<tr>
										<td style="padding-left:5px; width:10%;">Send Via </td>
										<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" disabled> By Hand </td>
										<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON"  disabled> By Courier/post  </td>
									</tr>
									<tr>
										<td style="padding-left:5px; width:20%;"><i>Transaction No</i></td>
										<td style="padding-left:5px;" colspan="4">:</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d2">
					<style type="text/css">
						.p_wnclabel{width: 10%; float: left; padding: 10px;}
						.p_wnctable{width: 90%; float: left; padding: 10px;}
						@media screen and (max-device-width:1200px){table.wnctable {border-collapse: collapse;color: black;width: 95%;}}
					</style>
					<div class="ui-content-form-reg">
						<div style="color:white; width: 100%;" height="30px">
							<div class="ui-header-new" style="padding-bottom: 3px; padding-top: 7"><b>Reminder To Third Party / Notification Of Status</b></div>
						</div>
						<div style="color: white;width: 100%;">
							<div class="ui-desk-style-table">
								<div class="ui-content-form" style="color: black; width: 100%;">
									<div class="p_itemspec" style="width: 100%; display: inline-block;">
										<div class="p_wnctable">
											<div style="width: auto; overflow-x: auto;">
												<table class="wnctable" border="1" style="text-align:center;" align="center">
													<tr>
														<th width="25%"></th>
														<th width="100px">Date</th>
														<th>Remarks</th>
														<th width="100px">Reminded By</th>
													</tr>
													<tr>
														<td>1<sup>st</sup> Reminder/Status Notified</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>2<sup>nd</sup> Reminder/Status Notified</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>3<sup>rd</sup> Reminder/Status Notified</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Condition And Work Acceptance For Equipment / Accessories Returned By Third Party</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetetcawafearbtp_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
											<table class="ui-content-form" width="100%" border="0">	
												<tr>
													<td style="padding-left:5px; width:10%;">Physical Condition </td>
													<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" disabled> Satisfactory </td>
													<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON"  disabled> Not Satisfactory </td>
												</tr>
												<tr>
													<td style="padding-left:5px; width:20%;"><i>Please specify</i></td>
													<td style="padding-left:5px;" colspan="4">:</td>
												</tr>
												<tr>
													<td style="padding-left:5px; width:10%;">Work Acceptance </td>
													<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" disabled> Accepted </td>
													<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON"  disabled> Not Accepted </td>
												</tr>
												<tr>
													<td style="padding-left:5px; width:20%;"><i>Please specify</i></td>
													<td style="padding-left:5px;" colspan="4">:</td>
												</tr>
												<tr>
													<td style="padding-left:5px; width:20%;">Accepted By</td>
													<td style="padding-left:5px;">:</td>
													<td style="padding-left:5px;" ></td>
													<td style="padding-left:5px;">Sign & Date :</td>
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
							<b><span class="textmenu" style="float:left;">User Acknowledgement For Equipment / Accessories Returned</span></b>
							<!--<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetetuafear_update', '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>-->
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
											<table class="ui-content-form" width="100%" border="0">	
												<tr>
													<td class="p-left">Name</td>
													<td class="p-left" colspan="">:</td>
												</tr>
												<tr>
													<td class="p-left">Designation</td>
													<td class="p-left" colspan="">:</td>
												</tr>
												<tr>
													<td class="p-left">Date</td>
													<td class="p-left" colspan="4">:</td>
													<td class="p-left">Sign & Chop :</td>
													<td class="p-left">&nbsp;</td>
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
