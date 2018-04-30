
<body style="margin:0px;">

<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">Items List</th>
	</tr>
</table>
<form name="frmUserDept" id="frmUserDept" action="" style="margin:0px;">
<div class="left-location">
	<select id="selectBox" class="inputtext" name="dept" onchange="if (this.value) window.location.href=this.value" size="25">
		<option value="pop_item?name=<?=$this->input->get('name')?>&code=<?=$this->input->get('code')?>&codecat=" <?=$this->input->get('codecat') == '' ? 'SELECTED' : ''?>>-ALL-</option>
		<?php foreach ($codecat as $row) { ?>
		<option value="pop_item?name=<?=$this->input->get('name')?>&code=<?=$this->input->get('code')?>&codecat=<?=isset($row->CodeCat) ? $row->CodeCat : ''?>" <?=$this->input->get('codecat') == $row->CodeCat ? 'SELECTED' : ''?>><?=isset($row->CodeCat) ? $row->CodeCat : ''?></option>
		<?php } ?>
</select>
</div>
</form>
<div class="middle-location">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th >No</th>
		<th >Item Name</th>
		<th >Equipment</th>
		<th >Brand</th>
		<th >Model</th>
		<th >Part Number</th>
		<th >HQ Store</th>
	</tr>
	<?php $numrow=1;foreach($record as $row): ?>
	<tr align="center">
		<td><?=$numrow++?></td>
		<td><a href="javascript:Setasset('<?php echo $this->input->get('name');?>','<?php echo $this->input->get('code');?>','<?php echo substr($this->input->get('code'),8);?>','<?=isset($row->ItemName) ? $row->ItemName : ''?>','<?=isset($row->ItemCode) ? $row->ItemCode : ''?>')" ><?=isset($row->ItemName) ? $row->ItemName : ''?></a></td>
		<td><a href="javascript:Setasset('<?php echo $this->input->get('name');?>','<?php echo $this->input->get('code');?>','<?php echo substr($this->input->get('code'),8);?>','<?=isset($row->ItemName) ? $row->ItemName : ''?>','<?=isset($row->ItemCode) ? $row->ItemCode : ''?>')" ><?=isset($row->EquipCat) ? $row->EquipCat : ''?></a></td>
		<td><a href="javascript:Setasset('<?php echo $this->input->get('name');?>','<?php echo $this->input->get('code');?>','<?php echo substr($this->input->get('code'),8);?>','<?=isset($row->ItemName) ? $row->ItemName : ''?>','<?=isset($row->ItemCode) ? $row->ItemCode : ''?>')" ><?=isset($row->Brand) ? $row->Brand : ''?></a></td>
		<td><a href="javascript:Setasset('<?php echo $this->input->get('name');?>','<?php echo $this->input->get('code');?>','<?php echo substr($this->input->get('code'),8);?>','<?=isset($row->ItemName) ? $row->ItemName : ''?>','<?=isset($row->ItemCode) ? $row->ItemCode : ''?>')" ><?=isset($row->Model) ? $row->Model : ''?></a></td>
		<td><a href="javascript:Setasset('<?php echo $this->input->get('name');?>','<?php echo $this->input->get('code');?>','<?php echo substr($this->input->get('code'),8);?>','<?=isset($row->ItemName) ? $row->ItemName : ''?>','<?=isset($row->ItemCode) ? $row->ItemCode : ''?>')" ><?=isset($row->PartNumber) ? $row->PartNumber : ''?></a></td>
		<td><a href="javascript:Setasset()" ></a></td>
	</tr>
	<?php endforeach;?>
</table>
</div>
<script type="text/javascript">
    function Setasset(nameid,codeid,idno,itemname,itemcode) {
        if (window.opener != null && !window.opener.closed) {
            var namexx = window.opener.document.getElementById(nameid);
            namexx.innerHTML =  itemname;
            var codexx = window.opener.document.getElementById(codeid);
            codexx.innerHTML = itemcode;
            //codexx.value = itemcode;
            var codexxx = window.opener.document.getElementById('itemcodei'+idno);
            codexxx.value = itemcode;
            var codexxx = window.opener.document.getElementById('itemc'+idno);
            codexxx.value = itemcode;
        }
        window.close();
    }
	function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	document.getElementById("frmUserDept").submit();
   }
</script>
<style>
select{
  -webkit-appearance: menulist-textfield;
  width:100%;
}
</style>
</body>