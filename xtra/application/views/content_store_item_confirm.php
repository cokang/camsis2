<?php echo form_open('stock_add_new_ctrl/confirmation') ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<form>
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="2"><b>New Part</b> Asset Details Confirm</td>
				</tr>

				<tr>
					<td class="td-assest">Part Code :</td>
					<td> <input type="text" name="n_itemcode" value="<?php echo $this->input->post('n_itemcode') ?>" id="n_agent2" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest"></td>
					<td><input type="text" name="n_itemname" value="<?php echo $this->input->post('n_itemname') ?>" id="n_agent2" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">Quantity :</td>
					<td><input type="text" name="n_qty" value="<?php echo $this->input->post('n_qty') ?>" id="n_agent2" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr>
					<td class="td-assest">Price :</td>
					<td> <input type="text" name="n_itemprice" value="<?php echo $this->input->post('n_itemprice') ?>" id="n_agent2" class="form-control-button2 n_wi-date" readonly></td>
				</tr>
				<tr class="ui-header-new">
					<td align="center" colspan="2">
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                        <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
                    </td>
				</tr>
			</table>
			<?php echo form_hidden('hosp',$this->input->post('hosp')) ?>
			<?php echo form_hidden('vendor',$this->input->post('vendor')) ?>
		</div>
	</div>
<?php include 'content_jv_popup.php';?>
</body>
</html>
