
<div class="ui-middle-screen">
	<div class="content-workorder">
		<table class="ui-desk-style-table3" style="background:white;" cellpadding="4" cellspacing="0" width="98%" align="center">	
			<tr class="ui-color-contents-style-1">
				<?php if ($records[0]->vvfAssetLockedStatus == 0) { ?>
				<td class="ui-header-new" colspan="2" valign="" height="30px"><span style="float: left; margin-top:8px; font-weight: bold;">Asset <?php echo $this->input->get('asset') ?> in <?php echo $this->input->get('rpt_no') ?></span><div class="asset-vo3"><span><?php echo anchor ('contentcontroller/lock_vo3_asset?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-lock2"> Lock</span></button>');?></span><span><?php echo anchor ('contentcontroller/vo3_remark_update?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"> <span class="icon-chat"> Remark</span></button>');?></span><span><?php echo anchor ('contentcontroller/vo3_item_general?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-chat"> Edit</span></button>');?></span><span><?php echo anchor ('contentcontroller/delete_vo3_asset?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-lock2"> Delete</span></button>');?></span></div></td>
				<?php } ?>
				<?php if ($records[0]->vvfAssetLockedStatus == 1 AND $records[0]->vvfAuthorizedStatus == 0) { ?>
				<td class="ui-header-new" colspan="2" valign="" height="30px"><span style="float: left; margin-top:8px; font-weight: bold;">Asset <?php echo $this->input->get('asset') ?> in <?php echo $this->input->get('rpt_no') ?></span><div class="asset-vo3"><span><?php echo anchor ('contentcontroller/lock_vo3_asset?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-lock2"> Unlock</span></button>');?></span><span><?php echo anchor ('contentcontroller/vo3_remark_update?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"> <span class="icon-chat"> Remark</span></button>');?></span><span><?php echo anchor ('contentcontroller/authorize_vo3_asset?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-lock2"> Authorize</span></button>');?></span></div></td>
				<?php } ?>
				<?php if ($records[0]->vvfAssetLockedStatus == 1 AND $records[0]->vvfAuthorizedStatus == 1) { ?>
				<td class="ui-header-new" colspan="2" valign="" height="30px"><span style="float: left; margin-top:8px; font-weight: bold;">Asset <?php echo $this->input->get('asset') ?> in <?php echo $this->input->get('rpt_no') ?></span><div class="asset-vo3"><span><?php echo anchor ('contentcontroller/vo3_remark_update?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"> <span class="icon-chat"> Remark</span></button>');?></span><span><?php echo anchor ('contentcontroller/authorize_vo3_asset?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-lock2"> Reject</span></button>');?></span></div></td>
				<?php } ?>
				<?php if ($records[0]->vvfAssetLockedStatus == 1 AND $records[0]->vvfAuthorizedStatus == 2) { ?>
				<td class="ui-header-new" colspan="2" valign="" height="30px"><span style="float: left; margin-top:8px; font-weight: bold;">Asset <?php echo $this->input->get('asset') ?> in <?php echo $this->input->get('rpt_no') ?></span><div class="asset-vo3"><span><?php echo anchor ('contentcontroller/vo3_remark_update?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"> <span class="icon-chat"> Remark</span></button>');?></span><span><?php echo anchor ('contentcontroller/authorize_vo3_asset?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'), '<button class="btn-button btn-primary-button" style="width:120px; height:33px;"><span class="icon-lock2"> Authorize</span></button>');?></span></div></td>
				<?php } ?>
			</tr>
			<tr>
				<td class="td-assest" style="width:20%;">VVF Report Number :  </td>
				<td><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">SNF/VNF Form Reference Number :</td>			
				<td><?=isset($records[0]->vvfRefNo) ? $records[0]->vvfRefNo : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Submission Date : </td>
				<td><?=isset($records[0]->vvfSubmissionDate) ? date_format(new DateTime($records[0]->vvfSubmissionDate), 'd-m-Y') : 'N/A' ?></td>
			</tr>
			<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Asset Details</td></tr>
			<tr>
				<td class="td-assest">Asset Number : </td>
				<td><?=isset($records[0]->vvfAssetNo) ? $records[0]->vvfAssetNo : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Department :</td>			
				<td><?=isset($records[0]->vvfDept) ? $records[0]->vvfDept : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Equipment Code :</td>
				<td><?=isset($records[0]->vvfAssetType) ? $records[0]->vvfAssetType : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Equipment Name :</td>
				<td><?=isset($records[0]->vvfAssetDesc) ? $records[0]->vvfAssetDesc : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Tag Number :</td>			
				<td><?=isset($records[0]->vvfAssetTagNo) ? $records[0]->vvfAssetTagNo : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Manufacturer :</td>
				<td><?=isset($records[0]->vvfMfg) ? $records[0]->vvfMfg : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Model : </td>
				<td><?=isset($records[0]->vvfModel) ? $records[0]->vvfModel : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Purchase Cost :</td>			
				<td><?=isset($records[0]->vvfPurchaseCost) ? $records[0]->vvfPurchaseCost : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Variation Status:</td>
				<td><?=isset($records[0]->vvfVStatus) ? $records[0]->vvfVStatus : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Date Commissioned :</td>
				<td><?=isset($records[0]->vvfDateComm) ? date_format(new DateTime($records[0]->vvfDateComm), 'd-m-Y') : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Date Start Service :</td>			
				<td><?=isset($records[0]->vvfDateStart) ? date_format(new DateTime($records[0]->vvfDateStart), 'd-m-Y') : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Warranty Expiry Date : </td>
				<td><?=isset($records[0]->vvfDateWarrantyEnd) ? date_format(new DateTime($records[0]->vvfDateWarrantyEnd), 'd-m-Y') : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr>
				<td class="td-assest">Date Stop Service : </td>
				<td><?=isset($records[0]->vvfDateStop) ? date_format(new DateTime($records[0]->vvfDateStop), 'd-m-Y') : "<span style=color:red;>".'-NOT SPECIFIED-'."</span>" ?></td>
			</tr>
			<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Asset Lock</td></tr>
			<tr style="background:;"><td colspan="2"><b>Assets must be locked before PMSB can give its authorization.<br />
													 Once locked, modification to the key information of this asset will be disabled.</b></td></tr>
			<tr>
				<td class="td-assest">Asset Locking Status:  </td>
				<td><?= isset($records[0]->vvfAssetLockedStatus) ? ($records[0]->vvfAssetLockedStatus == 1 ? 'Locked. Asset is not editable.' : 'Not locked. Asset is editable.' ) : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Locked By: </td>			
				<td><?= isset($records[0]->vvfAssetLockedBy) ? $records[0]->vvfAssetLockedBy : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Locked Date: </td>			
				<td><?= isset($records[0]->vvfAssetLockedDate) ? date_format(new DateTime($records[0]->vvfAssetLockedDate), 'd-m-Y') : '' ?></td>
			</tr>
			<tr style="background:;"><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">PMSB Authorization</td></tr>
			<tr style="background:;"><td colspan="2"><b>Once authorized, this VO item is no longer editable.</b></td></tr>
			<tr>
				<td class="td-assest">PMSB Authorization Status:</td>
				<td><?= isset($records[0]->vvfAuthorizedStatus) ? ($records[0]->vvfAuthorizedStatus == 1 ? 'Authorized by PMSB.' : ($records[0]->vvfAuthorizedStatus == 2 ? 'Rejected by PMSB' : 'Not yet processed by PMSB.' ) ) : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Authorization By: </td>			
				<td><?= isset($records[0]->vvfAuthorizedBy) ? $records[0]->vvfAuthorizedBy : '' ?></td>
			</tr>
			<tr>
				<td class="td-assest">Authorization Date:  </td>			
				<td><?= isset($records[0]->vvfAuthorizedDate) ? date_format(new DateTime($records[0]->vvfAuthorizedDate), 'd-m-Y') : '' ?></td>
			</tr>

			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="2">
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->get('rpt_no')) ?>
		<?php echo form_hidden('asset',$this->input->get('asset')) ?>
		<?php echo form_hidden('VOLockedStatus',$records[0]->vvfAssetLockedStatus) ?>
	</div>

<script>
function goToURL(){
	 if (confirm("Are you sure to delete this report?")){
		location.href='delete_vo3_asset?rpt_no=<?php echo $this->input->get('rpt_no');?>&asset=<?php echo $this->input->get('asset'); ?>';
		}
	else{
		return;
		}
}
</script>
</html>
</div>
<?php echo form_close(); ?>