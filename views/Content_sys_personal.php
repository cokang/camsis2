<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>	
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Personnel Info</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/sys_admin?gbl=2', '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" width="100%" border="0">
								<tr>	
									<th width="30px">No</td>
									<th>Personal Code</th>
									<th>Name</th>
									<th>Designation</th>
								</tr>
								<?php $numrow = 1; foreach($record as $row): ?>
								<tr align="center" >
									<td data-title="No :"><?=$numrow++?></td>
									<td data-title="Personal Code :"><?=isset($row->v_PersonalCode) ? anchor ('contentcontroller/sys_admin?gbl=2&sys_id='.$row->Id,$row->v_PersonalCode) : 'N/A'?></td>
									<td data-title="Name :"><?=isset($row->v_PersonalName) ? $row->v_PersonalName : ''?></td>
									<td data-title="Designation :"><?=isset($row->v_designation) ? $row->v_designation : ''?></td>
								</tr>
								<?php endforeach; ?>		
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
