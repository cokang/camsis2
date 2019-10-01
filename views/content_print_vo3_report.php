<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> SITE SUBMISSION REPORT <?php echo $this->input->get('rpt_no') ?> </div>
		<button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<?php $StartNewPage1 = 'false';$StartNewPage2 = 'false';$rowno = 0; foreach($loadvvfreport as $row):?>
	<?php 
				if($rowno<$count_array-1){
				$currentVStatus[$rowno] = $loadvvfreport[$rowno+1]->vvfVStatus;
				$currentMonth[$rowno] = date('m',strtotime($loadvvfreport[$rowno+1]->vvfSubmissionDate));
				}
			 ?>
	<?php if ($rowno == 0 OR $rowno%10==0 OR $StartNewPage1 == 'true' OR $StartNewPage2 == 'true') { ?>
	<?php $counter = 0 ?>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:150px; height:50px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP FACILITY MANAGEMENT SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b>SUMMARY REPORT ON VERIFICATION OF VARIATIONS (VVF) </b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:5px; width:160px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Form No :</td>
						</tr>
						<tr>
							<td align="left"> Version :</td>
						</tr>
						<tr>
							<td align="left"> Date :</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<div style="height:10px;"></div>
		<?php
			$array = [
			['BES', 'BIOMEDICAL ENGINEERING SERVICES'],
			['FES', 'FACILITY ENGINEERING SERVICES'],
			['HKS', 'HOUSEKEEPING'],
			['CWA', 'CLINICAL WASTE'],
			['SEC', 'SECURITY'],
			['LINEN', 'LINEN'],
			];
			foreach ($array as $list) {
			if ($list[1] == $this->session->userdata('usersessn')){
		?>
		<?php if ('BIOMEDICAL ENGINEERING SERVICES' == $this->session->userdata('usersessn')){ ?>
		<table class="tbl-wo" border="0">
		<tr>	
			<td class="tbl-wo-vovf" style="height:50px;">
				<?php echo $this->session->userdata('usersessn'); ?> (<?php echo $list[0];?>) (Additions / Alterations / Deletion)<br>
				Table 4 - List of Equipment
			</td>
		</tr>
	</table>
	<table class="tbl-wo">
			<tr>
				<td class="tbl-tls-font">
					Note to Contractor:
					<br>
					1. Please compile this report based on the verified and endorsed list of additions and deletions (VVF for <?php echo $list[0];?>).
					<br>
					<img src="<?php echo base_url(); ?>images/spacer.gif" height="5">
				</td>
				<td align="right">
					<table class="tbl-wo-vff">
						<tr>
							<td><b>Date:</b></td>
							<td><span class="tblbox"> <?php echo date('F', mktime(0, 0, 0, $row->month0, 10)).$row->year0 ?></span></td>
						</tr>
						<tr>
							<td><b>State:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_statename ?></span></td>
						</tr>
						<tr>
							<td><b>Hospital:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_HospitalName ?></span></span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div style="height:10px;"></div>
				<table class="tablevvf" border="1">
					<tr>
						<th>A</th>
						<th>B</th>
						<th>C</th>
						<th>D</th>
						<th>E</th>
						<th>F</th>
						<th>G</th>
						<th>H</th>
						<th>I</th>
						<th>J</th>
						<th>K</th>
						<th>L</th>
					</tr>
					<tr>
						<th>Hospital</th>
						<th>Department</th>
						<th>Equipment Description</th>
						<th>Equipment Code</th>
						<th>Asset Tag <br> Number</th>
						<th>Manufacturer</th>
						<th>Model</th>
						<th>Purchase<br>Cost (RM)</th>
						<th>Status@</th>
						<th>Date Commisioned /<br>Decommisioned</th>
						<th>Date Start /<br>Stop Service</th>
						<th>Warranty <br>Expiry Date</th>
					</tr>
					<tr>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
						<td>F</td>
						<td>G</td>
						<td>H</td>
						<td>I</td>
						<td>J</td>
						<td>K</td>
						<td>L</td>
					</tr>
				</table>

			<?php } elseif ('FACILITY ENGINEERING SERVICES' == $this->session->userdata('usersessn')){?>

			<table class="tbl-wo" border="0">
		<tr>	
			<td class="tbl-wo-vovf" style="height:50px;">
				<?php echo $this->session->userdata('usersessn'); ?> (<?php echo $list[0];?>) (Additions / Alterations / Deletion)<br>
				Table 1 - List of Buildings and Systems
			</td>
		</tr>
	</table>
	<table class="tbl-wo">
			<tr>
				<td class="tbl-tls-font">
					Note to Contractor:
					<br>
					1. Please compile this report based on the verified and endorsed list of additions and deletions (VVF for <?php echo $list[0];?>).
					<br>
					<img src="<?php echo base_url(); ?>images/spacer.gif" height="5">
				</td>
				<td align="right">
					<table class="tbl-wo-vff">
						<tr>
							<td><b>Date:</b></td>
							<td><span class="tblbox"> <?php echo date('F', mktime(0, 0, 0, $row->month0, 10)).$row->year0 ?></span></td>
						</tr>
						<tr>
							<td><b>State:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_statename ?></span></td>
						</tr>
						<tr>
							<td><b>Hospital:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_HospitalName ?></span></span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div style="height:10px;"></div>
				<table class="tablevvf" border="1">
					<tr>
						<th>A</th>
						<th>B</th>
						<th>C</th>
						<th>D</th>
						<th>E</th>
						<th>F</th>
						<th>G</th>
						<th>H</th>
						<th>I</th>
						<th>J</th>
					</tr>
					<tr>
						<th>Contractor</th>
						<th>Building / Systems Description / ID</th>
						<th>Department/Floor</th>
						<th>Project Cost(RM)</th>
						<th>Built-up Area (sq.m)</th>
						<th>Status @</th>
						<th>Date Handed Over</th>
						<th>Date Start Service</th>
						<th>Detect Expiry Date</th>
						<th>Date Stop Service</th>
					</tr>
					<tr>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
						<td>F</td>
						<td>G</td>
						<td>H</td>
						<td>I</td>
						<td>J</td>
					</tr>
				</table>
				<div style="height:10px;"></div>
	</div>
	
	<table class="tbl-wovvf">
		<tr style="height:189px;">
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Prepared and signed on behalf of Advance Pact by:</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName1) ? $vvfHeader[0]->vvfName1 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation1) ? $vvfHeader[0]->vvfDesignation1 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"></span><?=isset($vvfHeader[0]->vvfDate1) ? (strtotime($vvfHeader[0]->vvfDate1) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate1), 'd-m-Y') : '') : '' ?></td>
					</tr>
				</table>
			</td>
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Verified and signed on behalf of Peninsular Medical by</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName2) ? $vvfHeader[0]->vvfName2 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation2) ? $vvfHeader[0]->vvfDesignation2 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"></span><?=isset($vvfHeader[0]->vvfDate2) ? (strtotime($vvfHeader[0]->vvfDate2) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate2), 'd-m-Y') : '') : '' ?></td>
					</tr>
				</table>
			</td>
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Endorsed and signed on behalf of IIUM Hospital by:</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName3) ? $vvfHeader[0]->vvfName3 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation3) ? $vvfHeader[0]->vvfDesignation3 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDate3) ? (strtotime($vvfHeader[0]->vvfDate3) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate3), 'd-m-Y') : '') : '' ?></span></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<div style="height:10px;"></div>
	<table width="100%" class="tbl-wovvf">
		<tr><td colspan="2">Note: @ Status : Use the following codes (same as that used in CAMSIS)</td></tr>
		<tr>
			<td><img src="<?php echo base_url(); ?>images/spacer.gif" width="20" height="1"></td>
			<td><?php foreach ($array as $list) {
			if ($list[1] == $this->session->userdata('usersessn')){?>
			<?php if ('HOUSEKEEPING' == $this->session->userdata('usersessn')){ ?>
			<?php } else{ ?>
				V3 - Added installed facilities (New) (building, plant, equipment or land); V4 - Stop Service; <br />
				V5 - Transfer to others Hospitals / healthcare facility; V6  - Transfer from others Hospitals / healthcare facility; 
				V7 - Added (Donated by others);
				V8 - Upgraded Installed Facilities; <br />
				V9 - Project systems component (for assets claimed under systems and sub-systems – no fees shall be claimed under Assets / Equipment); 
				<?php }}}?>
			</td>
		</tr>
	</table>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:150px; height:50px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP HOUSEKEEPING SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b>DAILY CLEANING ACTIVITY </b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:5px; width:160px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Form No :</td>
						</tr>
						<tr>
							<td align="left"> Version :</td>
						</tr>
						<tr>
							<td align="left"> Date :</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<div style="height:10px;"></div>
		<table class="tbl-wo" border="0">
		<tr>	
			<td class="tbl-wo-vovf" style="height:50px;">
				<?php echo $this->session->userdata('usersessn'); ?> (<?php echo $list[0];?>) (Additions / Alterations / Deletion)<br>
				Table 2 - List of Equipment
			</td>
		</tr>
	</table>
	<table class="tbl-wo">
			<tr>
				<td class="tbl-tls-font">
					Note to Contractor:
					<br>
					1. Please compile this report based on the verified and endorsed list of additions and deletions (VVF for <?php echo $list[0];?>).
					<br>
					<img src="<?php echo base_url(); ?>images/spacer.gif" height="5">
				</td>
				<td align="right">
					<table class="tbl-wo-vff">
						<tr>
							<td><b>Date:</b></td>
							<td><span class="tblbox"> <?php echo date('F', mktime(0, 0, 0, $row->month0, 10)).$row->year0 ?></span></td>
						</tr>
						<tr>
							<td><b>State:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_statename ?></span></td>
						</tr>
						<tr>
							<td><b>Hospital:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_HospitalName ?></span></span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div style="height:10px;"></div>
				<table class="tablevvf" border="1">
					<tr>
						<th>A</th>
						<th>B</th>
						<th>C</th>
						<th>D</th>
						<th>E</th>
						<th>F</th>
						<th>G</th>
						<th>H</th>
						<th>I</th>
						<th>J</th>
						<th>K</th>
						<th>L</th>
					</tr>
					<tr>
						<th>Hospital</th>
						<th>Department</th>
						<th>Equipment Description</th>
						<th>Equipment Code</th>
						<th>Asset Tag <br> Number</th>
						<th>Manufacturer</th>
						<th>Model</th>
						<th>Purchase<br>Cost (RM)</th>
						<th>Status@</th>
						<th>Date Commisioned /<br>Decommisioned</th>
						<th>Date Start /<br>Stop Service</th>
						<th>Warranty <br>Expiry Date</th>
					</tr>
					<tr>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
						<td>F</td>
						<td>G</td>
						<td>H</td>
						<td>I</td>
						<td>J</td>
						<td>K</td>
						<td>L</td>
					</tr>
				</table>
				<div style="height:10px;"></div>
	</div>
	
	<table class="tbl-wovvf">
		<tr style="height:189px;">
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Prepared and signed on behalf of Advance Pact by:</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName1) ? $vvfHeader[0]->vvfName1 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation1) ? $vvfHeader[0]->vvfDesignation1 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"></span><?=isset($vvfHeader[0]->vvfDate1) ? (strtotime($vvfHeader[0]->vvfDate1) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate1), 'd-m-Y') : '') : '' ?></td>
					</tr>
				</table>
			</td>
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Verified and signed on behalf of Peninsular Medical by</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName2) ? $vvfHeader[0]->vvfName2 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation2) ? $vvfHeader[0]->vvfDesignation2 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"></span><?=isset($vvfHeader[0]->vvfDate2) ? (strtotime($vvfHeader[0]->vvfDate2) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate2), 'd-m-Y') : '') : '' ?></td>
					</tr>
				</table>
			</td>
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Endorsed and signed on behalf of IIUM Hospital by:</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName3) ? $vvfHeader[0]->vvfName3 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation3) ? $vvfHeader[0]->vvfDesignation3 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDate3) ? (strtotime($vvfHeader[0]->vvfDate3) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate3), 'd-m-Y') : '') : '' ?></span></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<div style="height:10px;"></div>
	<table width="100%" class="tbl-wovvf">
		<tr><td colspan="2">Note: @ Status : Use the following codes (same as that used in CAMSIS)</td></tr>
		<tr>
			<td><img src="<?php echo base_url(); ?>images/spacer.gif" width="20" height="1"></td>
			<td><?php foreach ($array as $list) {
			if ($list[1] == $this->session->userdata('usersessn')){?>
			<?php if ('HOUSEKEEPING' == $this->session->userdata('usersessn')){ ?>
			<?php } else{ ?>
				V3 - Added installed facilities (New) (building, plant, equipment or land); V4 - Stop Service; <br />
				V5 - Transfer to others Hospitals / healthcare facility; V6  - Transfer from others Hospitals / healthcare facility; 
				V7 - Added (Donated by others);
				V8 - Upgraded Installed Facilities; <br />
				V9 - Project systems component (for assets claimed under systems and sub-systems – no fees shall be claimed under Assets / Equipment); 
				<?php }}}?>
			</td>
		</tr>
	</table>
		<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:150px; height:50px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP HOUSEKEEPING SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b>DAILY CLEANING ACTIVITY </b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:5px; width:160px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Form No :</td>
						</tr>
						<tr>
							<td align="left"> Version :</td>
						</tr>
						<tr>
							<td align="left"> Date :</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div style="height:10px;"></div>
		<table class="tbl-wo" border="0">
		<tr>	
			<td class="tbl-wo-vovf" style="height:50px;">
				<?php echo $this->session->userdata('usersessn'); ?> (<?php echo $list[0];?>) (Additions / Alterations / Deletion)<br>
				Table 3 - List of variations in Land Areas
			</td>
		</tr>
	</table>
	<table class="tbl-wo">
			<tr>
				<td class="tbl-tls-font">
					Note to Contractor:
					<br>
					1. Please compile this report based on the verified and endorsed list of additions and deletions (VVF for <?php echo $list[0];?>).
					<br>
					<img src="<?php echo base_url(); ?>images/spacer.gif" height="5">
				</td>
				<td align="right">
					<table class="tbl-wo-vff">
						<tr>
							<td><b>Date:</b></td>
							<td><span class="tblbox"> <?php echo date('F', mktime(0, 0, 0, $row->month0, 10)).$row->year0 ?></span></td>
						</tr>
						<tr>
							<td><b>State:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_statename ?></span></td>
						</tr>
						<tr>
							<td><b>Hospital:</b></td>
							<td><span class="tblbox"> <?php echo $hospname[0]->v_HospitalName ?></span></span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div style="height:10px;"></div>
				<table class="tablevvf" border="1">
					<tr>
						<th>A</th>
						<th>B</th>
						<th>C</th>
						<th>E</th>
						<th>F</th>
						<th>G</th>
						<th>H</th>
						<th>I</th>
						<th>J</th>
					</tr>
					<tr>
						<th>Contractor</th>
						<th>Hospital</th>
						<th>Description of Land Areas Affected</th>
						<th>Land Area (sq.m)</th>
						<th>Status @</th>
						<th>Date Handed Over</th>
						<th>Date Start Service</th>
						<th>Proposed Rate (RM per sq.m. pa)</th>
						<th>Proposed Fee (RM pa)</th>
					</tr>
					<tr>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>E</td>
						<td>F</td>
						<td>G</td>
						<td>H</td>
						<td>I</td>
						<td>J</td>
					</tr>
				</table>
			<?php } elseif ('HOUSEKEEPING' == $this->session->userdata('usersessn')){?>
			<table class="tbl-wo" border="0">
				<tr>	
					<td class="tbl-wo-vovf" style="height:50px;">
						Summary Report on Variations - <?php echo $this->session->userdata('usersessn'); ?> (<?php echo $list[0];?>) (Additions / Alterations / Deletion)
					</td>
				</tr>
			</table>
			<table class="tbl-wo">
					<tr>
						<td class="tbl-tls-font">
							Note to Contractor:
							<br>
							1. Please compile this report based on the verified and endorsed list of additions and deletions (VVF for <?php echo $list[0];?>).
							<br>
							<img src="<?php echo base_url(); ?>images/spacer.gif" height="5">
						</td>
						<td align="right">
							<table class="tbl-wo-vff">
								<tr>
									<td><b>Date:</b></td>
									<td><span class="tblbox"> <?php echo date('F', mktime(0, 0, 0, $row->month0, 10)).$row->year0 ?></span></td>
								</tr>
								<tr>
									<td><b>State:</b></td>
									<td><span class="tblbox"> <?php echo $hospname[0]->v_statename ?></span></td>
								</tr>
								<tr>
									<td><b>Hospital:</b></td>
									<td><span class="tblbox"> <?php echo $hospname[0]->v_HospitalName ?></span></span></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div style="height:10px;"></div>

				<table class="tablevvf" border="1">
					<tr>
						<th>A</th>
						<th>B</th>
						<th>C</th>
						<th>D</th>
						<th>E</th>
						<th>F</th>
						<th>G</th>
						<th>H</th>
						<th>I</th>
						<th>J</th>
						<th>K</th>
					</tr>
					<tr>
						<th>Contractor</th>
						<th>Hospital</th>
						<th>Department</th>
						<th>Cleanable Floor<br>Area (sq. m.)</th>
						<th>Status@</th>
						<th>Date<br>Start Service</th>
						<th>Previous Usage</th>
						<th>Current Usage</th>
						<th>Proposed Rate <br>for Variations<br> (RM/sq. m.)</th>
						<th>Estimated cost /<br>of service (RM)</th>
						<th>Remarks</th>
					</tr>
					<tr>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
						<td>F</td>
						<td>G</td>
						<td>H</td>
						<td>I</td>
						<td>J</td>
						<td>K</td>
					</tr>
				</table>
			<?php } elseif ($list[1] == $this->session->userdata('usersessn')){?>

		<table class="tablevvf" border="1">

		<tr>
			<th>Department</th>
			<th>Equipment<br>Description</th>
			<th>Equipment Code</th>
			<th>Asset<br>No.</th>
			<th>Manufacturer</th>
			<th>Model</b></th>
			<th>Purchase<br>Cost (RM)</th>
			<th>Variation<br>Status</th>
			<th>Start<br>Service<br>Date</th>
			<th>Warranty<br>Expiry<br>Date</th>
			<th>Stop<br>Service<br>Date</th>
			<th>Proposed<br>Rate (DW) <br>(% pa)</th>
			<th>Proposed<br>Rate (PW) <br>(% pa)</td>
			<th>Monthly<br>Proposed<br>Fee (DW) <br>(RM)</th>
			<th>Monthly<br>Proposed<br>Fee (PW) <br>(RM)</b></th>
		</tr>
		<tr>
			<?php  
			
			if ($rowno <= $count_array-2){
				if ($this->input->post('pb1') == 'y'){
					if($currentVStatus[$rowno] != $row->vvfVStatus){
					$StartNewPage1 = 'true';
					//echo $StartNewPage1.'<br>';
					}
					elseif ($currentVStatus[$rowno] == $row->vvfVStatus){
					$StartNewPage1 = 'false';
					//echo $StartNewPage1.'<br>';
					}
				}
				if ($this->input->post('pb2') == 'y'){
					if($currentMonth[$rowno] != $row->month0){
					$StartNewPage2 = 'true';
					//echo $StartNewPage1.'<br>';
					}
					elseif ($currentMonth[$rowno] == $row->month0){
					$StartNewPage2 = 'false';
					//echo $StartNewPage1.'<br>';
					}
				}
			}

			is_null($row->vvfPurchaseCost) ? $vvfPurchaseCost = 0 : $vvfPurchaseCost = $row->vvfPurchaseCost;
			
			is_null($row->vvfFeeDW) ? $VVFFeeDW = 0 : $VVFFeeDW = $row->vvfFeeDW;
			is_null($row->vvfFeePW) ? $VVFFeePW = 0 : $VVFFeePW = $row->vvfFeePW;

			if (substr($period[2],1,1) == 2){
				if ( ((strtotime($row->vvfDateWarrantyEnd) - strtotime($period[3]+1 . '-' . 01 . '-' . 01))/86400) > 1 ){
					$VVFFeeDW = '-';
					$VVFFeePW = number_format($VVFFeePW,2);
				}
				else{
					$VVFFeePW = '-';
					$VVFFeeDW = number_format($VVFFeeDW,2);
				}
			}
			elseif (substr($period[2],1,1) == 1){
				if ( ((strtotime($row->vvfDateWarrantyEnd) - strtotime($period[3] . '-' . 07 . '-' . 01))/86400) > 1 ){
					$VVFFeeDW = '-';
				}
				else{
					$VVFFeePW = '-';
				}
			}

			if ($row->vvfVStatus == 'V4:' || $row->vvfVStatus == 'V2' || $row->vvfVStatus == 'V5'){
				$symbol = '-';
			}
			else{
				$symbol = '';
			}

			if ($symbol == '-' AND $VVFFeeDW == '-'){
				$VVFFeeDW = '';
			}

			if ($symbol == '-' AND $VVFFeePW == '-'){
				$VVFFeePW = '';
			}

			$tagger = $row->V_Tag_no;
			if (strlen($tagger) > 8){
				$AssetNo = $tagger;
			}
			else{
				$AssetNo = $row->vvfAssetNo;
			}

			$CommissionDate = $row->D_commission;
			if ($row->vvfVStatus == 'V4:' OR $row->vvfVStatus == 'V2' OR $row->vvfVStatus == 'V5'){
				$CommissionDate = $row->D_Comm;
			}
			$StartDate = $row->vvfDateStart;
			if (date('Y',strtotime($StartDate)) < '1997'){
				$StartDate = '1997-01-01';
			}
			if (date('Y',strtotime($CommissionDate)) < '1997'){
				$CommissionDate = '1997-01-01';
			}
			$WarrantyEnd = $row->vvfDateWarrantyEnd;
			$StopDate = $row->vvfDateStop;

			if (strtotime($StopDate) == TRUE){
				$StopDate = date_format(new DateTime($StopDate), 'd-m-Y');
			}
			else{
				$StopDate = 'N/A';
			}

			if ($row->vvfVStatus == 'V5'){
			isset($row->d_LocDate) ? $StopDate = date_format(new DateTime($row->d_LocDate), 'd-m-Y') : $StopDate = '';
			}
			
			if (strtotime($WarrantyEnd) == TRUE){
				$WarrantyEnd = date_format(new DateTime($WarrantyEnd), 'd-m-Y');
			}

			if (strtotime($CommissionDate) == TRUE){
				$CommissionDate = date_format(new DateTime($CommissionDate), 'd-m-Y');
			}

			if (strtotime($StartDate) == TRUE){
				$StartDate = date_format(new DateTime($StartDate), 'd-m-Y');
			}

			

			?>

			<td >&nbsp;<?=$row->v_Mohdesc?>&nbsp;</td>
			<td>&nbsp;<?=$row->vvfAssetDesc?>&nbsp;</td>
			<td>&nbsp;<?=$row->vvfAssetType?>&nbsp;</td>
			<td>&nbsp;<?=$AssetNo?>&nbsp;</td>
			<td>&nbsp;<?=$row->vvfMfg?>&nbsp;</td>			
			<td>&nbsp;<?=$row->vvfModel?>&nbsp;</td>
			<td>&nbsp;<?=$vvfPurchaseCost?>&nbsp;</td>
			<td>&nbsp;<?=$row->vvfVStatus?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$CommissionDate?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$WarrantyEnd?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$StopDate?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$row->vvfRateDW?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$row->vvfRatePW?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$symbol.$VVFFeeDW?>&nbsp;</td>
			<td style="color:#0000FF;text-align:center;" nowrap>&nbsp;<?=$symbol.$VVFFeePW?>&nbsp;</td>
		</tr>
		
		<?php if ($this->input->post('pb1') == 'y' OR $this->input->post('pb2') == 'y') { ?>
		<?php if ($StartNewPage1 == 'true' OR $StartNewPage2 == 'true') { ?>
		<?php $counter++ ?>
		<?php if ($counter < 10) { ?>
		<?php $emptyline = 10 - $counter;?>
		<?php } ?>
		<?php while ($emptyline > 0) { ?>
		<?php $emptyline-- ?>
		<tr>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
		</tr>
		<?php } ?>
		<?php } ?>
		<?php if ($StartNewPage1 == 'false' AND $StartNewPage2 == 'false') { ?>
		<?php $counter++ ?>
		<?php if ($rowno + 1 == $count_array) { ?>
		<?php if ($counter < 10) { ?>
		<?php $emptyline = 10 - $counter;?>
		<?php } ?>
		<?php while ($emptyline > 0) { ?>
		<?php $emptyline-- ?>
		<tr>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
		</tr>
		<?php } ?>
		<?php } ?>
		<?php } ?>
		<?php } ?>
		
		<?php if ($this->input->post('pb1') == '' AND $this->input->post('pb2') == '') { ?>
		<?php if (($rowno + 2) > $count_array) { ?>
		<?php if ($count_array > 10) { ?>
		<?php $extraline = $count_array - 10?>
		<?php $emptyline = 10 - $extraline;?>
		<?php } ?>
		<?php if ($count_array < 10) { ?>
		<?php $emptyline = 10 - $count_array;?>
		<?php } ?>
		<?php while ($emptyline > 0) { ?>
		<?php $emptyline-- ?>
		<?php $rowno++ ?>
		<tr>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
		</tr>
		<?php } ?>
		<?php } ?>
		<?php } ?>
		<?php $rowno++ ?>
		
			<?php } ?>
	<?php if ($rowno == $count_array OR ($rowno + 1)%10==1 OR $StartNewPage1 == 'true' OR $StartNewPage2 == 'true') { ?>	
	</table>
	<div style="height:10px;"></div>
	</div>
	
	<table class="tbl-wovvf">
		<tr style="height:189px;">
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Prepared and signed on behalf of Advance Pact by:</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName1) ? $vvfHeader[0]->vvfName1 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation1) ? $vvfHeader[0]->vvfDesignation1 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"></span><?=isset($vvfHeader[0]->vvfDate1) ? (strtotime($vvfHeader[0]->vvfDate1) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate1), 'd-m-Y') : '') : '' ?></td>
					</tr>
				</table>
			</td>
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Verified and signed on behalf of Peninsular Medical by</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName2) ? $vvfHeader[0]->vvfName2 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation2) ? $vvfHeader[0]->vvfDesignation2 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"></span><?=isset($vvfHeader[0]->vvfDate2) ? (strtotime($vvfHeader[0]->vvfDate2) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate2), 'd-m-Y') : '') : '' ?></td>
					</tr>
				</table>
			</td>
			<td style="border:1px solid #000000;vertical-align:top;width:34%;">
				<table width="100%" class="VVFList">
					<tr><td colspan="2">Endorsed and signed on behalf of IIUM Hospital by:</td></tr>
					<tr><td colspan="2"><img src="<?php echo base_url(); ?>images/spacer.gif" width="1" height="80"></td></tr>
					<tr>
						<td>Name&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfName3) ? $vvfHeader[0]->vvfName3 : '' ?></span></td>
					</tr>
					<tr>
						<td>Designation&nbsp;:&nbsp;</td>
						<td><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDesignation3) ? $vvfHeader[0]->vvfDesignation3 : '' ?></span></td>
					</tr>
					<tr>
						<td>Date&nbsp;:&nbsp;</td>
						<td width="100%"><span style="color:#0000FF;"><?=isset($vvfHeader[0]->vvfDate3) ? (strtotime($vvfHeader[0]->vvfDate3) == TRUE ? date_format(new DateTime($vvfHeader[0]->vvfDate3), 'd-m-Y') : '') : '' ?></span></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	
		<?php } ?>
		
			<?php }}?>
	<div style="height:10px;"></div>
	<table width="100%" class="tbl-wovvf">
		<tr><td colspan="2">Note: @ Status : Use the following codes (same as that used in CAMSIS)</td></tr>
		<tr>
			<td><img src="<?php echo base_url(); ?>images/spacer.gif" width="20" height="1"></td>
			<td><?php foreach ($array as $list) {
			if ($list[1] == $this->session->userdata('usersessn')){?>
			<?php if ('HOUSEKEEPING' == $this->session->userdata('usersessn')){ ?>
			<?php } else{ ?>
				V3 - Added installed facilities (New) (building, plant, equipment or land); V4 - Stop Service; <br />
				V5 - Transfer to others Hospitals / healthcare facility; V6  - Transfer from others Hospitals / healthcare facility; 
				V7 - Added (Donated by others);
				V8 - Upgraded Installed Facilities; <br />
				V9 - Project systems component (for assets claimed under systems and sub-systems – no fees shall be claimed under Assets / Equipment); 
				<?php }}}?>
			</td>
		</tr>
	</table>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } ?>
	<?php endforeach; ?>

