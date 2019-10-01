<?php echo form_open('service_contract_ctrl');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Add Service Contract</b></td>
			</tr>
			<tr>
				<td class="td-assest">Contract : </td>
				<td><input type="text" name="n_Contract" value="<?php echo set_value('n_Contract', isset($record[0]->contract) ? $record[0]->contract : 'N/A') ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Vendor :</td>			
				<td><input type="text" name="n_Vendor" value="<?php echo set_value('n_Vendor', isset($record[0]->vendor) ? $record[0]->vendor : 'N/A') ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Period  :</td>
				<td><input type="text" name="n_Period" id="date<?php echo $numberdate++; ?>" value="<?php echo set_value('n_Period', isset($record[0]->period) ? date_format(new DateTime($record[0]->period), 'd-m-Y') : 'N/A') ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Frequency  :</td>
				<td><input type="text" name="n_Frequency" value="<?php echo set_value('n_Frequency', isset($record[0]->frequency) ? $record[0]->frequency : 'N/A') ?>" class="form-control-button2 n_wi-date" /></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Reference :&nbsp;</td>			
				<td><textarea name="n_Reference" class="input n_com"><?php echo set_value('n_Reference', isset($record[0]->reference) ? $record[0]->reference : 'N/A') ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:200px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('asstno',$this->input->get('asstno'))?>				
	</div>
</div>
<?php echo form_close(); ?>