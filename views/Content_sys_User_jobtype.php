<div class="ui-middle-screen6">
<table class="table-middle-screen-1">
<tr>
<td>
	<?php if( $this->session->userdata("total_hosp")>1 ){?>
					<?php echo anchor ('contentcontroller/select?hc=pilih',$this->session->userdata("hosp_name"),'style="font-size:20px;color:white; {
						# code...
					}"'); ?>
				<?php }else{?>
					<p style="font-size: 20px; color: black;"><?=$this->session->userdata("hosp_name");?></p>
				<?php } ?>
				<a href='../contentcontroller/sys_admin/' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> System Admin</a>
			
</td>
</tr>
</table>
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
							<b><span class="textmenu" style="float:left;">Maintenance Service Code Setup</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/sys_admin?jt=2', '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" data-table="maintenance_service_code_setup" width="100%" border="0">
								<tr>	
									<th width="30px">No</td>
									<th>Equipment Job Code</th>
									<th>Job Type Code</th>
									<th>Checklist Code</th>
									<th>Procedure Code</th>
								</tr>
								<?php $numrow=1;?>
								<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
									<td data-title="No :">1</td>
									<td data-title="Equipment Job Code :"><?php echo anchor ('contentcontroller/sys_admin?jt=2&sys_id=FMVEH01','FMVEH01');?></td>
									<td data-title="Job Type Code :">Engineer</td>
									<td data-title="Checklist Code :"></td>
									<td data-title="Procedure Code :"></td>
								</tr>
								<tr align="center" >
									<td data-title="No :">2</td>
									<td data-title="Equipment Job Code :"><?php echo anchor ('contentcontroller/sys_admin?jt=2&sys_id=FMVEH02','FMVEH02');?></td>
									<td data-title="Job Type Code :">Engineer</td>
									<td data-title="Checklist Code :"></td>
									<td data-title="Procedure Code :"></td>
								</tr>
								<tr align="center" >
									<td data-title="No :">3</td>
									<td data-title="Equipment Job Code :"><?php echo anchor ('contentcontroller/sys_admin?jt=2&sys_id=FMVEH03','FMVEH01');?></td>
									<td data-title="Job Type Code :">Assistant Engineer</td>
									<td data-title="Checklist Code :"></td>
									<td data-title="Procedure Code :"></td>
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
