
<div class="ui-middle-screen">
<?php include 'content_tab_qap3.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="80%" align="center">
			<?php include 'content_tab_qap3_assets.php';?>
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color assets-headear" colspan="3" style="padding-left:10px;"><b>Asset With No SIQ <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></b><br /><span style="font-size:14px;"><i>The following assets were evaluated for SIQ but no shortfall in quality found.</i></span></td>
			</tr>
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&tab=1&asst=1"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&tab=1&asst=1"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&tab=1&asst=1"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&tab=1&asst=1"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td style="" width="" colspan="12" valign="top" align="center">
					<!--web-->
					<div class="ui-left_web wrap">
					<?php if ($validPeriod == 'true') { ?>
					<table class="ui-desk-style-table" style="color:black; background:white; text-align:center;" cellpadding="4" cellspacing="0" width="100%">      			
	    				<tr class="ui-menu-color-header" style="color:white; font-weight:;" align="center">
							<td>&nbsp;</td>
							<td>Type Code </td>
							<td>Asset Number </td>
							<td>Commission Date</td>
							<td>Age</td>
							<td>Uptime vs TRPI</td>
							<td>Status </td>
						</tr>
						<tr align="center" style=" font-size:12px; font-weight:;">
						<?php foreach($records as $row):?>  
	    				<?php 
	    				$Uptime_pct = $row->uptime_pct;
	    				$trpi = $row->trpi;
	    				$DownTime = 100 - $Uptime_pct;
	    				
	    				if ($Uptime_pct < $trpi){
	    					$target = $trpi - $Uptime_pct;
	    				}
	    				else{
	    					$target = 0;
	    				}

	    				$Basis = 10;
	    				$UptimeWidth = ($Uptime_pct * 0.1) * $Basis;

	    				if ($target > 0){
	    					$TargetWidth = ($target * 0.1) * $Basis;
	    				}
	    				$BarWidth = (100 * 0.1) * $Basis;
	    				?>  
	    					<!--<?= $numrow%2==0 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>-->
	    					<?= $numrow%2==0 ? '<tr class="ui-color-color-color item" id="item-<?php echo $numrow?>">' : '<tr class="item" id="item-<?php echo $numrow?>">'; ?>
							<td><?=$numrow ?></td>
							<td><?= isset($row->type_code) ? $row->type_code : '' ?></td>
							<td><?php echo anchor ('contentcontroller/assetupdate?asstno='.$row->asset_no,''.$row->asset_no.'' ) ?></td>
							<td><?= isset($row->purchase_date) ? date_format(new DateTime($row->purchase_date), 'd-m-Y') : '' ?></td>
							<td><?=isset($row->asset_age) ? $row->asset_age : '' ?></td>
							<?php if ($target > 0) { ?>
							<td><div><center><table cellpadding="0" cellspacing="0" style="background-color:;border-collapse: collapse;"><tr width="35"><td style="font-size:7.5pt;color:#FF0000;"><?php echo $Uptime_pct ?>%&nbsp;</td><td nowrap width="<?php echo $BarWidth ?>" style="border:0px solid #aaaaaa;"><img src="<?php echo base_url(); ?>images/barchtpink.gif" width="<?php echo $UptimeWidth ?>" height="12"><img src="<?php echo base_url(); ?>images/barchtgrey.gif" width="<?php echo $TargetWidth ?>" height="12"></td><td style="font-size:7.5pt;color:#888888;">&nbsp;<?php echo $trpi ?>%</td></tr></table></center></div></td>
							<?php } else { ?>
							<td><div><center><table cellpadding="0" cellspacing="0" style="background-color:;border-collapse: collapse;"><tr width="35"><td style="font-size:7.5pt;color:#FF0000;"><?php echo $Uptime_pct ?>%&nbsp;</td><td nowrap width="<?php echo $BarWidth ?>" style="border:0px solid #aaaaaa;"><img src="<?php echo base_url(); ?>images/barchtgreen.gif" width="<?php echo $UptimeWidth ?>" height="12"></td><td style="font-size:7.5pt;color:#888888;">&nbsp;<?php echo $trpi ?>%</td></tr></table></center></div></td>
							<?php } ?>
							<td><?= strpos($row->siquptime_status,'uptime with trpi') > 0 ? 'SIQ: TRPI target met.' : $row->siquptime_status ?></td>
						</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
						<?php } else { ?>
						<?php  if (strtotime($year . '-' . $month . '-01') > strtotime('2008-09-01')) { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" colspan="12">
						<span style="color:red; text-transform: uppercase; font-size:14px; display:table-cell; text-align:center; vertical-align:middle; width:98%;">NO SIQ EVALUATION HAS BEEN DONE FOR THIS MONTH.</span>
						<?php } else { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" colspan="12">
						<span style="color:red; text-transform: uppercase; font-size:14px; display:table-cell; text-align:center; vertical-align:middle; width:98%;">NO SIQ HAS BEEN GENERATED ON THIS MONTH.</span>
						<?php } ?>
						<?php } ?>
						</td>
						</tr>
					</table>
					<?php if (isset($next)): ?>
					<div class="nav">
						<a href='?p=<?php echo $next?>&numrow=<?php echo $numrow?>'>Next</a>
					</div>
					<?php endif?>
					</div>
					<!--endweb-->

					<!--mobile-->
					<div class="ui-left_mobile">
						<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php if ($validPeriod == 'true') { ?>
						<?php $numrow = 1;foreach($records as $row):?>  
	    				<?php 
	    				$Uptime_pct = $row->uptime_pct;
	    				$trpi = $row->trpi;
	    				$DownTime = 100 - $Uptime_pct;
	    				
	    				if ($Uptime_pct < $trpi){
	    					$target = $trpi - $Uptime_pct;
	    				}
	    				else{
	    					$target = 0;
	    				}

	    				$Basis = 10;
	    				$UptimeWidth = ($Uptime_pct * 0.1) * $Basis;

	    				if ($target > 0){
	    					$TargetWidth = ($target * 0.1) * $Basis;
	    				}
	    				$BarWidth = (100 * 0.1) * $Basis;
	    				?>  
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$numrow?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >Type Code </td>
								<td class="td-desk">: <?= isset($row->type_code) ? $row->type_code : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Asset Number</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/assetupdate?asstno='.$row->asset_no,''.$row->asset_no.'' ) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Commission Date</td>
								<td class="td-desk" valign="top">: <?= isset($row->purchase_date) ? date_format(new DateTime($row->purchase_date), 'd-m-Y') : '' ?></td>
							</tr>
							
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Age</td>
								<td valign="top">: <?=isset($row->asset_age) ? $row->asset_age : '' ?></td>
							</tr>
							<?php if ($target > 0) { ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Uptime</td>
							<td> : <span style="color:red;"><?php echo $BarWidth ?> %</span></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>TRPI</td>
							<td> : <span style="color:red;"><?php echo $trpi ?> % </span></td>
							</tr>
							<?php } else { ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Uptime</td>
							<td> : <span style="color:red;"><?php echo $Uptime_pct ?> % </span></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>TRPI</td>
							<td> : <span style="color:red;"><?php echo $trpi ?> % </span></td>
							</tr>
							<?php } ?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Status</td>
							<td> : <?= strpos($row->siquptime_status,'uptime with trpi') > 0 ? 'SIQ: TRPI target met.' : $row->siquptime_status ?></td>
							</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
						<?php } else { ?>
						<?php  if (strtotime($year . '-' . $month . '-01') > strtotime('2008-09-01')) { ?>
						<tr>
						<td align="center" style="height:200px;" colspan="2" class="default-NO">
						NO SIQ EVALUATION HAS BEEN DONE FOR THIS MONTH.
						<?php } else { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" colspan="2" class="default-NO">
						NO SIQ HAS BEEN GENERATED ON THIS MONTH.
						<?php } ?>
						<?php } ?>
						</td>
						</tr>
					</table>
					</div>
					<!--endmobile-->
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="10">
				</td>
			</tr>
		</table>
	</div>
</div>
<style>
table.g-raftkck tr td{
	height:40px;
	font-size: 18px;
}

</style>
<script type="text/javascript">
    $(document).ready(function() {
    	// Infinite Ajax Scroll configuration
        jQuery.ias({
            container : '.wrap', // main container where data goes to append
            item: '.item', // single items
            pagination: '.nav', // page navigation
            next: '.nav a', // next page selector
            loader: '<img src="<?php echo base_url(); ?>images/ajax-loader.gif"/>', // loading gif
            triggerPageThreshold: <?php echo ($rec[0]->jumlah / $limit) ?>  // show load more if scroll more than this
        });
    });
</script>