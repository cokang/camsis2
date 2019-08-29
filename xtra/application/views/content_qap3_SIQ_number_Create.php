<?php echo form_open('qap3_car_new_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table2" style="border:2px solid #398074; color:black;" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>New CAR for <?php echo $this->input->get('ssiq') ?></b></td>
			</tr>
			<tr>
				<td width="25%" valign="top" align="right">CAR No : </td>
				<td><?php echo 'System will automatically generate this number.' ?></td>
			</tr>
			<tr>
				<td valign="top" align="right">SIQ No. :</td>			
				<td><?php echo $this->input->get('ssiq') ?></td>
			</tr>
			<tr>
				<td valign="top" align="right">CAR Date :</td>
				<td><input type="date" name="CARDate" value="<?=date('Y-m-d')?><?php echo set_value('CARDate'); ?>" class="form-control-button2" style="width:200px;"></td>
			</tr>
			<tr>
				<td valign="top" align="right">Date From :</td>
				<td><input type="date" name="CARDateFrom" value="<?php echo set_value('CARDateFrom'); ?>" class="form-control-button2" style="width:200px;"></td>
			</tr>
			<tr>
				<td valign="top" align="right">Date To :&nbsp;</td>
				<td><input type="date" name="CARDateTo" value="<?php echo set_value('CARDateTo'); ?>" class="form-control-button2" style="width:200px;"></td>
			</tr>
			<tr>
				<td valign="top" align="right">Problem Statement :</td>
				<?php 
					if($recordsiq[0]->ind_code == 'BES05'){
						$statement = 'PPM is not done according to schedule';
					}
					else{
						$statement = 'Asset is not meeting uptime target';
					}
					?>
				<td><?= $statement.' '.$recordsiq[0]->type_code.' - '.$recordsiq[0]->siq_asset ?></td>
				<?php if ($assetcode != '') { ?> 
				<input type="hidden" name="CARDesc" value="<?= $statement.','.$recordsiq[0]->type_code.','.$recordsiq[0]->siq_asset.' '.$assetcode ?>" class="form-control-button2 n_wi-date2">
				<?php } else { ?>
				<input type="hidden" name="CARDesc" value="<?= $statement.','.$recordsiq[0]->type_code.','.$recordsiq[0]->siq_asset ?>" class="form-control-button2 n_wi-date2">
				<?php } ?>
			</tr>
			<tr>
				<td class="td-assest2">Indicator Code :  </td>
				<td><?php echo form_dropdown('n_IndCode', $recordind, set_value('n_IndCode') , 'class="dropdown n_wi-date2"'); ?>
				</td>
				</tr>
			<tr>
				<td class="td-assest2">QC  :  </td>
				<td><?php echo form_dropdown('n_QCcode', $recordqc, set_value('n_QCcode') , 'class="dropdown n_wi-date2"'); ?>
				</td>
				</tr>
			<tr>
					<td class="td-assest2">Root Cause :</td>			
					<td><textarea class="input n_com" name="n_RootCause"><?php echo set_value('n_RootCause') ?></textarea></td>
				</tr>
			<tr>
					<td class="td-assest2">Priority :  </td>
					<td><?php 
						$priority_list = array(
						'N' => 'Normal',
  						'E' => 'Emergency',
					 	);
						?>
				        <?php echo form_dropdown('n_priority', $priority_list, set_value('n_priority') , 'class="dropdown" style="width: 120px;"'); ?> 
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
				        <?php echo form_dropdown('n_status', $status_list, set_value('n_status') , 'class="dropdown" style="width: 120px;"'); ?> 
					</td>
				</tr>
			<tr>
					<td class="td-assest2">Issuer  :</td>
					<td><input type="text" name="n_issuer" value="<?php echo set_value('n_issuer') ?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Responsible Person :</td>
					<td><input type="text" name="n_respname" value="<?php echo set_value('n_respname') ?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
			<tr>
				<td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Job Closing</td>
			</tr>
			<tr>
				<td valign="top" align="right">Verified Date :&nbsp;</td>
				<td><input type="date" name="n_veridate" value="<?php echo set_value('n_veridate'); ?>" class="form-control-button2" style="width:200px;"></td>
			</tr>
			<tr>
				<td valign="top" align="right">Verified By :&nbsp;</td>
				<td><input type="text" name="n_veriname" value="<?php echo set_value('n_veriname'); ?>" class="form-control-button2" style="width:200px;"></td>
			</tr>
			<tr>
				<td valign="top" align="right">Remarks (CAR Evaluation) :&nbsp;</td>
				<td><textarea class="input" name="n_remarks" cols="19" rows="5"><?php echo set_value('n_remarks') ?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
					<td align="center" colspan="2"><input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"></td>
				</tr>
		</table>
		<?php echo form_hidden('ssiq',$this->input->get('ssiq')) ?>
		<?php echo form_hidden('m',$this->input->get('m')) ?>
		<?php echo form_hidden('y',$this->input->get('y')) ?>
		<?php echo form_hidden('siq',$this->input->get('siq')) ?>				
	</div>
</div>