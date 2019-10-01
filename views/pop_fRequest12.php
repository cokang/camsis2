
<body style="margin:0px;">
<table class="tftable" border="0" style="text-align:center;">
	<tr>
		<th colspan="6">Testing & Commissioning Requests (A12)</th>
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
		<th style="width:30px;">No</th>
		<th >Request Number</th>
		<th >Status</th>
		<th >Date</th>
		<th >Summary</th>
	</tr>
	<?php $num = 1; foreach ($record as $row) { ?>
	<tr align="center">
		<td ><?$num++?></td>
		<td ><a href="javascript:Setasset('<?=$row->V_Request_no?>')" ><?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></a></td>
		<td ><?=isset($row->V_request_status) ? $row->V_request_status : '' ?></td>
		<td ><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : '' ?></td>
		<td ><?=isset($row->V_summary) ? $row->V_summary : '' ?></td>
	</tr>
	<?php } ?>

	<!--<tr align="center">
		<td >1</td>
		<td ><a href="javascript:Setasset('AV/A12/B00006/16')" >AV/A12/B00006/16</a></td>
		<td >C </td>
		<td >09/03/2016</td>
		<td >Pengujian dan Pentauliahan Peralatan Instrutments Drills </td>
	</tr>-->
	
</table>	   		
<script type="text/javascript">
    function Setasset(tnc_request) {
        if (window.opener != null && !window.opener.closed) {
            var tc = window.opener.document.getElementById("n_tnc_num");
            tc.value = tnc_request;

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
</body>