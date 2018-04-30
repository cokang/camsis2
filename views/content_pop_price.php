<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">PRICE</th>
	</tr>
	<tr align="center">
		<th >No</th>
		<th >Vendor Details </th>
		<th >Price </th>
	</tr>
	<?php if ($this->input->get('pro') == '') { ?>
	<?php $num=1; foreach ($record as $row): ?>
	<tr align="center">
		<td style="width:20px;">1</a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?php echo $this->input->get('price')?>','<?php echo $this->input->get('vendor')?>','<?php echo substr($this->input->get('vendor'),6);?>','<?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : '' ?>','<?=isset($row->List_Price) ? $row->List_Price : '' ?>','<?=isset($row->Vendor) ? $row->Vendor : '' ?>')" ><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : '' ?></a></td>
		<td style="width:300px;"><a href="javascript:Setasset('<?php echo $this->input->get('price')?>','<?php echo $this->input->get('vendor')?>','<?php echo substr($this->input->get('vendor'),6);?>','<?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : '' ?>','<?=isset($row->List_Price) ? $row->List_Price : '' ?>','<?=isset($row->Vendor) ? $row->Vendor : '' ?>')" ><?=isset($row->List_Price) ? $row->List_Price : '' ?></a></td>
	</tr>
	<?php endforeach; ?>
	<?php } else { ?>
	<?php $num=1; foreach ($record as $row): ?>
	<tr align="center">
		<td style="width:20px;">1</a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?php echo $this->input->get('price')?>','<?=isset($row->List_Price) ? $row->List_Price : '' ?>','<?php echo substr($this->input->get('price'),7);?>','<?=isset($row->Vendor) ? $row->Vendor : '' ?>')" ><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : '' ?></a></td>
		<td style="width:300px;"><a href="javascript:Setasset('<?php echo $this->input->get('price')?>','<?=isset($row->List_Price) ? $row->List_Price : '' ?>','<?php echo substr($this->input->get('price'),7);?>','<?=isset($row->Vendor) ? $row->Vendor : '' ?>')" ><?=isset($row->List_Price) ? $row->List_Price : '' ?></a></td>
	</tr>
	<?php endforeach; ?>
	<?php } ?>
</table>
<script type="text/javascript">
	<?php if ($this->input->get('pro') == '') { ?>
    function Setasset(xx1,xx2,idno,xx3,xx4,xx5) {
        if (window.opener != null && !window.opener.closed) {
            var pricexx = window.opener.document.getElementById(xx1);
            pricexx.value = xx4;
			var pricexx = window.opener.document.getElementById(xx2);
            pricexx.innerHTML = xx3;
            var codexxx = window.opener.document.getElementById('vendori'+idno);
            codexxx.value = xx5;
        }
        window.close();
    }
    <?php } else { ?>
    function Setasset(xx1,xx2,idno,xx3) {
        if (window.opener != null && !window.opener.closed) {
            var pricexx = window.opener.document.getElementById(xx1);
            pricexx.value = xx2;
            var pricexx = window.opener.document.getElementById('n_vendor'+idno);
            pricexx.value = xx3;
        }
        window.close();
    }
    <?php } ?>
</script>