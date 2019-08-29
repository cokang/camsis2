<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="6"><b>Update Referral To Third Party</b></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table" colspan="4">
					<table style="color:black;" width="100%" border="0">	
						<tr>
							<td  style="width:50%;" valign="top" colspan="2">
								<table width="100%" style="color:black;">
									<tr>
										<td style="width:40.8%;">Taken By </td>
										<td>: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
									</tr>
									<tr>
										<td style="width:40.8%;">Designation</td>
										<td>: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
									</tr>
									<tr>
										<td style="width:40.8%;">Date </td>
										<td>: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
									</tr>
									<tr>
										<td style="width:40.8%;">Company Name</td>
										<td>: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
									</tr>
								</table>
							</td>
							<td class="p-left" style="width:50%;" valign="top" colspan="2">
								<table width="100%" style="color:black;">
									<tr>
										<td style="width:30%;" height="50px" valign="top">Address </td>
										<td valign="top">: <textarea class="Input" name="n_Please_specity"  cols="22" rows="3"> </textarea></td>
									</tr>
									<tr>
										<td style="width:30%;">Tel No </td>
										<td>: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
									</tr>
									<tr>
										<td style="width:30%;">Fax No </td>
										<td>: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:10%;">Equipment Taken </td>
							<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON" > Without accessory </td>
							<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON" > With accessory  </td>
							<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON"  > Accessory only </td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:20%;" valign="top"><i>Please specity</i></td>
							<td style="padding-left:5px;" colspan="4" valign="top">: <textarea class="Input" name="n_Please_specity"  cols="37" rows="3"> </textarea></td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:10%;">Send Via </td>
							<td style="padding-left:5px;">: <input type="checkbox" id="" value="ON"> By Hand </td>
							<td style="padding-left:5px;"> <input type="checkbox" id="" value="ON" > By Courier/post  </td>
						</tr>
						<tr>
							<td style="padding-left:5px; width:20%;"><i>Transaction No</i></td>
							<td style="padding-left:5px;" colspan="4">: <input type="text" name="n_Equipment_Name " value="" class="form-control-button2" ></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="6">
					<?php echo anchor ('contentcontroller/assetetrttp_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>
		</div>			
	</div>
</div>