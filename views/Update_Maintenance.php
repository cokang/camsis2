<?php echo form_open('contentcontroller/confirmmaintenance?assetno='.$assetno.'');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="3"><b>Update Maintenance Status</b></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Criticality : </td>
				<td valign="top">
					<input type="radio" id="radio-1-1" name="n_criticality" class="regular-radio" value="1"  <?php echo set_radio('n_criticality', '1'); ?> <?= $asset_main[0]->v_criticality == '1' ? 'checked' : ''?>/>   
					<label for="radio-1-1"></label> Normal<br />
					<input type="radio" id="radio-1-2" name="n_criticality" class="regular-radio" value="0"  <?php echo set_radio('n_criticality', '0'); ?> <?= $asset_main[0]->v_criticality == '0' ? 'checked' : ''?>/>   
					<label for="radio-1-2"></label> Critical 
				</td>
			</tr>
			<tr>
				<td class="td-assest">Sparelist :</td>			
				<td><input type="text" name="n_sparelist" value="<?= ($asset_main[0]->v_spareslistcode) ? $asset_main[0]->v_spareslistcode : 'NA'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Safety Test :&nbsp;</td>
				<td valign="top">
					<input type="radio" id="radio-1-3" name="n_safety_test" class="regular-radio" value="Y"  <?php echo set_radio('n_safety_test', 'Y'); ?> <?= $asset_main[0]->v_safetytest == 'Y' ? 'checked' : ''?>/>   
					<label for="radio-1-3"></label> Yes <br />
					<input type="radio" id="radio-1-4" name="n_safety_test" class="regular-radio" value="N"  <?php echo set_radio('n_safety_test', 'N'); ?> <?= $asset_main[0]->v_safetytest == 'N' ? 'checked' : ''?>/>   
					<label for="radio-1-4"></label> No
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Class</td></tr>
			<tr>
				<td class="td-assest" valign="top">Asset Class:</td>
				<td valign="top">
					<input type="radio" id="radio-1-5" name="n_asset_class" class="regular-radio" value="1"  <?php echo set_radio('n_asset_class', '1'); ?> <?= $asset_main[0]->v_assettypecode == '1' ? 'checked' : ''?>/>   
					<label for="radio-1-5"></label> 1 - True Asset<br />
					<input type="radio" id="radio-1-6" name="n_asset_class" class="regular-radio" value="2"  <?php echo set_radio('n_asset_class', '2'); ?> <?= $asset_main[0]->v_assettypecode == '2' ? 'checked' : ''?>/>   
					<label for="radio-1-6"></label> 2 - Inventory With Safety<br />
					<input type="radio" id="radio-1-7" name="n_asset_class" class="regular-radio" value="3"  <?php echo set_radio('n_asset_class', '3'); ?> <?= $asset_main[0]->v_assettypecode == '3' ? 'checked' : ''?>/>   
					<label for="radio-1-7"></label> 3 - Inventory Item<br />
					<input type="radio" id="radio-1-8" name="n_asset_class" class="regular-radio" value="4"  <?php echo set_radio('n_asset_class', '4'); ?> <?= $asset_main[0]->v_assettypecode == '4' ? 'checked' : ''?>/>   
					<label for="radio-1-8"></label> 4 - Location Asset
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Status</td></tr>
			<tr>
				<td class="td-assest" valign="top">Asset Status :&nbsp;</td>
				<td valign="top">
					<input type="radio" id="radio-1-9" name="n_asset_status" class="regular-radio" value="S1:Functioning"  <?php echo set_radio('n_asset_status', 'S1:Functioning'); ?> <?= $asset_main[0]->v_AssetStatus == 'S1' ? 'checked' : ''?>/>   
					<label for="radio-1-9"></label>&nbsp;S1&nbsp;:&nbsp;Functioning<br />
					<input type="radio" id="radio-1-10" name="n_asset_status" class="regular-radio" value="S2:Not Functioning"  <?php echo set_radio('n_asset_status', 'S2:Not Functioning'); ?> <?= $asset_main[0]->v_AssetStatus == 'S2' ? 'checked' : ''?>/>   
					<label for="radio-1-10"></label>&nbsp;S2&nbsp;:&nbsp;Not&nbsp;Functioning<br />
					<input type="radio" id="radio-1-11" name="n_asset_status" class="regular-radio" value="S3:Not in Use"  <?php echo set_radio('n_asset_status', 'S3:Not in Use'); ?> <?= $asset_main[0]->v_AssetStatus == 'S3' ? 'checked' : ''?>/>   
					<label for="radio-1-11"></label>&nbsp;S3&nbsp;:&nbsp;Not in Use<br />
					<input type="radio" id="radio-1-12" name="n_asset_status" class="regular-radio" value="S4:Transferred"  <?php echo set_radio('n_asset_status', 'S4:Transferred'); ?> <?= $asset_main[0]->v_AssetStatus == 'S4' ? 'checked' : ''?>/>   
					<label for="radio-1-12"></label>&nbsp;S4&nbsp;:&nbsp;Transferred<br />
					<input type="radio" id="radio-1-13" name="n_asset_status" class="regular-radio" value="S5:Disposed"  <?php echo set_radio('n_asset_status', 'S5:Disposed'); ?> <?= $asset_main[0]->v_AssetStatus == 'S4' ? 'checked' : ''?>/>   
					<label for="radio-1-13"></label>&nbsp;S5&nbsp;:&nbsp;Disposed
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Condition</td></tr>
			<tr>
				<td colspan="2">
					<div class="ui-main-form-3">
						Asset Condition <span class="ui-left_web">:</span>  
					</div>
					<div class="ui-main-form-4">
					<input type="radio" id="radio-1-14" name="n_asset_condition" class="regular-radio" value="C1:Good" <?php echo set_radio('n_asset_condition','C1:Good',TRUE); ?><?= $asset_main[0]->v_AssetCondition == 'C1' ? 'checked' : ''?> />   
					<label for="radio-1-14"></label> C1:Good<br>
					<input type="radio" id="radio-1-15" name="n_asset_condition" class="regular-radio" value="C2:Request for Exemption" <?php echo set_radio('n_asset_condition','C2:Request for Exemption'); ?><?= $asset_main[0]->v_AssetCondition == 'C2' ? 'checked' : ''?>/>   
					<label for="radio-1-15"></label> C2:Request for Exemption<span class="ui-left_mobile"><br/></span><span class="span-m-1">Ref No :</span><input type="text" name="assetcon2" value="<?= $asset_main[0]->v_AssetCondition == 'C2' ? $asset_main[0]->v_assetrefno : ''?>" class="form-control-button2 assets-wid"  size="13" style="margin-top:4px;"><br />
					<input type="radio" id="radio-1-16" name="n_asset_condition" class="regular-radio" value="C3:Exemption approved" <?php echo set_radio('n_asset_condition','C3:Exemption approved'); ?><?= $asset_main[0]->v_AssetCondition == 'C3' ? 'checked' : ''?>/>   
					<label for="radio-1-16"></label> C3:Exemption approved<span class="ui-left_mobile"><br/></span><span class="span-m-2">Ref No :</span><input type="text" name="assetcon3" value="<?= $asset_main[0]->v_AssetCondition == 'C3' ? $asset_main[0]->v_assetrefno : ''?>" size="13" class="form-control-button2 assets-wid" style="margin-top:4px;"><br />
					<input type="radio" id="radio-1-17" name="n_asset_condition" class="regular-radio" value="C4:Request for BER Certification" <?php echo set_radio('n_asset_condition','C4:Request for BER Certification'); ?><?= $asset_main[0]->v_AssetCondition == 'C4' ? 'checked' : ''?>/>   
					<label for="radio-1-17"></label> C4:Request for BER Certification<span class="ui-left_mobile"><br/></span><span class="span-m-3">Ref No :</span><input type="text" name="assetcon4" size="13" value="<?= $asset_main[0]->v_AssetCondition == 'C4' ? $asset_main[0]->v_assetrefno : ''?>" class="form-control-button2 assets-wid" style="margin-top:4px;"><br />
					<input type="radio" id="radio-1-18" name="n_asset_condition" class="regular-radio" value="C5:BER" <?php echo set_radio('n_asset_condition','C5:BER'); ?><?= $asset_main[0]->v_AssetCondition == 'C5' ? 'checked' : ''?>/>   
					<label for="radio-1-18"></label> C5:BER<span class="ui-left_mobile"><br/></span><span class="span-m-4">Ref No :</span><input type="text" name="assetcon5" value="<?= $asset_main[0]->v_AssetCondition == 'C5' ? $asset_main[0]->v_assetrefno : ''?>" size="13" class="form-control-button2 assets-wid" style="margin-top:4px;"><span style="margin-left:20px;">Date :</span><input type="text"  id="date<?php echo $numberdate++; ?>" name="d_assetcon1" value="<?= $asset_main[0]->v_AssetCondition == 'C5' ? date_format(new DateTime($asset_main[0]->d_refdate), 'd-m-Y') : 0?>" class="form-control-button2 assets-wid2"><br />
					<input type="radio" id="radio-1-19" name="n_asset_condition" class="regular-radio" value="C6:Request for Condemn" <?php echo set_radio('n_asset_condition','C6:Request for Condemn'); ?><?= $asset_main[0]->v_AssetCondition == 'C6' ? 'checked' : ''?>/>   
					<label for="radio-1-19"></label> C6:Request for Condemn<span class="ui-left_mobile"><br/></span><span class="span-m-5">Ref No :</span><input type="text" size="13" name="assetcon6" value="<?= $asset_main[0]->v_AssetCondition == 'C6' ? $asset_main[0]->v_assetrefno : ''?>" class="form-control-button2 assets-wid" style="margin-top:4px;"><br />
					<input type="radio" id="radio-1-20" name="n_asset_condition" class="regular-radio" value="C7:Condemn approved" <?php echo set_radio('n_asset_condition','C7:Condemn approved'); ?><?= $asset_main[0]->v_AssetCondition == 'C7' ? 'checked' : ''?>/>   
					<label for="radio-1-20"></label> C7:Condemn approved<span class="ui-left_mobile"><br/></span><span class="span-m-6">Ref No :</span><input type="text" size="13" name="assetcon7" value="<?= $asset_main[0]->v_AssetCondition == 'C7' ? $asset_main[0]->v_assetrefno : ''?>" class="form-control-button2 assets-wid" style="margin-top:4px;"><span style="margin-left:20px;">Date :</span><input type="text"  id="date<?php echo $numberdate++; ?>" name="d_assetcon2" value="<?= $asset_main[0]->v_AssetCondition == 'C7' ? date_format(new DateTime($asset_main[0]->d_refdate), 'd-m-Y') : 0?>" class="form-control-button2 assets-wid2"><br />
					</div>
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Variation Information Locked</td></tr>
			<?php
				$Locked = 'Locked';
				$unLocked = 'unLocked';
				if ($Locked == "Locked"){?>
			<tr>
			<td colspan="2">
				<div class="ui-main-form-3">Variation Status <span class="ui-left_web">:</span></div>
					<div class="ui-main-form-4">
					<span class="main-checkbox">
						<input type="radio" id="radio-1-21"name="n_variation_status" value="V1:Existing" class="regular-radio" <?php echo set_radio('n_variation_status','V1:Existing'); ?><?= $asset_main[0]->v_AssetVStatus == 'V1:Existing' ? 'checked' : ''?> />   
						<label for="radio-1-21"></label>
						<span class="blockspan">V1:Existing </span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l">Location&nbsp;:&nbsp;<input class="form-control-button2 v-input-l"  type="text" name="V1Location" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-23" name="n_variation_status" value="V2:Stop Service by MOH" class="regular-radio" <?php echo set_radio('n_variation_status','V2:Stop Service by MOH'); ?><?= $asset_main[0]->v_AssetVStatus == 'V2:Stop Service by MOH' ? 'checked' : ''?>/>   
						<label for="radio-1-23"></label>
						<span class="blockspan">V2:Stop Service by MOH Engineering Division</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input type="text"  id="date<?php echo $numberdate++; ?>" name="V2_date" value="<?php echo set_value('v2_date'); ?>" class="form-control-button2 v_check-time"></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Remark&nbsp;:&nbsp; <input class="form-control-button2 v_check-drop" type="text" name="V2Remark" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-24"name="n_variation_status" value="V3:Added installed facilities" class="regular-radio" <?php echo set_radio('n_variation_status','V3:Added installed facilities'); ?><?= $asset_main[0]->v_AssetVStatus == 'V3:Added installed facilities' ? 'checked' : ''?>/>   
						<label for="radio-1-24"></label>
						<span class="blockspan">V3:Added installed facilities</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V3_date" value="<?php echo set_value('v3_date'); ?>" ></span>
						<span class="check-l"><span class="ui-left_web w-cat"></span>CAT&nbsp;:&nbsp; 
							<select class="dropdown v_check-drop" name="fAssetContractV3">
								<option selected></option>
								<option>New added equipment</option>
								<option>Asset found</option>
							</select>
						</span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-25" name="n_variation_status" value="V4:Stop Service by contract" class="regular-radio" <?php echo set_radio('n_variation_status','V4:Stop Service by contract'); ?><?= $asset_main[0]->v_AssetVStatus == 'V4:Stop Service by contract' ? 'checked' : ''?>/>   
						<label for="radio-1-25"></label>
						<span class="blockspan">V4:Stop Service by contract hospitals</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V4_date" value="<?php echo set_value('v4_date'); ?>" ></span>
						<span class="check-l"><span class="ui-left_web w-cat"></span>CAT&nbsp;:&nbsp; 
							<select name="fAssetContractV4" class="dropdown v_check-drop">
								<option selected></option>
								<option>New added equipment</option>
								<option>Asset found</option>
							</select>
						</span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-26" name="n_variation_status" value="V5:Transfer to other Hospitals/ Healthcare facility" class="regular-radio" <?php echo set_radio('n_variation_status','V5:Transfer to other Hospitals/ Healthcare facility'); ?><?= $asset_main[0]->v_AssetVStatus == 'V5:Transfer to other Hospitals/ Healthcare facility' ? 'checked' : ''?>/>   
						<label for="radio-1-26"></label>
						<span class="blockspan">V5:Transfer to other Hospitals/ Healthcare facility</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l">Location&nbsp;:&nbsp;<input class="form-control-button2 v-input-l" type="text" name="V5Location" ></span>
						<span class="check-l"><span class="ui-left_web  w-cat"></span>Date&nbsp;:&nbsp;<input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V5_date" value="<?php echo set_value('v4_date'); ?>" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-27" name="n_variation_status" value="V6:Transfer from other Hospitals/Healthcare facility" class="regular-radio" <?php echo set_radio('n_variation_status','V6:Transfer from other Hospitals/Healthcare facility'); ?><?= $asset_main[0]->v_AssetVStatus == 'V6:Transfer from other Hospitals/Healthcare facility' ? 'checked' : ''?>/>   
						<label for="radio-1-27"></label>
						<span class="blockspan">V6:Transfer from other Hospitals/Healthcare facility</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l">Location&nbsp;:&nbsp;<input class="form-control-button2 v-input-l" type="text" name="V6Location" ></span>
						<span class="check-l"><span class="ui-left_web  w-cat"></span>Date&nbsp;:&nbsp;<input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V6_date" value="<?php echo set_value('v6_date'); ?>" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-28" name="n_variation_status" value="V7:Donated by others" class="regular-radio" <?php echo set_radio('n_variation_status','V7:Donated by others'); ?><?= $asset_main[0]->v_AssetVStatus == 'V7:Donated by others' ? 'checked' : ''?>/>   
						<label for="radio-1-28"></label>
						<span class="blockspan">V7:Donated by others</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V7_date" value="<?php echo set_value('v7_date'); ?>" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-29" name="n_variation_status" value="V8:Upgraded Installed Facilities" class="regular-radio" <?php echo set_radio('n_variation_status','V8:Upgraded Installed Facilities'); ?><?= $asset_main[0]->v_AssetVStatus == 'V8:Upgraded Installed Facilities' ? 'checked' : ''?>/>   
						<label for="radio-1-29"></label>
						<span class="blockspan">V8:Upgraded Installed Facilities</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V8_date" value="<?php echo set_value('v8_date'); ?>" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-30" name="n_variation_status" value="V8:Upgraded Installed Facilities" class="regular-radio" <?php echo set_radio('n_variation_status','V9:Project systems component'); ?><?= $asset_main[0]->v_AssetVStatus == 'V9:Project systems component' ? 'checked' : ''?>/>   
						<label for="radio-1-30"></label>
						<span class="blockspan">V9:Project systems component</span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-31" name="n_variation_status" value="V8:Upgraded Installed Facilities" class="regular-radio" <?php echo set_radio('n_variation_status','V10:Asset in initial fee submission for any new or replacement hospital'); ?><?= $asset_main[0]->v_AssetVStatus == 'V10:Asset in initial fee submission for any new or replacement hospital' ? 'checked' : ''?>/>   
						<label for="radio-1-31"></label>
						<span class="blockspan">V10:Asset in initial fee submission for any new or replacement hospital</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V10_date" value="<?php echo set_value('v10_date'); ?>" ></span>
					</span><br>
					<span class="main-checkbox">
						<input type="radio" id="radio-1-32" name="n_variation_status" value="V11:Old hospital asset moved to new replacement hospital" class="regular-radio" <?php echo set_radio('n_variation_status','V11:Old hospital asset moved to new replacement hospital'); ?><?= $asset_main[0]->v_AssetVStatus == 'V11:Old hospital asset moved to new replacement hospital' ? 'checked' : ''?>/>   
						<label for="radio-1-32"></label>
						<span class="blockspan">V11:Old hospital asset moved to new replacement hospital</span>
						<span class="ui-left_mobile"><br/></span>
						<span class="check-l"><span class="ui-left_web w-date"></span>Date&nbsp;:&nbsp; <input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="V11_date" value="<?php echo set_value('v11_date'); ?>" ></span>
					</span><br>
					<span style="color:red; display: inline-block; padding:5px;">The following fields are now mandatory if variation status is other than V1.</span>
					</div>
					<div class="ui-main-form-3">SNF / VNF Ref No : </div>
					<div class="ui-main-form-4">
						<span class="main-checkbox">
							<span class="check-l"></span><input class="form-control-button2 v_check-time" type="text" name="n_snfvnf" value="<?php echo set_value('n_snfvnf'); ?>"><span class="ui-left_mobile"><br/></span> <span class="v_text">Example: <span style="font-weight: bold;">XXX/SNF/VVF/MMMYYYY</span><span class="ui-left_mobile"><br/></span><i>(XXX-hosp code, MMM-month, YYYY-year)</i></span>
						</span> 
					</div>
					<div class="ui-main-form-3">Submission Date : </div>
					<div class="ui-main-form-4">
						<span class="main-checkbox">
							<span class="check-l"></span><input class="form-control-button v_check-time" type="text"  id="date<?php echo $numberdate++; ?>" name="n_submission_date" value="<?php echo set_value('n_submission_date'); ?>" > <span class="ui-left_mobile"><br/></span><span class="v_text"><i>Can be register date or estimate date of VO submission</i></span>
						</span> 
					</div>
			</td>
			</tr>
			<?php } elseif ($unLocked == "unLocked") {
				    echo "Have a good night!"; ?>
			<tr>
				<td class="td-assest" valign="top">Variation Status :&nbsp;	</td>
				<td><?=($asset_det[0]->v_AssetVStatus) ? $asset_det[0]->v_AssetVStatus : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Location:&nbsp;</td>			
				<td><?=($asset_det[0]->v_Location) ? $asset_det[0]->v_Location : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Date : &nbsp;</td>
				<td><?=($asset_det[0]->d_LocDate) ? $asset_det[0]->d_LocDate : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">VO Claim Period :&nbsp;</td>			
				<td><?=($asset_vo[0]->vvfPeriod) == TRUE ? $asset_vo[0]->vvfPeriod : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">VVF Report Number : &nbsp;</td>			
				<td><?=($asset_vo[0]->vvfReportNo) == TRUE ? $asset_vo[0]->vvfReportNo : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest">SNF / VNF Ref No :&nbsp;</td>			
				<td><?=($asset_vo[0]->vvfRefNo) == TRUE ? $asset_vo[0]->vvfRefNo : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Submission Date :&nbsp;</td>			
				<td><?=($asset_vo[0]->vvfSubmissionDate) == TRUE ? $asset_vo[0]->vvfSubmissionDate : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Locking Status : &nbsp;</td>			
				<td><?=($asset_vo[0]->vvfAssetLockedStatus) == TRUE ? $asset_vo[0]->vvfAssetLockedStatus : 'N/A'?><b><?=isset($asset_vo[0]->vvfAssetLockedBy) == TRUE ? $asset_vo[0]->vvfAssetLockedBy : ''?></td>
			</tr>
			<tr>
				<td class="td-assest">PMSB Authorization : &nbsp;</td>			
				<td><?=($asset_vo[0]->vvfAuthorizedStatus) == TRUE ? $asset_vo[0]->vvfAuthorizedStatus : 'N/A'?><b><?= isset($asset_vo[0]->vvfAuthorizedBy) == TRUE ? $asset_vo[0]->vvfAuthorizedBy : ''?></td>
			</tr>
			<?php } ?>
			
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">MOH Classification</td></tr>
			<tr>
				<td class="td-assest">Asset Type:&nbsp;</td>			
				<td><?=($asset_UMDNS[0]->Asset_Type) ? $asset_UMDNS[0]->Asset_Type : 'NA'?></td>
			</tr>
			<tr>
				<td class="td-assest">Group:&nbsp;</td>			
				<td><?=($asset_det[0]->v_Location) ? $asset_det[0]->v_Location : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Description:&nbsp;</td>			
				<td><?=($asset_det[0]->d_LocDate) ? $asset_det[0]->d_LocDate : 'N/A' ?></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Checklist</td></tr>
			<tr>
				<td class="td-assest">Checklist Code :&nbsp;</td>			
				<td>
					<!-- <input type="text" id="n_chklistcd" name="n_chklistcd" value="<?=isset($asset_chklist[0]->checklistCode) == TRUE ? $asset_chklist[0]->checklistCode : 'N/A' ?>" class="form-control-button2 n_wi-eq3" readonly>  -->
					<input type="text" id="n_chklistcd" name="n_chklistcd" value="<?=isset($asset_chklist[0]->checklistCode) == TRUE ? $asset_chklist[0]->checklistCode : 'N/A' ?>" class="form-control-button2 n_user_d" readonly> 
					<span class="icon-windows" onclick="fchecklist(this)" value="<?=$this->input->get('assetno')?>"></span>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Checklist Description :&nbsp;</td>			
				<td><input type="text" id="n_chklistdesc" name="n_chklistdesc" value="<?=isset($asset_chklist[0]->checklistDescription) == TRUE ? $asset_chklist[0]->checklistDescription : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Frequency :&nbsp;</td>			
				<td><input type="text" id="n_chklistfreq" name="n_chklistfreq" value="<?=isset($asset_chklist[0]->freq) == TRUE ? $asset_chklist[0]->freq : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<!--<tr>
				<td class="td-assest">KKM Ref Number :&nbsp;</td>			
				<td><input type="text" id="n_chklistkkm" name="n_chklistkkm" value="<?=isset($asset_chklist[0]->KKMRefNo) == TRUE ? $asset_chklist[0]->KKMRefNo : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>-->
			<tr>
				<td class="td-assest">Version :&nbsp;</td>			
				<td><input type="text" id="n_chklistver" name="n_chklistver" value="<?=isset($asset_chklist[0]->checklistVersion) == TRUE ? $asset_chklist[0]->checklistVersion : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Volume : &nbsp;</td>			
				<td><input type="text" id="n_chklistvol" name="n_chklistvol" value="<?=isset($asset_chklist[0]->volumeNo) == TRUE ? $asset_chklist[0]->volumeNo : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Checklist Filename :&nbsp;</td>			
				<td><input type="text" id="n_chklistfname" name="n_chklistfname" value="<?=isset($asset_det[0]->checklistFilename) == TRUE ? $asset_det[0]->checklistFilename : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Type :&nbsp;</td>			
				<td><input type="text" id="n_chklistatype" name="n_chklistatype" value="<?=isset($asset_chklist[0]->assetType) == TRUE ? $asset_chklist[0]->assetType : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Description :&nbsp;</td>			
				<td><input type="text" id="n_chklistadesc" name="n_chklistadesc" value="<?=isset($asset_chklist[0]->assetTypeDescription) == TRUE ? $asset_chklist[0]->assetTypeDescription : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Manufacturer :&nbsp;</td>			
				<td><input type="text" id="n_chklistmanu" name="n_chklistmanu" value="<?=isset($asset_chklist[0]->mfg) == TRUE ? $asset_chklist[0]->mfg : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Model :&nbsp;</td>			
				<td><input type="text" id="n_chklistmodel" name="n_chklistmodel" value="<?=isset($asset_chklist[0]->model) == TRUE ? $asset_chklist[0]->model : 'N/A' ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="3">
				<!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>-->
				<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:200px;"/>
				</td>
			</tr>
		</table>
		</div>				
</div>
<?php echo form_hidden('n_asset_number',isset($asset_det[0]->V_Asset_no) == TRUE ? $asset_det[0]->V_Asset_no : 'N/A');?>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>