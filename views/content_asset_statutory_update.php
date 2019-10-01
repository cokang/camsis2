<?php echo form_open('contentcontroller/assetstatutory_update_confrim');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<?php if ($this->input->get('id') == '') { ?>
				<td class="ui-header-new" colspan="2"><b>Add Statutory</b></td>
				<?php } else { ?>
				<td class="ui-header-new" colspan="2"><b>Edit Statutory</b></td>
				<?php } ?>

			</tr>
			<tr>
				<td class="td-assest">Authority: </td>
				<td><input type="text" name="n_Authorit" value="<?php echo set_value('n_Authorit',isset($record[0]->v_authority) ? $record[0]->v_authority : '') ?>" class="form-control-button2 n_user_d" id="n_Authorit"> <span class="icon-windows" onclick="popauthority()"></span></td>
			</tr>
			<tr>
				<td class="td-assest">&nbsp;</td>
				<td><input type="text" name="n_Authorit2" value="<?php echo set_value('n_Authorit2',isset($record[0]->v_Description) ? $record[0]->v_Description : '') ?>" class="form-control-button2 n_wi-date" id="n_Authorit2"></td>
			</tr>
			<tr>
				<td class="td-assest">Registration Number:</td>			
				<td><input type="text" name="n_Registration_Number" value="<?php echo set_value('n_Registration_Number',isset($record[0]->v_regno) ? $record[0]->v_regno : '') ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Certificate Number :</td>
				<td><input type="text" name="n_Certificate_Number" value="<?php echo set_value('n_Certificate_Number',isset($record[0]->v_cert_no) ? $record[0]->v_cert_no : '') ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td class="td-assest">Issued On :</td>
				<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_Issued_On" value="<?php echo set_value('n_Issued_On',isset($record[0]->d_certissdt) ? date_format(new DateTime($record[0]->d_certissdt), 'd-m-Y') : '') ?>" class="form-control-button2 n_wi-date" /></td>
			</tr>
			<tr>
				<td class="td-assest">Inspected On :&nbsp;</td>
				<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_Inspected_On" value="<?php echo set_value('n_Inspected_On',isset($record[0]->d_inspdt) ? date_format(new DateTime($record[0]->d_inspdt), 'd-m-Y') : '') ?>" class="form-control-button2 n_wi-date" /></td>
			</tr>
			<tr>
				<td class="td-assest">Start On:&nbsp;</td>
				<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_Start_On" value="<?php echo set_value('n_Start_On',isset($record[0]->D_start) ? date_format(new DateTime($record[0]->D_start), 'd-m-Y') : '') ?>" class="form-control-button2 n_wi-date"/></td>
			</tr>
			<tr>
				<td class="td-assest">End On :&nbsp;	</td>
				<td><input type="text"  id="date<?php echo $numberdate++; ?>" name="n_End_On" value="<?php echo set_value('n_End_On',isset($record[0]->D_end) ? date_format(new DateTime($record[0]->D_end), 'd-m-Y') : '') ?>" class="form-control-button2 n_wi-date"/></td>
			</tr>
			<tr>
				<td class="td-assest">Class / Grade :&nbsp;</td>			
				<td><input type="text" name="n_Class_Grade" value="<?php echo set_value('n_Class_Grade',isset($record[0]->v_GradeID) ? $record[0]->v_GradeID : '') ?>" class="form-control-button2 n_wi-date"></td>
			</tr>
			<tr>
				<td valign="top" class="td-assest">Remarks :&nbsp;</td>			
				<td><textarea name="n_Remarks" class="input n_com"><?php echo set_value('n_Remarks',isset($record[0]->v_Remarks) ? $record[0]->v_Remarks : '') ?></textarea></td>
			</tr>
			<?php if ($this->input->get('id') != '') { ?>
			<tr>		
				<td><input type="checkbox" name="delete_chk" value="1"<?php echo set_checkbox('delete_chk', '1'); ?>>Delete Data<br></td>
			</tr>
			<?php } ?>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:200px;"/>
				</td>
			</tr>
		</table>				
	</div>
</div>
<?php include 'content_jv_popup.php';?>
<?php echo form_hidden('assetno',$this->input->get('assetno'));?>
<?php echo form_hidden('certno',$this->input->get('certno'));?>
<?php echo form_hidden('id',$this->input->get('id'));?>
<?php echo form_hidden('n_acces',$this->input->get('accescd'));?>
<?php echo form_close(); ?>