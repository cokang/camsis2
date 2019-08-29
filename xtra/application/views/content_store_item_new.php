<?php echo form_open('stock_add_new_ctrl') ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<form>
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="2"><b>New Part</b> Asset Details</td>
				</tr>

				<tr>
					<td class="td-assest">Part Code :</td>
					<td style="padding-left:5px;"> <input type="text" id="n_agent" name="n_itemcode" value="<?php echo set_value('n_itemcode'); ?>" class="form-control-button2 n_user_d" readonly> <span class="icon-windows" onclick="pecodes()"></span></td>
				</tr>
				<tr>
					<td class="td-assest"></td>
					<td><input type="text" name="n_itemname" value="<?php echo set_value('n_itemname'); ?>" id="n_agent2" class="form-control-button2 n_wi-date" readonly></td>
					<input type="hidden" name="hosp" value="<?php echo set_value('hosp',$this->input->get('id')); ?>" id="hosp" class="form-control-button2 n_wi-date" readonly>
				</tr>
				<tr>
					<td class="td-assest">Quantity :</td>
					<td><input type="text" name="n_qty" value="<?php echo set_value('n_qty'); ?>" class="form-control-button2 n_wi-date"></td>
				</tr>
				<tr>
					<td class="td-assest">Price :</td>
					<td style="padding-left:5px;"> <input type="text" id="price" name="n_itemprice" value="<?php echo set_value('n_itemprice'); ?>" class="form-control-button2 n_user_d" readonly> <span class="icon-windows" onclick="pecodes2()"></span></td>
					<input type="hidden" name="vendor" value="<?php echo set_value('vendor'); ?>" id="vendor" class="form-control-button2 n_wi-date" readonly>
				</tr>
				<tr class="ui-header-new">
					<td align="center" colspan="2"><!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;">-->
						<!--<a href="store_item_confirm">submit</a></td>-->
						<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Submit">
				</tr>
			</table>

		</div>
	</div>
<?php include 'content_jv_popup.php';?>
</body>
</html>
