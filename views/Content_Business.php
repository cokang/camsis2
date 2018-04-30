<div class="ui-middle-screen">
	<?php include 'content_tab_menu.php';?>
	<div class="content-workorder">
		<?php include 'content_mobile_menu.php';?>
		<table class="ui-content-middle-menu-workorder" border="0" align="center" style="background:#79B6D8; opacity: .7;">
			<tr class="ui-header-middle-color">
				<td align="center" colspan="2" class="ui-header-homepage"><h4 class="h4-margin">BUSINESS INTELIGENT REPORTS</h4></td>
			</tr>
			<tr class="ui-content-color-style">
				<td width="80%">
				<?php echo anchor ('contentcontroller/reportbi_rcmage_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RCM by Ageing'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_rcm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RCM > 15 Days'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_rcm7_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RCM 7 - 14 Days'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ppmage_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PPM by Ageing'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
				<?php echo anchor ('contentcontroller/reportbi_ppm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PPM > 1 month'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deduction Report'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deduction Report'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/hks_sch', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HKS'); ?>
				</td>					
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/ASummaryListing?&parent=AssetSummary&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Asset Summary Listing'); ?>
				</td>					
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/ttrrlate?&parent=ServiceRequest&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Service Request'); ?>
				</td>					
			</tr>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/ttrtimeframe?&parent=UnscheduledReport&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Unscheduled Report'); ?>
				</td>					
			</tr>
			<!--<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/report_cr', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Clause'); ?>
				</td>	
				<td >&nbsp;</td>					
			</tr>-->
			<tr class="ui-header-new" style="height:8px;">
				<td align="center" colspan="4" class="footer-class">
				</td>
			</tr>
		</table>		
	</div>
</div>
</body>
</html>