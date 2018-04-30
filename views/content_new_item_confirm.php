<?php echo form_open('contentcontroller/new_item?p=confirm');?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm New Item</span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>New Item</b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Item Code:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_code" class="form-control-button2 n_wi-date2" disabled></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Item Description:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_description" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Part No:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_partno" class="form-control-button2 n_wi-date2" disabled></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Part Description:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_pdescription" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Brand :   </td>
											<td style="padding-left:10px;" valign="top"><?php 
																							$brand = array(
																							'' => '',
																							'1' => '1',
																							'2' => '2',
																							'3' => '3',
																						 );
																							 ?>
										  <?php echo form_dropdown('n_brand', $brand, set_value('n_brand'), 'id="n_region" class="dropdown n_wi-date2" disabled'); ?> </td>
										  <td style="padding-left:10px;" valign="top">Model :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_pdescription" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Unit of Measurement :  </td>
											<td style="padding-left:10px;" valign="top"><?php 
										$Unit_of_measurement = array(
											'' => '',
										'1' => '1',
										'2' => '2',
                  						'3' => '3',
                					 );
										 ?>
										  <?php echo form_dropdown('n_Unit_of_measurement', $Unit_of_measurement, set_value('n_Unit_of_measurement'), 'id="n_Unit_of_measurement" class="dropdown n_wi-date2" disabled'); ?>
											</td>
											<td style="padding-left:10px;" valign="top">Spare Part Type :  </td>
											<td style="padding-left:10px;" valign="top"><?php 
										$Spare_part_type = array(
											'' => '',
										'1' => '1',
										'2' => '2',
                  						'3' => '3',
                					 );
										 ?>
										  <?php echo form_dropdown('n_Spare_part_type', $Unit_of_measurement, set_value('n_Spare_part_type'), 'id="n_Spare_part_type" class="dropdown n_wi-date2" disabled'); ?>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Location :   </td>
											<td style="padding-left:10px;" valign="top"><?php 
																							$Location = array(
																							'' => '',
																							'1' => '1',
																							'2' => '2',
																							'3' => '3',
																						 );
																							 ?>
										  <?php echo form_dropdown('n_Location', $Location, set_value('n_Location'), 'id="n_region" class="dropdown n_wi-date2" disabled'); ?> </td>
										  <td style="padding-left:10px;" valign="top">Specify :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_Specify" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Part Category :  </td>
											<td style="padding-left:10px;" valign="top"><?php 
										$Part_category = array(
											'' => '',
										'1' => '1',
										'2' => '2',
                  						'3' => '3',
                					 );
										 ?>
										  <?php echo form_dropdown('n_Part_category', $Part_category, set_value('n_Part_category'), 'id="n_Unit_of_measurement" class="dropdown n_wi-date2" disabled'); ?>
											</td>
											<td style="padding-left:10px;" valign="top">Is Expiry date Required :  </td>
											<td style="padding-left:10px;" valign="top"><?php 
										$expiry_date = array(
											'' => '',
										'1' => 'No',
										'2' => '2',
                  						'3' => '3',
                					 );
										 ?>
										  <?php echo form_dropdown('n_expiry_date', $expiry_date, set_value('n_expiry_date'), 'id="n_Spare_part_type" class="dropdown n_wi-date2" disabled'); ?>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Min Unit:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_min_unit" class="form-control-button2 n_wi-date2" disabled></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Max Unit:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_max_unit" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Minimum Price Per Unit:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_minimum_price" class="form-control-button2 n_wi-date2" disabled></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Maximum Price Per Unit (RM):</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_maximum_price" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Status :   </td>
											<td style="padding-left:10px;" valign="top"><?php 
																							$Status = array(
																							'' => '',
																							'1' => '1',
																							'2' => '2',
																							'3' => '3',
																						 );
																							 ?>
										  <?php echo form_dropdown('n_Status', $Status, set_value('n_Status'), 'id="n_region" class="dropdown n_wi-date2" disabled'); ?> </td>
										  <td style="padding-left:10px;" valign="top">Expiry Age (In Month) :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_Expiry" class="form-control-button2 n_wi-date2" disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Current Stock Level :   </td>
											<td style="padding-left:10px;" valign="top"><input type="text" name="n_url" id="n_Current" value="<?php echo set_value('n_Current'); ?>" class="form-control-button2 n_wi-date2" disabled></td>
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
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                        <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
					</td>
				</tr>
			</table>
			<?php echo form_hidden('m',$this->input->get('m')) ?>
			<?php echo form_hidden('y',$this->input->get('y')) ?>
		</div>
	</div>
</div>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
