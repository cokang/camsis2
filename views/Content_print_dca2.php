<div id="Instruction" class="pr-printer">
		<div class="header-pr"> JOINT INSPECTION CHECKLIST </div>
		<button onclick="javascript:myFunction('hks_sch_planner?dept=<?=$this->input->get('dept')?>&loc=<?=$this->input->get('loc')?>&none=closed&pr=2&y=<?=$this->input->get('y')?>&m=<?=$this->input->get('m')?>');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.location.href='contentcontroller/locationlist?parent=asset'">CANCEL</button>
	</div>
	<?php if ($this->input->get('none') == '') { ?>
	<div class="form">
		<?php include 'content_head_dca2.php';?>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="color:black;">
			<tr>
				<td class="td-size"><b>Hospital / Intitution : </b></td>
				<td class="td-solid3" align="left"><?=$this->session->userdata('hosp_code')?></td>
				<td class="td-size2" align="right"><b>Document No :</b> </td>
				<td class="td-solid3" align="left"><?='JI/'.$this->input->get("dept").'/W1/'.$month.'/'.date("y",strtotime($year))?></td>
			</tr>
			<tr>
				<td style=""><b>User Area : </b></td>
				<td style="" class="td-solid3" align="left"><?=$nmdept[0]->v_UserDeptDesc?></td>
				<td style="" align="right"><b>Calender Week : </b></td>
				<td style="" class="td-solid3" align="left"> 2 </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<style>
		.data tr:hover{background:#FFFF00;}
		</style>
		<table class="tftabler data" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th colspan="">No</th>
				<th colspan="">User Location Code</th>
				<th colspan="">User Location</th>
				<th colspan="">Floor</th>
				<th colspan="">Wall & Door</th>
				<th colspan="">Ceiling</th>
				<th colspan="">Windows</th>
				<th colspan="">Fixtures</th>
				<th colspan="">Furniture & <br /> Fitting</th>
				<th colspan="">Remarks</th>
			</tr>
			<?php $numrow=1;foreach ($location as $list): ?>
			<tr>
				<td><?=$numrow++?></td>
				<td><?=isset($list->V_location_code) ? $list->V_location_code : ''?></td>
				<td><?=isset($list->v_Location_Name) ? $list->v_Location_Name : ''?></td>
				<td id='1-<?=$list->V_location_code?>' onclick="changeNum(this, '1-<?=$list->V_location_code?>', 'Floor', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Floor'.$list->V_location_code.'W1']) ? $jic['Floor'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='2-<?=$list->V_location_code?>' onclick="changeNum(this, '2-<?=$list->V_location_code?>', 'Wall Door', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Wall Door'.$list->V_location_code.'W1']) ? $jic['Wall Door'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='3-<?=$list->V_location_code?>' onclick="changeNum(this, '3-<?=$list->V_location_code?>', 'Ceiling', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Ceiling'.$list->V_location_code.'W1']) ? $jic['Ceiling'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='4-<?=$list->V_location_code?>' onclick="changeNum(this, '4-<?=$list->V_location_code?>', 'Windows', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Windows'.$list->V_location_code.'W1']) ? $jic['Windows'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='5-<?=$list->V_location_code?>' onclick="changeNum(this, '5-<?=$list->V_location_code?>', 'Fixtures', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Fixtures'.$list->V_location_code.'W1']) ? $jic['Fixtures'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='6-<?=$list->V_location_code?>' onclick="changeNum(this, '6-<?=$list->V_location_code?>', 'Furniture Fitting', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Furniture Fitting'.$list->V_location_code.'W1']) ? $jic['Furniture Fitting'.$list->V_location_code.'W1'] : '' ?></td>
				<td></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<td rowspan="2" width="15%">Inspected by Hospital / Institution</td>
				<td rowspan="2" width="15%">Inspected by Consesscion Company / Data Verifiation Officer 1 (DOV 1)</td>
				<td colspan="4">Quality Rating For Items Inspected</td>
				<td>Total Rating</td>
				<!--<td width="10%">Total</td>-->
			</tr>
			<tr>
				<td width="10%">Code</td>
				<td width="10%">Total</td>
				<td>Company Rating</td>
				<td>Deduction Formula Rating</td>
				<td></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td>1</td>
				<td><?=isset($rate1W1) ? $rate1W1 : 0?></td>
				<td>Poor</td>
				<td>Unstatisfactory</td>
				<td><?=isset($unsatisfactoryW1) ? $unsatisfactoryW1 : 0?></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td>2</td>
				<td><?=isset($rate2W1) ? $rate2W1 : 0?></td>
				<td>Fair</td>
				<td rowspan="3">Satisfactory</td>
				<td rowspan="3"><?=isset($satisfactoryW1) ? $satisfactoryW1 : 0?></td>
				<!--<td rowspan="3"></td>-->
			</tr>
			<tr>
				<td colspan="2" rowspan="3" align="left" style="padding-left:5px;">Date Inspected :</td>
				<td>3</td>
				<td><?=isset($rate3W1) ? $rate3W1 : 0?></td>
				<td>Good</td>
			</tr>
			<tr>
				<td>4</td>
				<td><?=isset($rate4W1) ? $rate4W1 : 0?></td>
				<td>Excelent</td>
			</tr>
			<tr>
				<td>5</td>
				<td><?=isset($rate5W1) ? $rate5W1 : 0?></td>
				<td>Not Applicable</td>
				<td>Not Applicable</td>
				<td><?=isset($napplicableW1) ? $napplicableW1 : 0?></td>
				<!--<td></td>-->
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td align="left" valign="top" class="ui-td-size2" rowspan="2">
					<table class="tbl-wo" border="1" align="left" style="width:100%; border: 1px solid black;">
						<tr>
							<td rowspan="3" style="padding-left:5px; width:30%;">Data Verification Officer 2 (DV2)</td>
							<td style="padding:5px;">Tandatangan :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Name :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Tarikh :</td>
						</tr>
					</table>
				</td>
				<td align="left" valign="top" style="padding:5px;">
					Remarks : <br />
					1) State Couse Codes beside every Unsatisfactory rating<br />
					2) QAP Cause Code
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" style="padding:5px;">
					<table class="tbl-wo" border="0" align="left" style="font-weight:bold;">
						<tr>
							<td>QH1 - Surface Stain </td>
							<td>QH2 - Dust </td>
							<td>QH4 - Bad Odour </td>
						</tr>
						<tr>
							<td>QH5 - Cobweb </td>
							<td>QH6 - FEMS Related </td>
							<td>QH7 - User </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="">
		<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<div class="form">
		<?php include 'content_head_dca2.php';?>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="color:black;">
			<tr>
				<td class="td-size"><b>Hospital / Intitution : </b></td>
				<td class="td-solid3" align="left"><?=$this->session->userdata('hosp_code')?></td>
				<td class="td-size2" align="right"><b>Document No :</b> </td>
				<td class="td-solid3" align="left"><?='JI/'.$this->input->get("dept").'/W3/'.$month.'/'.date("y",strtotime($year))?></td>
			</tr>
			<tr>
				<td style=""><b>User Area : </b></td>
				<td style="" class="td-solid3" align="left"><?=$nmdept[0]->v_UserDeptDesc?></td>
				<td style="" align="right"><b>Calender Week : </b></td>
				<td style="" class="td-solid3" align="left"> 4 </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler data" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th colspan="">No</th>
				<th colspan="">User Location Code</th>
				<th colspan="">User Location</th>
				<th colspan="">Floor</th>
				<th colspan="">Wall & Door</th>
				<th colspan="">Ceiling</th>
				<th colspan="">Windows</th>
				<th colspan="">Fixtures</th>
				<th colspan="">Furniture & <br /> Fitting</th>
				<th colspan="">Remarks</th>
			</tr>
			<?php $numrow=1;foreach ($location as $list): ?>
			<tr>
				<td><?=$numrow++?></td>
				<td><?=isset($list->V_location_code) ? $list->V_location_code : ''?></td>
				<td><?=isset($list->v_Location_Name) ? $list->v_Location_Name : ''?></td>
				<td id='7-<?=$list->V_location_code?>' onclick="changeNum(this, '7-<?=$list->V_location_code?>', 'Floor', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Floor'.$list->V_location_code.'W3']) ? $jic['Floor'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='8-<?=$list->V_location_code?>' onclick="changeNum(this, '8-<?=$list->V_location_code?>', 'Wall Door', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Wall Door'.$list->V_location_code.'W3']) ? $jic['Wall Door'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='9-<?=$list->V_location_code?>' onclick="changeNum(this, '9-<?=$list->V_location_code?>', 'Ceiling', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Ceiling'.$list->V_location_code.'W3']) ? $jic['Ceiling'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='10-<?=$list->V_location_code?>' onclick="changeNum(this, '10-<?=$list->V_location_code?>', 'Windows', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Windows'.$list->V_location_code.'W3']) ? $jic['Windows'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='11-<?=$list->V_location_code?>' onclick="changeNum(this, '11-<?=$list->V_location_code?>', 'Fixtures', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Fixtures'.$list->V_location_code.'W3']) ? $jic['Fixtures'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='12-<?=$list->V_location_code?>' onclick="changeNum(this, '12-<?=$list->V_location_code?>', 'Furniture Fitting', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Furniture Fitting'.$list->V_location_code.'W3']) ? $jic['Furniture Fitting'.$list->V_location_code.'W3'] : '' ?></td>
				<td></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<td rowspan="2" width="15%">Inspected by Hospital / Institution</td>
				<td rowspan="2" width="15%">Inspected by Consesscion Company / Data Verifiation Officer 1 (DOV 1)</td>
				<td colspan="4">Quality Rating For Items Inspected</td>
				<td>Total Rating</td>
				<!--<td width="10%">Total</td>-->
			</tr>
			<tr>
				<td width="10%">Code</td>
				<td width="10%">Total</td>
				<td>Company Rating</td>
				<td>Deduction Formula Rating</td>
				<td></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td>1</td>
				<td><?=isset($rate1W3) ? $rate1W3 : 0?></td>
				<td>Poor</td>
				<td>Unstatisfactory</td>
				<td><?=isset($unsatisfactoryW3) ? $unsatisfactoryW3 : 0?></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td>2</td>
				<td><?=isset($rate2W3) ? $rate2W3 : 0?></td>
				<td>Fair</td>
				<td rowspan="3">Satisfactory</td>
				<td rowspan="3"><?=isset($satisfactoryW3) ? $satisfactoryW3 : 0?></td>
				<!--<td rowspan="3"></td>-->
			</tr>
			<tr>
				<td colspan="2" rowspan="3" align="left" style="padding-left:5px;">Date Inspected :</td>
				<td>3</td>
				<td><?=isset($rate3W3) ? $rate3W3 : 0?></td>
				<td>Good</td>
			</tr>
			<tr>
				<td>4</td>
				<td><?=isset($rate4W3) ? $rate4W3 : 0?></td>
				<td>Excelent</td>
			</tr>
			<tr>
				<td>5</td>
				<td><?=isset($rate5W3) ? $rate5W3 : 0?></td>
				<td>Not Applicable</td>
				<td>Not Applicable</td>
				<td><?=isset($napplicableW3) ? $napplicableW3 : 0?></td>
				<!--<td></td>-->
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td align="left" valign="top" class="ui-td-size2" rowspan="2">
					<table class="tbl-wo" border="1" align="left" style="width:100%; border: 1px solid black;">
						<tr>
							<td rowspan="3" style="padding-left:5px; width:30%;">Data Verification Officer 2 (DV2)</td>
							<td style="padding:5px;">Tandatangan :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Name :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Tarikh :</td>
						</tr>
					</table>
				</td>
				<td align="left" valign="top" style="padding:5px;">
					Remarks : <br />
					1) State Couse Codes beside every Unsatisfactory rating<br />
					2) QAP Cause Code
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" style="padding:5px;">
					<table class="tbl-wo" border="0" align="left" style="font-weight:bold;">
						<tr>
							<td>QH1 - Surface Stain </td>
							<td>QH2 - Dust </td>
							<td>QH4 - Bad Odour </td>
						</tr>
						<tr>
							<td>QH5 - Cobweb </td>
							<td>QH6 - FEMS Related </td>
							<td>QH7 - User </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<?php } else { ?>
	<div class="form">
		<?php $numrow=1;foreach ($location as $list): ?>
		<?php if ($numrow==1 OR $numrow%40==1){ ?>
		<?php include 'content_head_dca2.php';?>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="color:black;">
			<tr>
				<td class="td-size"><b>Hospital / Intitution : </b></td>
				<td class="td-solid3" align="left"><?=$this->session->userdata('hosp_code')?></td>
				<td class="td-size2" align="right"><b>Document No :</b> </td>
				<td class="td-solid3" align="left"><?='JI/'.$this->input->get("dept").'/W2/'.$month.'/'.date("y",strtotime($year))?></td>
			</tr>
			<tr>
				<td style=""><b>User Area : </b></td>
				<td style="" class="td-solid3" align="left"><?=$nmdept[0]->v_UserDeptDesc?></td>
				<td style="" align="right"><b>Calender Week : </b></td>
				<td style="" class="td-solid3" align="left"> 1 </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th colspan="">No</th>
				<th colspan="">User Location Code</th>
				<th colspan="">User Location</th>
				<th colspan="">Floor</th>
				<th colspan="">Wall & Door</th>
				<th colspan="">Ceiling</th>
				<th colspan="">Windows</th>
				<th colspan="">Fixtures</th>
				<th colspan="">Furniture & <br /> Fitting</th>
				<th colspan="">Remarks</th>
			</tr>
			<?php } ?>
			<tr>
				<td><?= $numrow ?></td>
				<td><?=isset($list->V_location_code) ? $list->V_location_code : ''?></td>
				<td><?=isset($list->v_Location_Name) ? $list->v_Location_Name : ''?></td>
				<td id='1-<?=$list->V_location_code?>' onclick="changeNum(this, '1-<?=$list->V_location_code?>', 'Floor', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Floor'.$list->V_location_code.'W1']) ? $jic['Floor'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='2-<?=$list->V_location_code?>' onclick="changeNum(this, '2-<?=$list->V_location_code?>', 'Wall Door', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Wall Door'.$list->V_location_code.'W1']) ? $jic['Wall Door'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='3-<?=$list->V_location_code?>' onclick="changeNum(this, '3-<?=$list->V_location_code?>', 'Ceiling', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Ceiling'.$list->V_location_code.'W1']) ? $jic['Ceiling'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='4-<?=$list->V_location_code?>' onclick="changeNum(this, '4-<?=$list->V_location_code?>', 'Windows', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Windows'.$list->V_location_code.'W1']) ? $jic['Windows'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='5-<?=$list->V_location_code?>' onclick="changeNum(this, '5-<?=$list->V_location_code?>', 'Fixtures', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Fixtures'.$list->V_location_code.'W1']) ? $jic['Fixtures'.$list->V_location_code.'W1'] : '' ?></td>
				<td id='6-<?=$list->V_location_code?>' onclick="changeNum(this, '6-<?=$list->V_location_code?>', 'Furniture Fitting', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W1')"><?=isset($jic['Furniture Fitting'.$list->V_location_code.'W1']) ? $jic['Furniture Fitting'.$list->V_location_code.'W1'] : '' ?></td>
				<td></td>
			</tr>
			<?php $numrow++ ?>
		
		<?php if (($numrow == count($location) + 1)) { ?>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<td rowspan="2" width="15%">Inspected by Hospital / Institution</td>
				<td rowspan="2" width="15%">Inspected by Consesscion Company / Data Verifiation Officer 1 (DOV 1)</td>
				<td colspan="4">Quality Rating For Items Inspected</td>
				<td>Total Rating</td>
				<!--<td width="10%">Total</td>-->
			</tr>
			<tr>
				<td width="10%">Code</td>
				<td width="10%">Total</td>
				<td>Company Rating</td>
				<td>Deduction Formula Rating</td>
				<td></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td>1</td>
				<td><?=isset($rate1W1) ? $rate1W1 : 0?></td>
				<td>Poor</td>
				<td>Unstatisfactory</td>
				<td><?=isset($unsatisfactoryW1) ? $unsatisfactoryW1 : 0?></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td>2</td>
				<td><?=isset($rate2W1) ? $rate2W1 : 0?></td>
				<td>Fair</td>
				<td rowspan="3">Satisfactory</td>
				<td rowspan="3"><?=isset($satisfactoryW1) ? $satisfactoryW1 : 0?></td>
				<!--<td rowspan="3"></td>-->
			</tr>
			<tr>
				<td colspan="2" rowspan="3" align="left" style="padding-left:5px;">Date Inspected :</td>
				<td>3</td>
				<td><?=isset($rate3W1) ? $rate3W1 : 0?></td>
				<td>Good</td>
			</tr>
			<tr>
				<td>4</td>
				<td><?=isset($rate4W1) ? $rate4W1 : 0?></td>
				<td>Excelent</td>
			</tr>
			<tr>
				<td>5</td>
				<td><?=isset($rate5W1) ? $rate5W1 : 0?></td>
				<td>Not Applicable</td>
				<td>Not Applicable</td>
				<td><?=isset($napplicableW1) ? $napplicableW1 : 0?></td>
				<!--<td></td>-->
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td align="left" valign="top" class="ui-td-size2" rowspan="2">
					<table class="tbl-wo" border="1" align="left" style="width:100%; border: 1px solid black;">
						<tr>
							<td rowspan="3" style="padding-left:5px; width:30%;">Data Verification Officer 2 (DV2)</td>
							<td style="padding:5px;">Tandatangan :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Name :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Tarikh :</td>
						</tr>
					</table>
				</td>
				<td align="left" valign="top" style="padding:5px;">
					Remarks : <br />
					1) State Couse Codes beside every Unsatisfactory rating<br />
					2) QAP Cause Code
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" style="padding:5px;">
					<table class="tbl-wo" border="0" align="left" style="font-weight:bold;">
						<tr>
							<td>QH1 - Surface Stain </td>
							<td>QH2 - Dust </td>
							<td>QH4 - Bad Odour </td>
						</tr>
						<tr>
							<td>QH5 - Cobweb </td>
							<td>QH6 - FEMS Related </td>
							<td>QH7 - User <?=$numrow?></td>
						</tr>
					</table>
				</td>
			</tr>
			<?php } ?>
		<?php if ((($numrow-1)%40==0) OR ($numrow == count($location) + 1)) { ?>
		</table>
		<div class="divFooter ">
<i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i>
</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } ?>
	<?php endforeach; ?>
	<div class="form">
		<?php $numrow=1;foreach ($location as $list): ?>
		<?php if ($numrow==1 OR $numrow%40==1){ ?>
		<?php include 'content_head_dca2.php';?>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="color:black;">
			<tr>
				<td class="td-size"><b>Hospital / Intitution : </b></td>
				<td class="td-solid3" align="left"><?=$this->session->userdata('hosp_code')?></td>
				<td class="td-size2" align="right"><b>Document No :</b> </td>
				<td class="td-solid3" align="left"><?='JI/'.$this->input->get("dept").'/W4/'.$month.'/'.date("y",strtotime($year))?></td>
			</tr>
			<tr>
				<td style=""><b>User Area : </b></td>
				<td style="" class="td-solid3" align="left"><?=$nmdept[0]->v_UserDeptDesc?></td>
				<td style="" align="right"><b>Calender Week : </b></td>
				<td style="" class="td-solid3" align="left"> 3 </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th colspan="">No</th>
				<th colspan="">User Location Code</th>
				<th colspan="">User Location</th>
				<th colspan="">Floor</th>
				<th colspan="">Wall & Door</th>
				<th colspan="">Ceiling</th>
				<th colspan="">Windows</th>
				<th colspan="">Fixtures</th>
				<th colspan="">Furniture & <br /> Fitting</th>
				<th colspan="">Remarks</th>
			</tr>
			<?php } ?>
			<tr>
				<td><?=$numrow?></td>
				<td><?=isset($list->V_location_code) ? $list->V_location_code : ''?></td>
				<td><?=isset($list->v_Location_Name) ? $list->v_Location_Name : ''?></td>
				<td id='7-<?=$list->V_location_code?>' onclick="changeNum(this, '7-<?=$list->V_location_code?>', 'Floor', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Floor'.$list->V_location_code.'W3']) ? $jic['Floor'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='8-<?=$list->V_location_code?>' onclick="changeNum(this, '8-<?=$list->V_location_code?>', 'Wall Door', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Wall Door'.$list->V_location_code.'W3']) ? $jic['Wall Door'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='9-<?=$list->V_location_code?>' onclick="changeNum(this, '9-<?=$list->V_location_code?>', 'Ceiling', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Ceiling'.$list->V_location_code.'W3']) ? $jic['Ceiling'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='10-<?=$list->V_location_code?>' onclick="changeNum(this, '10-<?=$list->V_location_code?>', 'Windows', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Windows'.$list->V_location_code.'W3']) ? $jic['Windows'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='11-<?=$list->V_location_code?>' onclick="changeNum(this, '11-<?=$list->V_location_code?>', 'Fixtures', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Fixtures'.$list->V_location_code.'W3']) ? $jic['Fixtures'.$list->V_location_code.'W3'] : '' ?></td>
				<td id='12-<?=$list->V_location_code?>' onclick="changeNum(this, '12-<?=$list->V_location_code?>', 'Furniture Fitting', '<?=$this->input->get("dept")?>', '<?=$list->V_location_code?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>','W3')"><?=isset($jic['Furniture Fitting'.$list->V_location_code.'W3']) ? $jic['Furniture Fitting'.$list->V_location_code.'W3'] : '' ?></td>
				<td></td>
			</tr>
			<?php $numrow++ ?>
		
		<?php if (($numrow == count($location) + 1)) { ?>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<td rowspan="2" width="15%">Inspected by Hospital / Institution</td>
				<td rowspan="2" width="15%">Inspected by Consesscion Company / Data Verifiation Officer 1 (DOV 1)</td>
				<td colspan="4">Quality Rating For Items Inspected</td>
				<td>Total Rating</td>
				<!--<td width="10%">Total</td>-->
			</tr>
			<tr>
				<td width="10%">Code</td>
				<td width="10%">Total</td>
				<td>Company Rating</td>
				<td>Deduction Formula Rating</td>
				<td></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td align="left" rowspan="2" style="padding-left:5px;">Signature : <br /><br /><br /> Name :  <br /> &nbsp;</td>
				<td>1</td>
				<td><?=isset($rate1W3) ? $rate1W3 : 0?></td>
				<td>Poor</td>
				<td>Unstatisfactory</td>
				<td><?=isset($unsatisfactoryW3) ? $unsatisfactoryW3 : 0?></td>
				<!--<td></td>-->
			</tr>
			<tr>
				<td>2</td>
				<td><?=isset($rate2W3) ? $rate2W3 : 0?></td>
				<td>Fair</td>
				<td rowspan="3">Satisfactory</td>
				<td rowspan="3"><?=isset($satisfactoryW3) ? $satisfactoryW3 : 0?></td>
				<!--<td rowspan="3"></td>-->
			</tr>
			<tr>
				<td colspan="2" rowspan="3" align="left" style="padding-left:5px;">Date Inspected :</td>
				<td>3</td>
				<td><?=isset($rate3W3) ? $rate3W3 : 0?></td>
				<td>Good</td>
			</tr>
			<tr>
				<td>4</td>
				<td><?=isset($rate4W3) ? $rate4W3 : 0?></td>
				<td>Excelent</td>
			</tr>
			<tr>
				<td>5</td>
				<td><?=isset($rate5W3) ? $rate5W3 : 0?></td>
				<td>Not Applicable</td>
				<td>Not Applicable</td>
				<td><?=isset($napplicableW3) ? $napplicableW3 : 0?></td>
				<!--<td></td>-->
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td align="left" valign="top" class="ui-td-size2" rowspan="2">
					<table class="tbl-wo" border="1" align="left" style="width:100%; border: 1px solid black;">
						<tr>
							<td rowspan="3" style="padding-left:5px; width:30%;">Data Verification Officer 2 (DV2)</td>
							<td style="padding:5px;">Tandatangan :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Name :</td>
						</tr>
						<tr>
							<td style="padding:5px;">Tarikh :</td>
						</tr>
					</table>
				</td>
				<td align="left" valign="top" style="padding:5px;">
					Remarks : <br />
					1) State Couse Codes beside every Unsatisfactory rating<br />
					2) QAP Cause Code
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" style="padding:5px;">
					<table class="tbl-wo" border="0" align="left" style="font-weight:bold;">
						<tr>
							<td>QH1 - Surface Stain </td>
							<td>QH2 - Dust </td>
							<td>QH4 - Bad Odour </td>
						</tr>
						<tr>
							<td>QH5 - Cobweb </td>
							<td>QH6 - FEMS Related </td>
							<td>QH7 - User </td>
						</tr>
					</table>
				</td>
			</tr>
			<?php } ?>
		<?php if ((($numrow-1)%40==0) OR ($numrow == count($location) + 1)) { ?>
		</table>
		
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } ?>
	<?php endforeach; ?>
	<?php } ?>
	</div>	
	</body>
</html>