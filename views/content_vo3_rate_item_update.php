<?php echo form_open('vo3_rate_item_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="4" valign=""><span style="float: left; margin-top:px; font-weight: bold;">Edit Rate Item</span><span style="color:red;"><?php echo validation_errors(); ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Category : </td>
				<td colspan="3">
					<input type="text" name="n_category_code" value="<?= isset($record[0]->AssetCategoryCode) ? $record[0]->AssetCategoryCode : 'N/A' ?>" class="form-control-button2 n_wi-eq2"> 
					<span class="ui-left_mobile n_wi-ec"><br/></span>
					<input type="text" name="n_category_desc" value="<?= isset($record[0]->AssetCategoryDesc) ? $record[0]->AssetCategoryDesc : 'N/A' ?>" class="form-control-button2 n_wi-date2">
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Type Code :</td>			
				<td colspan="3">
					<input type="text" name="n_type_code" value="<?= isset($record[0]->AssetTypeCode) ? $record[0]->AssetTypeCode : 'N/A' ?>" class="form-control-button2 n_wi-eq2">
					<span class="ui-left_mobile n_wi-ec"><br/></span>
					<input type="text" name="n_type_desc" value="<?= isset($record[0]->AssetTypeDesc) ? $record[0]->AssetTypeDesc : 'N/A' ?>" class="form-control-button2 n_wi-date2">
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Status :&nbsp;</td>
				<td colspan="3"><input type="text" name="n_status" value="<?= isset($record[0]->Status) ? $record[0]->Status : 'N/A' ?>" class="form-control-button2 n_wi-date2"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Definition :</td>
				<td colspan="3"><textarea class="input n_com" id="n_definition" name="n_definition" readonly><?php echo set_value('n_summary2'); ?><?= isset($record[0]->AssetTypeDefinition) ? $record[0]->AssetTypeDefinition : 'N/A' ?></textarea></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">DW Rate : </td>
				<td valign="top"><input type="checkbox" id="n_DWRate" name="n_DWRate" onchange="fWipeOutDWRate();" value="*"<?php echo set_radio('n_Stoppage', '*', TRUE); ?><?= $record[0]->DWRate == '*' ? 'checked' : ''?>>Standard.  <br />For asset value less than 2,000,000.00 the rate is 0.75%.<br />
					For asset value more than 2,000,000.00 the rate is 0.05%
				</td>
			</tr>
			<tr>
				<td class="td-assest"></td>
				<td colspan="3">Other Value : <input type="text" id="n_DWRate2" name="n_DWRate2" value="<?= isset($record[0]->DWRate) ? $record[0]->DWRate : '' ?>" onkeypress="javascript:fUncheckStandard();" class="form-control-button2 n_wi-eq"> %</td>
			<tr>
				<td class="td-assest">PW Rate :</td>
				<td colspan="3"><input type="text" name="n_PWRate" value="<?= isset($record[0]->PWRate) ? $record[0]->PWRate : '' ?>" class="form-control-button2 n_wi-eq"> %</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
				</td>
			</tr>
		</table>				
	</div>
	<?php echo form_hidden('ratesid',$this->input->post('ratesid')) ?>
</div>
<script language="javascript" type="text/javascript">
	function fUncheckStandard()
		{
			if (document.getElementById("n_DWRate").checked == true) 
			{
			
			document.getElementById("n_DWRate").checked = false;

			} 
		}
	function fWipeOutDWRate()
		{
			if (document.getElementById("n_DWRate").checked == true) 
				{
				document.getElementById("n_DWRate2").value = '';
				document.getElementById("n_DWRate").value = '*';
				}
		}
</script>
<?php echo form_close(); ?>