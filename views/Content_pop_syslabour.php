<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">LABOUR GRADE</th>
	</tr>
	<tr align="center">
		<th >No</th>
		<th >Grade </th>
		<th >Hourly Rate </th>
	</tr>
	<?php $numrow = 1; foreach($record as $row): ?>
	<tr align="center">
		<td style="width:20px;"><?=$numrow++?></a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?=isset($row->v_labourgrade) ? $row->v_labourgrade : ''?>','<?=isset($row->v_hourlyrate) ? $row->v_hourlyrate : ''?>')" ><?=isset($row->v_labourgrade) ? $row->v_labourgrade : ''?></a></td>
		<td style="width:300px;"><a href="javascript:Setasset('<?=isset($row->v_labourgrade) ? $row->v_labourgrade : ''?>','<?=isset($row->v_hourlyrate) ? $row->v_hourlyrate : ''?>')" ><?=isset($row->v_hourlyrate) ? $row->v_hourlyrate : ''?></a></td>
	</tr>
	<?php endforeach; ?>
</table>
<script type="text/javascript">
    function Setasset(a_agent,a_agent2) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_l_Grade");
            a_ag.value = a_agent;
            var a_ag2 = window.opener.document.getElementById("n_h_rate");
            a_ag2.value = a_agent2;
        }
        window.close();
    }
</script>