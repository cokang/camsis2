	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height=""  align="center">
			<?php include 'content_desk_tab.php';?>
			<tr class="ui-color-desk" style="color:black;">
				<td height="40px"  style="text-align:center; font-weight:bold;">Open Complaints September 2014</td>
			</tr>
			<tr class="ui-middle-color">
				<td height="40px">
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
			<tr>
				<td style="" valign="top" >
					<table class="ui-mobile-table-desk" style="color:black;">
						<?php $numrow = 1; foreach($records_desk as $row):?>     			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>	
							<td >Complaint Number</td>
							<td class="td-desk">: <?php echo anchor ('contentcontroller/desk_complaint',''.$row->V_Request_no.' ' ) ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Source</td>
							<td class="td-desk">: <?=$row->V_request_type?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Priority</td>
							<td class="td-desk">: <?=$row->V_priority_code?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Status</td>
							<td class="td-desk">: </td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Complaint Date</td>
							<td class="td-desk">: <?=$row->D_date?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Closed Date</td>
							<td class="td-desk">: <?=$row->v_closeddate?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Asset Number</td>
							<td class="td-desk">: <?=$row->V_Asset_no?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Department</td>
							<td class="td-desk">: </td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : ''?>>
							<td >Location</td>
							<td class="td-desk">: <?=$row->V_Location_code?></td>
						</tr>
		        			<?php $numrow++?>  		 
							<?php endforeach;?>	
					</table>
				</td>	
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
				</td>
			</tr>
	</table>	
	</div>
</div>
</body>
</html>