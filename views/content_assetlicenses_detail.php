
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="90%" border="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>License </b><?=isset($lic[0]->v_CertificateNo) == TRUE ? $lic[0]->v_CertificateNo : ''?></td>
			</tr>
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">License Details</td></tr>
			<?php   foreach($lic as $row):?>  
			<tr>
				<td valign="top" style="width:20%;">Certificate Number </td>
				<td valign="top">: <?=isset($row->v_CertificateNo) == TRUE ? $row->v_CertificateNo : ''?></td>
			</tr>
			<tr>
				<td valign="top">Registration Number </td>
				<td valign="top">: <?=isset($row->v_RegistrationNo) == TRUE ? $row->v_RegistrationNo : ''?></td>
			</tr>
			<tr>
				<td valign="top">Start On	 </td>
				<td valign="top">: <?=isset($row->v_StartDate) == TRUE ? date_format(new DateTime($row->v_StartDate), 'd-m-Y') : 'N/A'?></td>
			</tr>
			<tr>
				<td valign="top">Expire On	 </td>
				<td valign="top">: <?=isset($row->v_ExpiryDate) == TRUE ? date_format(new DateTime($row->v_ExpiryDate), 'd-m-Y') : 'N/A'?></td>
			</tr>
			<tr>
				<td valign="top">Grade	 </td>
				<td valign="top">: <?=isset($row->v_GradeID) == TRUE ? $row->v_GradeID : ''?></td>
			</tr>
			
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">License Category</td></tr>
			<tr>
				<td valign="top">Agency Code	 </td>
				<td valign="top">: <?=isset($row->v_AgencyCode) == TRUE ? $row->v_AgencyCode : ''?></td>
			</tr>
			<tr>
				<td valign="top">Agency Name	  </td>
				<td valign="top">: <?=isset($row->CatAgencyName) == TRUE ? $row->CatAgencyName : ''?></td>
			</tr>
			<tr>
				<td valign="top">Category Code	 </td>
				<td valign="top">: <?=isset($row->v_LicenseCategoryCode) == TRUE ? $row->v_LicenseCategoryCode : ''?></td>
			</tr>
			<tr>
				<td valign="top">Category Description	 </td>
				<td valign="top">: <?=isset($row->v_LicenceCategoryDesc) == TRUE ? $row->v_LicenceCategoryDesc : ''?></td>
			</tr>
			<tr>
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">License Holder</td></tr>
			<tr>
				<td valign="top">Identification Type	 </td>
				<td valign="top">: <?=isset($row->v_IdentificationType) == TRUE ? $row->v_IdentificationType : ''?></td>
			</tr>
			<tr>
				<td valign="top">Identification Code	   </td>
				<td valign="top">: <?=isset($row->v_key) == TRUE ? $row->v_key : ''?></td>
			</tr>
			<tr>
				<td valign="top">Description	 </td>
				<td valign="top">: <?=isset($row->v_Identification) == TRUE ? $row->v_Identification : ''?></td>
			</tr>
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Remarks</td></tr>
			<tr>
				<td colspan="2"><?=isset($row->v_Remarks) == TRUE ? $row->v_Remarks : ''?></td>
			</tr>
			<?php endforeach;?>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Edit" style="width:200px;"/>
					<?php echo anchor ('contentcontroller/assetlicenses_new', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">NEW</button>'); ?>
					<?php echo anchor ('contentcontroller/del_licsat?licid='.$lic[0]->id, '<button type="button" class="btn-button btn-primary-button" style="width:200px;">DELETE</button>'); ?>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('liccd',$this->input->get('liccd'));?>				
</div>
<?php //echo form_hidden('n_asset_no',$this->input->get('assetno'));?>
<?php //echo form_hidden('n_acces',$this->input->get('accescd'));?>
<?php echo form_close(); ?>