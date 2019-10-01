<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> WARRANTY MAINTENANCE NOTIFICATION </div>
		<button onclick="javascript:myFunction('print_wn?asstno=<?=$this->input->get('asstno')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
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
							<td align="center"><b style="text-transform: uppercase;font-size:11px;">WARRANTY MAINTENANCE NOTIFICATION</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="padding:5px; width:15%">Reference No : </td>
				<td style="padding:3px; width:80px;"> 
				</td>
				<td style="padding-left:45%; width:300px;"> Date : <?= date("d/m/Y")?> </td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="padding:5px; width:250px;" valign="top">To :  </td>
				<td style="height:50px;">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<th colspan="3">EQUIPMENT DETAILS</th>
			</tr>
			<tr>
				<td style="width:100%;" colspan="2">
			    	<table class="tbl-wo" border="0" align="left" style="font-weight:bold;">
						<tr>
							<td style="width:20.33%; padding:5px 5px 5px 10px;"><b>SERVICE TYPE </b> :</td>
							<?php if(($this->session->userdata('usersess') == 'BES')){ ?>
							<td style="50px"><div class="box2"></div> FES</td>
							<td style="50px"><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> BES</td>
							<td style="50px"><div class="box2"></div> HKS</td>
							<td style="50px"><div class="box2"></div> APSB</td>
							<?php }elseif(($this->session->userdata('usersess') == 'FES')){ ?>
							<td style="50px"><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> FES</td>
							<td style="50px"><div class="box2"></div> BES</td>
							<td style="50px"><div class="box2"></div> HKS</td>
							<td style="50px"><div class="box2"></div> APSB</td>
							<?php }elseif(($this->session->userdata('usersess') == 'HKS')){ ?>
							<td style="50px"><div class="box2"></div> FES</td>
							<td style="50px"><div class="box2"></div> BES</td>
							<td style="50px"><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> HKS</td>
							<td style="50px"><div class="box2"></div> APSB</td>
							<?php }elseif(($this->session->userdata('usersess') == 'APSB')){ ?>
							<td style="50px"><div class="box2"></div> FES</td>
							<td style="50px"><div class="box2"></div> BES</td>
							<td style="50px"><div class="box2"></div> HKS</td>
							<td style="50px"><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> APSB</td>
							<?php } ?>
						</tr>
					</table>
			    </td>
			</tr>
			<tr>
				<td style="width:50%;" colspan="">
			    	<table class="tbl-wo" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td class="td-class2" valign="top">Equipment</td>
							<td>: <?= isset($records[0]->V_Asset_name) ? $records[0]->V_Asset_name : 'NA'	?></td>
						</tr>
						<tr>
							<td valign="top">Asset No</td>
							<td>: <?= isset($records[0]->V_Tag_no) ? $records[0]->V_Tag_no : 'NA'	?></td>
						</tr>
						<tr>
							<td valign="top">Model</td>
							<td>: <?= isset($records[0]->V_Model_no) ? $records[0]->V_Model_no : 'NA'	?></td>
						</tr>
						<tr>
							<td valign="top">Serial No</td>
							<td>: <?= isset($records[0]->V_Serial_no) ? $records[0]->V_Serial_no : 'NA'	?></td>			
						</tr>
					</table>
			    </td>
			    <td style="width:50%;" colspan="">
			    	<table class="tbl-wo" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td class="td-class">Department</td>
							<td>: <?= isset($records[0]->V_User_Dept_code) ? $records[0]->V_User_Dept_code : 'NA'	?></td>
						</tr>
						<tr>
							<td>Department Code</td>
							<td>: <?= isset($records[0]->V_Location_code) ? $records[0]->V_Location_code : 'NA'	?></td>
						</tr>
						<tr>
							<td >Warranty Start Date</td>
							<td>: <?= isset($records[0]->D_Register_date) ? date('d-m-Y',strtotime($records[0]->D_Register_date)) : 'NA'	?></td>
						</tr>
						<tr>
							<td>Warranty End Date</td>
							<td>: <?= isset($records[0]->V_Wrn_end_code) ? date('d-m-Y',strtotime($records[0]->V_Wrn_end_code)) : 'NA'	?></td>
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
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<th colspan="2">MAINTENANCE TYPE</th>
			</tr>
			<tr>
				<td style="width:50%;" colspan="">
					<table class="tbl-wo" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td class="td-class3" rowspan="3" valign="top" style="width:20px;">
								<div class="box2" style="margin-top:1px;padding:3px;"></div>
							</td>
							<td valign="top" class="font-td">Preventive Maintenance</td>
						</tr>
						<tr>
							<td style="padding:5px 5px 5px 1px;">Schedule Week :</td>
						</tr>
						<tr>
							<td style="padding:5px 5px 5x 1px;"> Work Order No :</td>
						</tr>
					</table>
				<td style="width:50%;" colspan="">
					<table class="tbl-wo" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td class="td-class3" rowspan="3" valign="top" style="width:20px;">
								<div class="box2" style="margin-top:1px;padding:3px;"></div>
							</td>
							<td valign="top" class="font-td">Breakdown Maintenance</td>
						</tr>
						<tr>
							<td style="padding:5px 5px 5px 1px;">Reported Date:</td>
						</tr>
						<tr>
							<td style="padding:5px 5px 5px 1px;"> Work Order No :</td>
						</tr>
					</table>
				</td>
			<tr>
			<tr>
				<td colspan="2">
				<table class="tbl-wo-1" border="0" align="left">
					<tr>
						<td style="padding-left:10px;"> Request Description :</td>
					</tr>
					<tr>
						<td> <hr class='dotted' style="margin:10px 10px 10px 5px;" /></td>
					</tr>
					<tr>
						<td> <hr class='dotted' style="margin:10px 10px 10px 5px;" /></td>
					</tr>
				</table>
				<table class="tbl-wo-1" border="0" align="left">
					<tr>
						<td style="padding-left:10px; width:100px;"> Notification Issued by :</td>
						<td valign="bottom"><hr class='dotted' style="margin:0px; width:20%;" /></td>
					</tr>
					<tr>
						<td style="padding-left:10px;"></td>
						<td> <i> (Name & Designation) </i></td>
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
				<th colspan="" style="text-transform: uppercase;">Warranty Provider Acknowledgement</th>
			</tr>
			<tr>
				<td style="width:100%;" colspan="" style="padding-left:10px;">
			    	<table class="tbl-wo-1" width="100%" border="0" align="left" style="margin-left:10px;">
						<tr>
							<td  colspan="4" height="40px">Notice to Warranty Provider</td>
							<td></td>
						</tr>	
						<tr>
							<td  colspan="2"><div class="box2"></div> Reply via Fax</td>
							<td>Date :</td>
						</tr>
						<tr>
							<td valign="top" colspan="2"><div class="box2"></div> Reply by e-Mail/mail</td>
							<td valign="top">Date :</td>
							<td align="center">
								<table class="wn_top" style="border-top:1px dotted black;">
									<tr>
										<td colspan="2">Warrantry Provider's Acknowledgement</td>
									</tr>
									<tr>
										<td width="50px">Name</td>
										<td>:</td>
									</tr>
									<tr>
										<td>Stamp</td>
										<td>:</td>
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
		<table class="tbl-wo" border="0" align="center" style="border: 1px solid black;">
			<tr>
				<th colspan="3" style="text-transform: uppercase;">Work Completion Validation</th>
			</tr>
			<tr>
				<td class="p-left" style="padding:5px 5px 5px 10px; width:15px;"><div class="box2"></div></td>
				<td colspan="2" style="padding:5px 5px 5px 0px;">
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td width="150px">Work Not Completed</td>
							<td class="p-left" align="right" width="80px">Justification :</td>
							<td valign="bottom"><hr class='dotted' style="margin:0px;" /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td rowspan="6">&nbsp; </td>
				<td style="border:1px solid black; width:100px;" align="center">Date</td>
				<td style="border:1px solid black;" align="center">Comments</td>
			</tr>
			<tr>
				<td style="border:1px solid black;">&nbsp; </td>
				<td style="border:1px solid black;">&nbsp;</td>
			</tr>
			<tr>
				<td style="border:1px solid black;">&nbsp; </td>
				<td style="border:1px solid black;">&nbsp;</td>
			</tr>
			<tr>
				<td style="border:1px solid black;">&nbsp; </td>
				<td style="border:1px solid black;">&nbsp;</td>
			</tr>
			<tr>
				<td style="border:1px solid black;">&nbsp; </td>
				<td style="border:1px solid black;">&nbsp;</td>
			</tr>
			<tr>
				<td style="border:1px solid black;">&nbsp; </td>
				<td style="border:1px solid black;">&nbsp;</td>
			</tr>
			<tr>
				<td class="p-left" valign="top"><div class="box2" style="margin:17px 5px 5px 10px;"></div></td>
				<td colspan="2" style="padding:15px 5px 5px 0px;">
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td width="100px">Work Completed</td>
							<td></td>
							<td align="right">Verified By</td>
							<td valign="bottom" width="150px"> : <hr class='dotted' style="margin:0px 0px 0px 5px;" /></td>
						</tr>
						<tr>
							<td>Job Sheet No</td>
							<td>:</td>
							<td></td>
							<td valign="top" align="center"><i style="font-size:7px;"> (Name & Designation) </i></td>
						</tr>
						<tr>
							<td>Date</td>
							<td>:</td>
							<td align="right">Designation</td>
							<td valign="bottom">:</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
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

