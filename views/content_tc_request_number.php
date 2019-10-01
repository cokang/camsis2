
<body style="margin:0px;">
<table class="tftable" border="0" style="text-align:center;">
	<tr>
		<th colspan="6">TESTING & COMMISSIONING REQUESTS(A8)</th>
	</tr>
</table>
<table class="tftable2" border="0" style="text-align:center;">
	<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
</table>
<table class="tftable" border="0" style="text-align:center;">
	<tr align="center">
		<th >No</th>
		<th >Request Number</th>
		<th >Status</th>
		<th >Date</th>
		<th >Summary</th>
	</tr>
	<?php $rownum=1; foreach($records as $row):?>  
	<tr align="center">
		<td style="width:20px;"><?=$rownum++;?></a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?=$row->v_request_no?>')" ><?=$row->v_request_no?></a></td>
		<td style="width:60px;"><?=$row->v_request_status?></a></td>
		<td style="width:80px;"><?=$row->d_date?></a></td>
		<td><?=$row->v_summary?></a></td>
	</tr>
	<?php endforeach;?>
</table>	   		
<script type="text/javascript">
    function Setasset(tnc_request) {
        if (window.opener != null && !window.opener.closed) {
            var tc = window.opener.document.getElementById("n_tnc_request");
            tc.value = tnc_request;

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
</body>