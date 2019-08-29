<?php include 'left.php' ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<?php if ($this->input->post('liccd') <> '') { ?>
				<td class="ui-header-new" colspan="2"><b><?php echo $this->input->post('liccd') ?></b></td>
				<?php } ?>
				<?php if ($this->input->post('liccd') == '') { ?>
				<td class="ui-header-new" colspan="2"><b>Confirm License</b></td>
				<?php } ?>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Details</td></tr>
			<tr>
				<td class="td-assest">Certificate Number	 :  </td>
				<td><input type="text" name="n_Certificate_Number" value="<?php echo $this->input->post('n_Certificate_Number'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Registration Number	 :   </td>
				<td><input type="text" name="n_Registration_Number" value="<?php echo $this->input->post('n_Registration_Number'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Start On	 :   </td>
				<td><input type="text" name="n_Start_On" value="<?php echo $this->input->post('n_Start_On'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Expire On	 :  </td>
				<td><input type="text" name="n_Expire_On" value="<?php echo $this->input->post('n_Expire_On'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Grade	 :  </td>
				<td><input type="text" name="n_Grade" value="<?php echo $this->input->post('n_Grade'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Category</td></tr>
			<tr>
				<td class="td-assest">Agency Code	 :   </td>
				<td><input type="text" name="n_Agency_Code" value="<?php echo $this->input->post('n_Agency_Code'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Agency Name	 :  </td>
				<td><input type="text" name="n_Agency_Name" value="<?php echo $this->input->post('n_Agency_Name'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Category Code	 :  </td>
				<td><input type="text" name="n_Category_Code" value="<?php echo $this->input->post('n_Category_Code'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Category Description	 :  </td>
				<td><textarea name="n_Category_Description" class="input n_com" readonly><?php echo $this->input->post('n_Category_Description'); ?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Representative</td></tr>
			<tr>
				<td class="td-assest">Tester Name	 :  </td>
				<td><input type="text" name="n_tester" value="<?php echo set_value('n_tester')?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Holder</td></tr>
			<tr>
				<td class="td-assest">Identification Type	 :</td>
				<td><input type="text" name="n_Identification_Type" value="<?php echo $this->input->post('n_Identification_Type'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Identification Code	 :</td>
				<td><input type="text" name="n_Identification_Code" value="<?php echo $this->input->post('n_Identification_Code'); ?>" class="form-control-button2 n_wi-date" style="" readonly></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Description	 :</td>
				<td><textarea name="n_Description" class="input n_com" readonly><?php echo $this->input->post('n_Description'); ?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Remarks</td></tr>
			<tr>
				<td class="td-assest" valign="top"></td>
				<td><textarea name="n_Remarks" class="input n_com" readonly><?php echo $this->input->post('n_Remarks'); ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Add" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>		
	</div>
	<?php echo form_hidden('liccd',$this->input->post('liccd')) ?>
	<?php echo form_hidden('n_Certificate_Number',$this->input->post('n_Certificate_Number')) ?>
	<?php echo form_hidden('n_Registration_Number',$this->input->post('n_Registration_Number')) ?>
	<?php echo form_hidden('n_Start_On',date('y-m-d',strtotime($this->input->post('n_Start_On'))));?>
	<?php echo form_hidden('n_Expire_On',date('y-m-d',strtotime($this->input->post('n_Expire_On'))));?>
	<?php echo form_hidden('n_Grade',$this->input->post('n_Grade')) ?>
	<?php echo form_hidden('n_Agency_Code',$this->input->post('n_Agency_Code')) ?>
	<?php echo form_hidden('n_Agency_Name',$this->input->post('n_Agency_Name')) ?>
	<?php echo form_hidden('n_Category_Code',$this->input->post('n_Category_Code')) ?>
	<?php echo form_hidden('n_Category_Description',$this->input->post('n_Category_Description')) ?>
	<?php echo form_hidden('n_tester',$this->input->post('n_tester')) ?>
	<?php echo form_hidden('n_Identification_Type',$this->input->post('n_Identification_Type')) ?>
	<?php echo form_hidden('n_Identification_Code',$this->input->post('n_Identification_Code')) ?>
	<?php echo form_hidden('n_Description',$this->input->post('n_Description')) ?>
	<?php echo form_hidden('n_Remarks',$this->input->post('n_Remarks')) ?>

	<?php echo form_hidden('upload_data',isset($upload_data) ? $upload_data : '') ?>
</div>
<?php echo form_close(); ?>