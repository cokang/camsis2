<style type="text/css">
	.middle_report_tbl .tbl td{
		font-weight: bold;
	}

</style>
<body>
	<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()" style="width:10%;">Back</button>
	
	<div id="Instruction" >
<center>View List : 
<form method="get" action="">
<label for="from">From</label>
<input type="date" name="from" id="from" value="" class="form-control-button2 ">
<label for="to">To</label>
<input type="date" name="to" id="to" value="" class="form-control-button2 ">
 
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
	<!-- <div class="header_report_main"> MONTHLY RCM PERFORMANCE MORE THEN 15 DAYS REPORT</div> -->
	<div class="middle_report_main">
		<table class="middle_report_tbl">
			<!-- <tr>
				<th colspan="27" class="middle_report_tbl_tr">RCM > 15 days</th>
			</tr> -->
			<tr>
				<th>Count of Summary Rootcause</th>
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
			<?php $totalJOH=0;$totalMKA=0;$totalNS=0;$totalALL=0;$numrow=1; foreach($det as $row): ?>
			<tr><form method="get" action="">
				<td><?=isset($row->nama) ? $row->nama : ''?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=JOH', $row->JOH); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=MKA',$row->MKA); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=NS',$row->NS); 
				?></td>
				<td><?php echo $row->total; ?></td>
				<?php $totalALL+=$row->total;
					  $totalJOH+=$row->JOH;
					  $totalMKA+=$row->MKA;
					  $totalNS+=$row->NS; ?>
				
			</tr>
			<?php endforeach; ?>
<tr class="tbl">
				<td>Grand Total</td>
				<td><?php echo  $totalJOH; ?></td>
				<td><?php echo $totalMKA; ?></td>
				<td><?php echo $totalNS; ?></td>
				<td><?php echo $totalALL; ?></td>
			</tr>


		</table>
	</div>
	
</body>
<html>