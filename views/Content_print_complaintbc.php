<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">SERVICE REQUEST AND WORK ORDER</div>
		<button onclick="javascript:myFunction('print_complaint?cmplnt_no=<?=$this->input->get('cmplnt_no')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<div class="">
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/>
				<br /><span style="font-size:7.2px;">(Advance Pact Sdn Bhd)</span></td>
				<td rowspan="2" width="40%" align="center" style="font-weight:bold; font-size:20px;"><?= ($hosp[0]->v_HospitalName) ? $hosp[0]->v_HospitalName : 'NA' ?></td>
				<td valign="bottom" colspan="2"><span style="float:right;">Date : <?= date("d F Y")?>&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td width="33.5%"><span style="font-weight:bold;">Complaint</span></td>
				<td colspan="" width="50%"><span style="float:right; font-weight:bold;"> Complaint No :</span></td>
				<td width="1%" style="font-weight:bold;"><span style="color:blue;"><?= ($wrk_ord) ? $wrk_ord : 'NA' ?></span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="width:50%;" rowspan="0"> 
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td class="tbl-wo-data">Service Type </td>
							<td>: <span style="color:blue;"><?= ($woinfo[0]->v_ServiceCode) ? $woinfo[0]->v_ServiceCode : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Requestor</td>
							<td>: <span style="color:blue;"><?= ($woinfo[0]->v_requestor) ? $woinfo[0]->v_requestor : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Location</td>
							<td >: <span style="color:blue;"><?= ($woinfo[0]->v_location_name) ? $woinfo[0]->v_location_name : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Dept. Code </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_UserDeptCode) ? $woinfo[0]->v_UserDeptCode : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Room Code </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_Location) ? $woinfo[0]->v_Location : 'NA' ?></span></td>
						</tr>
						<tr>
							<td style="width:;">Ext. No</td>
							<td style="width:;">: <span style="color:blue;"><?= ($woinfo[0]->v_Phone) ? $woinfo[0]->v_Phone : 'NA' ?></span></td>
						</tr>

					</table>
				</td>
				<td style="width:50%;" valign="top" style="height:99%;" colspan="3"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td>Complaint Description/Additional Information :</td>
						</tr>
						<tr>
							<td><span style="color:blue;"><?= ($woinfo[0]->v_Complaint) ? $woinfo[0]->v_Complaint : 'NA' ?></span></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="width:50%;" rowspan="5"> 
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td class="tbl-wo-data2">Taken By </td>
							<td>: <span style="color:blue;"></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data2">Complaint Source</td>
							<td>: <span style="color:blue;"></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data2">NCR No</td>
							<td >: <span style="color:blue;"></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data2">Date Received </td>
							<td><span style="color:blue;">: </span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data2">Time Received </td>
							<td><span style="color:blue;">: </span></td>
						</tr>
					</table>
				</td>
					<td colspan="2">Complaint Type:</td>
					<td rowspan="0" width="30%">Reference No:</td>
			</tr>
			<tr>
				<td width=""> <div class="box2" style="margin-left:3px;"></div> Overall Service</td>
				<td align="center"> : </td>
				<td rowspan="4"></td>
			</tr>
			<tr>
				<td > <div class="box2" style="margin-left:3px;"></div> Schedule Work</td>
				<td  align="center"> : </td>
			</tr>
			<tr>
				<td > <div class="box2" style="margin-left:3px;"></div> Unscheduled Work</td>
				<td  align="center"> : </td>
			</tr>
			<tr>
				<td > <div class="box2" style="margin-left:3px;"></div> Other</td>
				<td  align="center"> : </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td colspan="2"> Assigned To :</td>
			</tr>
			<tr>
				<td style="width:50%;" valign="top" style="" colspan="">Date :</td>
				<td style="width:50%;" valign="top" style="" colspan="">Time :</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">COMPLAINT FINDINGS</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" style="border: 1px solid;">
			<tr>
			    <td style="height:70px;" colspan="" valign="top">Details:</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">ROOT CAUSE</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" style="border: 1px solid;">
			<tr>
			    <td style="height:70px;" colspan="" valign="top">Details:</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">CORRECTIVE ACTION</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" style="border: 1px solid;">
			<tr>
			    <td style="" colspan="" valign="top">
			    	<table class="tbl-wo" border="0" align="left">
						<tr>
							<td> <div class="box2" style="margin-left:3px;"></div> Discussion with user </td>
							<td style="width:50%;" valign="top" style="" colspan="">Date :</td>
						</tr>
					</table>
			    </td>
			    <td style="" colspan="" valign="top">
			    	<table class="tbl-wo" border="0" align="left">
						<tr>
							<td> <div class="box2" style="margin-left:3px;"></div> Feedback via phone </td>
							<td style="width:50%;" valign="top" style="" colspan="">Date :</td>
						</tr>
					</table>
			    </td>
			</tr>
			<tr>
			    <td style="" colspan="2" valign="top">
			    	<table class="tbl-wo" border="0" align="left" style="width:100%;">
						<tr>
							<td height="40px" valign="top" colspan="2"> Detail </td>
						</tr>
						<tr>
							<td valign="top" style="width:51.5%;"> Action taken by: (Name & Signature) </td>
							<td valign="top" style="width:%;">Date & Time: </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">PREVENTIVE ACTION</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" style="border: 1px solid;">
			<tr>
			    <td style="" colspan="" valign="top">
			    	<table class="tbl-wo" border="0" align="left">
						<tr>
							<td> <div class="box2" style="margin-left:3px;"></div> Discussion with user </td>
							<td style="width:50%;" valign="top" style="" colspan="">Date :</td>
						</tr>
					</table>
			    </td>
			    <td style="" colspan="" valign="top">
			    	<table class="tbl-wo" border="0" align="left">
						<tr>
							<td> <div class="box2" style="margin-left:3px;"></div> Feedback via phone </td>
							<td style="width:50%;" valign="top" style="" colspan="">Date :</td>
						</tr>
					</table>
			    </td>
			</tr>
			<tr>
			    <td style="" colspan="2" valign="top">
			    	<table class="tbl-wo" border="0" align="left" style="width:100%;">
						<tr>
							<td height="40px" valign="top" colspan="2"> Detail </td>
						</tr>
						<tr>
							<td valign="top" style="width:51.5%;"> Action taken by: (Name & Signature) </td>
							<td valign="top" style="width:%;">Date & Time: </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">WORKORDER COMPLETION VALIDATION</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="width:50%;" align="center"> Internal Validation </td>
				<td style="width:50%;" valign="top" colspan="2" align="center">Acceptance by Customer</td>
			</tr>
			<tr>
				<td style="" class="tb-class" colspan="" rowspan="2" valign="top">
					<table class="tbl-wo" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td colspan="2" style="" valign="top" height="25px">Signature :</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top">Name :</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top">Designation :</td>
						</tr>
						<tr>
							<td valign="bottom">Date :</td>
							<td valign="bottom">Time :</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top"> </td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="height:10px;" class="tb-class" colspan="2">
					<table class="tbl-wo" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td colspan="2" style="" valign="top" height="25px">Signature :</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top">Name :</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top">Designation :</td>
						</tr>
						<tr>
							<td valign="bottom">Date :</td>
							<td valign="bottom">Time :</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top"><span style="font-size:10px;"><i>*Date and Time declared by MSB shall be deemed valid if NOT provided by the customer.</i></span></td>
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
				<td style="" valign="top">Complaint WorkOrder<br />Computer Generated</td>
				<td style="padding-left:5.2%; height:40px;" valign="top"><span style="float:right;">MMS Form 814</span><br /><span style="float:right;">
Version 3.01 1st Nov 2012</span></td>
			</tr>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>

