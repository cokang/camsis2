
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6" class="headerpop">EQUIPMENT CODES</th>
	</tr>
	<tr align="center">
		<th >No</th>
		<th >Code</th>
		<th >Name</th>
	</tr>
	<?php $numrow=1; foreach($record as $row): ?>
	<tr align="center">
		<td><?=$numrow?></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->ItemCode?></a></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->ItemName?></a></td>
	</tr>
	<?php $numrow++ ?>
	<?php endforeach; ?>
</table>
   		
<script type="text/javascript">
    function Setasset(a_agent,a_agent2,hosp) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_agent");
            a_ag.value = a_agent;
            var a_ag2 = window.opener.document.getElementById("n_agent2");
            a_ag2.value = a_agent2;
            var a_ag3 = window.opener.document.getElementById("hosp");
            a_ag3.value = hosp;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>