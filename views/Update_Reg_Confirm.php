<?php echo form_open('contentcontroller/confirmRegsv?assetno='.$assetno);?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Registration</b></td>
			</tr>
			<tr>
				<td class="td-assest">Registered Date: </td>
				<td><input type="text" name="n_registered_date" value="<?=$this->input->post('n_registered_date')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<!--<tr>
				<td class="td-assest">Asset Number:</td>			
				<td><input type="text" name="n_asset_number" value="" class="form-control-button2 n_wi-date" readonly></td>
			</tr>-->
			<tr>
				<td class="td-assest">Asset Number:&nbsp;</td>
				<td><input type="text" name="n_tagnumber" value="<?=$this->input->post('n_tagnumber')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Equipment Code:</td>
				<td><input type="text" name="n_equip_cd" value="<?=$this->input->post('n_equip_cd')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">UMDNS Code :&nbsp;</td>
				<td><input type="text" name="n_umdns_cd" value="<?=$this->input->post('n_umdns_cd')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr><td class="td-assest">User Department:&nbsp;</td>
				<td><input type="text" name="n_user_department" value="<?=$this->input->post('n_user_department')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">User Department Name:&nbsp;	</td>
				<td><input type="text" name="n_user_department1" value="<?=$this->input->post('n_user_department1')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Location:&nbsp;</td>			
				<td><input type="text" name="n_location" value="<?=$this->input->post('n_location')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Location Name:&nbsp;</td>
				<td><input type="text" name="n_location2" value="<?=$this->input->post('n_location2')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">User Name:&nbsp;</td>			
				<td><input type="text" name="n_username" value="<?=$this->input->post('n_username')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Group :</td>
				<td><?php 
										$layanan=$this->session->userdata('usersess');
											$assetgroup = array(
												'' => 'Please Select',
												'1' => 'Group 1',
												'2' => 'Group 2',
												'3' => 'Group 3',
												);
											$assetgroup2 = array(
												'' => 'Please Select',
												'1' => 'Group 1',
												'1B' => 'Group 1B',
												'2' => 'Group 2',
												'3' => 'Group 3',
												'4' => 'Group 4',
												'5' => 'Group 5',
												);	
										?>
										<?php echo form_dropdown('a_group',($layanan=='BES') ? $assetgroup2 : $assetgroup , set_value('a_group') , 'class="dropdown n_wi-date" disabled'); ?></td>
			</tr>
		 <?php if ($layanan=='BES') {?>	
           <?php $nilai= explode("|", $this->input->post('maintaincat'));?>		 
									<tr>
										<td class="td-assest">Maintenance Category :</td>
										<td>
										<?php echo form_dropdown('maintaincat',$nilai[1], ''  , 'class="dropdown n_wi-date" disabled'); ?>
										</td>
									</tr>
				<?php echo form_hidden('a_group',$this->input->post('a_group'));?>				
				<?php echo form_hidden('maintaincat',$nilai[0]);?>				
								   <?php } ?>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2" style="">
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Change</button>-->
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width: 200px;"/>
					
				</td>
			</tr>
		</table>
		</div>				
	</div>
<?php echo form_close(); ?>