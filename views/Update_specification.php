<?php echo form_open('contentcontroller/confirmspec');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Specification</b></td>
			</tr>
			<tr>
				<td class="td-assest">Make (Country of Origin) : </td>
				<td>
				  <?php echo form_dropdown('n_make', $country_list, set_value('n_make',isset($asset_det[0]->V_Make) == TRUE ? $asset_det[0]->V_Make : 'N/A') , 'class="dropdown n_wi-date"'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Manufacturer :</td>			
				<td>
				  <?php echo form_dropdown('n_manufacturer', $manufacturer_list, set_value('n_manufacturer',isset($asset_det[0]->V_Manufacturer) == TRUE ? $asset_det[0]->V_Manufacturer : 'N/A') , 'class="dropdown n_wi-date"'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Brand : &nbsp;</td>
				<td><input type="text" name="n_brand" value="<?= isset($asset_det[0]->V_Brandname) == TRUE ? $asset_det[0]->V_Brandname : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Model : </td>
				<td><input type="text" name="n_model" value="<?= isset($asset_det[0]->V_Model_no) == TRUE ? $asset_det[0]->V_Model_no : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Serial Number :&nbsp;</td>
				<td><input type="text" name="n_serial_no" value="<?= isset($asset_det[0]->V_Serial_no) == TRUE ? $asset_det[0]->V_Serial_no : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Capacity :&nbsp;</td>
				<td>
					<input class="form-control-button2 n_wi-c" type="text" name="n_capacity" id="n_capacity" value="<?= isset($asset_det[0]->v_Capacity) == TRUE ? $asset_det[0]->v_Capacity : 'N/A'?>"><span class="ui-left_mobile n_wi-ec"><br/></span>
		           	<!--<select size="1" name="fCapacityUnit" class="dropdown2 n_wi-c2" >
		            	<option  selected >&nbsp;</option>
		            	<option > KG      </option>
		    			<option > Litre   </option>
		  				<option > M3      </option>
						<option > HP      </option>
						<option > Bar     </option>
						<option > Tonnes  </option>
		   				<option > mmHG    </option>
						<option > cc      </option>
					</select>-->
					<?php 
						$CapacityUnit = array(
							'' => '',
							'KG' => 'KG',
							'Litre' => 'Litre',
							'M3' => 'M3',
							'HP' => 'HP',
							'Bar' => 'Bar',
							'Tonnes' => 'Tonnes',
							'mmHG' => 'mmHG',
							'cc' => 'cc',
							);
					?>
					<?php echo form_dropdown('fCapacityUnit', $CapacityUnit, set_value('fCapacityUnit',isset($asset_det[0]->V_capacityunit) ? $asset_det[0]->V_capacityunit : 'N/A') , 'class="dropdown2 n_wi-c2"'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Depreciation :&nbsp;	
				<td><input type="text" name="n_depreciation" value="<?= isset($asset_det[0]->V_Depreciation) == TRUE ? $asset_det[0]->V_Depreciation : 'N/A'?>" class="form-control-button2 n_wi-dep"> Years</td>
			</tr>
			<tr>
				<td class="td-assest">Life Span:&nbsp;</td>			
				<td><input type="text" name="n_life_span" value="<?= isset($asset_det[0]->V_Lifespan) == TRUE ? $asset_det[0]->V_Lifespan : 'N/A'?>" class="form-control-button2 n_wi-dep"> Years</td>
			</tr>
			<tr>
				<td  valign="top" class="td-assest">OP Hours Code :  </td>
											<td style="padding-left:10px;">
												<input type="radio" id="radio-1-1" name="n_op_hours" class="regular-radio" value="8" <?php echo set_radio('n_op_hours', '8'); ?> <?= $asset_det[0]->V_Oper_Hr_code == '8' ? 'checked' : ''?>/> 
												<label for="radio-1-1"></label> 8 Hours <br />
												<input type="radio" id="radio-1-2" name="n_op_hours" class="regular-radio" value="16" <?php echo set_radio('n_op_hours', '16'); ?> <?= $asset_det[0]->V_Oper_Hr_code == '16' ? 'checked' : ''?>/>   
												<label for="radio-1-2"></label>  16 Hours<br />
												<input type="radio" id="radio-1-3" name="n_op_hours" class="regular-radio" value="24" <?php echo set_radio('n_op_hours', '24'); ?> <?= $asset_det[0]->V_Oper_Hr_code == '24' ? 'checked' : ''?>/> 
												<label for="radio-1-3"></label> 24 Hours
											</td>
			</tr>
			<tr>
				<td class="td-assest">Manual / Drawing Ref No :&nbsp;</td>			
				<td><input type="text" name="n_manual" value="<?= isset($asset_det[0]->V_Mnl_Draw_no) == TRUE ? $asset_det[0]->V_Mnl_Draw_no : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Procedure Code :&nbsp;</td>			
				<td><input type="text" name="n_procedure_code" value="<?= isset($asset_det[0]->V_Procedure_code) == TRUE ? $asset_det[0]->V_Procedure_code : 'N/A'?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
				</td>
			</tr>
		</table>
		</div>			
</div>
<?php echo form_hidden('n_asset_number',isset($asset_det[0]->V_Asset_no) == TRUE ? $asset_det[0]->V_Asset_no : 'N/A');?>
<?php echo form_close(); ?>