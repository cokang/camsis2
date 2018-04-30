<?php echo form_open('ud_codesetup_ctrl/comfirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm User Department Code Setup </span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">User Department Code:</td>
											<td><input type="text" id="n_ud_code" name="n_ud_code"  value="<?=set_value('n_ud_code')?>" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Description :</td>
											<td valign="top">
											<textarea id="n_Description" name="n_Description"  class="form-control-button2 n_wi-date2" style="height:140px;" disabled><?=set_value('n_Description')?></textarea>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">MOH Code:</td>
											<td><input type="text" id="n_moh" name="n_moh"  value="<?=set_value('n_moh')?>" class="form-control-button2 n_wi-date2" disabled><input type="hidden" id="n_mohdesc" name="n_mohdesc"  value="<?=set_value('n_mohdesc')?>" class="form-control-button2 n_wi-date2" disabled></td>
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
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Submit"> 
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">
					</td>
				</tr>
			</table>
		</div>
		<?php echo form_hidden('sys_id',$this->input->post('sys_id')); ?>
		<?php echo form_hidden('n_ud_code',$this->input->post('n_ud_code')) ?>
		<?php echo form_hidden('n_Description',$this->input->post('n_Description')) ?>
		<?php echo form_hidden('n_moh',$this->input->post('n_moh')) ?>
		<?php echo form_hidden('n_mohdesc',$this->input->post('n_mohdesc')) ?>
	</div>
</div>
</body>
</html>
