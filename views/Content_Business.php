<style type="text/css">
	table .tblala{
	    width: 100%;
	    table-layout: fixed;
	    margin-left: 5px;
	}

	.tblala tr td{
		text-align: left;
		
	}
	.tblala .wb td{
		text-align: center;
		width: 33.33%;
		background: rgba(255,255,255,.8);
		border: 3px solid #E8E8E8;
		
	}
	h4{
		font-size: 25px; 
		color: #165694;
	}
</style>
<div class="ui-middle-screen">
<table style="width: 100%; table-layout: auto;">
<tr><td valign="top" style="width: 10%;">
	<?php include 'content_tab_menu.php';?>
	<div class="content-workorder">
		<?php include 'content_mobile_menu.php';?>
		</div>
		</td>
		<td style="width: 2%;"></td>
		<td>
		<table class="ui-content-middle-menu-workorder tblala" border="0" align="center">
			<tr>
				<td colspan="4"><h4 class="h4-margin">BUSINESS INTELIGENT REPORTS</h4></td>
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
				</tr>
				<tr class="wb">
				<td>
				<?php echo anchor ('contentcontroller/reportbi_ppm15_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> PPM > 1 month'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/reportbi_ind_listing', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Deduction Report'); ?>
				</td>
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
				<td>
					<?php echo anchor ('contentcontroller/ttrtimeframe?&parent=UnscheduledReport&tab=0', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Unscheduled Report'); ?>
				</td>
				<td>
					<?php echo anchor ('contentcontroller/report_chronology', '<img src="'. base_url() .'images/user2.png" alt="" class="ui-icon"/><br></br> Chronology Report'); ?>
				</td>				
			</tr>
			
		</table>		
	</div>
	</td>
	<td style="width: 2%;"></td>
	</tr>
	</table>

</div>
</body>
</html>