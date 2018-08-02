<meta content="utf-8" http-equiv="encoding">
<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">RELEASE NOTE</div>
		<button onclick="javascript:myFunction('print_release_note?RN_No=<?=$this->input->get("RN_No");?>');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>

		<a href="<?php echo base_url();?>index.php/procurement/print_release_note?RN_No=<?=$this->input->get("RN_No");?>&pdf=1" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	</div>
	<div class="" align="center" style="margin-top: 125px;">
		<table border="0" align="center" style="border-collapse: collapse;margin: auto; width: 78%; font-size: 12px;" bordercolor="#111111">
			<tr>
				<td colspan="3" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:175px;"/></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="right" class="f-s-12"><b style="line-height: 15px;">QP-018<br>QF-016</b></td>
			</tr>
			<tr>
				<td align="center" colspan="3">
					<span style="font-weight:400; font-size: 19px">RELEASE NOTE</span>
				</td>
			</tr>
			<tr>
				<td width="60%;">
					<table class="tbl-wo-2" style="margin-bottom: 21px; font-size: 11px">
						<tr class="toContact">
							<td width="9.5%">No</td>
							<td width="2.5%"> : </td>
							<td><span style="color:blue;"><?= ($record[0]->rn_no) ? $record[0]->rn_no : 'N/A' ?></span></td>
						</tr>
						<tr class="toContact">
							<td>Date</td>
							<td> : </td>
							<td>
								<span style="color:blue;">
									<?= ( date('d M Y', strtotime($record[0]->Date_Stamp)) ) ? date('d M Y', strtotime($record[0]->Date_Stamp))  : 'NA' ?>
								</span>
							</td>
						</tr>
						<tr class="toContactAddr">
							<td width="9.5%" valign="top">To</td>
							<td width="2.5%" valign="top"> : </td>
							<td style="padding-top:0px;">
								<table width="75%" style="font-size: 12px;">
									<tr>
										<td class="toAddress"><?= ($record[0]->v_head_of_lls) ? $record[0]->v_head_of_lls : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="toAddress"><?= ($record[0]->v_HospitalAdd1) ? $record[0]->v_HospitalAdd1 : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="toAddress"><?= ($record[0]->v_HospitalAdd2) ? $record[0]->v_HospitalAdd2 : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="toAddress"><?= ($record[0]->v_HospitalAdd3) ? $record[0]->v_HospitalAdd3 : 'N/A' ?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">
					<table style="color:black; border-color: black; border-collapse: collapse; margin-bottom: 21px;" border="0" align="center" width="100%" id="detail" cellpadding="5">
						<thead style="background-color: #b8b8b8;">
							<tr>
								<th width="4%;">NO</th>
								<th width="53%">DESCRIPTION</th>
								<th width="24%">QUANTITY</th>
								<th width="19%">RM/Unit</th>
							</tr>
						</thead>
						<tbody>

							<?php $no=1;foreach($record[0]->item_specification as $row){?>
							<tr style="height: auto; min-height: 360px;">
								<td class="detail"><?=$no;?></td>
								<td class="detail" style="text-align:left; padding-left: 5px;"><?=$row->ItemName;?> (<?=$record[0]->Related_WO;?>)</td>
								<td class="detail"><?=$row->Qty;?></td>
								<td class="detail"><?=$row->Price;?></td>
							</tr>
							<?php $no++;} ?>
							<tr>
								<td class="autoheight"></td>
								<td class="autoheight"></td>
								<td class="autoheight"></td>
								<td class="autoheight"></td>
							</tr>
							<tr>
								<td colspan="4" align="center">
									<table width="100%">
										<tr>
											<td style="border-top: 1px solid;border-right:1px solid; width: 43%;" align="center">AUTHORIZATION</td>
											<td style="border-top: 1px solid;border-right:0px solid;" align="center">CLIENT</td>
										</tr>
										<tr>
											<td style="border-top: 1px solid;border-right:1px solid;" align="center"></td>
											<td class="tftabkew-td-white" style="border-top: 1px solid; border-right: 0px solid;" align="center">
												<table class="tftabkew" width="100%" height="100%" style="border-right: 0px solid;">
													<tr><td style="height: auto;border-right:0px solid;"></td></tr>
													<tr>
														<td style="height: 10px;border-right:0px solid;" valign="bottom">
															<center>
																<small><i>Please stamp, Sign & Fax</i><br>Received in Good Order and Condition</small>
															</center>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<table class="f-s-11" style="margin-top: 10px;">
						<tr>
							<td colspan="2" align="center" style="font-size: 11px;">
								<b>
									ADVANCE PACT SDN BHD
									<br>(Procurement Services Department)
									<br>2-3A, Perdana The Place, Jalan PJU 8/5G, Bandar Damansara Perdana
									<br>47820 Petaling Jaya, Selangor
								</b>
							</td>
						</tr>
						<tr>
							<td align="center"><b>Tel : +603-7726 8632</b></td>
							<td align="center"><b>Fax : +603-7728 3075</b></td>
						</tr>
					</table><br>
				</td>
			</tr>
			<tr class="f-s-9">
				<td align="left"><b>APSB-FORM</b></td>
				<td></td>
				<td align="right"><b>Revision 2.0: 1 Oct 2013</b></td>
			</tr>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>

<style type="text/css">
	tr.toContact{
		height: 17px;
	}
	tr.toContactAddr{
		height: 68px;
	}
	tr.toContact td, tr.toContactAddr td{
		padding-top: 3px;
	}

	table#detail, table#detail thead tr th{
		border: 1px solid black;
		font-size: 12px;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
	}
	table#detail{
		height: auto;
		min-height: 434px;
	}
	table#detail tbody tr td{
		text-align: center;
		padding: 0px;	
		border-right: 1px solid;
		background: white;
		font-size: 12px;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: 400;
		height: 20px;
	}

	.f-s-11{
		font-size: 11px;
		font-family: Arial, Helvetica, sans-serif;
	}

	.f-s-12{
		font-size: 12px;
		font-family: Arial, Helvetica, sans-serif;
	}

	.f-s-9{
		font-size: 9px;
		font-family: Arial, Helvetica, sans-serif;
	}

	table#detail tbody tr td.autoheight{
		height: auto;
	}

	table.tftabkew {
		font-size: 9px;
		font-weight: 400;
		font-family: Arial, Helvetica, sans-serif;
		color: #333333;
		border-color: black;
		border-collapse: collapse;
		min-height: 95px;
		height: auto;
	}

	table#detail tbody tr td table.tftabkew tbody tr td{
		height: 20px;
	}

	.tftabkew-td-white {
		color: black;
		background: white;
		padding-left: 5px;
		height: 20px;
		font-size: 9px;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: 400;
	}

	td.toAddress{
		border-bottom: 1px solid; height: 20px; width: 100%;
	}

</style>
