<?php echo form_open('vo3_assets_update_ctrl/confirmation'); ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" style="color:black;" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="3"><b>Confirm Maintenance Status</b></td>
			</tr>
			<tr>
				<td width="60px"></td>
				<td width="25%" valign="top">Criticality : </td>
				<td valign="top">
					<input type="radio" id="radio-1-1" name="n_criticality" class="regular-radio" value="01"<?php echo set_radio('n_criticality', '01',true); ?> disabled/>   
					<label for="radio-1-1"></label> Normal<br />
					<input type="radio" id="radio-1-2" name="n_criticality" class="regular-radio" value="02"<?php echo set_radio('n_criticality', '02',true); ?> disabled/>   
					<label for="radio-1-2"></label> Critical 
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Sparelist :</td>			
				<td><input type="text" name="n_sparelist" value="<?php echo set_value('n_sparelist') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Safety Test :&nbsp;</td>
				<td valign="top">
					<input type="radio" id="radio-1-3" name="n_safety_test" class="regular-radio" value="Y"<?php echo set_radio('n_safety_test', 'Y',true); ?> disabled/>   
					<label for="radio-1-3"></label> Yes <br />
					<input type="radio" id="radio-1-4" name="n_safety_test" class="regular-radio" value="N"<?php echo set_radio('n_safety_test', 'N',true); ?> disabled/>   
					<label for="radio-1-4"></label> No
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Class</td></tr>
			<tr>
				<td></td>
				<td valign="top">Asset Class:</td>
				<td valign="top">
					<input type="radio" id="radio-1-5" name="n_asset_class" class="regular-radio" value="1"<?php echo set_radio('n_asset_class', '1',true); ?> disabled/>   
					<label for="radio-1-5"></label> 1 - True Asset<br />
					<input type="radio" id="radio-1-6" name="n_asset_class" class="regular-radio" value="2"<?php echo set_radio('n_asset_class', '2',true); ?> disabled/>   
					<label for="radio-1-6"></label> 2 - Inventory With Safety<br />
					<input type="radio" id="radio-1-7" name="n_asset_class" class="regular-radio" value="3"<?php echo set_radio('n_asset_class', '3',true); ?> disabled/>   
					<label for="radio-1-7"></label> 3 - Inventory Item<br />
					<input type="radio" id="radio-1-8" name="n_asset_class" class="regular-radio" value="4"<?php echo set_radio('n_asset_class', '4',true); ?> disabled/>   
					<label for="radio-1-8"></label> 4 - Location Asset
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Status</td></tr>
			<tr>
				<td></td>
				<td valign="top">Asset Status :&nbsp;</td>
				<td valign="top">
					<input type="radio" id="radio-1-9" name="n_asset_status" class="regular-radio" value="S1:Functioning"<?php echo set_radio('n_asset_status', 'S1:Functioning',true); ?> disabled/>   
					<label for="radio-1-9"></label>&nbsp;S1&nbsp;:&nbsp;Functioning<br />
					<input type="radio" id="radio-1-10" name="n_asset_status" class="regular-radio" value="S2:Not Functioning"<?php echo set_radio('n_asset_status', 'S2:Not Functioning',true); ?> disabled/>   
					<label for="radio-1-10"></label>&nbsp;S2&nbsp;:&nbsp;Not&nbsp;Functioning<br />
					<input type="radio" id="radio-1-11" name="n_asset_status" class="regular-radio" value="S3:Not in Use"<?php echo set_radio('n_asset_status', 'S3:Not in Use',true); ?> disabled/>   
					<label for="radio-1-11"></label>&nbsp;S3&nbsp;:&nbsp;Not in Use<br />
					<input type="radio" id="radio-1-12" name="n_asset_status" class="regular-radio" value="S4:Transferred"<?php echo set_radio('n_asset_status', 'S4:Transferred',true); ?> disabled/>   
					<label for="radio-1-12"></label>&nbsp;S4&nbsp;:&nbsp;Transferred<br />
					<input type="radio" id="radio-1-13" name="n_asset_status" class="regular-radio" value="S5:Disposed"<?php echo set_radio('n_asset_status', 'S5:Disposed',true); ?> disabled/>   
					<label for="radio-1-13"></label>&nbsp;S5&nbsp;:&nbsp;Disposed
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Condition</td></tr>
			<tr>
				<td></td>
				<td valign="top">Asset Condition:&nbsp;</td>
				<td>
					<input type="radio" id="radio-1-14" name="n_asset_condition" class="regular-radio" value="C1:Good" <?php echo set_radio('n_asset_condition', 'C1:Good',true); ?> disabled/>   
					<label for="radio-1-14" ></label> C1:Good <br>
					
					<input type="radio" id="radio-1-15" name="n_asset_condition" class="regular-radio" value="C2:Request for Exemption" <?php echo set_radio('n_asset_condition', 'C2:Request for Exemption',true); ?> disabled/>   
					<label for="radio-1-15"></label> C2:Request for Exemption <span style="margin-left:60px;">Ref No :</span><input type="text" name="RefNoC2" value="<?php echo set_value('RefNoC2') ?>" size="5px" class="form-control-button2" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-16" name="n_asset_condition" class="regular-radio" value="C3:Exemption approved" <?php echo set_radio('n_asset_condition', 'C3:Exemption approved',true); ?> disabled/>   
					<label for="radio-1-16"></label> C3:Exemption approved <span style="margin-left:76px;">Ref No :</span><input type="text" name="RefNoC3" value="<?php echo set_value('RefNoC3') ?>" size="5px" class="form-control-button2" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-17" name="n_asset_condition" class="regular-radio" value="C4:Request for BER Certification" <?php echo set_radio('n_asset_condition', 'C4:Request for BER Certification',true); ?> disabled/>   
					<label for="radio-1-17"></label> C4:Request for BER Certification <span style="margin-left:16px;">Ref No :</span><input type="text" name="RefNoC4" value="<?php echo set_value('RefNoC4') ?>" size="5px" class="form-control-button2" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-18" name="n_asset_condition" class="regular-radio" value="C5:BER" <?php echo set_radio('n_asset_condition', 'C5:BER',true); ?> disabled/>   
					<label for="radio-1-18"></label> C5:BER <span style="margin-left:199px;">Ref No :</span><input type="text" name="RefNoC5" value="<?php echo set_value('RefNoC5') ?>" size="5px" class="form-control-button2" disabled><span style="margin-left:10px;">Date :</span><input type="date" name="D_C5" value="<?php echo set_value('D_C5') ?>" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-19" name="n_asset_condition" class="regular-radio" value="C6:Request for Condemn" <?php echo set_radio('n_asset_condition', 'C6:Request for Condemn',true); ?> disabled/>   
					<label for="radio-1-19"></label> C6:Request for Condemn <span style="margin-left:69px;">Ref No :</span><input type="text" name="RefNoC6" value="<?php echo set_value('RefNoC6') ?>" size="5px" class="form-control-button2" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-20" name="n_asset_condition" class="regular-radio" value="C7:Condemn approved" <?php echo set_radio('n_asset_condition', 'C7:Condemn approved',true); ?> disabled/>   
					<label for="radio-1-20"></label> C7:Condemn approved <span style="margin-left:86px;">Ref No :</span><input type="text" name="RefNoC7" value="<?php echo set_value('RefNoC7') ?>" size="5px" class="form-control-button2" disabled><span style="margin-left:10px;">Date :</span><input type="date" name="D_C7" value="<?php echo set_value('D_C7') ?>" class="form-control-button2" style="width:170px;" disabled><br />
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Variation Unlocked</td></tr>
			<tr>
				<td></td>
				<td valign="top">Variation Status :&nbsp;	</td>
				<td><input type="radio" id="radio-1-21" name="n_Variation_Status" class="regular-radio" value="V1:Existing Equipment/Asset" <?php echo set_radio('n_Variation_Status', 'V1:Existing Equipment/Asset',true); ?> disabled/>   
					<label for="radio-1-21" ></label> V1:Existing Equipment/Asset <span style="margin-left:23px;">Location :</span><input type="text" name="Loc_V1" value="<?php echo set_value('Loc_V1') ?>" size="5px" class="form-control-button2" disabled><span style="margin-left:10px;">Date :</span><input type="date" name="D_V1" value="<?php echo set_value('D_V1') ?>" size="5px" class="form-control-button2" style="width:170px; disabled"><br>
					
					<input type="radio" id="radio-1-22" name="n_Variation_Status" class="regular-radio" value="V2:Replacement" <?php echo set_radio('n_Variation_Status', 'V2:Replacement',true); ?> disabled/>   
					<label for="radio-1-22"></label> V2:Replacement <br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-23" name="n_Variation_Status" class="regular-radio" value="V3:Added" <?php echo set_radio('n_Variation_Status', 'V3:Added',true); ?> disabled/>   
					<label for="radio-1-23"></label> V3:Added <span style="margin-left:350px;">Date :</span><input type="date" name="D_V3" value="<?php echo set_value('D_V3') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-24" name="n_Variation_Status" class="regular-radio" value="V3F:Start Service - Asset Found" <?php echo set_radio('n_Variation_Status', 'V3F:Start Service - Asset Found',true); ?> disabled/>   
					<label for="radio-1-24"></label> V3F:Start Service - Asset Found <span style="margin-left:194px;">Date :</span><input type="date" name="D_V3F" value="<?php echo set_value('D_V3F') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-25" name="n_Variation_Status" class="regular-radio" value="V4:Removed" <?php echo set_radio('n_Variation_Status', 'V4:Removed',true); ?> disabled/>   
					<label for="radio-1-25"></label> V4:Removed <span style="margin-left:328px;">Date :</span><input type="date" name="D_V4" value="<?php echo set_value('D_V4') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-26" name="n_Variation_Status" class="regular-radio" value="V4L:Stop Service - Asset Not Found" <?php echo set_radio('n_Variation_Status', 'V4L:Stop Service - Asset Not Found',true); ?> disabled/>   
					<label for="radio-1-26"></label> V4L:Stop Service - Asset Not Found <span style="margin-left:164px;">Date :</span><input type="date" name="D_V4L" value="<?php echo set_value('D_V4L') ?>" size="5px" class="form-control-button2" disabled style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-27" name="n_Variation_Status" class="regular-radio" value="V5:Transferred To" <?php echo set_radio('n_Variation_Status', 'V5:Transferred To',true); ?> disabled/>   
					<label for="radio-1-27"></label> V5:Transferred To <span style="margin-left:103px;">Location :</span><input type="text" name="Loc_V5" value="<?php echo set_value('Loc_V5') ?>" size="5px" class="form-control-button2" disabled><span style="margin-left:10px;">Date :</span><input type="date" name="D_V5" value="<?php echo set_value('D_V5') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-28" name="n_Variation_Status" class="regular-radio" value="V6:Transferred From" <?php echo set_radio('n_Variation_Status', 'V6:Transferred From',true); ?> disabled/>   
					<label for="radio-1-28"></label> V6:Transferred From <span style="margin-left:85px;">Location :</span><input type="text" name="Loc_V6" value="<?php echo set_value('Loc_V6') ?>" size="5px" class="form-control-button2" disabled><span style="margin-left:10px;">Date :</span><input type="date" name="D_V6" value="<?php echo set_value('D_V6') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-29" name="n_Variation_Status" class="regular-radio" value="V7:Donated" <?php echo set_radio('n_Variation_Status', 'V7:Donated',true); ?> disabled/>   
					<label for="radio-1-29"></label> V7:Donated <span style="margin-left:336px;">Date :</span><input type="date" name="D_V7" value="<?php echo set_value('D_V7') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-30" name="n_Variation_Status" class="regular-radio" value="V8:Upgraded Installed Facility" <?php echo set_radio('n_Variation_Status', 'V8:Upgraded Installed Facility',true); ?> disabled/>   
					<label for="radio-1-30"></label> V8:Upgraded Installed Facility <span style="margin-left:201px;">Date :</span><input type="date" name="D_V8" value="<?php echo set_value('D_V8') ?>" size="5px" class="form-control-button2" style="width:170px;" disabled><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-31" name="n_Variation_Status" class="regular-radio" value="V9:Addition Without Fee" <?php echo set_radio('n_Variation_Status', 'V9:Addition Without Fee',true); ?> disabled/>   
					<label for="radio-1-31"></label> V9:Addition Without Fee <br /><div style="margin-bottom:5px;"></div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>			
				<td><span style="color:red; font-size:14px;">The following fields are now mandatory if variation status is other than V1.<br/>
