<?php echo form_open('service_contract_ctrl/confirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Service Contract</b></td>
			</tr>
			<tr>
				<td class="td-assest">Contract : </td>
				<td><input type="text" name="n_Contract" value="<?php echo set_value('n_Contract') ?>" class="form-control-button2 n_wi-date" disabled></td>
			</tr>
			<tr>
				<td class="td-assest">Vendor :</td>			
				<td><input type="text" name="n_Vendor" value="<?php echo set_value('n_Vendor') ?>" class="form-control-button2 n_wi-date" disabled></td>
			</tr>
			<tr>
				<td class="td-assest">Period  :</td>
				<td><input type="text" name="n_Period" value="<?php echo set_value('n_Period') ?>" class="form-control-button2 n_wi-date" disabled></td>
			</tr>
			<tr>
				<td class="td-assest">Frequency  :</td>
				<td><input type="text" name="n_Frequency" value="<?php echo set_value('n_Frequency') ?>" class="form-control-button2 n_wi-date" / disabled></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Remarks :&nbsp;</td>			
				<td><textarea name="n_Reference" class="input n_com" disabled><?php echo set_value('n_Reference') ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('asstno',$this->input->post('asstno'))?>	
		<?php echo form_hidden('n_Contract',$this->input->post('n_Contract'))?>
		<?php echo form_hidden('n_Vendor',$this->input->post('n_Vendor'))?>
		<?php echo form_hidden('n_Period',date('y-m-d',strtotime($this->input->post('n_Period'))));?>
		<?php echo form_hidden('n_Frequency',$this->input->post('n_Frequency'))?>
		<?php echo form_hidden('n_Reference',$this->input->post('n_Reference'))?>			
	</div>
</div>
<?php echo form_close(); ?>