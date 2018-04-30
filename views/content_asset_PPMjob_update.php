<?php echo form_open('contentcontroller/assetPPMjob_confirm');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">
			<tr class="ui-color-contents-style-1" height="40px">
				<?php if ($this->input->get('jobyear') <> '') { ?>
				<td class="ui-header-new" colspan="2"><b>Update PPM Job Register <?php echo $this->input->post('asstno')?></b></td>
				<?php } ?>
				<?php if ($this->input->get('jobyear') == '') { ?>
				<td class="ui-header-new" colspan="2"><b>New PPM Job Register</b></td>
				<?php } ?>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Year : </td>
				
				<?php if ($this->input->get('jobyear') <> '') { ?>
				<td><input type="text" name="n_Registered_Date" value="<?php echo set_value('n_Registered_Date', isset($records[0]->v_year) == TRUE ? $records[0]->v_year : '')?>" class="form-control-button2 n_wi-date" readonly></td>
				<?php } ?>
				<?php if ($this->input->get('jobyear') == '') { ?>
				<td>
				<input type="radio" id="radio-1-1" name="n_Registered_Date" class="regular-radio" value="<?=date("Y")?>" <?php echo set_radio('n_Registered_Date', date("Y")); ?> checked/>
				<label for="radio-1-1" ></label> <?=date("Y")?> <br />
				<input type="radio" id="radio-1-2" name="n_Registered_Date" class="regular-radio" value="<?=date("Y")+1?>" <?php echo set_radio('n_Registered_Date', date("Y")+1); ?>/>   
				<label for="radio-1-2"></label>  <?=date("Y")+1?><br />
				</td>
				<?php } ?>
					
			</tr>
			<tr>
				<td class="td-assest" valign="top">Job Type :</td>			
				<td>
					<input type="text" name="n_Job_Type" id="n_Job_Type" value="<?php echo set_value('n_Job_Type', isset($records[0]->v_jobtype) == TRUE ? $records[0]->v_jobtype : '')?>" class="form-control-button2 nwidth-as"> 
					<span class="icon-windows" onclick="fCallpop_Job_Type()"></span>
					Every <span class="ui-left_mobile display"></span>
					<input type="text" size="3" name="n_Job_Type2" id="n_Job_Type2" value="<?php echo set_value('n_Job_Type2', isset($records[0]->n_frequency) == TRUE ? $records[0]->n_frequency : '')?>" class="form-control-button2 nwidth-as"> days
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Checklist Code: </td>			
				<td>
				<input type="text" name="n_Checklist_Code" id="n_Checklist_Code" value="<?php echo set_value('n_Checklist_Code', isset($records[0]->v_checklistcode) == TRUE ? $records[0]->v_checklistcode : '')?>" class="form-control-button2 nwidth-cc"> 
				<span class="icon-windows" onclick="fCallpop_Checklist_Code()"></span> 
				<span class="ui-left_mobile display"></span>
				<input type="text" name="n_Checklist_Code2" id="n_Checklist_Code2" value="" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Procedure :</td>
				<td><input type="text" name="n_Procedure" value="<?php echo set_value('n_Procedure', isset($records[0]->v_procedurecode) == TRUE ? $records[0]->v_procedurecode : '')?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Spare List :&nbsp;</td>
				<td><input type="text" name="n_Spare_List" value="<?php echo set_value('n_Procedure', isset($records[0]->v_sparelist) == TRUE ? $records[0]->v_sparelist : '')?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Details :&nbsp;</td>
				<td><textarea class="Input n_com" name="n_Details" ><?php echo set_value('n_Details', isset($records[0]->v_details) == TRUE ? $records[0]->v_details : '')?></textarea></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:200px;"/>
					<?php if ($this->input->get('jobyear') <> ''){ ?>
					<?php echo anchor ('contentcontroller/del_assetppmjobreg?asstno='.$this->input->get('asstno').'&jobyear='.$this->input->get('jobyear').'&id='.$this->input->get('id'), '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Delete</button>'); ?>
					<?php } ?>
				</td>
			</tr>
		</table>
		</div>				
	</div>
<?php include 'content_jv_popup.php';?>
<?php if ($this->input->get('jobyear') <> '') { ?>
<?php echo form_hidden('year',$this->input->get('jobyear'));?>
<?php echo form_hidden('id',$this->input->get('id'));?>
<?php } ?>
<?php if ($this->input->get('jobyear') == '') { ?>
<?php } ?>

<?php echo form_hidden('n_asset_no',$this->input->get('asstno'));?>
<?php echo form_close(); ?>