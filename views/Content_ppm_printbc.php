	<div id="Instruction" class="pr-printer">
		<div class="header-pr">PREVENTIVE MAINTENANCE WORK ORDER</div>
		<button onclick="javascript:myFunction('print_ppm?wrk_ord=<?=$this->input->get('wrk_ord')?>&none=closed')" class="btn-button btn-primary-button" value="t">PRINT</button>
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
				<td width="33.5%"><span style="font-weight:bold;">PREVENTIVE MAINTENANCE WORK ORDER</span></td>
				<td colspan="" width="50%"><span style="float:right; font-weight:bold;">Work Order No :</span></td>
				<td width="1%" style="font-weight:bold;"><span style="color:blue;"><?= ($wrk_ord) ? $wrk_ord : 'NA' ?></span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="width:50%;" rowspan="3"> 
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td class="tbl-wo-data">Job Number </td>
							<td>: <span style="color:blue;"><?= ($woinfo[0]->v_jobtype) ? $woinfo[0]->v_jobtype : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Actual Due Date</td>
							<td>: <span style="color:blue;"><?= ($woinfo[0]->d_DueDt) ?  date('d F Y',strtotime($woinfo[0]->d_DueDt)) : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Location</td>
							<td style="width:55%;">: <span style="color:blue;"><?= ($woinfo[0]->v_Location_Name) ? $woinfo[0]->v_Location_Name : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Dept. Code </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_user_dept_code) ? $woinfo[0]->v_user_dept_code : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Room Code </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_location_code) ? $woinfo[0]->v_location_code : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Asset No. </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_asset_no) ? $woinfo[0]->v_asset_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Model No.</td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_model_no) ? $woinfo[0]->v_model_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Serial No. </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_serial_no) ? $woinfo[0]->v_serial_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">HEPPM Task No. </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->v_checklistcode) ? $woinfo[0]->v_checklistcode : 'NA' ?></span></td>
						</tr>
					</table>
				</td>
				<td style="width:50%;" valign="top" style="height:99%;" colspan="3"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td>Job Description / Additional Information: </td>
						</tr>
						<tr>
							<td><span style="color:blue;"><?= ($woinfo[0]->v_asset_name) ? $woinfo[0]->v_asset_name : 'NA' ?> (<?= ($woinfo[0]->new_asset_type) ? $woinfo[0]->new_asset_type : 'NA' ?>)</span></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="height:10px;" class="tb-class" colspan="3">
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td style="width:33.33%;">Warranty Status :</td>
							<td style="width:33.33%;"><div class="box2"></div> Warranty Asset</td>
							<td style="width:33.33%;"><div class="box2"></div> Post Warranty Asset</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top" style="height:10px;"><div class="box2" style="margin-left:3px;"></div> Remained on-site </td>
				<td valign="top" style="height:10px;"><div class="box2" style="margin-left:3px;"></div> Released to contractor <br /> <span style="padding-left:3px;">COC Ref No.:</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="margin-top:10px; ">
			<tr>
				<td align="" height="40px" valign="top"><span style="font-weight:bold;">Spare list Code:</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" style="border: 1px solid; margin-top:10px;">
			<tr>
				<td rowspan="2" align="center">Assign to: <br />(Name)</td>
				<td colspan="2" align="center">Start</td>
				<td colspan="2" align="center">End</td>
				<td rowspan="2" align="center">Part/Item Code</td>
				<td rowspan="2" align="center">Part / Item Description</td>
				<td rowspan="2" align="center">Qty</td>
				<td rowspan="2" align="center">Rate</td>
			</tr>
			<tr>
				<td align="center">Date</td>
				<td align="center">Time</td>
				<td align="center">Date</td>
				<td align="center">Time</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center" style="width:19%;">&nbsp;</td>
				<td align="center" style="width:19%;">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" height="60px" colspan="9">Actual Work Done / Recommendation :</td>
			</tr>
			<tr>
				<td valign="top" height="" colspan="6" rowspan="3">
					<table class="tbl-wo" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td colspan="2" style="" valign="top" height="25px">Done By: (Name &Signature)</td>
						</tr>
						<tr>
							<td colspan="2" style="" valign="top" height="10px"></td>
						</tr>
						<tr>
							<td valign="bottom">Date & Time:</td>
						</tr>
					</table>
				</td>
				<td valign="" height="" colspan="3"><div class="box2" style="margin-left:3px;"></div> In - House </td>
			</tr>
			<tr>
				<td valign="" height="" colspan="3"><div class="box2" style="margin-left:3px;"></div> 3rd Party Service</td>
			</tr>
			<tr>
				<td valign="" height="" colspan="3"><div class="box2" style="margin-left:3px;"></div> Contract Service</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">WORK COMPLETION VALIDATION</span></td>
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
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">QUALITY CAUSE CODE</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="width:30%;" >QC PPM :</td>
				<td style="width:70%;" valign="top" rowspan="2" >DVO1: <i>(Name & Signature)</i></td>
			</tr>
			<tr>
				<td style="" class="tb-class" colspan="" valign="top">QC Uptime :</td>
			</tr>	
		</table>
		<table class="tbl-wo" border="0" align="">
			<tr>
				<td style="" valign="top"><i>Note: Tick (<span align="center" class="icon-check" style="font-size:9px;"></span>) where applicable.</i></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="" style="border-top: solid black;">
			<tr>
				<td style="" valign="top">Preventive Maintenance Work Order <br />Computer Generated</td>
				<td style="padding-left:5.2%; height:40px;" valign="top"><span style="float:right;">MMS Form 4100 </span><br /><span style="float:right;">
Version 3.01 1st Nov 2012</span></td>
			</tr>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
</div>
	</body>
</html>

