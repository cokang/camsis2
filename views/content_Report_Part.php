<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> Stock Part </div>
		<button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<div class="form">
		<?php $numrow=1;foreach($assetrec as $rows): ?>
		<?php if ($numrow == 1 OR $numrow%23==1) { ?>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:150px; height:50px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP HOUSEKEEPING SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b>Stock Part</b></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
		</table>
		<div id="Instruction" >
		<center>View List : 

		<form action="" method="GET">

		<?php 
		 foreach ($record as $row){
		 	$stock_part['Select Item Name'] = 'Select Item Name';
		 	$stock_part[$row->ItemName] = $row->ItemName;
		 }
          	$stockpart = "stockpart";
			$fy = $this->input->post($stockpart);
        ?>
              <?php echo form_dropdown($stockpart, $stock_part, set_value($stockpart,(!empty($fy) ? $fy : 'Select Stock Part')) , 'class="dropdown" style="width: 300px;"'); ?>

		<input type="submit" value="Apply" onclick="javascript: submit()">

		</form>

		<table class="tbl-wo" border="0" align="center">
		<tr style="background:#B3130A;">
			<td width="3%" height="30px">
			<a href="?y=<?= $year-1?>&m=<?= $month?>&stockpart=<?= $item ?>"><img src="http://192.168.1.142/fms/images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
			</td>
			<td width="3%">
			<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&stockpart=<?= $item ?>"><img src="http://192.168.1.142/fms/images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
			</td>
			<td width="88%" align="center">
			<b><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></b>
			</td>
			<td width="3%">
			<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&stockpart=<?= $item ?>"><img src="http://192.168.1.142/fms/images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
			</td>
			<td width="3%">
			<a href="?y=<?= $year+1?>&m=<?= $month?>&stockpart=<?= $item ?>"><img src="http://192.168.1.142/fms/images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
			</td>
		</tr>
	</table>
	<?php } ?>
		</div>
		<?php if ($item <> '') { ?>
		<?php if ($countarray <> 0) { ?>
		<?php if ($numrow==1 OR $numrow%23==1) { ?>
	<table class="tftable2" border="1" style="text-align:center;" align="center">
		 <tr class="greyii">
		    <th colspan="8" class="td-r"><?= $item ?> - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> Transaction</th>
		  </tr>
		  <tr class="greyii">
		  	<th class="td-r">No</th>
			<th class="td-r">Transaction Date</th>
			<th class="td-r">Documentation</th>
			<th class="td-r">User</th>
			<th class="td-r">In</th>
			<th class="td-r">Out</th>
			<th class="td-r">Balance</th>
			<th class="td-r">Remark</th>
		  </tr>
		<?php } ?>
		  	
		  	
		  	<?php
			is_numeric($rows->Qty_Before) ? $Qty_Before = $rows->Qty_Before : $Qty_Before = 0;
			is_numeric($rows->Qty_Taken) ? $Qty_Taken = $rows->Qty_Taken : $Qty_Taken = 0;
			is_numeric($rows->Qty_Add) ? $Qty_Add = $rows->Qty_Add : $Qty_Add = 0;
			$Qty_Bal = $Qty_Before + $Qty_Add - $Qty_Taken;
			?>
			<tr>
				<td><?= $numrow ?></td>
				<td><?= date_format(new DateTime($rows->Time_Stamp), 'd-m-Y H:i:s') ?></td>
				<td><?= $rows->Related_WO ?></td>
				<td><?= $rows->Last_User_Update ?></td>
				<td><?= $Qty_Add ?></td>
				<td><?= $Qty_Taken ?></td>
				<td><?= $Qty_Bal ?></td>
				<td><?= $rows->Remark ?></td>
			</tr>
			<?php $numrow++ ?>

			<?php if (($numrow-1)==$countarray){ ?>
			<?php $lastrow=$numrow ?>
			<?php for ($x = 0; $x <= (23 - ($lastrow%23)); $x++) { ?>
			<?php $numrow++ ?>
			<tr>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
			</tr>
			<?php  } ?>
			<?php  } ?>

			<?php } else {?>
			<table class="tftable2" border="1" style="text-align:center;" align="center">
			<tr align="center" style="height:500px;">
				<td colspan="8"><b>NO TRANSACTION FOUND FOR <?= $item ?> - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></b></td>
			</tr>
			<?php } ?>
			<?php } else {?>
			<table class="tftable2" border="1" style="text-align:center;" align="center">
			<tr align="center" style="height:500px;">
				<td colspan="8"><b>NO TRANSACTION FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></b></td>
			</tr>
			<?php } ?>
			<?php if (($numrow-1)%23==0) { ?>
	</table>
	<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center"><span style="font-weight:bold;">&nbsp;</span></td>
			</tr>
	</table>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } ?>
	<?php endforeach; ?>
	</body>
</html>

