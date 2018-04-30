<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>			
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Work Order History</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" width="100%" border="0">
								<tr>	
									<th>Type</th>
									<th>Request Number</th>
									<th>Priority</th>
									<th>Status</th>
									<th>Date</th>
									<th>Summary</th>
								</tr>
								<?php  if (!empty($wo_list)) {?>
								<?php $rownum = 1; foreach($wo_list as $row):?>
									<tr  align="center" <?= ($rownum%2==0) ?  'class="tr_color"' :  '' ?>>
										<td data-title="Type :"><?= isset($row->V_request_type) == TRUE ? $row->V_request_type : 'N/A'?></td>
										<td data-title="Request Number :" ><a href="workorderlist?&wrk_ord=<?=$row->V_Request_no ?>" class="a-asset-link"><?= isset($row->V_Request_no) == TRUE ? $row->V_Request_no : 'N/A'?></a></td>
										<td data-title="Priority :"><?= isset($row->V_priority_code) == TRUE ? $row->V_priority_code : 'N/A'?></td>
										<td data-title="Status :"><?= isset($row->V_request_status) == TRUE ? $row->V_request_status : 'N/A'?></td>
										<td data-title="Date :"><?= isset($row->D_date) == TRUE ? date('d-m-Y',strtotime($row->D_date)) : 'N/A'?></td>
										<td data-title="Summary :"><?= isset($row->V_summary) == TRUE ? $row->V_summary : 'N/A'?></td>
									</tr>
									<?php $rownum++; ?> 			 
									<?php endforeach;?>  
										<?php }else { ?>
										<tr align="center" style="background:white; height:200px;">
										<td colspan="10"><span style="color:red;">No workorder for asset.</span></td>
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
