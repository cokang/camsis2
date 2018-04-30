<?php echo form_open('vo3_rate_item_update_ctrl/comfirmation');?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="4" valign=""><span style="float: left; margin-top:px; font-weight: bold;">Edit Rate Item</span></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Category : </td>
				<td colspan="3">
					<input type="text" name="n_category_code" value="<?php echo set_value('n_category_code') ?>" class="form-control-button2 n_wi-eq2" disabled>
					<span class="ui-left_mobile n_wi-ec"><br/></span> 
					<input type="text" name="n_category_desc" value="<?php echo set_value('n_category_desc') ?>" class="form-control-button2 n_wi-date2" disabled>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Type Code :</td>			
				<td colspan="3">
					<input type="text" name="n_type_code" value="<?php echo set_value('n_type_code') ?>" class="form-control-button2 n_wi-eq2" disabled>
					<span class="ui-left_mobile n_wi-ec"><br/></span> 
					<input type="text" name="n_type_desc" value="<?php echo set_value('n_type_desc') ?>" class="form-control-button2 n_wi-date2" disabled>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Status :&nbsp;</td>
				<td colspan="3"><input type="text" name="n_status" value="<?php echo set_value('n_status') ?>" class="form-control-button2 n_wi-date2" disabled></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Definition :</td>
				<td colspan="3"><textarea class="input n_com" id="n_definition" name="n_definition" cols="34" rows="5" disabled><?php echo set_value('n_definition'); ?></textarea></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">DW Rate : </td>
				<?php if ($this->input->post('n_DWRate') == '*'){ ?>
				<td valign="top"><input type="checkbox" id="n_DWRate" value="*"<?php echo set_radio('n_DWRate', '*', TRUE); ?> checked disabled> Standard.  <br />For asset value less than 2,000,000.00 the rate is 0.75%.<br />
					For asset value more than 2,000,000.00 the rate is 0.05%</td>
				<?php } ?>
				<?php if ($this->input->post('n_DWRate') == ''){ ?>
				<td valign="top"><input type="checkbox" id="n_DWRate" value="*"<?php echo set_radio('n_DWRate', '*', TRUE); ?> disabled> Standard.  <br />For asset value less than 2,000,000.00 the rate is 0.75%.<br />
					For asset value more than 2,000,000.00 the rate is 0.05%</td>
				<?php } ?>
			</tr>
			<tr>
				<td></td>
				<td colspan="3">Other Value : <input type="text" name="n_DWRate2" value="<?php echo set_value('n_DWRate2') ?>" class="form-control-button2 n_wi-eq" disabled> %</td>
			<tr>
				<td class="td-assest">PW Rate :</td>
				<td colspan="3"><input type="text" name="n_PWRate" value="<?php echo set_value('n_PWRate') ?>" class="form-control-button2 n_wi-eq" disabled> %</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save">
				</td>
			</tr>
		</table>
		<?php echo form_hidden('ratesid',$this->input->post('ratesid')) ?>
		<?php echo form_hidden('n_category_code',$this->input->post('n_category_code')) ?>
		<?php echo form_hidden('n_category_desc',$this->input->post('n_category_desc')) ?>
		<?php echo form_hidden('n_type_code',$this->input->post('n_type_code')) ?>
		<?php echo form_hidden('n_type_desc',$this->input->post('n_type_desc')) ?>
		<?php echo form_hidden('n_status',$this->input->post('n_status')) ?>
		<?php echo form_hidden('n_definition',$this->input->post('n_definition')) ?>
		<?php echo form_hidden('n_DWRate',$this->input->post('n_DWRate')) ?>
		<?php echo form_hidden('n_DWRate2',$this->input->post('n_DWRate2')) ?>	
		<?php echo form_hidden('n_PWRate',$this->input->post('n_PWRate')) ?>			
	</div>
	
</div>
<?php echo form_close(); ?>
