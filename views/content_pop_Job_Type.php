<body style="margin:0px;">
<div style="border:0px solid #999999;">
	<table style="width:100%;border:0px solid #999999;border-collapse:collapse;" border="0" align="center">
    <tr class="color-pop-asset">
      <td valign="middle" colspan="11" style="padding-left:10px;"><b>JOB TYPES</b></td>
    </tr>
		<tr  class="color-pop-asset2" style="font-weight:bold;">
			<td align="center" style="width:10%;">Code</td>
			<td style="width:90%;">Description</td>
		</tr>
	</table>
</div>
<div style="height:;overflow:auto;border:0px solid #999999;">
	<table style="width:100%;border:0px solid #999999;border-collapse:collapse;" align="center">
		<?php foreach($records as $row):?>  
		<tr >
			<td align="center" style="width:10%;"><a href="javascript:Setasset('<?=isset($row->v_Jobtype ) ? $row->v_Jobtype  : ''?>','<?=isset($row->n_Frequency  ) ? $row->n_Frequency   : ''?>')" ><?=isset($row->v_Jobtype ) ? $row->v_Jobtype  : ''?></a></td>
			<td style="width:90%;"><a href="javascript:Setasset('<?=isset($row->v_Jobtype ) ? $row->v_Jobtype  : ''?>','<?=isset($row->n_Frequency  ) ? $row->n_Frequency   : ''?>')"><?= isset($row->n_Frequency ) ? $row->n_Frequency : ''?></a></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
	   		
<!--<select id="n_tag">
    <option value="Mudassasdar Khan">Mudassar Khan</option>
    <option value="John Hsadammond">John Hammond</option>
    <option value="Mike Stsadanley">Mike Stanley</option>
</select>-->

<script type="text/javascript">
    function Setasset(Job_Type,Job_Type2) {
        if (window.opener != null && !window.opener.closed) {
            var a_Job_Type = window.opener.document.getElementById("n_Job_Type");
            a_Job_Type.value = Job_Type;
            var a_Job_Type2 = window.opener.document.getElementById("n_Job_Type2");
            a_Job_Type2.value = Job_Type2;

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<!--<script type="text/javascript">
function fPostAsset(assetno, tagno, sn, name)
		{
	 		window.opener.document.getElementById("n_asset_number").value = assetno;
 			window.opener.document.getElementById("n_tag_number").value = tagno;
 			window.opener.document.getElementById("n_serial_number").value = sn;
 			window.opener.document.getElementById("n_name").value = name;
	 		self.close();
		}
</script>-->
</body>