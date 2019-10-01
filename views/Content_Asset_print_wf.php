<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> WARRANTY FORM </div>
		<button onclick="javascript:myFunction('print_wf?asstno=<?=$this->input->get('asstno')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<div class="pagewn">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;margin-top:5px;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:40px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;font-size:11px;">Facility Management Services</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;font-size:11px;">IIUM MEDICAL CENTRE</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;font-size:11px;">WARRANTY Defect form</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
	<div class="form">
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="padding:5px; width:15%">SERVICE TYPE : </td>
				<?php if(($this->session->userdata('usersess') == 'BES')){ ?>
				<td style="padding:3px; width:80px;"> 
					<div class="box2"></div> FES
				</td>
				<td style="padding:3px; width:80px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> BES
				</td>
				<td style="padding:3px; width:80px;"> 
					<div class="box2"></div> HKS
				</td>
				<?php }elseif(($this->session->userdata('usersess') == 'FES')){ ?>
				<td style="padding:3px; width:80px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> FES			
				</td>
				<td style="padding:3px; width:80px;">
					<div class="box2"></div> BES
				</td>
				<td style="padding:3px; width:80px;"> 
					<div class="box2"></div> HKS
				</td>
				<?php }elseif(($this->session->userdata('usersess') == 'HKS')){ ?>
				<td style="padding:3px; width:80px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> FES			
				</td>
				<td style="padding:3px; width:80px;">
					<div class="box2"></div> BES
				</td>
				<td style="padding:3px; width:80px;"> 
					<div class="box2"></div> HKS
				</td>
				<?php } ?>
				<td style="padding-left:25px; width:100px;"> Date :  </td>
			</tr>
		</table>
	</div>
		<table class="tbl-wo" border="0" align="center" style="font-size:14px;">
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">A. Details of Equipment/System </td>
			</tr>
			<tr>
				<td style="padding-left:10px; width:20%;">Asset No </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;">Equipment/System Name/Building </td>
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
				<td style="padding-left:10px;">Department Code </td>
				<td style="padding-left:10px;">: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
			</tr>
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">&nbsp; </td>
			</tr>
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" >B. Warranty Period : </td>
				<td style="padding-left:10px;"><span style="float:right">Start Date : <?= isset($records[0]->D_Register_date) ? date('d-m-Y',strtotime($records[0]->D_Register_date)) : 'NA'	?></span> </td>
				<td style="padding-left:10px;" align="right"><span style="">End Date : <?= isset($records[0]->V_Wrn_end_code) ? date('d-m-Y',strtotime($records[0]->V_Wrn_end_code)) : 'NA'	?></span> </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-size:14px;">
			<tr>
				<td style="padding-left:10px;  font-weight:bold;" colspan="2">C. List of Defect </td>
			</tr>
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black; font-size:14px;">
			<tr >
				<th width="30px" style="font-weight:bold; text-transform: uppercase;" align="center">No</th>
				<th width="100px" style="font-weight:bold; text-transform: uppercase;" align="center">Date</th>
				<th width="" style="font-weight:bold; text-transform: uppercase;" align="center">Defects Identified</th>
				<th width="130px" style="font-weight:bold; text-transform: uppercase; "align="center">Remarks</th>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="15px"></td>
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
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr >
				<th colspan="2" style="text-transform: uppercase;">Verification</th>
			</tr>
			<tr >
				<td width="50%" colspan="" align="center">Acceptance by Customer</td>
				<td width="" colspan="" align="center">Prepared</td>
			</tr>
			<tr >
				<td width="50%">
					<table class="tbl-wo-1" border="0" align="center">
						<tr>
							<td colspan="2" style="height:20px;" align="left"> </td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Sign </td>
							<td colspan="" align="left">:</td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Name </td>
							<td colspan="" align="left">:</td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Designation </td>
							<td colspan="" align="left">:</td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Date </td>
							<td colspan="" align="left">:</td>
						</tr>
					</table>
				</td>
				<td width="" >
					<table class="tbl-wo-1" border="0" align="center">
						<tr>
							<td colspan="2" style="height:20px;" align="left"> </td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Sign </td>
							<td colspan="" align="left">:</td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Name </td>
							<td colspan="" align="left">:</td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" align="left">Designation </td>
							<td colspan="" align="left">:</td>
						</tr>
						<tr>
							<td colspan="" style="width:15%; padding-left:5px;" valign="top" height="25px" align="left">Date </td>
							<td colspan="" align="left">:</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="">
			<tr>
				<td style="" valign="top"><i>Note: Tick (<span align="center" class="icon-check" style="font-size:9px;"></span>) where applicable.</i></td>
			</tr>
			<tr>
				<td style="" valign="top"><i>Date and Time declared by ABSB shall be deemed valid if NOT porided by customer</i></td>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
		
			</tr>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>

