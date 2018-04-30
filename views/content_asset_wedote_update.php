<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update Equipment</b></td>
			</tr>
			<tr>
				<td class="p-left">Asset Name</td>
				<td>: <input type="text" name="n_asset_name" value="" class="form-control-button2" ></td>
			</tr>
			<tr>
				<td class="p-left">Tag No</td>
				<td>: <input type="text" name="n_tag" value="" class="form-control-button2" ></td>
			</tr>
			<tr>
				<td class="p-left">Model</td>
				<td>: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
			</tr>
			<tr>
				<td class="p-left">Serial No</td>
				<td>: <input type="text" name="n_serial_no" value="" class="form-control-button2" ></td>
			</tr>																																								
			<tr>
				<td class="p-left">Department</td>
				<td>: <input type="text" name="n_department" value="" class="form-control-button2" ></td>
			</tr>
			<tr>
				<td class="p-left">Location</td>
				<td>: <input type="text" name="n_location" value="" class="form-control-button2" ></td>
			</tr>
			<tr>
				<td class="p-left">Warranty Start Date</td>
				<td>: <input type="text" name="n_warranty_strt_date" value="" class="form-control-button2" ></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<?php echo anchor ('contentcontroller/assetwedote_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>				
</div>