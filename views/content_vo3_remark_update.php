<?php echo form_open('contentcontroller/vo3_remark_confirm?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'));?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<table class="ui-desk-style-table3" style="color:black; background:white;" cellpadding="4" cellspacing="0" width="98%" align="center">	
			<tr class="ui-color-contents-style-1">
				<td class="ui-header-new" colspan="2" valign="" height="40px"><span style="float: left; margin-top:5px; font-weight: bold;">PMSB Remarks</span></td>
			</tr>
			<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Notes from PMSB for Asset <?php echo $this->input->get('rpt_no') ?> in <?php echo $this->input->get('asset') ?></td></tr>
			<tr>
				<td class="td-assest" style="width:20%;" align="right">VVF Ref No : </td>
				<td><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest"  align="right">SNF/VNF Form Ref No : </td>			
				<td><?=isset($records[0]->vvfRefNo) ? $records[0]->vvfRefNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest"  align="right">Asset Number :</td>
				<td><?=isset($records[0]->vvfAssetNo) ? $records[0]->vvfAssetNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top"  align="right">Notes From PMSB :</td>
				<td><textarea class="Input n_com" name="n_Notes"><?=isset($records[0]->vvfHQRemarks) ? $records[0]->vvfHQRemarks : 'N/A' ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="2">
				<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save">
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->get('rpt_no')) ?>
		<?php echo form_hidden('asset',$this->input->get('asset')) ?>
	</div>
</div>