
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">EQUIPMENT CODES</th>
	</tr>
	<tr align="center">
		<th>No</th>
		<th>Type</th>
		<th>Code</th>
		<th>Name</th>
		<th>Asset Definition<br /> (Universal Medical Device Nomenclature System)</th>
		<th>Asset Definition<br /> (Global Medical Device Nomenclature)</th>
	</tr>
	<?php $nom = 1; foreach($records as $row):?>  
	<tr align="center">
		<td ><?=$nom++;?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_Equip_Code?>','<?=$row->v_Equip_Desc?>','<?=$row->v_workgroupno?>','<?=$row->new_asset_type?>')" ><?=$row->new_asset_type?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_Equip_Code?>','<?=$row->v_Equip_Desc?>','<?=$row->v_workgroupno?>','<?=$row->new_asset_type?>')" ><?=$row->v_Equip_Code?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_Equip_Code?>','<?=$row->v_Equip_Desc?>','<?=$row->v_workgroupno?>','<?=$row->new_asset_type?>')" ><?=$row->v_Equip_Desc?></a></td>
		<td><a href="javascript:Setasset('$row->v_Equip_Code?>','<?=$row->v_Equip_Desc?>','<?=$row->v_workgroupno?>','<?=$row->new_asset_type?>')" ></a></td>
		<td><a href="javascript:Setasset('$row->v_Equip_Code?>','<?=$row->v_Equip_Desc?>','<?=$row->v_workgroupno?>','<?=$row->new_asset_type?>')" ></a></td>
	</tr>
	<?php endforeach;?>
</table>	   		
<script type="text/javascript">
    function Setasset(e_code,e_code2,a_workgroup,a_type) {
        if (window.opener != null && !window.opener.closed) {
            var e_c = window.opener.document.getElementById("n_equipment_code");
            e_c.value = e_code;
            var e_c2 = window.opener.document.getElementById("n_equipment_code2");
            e_c2.value = e_code2;
            var a_w = window.opener.document.getElementById("n_asset_workgroup");
            a_w.value = a_workgroup;
						var a_t = window.opener.document.getElementById("n_asset_type");
            a_t.value = a_type;
        }
        window.close();
    }
</script>
</body>