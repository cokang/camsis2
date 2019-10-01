<?php echo form_open('ud_codesetup_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<?php if ($this->input->get('ud_insert') != '') { ?>  
		<span style="color:red; display: block;width: 100%; text-align: center;"> Duplicate Department Code and Name </span>
		<?php } ?>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">

				<table align="left" height="40px" border="0">

					<tr>
						<td><span style="margin-left:10px;"><?php if ($this->input->get('sys_id') == ''){echo 'Add';}else{echo 'Edit';}?> User Department Code Setup </span></td>
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
											<td><input type="text" id="n_ud_code" name="n_ud_code"  value="<?=set_value('n_ud_code',isset($record[0]->v_UserDeptCode) ? $record[0]->v_UserDeptCode : '')?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Description :</td>
											<td valign="top">
											<textarea id="n_Description" name="n_Description"  value="" class="form-control-button2 n_wi-date2" style="height:140px;"><?=set_value('n_Description',isset($record[0]->v_UserDeptDesc) ? $record[0]->v_UserDeptDesc : '')?></textarea>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">MOH Code:</td>
											<td><input type="text" id="n_moh" name="n_moh"  value="<?=set_value('n_moh',isset($record[0]->v_mohcode) ? $record[0]->v_mohcode : '')?>" class="form-control-button2 n_wi-eq3" readonly> <span class="icon-windows" onclick="mohcode(this)" value="mohcode" ></span><input type="hidden" id="n_mohdesc" name="n_mohdesc"  value="<?=set_value('n_mohdesc',isset($record[0]->v_mohdesc) ? $record[0]->v_mohdesc : '')?>" class="form-control-button2 n_wi-eq3" readonly></td>

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
		<?php echo form_hidden('sys_id',$this->input->get_post('sys_id')); ?>
	</div>
</div>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
