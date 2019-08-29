<?php echo form_open('contentcontroller/confirmspecsv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Specification</b></td>
			</tr>
			<tr>
				<td class="td-assest">Make (Country of Origin) : </td>
				<td>
					<input type="text" name="n_make" value="<?=$this->input->post('n_make')?>" class="form-control-button2 n_wi-date" readonly>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Manufacturer :</td>			
				<td>
					<input type="text" name="n_manufacturer" value="<?=$this->input->post('n_manufacturer')?>" class="form-control-button2 n_wi-date" readonly>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Brand : &nbsp;</td>
				<td><input type="text" name="n_brand" value="<?=$this->input->post('n_brand')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Model : </td>
				<td><input type="text" name="n_model" value="<?=$this->input->post('n_model')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Serial Number :&nbsp;</td>
				<td><input type="text" name="n_serial_no" value="<?=$this->input->post('n_serial_no')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Capacity :&nbsp;</td>
				<td>
					<input class="form-control-button2 n_wi-c" type="text" name="n_capacity" id="n_capacity" value="<?=$this->input->post('n_capacity')?>" readonly><span class="ui-left_mobile n_wi-ec"><br/></span>
		           	<!--<select size="1" name="fCapacityUnit" class="dropdown2 n_wi-c2" disabled>
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
					<?php echo form_dropdown('fCapacityUnit', $CapacityUnit, set_value('fCapacityUnit') , 'class="dropdown2 n_wi-c2" disabled'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest">Depreciation :&nbsp;	
				<td><input type="text" name="n_depreciation" value="<?=$this->input->post('n_depreciation')?>" class="form-control-button2 n_wi-dep" readonly> Years</td>
			</tr>
			<tr>
				<td class="td-assest">Life span:&nbsp;</td>			
				<td><input type="text" name="n_life_span" value="<?=$this->input->post('n_life_span')?>" size="8" class="form-control-button2 n_wi-dep" readonly> Years</td>
			</tr>
			<tr>
				<td class="td-assest">OP Hours Code :&nbsp;</td>			
				<td><input type="text" name="n_op_hours" value="<?=$this->input->post('n_op_hours')?>" size="8" class="form-control-button2 n_wi-dep" readonly> Hours</td>
			</tr>
			<tr>
				<td class="td-assest">Manual / Drawing Ref No :&nbsp;</td>			
				<td><input type="text" name="n_manual" value="<?=$this->input->post('n_manual')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Procedure Code :&nbsp;</td>			
				<td><input type="text" name="n_procedure_code" value="<?=$this->input->post('n_procedure_code')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Change</button>-->
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width:200px;"/>
				</td>
			</tr>
		</table>
		</div>				
	</div>
<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
<?php echo form_hidden('fCapacityUnit',$this->input->post('fCapacityUnit'));?>
<?php echo form_close(); ?>