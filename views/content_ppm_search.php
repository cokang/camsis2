<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" style="padding-bottom:10px;">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color assets-headear" colspan="3" style="padding-left:10px; color:white;"><b>Search Result PPM </td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="assets-headear" style="padding:10px; color:black;" valign="bottom"> <span style="font-size:14px; padding-left:5px;"><span style="font-weight:bold;"><i>Search Result </i></span><?php echo count($serch_result) ?> PPM records matching the search criteria.</span></span></td>
			</tr>
			<tr>
				<td class="ui-color-contents-style-1">
					<div class="ui-left_web">
				<table class="ui-content-middle-menu-workorder5" width="100%" height="25px" style="text-align:center; font-size:10px;">
					<tr class="ui-header-new" style="color:white; font-weight:bold;">
						<th>No</th>
						<th>PPM</th>
						<th>Status</th>
						<th>Asset Number</th>
						<th>QAP</th>
						<th>Due Date</th>
						<th>Reschedule Date</th>
						<th>Dept</th>
					</tr>
					<?php  if (!empty($serch_result)) {?> 
					<?php $numrow = 1; foreach($serch_result as $row):?> 
					<tr class="" style="color:black; font-size:12px; ">
						<td><?= $numrow ?></td>
						<td><b><?php echo anchor ('contentcontroller/wo?wrk_ord='.$row->v_WrkOrdNo. '&vppm=0',''.$row->v_WrkOrdNo.'' ) ?></b></td>
						<td><?= isset($row->v_Wrkordstatus) == TRUE ? $row->v_Wrkordstatus : 'N/A'?></td>
						<td><?= isset($row->V_Tag_no) == TRUE ? $row->V_Tag_no : 'N/A'?></td>
						<td><?= isset($row->V_request_type) == TRUE ? anchor ('contentcontroller/Accessories_update?assetno='.$row->V_request_type.'&accescd='.$row->V_request_type.'&accesnm='.$row->V_request_type, $row->V_request_type) : 'N/A'?></td>
						<td><?= ($row->d_DueDt) ?  date("d/m/Y",strtotime($row->d_DueDt)) : 'N/A' ?></td>
						<td><?= ($row->d_Reschdt) ?  date("d/m/Y",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
						<td><?= isset($row->V_User_Dept_code) == TRUE ? $row->V_User_Dept_code : 'N/A'?></td>
					</tr>
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
    					<td colspan="8"><span style="color:red;">NO PPM FOUND</span></td>
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
							<td>PPM</td>
							<td class="td-desk">: <?php echo anchor ('contentcontroller/Wo?wrk_ord='.$row->v_WrkOrdNo. '&vppm=0',''.$row->v_WrkOrdNo.'' ) ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Status</td>
							<td class="td-desk">: <?= isset($row->v_Wrkordstatus) == TRUE ? $row->v_Wrkordstatus : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Asset Number</td>
							<td class="td-desk">: <?= isset($row->V_Asset_no) == TRUE ? $row->V_Asset_no : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>QAP</td>
							<td class="td-desk">: <?= isset($row->V_request_type) == TRUE ? anchor ('contentcontroller/Accessories_update?assetno='.$row->V_request_type.'&accescd='.$row->V_request_type.'&accesnm='.$row->V_request_type, $row->V_request_type) : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Due Date</td>
							<td class="td-desk">: <?= isset($row->d_DueDt) == TRUE ? $row->d_DueDt : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Reschedule Date</td>
							<td class="td-desk">: <?= isset($row->d_Reschdt) == TRUE ? $row->d_Reschdt : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Dept</td>
							<td class="td-desk">: <?= isset($row->V_User_Dept_code) == TRUE ? $row->V_User_Dept_code : 'N/A'?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO PPM FOUND</td>
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
