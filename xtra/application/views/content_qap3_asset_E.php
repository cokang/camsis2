
<div class="ui-middle-screen">
<?php include 'content_tab_qap3.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="80%" align="center">
<?php include 'content_tab_qap3_assets.php';?>
			<tr class="" height="40px" style="color:white;">
				<td class="ui-middle-color assets-headear" colspan="3" style="padding-left:10px;"><b>Assets Excluded from SIQ Evaluation <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></b><br /><span style="font-size:14px;"><i>The following assets were excluded from SIQ evaluation.</i></span></td>
			</tr>
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&tab=1&asst=2"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&tab=1&asst=2"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&tab=1&asst=2"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&tab=1&asst=2"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
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
	    				<tr class="ui-menu-color-header" style="color:white;" align="center">
							<td>&nbsp;</td>
							<td>Type Code </td>
							<td>Asset Number</td>
							<td align="left">Status</td>
						</tr>
						<tr align="center">
							<?php foreach($records as $row):?> 
							<!--<?= $numrow%2==0 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>-->
							<?= $numrow%2==0 ? '<tr class="ui-color-color-color item" id="item-<?php echo $numrow?>">' : '<tr class="item" id="item-<?php echo $numrow?>">'; ?>
							<td><?=$numrow?></td>
							<td><?= isset($row->type_code) ? $row->type_code : '' ?></td>
							<td><?php echo anchor ('contentcontroller/assetupdate?asstno='.$row->asset_no,''.$row->asset_no.'' ) ?></td>
							<td align="left"><?= isset($row->siquptime_status) ? "<span style=color:grey;>".$row->siquptime_status."</span>" : '' ?></td>
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
				</div>
				<!--endweb-->

				<!--mobile-->
				<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php if ($validPeriod == 'true') { ?>
							<?php $numrow=1; foreach($records as $row):?> 
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$numrow?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >Type Code </td>
								<td class="td-desk">: <?=isset($row->type_code) ? $row->type_code : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Asset Number</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/assetupdate?asstno='.$row->asset_no,''.$row->asset_no.'' ) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Status</td>
								<td class="td-desk" valign="top">: <span style="display:inline-block; width:95%;"><?= isset($row->siquptime_status) ? "<span style=color:grey;>".$row->siquptime_status."</span>" : '' ?></span></td>
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