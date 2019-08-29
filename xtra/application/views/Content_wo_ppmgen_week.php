<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
	<div class="div-p">&nbsp;</div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="98%">	
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?wk=<?php echo $year['thewk']; ?>&y=<?php echo $year['byear']; ?>&d=1&m=1&act="><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<a href="?wk=<?php echo $year['bwk']; ?>&y=<?php echo $year['thebyear']; ?>&d=1&m=1&act="><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="88%" align="center"><?= $y?> PPM WEEK <?= $wk?> <!--(09 FEB 2015 -15 FEB 2015) -->
							</td>
							<td width="3%">
							<a href="?wk=<?php echo $year['fwk']; ?>&y=<?php echo $year['thefyear']; ?>&d=1&m=1&act="><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<a href="?wk=<?php echo $year['thewk']; ?>&y=<?php echo $year['fyear']; ?>&d=1&m=1&act="><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" style="" valign="top" >
				<div class="ui-left_web">
					<table class="ui-content-middle-menu-workorder2" width="100%">
						<tr class="ui-menu-color-header" style="color:white;">
							<th >&nbsp;</th>
							<th >Asset Number</th>
							<th >Description</th>
							<th >Frequency</th>
							<th >User Department</th>
							<th >Location</th>
							<th >Generated Work Order</th>
						</tr>	
					<?php  if (!empty($ppm_list[0])) {?> 
					<?php $numrow = 1; foreach($ppm_list as $row):?>
	    				<tr align="center">
	    					<td class="td-desk"><?= $numrow ?></td>
	    					<?php if ($this->input->get('act') == ''){ ?>
	    					<td class="td-desk"><?= ($row['v_Asset_noe']) ? anchor ('contentcontroller/assetupdate?asstno='.$row['assetno'].'&tab=0&parent=assets',''.$row['v_Asset_noe'].'' ) : 'N/A'?></td>
	    					<?php } else { ?>
	    					<td class="td-desk"><?= ($row['v_Asset_noe']) ? anchor ('contentcontroller/assetupdate?asstno='.$row['v_Asset_noe'].'&tab=0&parent=assets',''.$row['v_Asset_noe'].'' ) : 'N/A'?></td>
	    					<?php } ?>
	    					
	    					<td class="td-desk"><?= ($row['v_asset_name']) ? $row['v_asset_name'] : 'N/A'?></td>
	    					<td class="td-desk"><?= ($row['v_JobType']) ? $row['v_JobType'] : 'N/A'?></td>
	    					<td class="td-desk"><?= ($row['v_user_dept_code']) ? $row['v_user_dept_code'] : 'N/A'?></td>
	    					<td class="td-desk"><?= ($row['v_location_code']) ? $row['v_location_code'] : 'N/A'?></td>
	    					<td class="td-desk"><?=($row['wo'] <> "Not Generated") ? anchor ('contentcontroller/wo?wrk_ord='.$row['wo'], $row['wo'] ) : '<a href="ppm_genstd_ctrl?wk='.$this->input->get('wk').'&y='.$this->input->get('y').'&d='.$this->input->get('d').'&m='.$this->input->get('m').'&assetno='.$row['assetno'].'&jobtype='.$row['v_JobType'].'&act=gena" class="btn-button btn-primary-button">GENERATE</a>'?></td>
	        			</tr> 
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php }else { ?>
						<tr align="center" style="height:200px;">
							<td colspan="10" class="default-NO">NO PPM FOUND FOR</td>
						</tr>
					<?php } ?>
					</table>
				</div>
				<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php  if (!empty($records_desk)) {?>
							<?php $numrow = 1; foreach($records_desk as $row):?>   			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >Complaint Number</td>
							<td class="td-desk">: <?= isset($row->v_ComplaintNo) ? anchor ('contentcontroller/desk_complaint?cmplnt_no='.$row->v_ComplaintNo,''.$row->v_ComplaintNo.'' ) : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Source</td>
							<td class="td-desk">: <?= isset($row->v_Source) ? $row->v_Source : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Priority</td>
							<td class="td-desk">: <?= isset($row->v_Priority) ? $row->v_Priority : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Status</td>
							<td class="td-desk">: <?= isset($row->v_ComplaintStatus) ? $row->v_ComplaintStatus : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Complaint Date</td>
							<td class="td-desk">: <?= isset($row->d_ComplaintDt) ? $row->d_ComplaintDt : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Closed Date</td>
							<td class="td-desk">: <?= isset($row->d_CompleteDt) ? $row->d_CompleteDt : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Asset Number</td>
							<td class="td-desk">: <?= isset($row->V_AssetNo) ? $row->V_AssetNo : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Department</td>
							<td class="td-desk">: <?= isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Location</td>
							<td class="td-desk">: <?= isset($row->v_Location) ? $row->v_Location : 'N/A' ?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO <?= $tulis ?> COMPLAINTS FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
							<?php } ?>
					</table>
				</div>
				</td>
			</tr>
		</table>
	</div>
</div>	