<?php
if ($this->input->get('ex') == 'excel'){
	$filename = "Site_Store_Status_" .date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}
?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<form>
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="6"><?php if ($this->input->get('ex') != 'excel'){ ?><a href="<?php echo base_url();?>index.php/contentcontroller/site_store_status?id=<?=$hosp;?>&ex=excel&xxx=export" style="margin-right:10px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px;vertical-align:middle" title="export to excel"></a><?php } ?><span style="color:black;font-weight: bold;" ><?=($this->input->get('ex') != 'excel') ? 'Export list to Excel' : 'Site Store Status';?></span></td>
				</tr>
				<tr>
			   	<th>No</th>
			    <th width="110">Item&nbsp;Code</th>
			    <th>Vendor&nbsp;Part&nbsp;no.</th>
			    <th>Item&nbsp;Name</th>
			    <th>Brand</th>
			    <th>Model</th>
			    <th width="80">Price</th>
			    <th width="110">Quantity</th>
				</tr>

				<?php
				if($records) {
				$kira=1;
				foreach($records as $row){?>
				<tr>
				<td><?=$kira++?></td>
				<td><?=$row->ItemCode;?></td>
				<td><?=$row->PartNumber;?></td>
				<td><?=mb_convert_encoding($row->ItemName,"HTML-ENTITIES","UTF-8");?></td>
				<td><?=mb_convert_encoding($row->Brand,"HTML-ENTITIES","UTF-8");?></td>
				<td><?=mb_convert_encoding($row->Model,"HTML-ENTITIES","UTF-8");?></td>
				<td><?= ($row->harga != null) ? "RM ".$row->harga : 'Unavailable';?></td>
				<td align="center"><?=$row->Qty;?></td>
				</tr>
				<?php }?>
				 <?php } else {?>
					<tr align="center" style="background:white; height:200px;">
						<td colspan="6"><span style="color:red;">NO MATCHING RECORD FOUND.</span></td>
					</tr>

				<?php } ?>
				<tr class="ui-header-new">
					<td align="center" colspan="6"><!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;">-->

				</tr>
			</table>

		</div>
	</div>
</body>
</html>
