<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">CHECKLIST</th>
	</tr>
	<tr align="center">
	
		<th >No</th>
		<th >Code  </th>
		<th >Description  </th>
		<?php if ($this->input->get('id') == ''){ ?>
		<th >Interval  </th>
		<th >Manufacturer  </th>
		<th >Model  </th>
		<?php } ?>
	</tr>
	<?php $numrow = 1; foreach($records as $row):?>  
	<tr align="center">
		<tr align="center">
			<td> <?=$numrow?> </td>
			<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->freq ) ? $row->freq  : ''?>','<?=isset($row->checklistVersion ) ? $row->checklistVersion  : ''?>','<?=isset($row->volumeNo ) ? $row->volumeNo  : ''?>','<?=isset($row->checklistFilename ) ? $row->checklistFilename  : ''?>','<?=isset($row->assetType ) ? $row->assetType  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->mfg ) ? $row->mfg  : ''?>','<?=isset($row->model ) ? $row->model  : ''?>')" ><?=isset($row->checklistCode ) ? $row->checklistCode  : ''?></a></td>
		  <td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->freq ) ? $row->freq  : ''?>','<?=isset($row->checklistVersion ) ? $row->checklistVersion  : ''?>','<?=isset($row->volumeNo ) ? $row->volumeNo  : ''?>','<?=isset($row->checklistFilename ) ? $row->checklistFilename  : ''?>','<?=isset($row->assetType ) ? $row->assetType  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->mfg ) ? $row->mfg  : ''?>','<?=isset($row->model ) ? $row->model  : ''?>')" ><?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?></a></td>
		  <?php if ($this->input->get('id') == ''){ ?>
			<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->freq ) ? $row->freq  : ''?>','<?=isset($row->checklistVersion ) ? $row->checklistVersion  : ''?>','<?=isset($row->volumeNo ) ? $row->volumeNo  : ''?>','<?=isset($row->checklistFilename ) ? $row->checklistFilename  : ''?>','<?=isset($row->assetType ) ? $row->assetType  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->mfg ) ? $row->mfg  : ''?>','<?=isset($row->model ) ? $row->model  : ''?>')" ><?=isset($row->freq ) ? $row->freq  : ''?></a></td>
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->freq ) ? $row->freq  : ''?>','<?=isset($row->checklistVersion ) ? $row->checklistVersion  : ''?>','<?=isset($row->volumeNo ) ? $row->volumeNo  : ''?>','<?=isset($row->checklistFilename ) ? $row->checklistFilename  : ''?>','<?=isset($row->assetType ) ? $row->assetType  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->mfg ) ? $row->mfg  : ''?>','<?=isset($row->model ) ? $row->model  : ''?>')" ><?=isset($row->mfg ) ? $row->mfg  : ''?></a></td>
		<td><a href="javascript:Setasset('<?=isset($row->checklistCode ) ? $row->checklistCode  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription : ''?>','<?=isset($row->freq ) ? $row->freq  : ''?>','<?=isset($row->checklistVersion ) ? $row->checklistVersion  : ''?>','<?=isset($row->volumeNo ) ? $row->volumeNo  : ''?>','<?=isset($row->checklistFilename ) ? $row->checklistFilename  : ''?>','<?=isset($row->assetType ) ? $row->assetType  : ''?>','<?=isset($row->assetTypeDescription ) ? $row->assetTypeDescription  : ''?>','<?=isset($row->mfg ) ? $row->mfg  : ''?>','<?=isset($row->model ) ? $row->model  : ''?>')" ><?=isset($row->model ) ? $row->model  : ''?></a></td>
			<?php } ?>
		</tr>
	</tr>
	<?php $numrow++; endforeach;?>
	
</table>
<script type="text/javascript">
       function Setasset(a1,a2,a3,a4,a5,a6,a7,a8,a9,a10) {
        if (window.opener != null && !window.opener.closed) {
            var a_Checklist_Code = window.opener.document.getElementById("n_chklistcd");
            a_Checklist_Code.value = a1;
            var a_Checklist_Code2 = window.opener.document.getElementById("n_chklistdesc");
            a_Checklist_Code2.value = a2;
						var a_Checklist_Code3 = window.opener.document.getElementById("n_chklistfreq");
            a_Checklist_Code3.value = a3;
						var a_Checklist_Code4 = window.opener.document.getElementById("n_chklistver");
            a_Checklist_Code4.value = a4;
						var a_Checklist_Code5 = window.opener.document.getElementById("n_chklistvol");
            a_Checklist_Code5.value = a5;
						var a_Checklist_Code6 = window.opener.document.getElementById("n_chklistfname");
            a_Checklist_Code6.value = a6;
						var a_Checklist_Code7 = window.opener.document.getElementById("n_chklistatype");
            a_Checklist_Code7.value = a7;
						var a_Checklist_Code8 = window.opener.document.getElementById("n_chklistadesc");
            a_Checklist_Code8.value = a8;
						var a_Checklist_Code9 = window.opener.document.getElementById("n_chklistmanu");
            a_Checklist_Code9.value = a9;
						var a_Checklist_Code10 = window.opener.document.getElementById("n_chklistmodel");
            a_Checklist_Code10.value = a10;
			}
        window.close();
    }
</script>
</body>
</html>