<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="6"><b>Confirm Reminder To Third Party / Notification Of Status</b></td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
					<table class="wnctable" border="1" style="text-align:center;" align="center">
						<tr >
							<th width="25%"></th>
							<th width="100px">Date</th>
							<th>Remarks</th>
							<th width="100px">Reminded By</th>
						</tr>
						<tr>
							<td>1<sup>st</sup> Reminder/Status Notified</td>
							<td><input type="date" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
							<td><textarea class="Input" name="n_Please_specity"  cols="22" rows="3" disabled></textarea></td>
							<td><input type="text" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
						</tr>
						<tr>
							<td>2<sup>nd</sup> Reminder/Status Notified</td>
							<td><input type="date" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
							<td><textarea class="Input" name="n_Please_specity"  cols="22" rows="3" disabled></textarea></td>
							<td><input type="text" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
						</tr>
						<tr>
							<td>3<sup>rd</sup> Reminder/Status Notified</td>
							<td><input type="date" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
							<td><textarea class="Input" name="n_Please_specity"  cols="22" rows="3" disabled></textarea></td>
							<td><input type="text" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
						</tr>

					</table>

				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="6">
					<?php echo anchor ('contentcontroller/assetetrttpnos_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Confirm</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>			
	</div>
</div>