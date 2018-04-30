<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>	
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">User Setup</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/sys_admin?us=2', '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" width="100%" border="0">
								<tr>	
									<th width="30px">No</td>
									<th>User Name</th>
									<th>User Id</th>
									<th>User Active</th>
									<th>User Group</th>
								</tr>
								<tr align="center" >
									<td data-title="No :">1</td>
									<td data-title="User Name :"><?php echo anchor ('contentcontroller/sys_admin?us=2&sys_id=Noor Razimy','Noor Razimy Bin Mokhta');?></td>
									<td data-title="User Id :">Noor Razimy</td>
									<td data-title="User Active :">N</td>
									<td data-title="User Group :">N/A</td>
								</tr>
								<tr align="center" >
									<td data-title="No :">2</td>
									<td data-title="User Name :"><?php echo anchor ('contentcontroller/sys_admin?us=2&sys_id=Noraswadi','Mohd Noraswadi Bin Mohamad');?></td>
									<td data-title="User Id :">Noraswadi</td>
									<td data-title="User Active :">N</td>
									<td data-title="User Group :">N/A</td>
								</tr>
								<tr align="center" >
									<td data-title="No :">3</td>
									<td data-title="User Name :"><?php echo anchor ('contentcontroller/sys_admin?us=2&sys_id=faizal','Mohd Norfaizal bin Misman');?></td>
									<td data-title="User Id :">faizal</td>
									<td data-title="User Active :">Y</td>
									<td data-title="User Group :">N/A</td>
								</tr>
							</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
	</div>
</div>
</body>
</html>
