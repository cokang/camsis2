<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%" border="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="5"><b>Update Warranty Provider</b></td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="ui-main-form-1">
						<table class="ui-desk-style-table3" border="0">
							<tr>
								<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON">Work Not Completed</td>
							</tr>
						</table>
					</div>
					<div class="ui-main-form-2">
						<table class="ui-desk-style-table3" border="0">
							<tr>
								<td class="p-left" align="left">Justification :</td>
								<td> <input type="text" name="n_model" value="" class="form-control-button2 n_wi-date2" ></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
					<table class="wnctable" border="1" style="text-align:center;" align="center" id="myTable">
						<tr >
							<th width="30px">No</th>
							<th width="100px">Date</th>
							<th colspan="2">Comments</th>
						</tr>
						<tr>
							<td>AGH</td>
							<td>0</td>
							<td>0</td>
							<td width="50px"><a onclick="myFunction()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a></td>
						</tr>
					</table>

				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="ui-main-form-1">
						<table class="ui-desk-style-table3" border="0">
							<tr>
								<td class="p-left" colspan="2"><input type="checkbox" id="" value="ON"> Work Completed</td>
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Job Sheet No :</td>
								<td> <input type="text" name="n_model" value="" class="form-control-button2 n_wi-date2" ></td>
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Date Completed :</td>
								<td> <input type="text" name="n_model" value="" class="form-control-button2 n_wi-date2" ></td>
							</tr>
						</table>
					</div>
					<div class="ui-main-form-2">
						<table class="ui-desk-style-table3" border="0">
							<tr>
								<td class="p-left" style="padding-left:37px;">Verified BY :</td>
								<td><span style="padding-right:37px;"><input type="text" name="n_model" value="" class="form-control-button2 n_wi-date2" >
							</tr>
							<tr>
								<td class="p-left" style="padding-left:37px;">Designation :</td>
								<td> <input type="text" name="n_model" value="" class="form-control-button2 n_wi-date2" ></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="5">
					<?php echo anchor ('contentcontroller/assetwnwc_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>

		<?php include 'content_jv_tbl.php';?>


	</div>