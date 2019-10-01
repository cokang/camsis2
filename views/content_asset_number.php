<body style="margin:0px;">
<table class="tftable" border="0" style="text-align:center;">
	<tr>
		<th colspan="6">LOCATION</th>
	</tr>
</table>
<table class="tftable2" border="0" style="text-align:center;">
	<tr>
		<th width="3%" height="40px" valign="top">
			<a href="?y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
		<th width="3%" valign="top">
			<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
		<th width="88%" align="center">
			<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
		</th>
		<th width="3%" valign="top">
			<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
		<th width="3%" valign="top">
			<a href="?y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
	</tr>
</table>
<table class="tftable" border="0" style="text-align:center;">
	<tr align="center">
		<th>No</th>
		<th>Request Number</th>
		<th>Status</th>
		<th>Date</th>
		<th>User Department</a></th>
	</tr>
	<?php $rownum = 1; foreach($records as $row):?>  
	<tr align="center">
		<td style="width:20px;"><?=$rownum++;?></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_request_status?>','<?=$row->V_requestor?>','<?=$row->D_date?>','<?=$row->V_priority_code?>','<?=$row->V_summary?>','<?=$row->V_Tag_no?>','<?=$row->V_Asset_no?>','<?=$row->V_Serial_no?>','<?=$row->V_phone_no?>','<?=$row->V_User_dept_code?>','<?=$row->V_Location_code?>','<?=$row->v_closeddate?>')" ><?=$row->V_Request_no?></a></td>
		<td style="width:180px;"><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_request_status?>','<?=$row->V_requestor?>','<?=$row->D_date?>','<?=$row->V_priority_code?>','<?=$row->V_summary?>','<?=$row->V_Tag_no?>','<?=$row->V_Asset_no?>','<?=$row->V_Serial_no?>','<?=$row->V_phone_no?>','<?=$row->V_User_dept_code?>','<?=$row->V_Location_code?>','<?=$row->v_closeddate?>')" ><?=$row->V_request_status?></a></td>
		<td style="width:80px;"><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_request_status?>','<?=$row->V_requestor?>','<?=$row->D_date?>','<?=$row->V_priority_code?>','<?=$row->V_summary?>','<?=$row->V_Tag_no?>','<?=$row->V_Asset_no?>','<?=$row->V_Serial_no?>','<?=$row->V_phone_no?>','<?=$row->V_User_dept_code?>','<?=$row->V_Location_code?>','<?=$row->v_closeddate?>')" ><?=$row->D_date?></a></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_request_status?>','<?=$row->V_requestor?>','<?=$row->D_date?>','<?=$row->V_priority_code?>','<?=$row->V_summary?>','<?=$row->V_Tag_no?>','<?=$row->V_Asset_no?>','<?=$row->V_Serial_no?>','<?=$row->V_phone_no?>','<?=$row->V_User_dept_code?>','<?=$row->V_Location_code?>','<?=$row->v_closeddate?>')" ><?=$row->V_User_dept_code?></a></td>
	</tr>
	<?php endforeach;?>
</table>	   		
<script type="text/javascript">
    function Setasset(a_request,r_status,r_by2,r_date,r_priority,r_summary2,a_t_number,a_no,a_serial_number,a_phone,a_user_department,a_location,a_r_closed) {
        if (window.opener != null && !window.opener.closed) {
            var a_r_s = window.opener.document.getElementById("n_request_number");
            a_r_s.value = a_request;
            var r_s = window.opener.document.getElementById("n_request_status");
            r_s.value = r_status;
            var r_b = window.opener.document.getElementById("n_requested_by2");
            r_b.value = r_by2;
            var r_d = window.opener.document.getElementById("n_requested_date");
            r_d.value = r_date;
            var r_p = window.opener.document.getElementById("n_priority2");
            r_p.value = r_priority;
            var a_s = window.opener.document.getElementById("n_summary2");
            a_s.value =  r_summary2;
            var a_t_n = window.opener.document.getElementById("n_asset_tag_number");
            a_t_n.value = a_t_number;
            var a_n = window.opener.document.getElementById("n_asset_no");
            a_n.value = a_no;
            var a_s_n = window.opener.document.getElementById("n_asset_serial_number");
            a_s_n.value = a_serial_number;
            var a_p = window.opener.document.getElementById("n_phone_numberat");
            a_p.value =  a_phone;
            var a_u_d = window.opener.document.getElementById("n_user_department3");
            a_u_d.value = a_user_department;
            var a_l = window.opener.document.getElementById("n_location3");
            a_l.value = a_location;
            var a_r_c = window.opener.document.getElementById("n_request_closed_on");
            a_r_c.value = a_r_closed;
        }
        window.close();
    }
</script>
</body>