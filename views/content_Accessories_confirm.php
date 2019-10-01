<?php echo form_open('contentcontroller/Accessories_confirmsv');?>

<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm New Accessory Item</b></td>
			</tr>
			<tr>
				<td class="td-assest">Accessory Code :  </td>
				<td>001 * System Generated</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top"><span style="color:red">Description :</span></td>			
				<td>
					<input type="text" name="n_description" value="<?php echo $this->input->post('n_description'); ?>" class="form-control-button2 n_wi-date" readonly> <br />
					<span>Example: <b>MOBILE STAND FOR MONITOR, MODEL:AG6124B, S/NO:167A00166, 1 UNIT </b>Make it as meaningful as possible. Please do not leave it blank or use 'Not Applicable' or 'Not Available'.	</span>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2" >
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
		</div>				
</div>
<?php echo form_hidden('n_asset_no',$this->input->post('n_asset_no'));?>
<?php echo form_hidden('n_acces',$this->input->post('n_acces'));?>
<?php echo form_close(); ?>