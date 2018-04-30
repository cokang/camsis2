<?php echo form_open('contentcontroller/vo3_rate_item_update?ratesid='.$this->input->get('ratesid'));?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
<div class="main-box">
	<div class="box3">
		<div class="small-box bg-purple">
			<div class="inner2" >
				<p>Monthly Asset Listing</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_assets_main/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box bg-fuchsia">
			<div class="inner2" >
				<p>All Sites VO Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_C_main/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box bg-olive">
			<div class="inner2" >
				<p>VO Catalog</p>
			</div>
			<div class="icon"><i class="icon-stats-bars"></i></div>
			<?php echo anchor ('contentcontroller/vo3/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box bg-olive">
			<div class="inner2" >
				<p>Rates Catalog</p>
			</div>
			<div class="icon"><i class="icon-stats-bars"></i></div>
			<?php echo anchor ('contentcontroller/vo3_rates_main/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2" valign=""><span style="float: left; margin-top:8px; font-weight: bold;">Rate Item</span><span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 80px;" name="mysubmit" value="Edit"></span></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Category : </td>
				<td><?= isset($record[0]->AssetCategoryCode) ? $record[0]->AssetCategoryCode.'-'.$record[0]->AssetCategoryDesc : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Type Code :</td>			
				<td><?= isset($record[0]->AssetTypeCode) ? $record[0]->AssetTypeCode.'-'.$record[0]->AssetTypeDesc : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Status :&nbsp;</td>
				<td><?= isset($record[0]->Status) ? $record[0]->Status : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Definition :</td>
				<td><?= isset($record[0]->AssetTypeDefinition) ? $record[0]->AssetTypeDefinition : 'N/A' ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">DW Rate : </td>
				<?php if (is_null($record[0]->DWRate) ==TRUE) { ?>
				<td></td>
				<?php } ?>
				<?php if (isset($record[0]->DWRate) == TRUE) { ?>
				<?php if (($record[0]->DWRate == 999.00) OR ($record[0]->DWRate == '*')) { ?>
				<td><?php echo '*Standard Rate: For asset value less than 2,000,000.00 the rate is 0.75%.<br>For asset value more than 2,000,000.00 the rate is 0.05%'?></td>
				<?php } ?>
				<?php if (($record[0]->DWRate != 999.00) AND ($record[0]->DWRate != '*')) { ?>
				<td><?= isset($record[0]->DWRate) ? $record[0]->DWRate : 'N/A' ?></td>
				<?php } ?>
				<?php } ?>
			</tr>
			<tr>
				<td class="td-assest" valign="top">PW Rate :</td>
				<td><?= isset($record[0]->PWRate) ? $record[0]->PWRate : '' ?></td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="2">
				</td>
			</tr>
		</table>				
	</div>
	<?php echo form_hidden('ratesid',$this->input->get('ratesid')) ?>
</div>
<?php echo form_close(); ?>
