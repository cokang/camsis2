<?php include 'content_logcards.php';?> 
						<tr>
							<td colspan="6" style="background:white;">
								<table class="ui-content-middle-menu-workorder ui-left_web" width="100%" border="0">
									<tr><td colspan="9" class="ui-bottom-border-color" style="font-weight: bold; background:white; color:black;">AssetLogCard - Location History </td></tr>     			
								<?php  if (!empty($c_list)) {?>
									<tr class="ui-menu-color-header" style="color:white; font-size:14px;" align="center">
										<td colspan="" style="padding-top:3px; padding-bottom:3px;">Date</td>
										<td >Variation</td>
										<td >Location</td>
									</tr>
									<?php $kirerow = 1; foreach($c_list as $row):?>
				    				<tr <?=($kirerow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?> style="color:black; text-align:center;">
				    					<td><?= isset($row->v_Complaint) == TRUE ? $row->v_Complaint : 'N/A'?></td>
				    					<td><?= isset($row->v_RequestNo) == TRUE ? $row->v_RequestNo : 'N/A'?></td>
				    					<td><?= isset($row->v_ComplaintDesc) == TRUE ? $row->v_ComplaintDesc : 'N/A'?></td>
				        			</tr>   			 
			    					<?php endforeach;?>
										<?php }else { ?>
										<tr align="center" style="background:white; height:200px;">
					    					<td colspan="7"><span style="color:red;">NO PREVIOUS ASSET MOVEMENT FOUND FOR THIS ASSET. <br /> <span style="font-size:14px;">Click here to relocate this asset to a new location.</span></span></td>
					    				</tr>
										<?php } ?>
								</table>
								<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;">
									<?php  if (!empty($ppm_list)) {?>
									<?php $rownum = 1; foreach($ppm_list as $row):?>   			
					    			<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >No</td>
										<td class="td-desk">: <?=$rownum?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>	
										<td >Date</td>
										<td class="td-desk">: <?= isset($row->d_DateDone) == TRUE ? $row->d_DateDone : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Variation</td>
										<td class="td-desk">: <?= isset($row->v_Wrkordno) == TRUE ? $row->v_Wrkordno : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Location</td>
										<td class="td-desk">: <?= isset($row->v_jobTypecode) == TRUE ? $row->v_jobTypecode : 'N/A'?></td>
									</tr>
					        		<?php $rownum++?> 			 
										<?php endforeach;?>
										<?php }else { ?>
											<tr align="center" style="height:400px;">
											<td colspan="2" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:12px;">NO PREVIOUS ASSET MOVEMENT FOUND FOR THIS ASSET. <br /> <span style="font-size:14px;">Click here to relocate this asset to a new location.</span></span></td>
										</tr>
										<?php } ?>
								</table>
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