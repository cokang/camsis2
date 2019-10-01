<?php echo form_open('contentcontroller/assetPPMjob_confirmsv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm New PPM Job Register</b></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Year : </td>
				<td><input type="text" name="n_Registered_Date" value="<?php echo set_value('n_Registered_Date'); ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Job Type :</td>			
				<td><input type="text" name="n_Job_Type" id="n_Job_Type" value="<?php echo set_value('n_Job_Type'); ?>" class="form-control-button2 n_wi-date" readonly> <span class="ui-left_mobile display"></span>
				 <input type="text" name="n_Job_Type2" id="n_Job_Type2" value="<?php echo set_value('n_Job_Type2'); ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Checklist Code: </td>			
				<td><input type="text" name="n_Checklist_Code" id="n_Checklist_Code" value="<?php echo set_value('n_Checklist_Code'); ?>" class="form-control-button2 n_wi-date" readonly> <span class="ui-left_mobile display"></span>
				<input type="text" name="n_Checklist_Code2" id="n_Checklist_Code2" value="<?php echo set_value('n_Checklist_Code2'); ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Procedure :</td>
				<td><input type="text" name="n_Procedure" value="<?php echo set_value('n_Procedure'); ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Spare List :&nbsp;</td>
				<td><input type="text" name="n_Spare_List" value="<?php echo set_value('n_Spare_List'); ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Details :&nbsp;</td>
				<td><textarea class="Input n_com" name="n_Details" readonly><?php echo set_value('n_Details'); ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>	
		</div>			
	</div>
	<?php echo form_hidden('year',$this->input->post('year'));?>
<?php echo form_hidden('id',$this->input->post('id'));?>
<?php echo form_hidden('n_asset_no',$this->input->post('n_asset_no'));?>
<?php echo form_close(); ?>