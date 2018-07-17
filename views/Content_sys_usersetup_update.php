<?php echo form_open('contentcontroller/sys_admin?us=3');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;"><?php if ($this->input->get('sys_id') == ''){echo 'Add';}else{echo 'Edit';}?> User Setup </span></td>
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
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">User ID:</td>
											<td><input type="text" id="n_p_code" name="n_u_ID"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">User Name:</td>
											<td valign="top"><input type="text" id="n_u_Name" name="n_u_Name"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">Password :</td>
										<td valign="top"><input type="text" id="n_Password" name="n_Password"  value="" class="form-control-button2 n_wi-date2"></td>
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
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remarks :</td>
											<td><input type="text" id="n_Remarks" name="n_Remarks"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Group ID  :   </td>
											<td valign="top">
												<?php $Service_list = array(
															'0' => 'ADMEGM',
															'1' => 'ADMEGMS',
															'2' => 'ADMINISTRATOR',
															'3' => 'AMCOMPHSA',
															'4' => 'AMCOMPMKA'
														 ); ?>
								        <?php echo form_dropdown('n_g_ID', $Service_list, set_value('n_g_ID') , 'class="dropdown n_wi-date2"'); ?>
											</td>
										</tr>
										<tr>
										<td style="padding-left:10px;" valign="top">User Active :</td>
										<td valign="top"><input type="text" id="n_u_Active" name="n_u_Active"  value="" class="form-control-button2 n_wi-date2"></td>
										</tr>									
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form ui-sys_admin-web" width="100%" border="0">
									<tr>
										<td style="padding-top:5px;" valign="top">User Hospital  :</td>
										<td style="text-align:center;">
											<select multiple id="select1" SIZE="10" style="width:300px;" ondblclick="transfer_right(this,'select')">
												<option value="IIUM">IIUM Teaching Hospital</option>
												<option value="KLG">Kluang</option>
												<option value="JAS">Jasin</option>
												<option value="HSI">Sultan Ismail</option>
											</select>
										</td>
										<td style="width:100px; text-align:center;">
											<INPUT TYPE="button" NAME="right" VALUE="&gt;&gt;" id="transferRight" onclick="transfer_right(this,'select')"><BR><BR>
											<INPUT TYPE="button" NAME="right" VALUE="All &gt;&gt;" id="transferAllRight" onclick="transfer_rightAll(this,'select')"><BR><BR>
											<INPUT TYPE="button" NAME="left" VALUE="&lt;&lt;" id="transferLeft" onclick="transfer_left(this,'select')"><BR><BR>
											<INPUT TYPE="button" NAME="left" VALUE="All &lt;&lt;" id="transferAllLeft" onclick="transfer_leftAll(this,'select')">
										</td>
										<td style="text-align:center;">
											<select multiple id="select2" SIZE="10" style="width:300px;" ondblclick="transfer_left(this,'select')"></select>
										</td>
									</tr>
									<tr>
										<td style="padding-top:5px;" valign="top">User Service  :</td>
										<td style="text-align:center;">
											<select multiple id="service1" SIZE="10" style="width:300px;" ondblclick="transfer_right(this,'service')">
												<option value="BES">BIOMEDICAL ENGINEERING SERVICES</option>
												<option value="FMS">FACILITY ENGINEERING SERVICES</option>
												<option value="HKS">HOUSEKEEPING</option>
												<option value="CLI">CLINICAL WASTE</option>
											</select>
										</td>
										<td style="width:100px; text-align:center;">
											<INPUT TYPE="button" NAME="right" VALUE="&gt;&gt;" id="transferRights" onclick="transfer_right(this,'service')"><BR><BR>
											<INPUT TYPE="button" NAME="right" VALUE="All &gt;&gt;" id="transferAllRights" onclick="transfer_rightAll(this,'service')"><BR><BR>
											<INPUT TYPE="button" NAME="left" VALUE="&lt;&lt;" id="transferLefts" onclick="transfer_left(this,'service')"><BR><BR>
											<INPUT TYPE="button" NAME="left" VALUE="All &lt;&lt;" id="transferAllLefts" onclick="transfer_leftAll(this,'service')">
										</td>
										<td style="text-align:center;">
											<select multiple id="service2" SIZE="10" style="width:300px;" ondblclick="transfer_left(this,'service')"></select>
										</td>
									</tr>									
								</table>
								<table class="ui-content-form ui-sys_admin-mobile" width="100%" border="0">
									<tr>
										<td style="padding-top:5px;" valign="top">User Hospital  :</td>
										<td style="text-align:center;" class="select1">
											<select multiple id="select1" SIZE="10" style="width:300px;" ondblclick="transfer_right(this,'select')">
												<option value="IIUM">IIUM Teaching Hospital</option>
												<option value="KLG">Kluang</option>
												<option value="JAS">Jasin</option>
												<option value="HSI">Sultan Ismail</option>
											</select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td style="width:100px; text-align:center;">
											<INPUT TYPE="button" NAME="right" VALUE="&darr;" id="transferRights" onclick="transfer_right(this,'select')"></INPUT>
											<INPUT TYPE="button" NAME="right" VALUE="All &#x21CA;" id="transferAllRight" onclick="transfer_rightAll(this,'select')"></INPUT>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<INPUT TYPE="button" NAME="left" VALUE="&uarr;" id="transferLeft" onclick="transfer_left(this,'select')"></INPUT>
											<INPUT TYPE="button" NAME="left" VALUE="All &#x21C8;" id="transferAllLeft" onclick="transfer_leftAll(this,'select')"></INPUT>
										</td>
									</tr>
									<tr>
										<td></td>
										<td style="text-align:center;">
											<select multiple id="select2" SIZE="10" style="width:300px;" ondblclick="transfer_left(this,'select')"></select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><hr></td>
									</tr>
									<tr>
										<td style="padding-top:5px;" valign="top">User Service  :</td>
										<td style="text-align:center;">
											<select multiple id="service1" SIZE="10" style="width:300px;" ondblclick="transfer_right(this,'service')">
												<option value="BES">BIOMEDICAL ENGINEERING SERVICES</option>
												<option value="FMS">FACILITY ENGINEERING SERVICES</option>
												<option value="HKS">HOUSEKEEPING</option>
												<option value="CLI">CLINICAL WASTE</option>
											</select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td style="width:100px; text-align:center;">
											<INPUT TYPE="button" NAME="right" VALUE="&darr;" id="transferRights" onclick="transfer_right(this,'service')"></INPUT>
											<INPUT TYPE="button" NAME="right" VALUE="All &#x21CA;" id="transferAllRights" onclick="transfer_rightAll(this,'service')"></INPUT>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<INPUT TYPE="button" NAME="left" VALUE="&uarr;" id="transferLefts" onclick="transfer_left(this,'service')"></INPUT>
											<INPUT TYPE="button" NAME="left" VALUE="All &#x21C8;" id="transferAllLefts" onclick="transfer_leftAll(this,'service')"></INPUT>
										</td>
									</tr>
									<tr>
										<td></td>
										<td style="text-align:center;">
											<select multiple id="service2" SIZE="10" style="width:300px;" ondblclick="transfer_left(this,'service')"></select>
										</td>
									</tr>									
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
<script>
	/*
		$('#select1').dblclick(function () {
			return !$('#select1 option:selected').remove().appendTo('#select2');
		});

		$('#select2').dblclick(function () {
			return !$('#select2 option:selected').remove().appendTo('#select1');
		});
	*/
	/*
		$('#transferRight').click(function () {
			return !$('#select1 option:selected').remove().appendTo('#select2');
		});
		$('#transferLeft').click(function () {
			return !$('#select2 option:selected').remove().appendTo('#select1');
		});
		$('#transferAllRight').click(function () {
			return !$('#select1 option').remove().appendTo('#select2');
		});
		$('#transferAllLeft').click(function () {
			return !$('#select2 option').remove().appendTo('#select1');
		});
	*/
	/*
		$('#service1').dblclick(function () {
			return !$('#service1 option:selected').remove().appendTo('#service2');
		});

		$('#service2').dblclick(function () {
			return !$('#service2 option:selected').remove().appendTo('#service1');
		});
		$('#transferRights').click(function () {
			return !$('#service1 option:selected').remove().appendTo('#service2');
		});
		$('#transferLefts').click(function () {
			return !$('#service2 option:selected').remove().appendTo('#service1');
		});
		$('#transferAllRights').click(function () {
			return !$('#service1 option').remove().appendTo('#service2');
		});
		$('#transferAllLefts').click(function () {
			return !$('#service2 option').remove().appendTo('#service1');
		});
	*/

	function transfer_right(e,type){
		var table	= $(e).closest("table");
		var target	= $(table).find("select#"+type+"2");
		return !$(table).find('select#'+type+'1 option:selected').remove().appendTo(target);
	}

	function transfer_left(e,type){
		var table	= $(e).closest("table");
		var target	= $(table).find("select#"+type+"1");
		return !$(table).find('select#'+type+'2 option:selected').remove().appendTo(target);
	}

	function transfer_leftAll(e,type){
		var table	= $(e).closest("table");
		var target	= $(table).find("select#"+type+"1");
		return !$(table).find('select#'+type+'2 option').remove().appendTo(target);
	}

	function transfer_rightAll(e,type){
		var table	= $(e).closest("table");
		var target	= $(table).find("select#"+type+"2");
		return !$(table).find('select#'+type+'1 option').remove().appendTo(target);
	}

</script>
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
<?php echo form_close(); ?>
</html>
