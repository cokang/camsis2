<?php echo form_open('qap3_car_new_ctrl/confirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table2" style="border:2px solid #398074; color:black;" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm CAR for SIQ <?= $this->input->post('ssiq') ?></b></td>
			</tr>
			<tr>
				<td width="25%" valign="top" align="right">CAR No : </td>
				<td></td>
			</tr>
			<tr>
				<td valign="top" align="right">SIQ No. :</td>			
				<td><?= $this->input->post('ssiq') ?></td>
			</tr>
			<tr>
				<td valign="top" align="right">CAR Date :</td>
				<td><input type="date" name="CARDate" value="<?php echo set_value('CARDate') ?>" class="form-control-button2" style="width:200px;" disabled></td>
			</tr>
			<tr>
				<td valign="top" align="right">Date From :</td>
				<td><input type="date" name="CARDateFrom" value="<?php echo set_value('CARDateFrom') ?>" class="form-control-button2" style="width:200px;" disabled></td>
			</tr>
			<tr>
				<td valign="top" align="right">Date To :&nbsp;</td>
				<td><input type="date" name="CARDateTo" value="<?php echo set_value('CARDateTo') ?>" class="form-control-button2" style="width:200px;" disabled></td>
			</tr>
			<tr>
				<td valign="top" align="right">Problem Statement :</td>
				<td><?php echo set_value('CARDesc') ?></td>
			</tr>
			<tr>
				<td class="td-assest2">Indicator Code :  </td>
				<td><?php echo form_dropdown('n_IndCode', $recordind, set_value('n_IndCode'), 'class="dropdown" style="width: 150px;" disabled'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest2">QC  :  </td>
				<td><?php echo form_dropdown('n_QCcode', $recordqc, set_value('n_QCcode') , 'class="dropdown" style="width: 300px;" disabled'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest2">Root Cause :</td>			
				<td><textarea class="input n_com" name="n_RootCause" disabled><?php echo set_value('n_RootCause') ?></textarea></td>
			</tr>
			<tr>
				<td class="td-assest2">Priority :  </td>
				<td><?php 
						$priority_list = array(
						'N' => 'Normal',
  						'E' => 'Emergency',
					 	);
						?>
				        <?php echo form_dropdown('n_priority', $priority_list, set_value('n_priority',set_value('n_priority')) , 'class="dropdown" style="width: 120px;" disabled'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest2">Status :  </td>
				<td><?php 
						$status_list = array(
						'0' => 'Open',
  						'1' => 'Close',
					 	);
						?>
				        <?php echo form_dropdown('n_status', $status_list, set_value('n_status',set_value('n_status')) , 'class="dropdown" style="width: 120px;" disabled'); ?> 
				</td>
			</tr>
			<tr>
				<td class="td-assest2">Issuer  :</td>
				<td><input type="text" name="n_issuer" value="<?php echo set_value('n_issuer') ?>" class="form-control-button2 n_wi-date2" disabled></td>
			</tr>
			<tr>
				<td class="td-assest2">Responsible Person :</td>
				<td><input type="text" name="n_respname" value="<?php echo set_value('n_respname') ?>" class="form-control-button2 n_wi-date2" disabled></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Verification</td></tr>
			<tr>
				<td class="td-assest2">Verified Date :</td>
				<td><input type="date" name="n_veridate" value="<?php echo set_value('n_veridate') ?>" class="form-control-button2 n_wi-date2" disabled></td>
			</tr>
			<tr>
				<td class="td-assest2">Verified By :</td>
				<td><input type="text" name="n_veriname" value="<?php echo set_value('n_veriname') ?>" class="form-control-button2 n_wi-date2" disabled></td>
			</tr>
			<tr>
				<td class="td-assest2">Remarks (CAR Evaluation)  :</td>
				<td><textarea class="input n_com" name="n_remarks" disabled><?php echo set_value('n_remarks') ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('ssiq',$this->input->post('ssiq')) ?>
		<?php echo form_hidden('m',$this->input->post('m')) ?>
		<?php echo form_hidden('y',$this->input->post('y')) ?>
		<?php echo form_hidden('siq',$this->input->post('siq')) ?>
		<?php echo form_hidden('CARDate',$this->input->post('CARDate')) ?>
		<?php echo form_hidden('CARDateFrom',$this->input->post('CARDateFrom')) ?>
		<?php echo form_hidden('CARDateTo',$this->input->post('CARDateTo')) ?>
		<?php echo form_hidden('CARDesc',$this->input->post('CARDesc')) ?>
		<?php echo form_hidden('n_IndCode',$this->input->post('n_IndCode')) ?>
		<?php echo form_hidden('n_QCcode',$this->input->post('n_QCcode')) ?>
		<?php echo form_hidden('n_RootCause',$this->input->post('n_RootCause')) ?>
		<?php echo form_hidden('n_priority',$this->input->post('n_priority')) ?>
		<?php echo form_hidden('n_status',$this->input->post('n_status')) ?>
		<?php echo form_hidden('n_issuer',$this->input->post('n_issuer')) ?>
		<?php echo form_hidden('n_respname',$this->input->post('n_respname')) ?>
		<?php echo form_hidden('n_veridate',$this->input->post('n_veridate')) ?>
		<?php echo form_hidden('n_veriname',$this->input->post('n_veriname')) ?>
		<?php echo form_hidden('n_remarks',$this->input->post('n_remarks')) ?>				
	</div>
</div>