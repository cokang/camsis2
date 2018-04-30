<?php include 'content_tab_desk.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height=""  align="center">
			<?php include 'content_desk_tab.php';?>
			<tr class="ui-color-desk" style="color:black;">
				<td colspan="3" height="40px" style="padding-left:10px;">Closed Complaints September 2014</td>
			</tr>
			<tr class="ui-middle-color">
				<td colspan="3" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr class="ui-middle-color">
							<td width="3%" height="30px">
							<img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="88%" align="center">
							JULY 2014
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
			<tr class="ui-middle-color">
				<td colspan="3" style="" valign="top" >
					<table class="ui-content-middle-menu-workorder2" width="100%">
						<tr class="ui-menu-color-header" style="color:white;">
							<th >&nbsp;</th>
							<th >Complaint Number</th>
							<th >Source</th>
							<th >Priority</th>
							<th >Status</th>
							<th >Complaint Date</th>
							<th >Closed Date</th>
							<th >Asset Number</th>
							<th >Department</th>
							<th >Location</th>
						</tr>
							<?php $numrow = 1; foreach($records_desk as $row):?>
							<?php if ($numrow%2==0) { ?>      			
		    				<tr align="center">
		    					<td class="td-desk"><?=$numrow?></td>
		    					<td class="td-desk"><?php echo anchor ('contentcontroller/desk_complaint',''.$row->V_Request_no.'' ) ?></td>
		    					<td class="td-desk"><?=$row->V_request_type?></td>
		    					<td class="td-desk"><?=$row->V_priority_code?></td>
		    					<td class="td-desk"></td>
		    					<td class="td-desk"><?=$row->D_date?></td>
		    					<td class="td-desk"><?=$row->v_closeddate?></td>
			        			<td class="td-desk"><?=$row->V_Asset_no?></td>
			        			<td class="td-desk"></td>
			        			<td class="td-desk"><?=$row->V_Location_code?></td>
		        			</tr> 
		        			<?php } ?>
							<?php if ($numrow%2!=0) { ?> 
							<tr align="center" class="ui-color-color-color">
		    					<td class="td-desk"><?=$numrow?></td>
		    					<td class="td-desk"><?php echo anchor ('contentcontroller/desk_complaint',''.$row->V_Request_no.'' ) ?></td>
		    					<td class="td-desk"><?=$row->V_request_type?></td>
		    					<td class="td-desk"><?=$row->V_priority_code?></td>
		    					<td class="td-desk"></td>
		    					<td class="td-desk"><?=$row->D_date?></td>
		    					<td class="td-desk"><?=$row->v_closeddate?></td>
			        			<td class="td-desk"><?=$row->V_Asset_no?></td>
			        			<td class="td-desk"></td>
			        			<td class="td-desk"><?=$row->V_Location_code?></td>
		        			</tr> 
		        			<?php } ?>
		        			<?php $numrow++?> 			 
							<?php endforeach;?>		
			<!--<tr class="" style="color:red;">
				<td colspan="12" align="center">NO CLOSED COMPLAINTS FOUND FOR SEPTEMBER 2014.</td>
			</tr>-->
				</table>
			</td>	
		</tr>
		<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="3" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
				</td>
			</tr>
	</table>	
	</div>