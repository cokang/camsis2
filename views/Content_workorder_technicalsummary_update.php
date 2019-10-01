<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="3"><b>Update Technical Summary</b></td>
			</tr>
			<tr>
				<td colspan="3">
					<div style="margin-left:39%;" class="ui-left_web">
						<table style="color:black;" width="100%" height="40px">
							<tr style="font-weight: bold;">
								<td width="180px" align="center">Date</td>
								<td>Reference Number</td>
							</tr>
						</table>
					</div>
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">B1</span>
						Avoid Interruption to Service	 :
					</div>
					<div class="ui-main-form-2"><input type="date" name="V_requestor" value="" class="form-control-button2 n_wi-date" /></div>
				</td>
			</tr>
			<tr style="height:20px;">
				<td colspan="3">
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">B2</span>
						Awaiting Spares	 :
					</div>
					<div class="ui-main-form-2"><input type="date" name="V_requestor" value=""  class="form-control-button2 n_wi-date" /></div>
				</td>
			</tr>
			<tr style="height:20px;">
				<td colspan="3">
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">B3</span>
						Refer To Third Party	 :
					</div>
					<div class="ui-main-form-2"><input type="date" name="V_requestor" value="" class="form-control-button2 n_wi-date" /></div>
				</td>
			</tr>
			<tr style="height:20px;">
				<td colspan="3">
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">E1</span>
						Recommendation for Decom	 :
					</div>
					<div class="ui-main-form-2"><input type="date" name="V_requestor" value="" class="form-control-button2 n_wi-date" /> <span class="space"></span> <input type="text" name="V_requestor" value="" class="form-control-button2 n_wi-date"></div>
				</td>
			</tr>
			<tr style="height:20px;">
				<td colspan="3">
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">E2</span>
						Exemption	 :
					</div>
					<div class="ui-main-form-2"><input type="date" name="V_requestor" value="" class="form-control-button2 n_wi-date" /> <span class="space"></span> <input type="text" name="V_requestor" value="" class="form-control-button2 n_wi-date"></div>
				</td>
			</tr>
			<tr style="height:20px;">
				<td colspan="3">
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">E3</span>
						Reimbursable	 :
					</div>
					<div class="ui-main-form-2"><input type="date" name="V_requestor" value="" class="form-control-button2 n_wi-date" /> <span class="space"></span> <input type="text" name="V_requestor" value="" class="form-control-button2 n_wi-date"></div>
				</td>
			</tr>
			<tr style="height:20px;">
				<td colspan="3">
					<div class="ui-main-form-1">
						<span style="font-weight: bold;">X</span>
						Work Order Cancellation	 :
					</div>
					<div class="ui-main-form-2">
						<input type="date" name="V_requestor" value="" class="form-control-button2 n_wi-date" /> 
						<!-- <span class="space"></span> Requestor : <input type="text" name="V_requestor" value="" class="form-control-button2 n_wi-dep"> -->
						<input type="text" name="V_requestor" value="" class="form-control-button2 n_wi-date" placeholder="Requestor">
					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="3">
					<?php echo anchor ('contentcontroller/technicalsummary_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Save</button>-->
				</td>
			</tr>
		</table>				
	</div>
</div>