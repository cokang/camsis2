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
							<b><span class="textmenu" style="float:left;">Asset Statutory</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetstatutory_update?assetno='.$assetno, '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" width="100%" border="0">
								<tr>	
									<th>No</td>
									<th>Certificate<br/>Number</th>
									<th>Registration<br/>Number</th>
									<th>Authority</th>
									<th>Start Date</th>
									<th>Expiry Date</th>
									<th>Remarks</th>
								</tr>
								<?php  if ((!empty($asset_sta)) OR (!empty($lic))) {?>
								<?php $rownum = 1; foreach($asset_sta as $row):?>  			
								<tr align="center" <?= ($rownum%2==0) ?  'class="tr_color"' :  '' ?> >
									<td data-title="No :"><?= $rownum++; ?></td>
									<td data-title="Certificate :"><?php echo anchor ('contentcontroller/assetstatutory_update?assetno='.$assetno.'&certno='.$row->v_cert_no.'&id='.$row->ID, isset($row->v_cert_no) == TRUE ? $row->v_cert_no : 'N/A') ?></td>
									<td data-title="Registration :"><?= isset($row->v_regno) == TRUE ? $row->v_regno : 'N/A'?></td>
									<td data-title="Authority :"><?= isset($row->v_authority) == TRUE ? $row->v_authority : 'N/A'?></td>
									<td data-title="Start Date :"><?= isset($row->D_start) == TRUE ? date("d/m/Y",strtotime($row->D_start)) : 'N/A'?></td>
									<td data-title="Expiry Date :"><?= isset($row->D_end) == TRUE ? date("d/m/Y",strtotime($row->D_end)) : 'N/A'?></td>
									<td data-title="Remarks :"><?= isset($row->v_Remarks) == TRUE ? $row->v_Remarks : 'N/A'?></td>
								</tr> 			 
								<?php endforeach;?>
								<?php foreach($lic as $list):?>  			
								<tr align="center" <?= ($rownum%2==0) ?  'class="tr_color"' :  '' ?> >
									<td data-title="No :"><?= $rownum++; ?></td>
									<td data-title="Certificate :"><?php echo anchor ('contentcontroller/assetlicenses_detail?liccd='.$list->id,''.isset($list->v_CertificateNo) == TRUE ? $list->v_CertificateNo : 'N/A'.'' ) ?></td>
									<td data-title="Registration :"><?= isset($list->v_RegistrationNo) == TRUE ? $list->v_RegistrationNo : 'N/A'?></td>
									<td data-title="Authority :"><?= isset($list->v_authority) == TRUE ? $list->v_authority : 'N/A'?></td>
									<td data-title="Start Date :"><?= isset($list->v_StartDate) == TRUE ? date("d/m/Y",strtotime($list->v_StartDate)) : 'N/A'?></td>
									<td data-title="Expiry Date :"><?= isset($list->v_ExpiryDate) == TRUE ? date("d/m/Y",strtotime($list->v_ExpiryDate)) : 'N/A'?></td>
									<td data-title="Remarks :"><?= isset($list->v_Remarks) == TRUE ? $list->v_Remarks : 'N/A'?></td>
								</tr> 			 
								<?php endforeach;?>  
									<?php }else { ?>
									<tr align="center" style="background:white; height:200px;">
									<td colspan="10"><span style="color:red;">NO STATUTORY DETAILS FOUND FOR THIS ASSET.</span></td>
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
