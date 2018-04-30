<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-header-new" height="40px">
				<td class="" colspan="7">
					<span style="float: left; margin-top:8px; font-weight: bold;">Licenses and Certificates</span>
					<span style="float: right; padding-right:10px;"  onclick="javascript:myFunction('print_lac');">
						<button type="button" class="btn btn-primary-button btn-licenses">PRINT</button>
					</span>
					<span style="float: right; padding-right:10px;" ><?php echo anchor ('contentcontroller/assetlicenses_new', '<button type="button" class="btn btn-primary-button btn-licenses" style="">NEW</button>'); ?>
					</span>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td>
					<div class="ui-left_web">
					<table class="ui-content-middle-menu-workorder2" width="100%" style="margin:0px;">
						<tr style="color:white;" align="center">
							<th style="padding-top:3px; padding-bottom:3px;">No </td>
							<th>Asset Number</th>
							<th>License Category</th>
							<th>Identification</th>
							<th>Certificate Number</th>
							<th>Expiry Date</th>
							<th>Grade ID</th>
							<th>Remarks</th>
						</tr>
						<?php  if ((!empty($lic)) OR (!empty($asset_stat))) {?>
						<?php $rownum=1;  foreach($lic as $row):?>  
						<tr align="center">
							<td><?=$rownum++;?></td>
							<td><?=isset($row->v_key) ? $row->v_key : 'N/A'?></td>
							<td><?php echo anchor ('contentcontroller/assetlicenses_detail?liccd='.$row->id,''.isset($row->v_AgencyCode) == TRUE ? $row->v_AgencyCode : 'N/A'.'' ) ?></td>
							<td><?=isset($row->v_Identification) == TRUE ? $row->v_Identification : 'N/A'?></td>
							<td><?=isset($row->v_CertificateNo) == TRUE ? $row->v_CertificateNo : 'N/A'?></td>
							<?php 
							$date2 = date('Y-m-d');
							$date1 = $row->v_ExpiryDate;

							//$diff = abs(strtotime($date2) - strtotime($date1));

							//$years = floor($diff / (365*60*60*24));
							$years = (int)abs((strtotime($date1) - strtotime($date2))/(365*60*60*24));
							//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$months = (int)abs((strtotime($date1) - strtotime($date2))/(60*60*24*30));
							//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
							$days = (int)abs((strtotime($date1) - strtotime($date2))/(60*60*24));
							
							//$d1 = "2009-09-01";
							//$d2 = "2010-05-01";

							
							//echo "nilai mon : ".$months.$date2.$date1;
							 ?>
							<td><?php if ($months < 6) {?> <img src="<?php echo base_url();?>images/expires_soon.png" style="width:90px; display:block; position:relative;"> <?php } ?><?=isset($row->v_ExpiryDate) == TRUE ? date('d/m/Y',strtotime($row->v_ExpiryDate)) : 'N/A'?></td>
							<td><?=isset($row->v_GradeID) == TRUE ? $row->v_GradeID : 'N/A'?></td>
							<td><?=isset($row->v_Remarks) == TRUE ? $row->v_Remarks : 'N/A'?></td>
						</tr>
						<?php endforeach;?>
						<?php foreach($asset_stat as $list):?>  
						<tr align="center">
							<td><?=$rownum++;?></td>
							<td><?=isset($list->V_Tag_no) ? $list->V_Tag_no : 'N/A'?></td>
							<td><?php echo anchor ('contentcontroller/assetstatutory_update?assetno='.$list->v_asset_no.'&certno='.$list->v_cert_no.'&id='.$list->ID,''.isset($list->v_authority) == TRUE ? $list->v_authority : 'N/A'.'' ) ?></td></td>
							<td><?=isset($list->V_Asset_name) == TRUE || isset($list->V_Tag_no) == TRUE ? $list->V_Asset_name.' ('.$list->V_Tag_no.')' : 'N/A'?></td>
							<td><?=isset($list->v_cert_no) == TRUE ? $list->v_cert_no : 'N/A'?></td>
							<?php 
							$date2 = date('Y-m-d');
							$date1 = $list->D_end;

							//$diff = abs(strtotime($date2) - strtotime($date1));

							//$years = floor($diff / (365*60*60*24));
							$years = (int)abs((strtotime($date1) - strtotime($date2))/(365*60*60*24));
							//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$months = (int)abs((strtotime($date1) - strtotime($date2))/(60*60*24*30));
							//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
							$days = (int)abs((strtotime($date1) - strtotime($date2))/(60*60*24));
							 ?>
							<td><?php if ($months < 6) {?><img src="<?php echo base_url();?>images/expires_soon.png" style="width:90px; display:block; position:relative;"> <?php } ?><?=isset($list->D_end) == TRUE ? date('d/m/Y',strtotime($list->D_end)) : 'N/A'?></td>
							<td><?=isset($list->v_GradeID) == TRUE ? $list->v_GradeID : 'N/A'?></td>
							<td><?=isset($list->v_Remarks) == TRUE ? $list->v_Remarks : 'N/A'?></td>
						</tr>
						<?php endforeach;?>
						<?php }else { ?>
						<tr align="center" style="height:200px;">
							<td colspan="10" class="default-NO">NO Licenses and Certificates</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php  if (!empty($lic)) {?>
							<?php $numrow=1;  foreach($lic as $row):?>   			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >License Category</td>
							<td class="td-desk">: <?php echo anchor ('contentcontroller/assetlicenses_detail?liccd='.$row->id,''.isset($row->v_LicenseCategoryCode) == TRUE ? $row->v_LicenseCategoryCode : 'N/A'.'' ) ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Identification</td>
							<td class="td-desk">: <?=isset($row->v_Identification) == TRUE ? $row->v_Identification : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Certificate Number</td>
							<td class="td-desk">: <?=isset($row->v_CertificateNo) == TRUE ? $row->v_CertificateNo : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Expiry Date</td>
							<td class="td-desk">: <?=isset($row->v_ExpiryDate) == TRUE ? $row->v_ExpiryDate : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Grade ID</td>
							<td class="td-desk">: <?=isset($row->v_GradeID) == TRUE ? $row->v_GradeID : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Remarks</td>
							<td class="td-desk">: <?=isset($row->v_Remarks) == TRUE ? $row->v_Remarks : 'N/A'?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO Licenses and Certificates</td>
							</tr>
							<?php } ?>
					</table>
				</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="7">
					<span style="float: right; padding-right:10px;"  onclick="javascript:myFunction('print_lac');">
						<button type="button" class="btn-button btn-primary-button" style="width:;">PRINT</button>
					</span>
					<span style="float: right; padding-right:10px;"><?php echo anchor ('contentcontroller/assetlicenses_new', '<button type="button" class="btn-button btn-primary-button" style="width:60px;">NEW</button>'); ?></span>
				</td>
			</tr>
		</table>
	</div>
</div>