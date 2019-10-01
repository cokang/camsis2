<?php echo form_open('contentcontroller/confirmcommissioning');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3"  cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Commissioning</b></td>
			</tr>
			<tr>
				<td class="td-assest">T & C Request  Number : </td>
				<td><input type="text" name="n_tnc_num" value="<?= isset($asset_det[0]->v_tc_request_no) == TRUE ? $asset_det[0]->v_tc_request_no : 'N/A'?>" class="form-control-button2 n_user_d" id="n_tnc_num" readonly> <span class="icon-windows" onclick="fRequest12(this)" value=""></span></td>
			</tr>
			<tr>
				<td class="td-assest">Commissioning Date :</td>			
				<td style="padding-left:6px;"> <input type="text"  id="date<?php echo $numberdate++; ?>" name="n_commdt" value="<?= isset($asset_det[0]->D_commission) == TRUE ? date_format(new DateTime($asset_det[0]->D_commission), 'd-m-Y') : 0 ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Warranty End Date : &nbsp;</td>
				<td style="padding-left:6px;"> <input type="text"  id="date<?php echo $numberdate++; ?>" name="n_warrenddt" value="<?= isset($asset_det[0]->V_Wrn_end_code) == TRUE ? date_format(new DateTime($asset_det[0]->V_Wrn_end_code), 'd-m-Y') : 0 ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Technical Report :</td>
				<td><input type="text" name="n_technical_rpt" value="<?= isset($asset_det[0]->V_TC_form_no) == TRUE ? $asset_det[0]->V_TC_form_no : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Job Type Code :   </td>
				<td>
					<input type="radio" id="radio-1-4" name="n_job_type_code" class="regular-radio" value="In-House" <?php echo set_radio('n_job_type_code', 'In-House',TRUE); ?> <?= $asset_det[0]->V_Job_Type_code == 'In-House' ? 'checked' : ''?>/> 
					<label for="radio-1-4"></label> In-House <br />
					<input type="radio" id="radio-1-5" name="n_job_type_code" class="regular-radio" value="Contract" <?php echo set_radio('n_job_type_code', 'Contract'); ?> <?= $asset_det[0]->V_Job_Type_code == 'Contract' ? 'checked' : ''?>/>   
					<label for="radio-1-5"></label>  Contract<br />
					<input type="radio" id="radio-1-6" name="n_job_type_code" class="regular-radio" value="Non-Contract" <?php echo set_radio('n_job_type_code', 'Non-Contract'); ?> <?= $asset_det[0]->V_Job_Type_code == 'Non-Contract' ? 'checked' : ''?>/>
					<label for="radio-1-6"></label> Non-Contract
				</td>
			</tr>
			<tr>
				<td class="td-assest">Contract Code :&nbsp;</td>
				<td>
					<?php echo form_dropdown('n_contract_code', $contract_list, set_value('n_contract_code',$asset_det[0]->v_ContractCode) , 'class="dropdown n_wi-date"'); ?>
				</td>
			</tr>
			<tr>
			
				<td class="td-assest">Asset Workgroup Code : &nbsp;	
				<td><?php echo form_dropdown('n_assetwgcode', $wgcode_list, set_value('n_assetwgcode',$asset_det[0]->V_Asset_WG_code) , 'class="dropdown n_wi-date"'); ?></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
				</td>
			</tr>
		</table>
		</div>			
</div>
<?php echo form_hidden('n_asset_number',isset($asset_det[0]->V_Asset_no) == TRUE ? $asset_det[0]->V_Asset_no : 'N/A');?>
<?php echo form_close(); ?>
<?php include 'content_jv_popup.php';?>