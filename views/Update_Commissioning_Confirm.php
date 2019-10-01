<?php echo form_open('contentcontroller/confirmcommissioningsv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Commissioning</b></td>
			</tr>
			<tr>
				<td width="25%">T & C Request  Number : </td>
				<td><input type="text" name="n_tnc_num" value="<?=$this->input->post('n_tnc_num')?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td>Commissioning Date :</td>			
				<td><input type="text" name="n_commdt" value="<?=$this->input->post('n_commdt')?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td>Warranty End Date : &nbsp;</td>
				<td><input type="text" name="n_warrenddt" value="<?=$this->input->post('n_warrenddt')?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td>Technical Report :</td>
				<td><input type="text" name="n_technical_rpt" value="<?=$this->input->post('n_technical_rpt')?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td valign="top">Job Type Code :&nbsp;</td>
				
					<td><input type="text" name="n_job_type_code" value="<?=$this->input->post('n_job_type_code')?>" class="form-control-button2" readonly></td>
				
			</tr>
			<tr>
				<td>Contract Code :&nbsp;</td>
				
					<td><input type="text" name="n_contract_code" value="<?=$this->input->post('n_contract_code')?>" class="form-control-button2" readonly></td>
				
			</tr>
			<tr>
				<td>Asset Workgroup Code : &nbsp;	
				
					<td><input type="text" name="n_assetwgcode" value="<?=$this->input->post('n_assetwgcode')?>" class="form-control-button2" readonly></td>
				
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Change</button>-->
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width:200px;"/>
				</td>
			</tr>
		</table>	
	</div>
</div>
<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
<?php echo form_close(); ?>