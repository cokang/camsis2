<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="5"><b>Update Warranty Provider</b></td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" height="40px">Notice to Warranty Provider</td>
				<td></td>
			</tr>	
			<tr>
				<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON" > Send via Fax</td>
				<td width="15%">Date :</td>
				<td> <input type="Date" name="n_date" value="" class="form-control-button n_wi-date2" /></td>
			</tr>
			<tr>
				<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON"> Send by Mail</td>
				<td >Date :</td>

				<td> <input type="Date" name="n_date" value="" class="form-control-button n_wi-date2" /></td>
				<td align="center">
					<table class="wn_top ui-left_web">
						<tr>
							<td>Warrantry Provider's Acknowledgement</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" height="40px">Notification Issued By  :</td>
				<td></td>
			</tr>
			<tr>
				<td class="p-left">Name :</td>
				<td colspan="3"> <input type="text" name="n_Name" value="" class="form-control-button2 n_wi-date2" ></td>
			</tr>
			<tr>
				<td class="p-left">Designation :</td>
				<td colspan="3"> <input type="text" name="n_Designation" value="" class="form-control-button2 n_wi-date2" ></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="5">
					<?php echo anchor ('contentcontroller/assetwnwpa_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>				
	</div>