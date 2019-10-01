<div class="ui-middle-screen">
	<div class="ph-dot-nav nav2" style="font-size:20px;">
		<?php echo anchor ('workorder', '<img src="'. base_url() .'images/new.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;New Request'); ?>
		<?php echo anchor ('contentcontroller/workorder/'.$this->session->userdata('usersess'), '<img src="'. base_url() .'images/catalog2.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;Request Catalog	'); ?>
		<?php echo anchor ('contentcontroller/catalogppm/'.$this->session->userdata('usersess'), '<img src="'. base_url() .'images/catalog1.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;PPM Catalog'); ?>
		<?php echo anchor ('ppm_gen', '<img src="'. base_url() .'images/catalog3.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;PPM Generator'); ?>
		<?php echo anchor ('contentcontroller/report_workorder/'.$this->session->userdata('usersess'), '<img src="'. base_url() .'images/report.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;Report'); ?>
		<div class="effect"></div>
	</div>
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
				<?php include 'content_workorder_tab.php';?>
			<tr class="ui-color-contents-style-1">
				<td colspan="16" height="40px" style="padding-left:10px; color:black;">Clause</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="16" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
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
			<tr class="ui-color-contents-style-1">
				<td height="25px" colspan="16"></td>
				</tr>		
			<tr class="ui-color-contents-style-1">
				<td colspan="16" style="">
					<table class="ui-content-middle-menu-workorder2" width="100%" height="25px">
						<tr class="ui-menu-color-header" style="color:white;">
							<td width="3%" style="padding-top:3px; padding-bottom:3px;">&nbsp;</td>
							<td width="3%">Type</td>
							<td width="3%">Hosp</td>
							<td width="20%">Request Number</td>
							<td width="3%">QAP</td>
							<td width="3%">Priority</td>
							<td width="3%">Status</td>
							<td width="12%">Date</td>
							<td width="11%">Asset Number</td>
							<td width="37%">Summary</td>
						</tr>
				<?php $numrow = 1; foreach($records as $row):?>
					<?php if ($numrow%2==0) { ?>        			
	    				<tr class="ui-color-color-color">
	    					<td><?=$row->V_requestor?></td>
		        			<td><?=$row->V_servicecode?></td>
		        			<td><?=$row->V_request_type?></td>
		        			<td><?php echo anchor ('contentcontroller/workorderlist?wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'' ) ?></td>
		        			<td></td>
		        			<td><?=$row->V_priority_code?></td>
		        			<td></td>
		        			<td><?=$row->D_date?></td>
		        			<td><?=$row->V_Asset_no?></td>
		        			<td><?=$row->V_summary?></td>
	        			</tr>
	        			<?php } ?>
	        			<?php if ($numrow%2!=0) { ?>
	        			<tr>
	    					<td><?=$row->V_requestor?></td>
		        			<td><?=$row->V_servicecode?></td>
		        			<td><?=$row->V_request_type?></td>
		        			<td><?php echo anchor ('contentcontroller/workorderlist?wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'' ) ?></td>
		        			<td></td>
		        			<td><?=$row->V_priority_code?></td>
		        			<td></td>
		        			<td><?=$row->D_date?></td>
		        			<td><?=$row->V_Asset_no?></td>
		        			<td><?=$row->V_summary?></td>
	        			</tr>    			 
	        			<?php } ?>
	        			<?php $numrow++; ?>
    		<?php endforeach;?>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="16" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
				</td>
			</tr>
		</table>
	</div>
</div>