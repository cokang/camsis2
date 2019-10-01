<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" style="padding-bottom:10px;">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color assets-headear" colspan="3" style="padding-left:10px; color:white;"><b>Search Result Request </td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="assets-headear" style="padding:10px; color:black;" valign="bottom"> <span style="font-size:14px; padding-left:5px;"><span style="font-weight:bold;"><i>Search Result </i></span><?php echo count($serch_result) ?> Request records matching the search criteria.</span></span></td>
			</tr>
			<tr>
				<td class="ui-color-contents-style-1">
					<div class="ui-left_web">
				<table class="ui-content-middle-menu-workorder5" width="100%" style="text-align:center; font-size:10px;">
					<tr class="ui-header-new" style="color:white; font-weight:bold;">
						<th>No</th>
						<th>Request Number</th>
						<th>QAP</th>
						<th>Priority</th>
						<th>Status</th>
						<th>Date</th>
						<th>Asset Number</th>
						<th>Summary</th>
					</tr>
					<?php  if (!empty($serch_result)) {?> 
					<?php $numrow = 1; foreach($serch_result as $row):?> 
	    				<tr class="" style="color:black; font-size:12px; ">
							<td><?= $numrow ?></td>
							<td><b><?= isset($row->V_Request_no) == TRUE ? anchor ('contentcontroller/workorderlist?&wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'' ) : 'N/A'?></b></td>
							<td><b><?= isset($row->V_request_type) == TRUE ? anchor ('contentcontroller/workorderlist?&wrk_ord='.$row->V_Request_no,''.$row->V_request_type.'' ) : 'N/A'?></b></td>
							<td><?= isset($row->V_priority_code) == TRUE ? $row->V_priority_code : 'N/A'?></td>
							<td><?= isset($row->V_request_status) == TRUE ? $row->V_request_status : 'N/A'?></td>
							<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
							<td><?= isset($row->V_Tag_no) == TRUE ? $row->V_Tag_no : 'N/A'?></td>
							<td><?= isset($row->V_summary) == TRUE ? $row->V_summary : 'N/A'?></td>
						</tr>
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
    					<td colspan="8"><span style="color:red;">NO WORK ORDER FOUND.</span></td>
    				</tr>
					<?php } ?>
					
				</table>
			</div>
			<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php  if (!empty($serch_result)) {?> 
						<?php $numrow = 1; foreach($serch_result as $row):?>  			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >Request Number</td>
							<td class="td-desk">: <?= isset($row->V_Request_no) == TRUE ? anchor ('contentcontroller/workorderlist?&wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'' ) : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>QAP</td>
							<td class="td-desk">: <?= isset($row->V_request_type) == TRUE ? anchor ('contentcontroller/workorderlist?&wrk_ord='.$row->V_Request_no,''.$row->V_request_type.'' ) : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Priority</td>
							<td class="td-desk">: <?= isset($row->V_priority_code) == TRUE ? $row->V_priority_code : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Status</td>
							<td class="td-desk">: <?= isset($row->V_request_status) == TRUE ? $row->V_request_status : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Date</td>
							<td class="td-desk">: <?= isset($row->D_date) == TRUE ? $row->D_date : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Asset Number</td>
							<td class="td-desk">: <?= isset($row->V_Asset_no) == TRUE ? $row->V_Asset_no : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Summary</td>
							<td class="td-desk">: <?= isset($row->V_summary) == TRUE ? $row->V_summary : 'N/A'?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO WORK ORDER FOUND</td>
							</tr>
							<?php } ?>
					</table>
				</div>
			</td>
		</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>					
		</table>
	</div>		
</div>
