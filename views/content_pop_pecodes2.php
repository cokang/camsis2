
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr align="center">
		<th >No</th>
		<th >Vendor Details</th>
		<th >Price</th>
	</tr>
	<?php $numrow=1;foreach ($record as $row): ?>
	<tr align="center">
		<td><?=$numrow?></td>
		<td><a href="javascript:Setasset('<?=$this->input->get('ic')?>','<?=$row->Vendor?>','<?=$row->List_Price?>')" ><?=$row->Vendor?></a></td>
		<td><?=$row->List_Price?></td>
	</tr>
	<?php $numrow++ ?>
	<?php endforeach; ?>
</table>	   		
<script type="text/javascript">
    function Setasset(a_agent,b_agent,c_agent) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("price");
            a_ag.value = c_agent
            var a_ag2 = window.opener.document.getElementById("vendor");
            a_ag2.value = b_agent
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>