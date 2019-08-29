<?php echo form_open('contentcontroller/workorderlist_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_stock_d.php';?>
			<tr class="ui-color-contents-style-1 ui-left_web">
				<td colspan="11" height="40px" style="padding-left:10px; color:black;">Stock Details</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="11" valign="top" class="pd-bttm">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">General Information</span><span class="ui-left_web" style="float: left; margin-top:8px; margin-left:8px; font-weight: bold; width: 20%;"></span></td>
						</tr>
						
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">	
									<tr>
										<td class="td-assest">Model&nbsp;:&nbsp;</td>
										<td><b><?= isset($itemd[0]->Model) == TRUE ? $itemd[0]->Model : 'N/A'?></b></a></td>
									</tr>
									<tr>
										<td class="td-assest">Brand&nbsp;:&nbsp;</td>
										<td><span style="color:green;"><?= isset($itemd[0]->Brand) == TRUE ? $itemd[0]->Brand : 'N/A'?></span></td>
									</tr>
									<tr>
										<td class="td-assest">Item Name&nbsp;:&nbsp;</td>
										<td><span><?= isset($itemd[0]->ItemName) == TRUE ? $itemd[0]->ItemName : 'N/A'?></span></td>
									</tr>
									<!---<tr>
										<td class="td-assest">Part Number&nbsp;:&nbsp;</td>
										<td><span><?= isset($itemd[0]->PartNumber) == TRUE ? $itemd[0]->PartNumber : 'N/A'?></span></td>
									</tr>--->
									<tr>
										<td class="td-assest">Part Description&nbsp;:&nbsp;</td>
										<td><span><?= isset($itemd[0]->PartDescription) == TRUE ? $itemd[0]->PartDescription : 'N/A'?></span></td>
									</tr>
                                     <tr>
										<td class="td-assest">Unit Price&nbsp;:&nbsp;</td>
										<td><span><?= isset($itemd[0]->UnitPrice) == TRUE ? $itemd[0]->UnitPrice : 'N/A'?></span></td>
									</tr>	
                                    <!--- <tr>
										<td class="td-assest">Equip Category&nbsp;:&nbsp;</td>
										<td><span><?= isset($itemd[0]->EquipCat) == TRUE ? $itemd[0]->EquipCat : 'N/A'?></span></td>
									</tr>-->
                                     <tr>
										<td class="td-assest">Vendor Name&nbsp;:&nbsp;</td>
										<td><span><?= isset($itemd[0]->VENDOR_NAME) == TRUE ? $itemd[0]->VENDOR_NAME : 'N/A'?></span></td>
									</tr>									
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>
<?php echo form_close(); ?>