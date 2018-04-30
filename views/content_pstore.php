<?php $i=6;?>
<div class="ui-middle-screen">
	<div class="main-box">
		<?php if (!in_array("contentcontroller/store_item_new", $chkers)) { ?>
		<div class="box">
			<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue', 'bg-orange'); shuffle($autocolor); ?>
			<div class="small-box <?php echo $autocolor[0];?>">
				<div class="inner2" >
					<p>New Part</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('contentcontroller/store_item_new','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
		<?php  }else{ $i = $i-1; } ?>
		<?php if (!in_array("contentcontroller/Report_Part", $chkers)) { ?>
		<div class="box">
			<div class="small-box <?php echo $autocolor[1];?>">
				<div class="inner2" >
					<p>Report Part</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('contentcontroller/Report_Part','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
		<?php  }else{ $i = $i-1; } ?>
		<?php if (!in_array("contentcontroller/vendor_reg", $chkers)) { ?>
		<div class="box">
			<div class="small-box <?php echo $autocolor[2];?>">
				<div class="inner2" >
					<p>Vendor Reg</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('contentcontroller/vendor_reg','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
		<?php  }else{ $i = $i-1; } ?>
		<?php if (in_array("contentcontroller/vendor_reg_update", $chkers)) { ?>
		<div class="box">
			<div class="small-box <?php echo $autocolor[3];?>">
				<div class="inner2" >
					<p>Vendor Reg Update</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('contentcontroller/vendor_reg_update','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
		<?php  }else{ $i = $i-1; } ?>
		<?php if (!in_array("contentcontroller/new_item", $chkers)) { ?>
		<div class="box">
			<div class="small-box <?php echo $autocolor[4];?>">
				<div class="inner2" >
					<p>New Item</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('contentcontroller/new_item','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
		<?php  }else{ $i = $i-1; } ?>
		<?php if (!in_array("contentcontroller/bar_code", $chkers)) { ?>
		<div class="box">
			<div class="small-box <?php echo $autocolor[5];?>">
				<div class="inner2" >
					<p>Bar Code</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('contentcontroller/bar_code','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
		<?php  }else{ $i = $i-1; } ?>
		
	</div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="11"><b>Parts Catalog</b></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" class="assets-headear">Stock Part Catalog</td>
			</tr>
			<?php foreach($record as $row): ?>			  			
	    	<tr class="asset-ajax">
				<td colspan="3">
				<div class="asset1"> 
					<span class="icon-play"></span>
				</div>
				<div class="asset2">
					
					<a href="javascript:void(0);" onclick="javascript:fToggle('<?=$row->ItemCode?>');"><b><?= isset($row->ItemName) ? $row->ItemName : '' ?></b></a>
					&nbsp;&nbsp;&nbsp;<?= isset($row->ItemCode) ? $row->ItemCode : '' ?>&nbsp;&nbsp;&nbsp;
					<span class="FieldLabel">( <?= isset($row->Qty) ? $row->Qty : '' ?> )</span>
					<?php foreach ($pricerec as $key): ?>
					<?php foreach ($key as $val): ?>
					<?php if($val->ItemCode == $row->ItemCode) { ?><!--&store=<?=$this->session->userdata('hosp_code')?>--> <!--originalcode-->
					<a href="ustore?id=<?= $row->ItemCode ?>&qty=<?= $row->Qty ?>&n=<?= $row->ItemName ?>&p=<?= $val->Price ?>&act=take&store=<?=$this->session->userdata('hosp_code')?>" name="pstake" class="plus"><span class="icon-plus c-plus"></span>Take</a> 
					<a href="ustore?id=<?= $row->ItemCode ?>&qty=<?= $row->Qty ?>&n=<?= $row->ItemName ?>&p=<?= $val->Price ?>&act=add&store=<?=$this->session->userdata('hosp_code')?>" name="psadd" class="plus"><span class="icon-plus c-plus"></span>Add</a>
					&nbsp;<a href="<?php echo base_url();?>index.php/contentcontroller/stockDtail?id=<?= $row->ItemCode ?>"   style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/information.png" style="width:21px; height:21px; position:absolute;" title="information"></a>
					
					<!--<span class="FieldLabel plusprice">Price RM<?= number_format($val->Price,2) ?></span> -->
					<?php } ?>
					<?php endforeach; ?>
					<?php endforeach; ?>

				</div>
					<table id="<?=$row->ItemCode?>" style="display:none; margin:10px;" border="0" class="ui-content-middle-menu-workorder" width="98%">
						<tr class="">
							<td class=""colspan="" style="" valign="top" height="25px">
								<table class="ui-content-middle-menu-workorder3 ui-left_web" width="100%" height="25px">
									<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
										<th colspan="8">Five Latest Transaction</th>
									</tr>
									<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
										<th>No</th>
										<th>Transaction Date</th>
										<th>Documentation</th>
										<th>User</th>
										<th>In</th>
										<th>Out</th>
										<th>Balance</th>
										<th>Remark</th>
									</tr>
									<?php foreach ($assetrec as $key): ?>
									<?php $numrow=1;foreach ($key as $rows): ?>
									<?php if ($rows->ItemCode == $row->ItemCode) { ?>
									<?php
									is_numeric($rows->Qty_Before) ? $Qty_Before = $rows->Qty_Before : $Qty_Before = 0;
									is_numeric($rows->Qty_Taken) ? $Qty_Taken = $rows->Qty_Taken : $Qty_Taken = 0;
									is_numeric($rows->Qty_Add) ? $Qty_Add = $rows->Qty_Add : $Qty_Add = 0;
									$Qty_Bal = $Qty_Before + $Qty_Add - $Qty_Taken;
									?>
									
									<tr class="" style="color:black; font-size:12px; text-align:center;">
										<td><?= $numrow ?></td>
										<td><?= date_format(new DateTime($rows->Time_Stamp), 'd-m-Y H:i:s') ?></td>
										<td><?= $rows->Related_WO ?></td>
										<td><?= $rows->Last_User_Update ?></td>
										<td><?= $Qty_Add ?></td>
										<td><?= $Qty_Taken ?></td>
										<td><?= $Qty_Bal ?></td>
										<td><?= $rows->Remark ?></td>
									</tr>
									<?php } ?>
									
									<?php $numrow++ ?>
									<?php endforeach; ?>
									<?php endforeach; ?>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php endforeach; ?>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>					
		</table>
	</div>		
</div>
<?php include 'content_jv_popup.php';?>

<script language="javascript" type="text/javascript">

	var i = "<?=$i?>";
	$(".box").attr("class","box"+i);
	
	function fToggle(elementId) {
	
		var e = document.getElementById(elementId);
		if ( !e.style.display || e.style.display != "none" ) {
			e.style.display = "none";
			 
		} else {
			e.style.display = "block";
			
		}
	}

</script>