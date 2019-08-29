<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update List of Detect</b></td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
					<table class="wnctable" border="1" style="text-align:center;" align="center" id="myTable3">
						<tr >
							<th width="30px">No</th>
							<th width="100px">Date</th>
							<th width="">Defects Identified</th>
							<th width="130px" colspan="2">Remarks</th>
						</tr>
						<tr>
							<td>AGH</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td width="50px"><a onclick="mytbl3()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a></td>

						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
					<table class="wnctable" border="1" style="text-align:center;" align="center">
						<tr >
							<th colspan="4" style="font-size:15px;">Verification of Head / Unit</th>
						</tr>
						<tr >
							<th width="50%" colspan="2">Internal Data Validation</th>
							<th width="" colspan="2">Acceptance by Customer</th>
						</tr>
						<tr>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Signature </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Signature </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
						</tr>
						<tr>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Name </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Name </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
						</tr>
						<tr>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Designation </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Designation </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
						</tr>
						<tr>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Date </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
							<td colspan="" style="width:15%;" valign="top" height="25px" align="right">Date </td>
							<td colspan="" style="" valign="top" height="25px" align="left">: <input type="text" name="n_model" value="" class="form-control-button2" ></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<?php echo anchor ('contentcontroller/assetwflod_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>		
		<?php include 'content_jv_tbl.php';?>		
	</div>