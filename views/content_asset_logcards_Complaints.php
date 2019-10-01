<?php include 'content_logcards.php';?> 
						<tr>
							<td colspan="6" style="background:white;">
								<table class="ui-content-middle-menu-workorder ui-left_web" width="100%" border="0">
								<tr><td colspan="7" class="ui-bottom-border-color" style="font-weight: bold; background:white; color:black;">Complaints </td></tr>   			
				    				<tr class="ui-menu-color-header" style="color:white; font-size:14px;" align="center">
										<td colspan="" width="5%" style="padding-top:3px; padding-bottom:3px;">No</td>
										<td>Status</td>
										<td>Complaint&nbsp;Number</td>
										<td>Request&nbsp;Number</td>
										<td>Date</td>
										<td>Complaint&nbsp;&amp;&nbsp;Description</td>
										<td>Requestor</td>
									</tr>    
									<?php  if (!empty($c_list)) {?>
									<?php $kirerow = 1; foreach($c_list as $row):?>      			
				    				<tr <?=($kirerow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?> style="color:black; text-align:center;">
				    					<td><?= $kirerow++; ?></td>
				    					<td><?= isset($row->d_CompleteDt) == TRUE ? 'CLOSED' : 'OPEN'?></td>
				    					<td><?= isset($row->v_ComplaintNo) == TRUE ? $row->v_ComplaintNo : 'N/A'?></td>
				    					<td><?= isset($row->v_RequestNo) == TRUE ? $row->v_RequestNo : 'N/A'?></td>
										<td><?= isset($row->d_ComplaintDt) == TRUE ? date("d-m-Y",strtotime($row->d_ComplaintDt)) : 'N/A'?></td>
				    					<td><?= isset($row->v_ComplaintDesc) == TRUE ? $row->v_ComplaintDesc : 'N/A'?></td>
				    					<td><?= isset($row->v_requestor) == TRUE ? $row->v_requestor : 'N/A'?></td>
				        			</tr>   			 
			    					<?php endforeach;?>
										<?php }else { ?>
										<tr align="center" style="background:white; height:200px;">
					    					<td colspan="7"><span style="color:red;">NO COMPLAINT RECORDS FOUND FOR THIS ASSET.</span></td>
					    				</tr>
										
										<?php } ?>	 		 			
								</table>
								<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;">
									<?php  if (!empty($c_list)) {?>
									<?php $rownum = 1; foreach($c_list as $row):?>   			
					    			<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >No</td>
										<td class="td-desk">: <?=$rownum?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>	
										<td >Status</td>
										<td class="td-desk">: <?= isset($row->d_CompleteDt) == TRUE ? 'CLOSED' : 'OPEN'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Complaint&nbsp;Number</td>
										<td class="td-desk">: <?= isset($row->v_Complaint) == TRUE ? $row->v_Complaint : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Request&nbsp;Number</td>
										<td class="td-desk">: <?= isset($row->v_RequestNo) == TRUE ? $row->v_RequestNo : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td>Date</td>
										<td class="td-desk">: <?= isset($row->v_closeddate) == TRUE ? $row->v_closeddate : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td>Complaint&nbsp;Description</td>
										<td class="td-desk">: <?= isset($row->v_ComplaintDesc) == TRUE ? $row->v_ComplaintDesc : 'N/A'?></td>
									</tr>
									<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
										<td >Requestor</td>
										<td class="td-desk">: <?= isset($row->v_requestor) == TRUE ? $row->v_requestor : 'N/A'?></td>
									</tr>
					        		<?php $rownum++?> 			 
										<?php endforeach;?>
										<?php }else { ?>
									<tr align="center" style="height:400px;">
									<td colspan="2" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:14px;">NO COMPLAINT RECORDS FOUND FOR THIS ASSET.</span></td>
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