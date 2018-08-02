<?php $hidden = array('name' => 'myForm' ); ?> 
 <?php echo form_open_multipart('stock_takeadd_ctrl/confirmation',$hidden) ?>
 
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
			
			<tr>
				<td class="td-assest">Documentation Details :</td>
				<td> <input type="text" id="n_doc_det" name="n_doc_det" value="<?php echo set_value('n_doc_det'); ?>" class="form-control-button2 n_wi-date" readonly autocomplete="off"></td>
			</tr>
			<tr>
				<td class="td-assest">Quantity : </td>
				<td><input type="text" name="n_quantity" value="<?php echo set_value('n_quantity'); ?>" class="form-control-button2 n_wi-date" autocomplete="off" readonly></td>
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
					<?php echo form_dropdown('n_Site_list', $Area_list, $n_Site_list, 'class="dropdown n_wi-date" style="display:inline-block; height:30px;"'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Remark : </td>
				<td > <textarea class="input n_com" name="n_remark" readonly><?php echo set_value('n_remark'); ?></textarea></td>
			</tr>
			<tr>
				<?php if($act == 'add') { ?>
				<td class="td-assest">Price Per Unit : </td>
				<td><input type="text" name="n_unitprice" value="<?php echo set_value('n_unitprice'); ?>" class="form-control-button2 n_wi-date" readonly></td>
				<?php } ?>
			</tr>
			<tr>
				<?php if($act == 'take') { ?>
				<td class="td-assest">Username : </td>
				<td><input type="text" name="name" value="<?= isset($name) ? $this->input->post('name') : '' ?>" id="username" class="form-control-button2 n_wi-date" onclick='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");' readonly></td>
				<?php } ?>
			</tr>
			<!--<tr>
				<?php if($act == 'take') { ?>
				<td class="td-assest">Password : </td>
				<td><input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control-button2 n_wi-date"></td>
				<?php } ?>
			</tr>-->
			<tr class="ui-header-new">
				<td align="center" colspan="2"><!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;">-->
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save"  style="width:150px;"/>
                    <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
           		</td>
           </tr>
		</table>
		<?php include 'content_jv_popup.php';?>
		<?php require_once('contact-userverification.php');?>
		<?php echo form_hidden('username',isset($name) ? $name : '');?>
		<?php echo form_hidden('id',isset($id) ? $id : '');?>
		<?php echo form_hidden('qty',isset($qty) ? $qty : '');?>
		<?php echo form_hidden('n',isset($n) ? $n : '');?>
		<?php echo form_hidden('p',isset($p) ? $p : '');?>
		<?php echo form_hidden('act',isset($act) ? $act : '');?>
		<?php echo form_hidden('store',isset($store) ? $store : '');?>
		<?php echo form_hidden('n_doc_det',$this->input->post('n_doc_det'));?>
		<?php echo form_hidden('n_quantity',$this->input->post('n_quantity'));?>
		<?php echo form_hidden('n_remark',$this->input->post('n_remark'));?>
		<?php echo form_hidden('n_unitprice',$this->input->post('n_unitprice'));?>
	</div>
</div>