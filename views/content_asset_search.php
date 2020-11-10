<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" style="padding-bottom:10px;">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color assets-headear" colspan="3" style="padding-left:10px; color:white;"><b>Search Result Assets </td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="assets-headear" style="padding:10px; color:black;" valign="bottom"> <span style="font-size:14px; padding-left:5px;"><span style="font-weight:bold;"><i>Search Result </i></span><?php echo count($serch_result) ?> Asset records matching the search criteria.</span></span></td>
			</tr>
			<tr>
				<td class="ui-color-contents-style-1">
					<div class="ui-left_web">
				<table class="ui-content-middle-menu-workorder5" width="100%" height="25px" style="text-align:center; font-size:10px;">
					<tr class="ui-header-new" style="color:white; font-weight:bold;">
						<th>No</th>
						<th>Tag No</th>
						<th>Asset Name</th>
						<th>User<br />Department</th>
						<th>Location</th>
						<th>Criticality</th>
						<th>Condition</th>
						<th>Status</th>
						<th>Model</th>
						<th>Manufacturer</th>
						<th>Serial No</th>
						<th>Purchase <br />Cost</th>
					</tr>
					<?php  if (!empty($serch_result)) {?> 
					<?php $numrow = 1; foreach($serch_result as $row):?> 
	    				<tr class="" style="color:black; font-size:12px; ">
								<td><?= $numrow ?></td>
								<td><b><?= isset($row->V_Asset_no) == TRUE ? anchor ('contentcontroller/assetupdate?asstno='.$row->V_Asset_no.'&tab=0&parent=assets', $row->V_Tag_no) : 'N/A'?></b></td>
								<td><?= isset($row->V_Asset_name) == TRUE ? $row->V_Asset_name : 'N/A'?></td>
								<td><?= isset($row->V_User_Dept_code) == TRUE ? $row->V_User_Dept_code : 'N/A'?></td>
								<td><?= isset($row->V_Location_code) == TRUE ? $row->V_Location_code : 'N/A'?></td>
								<td><?= isset($row->V_Criticality) == TRUE ? $row->V_Criticality : 'N/A'?></td>
								<td><?= isset($row->V_AssetCondition) == TRUE ? $row->V_AssetCondition : 'N/A'?></td>
								<td><?= isset($row->v_AssetStatus) == TRUE ? $row->v_AssetStatus : 'N/A'?></td>
								<td><?= isset($row->V_Model_no) == TRUE ? $row->V_Model_no : 'N/A'?></td>
								<td><?= isset($row->V_Manufacturer) == TRUE ? $row->V_Manufacturer : 'N/A'?></td>
								<td><?= isset($row->V_Serial_no) == TRUE ? $row->V_Serial_no : 'N/A'?></td>
								<td><?= isset($row->N_Cost) == TRUE ? 'RM '.$row->N_Cost : 'N/A'?></td>
								</tr>
						<?php $numrow++; ?> 			 
    					<?php endforeach;?>  
							<?php }else { ?>
							<tr align="center" style="background:white; height:200px;">
	    					<td colspan="13"><span style="color:red;">NO ASSET FOUND.</span></td>
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
							<td >Asset Number</td>
							<td class="td-desk">: <?= isset($row->V_Asset_no) == TRUE ? anchor ('contentcontroller/Accessories_update?assetno='.$row->V_Asset_no.'&accescd='.$row->V_Asset_no.'&accesnm='.$row->V_Asset_no, $row->V_Asset_no) : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Tag No</td>
							<td class="td-desk">: <?= isset($row->V_Tag_no) == TRUE ? $row->V_Tag_no : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Asset Name</td>
							<td class="td-desk">: <?= isset($row->V_Asset_name) == TRUE ? $row->V_Asset_name : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>User Department</td>
							<td class="td-desk">: <?= isset($row->V_User_Dept_code) == TRUE ? $row->V_User_Dept_code : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Location</td>
							<td class="td-desk">: <?= isset($row->V_Location_code) == TRUE ? $row->V_Location_code : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Criticality</td>
							<td class="td-desk">: <?= isset($row->V_Criticality) == TRUE ? $row->V_Criticality : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Condition</td>
							<td class="td-desk">: <?= isset($row->V_AssetCondition) == TRUE ? $row->V_AssetCondition : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Status</td>
							<td class="td-desk">: <?= isset($row->v_AssetStatus) == TRUE ? $row->v_AssetStatus : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Model</td>
							<td class="td-desk">: <?= isset($row->V_Model_no) == TRUE ? $row->V_Model_no : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Manufacturer</td>
							<td class="td-desk">: <?= isset($row->V_Manufacturer) == TRUE ? $row->V_Manufacturer : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Serial No</td>
							<td class="td-desk">: <?= isset($row->V_Serial_no) == TRUE ? $row->V_Serial_no : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Purchase Cost</td>
							<td class="td-desk">: <?= isset($row->n_cost) == TRUE ? $row->n_cost : 'N/A'?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO ASSET FOUND</td>
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
