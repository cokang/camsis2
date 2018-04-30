<?php echo form_open('contentcontroller/confirmacqusv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Acquisition</b></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Supplier :  </td>
				<td><input type="text" name="n_supplier" class="form-control-button2 n_wi-date" value="<?=$this->input->post('n_supplier')?>" readonly> <span class="ui-left_mobile n_wi-ec"><br/></span><input type="text" class="form-control-button2 n_wi-s" name="n_supplier2" value="<?=$this->input->post('n_supplier2')?>" size="35"  readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Agent :</td>			
				<td><input type="text" name="n_agent" value="<?=$this->input->post('n_agent')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">File Reference :&nbsp;</td>
				<td><input type="text" name="n_file_ref" value="<?=$this->input->post('n_file_ref')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Cost (RM) :</td>
				<td>RM <input type="text" name="n_cost" value="<?=$this->input->post('n_cost')?>"class="form-control-button2 n_wi-s2" readonly></td>
			</tr>
			<tr>
				<td  class="td-assest">LPO Number : &nbsp;</td>
				<td><input type="text" name="n_lpo_no" value="<?=$this->input->post('n_lpo_no')?>"class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr><td  class="td-assest">Supply Date : &nbsp;</td>
				<td><input type="text" name="n_supply_dt" value="<?=$this->input->post('n_supply_dt')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width:200px;"/>
				</td>
			</tr>
		</table>	
	</div>
</div>
<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
<?php echo form_close(); ?>