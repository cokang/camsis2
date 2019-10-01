<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>			
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Variation History</span></b>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr >
										<td class="ui-desk-style-table" align="center" style="padding:10px;">
											<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="60%">	
												<tr class="ui-color-contents-style-1" height="40px" align="center">
													<td class="ui-header-new" colspan=""><b>Variation History for Asset No. <?=isset($record[0]->V_Tag_no) ? $record[0]->V_Tag_no : ''?></b></td>
												</tr>
												<tr class="ui-color-color2" style="height:40px; font-size:14px;">
														<td align="center" colspan="" style="">
															<span style="color:black;"><b>Warranty Expiring Date</b></span>
														</td>
													</tr>
												<?php if ($record) { ?>
													<tr class="ui-color-color" style="height:40px; font-size:14px;">
														<td align="center" colspan="">
															<span style="color:black;"><?=isset($record[0]->V_Wrn_end_code) ? date("d M Y",strtotime($record[0]->V_Wrn_end_code)) : ''?></span>
														</td>
													</tr>
												<?php } else { ?>
													<tr class="ui-color-color2" style="height:40px; font-size:14px;">
														<td align="center" colspan="" style="">
															<span style="color:black;">NO WARRANTY END CODE FOUND.</span>
														</td>
													</tr>
												<?php } ?>
												
											</table>
											<br />
											<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="90%">	
												<tr class="ui-color-contents-style-1" height="40px" align="center">
													<td class="ui-header-new" colspan="3"><b>Variation History for Asset No. <?php echo $_GET['asstno']; ?></b></td>
												</tr>
												<tr class="ui-color-color2" style="height:40px; font-size:14px; font-weight:bold;">
													<td align="center" colspan="" style="width:60%;">
														<span style="color:black;">Vo Description</span>
													</td>
													<td align="center" colspan="" style="">
														<span style="color:black;">Effective Date</span>
													</td>
													<td align="center" colspan="">
														<span style="color:black;">Project Cost</span>
													</td>
												</tr>
												<tr class="ui-color-color" style="height:40px; font-size:14px;">
													<td align="center" colspan="" style="">
														<span style="color:black;">V3:Added</span>
													</td>
													<td align="center" colspan="" style="width:;">
														<span style="color:black;">03 Dec 2012</span>
													</td>
													<td align="center" colspan="">
														<span style="color:black;">13200</span>
													</td>
												</tr>
												<tr class="ui-color-color" style="height:40px; font-size:14px;">
													<td align="center" colspan="" >
														<span style="color:black;">V10:Asset in initial fee submission for any new or replacement hospital</span>
													</td>
													<td align="center" colspan="" style="width:">
														<span style="color:black;">03 Dec 2012</span>
													</td>
													<td align="center" colspan="">
														<span style="color:black;">13200</span>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
