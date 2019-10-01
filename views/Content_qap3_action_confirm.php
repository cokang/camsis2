<?php echo form_open('qap3_action_new_ctrl/confirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Confirm Action for <?= $this->input->post('carid') ?> of <?= $this->input->post('ssiq') ?></span></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
					<table class="ui-content-form" width="100%" border="0">	
						<tr style="height:20px;">
							<td class="td-assest2">SIQ No. : </td>
							<td><?= $this->input->post('ssiq') ?></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">CAR No :</td>
							<td><?= $this->input->post('carid') ?></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">Action No :</td>
							<td><?php echo set_value('slno') ?></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">Action Description :</td>
							<td><textarea class="input n_com" name="n_actdesc" disabled ><?php echo set_value('n_actdesc') ?></textarea></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">Start Date :</td>
							<td><input type="date" name="n_startdate" value="<?php echo set_value('n_startdate') ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">End Date :</td>
							<td><input type="date" name="n_enddate" value="<?php echo set_value('n_enddate') ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Action Completion</td></tr>
						<tr style="height:20px;">
							<td class="td-assest2">Done Date :</td>
							<td><input type="date" name="n_donedate" value="<?php echo set_value('n_donedate') ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
						<tr style="height:20px;">
							<td class="td-assest2">MIS User ID :</td>
							<td><input type="text" name="n_misuserid" value="<?php echo set_value('n_misuserid') ?>" class="form-control-button2 n_wi-date2" disabled></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
	                <input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
	                <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
	            </td>
			</tr>
		</table>
		<?php echo form_hidden('ssiq',$this->input->post('ssiq')) ?>
		<?php echo form_hidden('carid',$this->input->post('carid')) ?>
		<?php echo form_hidden('slno',$this->input->post('slno')) ?>
		<?php echo form_hidden('n_actdesc',$this->input->post('n_actdesc')) ?>
		<?php echo form_hidden('n_startdate',$this->input->post('n_startdate')) ?>
		<?php echo form_hidden('n_enddate',$this->input->post('n_enddate')) ?>
		<?php echo form_hidden('n_donedate',$this->input->post('n_donedate')) ?>
		<?php echo form_hidden('n_misuserid',$this->input->post('n_misuserid')) ?>
	</div>
</div>
</body>
</html>