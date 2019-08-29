<?php echo form_open('vendor_update_ctrl/comfirmation');?>
<body style="margin:0px;">
<div class="ui-main-form-5" style="margin:0;">
	<table width="100%" class="ui-content-form-reg" style="background:white;">
		<tr class="ui-color-contents-style-1" height="30px">
			<td colspan="2" class="ui-header-new">
			<span class="textmenu" style="float:left;">
			<?php if ($this->input->get('tab') != 'Delete'){ ?>
			<b>Confirm</b> Vendor</span>
			<?php } else { ?>
			<b>Confirm</b> Delete</span>
			<?php } ?>
			</td>
		</tr>
		<tr >
			<td class="ui-desk-style-table">
			<?php if ($this->input->get('tab') == 'Delete'){ ?>
				<div class="ui-main-form-1">
					<div class="middle_d">
						<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">												
										<tr>
											<td class="td-assest" style="width:40%;">Vendor Name : </td>
											<td><?=set_value('n_vendor_name')?></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Code : </td>
											<td><?=set_value('n_vendor_code')?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
			<?php }else{ ?>
				<div class="ui-main-form-1">
					<div class="middle_d">
						<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
								<?php $numberdate = 0; ?>
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="3"style="height:40px;">
										<?php if ($this->input->get('tab') == 'Update'){ ?> <b> Edit </b>
										<?php }elseif($this->input->get('tab') == 'New'){ ?><b> New </b>
										<?php } ?> Vendor for <?=$this->input->post('id')?>
										</td>
										</tr>
										<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Vendor Details</td></tr>													
										<tr>
											<td class="td-assest" style="width:40%;">Vendor Name : </td>
											<td><input type="text"  name="n_vendor_name" value="<?=set_value('n_vendor_name')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Code  :</td>
											<td><input type="text"  name="n_vendor_code" value="<?=set_value('n_vendor_code')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Item Id :</td>
											<td><input type="text"  name="n_vendor_itemid" value="<?=set_value('n_vendor_itemid')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Item Name :</td>
											<td><input type="text"  name="n_vendor_itemname" value="<?=set_value('n_vendor_itemname')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Price  :</td>
											<td><input type="text"  name="n_price" value="<?=set_value('n_price')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Address :</td>
											<td><input type="text"  name="n_vendor_address1" value="<?=set_value('n_vendor_address1')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest"></td>
											<td><input type="text"  name="n_vendor_address2" value="<?=set_value('n_vendor_address2')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest"></td>
											<td><input type="text"  name="n_vendor_address3" value="<?=set_value('n_vendor_address3')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest" valign="top">Tel No. : </td>
											<td><input type="text"  name="n_vendor_tel" value="<?=set_value('n_vendor_tel')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Fax No. : </td>
											<td><input type="text"  name="n_vendor_fax" value="<?=set_value('n_vendor_fax')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td class="td-assest">Contact Person :  </td>
											<td><input type="text"  name="n_contact_person" value="<?=set_value('n_contact_person')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>										
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="ui-main-form-2">
					<div class="middle_d">
						<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">												
										<tr>
											<td class="td-assest" style="width:40%;">Vendor Status :</td>
											<?php $x = 0; $xx = 0;?>
											<td>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="v_status" class="regular-radio" value="CONTRACTOR"<?=set_radio('v_status','CONTRACTOR',TRUE)?> disabled/>   
												<label for="radio-1-<?php echo $xx++ ?>"></label> CONTRACTOR <br>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="v_status" class="regular-radio" value="SUPPLIER"<?=set_radio('v_status','SUPPLIER')?> disabled/>   
												<label for="radio-1-<?php echo $xx++ ?>"></label> SUPPLIER <br>
											</td>
										</tr>
										<tr>
											<td class="td-assest">Bumi Status :</td>
											<td>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="b_status" class="regular-radio" value="BUMI"<?=set_radio('b_status','BUMI',TRUE)?> disabled/>   
												<label for="radio-1-<?php echo $xx++ ?>"></label> BUMI  <br>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="b_status" class="regular-radio" value="NON BUMI"<?=set_radio('b_status','NON BUMI')?> disabled/>   
												<label for="radio-1-<?php echo $xx++ ?>"></label> NON BUMI <br>
											</td>
										</tr>
										<tr>
											<td class="td-assest">GST  :</td>
											<td>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="gst" class="regular-radio" value="Y"<?=set_radio('gst','Y',TRUE)?> disabled/>   
												<label for="radio-1-<?php echo $xx++ ?>"></label> YES  <br>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="gst" class="regular-radio" value="N"<?=set_radio('gst','N')?> disabled/>   
												<label for="radio-1-<?php echo $xx++ ?>"></label> NO <br>
											</td>
										</tr>																									
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
			<?php } ?>
			</td>
		</tr>
		<tr class="ui-color-contents-style-1" height="30px">
			<td colspan="2" class="ui-header-new" align="center">
			<?php if ($this->input->get('tab') == 'Delete'){ ?>
			<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Delete" style="width:150px;"/>
			<?php } else { ?>
			<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
			<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
			<?php } ?>
			</td>
		</tr>
	</table>
	<?php echo form_hidden('tab',$this->input->get('tab')) ?>
	<?php echo form_hidden('code',$this->input->post('code')) ?>
	<?php echo form_hidden('vid',$this->input->post('vid')) ?>
	<?php echo form_hidden('viid',$this->input->post('viid')) ?>
	<?php echo form_hidden('n_vendor_name',$this->input->post('n_vendor_name')) ?>
	<?php echo form_hidden('n_vendor_code',$this->input->post('n_vendor_code')) ?>
	<?php echo form_hidden('n_vendor_itemid',$this->input->post('n_vendor_itemid')) ?>
	<?php echo form_hidden('n_vendor_itemname',$this->input->post('n_vendor_itemname')) ?>
	<?php echo form_hidden('n_price',$this->input->post('n_price')) ?>
	<?php echo form_hidden('n_vendor_address1',$this->input->post('n_vendor_address1')) ?>
	<?php echo form_hidden('n_vendor_address2',$this->input->post('n_vendor_address2')) ?>
	<?php echo form_hidden('n_vendor_address3',$this->input->post('n_vendor_address3')) ?>
	<?php echo form_hidden('n_vendor_tel',$this->input->post('n_vendor_tel')) ?>
	<?php echo form_hidden('n_vendor_fax',$this->input->post('n_vendor_fax')) ?>
	<?php echo form_hidden('n_contact_person',$this->input->post('n_contact_person')) ?>
	<?php echo form_hidden('v_status',$this->input->post('v_status')) ?>
	<?php echo form_hidden('b_status',$this->input->post('b_status')) ?>
	<?php echo form_hidden('gst',$this->input->post('gst')) ?>
</form>
</body>
</html>