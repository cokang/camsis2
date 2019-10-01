<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" style="padding-bottom:10px;">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color assets-headear" colspan="3" style="padding-left:10px; color:white;"><b>Search Result Help Desk </td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="assets-headear" style="padding:10px; color:black;" valign="bottom"> <span style="font-size:14px; padding-left:5px;"><span style="font-weight:bold;"><i>Search Result </i></span><?php echo count($serch_result) ?> record(s) matching [<?php echo $cari_apa ?>] in the Complaint Number.</span></td>
			</tr>
			<tr>
				<td class="ui-color-contents-style-1">
					<div class="ui-left_web">
				<table class="ui-content-middle-menu-workorder5" width="100%" height="25px" style="text-align:center;">
					<tr class="ui-header-new" style="color:white; font-weight:bold;">
						<th>No</th>
						<th>Complaint Number</th>
						<th>Priority</th>
						<th>Status</th>
						<th>Date</th>
						<th>Source</th>
						<th>Asset Number</th>
						<th>Summary</th>
					</tr>
					<?php  if (!empty($serch_result)) {?> 
					<?php $numrow = 1; foreach($serch_result as $row):?> 
    				<tr class="" style="color:black;">
							<td><?= $numrow ?></td>
							<td><b><?= isset($row->v_ComplaintNo) == TRUE ? anchor ('contentcontroller/desk_complaint',''.$row->v_ComplaintNo.'' ) : 'N/A'?></b></td>
							<td><?= isset($row->v_Priority) == TRUE ? $row->v_Priority : 'N/A'?></td>
							<td><?= isset($row->v_ComplaintStatus) == TRUE ? $row->v_ComplaintStatus : 'N/A'?></td>
							<td><?= isset($row->d_Complaintdt) == TRUE ? d_Complaintdt : 'N/A'?></td>
							<td><?= isset($row->v_Source) == TRUE ? $row->v_Source : 'N/A'?></td>
							<td><?= isset($row->V_AssetNo) == TRUE ? $row->V_AssetNo : 'N/A'?></td>
							<td><?= isset($row->v_Complaint) == TRUE ? $row->v_Complaint : 'N/A'?></td>
							</tr>
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
    					<td colspan="8"><span style="color:red;">NO COMPLAINT FOUND.</span></td>
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
							<td >Complaint Number</td>
							<td class="td-desk">: <?= isset($row->v_ComplaintNo) == TRUE ? anchor ('contentcontroller/desk_complaint',''.$row->v_ComplaintNo.'' ) : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Priority</td>
							<td class="td-desk">: <?= isset($row->v_Priority) == TRUE ? $row->v_Priority : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Status</td>
							<td class="td-desk">: <?= isset($row->v_ComplaintStatus) == TRUE ? $row->v_ComplaintStatus : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Date</td>
							<td class="td-desk">: <?= isset($row->d_Complaintdt) == TRUE ? d_Complaintdt : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Source</td>
							<td class="td-desk">: <?= isset($row->v_Source) == TRUE ? $row->v_Source : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Asset Number</td>
							<td class="td-desk">: <?= isset($row->V_AssetNo) == TRUE ? $row->V_AssetNo : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Summary</td>
							<td class="td-desk">: <?= isset($row->v_Complaint) == TRUE ? $row->v_Complaint : 'N/A'?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO COMPLAINT FOUND.</td>
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
