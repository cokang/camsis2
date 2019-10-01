<div class="ui-middle-screen">
	<div class="ph-dot-nav nav" style="font-size:20px;">
		<?php echo anchor ('contentcontroller/desknew', '<img src="'. base_url() .'images/new.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;New Complaint'); ?>
		<?php echo anchor ('contentcontroller/desknewrequest', '<img src="'. base_url() .'images/new.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;New Request'); ?>
		<?php echo anchor ('SettingController/desk', '<img src="'. base_url() .'images/catalog3.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;Complaint Catalog'); ?>
		<?php echo anchor ('SettingController/desk', '<img src="'. base_url() .'images/report.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;Report'); ?>
		<div class="effect"></div>
	</div>
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<tr>
				<td class="ui-content-menu-desk-color" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; height:30px; width:25%;"><a href="#">ALL</a></td>
				<td class="ui-content-menu-desk-color" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; width:37.5%;"><a href="#">OPEN</a></td>
				<td class="ui-content-menu-desk-color" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; width:37.5%;"><a href="#">CLOSED</a></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="12" height="40px" style="padding-left:10px;">All ComplaintsOctober 2014</td>
			</tr>
			<tr>
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="88%" align="center">
							OCTOBER 2014
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>	
			<tr class="ui-color-contents-style-1">
				<td height="25px" colspan="12"></td>
				</tr>		
			<tr class="ui-color-contents-style-1">
				<td colspan="12" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
					<table class="ui-content-middle-menu-workorder2" width="100%" height="25px">
						<tr class="ui-menu-color-header" style="color:white;">
							<td width="3%" style="padding-top:3px; padding-bottom:3px;">&nbsp;</td>
							<td width="5%">Complaint Number</td>
							<td width="5%">Source</td>
							<td width="5%">Priority</td>
							<td width="5%">Status</td>
							<td width="7%">Complaint Date</td>
							<td width="7%">Closed Date</td>
							<td width="7%">Asset Number</td>
							<td width="10%">Department</td>
							<td width="10%">Location</td>
						</tr>
						<?php foreach($records as $row):?>        			
	    				<tr>
	    					<td></td>
		        			<td><?php echo anchor ('contentcontroller/deskresult',''.$row->V_requestor.'' ) ?></td>
		        			<td><?=$row->V_request_type?></td>
		        			<td><?=$row->V_Request_no?></td>
		        			<td><?=$row->V_servicecode?></td>
		        			<td><?=$row->V_priority_code?></td>
		        			<td></td>
		        			<td><?=$row->D_date?></td>
		        			<td><?=$row->V_Asset_no?></td>
		        			<td><?=$row->V_summary?></td>
	        			</tr>   			 
    					<?php endforeach;?>
						<tr>
							<td colspan="8">
								&nbsp;
							</td>class="ui-color-color-color"
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>