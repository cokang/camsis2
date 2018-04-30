<?php echo form_open('contentcontroller/confirmReg?assetno='.$assetno);?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<form>
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="2"><b>Registration</b></td>
					<span style="color:red;"><?php echo validation_errors(); ?>
				</tr>
				
				<tr>
					<td class="td-assest">Registered Date: </td>
					<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_registered_date" value="<?=date_format(new DateTime($asset_det[0]->D_Register_date), 'd-m-Y')?>" class="form-control-button2 n_wi-date"></td>
				</tr>
				<!--<tr>
					<td class="td-assest">Asset Number:</td>			
					<td><input type="text" name="n_asset_number" value="" class="form-control-button2 n_wi-date" readonly></td>
				</tr>-->
				<tr>
					<td class="td-assest">Asset Number:&nbsp;</td>
					<td><input type="text" name="n_tagnumber" value="<?= isset($asset_det[0]->V_Tag_no) == TRUE ? $asset_det[0]->V_Tag_no : 'N/A'?>" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest" valign="top">Equipment Code:</td>
					<td><input type="text" name="n_equip_cd" value="<?= isset($asset_det[0]->V_Equip_code) == TRUE ? $asset_det[0]->V_Equip_code : 'N/A'?>" class="form-control-button2 n_wi-eq" readonly> 
						<span class="icon-windows"></span><span class="ui-left_mobile n_wi-ec"><br/></span>
						<input type="text" name="n_equip_cd" value="<?=$asset_det[0]->V_Asset_name?>" class="form-control-button2 n_wi-eq2" readonly>
					</td>
				</tr>
				<tr>
					<td class="td-assest">UMDNS Code :&nbsp;</td>
					<td><input type="text" name="n_umdns_cd" value="<?= isset($asset_map[0]->Asset_Type) == TRUE ? $asset_map[0]->Asset_Type : 'N/A'?>" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">User Department :</td>
					<td style="padding-left:5px;"> <input type="text" id="n_user_department" name="n_user_department" value="<?= isset($loc[0]->v_UserDeptCode) == TRUE ? $loc[0]->v_UserDeptCode : 'N/A'?>" class="form-control-button2 n_user_d" readonly> <span class="icon-windows" onclick="fCalllocation()" ></span></td>
				</tr>
				<tr>
					<td class="td-assest">User Department Name  :</td>
					<td style="padding-left:5px;"> <input type="text" id="n_user_department1" name="n_user_department1" value="<?= isset($loc[0]->v_userdeptdesc) == TRUE ? $loc[0]->v_userdeptdesc : 'N/A'?>" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">Location :  </td>
					<td><input type="text" id="n_location" name="n_location" value="<?= isset($loc[0]->V_location_code) == TRUE ? $loc[0]->V_location_code : 'N/A'?>" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">Location Name :  </td>
					<td><input type="text" id="n_location2" name="n_location2" value="<?= isset($loc[0]->v_Location_Name) == TRUE ? $loc[0]->v_Location_Name : 'N/A'?>" class="form-control-button2 n_wi-date" style="margin-top:4px;" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">User Name:&nbsp;</td>			
					<td><input type="text" name="n_username" value="<?= isset($asset_det[0]->V_username) == TRUE ? $asset_det[0]->V_username : 'N/A'?>" class="form-control-button2 n_wi-date" ></td>
				</tr>
				<tr>
					<td class="td-assest">Asset Group :</td>			
					<td><?php 
						$assetgroup = array(
							'' => 'Please Select',
							'1' => 'Group 1',
							'2' => 'Group 2',
							'3' => 'Group 3',
							);
					?>
					<?php echo form_dropdown('a_group', $assetgroup, set_value('a_group',isset($asset_det[0]->v_asset_grp) == TRUE ? $asset_det[0]->v_asset_grp : 'N/A') , 'class="dropdown n_wi-date"'); ?></td>
				</tr>
				<tr class="ui-header-new">
					<td align="center" colspan="2"><input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"></td>
				</tr>
			</table>
		</div>	
		</form>				
	</div>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</body>
</html>
