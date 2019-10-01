<?php echo form_open('contentcontroller/vo3_Signatories_update?rpt_no='.$this->input->get('rpt_no'));?>
<div class="ui-middle-screen">
<?php include 'content_vo3_menu.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="98%" align="center">
			<?php include 'content_vo3_tab.php';?>
			<tr class="ui-color-contents-style-1">
				<td colspan="12" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td width="" colspan="12" valign="top" align="center" class="pd-bttm">
					<table class="ui-desk-style-table4" cellpadding="4" cellspacing="0" width="98%">	
						<tr class="ui-color-contents-style-1" height="30px">
							<td class="ui-header-new" colspan="2" valign=""><span style="float: left; margin-top:8px; font-weight: bold;"><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?> - Signatories</span><span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 80px;" name="mysubmit" value="Edit"></span></td>
						</tr>       			
	    				<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Preparation</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Prepared and signed on behalf of Contractor by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><?=isset($records[0]->vvfName1) ? $records[0]->vvfName1 : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><?=isset($records[0]->vvfDesignation1) ? $records[0]->vvfDesignation1 : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><?= isset($records[0]->vvfDate1) == TRUE ? date_format(new DateTime($records[0]->vvfDate1), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Verification</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Verified and signed on behalf of Jurutera Hospital by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest"  align="right">Name :  </td>
							<td><?=isset($records[0]->vvfName2) ? $records[0]->vvfName2 : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><?=isset($records[0]->vvfDesignation2) ? $records[0]->vvfDesignation2 : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><?= isset($records[0]->vvfDate2) == TRUE ? date_format(new DateTime($records[0]->vvfDate2), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Endorsement</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Endorsed and signed on behalf of Contract hospital by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><?=isset($records[0]->vvfName3) ? $records[0]->vvfName3 : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><?=isset($records[0]->vvfDesignation3) ? $records[0]->vvfDesignation3 : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><?= isset($records[0]->vvfDate3) == TRUE ? date_format(new DateTime($records[0]->vvfDate3), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="2">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->get('rpt_no')); ?>
	</div>
</div>