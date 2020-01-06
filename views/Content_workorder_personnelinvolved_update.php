<?php echo form_open('wo_personnelinvolved_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="4"><b>Update Personnel Involved</b></td>
			</tr>

            <tr style="font-weight: bold;">
                                <td>Response </td>
								<td >Minutes</td>
								<td>Rate</td>
                                <!-- <td>Total</td> -->
							</tr>
			<tr>
				<td >
				
					<div class="ui-main-form-1">
						
						<input type="text" name="v_personal1" value="<?= isset($rpersonnel[0]->v_Personal1)?$rpersonnel[0]->v_Personal1:''; ?>" class="form-control-button2 " />
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_hour1" value="<?= isset($minutes1) == TRUE ? $minutes1 : '' ?>" class="form-control-button2 " /></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate1" value="<?= isset($rpersonnel[0]->n_Rate1)?$rpersonnel[0]->n_Rate1:''; ?>" class="form-control-button2 " /></div>
                </td>
                <!-- <td>
                <div class="ui-main-form-2"><input type="text" name="v_total1" value="" class="form-control-button2 " /></div>
                </td> -->
			</tr>
            <tr>
				<td >
				
					<div class="ui-main-form-1">
						
						<input type="text" name="v_personal2" value="<?= isset($rpersonnel[0]->v_Personal2)?$rpersonnel[0]->v_Personal2:''; ?>" class="form-control-button2 " />
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_hour2" value="<?= isset($minutes2) == TRUE ? $minutes2 : '' ?>" class="form-control-button2 " /></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate2" value="<?= isset($rpersonnel[0]->n_Rate2)?$rpersonnel[0]->n_Rate2:''; ?>" class="form-control-button2 " /></div>
                </td>
                <!-- <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate2" value="" class="form-control-button2 " /></div>
                </td> -->
			</tr><tr>
				<td >
				
					<div class="ui-main-form-1">
						
						<input type="text" name="v_personal3" value="<?= isset($rpersonnel[0]->v_Personal3)?$rpersonnel[0]->v_Personal3:''; ?>" class="form-control-button2 " />
					</div>
				</td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_hour3" value="<?= isset($minutes3) == TRUE ? $minutes3 : '' ?>" class="form-control-button2 " /></div>
                </td>
                <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate3" value="<?= isset($rpersonnel[0]->n_Rate3)?$rpersonnel[0]->n_Rate3:''; ?>" class="form-control-button2 " /></div>
                </td>
                <!-- <td>
                <div class="ui-main-form-2"><input type="text" name="v_rate3" value="" class="form-control-button2 " /></div>
                </td> -->
			</tr>
          
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="4">
					<!-- <?php echo anchor ('contentcontroller/personnelinvolved_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?> -->
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Save</button>-->
                    <input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
				</td>
			</tr>
		</table>	
        <?php  echo form_hidden('wrk_ord',$this->input->get_post('wrk_ord')); ?>			
	</div>
</div>
<?php echo form_close(); ?>