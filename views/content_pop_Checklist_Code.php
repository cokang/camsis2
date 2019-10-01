<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="3">CHECKLIST</th>
	</tr>
	<tr align="center">
		<td>No</td>
		<td>Code</td>
		<td>Description</td>
		<td>Interval</td>
		<td>Manufacturer</td>
		<td>Model</td>
	</tr>
	<?php foreach($records as $row):?>  
	<tr align="center">
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : 'NA'?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>')" ><?=isset($row->checklistCode ) ? $row->checklistCode  : ''?></a></td>
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : 'NA'?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>')"><?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?></a></td>
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : 'NA'?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>')" ><?=isset($row->freq ) ? $row->freq  : ''?></a></td>
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : 'NA'?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>')"><?=isset($row->mfg ) ? $row->mfg  : ''?></a></td>
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : 'NA'?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription : ''?>')" ><?=isset($row->model ) ? $row->model  : ''?></a></td>
	</tr>
	<?php endforeach;?>
	
</table>
<script type="text/javascript">
    function Setasset(a_agent,a_agent2) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_Checklist_Code");
            a_ag.value = a_agent;
            var a_ag2 = window.opener.document.getElementById("n_Checklist_Code2");
            a_ag2.value = a_agent2;
        }
        window.close();
    }
</script>