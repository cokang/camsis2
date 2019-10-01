<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> WARRANTY EXPIRY FORM </div>
		<button onclick="javascript:myFunction('print_we?asstno=<?=$this->input->get('asstno')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<table border="0" width="90%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; margin:0 auto;" bordercolor="#111111">
	<tr>
		<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:40px;"/></td>
		<td style="padding-left:5%;" colspan="5">
			<!--<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">Site: IIUM</span></td>-->
		<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
	</tr>
	</table>
	<div class="form">		
		<table class="tbl-wo" border="0" align="center" style="font-size:14px;">
			<tr>
				<td style="padding-left:10px; width:60px; font-weight:bold;">REF. NO </td>
				<td style="padding-left:10px; ">: </td>
			</tr>
			<tr>
				<td style="padding-left:10px;">DATE </td>
				<td style="padding-left:10px;">: </td>
			</tr>
			<tr>
				<td style="padding-left:10px;">TO </td>
				<td style="padding-left:10px;">: </td>
			</tr>
			<tr>
				<td style="padding-left:10px;" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td style="padding-left:10px; font-weight:bold;">MATTER</td>
				<td style="padding-left:10px; font-weight:bold;"> : 60 DAYS NOTICE OF WARRANTY EXPIRY</td>
			</tr>
			<tr>
				<td style="padding-left:10px;" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td style="padding-left:10px;" colspan="2">This is to inform you that warranty period for equipment under your care as details below will expire within the next 60 days.</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-size:14px;">
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">A. Details of the equipment </td>
			</tr>
			<tr>
				<td style="padding-left:10px; width:150px;">Tag No </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Asset Name </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Asset_name) ? $records[0]->V_Asset_name : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Model </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Model_no) ? $records[0]->V_Model_no : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Serial No </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Serial_no) ? $records[0]->V_Serial_no : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Department </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_User_Dept_code) ? $records[0]->V_User_Dept_code : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Location </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Warranty Expiry Date </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Wrn_end_code) ? date('d-m-Y',strtotime($records[0]->V_Wrn_end_code)) : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">&nbsp; </td>
			</tr>
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">B. Maintenance Records </td>
			</tr>
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">&nbsp; </td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid; width:86%; font-size:14px;">
			<tr >
				<td width="30px" style="font-weight:bold;" align="center">No</td>
				<td width="" style="font-weight:bold;" align="center">Maintenance Activity</td>
				<td width="100px" style="font-weight:bold;" align="center">Date</td>
				<td width="130px" style="font-weight:bold; "align="center">Status / Remarks</td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
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
		<table class="tbl-wo" border="0" align="center" style="font-size:14px;">
			<tr>
				<td style="padding-left:10px">Hence we seek your cooperation to list all defects on equipment in order to ensure supplier will rectify prior to the warranty expiry .</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid; width:86%; font-size:14px;">
			<tr >
				<td width="30px" style="font-weight:bold;" align="center">No</td>
				<td width="" style="font-weight:bold;" align="center">Defect Identified</td>
				<td width="130px" style="font-weight:bold;" align="center">Remarks</td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="20px"></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-size:14px;">
			<tr>
				<td style="padding-left:10px; width:20px; font-weight:bold;"><div class="box2"></div></td>
				<td style="padding-left:10px; ">We hereby confirms no defects were identified on the equipment during warranty period. </td>
			</tr>
			<tr>
				<td colspan="2" >&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Please return this document to our office within 30 days of date issued.</td>
			</tr>
			<tr>
				<td colspan="2">Your co-operation is highly appreciated. Thank you</td>
			</tr>
			<tr>
				<td colspan="2" >&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" height="50px" valign="top">Yours sincerely</td>
			</tr>
			<tr>
				<td >o/b</td>
				<td >: Manager Operation</td>
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

