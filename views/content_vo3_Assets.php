
<div class="ui-middle-screen">
<?php include 'content_vo3_menu.php';?>
	<div class="content-workorder">
		
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
			<?php if($this->input->get('loc') == 1){?>
			<tr style="background-color:#99FF66;">
				<td colspan="4" height="20px" style="padding:8px;"><img src="<?php echo base_url();?>images/icoOK.gif" style="position:absolute; height:20px;"><span style="display:block; margin-left:25px;"> Asset <?=$this->input->get('asset');?> is now locked. Asset information related to VO is no longer editable.</span></td>
			</tr>
			<?php } elseif ($this->input->get('loc') == 2) {?>
			<tr style="background-color:#99FF66;">
				<td colspan="4" height="20px" style="padding:8px;"><img src="<?php echo base_url();?>images/icoOK.gif" style="position:absolute; height:20px;"><span style="display:block; margin-left:25px;">Asset <?=$this->input->get('asset');?>  has been unlocked. Asset information related to VO is now editable.</span></td>
			</tr>
			<?php }elseif($this->input->get('hq') == 1){?>
			<tr style="background-color:#99FF66;">
				<td colspan="4" height="20px" style="padding:8px;"><img src="<?php echo base_url();?>images/icoOK.gif" style="position:absolute; height:20px;"><span style="display:block; margin-left:25px;">Asset <?=$this->input->get('asset');?>  VO application has been authorized. It has been included in the final VO submission list</span></td>
			</tr>
			<?php }elseif($this->input->get('hq') == 2){?>
			<tr style="background-color:#99FF66;">
				<td colspan="4" height="20px" style="padding:8px;"><img src="<?php echo base_url();?>images/icoOK.gif" style="position:absolute; height:20px;"><span style="display:block; margin-left:25px;">Asset <?=$this->input->get('asset');?>  VO application authorization has been rejected. It will not be included in the final VO submission list.</span></td>
			</tr>
			<?php } else {?>
			<?php } ?>
			<?php include 'content_vo3_tab.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="4" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td width="" colspan="12" valign="top" align="center" class="pd-bttm">
					<table class="ui-desk-style-table4" style="color:black;" cellpadding="4" cellspacing="0" width="98%" border="0">	
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
							<td class="ui-header-new t-header" colspan="14" valign="" height="43px" style="font-size:16px; font-weight:bold;"><?=!is_null($this->input->get('rpt_no')) ? $this->input->get('rpt_no') : 'N/A'?> - Assets <?=isset($tulis) ? ' - '.$tulis : NULL ?></td>
						<?php include 'content_tab_vo3_assets.php';?>
						</tr>
						<tr class="ui-color-contents-style-1" >
							<td style="padding:0px; margin:0px;">
								<div class="ui-left_web">
								<table class="ui-desk-style-table3"  style="width:100%; font-size:12px;">	
				    				<tr class="ui-menu-color-header"   style="color:white; font-weight:bold;" align="center">
										<td>Verify</td>
										<td style="width:200px;">SNF/VNF</td>
										<td>Dept</td>
										<td>Description</td>
										<td>Equipment<br/>Code</td>
										<td>Asset Number</td>
										<td> Mfg </td>
										<td> Model </td>
										<td>Purchase<br/>Value </td>
										<td>Status </td>
										<td>Commissioned<br/>Date </td>
										<td>Start Date </td>
										<td>Warranty<br/>Expiry Date </td>
										<td>Stop Date</td>
									</tr>
									<?php if (!empty($records)) { ?>
									<?php $rowno = 1; foreach($records as $row): ?>  
									<tr align="center" <?=($rowno % 2) == 1 ? 'class="ui-color-color-color"' : ''?> >
										<?php 

										$D_Comm = $row->D_commission;
										//print_r($D_Comm);
										//exit();
										$D_Commr = $row->D_comm;
										//echo $D_Commr;
										//exit();
										if ($row->vvfVStatus == 'V2' OR $row->vvfVStatus == 'V4:' OR $row->vvfVStatus == 'V5'){
											$D_Comm = $row->D_comm;
										}

										if (date('Y',strtotime($D_Comm)) < '1997'){
											$D_Comm = '1997-01-01';
											//echo $D_Comm;
											//exit();
										}
										$Date_Start = $D_Comm;
										
										if (date('Y',strtotime($Date_Start)) < '1997'){
											$Date_Start = '1997-01-01';
										}
										if ($row->vvfVStatus <> 'V6'){
											if ($row->vvfVStatus == 'V4:' OR $row->vvfVStatus == 'V4L'){
												if (strlen($row->vvfDateStop) == 0 OR is_null($row->vvfDateStop)){
												$Date_Stop = "<span style=color:red;>".'???'."</span>";
												}
												else{
													$Date_Stop = date_format(new DateTime($row->vvfDateStop), 'd-m-Y');
												}
											}
											else{
												if (strlen($row->vvfDateStop) == 0 OR is_null($row->vvfDateStop)){
													$Date_Stop = '-';
												}
												else {
													$Date_Stop = "<span style=color:red;>".date_format(new DateTime($row->vvfDateStop), 'd-m-Y')."</span>";
												}
											}
										}
										else{
											$Date_Stop = '';
										}

										?>
										<td style=""><?=$rowno++?></td>
										<td style="">
										<?=!is_null($row->vvfRefNo) || strlen($row->vvfRefNo) != 0 ? $row->vvfRefNo : "<span style=color:red;>".'???'."</span>" ?><br >
										<div style="margin:5px;">
										<a href="<?php echo base_url()?>index.php/contentcontroller/vo3_remark_update?rpt_no=<?=$this->input->get('rpt_no')?>&asset=<?=$row->vvfAssetNo?>"><img src="<?php echo base_url();?>images/comment.png" style="width:15px; height:15px;" title="PMSB comments: none."></a>
										<?php if($this->input->get('loc') == 1){?>
										<a href="<?php echo base_url()?>index.php/contentcontroller/vo3_Assets?rpt_no=<?=$this->input->get('rpt_no');?>&vo=2&loc=2&asset=<?=$row->vvfAssetNo?>"><img src="<?php echo base_url();?>images/lock2.png" style="width:15px; height:15px;" title="VO item locked by [<?php echo $this->session->userdata('fullname');?>] on [<?php echo date("d/m/Y");?>]. Click here to unlock."></a>
										<?php }else{ ?>
										<a href="<?php echo base_url()?>index.php/contentcontroller/vo3_Assets?rpt_no=<?=$this->input->get('rpt_no');?>&vo=2&loc=1&asset=<?=$row->vvfAssetNo?>"><img src="<?php echo base_url();?>images/unlock2.png" style="width:15px; height:15px;" title="VO item locked by [<?php echo $this->session->userdata('fullname');?>] on [<?php echo date("d/m/Y");?>]. Click here to unlock."></a>
										<?php } ?>
										<?php if($this->input->get('hq') == 1){?>
										<a href="<?php echo base_url()?>index.php/contentcontroller/vo3_Assets?rpt_no=<?=$this->input->get('rpt_no');?>&vo=2&hq=2&asset=<?=$row->vvfAssetNo?>"><img src="<?php echo base_url();?>images/icoappvohq1.gif" style="width:15px; height:15px;" title="New VO item application and has not been authorized. Click here to change it to authorized.">
										<?php }elseif($this->input->get('hq') == 2){?>
										<a href="<?php echo base_url()?>index.php/contentcontroller/vo3_Assets?rpt_no=<?=$this->input->get('rpt_no');?>&vo=2&hq=3&asset=<?=$row->vvfAssetNo?>"><img src="<?php echo base_url();?>images/icoappvohq2.gif" style="width:15px; height:15px;" title="New VO item application and has not been authorized. Click here to change it to authorized.">
										<?php }else{ ?>
										<a href="<?php echo base_url()?>index.php/contentcontroller/vo3_Assets?rpt_no=<?=$this->input->get('rpt_no');?>&vo=2&hq=1&asset=<?=$row->vvfAssetNo?>"><img src="<?php echo base_url();?>images/icoappvohq0.gif" style="width:15px; height:15px;" title="New VO item application and has not been authorized. Click here to change it to authorized.">
										<?php } ?>
										<a href="<?php echo base_url()?>index.php/contentcontroller/assetupdate?asstno=<?=$row->vvfAssetNo?>&tab=0&parent=assets"><img src="<?php echo base_url();?>images/computer-icon.png" style="width:15px; height:15px;" title="Go to Asset item page."></a>
										<?php echo anchor ('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$row->vvfAssetNo.'&vo=2','<img src="'.base_url().'images/Currency$.png" style="width:15px; height:15px;" title="Go to VO item page.">','style="font-size:12px;"') ?>
										</div>
										</td>
										<td style=""><?=strlen($row->vvfDept) != 0 ? $row->vvfDept : "<span style=color:red;>".'???'."</span>" ?></td>
										<td style=""><?=$row->vvfAssetDesc?></td>
										<td style=""><?=strlen($row->vvfAssetType) != 0 ? $row->vvfAssetType : '???' ?></td>
										<td style=""><?php echo anchor ('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$row->vvfAssetNo.'&vo=2',''.$row->vvfAssetNo.'','style="font-size:12px;"') ?></td>				
										<td style=""><?=$row->vvfMfg?></td>
										<td style=""><?=$row->vvfModel?></td>
										<td style=""><?=strlen($row->vvfPurchaseCost) != 0 || !is_null($row->vvfPurchaseCost) ? number_format($row->vvfPurchaseCost,2) : "<span style=color:red;>".'???'."</span>" ?></td>
										<td style=""><?=strlen($row->vvfVStatus) != 0 || !is_null($row->vvfVStatus) ? $row->vvfVStatus : "<span style=color:red;>".'???'."</span>" ?></td>
										<td style=""><?= date("d-m-Y",strtotime($D_Comm)) ;?></td>
										<td style=""><?= date("d-m-Y",strtotime($Date_Start)) ;?></td>
										<td style=""><?=strlen($row->vvfDateWarrantyEnd) != 0 || !is_null($Date_Start) ? date_format(new DateTime($row->vvfDateWarrantyEnd), 'd-m-Y') : "<span style=color:red;>".'???'."</span>" ?></td>
										<td style=""><?=$Date_Stop ?></td>
									</tr>
									<?php endforeach;?>
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
									<?php $numrow = 1; foreach($records as $row): ?>
									<?php 

										$D_Comm = $row->D_commission;
										//print_r($D_Comm);
										//exit();
										$D_Commr = $row->D_comm;
										//echo $D_Commr;
										//exit();
										if ($row->vvfVStatus == 'V2' OR $row->vvfVStatus == 'V4:' OR $row->vvfVStatus == 'V5'){
											$D_Comm = $row->D_comm;
										}

										if (date('Y',strtotime($D_Comm)) < '1997'){
											$D_Comm = '1997-01-01';
											//echo $D_Comm;
											//exit();
										}
										$Date_Start = $D_Comm;
										
										if (date('Y',strtotime($Date_Start)) < '1997'){
											$Date_Start = '1997-01-01';
										}
										if ($row->vvfVStatus <> 'V6'){
											if ($row->vvfVStatus == 'V4:' OR $row->vvfVStatus == 'V4L'){
												if (strlen($row->vvfDateStop) == 0 OR is_null($row->vvfDateStop)){
												$Date_Stop = "<span style=color:red;>".'???'."</span>";
												}
												else{
													$Date_Stop = date_format(new DateTime($row->vvfDateStop), 'd-m-Y');
												}
											}
											else{
												if (strlen($row->vvfDateStop) == 0 OR is_null($row->vvfDateStop)){
													$Date_Stop = '-';
												}
												else {
													$Date_Stop = "<span style=color:red;>".date_format(new DateTime($row->vvfDateStop), 'd-m-Y')."</span>";
												}
											}
										}
										else{
											$Date_Stop = '';
										}

										?>     			
					    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Verify</td>
										<td class="td-desk">: <?=$numrow?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
										<td>SNF/VNF</td>
										<td class="td-desk">: <?=!is_null($row->vvfRefNo) || strlen($row->vvfRefNo) != 0 ? $row->vvfRefNo : "<span style=color:red;>".'???'."</span>" ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Dept</td>	
										<td class="td-desk">: <?=strlen($row->vvfDept) != 0 ? $row->vvfDept : "<span style=color:red;>".'???'."</span>" ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Description</td>	
										<td class="td-desk">: <?=$row->vvfAssetDesc?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Equipment Code</td>
										<td class="td-desk">: <?=strlen($row->vvfAssetType) != 0 ? $row->vvfAssetType : '???' ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Asset Number</td>
										<td class="td-desk">: <?php echo anchor ('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$row->vvfAssetNo.'&vo=2',''.$row->vvfAssetNo.'') ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td> Mfg </td>
										<td class="td-desk">: <?=$row->vvfMfg?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
										<td> Model </td>
										<td class="td-desk">: <?=$row->vvfModel?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Purchase Value </td>
										<td class="td-desk">: <?=strlen($row->vvfPurchaseCost) != 0 || !is_null($row->vvfPurchaseCost) ? number_format($row->vvfPurchaseCost,2) : "<span style=color:red;>".'???'."</span>" ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Status </td>
										<td class="td-desk">: <?=strlen($row->vvfVStatus) != 0 || !is_null($row->vvfVStatus) ? $row->vvfVStatus : "<span style=color:red;>".'???'."</span>" ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Commissioned Date </td>
										<td class="td-desk">: <?=$D_Comm?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Start Date </td>
										<td class="td-desk">: <?=$Date_Start?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Warranty Expiry Date </td>
										<td class="td-desk">: <?=strlen($row->vvfDateWarrantyEnd) != 0 || !is_null($Date_Start) ? date_format(new DateTime($row->vvfDateWarrantyEnd), 'd-m-Y') : "<span style=color:red;>".'???'."</span>" ?></td>
									</tr>
									<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
										<td>Stop Date</td>
										<td class="td-desk">: <?=$Date_Stop ?></td>
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
				</td>
			</tr>
										
		</table>
		<?php echo form_hidden('rpt_no',$this->input->get('rpt_no')); ?>
	</div>
</div>