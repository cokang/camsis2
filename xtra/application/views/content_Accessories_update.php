<?php echo form_open('contentcontroller/Accessories_confirm');?>

<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>New Accessory Item</b></td>
			</tr>
			<tr>
				<td class="td-assest">Accessory Code :  </td>
				<td>001 * System Generated</td>
			</tr>
			<tr>
				<td valign="top" class="td-assest"><span style="color:red">Description :</span></td>			
				<td><input type="text" name="n_description" value="<?= $this->input->get('accesnm') ?>" class="form-control-button2 n_wi-date"> <br />
					<span>Example: <b>MOBILE STAND FOR MONITOR, MODEL:AG6124B, S/NO:167A00166, 1 UNIT </b>Make it as meaningful as possible. Please do not leave it blank or use 'Not Applicable' or 'Not Available'.	
					</span>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
				</td>
			</tr>
		</table>
	</div>
</div>

<?php echo form_hidden('n_asset_no',$this->input->get('assetno'));?>
<?php echo form_hidden('n_acces',$this->input->get('accescd'));?>
<?php echo form_close(); ?>