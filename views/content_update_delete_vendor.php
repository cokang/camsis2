<?php echo form_open('vendor_update_ctrl?tab='.$this->input->get('tab'));?>
<body style="margin:0px;">
<div class="ui-main-form-5" style="margin:0;">
	<table width="100%" class="ui-content-form-reg" style="background:white;">
		<tr class="ui-color-contents-style-1" height="30px">
			<td colspan="2" class="ui-header-new">
			<span class="textmenu" style="float:left;">
			<?php if ($this->input->get('tab') == 'Update'){ ?> <b> Edit </b> Vendor
			<?php }elseif($this->input->get('tab') == 'Delete'){ ?> <b> Confirm Delete Request</b> 
			<?php }elseif($this->input->get('tab') == 'New'){ ?><b> New </b> Vendor
			<?php } ?> </span>
			
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
											<td><?=isset($record[0]->VENDOR_NAME) ? $record[0]->VENDOR_NAME : ''?><input type="hidden"  name="n_vendor_name" value="<?=set_value('n_vendor_name',isset($record[0]->VENDOR_NAME) ? $record[0]->VENDOR_NAME : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Code : </td>
											<td><?=isset($record[0]->VENDOR_CODE) ? $record[0]->VENDOR_CODE : ''?><input type="hidden"  name="n_vendor_code" value="<?=set_value('n_vendor_code',isset($record[0]->VENDOR_CODE) ? $record[0]->VENDOR_CODE : '')?>" class="form-control-button2 n_wi-date2"></td>
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
										<?php } ?> Vendor for <?=$this->input->get_post('code')?>
										</td>
										</tr>
										<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Vendor Details</td></tr>													
										<tr>
											<td class="td-assest" style="width:40%;">Vendor Name : </td>
											<td><input type="text"  name="n_vendor_name" value="<?=set_value('n_vendor_name',isset($record[0]->VENDOR_NAME) ? $record[0]->VENDOR_NAME : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Code  :</td>
											<td><input type="text"  name="n_vendor_code" value="<?=set_value('n_vendor_code',isset($record[0]->VENDOR_CODE) ? $record[0]->VENDOR_CODE : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Item Id :</td>
											<td><input type="text"  name="n_vendor_itemid" value="<?=set_value('n_vendor_itemid',isset($record[0]->Vendor_Item_Code) ? $record[0]->Vendor_Item_Code : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Item Name :</td>
											<td><input type="text"  name="n_vendor_itemname" value="<?=set_value('n_vendor_itemname',isset($record[0]->EQUIPMENT_TYPE_NAME) ? $record[0]->EQUIPMENT_TYPE_NAME : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Price  :</td>
											<td><input type="text"  name="n_price" value="<?=set_value('n_price',isset($record[0]->List_Price) ? number_format($record[0]->List_Price,2) : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Vendor Address :</td>
											<td><input type="text"  name="n_vendor_address1" value="<?=set_value('n_vendor_address1',isset($record[0]->ADDRESS) ? $record[0]->ADDRESS : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest"></td>
											<td><input type="text"  name="n_vendor_address2" value="<?=set_value('n_vendor_address2',isset($record[0]->ADDRESS2) ? $record[0]->ADDRESS2 : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest"></td>
											<td><input type="text"  name="n_vendor_address3" value="<?=set_value('n_vendor_address3',isset($record[0]->ADDRESS3) ? $record[0]->ADDRESS3 : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest" valign="top">Tel No. : </td>
											<td><input type="text"  name="n_vendor_tel" value="<?=set_value('n_vendor_tel',isset($record[0]->TELEPHONE_NO) ? $record[0]->TELEPHONE_NO : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Fax No. : </td>
											<td><input type="text"  name="n_vendor_fax" value="<?=set_value('n_vendor_fax',isset($record[0]->FAX_NO) ? $record[0]->FAX_NO : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td class="td-assest">Contact Person :  </td>
											<td><input type="text"  name="n_contact_person" value="<?=set_value('n_contact_person',isset($record[0]->CONTACT_PERSON) ? $record[0]->CONTACT_PERSON : '')?>" class="form-control-button2 n_wi-date2"></td>
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
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="v_status" class="regular-radio" value="CONTRACTOR"<?=set_radio('v_status','CONTRACTOR',TRUE)?><?=isset($record[0]->CONTRACTOR_SUPPLIER) && $record[0]->CONTRACTOR_SUPPLIER == 'CONTRACTOR' ? 'checked' : 'checked'?> />   
												<label for="radio-1-<?php echo $xx++ ?>"></label> CONTRACTOR <br>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="v_status" class="regular-radio" value="SUPPLIER"<?=set_radio('v_status','SUPPLIER')?><?=isset($record[0]->CONTRACTOR_SUPPLIER) && $record[0]->CONTRACTOR_SUPPLIER == 'SUPPLIER' ? 'checked' : ''?> />   
												<label for="radio-1-<?php echo $xx++ ?>"></label> SUPPLIER <br>
											</td>
										</tr>
										<tr>
											<td class="td-assest">Bumi Status :</td>
											<td>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="b_status" class="regular-radio" value="BUMI"<?=set_radio('b_status','BUMI',TRUE)?><?=isset($record[0]->BUMI_STATUS) && $record[0]->BUMI_STATUS == 'BUMI' ? 'checked' : 'checked'?> />   
												<label for="radio-1-<?php echo $xx++ ?>"></label> BUMI  <br>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="b_status" class="regular-radio" value="NON BUMI"<?=set_radio('b_status','NON BUMI')?><?=isset($record[0]->BUMI_STATUS) && $record[0]->BUMI_STATUS == 'NON BUMI' ? 'checked' : ''?> />   
												<label for="radio-1-<?php echo $xx++ ?>"></label> NON BUMI <br>
											</td>
										</tr>
										<tr>
											<td class="td-assest">GST  :</td>
											<td>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="gst" class="regular-radio" value="Y"<?=set_radio('gst','Y',TRUE)?><?=isset($record[0]->gst) && $record[0]->gst == 'Y' ? 'checked' : 'checked'?> />   
												<label for="radio-1-<?php echo $xx++ ?>"></label> YES  <br>
												<input type="radio" id="radio-1-<?php echo $x++ ?>" name="gst" class="regular-radio" value="N"<?=set_radio('gst','N')?><?=isset($record[0]->gst) && $record[0]->gst == 'N' ? 'checked' : ''?> />   
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
	<?php echo form_hidden('code',$this->input->get_post('code')) ?>
	<?php echo form_hidden('vid',$this->input->get_post('vid')) ?>
	<?php echo form_hidden('viid',$this->input->get_post('viid')) ?>
</form>
</body>
</html>