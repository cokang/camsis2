<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="6"><b>Confirm Condition And Work Acceptance For Equipment / Accessories Returned By Third Party</b></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
					<table class="ui-content-form" width="100%" border="0">	
						<tr>
							<td style="padding-left:5px; width:10%;">Physical Condition </td>
							<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" disabled> Satisfactory </td>
							<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON" disabled> Not Satisfactory </td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:20%;"><i>Please specify</i></td>
							<td style="padding-left:5px;" colspan="4">: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:10%;">Work Acceptance </td>
							<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" disabled> Accepted </td>
							<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON" disabled> Not Accepted </td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:20%;"><i>Please specify</i></td>
							<td style="padding-left:5px;" colspan="4">: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:20%;">Accepted By</td>
							<td style="padding-left:5px;">: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
							<td style="padding-left:5px;" ></td>
							<td style="padding-left:5px;"> Date : <input type="date" name="n_Equipment_Name " value="" class="form-control-button2" disabled></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="6">
					<?php echo anchor ('contentcontroller/assetetcawafearbtp_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Confirm</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>		
	</div>
</div>