<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">USER LOCATION</th>
	</tr>
	<tr align="center" class="tftable-tr">
		<th>Phone</th>
		<th>Dept Code</th>
		<th>User Department</th>
		<th>Location Code</th>
		<th>Location</th>
	</tr>
	<?php $nom = 1; foreach($records as $row):?>  
	<?php $nilaifield = "'$row->v_telephone_no','$row->v_user_dept_code','$row->v_userdeptdesc','$row->v_location_code','$row->v_location_name'" ?>
	<tr align="center">
		<td align="center"><a href="javascript:Setfield(<?=$nilaifield;?>)" ><?=isset($row->v_telephone_no ) ? $row->v_telephone_no  : ''?></a></td>
		<td align="center"><a href="javascript:Setfield(<?=$nilaifield;?>)" ><?=isset($row->v_user_dept_code ) ? $row->v_user_dept_code  : ''?></a></td>
		<td align="center"><a href="javascript:Setfield(<?=$nilaifield;?>)" ><?= isset($row->v_userdeptdesc) ? $row->v_userdeptdesc : ''?></a></td>
		<td align="center"><a href="javascript:Setfield(<?=$nilaifield;?>)" ><?=isset($row->v_location_code ) ? $row->v_location_code  : ''?></a></td>
		<td align="center"><a href="javascript:Setfield(<?=$nilaifield;?>)" ><?= isset($row->v_location_name ) ? $row->v_location_name : ''?></a></td>
	</tr>
	<?php endforeach;?>
</table>	   		
<script type="text/javascript">
    function Setfield(a_name,u_department,u_department2,a_location,a_location2) {
        if (window.opener != null && !window.opener.closed) {
            var License_type = window.opener.document.getElementById("n_phone_number");
            License_type.value = a_name;
						var u_d = window.opener.document.getElementById("n_user_department");
            u_d.value =  u_department;
            var u_d2 = window.opener.document.getElementById("n_user_department1");
            u_d2.value = u_department2;
            var a_l = window.opener.document.getElementById("n_location");
            a_l.value = a_location;
            var a_l2 = window.opener.document.getElementById("n_location2");
            a_l2.value = a_location2;
        }
        window.close();
    }
</script>
</body>