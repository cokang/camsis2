<?php echo form_open('wo_personnelinvolved_update_ctrl/confirmation');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="4"><b>Confirm Personnel Involved</b></td>
			</tr>
            <tr style="font-weight: bold;">
                                <td>Response </td>
								<td >Minutes</td>
								<td>Rate</td>
                                <td>Total</td>
							</tr>
			<tr>
				<td >
				
					<div class="ui-main-form-1">
						
						<input type="text" name="v_personal1" value="<?= $this->input->post('v_personal1') ?>" class="form-control-button2 " readonly />
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_hour1" value="<?= $this->input->post('v_hour1') ?>" class="form-control-button2 " readonly/></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate1" value="<?= $this->input->post('v_rate1') ?>" class="form-control-button2 " readonly/></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_total1" value="<?= $total1 ?>" class="form-control-button2 " readonly/></div>
                </td>
			</tr>
            <tr>
				<td >
				
					<div class="ui-main-form-1">
						
						<input type="text" name="v_person_2" value="<?= $this->input->post('v_personal2') ?>" class="form-control-button2 " readonly/>
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_hour2" value="<?= $this->input->post('v_hour2') ?>" class="form-control-button2 " readonly/></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate2" value="<?= $this->input->post('v_rate2') ?>" class="form-control-button2 " readonly/></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_total2" value="<?= $total2 ?>" class="form-control-button2 " readonly/></div>
                </td>
			</tr><tr>
				<td >
				
					<div class="ui-main-form-1">
						
						<input type="text" name="v_personal3" value="<?= $this->input->post('v_personal3') ?>" class="form-control-button2 " readonly/>
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_hour3" value="<?= $this->input->post('v_hour3') ?>" class="form-control-button2 " readonly/></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate3" value="<?= $this->input->post('v_rate3') ?>" class="form-control-button2 " readonly/></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_total3" value="<?= $total3 ?>" class="form-control-button2 " readonly/></div>
                </td>
			</tr>
            <tr style="height:20px;">
            <td colspan="2"></td>
				<td>
					<div class="ui-main-form-1">
						Total
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="V_totalAll" value="<?= $total1+$total2+$total3 ?>" class="form-control-button2 " readonly/></div>
                </td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="4">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>		
        <?php echo form_hidden ('wrk_ord',$this->input->post('wrk_ord')); ?>
        <?php echo form_hidden ('v_personal1',$this->input->post('v_personal1')); ?>		
        <?php echo form_hidden ('v_personal2',$this->input->post('v_personal2')); ?>	
        <?php echo form_hidden ('v_personal3',$this->input->post('v_personal3')); ?>
        <?php echo form_hidden ('v_hour1',$hour_deci1); ?>		
        <?php echo form_hidden ('v_hour2',$hour_deci2); ?>	
        <?php echo form_hidden ('v_hour3',$hour_deci3); ?>
        <?php echo form_hidden ('v_rate1',$this->input->post('v_rate1')); ?>		
        <?php echo form_hidden ('v_rate2',$this->input->post('v_rate2')); ?>	
        <?php echo form_hidden ('v_rate3',$this->input->post('v_rate3')); ?>		
        <?php echo form_hidden ('v_total1',$total1); ?>		
        <?php echo form_hidden ('v_total2',$total2); ?>	
        <?php echo form_hidden ('v_total3',$total3); ?>
	</div>
</div>
<?php echo form_close(); ?>