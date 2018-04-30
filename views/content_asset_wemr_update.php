<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update Maintenance Records</b></td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
					<table class="wnctable" border="1" style="text-align:center;" align="center" id="myTable">
						<tr >
							<th width="30px">No</th>
							<th width="">Maintenance Activity</th>
							<th width="100px">Date</th>
							<th width="130px" colspan="2">Status / Remarks</th>
						</tr>
						<tr>
							<td>AGH</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td width="50px"><a onclick="mytbl()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="p-left" align="center"><b>Hence Seek Your Cooperation to list all defects on equipment in order to ensure supplier will rectify prior to the warranty expiry</b></td>
			</tr>
			<tr>
				<td class="p-left" colspan="4" style="padding-top:20px; padding-bottom:20px;">
					<table class="wnctable" border="1" style="text-align:center;" align="center" id="myTable2">
						<tr >
							<th width="30px">No</th>
							<th width="">Defect Identified</th>
							<th width="220px" colspan="2">Remarks</th>
						</tr>
						<tr>
							<td>AGH</td>
							<td>0</td>
							<td>0</td>
							<td width="50px"><a onclick="mytbl2()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
					<?php echo anchor ('contentcontroller/assetwemr_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>
					<!--<input type="submit" class="btn-button btn-primary-button" style="width:200px;" name="mysubmit" value="Save" />-->
				</td>
			</tr>
		</table>	
		</div>
		<?php include 'content_jv_tbl.php';?>				
	</div>