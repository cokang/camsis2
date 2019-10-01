<div class="ui-middle-screen">
<?php include 'content_tab_wo.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_ppm_tab.php';?>
			<tr class="ui-color-desk" style="color:black;">
				<td colspan="3" height="30px" style="padding-left:10px; font-size:14px;" valign="bottom"><b>PPM Catalog</b> <i>December 2014</i><span style="font-size:12px; padding-left:5px;"> <i>By Due Date and Week</i></span><span style="color:red ; padding-left:5px; font-size:12px;">*ActualDueDate/ExactDate MUST be updated according to agreed date by hospital user to close </span></td>
			</tr>
			<tr class="ui-color-contents-style-1" >
				<td colspan="3" height="40px" style="">
					<table width="100%" class="ui-content-middle-menu-desk" border="0">
						<tr class="ui-middle-color">
							<td width="3%" height="30px">
							<img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="88%" align="center" colspan="8">
							DECEMBER 2014 
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
						</tr>
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;" align="center">
							<td width="3%" style="padding-top:3px; padding-bottom:3px;">&nbsp;</td>
							<td width="3%">Work Order Number</td>
							<td width="8%">Week</td>
							<td width="7%">Status</td>
							<td width="10%">Asset Number</td>
							<td width="3%">QAP</td>
							<td width="12%">Tag Number</td>
							<td width="11%">ActualDueDate / ExactDate *</td>
							<td width="10%">Reschedule Date</td>
							<td width="20%" colspan="3">Department</td>
						</tr>
						<?php foreach($records_desk as $row):?>        			
	    				<tr class="ui-color-contents-style-1" style="color:black; font-size:12px;" align="center">
	    					<td></td>
	    					<td><?php echo anchor ('contentcontroller/Wo',''.$row->V_Request_no.'' ) ?></td>
	    					<td><?=$row->V_request_type?></td>
	    					<td><?=$row->V_priority_code?></td>
	    					<td></td>
	    					<td><?=$row->D_date?></td>
	    					<td><?=$row->v_closeddate?></td>
		        			<td><?=$row->V_Asset_no?></td>
		        			<td></td>
		        			<td colspan="3"><?=$row->V_Location_code?></td>
	        			</tr>   
	        			<tr class="ui-color-color-color" style="color:black; font-size:12px;" align="center">
	    					<td></td>
	    					<td><?=$row->V_Request_no?></td>
	    					<td><?=$row->V_request_type?></td>
	    					<td><?=$row->V_priority_code?></td>
	    					<td></td>
	    					<td><?=$row->D_date?></td>
	    					<td><?=$row->v_closeddate?></td>
		        			<td><?=$row->V_Asset_no?></td>
		        			<td></td>
		        			<td colspan="3"><?=$row->V_Location_code?></td>
	        			</tr> 			 
    				<?php endforeach;?>	
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="12" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
				</td>
			</tr>
		</table>	
	</div>
</div>
</body>
</html>