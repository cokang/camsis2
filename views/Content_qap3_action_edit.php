<?php echo form_open('qap3_car_action_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Edit Action for <?= $this->input->get('carid') ?> of SIQ <?= $this->input->get('ssiq') ?></span></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
					<table class="ui-content-form" width="100%" border="0">	
						<tr style="height:20px;">
							<td class="td-assest2">SIQ No. : </td>
							<td><?= $this->input->get('ssiq') ?></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">CAR No :</td>
							<td><?= $this->input->get('carid') ?></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">Action No :</td>
							<td><?= $this->input->get('sl_no') ?></td>
							<input type="hidden" name="sl_no" value="<?= $this->input->get('sl_no') ?>" class="form-control-button2 n_wi-date2">
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">Action Description :</td>
							<td><textarea class="input n_com" name="n_actdesc"><?= isset($record[0]->action) ? $record[0]->action : 'N/A' ?></textarea></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">Start Date :</td>
							<td><input type="date" name="n_startdate" value="<?= isset($record[0]->start_date) == TRUE ? date_format(new DateTime($record[0]->start_date), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">End Date :</td>
							<td><input type="date" name="n_enddate" value="<?= isset($record[0]->end_date) == TRUE ? date_format(new DateTime($record[0]->end_date), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Action Completion</td></tr>
						<tr style="height:20px;">
							<td class="td-assest2">Done Date :</td>
							<td><input type="date" name="n_donedate" value="<?= isset($record[0]->done_date) == TRUE ? date_format(new DateTime($record[0]->done_date), 'Y-m-d') : 'N/A'?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">MIS User ID :</td>
							<td><input type="text" name="n_misuserid" value="<?= isset($record[0]->mis_user_id) ? $record[0]->mis_user_id : 'N/A' ?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2"><input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?= isset($record[0]->id) ? $record[0]->id : 'N/A' ?>" class="form-control-button2 n_wi-date2">
		<?php echo form_hidden('ssiq',$this->input->get('ssiq')) ?>
		<?php echo form_hidden('carid',$this->input->get('carid')) ?>
		<?php echo form_hidden('m',$this->input->get('m')) ?>
		<?php echo form_hidden('y',$this->input->get('y')) ?>
		<?php echo form_hidden('car',$this->input->get('car')) ?>
	</div>
</div>
</body>
</html>