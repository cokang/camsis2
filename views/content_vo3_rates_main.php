<div class="ui-middle-screen">
<?php include 'content_tab_vo.php';?>
<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3 ui-left_web" cellpadding="4" cellspacing="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="10"><b>Rates for During (DW) and Post (PW) Warranty</b> <span style="font-size:14px;"><i>List of all During Warranty (DW) and Post Warranty(PW) used for VO application.</i></span></td>
			</tr>	
			
			<tr class="ui-menu-color-header" style="color:white;">
				<th ></th>
				<th><?php echo anchor ('contentcontroller/vo3_rates_main?&o=0','Category') ?></th>
				<th><?php echo anchor ('contentcontroller/vo3_rates_main?&o=1','Type Code') ?></th>
				<th><?php echo anchor ('contentcontroller/vo3_rates_main?&o=2','Status') ?></th>
				<th><?php echo anchor ('contentcontroller/vo3_rates_main?&o=3','Rates DW') ?></th>
				<th><?php echo anchor ('contentcontroller/vo3_rates_main?&o=4','Rates PW') ?></th>
			</tr>
			<?php $rowno=1; foreach($records as $row):?>
			<tr align="center" <?= ($rowno%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
				<td><?=$rowno?></td>
				<td><?=isset($row->AssetCategoryCode) == TRUE ? $row->AssetCategoryCode.' '.$row->AssetCategoryDesc : 'N/A'?></td></td>
				<td><?php echo anchor ('contentcontroller/vo3_type_code?&ratesid='.$row->ratesID,''.isset($row->AssetTypeCode) == TRUE ? $row->AssetTypeCode.' '.$row->AssetTypeDesc : 'N/A'.'' ) ?></td>
				<td><?=isset($row->Status) == TRUE ? $row->Status : 'N/A'?></td>
				<td><?=isset($row->DWRate) == TRUE ? $row->DWRate : 'N/A'?></td>
				<td><?=isset($row->PWRate) == TRUE ? $row->PWRate : 'N/A'?></td>
			</tr>
			<?php $rowno++?>
		    <?php endforeach;?>
		   <tr class="ui-header-new">
				<td align="center" colspan="12">
				</td>
			</tr>
			<tr><td align="right" valign="top" colspan="6" style="font-size:14px; height:10px;">*Standard Rate : For asset value less than 2,000,000.00 the rate is 0.75%. For asset value more than 2,000,000.00 the rate is 0.05%</td></tr>
			
		</table>
		<table class="ui-mobile-table-desk ui-left_mobile" style="color:black; width:100%;">
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="t-header ui-menu-color-header" colspan="2"><b>Rates for During (DW) and Post (PW) Warranty</b> <br /><span style="font-size:14px;"><i>List of all During Warranty (DW) and Post Warranty(PW) used for VO application.</i></span></td>
			</tr>
		<?php $numrow=1; foreach($records as $row):?>
		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
			<td >No</td>
			<td class="td-desk">: <?=$numrow?></td>
		</tr>
		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
			<td >Category</td>
			<td class="td-desk">: <?=isset($row->AssetCategoryCode) == TRUE ? $row->AssetCategoryCode.' '.$row->AssetCategoryDesc : 'N/A'?></td>
		</tr>
		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
			<td >Type Code</td>
			<td class="td-desk">: <?php echo anchor ('contentcontroller/vo3_type_code?&ratesid='.$row->ratesID,''.isset($row->AssetTypeCode) == TRUE ? $row->AssetTypeCode.' '.$row->AssetTypeDesc : 'N/A'.'' ) ?></td>
		</tr>
		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
			<td >Status</td>
			<td class="td-desk">: <?=isset($row->Status) == TRUE ? $row->Status : 'N/A'?></td>
		</tr>
		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
			<td >Rates DW</td>
			<td class="td-desk">: <?=isset($row->DWRate) == TRUE ? $row->DWRate : 'N/A'?></td>
		</tr>
		<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
			<td >Rates PW</td>
			<td class="td-desk">: <?=isset($row->PWRate) == TRUE ? $row->PWRate : 'N/A'?></td>
		</tr>
		<?php $numrow++?> 			 
			<?php endforeach;?>
	</table>				
	</div>
</div>