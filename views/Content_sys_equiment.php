<div class="ui-middle-screen">
</table>
<table class="table-middle-screen-2" border="0">
<tr><td>
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>	
		<div class="ui-main-form-5">
			<div class="middle_d2">
				<table width="100%" class="ui-content-form-reg" style="">
					<tr class="ui-color-contents-style-1" height="30px">
						<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Equipment Type Code Setup</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
								<?php echo anchor ('contentcontroller/sys_admin?ec=2', '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
						</td>
					</tr>
					<tr >
						<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" data-table="equipment_type_code_setup" width="100%" border="0">
								<tr>	
									<th width="30px">No</th>
									<th>Equipment Code</th>
									<th>Description</th>
									<th>Sys Code</th>
									<th>Workgroup</th>
									<th>Chk List</th>
								</tr>
								<?php $numrow=1;?>
								<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
									<td data-title="No :">1</td>
									<td data-title="Equipment Code :"><?php echo anchor ('contentcontroller/sys_admin?ec=2&sys_id=BESUR05','BESUR05');?></td>
									<td data-title="Description :">Lavage Units, Surgical</td>
									<td data-title="Sys Code :"></td>
									<td data-title="Workgroup :">W2</td>
									<td data-title="Chk List :">80FQH</td>
								</tr>
								<tr align="center" >
									<td data-title="No :">2</td>
									<td data-title="Equipment Code :"><?php echo anchor ('contentcontroller/sys_admin?ec=2&sys_id=BESUR06','BESUR06');?></td>
									<td data-title="Description :">Dermatomes</td>
									<td data-title="Sys Code :"></td>
									<td data-title="Workgroup :">W2</td>
									<td data-title="Chk List :">TEMP</td>
								</tr>
								<tr align="center" >
									<td data-title="No :">3</td>
									<td data-title="Equipment Code :"><?php echo anchor ('contentcontroller/sys_admin?ec=2&sys_id=BESUR09','BESUR09');?></td>
									<td data-title="Description :">Cast Cutters, Electric</td>
									<td data-title="Sys Code :"></td>
									<td data-title="Workgroup :">W2</td>
									<td data-title="Chk List :">1606</td>
								</tr>
								<tr align="center" style="background:white; height:200px;">
									<td colspan="6"><span style="color:red;">NO STATUTORY DETAILS FOUND FOR THIS ASSET.</span></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</td>
	</tr>
	</table>
</div>
</body>
</html>
