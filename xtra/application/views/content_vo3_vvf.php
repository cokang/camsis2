<?php echo form_open('contentcontroller/vo3_vvf_update?rpt_no='.$this->input->get('rpt_no'));?>
<div class="ui-middle-screen">
<?php include 'content_vo3_menu.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="98%" align="center">
			<?php include 'content_vo3_tab.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="12" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td width="" colspan="12" valign="top" align="center" class="pd-bttm">
					<table class="ui-desk-style-table4" cellpadding="4" cellspacing="0" border="0">
						<?php if (!empty($records[0]->vvfReportNo)) { ?> 	
						<tr class="ui-color-contents-style-1" height="30px">
							<td class="ui-header-new" colspan="2" valign=""><span style="float: left; margin-top:8px; font-weight: bold;"><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?> - General Information</span><span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 80px;" name="mysubmit" value="Edit"></span></td>
						</tr> 
						<?php } ?>
						<?php if (empty($records[0]->vvfReportNo)) { ?> 	
						<tr class="ui-color-contents-style-1" height="30px">
							<td class="ui-header-new" colspan="2" valign=""><span style="float: left; margin-top:8px; font-weight: bold;">General Information</span><span style="float: right; padding-right:10px;"><?php echo anchor ('contentcontroller/vo3_vvf?&rpt_no='.$this->input->get('rpt_no'), '<button type="button" class="btn-button btn-primary-button" style="width:80px;">Edit</button>'); ?></span></td>
						</tr> 
						<?php } ?>

						<?php if (!empty($records[0]->vvfReportNo)) { ?>     			
	    				<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">General</td></tr>
	    				<tr>
							<td class="td-assest" align="right">VVF Reference Number :  </td>
							<td><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Report Date :</td>			
							<td><?= isset($records[0]->vvfDateStart) == TRUE ? date_format(new DateTime($records[0]->vvfDateStart), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Registration Date Range :</td>
							<td><?= isset($records[0]->vvfDateStart) == TRUE ? date_format(new DateTime($records[0]->vvfDateStart), 'd-m-Y') : 'N/A'?> to <?= isset($records[0]->vvfDateEnd) == TRUE ? date_format(new DateTime($records[0]->vvfDateEnd), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Report Status :</td>
							<?php if (isset($records[0]->vvfReportStatus) == TRUE) { ?>
							<?php if ($records[0]->vvfReportStatus == 'A') { ?>
							<td><span style="color:green;">New</span></td>
							<?php } ?>
							<?php if ($records[0]->vvfReportStatus == 'BO') { ?>
							<td><span style="color:green;">In Progress</span></td>
							<?php } ?>
							<?php if ($records[0]->vvfReportStatus == 'C') { ?>
							<td><span style="color:green;">Closed</span></td>
							<?php } ?>
							<?php if ($records[0]->vvfReportStatus != 'A' && ($records[0]->vvfReportStatus != 'BO') && ($records[0]->vvfReportStatus != 'C')) { ?>
							<td><span style="color:green;">Unknown</span></td>
							<?php } ?>
							<?php } ?>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Post-Submission to MOH</td></tr>
	    				<tr>
							<td colspan="2">Once submitted to MOH, please update these information.</td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date VVF Submitted To MOH : </td>			
							<td><?= isset($records[0]->vvfSubmissionDate) == TRUE ? date_format(new DateTime($records[0]->vvfSubmissionDate), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Asset Lock :</td>
							<?php if (isset($records[0]->vvfAssetLock) == TRUE) { ?>
							<?php if ($records[0]->vvfAssetLock == 'L') { ?>
							<td>All assets are still locked.</td>
							<?php } ?>
							<?php if ($records[0]->vvfAssetLock != 'L') { ?>
							<td>Asset no longer locked.</td>
							<?php } ?>
							<?php } ?>
						</tr>
						<?php } ?>
						<?php if (empty($records[0]->vvfReportNo)) { ?>
							<tr align="center" style="background:white; height:200px;">
					    	<td colspan="10" class="default-NO">NO SIGNATORY INFORMATION FOUND FOR THIS REPORT.</td>
					    	</tr>
						<?php } ?>
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
<?php echo form_close(); ?>