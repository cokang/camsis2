
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">PREVENTIVE MAINTENANCE WORK ORDER</div>
		<button onclick="javascript:myFunctionprint()" class="btn-button btn-primary-button" value="t">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
<?php $num=1;foreach ($record as $row): ?>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;margin-top:5px;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:40px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Facility Management Services</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">IIUM MEDICAL CENTRE</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Plan Preventive Maintenance work order</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
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
				<?php }elseif(($this->session->userdata('usersess') == 'FES')){ ?>
				<td style="padding:3px; width:80px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> FES
				</td>
				<td style="padding:3px; width:80px;">
					<div class="box2"></div> BES
				</td>
				<?php } ?>
				<td style="padding-left:45%; width:300px;"> Date :  <?= date("d F Y")?></td>
			</tr>
			<tr>
				<td style="padding:5px; width:100px;" colspan="6">WORK ORDER NO : <?= ($row[7]) ? $row[7] : 'NA' ?> </td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td style="width:50%; padding:5px;" rowspan="0">
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td class="tbl-wo-data">Equipment</td>
							<td style="width:75%;">: <span style="color:blue;"><?= ($row[0][0]->v_asset_name) ? $row[0][0]->v_asset_name : 'NA' ?> (<?= ($row[0][0]->new_asset_type) ? $row[0][0]->new_asset_type : 'NA' ?>) <?= ($row[0][0]->TASKDESC) ? $row[0][0]->TASKDESC : '' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Asset No</td>
							<td>: <span style="color:blue;"><?= ($row[0][0]->v_tag_no) ? $row[0][0]->v_tag_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Model </td>
							<td><span style="color:blue;">: <?= ($row[0][0]->v_model_no) ? $row[0][0]->v_model_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Serial No. </td>
							<td><span style="color:blue;">: <?= ($row[0][0]->v_serial_no) ? $row[0][0]->v_serial_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Department </td>
							<td><span style="color:blue;">: <?= ($row[0][0]->v_userdeptdesc) ? $row[0][0]->v_userdeptdesc : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Dept. Code </td>
							<td><span style="color:blue;">: <?= ($row[0][0]->v_user_dept_code) ? $row[0][0]->v_user_dept_code : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Room Code </td>
							<td><span style="color:blue;">: <?= ($row[0][0]->v_location_code) ? $row[0][0]->v_location_code : 'NA' ?>(<?= ($row[0][0]->v_Location_Name) ? $row[0][0]->v_Location_Name : 'NA' ?>)</span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Warranty Status </td>
							<td><span style="color:blue; display:inline-block; width:2px; float:left;">: </span>
								<table class="tbl-wo" border="0" align="left" style="margin-left:7px;">
									<tr>

										<td style="width:33.33%;"> : <div class="box2">
									<?php if(strtotime($row[0][0]->V_Wrn_end_code) > strtotime(date("d/m/Y"))){?>
									<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
									<?php }else{ ?>

									<?php } ?>
									</div> Under Warranty</td>
									<td style="width:33.33%;"><div class="box2">
									<?php if(strtotime($row[0][0]->V_Wrn_end_code) < strtotime(date("d/m/Y"))){?>
									<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
									<?php }else{ ?>

									<?php } ?>
									</div> Post Warranty</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
					</table>
				</td>
				<td style="width:50%; padding:5px;" valign="top" colspan="0">
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td class="tbl-wo-data">PPM Schedule </td>
							<td>: <span style="color:blue;">Week <?= ($row[0][0]->n_StartWk) ? $row[0][0]->n_StartWk : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Frequency No</td>
							<td>: <span style="color:blue;"><?= ($row[0][0]->v_jobtype) ? $row[0][0]->v_jobtype : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Check list No</td>
							<td>: <span style="color:blue;"><?= ($row[0][0]->v_checklistcode) ? $row[0][0]->v_checklistcode : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Remark </td>
							<td>: <span style="color:blue;"></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
						<td class="tbl-wo-data" valign="top">Equipment </td>
						<td>
							<table class="tbl-wo-1" border="0" align="left">
								<tr>
									<td style="width:33.33%;"> : <div class="box2"></div> Remained on-site <br/><span style="padding-left:12%;">ETF Ref No : </span></td>
									<td style="width:33.33%;" valign="top"><div class="box2"></div> Released to Contractor </td>
								</tr>
							</table>
						</td>
						</tr>
						<tr>
							<td class="tbl-wo-data" colspan="2">&nbsp; </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="background-color:black; color:white;">
			<tr>
				<td align="center"><span style="font-weight:bold; text-transform: uppercase;">MAINTENANCE ACtions</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" style="border: 1px solid black;">
			<tr>
				<td rowspan="2" align="center">Assign to: <br />(Name / Staff No.)</td>
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
				<td align="center">&nbsp;<?=($row[1][0][0]) ? $row[1][0][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][0][1]) ? $row[1][0][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][0][2]) ? $row[1][0][2] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][0][1]) ? $row[1][0][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][0][3]) ? $row[1][0][3] : ''?></td>
				<td align="center" style="width:15%;">&nbsp;</td>
				<td align="center">&nbsp;<?=($row[2][0][0]) ? $row[2][0][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][0][1]) ? $row[2][0][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][0][2]) ? $row[2][0][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($row[1][1][0]) ? $row[1][1][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][1][1]) ? $row[1][1][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][1][2]) ? $row[1][1][2] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][1][1]) ? $row[1][1][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][1][3]) ? $row[1][1][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($row[2][1][0]) ? $row[2][1][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][1][1]) ? $row[2][1][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][1][2]) ? $row[2][1][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($row[1][2][0]) ? $row[1][2][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][2][1]) ? $row[1][2][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][2][2]) ? $row[1][2][2] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][2][1]) ? $row[1][2][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][2][3]) ? $row[1][2][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($row[2][2][0]) ? $row[2][2][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][2][1]) ? $row[2][2][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][2][2]) ? $row[2][2][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($row[1][3][0]) ? $row[1][3][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][3][1]) ? $row[1][3][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][3][2]) ? $row[1][3][2] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][3][1]) ? $row[1][3][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][3][3]) ? $row[1][3][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($row[2][3][0]) ? $row[2][3][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][3][1]) ? $row[2][3][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][3][2]) ? $row[2][3][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($row[1][4][0]) ? $row[1][4][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][4][1]) ? $row[1][4][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][4][2]) ? $row[1][4][2] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][4][1]) ? $row[1][4][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][4][3]) ? $row[1][4][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($row[2][4][0]) ? $row[2][4][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][4][1]) ? $row[2][4][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][4][2]) ? $row[2][4][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($row[1][5][0]) ? $row[1][5][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][5][1]) ? $row[1][5][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][5][2]) ? $row[1][5][2] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][5][1]) ? $row[1][5][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[1][5][3]) ? $row[1][5][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($row[2][5][0]) ? $row[2][5][0] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][5][1]) ? $row[2][5][1] : ''?></td>
				<td align="center">&nbsp;<?=($row[2][5][2]) ? $row[2][5][2] : ''?></td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td>
					<table class="tbl-wo-1" border="0" align="center">
						<tr>
							<td style="padding:5px;">Reschedule of work (if any) :</td>
						</tr>
						<tr>
							<td><?=($row[4][0][0]) ? $row[4][0][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td><?=($row[4][1][0]) ? $row[4][1][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td><?=($row[4][2][0]) ? $row[4][2][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td>
					<table class="tbl-wo-1" border="0" align="center">
						<tr>
							<td style="padding:5px;" colspan="3">Actual Work Done :</td>
						</tr>
						<tr>
							<td colspan="3"><?=($row[3][0][0]) ? $row[3][0][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td colspan="3"><?=($row[3][1][0]) ? $row[3][1][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td colspan="3"><?=($row[3][2][0]) ? $row[3][2][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td colspan="3"><?=($row[3][3][0]) ? $row[3][3][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td colspan="3"><?=($row[3][4][0]) ? $row[3][4][0] : ''?><hr class='dotted' style="margin:10px 10px 10px 5px;"/></td>
						</tr>
						<tr>
							<td style="padding:5px; height:40px;">Completed By : <?=isset($row[5]) ? $row[5] : ''?></td>
							<td>Date : <?=isset($row[6][0]) ? date("d-m-Y",strtotime($row[6][0])) : ''?></td>
							<td>Time : <?=isset($row[6][1]) ? date("H:i",strtotime($row[6][1])) : ''?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="background-color:black; color:white;">
			<tr>
				<td align="center"><span style="font-weight:bold;">WORK ORDER COMPLETION VALIDATION</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td style="width:50%;" align="center"> Acceptance by Customer</td>
				<td style="width:50%;" valign="top" colspan="2" align="center"> For Office use only</td>
			</tr>
			<tr>
				<td style="padding:20px 0px 0px 5px;" class="tb-class" colspan="" rowspan="2" valign="top">
					<table class="tbl-wo" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td valign="top">Signature :</td>
						</tr>
						<tr>
							<td valign="top">Name :</td>
						</tr>
						<tr>
							<td valign="top">Designation :</td>
						</tr>
						<tr>
							<td valign="top">Date :</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding:20px 0px 0px 5px;" class="tb-class" colspan="2">
					<table class="tbl-wo" border="0" align="left" style="width:100%;">
						<tr>
							<td valign="top">Signature :</td>
						</tr>
						<tr>
							<td valign="top">Name :</td>
						</tr>
						<tr>
							<td valign="top">Designation :</td>
						</tr>
						<tr>
							<td valign="top">Date :</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;" class="tb-class" colspan="2" valign="top">
					<table class="tbl-wo-1" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td style="width:18%" valign="top">Quality Cause Code : QC</td>
							<td style="" valign="top"><hr class='dotted' style="margin:5px 5px 5px 0px; width:5%;"/></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="">
			<tr>
				<td style="" valign="top"><span style="font-size:7px; padding-left:30px;"><i>Note: Tick (<span align="center" class="icon-check" style="font-size:7px;"></span>) where applicable.</i></span></td>
			</tr>
			<tr>
				<td style="" valign="top"><span style="font-size:7px; padding-left:30px;"><i>*Date and Time declared by APSB shall be deemed valid if NOT provided by the customer.</i></span></td>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
			</tr>
		</table>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php endforeach; ?>
	</body>
</html>
