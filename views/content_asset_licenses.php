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
							<b><span class="textmenu" style="float:left;">Licenses</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetlicenses_update', '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" data-table="assetlicenses" width="100%" border="0">
								<tr>	
									<tr>	
										<th >Certificate Number</th>
										<th >Registration Number</th>
										<th >License Category</th>
										<th >Identification</th>
										<th >Start Date</th>
										<th >Expiry Date</th>
										<th >Grade</th>
										<th >Remarks</th>
									</tr>
								<?php  if (!empty($lic)) {?> 
								<?php $numrow = 1; foreach($lic as $row):?>
									<tr align="center" <?= ($numrow%2==0) ?  'class="tr_color"' :  '' ?> >
									<td data-title="Certificate :"><?php echo anchor ('contentcontroller/assetlicenses_detail?liccd='.$row->id,''.isset($row->v_LicenseCategoryCode) == TRUE ? $row->v_LicenseCategoryCode : 'N/A'.'' ) ?></td>
									<td data-title="Registration :"><?=isset($row->v_RegistrationNo) == TRUE ? $row->v_RegistrationNo : 'N/A'?></td>
									<td data-title="License :"><?=isset($row->v_LicenseCategoryCode) == TRUE ? $row->v_LicenseCategoryCode : 'N/A'?></td>
									<td data-title="Identification :"><?=isset($row->v_Identification) == TRUE ? $row->v_Identification : 'N/A'?></td>
									<td data-title="Start Date :"><?=isset($row->v_StartDate) == TRUE ? date("d/m/Y",strtotime($row->v_StartDate)) : 'N/A'?></td>
									<td data-title="Expiry Date :"><?=isset($row->v_ExpiryDate) == TRUE ? date("d/m/Y",strtotime($row->v_ExpiryDate)) : 'N/A'?></td>
									<td data-title="Grade :"><?=isset($row->v_GradeID) == TRUE ? $row->v_GradeID : 'N/A'?></td>
									<td data-title="Remarks :"><?=isset($row->v_Remarks) == TRUE ? $row->v_Remarks : 'N/A'?></td>
								</tr> 
								<?php $numrow++; ?> 			 
								<?php endforeach;?>  
									<?php }else { ?>
									<tr align="center" style="background:white; height:200px;">
									<td colspan="8" class="default-NO"><span style="color:red;">NO LICENSE FOUND FOR THIS ASSET.</span></td>
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
