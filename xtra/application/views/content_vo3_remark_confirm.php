<?php echo form_open('vo3_remark_update_ctrl') ?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<table class="ui-desk-style-table3" style="color:black; background:white;" cellpadding="4" cellspacing="0" width="98%" align="center">	
			<tr class="ui-color-contents-style-1">
				<td class="ui-header-new" colspan="2" valign="" height="40px"><span style="float: left; margin-top:5px; font-weight: bold;">PMSB Remarks</span></td>
			</tr>
			<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Notes from PMSB for Asset <?php echo $this->input->post('asset') ?> in <?php echo $this->input->post('rpt_no') ?></td></tr>
			<tr>
				<td class="td-assest" style="width:20%;" align="right">VVF Ref No : </td>
				<td><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" align="right">SNF/VNF Form Ref No : </td>			
				<td><?=isset($records[0]->vvfRefNo) ? $records[0]->vvfRefNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" align="right">Asset Number :</td>
				<td><?=isset($records[0]->vvfAssetNo) ? $records[0]->vvfAssetNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" align="right">Notes From PMSB :</td>
				<td><textarea class="Input n_com" name="n_Notes"  cols="30" rows="4" disabled><?php echo $this->input->post('n_Notes') ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="2">
				<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                              <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('n_Notes',$this->input->post('n_Notes')) ?>
		<?php echo form_hidden('rpt_no',$this->input->post('rpt_no')) ?>
		<?php echo form_hidden('asset',$this->input->post('asset')) ?>
	</div>
</div>