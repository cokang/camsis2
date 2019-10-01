<?php echo form_open('contentcontroller/assetstatutory_update_confrimsv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Statutory</b></td>
			</tr>
			<tr>
				<td class="td-assest">Authorit: </td>
				<td><input type="text" name="n_Authorit" value="<?php echo set_value('n_Authorit'); ?>" class="form-control-button2 n_wi-date"  readonly></td>
			</tr>
			<tr>
				<td class="td-assest">&nbsp;</td>
				<td><input type="text" name="n_Authorit2" value="<?php echo set_value('n_Authorit2'); ?>" class="form-control-button2 n_wi-date"  readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Registration Number:</td>			
				<td><input type="text" name="n_Registration_Number" value="<?php echo set_value('n_Registration_Number'); ?>" class="form-control-button2 n_wi-date"  readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Certificate Number :</td>
				<td><input type="text" name="n_Certificate_Number" value="<?php echo set_value('n_Certificate_Number'); ?>" class="form-control-button2 n_wi-date"  readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Issued On :</td>
				<td><input type="input" name="n_Issued_On" value="<?php echo set_value('n_Issued_On'); ?>" class="form-control-button2 n_wi-date" readonly/></td>
			</tr>
			<tr>
				<td class="td-assest">Inspected On :&nbsp;</td>
				<td><input type="input" name="n_Inspected_On" value="<?php echo set_value('n_Inspected_On'); ?>" class="form-control-button2 n_wi-date" readonly/></td>
			</tr>
			<tr><td class="td-assest">Start On:&nbsp;</td>
				<td><input type="input" name="n_Start_On" value="<?php echo set_value('n_Start_On'); ?>" class="form-control-button2 n_wi-date" readonly/></td>
			</tr>
			<tr>
				<td class="td-assest">End On :&nbsp;	</td>
				<td><input type="input" name="n_End_On" value="<?php echo set_value('n_End_On'); ?>" class="form-control-button2 n_wi-date" readonly/></td>
			</tr>
			<tr>
				<td class="td-assest">Class / Grade :&nbsp;</td>			
				<td><input type="text" name="n_Class_Grade" value="<?php echo set_value('n_Class_Grade'); ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Remarks :&nbsp;</td>			
				<td><textarea name="n_Remarks" class="input n_com"  readonly><?php echo set_value('n_Remarks'); ?></textarea></td>
			</tr>
			<?php if ($this->input->post('id') != '') { ?>
			<tr>		
				<td><input type="checkbox" name="delete_chk" value="1"<?php echo set_checkbox('delete_chk', '1'); ?> disabled>Delete Data<br></td>
			</tr>
			<?php } ?>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php echo form_hidden('assetno',$this->input->post('assetno'));?>
<?php echo form_hidden('certno',$this->input->post('certno'));?>
<?php echo form_hidden('id',$this->input->post('id'));?>
<?php echo form_hidden('n_Authorit',$this->input->post('n_Authorit'));?>
<?php echo form_hidden('n_Authorit2',$this->input->post('n_Authorit2'));?>
<?php echo form_hidden('n_Registration_Number',$this->input->post('n_Registration_Number'));?>
<?php echo form_hidden('n_Certificate_Number',$this->input->post('n_Certificate_Number'));?>
<?php echo form_hidden('n_Issued_On',date('y-m-d',strtotime($this->input->post('n_Issued_On'))));?>
<?php echo form_hidden('n_Inspected_On',date('y-m-d',strtotime($this->input->post('n_Inspected_On'))));?>
<?php echo form_hidden('n_Start_On',date('y-m-d',strtotime($this->input->post('n_Start_On'))));?>
<?php echo form_hidden('n_End_On',date('y-m-d',strtotime($this->input->post('n_End_On'))));?>
<?php echo form_hidden('n_Class_Grade',$this->input->post('n_Class_Grade'));?>
<?php echo form_hidden('n_Remarks',$this->input->post('n_Remarks'));?>
<?php echo form_hidden('delete_chk',$this->input->post('delete_chk'));?>
<?php echo form_hidden('n_acces',$this->input->post('n_acces'));?>
<?php echo form_close(); ?>