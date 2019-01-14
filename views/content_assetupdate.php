<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"> </div>
		<div class="ui-main-form">
			<?php include 'content_asset_tab.php';?>
			<div class="ui-left_mobile"><?php include 'content_image_asset.php';?></div>
			<?php if ($assetppm){ ?>
			<div class="n-reqttitle">Latest PPM WO Generated <?php echo anchor ('contentcontroller/wo?wrk_ord='.$assetppm[0]->v_WrkOrdNo, $assetppm[0]->v_WrkOrdNo,'style="color:blue;"'); ?> on <?=isset($assetppm[0]->d_StartDt) ? date("d-m-Y",strtotime($assetppm[0]->d_StartDt)) : ''?></div>
			<?php } else { ?>
			<div class="n-reqttitle">No PPM WO Generated</div>
			<?php } ?>
			<div class="n-reqttitle">Current VO Claim&nbsp;: <?=isset($asset_vo[0]->vvfReportNo) == TRUE ? $asset_vo[0]->vvfReportNo : 'N/A'?></div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
								<b><span class="textmenu" style="float:left;">Registration</span></b>
								<span class="textmenu1" style="float:right;padding-top:0px;">
									<?php echo anchor ('contentcontroller/updateReg?assetno='.$assetn, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
								</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest ">Registration Date&nbsp;: </td>
										<td><?= ($asset_det[0]->D_Register_date) ? ($asset_det[0]->D_Register_date != '0000-00-00 00:00:00' ? date("d-m-Y",strtotime($asset_det[0]->D_Register_date)) : '-' ) : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Asset Number&nbsp;: </td>
										<td><?=$asset_det[0]->V_Tag_no?></td>
									</tr>
									<!--<tr>
										<td class="td-assest">Tag&nbsp;Number&nbsp;:&nbsp;</td>
										<td></a></td>
									</tr>-->
									<tr>
										<td class="td-assest">Equipment Code&nbsp;: </td>
										<td><?=$asset_det[0]->V_Equip_code?></td>
									</tr>
									<tr>
										<td class="td-assest">User Department Code&nbsp;: </td>
										<td><?=$asset_det[0]->v_UserDeptDesc?> (<?=$asset_det[0]->V_User_Dept_code?>)</td>
									</tr>
									<tr>
										<td class="td-assest">Location Code&nbsp;: </td>
										<td><?=$asset_det[0]->V_Location_code?></td>
									</tr>
									<tr>
										<td class="td-assest">User Name: </td>
										<td><?=$asset_det[0]->V_username?></td>
									</tr>
									<tr>
										<td class="td-assest">Group: </td>
										<td><?=$asset_UMDNS[0]->Asset_Group?></td>
									</tr>
									
									<tr>
										<td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">UMDNS Classification</td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Asset Type: </td>
										<td><?=$asset_UMDNS[0]->Asset_Type?></td>
									</tr>
									
									<tr style="height:20px;">
										<td class="td-assest">Description: </td>
										<td><?=$asset_UMDNS[0]->Type_Desc?></td>
									</tr>																												
								</table>
							</td>
						</tr>
					</table>
				</div>
				
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
								<b><span class="textmenu" style="float:left;">General Comments</span></b>
								<span class="textmenu1" style="float:right;padding-top:0px;">
									<?php echo anchor ('contentcontroller/updatecom?assetno='.$assetn, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
								</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">General Comments: </td>
										<td><?=$asset_det[0]->V_Misc_details?></td>
									</tr>					
								</table>
							</td>
						</tr>
					</table>
				</div>

				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
								<b><span class="textmenu" style="float:left;">Asset Acquisition</span></b>
								<span class="textmenu1" style="float:right;padding-top:0px;">
									<?php echo anchor ('contentcontroller/updateacqu?assetno='.$assetn, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
								</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Supplier&nbsp;: </td>
										<td class="FieldValue"><?=$asset_det[0]->V_Vendor_code?>&nbsp;<?=$asset_det[0]->v_vendorname?></td>
									</tr>
									<tr>
										<td class="td-assest">Service Agent&nbsp;: </td>
										<td><?=$asset_det[0]->V_Agent?></td>
									</tr>									
									<tr>
										<td class="td-assest">File Reference&nbsp;: </td>
										<td><?=$asset_det[0]->V_File_Ref_no?></td>
									</tr>
									<tr>
										<td class="td-assest">Cost&nbsp;: </td>
										<td>RM<?=$asset_det[0]->N_Cost?></td>
									</tr>
									<tr>
										<td class="td-assest">LPO Number&nbsp;: </td>
										<td><?=$asset_det[0]->V_PO_no?></td>
									</tr>
									<tr>
										<td class="td-assest">Purchase Date&nbsp;: </td>
										<td><?=date('d-m-Y',strtotime($asset_det[0]->V_PO_date))?></td>
									</tr>																							
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
								<b><span class="textmenu" style="float:left;">Specification</span></b>
								<span class="textmenu1" style="float:right;padding-top:0px;">
									<?php echo anchor ('contentcontroller/updatespec?assetno='.$assetn, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
								</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Make (Country of Origin)&nbsp;: </td>
										<td><?=$asset_det[0]->V_Make?></td>
									</tr>
									<tr>
										<td class="td-assest">Manufacturer&nbsp;: </td>
										<td><?=$asset_det[0]->V_Manufacturer?></td>
									</tr>
									<tr>
										<td class="td-assest">Brand&nbsp;: </td>
										<td><?=$asset_det[0]->V_Brandname?></td>
									</tr>
									<tr>
										<td class="td-assest">Model&nbsp;: </td>
										<td><?=$asset_det[0]->V_Model_no?></td>
									</tr>
									<tr>
										<td class="td-assest">Serial Number&nbsp;: </td>
										<td><?=$asset_det[0]->V_Serial_no?></td>
									</tr>
									<tr>
										<td class="td-assest">Capacity&nbsp;: </td>
										<td><?=$asset_det[0]->v_Capacity?> <?=$asset_det[0]->V_capacityunit?></td>
									</tr>
									<tr>
										<td class="td-assest">Depreciation&nbsp;: </td>
										<td><?=$asset_det[0]->V_Depreciation?> years</td>
									</tr>
									<tr>
										<td class="td-assest">Life span&nbsp;: </td>
										<td><?=$asset_det[0]->V_Lifespan?> years</td>
									</tr>
									<tr>
										<td class="td-assest">OP Hours Code&nbsp;: </td>
										<td><?=$asset_det[0]->V_Oper_Hr_code?></td>
									</tr>
									<tr>
										<td class="td-assest">Manual / Drawing Ref No&nbsp;: </td>
										<td><?=$asset_det[0]->V_Mnl_Draw_no?></td>
									</tr>
									<tr>
										<td class="td-assest">Procedure Code&nbsp;: </td>
										<td><?=$asset_det[0]->V_Procedure_code?></td>
									</tr>																															
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
								<b><span class="textmenu" style="float:left;">Commissioning</span></b>
								<span class="textmenu1" style="float:right;padding-top:0px;">
									<?php echo anchor ('contentcontroller/updatecommissioning?assetno='.$assetn, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
								</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">T & C Request Number&nbsp;: </td>
										<td><a href="wo-item-a12.asp?id="><b><?=$asset_det[0]->v_tc_request_no?></b></a></td>
									</tr>
									<tr>
										<td class="td-assest">Commissioning Date&nbsp;: </td>
										<td><?= ($asset_det[0]->D_commission) ? ($asset_det[0]->D_commission != '0000-00-00 00:00:00' ? date("d-m-Y",strtotime($asset_det[0]->D_commission)) : '-' ) : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Warranty End Date&nbsp;: </td>
										<?php if (strtotime($asset_det[0]->V_Wrn_end_code) > strtotime(date("d/m/Y"))){?>
										<td>
											<span style="color:#00FF00;">
												<?= ($asset_det[0]->V_Wrn_end_code) ? ($asset_det[0]->V_Wrn_end_code != '0000-00-00 00:00:00' ? date("d-m-Y",strtotime($asset_det[0]->V_Wrn_end_code)) : '-' ) : 'N/A' ?>
												<br/>STILL UNDER WARRANTY
											</span>
										</td>
										<?php } else { ?>
										<td>
											<?= ($asset_det[0]->V_Wrn_end_code) ? ($asset_det[0]->V_Wrn_end_code != '0000-00-00 00:00:00' ? date("d-m-Y",strtotime($asset_det[0]->V_Wrn_end_code)) : '-' ) : 'N/A' ?>
											<br/>POST WARRANTY
										</td>
										<?php } ?>
									</tr>
									<tr>
										<td class="td-assest">Technical Report&nbsp;: </td>
										<td><?=$asset_det[0]->V_TC_form_no?></td>
									</tr>
									<tr>
										<td class="td-assest">Job Type Code&nbsp;: </td>
										<td><?=$asset_det[0]->V_Job_Type_code?></td>
									</tr>
									<tr>
										<td class="td-assest">Contract Code&nbsp;: </td>
										<td><?=$asset_det[0]->v_ContractCode?></td>
									</tr>
									<tr>
										<td class="td-assest">Asset Workgroup Code&nbsp;: </td>
										<td><?=$asset_det[0]->V_Asset_WG_code?></td>
									</tr>																							
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
								<b><span class="textmenu" style="float:left;">Maintenance Status</span></b>
								<span class="textmenu1" style="float:right;padding-top:0px;">
									<?php echo anchor ('contentcontroller/updatemaintenance?assetno='.$assetn, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
								</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Criticality&nbsp;:  </td>
										<td><?=$asset_det[0]->v_Criticality?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Sparelist&nbsp;:  </td>
										<td><?=$asset_det[0]->v_SparelistCode?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Asset Class&nbsp;:  </td>
										<td><?=$asset_det[0]->v_AssettypeCode?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Asset Condition&nbsp;:  </td>
										<td><?=$asset_det[0]->v_AssetCondition?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Asset Status&nbsp;:  </td>
										<td><?=$asset_det[0]->v_AssetStatus?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Safety Test&nbsp;:  </td>
										<td><?=$asset_det[0]->v_SafetyTest?></td>
									</tr>
									<tr>
										<td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;"><b>Variation Order</b></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Variation Status&nbsp;:  </td>
										<td><?=$asset_det[0]->v_AssetVStatus?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Location&nbsp;:  </td>
										<td><?=$asset_det[0]->v_Location?></td>
									</tr>
									<tr style="height:20px;">
										<td class="td-assest">Date&nbsp;:  </td>
										<td><?=$asset_det[0]->d_LocDate?></td>
									</tr>	
									<tr style="height:20px;">
										<td class="theadap" align="left" colspan="2">
											<table style="color:black; font-size:14px;">
												<tr>
													<td colspan="2" class="ui-bottom-border-color" style="font-weight: bold; color:black;"><b>Current VO Claim</b></td>
												</tr>
												<tr style="height:20px;">
													<td class="ui-right" class="td-assest2">VO Claim Period&nbsp;: </td>
													<td><?=isset($asset_vo[0]->vvfPeriod) == TRUE ? $asset_vo[0]->vvfPeriod : 'N/A'?> </td>
												</tr>
												<tr style="height:20px;" class="td-assest2">
													<td class="ui-right">VVF Report No&nbsp;: </td>
													<td><?=isset($asset_vo[0]->vvfReportNo) == TRUE ? $asset_vo[0]->vvfReportNo : 'N/A'?> </td>
												</tr>
												<tr style="height:20px;" class="td-assest2">
													<td class="ui-right">SNF / VNF Ref No&nbsp;: </td>
													<td><?= isset($asset_vo[0]->vvfRefNo) == TRUE ? $asset_vo[0]->vvfRefNo : 'N/A'?> </td>
												</tr>
												<tr style="height:20px;" class="td-assest2">
													<td class="ui-right">Submission Date&nbsp;: </td>
													<td><?= isset($asset_vo[0]->vvfSubmissionDate) == TRUE ? $asset_vo[0]->vvfSubmissionDate : 'N/A'?> </td>
												</tr>
												<tr style="height:20px;" class="td-assest2">
													<td class="ui-right">Asset Locking Status&nbsp;: </td>
													<td>
														<?= isset($asset_vo[0]->vvfAssetLockedStatus) == TRUE ? $asset_vo[0]->vvfAssetLockedStatus : 'N/A'?>
														<b><?=isset($asset_vo[0]->vvfAssetLockedBy) == TRUE ? $asset_vo[0]->vvfAssetLockedBy : 'N/A'?></b>
													</td>
												</tr>
												<tr style="height:20px;" class="td-assest2">
													<td class="ui-right">PMSB Authorization&nbsp;: </td>
													<td>
														<?= isset($asset_vo[0]->vvfAuthorizedStatus) == TRUE ? $asset_vo[0]->vvfAuthorizedStatus : 'N/A'?>
														<b><?= isset($asset_vo[0]->vvfAuthorizedBy) == TRUE ? $asset_vo[0]->vvfAuthorizedBy : 'N/A'?></b>
													</td>
												</tr>
												<tr style="height:20px;" class="td-assest2">
													<td class="ui-right">PMSB Remarks&nbsp;: </td>
													<td><?= isset($asset_vo[0]->vvfHQRemarks) == TRUE ? $asset_vo[0]->vvfHQRemarks : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>	
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Checklist</td></tr>
									<tr >
										<td class="ui-desk-style-table" colspan="3">
											<table class="ui-content-form" width="100%" border="0">	
												<tr style="height:20px;">
													<td class="td-assest">Checklist Description: </td>
													<td><?=isset($asset_chklist[0]->checklistDescription) == TRUE ? $asset_chklist[0]->checklistDescription : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest">Frequency: </td>
													<td><?=isset($asset_chklist[0]->freq) == TRUE ? $asset_chklist[0]->freq : 'N/A' ?></td>
												</tr>
												<!--<tr style="height:20px;">
													<td class="td-assest">KKM Ref Number: </td>
													<td><?=$asset_det[0]->v_Criticality?></td>
												</tr>-->
												<tr style="height:20px;">
													<td class="td-assest">Version: </td>
													<td><?=isset($asset_chklist[0]->checklistVersion) == TRUE ? $asset_chklist[0]->checklistVersion : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest">Volume: </td>
													<td><?=isset($asset_chklist[0]->volumeNo) == TRUE ? $asset_chklist[0]->volumeNo : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest">File name: </td>
													<td><?=isset($asset_det[0]->checklistFilename) == TRUE ? $asset_det[0]->checklistFilename : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest">Asset Type: </td>
													<td><?=isset($asset_chklist[0]->assetType) == TRUE ? $asset_chklist[0]->assetType : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest">Asset Description: </td>
													<td><?=isset($asset_chklist[0]->assetTypeDescription) == TRUE ? $asset_chklist[0]->assetTypeDescription : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest">Manufacturer: </td>
													<td><?=isset($asset_chklist[0]->mfg) == TRUE ? $asset_chklist[0]->mfg : 'N/A' ?></td>
												</tr>
												<tr style="height:20px;">
													<td class="td-assest"s>Model: </td>
													<td><?=isset($asset_chklist[0]->model) == TRUE ? $asset_chklist[0]->model : 'N/A' ?></td>
												</tr>																							
											</table>
										</td>
									</tr>												
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
