<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">LATEST WORKORDER NUMBER</th>
	</tr>
	<tr align="center" class="tftable-tr">
		<th>Date</th>
		<th>Time</th>
		<th>Work Order</th>
		<th>Status</th>
		<th>Summary</th>
	</tr>
	<?php if ($record) { ?>
	<?php foreach($record as $row): ?>
	<tr align="center">
		<td align="center"><a href="javascript:Setasset('<?= isset($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?>')" ><?= isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : 'N/A' ?></a></td>
		<td align="center"><a href="javascript:Setasset('<?= isset($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?>')" ><?= isset($row->D_time) ? date("g:i a",strtotime($row->D_time)) : 'N/A' ?></a></td>
		<td align="center"><a href="javascript:Setasset('<?= isset($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?>')" ><?= isset($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?></a></td>
		<td align="center"><a href="javascript:Setasset('<?= isset($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?>')" ><?= isset($row->V_request_status) ? $row->V_request_status : 'N/A' ?></a></td>
		<td align="center"><a href="javascript:Setasset('<?= isset($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?>')" ><?= isset($row->V_summary) ? $row->V_summary : 'N/A' ?></a></td>
	</tr>
	<?php endforeach; ?>
	<?php } else { ?>
	<tr align="center">
			<td align="center" colspan="5" style="height:150px;color:red">NO LATEST WORK ORDER FOR THIS LOCATION</td>
	</tr>
	<?php } ?> 
</table>	   		
<!--<script type="text/javascript">
    function Setfield(a_name) {
        if (window.opener != null && !window.opener.closed) {
            var License_type = window.opener.document.getElementById("rel");
            License_type.value = a_name;
        }
        window.close();
    }
</script>-->
</body>
<script type="text/javascript">
function Setasset(work_ord) {
        if (window.opener != null && !window.opener.closed) {
            //alert(work_ord);
			var workd = window.opener.document.getElementById("n_phone_number");
            workd.value =  work_ord;
     
        }
        window.close();
    }
</script>