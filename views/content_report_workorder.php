<div class="ui-middle-screen">
<?php include 'content_tab_wo.php';?>
	<div class="content-workorder" align="center">
		<table class="ui-report-style-content" style="" cellpadding="4" cellspacing="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Reports </b>- WorkOrders</td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_ppmbulk/','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">PPM Bulk Print</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_RSReport','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Status Report - Request Work Orders</span></button>');?></td>			
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_PPMWOrders','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Status Report - PPM Work Orders</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_csr','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Status Report - Complaints</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_ppmms','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Monthly Summary - PPM Work Orders</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_ppmun','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">User Notification For PPM Work</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_RPPMW','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">PPM Reschedule Report</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_ppmyearlyplanner','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">PPM Yearly Planner</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_search_dwo','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Search</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_visit_rpt','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Visit Log Report</span></button>');?></td>
			</tr>
			<tr>
				<td width="25%" style="padding-left:10px;"><?php echo anchor ('contentcontroller/report_search_loc','<span class="icon-folder"></span><span style="color:black; padding-left:10px;">Search By Location</span></button>');?></td>
			</tr>
		</table>				
	</div>
</div>