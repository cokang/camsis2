<?php if ($this->input->get('pro') == 'pending'){ ?>
<?php echo form_open('amapproval_ctrl/comfirmation');?>
<?php } else if ($this->input->get('pr') == 'pending' || $this->input->get('pr') == 'approved') { ?>
<?php echo form_open('prapproval_ctrl/comfirmation?pr='.$this->input->get('pr'));?>
<?php } ?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm Approval View</span></td>
					</tr>
				</table>
			</div>
			<?php $xx=0; $x=0;?>
			<?php if ($this->input->post('classid') == 3){ ?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Payment</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_Payment" class="regular-radio" value="COD"<?=set_radio('n_Payment','COD',TRUE)?>  checked="checked" disabled/>
												<label for="radio-1-<?=$x++?>"></label> COD (Cash On Delivery) <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_Payment" class="regular-radio" value="TERM"<?=set_radio('n_Payment','TERM')?> disabled/>
												<label for="radio-1-<?=$x++?>"></label> TERM <span style="display:inline-block; width:15px;"></span></br></br>
												<input type="checkbox" name="chkbox" value="1"<?=set_checkbox('chkbox','1',TRUE)?> id ="checkbox" disabled>Returned Required
											</td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<?php } ?>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Result</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="4"<?=set_radio('n_options','4',TRUE)?>  checked="checked" disabled />
												<label for="radio-1-<?=$x++?>"></label> Approved <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="5"<?=set_radio('n_options','5')?> disabled />
												<label for="radio-1-<?=$x++?>"></label> Reject <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="107"<?=set_radio('n_options','107')?> disabled />
												<label for="radio-1-<?=$x++?>"></label> Returned
											</td>
										</tr>
										<?php if ($this->input->get('pr') == 'approved'){ ?>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Vendor Reference    :</td>
											<td><textarea class="input n_com" name="ven_ref" <?php if($this->input->get('pro') != 'pending'){ echo 'readonly';}?> disabled><?=set_value('ven_ref')?></textarea></td>
										</tr>
										<?php } ?>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Remark    :</td>
											<td><textarea class="input n_com" name="n_remark" <?php if($this->input->get('pro') != 'pending'){ echo 'readonly';}?> disabled><?=set_value('n_remark')?></textarea></td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save">
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">
					</td>
				</tr>
			</table>
		</div>
		<?php echo form_hidden('n_Payment',$this->input->post('n_Payment')) ?>
		<?php echo form_hidden('chkbox',$this->input->post('chkbox')) ?>
		<?php echo form_hidden('n_options',$this->input->post('n_options')) ?>
		<?php echo form_hidden('ven_ref',$this->input->post('ven_ref')) ?>
		<?php echo form_hidden('n_remark',$this->input->post('n_remark')) ?>
		<?php echo form_hidden('classid',$this->input->post('classid')) ?>
		<?php $qtyapp = $this->input->post('n_qtyapp');
		echo form_hidden($qtyapp); ?>
		<?php
		if ($this->input->post('classid') == 3){
		$price = $this->input->post('n_price');
		echo form_hidden($price);
		$vendor = $this->input->post('n_vendor');
		echo form_hidden($vendor);
		//$part = $this->input->post('partchk');
		$part = $this->input->post('partc');
		echo form_hidden($part);
		}
		?>

		<?php echo form_hidden('mrinno',$this->input->post('mrinno')) ?>
		<?php echo form_hidden('prno',$this->input->post('prno')) ?>
	</div>
</div>
<?php include 'content_jv_popup.php';?>
</body>
<?php echo form_close(); ?>
</html>
