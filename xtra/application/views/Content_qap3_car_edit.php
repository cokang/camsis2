<?php echo form_open('qap3_car_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p">
			<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="2"><b>New CAR for <?= $this->input->get('ssiq') ?></b></td>
				</tr>
				
				<tr>
					<td class="td-assest2">CAR No : </td>
					<td><?= $this->input->get('carid') ?></td>
				</tr>
				<tr>
					<td class="td-assest2">SIQ No.:</td>			
					<td><?= $this->input->get('ssiq') ?></td>
				</tr>
				<tr>
					<td class="td-assest2" valign="top">CAR Date :</td>
					<td><input type="date" name="n_CARDate" value="<?= isset($record[0]->car_date) == TRUE ? date_format(new DateTime($record[0]->car_date), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Date From :</td>
					<td><input type="date" name="n_CARFromDate" value="<?= isset($record[0]->car_from) == TRUE ? date_format(new DateTime($record[0]->car_from), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Date To :</td>
					<td><input type="date" name="n_CARToDate" value="<?= isset($record[0]->car_to) == TRUE ? date_format(new DateTime($record[0]->car_to), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Problem Statement :</td>
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
					<td class="td-assest2">Follow Up CAR :</td>
					<td><?php echo 'Follow-up CAR should only contain a valid CAR number. It is entered when this CAR cannot be closed and new CAR has been initiated.' ?></td>
				</tr>
				<tr>
					<td class="td-assest2">Indicator Code :  </td>
					<td><?php echo form_dropdown('n_IndCode', $recordind, set_value('n_IndCode',isset($record[0]->ind_code) ? $record[0]->ind_code : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
					</td>
				</tr>
				<tr>
					<td class="td-assest2">QC  :  </td>

					<td><?php echo form_dropdown('n_QCcode', $recordqc, set_value('n_QCcode',isset($record[0]->qc_code) ? $record[0]->qc_code : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
					</td>
				</tr>
				<tr>
					<td class="td-assest2">Root Cause :</td>			
					<td><textarea class="input n_com" name="n_RootCause"><?= isset($record[0]->root_cause) ? $record[0]->root_cause : 'N/A' ?></textarea></td>
				</tr>
				<tr>
					<td class="td-assest2">Priority :  </td>
					<td><?php 
						$priority_list = array(
						'N' => 'Normal',
  						'E' => 'Emergency',
					 	);
						?>
				        <?php echo form_dropdown('n_priority', $priority_list, set_value('n_priority',isset($record[0]->priority) ? $record[0]->priority : 'N/A') , 'class="dropdown" style="width: 120px;"'); ?> 
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
				        <?php echo form_dropdown('n_status', $status_list, set_value('n_status',isset($record[0]->status) ? $record[0]->status : 'N/A') , 'class="dropdown" style="width: 120px;"'); ?> 
					</td>
				</tr>
				<tr>
					<td class="td-assest2">Issuer  :</td>
					<td><input type="text" name="n_issuer" value="<?= isset($record[0]->issuer) ? $record[0]->issuer : 'N/A' ?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Responsible Person :</td>
					<td><input type="text" name="n_respname" value="<?= isset($record[0]->resp_name) ? $record[0]->resp_name : 'N/A' ?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Verification</td></tr>
				<tr>
					<td class="td-assest2">Verified Date :</td>
					<td><input type="date" name="n_veridate" value="<?= isset($record[0]->veri_date) == TRUE ? date_format(new DateTime($record[0]->veri_date), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Verified By :</td>
					<td><input type="text" name="n_veriname" value="<?= isset($record[0]->veri_name) ? $record[0]->veri_name : 'N/A' ?>" class="form-control-button2 n_wi-date2"></td>
				</tr>
				<tr>
					<td class="td-assest2">Remarks (CAR Evaluation)  :</td>
					<td><textarea class="input n_com" name="n_remarks"><?= isset($record[0]->remarks) ? $record[0]->remarks : 'N/A' ?></textarea></td>
				</tr>
				<tr class="ui-header-new" style="height:40px;">
					<td align="center" colspan="2"><input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"></td>
				</tr>
			</table>
			<?php echo form_hidden('ssiq',$this->input->get('ssiq')) ?>
			<?php echo form_hidden('carid',$this->input->get('carid')) ?>
			<?php echo form_hidden('m',$this->input->get('m')) ?>
			<?php echo form_hidden('y',$this->input->get('y')) ?>
			<?php echo form_hidden('car',$this->input->get('car')) ?>
		</div>		
	</div>
</div>
</body>
</html>
