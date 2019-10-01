<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> EQUIPMENT TRANSFER FORM </div>
		<button onclick="javascript:myFunction('print_et?asstno=<?=$this->input->get('asstno')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<div class="form">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:40px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP FACILITY MANAGEMENT SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM MEDICAL CENTRE</b> </td>
						</tr>
						<tr>
							<td align="center"><b>EQUIPMENT TRANSFER FORM </b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
	<div class="form">
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="padding-left:10px; width:100px;">SERVICE TYPE </td>
				<td style="padding-left:10px; width:100px;">: <div class="box2"></div> FES 
				<td style="padding-left:10px; width:100px;"> <div class="box2"></div> BES </td>
			</tr>
			<tr>
				<td style="padding-left:10px; width:100px;">ASSET BELONG TO </td>
				<td style="padding-left:10px; width:100px;">: <div class="box2"></div> IIUM 
				<td style="padding-left:10px; width:100px;"> <div class="box2"></div> APSB </td>
				<td > <div class="box2"></div> OTHERS </td>
				<td style="padding-left:10px;" width="20%" valign="top">Refence No : </td>
				<td style="padding-left:10px;" width=""></td>
			</tr>
		</table>
	</div>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="width:100%;" colspan="2" >
			    	<table class="tbl-wo-1" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td style="width:50%;" valign="top">
								<table class="tbl-wo-1" width="100%" style="color:black;">
									<tr>
										<td style="width:100px;">Equipment Name </td>
										<td>: <?= isset($records[0]->V_Asset_name) ? $records[0]->V_Asset_name : 'NA'	?></td>
									</tr>
									<tr>
										<td >Asset Tag</td>
										<td>: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
									</tr>
									<tr>
										<td >User Dept </td>
										<td>: <?= isset($records[0]->V_User_Dept_code) ? $records[0]->V_User_Dept_code : 'NA'	?></td>
									</tr>
									<tr>
										<td >Detail of Detect</td>
										<td>:</td>
									</tr>
								</table>
							</td>
							<td class="p-left" style="width:50%;" valign="top">
								<table  class="tbl-wo-1" width="100%" style="color:black;">
									<tr>
										<td style="width:100px;">Work Order No </td>
										<td>:</td>
									</tr>
									<tr>
										<td>Serial No </td>
										<td>: <?= isset($records[0]->V_Serial_no) ? $records[0]->V_Serial_no : 'NA'	?></td>
									</tr>
									<tr>
										<td>User Location </td>
										<td>: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
									</tr>
									<tr>
										<td>Physial Condition </td>
										<td>:  <div class="box2"></div> Good <div class="box2"></div> Not Good</td>
									</tr>
									<tr>
										<td>Remarks </td>
										<td>:</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="width:100%;" valign="top" colspan="2">
								<table class="tbl-wo-1" width="" style="color:black;">
									<td style="width:100px;">Equipment Taken </td>
									<td>: <div class="box2"></div> Without accessory </td>
									<td> <div class="box2"></div> With accessory  </td>
									<td> <div class="box2"></div> Accessory only </td>
								</table>
							</td>
						</tr>
						<tr>
							<td style="width:100%;" valign="top" colspan="2"> <i>Please specity</i> :</td>
						</tr>
					</table>
			    </td>
			</tr>
			<tr>
				<td style="width:50%;" colspan="">
			    	<table class="tbl-wo" border="0" align="left" style="margin-left:10px;">
						<tr><td colspan="2" style="font-weight: bold;">Taken By</td></tr>	
						<tr>
							<td style="width:100px;">Name</td>
							<td >:</td>
						</tr>
						<tr>
							<td >Designation</td>
							<td >:</td>
						</tr>
						<tr>
							<td >Date</td>
							<td >:</td>
						</tr>
					</table>
			    </td>
			    <td style="width:50%;" colspan="">
			    	<table class="tbl-wo" border="0" align="left" style="margin-left:10px;">
						<tr><td colspan="2" style="font-weight: bold;">User Acknowledgment</td></tr>	
						<tr>
							<td style="width:100px;">Name</td>
							<td >:</td>
						</tr>
						<tr>
							<td >Designation</td>
							<td >:</td>
						</tr>
						<tr>
							<td >Date</td>
							<td >:</td>
						</tr>
					</table>
			    </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<th colspan="3" style="text-transform: uppercase;">Guard Acknowledgement For Equipment Out From Hospital</th>
			</tr>
			<tr>
				<td style="width:100%;" colspan="">
			    	<table class="tbl-wo" border="0" align="left" style="margin-left:10px; width:100%;">
						<tr>
							<td style="" height="40px" valign="bottom">Sign & Chop </td>
							<td style="" valign="bottom">: <div class="B-sign"></div></td>
						</tr>
						<tr>
							<td style="width:100px;">Name </td>
							<td style=""> :</td>
							<td style="width:30%;"> Designation :</td>
							<td style="width:30%;"> Date :</td>
						</tr>
					</table>
			    </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<th colspan="" style="text-transform: uppercase;">Referral To Third Party</th>
			</tr>
			<tr>
				<td style="width:100%;" colspan="" style="padding-left:10px;">
			    	<table class="tbl-wo-1" width="100%" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td  style="width:50%;" valign="top" colspan="2">
								<table class="tbl-wo-1" width="100%" style="color:black;">
									<tr>
										<td style="width:100px;">Taken By </td>
										<td>:</td>
									</tr>
									<tr>
										<td >Designation</td>
										<td>:</td>
									</tr>
									<tr>
										<td>Date </td>
										<td>:</td>
									</tr>
									<tr>
										<td>Company Name</td>
										<td>:</td>
									</tr>
								</table>
							</td>
							<td  style="width:50%;" valign="top" colspan="2">
								<table  class="tbl-wo-1" width="" style="color:black;">
									<tr>
										<td style="width:50px;" height="50px" valign="top">Address </td>
										<td valign="top">:</td>
									</tr>
									<tr>
										<td >Tel No </td>
										<td>:</td>
									</tr>
									<tr>
										<td >Fax No </td>
										<td>:</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td  style="width:50%;" valign="top" colspan="3">
								<table  class="tbl-wo-1" width="" style="color:black;">
									<tr>
										<td style="width:15%;">Equipment Taken </td>
										<td style="width:20%">: <div class="box2"></div> Without accessory </td>
										<td style="width:20%"> <div class="box2"></div> With accessory  </td>
										<td style="width:30%"> <div class="box2"></div> Accessory only </td>
									</tr>
									<tr>
										<td style="width:15%;"><i>Please specity</i></td>
										<td >:</td>
									</tr>
									<tr>
										<td style="width:15%;">Send Via </td>
										<td>: <div class="box2"></div> By Hand </td>
										<td> <div class="box2"></div> By Courier/post  </td>
										<td >  
											<table  class="tbl-wo-1" width="" style="color:black;">
												<tr>
													<td style="width:100px;" height="50px" valign="bottom">Sign & Chop </td>
													<td valign="bottom">: <div class="b-sign"></div></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="width:15%; " colspan="3" align="right"><span class="f-span" style=""><i>Transaction No</i> :</span></td>
									</tr>
								</table>
							</td>
						</tr>	
					</table>
			    </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<th colspan="4" style="text-transform: uppercase;">Reminder To Third Party / Notification Of Status</th>
			</tr>
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr >
				<td width="25%"></td>
				<td width="100px" align="center">Date</td>
				<td align="center">Remarks</td>
				<td width="100px" align="center">Reminded By</td>
			</tr>
			<tr>
				<td align="center">1<sup>st</sup> Reminder/Status Notified</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">2<sup>nd</sup> Reminder/Status Notified</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">3<sup>rd</sup> Reminder/Status Notified</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<th colspan="4" style="text-transform: uppercase;">Condition And Work Acceptance For Equipment / Accessories Returned By Third Party</th>
			</tr>
			<tr >
				<td>
					<table class="tbl-wo-1" width="100%" border="0">	
						<tr>
							<td style="padding-left:5px; width:10%;">Physical Condition </td>
							<td style="padding-left:5px;">: <div class="box2"></div> Satisfactory </td>
							<td style="padding-left:5px;"> <div class="box2"></div> Not Satisfactory </td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:20%;"><i>Please specify</i></td>
							<td style="padding-left:5px;" colspan="4">:</td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:10%;">Work Acceptance </td>
							<td style="padding-left:5px;">: <div class="box2"></div> Accepted </td>
							<td style="padding-left:5px;"> <div class="box2"></div> Not Accepted </td>
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
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<th colspan="4" style="text-transform: uppercase;">User Acknowledgement For Equipment / Accessories Returned</th>
			</tr>
			<tr >
				<td>
					<table class="tbl-wo-1" width="100%" border="0">	
						<tr>
							<td style="width:10%;">Name</td>
							<td style="width:68.4%;" colspan="">:</td>
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
		<table class="tbl-wo" border="0" align="">
			<tr>
				<td style="" valign="top"><i>Note: Tick (<span align="center" class="icon-check" style="font-size:9px;"></span>) where applicable.</i></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="" style="border-top: solid black;">
			<tr>
				<td style="" valign="top">EQUIPMENT TRANSFER FORM<br />Computer Generated</td>
				<td style="padding-left:5.2%; height:40px;" valign="top"><span style="float:right;">MMS Form 814</span><br /><span style="float:right;">
Version 3.01 1st Nov 2012</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
		<tr>
				<td style="" valign="top" align="center"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
		</tr>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>

