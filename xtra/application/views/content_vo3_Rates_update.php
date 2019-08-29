
<div class="ui-middle-screen">
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="98%" align="center">
			<tr>
				<td class="ui-header-new" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; height:30px; width:25%;">General</td>
				<td class="ui-header-new" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; width:25%;">Signatories</td>
				<td class="ui-header-new" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; width:25%;">Assets</td>
				<td class="ui-highlight2" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; width:25;">Rates and Fees</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="4" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td style="padding-bottom:10px; margin-top:-2px; border-bottom-left-radius:5px; border-bottom-right-radius:5px;" width="" colspan="12" valign="top" align="center">
					<?php if ($this->input->get('act') == 'sv' OR $this->input->get('act') == '') { ?>
					<?php echo form_open('contentcontroller/vo3_Rates_update?rpt_no='.$this->input->get('rpt_no').'&act=ver') ?>
					<table class="ui-desk-style-table2" style="border:2px solid #398074; color:black; background:white;" cellpadding="4" cellspacing="0" width="98%">	
						<tr class="ui-color-contents-style-1" >
							<td class="ui-header-new" colspan="14" valign="" height="43px"><span style="float: left; margin-top:8px; font-weight: bold;">VVFBEM/AGJ/P114/2014 - Rates and Fees</span></td>
						</tr>       			
	    				<tr class="ui-menu-color-header" style="color:white; font-size:12px; font-weight:;" align="center">
							<td width="2%" style="padding-top:3px; padding-bottom:3px;">&nbsp;</td>
							<td width="5%">SNF/VNF </td>
							<td width="5%">Description </td>
							<td width="3%">Equipment Code</td>
							<td width="5%">Asset Number </td>
							<td width="8%"> Purchase Value (RM) </td>
							<td width="5%"> Status </td>
							<td width="5%"> Proposed Rate DW (% pa) </td>
							<td width="5%">Proposed Rate PW (% pa)</td>
						</tr>
						<?php $rowno = 0; foreach($records as $row):?>  
						<tr align="center" <?=($rowno % 2) == 1 ? '' : 'class="ui-color-color-color"'?> >
							<td style=""><?=$rowno = $rowno + 1;?></td>
							<td style=""><?=is_null($row->vvfRefNo) || strlen($row->vvfRefNo) == 0 ? "<span style=color:red;>".'???'."</span>" : $row->vvfRefNo ?></td>
							<td style=""><?=$row->vvfAssetDesc?></td>
							<td style=""><?=strlen($row->vvfAssetType) == 0 ? "<span style=color:red;>".'???'."</span>" : $row->vvfAssetType ?></td>
							<td style=""><?=$row->vvfAssetNo ?></td>
							<td style=""><?=strlen($row->vvfPurchaseCost) == 0 || is_null($row->vvfPurchaseCost) ? "<span style=color:red;>".'???'."</span>" : $row->vvfPurchaseCost ?></td>				
							<td style=""><?=strlen($row->vvfVStatus) == 0 || is_null($row->vvfVStatus) ? "" : $row->vvfVStatus ?></td>
							<td style=""><input type="text" name="<?php echo  $rowno ?>RDW" value="<?=isset($row->vvfRateDW) ? number_format($row->vvfRateDW,2) : '0.00' ?>" class="form-control-button2" style="width:80px;">%</td>
							<td style=""><input type="text" name="<?php echo  $rowno ?>RPW" value="<?=isset($row->vvfRatePW) ? number_format($row->vvfRatePW,2) : '0.00' ?>" class="form-control-button2" style="width:80px;">%</td>
							
							<?php echo form_hidden($rowno.'vvfID',$row->vvfID) ?>
							<?php echo form_hidden($rowno.'snf',$row->vvfRefNo) ?>
							<?php echo form_hidden($rowno.'assetdesc',$row->vvfAssetDesc) ?>
							<?php echo form_hidden($rowno.'assettype',$row->vvfAssetType) ?>
							<?php echo form_hidden($rowno.'assetno',$row->vvfAssetNo) ?>
							<?php echo form_hidden($rowno.'cost',$row->vvfPurchaseCost) ?>
							<?php echo form_hidden($rowno.'status',$row->vvfVStatus) ?>
							<?php echo form_hidden($rowno.'oldRDW',$row->vvfRateDW) ?>
							<?php echo form_hidden($rowno.'oldRPW',$row->vvfRatePW) ?>

						</tr>
						<?php endforeach;?>
						<?php echo form_hidden('rowno',$rowno) ?>
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="14" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
								<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save">
							</td>
						</tr>
					</table>
					<?php echo form_close() ?>
					<?php } ?>
					<?php if ($this->input->get('act') == 'ver') { ?>
					<?php echo form_open('vo3_ratesfee_update_ctrl') ?>
					<table class="ui-desk-style-table2" style="border:2px solid #398074; color:black; background:white;" cellpadding="4" cellspacing="0" width="98%">	
						<tr class="ui-color-contents-style-1" >
							<td class="ui-header-new" colspan="14" valign="" height="43px"><span style="float: left; margin-top:8px; font-weight: bold;">VVFBEM/AGJ/P114/2014 - Rates and Fees</span></td>
						</tr>       			
	    				<tr class="ui-menu-color-header" style="color:white; font-size:12px; font-weight:;" align="center">
							<td width="2%" style="padding-top:3px; padding-bottom:3px;">&nbsp;</td>
							<td width="5%">SNF/VNF </td>
							<td width="5%">Description </td>
							<td width="3%">Equipment Code</td>
							<td width="5%">Asset Number </td>
							<td width="8%"> Purchase Value (RM) </td>
							<td width="5%"> Status </td>
							<td width="5%"> Proposed Rate DW (% pa) </td>
							<td width="5%">Proposed Rate PW (% pa)</td>
							<td width="5%">Proposed Fee PW (RM)</td>
							<td width="5%">Proposed Fee PW (RM)</td>
						</tr>
						<?php $Trowno = $this->input->post('rowno') ?>
						<?php for($loop = 1; $loop <= $Trowno; $loop++) { ?>
						<tr align="center" <?=($loop % 2) == 1 ? 'class="ui-color-color-color"' : ''?> >
							<?php

							$PurchaseCost = $this->input->post($loop.'cost');
							if ($PurchaseCost == '' OR !is_numeric($PurchaseCost)){
								$PurchaseCost = 0;
							}
							$RateDW = $this->input->post($loop.'RDW');
							if ($RateDW == '' OR !is_numeric($RateDW)){
								$RateDW = 0;
							}
							$RatePW = $this->input->post($loop.'RPW');
							if ($RatePW == '' OR !is_numeric($RatePW)){
								$RatePW = 0;
							}

							if (is_null($RateDW)){
								$RateDW = 0.00;
							}
							elseif ($RateDW == 999.00)
								if ($PurchaseCost >= 2000000){
									$RateDW = 0.75;
								}
								else{
									$RateDW = 0.05;
								}
							else{
								$RateDW = number_format($RateDW,2);
							}

							if (is_null($RatePW)){
								$RatePW = 0.00;
							}
							else{
								$RatePW = number_format($RatePW,2);
							} 

							//FeeDW calculation
							if (strlen($RateDW) == 0){
								$FeeDW = 0;
							}
							else{
								if ($RateDW == 999){
									if ($PurchaseCost >= 2000000){
										$FeeDW = $PurchaseCost * 0.0050;
									}
									else{
										$FeeDW = $PurchaseCost * 0.0075;
									}
								}
								else{
									$FeeDW = ($PurchaseCost * ($RateDW / 100)) / 12;
								}
							}

							if (is_null($FeeDW)){
								$FeeDW = 0.00;
							}
							else{
								$FeeDW = number_format($FeeDW,2);
							}

							//FeePW calculation
							$FeePW = ($PurchaseCost * ($RatePW / 100));
							
							if (is_null($FeePW)){
								$FeePW = 0.00;
							}
							else{
								$FeePW = number_format($FeePW,2);
							}

							//change indicator
							if ($RateDW == $this->input->post($loop.'oldRDW') AND $RatePW == $this->input->post($loop.'oldRPW')){
								$TextColor = "<span style='font-weight:none;'>";
							}
							else{
								$TextColor = "<span style='font-weight:bold;'>";
							}

							?>
							
							<td style=""><?=$TextColor.$loop?></span></td>
							<td style=""><?=strlen($this->input->post($loop.'snf')) == 0 || is_null($this->input->post($loop.'snf')) ? "<span style=color:red;>".'???'."</span>" : $TextColor.$this->input->post($loop.'snf')?></td>
							<td style=""><?=$TextColor.$this->input->post($loop.'assetdesc')?></td>
							<td style=""><?=$TextColor.$this->input->post($loop.'assettype')?></td>
							<td style=""><?=$TextColor.$this->input->post($loop.'assetno')?></td>
							<td style=""><?=is_null($PurchaseCost) || strlen($PurchaseCost) == 0 ? "<span style=color:red;>".'???'."</span>" : $TextColor.$PurchaseCost ?></td>				
							<td style=""><?=strlen($this->input->post($loop.'status')) == 0 || is_null($this->input->post($loop.'status')) ? "<span style=color:red;>".'???'."</span>" : $TextColor.$this->input->post($loop.'status')?></td>
							<td style=""><?=$RateDW == 999.00 ? '*' : $TextColor.$RateDW?></td>
							<td style=""><?=$TextColor.$RatePW?></td>
							<td style=""><?=$TextColor.$FeeDW?></td>
							<td style=""><?=$TextColor.$FeePW?></td>
			

						</tr>

							<?php echo form_hidden($loop.'vvfID',$this->input->post($loop.'vvfID')) ?>
							<?php echo form_hidden($loop.'snf',$this->input->post($loop.'snf')) ?>
							<?php echo form_hidden($loop.'assetdesc',$this->input->post($loop.'assetdesc')) ?>
							<?php echo form_hidden($loop.'assettype',$this->input->post($loop.'assettype')) ?>
							<?php echo form_hidden($loop.'assetno',$this->input->post($loop.'assetno')) ?>
							<?php echo form_hidden($loop.'cost',$PurchaseCost) ?>
							<?php echo form_hidden($loop.'status',$this->input->post($loop.'status')) ?>
							<?php echo form_hidden($loop.'oldRDW',$this->input->post($loop.'oldRDW')) ?>
							<?php echo form_hidden($loop.'oldRPW',$this->input->post($loop.'oldRPW')) ?>
							<?php echo form_hidden($loop.'RDW',$RateDW) ?>
							<?php echo form_hidden($loop.'RPW',$RatePW) ?>
							<?php echo form_hidden($loop.'FDW',$FeeDW) ?>
							<?php echo form_hidden($loop.'FPW',$FeePW) ?>
							<?php echo form_hidden('loop',$loop) ?>
						<?php } ?>
						
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="14" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
								<?php echo anchor ('contentcontroller/vo3_Rates_update?rpt_no='.$this->input->get('rpt_no').'&act=sv', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Change</button>'); ?>
								<input type="submit" class="btn-button btn-primary-button" style="width: 150px;" name="mysubmit" value="Save">
								
							</td>
						</tr>
					</table>	
					<?php } ?>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->get('rpt_no')) ?>

	</div>
</div>