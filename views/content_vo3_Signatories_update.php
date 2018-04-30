<?php echo form_open('contentcontroller/vo3_Signatories_confirm?rpt_no='.$this->input->get('rpt_no'));?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="98%" align="center">
			<tr class="ui-left_web">
				<td class="ui-header-new" align="center" colspan="0" style="width:25%; height:30px;">General</td>
				<td class="ui-highlight2" align="center" colspan="0" style="width:25%;">Signatories</td>
				<td class="ui-header-new" align="center" colspan="0" style="width:25%;">Assets</td>
				<td class="ui-header-new" align="center" colspan="0" style="width:25;">Rates and Fees</td>
			</tr>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="12" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td width="" colspan="12" valign="top" align="center" class="pd-bttm">
					<table class="ui-desk-style-table4" style="color:black; background:white;" cellpadding="4" cellspacing="0" width="98%">	
						<tr class="ui-color-contents-style-1">
							<td class="ui-header-new" colspan="2" valign="" height="40px"><span style="float: left; margin-top:5px; font-weight: bold;">Edit Signatories <?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?></span></td>
						</tr>       			
	    				<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Preparation</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Prepared and signed on behalf of Contractor by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><input type="text" name="n_vo3_name1" value="<?=isset($records[0]->vvfName1) ? $records[0]->vvfName1 : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><input type="text" name="n_vo3_Designation1" value="<?=isset($records[0]->vvfDesignation1) ? $records[0]->vvfDesignation1 : 'N/A'?>" class="form-control-button2 n_wi-date2" ></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><input type="date" name="n_vo3_Date1" value="<?= isset($records[0]->vvfDate1) == TRUE ? date_format(new DateTime($records[0]->vvfDate1), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Verification</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Verified and signed on behalf of Jurutera Hospital by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><input type="text" name="n_vo3_name2" value="<?=isset($records[0]->vvfName2) ? $records[0]->vvfName2 : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><input type="text" name="n_vo3_Designation2" value="<?=isset($records[0]->vvfDesignation2) ? $records[0]->vvfDesignation2 : 'N/A'?>" class="form-control-button2 n_wi-date2" ></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><input type="date" name="n_vo3_Date2" value="<?= isset($records[0]->vvfDate2) == TRUE ? date_format(new DateTime($records[0]->vvfDate2), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Endorsement</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Endorsed and signed on behalf of Contract hospital by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><input type="text" name="n_vo3_name3" value="<?=isset($records[0]->vvfName3) ? $records[0]->vvfName3 : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><input type="text" name="n_vo3_Designation3" value="<?=isset($records[0]->vvfDesignation3) ? $records[0]->vvfDesignation3 : 'N/A'?>" class="form-control-button2 n_wi-date2" ></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><input type="date" name="n_vo3_Date3" value="<?= isset($records[0]->vvfDate3) == TRUE ? date_format(new DateTime($records[0]->vvfDate3), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="2">
								<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->post('rpt_no')); ?>
	</div>
</div>