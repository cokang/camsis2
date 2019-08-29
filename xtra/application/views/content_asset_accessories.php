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
							<b><span class="textmenu" style="float:left;">Accessories</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/Accessories_update?assetno='.$assetno, '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" data-table="assetaccessories" width="100%" border="0">
								<tr>	
									<th>Accessory Code</th>
									<th>Description</th>
								</tr>
								<?php  if (!empty($acces_list)) {?> 
								<?php $numrow = 1; foreach($acces_list as $row):?>     			
									<tr align="center" <?= ($numrow%2==0) ?  'class="tr_color"' :  '' ?> >
										<td  data-title="Accessory Code :"><?= isset($row->v_accesoriescode) == TRUE ? anchor ('contentcontroller/Accessories_update?assetno='.$assetno.'&accescd='.$row->v_accesoriescode.'&accesnm='.$row->v_description, $row->v_accesoriescode) : 'N/A'?></td>
										<td  data-title="Description :"><?= isset($row->v_description) == TRUE ? $row->v_description : 'N/A'?></td>
									</tr> 
									<?php $numrow++; ?> 			 
									<?php endforeach;?>  
										<?php }else { ?>
										<tr align="center" style="background:white; height:200px;">
										<td colspan="2" class="default-NO"><span style="color:red;">NO ACCESSORIES FOUND FOR THIS ASSET.</span></td>
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
