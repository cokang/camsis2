<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="4"><b>Update Maintenance</b></td>
			</tr>
			<tr>
				<td>
					<div class="ui-main-form-1">
						<table class="ui-desk-style-table3" width="100%">
							<tr>
								<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON"> Preventive Maintenance </td>
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Schedule Week :</td>
								<td><input type="text" name="n_schedule_week" value="" class="form-control-button2 n_wi-date" ></td>
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Work Order No :</td>
								<td><input type="text" name="n_work_order1" value="" class="form-control-button2 n_wi-date" ></td>
							</tr>
						</table>
					</div>
					<div class="ui-main-form-2">
						<table class="ui-desk-style-table3" width="100%">
							<tr>
								<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON"> Preventive Maintenance  </td>
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Schedule Week :</td>
								<td><input type="text" name="n_schedule_week" value="" class="form-control-button2 n_wi-date" ></td>
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Work Order No :</td>
								<td><input type="text" name="n_work_order1" value="" class="form-control-button2 n_wi-date" ></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td class="p-left" valign="top">Brief Summary on service required : <textarea class="Input n_com" name="n_to"></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="4">
					<?php echo anchor ('contentcontroller/assetwnmt_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Confirm</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Confirm" />-->
				</td>
			</tr>
		</table>
		</div>			
	</div>