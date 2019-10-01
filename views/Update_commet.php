<?php echo form_open('contentcontroller/confirmcom');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="2"><b>General Comments</b></td>
				</tr>
				<tr>
					<td class="td-assest" valign="top">Comments :</td>
					<td><textarea class="input n_com" name="n_comments"><?= isset($asset_det[0]->V_Misc_details) == TRUE ? $asset_det[0]->V_Misc_details : 'N/A'?></textarea></td>
				</tr>
				<tr class="ui-header-new" style="height:40px;">
					<td align="center" colspan="2">
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
					</td>
				</tr>
			</table>
		</div>				
</div>
<?php echo form_hidden('n_asset_number',isset($asset_det[0]->V_Asset_no) == TRUE ? $asset_det[0]->V_Asset_no : 'N/A');?>
<?php echo form_close(); ?>