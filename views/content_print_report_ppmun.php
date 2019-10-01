<?php foreach ($dept as $row): ?>
<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">Planned Preventive Maintenance (PPM)</div>
		<button onclick="javascript:myFunctionprint();" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report_ppmun'";>CANCEL</button>
	</div>
		<div style="margin-top:px;">
			<table class="tbl-wo-2" style="width:70%;" border="0">
				<tr>
					<td valign="" rowspan="" style="width:5%;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:120px; height:80px;"/></td>
					<td valign=""><span style="font-weight:bold;">Advance Pact Sdn Bhd (412168-V) </span><br /><span style="font-weight:bold; color:blue;">IIUM Medical Centre</span></td>
					<td ></td>
				</tr>
				<tr>
					<td valign="top" colspan="2">
						<table class="tbl-wo-2">
							<tr>
								<td width="9.5%">Our ref.</td>
								<td width="2.5%"> : </td>
								<td><span style="color:blue;"></span><?='PMSB - '.$this->session->userdata('hosp_code').'/PPM/'.strtoupper(date('F', mktime(0, 0, 0, $month, 10))).'-'.$year?></td>
							</tr>
							<tr>
								<td>Date</td>
								<td> : </td>
								<td><span style="color:blue;"><?=date("d F Y");?></span></td>
							</tr>
							<tr>
								<td>Head of Dept./Ward </td>
								<td> : </td>
								<td><span style="color:blue;"><?=$row?></span></td>
							</tr>
							<tr>
								<td colspan="3" style="height:30px;"></td>
							</tr>
							<tr>
								<td colspan="3" align="left">
									<table width="90%" border="0" align="center">
										<tr>
											<td width="100%">
													<p>Datuk / Datin / Sir / Madam,</p>
								
													<p>PLANNED&nbsp;PREVENTIVE&nbsp;MAINTENANCE&nbsp;SCHEDULE&nbsp;:&nbsp;<?=strtoupper(date('F', mktime(0, 0, 0, $month, 10)))?> <?=$year?></p>
								
													<p>With reference to the above, APSB shall conduct Planned Preventive Maintenance (PPM) 
												        services on all equipment listed in the attachment.</p>
								
													<p>Please notify APSB if the equipment scheduled for PPM cannot be made available 
														for the servicing work, 7 days before due date.</p>
								
													<p>For further information, please do not hesitate to contact the following personnel:</p>
											</td>
										<tr>
									<table>
									<table width="90%" border="0" align="center"> 	
									<tr>
										<td width="100"></td>
										<td width="40%"><p><?=$p_name?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td><p>ext.&nbsp;<?=$p_ext?>&nbsp;</p></td>
									</tr>
						    	</table>
						    	<table width="90%" border="0" align="center">
									<tr>
										<td width="100%">
											<p>
								Your cooperation and immediate action is highly appreciated.</p>
								
									<p>
										Thank you<br>
										</p>
									
									<p style="height:60px;"></p>
							
									<p>
										Facility Manager<br>
										Asset Management Services</p>

										</td>
									<tr>
								</table>
								<table>
									<tr>
										<td><p>cc.</p></td>
										<td><p>1.</p></td>
										<td><p>Record</p></td></tr>
								</table>

								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>
<?php endforeach; ?>