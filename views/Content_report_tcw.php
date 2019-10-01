<div id="Instruction" class="pr-printer">
    <div class="header-pr">T&C WITHOUT AV12</div>
    <button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
</div>

<div class="menu" style="position:relative;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>T&C WITHOUT AV12</td>
		</tr>
	</table>
	<div id="Instruction" style="background:white;">
		<table class="tbl-wo-3" align="left">
			<tr>
				<td>T&C</td>
				<td><img src="<?php echo base_url(); ?>images/excel.png" style=""/></td>
			</tr>
		</table>
	</div>
</div>
<div class="m-div" style="margin-top:30px;">
	<div id="Instruction" style="background:white; margin-left:0px;">
		<table class="tbl-wo-3" align="left">
			<form method="post" action="">
			<tr>
				<td>Show list in :</td>
				<td>
					
						<select name="">
							<option selected value="all">January</option>
							<option  value="auw">Febuary</option>
							<option  value="apw">March</option>
						</select>
				</td>
				<td>
					<input type="submit" value="Apply" />
				</td>
			</tr>
		</table>
	</div>
</form>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No.</th>
			<th>Hospital</th>
			<th>Asset No.</th>
			<th>Tag No.</th>
			<th>Asset Description</th>
			<th>Manufacturer</th>
			<th>Model</th>
			<th>Serial No.</th>
			<th>T&C Date</th>
			<th>Warranty End Date</th>
			<th>User Dept. Code</th>
		<tr>
			<td>KPL</td>
			<td>KPL-BEDFB02-0014</td>
			<td>KPL13081</td>
			<td>Defibrillators, External, Manual</td>
			<td>Nihon Kohden Corp</td>
			<td>TEC-7511K</td>
			<td>01451</td>
			<td>01/04/2002</td>
			<td>ANE</td>
			<td>LIFETRONIC MEDICAL SYSTEMS SDN. BHD.</td>
			<td>16800</td>
		</tr>
	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">T&C WITHOUT AV12<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>

