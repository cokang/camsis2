<?php echo form_open('contentcontroller/confirmcomsv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>General Comments</b></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Comments :</td>
				<td><textarea class="input n_com" name="n_comments" readonly><?=$this->input->post('n_comments')?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2" style="">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width:200px;"/>
				</td>
			</tr>
		</table>				
	</div>
</div>
<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
<?php echo form_close(); ?>