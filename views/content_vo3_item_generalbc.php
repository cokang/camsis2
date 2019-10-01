<?php echo form_open('vo3_assets_update_ctrl'); ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" style="color:black;" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="3"><b>Update Maintenance Status</b></td>
			</tr>
			<tr>
				<td width="60px"></td>
				<td width="25%" valign="top">Criticality : </td>
				<td valign="top">
					<input type="radio" id="radio-1-1" name="n_criticality" class="regular-radio" value="01"<?php echo set_radio('n_criticality', '01',TRUE); ?><?= isset($records[0]->v_Criticality) ? $records[0]->v_Criticality  == '01' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-1"></label> Normal<br />
					<input type="radio" id="radio-1-2" name="n_criticality" class="regular-radio" value="02"<?php echo set_radio('n_criticality', '02'); ?><?= isset($records[0]->v_Criticality) ? $records[0]->v_Criticality  == '02' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-2"></label> Critical 
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Sparelist :</td>			
				<td><input type="text" name="n_sparelist" value="<?=isset($records[0]->v_SparelistCode) ? $records[0]->v_SparelistCode : 'N/A' ?>" class="form-control-button2"></td>
			</tr>
			<tr>
				<td></td>
				<td valign="top">Safety Test :&nbsp;</td>
				<td valign="top">
					<input type="radio" id="radio-1-3" name="n_safety_test" class="regular-radio" value="Y"<?php echo set_radio('n_safety_test', 'Y',TRUE); ?><?= isset($records[0]->v_SafetyTest) ? $records[0]->v_SafetyTest == 'Y' ? 'checked' : '' : ''?>/>   
					<label for="radio-1-3"></label> Yes <br />
					<input type="radio" id="radio-1-4" name="n_safety_test" class="regular-radio" value="N"<?php echo set_radio('n_safety_test', 'N'); ?><?= isset($records[0]->v_SafetyTest) ? $records[0]->v_SafetyTest == 'N' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-4"></label> No
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Class</td></tr>
			<tr>
				<td></td>
				<td valign="top">Asset Class:</td>
				<td valign="top">
					<input type="radio" id="radio-1-5" name="n_asset_class" class="regular-radio" value="1"<?php echo set_radio('n_asset_class', '1',TRUE); ?><?= isset($records[0]->v_AssettypeCode) ? $records[0]->v_AssettypeCode == '1' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-5"></label> 1 - True Asset<br />
					<input type="radio" id="radio-1-6" name="n_asset_class" class="regular-radio" value="2"<?php echo set_radio('n_asset_class', '2'); ?><?= isset($records[0]->v_AssettypeCode) ? $records[0]->v_AssettypeCode == '2' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-6"></label> 2 - Inventory With Safety<br />
					<input type="radio" id="radio-1-7" name="n_asset_class" class="regular-radio" value="3"<?php echo set_radio('n_asset_class', '3'); ?><?= isset($records[0]->v_AssettypeCode) ? $records[0]->v_AssettypeCode == '3' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-7"></label> 3 - Inventory Item<br />
					<input type="radio" id="radio-1-8" name="n_asset_class" class="regular-radio" value="4"<?php echo set_radio('n_asset_class', '4'); ?><?= isset($records[0]->v_AssettypeCode) ? $records[0]->v_AssettypeCode == '4' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-8"></label> 4 - Location Asset
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Status</td></tr>
			<tr>
				<td></td>
				<td valign="top">Asset Status :&nbsp;</td>
				<td valign="top">
					<input type="radio" id="radio-1-9" name="n_asset_status" class="regular-radio" value="S1:Functioning"<?php echo set_radio('n_asset_status', 'S1:Functioning',TRUE); ?><?= isset($records[0]->v_AssetStatus) ? $records[0]->v_AssetStatus == 'S1:Functioning' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-9"></label>&nbsp;S1&nbsp;:&nbsp;Functioning<br />
					<input type="radio" id="radio-1-10" name="n_asset_status" class="regular-radio" value="S2:Not Functioning"<?php echo set_radio('n_asset_status', 'S2:Not Functioning'); ?><?= isset($records[0]->v_AssetStatus) ? $records[0]->v_AssetStatus == 'S2:Not Functioning' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-10"></label>&nbsp;S2&nbsp;:&nbsp;Not&nbsp;Functioning<br />
					<input type="radio" id="radio-1-11" name="n_asset_status" class="regular-radio" value="S3:Not in Use"<?php echo set_radio('n_asset_status', 'S3:Not in Use'); ?><?= isset($records[0]->v_AssetStatus) ? $records[0]->v_AssetStatus == 'S3:Not in Use' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-11"></label>&nbsp;S3&nbsp;:&nbsp;Not in Use<br  />
					<input type="radio" id="radio-1-12" name="n_asset_status" class="regular-radio" value="S4:Transferred"<?php echo set_radio('n_asset_status', 'S4:Transferred'); ?><?= isset($records[0]->v_AssetStatus) ? $records[0]->v_AssetStatus == 'S4:Transferred' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-12"></label>&nbsp;S4&nbsp;:&nbsp;Transferred<br />
					<input type="radio" id="radio-1-13" name="n_asset_status" class="regular-radio" value="S5:Disposed"<?php echo set_radio('n_asset_status', 'S5:Disposed'); ?><?= isset($records[0]->v_AssetStatus) ? $records[0]->v_AssetStatus == 'S5:Disposed' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-13"></label>&nbsp;S5&nbsp;:&nbsp;Disposed
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Condition</td></tr>
			<tr>
				<td></td>
				<td valign="top">Asset Condition:&nbsp;</td>
				<td>
					<input type="radio" id="radio-1-14" name="n_asset_condition" class="regular-radio" value="C1:Good"<?php echo set_radio('n_asset_condition', 'C1:Good',TRUE); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C1:Good' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-14" ></label> C1:Good <br>
					
					<input type="radio" id="radio-1-15" name="n_asset_condition" class="regular-radio" value="C2:Request for Exemption"<?php echo set_radio('n_asset_condition', 'C2:Request for Exemption'); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C2:Request for Exemption' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-15"></label> C2:Request for Exemption <span style="margin-left:60px;">Ref No :</span><input type="text" name="RefNoC2" value="<?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C2:Request for Exemption' ? (isset($records[0]->v_AssetRefNo) ? $records[0]->v_AssetRefNo : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-16" name="n_asset_condition" class="regular-radio" value="C3:Exemption approved"<?php echo set_radio('n_asset_condition', 'C3:Exemption approved'); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C3:Exemption approved' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-16"></label> C3:Exemption approved <span style="margin-left:76px;">Ref No :</span><input type="text" name="RefNoC3" value="<?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C3:Exemption approved' ? (isset($records[0]->v_AssetRefNo) ? $records[0]->v_AssetRefNo : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-17" name="n_asset_condition" class="regular-radio" value="C4:Request for BER Certification"<?php echo set_radio('n_asset_condition', 'C4:Request for BER Certification'); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C4:Request for BER Certification' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-17"></label> C4:Request for BER Certification <span style="margin-left:16px;">Ref No :</span><input type="text" name="RefNoC4" value="<?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C4:Request for BER Certification' ? (isset($records[0]->v_AssetRefNo) ? $records[0]->v_AssetRefNo : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-18" name="n_asset_condition" class="regular-radio" value="C5:BER"<?php echo set_radio('n_asset_condition', 'C5:BER'); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C5:BER' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-18"></label> C5:BER <span style="margin-left:199px;">Ref No :</span><input type="text" name="RefNoC5" value="<?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C5:BER' ? (isset($records[0]->v_AssetRefNo) ? $records[0]->v_AssetRefNo : 'N/A') : '' : ''  ?>" size="5px" class="form-control-button2"><span style="margin-left:10px;">Date :</span><input type="date" name="D_C5" value="<?=  isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C5:BER' ? (isset($records[0]->d_RefDate) == TRUE ? date_format(new DateTime($records[0]->d_RefDate), 'Y-m-d') : 'N/A') : '' : '' ?>" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-19" name="n_asset_condition" class="regular-radio" value="C6:Request for Condemn"<?php echo set_radio('n_asset_condition', 'C6:Request for Condemn'); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C6:Request for Condemn' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-19"></label> C6:Request for Condemn <span style="margin-left:69px;">Ref No :</span><input type="text" name="RefNoC6" value="<?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C6:Request for Condemn' ? (isset($records[0]->v_AssetRefNo) ? $records[0]->v_AssetRefNo : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-20" name="n_asset_condition" class="regular-radio" value="C7:Condemn approved"<?php echo set_radio('n_asset_condition', 'C7:Condemn approved'); ?><?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C7:Condemn approved' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-20"></label> C7:Condemn approved <span style="margin-left:86px;">Ref No :</span><input type="text" name="RefNoC7" value="<?= isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C7:Condemn approved' ? (isset($records[0]->v_AssetRefNo) ? $records[0]->v_AssetRefNo : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2"><span style="margin-left:10px;">Date :</span><input type="date" name="D_C7" value="<?=  isset($records[0]->v_AssetCondition) ? $records[0]->v_AssetCondition == 'C7:Condemn approved' ? (isset($records[0]->d_RefDate) == TRUE ? date_format(new DateTime($records[0]->d_RefDate), 'Y-m-d') : 'N/A') : '' : '' ?>" class="form-control-button2" style="width:170px;"><br />
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Variation Unlocked</td></tr>
			<tr>
				<td></td>
				<td valign="top">Variation Status :&nbsp;	</td>
				<td><input type="radio" id="radio-1-21" name="n_Variation_Status" class="regular-radio" value="V1:Existing Equipment/Asset"<?php echo set_radio('n_Variation_Status', 'V1:Existing Equipment/Asset',TRUE); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V1:Existing Equipment/Asset' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-21" ></label> V1:Existing Equipment/Asset <span style="margin-left:23px;">Location :</span><input type="text" name="Loc_V1" value="<?=isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V1:Existing Equipment/Asset' ? (isset($records[0]->v_Location) ? $records[0]->v_Location : 'N/A') : '' : '' ?> " size="5px" class="form-control-button2"><span style="margin-left:10px;">Date :</span><input type="date" name="D_V1" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V1:Existing Equipment/Asset' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br>

					<input type="radio" id="radio-1-22" name="n_Variation_Status" class="regular-radio" value="V2:Replacement"<?php echo set_radio('n_Variation_Status', 'V2:Replacement'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V2:Replacement' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-22"></label> V2:Replacement <br /><div style="margin-bottom:5px;"></div>

					<input type="radio" id="radio-1-23" name="n_Variation_Status" class="regular-radio" value="V3:Added"<?php echo set_radio('n_Variation_Status', 'V3:Added'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V3:Added' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-23"></label> V3:Added <span style="margin-left:350px;">Date :</span><input type="date" name="D_V3" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V3:Added' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-24" name="n_Variation_Status" class="regular-radio" value="V3F:Start Service - Asset Found"<?php echo set_radio('n_Variation_Status', 'V3F:Start Service - Asset Found'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V3F:Start Service - Asset Found' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-24"></label> V3F:Start Service - Asset Found <span style="margin-left:194px;">Date :</span><input type="date" name="D_V3F" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V3F:Start Service - Asset Found' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-25" name="n_Variation_Status" class="regular-radio" value="V4:Removed"<?php echo set_radio('n_Variation_Status', 'V4:Removed'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V4:Removed' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-25"></label> V4:Removed <span style="margin-left:328px;">Date :</span><input type="date" name="D_V4" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V4:Removed' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-26" name="n_Variation_Status" class="regular-radio" value="V4L:Stop Service - Asset Not Found"<?php echo set_radio('n_Variation_Status', 'V4L:Stop Service - Asset Not Found'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V4L:Stop Service - Asset Not Found' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-26"></label> V4L:Stop Service - Asset Not Found <span style="margin-left:164px;">Date :</span><input type="date" name="D_V4L" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V4L:Stop Service - Asset Not Found' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-27" name="n_Variation_Status" class="regular-radio" value="V5:Transferred To"<?php echo set_radio('n_Variation_Status', 'V5:Transferred To'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V5:Transferred To' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-27"></label> V5:Transferred To <span style="margin-left:103px;">Location :</span><input type="text" name="Loc_V5" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V5:Transferred To' ? (isset($records[0]->v_Location) ? $records[0]->v_Location : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2"><span style="margin-left:10px;">Date :</span><input type="date" name="D_V5" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V5:Transferred To' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-28" name="n_Variation_Status" class="regular-radio" value="V6:Transferred From"<?php echo set_radio('n_Variation_Status', 'V6:Transferred From'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V6:Transferred From' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-28"></label> V6:Transferred From <span style="margin-left:85px;">Location :</span><input type="text" name="Loc_V6" value="<?=isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V6:Transferred From' ? (isset($records[0]->v_Location) ? $records[0]->v_Location : 'N/A' ) : '' : '' ?>" size="5px" class="form-control-button2"><span style="margin-left:10px;">Date :</span><input type="date" name="D_V6" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V6:Transferred From' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-29" name="n_Variation_Status" class="regular-radio" value="V7:Donated"<?php echo set_radio('n_Variation_Status', 'V7:Donated'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V7:Donated' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-29"></label> V7:Donated <span style="margin-left:336px;">Date :</span><input type="date" name="D_V7" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V7:Donated' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-30" name="n_Variation_Status" class="regular-radio" value="V8:Upgraded Installed Facility"<?php echo set_radio('n_Variation_Status', 'V8:Upgraded Installed Facility'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V8:Upgraded Installed Facility' ? 'checked' : '' : '' ?>/>   
					<label for="radio-1-30"></label> V8:Upgraded Installed Facility <span style="margin-left:201px;">Date :</span><input type="date" name="D_V8" value="<?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V8:Upgraded Installed Facility' ? (isset($records[0]->d_LocDate) == TRUE ? date_format(new DateTime($records[0]->d_LocDate), 'Y-m-d') : 'N/A') : '' : '' ?>" size="5px" class="form-control-button2" style="width:170px;"><br /><div style="margin-bottom:5px;"></div>
					
					<input type="radio" id="radio-1-31" name="n_Variation_Status" class="regular-radio" value="V9:Addition Without Fee"<?php echo set_radio('n_Variation_Status', 'V9:Addition Without Fee'); ?><?= isset($records[0]->v_AssetVStatus) ? $records[0]->v_AssetVStatus == 'V9:Addition Without Fee' ? 'checked' : '' : '' ?>/>   
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
				<td><input type="text" name="n_SNFVNFRefNo" value="<?= isset($record[0]->vvfRefNo) ? $record[0]->vvfRefNo : 'N/A' ?>" class="form-control-button2"><br/><span style="font-size:14px;">Example: <b>XXX/SNF/VVF/MMMYYYY</b><i>(XXX-hosp code, MMM-month, YYYY-year)</i></span></td>
			</tr>
			<tr>
				<td></td>
				<td>Submission Date :</td>			
				<td><input type="date" name="n_SubDate" value="<?=isset($record[0]->vvfSubmissionDate) ? date_format(new DateTime($record[0]->vvfSubmissionDate), 'Y-m-d') : 'N/A' ?>" class="form-control-button2" style="width:33%;"><br /><span style="font-size:14px;"><i>Can be register date or estimate date of VO submission</i></span></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">MOH Classification</td></tr>
			<tr>
				<td></td>
				<td>Asset Type:&nbsp;</td>			
				<td><input type="text" name="n_AssetType" value="<?=isset($records[0]->new_asset_type) ? $records[0]->new_asset_type : 'N/A' ?>" class="form-control-button2" style="border:hidden; margin-left:-15px; color:black; font-size:16px;" readonly></td>
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
				<td><input type="text" name="n_ChecklistCode" value="<?=isset($checklist[0]->checklistCode) ? $checklist[0]->checklistCode : (isset($checklist[0]->v_check_code) ? $checklist[0]->v_check_code : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Checklist Description :&nbsp;</td>			
				<td><input type="text" name="n_Chklistdesk" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->checklistDescription) ? $checklist[0]->checklistDescription : 'N/A' : (isset($checklist[0]->v_check_code) ? isset($checklist[0]->v_checkDesc) ? $checklist[0]->v_checkDesc : 'N/A' : 'N/A') ?>" class="form-control-button2" style="width:70%;" readonly></td>
					
			</tr>
			<tr>
				<td></td>
				<td>Frequency :&nbsp;</td>			
				<td><input type="text" name="n_Frequency" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->freq) ? $checklist[0]->freq : 'N/A' : (isset($checklist[0]->v_check_code) ? isset($checklist[0]->v_Intervals) ? $checklist[0]->v_Intervals : 'N/A' : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>KKM Ref Number :&nbsp;</td>			
				<td><input type="text" name="n_KKMRefNo" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->KKMRefNo) ? $checklist[0]->KKMRefNo : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Version :&nbsp;</td>			
				<td><input type="text" name="n_version" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->checklistVersion) ? $checklist[0]->checklistVersion : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Volume : &nbsp;</td>			
				<td><input type="text" name="n_volume" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->volumeNo) ? $checklist[0]->volumeNo : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Checklist Filename :&nbsp;</td>			
				<td><input type="text" name="n_Checklistname" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->checklistFilename) ? $checklist[0]->checklistFilename : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" style="width:70%;" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Asset Type :&nbsp;</td>			
				<td><input type="text" name="n_assettype" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->assetType) ? $checklist[0]->assetType : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Asset Description :&nbsp;</td>			
				<td><input type="text" name="n_assetdesc" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->assetTypeDescription) ? $checklist[0]->assetTypeDescription : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" style="width:70%;" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Manufacturer :&nbsp;</td>			
				<td><input type="text" name="n_mfg" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->mfg) ? $checklist[0]->mfg : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr>
				<td></td>
				<td>Model :&nbsp;</td>			
				<td><input type="text" name="n_model" value="<?= isset($checklist[0]->checklistCode) ? isset($checklist[0]->model) ? $checklist[0]->model : 'N/A' : (isset($checklist[0]->v_check_code) ? "" : 'N/A') ?>" class="form-control-button2" readonly></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="3" style="">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
				<!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>-->
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->get('rpt_no')) ?>
		<?php echo form_hidden('asset',$this->input->get('asset')) ?>
		<?php echo form_hidden('n_ChecklistDesc',$this->input->get('n_ChecklistDesc')) ?>				
	</div>
</div>
<?php echo form_close(); ?>