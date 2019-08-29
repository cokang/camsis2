<?php echo form_open('contentcontroller/confirmacqu');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="2"><b>Acquisition</b></td>
				</tr>
				<tr>
					<td class="td-assest" valign="top">Supplier :  </td>
					<td><input type="text" name="n_supplier" class="form-control-button2 n_wi-eq" value="<?= isset($asset_det[0]->V_Vendor_code) == TRUE ? $asset_det[0]->V_Vendor_code : 'N/A'?>" id="n_agent" readonly> 
						<span class="icon-windows" onclick="fCallpop_vendor(this)" value="updateacqu"></span> <span class="ui-left_mobile n_wi-ec"><br/></span>
						<input type="text" class="form-control-button2 n_wi-s" name="n_supplier2" value="<?= isset($asset_det[0]->v_vendorname) == TRUE ? $asset_det[0]->v_vendorname : 'N/A'?>" id="n_agent2" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">Service Agent :</td>			
					<td><input type="text" name="n_agent" value="<?= isset($asset_det[0]->V_Agent) == TRUE ? $asset_det[0]->V_Agent : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
				</tr>
				<tr>
					<td class="td-assest">File Reference :&nbsp;</td>
					<td><input type="text" name="n_file_ref" value="<?= isset($asset_det[0]->V_File_Ref_no) == TRUE ? $asset_det[0]->V_File_Ref_no : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
				</tr>
				<tr>
					<td class="td-assest">Cost (RM) :</td>
					<td>RM <input type="text" name="n_cost" value="<?= isset($asset_det[0]->N_Cost) == TRUE ? $asset_det[0]->N_Cost : 'N/A'?>" class="form-control-button2 n_wi-s2"></td>
				</tr>
				<tr>
					<td class="td-assest">LPO Number : &nbsp;</td>
					<td><input type="text" name="n_lpo_no" value="<?= isset($asset_det[0]->V_PO_no) == TRUE ? $asset_det[0]->V_PO_no : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
				</tr>
				<tr><td class="td-assest">Supply Date : &nbsp;</td>
					<td><input type="text" id="date0" name="n_supply_dt" value="<?= isset($asset_det[0]->V_PO_date) == TRUE ? date_format(new DateTime($asset_det[0]->V_PO_date), 'd-m-Y') : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
				</tr>
				<tr class="ui-header-new" style="height:40px;">
					<td align="center" colspan="2">
						
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
					</td>
				</tr>
			</table>
		</div>				
</div>
<?php include 'content_jv_popup.php';?>
<?php echo form_hidden('n_asset_number',isset($asset_det[0]->V_Asset_no) == TRUE ? $asset_det[0]->V_Asset_no : 'N/A');?>
<?php echo form_close(); ?>