Please update 'Project Cost' in Asset Acquisition if V8 is choosen.</span></td>
			</tr>
			<tr>
				<td></td>
				<td>SNF / VNF Ref No :</td>
				<td><input type="text" name="n_SNFVNFRefNo" value="<?php echo set_value('n_SNFVNFRefNo') ?>" class="form-control-button2" disabled><br/><span style="font-size:14px;">Example: <b>XXX/SNF/VVF/MMMYYYY</b><i>(XXX-hosp code, MMM-month, YYYY-year)</i></span></td>
			</tr>
			<tr>
				<td></td>
				<td>Submission Date :</td>			
				<td><input type="date" name="n_SubDate" value="<?php echo set_value('n_SubDate') ?>" class="form-control-button2" style="width:33%;" disabled><br /><span style="font-size:14px;"><i>Can be register date or estimate date of VO submission</i></span></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">MOH Classification</td></tr>
			<tr>
				<td></td>
				<td>Asset Type:&nbsp;</td>			
				<td><?=isset($records[0]->new_asset_type) ? $records[0]->new_asset_type : 'N/A' ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Group:&nbsp;</td>			
				<td><?=isset($records[0]->Asset_Group) ? $records[0]->Asset_Group : 'N/A' ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Description:&nbsp;</td>			
				<td><?=isset($records[0]->Type_Desc) ? $records[0]->Type_Desc : 'N/A' ?></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Checklist</td></tr>
			<tr>
				<td></td>
				<td>Checklist Code :&nbsp;</td>			
				<td><input type="text" name="n_ChecklistCode" value="<?php echo set_value('n_ChecklistCode') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Checklist Description :&nbsp;</td>			
				<td><input type="text" name="n_Chklistdesk" value="<?php echo set_value('n_Chklistdesk') ?>" class="form-control-button2" style="width:70%;"  disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Frequency :&nbsp;</td>			
				<td><input type="text" name="n_Frequency" value="<?php echo set_value('n_Frequency') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>KKM Ref Number :&nbsp;</td>			
				<td><input type="text" name="n_KKMRefNo" value="<?php echo set_value('n_KKMRefNo') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Version :&nbsp;</td>			
				<td><input type="text" name="n_version" value="<?php echo set_value('n_version') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Volume : &nbsp;</td>			
				<td><input type="text" name="n_volume" value="<?php echo set_value('n_volume') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Checklist Filename :&nbsp;</td>			
				<td><input type="text" name="n_Checklistname" value="<?php echo set_value('n_Checklistname') ?>" class="form-control-button2" style="width:70%;" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Asset Type :&nbsp;</td>			
				<td><input type="text" name="n_assettype" value="<?php echo set_value('n_assettype') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Asset Description :&nbsp;</td>			
				<td><input type="text" name="n_assetdesc" value="<?php echo set_value('n_assetdesc') ?>" class="form-control-button2" style="width:70%;" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Manufacturer :&nbsp;</td>			
				<td><input type="text" name="n_mfg" value="<?php echo set_value('n_mfg') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td>Model :&nbsp;</td>			
				<td><input type="text" name="n_model" value="<?php echo set_value('n_model') ?>" class="form-control-button2" disabled></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="3" style="">
					
				<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:200px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->post('rpt_no')) ?>
		<?php echo form_hidden('asset',$this->input->post('asset')) ?>
		<?php echo form_hidden('n_criticality',$this->input->post('n_criticality'))	?>
		<?php echo form_hidden('n_sparelist',$this->input->post('n_sparelist'))	?>
		<?php echo form_hidden('n_safety_test',$this->input->post('n_safety_test'))	?>
		<?php echo form_hidden('n_asset_class',$this->input->post('n_asset_class'))	?>
		<?php echo form_hidden('n_asset_status',$this->input->post('n_asset_status'))	?>
		<?php echo form_hidden('n_asset_condition',$this->input->post('n_asset_condition'))	?>
		<?php echo form_hidden('RefNoC2',$this->input->post('RefNoC2'))	?>
		<?php echo form_hidden('RefNoC3',$this->input->post('RefNoC3'))	?>
		<?php echo form_hidden('RefNoC4',$this->input->post('RefNoC4'))	?>
		<?php echo form_hidden('RefNoC5',$this->input->post('RefNoC5'))	?>
		<?php echo form_hidden('D_C5',$this->input->post('D_C5'))	?>
		<?php echo form_hidden('RefNoC6',$this->input->post('RefNoC6'))	?>
		<?php echo form_hidden('RefNoC7',$this->input->post('RefNoC7'))	?>
		<?php echo form_hidden('D_C7',$this->input->post('D_C7'))	?>
		<?php echo form_hidden('n_Variation_Status',$this->input->post('n_Variation_Status')) ?>
		<?php echo form_hidden('Loc_V1',$this->input->post('Loc_V1')) ?>
		<?php echo form_hidden('D_V1',$this->input->post('D_V1')) ?>
		<?php echo form_hidden('D_V3',$this->input->post('D_V3')) ?>
		<?php echo form_hidden('D_V3F',$this->input->post('D_V3F')) ?>
		<?php echo form_hidden('D_V4',$this->input->post('D_V4')) ?>
		<?php echo form_hidden('D_V4L',$this->input->post('D_V4L')) ?>
		<?php echo form_hidden('Loc_V5',$this->input->post('Loc_V5')) ?>
		<?php echo form_hidden('D_V5',$this->input->post('D_V5')) ?>
		<?php echo form_hidden('Loc_V6',$this->input->post('Loc_V6')) ?>
		<?php echo form_hidden('D_V6',$this->input->post('D_V6')) ?>
		<?php echo form_hidden('D_V7',$this->input->post('D_V7')) ?>
		<?php echo form_hidden('D_V8',$this->input->post('D_V8')) ?>
		<?php echo form_hidden('n_SNFVNFRefNo',$this->input->post('n_SNFVNFRefNo')) ?>
		<?php echo form_hidden('n_SubDate',$this->input->post('n_SubDate')) ?>
		<?php echo form_hidden('n_AssetType',$this->input->post('n_AssetType')) ?>
		<?php echo form_hidden('n_ChecklistCode',$this->input->post('n_ChecklistCode')) ?>
		<?php echo form_hidden('n_Chklistdesk',$this->input->post('n_Chklistdesk')) ?>				
		<?php echo form_hidden('n_Frequency',$this->input->post('n_Frequency')) ?>	
		<?php echo form_hidden('n_KKMRefNo',$this->input->post('n_KKMRefNo')) ?>	
		<?php echo form_hidden('n_version',$this->input->post('n_version')) ?>	
		<?php echo form_hidden('n_volume',$this->input->post('n_volume')) ?>	
		<?php echo form_hidden('n_Checklistname',$this->input->post('n_Checklistname')) ?>	
		<?php echo form_hidden('n_assettype',$this->input->post('n_assettype')) ?>
		<?php echo form_hidden('n_assetdesc',$this->input->post('n_assetdesc')) ?>
		<?php echo form_hidden('n_mfg',$this->input->post('n_mfg')) ?>	
		<?php echo form_hidden('n_model',$this->input->post('n_model')) ?>

	</div>
</div>
<?php echo form_close(); ?>