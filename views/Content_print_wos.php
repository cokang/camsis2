<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">SERVICE REQUEST AND WORK ORDER</div>
		<button onclick="javascript:myFunction('print_wos?wrk_ord=<?=$this->input->get('wrk_ord')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<div class="" align="center" style="margin-top:20px;" >
       <table border="0" width="70%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
    <tr>
        <td width="" align="left"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:40px;"/></td>
		<td width="" align="right"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
    </tr>
    <tr>
        <td width="" align="center" colspan="2">
            <!--<span >Advance Pact Sdn Bhd</span><br />
            <span style="font-size:12px;">(Company No.: 224192-H)</span>
            <br>-->
            <span >Site: <?= ($hosp[0]->v_HospitalName) ? $hosp[0]->v_HospitalName : 'NA' ?></span><br />
            <span style="font-weight:bold;">REQUEST STATUS REPORT</span>

        </td>
    </tr>
</table>
	</div>
		<div style="margin-top:px;">
			<table class="tbl-wo-2" style="width:70%;">
				<tr>
					<td valign="top" colspan="2">
						<table class="tbl-wo-2" style="border-bottom: 2px solid black;">
							<tr>
								<td width="9.5%">To</td>
								<td width="2.5%"> : </td>
								<td><span style="color:blue;"><?= ($woinfo[0]->V_requestor) ? $woinfo[0]->V_requestor : 'NA' ?></span></td>
							</tr>
							<tr>
								<td>Department</td>
								<td> : </td>
								<td><span style="color:blue;"><?= ($woinfo[0]->v_UserDeptDesc) ? $woinfo[0]->v_UserDeptDesc : 'NA' ?></span></td>
							</tr>
							<tr>
								<td>Extension</td>
								<td> : </td>
								<td><span style="color:blue;"><?= ($woinfo[0]->V_phone_no) ? $woinfo[0]->V_phone_no : 'NA' ?></span></td>
							</tr>
						</table>
							<tr>
								<td colspan="3" style="height:30px;"></td>
							</tr>
							<tr>
								<td colspan="3">Dear Sir/Madam,</td>
							</tr>
							<tr>
								<td colspan="3">This is the status on the latest progress made on the following request :</td>
							</tr>
							<tr>
								<td colspan="3" style="height:20px;"></td>
							</tr>
							<tr>
								<td colspan="3" style="padding-left:60px;">
									<table class="tbl-wo-2">
										<tr style="border-bottom: 1px solid black;">
											<td width="35.5%">Request Number</td>
											<td width="2.5%"> : </td>
											<td><span style="color:blue;"><?= ($wrk_ord) ? $wrk_ord : 'NA' ?></span></td>
										</tr>
										<tr style="border-bottom: 1px solid black;">
											<td width="">Dated</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->D_date) ? date('d F Y',strtotime($woinfo[0]->D_date)) : 'NA' ?></span></td>
										</tr>
										<tr style="border-bottom: 1px solid black;">
											<td width="">Equipment</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_Asset_no) ? $woinfo[0]->V_Asset_no : 'NA' ?></span></td>
										</tr>
										<tr style="border-bottom: 1px solid black;">
											<td width="">Location</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_Location_code) ? $woinfo[0]->V_Location_code : 'NA' ?></span></td>
										</tr>
										<tr style="border-bottom: 1px solid black;">
											<td width="">Request Summary</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_summary) ? $woinfo[0]->V_summary : 'NA' ?></span></td>
										</tr>
										<tr style="border-bottom: 1px solid black;">
											<td width="">Request Details</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_details) ? $woinfo[0]->V_details : 'NA' ?></span></td>
										</tr>
										<tr style="border-bottom: 1px solid black;">
											<td width="">Current Status:</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_request_status) ? $woinfo[0]->V_request_status : 'NA' ?></span></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="height:20px;"></td>
							</tr>
							<tr>
								<td colspan="3">Please be assured that action will be taken as soon as possible. </td>
							</tr>
							<tr>
								<td colspan="3" style="height:40px;"></td>
							</tr>
							<tr>
								<td colspan="3">Thank You.</td>
							</tr>
							<tr>
								<td colspan="" style="height:100px;" valign="bottom">
									<table class="tbl-wo-1" border="0" align="left" style="border-top:1px solid black; width:200px;">
										<tr>
											<td style="" valign="top"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="" valign="top">Engineer</td>
							</tr>
						</table>
					</td>
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

