<?php echo form_open('contentcontroller/workorderlist_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_wrk_ord.php';?>
			<tr class="ui-color-contents-style-1 ui-left_web">
				<td colspan="11" height="40px" style="padding-left:10px; color:black;"> <?=(strstr($wrk_ord, '/A2/')) ? '' : 'Unscheduled'?></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="11" valign="top" class="pd-bttm">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">General Information</span><span class="ui-left_web" style="float: left; margin-top:8px; margin-left:8px; font-weight: bold; width: 20%;"><marquee valign="bottom" direction="right" loop="40" class="marquee-color"><b>QAP ASSET</b></marquee></span>&nbsp;<span style="float: right; padding-right:10px;"><a style="display:none;" href="delete_wo?wrk_ord=<?=$this->input->get('wrk_ord')?>" class="btn-button btn-primary-button" style="width: 80px; display:inline-block; text-align:center;">Delete</a>&nbsp;<input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
						</tr>

						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="td-assest">Registration&nbsp;Type&nbsp;:&nbsp;</td>
										<td><b><?= isset($record[0]->V_request_type) == TRUE ? $record[0]->V_request_type : 'N/A'?></b> <?=(strstr($wrk_ord, '/A2/')) ? '' : 'Unscheduled'?></a></td>
									</tr>
									<tr>
										<td class="td-assest">Job Status&nbsp;:&nbsp;</td>
										<td><span style="color:green;"><?= isset($record[0]->V_request_status) == TRUE ? $record[0]->V_request_status : 'N/A'?></span></td>
									</tr>
									<tr>
										<td class="td-assest">Request Date&nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->D_date) == TRUE ? date_format(new DateTime($record[0]->D_date), 'd-m-Y H:i') : 'N/A'?></a></td>
									</tr>
									<?php if($record[0]->V_request_type=='AP19'){ ?>
									<tr>
										<td class="td-assest">Nature of Visit&nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_priority_code) == 'RQ' ? 'Request' : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Failure Report&nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_summary) == TRUE ? $record[0]->V_summary : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Troubleshoot/Corrective Action &nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_details) == TRUE ? $record[0]->V_details : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Loc No &nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_requestor) == TRUE ? $record[0]->V_requestor : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">PO No &nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_User_dept_code) == TRUE ? $record[0]->V_User_dept_code : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Letter Ref. &nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_Location_code) == TRUE ? $record[0]->V_Location_code : 'N/A'?></td>
									</tr>
									<?php } else { ?>
									<tr>
										<td class="td-assest">Request Summary&nbsp;:&nbsp;</td>
										<td><?= isset($record[0]->V_summary) == TRUE ? $record[0]->V_summary : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Requested By:</td>
										<td><?= isset($record[0]->V_requestor) == TRUE ? $record[0]->V_requestor : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Phone : </td>
										<td><?= isset($record[0]->V_phone_no) == TRUE ? $record[0]->V_phone_no : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Designation : </td>
										<td><?= isset($record[0]->V_MohDesg) == TRUE ? $record[0]->V_MohDesg : 'N/A'?></td>
									</tr>
									<?php } ?>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>
									<tr>
										<?php
										if ($record[0]->V_User_dept_code == "") {$record[0]->V_User_dept_code = $record[0]->assdept;};
										if ($record[0]->V_Location_code == "") {$record[0]->V_Location_code = $record[0]->assloc;};
										?>
										<td class="td-assest">User Department:</td>
										<td><?= isset($record[0]->V_User_dept_code) == TRUE ? $record[0]->V_User_dept_code : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Location Code: </td>
										<td><?= isset($record[0]->V_Location_code) == TRUE ? $record[0]->V_Location_code : 'N/A' ?></td>
									</tr>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset</td></tr>
									<tr>
										<td class="td-assest">Equipment Code:</td>
										<td><?= isset($record[0]->V_Equip_code) == TRUE ? $record[0]->V_Equip_code : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Asset Number: </td>
										<td><b><?= ($record[0]->V_Asset_no) && $record[0]->V_Asset_no != 'N/A'  ? anchor ('contentcontroller/assetupdate?asstno='.$record[0]->V_Asset_no.'&tab=0&parent=assets',''.$record[0]->V_Tag_no.'' ) : 'N/A'?></b></td>
									</tr>
									<!--<tr>
										<td class="td-assest">Asset Tag: </td>
										<td><b><?= ($record[0]->V_Asset_no)  ? anchor ('contentcontroller/assetupdate?&asstno='.$record[0]->V_Asset_no,''.$record[0]->V_Tag_no.'' ) : 'N/A'?></b></td><!--<?= isset($record[0]->V_Tag_no) == TRUE ? $record[0]->V_Tag_no : 'N/A'?>
									</tr>-->
									<tr>
										<td class="td-assest">Asset Status: </td>
										<td><?= isset($record[0]->V_AssetStatus) == TRUE ? $record[0]->V_AssetStatus : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Warranty: </td>
										<td><span style="color:red;"><?= isset($record[0]->V_Wrn_end_code) == TRUE ? date_format(new DateTime($record[0]->V_Wrn_end_code), 'd-m-Y') : 'N/A'?></span></td>
									</tr>
									<tr>
										<td class="td-assest">Manufacturer: </td>
										<td><?= isset($record[0]->V_Manufacturer) == TRUE ? $record[0]->V_Manufacturer : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Serial Number: </td>
										<td><?= isset($record[0]->V_Serial_no) == TRUE ? $record[0]->V_Serial_no : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Link Work Order: </td>
										<td><?= isset($record[0]->link_wo) == TRUE ? $record[0]->link_wo : 'N/A'?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>
<?php echo form_close(); ?>
