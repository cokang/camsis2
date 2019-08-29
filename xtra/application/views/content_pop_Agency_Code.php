
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr align="center">
		<th>No</td>
		<th>Code</td>
		<th>License Category</td>
	</tr>
	<?php $runnom = 1; foreach($records as $row):?>  
		<tr align="center">
			<td><?=$runnom++;?></a></td>
			<td><a href="javascript:Setasset('<?=$row->v_Agencycode?>','<?=$row->v_Description?>','<?=$row->v_LicenceCategoryCode?>','<?=$row->v_LicenceCategoryDesc?>')" ><?=$row->v_Agencycode?> <?=$row->v_Description?></a></td>
			<td><a href="javascript:Setasset('<?=$row->v_Agencycode?>','<?=$row->v_Description?>','<?=$row->v_LicenceCategoryCode?>','<?=$row->v_LicenceCategoryDesc?>')" ><?=$row->v_LicenceCategoryCode?> <?=$row->v_LicenceCategoryDesc?></a></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<script type="text/javascript">
    function Setasset(a_code,a_name,a_category,a_Description) {
        if (window.opener != null && !window.opener.closed) {
            var Agency_Code = window.opener.document.getElementById("n_Agency_Code");
            Agency_Code.value = a_code;
            var Agency_Name = window.opener.document.getElementById("n_Agency_Name");
            Agency_Name.value = a_name;
            var Category_Code = window.opener.document.getElementById("n_Category_Code");
            Category_Code.value = a_category;
            var a_des = window.opener.document.getElementById("n_Category_Description");
            a_des.value = a_Description;
        }
        window.close();
    }
</script>
</body>
</html>