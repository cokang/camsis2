
<body style="margin:0px;">

<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">EQUIPMENT CODES</th>
	</tr>
</table>
<form name="frmUserDept" id="frmUserDept" action="" style="margin:0px;">
<div class="left-location">
	<select id="selectBox" class="inputtext" name="dept" onchange="if (this.value) window.location.href=this.value" size="25">
		<option SELECTED>-ALL-</option>
		<?php foreach($dept as $row):?>  
		<option value="location?dept=<?=$row->v_userdeptcode?>&parent=<?=$this->input->get('parent')?>"><?=$row->v_userdeptdesc?> (<?=$row->v_userdeptcode?>)</option>
		<?php endforeach;?>
	</select>
</div>
</form>
<div class="middle-location">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th >No</th>
		<th >Dept&nbsp;Code</th>
		<th >Department</th>
		<th >Location&nbsp;Code</th>
		<th >Location</th>
	</tr>
<?php $rownum=1; foreach($loc as $row):?>  
	<tr align="center">
		<td><?=$rownum++?></a></td>
		<?php if ($this->input->get('parent') == 'undefined'){?>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->v_userdeptdesc?>','<?=$row->V_location_code?>','<?=$row->v_Location_Name?>')" ><?=$row->v_UserDeptCode?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->v_userdeptdesc?>','<?=$row->V_location_code?>','<?=$row->v_Location_Name?>')" ><?=$row->v_userdeptdesc?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->v_userdeptdesc?>','<?=$row->V_location_code?>','<?=$row->v_Location_Name?>')" ><?=$row->V_location_code?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->v_userdeptdesc?>','<?=$row->V_location_code?>','<?=$row->v_Location_Name?>')" ><?=$row->v_Location_Name?></a></td>
		<?php }elseif ($this->input->get('parent') == 2){?>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->V_location_code?>')" ><?=$row->v_UserDeptCode?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->V_location_code?>')" ><?=$row->v_userdeptdesc?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->V_location_code?>')" ><?=$row->V_location_code?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_UserDeptCode?>','<?=$row->V_location_code?>')" ><?=$row->v_Location_Name?></a></td>
		<?php } ?>
	</tr>
<?php endforeach;?>
</table>
</div>
<script type="text/javascript">
<?php if ($this->input->get('parent') == 'undefined'){?>
    function Setasset(u_department,u_department2,a_location,a_location2) {
        if (window.opener != null && !window.opener.closed) {
            var u_d = window.opener.document.getElementById("n_user_department");
            u_d.value =  u_department;
            var u_d2 = window.opener.document.getElementById("n_user_department1");
            u_d2.value = u_department2;
            var a_l = window.opener.document.getElementById("n_location");
            a_l.value = a_location;
            var a_l2 = window.opener.document.getElementById("n_location2");
            a_l2.value = a_location2;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
<?php }elseif ($this->input->get('parent') == 2){?>
	function Setasset(u_department2,a_location) {
			if (window.opener != null && !window.opener.closed) {
				var u_d2 = window.opener.document.getElementById("n_user_department1");
				u_d2.value = u_department2;
				var a_l = window.opener.document.getElementById("n_location");
				a_l.value = a_location;
			}
			window.close();
		}
<?php } ?>
	function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	//document.selectBox.action = selectedValue;
	document.getElementById("frmUserDept").submit();
	//document.getElementById('frmUserDept').action = "script.php";
    //alert(selectedValue);
	
   }
</script>
<style>
select{
  -webkit-appearance: menulist-textfield;
  width:100%;
}
</style>
</body>