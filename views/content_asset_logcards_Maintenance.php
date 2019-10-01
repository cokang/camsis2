<?php
if ($this->input->get('ex') == 'excel'){
	$filename = "log_cards_" .date('F', mktime(0, 0, 0,  date("m"), 10)) . date("y").".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php 
if ($this->input->get('ex') != 'excel') {
include 'content_logcards.php';
}
?> 
						<tr>
							<td colspan="6" style="background:white;">
								<table class="ui-content-middle-menu-workorder ui-left_web" width="100%" border="0">
									<tr><td colspan="9" class="ui-bottom-border-color" style="font-weight: bold; background:white; color:black;">Scheduled Maintenance</td></tr>     			
				    				<tr class="ui-menu-color-header" style="color:white; font-size:14px;" align="center">
										<td colspan="" width="5%" style="padding-top:3px; padding-bottom:3px;">No</td>
										<td>Date</td>
										<td>Work Order Number & Last Visit Remark</td>
										<td>Type Code</td>
										<td>Closed Date</td>
										<td>Failure</td>
										<td>Down Time</td>
										<td>Service Time</td>
										<td>Maintenance Cost</td>
									</tr>
									<?php  if (!empty($ppm_list)) {?>
									<?php $kirerow = 1; foreach($ppm_list as $row):?>      			
				    				<tr <?=($kirerow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?> style="color:black; text-align:center;">
				    					<td><?= $kirerow++; ?></td>
				    					<td><?= isset($row->d_StartDt) == TRUE ? date("d-m-Y",strtotime($row->d_StartDt)) : 'N/A'?></td>
				    					<td><?= isset($row->v_Wrkordno) == TRUE ? $row->v_Wrkordno.'<br>'.$row->v_summary : 'N/A'?></td>
				    					<td><?= isset($row->v_jobTypecode) == TRUE ? $row->v_jobTypecode : 'N/A'?></td>
				    					<td><?= isset($row->v_closeddate) == TRUE ? date("d-m-Y",strtotime($row->v_closeddate)) : 'N/A'?></td>
				    					<td><?= isset($row->v_FailureCode) == TRUE ? $row->v_FailureCode : 'N/A'?></td>
				    					<td><?= isset($row->n_Downtime) == TRUE ? $row->n_Downtime : 'N/A'?></td>
				    					<td><?= isset($row->n_Servicetime) == TRUE ? $row->n_Servicetime : 'N/A'?></td>
				    					<?php if ($ppm_list_cost) { ?>
				    					<?php foreach ($ppm_list_cost as $ppmlist): ?>
				    					<?php if ($row->v_Wrkordno == $ppmlist->v_wrkordno){ ?>
										<td><?= isset($ppmlist->totallabor) || isset($ppmlist->totalpartl) ? number_format($ppmlist->totallabor + $ppmlist->totalpartl,2) : 0.00?></td>
										<?php } ?>
										<?php endforeach; ?>
										<?php } else { ?>
										<td>'N/A'</td>
										<?php } ?>
										<!--<?php if (array_key_exists($row->v_Wrkordno, $ppm_list_cost)) { ?>
								        <td><?= isset($ppm_list_cost[$row->v_Wrkordno]) == TRUE ? $ppm_list_cost[$row->v_Wrkordno] : 'N/A'?></td>
								   		<?php } else { ?>
								        <td>'N/A'</td>
								   		<?php } ?>-->
				        			</tr>   			 
			    					<?php endforeach;?>
										<?php }else { ?>
									<tr align="center" style="background:white; height:200px;">
				    					<td colspan="9"><span style="color:red;">NO PPM WORKS HISTORY FOUND.</span></td>
				    				</tr>
										<?php } ?>	 
								</table>
								<?php 
if ($this->input->get('ex') != 'excel') { ?>
								<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;">
									<?php  if (!empty($ppm_list)) {?>
									<?php $rownum = 1; foreach($ppm_list as $row):?>   			
					    			<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >No</td>
										<td class="td-desk">: <?=$rownum?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>	
										<td >Date</td>
										<td class="td-desk">: <?= isset($row->d_StartDt) == TRUE ? date("d-m-Y",strtotime($row->d_StartDt)) : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Work Order Number & Last Visit Remark</td>
										<td class="td-desk">: <?= isset($row->v_Wrkordno) == TRUE ? $row->v_Wrkordno : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Type Code</td>
										<td class="td-desk">: <?= isset($row->v_jobTypecode) == TRUE ? $row->v_jobTypecode : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td>Closed Date</td>
										<td class="td-desk">: <?= isset($row->v_closeddate) == TRUE ? date("d-m-Y",strtotime($row->v_closeddate)) : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td>Failure</td>
										<td class="td-desk">: <?= isset($row->v_FailureCode) == TRUE ? $row->v_FailureCode : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Down Time</td>
										<td class="td-desk">: <?= isset($row->n_Downtime) == TRUE ? $row->n_Downtime : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Service Time</td>
										<td class="td-desk">: <?= isset($row->n_Servicetime) == TRUE ? $row->n_Servicetime : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Maintenance Cost</td>
										<?php if ($ppm_list_cost) { ?>
				    					<?php foreach ($ppm_list_cost as $ppmlist): ?>
				    					<?php if ($row->v_Wrkordno == $ppmlist->v_wrkordno){ ?>
										<td class="td-desk"><?= isset($ppmlist->totallabor) || isset($ppmlist->totalpartl) ? number_format($ppmlist->totallabor + $ppmlist->totalpartl,2) : 0.00?></td>
										<?php } ?>
										<?php endforeach; ?>
										<?php } else { ?>
										<td class="td-desk">'N/A'</td>
										<?php } ?>
										<!--<?php if (array_key_exists($row->v_Wrkordno, $ppm_list_cost)) { ?>
										<td class="td-desk">: <?= isset($ppm_list_cost[$row->v_Wrkordno]) == TRUE ? $ppm_list_cost[$row->v_Wrkordno] : 'N/A'?></td>
										<?php } else { ?>
											<td class="td-desk">'N/A'</td>
								   			<?php } ?>-->
									</tr>
					        		<?php $rownum++?> 			 
										<?php endforeach;?>
										<?php }else { ?>
											<tr align="center" style="height:400px;">
											<td colspan="2" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:14px;">NO PPM WORKS HISTORY FOUND.</span></td>
										</tr>
										<?php } ?>
								</table>
<?php } ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>