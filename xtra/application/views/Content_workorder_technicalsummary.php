<?php echo form_open('contentcontroller/technicalsummary_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_wrk_ord.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="11" height="40px" style="padding-left:10px;">&nbsp;</td>
			</tr>
				
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="11" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Technical Summary</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="td-assest2"><b>B1</b>&nbsp;Avoid Interruption to Service</td>
										<td>:f,gmdfg,dmf,g</td>
									</tr>
									<tr>
										<td class="td-assest2"><b>B2</b>&nbsp;Awaiting Spares</td>
										<td>:</td>
									</tr>
									<tr>
										<td class="td-assest2"><b>B3</b>&nbsp;Refer To Third Party</td>
										<td>:</td>
									</tr>
									<tr>
										<td class="td-assest2"><b>E1</b>&nbsp;Recommendation for Decommission</td>
										<td><div class="ui-main-form-1">:aaa</div> <div class="ui-main-form-2">Reference Number : </div></td>
									</tr>
									<tr>
										<td class="td-assest2"><b>E2</b>&nbsp;Exemption</td>
										<td><div class="ui-main-form-1">:</div> <div class="ui-main-form-2">Reference Number : </div></td>
									</tr>
									<tr>
										<td class="td-assest2"><b>E3</b>&nbsp;Reimbursable</td>
										<td><div class="ui-main-form-1">:</div> <div class="ui-main-form-2">Reference Number : </div></td>
									</tr>
									<tr>
										<td class="td-assest2"><b>B1</b>&nbsp;Work Order Cancellation</td>
										<td><div class="ui-main-form-1">:</div> <div class="ui-main-form-2">Reference Number : </div></td>
									</tr>	
									<!--<tr height="200px">
										<td style="color:red; text-align:center;">TECHNICAL SUMMARY DETAILS NOT FOUND FOR THIS WORK ORDER.</td>
									</tr>-->																																							
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>