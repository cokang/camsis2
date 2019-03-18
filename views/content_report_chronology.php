<style type="text/css">
	.middle_report_tbl .tbl td{
		font-weight: bold;
	}

</style>
<body>
	<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()" style="width:10%;">Back</button>
	
	<!-- <div class="header_report_main"> MONTHLY RCM PERFORMANCE MORE THEN 15 DAYS REPORT</div> -->
	<div class="middle_report_main">
		<table class="middle_report_tbl">
			<!-- <tr>
				<th colspan="27" class="middle_report_tbl_tr">RCM > 15 days</th>
			</tr> -->
			<tr>
				<th>Count of Summary Rootcause 01 03 19</th>
				<th colspan="3">Area</th>
				<th></th>
			</tr>
			<tr>
				<th>Summary Rootcause </th>
				<th>JOH</th>
				<th>MKA</th>
				<th>NS</th>
				<th>Grand Total</th>
			</tr>
	     <?php $johor=0;?>
	     <?php $mka=0;?>
	     <?php $ns=0;?>
	     <?php $total=0;?>
	     <?php $entire=0;?>
        <?php foreach($det as $row):?>
		<?php $total=$row->negeri['JOH'] + $row->negeri['MKA'] + $row->negeri['NS']; ?>
		<tr>
				<td><?=$row->nama;?></td>
				<td><?=($row->negeri['JOH'] <> 0) ? anchor ('contentcontroller/summary_chonology?id='.$row->id.'&loc=JOH', $row->negeri['JOH']) :'-' ;?></td>				
				<td><?=($row->negeri['MKA'] <> 0) ? anchor ('contentcontroller/summary_chonology?id='.$row->id.'&loc=MKA',$row->negeri['MKA']) :'-' ;?></td>				
				<td><?=($row->negeri['NS'] <> 0) ? anchor ('contentcontroller/summary_chonology?id='.$row->id.'&loc=NS',$row->negeri['NS']) :'-' ;?></td>				
				<td><?=($total <> 0) ? anchor ('contentcontroller/Summary_chonology?id='.$row->id.'&loc=NULL',$total) : '0'; ?></td>
				<?php $johor += $row->negeri['JOH'];?>
				<?php $mka += $row->negeri['MKA'];?>
				<?php $ns += $row->negeri['NS'];?>
				<?php $entire +=  $total;?>
				
	</tr>
	<?php endforeach; ?>
			
			<tr class="tbl">
				<td>Grand Total</td>
				<td><?=($johor <> 0) ? anchor ('contentcontroller/summary_chonology?id=ALL&loc=JOH',$johor) : '-' ; ?></td>
				<td><?=($mka <> 0) ? anchor ('contentcontroller/summary_chonology?id=ALL&loc=MKA',$mka) : '-' ; ?></td>
				<td><?=($ns <> 0) ? anchor ('contentcontroller/summary_chonology?id=ALL&loc=NS',$ns) : '-' ; ?></td>
				<td><?=($entire <> 0) ? anchor ('contentcontroller/summary_chonology', $entire) : '-'; ?></td>
			</tr>



		</table>
	</div>
</body>
<html>