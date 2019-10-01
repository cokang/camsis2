
<?php include 'left.php' ?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<?php if ($this->input->post('liccd') <> '') { ?>
				<td class="ui-header-new" colspan="2"><b><?php echo $this->input->post('liccd'); ?></b></td>
				<?php } ?>
				<?php if ($this->input->post('liccd') == '') { ?>
				<td class="ui-header-new" colspan="2"><b>New License</b></td>
				<?php } ?>
			</tr>
			<tr><td colspan="2"><span style="color:red;"><?php echo validation_errors(); ?></span></td></tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Details</td></tr>
			<tr>
				<td class="td-assest">Certificate Number	 :  </td>
				<td><input type="text" name="n_Certificate_Number" value="<?php echo set_value('n_Certificate_Number', isset($lic[0]->v_CertificateNo) == TRUE ? $lic[0]->v_CertificateNo : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest">Registration Number	 :   </td>
				<td><input type="text" name="n_Registration_Number" value="<?php echo set_value('n_Registration_Number', isset($lic[0]->v_RegistrationNo) == TRUE ? $lic[0]->v_RegistrationNo : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest">Start On	 :   </td>
				<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_Start_On" value="<?php echo set_value('n_Start_On', isset($lic[0]->v_StartDate) == TRUE ? date_format(new DateTime($lic[0]->v_StartDate), 'd-m-Y') : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest">Expire On	 :  </td>
				<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_Expire_On" value="<?php echo set_value('n_Expire_On', isset($lic[0]->v_ExpiryDate) == TRUE ? date_format(new DateTime($lic[0]->v_ExpiryDate), 'd-m-Y') : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest">Grade	 :  </td>
				<td><input type="text" name="n_Grade" value="<?php echo set_value('n_Grade', isset($lic[0]->v_GradeID) == TRUE ? $lic[0]->v_GradeID : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Category</td></tr>
			<tr>
				<td class="td-assest">Agency Code	 :   </td>
				<td><input type="text" name="n_Agency_Code" id="n_Agency_Code" value="<?php echo set_value('n_Agency_Code', isset($lic[0]->v_AgencyCode) == TRUE ? $lic[0]->v_AgencyCode : 'N/A')?>" class="form-control-button2 n_user_d"> <span class="icon-windows" onclick="fCallpop_Agency_Code()"></td>
			</tr>
			<tr>
				<td class="td-assest">Agency Name	 :  </td>
				<td><input type="text" name="n_Agency_Name" id="n_Agency_Name" value="<?php echo set_value('n_Agency_Name', isset($lic[0]->CatAgencyName) == TRUE ? $lic[0]->CatAgencyName : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest">Category Code	 :  </td>
				<td><input type="text" name="n_Category_Code" id="n_Category_Code" value="<?php echo set_value('n_Category_Code', isset($lic[0]->v_LicenseCategoryCode) == TRUE ? $lic[0]->v_LicenseCategoryCode : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Category Description	 :  </td>
				<td><textarea name="n_Category_Description" id="n_Category_Description" class="input n_com"><?php echo set_value('n_Category_Description', isset($lic[0]->v_LicenceCategoryDesc) == TRUE ? $lic[0]->v_LicenceCategoryDesc : 'N/A')?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Representative</td></tr>
			<tr>
				<td class="td-assest">Tester Name	 :  </td>
				<td><input type="text" name="n_tester" value="<?php echo set_value('n_tester',isset($lic[0]->v_TesterName) ? $lic[0]->v_TesterName : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">License Holder</td></tr>
			<tr>
				<td class="td-assest">Identification Type	 :</td>
				<td><input type="text" name="n_Identification_Type" id="n_Identification_Type" value="<?php echo set_value('n_Identification_Type', isset($lic[0]->v_IdentificationType) == TRUE ? $lic[0]->v_IdentificationType : 'N/A')?>" class="form-control-button2 n_user_d" > <span class="icon-windows" onclick="fCallIdentification_Type()"></td>
			</tr>
			<tr>
				<td class="td-assest">Identification Code	 :</td>
				<td><input type="text" name="n_Identification_Code" id="n_Identification_Code" value="<?php echo set_value('n_Identification_Code', isset($lic[0]->v_key) == TRUE ? $lic[0]->v_key : 'N/A')?>" class="form-control-button2 n_wi-date" style=""></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Description	 :</td>
				<td><textarea name="n_Description" id="n_Description" class="input n_com"><?php echo set_value('n_Description', isset($lic[0]->v_Identification) == TRUE ? $lic[0]->v_Identification : 'N/A')?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Remarks</td></tr>
			<tr>
				<td class="td-assest" valign="top"></td>
				<td><textarea name="n_Remarks" class="input n_com"><?php echo set_value('n_Remarks', isset($lic[0]->v_Remarks) == TRUE ? $lic[0]->v_Remarks : 'N/A')?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
				<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:200px;"/>
					
				</td>
			</tr>
		</table>
	</div>
	<?php include 'content_jv_popup.php';?>
	<?php echo form_hidden('liccd',$this->input->post('liccd')) ?>
	<?php echo form_hidden('upload_data',isset($upload_data) ? $upload_data : '') ?>
</div>
<?php echo form_close(); ?>