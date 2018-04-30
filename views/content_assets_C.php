<div class="ui-middle-screen">
	<?php include 'content_tab_assets.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<?php include 'content_tab_asset_menu.php';?>
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="11" class="td-assest_C"><b>Non-PPMAssets</b> <i>These assets has not been registered for PPM works in the current year.</i></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" align="center" class="pd-bttm">	
					<table class="tftabledetail2 ui-left_web" border="0" style="text-align:center; color:black;">
						
						<tr>	
							<th>&nbsp;</th>
							<th>Asset&nbsp;Number</th>
							<th>Asset&nbsp;Name</th>
							<th>Register<br>Date</th>
							<th>Criticality&nbsp;</th>
							<th>Condition&nbsp;</th>
							<th>Variation&nbsp;</th>
							<th>Status&nbsp;</th>
							<th>Warranty<br>End</th>
							<th>PPM<br>2016</th>
						</tr>
						<?php  if (!empty($non_ppm)) {?>
						<?php $numrow = 1; foreach($non_ppm as $row):?>
	    				<tr align="center" <?= ($numrow%2==0) ?  'class="tr_color"' :  '' ?>>
	    					<td><?=$numrow?></td>
	    					<td><?= anchor('contentcontroller/assetupdate?asstno='.$row->V_Asset_no.'&tab=0&parent=assets', ($row->V_Tag_no) ? $row->V_Tag_no : 'N/A','style="font-size:14px;font-weight:bold;"')?></td>
	    					<td width="200px"><?=$row->V_Asset_name?></td>
	    					<td><?=date('d-m-Y',strtotime($row->D_Register_date))?></td>
	    					<td><?=$row->v_Criticality?></td>
	    					<td><?=$row->v_AssetCondition?></td>
		        			<td><?=$row->v_AssetVStatus?></td>
		        			<td><?=$row->v_AssetStatus?></td>
		        			<td><?=date('d-m-Y',strtotime($row->v_wrn_end_code))?></td>
		        			<td><span style=""color:#FF0000;"">No</span></td>
	        			</tr>
						<?php $numrow++; ?>   			 
    		<?php endforeach;?>
			<?php }else { ?>
								<tr align="center" style="height:300px;">
								<td colspan="11" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:14px;">NO Non-PPM Assets FOUND FOR THIS ASSETS</span></td>
							</tr>
							<?php } ?>
					</table>
					<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;">
						<?php  if (!empty($non_ppm)) {?>
							<?php $numrow = 1; foreach($non_ppm as $row):?>   			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >Asset&nbsp;Number</td>
							<td class="td-desk">: <?= isset($row->V_Asset_no) ? anchor ('contentcontroller/assetupdate?asstno='.$row->V_Asset_no,''.$row->V_Asset_no.'' ) : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Tag&nbsp;Number</td>
							<td class="td-desk">: <?= isset($row->V_Tag_no) ? $row->V_Tag_no : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Asset&nbsp;Name</td>
							<td class="td-desk">: <?= isset($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Register Date</td>
							<td class="td-desk">: <?=date('d-m-Y',strtotime($row->D_Register_date))?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Criticality&nbsp;</td>
							<td class="td-desk">: <?= isset($row->v_Criticality) ? $row->v_Criticality : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Condition&nbsp;</td>
							<td class="td-desk">: <?= isset($row->v_AssetCondition) ? $row->v_AssetCondition : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Variation&nbsp;</td>
							<td class="td-desk">: <?= isset($row->v_AssetVStatus) ? $row->v_AssetVStatus : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Status&nbsp;</td>
							<td class="td-desk">: <?= isset($row->v_AssetStatus) ? $row->v_AssetStatus : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Warranty End</td>
							<td class="td-desk">: <?=date('d-m-Y',strtotime($row->v_wrn_end_code))?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >PPM 2016</td>
							<td class="td-desk">: <?= isset($row->V_Tag_no) ? '<span style=""color:#FF0000;"">No</span>' : '<span style=""color:#FF0000;"">No</span>' ?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:14px;">NO COMPLAINTS FOUND FOR THIS ASSETS</span></td>
							</tr>
							<?php } ?>
					</table>
				</td>
			</tr>		
		</table>
	</div>		
</div>