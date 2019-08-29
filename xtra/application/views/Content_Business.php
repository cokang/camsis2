<div class="ui-left_web">
<div class="ui-middle-screen">
<div><?php include 'content_mobile_menu.php';?></div>
<table class="table-middle-screen-2" border="0">
<tr>
    <td style="width: 13%; border-style:none;";>
	<?php include 'content_tab_menu.php';?>
	
		</td>
	<td  style="width: 2%; border-style: none;"></td>
	<td valign="top" style="width: 70%;">
		<table class="ui-content-middle-menu-workorder tblala" border="0" align="center">
			<tr>
				<td colspan="6"><h4 class="h4-margin" style="text-align: left;">BUSINESS INTELIGENT REPORTS</h4></td>
			</tr>
			<tr class="wb">
				<td width="80%">
				<?php echo anchor ('contentcontroller/reportbi_rcmage_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> RCM by Ageing'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_rcm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> RCM > 15 Days'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_rcm7_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> RCM 7 - 14 Days'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ppmage_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> PPM by Ageing'); ?>
				</td>
				<td>
				<?php echo anchor ('contentcontroller/reportbi_ppm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> PPM > 1 month'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Deduction Report'); ?>
				</td>
				
				</tr>
				<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Deduction Report'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/hks_sch', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> HKS'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/ASummaryListing?&parent=AssetSummary&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Asset Summary Listing'); ?>
				</td>					
				<td>
					<?php echo anchor ('contentcontroller/ttrrlate?&parent=ServiceRequest&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Service Request'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/ttrtimeframe?&parent=UnscheduledReport&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Unscheduled Report'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/report_chronology', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Chronology Report'); ?>
				</td>
				</tr>
		</table>		
	<td style="width: 10%; border-style: none;"></td>	
	</tr>
	</table>
</div>
</div>
<div class="ui-left_mobile">
<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td colspan="2" style="width: 13%; border-style:none;";>
	<?php include 'content_mobile_menu.php';?>
	</td>
</tr>
<tr>
	<td valign="top">
	<table class="ui-content-middle-menu-workorder tblala" border="0" align="center">
			<tr class="wb">
				<td>
				<?php echo anchor ('contentcontroller/reportbi_rcmage_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> RCM by Ageing'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_rcm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> RCM > 15 Days'); ?>
				</td>
			</tr>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_rcm7_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> RCM 7 - 14 Days'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ppmage_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> PPM by Ageing'); ?>
				</td>
			</tr>
			<tr class="wb">
				<td>
				<?php echo anchor ('contentcontroller/reportbi_ppm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> PPM > 1 month'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Deduction Report'); ?>
				</td>
			</tr>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Deduction Report'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/hks_sch', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> HKS'); ?>
				</td>
			</tr>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/ASummaryListing?&parent=AssetSummary&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Asset Summary Listing'); ?>
				</td>					
				<td>
					<?php echo anchor ('contentcontroller/ttrrlate?&parent=ServiceRequest&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Service Request'); ?>
				</td>
			</tr>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/ttrtimeframe?&parent=UnscheduledReport&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Unscheduled Report'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/report_chronology', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Chronology Report'); ?>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</div>
		</div>
</body>
</html>