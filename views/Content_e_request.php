<div class="ui-middle-screen">
<div class="div-p"></div>
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/IntlTableSort.css">
<script src="<?php echo base_url(); ?>/js/IntlTableSort.js"></script>
<script src="<?php echo base_url(); ?>/js/IntlTableSort.DateTime.js"></script>
<script src="<?php echo base_url(); ?>/js/IntlTableSort.String.js"></script>
<script src="<?php echo base_url(); ?>/js/IntlTableSort.Number.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/backtotop.css">

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<!-- <div class="main-box">
	<div class="box7">
	<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor);?>
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p>New PO</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('Procurement/po_follow_up2?po=3&powhat=update&tab=1111','<span class="ui-left_web">Proceed <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div> -->

	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
<?php
$procument = $this->input->get('tab');
switch ($procument) {
    case "1":
        $tulis = "Payment Process";
        break;
    case "2":
        $tulis = "Completed PO";
        break;
    default:
        $tulis = "PO Listing";
}
$req_type = array('0' => 'RCM',
								'1' => 'PPM', 
								'2' => 'TPS',
								'3' => 'RIW',
								'4' => 'FMI',
								'5' => 'JIT'); ?>
			<?php include 'content_po_tab.php';?>
			<tr class="ui-color-desk desk2">
				<td colspan="4" class="t-header" style="color:black; height:40px; padding-left:10px;"><b><?= $tulis ?></b> <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr class="ui-color-desk bg-red-blood">
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
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="4" style="background-color: #fffefc;" valign="top" >
					<table class="ui-content-middle-menu-workorder2 ui-landscape sortable" width="100%">
					<thead>
						<?php if ($procument > 0) {?>
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;">
							<th onclick="numberTableSort(this,true)">&nbsp;</th>
							<th onclick="tableSort(this)" style="text-align:left;">PO Reference No</th>
							<th onclick="tableSort(this)">Payment Type</th>
							<?php if ($procument == "1") { ?>
							<th onclick="tableSort(this)">Status</th> <?php }  else {?>
							<th onclick="dateTimeTableSort(this,'Date')">Issue Date</th>
							<th onclick="tableSort(this)">Status</th><?php } ?>
							<th onclick="tableSort(this)">Vendor</th>
						</tr>
					<?php } else { ?>
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;">
							<th onclick="numberTableSort(this,true)">&nbsp;</th>
							<th onclick="tableSort(this)" style="text-align:left;">PO No</th>
							<th onclick="dateTimeTableSort(this,'Date')">PO Date</th>
							<th onclick="tableSort(this)" >Request Type</th>
							<th onclick="tableSort(this)" >Vendor</th>
							<th onclick="dateTimeTableSort(this,'Date')">PO Approval Date</th>
							<th onclick="dateTimeTableSort(this,'Date')">Payment Approval Date</th>
							<th>Return</th>
							<th onclick="tableSort(this)">Payment Status</th>
							<th onclick="dateTimeTableSort(this,'Date')">PO Closing Status</th>
						</tr>
					<?php }?>
					</thead>
						<style>
							.ui-content-middle-menu-workorder2 tr th {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td.td-desk a{ font-weight:bold; font-size:14px;}
						</style>
						<?php if ($polist) { ?>
						<?php $numrow = 1;
						if ($procument > 0) {
						foreach ($polist as $row):?>
						<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
							<td class="td-desk"><?=$numrow++?></td>
							<td class="td-desk" style="text-align:left;">
								<a href="<?php echo base_url();?>index.php/Procurement/po_follow_up2?tab=0&po=<?=isset($row->PO_No) ? $row->PO_No : ''?>"><?=isset($row->PO_No) ? $row->PO_No : ''?></a>
							</td>
							<td class="td-desk"><?=isset($row->paytype) ? $row->paytype : 'NA'?></td>
							<?php $status_pay = array(
													'0' => 'Processing',
													'1' => 'MD Auth',
													'2' => 'Hold',
													'3' => 'Return'
												);
								if ($procument == "1") {
									$confim = "";
									$js = 'id="mrtgCusName" onChange="alert(\\"Hello World\");"';
							?>
							<td class="td-desk">
								<?=form_dropdown('n_status_pay', $status_pay ,$row->Statusc, 'id= "' . $row->PO_No . '" class="dropdown n_wi-date2" onChange="myFunction(\'' .$row->PO_No. '\');" '.$confim.'');?>
							</td>
								<?php }  else {?>
							<td class="td-desk"><?=isset($row->PO_Date) ? $row->PO_Date : ''?></td>
							<td class="td-desk">
								<?php if ($procument != "2") {echo isset($status_pay[$row->Statusc]) ? $status_pay[$row->Statusc] : '';} else {echo "Completed";}?>
							</td>
								<?php } ?>
							<td class="td-desk"><?=isset($row->vendor) ? $row->vendor : ''?></td>
						</tr>
						<?php endforeach;
					} else {
					foreach ($polist as $row):?>
					<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
						<td class="td-desk"><?=$numrow++?></td>
						<td class="td-desk" style="text-align:left;">
							<a href="<?php echo base_url();?>index.php/Procurement/po_follow_up2?tab=0&powhat=update&po=<?=isset($row->PO_No) ? $row->PO_No : ''?>"><?=isset($row->PO_No) ? $row->PO_No : ''?></a>
						</td>
						<td class="td-desk"><?=isset($row->PO_Date) ? date('d-m-Y',strtotime($row->PO_Date)) : ''?></td>
						<td class="td-desk"><?=isset($row->ReqCase) ? $req_type[$row->ReqCase] : 'NA'?></td>
						<td class="td-desk"><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : 'NA'?></td>
						<td class="td-desk"><?=isset($row->paytype) ? $row->paytype : 'NA'?></td>
						<?php $status_pay = array(
												'0' => 'UNPAID',
												'1' => 'PAID',
												// '2' => 'Hold',
												// '3' => 'Return'
											);
							if ($procument == "1") {
								$confim = "";
								$js = 'id="mrtgCusName" onChange="alert(\\"Hello World\");"';
						?>
						<td class="td-desk">
							<?=form_dropdown('n_status_pay', $status_pay ,$row->Statusc, 'id= "' . $row->PO_No . '" class="dropdown n_wi-date2" onChange="myFunction(\'' .$row->PO_No. '\');" '.$confim.'');?>
						</td>
							<?php }  else {?>
						<td class="td-desk"><?=isset($row->Date_Completed) ? date('d-m-Y',strtotime($row->Date_Completed)) : 'NA'?></td>
						<td class="td-desk"><input  type="checkbox" id="chk_status1<?=$row->MIRN_No?>" name="chk_status" onclick="return_po('<?=$row->MIRN_No?>','<?=$row->PO_No?>');"></td>
						<td class="td-desk">
							<?php if ($procument != "2") {echo isset($status_pay[$row->Statusc]) ? $status_pay[$row->Statusc] : '';} else {echo "Completed";}?>
						</td>
							<?php } ?>
						<td class="td-desk"><?=isset($row->vendor) ? $row->vendor : ''?></td>
					</tr>
					<?php endforeach;

					}

						} else {?>
						<tr align="center" style="height:200px; background:white;">
							<td colspan="10" class="default-NO">NO PO FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
						</tr>
						<?php } ?>
					</table>

					<table class="ui-portrait" style="color:black;">
						<tbody style="width: 100%;">
						<?php if ($polist) { ?>
						<?php $rownum = 1; foreach ($polist as $row):?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>No</td>
								<td class="td-desk">: <?=$rownum;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >PO Reference No</td>
								<td class="td-desk">:
									<a href="<?php echo base_url();?>index.php/Procurement/po_follow_up2?tab=0&powhat=update&po=<?=isset($row->PO_No) ? $row->PO_No : ''?>"><?=isset($row->PO_No) ? $row->PO_No : ''?></a>
								</td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Payment Type</td>
								<td class="td-desk">: <?=isset($row->paytype) ? $row->paytype : 'NA'?></td>
							</tr>
							<?php if ($procument == "1") { ?>
									$confim = "";
									$js = 'id="mrtgCusName" onChange="alert(\\"Hello World\");"';
								?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Status</td>
								<td class="td-desk">:
									<?=form_dropdown('n_status_pay', $status_pay ,$row->Statusc, 'id= "' . $row->PO_No . '" class="dropdown n_wi-date2" onChange="myFunction(\'' .$row->PO_No. '\');" '.$confim.'');?>
								</td>
							</tr>
								<?php }else{?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Issue Date</td>
								<td class="td-desk">: <?=isset($row->PO_Date) ? $row->PO_Date : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Status</td>
								<td class="td-desk">:
									<?php if ($procument != "2") {echo isset($status_pay[$row->Statusc]) ? $status_pay[$row->Statusc] : '';} else {echo "Completed";}?>
								</td>
							</tr>
								<?php } ?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Vendor</td>
								<td class="td-desk">: <?=isset($row->vendor) ? $row->vendor : ''?></td>
							</tr>
						<?php endforeach;?>
						<?php }else{?>
							<tr align="center" style="height:200px; background:white;">
								<td colspan="2" class="default-NO">NO PO FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>
		</table>
	</div>
</div>
</body>
<script>
function myFunction(nilai) {
		var nameValue = document.getElementById(nilai).value;
		//var nameValue = "lalalalala";
    //alert('lalalalallala : '+nameValue+":"+nilai+'<?php echo base_url('index.php/ajaxpo'); ?>');

		$.post("<?php echo base_url('index.php/ajaxpo'); ?>",
        {
          poape: nilai,
          nilaidier: nameValue
        },
        function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
        });


 //alert('sucess');
}
function return_po( mrin, po){
	$.ajax({
		url: 'return_PO',
                    type: "POST",
                    dataType: "json",
					data: {  mrin: mrin, po: po },
                    success:function(data) {
					//   document.getElementById("chk_status").disabled = true;
                    }
                });
	document.getElementById("chk_status1"+mrin).disabled = true;
	// document.getElementById("chk_status2"+mrin).disabled = true;
 }
</script>
<script src="<?php echo base_url(); ?>/js/backtotop.js"></script>
</html>
