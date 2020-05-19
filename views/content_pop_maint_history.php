<body style="margin:0px;">
<table class="tftable" border="0" style="text-align:center;">
	<tr align="center">
		<th>No</th>
		<th>Asset Number</th>
		<th>Request No</th>
		<th>Date Req</th>
		<th>Labour Cost (RM)</th>
		<th>Parts Cost (RM)</th>
		<th>Total Cost (RM)</th>
		<th>Part No</th>
	</tr><?php $numrow=1; foreach ($record as $row): ?>
	<tr align="center">
		<?php $laborCost= $row->n_Total1 +  $row->n_Total2 +$row->n_Total3;?>
		<td ><?= $numrow ?></td>
		<td><?= $row->V_Tag_no ?></td>
		<td><?= $row->V_Request_no ?></td>
		<td><?= date("d/m/Y H:i:s", strtotime($row->D_date)) ?></td>
		<td><?= $laborCost ?></td>
		<td><?= $row->n_PartTotal!=null?$row->n_PartTotal:0 ?></td>
		<td><?= ($row->n_PartTotal!=null?$row->n_PartTotal:0)  + $laborCost ?></td>
		<td><?= $row->v_PartName ?></td>
		<?php $numrow++ ?>
		
	</tr><?php endforeach; ?>
</table>
</body>
