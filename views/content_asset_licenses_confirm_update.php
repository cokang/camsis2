<?php echo form_open('contentcontroller/assetlicenses_confirm_updatesv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="3"><b>Edit </b>License</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Details</td></tr>
			<tr>
				<td></td>
				<td valign="top" style="width:25%;">Certificate Number :</td>
				<td valign="top"><?php echo $this->input->post('n_cert_no'); ?></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Registration Number :</td>
				<td valign="top"><input type="text" name="n_Registration_Number" value="<?php echo $this->input->post('n_Registration_Number'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Start On	 :</td>
				<td valign="top"><input type="text" name="n_Start_On" value="<?php echo $this->input->post('n_Start_On'); ?>" class="form-control-button2" style="width:31.7%;" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Expire On	 :</td>
				<td valign="top"><input type="text" name="n_Expire_On" value="<?php echo $this->input->post('n_Expire_On'); ?>" class="form-control-button2" style="width:31.7%;" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Grade	 :</td>
				<td valign="top"><input type="text" name="n_Grade" value="<?php echo $this->input->post('n_Grade'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Category</td></tr>
			<tr>
				<td></td>
				<td valign="top">Agency Code	 :</td>
				<td valign="top"><input type="text" name="n_Agency_Code" value="<?php echo $this->input->post('n_Agency_Code'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Agency Name	 : </td>
				<td valign="top"><input type="text" name="n_Agency_Name" value="<?php echo $this->input->post('n_Agency_Name'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Category Code	 :</td>
				<td valign="top"><input type="text" name="n_Category_Code" value="<?php echo $this->input->post('n_Category_Code'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Category Description	 :</td>
				<td valign="top"><textarea class="input" name="n_Category_Description" cols="22" rows="5" readonly><?php echo $this->input->post('n_Category_Description'); ?></textarea></td>
			</tr>
			<tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Holder</td></tr>
			<tr>
				<td></td>
				<td valign="top">Identification Type	 :</td>
				<td valign="top"><input type="text" name="n_Identification_Type" value="<?php echo $this->input->post('n_Identification_Type'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Identification Code	 :  </td>
				<td valign="top"><input type="text" name="n_Identification_Code" value="<?php echo $this->input->post('n_Identification_Code'); ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Description	 :</td>
				<td valign="top"><textarea class="input" name="n_Description" cols="22" rows="5" readonly><?php echo $this->input->post('n_Description'); ?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Remarks</td></tr>
			<tr>
				<td></td>
				<td>&nbsp;</td>			
				<td><textarea class="input" name="n_Remarks" cols="22" rows="5" readonly><?php echo $this->input->post('n_Remarks'); ?></textarea></td>
			</tr>
			
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="3">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width:200px;"/>
				</td>
			</tr>
		</table>
		</div>				
	</div>
</div>
<?php echo form_hidden('n_cert_no',$this->input->post('n_cert_no'));?>
<?php echo form_close(); ?>