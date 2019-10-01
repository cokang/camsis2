<?php echo form_open('contentcontroller/wo_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_tab_woppm.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="9" height="40px" style="padding-left:10px; color:black;"></td>
			</tr>
				
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="9" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span class="head-tit">Scheduled<span class="ui-left_mobile"><br /></span> General Information</span><span class="head-tit2"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Request Type: </td>
										<td>Scheduled</a></td>
									</tr>
									<tr>
										<td class="td-assest">Job Status&nbsp;:&nbsp;</td>
										<td><span style="color:green;"><?= isset($record[0]->v_Wrkordstatus) == TRUE ? $record[0]->v_Wrkordstatus : 'N/A'?></span></td>
									</tr>
									<tr>
										<td class="td-assest">Start Date&nbsp;:&nbsp;</td>
										<td></a><?= isset($record[0]->d_StartDt) == TRUE ? date_format(new DateTime($record[0]->d_StartDt), 'd-m-Y H:i') : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>
									<tr style="height:20px;">
										<td class="td-assest">User Department:</td>
										<td><?= isset($record[0]->V_User_Dept_code) == TRUE ? $record[0]->V_User_Dept_code : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Location Code: </td>
										<td><?= isset($record[0]->V_Location_code) == TRUE ? $record[0]->V_Location_code : 'N/A'?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset</td></tr>
									<tr style="height:20px;">
										<td class="td-assest">Equipment Code:</td>
										<td><?= isset($record[0]->V_Equip_code) == TRUE ? $record[0]->V_Equip_code : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Asset Number: </td>
										<td><b><?= ($record[0]->V_Asset_no)  ? anchor ('contentcontroller/assetupdate?&asstno='.$record[0]->V_Asset_no.'&tab=0&parent=assets',''.$record[0]->V_Tag_no.'' ) : 'N/A'?></b></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Asset Name: </td>
										<td><b><?= isset($record[0]->V_Asset_name) == TRUE ? $record[0]->V_Asset_name : 'N/A'?></b></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Model No.: </td>
										<td><b><?= isset($record[0]->V_Model_no) == TRUE ? $record[0]->V_Model_no : 'N/A'?></b></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Serial No.: </td>
										<td><b><?= isset($record[0]->V_Serial_no) == TRUE ? $record[0]->V_Serial_no : 'N/A'?></b></td>
									</tr>
									<!--<tr style="height:20px;">
										<td class="td-assest">Asset Tag: </td>
										<td><b><?= ($record[0]->V_Asset_no)  ? anchor ('contentcontroller/assetupdate?&asstno='.$record[0]->V_Asset_no,''.$record[0]->V_Tag_no.'' ) : 'N/A'?></b></td>
									</tr>-->
									<tr style="height:20px;">
										<td class="td-assest">Asset Status: </td>
										<td><?= isset($record[0]->V_AssetStatus) == TRUE ? $record[0]->V_AssetStatus : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Warranty: </td>
										<?php if(strtotime($record[0]->V_Wrn_end_code) > strtotime(date("d/m/Y"))){?>
										<td><?= isset($record[0]->V_Wrn_end_code) ? (( $record[0]->V_Wrn_end_code < time() ) ? '<span style="color:green;">Warranty expired on '.date_format(new DateTime($record[0]->V_Wrn_end_code), 'd-m-Y').'</span>' : $record[0]->V_Wrn_end_code) : 'N/A' ?></td>
										<?php } else {  ?>
										<td><?= isset($record[0]->V_Wrn_end_code) ? (( $record[0]->V_Wrn_end_code < time() ) ? '<span style="color:red;">Warranty expired on '.date_format(new DateTime($record[0]->V_Wrn_end_code), 'd-m-Y').'</span>' : $record[0]->V_Wrn_end_code) : 'N/A' ?></td>
										<?php }  ?>
										
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Manufacturer: </td>
										<td><?= isset($record[0]->V_Manufacturer) == TRUE ? $record[0]->V_Manufacturer : 'N/A'?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Serial Number: </td>
										<td><?= isset($record[0]->V_Serial_no) == TRUE ? $record[0]->V_Serial_no : 'N/A'?></td>
									</tr>																																								
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>
<?php echo form_close(); ?>