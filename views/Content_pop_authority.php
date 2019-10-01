<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">STATUTORY AGENCY</th>
	</tr>
	<tr align="center" class="tftable-tr">
		<th>No</th>
		<th>Code</th>
		<th>Name</th>
	</tr>
	<?php $num=1;foreach ($assetauth as $row): ?>
	<tr align="center">
		<td align="center"><a href="javascript:Setfield('<?=$row->v_AgencyCode?>','<?=$row->v_Description?>')" ><?=$num?></a></td>
		<td align="center"><a href="javascript:Setfield('<?=$row->v_AgencyCode?>','<?=$row->v_Description?>')" ><?=$row->v_AgencyCode?></a></td>
		<td align="center"><a href="javascript:Setfield('<?=$row->v_AgencyCode?>','<?=$row->v_Description?>')" ><?=$row->v_Description?></a></td>
	</tr>
	<?php $num++ ?>
	<?php endforeach; ?>
</table>	   		
<script type="text/javascript">
    function Setfield(a_code,a_name) {
        if (window.opener != null && !window.opener.closed) {
            var License_type = window.opener.document.getElementById("n_Authorit");
            License_type.value = a_code;
			var u_d = window.opener.document.getElementById("n_Authorit2");
            u_d.value =  a_name;
        }
        window.close();
    }
</script>
</body>
</html>