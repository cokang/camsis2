<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm Maintenance Service Code Setup </span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
									<tr>
											<td style="padding-left:10px;" valign="top">Service Code : </td>
											<td>
											<?php $Service_list = array(
															'0' => 'CLS',
															'1' => 'CWMS',
															'2' => 'FEMS',
															'3' => 'LLS',
															'4' => 'BEMS'
														 ); ?>
								        <?php echo form_dropdown('n_s_Code', $Service_list, set_value('n_s_Code') , 'class="dropdown n_wi-date2" disabled'); ?> 
										</td>
										</tr>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Equipment Type Code :</td>
										<td valign="top"><input type="text" id="n_s_Equipment" name="n_s_Equipment" value="" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top"></td>
											<td><input type="text" id="n_s_Equipment2" name="n_s_Equipment2"  value="" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Job Type Code :</td>
										<td valign="top"><input type="text" id="n_Type_Code" name="n_Type_Code" value="" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top"></td>
											<td><input type="text" id="n_Type_Code2" name="n_Type_Code2"  value="" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>											
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
					<tr >
						<td class="ui-desk-style-table">
						<table class="ui-content-form" width="100%" border="0">
						<tr>
							<td style="padding-left:10px; padding-top:5px;" valign="top">Checklist :</td>
							<td valign="top"><input type="text" id="n_Checklist_Code" name="n_Checklist_Code" value="" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top"></td>
							<td><input type="text" id="n_Checklist_Code2" name="n_Checklist_Code2"  value="" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
							<td style="padding-left:10px; padding-top:5px;" valign="top">Procedure Code :</td>
							<td valign="top"><input type="text" id="n_Procedure_Code" name="n_Procedure_Code" value="" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top"></td>
							<td><input type="text" id="n_Procedure_Code2" name="n_Procedure_Code2"  value="" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						</table>
						</td>
					</tr>
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save"> 
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>
