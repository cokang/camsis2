<body style="margin:0px;">
<!--<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="9">ASSET</th>
	</tr>
</table>
<table class="tftable2" border="0" style="text-align:center;">
	<tr>
		<th height="40px">Asset Number <br />
			<input type="text" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2" style="width:80%;">
		</th>
		<th >
			Asset Number <br />
			<input type="text" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2" style="width:80%;">
		</th>
	</tr>
</table>-->
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="10">ASSET</th>
	</tr>
<?php echo form_open("contentcontroller/assetnumber", array('method'=>'get')); ?>
	<tr>
		<td height="40px" colspan="10">
        <div style="display:inline-block; width:30%;">
            Tag Number <br />
            <input type="text"  name="n_tag_number" value="<?php echo $this->input->get('n_tag_number'); ?>" class="form-control-button2" style="width:100%;" onchange="javascript:this.form.submit();">
        </div>
        <div style="display:inline-block; width:30%;">
            Asset Name <br />
			<input type="text"  name="n_asset_number" value="<?php echo $this->input->get('n_asset_number'); ?>" class="form-control-button2" style="width:100%;" onchange="javascript:this.form.submit();">
        </div>
        <div style="display:inline-block; width:30%;">
            Department / Location<br />
            <input type="text"  name="s_department" value="<?php echo $this->input->get('s_department'); ?>" class="form-control-button2" style="width:100%;" onchange="javascript:this.form.submit();">
		</div>
        </td>
		
	</tr>
<?php echo form_hidden('parent',$this->input->get('parent'));?>
<?php echo form_close(); ?>
	<tr>
		<th >No</th>
		<th >Asset Number</th>
		<th >UMDNS Code</th>
		<th >Asset Description</th>
		<th >Serial Number</th>
		<th >User Department</th>
		<th >Location</th>
		<th >Warranty Status</th>
		<th >Condition</th>
        <th >Status</th>
	</tr> 
	<?php $rownum = 1;  foreach($records as $row):?>
    <?php
    if (strtotime(date("Y-m-d")) <= strtotime(date("Y-m-d",strtotime($row->v_wrn_end_code)))){
        $warrantystatus = 'Under Warranty';
    }
    else{
        $warrantystatus = 'Warranty Ended';
    }
    ?>       			
	<tr align="center" id="n_tag">
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$rownum++;?></td> <!--,'<?=$row->v_Location_Name?>'-->
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_tag_no?></a></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_ChecklistCode?></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_asset_name?></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_serial_no?></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_user_dept_code?></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_location_code?></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$warrantystatus?></td>
		<td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_AssetCondition?></td>
	    <td><a href="javascript:Setasset('<?=$row->v_asset_no?>','<?=$row->v_tag_no?>','<?=$row->v_serial_no?>','<?=$row->v_asset_name?>','<?=$row->v_wrn_end_code?>','<?=$row->v_user_dept_code?>','<?=$row->v_location_code?>','<?=$row->v_Location_Name?>','<?=$row->v_UserDeptDesc?>')" ><?=$row->v_AssetStatus?></td>
    </tr>   			 
	<?php endforeach;?>	
</table>	
<?php if ($this->input->get('parent') == 'compup' ) { ?>
<script type="text/javascript">
    function Setasset(a_number,t_number,s_number,a_name,w_number,d_number,l_number,l_name,d_name) {
        if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_asset_number");
            anumber.value =  a_number;
            var tag_number = window.opener.document.getElementById("n_tag_number");
            tag_number.value = t_number;
            var snumber = window.opener.document.getElementById("n_serial_number");
            snumber.value =s_number;
            var n_n = window.opener.document.getElementById("n_name");
            n_n.value = a_name;
            var wnumber = window.opener.document.getElementById("n_wrn_end");
            wnumber.value = w_number;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php } elseif ($this->input->get('parent') == 'desk' ) { ?>
<script type="text/javascript">
    function Setasset(a_number,t_number,s_number,a_name,w_number,d_number,l_number,l_name,d_name) {
        if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_asset_number");
            anumber.value =  a_number;
            var tag_number = window.opener.document.getElementById("n_tag_number");
            tag_number.value = t_number;
            var snumber = window.opener.document.getElementById("n_serial_number");
            snumber.value =s_number;
            var n_n = window.opener.document.getElementById("n_name");
            n_n.value = a_name;
            var deptcode = window.opener.document.getElementById("n_user_department");
            deptcode.value = d_number;
            var deptdesc = window.opener.document.getElementById("n_user_department1");
            deptdesc.value = d_name;
            var loccode = window.opener.document.getElementById("n_location");
            loccode.value = l_number;
            var locdesc = window.opener.document.getElementById("n_location2");
            locdesc.value = l_name;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php } else { ?>
<script type="text/javascript">
    function Setasset(a_number,t_number,s_number,a_name,w_number,d_number,l_number,l_name,d_name) {
        if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_asset_number");
            anumber.value =  a_number;
            var tag_number = window.opener.document.getElementById("n_tag_number");
            tag_number.value = t_number;
            var snumber = window.opener.document.getElementById("n_serial_number");
            snumber.value =s_number;
            var n_n = window.opener.document.getElementById("n_name");
            n_n.value = a_name;
            //var wnumber = window.opener.document.getElementById("n_wrn_end");
            //wnumber.value = w_number;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php } ?>
</body>