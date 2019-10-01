<?php echo form_open('contentcontroller/vo3_Rates_update?rpt_no='.$this->input->get('rpt_no')) ?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
<?php include 'content_vo3_menu.php';?>

	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="98%" align="center">
			<?php include 'content_vo3_tab.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="4" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" width="" colspan="12" valign="top" align="center">
					<table class="ui-desk-style-table4" cellpadding="4" cellspacing="0" width="98%">	
						<?php switch ($m) {
    					case "1":
        				$tulis = 'Submitted in January '.substr($period[2],2);
        				break;
        				case "2":
        				$tulis = 'Submitted in February '.substr($period[2],2);
        				break;
        				case "3":
        				$tulis = 'Submitted in March '.substr($period[2],2);
        				break;
        				case "4":
        				$tulis = 'Submitted in April '.substr($period[2],2);
        				break;
    					case "5":
        				$tulis = 'Submitted in May '.substr($period[2],2);
        				break;
        				case "6":
        				$tulis = 'Submitted in June '.substr($period[2],2);
        				break;
        				case "7":
        				$tulis = 'Submitted in July '.substr($period[2],2);
        				break;
        				case "8":
        				$tulis = 'Submitted in August '.substr($period[2],2);
        				break;
        				case "9":
        				$tulis = 'Submitted in September '.substr($period[2],2);
        				break;
        				case "10":
        				$tulis = 'Submitted in October '.substr($period[2],2);
        				break;
        				case "11":
        				$tulis = 'Submitted in November '.substr($period[2],2);
        				break;
        				case "12":
        				$tulis = 'Submitted in December '.substr($period[2],2);
        				break;
    					default:
        				
        				}
     					?>
						<tr class="ui-color-contents-style-1" >
							<td class="ui-header-new" colspan="14" valign="" height="43px"><span style="float: left; margin-top:8px; font-weight: bold;"><?=!is_null($this->input->get('rpt_no')) ? $this->input->get('rpt_no') : 'N/A'?> - Rates and Fees <?=isset($tulis) ? ' - '.$tulis : NULL ?></span><span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 150px;" name="mysubmit" value="Edit ALL FEES"></span></td>
						<?php include 'content_tab_vo3_ratesfee.php';?>
						</tr>
						<tr class="ui-color-contents-style-1" >
							<td style="padding:0px; margin:0px;">
								<div class="ui-left_web">
								<table class="ui-desk-style-table3"  style="width:100%; font-size:12px;">       			
	    				<tr class="ui-menu-color-header" style="color:white; font-weight:bold;" align="center">
							<td>&nbsp;</td>
							<td>SNF/VNF </td>
							<td>Description </td>
							<td>Equipment Code</td>
							<td>Asset Label Number </td>
							<td> Purchase Value (RM) </td>
							<td> Status </td>
							<td> Proposed Rate DW (% pa) </td>
							<td>Proposed Rate PW (% pa)</td>
							<td>Monthly Proposed Fee DW (RM)  </td>
							<td>Monthly Proposed Fee PW (RM) </td>
						</tr>
						<?php if (!empty($records)) { ?>
						<?php $rowno = 1; foreach($records as $row):?>  
						<tr align="center" <?=($rowno % 2) == 1 ? 'class="ui-color-color-color"' : ''?> >
							<?php
							
							$VVFFeeDW = $row->vvfFeeDW;
							if (strlen($VVFFeeDW) == 0){
								$VVFFeeDW = "<span style=color:red;>".'0.00%'."</span>";
							}
							else{
								$VVFFeeDW = number_format($VVFFeeDW,2);
							}
							
							$VVFFeePW = $row->vvfFeePW;
							if (strlen($VVFFeePW) == 0){
								$VVFFeePW = "<span style=color:red;>".'0.00%'."</span>";
							}
							else{
								$VVFFeePW = number_format($VVFFeeDW,2);
							}
							//determine addition or substitution
							if ($row->vvfVStatus == 'V4:' || $row->vvfVStatus == 'V2' || $row->vvfVStatus == 'V5'){
								$symbol = '-';
							}
							else{
								$symbol = '';
							}
							//determine addition or substitution
							if (substr($period[2],1,1) == 2){
								if ( ((strtotime($row->vvfDateWarrantyEnd) - strtotime($period[3]+1 . '-' . 01 . '-' . 01))/86400) > 1 ){
									$VVFFeeDW = '-';
								}
								else{
									$VVFFeePW = '-';
								}
							}
							elseif (substr($period[2],1,1) == 1){
								if ( ((strtotime($row->vvfDateWarrantyEnd) - strtotime($period[3] . '-' . 07 . '-' . 01))/86400) > 1 ){
									$VVFFeeDW = '-';
								}
								else{
									$VVFFeePW = '-';
								}
							}
							
							?>
							<td style=""><?=$rowno++?></td>
							<td style=""><?=is_null($row->vvfRefNo) || strlen($row->vvfRefNo) == 0 ? "<span style=color:red;>".'???'."</span>" : $row->vvfRefNo ?></td>
							<td style=""><?=$row->vvfAssetDesc?></td>
							<td style=""><?=strlen($row->vvfAssetType) == 0 ? "<span style=color:red;>".'???'."</span>" : $row->vvfAssetType ?></td>
							<td style=""><?php echo anchor ('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$row->vvfAssetNo.'&vo=3',''.$row->vvfAssetNo. '' ,'style="font-size:12px;"') ?></td>
							<td style=""><?=strlen($row->vvfPurchaseCost) == 0 || is_null($row->vvfPurchaseCost) ? "<span style=color:red;>".'???'."</span>" : $row->vvfPurchaseCost ?></td>				
							<td style=""><?=strlen($row->vvfVStatus) == 0 || is_null($row->vvfVStatus) ? "<span style=color:red;>".'???'."</span>" : $row->vvfVStatus ?></td>
							<td style=""><?=strlen($row->vvfRateDW) == 0 ? "<span style=color:red;>".'0.00%'."</span>" : ($row->vvfRateDW == '999' ? ($row->vvfPurchaseCost >= 2000000 ? '0.50%' : '0.75%' ) : number_format($row->vvfRateDW,2) ) ?></td>
							<td style=""><?=strlen($row->vvfRatePW) == 0 ? "<span style=color:red;>".'0.00%'."</span>" : number_format($row->vvfRatePW,2) ?></td>
							<td style=""><?=$symbol.$VVFFeeDW?></td>
							<td style=""><?=$symbol.$VVFFeePW?></td>
						</tr>
						<?php endforeach;?>
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="11">
							</td>
						</tr>
						<tr>
							<td colspan="11" align="right"><div style="width:29%; text-align:center;">Note: ??? denotes the data is not available in asset record. Standard rate DW are marked with "*"</div></td>
						</tr>
						<tr>
							<td align="center" colspan="8"></td>
							<td>TOTAL :</td>
							<td align="center" style="color:black; font-size:14px; border-top: 2px solid black; border-bottom: 5px double black;"><?=isset($nTotalDW) ? $nTotalDW : 'N/A' ?></td>
							<td align="center" style="color:black; font-size:14px; border-top: 2px solid black; border-bottom: 5px double black;"><?=isset($nTotalPW) ? $nTotalPW : 'N/A' ?></td>
						</tr>
						<?php } else { ?>
						<tr align="center" style="height:400px;">
						<td colspan="14" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:14px;">NO ASSET SUBMISSION FOUND FOR VO <?=$this->input->get('rpt_no')?></span></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="ui-left_mobile">
						<table class="ui-mobile-table-desk" style="color:black; width:100%;">
							<?php if (!empty($records)) { ?>
							<?php $numrow = 1; foreach($records as $row):?>  
							<?php
							$VVFFeeDW = $row->vvfFeeDW;
							if (strlen($VVFFeeDW) == 0){
								$VVFFeeDW = "<span style=color:red;>".'0.00%'."</span>";
							}
							else{
								$VVFFeeDW = number_format($VVFFeeDW,2);
							}
							
							$VVFFeePW = $row->vvfFeePW;
							if (strlen($VVFFeePW) == 0){
								$VVFFeePW = "<span style=color:red;>".'0.00%'."</span>";
							}
							else{
								$VVFFeePW = number_format($VVFFeeDW,2);
							}
							//determine addition or substitution
							if ($row->vvfVStatus == 'V4:' || $row->vvfVStatus == 'V2' || $row->vvfVStatus == 'V5'){
								$symbol = '-';
							}
							else{
								$symbol = '';
							}
							//determine addition or substitution
							if (substr($period[2],1,1) == 2){
								if ( ((strtotime($row->vvfDateWarrantyEnd) - strtotime($period[3]+1 . '-' . 01 . '-' . 01))/86400) > 1 ){
									$VVFFeeDW = '-';
								}
								else{
									$VVFFeePW = '-';
								}
							}
							elseif (substr($period[2],1,1) == 1){
								if ( ((strtotime($row->vvfDateWarrantyEnd) - strtotime($period[3] . '-' . 07 . '-' . 01))/86400) > 1 ){
									$VVFFeeDW = '-';
								}
								else{
									$VVFFeePW = '-';
								}
							}
							
							?>
			    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>No</td>
								<td class="td-desk">: <?=$numrow?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
								<td>SNF/VNF</td>
								<td class="td-desk">: <?=is_null($row->vvfRefNo) || strlen($row->vvfRefNo) == 0 ? "<span style=color:red;>".'???'."</span>" : $row->vvfRefNo ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Description </td>
								<td class="td-desk">: <?=$row->vvfAssetDesc?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Equipment Code</td>	
								<td class="td-desk">: <?=strlen($row->vvfAssetType) == 0 ? "<span style=color:red;>".'???'."</span>" : $row->vvfAssetType ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Asset Label Number </td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$row->vvfAssetNo.'&vo=3',''.$row->vvfAssetNo) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td> Purchase Value (RM) </td>
								<td class="td-desk">: <?=strlen($row->vvfPurchaseCost) == 0 || is_null($row->vvfPurchaseCost) ? "<span style=color:red;>".'???'."</span>" : $row->vvfPurchaseCost ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td> Status </td>
								<td class="td-desk">: <?=strlen($row->vvfVStatus) == 0 || is_null($row->vvfVStatus) ? "<span style=color:red;>".'???'."</span>" : $row->vvfVStatus ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
								<td> Proposed Rate DW (% pa) </td>
								<td class="td-desk">: <?=strlen($row->vvfRateDW) == 0 ? "<span style=color:red;>".'0.00%'."</span>" : ($row->vvfRateDW == '999' ? ($row->vvfPurchaseCost >= 2000000 ? '0.50%' : '0.75%' ) : number_format($row->vvfRateDW,2) ) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Proposed Rate PW (% pa)</td>
								<td class="td-desk">: <?=strlen($row->vvfRatePW) == 0 ? "<span style=color:red;>".'0.00%'."</span>" : number_format($row->vvfRatePW,2) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Monthly Proposed Fee DW (RM)  </td>
								<td class="td-desk">: <?=$symbol.$VVFFeeDW?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Monthly Proposed Fee PW (RM) </td>
								<td class="td-desk">: <?=$symbol.$VVFFeePW?></td>
							</tr>
			        		<?php $numrow++?> 			 
								<?php endforeach;?>
								<?php }else { ?>
									<tr align="center" style="height:400px;">
									<td colspan="2" class="ui-color-color-color default-NO">NO ASSET SUBMISSION FOUND FOR VO <?=$this->input->get('rpt_no')?></td>
								</tr>
								<?php } ?>
						</table>
					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="14">
				</td>
			</tr>
		</table>
		<?php echo form_hidden('rpt_no',$this->input->post('rpt_no')) ?>
	</div>
</div>
<?php echo form_close() ?>