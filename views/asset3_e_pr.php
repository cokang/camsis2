<div class="ui-middle-screen">
</table>
<table class="table-middle-screen-2" border="0">
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/IntlTableSort.css">
<script src="<?php echo base_url(); ?>/js/IntlTableSort.js"></script>
<script src="<?php echo base_url(); ?>/js/IntlTableSort.DateTime.js"></script>
<script src="<?php echo base_url(); ?>/js/IntlTableSort.String.js"></script>
<script src="<?php echo base_url(); ?>/js/IntlTableSort.Number.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/backtotop.css">
<button onclick="topFunction()" id="myBtn" title="Go to top" class='icon-triangle-up-small'></button>
<tr><td>

	<div class="div-p"></div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
			<?php
			$procument = $this->input->get('tab');
			switch ($procument) {
				case "1":
					$tulis = "PO Approval";
					$tulis2 = "PO No";
				break;
				case "2":
					$tulis = "PO Approved";
					$tulis2 = "PO No";
				break;
				default:
					$tulis = "PR Approval";
					$tulis2 = "MRIN No";
			}
			 $req_type = array('0' => 'RCM',
								'1' => 'PPM', 
								'2' => 'TPS',
								'3' => 'RIW',
								'4' => 'FMI',
								'5' => 'JIT');
								
			?>
			<?php include 'content_pr_tab.php';?>
			<tr class="ui-color-desk desk2">
				<!-- <td colspan="4" class="t-header" style="color:black; height:40px; padding-left:10px;"><b><?= $tulis ?></b> <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td> -->
			</tr>
			 <!-- <tr class="ui-color-desk bg-red-blood">
				<td colspan="4">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
								<a href="?tab=<?= $this->input->get('tab');?>&y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
								<a href="?tab=<?= $this->input->get('tab');?>&y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="88%" align="center">
								<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> 
							</td>
							<td width="3%">
								<a href="?tab=<?= $this->input->get('tab');?>&y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
								<a href="?tab=<?= $this->input->get('tab');?>&y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>  -->
			<tr class="ui-color-contents-style-1">
				<td colspan="4" style="background-color: #fffefc;" valign="top" >
					<table class="ui-content-middle-menu-workorder2 ui-landscape table" data-sorting="true" width="100%">
					<thead>
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;">
							<th onclick="numberTableSort(this,true)"></th>
							<?php if($this->input->get('tab')!=1){ ?>
							<th onclick="tableSort(this)" style="text-align:left;"><?=$tulis2?></th>
							<?php }?>
							<?php if($this->input->get('tab')==2){ ?>
							<th onclick="dateTimeTableSort(this,'Date')">PO Approved Date</th>
							<th onclick="tableSort(this)">Request Type</th>
							<!-- <th>Requestor</th> -->
							<th onclick="tableSort(this)">MRIN No</th>
							<th onclick="dateTimeTableSort(this,'Date')">MRIN Date</th>
							<th onclick="tableSort(this)">Vendor</th>
							<th onclick="numberTableSort(this,true)">Amount</th>
							<th onclick="tableSort(this)">Payment Type</th>
								<?php }else{?>
							<?php if($procument==1){?><th >MRIN No</th><?php } ?>
							<th onclick="dateTimeTableSort(this,'Date')">MRIN Date</th>
							<th onclick="tableSort(this)">Request Type</th>
							<!-- <th >Requestor</th> -->
							<!-- <th >Status</th> -->
							<?php if($user[0]->class_id==3 || $user[0]->class_id==4){ ?>
							<?php if($procument==0){?><th>Recommended</th><?php }elseif($procument==1){ ?>
								<th>Approve</th>
								<?php } ?>
							<th>Return</th>
							<?php }?>
							<!-- <th >Date</th> -->
							<th onclick="tableSort(this)">Vendor</th>
							<th onclick="numberTableSort(this,true)">Amount</th>
							<th onclick="tableSort(this)">Payment Type</th> 
							<?php if($this->input->get('tab')==1){ ?>
							<th onclick="tableSort(this)">Justification</th>
							<?php }} ?>
						</tr>
						</thead>
						<style>
							.ui-content-middle-menu-workorder2 tr th {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td.td-desk a{ font-weight:bold; font-size:14px;}
						</style>
						<?php if($this->input->get('tab') == 0){$spanval=10;}elseif($this->input->get('tab') == 1){$spanval=11;}else{$spanval=9;}?>
						<?php if ($record) { ?>
							<?php if($this->input->get('tab') == 0){?>
								<?php $numrow = 1; foreach ($record as $row): ?>
						<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
							<td class="td-desk"><?=$numrow++?></td>
						
							<td class="td-desk" style="text-align:left;">
								<a href="<?php echo base_url();?>index.php/Procurement/e_pr?pr=pending&mrinno=<?=$row->DocReferenceNo?>">
									<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
								</a>
							</td>
					
							<td class="td-desk"><?=isset($row->DateCreated) ? date("d-M-Y",strtotime($row->DateCreated)) : ''?></td>
							<td style="color:blue;"><?=isset($row->ReqCase) ? $req_type[$row->ReqCase] : ''?></td>
							<!-- <td class="td-desk"><?=isset($row->name) ? $row->name : ''?></td> -->
							<!-- <?php if (in_array("cancelpo", $chkers)) { ?>
							<td class="td-desk">
								<a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>&pro=approved">
									<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
								</a>
							</td>
						<?php  }  else {?>
							<td class="td-desk"><?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?></td>
							<?php  } ?> -->
							<!-- <td class="td-desk">Pending</td> -->
							<?php if($user[0]->class_id==3){ ?>
							<td class="td-desk"><input type="checkbox" id="chk_status1<?=$row->DocReferenceNo?>" name="chk_status" onclick="recommend_po('4','<?=$row->DocReferenceNo?>');"></td>
							<td class="td-desk"><input type="checkbox" id="chk_status2<?=$row->DocReferenceNo?>" name="chk_status" onclick="recommend_po('107','<?=$row->DocReferenceNo?>');"></td>
							<?php } ?>
							<td class="td-desk"><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : ''?></td>
							<td><?=isset($row->totalPO) ? sprintf('%0.2f', round($row->totalPO, 2)) : ''?></td>
							<td><?=isset($row->Payment_Opt) ? $row->Payment_Opt : ''?></td>
						</tr>
								<?php endforeach; ?>
								
							<?php }elseif($this->input->get('tab') == 1){?>
								<?php $numrow = 1; foreach ($record as $row): ?>
						<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
							<td class="td-desk"><?=$numrow++?></td>
							<!-- <td class="td-desk" style="text-align:left;"><a href="<?php echo base_url();?>index.php/Procurement/e_pr?pr=approved&mrinno=<?=$row->DocReferenceNo?>"><?=isset($row->PR_No) ? $row->PR_No : ''?></a></td> -->
							<!-- <td class="td-desk" style="text-align:left;">
								<a href="<?php echo base_url();?>index.php/Procurement/e_po_print?po=<?=isset($row->PO_No) ? $row->PO_No : ''?>&mrin=<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>">
									<?=isset($row->PO_No) ? $row->PO_No : ''?>
								</a>
							</td> -->
							<td class="td-desk"><b><a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>&pro=approved">
								<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
							</a></b></td>
							<td class="td-desk"><?=isset($row->DateCreated) ? date("d-M-Y",strtotime($row->DateCreated)) : ''?></td>
							<td style="color:blue;"><?=isset($row->ReqCase) ? $req_type[$row->ReqCase] : ''?></td>
							<!-- <td class="td-desk"><?=isset($row->name) ? $row->name : ''?></td> -->
							<!-- <td class="td-desk">Pending</td> -->
							<td class="td-desk"><input <?php if($row->totalPO>=100000 && $user[0]->class_id=='3') echo 'disabled';?> type="checkbox" id="chk_status1<?=$row->DocReferenceNo?>" name="chk_status" onclick="approval_po('2','<?=$row->DocReferenceNo?>');"></td>
							<td class="td-desk"><input <?php if($row->totalPO>=100000 && $user[0]->class_id=='3') echo 'disabled';?> type="checkbox" id="chk_status2<?=$row->DocReferenceNo?>" name="chk_status" onclick="approval_po('0','<?=$row->DocReferenceNo?>');"></td>
							<td class="td-desk"><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : ''?></td>
							<td><?=isset($row->totalPO) ? sprintf('%0.2f', round($row->totalPO, 2)) : ''?></td>
							<td><?=isset($row->Payment_Opt) ? $row->Payment_Opt : ''?></td>
							<td class="td-desk"><?=isset($row->ApprCommentsx) ? $row->ApprCommentsx : ''?></td>
						</tr>
								<?php endforeach; ?>
							<?php }elseif($this->input->get('tab') == 2){?>
								<?php $numrow = 1; foreach ($record as $row): ?>
						<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
							<td class="td-desk"><?=$numrow++?></td>
							<td class="td-desk" style="text-align:left;">
								<a href="<?php echo base_url();?>index.php/Procurement/e_po_print?po=<?=isset($row->PO_No) ? $row->PO_No : ''?>&mrin=<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>">
									<?=isset($row->PO_No) ? $row->PO_No : ''?>
								</a>
							</td>
							<td class="td-desk"><?=isset($row->DateApproval) ? date("d-M-Y",strtotime($row->DateApproval)) : ''?></td>
							<td style="color:blue;"><?=isset($row->ReqCase) ? $req_type[$row->ReqCase] : ''?></td>
							<!-- <td class="td-desk"><?=isset($row->name) ? $row->name : ''?></td> -->
							<td class="td-desk"><b><a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>&pro=approved">
								<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
							</a></b></td>
							<td class="td-desk"><?=isset($row->DateCreated) ? date("d-M-Y",strtotime($row->DateCreated)) : ''?></td>
							<!-- <td class="td-desk">Pending</td> -->
							<td class="td-desk"><?php foreach($vendorList as $vendor){ if($vendor->VENDOR_CODE==$row->ApprvRmk1x)echo $vendor->VENDOR_NAME; }?></td>
							<td><?=isset($row->totalPO) ? sprintf('%0.2f', round($row->totalPO, 2)) : ''?></td>
							<td><?=isset($row->Payment_Opt) ? $row->Payment_Opt : ''?></td>
						</tr>
								<?php endforeach; ?>
							<?php } ?>
							
						<?php } else { ?>
						<tr align="center" style="height:200px; background:white;">
							<td colspan="<?=$spanval; ?>" class="default-NO">
								NO <?php if($tulis == "All MRIN" ){ echo "MRIN";}else{ echo $tulis;}?> FOUND FROM <?= date('d-m-Y',strtotime($from))?> TO <?=date('d-m-Y',strtotime($to))?>
							</td>
						</tr>
						<?php } ?>
					</table>
					<tr ><td class="td-desk" colspan="10" ><button class="btn-button btn-primary-button "onClick="window.location.reload()">Refresh</button></td></tr>
					<table class="ui-portrait" style="color:black;">
						<tbody style="width: 100%;">
							<?php if ($record) { ?>
								
									<?php $rownum = 1; foreach ($record as $row): ?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$rownum;?></td>
							</tr>
							<?php if($this->input->get('tab') !=0){?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >PO No</td>
								<td class="td-desk">:
								<a href="<?php echo base_url();?>index.php/Procurement/e_po_print?po=<?=isset($row->PO_No) ? $row->PO_No : ''?>&mrin=<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>">
									<?=isset($row->PO_No) ? $row->PO_No : ''?>
								</a>
								</td>
							</tr>
							<?php } ?>
							<?php if($this->input->get('tab') ==2){?>
								<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >PO Approved Date</td>
								<td class="td-desk"><?=isset($row->DateCreated) ? date("d-m-Y",strtotime($row->DateCreated)) : ''?></td>
								</tr>
							<?php }?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >MRIN No</td>
								<td class="td-desk">:
									<a href="<?php echo base_url();?>index.php/Procurement/e_pr?pr=pending&mrinno=<?=$row->DocReferenceNo?>">
										<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
									</a>
								</td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >MRIN Date</td>
								<td class="td-desk">: <?=isset($row->DateCreated) ? date("d-m-Y",strtotime($row->DateCreated)) : ''?></td>
							</tr>
							<?php if($this->input->get('tab')==0 ){?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Recommended</td>
								<td class="td-desk"><input type="checkbox" id="chk_status1<?=$row->DocReferenceNo?>" name="chk_status" onclick="approval_po('2','<?=$row->DocReferenceNo?>');"></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Return</td>
								<td class="td-desk"><input type="checkbox" id="chk_status2<?=$row->DocReferenceNo?>" name="chk_status" onclick="approval_po('0','<?=$row->DocReferenceNo?>');"></td>
							</tr>
							<?php }elseif($this->input->get('tab')==1){?>
								<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Approve</td>
								<td class="td-desk"><input type="checkbox" id="chk_status1<?=$row->DocReferenceNo?>" name="chk_status" onclick="approval_po('2','<?=$row->DocReferenceNo?>');"></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Return</td>
								<td class="td-desk"><input type="checkbox" id="chk_status2<?=$row->DocReferenceNo?>" name="chk_status" onclick="approval_po('0','<?=$row->DocReferenceNo?>');"></td>
							</tr>
							<?php }?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Vendor</td>
								<td class="td-desk"><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Amount</td>
								<td><?=isset($row->totalPO) ? 'RM'.number_format($row->totalPO,2) : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Payment Type</td>
								<td><?=isset($row->Payment_Opt) ? $row->Payment_Opt : ''?></td>
							</tr>
							<?php if($this->input->get('tab') !=2){?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Justification</td>
								<td class="td-desk"><?=isset($row->ApprCommentsx) ? $row->ApprCommentsx : ''?></td>
							</tr>
							<?php }?>
									<?php endforeach;?>
								
							<?php }else{?>
							<tr align="center" style="height:200px; background:white;">
								<td colspan="" class="default-NO">
									NO <?php if($tulis == "All MRIN" ){ echo "MRIN";}else{ echo $tulis;}?> FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="9">
				</td>
			</tr>
		</table>
	</div>
</div>
</td>
</tr>
</table>
</body>
<script>
	function recommend_po(action, mrin) {
	$.ajax({
		url: 'recommendPO',
                    type: "POST",
                    dataType: "json",
					data: { action: action, mrin: mrin },
                    success:function(data) {
					  document.getElementById("chk_status").disabled = true;
                    }
                });
	document.getElementById("chk_status1"+mrin).disabled = true;
	document.getElementById("chk_status2"+mrin).disabled = true;
 }

 function approval_po(action, mrin) {
	if(action==2){
  var r = confirm("Approve "+mrin +"?");
  if (r == true) {
    approvalJSON(action, mrin);
  } }else{
	approvalJSON(action, mrin);
  }
	
 }

 function approvalJSON(action, mrin){
	$.ajax({
		url: 'approvalPO',
                    type: "POST",
                    dataType: "json",
					data: { action: action, mrin: mrin },
                    success:function(data) {
					  document.getElementById("chk_status").disabled = true;
                    }
                });
	document.getElementById("chk_status1"+mrin).disabled = true;
	document.getElementById("chk_status2"+mrin).disabled = true;
 }
</script>
<script src="<?php echo base_url(); ?>/js/backtotop.js"></script>
</html>
