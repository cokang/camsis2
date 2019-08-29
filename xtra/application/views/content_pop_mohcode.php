<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">MOH CODE</th>
	</tr>
	<tr align="center">
		<th >No</th>
		<th >MOH Code</th>
		<th >MOH Description</th>
	</tr>
	<?php $numrow = 1; foreach($record as $row): ?>
	<tr align="center">
		<td style="width:20px;"><?=$numrow++?></a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?=isset($row->v_Mohcode) ? $row->v_Mohcode : ''?>','<?=isset($row->v_Mohdesc) ? $row->v_Mohdesc : ''?>')" ><?=isset($row->v_Mohcode) ? $row->v_Mohcode : ''?></a></td>
		<td style="width:300px;"><a href="javascript:Setasset('<?=isset($row->v_Mohcode) ? $row->v_Mohcode : ''?>','<?=isset($row->v_Mohdesc) ? $row->v_Mohdesc : ''?>')" ><?=isset($row->v_Mohdesc) ? $row->v_Mohdesc : ''?></a></td>
	</tr>
	<?php endforeach; ?>
</table>
<script type="text/javascript">
    function Setasset(a_agent,b_agent) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_moh");
            a_ag.value = a_agent;
            var b_ag = window.opener.document.getElementById("n_mohdesc");
            b_ag.value = b_agent;
        window.close();
		}
    }
</script>