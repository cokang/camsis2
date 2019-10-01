<?php echo form_open('stock_takeadd_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<form>
		<div class="div-p"></div>
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">
		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="100%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<?php if($act == 'take') { ?>
				<td class="ui-header-new" colspan="2"><b>Take Stock</b> Items Details</td>
				<?php } else { ?>
				<td class="ui-header-new" colspan="2"><b>Add Stock</b> Items Details</td>
				<?php } ?>
			</tr>
			<tr>
				<td colspan="2" class="assets-headear" style="color:blue;"><?php echo $n.' RM'.$p ?></td>
			</tr>
			<tr>
				<td class="td-assest">Documentation Details :</td>
				<?php if($act == 'take') { ?>
				<td> <input type="text" id="n_doc_det" name="n_doc_det" value="<?php echo set_value('n_doc_det'); ?>" class="form-control-button2 n_user_d" autocomplete="off" > <span class="icon-windows" onclick="pop_requests(this)" value=""></span></td>
				<?php } else { ?>
				<td> <input type="text" id="n_doc_det" name="n_doc_det" value="<?php echo set_value('n_doc_det'); ?>" class="form-control-button2 n_user_d" autocomplete="off" ></td>
				<?php } ?>
			</tr>
			<tr>
				<td class="td-assest">Quantity : </td>
				<td><input type="text" name="n_quantity" value="<?php echo set_value('n_quantity'); ?>" class="form-control-button2 n_wi-date" autocomplete="off"></td>
			</tr>
			<tr>
				<td class="td-assest">Site : </td>
				<td>
					<?php 
					$Area_list = array(""=>"Select");
					if( !empty($arealist) ){
						foreach ($arealist as $row) {
						$Area_list[$row['v_HospitalCode']] = $row["v_HospitalName"];
					    }
					  }
					?>
					<?php echo form_dropdown('n_Site_list', $Area_list ,$n_Site_list, 'class="dropdown n_wi-date" style="display:inline-block; height:30px;"'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Remark : </td>
				<td > <textarea class="input n_wi-date" name="n_remark"><?php echo set_value('n_remark'); ?></textarea></td>
			</tr>
			<tr>
				<?php if($act == 'add') { ?>
				<td class="td-assest">Price Per Unit : </td>
				<td><input type="text" name="n_unitprice" value="<?php echo set_value('n_unitprice'); ?>" class="form-control-button2 n_wi-date" autocomplete="off"></td>
				<?php } ?>
			</tr>
			<tr class="ui-header-new">
				<td align="center" colspan="2"><!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;">-->
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Submit">
					<!--<a href="ustore_c">submit</a></td>-->
			</tr>
		</table>
		<?php include 'content_jv_popup.php';?>
		<?php echo form_hidden('id',isset($id) ? $id : '');?>
		<?php echo form_hidden('qty',isset($qty) ? $qty : '');?>
		<?php echo form_hidden('n',isset($n) ? $n : '');?>
		<?php echo form_hidden('p',isset($p) ? $p : '');?>
		<?php echo form_hidden('act',isset($act) ? $act : '');?>
		<?php echo form_hidden('store',isset($store) ? $store : '');?>
	</div>
</div>
<?php echo form_close(); ?>