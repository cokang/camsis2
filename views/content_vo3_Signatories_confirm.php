<?php echo form_open('vo3_signatories_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"></div>
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
							<td class="ui-header-new" colspan="2" valign="" height="40px"><span style="float: left; margin-top:5px; font-weight: bold;">Confirm Signatories <?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?></span></td>
						</tr>       			
	    				<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Preparation</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Prepared and signed on behalf of Contractor by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><input type="text" name="n_vo3_name1" value="<?php echo set_value('n_vo3_name1'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><input type="text" name="n_vo3_Designation1" value="<?php echo set_value('n_vo3_Designation1'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><input type="date" name="n_vo3_Date1" value="<?php echo set_value('n_vo3_Date1'); ?>" class="form-control-button2 n_wi-date2"  disabled></td>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Verification</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Verified and signed on behalf of Jurutera Hospital by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><input type="text" name="n_vo3_name2" value="<?php echo set_value('n_vo3_name2'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><input type="text" name="n_vo3_Designation2" value="<?php echo set_value('n_vo3_Designation2'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><input type="date" name="n_vo3_Date2" value="<?php echo set_value('n_vo3_Date2'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Report Endorsement</td></tr>
	    				<tr>
	    					<td colspan="2"><span style="color:blue;">Endorsed and signed on behalf of Contract hospital by :</span></td>
	    				</tr>
	    				<tr>
							<td class="td-assest" align="right">Name :  </td>
							<td><input type="text" name="n_vo3_name3" value="<?php echo set_value('n_vo3_name3'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Designation  :</td>			
							<td><input type="text" name="n_vo3_Designation3" value="<?php echo set_value('n_vo3_Designation3'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Date :</td>
							<td><input type="date" name="n_vo3_Date3" value="<?php echo set_value('n_vo3_Date3'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="2">
								<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
								<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->post('rpt_no')); ?>
		<?php echo form_hidden('n_vo3_name1',$this->input->post('n_vo3_name1')); ?>
		<?php echo form_hidden('n_vo3_Designation1',$this->input->post('n_vo3_Designation1')); ?>
		<?php echo form_hidden('n_vo3_Date1',$this->input->post('n_vo3_Date1')); ?>
		<?php echo form_hidden('n_vo3_name2',$this->input->post('n_vo3_name2')); ?>
		<?php echo form_hidden('n_vo3_Designation2',$this->input->post('n_vo3_Designation2')); ?>
		<?php echo form_hidden('n_vo3_Date2',$this->input->post('n_vo3_Date2')); ?>
		<?php echo form_hidden('n_vo3_name3',$this->input->post('n_vo3_name3')); ?>
		<?php echo form_hidden('n_vo3_Designation3',$this->input->post('n_vo3_Designation3')); ?>
		<?php echo form_hidden('n_vo3_Date3',$this->input->post('n_vo3_Date3')); ?>
	</div>
</div>