<?php $i=6;$r=0;?>
<style>
<?php if($result > $limit) { ?>
.tinggi{
height:100%;
}
<?php } ?>
</style>
<div class="ui-middle-screen">
	<div class="main-box">
		<?php $tab[0] = array("url"=>"contentcontroller/store_item_new?id=".$this->input->get('id'), "label"=>"New Part", "device"=>"web", "in"=>0);?>
		<?php $tab[1] = array("url"=>"contentcontroller/Report_Part_Menu?id=".$this->input->get('id'), "label"=>"Report Part", "device"=>"web", "in"=>0);?>
		<?php //$tab[1] = array("url"=>"contentcontroller/Report_Part?id=".$this->input->get('id'), "label"=>"Report Part", "device"=>"web", "in"=>0);?>
		<?php $tab[2] = array("url"=>"contentcontroller/vendor_reg", "label"=>"Vendor Reg", "device"=>"web", "in"=>0);?>
		<?php $tab[3] = array("url"=>"contentcontroller/vendor_reg_update", "label"=>"Vendor Reg Update", "device"=>"web", "in"=>1);?>
		<?php $tab[4] = array("url"=>"contentcontroller/new_item", "label"=>"New Item", "device"=>"web", "in"=>0);?>
		<?php $tab[5] = array("url"=>"contentcontroller/bar_code", "label"=>"Bar Code", "device"=>"web", "in"=>0);?>
		<?php $tab[6] = array("url"=>"Procurement/release_note", "label"=>"Release Note", "device"=>"web", "in"=>0);?>
		<?php $tab[7] = array("url"=>"contentcontroller/site_store_status?id=".$this->input->get('id'), "label"=>"Site Store Status", "device"=>"web", "in"=>0);?>

		<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue', 'bg-orange','bg-blue'); shuffle($autocolor); ?>

		<?php
		$activeTab = array();
		foreach($tab as $k):
			if( $k["in"] == 1){
				if( in_array($k["url"], $chkers) ){
					$activeTab[$r] = array("url"=>$k['url'], "label"=>$k['label'], "device"=>$k['device']);
				}else{
					$i = $i-1;
				}
			}else{
				if( !in_array($k["url"], $chkers) ){
					$activeTab[$r] = array("url"=>$k['url'], "label"=>$k['label'], "device"=>$k['device']);
				}else{
					$i = $i-1;
				}
			}
		$r++;
		endforeach;

		$box = "box".count($activeTab);
		$r = 0;
		foreach ($activeTab as $d) {?>
			<div class="box7">
				<div class="small-box <?php echo $autocolor[$r];?>">
					<div class="inner2" >
						<p><?=$d["label"];?></p>
					</div>
					<div class="icon"><i class="icon-file-text2"></i></div>
					<?php echo anchor ($d["url"],'<span class="ui-left_'.$d["device"].'">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
				</div>
			</div>
		<?php
		$r++;
		}
		?>


	</div>
	<div class="content-workorder">
	<div class="wrap">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="11"><b>Parts Catalog</b></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" class="assets-headear">Stock Part Catalog</td>
			</tr>
			<?php foreach($record as $row): ?>
	    	<tr class="asset-ajax item">
				<td colspan="3">
				<div class="asset1">
					<span class="icon-play"></span>
				</div>
				<div class="asset2">

					<a href="javascript:void(0);" onclick="javascript:fToggle('<?=$row->ItemCode?>');"><b><?= isset($row->ItemName) ? $row->ItemName : '' ?></b></a>
					&nbsp;&nbsp;&nbsp;<?= isset($row->ItemCode) ? $row->ItemCode : '' ?>&nbsp;&nbsp;&nbsp;
					<span class="FieldLabel">(Vendor Part No. <?=$row->PartNumber;?> , Model No. <?=$row->Model;?> ) </span>
					<span class="FieldLabel">( <?= isset($row->Qty) ? $row->Qty : '' ?> )</span>
					<?php foreach ($pricerec as $key): ?>
					<?php foreach ($key as $val): ?>
					<?php if($val->ItemCode == $row->ItemCode) { ?><!--&store=<?=$this->session->userdata('hosp_code')?>--> <!--originalcode-->
					<a href="ustore?id=<?= $row->ItemCode ?>&qty=<?= $row->Qty ?>&n=<?= $row->ItemName ?>&p=<?= $val->Price ?>&act=take&store=<?=$this->input->get('id');?>" name="pstake" class="plus"><span class="icon-plus c-plus"></span>Take</a>
					<a href="ustore?id=<?= $row->ItemCode ?>&qty=<?= $row->Qty ?>&n=<?= $row->ItemName ?>&p=<?= $val->Price ?>&act=add&store=<?=$this->input->get('id');?>" name="psadd" class="plus"><span class="icon-plus c-plus"></span>Add</a>
					<?=($row->harga <> null) ? "Price ".$row->harga : 'Price RM 0.00';?>
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
			<?php if (isset($next)): ?>
			<div class="nav">
			<a href='?id=<?=$this->input->get('id')?>&p=<?php echo $next?>&numrow=<?php echo $numrow?>'>Next</a>
			</div>
			<?php endif?>

			</td>
			</tr>

			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>
		</table>
	</div>
</div>
</div>
<?php// include 'content_jv_popup.php';?>

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
<script type="text/javascript">
    $(document).ready(function() {
	//alert('test');
    	// Infinite Ajax Scroll configuration
        jQuery.ias({
            container : '.wrap', // main container where data goes to append
            item: '.item', // single items
            pagination: '.nav', // page navigation
            next: '.nav a', // next page selector
            loader: '<img src="<?php echo base_url(); ?>images/ajax-loader.gif"/>', // loading gif
            triggerPageThreshold: <?php echo ($result / $limit) ?>  // show load more if scroll more than this
			//alert('sdasd');
        });

    });
<?php if($result > $limit) { ?>
	$(window).scroll(function() {
  $("div").removeClass("tinggi");
});
<?php } ?>
</script>
